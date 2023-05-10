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

        <input name="nombre" type="text" placeholder="Nombre" class="text-input" value="<?php echo $_GET['nombre'] ?? "";?>" style="margin-right:2.5em;height: 2.2em;">
        
        <?php 
            include ('conexionBD.php');
            $con = connect();
            $plat = $con -> query("SELECT * FROM plataformas"); ?>
            <select name="plataforma" class="input">
            <option value="">Plataforma</option>        
            <?php while($row = $plat -> fetch(PDO::FETCH_ASSOC)){?><option
            value="<?php echo $row['id'];?>" <?php if (isset($_GET['plataforma']) && ($_GET['plataforma'] == $row['id'])){echo 'selected';}?>><?php echo $row['nombre'];?>
            </option>
            <?php }; ?>
        </select> 
        <?php 
            $genres = $con -> query("SELECT * FROM generos"); ?>
            <select name="genero" class="input">
            <option value="">Genero</option>
            <?php while($row = $genres -> fetch(PDO::FETCH_ASSOC)){?><option 
            value="<?php echo $row['id'];?>" <?php if (isset($_GET['genero']) && ($_GET['genero'] == $row["id"])) { echo 'selected';}?>><?php echo $row['nombre'];?>
            </option>
            <?php }; ?>  
        </select>
        <select id="ordenar" name="ordenar">
            <option value="">Ordenar</option>
            <option value="ASC" <?php if (isset($_GET['ordenar']) && ($_GET['ordenar'] == 'ASC')){echo 'selected';}?>>A-Z</option>
            <option value="DESC"<?php if (isset($_GET['ordenar']) && ($_GET['ordenar'] == 'DESC')){echo 'selected';}?>>Z-A</option>
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
            $con = connect();
            loadData();
            $query = "SELECT J.nombre, descripcion, imagen, tipo_imagen, url, G.nombre AS genero, P.nombre as plataforma
            FROM juegos J 
            JOIN generos G
            ON J.id_genero = G.id
            JOIN plataformas P 
            ON J.id_plataforma = P.id";

            $reciboNombre = (isset($_GET['nombre']) && ($_GET['nombre'] != ""));
            $reciboGenero = (isset($_GET['genero']) && ($_GET['genero'] != ""));
            $reciboPlataforma = (isset($_GET['plataforma']) && ($_GET['plataforma'] != ""));
            $reciboOrden = (isset($_GET['ordenar']) && ($_GET['ordenar'] != ""));

            if ($reciboNombre) $nombre = $_GET['nombre'];
            if ($reciboGenero) $genero = $_GET['genero'];
            if ($reciboPlataforma) $plataforma = $_GET['plataforma'];
            if ($reciboOrden) $orden = $_GET['ordenar'];

            if ($reciboNombre || $reciboGenero || $reciboPlataforma){
                $query .= " WHERE ";
            }
            if ($reciboNombre){
                $query .= 'J.nombre LIKE "%'. $nombre .'%"';}

            if ($reciboGenero){
                if ($reciboNombre) {$query .= ' AND ';}
                $query .= 'J.id_genero = '. $genero;}

            if ($reciboPlataforma){
                if (($reciboNombre)  || ($reciboGenero)) {$query .= ' AND ';}
                $query .= 'J.id_plataforma = '. $plataforma;}
                
            if (($reciboOrden) && (($orden == "ASC") || ($orden == "DESC"))){
                $query .= ' ORDER BY J.nombre '. $orden;}
            
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