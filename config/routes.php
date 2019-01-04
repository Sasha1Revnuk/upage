<?php
return array(
    // 'categorys/([0-9]+)' => 'categorys/view',
     //,
    //'categories/edit/([0-9]+)' => 'categories/edit/$1',
    'registration' => 'user/registration',
    'login' => 'user/login',
    'logout' => 'user/logout',
    'recovery' => 'user/recovery',
    'admin/main' => 'admin/main',
    'admin/category-add' =>'adminCategories/add',
    'admin/link-add' =>'adminCategories/addLink',
    'admin/category-list' => 'adminCategories/categoryList',
    'admin/category-list/([a-z]+)/([0-9]+)' => 'adminCategories/categoryList/$1/$2',
    'admin/category-list/([a-z]+)/([0-9]+)/([a-z]+)' => 'adminCategories/categoryList/$1/$2/$3',
    'admin/category/edit/([0-9]+)' => 'adminCategories/edit/$1',
    'admin/category/edit/([0-9]+)/([a-z]+)/([0-9]+)' => 'adminCategories/delete/$1/$2/$3',
    'admin/category/edit/([0-9]+)/([a-z]+)/([0-9]+)/([a-z]+)' => 'adminCategories/delete/$1/$2/$3/$4',
    '' => 'site/index'
);
