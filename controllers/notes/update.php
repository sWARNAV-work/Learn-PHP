<?php 

use core\App;
use core\Database;
use core\Validator;


$cust_id = 1;
$errors = [];
$range = 50;
$db = App::resolve(Database::class);


/* =========================================
   FIND NOTE
   =========================================
*/
$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    "id" => $_POST["id"],
])->findOrDeny();
/* =END= */

/* =========================================
   AUTHORIZE USER
   =========================================
*/
authorize($note["user_id"] === $cust_id);
/* =END= */

/* =========================================
   CHECK WORD LENGTH
   =========================================
*/
$verify = Validator::string($_POST["body"], 1, $range);
if (!$verify)
    $errors["body"] = "Enter Something between 1 and {$range} words!";
if(!empty($errors))
{
    view("notes/edit.view.php", [
        "heading" => "Edit Note",
        "errors" => $errors,
        "note" => $note,
    ]);
}
/* =END= */

/* =========================================
   UPDATE DATABASE
   =========================================
*/
$note = $db->query("UPDATE notes SET body = :body WHERE id = :id", [
    "id" => $_POST["id"],
    "body" => $_POST["body"]
]);

header("location: /notes");
exit();