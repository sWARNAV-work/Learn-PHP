<?php

require base_path('validator.php');


$config = require base_path('config.php');
$db = new Database($config['database']); //Creating the database class obj and passing the database connection values

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    
    $range = 50;

    if (! Validator::string($_POST['body'],1,$range))
        $errors['body'] = "Write something into the Box within {$range} words, Dammit!";

    if (empty($errors))
    {

        $db->query('INSERT INTO notes (body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }
}



view("notes/create.view.php", [
    'heading' => "Create a Note",
    "errors" => $errors
]);
?>