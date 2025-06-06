<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carga Academica</title>
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

        .CargaAcademica .PerCarga img {
            width: 75vw;
            height: auto;
            min-width: 24vw;
            max-width: 100%;
            object-fit: contain;
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
        <ul>
            <li class="perfil"></li>

            <li class="ModPerfil"><label><i class="fa-solid fa-address-card"></i>Modificar información</label></li>
            <li class="VisCarga"><label></i> <i class="fa-solid fa-table-list"></i>Visualizar carga academica</label></li>
            <li class="RegAsistencias"><label></i> <i class="fa-solid fa-chart-line"></i>Registro de asistencias</label></li>

        </ul>
    </nav>
    <div class="contenido-principal">

        <div>
            <a class="ExportarCarga" download="mi_foto.jpg">
                Descargar carga academica
            </a>
            <div class="contenedor-flex">

                <div class="Recuadro_perfil CargaAcademica">
                    <div class="PerTitulo"><label for="">Carga academica</label></div>
                    <div class="PerCarga"></div>
                </div>


            </div>
            <br>

            <div class="Mensaje">
                <div><i class="fa-solid fa-triangle-exclamation"></i></div>

                <div><label for="" class="txtMensaje">*Poner mensaje*</label></div>
                <div><button class="btnMensaje">Aceptar</button></div>
            </div>
        </div>

    </div>
    <!--pie de pagina-->
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

            let Procesos = new ProcesosDeterminados();
            let Usuario = new Usuarios();
            let dato = await Procesos.VerificarSesion()

            if (dato[0] != "undefined") {

                if (dato[1] === "Administrador")
                    Procesos.pagPerfilAdmin();
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






            //ocultar el menu desplegable
            Procesos.MostrarMenu();
        });
    </script>


</body>

</html>