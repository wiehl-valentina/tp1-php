<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear juego</title>
    <link rel="stylesheet" href="estilos.css">
    
</head>
<body class="newgame">
    <header style="box-shadow: 0 10px 20px rgb(61, 62, 64);">
        <img src="https://community.akamai.steamstatic.com/public/shared/images/responsive/header_logo.png" height="50em">
    </header>
    
    <form class="add" id="add" action="create.php" method="POST" enctype="multipart/form-data">
        <h2>Agregar juego nuevo</h2>
        <input type="text" maxlength="30" placeholder="Nombre" id="nombre" name="nombre"  class="input inputs" value="<?php echo (isset($_SESSION['inputs']['nombre'])) ? $_SESSION['inputs']['nombre'] : ''?>">
 
        <label for="file">Añadir imagen</label>
        <input type="file" placeholder="Imagen" name="img" class="input inputs" value="<?php echo (isset($_SESSION['inputs']['img'])) ? $_SESSION['inputs']['img'] : ''?>">
        
        <textarea name="desc" id="desc" class="input inputs" placeholder="Ingrese una descripcion" cols="10" rows="8" wrap="hard" value="<?php echo (isset($_SESSION['inputs']['desc'])) ? $_SESSION['inputs']['desc'] : ''?>"></textarea>

        <select id="plataforma" name="plat" class="input inputs">
            <option value="">Selecciona una plataforma</option>
            <option value="1">PC</option>
            <option value="2">PlayStation</option>
            <option value="3">Mobile</option>
        </select>

        <select id="genero" name="genero" class="input">
            <option value="">Selecciona un genero</option>
            <option value="1">Disparos</option>
            <option value="2">Accion</option>
            <option value="3">Terror</option>
            <option value="4">Estrategia</option>
        </select> 
        
        <input type="url" placeholder="https://www.example.com" name="url" id="url" class="input inputs" value="<?php echo (isset($_SESSION['inputs']['url'])) ? $_SESSION['inputs']['url'] : ''?>">

        <input type="submit" value="Agregar" class="boton">
    </form>
    <a href="index.php"><button class="boton">Volver</button></a>

    <?php 
        session_start();
        include("validar.php");

        if ($_SESSION['error-nombre']) {echo "Por favor ingrese un nombre válido";}
        if ($_SESSION['error-desc']) {echo "Por favor ingrese una descripcion válida";}
        if ($_SESSION['error-plat']) {echo "Por favor ingrese una plataforma válida";}
        if ($_SESSION['error-url']) {echo "Por favor ingrese una URL válida";}
        if ($_SESSION['error-img']) {echo "Por favor ingrese una imagen";}
    ?>

    <footer>Andres Hoyos Garcia | Valentina Wiehl - 2023</footer>
    <script src="script.js" type="text/javascript"></script>
</body>
</html>

