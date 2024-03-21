<?php
use David\Notas\models\Note;

if (count($_POST) > 0 ) {
    // Obtener datos del formulario
    $title   = isset($_POST['title']) ? $_POST['title'] : ''; 
    $content = isset($_POST['content']) ? $_POST['content'] : ''; 
    $uuid    = isset($_POST['id']) ? $_POST['id'] : null; // Deberías verificar si 'id' está definido y usarlo como UUID

    // Obtener la nota según el UUID proporcionado
    $note = Note::get($uuid);

    // Actualizar título y contenido de la nota
    $note->setTitle($title); // Corregido el nombre de la variable
    $note->setContent($content); // Corregido el nombre del método

    // Guardar los cambios en la base de datos
    $note->update();

} else if (isset($_GET['id'])) {
    // Obtener la nota según el ID proporcionado en la URL
    $note = Note::get($_GET['id']);
} else {
    // Si no hay ningún ID en la URL, redirigir a la página de inicio
    header('Location: ?view=home');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <style>
        /* Estilos CSS */
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
            max-width: 600px;
            margin: 50px auto;
            background-color: #e6e6e6;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <!-- Contenido HTML -->
    <h1>View</h1>
    <form action="?view=view&id=<?php echo $note->getUuid(); ?>" method="POST">
        <!-- Campo para el título de la nota -->
        <input type="text" name="title" placeholder="Title..." value="<?php echo $note->getTitle(); ?>">
        <!-- Campo para el contenido de la nota -->
        <input type="hidden" name="id" value="<?php echo $note->getUuid(); ?>">
        <textarea name="content" placeholder="Content..." cols="30" rows="10"><?php echo $note->getContent(); ?></textarea> 
        <!-- Botón para enviar el formulario y crear una nueva nota -->
        <input type="submit" value="Update note"> 
    </form>
</body>
</html>
