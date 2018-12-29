<?php
class Categories
{
    public static function add($name, $userId)
    {
        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('INSERT INTO categories (name, user_id) VALUES (?, ?)');
        $sql->bind_param('si', $name, $userId);
        return $sql->execute();
    }
}
