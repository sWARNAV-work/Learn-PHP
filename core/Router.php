<?php
namespace core;

class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => $method,
            "middleware" => null,
        ];
        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add("GET", $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add("POST", $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add("DELETE", $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add("PUT", $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add("PATCH", $uri, $controller);
    }

    public function user_type($key)
    {
        $this->routes[array_key_last($this->routes)]["middleware"] = $key;
        // dd($this->routes);
        return $this;
    }

    public function route($uri, $method) //The One that does the routing
    {
        // dd($this->routes);
        foreach ($this->routes as $route)
        {
            // dd($route['uri'] . " vs " . $uri); 
            // dd($route['method'] . " vs " . strtoupper($method));
            if ($route['uri'] === $uri && $route["method"] === strtoupper($method)) //Took me a little while to understand.
            {
                if ($route["middleware"] === "guest")
                {
                    if ($_SESSION["user"] ?? false)
                    {
                        header("location: /");
                        die();
                    }
                }
                else if ($route["middleware"] === "authenticated")
                {
                    if (empty($_SESSION["user"]))
                    {
                        header("location: /");
                        die();
                    }
                }
                return require base_path($route['controller']);
            }
        }
        abort();
    }
}































//     /* =========================================
//        FUNCTIONS
//        =========================================
//     */
//     function routingToControllers($uri, $routes)
//     {
//         if(array_key_exists($uri, $routes))
//         require base_path($routes[$uri]);
//     else 
//     {
//         abort(404);
//     }
//     }

//     
//     /* =END= */


?>