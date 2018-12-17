<?php
class Connection
{
    private static $_instance = null;
    private $_connection;
    private function __construct()
    {
        $this->_connection = mysqli_connect("localhost", "u138198197_admin", "ytjcgjhbvbq35790", "u138198197_upage");
        if (!$this->_connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

    }

    private function __clone()
    {

    }
    private function __wakeup()
    {

    }

    public static function getInstance()
    {
        if (self::$_instance != null) {
            return self::$_instance;
        }

        return new self;

    }
    public function get()
    {
        return $this->_connection;

    }

}
