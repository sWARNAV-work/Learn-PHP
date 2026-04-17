<?php 
namespace core;

class Router 
{
    protected $routes = [];

    

    public function get($uri, $controller)
    {
        $this->routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => "GET"
        ];
    }
    public function post($uri, $controller)
    {
        $this->routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => "POST"
        ];
    }
    public function delete($uri, $controller)
    {
        $this->routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => "DELETE"
        ];
    }
    public function put($uri, $controller)
    {
        $this->routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => "PUT"
        ];
    }
    public function patch($uri, $controller)
    {
        $this->routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => "PATCH"
        ];
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