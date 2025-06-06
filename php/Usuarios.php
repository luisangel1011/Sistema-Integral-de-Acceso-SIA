<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    require_once "conexion.php";

    // Obtener las variables desde el GET
    $correo = $_GET['Correo'];
    $contrasena = $_GET['contrasena'];

    // Validar que las variables no estén vacías
    if (empty($correo) || empty($contrasena)) {
        echo json_encode(["error" => "Parámetros faltantes"]);
        exit();
    }

    // Consulta SQL con parámetros preparados para evitar inyección SQL
    $query = "SELECT * FROM usuario WHERE correo_electronico = ? AND contrasena = ? LIMIT 1";  // LIMIT 1 para solo obtener un usuario
    
    // Preparar la consulta
    if ($stmt = $mysql->prepare($query)) {
        // Vincular los parámetros
        $stmt->bind_param("ss", $correo, $contrasena);
        
        // Ejecutar la consulta
        $stmt->execute();
        
        // Obtener el resultado
        $resultado = $stmt->get_result();
        
        // Verificar si hay resultados
        if ($resultado->num_rows > 0) {
            // Solo obtenemos un usuario, ya que LIMIT 1 fue especificado
            $row = $resultado->fetch_assoc();
            echo json_encode($row);  // Retornamos el objeto de un solo usuario
        } else {
            // Si no hay coincidencias, retornar un objeto vacío
            echo json_encode(["error" => "Credenciales incorrectas"]);
        }
        
        // Cerrar la consulta y la conexión
        $stmt->close();
    } else {
        echo json_encode(["error" => "Error en la consulta SQL"]);
    }

    $mysql->close();
}
?>
