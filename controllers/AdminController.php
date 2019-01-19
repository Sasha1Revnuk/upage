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

    public static function actionUserEdit($id)
    {
        $status = false;
        $errors = array();
        $message = '';
        $user = Admin::getById($id);
        if ($user == null) {
            $errors[] = 'User is not founded';
        }
        if (empty($user['name'])) {
            $title = $user['email'];
            $breadCrumb = [
                'Users' => '/admin/users',
                $user['email'] => ''
            ];
        } else {
            $title = $user['name'];
            $breadCrumb = [
                'Users' => '/admin/users',
                $user['name'] => ''
            ];
        }

        

        if (isset($_POST['save']) && empty($errors)) {
            if (empty($_POST['email'])) {
                $errors[] = 'Empty email';
            }
    
            if (empty($_POST['select'])) {
                $errors[] = 'Empty status';
            }
            if (!Admin::updateUser($id, $_POST['name'], $_POST['email'], $_POST['select'], $user['email'])) {
                $errors[] = 'Bad request';
            } else if (empty($errors)) {
                $status = true;
                $message = 'This contact updated successfull';
            }
        }
        include_once ROOT . '/views/templates/admin/editUser.php';
        return true;
    }
}
