<?php

require_once "conexion.php";
require_once "Solicitud.php";

$solicitud = new Solicitud($conexion);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $servicio = $_POST["servicio"];
    $mensaje = $_POST["mensaje"];

    $resultado = $solicitud->modificar(
        $id,
        $nombre,
        $correo,
        $telefono,
        $servicio,
        $mensaje
    );

    if ($resultado) {

        echo "Registro actualizado correctamente.<br><br>";

        echo '<a href="listar.php">Volver a la lista</a>';

    } else {

        echo "No fue posible actualizar el registro.";

    }

} else {

    echo "Solicitud no válida.";

}

?>