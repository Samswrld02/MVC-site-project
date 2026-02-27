<?php
require_once "./controllers/homeController.php";
require_once "./Models/baseModel.php";
require_once "./Models/seriesModel.php";
require_once "./Models/moviesModel.php";
require_once "./authentication/login.controller.php";

class EditController extends HomeController {

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

        //call model for update
        $model = $this->turnToClass($resource);
        $model = new $model($this->conn);

        $message = $model->update($resource, $_POST, $id);
        //session variable for update message
        $location = URLROOT;
        header("Location: $location/home");
    }
}
