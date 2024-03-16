<?php
// Verificamos si el parámetro 'view' está presente en la URL
if (isset($_GET['view'])) {
    // Si 'view' está presente, lo asignamos a la variable $view
    $view = $_GET['view'];
    // Construimos la ruta del archivo a incluir concatenando el nombre del archivo con 'app.php' y $view
    require 'src/app.php' . $view . '.php';
} else {
    require 'src/views/home.php';
}
