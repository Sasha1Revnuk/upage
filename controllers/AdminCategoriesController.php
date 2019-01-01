<?php
class AdminCategoriesController extends StandartController
{
    public function actionAdd()
    {
        $this->status = false;
        $this->errors = array();
        $this->message = '';
        $title = 'Add new category';
        $breadCrumb = [
            'Add new category' => 'category-add',
        ];
        if (isset($_POST['add'])) {
            if (isset($_POST['name']) == false || empty($_POST['name'])) {
                $this->errors[] = 'Name is empty. Try typing name please!';
            } else if (!Categories::add($_POST['name'], $this->userId)) {
                $this->errors[] = 'Request is bad! Try in another time!';
            }

            if (empty($this->errors)) {
                $this->status = true;
                $this->message = '<strong>Well done!</strong> You successfully add category ' . $_POST['name'];
            }
        }
        include_once ROOT . '/views/templates/admin/category-add.php';
        return true;
    }

    public static function actionAddLink()
    {
        $this->status = false;
        $this->errors = array();
        $this->message = '';
        $title = 'Add new link';
        $breadCrumb = [
            'Add new link' => '/admin/link-add',
        ];
        $categories = Categories::getCategoriesById($this->userId);

        if (empty($categories)) {
            $this->errors[] = 'You need to create category! <a href="/admin/category-add">Do it!</a>';
        }
        if (isset($_POST['Add'])) {
            if (isset($_POST['categories']) && $_POST['categories'] == 'select') {
                $this->errors[] = 'You need to choose one of category from list!</a>';
            }

            if (isset($_POST['name']) == false || empty($_POST['name'])) {
                $this->errors[] = 'You need to type name!';
            }

            if (isset($_POST['link']) == false || empty($_POST['link'])) {
                $this->errors[] = 'You need to type link!';
            }

            if (empty($this->errors)) {
                if (!Links::add($_POST['name'], $_POST['link'], $_POST['categories'])) {
                    $this->errors[] = 'Request is bad! Try in another time';
                } else {
                    $this->status = true;
                    $this->message = 'Link ' . $_POST['name'] . ' added successfully!';
                }
            }
        }
        include_once ROOT . '/views/templates/admin/link-add.php';
        return true;
    }

    public static function actionCategoryList()
    {
        $this->status = false;
        $this->errors = array();
        $this->message = '';
        $title = 'Categories';
        $breadCrumb = [
            'Cateories' => '/admin/category-list',
        ];
       

        if (isset($_POST['Save'])) {
            $idArray = array();
            $nameArray = array();
            $i=0;
            unset($_POST['Save']);
            foreach ($_POST as $category) {
                $i++;
                if ($i % 2 == 0) {
                    $nameArray[] = $category;
                } else {
                    $idArray[] = $category;
                }
            }
            // for ($i = 0; $i < (count($_POST)-1) / 2; $i++) {
            //     $idArray[] = $_POST['id' . $i];
            //      = $_POST['name' . $i];
            // }
            list($idArray, $nameArray) = Categories::checkId($idArray, $nameArray, $this->userId);
            Categories::updateCategories($idArray, $nameArray, $this->userId);
        }
        $categories = Categories::getCategoriesById($this->userId);
        if (empty($categories)) {
            $this->errors[] = 'You need to create category! <a href="/admin/category-add">Do it!</a>';
        }
        include_once ROOT . '/views/templates/admin/category-list.php';
        return true;
    }
}