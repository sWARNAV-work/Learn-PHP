<?php 

namespace core;

class Session
{
    public function has($key)
    {
        return (bool) static::get($key); //Type Casting to return true or false.
    }
    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        return $_SESSION["_flash"][$key] ?? $_SESSION[$key] ?? null;
    }
    public static function flash($key, $value)
    {
        $_SESSION["_flash"][$key] = $value;
    }

    public static function unflash()
    {
        unset($_SESSION["_flash"]);
    }
}