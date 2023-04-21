<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STEAM</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Steam_icon_logo.svg/2048px-Steam_icon_logo.svg.png">
</head>
<body>
    <header><img src="https://community.akamai.steamstatic.com/public/shared/images/responsive/header_logo.png" height="50em"></header>
    
    <form class="filters">
        <p>Buscar juego:</p>
        <input type="text" placeholder="Nombre" class="text-input">
        <input type="text" placeholder="Genero" class="text-input">

        <select name="plataforma" id="plataforma">
            <option value="empty">Plataforma</option>
            <option value="pc">PC</option>
            <option value="ps">PlayStation</option>
        </select>

        <select id="ordenar" name="ordenar">
            <option value="empty">Ordenar</option>
            <option value="a-z">A-Z</option>
            <option value="z-a">Z-A</option>
        </select>
        
        <input type="submit" value="Filtrar" class="boton">
    </form>

    <div class="lista">
        <div class="item">
            <img src="https://media.steampowered.com/apps/csgo/blog/images/fb_image.png?v=6" alt="CS:GO">
            <ul>
                <li><h2>Nombre</h2></li>
                <li><p>Genero</p></li>
                <li><p>Plataforma</p></li>
                <li><a href="">URL</a></li>
                <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam ullam aperiam est deleniti quidem debitis expedita a quibusdam facere sint. Placeat minus qui voluptatibus ipsa? Illo eum ducimus consequuntur rem?</p></li>
            </ul>
        </div>
        <?php
            $host = 'localhost';
            $dbname = 'juegos_online';
            $user = 'root';
            $pass = '';
            $con = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

            // include "conexionBD.php";
            $select = $con->prepare
            ("SELECT J.nombre, descripcion, url, G.nombre AS genero, P.nombre as plataforma
            FROM juegos J 
            JOIN generos G
            ON J.id_genero = G.id
            JOIN plataformas P 
            ON J.id_plataforma = P.id;");
            $select->execute();

            while($row = $select->fetch(PDO::FETCH_ASSOC)){
                echo '<div class="item"><ul>';
                echo "<li><h2>".$row['nombre']."</h2></li>";
                echo "<li><p>".$row['genero']."</p></li>";
                echo "<li><p>".$row['plataforma']."</p></li>";
                echo '<li><a href="'.$row['url'].'" target="blank">Sitio web</a></li>';
                echo "<li><p>".$row['descripcion']."</p></li>";
                echo "</ul></div>";
            }
        ?>

    </div>

    <a href="altaJuego.php"><button class="boton">Agregar juego</button></a>

    <footer>Andres Hoyos Garcia | Valentina Wiehl - 2023</footer>
</body>
</html>