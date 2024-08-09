-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-06-2024 a las 00:07:36
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alertas_tempranas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendiz`
--

CREATE TABLE `aprendiz` (
  `id` int(11) NOT NULL,
  `documento` bigint(20) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telefono` int(11) NOT NULL,
  `programa` varchar(50) NOT NULL,
  `ficha` varchar(30) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aprendiz`
--

INSERT INTO `aprendiz` (`id`, `documento`, `nombre`, `apellido`, `email`, `telefono`, `programa`, `ficha`, `id_usuario`) VALUES
(1, 1234567890, 'Andrea ', 'Martinez', 'andrea.martinez@sena.edu.co', 2147483647, 'Tecnología en Análisis y Desarrollo de Sistemas de', '12345', 1),
(2, 2345678901, 'Carlos', 'Gutierrez', 'carlos.gutierrez@sena.edu.co', 2147483647, 'Tecnología en Gestión de Redes', '12346', 2),
(3, 3456789012, 'Lucia', 'Fernandez', 'lucia.fernandez@sena.edu.co', 2147483647, 'Tecnología en Gestión Administrativa', '12347', 3),
(4, 4567890123, 'Jorge ', 'Ramirez', 'jorge.ramirez@sena.edu.co', 2147483647, 'Tecnología en Diseño de Productos Industriales', '12348', 1),
(5, 5678901234, 'Natalia ', 'Torres', 'natalia.torres@sena.edu.co', 2147483647, 'Tecnología en Producción Agrícola', '12349', 2),
(6, 6789012345, 'David ', 'Herrera', 'david.herrera@sena.edu.co', 2147483647, 'Tecnología en Gestión Empresarial', '12350', 3),
(7, 7890123456, 'Elena ', 'Lopez', 'elena.lopez@sena.edu.co', 2147483647, 'Tecnología en Construcción', '12351', 1),
(8, 8901234567, 'Miguel ', 'Sanchez', 'miguel.sanchez@sena.edu.co', 2147483647, 'Tecnología en Desarrollo de Software', '12352', 2),
(9, 9012345678, 'Laura', 'Castillo', 'laura.castillo@sena.edu.co', 2147483647, 'Tecnología en Seguridad y Salud en el Trabajo', '12353', 3),
(10, 1234509876, 'Oscar', 'Diaz', 'oscar.diaz@sena.edu.co', 2147483647, 'Tecnología en Gestión del Talento Humano', '12354', 1),
(12, 10343022, 'dana', 'sanchez', 'ds@gmail.com', 2147483647, 'Programación', '2692926', 1),
(17, 1056504326, 'Angela', 'Lopez', 'angela12@gmail.com', 2147483647, 'ADSO', '213456', 1),
(25, 1014987765, 'Anita maria', 'Lopez Obrado', 'ronalmedina5656@gmail.com', 2147483647, 'Análisis y desarrollo de software ', '2692926', 1),
(26, 12345, 'Anita', 'Sanchez', 'carolahindiaz@gmail.com', 2147483647, 'ADSO', '2692926', 11),
(27, 1234, 'Jean', 'fonseca', 'velandiafonseca@gmail.com', 2147483647, 'Tecnico ciberseguridad', '4536554', 11),
(28, 101452, 'Camilo', 'Medina', 'medina@gmail.com', 2147483647, 'Adso', '26543432', 11),
(32, 1983457238, 'Angel', 'Parra', 'angel@gmail.com', 2147483647, 'Análisis y Desarrollo de Software', '2696987', 11),
(41, 1065967895, 'Angela', 'Rodriguez', 'angela@gmail.com', 2147483647, 'Análisis y Desarrollo de Software', '2692926', 12),
(42, 1069584367, 'Raul', 'Ramirez', 'raul1@gmail.com', 2147483647, 'Análisis y Desarrollo de Software', '2692926', 11),
(43, 1892837465, 'Alejandro', 'Lopez', 'alejandro@gmail.com', 2147483647, 'Análisis y desarrollo de software', '2692926', 14),
(44, 1059438930, 'Andres', 'Sanchez', 'andres@gmail.com', 2147483647, 'ADSO', '2897605', 11),
(45, 1029383838, 'Felipe', 'velandia', 'felipe@gmail.com', 2147483647, 'Análisis y desarrollo de software', '2692926', 14),
(46, 2039203754, 'julian', 'gomez', 'julian@gmail.com', 2147483647, 'Análisis y desarrollo de software', '2897605', 15),
(47, 10893637, 'Ivan', 'Flores', 'ivan@gmail.com', 2147483647, 'Análisis y desarrollo de software', '2897605', 11),
(48, 29282738423, 'David', 'Garcia', 'david@gmail.com', 2147483647, 'Análisis y desarrollo de software', '2692926', 12),
(49, 82828282, 'Fernanda', 'Martinez', 'fernanda@gmail.com', 32189867, 'Análisis y desarrollo de software', '2692926', 15),
(50, 2928374654, 'Maria', 'Gutiérrez', 'maria@gmail.clom', 2147483647, 'Análisis y desarrollo de software', '2692926', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos`
--

CREATE TABLE `casos` (
  `id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `categoria` varchar(80) NOT NULL,
  `soporte` varchar(300) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(80) NOT NULL,
  `id_aprendiz` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_encargado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `casos`
--

INSERT INTO `casos` (`id`, `descripcion`, `categoria`, `soporte`, `fecha`, `estado`, `id_aprendiz`, `id_usuario`, `id_encargado`) VALUES
(1, 'Aprendiz con bajo rendimiento en matemáticas', 'rendimiento académico', 'soporte_1.pdf', '2024-05-01', 'En proceso', 1, 1, 4),
(2, 'Problemas de asistencia frecuente', 'asistencia', 'soporte_2.pdf', '2024-05-02', 'En espera', 2, 2, 5),
(3, 'Dificultades económicas para continuar', 'problemas económicos', 'soporte_3.pdf', '2024-05-03', 'En espera', 3, 3, 6),
(4, 'Falta de motivación y desinterés en clases', 'motivación', 'soporte_4.pdf', '2024-05-04', 'En espera', 4, 1, 7),
(5, 'Conflictos familiares que afectan el rendimiento', 'situación personal', 'soporte_5.pdf', '2024-05-05', 'En espera', 5, 2, 8),
(6, 'Problemas de salud recurrentes', 'salud', 'soporte_6.pdf', '2024-05-06', 'En espera', 6, 3, 9),
(7, 'Necesidad de apoyo psicológico', 'bienestar', 'soporte_7.pdf', '2024-05-07', 'En espera', 7, 1, 10),
(8, 'Dificultades en la adaptación al programa', 'adaptación', 'soporte_8.pdf', '2024-05-08', 'En espera', 8, 2, 4),
(9, 'Problemas de transporte para asistir', 'logística', 'soporte_9.pdf', '2024-05-09', 'En espera', 9, 3, 5),
(10, 'Necesidad de orientación vocacional', 'orientación', 'soporte_10.pdf', '2024-05-10', 'En proceso', 10, 1, 6),
(12, ' El aprendiz no tiene solventes para presentarse a formacion', 'economicos', '1-guia-introduccion-a-la-programacion-con-pse-int (1).pdf', '2024-06-18', 'En espera', 25, 1, 8),
(13, ' Es pobre', 'economicos', '1-guia-introduccion-a-la-programacion-con-pse-int (1).pdf', '2024-06-19', 'En espera', 26, 11, 10),
(14, ' Blalalllaa', 'laborales', '1-guia-introduccion-a-la-programacion-con-pse-int.pdf', '2024-06-18', 'En espera', 27, 11, 9),
(15, ' El aprendiz no cumple con sus deberes academicos', 'academiacos', '18ejercicios pcint hacer 20.pdf.crdownload.pdf', '2024-06-19', 'En proceso', 28, 11, 8),
(24, ' No le gustan sus compañeros de clase', 'sociales', '../../Uploads/Casos/Diagrama de caso de uso vigilante.drawio.pdf', '2024-06-26', 'Finalizado', 41, 12, 12),
(25, ' No tiene dinero debido a que vive solo', 'economicos', 'presente perfecto11111_removed.pdf', '2024-06-26', 'En proceso', 42, 11, 12),
(26, ' El centro no cuenta con buenas instalaciones en los ambientes', 'condiciones', '../../Uploads/Casos/1-guia-introduccion-a-la-programacion-con-pse-int (1).pdf', '2024-06-26', 'En espera', 43, 14, 12),
(27, ' Por jugar futbol se rompió una pierna', 'salud', '../../Uploads/Casos/18ejercicios pcint hacer 20.pdf.crdownload.pdf', '2024-06-26', 'En proceso', 44, 11, 14),
(28, ' Su madre necesita acompañamiento diario y no cuenta con más personas ', 'familiares', '../../Uploads/Casos/ejercicios pcint hacer 20.pdf.crdownload.pdf', '2024-06-26', 'En espera', 45, 14, 15),
(29, ' No tiene para los transportes', 'economicos', '../../Uploads/Casos/Activity may 27.pdf', '2024-06-26', 'En espera', 46, 15, 12),
(30, ' No tiene una buena convivencia con los instructores ', 'sociales', '../../Uploads/Casos/fotografias.docx', '2024-06-26', 'En espera', 47, 11, 15),
(31, ' Encontró trabajo y no puede seguir en formación', 'laborales', '../../Uploads/Casos/18ejercicios pcint hacer 20.pdf.crdownload (1).pdf', '2024-06-26', 'En proceso', 48, 12, 12),
(32, ' Se quedo sin un pie por accidente de transito', 'salud', '../../Uploads/Casos/EL TRABAJIÑO.docx', '2024-06-26', 'En espera', 49, 15, 14),
(33, ' No cumple con la asistencia', 'academiacos', '../../Uploads/Casos/White and Pink Doodle Handwritten Mind Map Brainstorm.png', '2024-06-27', 'En proceso', 50, 14, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_casos`
--

CREATE TABLE `seguimiento_casos` (
  `id` int(11) NOT NULL,
  `estrategia` varchar(200) NOT NULL,
  `id_caso` int(11) NOT NULL,
  `id_encargado` int(11) NOT NULL,
  `aspectos_extras` text NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `seguimiento_casos`
--

INSERT INTO `seguimiento_casos` (`id`, `estrategia`, `id_caso`, `id_encargado`, `aspectos_extras`, `fecha`) VALUES
(1, 'Asignar tutorías adicionales en matemáticas', 1, 4, 'Tutorías dos veces por semana.', '2024-06-12'),
(2, 'Reunión semanal para seguimiento de asistencia', 2, 5, 'Reunión con el aprendiz y padres.', '2024-06-07'),
(3, 'Asignación de apoyo económico temporal', 3, 6, 'Subsidio mensual por tres meses.', '2024-06-08'),
(4, 'Sesiones de motivación y orientación vocacional', 4, 7, 'Charlas motivacionales cada viernes.', '2024-06-09'),
(5, 'Consultas psicológicas semanales', 5, 8, 'Consulta con psicólogo del SENA.', '2024-06-10'),
(6, 'Reducción de carga académica temporal', 6, 9, 'Reducción de dos materias por un semestre.', '2024-06-18'),
(7, 'Consulta psicológica y plan de bienestar', 7, 10, 'Plan de bienestar adaptado a necesidades personales.', '2024-06-20'),
(8, 'Cambio de jornada a horario nocturno', 8, 4, 'Horario nocturno para mejor adaptación.', '2024-06-14'),
(9, 'Apoyo de transporte', 9, 5, 'Subsidio de transporte por seis meses.', '2024-06-14'),
(10, 'Orientación vocacional y seguimiento', 10, 6, 'Sesiones quincenales con orientador vocacional.', '2024-06-15'),
(11, 'Tutorías adicionales en programación', 1, 4, 'Tutorías específicas en programación básica.', '2024-06-18'),
(12, 'Revisión de casos con coordinador académico', 2, 5, 'Revisión mensual de avances.', '2024-06-19'),
(13, 'Implementación de plan de apoyo económico', 3, 6, 'Plan de apoyo por seis meses aprobado.', '2024-06-20'),
(14, 'Programa de mentoría y orientación', 4, 7, 'Asignación de mentor especializado.', '2024-06-20'),
(15, 'Charlas motivacionales con expertos', 5, 8, 'Charlas mensuales con psicólogos.', '2024-06-20'),
(16, 'Evaluación médica y seguimiento', 6, 9, 'Evaluaciones médicas quincenales.', '2024-06-20'),
(17, 'Plan integral de bienestar', 7, 10, 'Plan personalizado de actividades de bienestar.', '2024-06-06'),
(18, 'Cambio a modalidad virtual', 8, 4, 'Clases virtuales para mejor adaptación.', '2024-05-22'),
(19, 'Apoyo logístico y seguimiento', 9, 5, 'Apoyo logístico y reuniones quincenales.', '2024-05-11'),
(20, 'Revisión y ajuste del plan de estudios', 10, 6, 'Ajuste del plan de estudios para mejor orientación.', '2024-06-09'),
(21, 'Sesiones de tutoría en matemáticas avanzadas', 1, 4, 'Tutorías avanzadas para mejorar comprensión.', '2024-06-15'),
(22, 'Monitoreo y apoyo continuo', 2, 5, 'Monitoreo semanal y reporte de asistencia.', '2024-06-17'),
(23, 'Extensión del apoyo económico', 3, 6, 'Extensión de subsidio por tres meses adicionales.', '2024-06-08'),
(24, 'Programa de coaching motivacional', 4, 7, 'Coaching con especialista externo.', '2024-06-16'),
(25, 'Terapia grupal semanal', 5, 8, 'Sesiones de terapia grupal.', '2024-06-17'),
(26, 'Consulta médica especializada', 6, 9, 'Consultas con especialista cada dos semanas.', '2024-06-20'),
(27, 'Plan de seguimiento personalizado', 7, 10, 'Seguimiento personalizado adaptado a necesidades.', '2024-06-05'),
(28, 'Cambio de horario a jornada diurna', 8, 4, 'Cambio a horario diurno para mejor adaptación.', '2024-06-03'),
(29, 'Subsidio de transporte adicional', 9, 5, 'Subsidio adicional por tres meses.', '2024-06-01'),
(30, 'Orientación y ajustes académicos', 10, 6, 'Ajustes académicos según orientaciones recibidas.', '2024-06-08'),
(43, ' Investigar la ficha e identificar los problemas', 24, 12, ' Ninguno', '2024-06-26'),
(44, 'Capacitaciones de convivencia', 24, 12, '  Ninguno', '2024-06-26'),
(45, ' Capacitaciones de convivencia', 24, 12, '   Ninguno', '2024-06-26'),
(46, ' Apoyo de sostenimiento', 25, 12, ' Tiene que postularse', '2024-06-26'),
(47, ' Plan de Mejoramiento', 15, 8, ' Si es necesario reportar a comité', '2024-06-26'),
(48, ' Monitoreo y apoyo continuo', 2, 5, ' Monitoreo semanal y reporte de asistencia.', '2024-06-26'),
(49, ' Orientación y ajustes académicos', 10, 6, ' Ajustes académicos según orientaciones recibidas.', '2024-06-26'),
(50, 'Verificación de conocimientos', 1, 12, ' Tutorías avanzadas para mejorar comprensión.', '2024-06-26'),
(51, ' Como fue en el sena accede a la poliza', 27, 14, ' Aplazamiento si no hay solución', '2024-06-26'),
(52, '  Como fue en el sena accede a la poliza', 27, 14, 'Adelantar guias y evidencias con su respectivo instructor', '2024-06-26'),
(53, ' Aplazamiento por 3 meses', 31, 12, 'Ninguno ', '2024-06-26'),
(54, ' Comite ', 33, 12, ' Ninguno', '2024-06-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `documento` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telefono` int(11) NOT NULL,
  `clave` varchar(250) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `documento`, `nombre`, `email`, `telefono`, `clave`, `rol`) VALUES
(1, 0, 'Juan Perez', 'juan.perez@sena.edu.co', 2147483647, 'clave_segura_1', 'instructor'),
(2, 0, 'Maria Garcia', 'maria.garcia@sena.edu.co', 2147483647, 'clave_segura_2', 'instructor'),
(3, 0, 'Carlos Lopez', 'carlos.lopez@sena.edu.co', 2147483647, 'clave_segura_3', 'instructor'),
(4, 0, 'Ana Martinez', 'ana.martinez@sena.edu.co', 2147483647, 'clave_segura_4', 'coordinadorAcademico'),
(5, 0, 'Luis Rodriguez', 'luis.rodriguez@sena.edu.co', 2147483647, 'clave_segura_5', 'coordinadorAcademico'),
(6, 0, 'Laura Gonzalez', 'laura.gonzalez@sena.edu.co', 2147483647, 'clave_segura_6', 'coordinadorFormacion'),
(7, 0, 'Jorge Ramirez', 'jorge.ramirez@sena.edu.co', 2147483647, 'clave_segura_7', 'coordinadorFormacion'),
(8, 0, 'Sofia Fernandez', 'sofia.fernandez@sena.edu.co', 2147483647, 'clave_segura_8', 'bienestar'),
(9, 0, 'David Diaz', 'david.diaz@sena.edu.co', 2147483647, 'clave_segura_9', 'bienestar'),
(10, 1096547908, 'Carolina Torres', 'carolina.torres@sena.edu.co', 2147483647, '698d51a19d8a121ce581499d7b701668', 'bienestar'),
(11, 1014193937, 'Andrea Flores', 'velandiafonseca@gmail.com', 2147483647, '202cb962ac59075b964b07152d234b70', 'instructor'),
(12, 1056504370, 'Dana', 'dsofia0528@gmail.com', 2147483647, '81dc9bdb52d04dc20036dbd8313ed055', 'bienestar'),
(14, 1014193937, 'Karen', 'karencamacho484@gmail.com', 2147483647, '827ccb0eea8a706c4c34a16891f84e7b', 'coordinadorAcademico'),
(15, 1098374657, 'jhojana', 'jhojana@gmail.com', 2147483647, '3b712de48137572f3849aabd5666a4e3', 'coordinadorFormacion');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_usuario_2` (`id_usuario`);

--
-- Indices de la tabla `casos`
--
ALTER TABLE `casos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aprendiz` (`id_aprendiz`,`id_usuario`,`id_encargado`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_encargado` (`id_encargado`);

--
-- Indices de la tabla `seguimiento_casos`
--
ALTER TABLE `seguimiento_casos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_caso` (`id_caso`,`id_encargado`),
  ADD KEY `id_encargado` (`id_encargado`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `casos`
--
ALTER TABLE `casos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `seguimiento_casos`
--
ALTER TABLE `seguimiento_casos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD CONSTRAINT `aprendiz_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `casos`
--
ALTER TABLE `casos`
  ADD CONSTRAINT `casos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `casos_ibfk_2` FOREIGN KEY (`id_aprendiz`) REFERENCES `aprendiz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `casos_ibfk_3` FOREIGN KEY (`id_encargado`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `seguimiento_casos`
--
ALTER TABLE `seguimiento_casos`
  ADD CONSTRAINT `seguimiento_casos_ibfk_1` FOREIGN KEY (`id_caso`) REFERENCES `casos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seguimiento_casos_ibfk_2` FOREIGN KEY (`id_encargado`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
