<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu de Tablas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <!-- Header con opciones dinámicas -->
    <header class="bg-blue-500 py-4">
        <div class="container mx-auto flex justify-center space-x-6">
            <?php foreach ($tables as $table): ?>
                <a href="/<?=htmlspecialchars($table) ?>" class="text-white hover:text-gray-200"><?= ucfirst($table) ?></a>
            <?php endforeach; ?>
        </div>
    </header>

</body>
</html>
</html>
