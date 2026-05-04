<?php
use core\Database;
use core\App;

$db = App::resolve(Database::class); // could also be written as resolve("\core\Database")


$currentUserID = 1;

/* =========================================================
   VERIFYING NOTE IS FROM CURRENT user_id AND DELETING NOTE
   =========================================================
*/
// dd($_POST["id"]);
$note = $db->query('SELECT * FROM notes where id = :id', [
    'id' => $_POST['id'],
])->findOrDeny();

authorize($note['user_id'] === $currentUserID);

//Form was submitted, Delete the current Note.
$db->query("DELETE FROM notes WHERE id = :id", [
    "id" => $_POST["id"],
]);

header("location: /notes"); //Used to go back to /notes webpage.
exit();

/* =END= */
?>