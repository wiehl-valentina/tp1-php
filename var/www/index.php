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
    
    <form class="filters" action="filter.php" method="POST">
        <p>Buscar juego:</p>
        <input type="text" placeholder="Nombre" class="text-input">
        
        <select id="genero" name="genero">
            <option value="">Genero</option>
            <option value="1">Disparos</option>
            <option value="2">Accion</option>
            <option value="3">Terror</option>
            <option value="4">Estrategia</option>
        </select>    

        <select name="plataforma" id="plataforma">
            <option value="">Plataforma</option>
            <option value="1">PC</option>
            <option value="2">PlayStation</option>
            <option value="3">Mobile</option>
        </select>

        <select id="ordenar" name="ordenar">
            <option value="empty">Ordenar</option>
            <option value="a-z">A-Z</option>
            <option value="z-a">Z-A</option>
        </select>
        
        <input type="submit" value="Filtrar" class="boton">
    </form>

    <div class="lista">
        <!-- <div class="item">
            <img src="https://media.steampowered.com/apps/csgo/blog/images/fb_image.png?v=6" alt="CS:GO">
            <ul>
                <li><h2>Nombre</h2></li>
                <li><p>Genero</p></li>
                <li><p>Plataforma</p></li>
                <li><a href="">URL</a></li>
                <li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam ullam aperiam est deleniti quidem debitis expedita a quibusdam facere sint. Placeat minus qui voluptatibus ipsa? Illo eum ducimus consequuntur rem?</p></li>
            </ul>
        </div> -->
        <?php
            $host = 'localhost';
            $dbname = 'juegos_online';
            $user = 'root';
            $pass = '';
            $con = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

            // include "conexionBD.php";
            $select = $con->prepare
            ("SELECT J.nombre, descripcion, imagen, tipo_imagen, url, G.nombre AS genero, P.nombre as plataforma
            FROM juegos J 
            JOIN generos G
            ON J.id_genero = G.id
            JOIN plataformas P 
            ON J.id_plataforma = P.id;");
            $select->execute();

            $hay_juegos = $con->query('SELECT * FROM juegos;');
            if ($hay_juegos->rowCount() == 0){
                echo '<div class="item"><h1>No hay juegos cargados!</h1></div>';
            }else{
            while($row = $select->fetch(PDO::FETCH_ASSOC)){
                echo '<div class="item">';
                echo '<img src="assets/'.$row['imagen'].'">';
                echo "<ul><li><h2>".$row['nombre']."</h2></li>";
                echo "<li><p>".$row['genero']."</p></li>";
                echo "<li><p>".$row['plataforma']."</p></li>";
                echo '<li><a href="'.$row['url'].'" target="blank">Sitio web</a></li>';
                echo "<li><p>".$row['descripcion']."</p></li>";
                echo "</ul></div>";
            }
        }
        ?>

    </div>

    <a href="altaJuego.php"><button class="boton">Agregar juego</button></a>
    <footer>Andres Hoyos Garcia | Valentina Wiehl - 2023</footer>
    </body>
</html>