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
    <header><img src="https://community.akamai.steamstatic.com/public/shared/images/responsive/header_logo.png" height="50em"></header>
    
    <form id="add" action="conexionBD.php" method="post">
        <h2>Agregar juego nuevo</h2>
        <input type="text" placeholder="Nombre" id="nombre" name="nombre"  class="input inputs">
 
        <label for="file">Añadir imagen</label>
        <input type="file" placeholder="Imagen" name="img" class="input inputs">
        
        <textarea name="desc" id="desc" name="desc"  class="input inputs" placeholder="Ingrese una descripcion" cols="10" rows="8" wrap="hard"></textarea>

        <select id="plataforma" name="plat" class="input inputs">
            <option value="empty">Selecciona una plataforma</option>
            <option value="plat1">PC</option>
            <option value="plat2">PlayStation</option>
            <option value="mobile">Mobile</option>
        </select>
      
        <select id="genero" name="genero" class="input">
            <option value="empty">Selecciona un genero</option>
            <option value="1">Disparos</option>
            <option value="2">Accion</option>
            <option value="3">Terror</option>
            <option value="4">Estrategia</option>
        </select>
        
        <input type="url" placeholder="URL" name="url" id="url" class="input inputs">
        
        <input type="submit" value="Agregar juego" id="agregar" class="boton">
    </form>
    <a href="index.php"><button class="boton">Volver</button></a>

    <footer>Andres Hoyos Garcia | Valentina Wiehl - 2023</footer>

    <script src="script.js" type="text/javascript"></script>
</body>

</html>

