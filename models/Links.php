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

    public static function getLinksByCategoryId($id)
    {
        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('SELECT * FROM links WHERE category_id=?');
        $sql->bind_param('i', $id);
        $sql->execute();
        $result = $sql->get_result();
 
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    public static function checkId($idArray, $nameArray, $linkArray, $id)
    {
        $Links = Links::getLinksByCategoryId($id);
        $idDB = array();
        foreach ($Links as $Link) {
            $idDB[] = $Link['id'];
        }
        for ($i = 0; $i < count($idArray); $i++) {
            if (in_array($idArray[$i], $idDB) == false) {
                unset($idArray[$i]);
                unset($nameArray[$i]);
                unset($linkArray[$i]);
            }
        }

        return array($idArray, $nameArray, $linkArray);
    }

    public static function updateLinks($idArray, $nameArray, $linkArray, $id)
    {
        $ids = implode(',', array_fill(0, count($idArray), '?'));
        $types = str_repeat('i', count($idArray));
        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('DELETE FROM links WHERE id IN (' . $ids . ')');
        $sql->bind_param($types, ...$idArray);
        $sql->execute();

        for ($i = 0; $i < count($nameArray); $i++) {
            $sql = $connect->prepare('INSERT INTO links (name, link, category_id) VALUES (?,?,?)');
            $sql->bind_param('ssi', $nameArray[$i], $linkArray[$i], $id);
            $sql->execute();
        }
    }

    public static function getNameById($id)
    {
        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('SELECT name FROM links WHERE id=?');
        $sql->bind_param('i', $id);
        $sql->execute();
        $result = mysqli_fetch_array($sql->get_result());

        return $result['name'];
    }

    public static function delete($id)
    {
        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('DELETE FROM links WHERE id=?');
        $sql->bind_param('i', $id);
        return $sql->execute();
    }
}
