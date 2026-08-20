<?php

$conexion = mysqli_connect("localhost", "root", "", "bodymove");

if (!$conexion) {
    die("ERROR: No se pudo conectar a la base de datos.");
}

echo "CONEXIÓN EXITOSA CON MYSQL Y BODYMOVE";

?>