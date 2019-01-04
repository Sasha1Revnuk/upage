<?php
class StandartController
{
    public $userId;
    public $status;
    public $message;
    public $errors;

    public function __construct()
    {
        $this->userId = User::getId($_COOKIE['Email']);
        $this->status = false;
        $this->message = '';
        $this->errors = array();

    }
}
