<?php

require 'validator.php';


$config = require 'config.php';
$db = new Database($config['database']); //Creating the database class obj and passing the database connection values


if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    
    $errors = [];
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

$heading = 'Create a Note';

require "views/notes/create.view.php";

?>