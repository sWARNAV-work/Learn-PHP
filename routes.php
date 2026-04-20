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

$router->get("/notes", "controllers/notes/index.php"); //Showing all notes

$router->get("/note", "controllers/notes/show.php");//Showing a single note
$router->get("/notes/create", "controllers/notes/create.php"); //Creation Page
$router->post("/notes", "controllers/notes/store.php"); //Storing a new note

$router->delete("/note", "controllers/notes/destroy.php"); // Deleting a note
$router->get("/note/edit", "controllers/notes/edit.php"); // Editing a note
$router->patch("/note", "controllers/notes/update.php"); //Updating a note



/* =END= */

?>