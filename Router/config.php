<?php

//initialise db connection
$conn = Database::createConnection();

define('URLROOT', '/mvc--style');
$request = new Router($conn);

//define routes
Router::route("GET", "/", ["homecontroller" => "get"]);
Router::route("GET", "/details/{resource}/{id}", ["homecontroller" => "details"]);
Router::route("GET", "/details/movie/{id}", ["homecontroller" => "details"]);
Router::route("GET", "/sort/{resource}/{column}/{dir}", ["homecontroller" => "sort"]);
Router::route("GET", "/edit/{resource}/{id}", ["editcontroller" => "show"]);
Router::route("POST", "/update/{resource}/{id}", ["editcontroller" => "update"]);

