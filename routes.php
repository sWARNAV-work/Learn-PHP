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
   THE ABOVE, REFACTORED using a router class object
   ============================================
*/
$router->get("/", "/index.php");
$router->get("/contact", "/contact.php");
$router->get("/about", "/about.php");

$router->get("/notes", "/notes/index.php")->user_type("authenticated"); //Showing all notes

$router->get("/note", "/notes/show.php");//Showing a single note
$router->get("/notes/create", "/notes/create.php"); //Creation Page
$router->post("/notes", "/notes/store.php"); //Storing a new note

$router->delete("/note", "/notes/destroy.php"); // Deleting a note
$router->get("/note/edit", "/notes/edit.php"); // Editing a note
$router->patch("/note", "/notes/update.php"); //Updating a note

$router->get("/register", "/register/create.php")->user_type("guest"); //Register Page
$router->post("/register", "/register/store.php"); // Store User 

$router->get("/login", "/sessions/create.php")->user_type("guest"); //Login Page
$router->post("/login", "/sessions/store.php")->user_type("guest"); //Logging in the user

$router->delete("/logout", "/sessions/destroy.php")->user_type("authenticated");

/* =END= */