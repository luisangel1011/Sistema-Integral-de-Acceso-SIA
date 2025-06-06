CREATE DATABASE IF NOT EXISTS sia_db;
USE sia_db;


CREATE TABLE Usuario (
    id_usuario varchar(12) PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo_electronico VARCHAR(100) NOT NULL UNIQUE,
    tipo_usuario varchar(100) NOT NULL,
    contrasena VARCHAR(255),
    estado_cuenta varchar(100),
    codigo_qr VARCHAR(255) UNIQUE,
    fecha_Creacion date not null,
    nss varchar(15),
    Vigencia date,
    Genero varchar(25)
)engine=InnoDB;

CREATE TABLE Acceso (
    id_acceso INT AUTO_INCREMENT PRIMARY KEY,
    fecha_hora_acceso DATETIME NOT NULL ,
    punto_acceso VARCHAR(50) NOT NULL,
    id_usuario varchar(12),
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario)
);


CREATE TABLE Notificacion (
    id_notificacion INT AUTO_INCREMENT PRIMARY KEY,
    mensaje TEXT NOT NULL,
    fecha_envio DATETIME NOT NULL,
    destinatario VARCHAR(100) NOT NULL,
    id_usuario varchar(12),
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario) ON DELETE CASCADE
);

CREATE TABLE Informe (
    id_informe INT AUTO_INCREMENT PRIMARY KEY,
    fechaElaborada VARCHAR(50) NOT NULL,
    tipo_informe varchar(100) NOT NULL,
    formato varchar(30) NOT NULL,
    id_administrador varchar(12),
    FOREIGN KEY (id_administrador) REFERENCES Usuario(id_usuario)
);

Create table SolicitudesEntrada(
	idSolicitudes int Auto_Increment primary key,
    FechaHoraSolicitud datetime not null, 
    idInvitado varchar(12),
    idAdministrador varchar(12),
    EstadoSolicitud varchar(30),
    foreign key(idInvitado) references Usuario(id_usuario),
    foreign key (idAdministrador) references Usuario(id_usuario)
);



INSERT INTO Usuario (id_usuario, nombre, correo_electronico, tipo_usuario, contrasena, estado_cuenta, codigo_qr, fecha_Creacion, nss, vigencia, Genero) VALUES
    ('ISC181759', 'Ahmed Garcia Lechuga', 'ISC181759@itsatlixco.edu.mx', 'Alumno', 'z`-}SAWOJMe6', 'Activo', NULL, '2022-08-23', '123-45-6789', NULL, 'Hombre'),
    ('ISC181744', 'Mayra Edith Rojas Barboza', 'ISC181744@itsatlixco.edu.mx', 'Alumno', 'ic|XYHMeN^Wf', 'Activo', NULL, '2022-08-23', '234-56-7890', NULL, 'Mujer'),
    ('ISC17171', 'Julio Maya Ramos', 'ISC17171@itsatlixco.edu.mx', 'Alumno', '1_:cIHV6U"g;', 'Activo', NULL, '2022-08-23', '345-67-8901', NULL, 'Hombre'),
    ('ISC181760', 'Victor Aguilar Dominguez', 'ISC181760@itsatlixco.edu.mx', 'Alumno', 'JrHrYHMXoJL2', 'Activo', NULL, '2022-08-29', '456-78-9012', NULL, 'Hombre'),
    ('ISC191788', 'Kimberly Lilia Saavedra Garcia', 'ISC191788@itsatlixco.edu.mx', 'Alumno', 'H2!N0dll_sO,', 'Activo', NULL, '2022-08-25', '567-89-0123', NULL, 'Mujer'),
    ('ISC191792', 'Nayeli Toxqui Castellanos', 'ISC191792@itsatlixco.edu.mx', 'Alumno', '(QOg=aFmk^$$', 'Activo', NULL, '2022-08-26', '678-90-1234', NULL, 'Mujer'),
    ('ISC191794', 'Eduardo Gomez Palacios', 'ISC191794@itsatlixco.edu.mx', 'Alumno', 'zqT4!W8@V^d', 'Activo', NULL, '2022-08-25', '789-01-2345', NULL, 'Hombre'),
    ('ISC191797', 'Dagoberto Gonzalez Zúñiga', 'ISC191797@itsatlixco.edu.mx', 'Alumno', 'T@3$xW7_qPZ', 'Activo', NULL, '2022-08-25', '890-12-3456', NULL, 'Hombre'),
    ('ISC191798', 'Madai Ruiz García', 'ISC191798@itsatlixco.edu.mx', 'Alumno', 'pT7!NxJwV@0', 'Activo', NULL, '2022-08-28', '901-23-4567', NULL, 'Mujer'),
    ('ISC191802', 'Gabriel Velasco Diaz', 'ISC191802@itsatlixco.edu.mx', 'Alumno', 'tY@7c!zXW9L', 'Activo', NULL, '2022-08-28', '012-34-5678', NULL, 'Hombre'),
    ('ISC191804', 'Gabriela Rosales Morales', 'ISC191804@itsatlixco.edu.mx', 'Alumno', 'Xz6!YpQ7V@4', 'Activo', NULL, '2022-08-26', '123-45-6780', NULL, 'Mujer'),
    ('ISC191808', 'Jonathan David López García', 'ISC191808@itsatlixco.edu.mx', 'Alumno', 'XdT9@p!LqZ2', 'Activo', NULL, '2022-08-25', '234-56-7891', NULL, 'Hombre'),
    ('ISC191809', 'Jocelyn Azucena Hernández García', 'ISC191809@itsatlixco.edu.mx', 'Alumno', 'wQ9!XpL7V@5', 'Activo', NULL, '2022-08-26', '345-67-8902', NULL, 'Mujer'),
    ('ISC191810', 'Kevin Alexis Cocomá Rincón', 'ISC191810@itsatlixco.edu.mx', 'Alumno', 'XpQ8!W7@kL3', 'Activo', NULL, '2022-08-28', '456-78-9013', NULL, 'Hombre'),
    ('ISC191812', 'Pablo Everardo Aguilar Martínez', 'ISC191812@itsatlixco.edu.mx', 'Alumno', 'ZpQ9!kL7VZ!8', 'Activo', NULL, '2022-08-25', '567-89-0124', NULL, 'Hombre'),
    ('ISC191813', 'María de Jesús Niño Balbuena', 'ISC191813@itsatlixco.edu.mx', 'Alumno', 'XpL7@k9QwZ8', 'Activo', NULL, '2022-08-28', '678-90-1235', NULL, 'Mujer'),
    ('ISC191817', 'Joan Santiago Valle Corona', 'ISC191817@itsatlixco.edu.mx', 'Alumno', 'YqL8@Z9XpW5', 'Activo', NULL, '2022-08-29', '789-01-2346', NULL, 'Hombre'),
    ('ISC191819', 'Jesús Cornejal Suárez', 'ISC191819@itsatlixco.edu.mx', 'Alumno', 'XpQ9@kL7V!W3', 'Activo', NULL, '2022-08-28', '890-12-3457', NULL, 'Hombre'),
    ('ISC191820', 'Virinia Genaro Morales', 'ISC191820@itsatlixco.edu.mx', 'Alumno', 'P@6QwZkL!9T3', 'Activo', NULL, '2022-08-28', '901-23-4568', NULL, 'Mujer'),
    ('ISC191825', 'Wendolyn Pedraza Catarino', 'ISC191825@itsatlixco.edu.mx', 'Alumno', 'TQ7!XpL9@6kZ', 'Activo', NULL, '2022-08-26', '012-34-5679', NULL, 'Mujer'),
    ('ISC191826', 'Héctor Iván Martínez Román', 'ISC191826@itsatlixco.edu.mx', 'Alumno', 'ZpQ9!kL7VxW3', 'Activo', NULL, '2022-08-28', '123-45-6781', NULL, 'Hombre'),
   
    ('ISC191831', 'Erika García Gaona', 'ISC191831@itsatlixco.edu.mx', 'Alumno', 'WzT9@kL7QXp5', 'Activo', NULL, '2022-08-26', '234-56-7892', NULL, 'Mujer'),
    ('ISC191835', 'Álvaro Villalba Pérez', 'ISC191835@itsatlixco.edu.mx', 'Alumno', 'XpL7@Q9kVZ!8', 'Activo', NULL, '2022-08-28', '345-67-8903', NULL, 'Hombre'),
    ('ISC191837', 'Alejandro Milán Serrano', 'ISC191837@itsatlixco.edu.mx', 'Alumno', 'XpQ9!kL7VQw8', 'Activo', NULL, '2022-08-29', '456-78-9014', NULL, 'Hombre'),
    ('ISC191839', 'Liliana Michell Romero Castillo', 'ISC191839@itsatlixco.edu.mx', 'Alumno', 'Wk9@XpL7QV!6', 'Activo', NULL, '2022-08-26', '567-89-0125', NULL, 'Mujer'),
    ('ISC201844', 'Yoselin Corio García', 'ISC201844@itsatlixco.edu.mx', 'Alumno', 'TQ8!Xp9L7W@5', 'Activo', NULL, '2022-08-26', '678-90-1236', NULL, 'Mujer'),
    ('ISC201845', 'Marian Barreno Camaño', 'ISC201845@itsatlixco.edu.mx', 'Alumno', 'WpQ9!kL7TQ@3', 'Activo', NULL, '2022-08-28', '789-01-2347', NULL, 'Mujer'),
    ('ISC201846', 'Felipe Cirio Pintle', 'ISC201846@itsatlixco.edu.mx', 'Alumno', 'XpL7!Q9TkV@8', 'Activo', NULL, '2022-08-26', '890-12-3458', NULL, 'Hombre'),
    ('ISC201847', 'Ángeles Itzmoyotl Cuautle', 'ISC201847@itsatlixco.edu.mx', 'Alumno', 'TpL8@k7ZQ9!W3', 'Activo', NULL, '2022-08-26', '901-23-4569', NULL, 'Mujer'),
    ('ISC201848', 'Eduardo Enrique Vázquez Flores', 'ISC201848@itsatlixco.edu.mx', 'Alumno', 'XpL7!TQ9WkZ3', 'Activo', NULL, '2022-08-26', '012-34-5670', NULL, 'Hombre'),    
    ('ISC201850', 'Felipe Aguilar Flores', 'ISC201850@itsatlixco.edu.mx', 'Alumno', 'WpL8!Q7Zk9@3', 'Activo', NULL, '2022-08-29', '123-45-6782', NULL, 'Hombre'),
    ('ISC201851', 'Gustavo López Hernández', 'ISC201851@itsatlixco.edu.mx', 'Alumno', 'Lp9Q!ZkT7W@3', 'Activo', NULL, '2022-08-28', '234-56-7893', NULL, 'Hombre'),
    ('ISC201852', 'Guillermo Alberto Castillo Romero', 'ISC201852@itsatlixco.edu.mx', 'Alumno', 'Lp9Q!ZkT7W53', 'Activo', NULL, '2022-08-28', '234-56-7833', NULL, 'Hombre'),
    ('ISC201854', 'Miguel Angel Mendez Ramos', 'ISC201854@itsatlixco.edu.mx', 'Alumno', 'Lp9Q!ZkT7W@3', 'Activo', NULL, '2022-08-28', '234-96-7893', NULL, 'Hombre'),
    ('ISC201856', 'Alexandra Antonio Ubera', 'ISC201856@itsatlixco.edu.mx', 'Alumno', 'Lp9Q!ZkT7W@3', 'Activo', NULL, '2022-08-28', '234-56-7893', NULL, 'Mujer'),
    ('ISC201857', 'Kevin Alexis Lopez Cortes', 'ISC201857@itsatlixco.edu.mx', 'Alumno', 'Lp9Q!ZkT7W@3', 'Activo', NULL, '2022-08-28', '234-56-7893', NULL, 'Hombre'),
    ('ISC201859', 'Miguel Angel Argueta Jeronimo', 'ISC201859@itsatlixco.edu.mx', 'Alumno', 'Lp9Q!ZkT7W@3', 'Activo', NULL, '2022-08-28', '234-56-7893', NULL, 'Hombre'),
    ('ISC201860', 'Xanat Janahy Solorio Corio', 'ISC201860@itsatlixco.edu.mx', 'Alumno', 'Lp9Q!ZkT7W@3', 'Activo', NULL, '2022-08-28', '234-56-7893', NULL, 'Mujer'),
    
    ('ISC201866', 'Brayan Guadalupe Pastrana Torres', 'ISC201866@itsatlixco.edu.mx', 'Alumno', 'Lp9Q!ZkT7W@3', 'Activo', NULL, '2022-08-28', '234-56-7893', NULL, 'Hombre'),
    ('ISC201869', 'Kevin Hernandez Sanchez', 'ISC201869@itsatlixco.edu.mx', 'Alumno', 'Lp9Q!ZkT7W@3', 'Activo', NULL, '2022-08-28', '234-56-7893', NULL, 'Hombre'),
    ('ISC201872', 'Jovanny Varela Vicuña', 'ISC201872@itsatlixco.edu.mx', 'Alumno', 'Lp9Q!ZkT7W@3', 'Activo', NULL, '2022-08-28', '234-56-7893', NULL, 'Hombre'),
    ('ISC201874', 'Hugo Huepa Cortes', 'ISC201874@itsatlixco.edu.mx', 'Alumno', 'Lp9Q!ZkT7W@3', 'Activo', NULL, '2022-08-28', '234-56-7893', NULL, 'Hombre'),
    ('ISC201875', 'Berenice Sosa Sosa', 'ISC201875@itsatlixco.edu.mx', 'Alumno', 'Lp9Q!ZkT7W@3', 'Activo', NULL, '2022-08-28', '234-56-7893', NULL, 'Mujer'),
    ('ISC201876', 'Alejandro Erick Orta Plata', 'ISC201876@itsatlixco.edu.mx', 'Alumno', 'Lp9Q!ZkT7W@3', 'Activo', NULL, '2022-08-28', '234-56-7893', NULL, 'Hombre'),
    ('ISC201880', 'Uriel Gonzalez Acolco', 'ISC201880@itsatlixco.edu.mx', 'Alumno', 'Lp9Q!ZkT7W@3', 'Activo', NULL, '2022-08-28', '234-56-7893', NULL, 'Hombre'),
    ('ISC201882', 'Oscar Perez Luna', 'ISC201882@itsatlixco.edu.mx', 'Alumno', 'Lp9Q!ZkT7W@3', 'Activo', NULL, '2022-08-28', '234-56-7893', NULL, 'Hombre'),
    ('ISC211888', 'Gonzalo Mateo Nepomuceno Morales', 'ISC211888@itsatlixco.edu.mx', 'Alumno', 'Lp9Q!ZkT7W@3', 'Activo', NULL, '2022-08-28', '234-56-7893', NULL, 'Hombre'),
    ('ISC211889', 'Jesus Antonio Velazquez Castillo', 'ISC211889@itsatlixco.edu.mx', 'Alumno', 'Lp9Q!ZkT7W@3', 'Activo', NULL, '2022-08-28', '234-56-7893', NULL, 'Hombre'),
    ('ISC211890', 'Mariana Coatl Coatl', 'ISC211890@itsatlixco.edu.mx', 'Alumno', 'Lp9Q!ZkT7W@3', 'Activo', NULL, '2022-08-28', '234-56-7893', NULL, 'Mujer'),
    ('ISC211891', 'Jovany Chino Cerezo', 'ISC211891@itsatlixco.edu.mx', 'Alumno', 'Lp9Q!ZkT7W@3', 'Activo', NULL, '2022-08-28', '234-56-7893', NULL, 'Hombre'),
    ('ISC211892', 'Jose Ivan Reyes Zecua', 'ISC211892@itsatlixco.edu.mx', 'Alumno', 'Lp9Q!ZkT7W@3', 'Activo', NULL, '2022-08-28', '234-56-7893', NULL, 'Hombre'),
    ('ISC211894', 'Rodrigo Navarro Márquez de la Mora', 'ISC211894@itsatlixco.edu.mx', 'Alumno', 'RnMM1234@', 'Activo', NULL, '2022-08-26', '345-67-8904', NULL, 'Hombre'),
    ('ISC211898', 'Jeter Amador Cardoso', 'ISC211898@itsatlixco.edu.mx', 'Alumno', 'JaC1234@', 'Activo', NULL, '2022-08-28', '456-78-9015', NULL, 'Hombre'),
    ('ISC211900', 'Jonathan Ruiz Garcia', 'ISC211900@itsatlixco.edu.mx', 'Alumno', 'JrG1234@', 'Activo', NULL, '2022-08-28', '567-89-0126', NULL, 'Hombre'),
    ('ISC211901', 'Enevi Aracely Perez Hernandez', 'ISC211901@itsatlixco.edu.mx', 'Alumno', 'Lp9Q!ZkT7W@3', 'Activo', NULL, '2022-08-28', '234-56-7893', NULL, 'Mujer'),
    ('ISC211903', 'Eder Efren Francisco Melchor', 'ISC211903@itsatlixco.edu.mx', 'Alumno', 'EeFM1234@', 'Activo', NULL, '2022-08-26', '678-90-1237', NULL, 'Hombre'),
    ('ISC211904', 'Jorge Antonio Arnal Ramirez', 'ISC211904@itsatlixco.edu.mx', 'Alumno', 'JaAR1234@', 'Activo', NULL, '2022-08-26', '789-01-2348', NULL, 'Hombre'),
    ('ISC211908', 'Ariel Chelo Jurado', 'ISC211908@itsatlixco.edu.mx', 'Alumno', 'AcJ1234@', 'Activo', NULL, '2022-08-28', '890-12-3459', NULL, 'Hombre'),
    ('ISC211909', 'Emmanuel Sanchez Rodriguez', 'ISC211909@itsatlixco.edu.mx', 'Alumno', 'EsR1234@', 'Activo', NULL, '2022-08-26', '901-23-4570', NULL, 'Hombre'),
    
    ('ISC211910', 'David Perez Saldaña', 'ISC211910@itsatlixco.edu.mx', 'Alumno', 'DpS1234@', 'Activo', NULL, '2022-08-28', '012-34-5671', NULL, 'Hombre'),
    ('ISC211912', 'Andrea Chavez Moranchel', 'ISC211912@itsatlixco.edu.mx', 'Alumno', 'AcM1234@', 'Activo', NULL, '2022-08-26', '123-45-6783', NULL, 'Mujer'),
    ('ISC211913', 'Deny Alonso Alvarez', 'ISC211913@itsatlixco.edu.mx', 'Alumno', 'DaA1234@', 'Activo', NULL, '2022-08-28', '234-56-7894', NULL, 'Hombre'),
    ('ISC211914', 'Cristian Daniel Martinez Morales', 'ISC211914@itsatlixco.edu.mx', 'Alumno', 'CdMM1234@', 'Activo', NULL, '2022-08-28', '345-67-8905', NULL, 'Hombre'),
    ('ISC211915', 'Mario Perez Cabrera', 'ISC211915@itsatlixco.edu.mx', 'Alumno', 'MpC1234@', 'Activo', NULL, '2022-08-28', '456-78-9016', NULL, 'Hombre'),
    ('ISC211918', 'Juan Carlos Sanchez Garcia', 'ISC211918@itsatlixco.edu.mx', 'Alumno', 'JcSG1234@', 'Activo', NULL, '2022-08-25', '567-89-0127', NULL, 'Hombre'),
    ('ISC211920', 'Zureyma Denize Rodriguez Tolentino', 'ISC211920@itsatlixco.edu.mx', 'Alumno', 'ZdRT1234@', 'Activo', NULL, '2022-08-28', '678-90-1238', NULL, 'Mujer'),
    ('ISC211922', 'Erick Suarez Suarez', 'ISC211922@itsatlixco.edu.mx', 'Alumno', 'EsS1234@', 'Activo', NULL, '2022-08-25', '789-01-2349', NULL, 'Hombre'),
    ('ISC211926', 'Joselyn Itzel Cantoran Bernabe', 'ISC211926@itsatlixco.edu.mx', 'Alumno', 'JiCB1234@', 'Activo', NULL, '2022-08-28', '890-12-3460', NULL, 'Mujer'),
    ('ISC211927', 'Luis Angel Daniel Vazquez', 'ISC211927@itsatlixco.edu.mx', 'Alumno', 'LaDV1234@', 'Activo', NULL, '2022-08-25', '901-23-4571', NULL, 'Hombre'),    
    
    ('ISC211928', 'Erick Mendez Tlacomulco', 'ISC211928@itsatlixco.edu.mx', 'Alumno', 'EmT1234@', 'Activo', NULL, '2022-08-26', '012-34-5672',NULL, 'Hombre'),
    ('ISC211929', 'Favio Adalberto Vivaldo Carranza', 'ISC211929@itsatlixco.edu.mx', 'Alumno', 'FaVC1234@', 'Activo', NULL, '2022-08-28', '123-45-6784',NULL, 'Hombre'),
    ('ISC211932', 'Juan Alejandro Aguilar Paredes', 'ISC211932@itsatlixco.edu.mx', 'Alumno', 'JaAP1234@', 'Activo', NULL, '2022-08-29', '234-56-7895',NULL, 'Hombre'),
    ('ISC211933', 'Luis Angel Puente Quevedo', 'ISC211933@itsatlixco.edu.mx', 'Alumno', 'LaPQ1234@', 'Activo', NULL, '2022-08-26', '345-67-8906',NULL, 'Hombre'),
    ('ISC211934', 'Elizabeth Perez Galicia', 'ISC211934@itsatlixco.edu.mx', 'Alumno', 'EpG1234@', 'Activo', NULL, '2022-08-29', '456-78-9017',NULL, 'Mujer'),
    
    ('ISC211937', 'Cristian Franco Lazaro', 'ISC211937@itsatlixco.edu.mx', 'Alumno', 'CfL1234@', 'Activo', NULL, '2022-08-25', '567-89-0128',NULL, 'Hombre'),
    ('ISC211944', 'Lorenzo Rojas Garcia', 'ISC211944@itsatlixco.edu.mx', 'Alumno', 'LrG1234@', 'Activo', NULL, '2022-08-26', '678-90-1239',NULL, 'Hombre'),
    ('ISC211946', 'Ana Cecilia Gonzalez Aguila', 'ISC211946@itsatlixco.edu.mx', 'Alumno', 'AcGA1234@', 'Activo', NULL, '2022-08-28', '789-01-2350',NULL, 'Mujer'),
    ('ISC211950', 'Amisadai Hernandez Sanchez', 'ISC211950@itsatlixco.edu.mx', 'Alumno', 'AhS1234@', 'Activo', NULL, '2022-08-28', '890-12-3461',NULL, 'Mujer'),
    ('ISC211951', 'Jannys Garcia Espiritu', 'ISC211951@itsatlixco.edu.mx', 'Alumno', 'JgE1234@', 'Activo', NULL, '2022-08-28', '901-23-4572',NULL, 'Mujer'),
    ('ISC211952', 'Anahi Gonzalez Serrano', 'ISC211952@itsatlixco.edu.mx', 'Alumno', 'AgS1234@', 'Activo', NULL, '2022-08-25', '012-34-5673',NULL, 'Mujer'),
    ('ISC211954', 'Karen Ponciano Flores', 'ISC211954@itsatlixco.edu.mx', 'Alumno', 'KpF1234@', 'Activo', NULL, '2022-08-28', '014-39-3059',NULL, 'Mujer'),
    ('ISC211956', 'Lizeth Varela Xelhua', 'ISC211956@itsatlixco.edu.mx', 'Alumno', '1234', 'Activo', NULL, '2022-08-28', '014-000-9345',NULL, 'Mujer'),
    
    ('ISC211959', 'Norberta Cholula Cholula', 'ISC211959@itsatlixco.edu.mx', 'Alumno', '1234', 'Activo', NULL, '2022-08-28', '014-45-5435',NULL, 'Mujer'),
    ('ISC211961', 'Fabiola Martinez Diego', 'ISC211961@itsatlixco.edu.mx', 'Alumno', '1234', 'Activo', NULL, '2022-08-26', '014-54-6543',NULL, 'Mujer'),
    ('ISC232092', 'Mayte Blas Copalcuatzin', 'ISC232092@itsatlixco.edu.mx', 'Alumno', '1234', 'Activo', NULL, '2022-08-26', '014-54-6543',NULL, 'Mujer'),
    ('ISC232051', 'Alejandro Parada Gonzalez', 'ISC232051@itsatlixco.edu.mx', 'Alumno', '1234', 'Activo', NULL, '2022-08-26', '014-54-6543',NULL, 'Hombre'),
    ("IB190963", "ANGELICA ITZMOYOTL CUAUTLE", "IB190963@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Mujer"),
    ("IB190962", "JAIME HUEHPA CUAUTLE", "IB190962@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Hombre"),
    ("IB190964", "YITZEL BRUNO MENESES", "IB190964@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Mujer"),
    ("IB190968", "VIOLETA AHUEHUETL HERNANDEZ", "IB190968@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Mujer"),
    ("IB190969", "HECTOR IVAN MUNDO INFANTE", "IB190969@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Hombre"),
    ("IB190976", "JAEL SCARLET CRUZ CALLEJA", "IB190976@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Mujer"),
    ("IB190977", "MARIA DEL ROCIO PEREZ HERNANDEZ", "IB190977@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Mujer"),
    ("IB190978", "ALONDRA COMI SERRANO", "IB190978@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Mujer"),
    ("IB190979", "ADRIANA CARRERA MEDEL", "IB190979@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Mujer"),
    ("IB190980", "JOSE ALBERTO GOMEZ RUEDA", "IB190980@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Hombre"),
    ("IB190984", "SANDRA HERNANDEZ TORIBIO", "IB190984@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Mujer"),
    ("IB190985", "ANGEL DANIEL LIMONTITLA HIDALGO", "IB190985@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Hombre"),
    ("IB190986", "ENRIQUE EMANUEL MARTINEZ SERRANO", "IB190986@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Hombre"),
    ("IB190990", "FATIMA SOLANO SALDIVAR", "IB190990@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Mujer"),
    ("IB190993", "CESAR CAZARES MORALES", "IB190993@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Hombre"),
    ("IB190994", "DULCE MARIA REYES HERNANDEZ", "IB190994@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Mujer"),
    ("IB190995", "MARTHA MARLENE FLORES MUÑOZ", "IB190995@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Mujer"),
    ("IB190996", "JUAN JESUS CUAUTLI PAREDES", "IB190996@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-28", NULL, NULL, "Hombre"),
    ("IB190997", "MARLEN CUAUTLI PAREDES", "IB190997@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Mujer"),
    ("IB190998", "JENNIFER ESTEVES MARTINEZ", "IB190998@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Mujer"),
    ("IB190999", "JOSUE ARI ALONZO SOLIS", "IB190999@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Hombre"),
    ("IB19006", "LAISHA YOSELIN ORTEGA FERNANDEZ", "IB19006@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Mujer"),
    ("IB19007", "ALEXIA MORALES NAVARRO", "IB19007@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Mujer"),
    ("IB191015", "KEVIN JEREMY LUCERO SANCHEZ", "IB191015@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Hombre"),
    ("IB19022", "OMAR ALBERTO CAMACHO GARCIA", "IB19022@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Hombre"),
    ("IB201036", "FABIAN ITZMOYOTL TECUAPETLA", "IB201036@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Hombre"),
    ("IB201046", "EMELYN BELEN TIRO PEREZ", "IB201046@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Mujer"),
    ("IB211060", "BRISA RUBI SARMIENTO SUAREZ", "IB211060@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Mujer"),
    ("IB211063", "JOSE ALBERTO CASTILLO GIL", "IB211063@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Hombre"),
    ("IB211064", "JOHAN CAMPOS OLMEDO", "IB211064@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Hombre"),
    ("IB211066", "GUADALUPE ALISSON FLORES MARTINEZ", "IB211066@itsatlixco.edu.mx", "Alumno", "1234", "Activo", NULL, "2022-08-29", NULL, NULL, "Mujer");

  INSERT INTO Usuario (id_usuario, nombre, correo_electronico, tipo_usuario, contrasena, estado_cuenta, codigo_qr, fecha_Creacion, nss, vigencia, Genero) VALUES
    ("1234", "rodriguez saldaña martinez", "rosal2405@gmail.com", "Administradores", "1234", "Activo", NULL, "2015-01-15", "56897485", NULL, "Mujer"),
    ("1342", "Alberto Perez Cordero", "alpex1504@hotmail.com", "Administradores", "1234", "Activo", NULL, "2018-01-15", "23452143", NULL, "Hombre"),
    ("5343", "Juan Vasurita Martines", "Juva1606@gmail.com", "Administradores", "1234", "Activo", NULL, "2022-04-19", "546534234", NULL, "Hombre");
    