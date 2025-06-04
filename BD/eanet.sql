DROP database if exists EANET;
CREATE DATABASE EANET;

USE EANET;

CREATE TABLE `roles` (
  `id` int(20) NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Admin'),
(4, 'Egresado'),
(3, 'Estudiante'),
(2, 'Profesor');


CREATE TABLE `facultades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `facultades` (`id`, `nombre`) VALUES
(5, 'Artes y Humanidades'),
(2, 'Ciencias de la Salud'),
(3, 'Ciencias Económicas'),
(4, 'Ciencias Sociales'),
(1, 'Ingeniería');



CREATE TABLE `carreras` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `facultad_id` int(11) NOT NULL
);


INSERT INTO `carreras` (`id`, `nombre`, `facultad_id`) VALUES
(1, 'Ingeniería de Sistemas', 1),
(2, 'Ingeniería Industrial', 1),
(3, 'Enfermería', 2),
(4, 'Economía', 3),
(5, 'Psicología', 4),
(6, 'Filosofía', 5);


CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `primer_nombre` varchar(50) NOT NULL,
  `segundo_nombre` varchar(50) DEFAULT NULL,
  `tercer_nombre` varchar(50) DEFAULT NULL,
  `primer_apellido` varchar(50) NOT NULL,
  `segundo_apellido` varchar(50) DEFAULT NULL,
  `tercer_apellido` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `carrera_id` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `fecha_registro` datetime DEFAULT current_timestamp(),
  `Acerca_de_ti` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `usuarios` (`id`, `primer_nombre`, `segundo_nombre`, `tercer_nombre`, `primer_apellido`, `segundo_apellido`, `tercer_apellido`, `fecha_nacimiento`, `telefono`, `correo`, `password`, `rol_id`, `carrera_id`, `activo`, `fecha_registro`, `Acerca_de_ti`) VALUES
(2, 'Diana', ' Alejandra', NULL, 'Cruz', 'Acosta', NULL, '2001-07-22', '3202500038', 'dcruzac44538@universidadean.edu.co', '123456', 3, 1, 1, '2025-05-25 11:50:11', NULL),
(3, 'Michael', 'Alejandro', NULL, 'Baez', 'Lagos', NULL, '1999-11-05', '3223693113', 'mbaezla49879@universidadean.edu.co', '123456', 3, 1, 1, '2025-05-25 11:50:11', NULL),
(1001299203, 'Paula', 'Catalina', NULL, 'Delgado', 'Almendrales', NULL, '2002-10-27', '3123617109', 'pdelgad99203@universidadean.edu.co', '123456', 3, 1, 1, '2025-05-25 11:50:11', NULL);
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);
  
ALTER TABLE `facultades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);
  
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `facultad_id` (`facultad_id`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rol_id` (`rol_id`),
  ADD KEY `fk_carrera_id` (`carrera_id`);
ALTER TABLE `carreras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `facultades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `carreras`
  ADD CONSTRAINT `carreras_ibfk_1` FOREIGN KEY (`facultad_id`) REFERENCES `facultades` (`id`);
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_carrera_id` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`),
  ADD CONSTRAINT `fk_rol` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `fk_rol_id` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

CREATE TABLE contador_visitas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    visitas INT NOT NULL DEFAULT 0
);

INSERT INTO contador_visitas (visitas) VALUES (0);

