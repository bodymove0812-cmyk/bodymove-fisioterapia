<?php

require_once "conexion.php";
require_once "Solicitud.php";

$solicitud = new Solicitud($conexion);

$id = $_GET["id"] ?? null;

if (!$id) {
    die("No se especificó el registro que desea modificar.");
}

$resultados = $solicitud->listar();

$registro = null;

while ($fila = $resultados->fetch_assoc()) {

    if ($fila["id"] == $id) {
        $registro = $fila;
        break;
    }
}

if (!$registro) {
    die("El registro no existe.");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar solicitud | BodyMove</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f4f8ff;
            margin: 0;
            padding: 40px;
        }

        .contenedor {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }

        h1 {
            text-align: center;
            color: #141f98;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        button {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #0d6efd;
            color: white;
            font-size: 17px;
            cursor: pointer;
        }

    </style>

</head>

<body>

<div class="contenedor">

    <h1>Modificar solicitud</h1>

    <form method="POST" action="actualizar.php">

        <input
            type="hidden"
            name="id"
            value="<?php echo $registro["id"]; ?>"
        >

        <label>Nombre completo</label>

        <input
            type="text"
            name="nombre"
            value="<?php echo htmlspecialchars($registro["nombre"]); ?>"
            required
        >

        <label>Correo electrónico</label>

        <input
            type="email"
            name="correo"
            value="<?php echo htmlspecialchars($registro["correo"]); ?>"
            required
        >

        <label>Teléfono</label>

        <input
            type="text"
            name="telefono"
            value="<?php echo htmlspecialchars($registro["telefono"]); ?>"
            required
        >

        <label>Servicio</label>

        <select name="servicio" required>

            <option value="Fisioterapia"
                <?php if ($registro["servicio"] == "Fisioterapia") echo "selected"; ?>>
                Fisioterapia
            </option>

            <option value="Valoración funcional"
                <?php if ($registro["servicio"] == "Valoración funcional") echo "selected"; ?>>
                Valoración funcional
            </option>

            <option value="Rehabilitación"
                <?php if ($registro["servicio"] == "Rehabilitación") echo "selected"; ?>>
                Rehabilitación
            </option>

            <option value="Fisioterapia deportiva"
                <?php if ($registro["servicio"] == "Fisioterapia deportiva") echo "selected"; ?>>
                Fisioterapia deportiva
            </option>

        </select>

        <label>Mensaje</label>

        <textarea
            name="mensaje"
            required
        ><?php echo htmlspecialchars($registro["mensaje"]); ?></textarea>

        <button type="submit">
            Guardar cambios
        </button>

    </form>

</div>

</body>

</html>