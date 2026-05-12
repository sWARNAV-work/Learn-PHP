<?php 
use core\Session;

view("sessions/login.view.php", [
    "errors" => Session::get("errors")
]);