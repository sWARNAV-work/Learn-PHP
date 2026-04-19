<?php
use core\Database;
use core\App;

$db = App::resolve(Database::class);


$currentUserID = 1;


    /* =========================================
       SHOWING THE NOTE
       =========================================
    */

    $note = $db->query('SELECT * FROM notes where id = :id', [

        'id' => $_GET['id'],
    ])->findOrDeny();

    authorize($note['user_id'] === $currentUserID);

    $heading = 'Note';
    view("notes/show.view.php", [
        'heading' => "Note",
        "note" => $note,
    ]);

    /* =END= */

?>