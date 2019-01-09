<?php
class StyleController extends StandartController
{
    public static function actionChangeBackground()
    {
        $this->status = false;
        $this->errors = array();
        $this->message = '';
        $title = 'Background';
        $breadCrumb = [
            'Background' => '/admin/change-background',
        ];

        //print_r($_FILES);
        if(isset($_POST['deleteBg'])) {
            if (!Style::deleteBg($_POST['setCustomBackground'], $_COOKIE['Email'])) {
                $this->errors[] = 'File not exsist!';
                $this->status = false;
            } else {
                $this->status = true;
                $this->message = 'Image deleted!';
            }
        }
        if (isset($_FILES['file'])) {
            
            $check = Style::can_upload($_FILES['file']);
            if($check === true){
                // загружаем изображение на сервер
                Style::make_upload($_FILES['file'], $_COOKIE['Email']);
                header('Location: /admin/change-background');
            } else {
                $this->errors[] = $check;
                $this->status = false;
            }

        }

        if (isset($_POST['setStandartBackground'])) {
           if(!Style::updateBackground($this->userId, $_POST['setStandartBackground'])) {
               $errors[] = 'Something wrong';
           } else {
               $this->status = true;
               $this->message = 'Your background was updated successfully!';
           }
        }
        include_once ROOT . '/views/templates/admin/change-background.php';
        return true;
    }

    public static function actionChagneCategoryColor()
    {
        $this->status = false;
        $this->errors = array();
        $this->message = '';
        $title = 'Background';
        $breadCrumb = [
            'Chagne category color' => '/admin/change-category-text',
        ];
        $styles = Style::getStyles($this->userId);
        if (isset($_POST['set'])) {
            if (isset($_POST['color']) == false || empty($_POST['color'])) {
                $this->errors[] = 'Choose color!';
            }

            if (empty($this->errors)) {
                if (!Style::updateCategoryColor($this->userId, $_POST['color'])) {
                    $this->errors[] = 'Something wrong! Try another time';
                } else {
                    $this->message = 'You set a new categories color!';
                    $this->status = true;
                }
            }
            
        }
        include_once ROOT . '/views/templates/admin/change-category-text.php';
        return true;
    }
}