<?php

namespace App\Model\Database;
class Database{

    public $conn;

    protected function __construct()
    {
        $this->conn = new \mysqli("localhost","root","","tourism");
    }
}
