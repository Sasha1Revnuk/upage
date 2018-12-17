<?php
class UserController
{
    public function actionRegistration()
    {
        $email = '';
        $password = '';
        $confirmPassword = '';
        $name = '';
        $errors = array();
        $registration = '';
        if (isset($_POST['submit'])) {
            // $email = User::checkEmail($_POST['email']);
            // if ($email == null) {
            //     $errors[] = 'Email is not corrected!';
            // }

            // $password = User::checkPassword($_POST['password'], $_POST['cpassword']);
            // if ($password == null) {
            //     $errors[] = 'Password have not 6 symbols or password confirmation is wrong!';
            // }

            // $name = $_POST['name'];
            $registration = User::registration($_POST['email'], $_POST['password'], $_POST['cpassword'], $_POST['name']);
        }

        include_once ROOT . '/views/user/registration.php';
        return true;

    }
}
