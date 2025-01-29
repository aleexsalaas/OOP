<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Usuario</title>
</head>
<body>
    <h1>Formulario de Usuario</h1>
    <form action="users-add-form" method="POST">

        <label for="uuid">UUID:</label><br>
        <input type="text" id="uuid" name="uuid" maxlength="100"><br><br>

        <label for="first_name">Nombre:</label><br>
        <input type="text" id="first_name" name="first_name" maxlength="100" required><br><br>

        <label for="last_name">Apellido:</label><br>
        <input type="text" id="last_name" name="last_name" maxlength="100" required><br><br>

        <label for="email">Correo Electrónico:</label><br>
        <input type="email" id="email" name="email" maxlength="100" required><br><br>

        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" maxlength="100" required><br><br>

        <label for="user_type">Tipo de Usuario:</label><br>
        <input type="text" id="user_type" name="user_type" maxlength="100"><br><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>


<style>

body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 20px;
}

h1 {
    text-align: center;
    color: #333;
}

form {
    max-width: 500px;
    margin: 0 auto;
    background: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}

input[type="text"],
input[type="number"],
input[type="email"],
input[type="password"],
input[type="datetime-local"],
button {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

input:focus {
    border-color: #007BFF;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

button {
    background-color: #007BFF;
    color: white;
    border: none;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}


</style>