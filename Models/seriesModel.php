<?php

class Series {
    private $conn;

public function __construct($conn) {
    $this->conn = $conn;
}
    
    public function get() {
        try {
        $conn = $this->conn;
        $sql = "SELECT * FROM series";

        $stmt = $conn->query($sql);
        $result = $stmt->fetchALL();
        
        return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function ById($id) {
        $conn = $this->conn;
        $id = intval($id);
    

        $sql = "SELECT * FROM  series WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->execute(["id"=>$id]);
        $result = $stmt->fetchALL();

        return $result;
    }
}
