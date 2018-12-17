<?php

//include_once ROOT . '/models/Categories.php';
class CategoriesController
{
    public function actionIndex()
    {
        $categoriesList = array();
        //модель
        $categoriesList = Categories::getCategoriesList();
        //вид
        require_once ROOT . '/views/categories/index.php';
        return true;

    }

    public function actionEdit($id)
    {
        $category = Categories::editCategoryById($id);
        echo $category;
        return true;

    }

}
