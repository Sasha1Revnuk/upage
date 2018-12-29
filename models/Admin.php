<?php
class Admin
{
    private static function errors($errors)
    {

        foreach($errors as $error) {
            echo '<div class="alert alert-danger">
                <strong>Warning! </strong>' . $error . '</div>';
        }
    }

    private static function successfull($status, $message)
    {


        echo '<div class="alert alert-success">' . $message .'</div>';


    }

    public static function progress($errors, $status, $message) {
        if (!empty($errors)) {
            Admin::errors($errors);
        }
        
        if ($status == true) {
            Admin::successfull($status, $message);
        }
    }
}