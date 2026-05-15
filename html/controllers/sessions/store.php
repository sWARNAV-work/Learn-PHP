<?php

use html\forms\ValLogin;
use core\Authenticator;
use core\Session;
use core\ValidationExceptions;

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


try
{
    $login = ValLogin::validate($attributes);
}
catch (ValidationExceptions $exception)
{
    Session::flash("errors", $exception->errors);
    Session::flash("old", [
        "email" => $exception->old
    ]);

    redirect("/login");
}

$auth = new Authenticator;
$check = $auth->AttemptToLogin($attributes["email"], $attributes["password"]);

if ($check)
{
    $user["email"] = $attributes["email"];
    $auth->login($user);
    return redirect("/");
}
else
{
    $login->addError("login", "No Email and Password Combination Found.");
}













