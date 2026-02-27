<?php
session_start();

require_once "./Router/routerController.php";
require_once "./Router/config.php";
require_once "./authentication/login.controller.php";
// require_once "./Models/seriesModel.php";

// login::authenticationMiddleware();

//load in view
require_once "./views/components/BasicViewLayout/header.php";
//handle the request

$routeData = $request->handleRequest();

// $controller->$method("series", $param);
require_once "./views/components/BasicViewLayout/footer.php";


