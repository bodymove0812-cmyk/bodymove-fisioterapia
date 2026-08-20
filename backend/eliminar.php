<?php

require_once "conexion.php";
require_once "Solicitud.php";

$solicitud = new Solicitud($conexion);

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $resultado = $solicitud->eliminar($id);

    if ($resultado) {

        echo "Registro eliminado correctamente.<br><br>";

        echo '<a href="listar.php">Volver a la lista</a>';

    } else {

        echo "No fue posible eliminar el registro.";

    }

} else {

    echo "No se especificó el registro que desea eliminar.";

}

?>