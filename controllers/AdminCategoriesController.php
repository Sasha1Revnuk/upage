<?php
class AdminCategoriesController extends StandartController
{
    public function actionAdd()
    {
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
}