<?php

// Verificamos si el parámetro 'view' está presente en la URL
if (isset($_GET['view'])) {
    // Si 'view' está presente, lo asignamos a la variable $view
    $view = $_GET['view'];
    // Construimos la ruta del archivo a incluir concatenando el nombre del archivo con 'app_' y $view
    // Este require es temporal para test
    require 'src/views/create.php';
} else {
    require 'src/views/create.php';
}

