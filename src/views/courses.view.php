<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes</title>
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
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
        }

        /* Tabla de estudiantes */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff; /* Azul */
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Botón centrado */
        .btn {
            display: block; /* Hace que el botón sea un bloque */
            padding: 10px 20px;
            background-color: #007bff; /* Azul */
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px auto; /* Centra el botón con margen automático */
            text-align: center; /* Asegura que el texto esté centrado */
            width: 200px; /* Ancho fijo del botón */
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3; /* Azul oscuro */
        }

        /* Estilos para los botones de cada fila */
        .action-btns {
            text-align: right; /* Alinea los botones a la derecha */
        }

        .action-btn {
            display: inline-block;
            padding: 6px 12px;
            margin: 0 5px;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
            font-size: 14px; /* Tamaño de texto más pequeño */
        }

        .edit-btn {
            background-color: #28a745; /* Verde */
            color: white;
        }

        .edit-btn:hover {
            background-color: #218838; /* Verde oscuro */
        }

        .delete-btn {
            background-color: #dc3545; /* Rojo */
            color: white;
        }

        .delete-btn:hover {
            background-color: #c82333; /* Rojo oscuro */
        }

        /* Alineación de la cabecera de acciones */
        th:last-child {
            text-align: right; /* Alinea la palabra "Acciones" a la derecha */
        }
    </style>
</head>
<body>
    <header>
        <h1>Lista de Courses</h1>
    </header>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>ID Degree</th>
                <th style="text-align: right;">Acciones</th> <!-- Columna "Acciones" alineada a la derecha -->
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($infos)): ?>
                <?php foreach ($infos as $info): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($info['id']); ?></td>
                        <td><?php echo htmlspecialchars($info['name']); ?></td>
                        <td><?php echo htmlspecialchars($info['degree_id']); ?></td>
                        <td class="action-btns">
                            <a href="editar_student.php?id=<?php echo $info['id']; ?>" class="action-btn edit-btn">Editar</a>
                            <a href="eliminar_student.php?id=<?php echo $info['id']; ?>" class="action-btn delete-btn">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align: center;">No hay courses disponibles</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="add-courses" class="btn">Agregar Courses</a>
</body>
</html>
