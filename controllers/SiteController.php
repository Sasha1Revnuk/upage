<?php
class SiteController
{
    public function actionIndex()
    {
        // var_dump($_SESSION);
        $status = false;
        $user = User::checkAuthorization();
        $title = 'Main page';
        if(isset($_COOKIE['Email']) && !empty($_COOKIE['Email']) && $_COOKIE['Email'] !='Guest') {
            $userId = User::getId($_COOKIE['Email']);

            $categories = Categories::getCategoriesById($userId);
            $links = array();
            foreach($categories as $category) {
                $links[] = Links::getLinksByCategoryName($category['name'], $userId);
            }
            $status = true;

            $backgroundPath = Style::getStyles($userId);
            $colorArr = explode(',', $backgroundPath[0]['add_text_col']);
            $range = array_pop($colorArr);
            $color = $colorArr[0] . ', ' . $colorArr[1] . ', ' .$colorArr[2]  . ', ' . $range;
        }
        //$userId = User::getId($_COOKIE['Email']);
       
        // echo '<pre>';
        // print_r($links);
        // echo '</pre>';
        include_once ROOT . '/views/templates/site/index.php';
        return true;
    }
}
