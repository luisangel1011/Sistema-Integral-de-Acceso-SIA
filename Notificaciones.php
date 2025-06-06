<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Notificaciones</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="Icons/logo.ico">
    <style>
        body {
            background-color: rgb(179, 179, 179);
            background-image: url("https://www.transparenttextures.com/patterns/diagmonds-light.png");
        }
    </style>
</head>

<body class="Sistema">

    <header class="headerIcon icono">
        <label class="toggle-btn"><i class="fas fa-bars"></i></label>
        <div class="botones">
            <div class="btn Notificaciones"><label class="NotiPer"><i class="fa-regular fa-bell-slash"></i></label></div>
            <!--<i class="fa-solid fa-bell fa-shake"></i> -->

            <div class="btn CSesion"><label class="CerrarPer"><i class="fa-solid fa-right-from-bracket"></i>Cerrar Sesion</label></div>

        </div>



    </header>

    <nav class="sidebar" id="sidebar">

    </nav>

    <div class="contenido-principal">
        <div class="CentroFormulario">
            <div class="Recuadro_perfil ListaAlumnos" id="notiArea">
                <h2>Cargando notificaciones...</h2>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-content">

            <img src="Icons/Logo.png" alt="SIA Logo" class="btnlogoInd footer-logo">

            <div class="footer-links">
                <a href="Index.php">Inicio</a>
                <a href="#">Acerca de</a>
                <a href="#">Contacto</a>
                <a href="#">Ayuda</a>
            </div>
        </div>
        <div class="copyright">
            © 2025 Instituto Tecnológico Superior de Atlixco - Sistema Integral de Acceso
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/7e6b5e67cc.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/Script.js"></script>

    <script>
        $(document).ready(async function() {
            let Usuario = new Usuarios();
            let Procesos = new ProcesosDeterminados();
            let dato = await Procesos.VerificarSesion();


            const matricula = localStorage.getItem("Matricula");

            console.log(dato)

            if (dato[1] === "Alumno") {
                document.getElementsByClassName("sidebar")[0].innerHTML = `
                            <ul>
                    <li class="perfil" onclick="location.href='Perfil.php'"></li>

                    <li class="ModPerfil"><label><i class="fa-solid fa-address-card"></i>Modificar información</label></li>
                    <li class="VisCarga"><label></i> <i class="fa-solid fa-table-list"></i>Visualizar carga academica</label></li>
                    <li class="RegAsistencias"><label></i> <i class="fa-solid fa-chart-line"></i>Registro de asistencias</label></li>

                </ul>
                `;
            } else if (dato[1] === "Administrador") {
                document.getElementsByClassName("sidebar")[0].innerHTML = `
                        <ul>
                    <li class="perfil" onclick="location.href='PerfilAdmin.php'"></li>
                    <li class="ModPerfil"><label><i class="fa-solid fa-address-card"></i>Modificar información</label></li>

                    <li class="ListAlumno"><label><i class="fa-solid fa-user-tie"></i>Alumnos</label></li>
                    <ol class="EmergentListAlumno" id="EmergentList">
                        <li class="ListAlumnoAgregar" onclick="location.href='RegistroAlumno.php'"><label><i class="fas fa-user-plus"></i>Agregar Alumnos</label></li>
                        <li class="ListAlumnoModificar" onclick="location.href='ModificarAlumno.php'"><label><i class="fas fa-user-edit"></i>Modificar Alumnos</label></li>
                        <li class="ListAlumnoEliminar" onclick="location.href='EliminarAlumno.php'"><label><i class="fas fa-user-times"></i>Eliminar Alumnos</label></li>
                        <li class="ListAlumnoVisualizar" onclick="location.href='VisualizarAlumno.php'"><label> <i class="fas fa-address-book"></i>Visualizar Alumnos</label></li>
                    </ol>


                    <li class="ListUsuario"><label><i class="fa-solid fa-user"></i>Usuarios</label></li>
                    <ol class="EmergentListUsuario" id="EmergentList">
                        <li class="ListUsuarioAgregar" onclick="location.href='RegistroUsuario.php'"><label><i class="fas fa-user-plus"></i>Agregar Usuario</label></li>
                        <li class="ListUsuarioModificar" onclick="location.href='ModificarUsuario.php'"><label><i class="fas fa-user-edit"></i>Modificar Usuario</label></li>
                        <li class="ListUsuarioEliminar" onclick="location.href='EliminarUsuario.php'"><label><i class="fas fa-user-times"></i>Eliminar Usuario</label></li>
                        <li class="ListUsuarioVisualizar" onclick="location.href='VisualizarUsuario.php'"><label> <i class="fas fa-address-book"></i>Visualizar Usuario</label></li>
                    </ol>
                    <li class="ListOtros"><label></i> <i class="fa-solid fa-chart-line"></i>Otros</label></li>

                    <ol class="EmergentListOtros" id="EmergentList">
                        <li class="ListEnvNoti" onclick="location.href='EnviarNoti.php'"><label><i class="fa-solid fa-share"></i>Enviar notificacion a usuario</label></li>
                        <li class="ListComunicado" onclick="location.href='Comunicado.php'"><label><i class="fa-solid fa-bullhorn"></i>Hacer comunicado</label></li>
                    </ol>
                </ul>
                `;

            }

            $(".ModPerfil").click(function(e) {
                Procesos.PagModificarInfo();

            });

            $(".VisCarga").click(function(e) {
                Procesos.VisCarga();

            });

            $(".RegAsistencias").click(function(e) {
                Usuario.GetAsistencia(localStorage.getItem("Matricula")).then(respuesta => {
                    if (respuesta.length > 0) {
                        Procesos.RegAsistencias();
                    } else {
                        Procesos.MostrarAlerta("No se tranfirio al registro debido a que no existe asistencia ");
                    }
                }).catch(error => {
                    console.error("Error al obtener la asistencia:", error);
                });

            });

            if (dato[0] != "undefined") {

            } else
                Procesos.PagSesion();

            let PerMenu = $('.perfil');

            PerMenu.html('<label><img src="PhotosDB/' + localStorage.getItem("Matricula") + '.jpg" ' +
                'onerror="this.onerror=null; this.src=\'PhotosDB/imgNoFound.jpg\';">' + localStorage.getItem("Nombre") + '</label>'
            );

            if (!matricula) {
                Procesos.MostrarAlerta("No hay sesión activa.");
                return;
            }

            const notificaciones = await Usuario.ObtenerNotificaciones(matricula);
            const notiArea = $("#notiArea");

            let html = '<div"><h2>Notificaciones</h2>';
            if (notificaciones.length > 0) {
                notificaciones.forEach(noti => {
                    html += `<div class='ItemAlumno'><b>${noti.fecha_envio}</b> - ${noti.mensaje}</div>`;
                });
            } else {
                html += `<div class='ItemAlumno'>No tienes notificaciones.</div>`;
            }
            html += '</div>';

            notiArea.html(html);

            Procesos.MostrarMenu();
            $(".CargaAcademica").click(function(e) {
                Procesos.VisCarga();

            });
        });
    </script>

</body>

</html>