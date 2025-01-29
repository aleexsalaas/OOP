<?php 

    namespace App\Infrastructure\Database;


    class DatabaseConnection{
        private static \PDO $db;

        public static function getConnection(){
            if(!empty(self::$db)){
                return self::$db;
            }else{
                $db_info=[
                    'dsn'=>"mysql:host=".$_ENV['DB_HOST'].";dbname=".$_ENV['DB_NAME'],
                    'dbuser'=>$_ENV['DB_USER'],
                    'dbpassword'=>$_ENV['DB_PASSWORD']    
                ];
                try{
                    self::$db=new \PDO($db_info['dsn'],
                    $db_info['dbuser'],$db_info['dbpassword']);
                }catch(\PDOException $e){
                    die($e->getMessage());
                }
            }
        }


        public static function dataByKey(string $keyword) {
            try {
                // Conexión a la base de datos
                $db = DatabaseConnection::getConnection();
                $db->exec("USE School");
    
                // Ejecutar la consulta para obtener todos los registros de la tabla especificada
                $query = $db->query("SELECT * FROM " . $keyword . ";");
                $infos = $query->fetchAll(\PDO::FETCH_ASSOC);
                // Ejecutar la consulta para obtener todas las tablas de la base de datos
                $query2 = $db->query("SHOW TABLES;");
                $tables = $query2->fetchAll(\PDO::FETCH_COLUMN);
    
                // Obtener los resultados de la consulta principal
                $data = [$keyword => $infos];
                $data1 = ['tables' => $tables];
    
                // Incluir las vistas
                include VIEWS . '/predefinidos/header.view.php';
                include VIEWS . '/' . $keyword . '.view.php';
    
            } catch (\PDOException $e) {
                // Manejo de errores
                echo "Error al ejecutar la consulta: " . $e->getMessage();
            }
        }

    }