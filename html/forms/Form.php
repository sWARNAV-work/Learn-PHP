<?php
namespace html\forms;

use core\Validator;

abstract class Form
{
    protected $errors = [];

    public function addError($key, $error): void
    {
        $this->errors[$key] = $error;
    }
    public function getErrors(): array
    {
        return $this->errors;
    }
}


