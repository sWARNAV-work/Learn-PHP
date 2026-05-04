<?php 

use core\Validator;
use core\Database;
use core\App;
use html\forms\ValLogin;

$db = App::resolve(Database::class);

$errors = [];
$email = $_POST["email"];
$password = $_POST["password"];


// To-Do
// Check whether given input is correct.    DONE.
// ?? Check for conflicting email           DONE.
    // Send Them to the login Page          HALF DONE.
    // else
    // Store them into DB if no conflicts   DONE.
        // Log in using Sessions            HALF DONE. 

/* =========================================
   CHECK INPUTS
   =========================================
*/

$ValLog = new ValLogin();
$test = $ValLog->validate($email, $password); 
if(! $test)
{
    return view("register/register.view.php", [
        "errors" => $ValLog->getErrors(),
    ]);
}





// if(!Validator::email($email)) //Checking for a proper email input
// {
//     $errors["email"] = "I know it is tedious, but we need to have a proper email.";
// }
// if (!Validator::string($password, 7, 255))
// {
//     $errors["password"] = "Enter a Password between 7 and 255 characters.";
// }
// if (!empty($errors))
// {
//     return view("register/register.view.php", [
//         "errors" => $errors,
//     ]);
// }
/* =END= */


/* =========================================
   CHECK CONFLICTING INPUTS
   =========================================
*/
$user = $db->query("SELECT * FROM users WHERE email = :email", [
    "email" => $email,
])->find();

if ($user)
{
//     $_SESSION["user"] = [    //Logging in Logic
//     "email" => $email
// ];
    $errors["login"] = "You are already registered with us, Please Log in.";
    return view("sessions/login.view.php", [
        "errors" => $errors
    ]);// Goto Login Page.
    exit();
}
/* =END= */


/* =========================================
   INSERTING INTO DB
   =========================================
*/
$db->query("INSERT INTO users (email, password) VALUES (:email, :password)", [
    "email" => $email,
    "password" => password_hash($password, PASSWORD_BCRYPT)
]);
/* =END= */


/* =========================================
   LOGGING IN USER
   =========================================
*/
login([
    "email" => $email
]);
header("location: /");
exit();
