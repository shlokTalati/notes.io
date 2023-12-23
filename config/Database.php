<?php

class Database{
    private $host = "localhost";
    private $username="root";
    private $pass="";
    private $database="notes.io";
    protected $connection;

    function __construct()
    {
        $this->connection =  mysqli_connect($this->host, $this->username, $this->pass, $this->database);
    }
    
}

