<?php

include_once("migration.class.php");
include_once("../Database/DatabaseClass.php");
include_once("migration.config.php");


//retrieve connection
$conn1 = Database::createConnection();
$migration = new Migration($conn1, $table, $tableData);
$migration->migrate();


