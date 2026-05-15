<?php 
namespace core;

class ValidationExceptions extends \Exception
{
    public readonly array $errors;
    public readonly string $old; //Instructor used array here, I want to check if it breaks
    public static function throw($old, $errors)
    {
        $instance = new static;
        $instance->old = $old;
        $instance->errors = $errors;
        throw $instance; 
    }
}