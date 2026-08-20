<?php

require_once "conexion.php";
require_once "Solicitud.php";

$solicitud = new Solicitud($conexion);

$resultados = $solicitud->listar();

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Solicitudes BodyMove</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f4f8ff;
            padding: 40px;
        }

        .contenedor {
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #0d6efd;
            color: white;
        }

        .boton {
            display: inline-block;
            padding: 7px 10px;
            margin: 2px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
        }

        .modificar {
            background: #198754;
        }

        .eliminar {
            background: #dc3545;
        }

    </style>

</head>

<body>

<div class="contenedor">

    <h1>Solicitudes BodyMove</h1>

    <table>

        <thead>

            <tr>

                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Servicio</th>
                <th>Mensaje</th>
                <th>Acciones</th>

            </tr>

        </thead>

        <tbody>

        <?php

        if ($resultados && $resultados->num_rows > 0) {

            while ($fila = $resultados->fetch_assoc()) {

        ?>

            <tr>

                <td>
                    <?php echo $fila["id"]; ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($fila["nombre"]); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($fila["correo"]); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($fila["telefono"]); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($fila["servicio"]); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($fila["mensaje"]); ?>
                </td>

                <td>

                    <a
                        class="boton modificar"
                        href="editar.php?id=<?php echo $fila["id"]; ?>"
                    >
                        Modificar
                    </a>

                    <a
                        class="boton eliminar"
                        href="eliminar.php?id=<?php echo $fila["id"]; ?>"
                        onclick="return confirm('¿Está seguro de eliminar este registro?');"
                    >
                        Eliminar
                    </a>

                </td>

            </tr>

        <?php

            }

        } else {

        ?>

            <tr>

                <td colspan="7">
                    No hay registros en la base de datos.
                </td>

            </tr>

        <?php

        }

        ?>

        </tbody>

    </table>

</div>

</body>

</html>