<?php

namespace core;

class Container
{
    protected $bindings = [];
    public function bind($key, $func)
    {
        $this->bindings[$key] = $func;
    }

    public function resolve($keyToFind)
    {
        if (!array_key_exists($keyToFind, $this->bindings))
        {
            throw new \Exception("No matching id found for '{$keyToFind}' "); //Provided by PHP for exceptional cases. You can catch them later on to resolve them, or just ignore them.

        }
            // return $this->bindings[$keyToFind]; //just returns the obj instead of calling the function
            $resolver = $this->bindings[$keyToFind];
            return call_user_func($resolver); // Used to call the Function.
    }
}