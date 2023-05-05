<?php 

    if(isset($_GET['submit'])) {
        if (empty($nombre)) {
            echo "<p>Ingrese un nombre.</p>";
        }
        if (strlen($desc) > 255) {
            echo "<p>La descripcion supera el maximo de caracteres permitidos.</p>";
        }
        if (strlen($url) > 80) {
            echo "<p>La URL supera el maximo de caracteres permitidos.</p>";
        }
    }

?>