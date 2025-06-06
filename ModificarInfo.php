<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar perfil</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="Icons/logo.ico">
    <style>
        body {
            background-color: rgb(179, 179, 179);
            background-image: url("https://www.transparenttextures.com/patterns/diagmonds-light.png");

            /*#background-color: #6e0400;
            #background-image: url("https://www.transparenttextures.com/patterns/subtle-carbon.png");
            */
        }

        .PerImgUsuario img:hover,
        button:hover {
            filter: brightness(70%);
            cursor: pointer;
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
    <br>

    <nav class="sidebar" id="sidebar">

    </nav>
    <main class="contenido-principal">
        <div class="contenedor-flex">


            <Div class="Recuadro_perfil InfUsuario">
                <div class="PerTitulo"> <label class="txtPerTitulo" for="">Información Usuario</label></div>
                <div class="PerImgUsuario" title="Cambiar foto de perfil"><img class="ImgUsuario" src=" PhotosDB/imgNoFound.jpg" class="ImgUsuario"></div>
                <input type="file" class="selectorImagen" accept="image/*" style="display: none;">
                <div class="PerMatricula"><label class="txtPerMatricula">*matricula*</label></div>
                <div class="PerUsuario">Nombre:<input type="text" class="txtPerUsuario"></div>
                <div class="PerSS">Seguro Social:<input type="text" class="txtPerSS"></label></div>
                <div class="PerSexo">Genero<input type="text" class="txtPerSexo"></label></div>
                <div class="PerContrasena">Contraseña<input type="text" class="txtPerContrasena"></label></div>

                <div><button class="PerBoton">Modificar</button></div>

            </Div>


        </div>
    </main>

    <br>
    <div class="Mensaje">
        <div><i class="fa-solid fa-triangle-exclamation"></i></div>

        <div><label for="" class="txtMensaje">*Poner mensaje*</label></div>
        <div><button class="btnMensaje">Aceptar</button></div>
    </div>

    <!--pie de pagina-->
    <footer>
        <div class="footer-content">

            <img src="Icons/Logo.png" alt="SIA Logo" class="btnlogoInd footer-logo">

            <div class="footer-links">
                <a href="#">Inicio</a>
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

            let Procesos = new ProcesosDeterminados();
            let Usuario = new Usuarios();
            let dato = await Procesos.VerificarSesion()

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
                        <li class="ListEnvNoti" onclick="location.href='EnviarNoti.php'"><label><i class="fa-solid fa-share"></i>Enviar notificación a usuario</label></li>
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

            //Obtener la informacion del usuario del archivo script.js
            InfUsuario = await Usuario.GetUsuario("", "", dato[0]);
            //Obtener las etiquetas de los datos de la pagina
            let PerImgUsuario = $('.ImgUsuario')
            let PerUsuario = $('.txtPerUsuario');
            let PerMatricula = $('.txtPerMatricula');
            let PerSS = $('.txtPerSS');
            let PerSexo = $('.txtPerSexo');
            let PerContrasena = $('.txtPerContrasena');
            let PerImgCarga = $('.PerCarga');
            let PerMenu = $('.perfil');

            //Establecer los datos del usuario en variables locales
            localStorage.setItem("Matricula", InfUsuario.id_usuario);
            localStorage.setItem("Nombre", InfUsuario.nombre);
            localStorage.setItem("nss", InfUsuario.nss);
            localStorage.setItem("Genero", InfUsuario.Genero);
            localStorage.setItem("Contrasena", InfUsuario.contrasena);
            localStorage.setItem("TipoUsuario", InfUsuario.tipo_usuario);
            localStorage.setItem("FecCreacion", InfUsuario.fecha_Creacion);
            localStorage.setItem("correo", InfUsuario.correo_electronico);
            localStorage.setItem("EstadoCuenta", InfUsuario.estado_cuenta);




            //Obtener la imagen del usuario
            PerImgUsuario.attr('src', 'PhotosDB/' + localStorage.getItem("Matricula") + ".jpg").on('error', function() {
                $(this).attr('src', 'PhotosDB/imgNoFound.jpg')
            });
            //Obtener y establecer la informacion del usuario a la pagina de los datos almacenados
            PerUsuario.val(localStorage.getItem("Nombre"));
            PerMatricula.text("Matricula: " + localStorage.getItem("Matricula"));
            PerSS.val(localStorage.getItem("nss"));
            PerSexo.val(localStorage.getItem("Genero"));
            PerContrasena.val(localStorage.getItem("Contrasena"));
            PerImgCarga.append("<img class='PerImgCarga' src='CargasAcademicas/" + localStorage.getItem('Matricula') + ".jpg'>");
            PerMenu.html('<label><img src="PhotosDB/' + localStorage.getItem("Matricula") + '.jpg" ' +
                'onerror="this.onerror=null; this.src=\'PhotosDB/imgNoFound.jpg\';">' + localStorage.getItem("Nombre") + '</label>'
            );
            console.log(localStorage.getItem("TipoUsuario"))






            //ocultar el menu desplegable
            Procesos.MostrarMenu();
        });
    </script>


</body>

</html>