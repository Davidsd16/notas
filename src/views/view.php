<?php
use David\Notas\models\Note;

// Verifica si se proporciona un ID en la URL
if (isset($_GET['id'])) {
    // Si se proporciona un ID, obtiene la nota correspondiente
    $note = Note::get($_GET['id']);
} else {
    // Si no se proporciona un ID, redirige a la página de inicio
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
    <!-- Contenido HTML -->
    <h1>View</h1>
    <form action="?view=create" method="POST">
        <!-- Campo para el título de la nota -->
        <input type="text" name="title" placeholder="Title..." value="<?php echo $note->getTitle(); ?>">
        <!-- Campo para el contenido de la nota -->
        <textarea name="content" placeholder="Content..." cols="30" rows="10"><?php echo $note->getContent(); ?></textarea> 
        <!-- Botón para enviar el formulario y crear una nueva nota -->
        <input type="submit" value="Create note"> 
    </form>
</body>
</html>
