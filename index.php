

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dbzugriff</title>
</head>
<body>
<h1>DB-Zugriff</h1>


<?php

require 'Lib/Statement.class.php';
require 'Lib/PDOConnection.class.php';
require 'Lib/Logger.class.php';

$objCon = new Lib\PDOConnection;
$pdoConn = $objCon->getConnection();

//$pdoConn = new PDO('mysql:host=localhost;dbname=classicmodels', 'root', '');
$objStmt = New Lib\Statement($pdoConn);
$objStmt->setStatement("SELECT * FROM customers WHERE contactLastName=:lastName OR contactFirstName=:firstName")
->addParam(":lastName", "Nelson", PDO::PARAM_STR)
->addParam(":firstName", "Peter", PDO::PARAM_STR)
->execute();
echo '<br>';
$objStmt->resetParam()
->addParam(":lastName", "Furgerson", PDO::PARAM_STR)
->addParam(":firstName", "Martin", PDO::PARAM_STR)
->execute();
echo '<br>';
$objStmt->resetParam()->setStatement("SELECT * FROM customers")->execute();
;



try{
    $objLogger = New Lib\Logger("C:\Users\SchaeferC\logg.txt");
    $objLogger->log("Das ist meine erste Meldung!");
    $objLogger->log("Das ist meine zweite Meldung!");
    $objLogger->log("Das ist meine dritte Meldung!");
    $objLogger->log("Das ist meine vierte Meldung!");

}
catch(Exception $e){ 
    echo $e->getMessage();
}


?>

</body>
</html>