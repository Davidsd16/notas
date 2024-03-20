<?php

// Importamos la clase Note del namespace David\Notas\models
use David\Notas\models\Note;

    // Verificamos si se ha enviado algún dato a través del formulario
    if (count($_POST) > 0) {

        // Obtenemos el título y el contenido del formulario
        $title   = isset($_POST['title']) ? $_POST['title'] : ''; // Si 'title' está seteado, asigna su valor; de lo contrario, asigna una cadena vacía
        $content = isset($_POST['content']) ? $_POST['content'] : ''; // Si 'content' está seteado, asigna su valor; de lo contrario, asigna una cadena vacía
        
        // Creamos una nueva instancia de la clase Note con el título y el contenido obtenidos
        $note = new Note($title, $content);
        // Guardamos la nueva nota en la base de datos
        $note->save();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new note</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Create Note</h1>
    <!-- Formulario para crear una nueva nota -->
    <form action="?view=create" method="POST">
        <input type="text" name="title" placeholder="Title..."> <!-- Campo para el título de la nota -->
        <textarea name="content" placeholder="Content..." cols="30" rows="10"></textarea> <!-- Campo para el contenido de la nota -->
        <input type="submit" value="Create note"> <!-- Botón para enviar el formulario y crear la nota -->
    </form>
</body>
</html>

