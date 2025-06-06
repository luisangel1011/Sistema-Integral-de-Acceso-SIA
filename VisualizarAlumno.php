<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar</title>
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

        .FormularioModAlumno {
            display: none;
        }

        .SelMultiple {
            display: none;
        }


        input:disabled {
            opacity: 1 !important;
            /* Quitar el efecto opaco */
            color: inherit !important;
            /* Mantener color de texto */
            background-color: inherit;
            /* Mantener fondo */
            cursor: not-allowed;
            /* Opcional: mostrar que no se puede usar */
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

    <div class="contenido-principal">
        <div class="ContenedorModAlumno">

            <div class="Recuadro_perfil ListaAlumnos">
                <div class="BuscadorWrapper">
                    <input type="text" class="BuscadorAlumno" placeholder="Buscar Usuario..." title="Buscar por nombre, correo_electronico y Genero">
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
                <i class="fa-solid fa-trash IconEliminar" title="eliminar"></i>
            </div>
            <div class="Recuadro_perfil FormularioModAlumno">
                <div class="FotoAlumno"><img src="PhotosDB/imgNoFound.jpg" alt="Foto" class="FotoAlumno"></div>
                <div>Clave de identificación: <span class="txtMatricula"></span></div>
                <div><input type="text" class="txtIdUsuario" placeholder="Matricula" title="IdUsuario"></div>
                <div><input type="text" class="txtnombre" placeholder="Nombre completo" title="nombre"></div>
                <div><input type="text" class="txtCorreo" placeholder="Correo electrónico" title="Correo"></div>
                <div>
                    <select class="txtTipUsuario" title="Tipo de Usuario" disabled>
                        <option value="">usuario</option>
                        <option value="Alumno">Alumno</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Seguridad">Seguridad</option>
                    </select>
                </div>
                <div><input type="text" class="txtContrasena" placeholder="Contraseña" title="Contraseña"></div>
                <div>
                    <select class="txtEstado" title="Estado" required>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
                <div><input type="date" class="txtfCreacion" placeholder="Fecha de creacion" title="Fecha de creacion"></div>
                <div><input type="text" class="txtnss" placeholder="Seguro Social" title="Seguro Social"></div>
                <div>
                    <select class="txtGenero" title="Genero" required>
                        <option value="Hombre">Hombre</option>
                        <option value="Mujer">Mujer</option>
                    </select>
                </div>
                <div><button class="btnModificarAlumno">Modificar</button></div>
            </div>
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

    <script src=" https://kit.fontawesome.com/7e6b5e67cc.js" crossorigin="anonymous"></script>
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
            let usuariosRecolectados = null;
            //Establecer los datos del usuario en variables locales


            //Obtener y establecer la informacion del usuario a la pagina de los datos almacenados

            PerImgCarga.append("<img class='PerImgCarga' src='CargasAcademicas/" + localStorage.getItem('Matricula') + ".jpg'>");
            PerMenu.html('<label><img src="PhotosDB/' + localStorage.getItem("Matricula") + '.jpg" ' +
                'onerror="this.onerror=null; this.src=\'PhotosDB/imgNoFound.jpg\';">' + "  " + localStorage.getItem("Nombre") + '</label>'
            );

            const tabla = document.querySelector(".Listado");

            Usuario.GetUsuarios().then(usuarios => {

                const filtrados = usuarios.filter(u =>
                    u.tipo_usuario === "Alumno"
                );
                usuarios = filtrados;
                usuariosRecolectados = usuarios;
                if ((usuarios.length > 0)) {
                    var cont = 0;
                    usuarios.forEach(usuarios => {
                        tabla.innerHTML += `
                                    <div class="ItemAlumno" data-id="${usuarios.id_usuario}" data-nombre="${usuarios.nombre}">
                                        <input type="checkbox" class="checkAlumno">
                                        <label for="">${usuarios.id_usuario}-${usuarios.nombre}-${usuarios.tipo_usuario}</label>
                                        <i class="fa-solid fa-trash IconEliminar"  title="eliminar"></i>
                                        <i class="fa-solid fa-pen IconActualizar"  title="Actualizar"></i>
                                        <i class="fa-solid fa-circle-info iconInfo"  title="Mostrar información"></i>
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

                    lista.append(`<li>${id} - ${nombre}</li>`);
                });
                if (lista.children("li").length > 0) {
                    $(".SelMultiple").show();
                    $(".FormularioModAlumno").hide();
                } else {
                    $(".SelMultiple").hide();

                }


            });

            $(document).on("click", ".IconEliminar", function() {


                const contenedor = $(this).closest(".ItemAlumno");
                const matricula = contenedor.data("id");

                if (confirm("¿Deseas eliminar al usuario con matrícula: " + matricula + "?")) {
                    Usuario.EliminarUsuario(matricula);
                }
            });

            $(".SelMultiple .IconEliminar").click(function() {
                event.stopPropagation();
                const seleccionados = [];

                $(".checkAlumno:checked").each(function() {
                    const matricula = $(this).closest(".ItemAlumno").data("id");
                    seleccionados.push(matricula);
                });

                if (seleccionados.length === 0) {
                    Procesos.MostrarAlerta("No hay usuarios seleccionados.");
                    return;
                }

                if (confirm("¿Deseas eliminar a los usuarios seleccionados?")) {
                    seleccionados.forEach(matricula => {
                        Usuario.EliminarUsuario(matricula);
                    });
                }
            });

            $(document).on("click", ".IconActualizar", function() {


                const contenedor = $(this).closest(".ItemAlumno");
                const matricula = contenedor.data("id");

                var cont = 0;
                usuariosRecolectados.forEach(usuariosRecolectados => {
                    if ((matricula == usuariosRecolectados.id_usuario)) {

                        $(".FotoAlumno").html(`
                        <img class="FotoAlumno" 
                            src="PhotosDB/${usuariosRecolectados.id_usuario}.jpg" 
                            onerror="this.onerror=null; this.src='PhotosDB/imgNoFound.jpg';">
                        `);

                        $(".txtMatricula").text(usuariosRecolectados.id_usuario);
                        $(".txtIdUsuario").val(usuariosRecolectados.id_usuario);
                        $(".txtnombre").val(usuariosRecolectados.nombre);
                        $(".txtCorreo").val(usuariosRecolectados.correo_electronico);
                        $(".txtTipUsuario").val(usuariosRecolectados.tipo_usuario);
                        $(".txtContrasena").val(usuariosRecolectados.contrasena);
                        $(".txtEstado").val(usuariosRecolectados.estado_cuenta);
                        $(".txtfCreacion").val(usuariosRecolectados.fecha_Creacion);
                        $(".txtnss").val(usuariosRecolectados.nss);
                        $(".txtGenero").val(usuariosRecolectados.Genero);

                        $(".txtMatricula").prop("disabled", false);
                        $(".txtIdUsuario").prop("disabled", false);
                        $(".txtnombre").prop("disabled", false);
                        $(".txtCorreo").prop("disabled", false);
                        $(".txtTipUsuario").prop("disabled", false);
                        $(".txtContrasena").prop("disabled", false);
                        $(".txtEstado").prop("disabled", false);
                        $(".txtfCreacion").prop("disabled", false);
                        $(".txtnss").prop("disabled", false);
                        $(".txtGenero").prop("disabled", false);
                        $(".btnModificarAlumno").show()
                    }

                });
                const lista = $(".listaSeleccionados");

                if (lista.children("li").length == 0) {

                    $(".FormularioModAlumno").show();
                    $(".SelMultiple").hide();
                } else {
                    console.log("no debe mostrarse")
                    $(".FormularioModAlumno").hide();
                }



            });
            $(document).on("click", ".iconInfo", function() {


                const contenedor = $(this).closest(".ItemAlumno");
                const matricula = contenedor.data("id");

                var cont = 0;
                usuariosRecolectados.forEach(usuariosRecolectados => {
                    if ((matricula == usuariosRecolectados.id_usuario)) {

                        $(".FotoAlumno").html(`
                        <img class="FotoAlumno" 
                            src="PhotosDB/${usuariosRecolectados.id_usuario}.jpg" 
                            onerror="this.onerror=null; this.src='PhotosDB/imgNoFound.jpg';">
                        `);

                        $(".txtMatricula").text(usuariosRecolectados.id_usuario);
                        $(".txtIdUsuario").val(usuariosRecolectados.id_usuario);
                        $(".txtnombre").val(usuariosRecolectados.nombre);
                        $(".txtCorreo").val(usuariosRecolectados.correo_electronico);
                        $(".txtTipUsuario").val(usuariosRecolectados.tipo_usuario);
                        $(".txtContrasena").val(usuariosRecolectados.contrasena);
                        $(".txtEstado").val(usuariosRecolectados.estado_cuenta);
                        $(".txtfCreacion").val(usuariosRecolectados.fecha_Creacion);
                        $(".txtnss").val(usuariosRecolectados.nss);
                        $(".txtGenero").val(usuariosRecolectados.Genero);

                        $(".txtMatricula").prop("disabled", true);
                        $(".txtIdUsuario").prop("disabled", true);
                        $(".txtnombre").prop("disabled", true);
                        $(".txtCorreo").prop("disabled", true);
                        $(".txtTipUsuario").prop("disabled", true);
                        $(".txtContrasena").prop("disabled", true);
                        $(".txtEstado").prop("disabled", true);
                        $(".txtfCreacion").prop("disabled", true);
                        $(".txtnss").prop("disabled", true);
                        $(".txtGenero").prop("disabled", true);
                        $(".btnModificarAlumno").hide()

                    }

                });
                const lista = $(".listaSeleccionados");

                if (lista.children("li").length == 0) {

                    $(".FormularioModAlumno").show();
                    $(".SelMultiple").hide();
                } else {
                    console.log("no debe mostrarse")
                    $(".FormularioModAlumno").hide();
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