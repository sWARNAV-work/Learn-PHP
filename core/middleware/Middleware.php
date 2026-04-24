<?php 
namespace core\middleware;

class Middleware
{
    public const MAP = [
        "guest" => Guest::class,
        "authenticated" => Authenticated::class,
    ];
    public function resolve()
    {
        
    }
}