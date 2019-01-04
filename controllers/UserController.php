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
        $title = 'Sign up!';
        include_once ROOT . '/views/templates/site/regist.php';
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
        $title = 'Sign in!';
        include_once ROOT . '/views/templates/site/login.php';
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
                $title = "Successfull recovery";
                include_once ROOT . '/views/templates/site/successfull-recovery.php';
                return true;
            }
        }
        $title = "Password recovery";
        include_once ROOT . '/views/templates/site/recovery.php';
        return true;

    }
}
