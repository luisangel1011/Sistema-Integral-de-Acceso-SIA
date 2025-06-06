<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
    <br>

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

    <main class="contenido-principal">
        <div class="CentroFormulario">
            <div class="Recuadro_perfil RegistroAlumno">
                <div class="titulo-formulario">
                    <h2>Registro de Usuario</h2>
                </div>

                <div><input type="text" class="txtNombreReg" placeholder="Nombre completo" required></div>
                <div><input type="email" class="txtCorreoReg" placeholder="Correo electrónico" required></div>
                <div>
                    <label style="color:white;">Tipo de usuario</label>
                    <select class="TipUsuario" required>
                        <option value="">usuario</option>
                        <option value="Admin">Administrador</option>
                        <option value="Seg">Seguridad</option>
                    </select>
                </div>
                <div><input type="password" class="txtContraReg" placeholder="Contraseña" required></div>

                <!--
                
                <div>
                    <select class="selEstadoCuenta" required>
                        <option value="">Estado de cuenta</option>
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </div>
                -->
                <div>
                    <label style="color:white;">Fecha de creacion:</label>
                    <input type="date" class="txtFechaReg" value="<?php echo date('Y-m-d'); ?>" readonly>
                </div>
                <div><input type="text" class="txtNssReg" placeholder="NSS" required></div>

                <div>
                    <select class="selGenero" required>
                        <option value="">Género</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>

                    </select>
                </div>

                <div>
                    <label style="color:white;">Foto de perfil:</label>
                    <input type="file" class="foto_perfil" accept="image/*">
                </div>



                <div class="boton-formulario"><button class="btnRegistroUser">Registrar Usuario</button></div>
            </div>
        </div>
    </main>
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

            let PerImgCarga = $('.PerCarga');
            let PerMenu = $('.perfil');

            //Establecer los datos del usuario en variables locales


            //Obtener y establecer la informacion del usuario a la pagina de los datos almacenados

            PerImgCarga.append("<img class='PerImgCarga' src='CargasAcademicas/" + localStorage.getItem('Matricula') + ".jpg'>");
            PerMenu.html('<label><img src="PhotosDB/' + localStorage.getItem("Matricula") + '.jpg" ' +
                'onerror="this.onerror=null; this.src=\'PhotosDB/imgNoFound.jpg\';">' + "  " + localStorage.getItem("Nombre") + '</label>'
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