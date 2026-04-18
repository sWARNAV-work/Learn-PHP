<?php
use core\Validator;
use core\Database;
// dd("Hey");
// require base_path('core/validator.php'); ??Probably Redundant, Delete later. 


$config = require base_path('config.php');
$db = new Database($config['database']); //Creating the database class obj and passing the database connection values

$errors = [];
$range = 50; // The word limit of the Note

if (!Validator::string($_POST['body'], 1, $range))
    $errors['body'] = "Write something into the Box within {$range} characters, Dammit!";

if(!empty($errors))
{
    view("notes/create.view.php", [
    'heading' => "Create a Note",
    "errors" => $errors
    ]);
} else // (empty($errors))
{

    $db->query('INSERT INTO notes (body, user_id) VALUES(:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => 1
    ]);
    header("location: /notes");
    exit();
}





?>