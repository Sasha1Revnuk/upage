<?php
class SiteController
{
    public function actionIndex()
    {
        $user = User::checkAuthorization();
        require_once ROOT . '/views/site/index.php';
    }
}
