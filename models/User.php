<?php
class User
{
    /*
    * Registration
    */
    private static function checkEmail($email)
    {
        $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
        if (!empty($email) && preg_match($pattern, $email)) {
            return $email;
        } else {
            return null;
        }

    }

    private static function checkPassword($password, $confirmPassword)
    {
        if (strlen($password) < 6 || $password != $confirmPassword) {
            return null;
        }

        return $password;

    }

    public static function registration($email, $password, $confirmPassword, $name)
    {
        $errors = array();
        $email = User::checkEmail($email);
        if ($email == null) {
            $errors[] = 'Email is not corrected!';
        }

        $password = User::checkPassword($password, $confirmPassword);
        if ($password == null) {
            $errors[] = 'Password have not 6 symbols or password confirmation is wrong!';
        }

        if (!empty($errors)) {
            return $errors;
        }

        $db = Connection::getInstance();
        $connect = $db->get();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = $connect->prepare('INSERT INTO users (email, password, name) VALUES (?, ?, ?)');
        $sql->bind_param('sss', $email, $hash, $name);
        return $sql->execute();
    }

    public static function createDir($email)
    {
        mkdir("Users/" . $email, 0777);
    }
    /*
    * End Registration
    */

    /*
    * Login
    */

    public static function login($email, $password)
    {
        if (empty($email) || empty($password)) {
            return null;
        }

        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('SELECT email, password, name FROM users WHERE email=?');
        $sql->bind_param('s', $email);
        $sql->execute();
        $result = $sql->get_result();
        $result = mysqli_fetch_array($result);

        if (empty($result) || !password_verify($password, $result['password'])) {
            return null;
        } else {
            return $email;
        }

    }

    public static function remembered($email)
    {
        setcookie('Email', $email, time() + 60 * 60 * 24 * 30 * 12);

    }

    public static function checkAuthorization()
    {
        $email = null;
        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('SELECT * FROM users WHERE email=?');
        $sql->bind_param('s', $_COOKIE['Email']);
        $sql->execute();
        $result = $sql->get_result();
        $result = mysqli_fetch_array($result);
        if (empty($result)) {
            return 'Guest';
        }
        if (!isset($_COOKIE['Email'])) {
            return 'Guest';
        } else {
            return $_COOKIE['Email'];
        }

    }

    public static function getName($email)
    {
        if (empty($email)) {
            return null;
        }

        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('SELECT name FROM users WHERE email=?');
        $sql->bind_param('s', $email);
        $sql->execute();
        $result = $sql->get_result();
        $result = mysqli_fetch_array($result);
        if (!empty($result['name'])) {
            return $result['name'];
        } else {
            return $email;
        }

    }
    /*
    *End login
    */

    /*
    *Logout
    */
    public static function logout()
    {
        session_destroy();
        setcookie('Email', '', time() - 60 * 60 * 24 * 30 * 12);

    }
    /*
    *End logout
    */

    /*
    *Password recovery
    */

    public static function recoveryPassword($email)
    {
        if (empty($email)) {
            return null;
        }

        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('SELECT id FROM users WHERE email=?');
        $sql->bind_param('s', $email);
        $sql->execute();
        $result = $sql->get_result();
        $result = mysqli_fetch_array($result);
        if (!empty($result['id'])) {
            $newPass = User::sendNewPassword($email);
            if (!User::changePassword($email, $newPass)) {
                return null;
            }

            return true;
        } else {
            return null;
        }

    }

    private static function sendNewPassword($email)
    {
        $newPass = User::passwordGeneration();
        $to = $email;
        $subject = "Password recovery";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: UPage' . "\r\n";
        $message = '
        <html>
            <head>
                <title>Password recovery</title>
            </head>
            <body>
            <p>Hi, You have applied for a password change. This your new password <b>' . $newPass . '</b></p>
            <p>Use a temporary password for authentication and create your own in your account</p>
            <p>Have a nice day!</p>
            </body>
        </html>
        ';
        mail($to, $subject, $message, $headers);
        return  $newPass;
    }

    private static function passwordGeneration()
    {
        $password = null;
        $chars = "qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
        $max = 10;
        $size = (StrLen($chars) - 1);
        while ($max--) {
            $password .= $chars[rand(0, $size)];
        }

        return $password;

    }

    public static function changePassword($email, $password)
    {
        $db = Connection::getInstance();
        $connect = $db->get();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = $connect->prepare('UPDATE users SET password=? WHERE email=?');
        $sql->bind_param('ss', $hash, $email);
        return $sql->execute();

    }
    /*
    * End Password recovery
    */

    public static function getId($email)
    {
        if (empty($email)) {
            return null;
        }

        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('SELECT id FROM users WHERE email=?');
        $sql->bind_param('s', $email);
        $sql->execute();
        $result = $sql->get_result();
        $result = mysqli_fetch_array($result);
        if (empty($result['id'])) {
            return null;
        } 
            return $result['id'];

    }

    public static function changeName($userId, $name)
    {
        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('UPDATE users SET name=? WHERE id=?');
        $sql->bind_param('si', $name, $userId);
        return $sql->execute();
    }
}
