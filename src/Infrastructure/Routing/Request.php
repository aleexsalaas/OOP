<?php

    namespace App\Infrastructure\Routing;


    class Request{
        private string $method;
        private string $uri;
        private array $queryParams;
        private array $postParams;

        function __construct(){
            $this->method=$_SERVER['REQUEST_METHOD'] ?? 'GET';
            $this->uri=$_SERVER['REQUEST_URI']??'/';
            $this->queryParams=$_GET ?? [];
            $this->postParams=$_POST ?? [];
        }

        function get(string $key, $default=null){
            return $this->queryParams[$key] ?? $this->postParams[$key] ?? $default;
            
        }
         
        public function getMethod()
        {
                return $this->method;
        }

        
        public function getUri()
        {
                return $this->uri;
        }
    }