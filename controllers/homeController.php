<?php
require_once "./Models/baseModel.php";
require_once "./Models/seriesModel.php";
require_once "./Models/moviesModel.php";


$test = "hello lmao";

class HomeController {
    private  $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    private function turnToClass($resource) {
        return ucfirst($resource);
    }

    public function get() {
        echo "workss";
        // exit;
        

         $model = new Series($this->conn);
        $arraySeries = $model->get('series');

         $modelM = new Movies($this->conn);
        $arrayMovies = $modelM->get("movies");


        //put data into the view and show view
        require "./views/home.view.php";
    }

    private function checkSubData($resource, $id) {
        $allowedResources = ["movies", "series"];

        if (!in_array($resource, $allowedResources)) {
            return 0;
        } else return 1;
    }

    //NOTE!: test method for description view
    public function details($resource, $id) {
        //check if id or resource was provided
        $check = $this->checkSubData($resource, $id);

        if (!$check) {
            header("Location: home");
        }

        $className = $this->turnToClass($resource);
        // var_dump($className);
        $model = new $className($this->conn);
        
        
        $descriptionArray = $model->ById($resource, $id);
        
        //require description view
        require "./views/description.view.php";
    }
    
}

$databaseArray = [["title" => "test", "rating" => 1] ,["title" => "the good place", "rating" => 4.5]];

