<?php
// backend.php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "conexion.php";
session_start();

class Usuario
{
    protected $mysql;

    public function __construct($mysql)
    {
        $this->mysql = $mysql;
    }
    public function verConexion()
    {
        if ($this->mysql->connect_error) {
            die("Conexión fallida: " . $this->mysql->connect_error);
        }
    }
    public function GetSession()
    {
        if ((isset($_SESSION['matricula']) && !empty($_SESSION['matricula'])) && (isset($_SESSION["tipoUsuario"]) && !empty($_SESSION["tipoUsuario"])))
            echo json_encode(["status" => "success", "sesion" => $_SESSION['matricula'], "tipoUsuario" => $_SESSION["tipoUsuario"]]);
        else
            echo json_encode(["status" => "error"]);
    }
    public function CerrarSesion()
    {
        session_unset();
        session_destroy();
        echo json_encode(["status" => "success", "sesion" => "se borro"]);
    }

    public function RegistrarEntrada($fecha_hora_acceso, $punto_acceso, $id_usuario)
    {

        if ($fecha_hora_acceso && $punto_acceso && $id_usuario) {
            $stmt = $this->mysql->prepare("INSERT INTO acceso (fecha_hora_acceso, punto_acceso, id_usuario) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $fecha_hora_acceso, $punto_acceso, $id_usuario);

            if ($stmt->execute()) {
                echo json_encode(["success" => true, "message" => "Entrada Registrada"]);
            } else {
                echo json_encode(["success" => false, "error" => $stmt->error]);
            }

            $stmt->close();
        } else {
            echo json_encode(["success" => false, "error" => "Datos Incompletos"]);
        }
    }

    public function obtenerImagen($id)
    {


        // Ruta absoluta al archivo .jpg del usuario
        $ruta_imagen = __DIR__ . "/../PhotosDB/$id.jpg";

        if (file_exists($ruta_imagen)) {
            $contenido_imagen = file_get_contents($ruta_imagen);
            $imagen_base64 = base64_encode($contenido_imagen);

            echo json_encode([
                "status" => "success",
                "imagen" => $imagen_base64
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "mensaje" => "Imagen no encontrada"
            ]);
        }
    }

    public function GetUsuario($Correo, $Contrasena, $Matricula)
    {
        if ((!empty($Correo) && !empty($Contrasena)) && empty($Matricula)) {
            $query = "SELECT * FROM usuario WHERE correo_electronico = ? AND contrasena = ? LIMIT 1";
            $stmt = $this->mysql->prepare($query);
            $stmt->bind_param("ss", $Correo, $Contrasena);
        } elseif (empty($Correo) && empty($Contrasena) && !empty($Matricula)) {
            $query = "SELECT * FROM usuario WHERE id_usuario = ? LIMIT 1";
            $stmt = $this->mysql->prepare($query);
            $stmt->bind_param("s", $Matricula);
        } else {
            echo json_encode(["status" => "error", "message" => "Campos vacíos o inválidos"]);
            return;
        }

        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $row = $resultado->fetch_assoc();
            echo json_encode(["status" => "success", "user" => $row]);
        } else {
            echo json_encode(["status" => "error", "message" => "No encontro usuario"]);
        }

        $stmt->close();
    }

    public function EnviarNotificacion($mensaje, $destinatarios = [], $emisor)
    {
        $fecha = date("Y-m-d H:i:s");
        $query = "INSERT INTO notificacion (mensaje, fecha_envio, destinatario, id_usuario) VALUES (?, ?, ?, ?)";
        $stmt = $this->mysql->prepare($query);

        foreach ($destinatarios as $dest) {
            $stmt->bind_param("ssss", $mensaje, $fecha, $dest, $emisor);
            $stmt->execute();
        }
        echo json_encode(["status" => "success", "message" => "Notificaciones enviadas"]);
    }

    public function EnviarNotificacionGlobal($mensaje, $emisor)
    {
        $fecha = date("Y-m-d H:i:s");
        $queryUsuarios = "SELECT id_usuario FROM usuario";
        $usuarios = $this->mysql->query($queryUsuarios);
        $query = "INSERT INTO notificacion (mensaje, fecha_envio, destinatario, id_usuario) VALUES (?, ?, ?, ?)";
        $stmt = $this->mysql->prepare($query);

        while ($u = $usuarios->fetch_assoc()) {
            $dest = $u['id_usuario'];
            $stmt->bind_param("ssss", $mensaje, $fecha, $dest, $emisor);
            $stmt->execute();
        }
        echo json_encode(["status" => "success", "message" => "Notificación global enviada"]);
    }

    public function ObtenerNotificaciones($usuario)
    {
        $query = "SELECT * FROM notificacion WHERE destinatario = ? ORDER BY fecha_envio DESC";
        $stmt = $this->mysql->prepare($query);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $notificaciones = [];
        while ($fila = $result->fetch_assoc()) {
            $notificaciones[] = $fila;
        }
        echo json_encode($notificaciones);
    }

    public function ModificarUsuario($matricula, $nombre, $tipo_usuario, $Contrasena, $estado_cuenta, $fecha_Creacion, $nss, $genero)
    {
        try {
            // Validar que la matrícula no esté vacía
            if (empty($matricula)) {
                throw new Exception("La matrícula no puede estar vacía");
            }

            // Preparar la consulta SQL
            $query = 'UPDATE usuario 
                      SET nombre = ?, tipo_usuario = ?,contrasena = ?, estado_cuenta = ?, fecha_Creacion = ?, nss = ?, Genero = ? 
                      WHERE id_usuario = ?';

            $stmt = $this->mysql->prepare($query);

            if (!$stmt) {
                throw new Exception("Error al preparar la consulta: " . $this->mysql->error);
            }

            // Asociar los parámetros
            $stmt->bind_param("ssssssss", $nombre, $tipo_usuario, $Contrasena, $estado_cuenta, $fecha_Creacion, $nss, $genero, $matricula);

            // Ejecutar la consulta
            if (!$stmt->execute()) {
                throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
            }

            // Verificar si se modificó algún registro
            if ($stmt->affected_rows > 0) {
                echo json_encode(["status" => "success", "message" => "Usuario modificado exitosamente 
                  $Contrasena, $estado_cuenta, $fecha_Creacion, $nss, $genero, $matricula"]);
            } else {
                echo json_encode([
                    "status" => "warning",
                    "message" => "La consulta se ejecutó, pero no se modificó ningún registro",
                    "datos" => [
                        "matricula" => $matricula,
                        "nombre" => $nombre,
                        "tipo_usuario" => $tipo_usuario,
                        "genero" => $matricula
                    ]
                ]);
            }

            $stmt->close();
        } catch (Exception $e) {
            echo json_encode(["status" => "error", "message" => $e->getMessage()]);
        }
    }

    public function RegistrarUsuario($Matricula, $nombre, $correo, $tipo_usuario, $contrasena, $estado_cuenta, $fecha_Creacion, $nss, $Genero)
    {
        if (!empty($Matricula) && !empty($nombre) && !empty($tipo_usuario) && !empty($estado_cuenta) && !empty($fecha_Creacion) && !empty($nss) && !empty($Genero)) {
            $query = "INSERT INTO usuario (id_usuario, nombre, correo_electronico, tipo_usuario, contrasena, estado_cuenta, fecha_Creacion, nss, Genero) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)";
            $stmt = $this->mysql->prepare($query);

            $stmt->bind_param(
                "sssssssss",
                $Matricula,
                $nombre,
                $correo,
                $tipo_usuario,
                $contrasena,
                $estado_cuenta,
                $fecha_Creacion,
                $nss,
                $Genero
            );

            if ($stmt->execute()) {
                echo json_encode(["status" => "success", "message" => "Usuario registrado exitosamente"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Error al registrar el usuario"]);
            }

            $stmt->close();
        } else {
            echo json_encode(["status" => "error", "message" => "Todos los campos deben estar completos"]);
        }
    }

    public function EliminarUsuario($Matricula)
    {
        if (!empty($Matricula)) {
            $query = "DELETE FROM usuario WHERE id_usuario=?";
            $stmt = $this->mysql->prepare($query);

            $stmt->bind_param("s", $Matricula);

            if ($stmt->execute()) {
                echo json_encode(["status" => "success", "message" => "Usuario eliminado exitosamente"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Error al eliminar el usuario"]);
            }

            $stmt->close();
        } else {
            echo json_encode(["status" => "error", "message" => "La matrícula no puede estar vacía"]);
        }
    }

    public function GetUsuarios()
    {
        $usuarios = array();
        $query = "SELECT * FROM usuario";
        if ($stmt = $this->mysql->prepare($query)) {
            $stmt->execute();
            $resultado = $stmt->get_result();
            while ($fila = $resultado->fetch_assoc()) {
                $usuarios[] = $fila;
            }
            header('Content-Type: application/json');
            echo json_encode($usuarios);
            $stmt->close();
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Error en la consulta']);
        }
    }

    public function GetAsistencia($Matricula)
    {
        $accesos = array();
        if ($Matricula) {
            $query = "SELECT * FROM acceso WHERE id_usuario = ?";
            $stmt = $this->mysql->prepare($query);
            $stmt->bind_param("s", $Matricula);
        } else {
            $query = "SELECT * FROM accesos";
            $stmt = $this->mysql->prepare($query);
        }

        if ($stmt) {
            $stmt->execute();
            $resultado = $stmt->get_result();
            while ($fila = $resultado->fetch_assoc()) {
                $accesos[] = $fila;
            }
            header('Content-Type: application/json');
            echo json_encode($accesos);
            $stmt->close();
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Error en la consulta']);
        }
    }
    public function ConversionJPG($archivoTemporal, $rutaDestinoJPG)
    {
        if (!file_exists($archivoTemporal)) {

            return false;
        } else {
            $info = getimagesize($archivoTemporal);
            if (!$info) return false;

            $mime = $info['mime'];
            $imagen = false;

            switch ($mime) {
                case 'image/jpeg':
                    $imagen = imagecreatefromjpeg($archivoTemporal);
                    break;
                case 'image/png':
                    $imagen = imagecreatefrompng($archivoTemporal);
                    break;
                case 'image/gif':
                    $imagen = imagecreatefromgif($archivoTemporal);
                    break;
                case 'image/webp':
                    if (function_exists('imagecreatefromwebp'))
                        $imagen = imagecreatefromwebp($archivoTemporal);
                    break;
                case 'image/bmp':
                case 'image/x-ms-bmp':
                    if (function_exists('imagecreatefrombmp'))
                        $imagen = imagecreatefrombmp($archivoTemporal);
                    break;
                case 'image/wbmp':
                    $imagen = imagecreatefromwbmp($archivoTemporal);
                    break;
                case 'image/avif':
                    if (function_exists('imagecreatefromavif'))
                        $imagen = imagecreatefromavif($archivoTemporal);
                    break;
                default:
                    return false;
            }

            if (!$imagen) return false;

            $resultado = imagejpeg($imagen, $rutaDestinoJPG, 85);
            imagedestroy($imagen);
            return $resultado ? true : false;
        }
    }
    public function GetImagen($Imagen, $matricula)
    {
        if (isset($Imagen)) {

            $archivoTmp = $Imagen['tmp_name'];

            $info = getimagesize($archivoTmp);
            $mime = $info['mime'];
            $destino = "../PhotosDB/" . $matricula . ".jpg";
            if ($mime === 'image/jpeg') {



                if (!file_exists("../PhotosDB/")) {
                    mkdir("../PhotosDB/", 0777, true);
                }

                if (move_uploaded_file($archivoTmp, $destino)) {
                    file_put_contents("log.txt", json_encode($_FILES['imagen']) . "\n", FILE_APPEND);
                    echo json_encode(["status" => "success", "message" => "imagen ha sido subida."]);
                } else {
                    file_put_contents("log.txt", json_encode($_FILES['imagen']) . "\n", FILE_APPEND);
                    echo json_encode(["status" => "error", "message" => "Problemas al subir el archivo."]);;
                }
            } else {

                if ($this->ConversionJPG($archivoTmp,  $destino)) {
                    file_put_contents("log.txt", json_encode($_FILES['imagen']) . "\n", FILE_APPEND);
                    echo json_encode(["status" => "success", "message" => "imagen ha sido subida."]);
                } else {
                    file_put_contents("log.txt", json_encode($_FILES['imagen']) . "\n", FILE_APPEND);
                    echo json_encode(["status" => "error", "message" => "Problemas al subir el archivo."]);;
                }
            }
        } else {
            echo "No se recibió ninguna imagen.";
        }
    }




    public function SetUsuario($id_usuario, $Nombre, $Correo, $TipoUsuario, $Contrasena, $FActual, $FVigencia, $genero)
    {
        $query = "INSERT INTO usuario 
            (id_usuario, nombre, correo_electronico, tipo_usuario, contrasena, estado_cuenta, fecha_Creacion, nss, Vigencia, Genero) 
            VALUES (?, ?, ?, ?, ?, 'Activo', ?, NULL, ?, ?)";

        $stmt = $this->mysql->prepare($query);

        if (!$stmt) {
            echo json_encode(["status" => "error", "message" => "Error en prepare: " . $this->mysql->error]);
            return;
        }

        $stmt->bind_param("ssssssss", $id_usuario, $Nombre, $Correo, $TipoUsuario, $Contrasena, $FActual, $FVigencia, $genero);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Usuario registrado correctamente"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error al ejecutar la consulta: " . $stmt->error]);
        }

        $stmt->close();
    }

    public function CountUsuario($Terminacion)
    {
        $query = "SELECT COUNT(*) as total FROM usuario WHERE id_usuario LIKE ?";
        $stmt = $this->mysql->prepare($query);
        $terminacionLike = $Terminacion . "%";
        $stmt->bind_param("s", $terminacionLike);
        $stmt->execute();

        $resultado = $stmt->get_result();
        $fila = $resultado->fetch_assoc();
        $stmt->close();

        return $fila['total'] ?? 0;
    }

    public function inicioSesion($Matricula, $TipUsuario)
    {
        $_SESSION["matricula"] = $Matricula;
        $_SESSION["tipoUsuario"] = $TipUsuario;
        echo json_encode(["status" => "success", "Mensaje" => $Matricula]);
    }

    public function RegistrarInvitado($Terminacion, $Nombre, $Correo, $Contrasena, $genero)
    {
        $total = $this->CountUsuario($Terminacion);
        $FActual = date('Y-m-d');
        $FVigencia = date('Y-m-d', strtotime('+1 day'));
        $nuevoID = $Terminacion . ($total + 1);

        $this->SetUsuario($nuevoID, $Nombre, $Correo, "Invitado", $Contrasena, $FActual, $FVigencia, $genero);
    }

    public function VerUsuario()
    {
        if (!empty($_SESSION["matricula"])) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "NoSuccess"]);
        }
    }
}

// ========================== PROCESADOR ==========================
if (!isset($_POST['clase'])) {
    echo json_encode(["status" => "error", "message" => "No se recibió la clase"]);
    exit();
}

$usuario = new Usuario($mysql);
$clase = $_POST['clase'];

switch ($clase) {
    case 'GetUsuario':
        $usuario->GetUsuario(
            $_POST['Usuario'] ?? null,
            $_POST['Contraseña'] ?? null,
            $_POST['Matricula'] ?? null
        );
        break;

    case 'GetAsistencia':
        $usuario->GetAsistencia(
            $_POST['matricula'] ?? null
        );
        break;
    case 'EliminarUsuario':
        $usuario->EliminarUsuario(
            $_POST['matricula'] ?? null
        );
        break;
    case "ObtenerImagen":
        $id = $_POST['id'] ?? '';
        $usuario->obtenerImagen($id);
        break;
    case 'ModificarUsuario':
        if (
            isset(
                $_POST['matricula'],
                $_POST['nombre'],
                $_POST['tipo_usuario'],
                $_POST['estado_cuenta'],
                $_POST['fecha_Creacion'],
                $_POST['nss'],
                $_POST['genero'],
                $_POST['contraseña']
            )
        ) {

            $matricula = trim($_POST['matricula']);
            $nombre = trim($_POST['nombre']);
            $tipo_usuario = trim($_POST['tipo_usuario']);
            $estado_cuenta = trim($_POST['estado_cuenta']);
            $fecha_Creacion = trim($_POST['fecha_Creacion']);
            $nss = trim($_POST['nss']);
            $genero = trim($_POST['genero']);
            $Contrasena = trim($_POST['contraseña']);


            $usuario->ModificarUsuario($matricula, $nombre, $tipo_usuario, $Contrasena, $estado_cuenta, $fecha_Creacion, $nss, $genero);
        } else {
            echo json_encode(["status" => "error", "message" => "Faltan campos obligatorios para modificar el usuario."]);
        }
        break;
    case 'RegistrarInvitado':
        $usuario->RegistrarInvitado(
            'INV',
            $_POST['nombre'] ?? null,
            $_POST['correo'] ?? null,
            $_POST['contraseña'] ?? null,
            $_POST['genero'] ?? null
        );
        break;

    case 'GetImagen':

        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK)
            $usuario->GetImagen($_FILES['imagen'] ?? null, $_POST['Matricula'] ?? null);
        else
            echo json_encode(["status" => "error", "message" => "Fotografia no recibida."]);
        break;
    case 'inicioSesion':
        $usuario->inicioSesion(
            $_POST['matricula'] ?? null,
            $_POST['tipoUsuario'] ?? null
        );
        break;
    case 'GetSession':
        $usuario->GetSession();
        break;
    case 'CerrarSesion':
        $usuario->CerrarSesion();
        break;
    case 'RegistrarEntrada':
        $fecha_hora_acceso = $_POST["FeHoAcceso"] ?? null;
        $punto_acceso = $_POST["PuntoAcceso"] ?? null;
        $id_usuario = $_POST["Usuario"] ?? null;

        $usuario->RegistrarEntrada($fecha_hora_acceso, $punto_acceso, $id_usuario);
        break;

    case 'GetUsuarios':
        $usuario->GetUsuarios();
        break;

    case 'RegistrarUsuario':
        if (
            isset(
                $_POST['nombre'],
                $_POST['correo'],
                $_POST['contraseña'],
                $_POST['tipo_usuario'],
                $_POST['estado_cuenta'],
                $_POST['fecha_Creacion'],
                $_POST['nss'],
                $_POST['genero'],
                $_POST['matricula']
            )
        ) {
            $nombre = trim($_POST['nombre']);
            $correo = trim($_POST['correo']);
            $contrasena = trim($_POST['contraseña']);
            $tipo_usuario = trim($_POST['tipo_usuario']);
            $estado_cuenta = trim($_POST['estado_cuenta']);
            $fecha_Creacion = trim($_POST['fecha_Creacion']);
            $nss = trim($_POST['nss']);
            $genero = trim($_POST['genero']);
            $matricula = trim($_POST['matricula']);

            $fotoOk = true;

            // Procesar foto de perfil si se envió
            if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK) {
                $rutaFoto = "../PhotosDB/$matricula.jpg";
                $fotoOk = $usuario->ConversionJPG($_FILES['foto_perfil']['tmp_name'], $rutaFoto);
            }

            // Si el usuario es Alumno, la carga académica es obligatoria
            if (strtolower($tipo_usuario) === "alumno") {
                if (isset($_FILES['carga_academica']) && $_FILES['carga_academica']['error'] === UPLOAD_ERR_OK) {
                    $rutaCarga = "../CargasAcademicas/$matricula.jpg";
                    $cargaOk = $usuario->ConversionJPG($_FILES['carga_academica']['tmp_name'], $rutaCarga);

                    if (!$cargaOk) {
                        echo json_encode(["status" => "error", "message" => "La imagen de carga académica es inválida o no se pudo procesar."]);
                        break;
                    }
                } else {
                    echo json_encode(["status" => "error", "message" => "Falta la imagen de carga académica obligatoria."]);
                    break;
                }
            }

            if ($fotoOk) {
                $usuario->RegistrarUsuario(
                    $matricula,
                    $nombre,
                    $correo,
                    $tipo_usuario,
                    $contrasena,
                    $estado_cuenta,
                    $fecha_Creacion,
                    $nss,
                    $genero
                );
            } else {
                echo json_encode(["status" => "error", "message" => "La foto de perfil no pudo ser procesada."]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Datos incompletos para el registro."]);
        }
        break;

    case 'EliminarUsuario':
        $usuario->EliminarUsuario($_POST['matricula'] ?? null);
        break;

    case 'EnviarNotificacion':

        $usuario->EnviarNotificacion(
            $_POST['mensaje'],
            json_decode($_POST['destinatarios']),
            $_POST['emisor']
        );
        break;
    case 'EnviarNotificacionGlobal':
        $usuario->EnviarNotificacionGlobal($_POST['mensaje'], $_POST['emisor']);
        break;
    case 'ObtenerNotificaciones':
        $usuario->ObtenerNotificaciones($_POST['usuario']);
        break;

    case 'RegistrarSalida':
        $fecha_hora_salida = $_POST["FeHoSalida"] ?? null;
        $punto_acceso = $_POST["PuntoAcceso"] ?? null;
        $id_usuario = $_POST["Usuario"] ?? null;

        if ($fecha_hora_salida && $punto_acceso && $id_usuario) {
            $stmt = $this->mysql->prepare("INSERT INTO acceso (fecha_hora_salida, punto_acceso, id_usuario) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $fecha_hora_salida, $punto_acceso, $id_usuario);

            if ($stmt->execute()) {
                echo json_encode(["success" => true, "message" => "Salida Registrada"]);
            } else {
                echo json_encode(["success" => false, "error" => $stmt->error]);
            }

            $stmt->close();
        } else {
            echo json_encode(["success" => false, "error" => "Datos Incompletos"]);
        }
        break;


    default:
        echo json_encode(["status" => "error", "message" => "Clase no reconocida: $clase"]);
        break;
}
