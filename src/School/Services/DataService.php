<?php

namespace App\School\Services;

use App\Infrastructure\Database\DatabaseConnection;

class DataService {
    public function getDataByTable(string $keyword) {
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

                $data = [$keyword => $infos];
                $data1 = ['tables' => $tables];
            
                include VIEWS . '/predefinidos/header.view.php';
                include VIEWS . '/' . $keyword . '.view.php';
    


        } catch (\PDOException $e) {
            // Manejo de errores
            echo "Error al ejecutar la consulta: " . $e->getMessage();
            return [];
        }
    }

    public function getTablesNames() {

        try {
            $db = DatabaseConnection::getConnection();
            $db->exec("USE School");
            $query = $db->query("SHOW TABLES;");
            $tables = $query->fetchAll(\PDO::FETCH_COLUMN);

            // Asignar los datos para la vista
            $data = ['tables' => $tables]; 

            // Incluir la vista
            include VIEWS . '/home.view.php';

    
        } catch (\PDOException $e) {
            echo "Error al ejecutar la consulta: " . $e->getMessage();
        }
}
}