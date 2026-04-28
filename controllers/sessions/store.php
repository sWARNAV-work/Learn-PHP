<?php 
// dd("reached!");
use core\Database;
use core\App;
use core\Validator;

$db = App::resolve(Database::class);

$email = $_POST["email"];
$password = $_POST["password"];

$errors = [];
//Validate Email is correctly entered. 
//Check Into Database

/* =========================================
   VALIDATING CORRECT EMAIL PATTERN
   =========================================
*/
if (! Validator::email($email))
{
    $errors["email"] = "Enter a Valid Email.";
}
if( $errors ?? false)
{
    return view("sessions/login.view.php", [
        "errors" => $errors,
    ]);
}
/* =END= */

/* =========================================
   Checking into Database
   =========================================
*/
$check = $db->query("SELECT * FROM users WHERE email = :email AND password = :password", [
    "email" => $email,
    "password" => $password,
])->find();
if($check)
{
    login([
        "email" => $check["email"]
    ]);
    header("location: /");
} 
else 
{
    $errors[$email]= "Incorrect email and password combination";
    $errors[$password]= "Incorrect email and password combination";

    return view("sessions/login.view.php", [
        "errors" => $errors,
    ]);
}
