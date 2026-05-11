<?php

namespace core;

class Authenticator
{
    public function AttemptToLogin($email, $password)
    {
        $holdInfo = (App::resolve(Database::class))->query("SELECT * FROM users WHERE email = :email", [
            "email" => $email,
        ])->find();
        if ($holdInfo)
        {
            if (password_verify($password, $holdInfo["password"]))
            {
                return true;
            }
        }
        return false;
    }

    public function login($user)
    {
        $_SESSION["user"] = [
            "email" => $user["email"],
        ];
        session_regenerate_id(true);
    }
}