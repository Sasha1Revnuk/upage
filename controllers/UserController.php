<?php
class UserController
{
    public function actionRegistration()
    {
        if (isset($_COOKIE['Email'])) {
            header('Location: /');
        }
        $email = '';
        $password = '';
        $confirmPassword = '';
        $name = '';
        $errors = array();
        $registration = '';
        if (isset($_POST['submit'])) {
            $registration = User::registration($_POST['email'], $_POST['password'], $_POST['cpassword'], $_POST['name']);
        }

        if ($registration == true && is_array($registration) == false) {
            User::createDir($_POST['email']);
        }

        include_once ROOT . '/views/user/registration.php';
        return true;

    }

    public function actionLogin()
    {
        if (isset($_COOKIE['Email'])) {
            header('Location: /');
        }
        $email = '';
        if (isset($_POST['submit'])) {
            $email = User::login($_POST['email'], $_POST['password']);
            if ($email != null && isset($_POST['remeber']) && $_POST['remeber'] == "on") {
                User::remembered($email);
            } else {
                setcookie('Email',  $email, time() + 60);
            }
        }
        if ($email != null) {
            header('Location: /');
        }

        include_once ROOT . '/views/user/login.php';
        return true;
    }

    public function actionLogout()
    {
        User::logout();
        header('Location: /');

    }

    public function actionRecovery()
    {
        if (isset($_POST['submit']) && !empty($_POST['email'])) {
            $request = User::recoveryPassword($_POST['email']);
            if ($request != true) {
                echo '<p>Email not exist!</p>';
            } else {
                include_once ROOT . '/views/user/successfull-recovery.php';
                return true;
            }
        }

        include_once ROOT . '/views/user/recovery.php';
        return true;

    }
}
