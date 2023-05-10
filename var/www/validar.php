<?php 

    session_start();
    $_SESSION['inputs'] = array();
    $ok = true; 
    
    if(isset($_POST['submit'])) {
        $nombre = $_POST['nombre'];
        $desc = $_POST['desc'];
        $plataforma = $_POST['plat'];
        $url = $_POST['url'];

        // valida el campo de nombre
        if (empty($nombre)) {
            $_SESSION['error-nombre'] = true;
            $ok = false;
        }
        else if (strlen($nombre) > 30) {
            $_SESSION['error-nombre'] = true;
            $ok = false;
        }
        else {
            $_SESSION['inputs']['nombre'] = $nombre; 
        }

        // valida longitud del campo descripcion (255 char max)
        if(strlen($desc) > 255) {
            $_SESSION['error-desc'] = true;
            $ok = false;
        }
        else {
            $_SESSION['inputs']['desc'] = $desc; 
        }

        // valida el campo de  plataforma 
        if (empty($plat)) {
            $_SESSION['error-plat'] = true;
            $ok = false;
        }
        else {
            $_SESSION['inputs']['plat'] = $plat; 
        }

        // valida longitud del campo de url (80 char max)
        if(strlen($desc) > 80) {
            $_SESSION['error-url'] = true;
            $ok = false;
        }
        else {
            $_SESSION['inputs']['url'] = $url; 
        }

        // valida que se haya cargado una imagen 
        if (empty($_FILES["img"]["name"])) {
            $_SESSION['error-img'] = true; 
            $ok = false;
        } else {
            $_SESSION['inputs']['img'] = $_FILES["img"]["tmp_name"];
        }
    }

    if (ok) {
        $_SESSION['validado'] = "Juego creado correctamente";
        unset($_SESSION['inputs']);
    }

?>