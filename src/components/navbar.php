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
            text-align: center; 
        }

        nav {
            max-width: 600px; 
            margin: 20px auto;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color: #333; 
            overflow: hidden;
            border-radius: 5px;
        }

        nav ul li {
            float: left;
        }

        nav ul li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav ul li a:hover {
            background-color: #555; 
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
