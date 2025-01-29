<?php 
    
    namespace App\Infrastructure\Routing;

    use App\Infrastructure\Routing\Request;
    use App\Infrastructure\Routing\RouteCollection;

    
    

    class Router{
        //private array $routes=[];
        private RouteCollection $routesColection;
        public function __construct(RouteCollection $routesColection){
            $this->routesColection=$routesColection;
        }

        function dispatch(Request $request){
           $routes=$this->routesColection->getRoutes();
           foreach($routes as $route){
               if($route['method']===strtoupper($request->getMethod()) 
               && $this->matchUri($route['path'],$request->getUri(), $params)){
                    [$ControllerClass,$action]=$route['handler'];
                    $controller=new $ControllerClass();
                    $result=call_user_func_array([$controller,$action],$params);
                }
        }
        return new Response(['error'=>'Ruta no encontrada'], 404);
    }

    private function matchUri(string $route, string $uri, &$params){
        $pattern=preg_replace('#\{(\w+)\}#','(?P<\1>[^/]+)',$route);
        $pattern="#^".$pattern."$#";
        if(preg_match($pattern,$uri,$matches)){
            $params=array_filter($matches,fn($key)=>is_string($key),ARRAY_FILTER_USE_KEY);
            return true;
        }
        return false;

    }
}

        
