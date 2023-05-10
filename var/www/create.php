<?php 
    include ('conexionBD.php');
    $nombre = $_POST["nombre"];
    $desc = $_POST["desc"];
    $url = $_POST["url"];
    $genero = $_POST["genero"];
    $plat = $_POST["plataforma"];

    $image = base64_encode(file_get_contents($_FILES['imagen']['tmp_name']));
    $type = $_FILES['imagen']['type'];

    $query = "INSERT INTO juegos (nombre, imagen, tipo_imagen, descripcion, url, id_genero, id_plataforma) VALUES ('$nombre', '$image', '$type', '$desc', '$url', '$genero', '$plat')";

    $con = connect();
    $con -> beginTransaction();
    $con->exec($query);
    header("Location: index.php");
    $con->commit();
    $con=null;
?>