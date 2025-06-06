<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="Icons/logo.ico">
    <style>
        body {
            background-color: rgb(179, 179, 179);
            background-image: url("https://www.transparenttextures.com/patterns/diagmonds-light.png");

            /*background-color: #6e0400;
            background-image: url("https://www.transparenttextures.com/patterns/subtle-carbon.png");
            */
        }

        .CargaAcademica:hover {
            cursor: pointer;
            filter: brightness(80%);
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
        <ul>
            <li class="perfil"></li>
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
    </nav>

    <div class="contenedor-flex">



        <Div class="InfUsuario">
            <div class="PerTitulo"> <label class="txtPerTitulo" for="">Informacion Usuario</label></div>
            <div class="PerImgUsuario"><img class="ImgUsuario" src=" PhotosDB/imgNoFound.jpg" class="ImgUsuario"></div>
            <div class="PerUsuario"><label class="txtPerUsuario">*Nombre de usuario*</label></div>
            <div class="PerMatricula"><label class="txtPerMatricula">*Matricula*</label></div>
            <div class="PerSS"><label class="txtPerSS">*Seguro Social*</label></div>
            <div class="PerSexo"><label class="txtPerSexo">*Sexo*</label></div>

        </Div>

    </div>
    <br>
    <div id="Tarjeta"><label for="">Alumnos</label></div>
    <div class="ContenedorMenuAlumnos" id="Contenedor">
        <div class="TarjetaAdmin" onclick="location.href='RegistroAlumno.php'">
            <i class="fas fa-user-plus"></i>
            <p>Agregar Alumno</p>
        </div>
        <div class="TarjetaAdmin" onclick="location.href='ModificarAlumno.php'">
            <i class="fas fa-user-edit"></i>
            <p>Modificar Alumno</p>
        </div>
        <div class="TarjetaAdmin" onclick="location.href='EliminarAlumno.php'">
            <i class="fas fa-user-times"></i>
            <p>Eliminar Alumno</p>
        </div>
        <div class="TarjetaAdmin" onclick="location.href='VisualizarAlumno.php'">
            <i class="fas fa-address-book"></i>
            <p>Visualizar Alumno</p>
        </div>
    </div>

    <div id="Tarjeta"><label for="">Usuarios</label></div>
    <div class="ContenedorMenuSeguridad" id="Contenedor">

        <div class="TarjetaAdmin" onclick="location.href='RegistroUsuario.php'">
            <i class="fas fa-user-plus"></i>
            <p>Agregar Usuario</p>
        </div>
        <div class="TarjetaAdmin" onclick="location.href='ModificarUsuario.php'">
            <i class="fas fa-user-edit"></i>
            <p>Modificar Usuario</p>
        </div>
        <div class="TarjetaAdmin" onclick="location.href='EliminarUsuario.php'">
            <i class="fas fa-user-times"></i>
            <p>Eliminar Usuario</p>
        </div>
        <div class="TarjetaAdmin" onclick="location.href='VisualizarUsuario.php'">
            <i class="fas fa-address-book"></i>
            <p>Visualizar Usuarios</p>
        </div>
    </div>
    <div id="Tarjeta"><label for="">Otros</label></div>
    <div class="ContenedorMenuSeguridad" id="Contenedor">
        <div class="TarjetaAdmin" onclick="location.href='EnviarNoti.php'">
            <i class="fa-solid fa-share"></i>

            <p>Enviar notificacion a usuario</p>
        </div>
        <div class="TarjetaAdmin" onclick="location.href='Comunicado.php'">
            <i class="fa-solid fa-bullhorn"></i>
            <p>Hacer comunicado</p>
        </div>

    </div>

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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        $(document).ready(async function() {

            let Procesos = new ProcesosDeterminados();
            let Usuario = new Usuarios();
            let dato = await Procesos.VerificarSesion()
            if (dato[0] != "undefined") {

                if (dato[1] === "Alumno")
                    Procesos.pagPerfil();
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
            let PerImgCarga = $('.PerCarga');
            let PerMenu = $('.perfil');

            //Establecer los datos del usuario en variables locales
            localStorage.setItem("Matricula", InfUsuario.id_usuario);
            localStorage.setItem("Nombre", InfUsuario.nombre);
            localStorage.setItem("nss", InfUsuario.nss);
            localStorage.setItem("Genero", InfUsuario.Genero);

            //Obtener la imagen del usuario
            PerImgUsuario.attr('src', 'PhotosDB/' + localStorage.getItem("Matricula") + ".jpg").on('error', function() {
                $(this).attr('src', 'PhotosDB/imgNoFound.jpg')
            });
            //Obtener y establecer la informacion del usuario a la pagina de los datos almacenados
            PerUsuario.text("Nombre:" + localStorage.getItem("Nombre"));
            PerMatricula.text("Codigo de identificacion:" + localStorage.getItem("Matricula"));
            PerSS.text("Seguro social:" + localStorage.getItem("nss"));
            PerSexo.text("Genero:" + localStorage.getItem("Genero"));
            PerImgCarga.append("<img class='PerImgCarga' src='CargasAcademicas/" + localStorage.getItem('Matricula') + ".jpg'>");
            PerMenu.html('<label><img src="PhotosDB/' + localStorage.getItem("Matricula") + '.jpg" ' +
                'onerror="this.onerror=null; this.src=\'PhotosDB/imgNoFound.jpg\';">' + localStorage.getItem("Nombre") + '</label>'
            );



            //ocultar el menu desplegable
            Procesos.MostrarMenu();
            $(".PerCarga").click(function(e) {
                Procesos.VisCarga();

            });
        });
    </script>


</body>

</html>