<?php
require_once "conexion.php";



// Obtener el día si es necesario (por ejemplo, para filtrar)
$selectedDay = isset($_GET['dia']) ? $_GET['dia'] : '';

// Consulta para obtener las asistencias
$sql = "SELECT 
            id_Acceso, 
            Fecha_Hora_acceso, 
            punto_acceso, 
            id_usuario 
        FROM asistencias";

// Filtrar por día si se pasa como parámetro
if ($selectedDay !== '') {
    $sql .= " WHERE DAYNAME(Fecha_Hora_acceso) = '$selectedDay'";
}

$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Crear un array para almacenar los resultados
    $asistencias = array();

    while ($row = $result->fetch_assoc()) {
        $asistencia = array(
            "id_Acceso" => $row["id_Acceso"],
            "Fecha_Hora_acceso" => $row["Fecha_Hora_acceso"],
            "punto_acceso" => $row["punto_acceso"],
            "id_usuario" => $row["id_usuario"]
        );
        array_push($asistencias, $asistencia);
    }

    // Devolver los datos en formato JSON
    echo json_encode($asistencias);
} else {
    // Si no hay resultados, devolver un mensaje vacío
    echo json_encode([]);
}

// Cerrar conexión
$conn->close();
