<?php

use html\forms\ValLogin;
use core\Authenticator;
use core\Session;

$email = $_POST["email"];
$password = $_POST["password"];

$errors = [];

/* =========================================
   VALIDATING CORRECT EMAIL and password
   =========================================
*/
// Only checking email since password check seems counterintuitive, is what I thought at first.
// Not intuitive, since a wrong input could be used to check a huge DB which slows everything down. Also a hacker could put a 10MB long string which could slow down or overload the server. 

$login = new ValLogin();
if ($login->validate($email, $password))
{
    $auth = new Authenticator;
    $check = $auth->AttemptToLogin($email, $password);

    if ($check)
    {
        $user["email"] = $email;
        $auth->login($user);
        return redirect("/");
    }
    else
    {
        $login->addError("login", "No Email and Password Combination Found.");
    }
}

Session::flash("errors", $login->getErrors());
Session::flash("old", [
    "email" => $email
]);

redirect("/login");




// return view("sessions/login.view.php", [
//     "errors" => $login->getErrors()
// ]);








