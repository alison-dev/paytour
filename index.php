<?php

//INITIAL SESSION
ob_start();

//REQUIRIMENTS
require __DIR__ . "/vendor/autoload.php";
require __DIR__ . "/source/autoload.php";

//CLASS
use Source\Core\Session;
use CoffeeCode\Router\Router;

//INSTANCE
$session = new Session();
$route = new Router(url(), ":");

/**
 * WEB ROUTES
 */
$route->namespace("Source\App");
$route->get("/", "Web:home");
$route->post("/cadastrar", "Web:register");

/**
 * ROUTE
 */
$route->dispatch();

/**
 * ERROR REDIRECT
 */
if($route->error())
{
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();

