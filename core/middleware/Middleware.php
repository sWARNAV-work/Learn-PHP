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

        if (! $middleware) 
        {
            return;
        } 
        $ob = static::MAP[$middleware] ?? false;

        if (! $ob)
            throw new \Exception("Nothing matched with the Middleware '{$middleware}'");
        
        (new $ob)->handle();  
        
    }
}