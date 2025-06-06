<?php
if ($_SERVER["REQUEST_METHOD"] = "POST") {
    require_once "conexion.php";
    $data = json_decode(file_get_contents("php://input"), true);

    $id_Acceso = $data[''] ?? null;
    $fecha_hora_acceso = $data['FeHoAcceso'] ?? null;
    $punto_acceso = $data['PuntoAcceso'] ?? null;
    $id_usuario = $data['Usuario'] ?? null;

    if ($fecha_hora_acceso && $punto_acceso && $id_usuario) {
        $stmt = $mysql->prepare("Insert INTO acceso(fecha_hora_acceso, punto_acceso, id_usuario) VALUES ( ?, ?, ?)");
        $stmt->bind_param("sss", $fecha_hora_acceso, $punto_acceso, $id_usuario);

        if ($stmt->execute())
            echo json_encode(["success" => true, "Entrada Registrada"]);

        else
            echo json_encode(["success" => false, "error" => $stmt->error]);
        $stmt->close();
    } else
        echo json_encode(["success" => false, "error" => "Datos Incompletos"]);

    $mysql->close();
}
