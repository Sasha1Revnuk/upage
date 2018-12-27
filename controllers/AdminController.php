<?php

class AdminController
{
    public function actionMain()
    {
        // var_dump($_SESSION);
        $title = 'Admin - Main';
        include_once ROOT . '/views/templates/admin/index.php';
        return true;
    }
}