<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STEAM</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <img src="https://community.akamai.steamstatic.com/public/shared/images/responsive/header_logo.png" height="50em">
        <a href="altaJuego.php"><button class="boton" style="scale:120%;margin:0">Agregar juego</button></a>
    </header>
    <form class="filters" action="index.php" method="GET">
        <p>Buscar juego:</p>
        <input name="nombre" type="text" placeholder="Nombre" class="text-input">
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
            <option value="">Ordenar</option>
            <option value="ASC">A-Z</option>
            <option value="DESC">Z-A</option>
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
            include ('conexionBD.php');
            $nombre = $_GET["nombre"];
            $genero = $_GET["genero"];
            $plataforma = $_GET["plataforma"];
            $ordenar = $_GET["ordenar"];
             
            $con = connect();
            loadData();
            
            
            if ($nombre == ''){$nombre = ' ';}

            if ($nombre = '' && $genero = '' && $plataforma = '' && $ordenar = '') {
                $query = "SELECT J.nombre, descripcion, imagen, tipo_imagen, url, G.nombre AS genero, P.nombre AS plataforma
                FROM juegos J 
                JOIN generos G
                ON J.id_genero = G.id
                JOIN plataformas P 
                ON J.id_plataforma = P.id";
            }
            else {
                $query = "SELECT J.nombre, descripcion, imagen, tipo_imagen, url, G.nombre AS genero, P.nombre AS plataforma
                FROM juegos J 
                JOIN generos G
                ON J.id_genero = G.id
                JOIN plataformas P 
                ON J.id_plataforma = P.id";
                if ($nombre != '') {
                    $query .= ' WHERE J.nombre LIKE "%'.$nombre.'%"';
                }
                if ($genero != '') {
                    $query .= 'AND J.id_genero = "'.$genero.'"';
                }
                if ($plataforma != '') {
                    $query .= "AND J.id_plataforma = '".$plataforma."'";
                }
                if ($ordenar == "ASC" or $ordenar == "DESC"){
                    $query .= ' ORDER BY J.nombre '.$ordenar;
                }    
            }
            
            $select = $con->prepare($query);
            $select->execute();
            if ($select->rowCount() == 0){
                echo '<div class="item" style="padding: 1em 5em; text-align:center"><h1>No hay resultados</h1></div>';
            }else{
                while($row = $select->fetch(PDO::FETCH_ASSOC)){
                    echo '<div class="item">';
                    echo '<img src="data:'.$row['tipo_imagen'].';base64,'.$row['imagen'].'">';
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
    <footer>Andres Hoyos Garcia | Valentina Wiehl - 2023</footer>
</body>
</html>