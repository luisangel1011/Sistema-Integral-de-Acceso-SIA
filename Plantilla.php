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
    <header class="icono">
        <label class="toggle-btn"><i class="fas fa-bars"></i></label>
        <div class="botones">
            <div class="Notificaciones"><label class="NotiPer"><i class="fa-regular fa-bell-slash"></i></label></div>
            <!--<i class="fa-solid fa-bell fa-shake"></i> -->

            <div class="CSesion"><label class="CerrarPer"><i class="fa-solid fa-right-from-bracket"></i>Cerrar Sesion</label></div>

        </div>



    </header>
    <br>

    <nav class="sidebar" id="sidebar">
        <ul>
            <li class="perfil"></li>
            <li class="ModPerfil"><label><i class="fa-solid fa-address-card"></i>Modificar información</label></li>

            <li class="ListAlumno"><label><i class="fa-solid fa-user-tie"></i>Alumnos</label></li>
            <ol class="EmergentListAlumno" id="EmergentList">
                <li class="ListAlumnoAgregar"><label><i class="fas fa-user-plus"></i>Agregar Alumnos</label></li>
                <li class="ListAlumnoModificar"><label><i class="fas fa-user-edit"></i>Modificar Alumnos</label></li>
                <li class="ListAlumnoEliminar"><label><i class="fas fa-user-times"></i>Eliminar Alumnos</label></li>
                <li class="ListAlumnoVisualizar"><label> <i class="fas fa-address-book"></i>Visualizar Alumnos</label></li>
            </ol>


            <li class="ListUsuario"><label><i class="fa-solid fa-user"></i>Usuarios</label></li>
            <ol class="EmergentListUsuario" id="EmergentList">
                <li class="ListUsuarioAgregar"><label><i class="fas fa-user-plus"></i>Agregar Usuario</label></li>
                <li class="ListUsuarioModificar"><label><i class="fas fa-user-edit"></i>Modificar Usuario</label></li>
                <li class="ListUsuarioEliminar"><label><i class="fas fa-user-times"></i>Eliminar Usuario</label></li>
                <li class="ListUsuarioVisualizar"><label> <i class="fas fa-address-book"></i>Visualizar Usuario</label></li>
            </ol>
            <li class="ListOtros"><label></i> <i class="fa-solid fa-chart-line"></i>Otros</label></li>

            <ol class="EmergentListOtros" id="EmergentList">
                <li class="ListEnvNoti"><label><i class="fa-solid fa-share"></i>Enviar notificacion a usuario</label></li>
                <li class="ListComunicado"><label><i class="fa-solid fa-bullhorn"></i>Hacer comunicado</label></li>
            </ol>
        </ul>
    </nav>





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