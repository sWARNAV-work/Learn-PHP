<?php

/* =========================================
   If-else structure
   =========================================
*/
// if($uri === '/')
//     require 'controllers/index.php';
// else if ($uri === "/about")
//     require "controllers/about.phpf";
// else if ($uri === '/contact')
//     require 'controllers/contact.php';

/* =END= */



/* =========================================
   The above in an associative array
   =========================================
*/

// return [
//     '/' => 'controllers/index.php',
//     '/contact' => 'controllers/contact.php',
//     '/about' => 'controllers/about.php',
//     '/notes' => 'controllers/notes/index.php',
//     '/note' => 'controllers/notes/show.php',
//     '/notes/create' => 'controllers/notes/create.php',
// ];
/* =END= */


/* ============================================
   THE ABOVE, REFACTORED using a router object
   ============================================
*/
$router->get("/", "controllers/index.php");
$router->get("/contact", "controllers/contact.php");
$router->get("/about", "controllers/about.php");

$router->get("/notes", "controllers/notes/index.php");
$router->get("/note", "controllers/notes/show.php");
$router->get("/notes/create", "controllers/notes/create.php");
// $router->delete("/note", "controllers/notes/destroy.php");



/* =END= */

?>