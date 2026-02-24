<?php

require_once "./Database/DatabaseClass.php";
require_once "./controllers/homeController.php";
require_once "./controllers/editController.php";
require_once "./controllers/addController.php";
require_once "./authentication/authentication.controller.php";
// require_once "./Router/config.php";

class Router {
    private static $postRoutes;
    private static $getRoutes;
    private $conn;
    private $matches = [];
    public function __construct($conn) {
        $this->conn = $conn;
        self::$postRoutes = [];
        self::$getRoutes = [];
    }

    private static function assocPush($array, $key, $value) {
        $array[$key] = $value;
        return $array;
    }

    private function match($route, $routeArray) {
        if (array_key_exists($route, $routeArray)) {
            return $routeArray[$route];
        }

        //regex matching for wildcard
        foreach ($routeArray as $droute => $controllerdata) {
            $pattern = preg_replace('/\{[a-zA-Z0-9]+\}/', '([^/]+)', $droute);
            $fpattern = "#^" . $pattern . "$#";

            if (preg_match($fpattern, $route, $matches)) {
                //put data into returned array
                array_shift($matches);
                $this->matches = $matches;

                return $controllerdata;
            }
        }

        //redirect to home page or login page //redirect to home page or login page
        $location = URLROOT;
        header("Location: $location");
        exit;
    }

    //route instatiating 

    public static function route($method, $route, $arrayControllerMethod) {
        //map route to controller + method
        // $routeMap = $route => $arrayControllerMethod;
        switch($method) {
            case "POST":
                self::$postRoutes = self::assocPush(self::$postRoutes, $route, $arrayControllerMethod);
                break;
            case "GET":
                self::$getRoutes = self::assocPush(self::$getRoutes, $route, $arrayControllerMethod);
                break;
        }  
    }



    public function handleRequest() {
        //get the route 
        $route = $_SERVER['PATH_INFO'] ?? "/";
        // echo $route;
       
        //match route

        switch ($_SERVER['REQUEST_METHOD']) {
            case "POST" :
                $routeData = $this->match($route, self::$postRoutes);
                foreach ($routeData as $controller => $method) {
                    $controller = new $controller($this->conn);
                    $method = $method;
                    call_user_func_array([$controller, $method], $this->matches);
                    
                }

                break;
            case "GET": 
                $routeData = $this->match($route, self::$getRoutes);
                foreach ($routeData as $controller => $method) {
                    $controller = new $controller($this->conn);
                    $method = $method ?? null;
                    call_user_func_array([$controller, $method], $this->matches);
                }
                break;
        }
        
        

        // }
    }

    public function getRoute() {
        var_dump(self::$getRoutes);
    }

}

