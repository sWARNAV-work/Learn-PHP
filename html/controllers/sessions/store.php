<?php

use html\forms\ValLogin;
use core\Authenticator;


// $email = $_POST["email"];
// $password = $_POST["password"];
$attributes = [
    "email" => $_POST["email"],
    "password" => $_POST["password"]
];

$errors = [];

/* =========================================
   VALIDATING CORRECT EMAIL and password
   =========================================
*/
// Only checking email since password check seems counterintuitive, is what I thought at first.
// Not intuitive, since a wrong input could be used to check a huge DB which slows everything down. Also a hacker could put a 10MB long string which could slow down or overload the server. 



$login = ValLogin::validate($attributes);


$auth = new Authenticator;
$check = $auth->AttemptToLogin($attributes["email"], $attributes["password"]);

if (!$check)
{
    $login->addError("login", "No Email and Password Combination Found-Ah!.")->throw();
}
else
{
    return redirect("/");
}













