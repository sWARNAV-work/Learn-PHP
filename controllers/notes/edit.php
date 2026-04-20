<?php

use core\Database;
use core\App;

$db = App::resolve(Database::class);

$cust_id = 1;
// dd($_GET["id"]);
// dd($_POST["id"]);


/* =========================================
   Getting and Verifying
   =========================================
*/
$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $_GET['id'],
])->findOrDeny();
authorize($note['user_id'] === $cust_id);
/* =END= */


view("notes/edit.view.php", [
    'heading' => "Edit Note",
    "note" => $note, //Sending the current note to the view so it could be displayed in the textbox.
]);
?>