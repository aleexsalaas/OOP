<?php

namespace App\Infrastructure\Routing;

class RouteCollection{
    private array $routes = [];

    function __construct($FilePath){
        $this->loadFromFile($FilePath);
    }

    function add(string $method,string $path, callable|array $handler):void{
        $this->routes[]=[
            'method'=>strtoupper($method),
            'path'=>$path,
            'handler'=>$handler
        ];  
    }
    
    
    public function getRoutes():array {
        return $this->routes;
    }

    public function loadFromFile(string $file):void{
        if(!file_exists($file)){
            throw new \Exception('Routes File not found in: '.$file);
        }  
        $routes=require $file;
        
        if(!is_array($routes)){
            throw new \Exception('Routes File must be an array');
        }

        foreach($routes as $route){
            if(!isset($route['method'], $route['path'], $route['handler'])){
                throw new \Exception('Routes File must be an array');
            }
            $this->add($route['method'],$route['path'],$route['handler']);
        }
    }
}
