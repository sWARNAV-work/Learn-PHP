<?php 
namespace core\middleware;

class Middleware
{
    public const MAP = [
        "guest" => Guest::class,
        "authenticated" => Authenticated::class,
    ];
    public function resolve($middleware)
    {
        if ($middleware)
        {
            $ob = static::MAP[$middleware];
            (new $ob)->handle();
        }   
        return;
    }
}