<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear juego</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Steam_icon_logo.svg/2048px-Steam_icon_logo.svg.png">
</head>
<body class="newgame">
    <header><img src="https://community.akamai.steamstatic.com/public/shared/images/responsive/header_logo.png" height="50em"></header>
    
    <form class="add" id="add" action="conexionBD.php" method="POST">
        <h2>Agregar juego nuevo</h2>
        <input type="text" placeholder="Nombre" id="nombre" name="nombre"  class="text-type" required>
        <label for="file">Añadir imagen</label>
        <input type="file" placeholder="Imagen" id="imagen" name="imagen" required>
        
        <textarea name="desc" id="desc" class="text-type" placeholder="Ingrese una descripcion" cols="10" rows="8" wrap="hard" maxlength="255" required ></textarea>

        <select id="plat" name="plataforma" required>
            <option value="">Selecciona una plataforma</option>
            <option value="1">PC</option>
            <option value="2">PlayStation</option>
            <option value="3">Mobile</option>
        </select>

        <input type="url" placeholder="URL" name="url" id="url" class="text-type" required>

        <select id="genero" name="genero">
            <option value="">Selecciona un genero</option>
            <option value="1">Disparos</option>
            <option value="2">Accion</option>
            <option value="3">Terror</option>
            <option value="4">Estrategia</option>
        </select>    
        <input type="submit" value="Agregar juego" class="boton">
    </form>

    <a href="index.php"><button class="boton">Volver</button></a>

    <footer>Andres Hoyos Garcia | Valentina Wiehl - 2023</footer>

    <script src="script.js" type="text/javascript"></script>
</body>

</html>

