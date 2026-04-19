<?php 

namespace core;

class App
{
    protected static $container;
    public static function setContainer($container)
    {
        static::$container = $container;
    }

    public static function getContainer()
    {
        return static::$container;
    }

    public static function resolve($data)
    {
        return static::getContainer()->resolve($data);
    }
}