<?php

class Factory {
    private $table;
    private $conn;
    public function __construct($table, $conn) {
        $this->table = $table;
        $this->conn = $conn;
    }

    public function seed($factoryArray, $times) {
        $conn = $this->conn;
        echo "Starting seed \n";
        $insertKeys = [];
        $insertValues = [];
        foreach ($factoryArray as $key => $value) {
            array_push($insertKeys, $key);
            array_push($insertValues, "$value");
        }
        $insertKeyStmt = implode(", ", $insertKeys);
        $insertValueStmt = implode(", ", $insertValues);

        // echo $insertValueStmt;
        // exit;

        $results = preg_replace("#{([^}]+)}#", "'$1'", $insertValueStmt );

        $sql = "INSERT INTO $this->table ($insertKeyStmt) VALUES ($results);";
        echo $sql;
        
        

        for ($x = 0; $x < $times; $x++) {
            $stmt = $conn->query($sql);
        }

        if ($stmt) {
            echo "succes!";
        } else {
            "seed failed!";
        }
    }
}
