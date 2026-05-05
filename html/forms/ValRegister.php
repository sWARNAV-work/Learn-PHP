<?php 

namespace html\forms;

use core\Validator;
class ValRegister extends Form
{
    public function validate($email, $password)
    {
        $range = 255;

        if (!Validator::email($email))
            $this->addError("email", "We know it is tedious, But please provide us with a proper email to reach you.");
        if (!Validator::string($password, 1, $range))
            $this->addError("password", "Please provide us with a valid Password");
        
        return (empty($this->errors));
    }
}