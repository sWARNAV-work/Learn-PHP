<?php
namespace html\forms;

// use core\Validator;

abstract class Form
{
    protected $errors = [];

    public function addError($key, $error): object
    {
        $this->errors[$key] = $error;
        return $this;
    }
    public function getErrors(): array
    {
        return $this->errors;
    }
    public function failed()
    {
        return count($this->errors);
    }
}


