<?php 
namespace html\forms;

use core\Validator;

class ValLogin extends Form
{
    public function validate($email, $password)
    {
        $range = 255;

        if (!Validator::email($email))
            $this->addError("login", "Please provide us with a valid Email and Password Combination.");
        if (!Validator::string($password, 1, $range))
            $this->addError("login", "Please provide us with a valid Email and Password Combination."); //Just for the time being, to check. Will fix it.
        
        return (empty($this->errors));
    }

}