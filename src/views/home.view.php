<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Tablas</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Cabecera */
        header {
            background-color: #007bff; /* Azul */
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        /* Enlaces dentro del header */
        .menu-container {
            display: inline-block;
            margin: 0 auto;
            text-align: center;
        }

        .menu-container a {
            display: inline-block;
            padding: 12px 20px;
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            margin: 0 10px;
            background-color: #007bff;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        .menu-container a:hover {
            background-color: #0056b3; /* Azul oscuro */
            color: #f0f4f8;
        }

        /* Estilo para las tablas */
        header h1 {
            margin: 0;
            font-size: 24px;
        }
    </style>
</head>
<body>

    <!-- Header con opciones dinámicas -->
    <header>
        <div class="menu-container">
            <h1>Menú de Tablas</h1>
            <div class="menu-links">
                <?php foreach ($tables as $table): ?>
                    <a href="<?=$table?>" class="table-link"><?= ucfirst($table) ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </header>

</body>
</html>
