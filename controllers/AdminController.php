<?php

class AdminController
{
    public  function actionMain()
    {
        $title = 'Main';

        $breadCrumb = [
            'Main' => 'admin\main',
        ];
        include_once ROOT . '/views/templates/admin/index.php';
        return true;
    }

    public static function actionUserlist()
    {
        $status = false;
        $errors = array();
        $message = '';
        $title = 'Users';
        $breadCrumb = [
            'Users' => '/admin/users',
        ];
        $users = Admin::getUsers();
        include_once ROOT . '/views/templates/admin/users.php';
        return true;
    }
}
