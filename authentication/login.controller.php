<?php
require_once "./Models/authentication/authentication.model.php";

class Login {
    private $conn;
        //validate login using method
        //-->

        public static function authenticationMiddleware() {
            //check if logged in
            if (!isset($_SESSION['user'])) {
                return false;
            }
            return true;
        }

        public function __construct($pdoconn) {
            $this->conn = $pdoconn;
        }

        public function verify() {

            $model = new Authentication($this->conn);

            $loginAuthentic = $model->verify($_POST);
            
            if ($loginAuthentic) {
                $_SESSION['user'] = $_POST['username'];
            } else {
                if (isset($_SESSION['user'])) {
                    unset($_SESSION['user']);
                }
            }
            // echo $loginAuthentic;

            // echo $_SESSION['user'];

            


        }
    
    public function loginform() {
        $location = URLROOT . "/login";

        //generate login form
        // -->
        require_once "./views/login/login.view.php";
    }


       

        //redirect or give access based on result
        //--> using sessions


  
        // $_SESSION['user_id'] = $username;
    
}
