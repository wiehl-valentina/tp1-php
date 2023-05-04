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
    <header><img src="https://community.akamai.steamstatic.com/public/shared/images/responsive/header_logo.png" height="50em"></header>
    
    <form class="filters">
        <p>Buscar juego:</p>
        <input type="text" placeholder="Nombre" class="text-input">
        <input type="text" placeholder="Genero" class="text-input">

        <select name="plataforma" id="plat" class="input">
            <option value="empty">Plataforma</option>
            <option value="pc">PC</option>
            <option value="ps">PlayStation</option>
            <option value="mobile">Mobile</option>
        </select>

        <select id="ordenar" name="ordenar" class="input">
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
    </div>

    <a href="altaJuego.php"><button class="boton">Agregar juego</button></a>

    <footer>Andres Hoyos Garcia | Valentina Wiehl - 2023</footer>
</body>
</html>