<?php

include_once("./migrations/migration.class.php");
include_once("./Database/DatabaseClass.php");

$tableData = 
[
    "id int NOT NULL AUTO_INCREMENT PRIMARY KEY",
    "user VARCHAR(255)",
    "password VARCHAR(255)"
];

//retrieve connection
$conn1 = Database::createConnection();
$migration = new Migration($conn1, "USERS", $tableData);
$migration->migrate();


