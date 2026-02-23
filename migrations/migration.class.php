<?php

//main migration class to be extended
class Migration {
    private $tableName;
    private $conn;
    private $data;


    public function __construct($PDO ,$tableName, $configData) {
        $this->tableName = $tableName;
        $this->conn = $PDO;
        $this->data =  $configData;
    }

    public function configTable() {
        return $this->data;
    }

    public function migrate() {
        
        $columns = $this->configTable();
        //start creation of table/migration
        $conn = $this->conn;
        $table = $this->tableName;

        echo "start migration";
        echo PHP_EOL . "migration for table: $table";

        //deconstruct columns array for dynamic sql statement
        $substatement = implode(", ", $columns);
        
        //do check if table exists
        $sqlDropTable = "DROP TABLE IF EXISTS $table";
        $stmt = $conn->prepare($sqlDropTable);
        $stmt->execute();

        $sql = "CREATE TABLE $table ($substatement);";

        $stmt = $conn->prepare($sql);

        if ($stmt->execute()) {
            echo PHP_EOL . "migration succes";
        } else {
            echo "migration failed";
        };
    }
}
