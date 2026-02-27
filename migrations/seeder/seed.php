<?php 

require_once "../../Database/DatabaseClass.php";
require_once "../factory/factory.config.php";
require_once "../factory/factory.php";

//ammount of test data required
$ammountOfData = $argv[1];

//create connection
$conn = Database::createConnection();


$seed = new Factory("users", $conn);


$seed->seed($fArray, $ammountOfData);
