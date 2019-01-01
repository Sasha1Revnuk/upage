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

    public static function checkId($idArray, $nameArray, $userId)
    {
        $categories = Categories::getCategoriesById($userId);
        // echo '<pre>';
        // var_dump($categories);
        // echo '</pre>';
        $idDB = array();
        foreach ($categories as $category) {
            $idDB[] = $category['id'];
        }
        for ($i = 0; $i < count($idArray); $i++) {
            if (in_array($idArray[$i], $idDB) == false) {
                unset($idArray[$i]);
                unset($nameArray[$i]);
            }
        }

        return array($idArray, $nameArray);
    }

    public static function updateCategories($idArray, $nameArray, $userId)
    {
        $ids = implode(',', array_fill(0, count($idArray), '?'));
        $types = str_repeat('i', count($idArray));
        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('DELETE FROM categories WHERE id IN (' . $ids . ')');
        $sql->bind_param($types, ...$idArray);
        $sql->execute();

        for ($i = 0; $i < count($nameArray); $i++) {
            $sql = $connect->prepare('INSERT INTO categories (name, user_id) VALUES (?,?)');
            $sql->bind_param('si', $nameArray[$i], $userId);
            $sql->execute();

        }
    }
}
