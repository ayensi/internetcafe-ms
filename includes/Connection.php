<?php

class Connection
{

    public $mysqli;

    public function __construct()
    {
        $db_username = 'root';
        $db_password = '';
        $db_name = 'internet_cafe';
        $db_host = 'localhost';
        $this->mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
    }
}