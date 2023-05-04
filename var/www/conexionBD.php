<?php
function connect(){
    $host = '127.0.0.1';
    $dbname = 'juegos_online';
    $user = 'root';
    $pass = 'andyholes';

    try {

        $con = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch(PDOException $e) {
        echo "Error al conectarse a la base de datos: " . $e->getMessage() . " <br>";
    }
    return $con;
}

function loadData(){
    
    $con = connect();
    $con->beginTransaction();

    $genero_vacios = $con->query('SELECT id FROM generos;');
    if ($genero_vacios->rowCount() == 0) {
        $con->exec("INSERT INTO generos (id, nombre) VALUES (1, 'Sin genero')");
        $con->exec("INSERT INTO generos (id, nombre) VALUES (2, 'Disparos')");
        $con->exec("INSERT INTO generos (id, nombre) VALUES (3, 'Accion')");
        $con->exec("INSERT INTO generos (id, nombre) VALUES (4, 'Terror')");
        $con->exec("INSERT INTO generos (id, nombre) VALUES (5, 'Estrategia')");
        echo "<h1 style='
        color:white;
        background:black;
        width:100%;
        text-align:center;'>
        Generos cargados!</h1>";    
    }
    $plat_vacias = $con->query('SELECT id FROM plataformas;');
    if ($plat_vacias->rowCount() == 0) {
        $con->exec("INSERT INTO plataformas (id, nombre) VALUES (1, 'PC')");
        $con->exec("INSERT INTO plataformas (id, nombre) VALUES (2, 'PlayStation')");
        $con->exec("INSERT INTO plataformas (id, nombre) VALUES (3, 'Mobile')");
        echo "<h1 style='
        color:white;
        background:black;
        width:100%;
        text-align:center;'>
        Plataformas cargadas!</h1>";    
    }
    $con->commit();
}

?>
