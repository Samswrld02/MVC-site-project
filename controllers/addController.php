<?php 
require_once "./controllers/homeController.php";
require_once "./Models/baseModel.php";
require_once "./Models/seriesModel.php";
require_once "./Models/moviesModel.php";

class AddController extends HomeController {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function show() {
        //call model for dynamic form creation
        $model = $this->turnToClass("series");
        $model = new $model($this->conn);
        $results = $model->showAddForm("series");
        //display form view
        require_once "./views/add.view.php";
    }

    public function add() {
        $resource = $_POST['media'];
        $_POST;
        echo $resource;
        

        //run model for adding entry
        $model = $this->turnToClass($resource);
        $model = new $model($this->conn);

        $model->add($resource, $_POST);

        $location = URLROOT;
        header("Location: $location");
        exit;
    }
        
    
}
