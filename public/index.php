<?php
use core\ValidationExceptions;
use core\Session;
const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'core/function.php';

require base_path("vendor/autoload.php");

if ($_SERVER['SERVER_NAME'] === 'localhost') {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}

session_start();



//The service Container
require base_path("Bootstrap.php");





// require base_path("core/Router.php"); Changing cause Router.php is now a class
$router = new \core\Router();
require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// dd($_SERVER["REQUEST_URI"]);

// $method = $_SERVER["REQUEST_METHOD"]; //Can only differentiate between POST ond GET requests.
$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"]; // Using a hidden input to get the request type.

try
{
    $router->route($uri, $method);
}
catch (ValidationExceptions $exception)
{
    Session::flash("errors", $exception->errors);
    Session::flash("old", [
        "email" => $exception->old
    ]);

    // dd($_SERVER["HTTP_REFERER"]);
    return redirect($router->previousUrl());
}


Session::unflash();

?>