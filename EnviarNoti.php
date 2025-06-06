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
    <main class="contenido-principal">
        <div class="Contenido">
            <div class="ContenedorModAlumno">
                <!-- Lista de usuarios para seleccionar destinatarios -->
                <div class="Recuadro_perfil ListaAlumnos">
                    <div class="BuscadorWrapper">
                        <input type="text" class="BuscadorAlumno" placeholder="Buscar Usuario..." title="Buscar por nombre, correo electrónico y género">
                    </div>
                    <div class="Listado">
                        <div class="recuadroVacio">
                            <div>
                                <label for=""><i class="fa-regular fa-face-sad-tear"></i> No se encontro asistencias</label>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="Recuadro_perfil SelMultiple">
                    <label for="">Usuarios Seleccionados:</label>
                    <ul class="listaSeleccionados"></ul>
                </div>
                <!-- Formulario de mensaje personalizado -->
                <div class="Recuadro_perfil FormularioNotificacion">
                    <h2>Notificación personalizada</h2>
                    <form id="formNotificacionIndividual">
                        <textarea id="mensajeIndividual" name="mensaje" placeholder="Escribe el mensaje para los usuarios seleccionados..." required></textarea>
                        <button id="formNotificacionIndividual" type="submit">Enviar notificación</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <div class="Mensaje">
        <div><i class="fa-solid fa-triangle-exclamation"></i></div>

        <div><label for="" class="txtMensaje">*Poner mensaje*</label></div>
        <div><button class="btnMensaje">Aceptar</button></div>
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

            const tabla = document.querySelector(".Listado");

            Usuario.GetUsuarios().then(usuarios => {


                usuariosRecolectados = usuarios;
                if ((usuarios.length > 0)) {
                    var cont = 0;
                    usuarios.forEach(usuarios => {
                        tabla.innerHTML += `
                                    <div class="ItemAlumno" data-id="${usuarios.id_usuario}" data-nombre="${usuarios.nombre}">
                                        <input type="checkbox" class="checkAlumno">
                                        <label for="">${usuarios.id_usuario}-${usuarios.nombre}-${usuarios.tipo_usuario}</label>
                                       
                                    </div>
                                            `;

                    });
                } else {

                    const NoAsistencia = document.querySelectorAll(".recuadroVacio");

                    NoAsistencia.forEach(elemento => {
                        elemento.style.display = "flex";
                    });
                }
            }).catch(error => {
                console.error("Error al obtener la asistencia:", error);
            });

            $(document).on("change", ".checkAlumno", function() {
                const lista = $(".listaSeleccionados");
                lista.empty(); // limpiar lista actual

                $(".checkAlumno:checked").each(function() {
                    const contenedor = $(this).closest(".ItemAlumno");
                    const id = contenedor.data("id");
                    const nombre = contenedor.data("nombre");

                    lista.append(`<li data-id="${id}">${id} - ${nombre}</li>`);
                });



            });

            $(document).on("submit", "#formNotificacionIndividual", async function(e) {
                e.preventDefault();

                let mensaje = $("#mensajeIndividual").val().trim();
                if (!mensaje) return alert("Escribe un mensaje");

                let usuariosSeleccionados = [];
                $(".listaSeleccionados li").each(function() {
                    usuariosSeleccionados.push($(this).data("id"));
                });

                if (usuariosSeleccionados.length === 0) return alert("Selecciona al menos un usuario");

                const Usuario = new Usuarios();
                const resultado = await Usuario.EnviarNotificacion(mensaje, usuariosSeleccionados, localStorage.getItem("Matricula"));

                if (resultado.status === "success") {
                    alert("Notificación enviada correctamente");
                    $("#mensajeIndividual").val("");
                } else {
                    alert("Error: " + resultado.message);
                }
            });


            //ocultar el menu desplegable
            Procesos.MostrarMenu();
            $(".PerCarga").click(function(e) {
                Procesos.VisCarga();

            });
        });
    </script>


</body>

</html>