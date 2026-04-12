<?php 

    /* =========================================
       If-else structure
       =========================================
    */
    // if($uri === '/')
    //     require 'controllers/index.php';
    // else if ($uri === "/about")
    //     require "controllers/about.phpf";
    // else if ($uri === '/contact')
    //     require 'controllers/contact.php';

    /* =END= */



    /* =========================================
       The above in an associative array
       =========================================
    */
    
    return [
        '/' => 'controllers/index.php',
        '/contact' => 'controllers/contact.php',
        '/about' => 'controllers/about.php',
        '/notes' => 'controllers/notes.php',
        '/note' => 'controllers/note.php',
        '/notes/create' => 'controllers/note-create.php',
    ];
    /* =END= */
?>