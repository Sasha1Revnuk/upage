<?php

class AdminController
{
    public function actionMain()
    {
        $title = 'Main';

        $breadCrumb = [
            'Main' => 'admin\main',
        ];
        include_once ROOT . '/views/templates/admin/index.php';
        return true;
    }
}
