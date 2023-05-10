<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear juego</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="icon" href="https://store.steampowered.com/favicon.ico">
</head>
<body class="newgame">
    <header style="box-shadow: 0 25px 45px rgb(50, 50, 52); height: 4.6em;">
        <a href="index.php"><img src="https://community.akamai.steamstatic.com/public/shared/images/responsive/header_logo.png" height="50em" style="margin-top:0.8em; margin-left: -0.55em;"></a>
    </header>
    
    <form action="create.php" method="POST" enctype="multipart/form-data" class="add" id="add">
        <h2>Agregar juego nuevo</h2>
        <input type="text" placeholder="Nombre" id="nombre" name="nombre"  class="input inputs">
 
        <label for="file">Añadir imagen</label>
        <input type="file" placeholder="Imagen" name="imagen" class="input inputs">
        
        <textarea name="desc" id="desc" name="desc"  class="input inputs" placeholder="Ingrese una descripcion" cols="10" rows="8" wrap="hard"></textarea>

        <?php 
            include ('conexionBD.php');
            $con = connect();
            $plat = $con -> query("SELECT * FROM plataformas");
            echo '<select id="plataforma" name="plat" class="input inputs">';
            echo '<option value="">Seleccione una plataforma</option>';        
            while($row = $plat -> fetch(PDO::FETCH_ASSOC)){ 
            echo '<option value="' . $row['id'] .'">' . $row["nombre"] . '</option>';
            } 
            echo '</select>';
        ?> 

        <input type="url" placeholder="https://www.example.com" name="url" id="url" class="input inputs">

        <?php 
            $genres = $con -> query("SELECT * FROM generos");
            echo '<select id="genero" name="genero" class="input inputs">';           
            while($row = $genres -> fetch(PDO::FETCH_ASSOC)){ 
             echo '<option value="' . $row['id'] .'">' . $row["nombre"] . '</option>';
            }
            echo '</select>';
        ?> 
        <input type="submit" value="Agregar Juego" id="agregar" class="boton">
    </form>
    <a href="index.php"><button class="boton-ppal">Volver</button></a>
    <footer>Andres Hoyos Garcia | Valentina Wiehl - 2023</footer>
    <script src="script.js" type="text/javascript"></script>
</body>
</html>

