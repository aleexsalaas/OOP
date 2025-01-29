<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group button {
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

        .form-group button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Add Student</h1>
        <form method="POST" action="students-add-form">
            <div class="form-group">
                <label for="user_id">User ID</label>
                <input type="number" id="user_id" name="user_id" required>
            </div>
            <div class="form-group">
                <label for="dni">DNI</label>
                <input type="text" id="dni" name="dni" maxlength="100" required>
            </div>
            <div class="form-group">
                <label for="enrollment_year">Enrollment Year</label>
                <input type="number" id="enrollment_year" name="enrollment_year" maxlength="100" required>
            </div>
            <div class="form-group">
                <button type="submit">Add Student</button>
            </div>
        </form>
    </div>
</body>
</html>
