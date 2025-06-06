<?php
$mysql = new mysqli("localhost", "root", "", "sia_db",);
if ($mysql->connect_error) {
    die(json_encode(["status" => "error", "message" => "Error de conexión: " . $mysql->connect_error]));
}
