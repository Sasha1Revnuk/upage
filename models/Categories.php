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

    public static function getCategoriesById($userId)
    {
        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('SELECT * FROM categories WHERE user_id=?');
        $sql->bind_param('i', $userId);
        $sql->execute();
        $result = $sql->get_result();
 
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;

    }

}
