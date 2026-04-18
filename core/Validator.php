<?php 
namespace core;

    class Validator
    {
        public static function string($val, $min = 1, $max = INF)
        {
            $val = trim($val);
            return strlen($val) >= $min && strlen($val) <= $max;
            
        }

        public static function email($email)
        {
            $email = trim($email);
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }
    }

?>