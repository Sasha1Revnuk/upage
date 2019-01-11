<?php
class Style
{
    public static function can_upload($file){
        // если имя пустое, значит файл не выбран
        if($file['name'] == '')
            return 'Вы не выбрали файл.';
        
        /* если размер файла 0, значит его не пропустили настройки 
        сервера из-за того, что он слишком большой */
        if($file['size'] == 0 || $file['size'] > 900000)
            return 'Файл слишком большой.';
        
        // разбиваем имя файла по точке и получаем массив
        $getMime = explode('.', $file['name']);
        // нас интересует последний элемент массива - расширение
        $mime = strtolower(end($getMime));
        // объявим массив допустимых расширений
        $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
        
        // если расширение не входит в список допустимых - return
        if(!in_array($mime, $types))
            return 'Недопустимый тип файла.';
        
        return true;
      }
      
      public static function make_upload($file, $userEmail){	
        // формируем уникальное имя картинки: случайное число и name
        $name = mt_rand(0, 10000) . $file['name'];
        copy($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']. '/Users/' . $userEmail .'/' . $name);
      }

    public static function showStandartPictures(){
        $directory =realpath(__DIR__ . '/../Users/backgrounds');    // Папка с изображениями
        $allowed_types=array("jpg", "png", "gif");  //разрешеные типы изображений
        $file_parts = array();
        $ext="";
        $title="";
        $i=0;
      //пробуем открыть папку
        //$dir_handle = opendir($directory) or die("Ошибка при открытии папки !!!");
        if ($handle = opendir($directory)) {
            while (false !==($file = readdir($handle)))    //поиск по файлам
            {
                if($file=="." || $file == "..") continue;  //пропустить ссылки на другие папки
                $file_parts = explode(".",$file);          //разделить имя файла и поместить его в массив
                $ext = strtolower(array_pop($file_parts));   //последний элеменет - это расширение
        
        
                if(in_array($ext,$allowed_types))
                {
                    echo '
                    <div  class="col-md-3 flex-item" >
                    <form action="" method="POST" >
                        <input type="hidden" value="/Users/backgrounds/'.$file.'"  title="'.$file.'" name="setStandartBackground"></input>
                        <input type="image" src="/Users/backgrounds/'.$file.'"  class="btn " name="save"  width="300px" height="150px">
                        
                        </form> 
                    </div>';
                $i++;
                }
    
            }
        }
        
    closedir($handle);  //закрыть папку
    }
    public static function showPersonalPictures($email){
        $directory =realpath(__DIR__ . '/../Users/'. $email);    // Папка с изображениями
        $allowed_types=array("jpg", "png", "gif");  //разрешеные типы изображений
        $file_parts = array();
        $ext="";
        $title="";
        $i=0;
      //пробуем открыть папку
        //$dir_handle = opendir($directory) or die("Ошибка при открытии папки !!!");
        if ($handle = opendir($directory)) {
            while (false !==($file = readdir($handle)))    //поиск по файлам
            {
                if($file=="." || $file == "..") continue;  //пропустить ссылки на другие папки
                $file_parts = explode(".",$file);          //разделить имя файла и поместить его в массив
                $ext = strtolower(array_pop($file_parts));   //последний элеменет - это расширение
        
        
                if(in_array($ext,$allowed_types))
                {
                    echo '
                    <div  class="col-md-3 flex-item cont" >
                    <form action="" method="POST" >
                        <input type="hidden" value="/'.$file.'"  title="'.$file.'" name="setCustomBackground"></input>
                        <input type="hidden" value="/Users/' . $email . '/'.$file.'"  title="'.$file.'" name="setStandartBackground"></input>
                        <input type="image" src="/Users/' . $email . '/'.$file.'"  class="btn " name="save"  width="300px" height="150px">
                        <input type="submit" class="btn btn-sm btn-danger" name="deleteBg" value="Delete" style="margin-left:4%">
                        </form> 
                    </div>';
                $i++;
                }
    
            }
        }
        
    closedir($handle);  //закрыть папку
    }

    public static function updateBackground($id, $src)
    {
        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('UPDATE styles SET background_path=? WHERE user_id=?');
        $sql->bind_param('si', $src, $id);
        return $sql->execute();
    }
    public static function deleteBg($filek, $email){
        $file = realpath(__DIR__ . '/../Users/'. $email. $filek);
        $directory = realpath(__DIR__ . '/../Users/'. $email);

        if (file_exists($file)) {
            unlink($file);
            return true;
        } else {
             return false;
        }
    }

    public static function getStyles($userId)
    {
        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('SELECT * FROM styles WHERE user_id=?');
        $sql->bind_param('i', $userId);
        $sql->execute();
        $result = $sql->get_result();
 
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }
    ///////
    public static function updateCategoryColor($userId, $color, $hcolor)
    {
        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('UPDATE styles SET cat_text_col=?, cat_hov_col=? WHERE user_id=?');
        $sql->bind_param('ssi', $color,  $hcolor, $userId);
        return $sql->execute();
    }

    public static function updateMainTextColor($userId, $color) 
    {
        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('UPDATE styles SET main_text_col=? WHERE user_id=?');
        $sql->bind_param('si', $color, $userId);
        return $sql->execute();
    }

    public static function updateAdditionTextColor($userId, $color)
    {
        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('UPDATE styles SET add_text_col=? WHERE user_id=?');
        $sql->bind_param('si', $color, $userId);
        return $sql->execute();
    }

    public static function updateTextBackgroundColor($userId, $color)
    {
        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('UPDATE styles SET text_back_col=? WHERE user_id=?');
        $sql->bind_param('si', $color, $userId);
        return $sql->execute();
    }

    public static function updateFooterTextColor($userId, $color)
    {
        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('UPDATE styles SET footer_text_col=? WHERE user_id=?');
        $sql->bind_param('si', $color, $userId);
        return $sql->execute();
    }

    public static function updateCtegoryNameColor($userId, $color)
    {
        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('UPDATE styles SET cat_name_col=? WHERE user_id=?');
        $sql->bind_param('si', $color, $userId);
        return $sql->execute();
    }

    public static function userStyleDel($userId)
    {
        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('DELETE FROM styles WHERE user_id=?');
        $sql->bind_param('i', $userId);
        return $sql->execute();
    }

    public static function userStyleAdd($userId)
    {
        $db = Connection::getInstance();
        $connect = $db->get();
        $sql = $connect->prepare('INSERT INTO styles (user_id) VALUES (?)');
        $sql->bind_param('i', $userId);
        return $sql->execute();
    }
}