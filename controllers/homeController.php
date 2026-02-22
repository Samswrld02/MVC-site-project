<?php
require_once "./Models/baseModel.php";
require_once "./Models/seriesModel.php";
require_once "./Models/moviesModel.php";

class HomeController {
    private  $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    protected function turnToClass($resource) {
        return ucfirst($resource);
    }

    public function get() {

        $model = new Series($this->conn);
        $arraySeries = $model->get('series');

        $modelM = new Movie($this->conn);
        $arrayMovies = $modelM->get("movie");

    

        


        //put data into the view and show view
        require "./views/home.view.php";
    }

    private function checkSubData($resource, $id) {
        $allowedResources = ["movie", "series"];

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

    public function sort($resource, $column, $dir) {
        //make new query using order by
        $className = $this->turnToClass($resource);
        
        
        $model = new $className($this->conn);
        
        if ($resource != "series") {
            $arrayMovies = $model->order($resource, $column, $dir);
            $model2 = new Series($this->conn);
            $arraySeries = $model2->get("series");

            
        } else {
            $model2 = new Movie($this->conn);
            $arraySeries = $model->order($resource, $column, $dir);
            $arrayMovies =$model2->get("movie");
        }
        
        
        require_once "./views/home.view.php";
        // exit;
    }
    
}

$databaseArray = [["title" => "test", "rating" => 1] ,["title" => "the good place", "rating" => 4.5]];

