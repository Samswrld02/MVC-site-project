<?php
require_once "./controllers/homeController.php";
require_once "./Models/baseModel.php";
require_once "./Models/seriesModel.php";
require_once "./Models/moviesModel.php";

class EditController extends HomeController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    //display editing view
    public function show($resource, $id) {
        //call method for extracting form data  
        $model = $this->turnToClass($resource);
        $model = new $model($this->conn);
        
        //get form data and display based on array keys
        $results = $model->display($resource, $id);

        //display form view
        require_once "./views/edit.view.php";

        exit;
    }

    //method for updating data in database
    public function update($resource, $id) {
        // var_dump($_POST);

        //call model for update
        $model = $this->turnToClass($resource);
        $model = new $model($this->conn);

        $message = $model->update($resource, $_POST, $id);
        echo $message['result'];
        header("Location: /mvc--style/");
    }
}
