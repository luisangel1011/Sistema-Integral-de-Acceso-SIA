<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "conexion.php";

    // Leer los parámetros enviados por POST
    $Nombre = $_POST['Nombre'] ?? null;
    $Correo = $_POST['Correo'] ?? null;
    $Contrasena = $_POST['Contrasena'] ?? null;
    $TipUsuario = $_POST['TipoUsuario'] ?? null;
    $FechaActual = $_POST['FActual'] ?? null;
    $FechaVigencia = $_POST['FVigencia'] ?? null;

    // Validar que los datos sean correctos
    if ($Nombre && $Correo && $Contrasena && $TipUsuario && $FechaActual && $FechaVigencia) {
        // Proceso de registro
        $cont = 1;
        $id = "Inv" . $cont;

        // Comprobar si el id ya existe
        $query = "SELECT id_usuario FROM usuario WHERE id_usuario = ?";
        $stmt = $mysql->prepare($query);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->store_result();

        while ($stmt->num_rows > 0) {
            $cont++;
            $id = "Inv" . $cont;
            $stmt->execute();
            $stmt->store_result();
        }

        $stmt->close();

        // Asegurarnos de que las fechas sean cadenas en formato Y-m-d
        $FechaActual = date("Y-m-d", strtotime($FechaActual));
        $FechaVigencia = date("Y-m-d", strtotime($FechaVigencia));

        // Construir la consulta SQL para insertar el nuevo usuario
        $queryInsert = "INSERT INTO usuario(id_usuario, nombre, correo_electronico, tipo_usuario, contrasena, estado_cuenta, fecha_Creacion, nss, Vigencia) 
                        VALUES ('$id', '$Nombre', '$Correo', '$TipUsuario', '$Contrasena', 'Activo', '$FechaActual', '0', '$FechaVigencia')";

        // Ejecutar la consulta de inserción
        if ($mysql->query($queryInsert)) {
            echo json_encode(["success" => true, "message" => "Entrada Registrada"]);
        } else {
            echo json_encode(["success" => false, "error" => $mysql->error]);
        }

    } else {
        echo json_encode(["success" => false, "error" => "Datos Incompletos"]);
    }

    $mysql->close();
}
?>
