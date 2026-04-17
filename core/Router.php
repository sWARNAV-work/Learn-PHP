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
        ];
    }

    public function get($uri, $controller)
    {
        $this->add("GET", $uri, $controller);
    }

    public function post($uri, $controller)
    {
        $this->add("POST", $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        $this->add("DELETE", $uri, $controller);
    }

    public function put($uri, $controller)
    {
        $this->add("PUT", $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        $this->add("PATCH", $uri, $controller);
    }
    
    public function route($uri, $method) //The One that does the routing
    {
        foreach($this->routes as $route)
        {            
        // dd($route['uri'] . " vs " . $uri); 
        // dd($route['method'] . " vs " . strtoupper($method));
            if($route['uri'] === $uri && $route["method"] === strtoupper($method))
               return require base_path($route['controller']);  //Took me a little while to understand.
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