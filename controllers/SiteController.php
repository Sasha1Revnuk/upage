<?php
class SiteController
{
    public function actionIndex()
    {
        // var_dump($_SESSION);
        $user = User::checkAuthorization();
        $title = 'Main page';
        require_once ROOT . '/views/templates/site/index.php';
    }
}
