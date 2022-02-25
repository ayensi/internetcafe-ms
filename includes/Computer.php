<?php

class Computer
{
    public function __construct()
    {
        require_once('Connection.php');

    }

    public function get()
    {
        $conn = new Connection();
        $result = $conn->mysqli->query('SELECT * FROM computers');
        return $result;
    }
    public function update($id){
        $conn = new Connection();
        $conn->mysqli->query('UPDATE computers SET status = "'.$_SESSION['status'.$id].'" WHERE id = "'.$id.'" ');
    }
}