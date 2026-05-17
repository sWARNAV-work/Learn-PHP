<?php
namespace html\forms;

use core\Validator;
use core\ValidationExceptions;

class ValLogin extends Form
{
    // public array $attributes = []; // Same as using the Parameter input below, part 1.
    function __construct(public array $attributes)
    {
        // $this->attributes = $attributes; // Same as using the Parameter input above, part 2.
        
        $range = 255;

        if (!Validator::email($attributes["email"]))
            $this->addError("login", "Please provide us with a valid Email/Password.");
        if (!Validator::string($attributes["password"], 1, $range))
            $this->addError("login", "Please provide us with a valid Email/Password.");

    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);
        if ($instance->failed())
        {
            ValidationExceptions::throw($instance->attributes["email"], $instance->getErrors());
        }
        return $instance;
    }

    public function throw()
    {     
        ValidationExceptions::throw($this->attributes["email"], $this->getErrors());
    }


}
