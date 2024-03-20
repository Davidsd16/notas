<?php

// Utiliza la función getAll() para obtener todas las notas
use David\Notas\models\Note;
$notes = Note::getAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
</head>
<body>
    <h1>HOME</h1>

    <?php
        // Itera sobre el array de notas y muestra el título de cada nota
        foreach ($notes as $note) {
            echo "<div>{$note->getTitle()}</div>";
        }
    ?>
</body>
</html>