<?php 

use core\Authenticator;
use core\Database;
use core\App;
use html\forms\ValRegister;
use core\Session;

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

$ValLog = new ValRegister();
$test = $ValLog->validate($email, $password); 
if(! $test)
{
    return view("register/register.view.php", [
        "errors" => $ValLog->getErrors(),
    ]);
}
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
    Session::flash("errors", $errors);
    redirect("/login");                                     //Properly calling login class

    
    // return view("sessions/login.view.php", [             //Just calling the view of login class
    //     "errors" => $errors
    // ]);
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
(new Authenticator)->login([
    "email" => $email
]);
header("location: /");
exit();
