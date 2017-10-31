<?php
namespace Lib;

class Statement{

private $prm = [];
private $sql;
private $useConnection;


public function __construct($connection){

    if(gettype($connection)){
    $this->useConnection = $connection;
    return $this;
}
else
{
   return false;
}
}

public function setStatement(string $parsql) {

$this->sql = $parsql;

return $this;

}

public function addParam($prm_name, $prm_value, $prm_datatype){

$this->prm[] = [$prm_name, $prm_value, $prm_datatype];

return $this;
}

public function resetParam(){
    $this->prm = [];
    return $this;
}

public function useConnection($connection){

if(gettype($connection)){
    $this->useConnection = $connection;
    return $this;
}
else
{
   return false;
}

}

public function __toString(){

//echo '<pre>';
//echo $this->sql;
//echo '</pre>';

}

public function execute(){

    $stmt = $this->useConnection->prepare($this->sql);
    

    foreach($this->prm As $parameter){
        $stmt->bindParam($parameter[0], $parameter[1], $parameter[2]);
    }
    //$stmt->bindParam(':lastName', $lastName);
    //$stmt->bindParam(':firstName', $firstName);


    $row = $stmt->execute();

    while($row = $stmt->fetch()){
        //echo '<pre>';
        //print_r($row);
        echo $row['customerName'] . ' / ' . $row['contactFirstName']. ' ' . $row['contactLastName'] . '<br>';
        //echo '</pre>';
    }
}

}


?>