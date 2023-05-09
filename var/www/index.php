<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenidos a Steam</title>
    <link rel="icon" href="https://store.steampowered.com/favicon.ico">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <a href="index.php"><img src="https://community.akamai.steamstatic.com/public/shared/images/responsive/header_logo.png" height="50em" style="margin-top: 0.2em;"></a>
        <a href="altaJuego.php"><button class="boton-ppal" style="scale:120%;margin:0">Agregar juego</button></a>
    </header>
    <form class="filters" action="index.php" method="GET">
        <p>Buscar juego:</p>

        <input name="nombre" type="text" placeholder="Nombre" class="text-input" value="<?php echo $_GET['nombre']?>">
        
        <?php 
            include ('conexionBD.php');
            $con = connect();
            $plat = $con -> query("SELECT * FROM plataformas"); ?>
            <select name="plataforma" class="input">
            <option value=>Plataforma</option>        
            <?php while($row = $plat -> fetch(PDO::FETCH_ASSOC)){?><option
            <?php if ($_GET['plataforma'] == $row["id"]) { ?>selected="true" <?php }; ?>value="<?php echo $row['id'];?>"><?php echo $row["nombre"];?>
            </option>
            <?php }; ?>
        </select> 
        <?php 
            $genres = $con -> query("SELECT * FROM generos"); ?>
            <select name="genero" class="input">
            <option value=>Genero</option>
            <?php while($row = $genres -> fetch(PDO::FETCH_ASSOC)){?><option 
            <?php if ($_GET['genero'] == $row["id"]) { ?>selected="true" <?php }; ?>value="<?php echo $row['id'];?>"><?php echo $row["nombre"];?>
            </option>
            <?php }; ?>  
        </select>
        <select id="ordenar" name="ordenar">
            <option value="">Ordenar</option>
            <option <?php if ($_GET['ordenar'] == "ASC") { ?>selected="true" <?php }; ?>value="ASC">A-Z</option>
            <option <?php if ($_GET['ordenar'] == "DESC") { ?>selected="true" <?php }; ?>value="DESC">Z-A</option>
        </select>
        <input type="submit" value="Filtrar" class="boton">
        <a href="index.php"><input type="button" value="Limpiar Filtros" class="boton" style="padding: 0.3em 0.6em"></a>
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
            $nombre = $_GET["nombre"];
            $genero = $_GET["genero"];
            $plataforma = $_GET["plataforma"];
            $ordenar = $_GET["ordenar"];
             
            $con = connect();
            loadData();
            $query = "SELECT J.nombre, descripcion, imagen, tipo_imagen, url, G.nombre AS genero, P.nombre as plataforma
            FROM juegos J 
            JOIN generos G
            ON J.id_genero = G.id
            JOIN plataformas P 
            ON J.id_plataforma = P.id";
            if ($nombre !="" OR $genero !="" OR $plat=""){
                $query .= " WHERE ";
            }
            if ($nombre != ""){
                $query .= 'J.nombre LIKE "%'.$nombre.'%"';}
            if ($genero != ""){
                if ($nombre != "") {$query .= ' AND ';}
                $query .= 'J.id_genero LIKE "'.$genero.'"';}
            if ($plataforma != ""){
                if ($nombre != "" OR $genero != "") {$query .= ' AND ';}
                $query .= 'J.id_plataforma LIKE "'.$plataforma.'"';}
            if ($ordenar == "ASC" or $ordenar == "DESC"){
                $query .= ' ORDER BY J.nombre '.$ordenar;}
            
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