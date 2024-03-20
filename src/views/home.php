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

        .note-preview {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            text-decoration: none;
            color: #333;
            display: block;
            transition: all 0.3s ease;
        }

        .note-preview:hover {
            background-color: #f0f0f0;
            transform: translateY(-2px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <h1>HOME</h1>

    <?php
        // Itera sobre el array de notas y muestra el título de cada nota
        foreach ($notes as $note) {
    ?>
        <a href="?view=view&id=<?php echo $note->getUuid(); ?>">
            <div class="note-preview">
                <div class="title">
                    <?php echo $note->getTitle(); ?>
                </div>
            </div>
        </a>
    <?php
        }
    ?>
</body>
</html>
