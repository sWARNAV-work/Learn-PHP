<?php 
namespace core\middleware;

class Authenticated
{
    public static function handle()
    {
        if(! ($_SESSION["user"] ?? false))
        {
            header("location: /");
            die();
        }
    }
}