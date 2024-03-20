<?php
// Verificamos si el parámetro 'view' está presente en la URL
if (isset($_GET['view'])) {
    // Si 'view' está presente, lo asignamos a la variable $view
    $view = $_GET['view'];
    // Construimos la ruta del archivo a incluir concatenando el nombre del archivo con $view y '.php'
    // Asegúrate de agregar un separador de directorio ('/') entre el directorio 'src/views' y el nombre del archivo
    require 'src/views/' . $view . '.php';
} else {
    // Si 'view' no está presente, incluye la vista de la página de inicio
    require 'src/views/home.php';
}
?>
