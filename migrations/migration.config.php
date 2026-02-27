<?php

//config for migration data -> database schema
$tableData = 
[
    "id int NOT NULL AUTO_INCREMENT PRIMARY KEY",
    "user VARCHAR(255)",
    "password VARCHAR(255)"
];

$table = "users";
