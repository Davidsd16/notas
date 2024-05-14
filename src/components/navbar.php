<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <style>
        /* Estilos CSS para el navbar */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            text-align: center; /* Centra todo el contenido horizontalmente */
        }

        nav {
            max-width: 600px; /* Ancho máximo del navbar */
            margin: 20px auto; /* Centra el navbar horizontalmente */
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color: #333; /* Cambia el color de fondo del navbar según tu preferencia */
            overflow: hidden;
            border-radius: 5px;
        }

        nav ul li {
            float: left;
        }

        nav ul li a {
            display: block;
            color: white; /* Cambia el color del texto de los enlaces según tu preferencia */
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav ul li a:hover {
            background-color: #555; /* Cambia el color de fondo del enlace al pasar el mouse sobre él */
        }
    </style>
</head>
<body>

<nav>
    <ul>
        <li><a href="?view=home">Home</a></li>
        <li><a href="?view=create">Create</a></li>
    </ul>
</nav>

</body>
</html>
