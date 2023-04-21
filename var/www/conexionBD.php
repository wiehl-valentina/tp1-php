<?php
$host = 'localhost';
$dbname = 'juegos_online';
$user = 'root';
$pass = '';

try {

    $con = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    } catch(PDOException $e) {
        echo "Error al conectarse a la base de datos: " . $e->getMessage() . " <br>";
    }


    $con->beginTransaction();

$genero_vacios = $con->query('SELECT id FROM generos;');
if ($genero_vacios->rowCount() == 0) {
    $con->exec("INSERT INTO generos (id, nombre) VALUES (1, 'Disparos')");
    $con->exec("INSERT INTO generos (id, nombre) VALUES (2, 'Accion')");
    $con->exec("INSERT INTO generos (id, nombre) VALUES (3, 'Terror')");
    $con->exec("INSERT INTO generos (id, nombre) VALUES (4, 'Estrategia')");
    echo "Generos cargados <br>";
}

$plat_vacias = $con->query('SELECT id FROM plataformas;');
if ($plat_vacias->rowCount() == 0) {
    $con->exec("INSERT INTO plataformas (id, nombre) VALUES (1, 'PC')");
    $con->exec("INSERT INTO plataformas (id, nombre) VALUES (2, 'PlayStation')");
    $con->exec("INSERT INTO plataformas (id, nombre) VALUES (3, 'Mobile')");
    echo "Plataformas cargadas <br>";
}

if($_POST){
    $nombre = $_POST["nombre"];
    $desc = $_POST["desc"];
    $url = $_POST["url"];
    $genero = $_POST["genero"];
    $plat = $_POST["plataforma"];

    $query = "INSERT INTO juegos (nombre, descripcion, url, id_genero, id_plataforma) VALUES ('$nombre', '$desc', '$url', '$genero', '$plat')";
    $con->exec($query);
    header('Location: index.php');
    echo "Juego guardado";
}

$con->commit();
$con = null;

?>
