<?php
class Links
{
    public static function add($name, $link, $categoryId)
    {
        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('INSERT INTO links (name, link, category_id) VALUES (?, ?, ?)');
        $sql->bind_param('ssi', $name, $link, $categoryId);
        return $sql->execute();
    }
}