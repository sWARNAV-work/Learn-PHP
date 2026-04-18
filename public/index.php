<?php
const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'core/function.php';
spl_autoload_register(function ($class) 
{
    // dd($class);
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});
// require base_path("core/Router.php"); Changing cause Router.php is now a class
$router = new \core\Router();
require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// dd($_SERVER["REQUEST_URI"]);

// $method = $_SERVER["REQUEST_METHOD"]; //Can only differentiate between POST ond GET requests.
$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"]; // Using a hidden input to get the request type.

$router->route($uri, $method);



?>