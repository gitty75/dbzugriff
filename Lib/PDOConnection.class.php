<?php
namespace Lib;

class PDOConnection{

private $conn;
private $user;
private $password;
private $connectionstring = '';

public function __construct(){

    $this->connectionstring = 'mysql:host=localhost;dbname=classicmodels';
    $this->user = 'root';
    $this->password = '';

    return $this;

}

public function setConnectionString($connectionstring){
    $this->connectionstring = $connectionstring;
}


public function setDbname($dbname){
    $this->dbname = $dbname;
}

public function setUser($user){
    $this->user = $user;
}

public function setPassword($password){
    $this->password = $password;
}

public function getConnection(){

    //$this->conn = new \PDO('mysql:host=localhost;dbname=classicmodels', 'root', '');
    $this->conn = new \PDO($this->connectionstring, $this->user, $this->password);
    return $this->conn;

}

}

?>