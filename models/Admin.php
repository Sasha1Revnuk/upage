<?php
class Admin
{
    private static function errors($errors)
    {

        foreach($errors as $error) {
            echo '<div class="alert alert-danger">
                <strong>Warning! </strong>' . $error . '</div>';
        }
    }

    private static function successfull($status, $message)
    {


        echo '<div class="alert alert-success">' . $message .'</div>';


    }

    public static function progress($errors, $status, $message)
    {
        if (!empty($errors)) {
            Admin::errors($errors);
        }
        
        if ($status == true) {
            Admin::successfull($status, $message);
        }
    }

    public static function getUsers()
    {
        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('SELECT * FROM users');
        $sql->execute();
        $result = $sql->get_result();
 
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    public static function getById($id)
    {
        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('SELECT * FROM users WHERE id=?');
        $sql->bind_param('i', $id);
        $sql->execute();
        $result = $sql->get_result();
        $result = mysqli_fetch_array($result);
        if (!empty($result)) {
            return $result;
        } else {
            return null;
        }
    }

    public static function updateUser($id, $name, $email, $status, $oldemail)
    {
        rename("Users/" . $oldemail, "Users/" . $email);
        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('UPDATE users SET name=?, email=?, status=? WHERE id=?');
        $sql->bind_param('sssi', $name, $email, $status, $id);
        return $sql->execute();
    }
}
