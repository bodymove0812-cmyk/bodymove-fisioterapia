<?php

class Solicitud
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    // INSERTAR
    public function insertar($nombre, $correo, $telefono, $servicio, $mensaje)
    {
        $sql = "INSERT INTO solicitudes
                (nombre, correo, telefono, servicio, mensaje)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bind_param(
            "sssss",
            $nombre,
            $correo,
            $telefono,
            $servicio,
            $mensaje
        );

        return $stmt->execute();
    }

    // LISTAR
    public function listar()
    {
        $sql = "SELECT * FROM solicitudes ORDER BY id DESC";

        return $this->conexion->query($sql);
    }

    // MODIFICAR
    public function modificar(
        $id,
        $nombre,
        $correo,
        $telefono,
        $servicio,
        $mensaje
    )
    {
        $sql = "UPDATE solicitudes
                SET nombre = ?,
                    correo = ?,
                    telefono = ?,
                    servicio = ?,
                    mensaje = ?
                WHERE id = ?";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bind_param(
            "sssssi",
            $nombre,
            $correo,
            $telefono,
            $servicio,
            $mensaje,
            $id
        );

        return $stmt->execute();
    }

    // ELIMINAR
    public function eliminar($id)
    {
        $sql = "DELETE FROM solicitudes WHERE id = ?";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }
}

?>