<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    require_once 'conexion.php';

    $id = $_GET['id'];
    //$_GET["id"]
    $query = "select * from usuario where id_usuario='" . $id . "'";
    $resultado = $mysql->query($query);
    if ($mysql->affected_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $array = $row;
        }
        echo json_encode($array);
    }

    $resultado->close();
    $mysql->close();
}
