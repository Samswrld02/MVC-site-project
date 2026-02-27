<?php


class Authentication {
    private $conn;

    public function __construct($pdoconn) {
        $this->conn = $pdoconn;
    }

    private function compare($loginData) {
        $conn = $this->conn;

        $sql = "SELECT user, password FROM users";

        $stmt = $conn->query($sql);

        $result = $stmt->fetchALL();

        foreach ($result as $userEntry) {
            if ($loginData['username'] == $userEntry['user'] && $loginData['password'] == $userEntry["password"]) {
                return true;
            }
        }

        return false;

    }

    public function verify($loginData) {
        //logic method
        $result = $this->compare($loginData);

        //return result of validation request
        return $result;
    }

}
