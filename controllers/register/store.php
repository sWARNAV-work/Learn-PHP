<?php 

use core\Validator;
use core\Database;

$errors = [];
$email = $_POST["email"];
$password = $_POST["password"];


// To-Do
// Check whether given input is correct.
// ?? Check for conflicting inputs
    // Store them into DB if no conflicts
    // else
    // Send Them to the login Page


/* =========================================
   CHECK INPUTS
   =========================================
*/
if(!Validator::email($email))
{
    $errors["email"] = "Please enter a proper email";
    view("register/register.view.php", [
        "errors" => $errors,
    ]);
    die();
}