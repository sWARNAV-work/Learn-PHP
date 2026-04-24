<?php 

namespace core\middleware;

class Guest
{
    public static function handle()
    {
        if ($_SESSION["user"] ?? false)
        {
            header("location: /");
            die();
        }
    }
}