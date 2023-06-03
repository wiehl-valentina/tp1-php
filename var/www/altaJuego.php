<?php 
    session_start();
    ob_start();
?>
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
    
    <form action="altaJuego.php" method="POST" enctype="multipart/form-data" class="add" id="add">
        <h2>Agregar juego nuevo</h2>
<<<<<<< HEAD
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
=======
        <input type="text" placeholder="Nombre" id="nombre" name="nombre"  class="input inputs" value="<?php echo isset($_POST['nombre']) ? $_POST['nombre'] : ''; ?>">

        <label for="file">Añadir imagen</label>
        <input type="file" placeholder="Imagen" name="imagen" class="input inputs">
        
        <textarea name="descripcion" id="desc"  class="input inputs" placeholder="Ingrese una descripcion" cols="10" rows="8" wrap="hard"><?php echo isset($_POST['descripcion']) ? $_POST['descripcion'] : ''; ?></textarea>

        <?php 
            include ('conexionBD.php');
            $con = connect();
            $plat = $con -> query("SELECT * FROM plataformas");?>
            <select name="plataforma" class="input">
            <option value="">Plataforma</option>
            <?php while($row = $plat -> fetch(PDO::FETCH_ASSOC)){?><option
            value="<?php echo $row['id'];?>" <?php if (isset($_POST['plataforma']) && ($_POST['plataforma'] == $row['id'])){echo 'selected';}?>><?php echo $row['nombre'];?></option>
            <?php };?>
        </select> 
            
        <input type="url" placeholder="https://www.example.com" name="url" id="url" class="input inputs" value="<?php echo isset($_POST['url']) ? $_POST['url'] : '';?>">

        <?php 
        $genres = $con -> query("SELECT * FROM generos");?>
        <select name="genero" class="input">
        <?php while($row = $genres -> fetch(PDO::FETCH_ASSOC)){?>
        <option value="<?php echo $row['id'];?>" <?php if (isset($_POST['genero']) && ($_POST['genero'] == $row["id"])) { echo 'selected';}?>><?php echo $row['nombre'];?></option>
        <?php };?>  
        </select>

        <input type="submit" value="Agregar Juego" id="agregar" class="boton">
    </form>
    <a href="index.php"><button class="boton-ppal">Volver</button></a>
    
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $hasErrors = false;

        if (empty($_POST["nombre"])) {
            $nombreErr = "El nombre es requerido";
            $hasErrors = true;
        }else{
            $nombre = htmlspecialchars($_POST["nombre"]);
        }
        
        // Validar el campo imagen
        if (empty($_FILES["imagen"]["tmp_name"])) {
            $imagenErr = "La imagen es requerida";
            $hasErrors = true;
        }else{
            $imagen = base64_encode(file_get_contents($_FILES['imagen']['tmp_name']));
            $type = $_FILES['imagen']['type'];
        }
        
        // Validar el campo descripción
        if (empty($_POST["descripcion"])) {
            $descripcionErr = "La descripción es requerida";
            $hasErrors = true;
        }else{
             $descripcion = $_POST["descripcion"];
            if (strlen($descripcion) > 255) {
                $descripcionErr = "La descripción debe tener máximo 255 caracteres";
                $hasErrors = true;
            }
        }
        
        // Validar el campo URL
        if (empty($_POST["url"])) {
            $urlErr = "La URL es requerida";
            $hasErrors = true;
        }else{
            $url = $_POST["url"];
            if (strlen($url) > 80) {
                $descripcionErr = "La url debe tener máximo 80 caracteres";
                $hasErrors = true;
            }
        }
        
        // Validar el campo plataforma
        if (empty($_POST["plataforma"])) {
            $plataformaErr = "La plataforma es requerida";
            $hasErrors = true;
        }else{
            $plataforma = $_POST["plataforma"];
        }

        //No valido el genero
        $genero = $_POST["genero"];

        if ($hasErrors){
            echo 'Por favor complete los campos requeridos';
        }else{
            $_SESSION['exito'] = "El juego se ha guardado correctamente";
            $query = "INSERT INTO juegos (nombre, imagen, tipo_imagen, descripcion, url, id_genero, id_plataforma) VALUES ('$nombre', '$imagen', '$type', '$descripcion', '$url', '$genero', '$plataforma')";
            header("Location: index.php");
            $con->beginTransaction();
            $con->exec($query);
            $con->commit();
            $con=null;
        }
    }
>>>>>>> f0925f92a465d498bb19996eb9a3480ea1b0353a
    ?>

    <footer>Andres Hoyos Garcia | Valentina Wiehl - 2023</footer>
    <script src="script.js" type="text/javascript"></script>
</body>
</html>

