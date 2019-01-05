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
            //echo $_POST['name'];
            $categories = Categories::getCategoriesById($this->userId);
            //var_dump($categories);
            if (isset($_POST['name']) == false || empty($_POST['name'])) {
                $this->errors[] = 'Name is empty. Try typing name please!';
            }
            foreach($categories as $category){
                //var_dump($category);
                if (in_array($_POST['name'], $category)) {
                    $this->errors[] = 'This is category is using! Type another name.';
                    break; 
                }
                
            }
            if (empty($this->errors)) {
                if (!Categories::add($_POST['name'], $this->userId)) {
                    $this->errors[] = 'Something is bad! Try in another time';
                }
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
                if (!Links::add($_POST['name'], $_POST['link'], $_POST['categories'], $this->userId)) {
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

    public static function actionCategoryList($action=null, $id=null, $status=null)
    {
        $this->status = false;
        $this->errors = array();
        $this->message = '';
        $title = 'Categories';
        $breadCrumb = [
            'Categories' => '/admin/category-list',
        ];

        if($action == 'delete' && $status == null) {
            $categoryName = Categories::getNameById($id);
            echo '<script> 
            var r=confirm(\'Do you want to delete category ' . $categoryName .' ?\');
            if(r){
                document.location.href = \'/admin/category-list/delete/' . $id . '/ok\';
            } else {
                document.location.href = \'/admin/category-list\';
            }
                </script>';
            
        } else if ($action == 'delete' && $status == 'ok') {
            $categoryName = Categories::getNameById($id);
            Categories::delete($id, $categoryName, $this->userId);
            header('Location: /admin/category-list');
        }
        $categories = Categories::getCategoriesById($this->userId);
        if (empty($categories)) {
            $this->errors[] = 'You need to create category! <a href="/admin/category-add">Do it!</a>';
        }
        if (isset($_POST['Save']) && !empty($categories)) {
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

            list($idArray, $nameArray) = Categories::checkId($idArray, $nameArray, $this->userId);
            Categories::updateCategories($idArray, $nameArray, $this->userId);
            header('Location: /admin/category-list');
        }
        
        include_once ROOT . '/views/templates/admin/category-list.php';
        return true;
    }

    public static function actionDelete($id)
    {
        $this->status = false;
        $this->errors = array();
        $this->message = '';
        $title = 'Categories';
        $breadCrumb = [
            'Cateories' => '/admin/category-list',
        ];
      
        include_once ROOT . '/views/templates/admin/category-list.php';
        return true;
    }

    public static function actionEdit($id, $action=null, $linkId=null, $status=null)
    {
        $this->status = false;
        $this->errors = array();
        $this->message = '';
        $categoryName = Categories::getNameById($id);
        $title = $categoryName;
        $breadCrumb = [
            'Categories' => '/admin/category-list',
            $categoryName => '',
        ];

        if($action == 'delete' && $status == null) {
            $linkName = Links::getNameById($linkId);
            echo '<script> 
            var r=confirm(\'Do you want to delete link ' . $linkName .' in category ' . $categoryName . '?\');
            if(r){
                document.location.href = \'/admin/category/edit/' .$id . '/delete/' . $linkId . '/ok\';
            } else {
                document.location.href = \'/admin/category/edit/' . $id . '\';
            }
                </script>';
            
        } else if ($action == 'delete' && $status == 'ok') {
            Links::delete($linkId);
            header('Location: /admin/category/edit/' . $id);
        }

        $links = Links::getLinksByCategoryName($categoryName, $this->userId);
        if (empty($links)) {
            $this->errors[] = 'You need to create links! <a href="/admin/link-add">Do it!</a>';
        }
        if (isset($_POST['Save']) && !empty($links)) {
            $idArray = array();
            $nameArray = array();
            $linkArray = array();
            $categoryNameArray = array();
            $userIdArray = array();
            $i=0;
            unset($_POST['Save']);
            foreach ($_POST as $link) {
                $i++;
                if ($i == 1) {
                    $idArray[] = $link;
                } else if ($i == 2) {
                    $nameArray[] = $link;
                } else if ($i == 3) {
                    $linkArray[] = $link;

                } else if ($i == 4) {
                    $categoryNameArray[] = $link;
                } else if ($i == 5) {
                    $userIdArray[] = $link;
                    $i = 0;
                }
            }

            //list($idArray, $nameArray, $linkArray, $categoryNameArray,  $userIdArray) = Links::checkId($idArray, $nameArray, $linkArray, $categoryNameArray,  $userIdArray);
            Links::updateLinks($idArray,$nameArray, $linkArray, $categoryNameArray,  $userIdArray);
            header('Location: /admin/category/edit/' . $id);
        }

        include_once ROOT . '/views/templates/admin/category-edit.php';
        return true;
    }
}
