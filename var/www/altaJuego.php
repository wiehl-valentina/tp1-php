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
        <input type="text" placeholder="Nombre" id="nombre" name="nombre"  class="input inputs">
 
        <label for="file">Añadir imagen</label>
        <input type="file" placeholder="Imagen" name="img" class="input">
        
        <textarea name="desc" id="desc" name="desc"  class="input inputs" placeholder="Ingrese una descripcion" cols="10" rows="8" wrap="hard"></textarea>

        <select id="plataforma" name="plat" class="input inputs">
            <option value="empty">Selecciona una plataforma</option>
            <option value="plat1">PC</option>
            <option value="plat2">PlayStation</option>
        </select>

        <input type="url" placeholder="https://www.example.com" name="url" id="url" class="input inputs" required>

        <select id="genero" name="genero" class="input">
            <option value="5">Selecciona un genero</option>
            <option value="1">Disparos</option>
            <option value="2">Accion</option>
            <option value="3">Terror</option>
            <option value="4">Estrategia</option>
        </select>    
        <input type="submit" value="Agregar" class="boton">
    </form>
    <a href="index.php"><button class="boton">Volver</button></a>
    <footer>Andres Hoyos Garcia | Valentina Wiehl - 2023</footer>
    <script src="script.js" type="text/javascript"></script>
</body>
</html>

