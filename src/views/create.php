<?php

// Importamos la clase Note del namespace David\Notas\models
use David\Notas\models\Note;

    // Verificamos si se ha enviado algún dato a través del formulario
    if (count($_POST) > 0) {
        // Obtenemos el título y el contenido del formulario
        $title   = isset($_POST['title']) ? $_POST['title'] : ''; // Si 'title' está seteado, asigna su valor; de lo contrario, asigna una cadena vacía
        $content = isset($_POST['content']) ? $_POST['content'] : ''; // Si 'content' está seteado, asigna su valor; de lo contrario, asigna una cadena vacía
        var_dump($title);
        var_dump($content);

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
</head>
<body>
    <h1>Create Note</h1>
    <!-- Formulario para crear una nueva nota -->
    <form action="?view=create" method="POST">
        <input type="text" name="title" placeholder="Title..."> <!-- Campo para el título de la nota -->
        <textarea name="content" id="" cols="30" rows="10"></textarea> <!-- Campo para el contenido de la nota -->
        <input type="submit" value="Create note"> <!-- Botón para enviar el formulario y crear la nota -->
    </form>
</body>
</html> 
