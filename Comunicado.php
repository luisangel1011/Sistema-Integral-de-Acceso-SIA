<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Configuración básica del documento -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>

    <!-- Enlace a hoja de estilos CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Icono de pestaña -->
    <link rel="shortcut icon" href="Icons/logo.ico">

    <!-- Estilo adicional para el fondo -->
    <style>
        body {
            background-color: rgb(179, 179, 179);
            background-image: url("https://www.transparenttextures.com/patterns/diagmonds-light.png");
            /* Fondo alternativo comentado:
            background-color: #6e0400;
            background-image: url("https://www.transparenttextures.com/patterns/subtle-carbon.png");
            */
        }
    </style>
</head>

<body class="Sistema">
    <!-- === Encabezado superior con menú de iconos === -->
    <header class="headerIcon icono">
        <label class="toggle-btn"><i class="fas fa-bars"></i></label>

        <div class="botones">
            <!-- Botón de notificaciones -->
            <div class="btn Notificaciones">
                <label class="NotiPer"><i class="fa-regular fa-bell-slash"></i></label>
            </div>

            <!-- Botón para cerrar sesión -->
            <div class="btn CSesion">
                <label class="CerrarPer"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</label>
            </div>
        </div>
    </header>

    <!-- === Menú lateral (sidebar) === -->
    <nav class="sidebar" id="sidebar">
        <ul>
            <!-- Perfil de usuario en la parte superior -->
            <li class="perfil"></li>

            <!-- Modificar información de perfil -->
            <li class="ModPerfil">
                <label><i class="fa-solid fa-address-card"></i> Modificar información</label>
            </li>

            <!-- Submenú para alumnos -->
            <li class="ListAlumno">
                <label><i class="fa-solid fa-user-tie"></i> Alumnos</label>
            </li>
            <ol class="EmergentListAlumno" id="EmergentList">
                <li class="ListAlumnoAgregar" onclick="location.href='RegistroAlumno.php'">
                    <label><i class="fas fa-user-plus"></i> Agregar Alumnos</label>
                </li>
                <li class="ListAlumnoModificar" onclick="location.href='ModificarAlumno.php'">
                    <label><i class="fas fa-user-edit"></i> Modificar Alumnos</label>
                </li>
                <li class="ListAlumnoEliminar" onclick="location.href='EliminarAlumno.php'">
                    <label><i class="fas fa-user-times"></i> Eliminar Alumnos</label>
                </li>
                <li class="ListAlumnoVisualizar" onclick="location.href='VisualizarAlumno.php'">
                    <label><i class="fas fa-address-book"></i> Visualizar Alumnos</label>
                </li>
            </ol>

            <!-- Submenú para usuarios -->
            <li class="ListUsuario">
                <label><i class="fa-solid fa-user"></i> Usuarios</label>
            </li>
            <ol class="EmergentListUsuario" id="EmergentList">
                <li class="ListUsuarioAgregar" onclick="location.href='RegistroUsuario.php'">
                    <label><i class="fas fa-user-plus"></i> Agregar Usuario</label>
                </li>
                <li class="ListUsuarioModificar" onclick="location.href='ModificarUsuario.php'">
                    <label><i class="fas fa-user-edit"></i> Modificar Usuario</label>
                </li>
                <li class="ListUsuarioEliminar" onclick="location.href='EliminarUsuario.php'">
                    <label><i class="fas fa-user-times"></i> Eliminar Usuario</label>
                </li>
                <li class="ListUsuarioVisualizar" onclick="location.href='VisualizarUsuario.php'">
                    <label><i class="fas fa-address-book"></i> Visualizar Usuario</label>
                </li>
            </ol>

            <!-- Submenú "Otros" -->
            <li class="ListOtros">
                <label><i class="fa-solid fa-chart-line"></i> Otros</label>
            </li>
            <ol class="EmergentListOtros" id="EmergentList">
                <li class="ListEnvNoti" onclick="location.href='EnviarNoti.php'">
                    <label><i class="fa-solid fa-share"></i> Enviar notificación a usuario</label>
                </li>
                <li class="ListComunicado" onclick="location.href='Comunicado.php'">
                    <label><i class="fa-solid fa-bullhorn"></i> Hacer comunicado</label>
                </li>
            </ol>
        </ul>
    </nav>

    <!-- === Contenido principal === -->
    <main class="contenido-principal">
        <div class="CentroFormulario">
            <div class="Recuadro_perfil FormularioNotificacion">
                <!-- Título -->
                <h2>Enviar notificación general</h2>

                <!-- Formulario para enviar la notificación general -->
                <form id="formNotificacion">
                    <div>
                        <textarea id="mensaje" name="mensaje" placeholder="Escribe el mensaje a enviar..." required></textarea>
                    </div>
                    <div>
                        <button type="submit">Enviar notificación</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- === Mensaje emergente (ventana modal sencilla) === -->
    <div class="Mensaje">
        <div><i class="fa-solid fa-triangle-exclamation"></i></div>
        <div>
            <label for="" class="txtMensaje">*Poner mensaje*</label>
        </div>
        <div>
            <button class="btnMensaje">Aceptar</button>
        </div>
    </div>

    <!-- === Pie de página === -->
    <footer>
        <div class="footer-content">
            <!-- Logo en el footer -->
            <img src="Icons/Logo.png" alt="SIA Logo" class="btnlogoInd footer-logo">

            <!-- Enlaces en el footer -->
            <div class="footer-links">
                <a href="Index.php">Inicio</a>
                <a href="#">Acerca de</a>
                <a href="#">Contacto</a>
                <a href="#">Ayuda</a>
            </div>
        </div>

        <!-- Copyright -->
        <div class="copyright">
            © 2025 Instituto Tecnológico Superior de Atlixco - Sistema Integral de Acceso
        </div>
    </footer>

    <!-- === Librerías externas === -->
    <!-- FontAwesome para íconos -->
    <script src="https://kit.fontawesome.com/7e6b5e67cc.js" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="js/jquery-3.7.1.min.js"></script>

    <!-- Tu script principal -->
    <script src="js/Script.js"></script>

    <!-- Librería Chart.js (para gráficas, aunque no se usa directamente en este HTML) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- === Código JavaScript embebido === -->
    <script>
        $(document).ready(async function() {

            // Crear instancias de clases personalizadas
            let Procesos = new ProcesosDeterminados();
            let Usuario = new Usuarios();

            // Verificar la sesión del usuario
            let dato = await Procesos.VerificarSesion();

            // Si la sesión es válida
            if (dato[0] != "undefined") {
                if (dato[1] === "Alumno")
                    Procesos.pagPerfil();
            } else
                Procesos.PagSesion();

            // Obtener la información del usuario desde el backend
            InfUsuario = await Usuario.GetUsuario("", "", dato[0]);

            // Actualizar la interfaz (foto del usuario en menú)
            let PerImgCarga = $('.PerCarga');
            let PerMenu = $('.perfil');

            // Cargar la imagen de perfil desde la carpeta correspondiente
            PerImgCarga.append("<img class='PerImgCarga' src='CargasAcademicas/" + localStorage.getItem('Matricula') + ".jpg'>");

            // Mostrar el nombre e imagen en la sección "perfil" del menú lateral
            PerMenu.html('<label><img src="PhotosDB/' + localStorage.getItem("Matricula") + '.jpg" ' +
                'onerror="this.onerror=null; this.src=\'PhotosDB/imgNoFound.jpg\';">' + "  " + localStorage.getItem("Nombre") + '</label>'
            );

            // === Evento al enviar el formulario de notificación general ===
            $(document).on("submit", "#formNotificacion", async function(e) {
                e.preventDefault(); // Evitar que el formulario recargue la página

                let mensaje = $("#mensaje").val().trim();
                if (!mensaje) return alert("Escribe un mensaje");

                // Enviar la notificación usando método personalizado
                const Usuario = new Usuarios();
                const resultado = await Usuario.EnviarNotificacionGlobal(mensaje);

                // Mostrar resultado al usuario
                if (resultado.status === "success") {
                    alert("Notificación enviada a todos los usuarios");
                    $("#mensaje").val("");
                } else {
                    alert("Error: " + resultado.message);
                }
            });

            // === Lógica para ocultar/mostrar menú desplegable ===
            Procesos.MostrarMenu();

            // Acción al hacer clic en PerCarga
            $(".PerCarga").click(function(e) {
                Procesos.VisCarga();
            });
        });
    </script>

</body>
</html>
