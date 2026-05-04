<?php
//This Validates Register login and password format. 

namespace html\forms;

use core\Validator;


class ValRegister
{
    protected $errors = []; //readonly won't work here, as the array is initialized multiple times.

    public function validate($email, $password)
    {
        $range = 255;

        if (!Validator::email($email))
        {
            $this->errors["email"] = "We know it is tedious, but we need to have a proper email.";
        }
        if (!Validator::string($password, 1, $range))
        {
            $this->errors["password"] = "Please input a password between 1 and {$range}";
        }
        return empty($this->errors) ?? false;
    }
    public function getErrors()
    {
        return $this->errors;
    }
}