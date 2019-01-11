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
        $title = 'Chagne category color';
        $breadCrumb = [
            'Chagne category color' => '/admin/change-category-text',
        ];
        $styles = Style::getStyles($this->userId);
        if (isset($_POST['set'])) {
            if (isset($_POST['color']) == false || empty($_POST['color'])) {
                $this->errors[] = 'Choose color!';
            }

            if (empty($this->errors)) {
                if (!Style::updateCategoryColor($this->userId, $_POST['color'], $_POST['hcolor'])) {
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

    public static function actionChangeMainTextColor()
    {
        $this->status = false;
        $this->errors = array();
        $this->message = '';
        $title = 'Chagne main text color';
        $styles = Style::getStyles($this->userId);
        $breadCrumb = [
            'Chagne main text color' => '/admin/change-main-text-color',
        ];

        if (isset($_POST['set'])) {
            if (isset($_POST['color']) == false || empty($_POST['color'])) {
                $this->errors[] = 'Choose color!';
            }

            if (empty($this->errors)) {
                if (!Style::updateMainTextColor($this->userId, $_POST['color'])) {
                    $this->errors[] = 'Something wrong! Try another time';
                } else {
                    $this->message = 'You set a new main text color!';
                    $this->status = true;
                }
            }
            
        }

        include_once ROOT . '/views/templates/admin/change-main-text-color.php';
        return true;
    }

    public static function actionChangeAdditionTextColor()
    {
        $this->status = false;
        $this->errors = array();
        $this->message = '';
        $title = 'Chagne addition text color';
        $styles = Style::getStyles($this->userId);
        $breadCrumb = [
            'Chagne addition text color' => '/admin/change-addition-text-color',
        ];
        $colorArr = explode(',', $styles[0]['add_text_col']);
        $range = array_pop($colorArr);
        $color = sprintf("#%02x%02x%02x", $colorArr[0], $colorArr[1], $colorArr[2]);

        if (isset($_POST['set'])) {
            if (isset($_POST['color']) == false || empty($_POST['color'])) {
                $this->errors[] = 'Choose color!';
            }
            if (isset($_POST['range']) == false || empty($_POST['range'])) {
                $this->errors[] = 'Choose range!';
            }

            if (empty($this->errors)) {
                list($r, $g, $b) = sscanf($_POST['color'], "#%02x%02x%02x");
                $colorArr = $r . ', ' . $g .', ' . $b . ', ' . $_POST['range'];
                if (!Style::updateAdditionTextColor($this->userId, $colorArr)) {
                    $this->errors[] = 'Something wrong! Try another time';
                } else {
                    $this->message = 'You set a new addition text color!';
                    $this->status = true;
                }
            }
            
        }
        include_once ROOT . '/views/templates/admin/change-addition-text-color.php';
        return true;
    }

    public static function actionChangeTextBackground()
    {
        $this->status = false;
        $this->errors = array();
        $this->message = '';
        $title = 'Change text background color';
        $styles = Style::getStyles($this->userId);
        $breadCrumb = [
            'Change text background color' => '/admin/change-text-background',
        ];
        if (isset($_POST['set'])) {
            if (isset($_POST['color']) == false || empty($_POST['color'])) {
                $this->errors[] = 'Choose color!';
            }

            if (empty($this->errors)) {
                if (!Style::updateTextBackgroundColor($this->userId, $_POST['color'])) {
                    $this->errors[] = 'Something wrong! Try another time';
                } else {
                    $this->message = 'You set a new text background color!';
                    $this->status = true;
                }
            }
            
        }
        include_once ROOT . '/views/templates/admin/change-text-background.php';
        return true;
    }

    public static function actionChangeFooterTextColor()
    {
        $this->status = false;
        $this->errors = array();
        $this->message = '';
        $title = 'Change footer text color';
        $styles = Style::getStyles($this->userId);
        $breadCrumb = [
            'Change footer text color' => '/admin/change-footer-text-color',
        ];
        if (isset($_POST['set'])) {
            if (isset($_POST['color']) == false || empty($_POST['color'])) {
                $this->errors[] = 'Choose color!';
            }

            if (empty($this->errors)) {
                if (!Style::updateFooterTextColor($this->userId, $_POST['color'])) {
                    $this->errors[] = 'Something wrong! Try another time';
                } else {
                    $this->message = 'You set a new footer text color!';
                    $this->status = true;
                }
            }
            
        }
        include_once ROOT . '/views/templates/admin/change-footer-text-color.php';
        return true;
    }

    public static function actionChangeCtegoryNameColor()
    {
        $this->status = false;
        $this->errors = array();
        $this->message = '';
        $title = 'Change ctegory name color';
        $styles = Style::getStyles($this->userId);
        $breadCrumb = [
            'Change ctegory name color' => '/admin/change-category-name-color',
        ];
        if (isset($_POST['set'])) {
            if (isset($_POST['color']) == false || empty($_POST['color'])) {
                $this->errors[] = 'Choose color!';
            }

            if (empty($this->errors)) {
                if (!Style::updateCtegoryNameColor($this->userId, $_POST['color'])) {
                    $this->errors[] = 'Something wrong! Try another time';
                } else {
                    $this->message = 'You set a new ctegory name color!';
                    $this->status = true;
                }
            }
            
        }
        include_once ROOT . '/views/templates/admin/change-ctegory-name-color.php';
        return true;
    }

    public static function actionStyleReset()
    {
        $this->status = false;
        $this->errors = array();
        $this->message = '';
        $title = 'Style reset';
        $styles = Style::getStyles($this->userId);
        $breadCrumb = [
            'Style reset' => '/admin/style-reset',
        ];
        if (isset($_POST['reset'])) {
            if (!Style::userStyleDel($this->userId)) {
                $this->errors[] = 'Something wrong! Try another time';
            }

            if (!Style::userStyleAdd($this->userId)) {
                $this->errors[] = 'Something wrong! Try another time';
            }
            
            if (empty($this->errors)) {
                $this->message = 'Your style reseted sucessfull';
                $this->status = true;
            }
        }
        include_once ROOT . '/views/templates/admin/style-reset.php';
        return true;
    }
}