/*
//NOTE para el siguiente sprint, considerar reorganizar los scripts (para optimizar el cargado de datos):
    1) Script de CREATE DATABASE y CREATE TABLES (pero sin relaciones)
    2) Script de cargar datos (éste)
    3) Script de creación de CONSTRAINTS/FOREIGN KEYS entre tablas
*/

USE dbeasylife;

/* -------------------------------- Tabla Categorías -------------------------------- */
INSERT INTO categorias
    (id, nombre, descripcion, imagen)
VALUES
    (1, 'Ocio', 'Gracias a nuestras programas de ocio podrás disfrutar de un amplio repertorio de actividades para todos los gustos y necesidades.', 'ocio.jpg'),
    (2, 'Transporte', 'Nuestro servicio de transporte te permite la movilidad que necesitas al mejor precio y con las máximas garantías. ', 'transporte.png'),
    (3, 'Ayuda psicológica', 'Con nuestros programas y actividades de promoción de la salud y envejecimiento activo podrás afrontar de manera saludable y positiva los cambios de la etapa vital en la que te encuentras.', 'asistenciapsicologica.png'),
    (4, 'Asesoramiento Fiscal', 'Con nuestro servicio de asistencia jurídico-legal nos encargamos de que no te tengas que preocupar nunca más del papeleo burocrático. ', 'asesoramientofiscal.png'),
    (5, 'Asistencia a la salud', 'Nuestro servicio de asistencia a salud se encarga de optimizar el bienestar físico de tus seres queridos y de brindarte la paz y la tranquilidad de tener el apoyo de los mejores profesionales. ', 'asistenciasalud.png'),
    (6, 'Asistencia domiciliaria', 'Nuestro servicio de ayuda en domicilio se encarga de proporcionar apoyo y estabilidad en el entorno familiar para que su calidad de vida sea óptima en todo momento.', 'asistenciadomiciliaria.png')
;

/* -------------------------------- Tabla Servicios -------------------------------- */
INSERT INTO servicios
    (id, nombre, categoria_id, precio, imagen, descripcion)
VALUES
    /* ------ Servicios de la categoria 1: ocio ------ */
    (1, 'Excursiones', 1, 50, 'excursiones.jpg', 'Excursiones y salidas grupales a diferentes lugares emblemáticos del territorio español, en las que se incluye alojamiento a pensión completa y diversas actividades de entretenimiento tales como visitas guiadas o espectáculos entre otros.'),
    (2, 'Actividades de ocio', 1, 60, 'actividades-de-ocio.jpg', 'Organización de actividades de ocio en centros de reunión habilitados, tales como almuerzos o meriendas, competiciones de juegos de entretenimiento clásicos (ajedrez, juegos de cartas, dominó, etc)  encuentros entre asociaciones, clubs, etc.'),
    (3, 'Charlas', 1, 50, 'charlas.jpg', 'Excursiones y salidas grupales a diferentes lugares emblemáticos del territorio español, en las que se incluye alojamiento a pensión completa y diversas actividades de entretenimiento tales como visitas guiadas o espectáculos entre otros.'),
    (4, 'Presentación de proyectos', 1, 40, 'proyectos-usuario.jpg', 'Presentación de proyectos realizados por los clientes/usuarios tales como exposiciones de arte de diferentes ámbitos como la pintura, el dibujo, la carpintería, la escritura o escultura entre otros.'),
    (5, 'Talleres de aprendizaje', 1, 50, 'talleres.jpg', 'Talleres de aprendizaje en diferentes áreas (informática, pintura, jardinería, etc).'),

    /* ------ Servicios de la categoria 2: transporte ------ */
    (6, 'Transporte centros de salud', 2, 70, 'trans-salud.jpg', 'Transporte a centros de salud, hospitales, mutuas o, en general, cualquier centro dedicado al sector sanitario.'),
    (7, 'Transporte centros de ocio', 2, 75, 'trans-ocio.jpg', 'Transporte a centros de ocio o reunión tales como centros comerciales, hogares del jubilado, estadios de fútbol, cines, teatros, etc.'),
    (8, 'Transporte personalizado', 2, 80, 'trans-personalizado.jpg', 'Transporte personalizado a la localización elegida por el cliente, siendo posible el establecimiento de un horario o punto de recogida, el transporte a diferentes localizaciones o servicios adicionales.'),

    /* ------ Servicios de la categoria 3: ayuda psicológica ------ */
    (9, 'Acompañamiento personal', 3, 40, 'trans-personalizado.jpg', 'Un servicio de acompañamiento personal y social realizado por profesionales cualificados que se aseguran de que el cliente/usuario se sienta escuchado, comprendido e incluido en sociedad a través de un vínculo social.'),
    (10, 'Estimulación cognitiva', 3, 45, 'trans-personalizado.jpg', 'Sesiones tanto individuales como grupales de estimulación o rehabilitación cognitiva para favorecer el envejecimiento activo y favorecer las reservas cognitivas anticipándose al desarrollo de demencias o alteraciones cognitivas derivadas del proceso de envejecimiento. '),
    (11, 'Tratamiento psicológico clínico', 3, 43, 'trans-personalizado.jpg', 'Tratamiento psicológico clínico para adultos con trastornos psiquiátricos realizado por profesionales ampliamente experimentados en el sector de la salud mental.'),
    (12, 'Resolución de conflictos familiares', 3, 50, 'trans-personalizado.jpg', 'Resolución de conflictos familiares a través de profesionales expertos en la mediación y el asesoramiento familiar.'),

    /* ------ Servicios de la categoria 4: asesoramiento jurídico y fiscal ------ */
    (13, 'Asistencia pensiones', 4, 80, 'asis-pensiones.jpg', 'Un servicio de asistencia activo que se encarga de guiar al cliente a través de todo el procedimiento para solicitar y regular la pensión de jubilación; nos encargamos de adecuar formalmente todos los requisitos y la entrega de documentación a todos los organismos competentes. También nos encargamos de resolver las posibles dudas parciales que tengas del proceso en el caso de que quiera realizarlo usted mismo.'),
    (14, 'Gestión de otras subvenciones', 4, 85, 'asis-subvenciones.jpg', 'La organización de la documentación necesaria para lograr el acceso al sistema de subvenciones y ayudas para personas con discapacidad, la gestión del papeleo para cobrar las prestaciones por viudedad o nos encargamos de facilitar el acceso a las diferentes ayudas monetarias que ofrece la comunidad valenciana para el pago de servicios como: la ayuda a domicilio o la teleasistencia.'),

    /* ------ Servicios de la categoria 5: asistencia a la salud general ------ */
    (15, 'Recordatorios de citas', 5, 85, 'salud-recordatorios.jpg', 'Servicio de teleasistencia para el recordatorio de citas médicas o similares.'),
    (16, 'Dietas personalizadas', 5, 85, 'salud-dieta.jpg', 'La configuración de una dieta saludable totalmente personalizada a tus necesidades (edad, sexo, enfermedades etc) establecida por profesionales cualificados.'),
    (17, 'Gestión de pastilleros', 5, 85, 'salud-pastilleros.jpg', 'La organización de pastilleros de la forma más optimizada posible para asegurarnos de que no olvides ninguna toma.'),

    /* ------ Servicios de la categoria 6: asistencia domiciliaria ------ */
    (18, 'Aseo y cuidado', 6, 50, 'domicilio-aseo.jpg', 'Apoyo en el aseo y cuidado personal'),
    (19, 'Ayuda para comer', 6, 55, 'domicilio-comer.jpg', 'Ayuda para comer'),
    (20, 'Supervisión de medicación', 6, 54, 'domicilio-medicamentos.jpg', 'Supervisión, si procede, de la medicación y del estado de salud'),
    (21, 'Apoyo a la movilización', 6, 59, 'domicilio-movilidad.jpg', 'Apoyo a la movilidad dentro del hogar'),
    (22, 'Otras actividades', 6, 55, 'domicilio-otros.jpg', 'Actividades y tareas que se realicen de forma cotidiana en el hogar: alimentación, ropa, limpieza y mantenimiento de la vivienda.')   
;

/* -------------------------------- Tabla Imagenescarousel -------------------------------- */
INSERT INTO imagenescarousel
    (id, imagen, titulo, descripcion)
VALUES
    (1, 'carrousel-comida.jpg', 'Dietas personalizadas', 'Nuestros expertos de la alimentación elaboran dietas sanas y equilibradas'),
    (2, 'carrousel-costa.jpg', 'Excursiones grupales', 'Únete a nuestras excursiones a localidades cercanas!'),
    (3, 'carrousel-crucero.jpg', 'Viajes organizados', 'Participa en nuestros geniales viajes'),
    (4, 'carrousel-furgona.jpg', 'Servicio de transporte', 'Te llevamos a donde necesites llegar'),
    (5, 'carrousel-paris.jpg', 'Viajes al extranjero', 'Ven con nosotros a lugares de ensueño')
;

/* -------------------------------- Tabla Usuarios -------------------------------- */
INSERT INTO users
    (id, name, mobilephone, address, dni, type, acreditation, password, image, email)
VALUES
    /* Suposiciones: //REVIEW
        1) Tipo 1 son administradores, tipo 2 usuarios normales, tipo 3 proveedores. Igual hace falta comprobar a nivel de aplicación que los proveedores introduzcan acreditación al darse de alta. 
        2) La imagen se genera a partir de id usuario, así que guardamos extensión
        3) Las contraseñas de prueba son el MD5 del username. Sacado de este generador de hash MD5: https://www.miraclesalad.com/webtools/md5.php
        4) Faltaría crear un campo en la tabla para distinguir entre nombre (de username) y nombre (de nombre completo).
    */
    (1, 'admin', '616666666', 'N/A', '11111111A', 1, null, '21232f297a57a5a743894a0e4a801fc3', '.jpg', 'admin@test.com'),
    (2, 'Gregor Samsa', '697821544', '27576 Fordem Terrace', '36981294P', 3, 'ACREDITACION-del-2', '3135f7b3f6b5dc80cf89b6a7bb22b36e', '.jpg', 'samsa@test.com'),
    (3, 'Ignatius J. Reilly', '678951535', '695 Commercial Park', '97652371B', 3, 'otra-acreditacion', '0ea342aa78b6b4112f144184a37cb299', '.png', 'conjura@test.com'),
    (4, 'Abuelete García', '689742178', '295 Towne Alley', '16547893F', 2, null, '4aab69d94495ca2741807e35f1a70a83', '.jpg', 'abuelete@test.com'),
    (5, 'Brian the Messiah', '698753215', '1234 Jerusalem', '98739124Z', 2, 'acreditacion-random', '23440c769ff2666d9561aa06e21720fc', '.png', 'brian@test.com')
;

/* -------------------------------- Tabla colaboradores  -------------------------------- */
INSERT INTO colaboradores
    (id, nombre, imagen)
VALUES
    (1, 'Ajuntament de Mislata', 'colab-mislata.png'),
    (2, 'Asociación Amigos de la tercera edad', 'colab-amigos-3a-edad.jpg'),
    (3, 'Fundación por la memoria', 'colab-memoria.png'),
    (4, 'Ajuntament de València', 'colab-valencia.png')
;

/*  ======================================================================================
                                    TABLAS DE RELACIONES
    ======================================================================================
*/
/* -------------------------------- Tabla colaborador_servicio -------------------------------- */
INSERT INTO colaborador_servicio
    (servicio_id, colaborador_id)
VALUES
    /* Suposiciones: //REVIEW 
        1) Un servicio puede tener 0 o n colaboradores.
        2) Un colaborador puede colaborar en 0 o n servicios.
    */
    (3, 1),
    (10, 2),
    (7, 1),
    (3, 4)
;

/* -------------------------------- Tabla servicio_user -------------------------------- */
INSERT INTO servicio_user
    (servicio_id, user_id, tipo)
VALUES
    /* Suposiciones: //REVIEW 
        Las mismas 3 que en la tabla colabora, y además:
        4) Un usuario de tipo proveedor puede también comprar servicios.
        5) Más adelante en esta tabla podríamos añadir campos de detalles de la compra (fecha, precio total, ...).
    */
    (3, 3, 'provee'),
    (10, 2, 'compra'),
    (7, 5, 'compra'),
    (6, 2, 'provee'),
    (3, 5, 'compra'),
    (3, 1, 'provee'),
    (1, 2, 'compra'),
    (5, 2, 'compra'),
    (7, 3, 'provee'),
    (6, 3, 'compra')
;