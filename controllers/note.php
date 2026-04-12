<?php 

    $config = require 'config.php';
    $db = new Database($config['database']);

    $currentUserID = 1;

    $note = $db->query('SELECT * FROM notes where id = :id', [
        
        'id'=>$_GET['id'],
        ])-> findOrDeny();

    authorize($note['user_id'] === $currentUserID);

$heading = 'Note';

require "views/note.view.php";

?>



