<?php
// dd("reached!"
use core\Database;
use core\App;
use html\forms\ValLogin;

$db = App::resolve(Database::class);

$email = $_POST["email"];
$password = $_POST["password"];

$errors = [];
//Validate Email is correctly entered. 
//Check Into Database

/* =========================================
   VALIDATING CORRECT EMAIL format
   =========================================
*/
// Only checking email since password check seems counterintuitive. 
$login = new ValLogin();
if( !$login->validate($email, $password))
{
    return view("sessions/login.view.php", [
        "errors" => $login->getErrors()
    ]);
}
/* =END= */

/* =========================================
   Checking into Database
   =========================================
*/
$check = $db->query("SELECT * FROM users WHERE email = :email", [
    "email" => $email,
])->find();

if ($check)
{
    if (password_verify($password, $check["password"]))
    {
        login([
            "email" => $check["email"]
        ]);
        header("location: /");
        exit();
    }

}

$errors["login"] = "Incorrect email and password combination";

return view("sessions/login.view.php", [
    "errors" => $errors,
]);

