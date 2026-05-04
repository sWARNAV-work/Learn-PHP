<?php 

namespace html\forms;

use core\Validator;

class ValLogin
{
    protected $errors = []; //readonly works in newer version of PHP from 8.1, will use it in future

    public function validate($email, $password)
    {
        $range = 5;

        if (! Validator::email($email))
        {
            $this->errors["email"] = "We know it is tedious, but we need to have a proper email.";
        }
        if (! Validator::string($password, 1, $range))
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