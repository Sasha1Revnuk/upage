<?php

class Header
{
    public static function getStatus($email)
    {
        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('SELECT status FROM users WHERE email=?');
        $sql->bind_param('s', $email);
        $sql->execute();
        $result = $sql->get_result();
        $result = mysqli_fetch_array($result);
        if (empty($result)) {
            return null;
        }

        return $result['status'];

    }
}
