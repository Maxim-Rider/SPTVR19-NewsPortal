<?php

class datebase {
    private $conn;
    private $host;
    private $user;
    private $password;
    private $baseName;

    function __construct() {
        $this -> host = 'localhost';
        $this -> user = 'root';
        $this -> password = '';
        $this -> baseName = 'newsportal';
        $this -> connect();
    }

    function __desctruct() {
        $this -> disconnect();
    }

    function connect() {
        if (!$this -> conn) {
            try {
                $this -> conn = new PDO('mysql:host='.$this->host.';
                                        dbname='.$this->baseName.'', 
                                        $this->user, 
                                        $this->password, 
                                        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            } catch (Exception $e) {
                die('Connection failed: ' . $e -> getMessage());
            }
            return $this -> conn;
        }
    }

    function disconnect() {
        if ($this -> conn) {
            $this -> conn = null;
        }
    }

    function getOne($query) {
        $stmt = $this -> conn -> prepare($query);
        $stmt -> execute();
        $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $response = $stmt -> fetch();
        return $response;
    }

    function getAll($query) {
        $stmt = $this -> conn -> prepare($query);
        $stmt -> execute();
        $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $response = $stmt -> fetchAll();
        return $response;
    }

    function executeRun($query) {
        $response = $this -> conn -> exec($query);
        return $response;
    }
}

?> 