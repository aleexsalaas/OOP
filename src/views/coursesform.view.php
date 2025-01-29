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

    /* Contenedor principal del formulario */
    .form-container {
        width: 80%;
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Agrupación de los elementos del formulario */
    .form-group {
        margin-bottom: 20px;
    }

    /* Estilo de las etiquetas */
    .form-group label {
        font-size: 16px;
        color: #333;
        font-weight: bold;
        margin-bottom: 8px;
        display: block;
    }

    /* Estilo de los campos de entrada */
    .form-group input,
    .form-group select {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
        box-sizing: border-box;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: #0056b3;
        outline: none;
    }

    /* Estilo del botón */
    .form-group button {
        width: 100%;
        padding: 12px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    .form-group button:hover {
        background-color: #0056b3;
    }
</style>

<form method="POST" action="courses-add-form" class="form-container">

    <div class="form-group">
        <label for="course_name">Course Name:</label>
        <input type="text" id="course_name" name="course_name" required>
        <label for="course_name">Degrees:</label>
        <input type="number" id="degrees_id" name="degrees_id" required>

    </div>

    <div class="form-group">
        <button type="submit">Create Course</button>
    </div>
</form>
