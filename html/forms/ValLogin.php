<?php 
namespace html\forms;

use core\Validator;

class ValLogin
{
    protected $errors = [];
    public function validate($email)
    {
        if( !Validator::email($email))
        {
            $this->errors["login"] = "The email entered is not valid.";
        }
        return empty($this->errors);
    }
    public function getErrors()
    {
        return $this->errors;
    }
}