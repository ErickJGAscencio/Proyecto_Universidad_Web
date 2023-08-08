-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-08-2023 a las 06:07:07
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
-- Base de datos: `modelouniversidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `Matricula_alumno` varchar(10) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido_paterno` varchar(30) NOT NULL,
  `Apellido_materno` varchar(30) NOT NULL,
  `Semestre` int(11) DEFAULT NULL,
  `Ano_ingreso` int(11) DEFAULT NULL,
  `Avance_curricular` float DEFAULT NULL,
  `Contrasena` varchar(8) NOT NULL,
  `Id_Carrera` int(11) NOT NULL,
  `Id_APHA` int(11) NOT NULL,
  `Id_CPA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_por_horario_alumnos`
--

CREATE TABLE `alumnos_por_horario_alumnos` (
  `Id_APHA` int(11) NOT NULL,
  `Id_Horario_alumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `Id_Asignatura` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Creditos` int(11) DEFAULT NULL,
  `Id_Horario_asignaturas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `Id_Calificacion` int(11) NOT NULL,
  `Parcial_1` float DEFAULT NULL,
  `Parcial_2` float DEFAULT NULL,
  `Parcial_3` float DEFAULT NULL,
  `Ordinario` float DEFAULT NULL,
  `Extraordinario` float DEFAULT NULL,
  `Id_Asignatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaiones_por_alumnos`
--

CREATE TABLE `calificaiones_por_alumnos` (
  `Id_CPA` int(11) NOT NULL,
  `Id_Calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `Id_Carrera` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Duracion` int(11) NOT NULL,
  `Creditos_totales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentosalumnos`
--

CREATE TABLE `documentosalumnos` (
  `Id_Documentos_alumno` int(11) NOT NULL,
  `Domicilio` varchar(100) DEFAULT NULL,
  `Certificado_preparatorio` blob DEFAULT NULL,
  `Cita` datetime DEFAULT NULL,
  `Curp` blob DEFAULT NULL,
  `Acta_nacimiento` blob DEFAULT NULL,
  `Certificado_medico` blob DEFAULT NULL,
  `Matricula_alumno` varchar(10) NOT NULL,
  `Folio_pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `Id_Grupo` varchar(5) NOT NULL,
  `Aula` varchar(3) NOT NULL,
  `Capacidad` int(11) NOT NULL,
  `Id_Asignatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_alumno`
--

CREATE TABLE `horario_alumno` (
  `Id_Horario_alumno` int(11) NOT NULL,
  `Matricula_profesor` varchar(10) NOT NULL,
  `Id_Grupo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_asignaturas`
--

CREATE TABLE `horario_asignaturas` (
  `Id_Horario_asignaturas` int(11) NOT NULL,
  `Dia` varchar(10) DEFAULT NULL,
  `Hora` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_profesores`
--

CREATE TABLE `horario_profesores` (
  `Id_Horario_profesor` int(11) NOT NULL,
  `Matricula_profesor` varchar(10) NOT NULL,
  `Id_Grupo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `Id_Inscripcion` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido_paterno` varchar(30) NOT NULL,
  `Apellido_materno` varchar(30) DEFAULT NULL,
  `Cita` datetime NOT NULL,
  `Ano_ingreso` datetime DEFAULT NULL,
  `Domicilio` varchar(100) NOT NULL,
  `Curp` blob NOT NULL,
  `Acta_nacimiento` blob NOT NULL,
  `Certificado_preparatoria` blob NOT NULL,
  `Certificacion_medico` blob DEFAULT NULL,
  `Folio_pago` int(11) NOT NULL,
  `Id_Carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `Folio_pago` int(11) NOT NULL,
  `Pagado` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Monto` float NOT NULL,
  `Matricula_alumno` varchar(10) NOT NULL,
  `Id_Inscripcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pre_horarios`
--

CREATE TABLE `pre_horarios` (
  `Id_Pre_horario` int(11) NOT NULL,
  `Matricula_alumno` varchar(10) NOT NULL,
  `Id_Grupo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pre_reinscripciones`
--

CREATE TABLE `pre_reinscripciones` (
  `Id_Pre_reinscripcion` int(11) NOT NULL,
  `Fecha_inicio` datetime DEFAULT NULL,
  `Fecha_vencimiento` datetime DEFAULT NULL,
  `Matricula_profesor` varchar(10) NOT NULL,
  `Matricula_alumno` varchar(10) NOT NULL,
  `Id_Pre_horario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `Matricula_profesor` varchar(10) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido_paterno` varchar(30) NOT NULL,
  `Apellido_materno` varchar(30) DEFAULT NULL,
  `Contrasena` varchar(8) NOT NULL,
  `Id_Horario_profesor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reinscripciones`
--

CREATE TABLE `reinscripciones` (
  `Id_Reinscripcion` int(11) NOT NULL,
  `Fecha_inicio` datetime NOT NULL,
  `Fecha_vencimiento` datetime NOT NULL,
  `Matricula_alumno` varchar(10) NOT NULL,
  `Id_Pre_horario` int(11) NOT NULL,
  `Folio_pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`Matricula_alumno`),
  ADD KEY `fk_Alumno_Carrera_idx` (`Id_Carrera`),
  ADD KEY `fk_Alumnos_Alumnos_por_Horario_Alumnos1_idx` (`Id_APHA`),
  ADD KEY `fk_Alumnos_Calificaiones_por_Alumnos1_idx` (`Id_CPA`);

--
-- Indices de la tabla `alumnos_por_horario_alumnos`
--
ALTER TABLE `alumnos_por_horario_alumnos`
  ADD PRIMARY KEY (`Id_APHA`),
  ADD KEY `fk_Alumnos_por_Horario_Alumnos_Horario_alumno1_idx` (`Id_Horario_alumno`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`Id_Asignatura`),
  ADD KEY `fk_Asignaturas_Horario_Asignaturas1_idx` (`Id_Horario_asignaturas`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`Id_Calificacion`),
  ADD KEY `fk_Calificacion_Asignaturas1_idx` (`Id_Asignatura`);

--
-- Indices de la tabla `calificaiones_por_alumnos`
--
ALTER TABLE `calificaiones_por_alumnos`
  ADD PRIMARY KEY (`Id_CPA`),
  ADD KEY `fk_Calificaiones_por_Alumnos_Calificaciones1_idx` (`Id_Calificacion`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`Id_Carrera`);

--
-- Indices de la tabla `documentosalumnos`
--
ALTER TABLE `documentosalumnos`
  ADD PRIMARY KEY (`Id_Documentos_alumno`),
  ADD KEY `fk_DocumentosAlumnos_Alumno1_idx` (`Matricula_alumno`),
  ADD KEY `fk_DocumentosAlumnos_Pago1_idx` (`Folio_pago`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`Id_Grupo`),
  ADD KEY `fk_Grupos_Asignaturas1_idx` (`Id_Asignatura`);

--
-- Indices de la tabla `horario_alumno`
--
ALTER TABLE `horario_alumno`
  ADD PRIMARY KEY (`Id_Horario_alumno`),
  ADD KEY `fk_Horario_alumno_Profesores1_idx` (`Matricula_profesor`),
  ADD KEY `fk_Horario_alumno_Grupos1_idx` (`Id_Grupo`);

--
-- Indices de la tabla `horario_asignaturas`
--
ALTER TABLE `horario_asignaturas`
  ADD PRIMARY KEY (`Id_Horario_asignaturas`);

--
-- Indices de la tabla `horario_profesores`
--
ALTER TABLE `horario_profesores`
  ADD PRIMARY KEY (`Id_Horario_profesor`),
  ADD KEY `fk_Horario_profesores_Profesores1_idx` (`Matricula_profesor`),
  ADD KEY `fk_Horario_profesores_Grupos1_idx` (`Id_Grupo`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`Id_Inscripcion`),
  ADD KEY `fk_Inscripciones_Pago1_idx` (`Folio_pago`),
  ADD KEY `fk_Inscripciones_Carrera1_idx` (`Id_Carrera`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`Folio_pago`),
  ADD KEY `fk_Pago_Alumno1_idx` (`Matricula_alumno`),
  ADD KEY `fk_Pago_Inscripciones1_idx` (`Id_Inscripcion`);

--
-- Indices de la tabla `pre_horarios`
--
ALTER TABLE `pre_horarios`
  ADD PRIMARY KEY (`Id_Pre_horario`),
  ADD KEY `fk_Prehorarios_Alumno1_idx` (`Matricula_alumno`),
  ADD KEY `fk_Prehorarios_Grupos1_idx` (`Id_Grupo`);

--
-- Indices de la tabla `pre_reinscripciones`
--
ALTER TABLE `pre_reinscripciones`
  ADD PRIMARY KEY (`Id_Pre_reinscripcion`),
  ADD KEY `fk_Pre_Reinscripciones_Profesores1_idx` (`Matricula_profesor`),
  ADD KEY `fk_Pre_Reinscripciones_Alumno1_idx` (`Matricula_alumno`),
  ADD KEY `fk_Pre_Reinscripciones_Pre_Horarios1_idx` (`Id_Pre_horario`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`Matricula_profesor`),
  ADD KEY `fk_Profesores_Horario_profesores1_idx` (`Id_Horario_profesor`);

--
-- Indices de la tabla `reinscripciones`
--
ALTER TABLE `reinscripciones`
  ADD PRIMARY KEY (`Id_Reinscripcion`),
  ADD KEY `fk_Reinscripciones_Alumno1_idx` (`Matricula_alumno`),
  ADD KEY `fk_Reinscripciones_Pre_Horarios1_idx` (`Id_Pre_horario`),
  ADD KEY `fk_Reinscripciones_Pago1_idx` (`Folio_pago`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos_por_horario_alumnos`
--
ALTER TABLE `alumnos_por_horario_alumnos`
  MODIFY `Id_APHA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `Id_Calificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calificaiones_por_alumnos`
--
ALTER TABLE `calificaiones_por_alumnos`
  MODIFY `Id_CPA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `Id_Carrera` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horario_alumno`
--
ALTER TABLE `horario_alumno`
  MODIFY `Id_Horario_alumno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horario_asignaturas`
--
ALTER TABLE `horario_asignaturas`
  MODIFY `Id_Horario_asignaturas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horario_profesores`
--
ALTER TABLE `horario_profesores`
  MODIFY `Id_Horario_profesor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `Id_Inscripcion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `Folio_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pre_horarios`
--
ALTER TABLE `pre_horarios`
  MODIFY `Id_Pre_horario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pre_reinscripciones`
--
ALTER TABLE `pre_reinscripciones`
  MODIFY `Id_Pre_reinscripcion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reinscripciones`
--
ALTER TABLE `reinscripciones`
  MODIFY `Id_Reinscripcion` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `fk_Alumno_Carrera` FOREIGN KEY (`Id_Carrera`) REFERENCES `carreras` (`Id_Carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Alumnos_Alumnos_por_Horario_Alumnos1` FOREIGN KEY (`Id_APHA`) REFERENCES `alumnos_por_horario_alumnos` (`Id_APHA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Alumnos_Calificaiones_por_Alumnos1` FOREIGN KEY (`Id_CPA`) REFERENCES `calificaiones_por_alumnos` (`Id_CPA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alumnos_por_horario_alumnos`
--
ALTER TABLE `alumnos_por_horario_alumnos`
  ADD CONSTRAINT `fk_Alumnos_por_Horario_Alumnos_Horario_alumno1` FOREIGN KEY (`Id_Horario_alumno`) REFERENCES `horario_alumno` (`Id_Horario_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD CONSTRAINT `fk_Asignaturas_Horario_Asignaturas1` FOREIGN KEY (`Id_Horario_asignaturas`) REFERENCES `horario_asignaturas` (`Id_Horario_asignaturas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `fk_Calificacion_Asignaturas1` FOREIGN KEY (`Id_Asignatura`) REFERENCES `asignaturas` (`Id_Asignatura`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `calificaiones_por_alumnos`
--
ALTER TABLE `calificaiones_por_alumnos`
  ADD CONSTRAINT `fk_Calificaiones_por_Alumnos_Calificaciones1` FOREIGN KEY (`Id_Calificacion`) REFERENCES `calificaciones` (`Id_Calificacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `documentosalumnos`
--
ALTER TABLE `documentosalumnos`
  ADD CONSTRAINT `fk_DocumentosAlumnos_Alumno1` FOREIGN KEY (`Matricula_alumno`) REFERENCES `alumnos` (`Matricula_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DocumentosAlumnos_Pago1` FOREIGN KEY (`Folio_pago`) REFERENCES `pagos` (`Folio_pago`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `fk_Grupos_Asignaturas1` FOREIGN KEY (`Id_Asignatura`) REFERENCES `asignaturas` (`Id_Asignatura`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horario_alumno`
--
ALTER TABLE `horario_alumno`
  ADD CONSTRAINT `fk_Horario_alumno_Grupos1` FOREIGN KEY (`Id_Grupo`) REFERENCES `grupos` (`Id_Grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Horario_alumno_Profesores1` FOREIGN KEY (`Matricula_profesor`) REFERENCES `profesores` (`Matricula_profesor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horario_profesores`
--
ALTER TABLE `horario_profesores`
  ADD CONSTRAINT `fk_Horario_profesores_Grupos1` FOREIGN KEY (`Id_Grupo`) REFERENCES `grupos` (`Id_Grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Horario_profesores_Profesores1` FOREIGN KEY (`Matricula_profesor`) REFERENCES `profesores` (`Matricula_profesor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `fk_Inscripciones_Carrera1` FOREIGN KEY (`Id_Carrera`) REFERENCES `carreras` (`Id_Carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Inscripciones_Pago1` FOREIGN KEY (`Folio_pago`) REFERENCES `pagos` (`Folio_pago`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `fk_Pago_Alumno1` FOREIGN KEY (`Matricula_alumno`) REFERENCES `alumnos` (`Matricula_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pago_Inscripciones1` FOREIGN KEY (`Id_Inscripcion`) REFERENCES `inscripciones` (`Id_Inscripcion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pre_horarios`
--
ALTER TABLE `pre_horarios`
  ADD CONSTRAINT `fk_Prehorarios_Alumno1` FOREIGN KEY (`Matricula_alumno`) REFERENCES `alumnos` (`Matricula_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prehorarios_Grupos1` FOREIGN KEY (`Id_Grupo`) REFERENCES `grupos` (`Id_Grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pre_reinscripciones`
--
ALTER TABLE `pre_reinscripciones`
  ADD CONSTRAINT `fk_Pre_Reinscripciones_Alumno1` FOREIGN KEY (`Matricula_alumno`) REFERENCES `alumnos` (`Matricula_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pre_Reinscripciones_Pre_Horarios1` FOREIGN KEY (`Id_Pre_horario`) REFERENCES `pre_horarios` (`Id_Pre_horario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pre_Reinscripciones_Profesores1` FOREIGN KEY (`Matricula_profesor`) REFERENCES `profesores` (`Matricula_profesor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD CONSTRAINT `fk_Profesores_Horario_profesores1` FOREIGN KEY (`Id_Horario_profesor`) REFERENCES `horario_profesores` (`Id_Horario_profesor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reinscripciones`
--
ALTER TABLE `reinscripciones`
  ADD CONSTRAINT `fk_Reinscripciones_Alumno1` FOREIGN KEY (`Matricula_alumno`) REFERENCES `alumnos` (`Matricula_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reinscripciones_Pago1` FOREIGN KEY (`Folio_pago`) REFERENCES `pagos` (`Folio_pago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reinscripciones_Pre_Horarios1` FOREIGN KEY (`Id_Pre_horario`) REFERENCES `pre_horarios` (`Id_Pre_horario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
