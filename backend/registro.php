<?php

require_once "conexion.php";
require_once "Solicitud.php";

$solicitud = new Solicitud($conexion);

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $servicio = $_POST["servicio"];
    $mensajeUsuario = $_POST["mensaje"];

    if (
        !empty($nombre) &&
        !empty($correo) &&
        !empty($telefono) &&
        !empty($servicio) &&
        !empty($mensajeUsuario)
    ) {

        if (
            $solicitud->insertar(
                $nombre,
                $correo,
                $telefono,
                $servicio,
                $mensajeUsuario
            )
        ) {
            $mensaje = "Solicitud registrada correctamente.";
        } else {
            $mensaje = "No fue posible registrar la solicitud.";
        }

    } else {

        $mensaje = "Por favor, completa todos los campos.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BodyMove | Registro</title>

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

        button:hover {
            background: #141f98;
        }

        .mensaje {
            margin-bottom: 20px;
            padding: 12px;
            border-radius: 8px;
            background: #e8f5e9;
            color: #1b5e20;
            text-align: center;
        }

    </style>

</head>

<body>

<div class="contenedor">

    <h1>Solicitud de valoración BodyMove</h1>

    <?php if (!empty($mensaje)) { ?>

        <div class="mensaje">
            <?php echo htmlspecialchars($mensaje); ?>
        </div>

    <?php } ?>

    <form method="POST" action="">

        <label>Nombre completo</label>

        <input
            type="text"
            name="nombre"
            required
        >

        <label>Correo electrónico</label>

        <input
            type="email"
            name="correo"
            required
        >

        <label>Teléfono</label>

        <input
            type="text"
            name="telefono"
            required
        >

        <label>Servicio</label>

        <select name="servicio" required>

            <option value="">Selecciona un servicio</option>

            <option value="Fisioterapia">
                Fisioterapia
            </option>

            <option value="Valoración funcional">
                Valoración funcional
            </option>

            <option value="Rehabilitación">
                Rehabilitación
            </option>

            <option value="Fisioterapia deportiva">
                Fisioterapia deportiva
            </option>

        </select>

        <label>Mensaje</label>

        <textarea
            name="mensaje"
            placeholder="Cuéntanos brevemente el motivo de tu consulta..."
            required
        ></textarea>

        <button type="submit">
            Registrar solicitud
        </button>

    </form>

</div>

</body>

</html>