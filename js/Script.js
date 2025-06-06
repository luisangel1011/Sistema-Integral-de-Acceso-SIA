class ProcesosDeterminados {
    MostrarAlerta(texto) {
        $(".Mensaje").css("visibility", "visible");
        $(".txtMensaje").text(texto);


    }
    async VerificarSesion() {
        let session = [];
        let InfSesion = await this.ObtenerSesion();
        localStorage.setItem("id_usuario", InfSesion.sesion);
        localStorage.setItem("tipoUsuario", InfSesion.tipoUsuario);
        session[0] = localStorage.getItem("id_usuario");
        session[1] = localStorage.getItem("tipoUsuario");

        return session;


    }

    ObtenerSesion() {
        let datos = new FormData();
        datos.append('clase', 'GetSession');
        return new Promise((resolve, reject) => {
            $.ajax({
                url: 'php/backend.php',
                method: 'POST',
                data: datos,
                processData: false,
                contentType: false,
                dataType: 'json'
            }).done(function (respuesta) {
                if (respuesta.status === "success") {
                    // Redirección desde JS

                    resolve(respuesta);
                } else {
                    resolve("");
                }
            });
        });
    }

    CerrarSesion() {
        let datos = new FormData();
        datos.append('clase', 'CerrarSesion');
        $.ajax({
            url: 'php/backend.php',
            method: 'POST',
            data: datos,
            processData: false,
            contentType: false,
            dataType: 'json'
        }).done(function (respuesta) {
            if (respuesta.status === "success") {
                // Redirección desde JS
                window.location.href = "InicioSesion.php";
            }
        });
    }

    OcultarAlerta() {
        $(".Mensaje").css("visibility", "hidden");
    }
    Limpiar() {
        $(".Usuario").val("");
        $(".Contraseña").val("");
    }
    PagSesion() {
        window.location.href = "InicioSesion.php"; // Redirigir a la página de inicio de sesión
    }
    PagPrincipal() {
        window.location.replace("Index.php");
    }
    PagLector() {
        window.location.replace("LectorQR.php");
    }
    PagRecono() {
        window.location.replace("RecFacial.php");
    }
    pagPerfil() {
        window.location.replace("perfil.php");
    }
    pagPerfilAdmin() {
        window.location.replace("PerfilAdmin.php");
    }
    RegAsistencias() {
        window.location.replace("RegistroAsistencia.php");
    }
    VisCarga() {
        window.location.replace("VisualizarCarga.php");
    }
    PagRegistroInv() {
        window.location.replace("RegistroInv.php");
    }
    PagModificarInfo() {
        window.location.replace("ModificarInfo.php");
    }
    MostrarMenu() {
        document.getElementById("sidebar").classList.toggle('active');

    }
    OcultarMenu() {

        if (sidebar.classList.contains("active")) {

        } else {
            document.getElementById("sidebar").classList.toggle('active');
        }
    }


    async generarPDF() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        const elemento = document.getElementById("contenidoPDF");

        // Mostrar tabla sin scroll, ocultar la otra
        const tablaConScroll = document.querySelector(".PerAsistencia");
        const tablaSinScroll = document.querySelector(".PerAsistencia1");

        tablaConScroll.style.display = "none";
        tablaSinScroll.style.display = "block";

        await html2canvas(elemento, {
            scale: 2,
            useCORS: true
        }).then((canvas) => {
            const imgData = canvas.toDataURL("image/png");
            const imgProps = doc.getImageProperties(imgData);
            const pdfWidth = doc.internal.pageSize.getWidth();
            const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

            doc.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
            doc.save("asistencia.pdf");
        });

        // Restaurar estado original
        tablaConScroll.style.display = "block";
        tablaSinScroll.style.display = "none";
    }
    DescargarImagen() {
        let matricula = localStorage.getItem('Matricula');
        let ruta = 'CargasAcademicas/' + matricula + '.jpg';

        fetch(ruta)
            .then(res => {
                if (!res.ok) throw new Error('No se pudo encontrar la imagen');
                return res.blob();
            })
            .then(blob => {
                const url = URL.createObjectURL(blob);
                const linkTemporal = document.createElement('a');
                linkTemporal.href = url;
                linkTemporal.download = matricula + '.jpg';
                document.body.appendChild(linkTemporal);
                linkTemporal.click();
                document.body.removeChild(linkTemporal);
                URL.revokeObjectURL(url);
            })
            .catch(err => {
                console.error("Error al descargar la imagen:", err);
                alert("No se pudo descargar la imagen.");
            });
    }




}

class Usuarios {


    GetUsuario(Usuario, Contraseña, Matricula) {
        let Dato = null;

        let datos = new FormData();
        if (Usuario != "" && Contraseña != "") {
            datos.append('Usuario', Usuario);
            datos.append('Contraseña', Contraseña);
        }
        else if (Matricula != "") {
            datos.append('Matricula', Matricula);

        }
        datos.append('clase', 'GetUsuario');


        return new Promise((resolve, reject) => {
            $.ajax({
                url: 'php/backend.php',
                type: 'POST',
                data: datos,
                contentType: false,
                processData: false,
                dataType: 'json'
            }).done(function (respuesta) {
                if (respuesta.status === "success") {
                    resolve(respuesta.user); // ← devuelve todo el objeto del usuario
                } else {
                    resolve("");
                }
            }).fail(function (jqXHR, textStatus, errorThrown) {
                console.log("Error de conexión con el servidor: ", textStatus, errorThrown);
                alert("Hubo un problema con la conexión al servidor.");
                reject("Hubo un problema con la conexión al servidor.");
            });
        });
    }

    EnviarNotificacion(mensaje, destinatarios, emisor) {
        const datos = new FormData();
        datos.append("clase", "EnviarNotificacion");
        datos.append("mensaje", mensaje);
        datos.append("destinatarios", JSON.stringify(destinatarios));
        datos.append("emisor", emisor);
        console.log(emisor)

        return $.ajax({
            url: 'php/backend.php',
            type: 'POST',
            data: datos,
            contentType: false,
            processData: false,
            dataType: 'json'
        });
    }
    EnviarNotificacionGlobal(mensaje, emisor) {
        const datos = new FormData();
        datos.append("clase", "EnviarNotificacionGlobal");
        datos.append("mensaje", mensaje);
        datos.append("emisor", emisor);

        return $.ajax({
            url: 'php/backend.php',
            type: 'POST',
            data: datos,
            contentType: false,
            processData: false,
            dataType: 'json'
        });
    }

    ObtenerNotificaciones(usuario) {
        const datos = new FormData();
        datos.append("clase", "ObtenerNotificaciones");
        datos.append("usuario", usuario);

        return $.ajax({
            url: 'php/backend.php',
            type: 'POST',
            data: datos,
            contentType: false,
            processData: false,
            dataType: 'json'
        });
    }



    async GetUsuarios() {
        let datos = new FormData();
        datos.append('clase', 'GetUsuarios');

        try {
            const resultado = await $.ajax({
                url: 'php/backend.php',
                type: 'POST',
                data: datos,
                contentType: false,
                processData: false,
                dataType: 'json'
            });

            return resultado;
        } catch (error) {
            console.error("Error al obtener usuarios:", error);
            return [];
        }
    }

    GetAsistencia(Matricula) {
        let datos = new FormData();
        if (Matricula != "")
            datos.append('matricula', Matricula);
        datos.append('clase', 'GetAsistencia');


        return new Promise((resolve, reject) => {
            $.ajax({
                url: 'php/backend.php',
                type: 'POST',
                data: datos,
                contentType: false,
                processData: false,
                dataType: 'json'
            }).done(function (respuesta) {
                resolve(respuesta);
            }).fail(function (jqXHR, textStatus, errorThrown) {
                console.log("Error de conexión con el servidor: ", textStatus, errorThrown);
                alert("Hubo un problema con la conexión al servidor.");
                reject("Hubo un problema con la conexión al servidor.");
            });
        });
    }

    SetInvitado(Nombre, Correo, Contraseña, Genero) {

        let Procesos = new ProcesosDeterminados();
        let datosSet = new FormData();

        datosSet.append('genero', Genero)
        datosSet.append('contraseña', Contraseña);
        datosSet.append('correo', Correo);
        datosSet.append('nombre', Nombre);
        datosSet.append('clase', 'RegistrarInvitado');


        $.ajax({
            url: 'php/backend.php',
            type: 'POST',
            data: datosSet,
            contentType: false,
            processData: false,
            dataType: 'json'
        }).done(function (respuesta) {
            if (respuesta.status === "success") {
                console.log(respuesta);
                Procesos.MostrarAlerta("El usuario a sido registrado");
                setTimeout(() => {
                    window.location.href = "/SIA/Index.php";
                }, 1000);
            } else {
                console.log("Error: ", respuesta.message);

            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.log("Error de conexión con el servidor: ", textStatus, errorThrown);
            alert("Hubo un problema con la conexión al servidor.");

        });

    }

    ModificarUsuario(Matricula, Nombre, TipoUsuario, Contra, EstadoCuenta, FechaCreacion, NSS, Genero) {

        let Procesos = new ProcesosDeterminados();
        let datosMod = new FormData();

        datosMod.append('matricula', Matricula);
        datosMod.append('nombre', Nombre);
        datosMod.append('tipo_usuario', TipoUsuario);
        datosMod.append('estado_cuenta', EstadoCuenta);
        datosMod.append('fecha_Creacion', FechaCreacion);
        datosMod.append('nss', NSS);
        datosMod.append('contraseña', Contra)

        datosMod.append('genero', Genero);
        datosMod.append('clase', 'ModificarUsuario'); // Este valor será usado para identificar la acción en el backend

        $.ajax({
            url: 'php/backend.php',
            type: 'POST',
            data: datosMod,
            contentType: false,
            processData: false,
            dataType: 'json'
        }).done(function (respuesta) {
            if (respuesta.status === "success") {
                console.log(respuesta);
                Procesos.MostrarAlerta("El usuario ha sido modificado exitosamente");
                setTimeout(() => {
                    window.location.href = "ModificarInfo.php"
                }, 1000);
            } else {
                console.log("Error: ", respuesta);
                Procesos.MostrarAlerta("Error: " + respuesta.message);
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.log("Error de conexión con el servidor: ", textStatus, errorThrown);
            alert("Hubo un problema con la conexión al servidor.");
        });
    }
    CambiarFotoPerfil(archivo, matricula) {
        let Procesos = new ProcesosDeterminados();
        let datos = new FormData();
        datos.append('imagen', archivo);
        datos.append('clase', 'GetImagen');
        datos.append('Matricula', matricula);


        $.ajax({
            url: 'php/backend.php',
            type: 'POST',
            data: datos,
            contentType: false,
            processData: false,
            dataType: 'json'
        }).done(function (respuesta) {
            if (respuesta.status === "success") {
                console.log("Fotografia Actualizada:", respuesta.message);
                Procesos.MostrarAlerta("Fotografia Actualizada");
                setTimeout(() => {
                    window.location.href = "ModificarInfo.php"
                }, 1000);
            } else {
                console.warn("Error al actualizar:", respuesta.message);
                Procesos.MostrarAlerta("Fotografia no a sido Actualizada por un error");
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.log("Error de conexión con el servidor: ", textStatus, errorThrown);
            alert("Hubo un problema con la conexión al servidor.");
            reject("Hubo un problema con la conexión al servidor.");
        });
    }

    RegistrarUsuario(Matricula, Nombre, Correo, Contrasena, TipoUsuario, EstadoCuenta, FechaCreacion, NSS, Genero, FotoPerfil, CargaAcademica = null) {
        let Procesos = new ProcesosDeterminados();
        console.log(Nombre + " " + Correo + " " + Contrasena + " " + Matricula + " " + EstadoCuenta + " " + FechaCreacion + " " + NSS + " " + Genero)
        if (Nombre && Correo && Contrasena && Matricula && EstadoCuenta && FechaCreacion && NSS && Genero) {
            let datosSet = new FormData();
            datosSet.append("matricula", Matricula);
            datosSet.append("nombre", Nombre);
            datosSet.append("correo", Correo);
            datosSet.append("contraseña", Contrasena);
            datosSet.append("tipo_usuario", TipoUsuario);
            datosSet.append("estado_cuenta", EstadoCuenta);
            datosSet.append("fecha_Creacion", FechaCreacion);
            datosSet.append("nss", NSS);
            datosSet.append("genero", Genero);
            if (CargaAcademica)
                datosSet.append("carga_academica", CargaAcademica);
            if (FotoPerfil)
                datosSet.append("foto_perfil", FotoPerfil);
            datosSet.append("clase", "RegistrarUsuario");

            $.ajax({
                url: 'php/backend.php',
                type: 'POST',
                data: datosSet,
                contentType: false,
                processData: false,
                dataType: 'json'
            }).done(function (respuesta) {
                if (respuesta.status === "success") {
                    Procesos.MostrarAlerta("El usuario ha sido registrado");
                    setTimeout(() => {
                        window.location.href = "VisualizarUsuario.php";
                    }, 1500);
                } else {
                    console.log("Error: ", respuesta.message);
                    Procesos.MostrarAlerta("Error al registrar: " + respuesta.message);
                }
            }).fail(function (jqXHR, textStatus, errorThrown) {
                console.log("Error de conexión: ", textStatus, errorThrown);
                alert("Problema con la conexión al servidor.");
            });
        } else {
            Procesos.MostrarAlerta("Por favor, completa todos los campos obligatorios.");
        }
    }



    EliminarUsuario(matricula) {
        let datos = new FormData();
        let Procesos = new ProcesosDeterminados();
        datos.append("clase", "EliminarUsuario");
        datos.append("matricula", matricula);

        $.ajax({
            url: "php/backend.php",
            type: "POST",
            data: datos,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                if (respuesta.status === "success") {
                    Procesos.MostrarAlerta("Usuario eliminado exitosamente.");
                    setTimeout(() => {
                        location.reload();
                    }, 1500);

                } else {
                    Procesos.MostrarAlerta("Error: " + respuesta.message);
                }
            },
            error: function () {
                alert("Error al conectar con el servidor.");
            }
        });
    }



    async IniciarSesion(ISUsuario, ISContraseña, ISmatricula) {
        try {
            let Procesos = new ProcesosDeterminados();
            let InfUsuario = "";
            let error = "";
            if (ISUsuario != "" && ISContraseña != "" && ISmatricula == "") {
                InfUsuario = await this.GetUsuario(ISUsuario, ISContraseña, "");
                error = "Correo o contraseña incorrecto"
            }
            else if (ISUsuario == "" && ISContraseña == "" && ISmatricula != "") {
                InfUsuario = await this.GetUsuario("", "", ISmatricula);
                error = "código o rostro no reconocido"
            }

            let datos = new FormData();
            localStorage.setItem("id_usuario", InfUsuario.id_usuario);
            localStorage.setItem("TipoUsuario", InfUsuario.tipo_usuario);
            localStorage.setItem("Nombre", InfUsuario.nombre);
            let matricula = localStorage.getItem("id_usuario");
            let TipUsuario = localStorage.getItem("TipoUsuario");
            let nombreUsuario = localStorage.getItem("Nombre");
            datos.append('clase', 'inicioSesion');
            datos.append('matricula', matricula);
            datos.append('tipoUsuario', TipUsuario)


            if (matricula.toString() === "undefined") {
                Procesos.MostrarAlerta(error);



            }
            else {
                $.ajax({
                    url: 'php/backend.php',
                    method: 'POST',
                    data: datos,
                    processData: false,
                    contentType: false,
                    dataType: 'json'
                }).done(function (respuesta) {
                    if (respuesta.status === "success") {
                        //Redirección desde JS


                        Procesos.MostrarAlerta("Bienvenido " + nombreUsuario);
                        localStorage.clear();
                        setTimeout(() => {
                            window.location.href = "/SIA/perfil.php";
                        }, 1000);
                    } else {
                        Procesos.MostrarAlerta("No se pudo iniciar sesion");
                    }

                });
            }


        } catch (error) {
            console.error("Error al iniciar Sesion", error);
        }
    }

}


$(document).ready(function () {

    // Cargar jsQR dinámicamente antes de usarlo

    let Procesos = new ProcesosDeterminados();
    let Usuario = new Usuarios();

    //Seccion Inicio Sesion
    $(".botonInicioSes").click(function (e) {
        e.preventDefault(); // Evita que la página se recargue si está dentro de un formulario
        let Cuenta = "";
        let txtUsuario = $('.UsuarioSes').val();
        let txtContraseña = $('.ContraseñaSes').val();
        if (txtUsuario != "" && txtContraseña != "") {
            Usuario.IniciarSesion(txtUsuario, txtContraseña, "");

        }
        else
            Procesos.MostrarAlerta("Correo o contraseña no introducido");
    });

    $(".btnlogoInd").click(function (e) {
        e.preventDefault();
        Procesos.PagPrincipal();
    });

    $(".btnlogoSes").click(function (e) {
        e.preventDefault();
        Procesos.PagPrincipal();
    });


    //seccion Pagina Principal
    $(".btnSesion").click(function (e) {
        e.preventDefault();
        Procesos.PagSesion();
    });
    $(".btnRegistrarse").click(function (e) {
        e.preventDefault();

        Procesos.PagRegistroInv();
    });
    $(".btnMensaje").click(function (e) {
        Procesos.OcultarAlerta();

    });
    $(".btnScanner").click(function (e) {
        Procesos.PagLector();

    });
    $(".btnReconocimiento").click(function (e) {
        Procesos.PagRecono();

    });
    $(".ModPerfil").click(function (e) {
        Procesos.PagModificarInfo();

    });

    $(".perfil").click(function (e) {
        Procesos.pagPerfil();

    });

    $(".VisCarga").click(function (e) {
        Procesos.VisCarga();

    });

    $(".btnRegistroReg").click(function (e) {
        let txtNombre = $('.txtNombreReg').val();
        let txtCorreo = $('.txtCorreoReg').val();
        let txtContra = $('.txtContraReg').val();
        let Genero = "";
        if ($(".RadHombreReg").prop("checked")) {
            Genero = "Hombre";
        }
        else if ($(".RadMujerReg").prop("checked")) {
            Genero = "Mujer";
        }
        if (txtNombre != "" && txtCorreo != "" && txtContra != "" && Genero != "")
            Usuario.SetInvitado(txtNombre, txtCorreo, txtContra, Genero);
        else {
            Procesos.MostrarAlerta("Dato faltante, favor de introducirlo");
        }
    });
    $(".toggle-btn").click(function (e) {
        Procesos.MostrarMenu();
    });
    $(".RegAsistencias").click(function (e) {
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


    $(".PerBoton").click(function (e) {
        let PerUsuario = $('.txtPerUsuario').val();
        let PerMatricula = $('.txtPerMatricula').text();
        let PerSS = $('.txtPerSS').val();
        let PerSexo = $('.txtPerSexo').val();
        let PerContrasena = $('.txtPerContrasena').val();



        localStorage.getItem("correo");

        Usuario.ModificarUsuario(
            localStorage.getItem("Matricula"),                       // matrícula
            PerUsuario,                         // nombre
            localStorage.getItem("TipoUsuario"), // tipo_usuario
            PerContrasena,
            localStorage.getItem("EstadoCuenta"), // estado_cuenta
            localStorage.getItem("FecCreacion"),  // fecha_Creacion
            PerSS,                              // nss                         
            PerSexo                             // genero
        );
    });
    $(".CSesion").click(function (e) {

        Procesos.CerrarSesion();
    });

    $(".ExportarPDF").click(function (e) {

        Procesos.generarPDF();
    });

    $('.PerImgUsuario').on('click', function () {
        $('.selectorImagen').click(); // Dispara el input
    });

    $('.ExportarCarga').on('click', function () {
        Procesos.DescargarImagen();
    });

    $('.selectorImagen').on('change', function (e) {
        const archivo = e.target.files[0];
        var matricula = localStorage.getItem("Matricula");
        if (archivo) {
            const lector = new FileReader();
            lector.readAsDataURL(archivo)

            Usuario.CambiarFotoPerfil(archivo, matricula);
        } else {
            console.log("Subida de archivo cancelada")
        }
    });
    $('.contenedor-flex').click(function (e) {
        Procesos.OcultarMenu();

    });

    $(".btnRegistroAlumno").click(async function () {
        let carrera = $(".selCarrera").val();
        let anio = new Date().getFullYear().toString().slice(-2);

        let conteoCarrera = 1;

        const usuarios = await Usuario.GetUsuarios();

        if (Array.isArray(usuarios)) {
            const filtrados = usuarios.filter(u =>
                u.id_usuario.startsWith(carrera) && u.tipo_usuario === "Alumno"
            );

            if (filtrados.length > 0) {
                let ultimosNumeros = filtrados.map(u => parseInt(u.id_usuario.slice(-4)));

                let ultimo = ultimosNumeros[ultimosNumeros.length - 1];
                conteoCarrera = ultimo + 1;
            }
        }


        let conteoStr = conteoCarrera.toString().padStart(4, '0');
        let matriculaFinal = carrera + anio + conteoStr;
        let Nombre = $(".txtNombreReg").val();
        let Contrasena = $(".txtContraReg").val();
        let Correo = (matriculaFinal + "@itsatlixco.edu.mx");
        let TipoUsuario = "Alumno";
        let EstadoCuenta = "Activo";
        let FechaCreacion = $(".txtFechaReg").val();
        let NSS = $(".txtNssReg").val();
        let Genero = $(".selGenero").val();
        let FotoPerfil = $(".foto_perfil")[0].files[0];
        let CargaAcademica = $(".carga_academica")[0].files[0];
        // Validación de campos obligatorios
        if (!Nombre == "" & !Contrasena == "" & !carrera == "" & !EstadoCuenta == "" & !FechaCreacion == "" & !NSS == "" & !Genero == "" & !CargaAcademica == "") {

            Usuario.RegistrarUsuario(matriculaFinal, Nombre, Correo, Contrasena, TipoUsuario, EstadoCuenta, FechaCreacion, NSS, Genero, FotoPerfil, CargaAcademica);

        }
        else {
            Procesos.MostrarAlerta("no se introdujeron los datos necesarios");

        }
    });

    $(document).on("click", ".NotiPer", function () {
        window.location.href = "Notificaciones.php";
    });



    $(".BuscadorAlumno").on("input", function () {
        let texto = $(this).val().toLowerCase().trim();

        $(".ItemAlumno").each(function () {
            let contenido = $(this).text().toLowerCase();
            if (contenido.includes(texto)) {
                $(this).show(); // Mostrar coincidencias
            } else {
                $(this).hide(); // Ocultar lo que no coincide
            }
        });

        // Opcional: ocultar o mostrar el mensaje de "No se encontró asistencias"
        if ($(".ItemAlumno:visible").length === 0) {
            $(".recuadroVacio").show();
        } else {
            $(".recuadroVacio").hide();
        }
    });



    $(".btnRegistroUser").click(async function () {
        let TipoUsuario = $(".TipUsuario").val();

        // Obtener el último número de usuario para ese tipo
        let conteo = 1;
        const usuarios = await Usuario.GetUsuarios();

        if (Array.isArray(usuarios)) {
            const filtrados = usuarios.filter(u =>
                u.id_usuario.startsWith(TipoUsuario)
            );

            conteo = filtrados.length + 1;

        }


        let matriculaFinal = TipoUsuario + conteo;

        let Nombre = $(".txtNombreReg").val();
        let Correo = $(".txtCorreoReg").val();
        let Contrasena = $(".txtContraReg").val();
        let EstadoCuenta = "Activo";
        let FechaCreacion = $(".txtFechaReg").val();
        let NSS = $(".txtNssReg").val();
        let Genero = $(".selGenero").val();
        let FotoPerfil = $(".foto_perfil")[0].files[0];

        terminacionProhibida = "itsatlixco.edu.mx"

        if (TipoUsuario == "Admin") TipoUsuario = "Administrador";
        else if (TipoUsuario == "Seg") TipoUsuario = "Seguridad";

        // Validación de campos obligatorios
        if (
            Nombre !== "" && Correo !== "" && Contrasena !== "" &&
            TipoUsuario !== "" &&
            FechaCreacion !== "" && NSS !== "" && Genero !== ""
        ) {
            if ((Correo.toLowerCase()).endsWith(terminacionProhibida)) {
                Procesos.MostrarAlerta("El dominio de correo es uso exclusivo para alumnos");
            }
            else {

                Usuario.RegistrarUsuario(
                    matriculaFinal,
                    Nombre,
                    Correo,
                    Contrasena,
                    TipoUsuario,
                    EstadoCuenta,
                    FechaCreacion,
                    NSS,
                    Genero,
                    FotoPerfil
                );
            }
        } else {
            Procesos.MostrarAlerta("Por favor, completa todos los campos obligatorios.");
        }
    });
    $(".btnModificarAlumno").click(function () {
        let matricula = $(".txtIdUsuario").val().trim();
        let nombre = $(".txtnombre").val().trim();
        let correo = $(".txtCorreo").val().trim(); // si deseas validarlo también
        let tipoUsuario = $(".txtTipUsuario").val();
        let contrasena = $(".txtContrasena").val().trim();
        let estado = $(".txtEstado").val();
        let fecha = $(".txtfCreacion").val();
        let nss = $(".txtnss").val().trim();
        let genero = $(".txtGenero").val();

        if (
            matricula && nombre && tipoUsuario && contrasena &&
            estado && fecha && nss && genero
        ) {
            Usuario.ModificarUsuario(matricula, nombre, tipoUsuario, contrasena, estado, fecha, nss, genero);
        } else {
            Procesos.MostrarAlerta("Todos los campos deben estar llenos.");
        }
    });

    /*$(document).ready(function() {
        
    });*/

});