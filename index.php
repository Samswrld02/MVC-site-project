<?php

require_once "./Router/routerController.php";
require_once "./Router/config.php";
// require_once "./Models/seriesModel.php";


//inject dependancy into class
$test = new Router($conn);
//check if route exists

$request = $test->handleRequest();

if ($request) {
    
    $routeData = $request;
    // var_dump($routeData["sub"]);

    $controller = $routeData["route"]["controller"];
    $method = $routeData["route"]["method"];
    $id = $routeData["sub"]["id"] ?? null;
    $resource = $routeData["sub"]["resource"] ?? null;

    //header
    require_once "./views/components/BasicViewLayout/header.php";
    $controller->$method($resource, $id);
    require_once "./views/components/BasicViewLayout/footer.php";
}

