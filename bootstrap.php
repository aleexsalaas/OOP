<?php
    define('VIEWS',__DIR__.'/src/views');
    require __DIR__.'/vendor/autoload.php';
    $dotenv=Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    use App\Controllers\HomeController;
    use App\Infrastructure\Database\DatabaseConnection;
    use App\Infrastructure\Routing\Router;
    use App\Infrastructure\Routing\RouteCollection;
    use App\School\Services\EnrollmentService;
    use App\Infrastructure\Persistence\EnrollmentRepository;
    
    use App\School\Services\Services;
    

    //carga de servicios siguiendo dependencias
   $pdo=DatabaseConnection::getConnection();
   $routes=new RouteCollection(__DIR__.'/src/Infrastructure/Routing/Routes.php');
   
    $router=new Router($routes);
