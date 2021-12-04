-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Dec 04, 2021 at 02:18 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uabc_db_gratuated_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

CREATE TABLE `alumnos` (
  `matricula` int NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apaterno` varchar(30) NOT NULL,
  `amaterno` varchar(30) DEFAULT NULL,
  `correo` varchar(30) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `codigo_postal` int NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `estatus_de_alumno` enum('Vigente','Baja definitiva','Baja temporal','Graduado') NOT NULL,
  `genero` enum('Hombre','Mujer') DEFAULT NULL,
  `fecha_de_nacimiento` date NOT NULL,
  `id_linea_de_investigacion` smallint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `alumnos`
--

INSERT INTO `alumnos` (`matricula`, `nombre`, `apaterno`, `amaterno`, `correo`, `calle`, `codigo_postal`, `telefono`, `estatus_de_alumno`, `genero`, `fecha_de_nacimiento`, `id_linea_de_investigacion`) VALUES
(17240, 'Jimena', 'Gonzales', 'Blanco', 'jimena.Gonzales@uabc.edu.mx', 'Juarez 5', 4020, '6460114378', 'Baja definitiva', 'Mujer', '1997-05-01', 11),
(17243, 'Juan', 'Perez', 'Sanchez', 'juan.perez@uabc.edu.mx', 'Magdaleno ocampo 2', 4000, '6469874813', 'Vigente', 'Hombre', '1997-07-04', 10),
(17254, 'Enrique', 'Jimenez', 'Torres', 'enrique.jimenez@uabc.edu.mx', 'Hidalgo 10', 4023, '6461830455', 'Graduado', 'Hombre', '1997-10-11', 11),
(17260, 'Pedro', 'Perez', 'Flores', 'pedro.perez@uabc.edu.mx', 'Hidalgo 26', 4023, '6460284958', 'Baja temporal', 'Hombre', '1990-06-12', 12);

-- --------------------------------------------------------

--
-- Table structure for table `areas_del_conocimiento`
--

CREATE TABLE `areas_del_conocimiento` (
  `id_area_del_conocimiento` smallint NOT NULL,
  `area` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `areas_del_conocimiento`
--

INSERT INTO `areas_del_conocimiento` (`id_area_del_conocimiento`, `area`) VALUES
(1, 'D'),
(2, 'CIENCIAS NATURALES Y EXACTAS'),
(3, 'M'),
(4, 'O'),
(5, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `becas`
--

CREATE TABLE `becas` (
  `id_beca` tinyint NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `becas`
--

INSERT INTO `becas` (`id_beca`, `nombre`, `descripcion`) VALUES
(105, 'Deportiva', 'Beca a los alumnos de alto rendimiento y sobresalir en deportes'),
(113, 'Academica', 'Beca a los alumnos sobresalientes en rendimiento academico'),
(127, 'Alimenticia', 'Beca a los alumnos de pocos recursos con rendimiento academico regular');

-- --------------------------------------------------------

--
-- Table structure for table `becas_disponibles`
--

CREATE TABLE `becas_disponibles` (
  `id_beca` tinyint NOT NULL,
  `id_posgrado` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `becas_disponibles`
--

INSERT INTO `becas_disponibles` (`id_beca`, `id_posgrado`) VALUES
(113, 12040),
(105, 12058),
(127, 12098);

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `nempleado` int NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apaterno` varchar(30) NOT NULL,
  `amaterno` varchar(30) NOT NULL,
  `rol` enum('Coordinador','Coordinador general','Profesor') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`nempleado`, `nombre`, `apaterno`, `amaterno`, `rol`) VALUES
(2191, 'Ivan', 'Gutierrez', 'Sanchez', 'Coordinador'),
(2192, 'Diego', 'Rodirguez', 'Tapia', 'Coordinador general'),
(2193, 'Maria', 'Alvarez', 'Flores', 'Profesor'),
(2194, 'Carlos', 'Jimenez', 'Flores', 'Coordinador');

-- --------------------------------------------------------

--
-- Table structure for table `lineas_de_investigacion`
--

CREATE TABLE `lineas_de_investigacion` (
  `id_linea_de_investigacion` smallint NOT NULL,
  `linea_de_investigacion` varchar(30) NOT NULL,
  `id_posgrado` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lineas_de_investigacion`
--

INSERT INTO `lineas_de_investigacion` (`id_linea_de_investigacion`, `linea_de_investigacion`, `id_posgrado`) VALUES
(10, 'Electricidad', 12098),
(11, 'Fisioterapia', 12040),
(12, 'Desarrollo de negocios', 12050);

-- --------------------------------------------------------

--
-- Table structure for table `materias`
--

CREATE TABLE `materias` (
  `id_materia` smallint NOT NULL,
  `materia` varchar(50) NOT NULL,
  `HC` tinyint NOT NULL,
  `HL` tinyint NOT NULL,
  `HT` tinyint NOT NULL,
  `HPTC` tinyint NOT NULL,
  `creditos` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `materias`
--

INSERT INTO `materias` (`id_materia`, `materia`, `HC`, `HL`, `HT`, `HPTC`, `creditos`) VALUES
(1111, 'Economia', 3, 2, 6, 0, 8),
(1112, 'Servidores', 4, 1, 6, 0, 7),
(1113, 'Matematicas 1', 3, 3, 5, 0, 9),
(1114, 'Matematicas 2', 3, 2, 6, 0, 9);

-- --------------------------------------------------------

--
-- Table structure for table `materias_posgrado`
--

CREATE TABLE `materias_posgrado` (
  `id_materia` smallint NOT NULL,
  `id_posgrado` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `materias_posgrado`
--

INSERT INTO `materias_posgrado` (`id_materia`, `id_posgrado`) VALUES
(1112, 12040),
(1114, 12050),
(1113, 12058),
(1111, 12098);

-- --------------------------------------------------------

--
-- Table structure for table `posgrados`
--

CREATE TABLE `posgrados` (
  `id_posgrado` int NOT NULL,
  `posgrado` varchar(100) NOT NULL,
  `reconocimiento_conacyt` enum('Si','No') NOT NULL,
  `perfil_de_ingreso` text NOT NULL,
  `perfil_de_egreso` text NOT NULL,
  `estatus` enum('Vigente','No vigente') NOT NULL,
  `tipo_de_plan` enum('Trimestral','Cuatrimestral','Semestral') DEFAULT NULL,
  `modalidad` enum('Escolarizado','Semiescolarizado') NOT NULL,
  `tipo_de_programa` enum('Especialidad','Maestría','Doctorado') NOT NULL,
  `id_area_del_conocimiento` smallint NOT NULL,
  `fecha_de_ingreso` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posgrados`
--

INSERT INTO `posgrados` (`id_posgrado`, `posgrado`, `reconocimiento_conacyt`, `perfil_de_ingreso`, `perfil_de_egreso`, `estatus`, `tipo_de_plan`, `modalidad`, `tipo_de_programa`, `id_area_del_conocimiento`, `fecha_de_ingreso`) VALUES
(12040, 'MAESTRIA EN FISIOTERAPIA DEPORTIVA', 'No', 'Fisioterapia', 'Desarrolla metodologia de entrenamiento y tecnicas para trabajar en un equipo deportivo', 'No vigente', 'Trimestral', 'Escolarizado', 'Especialidad', 4, '13/05/23'),
(12050, 'MAESTRIA EN ADMINISTRACIÃ“N DE NEGOCIOS CON ORIENTACIÃ“N EN HOSPITALIDAD', 'Si', 'Administracion de empresas', 'Desarrolla tu capacidad gerencial y directiva para coordinar y administrar proyectos en esta industria.', 'Vigente', 'Cuatrimestral', 'Escolarizado', 'Doctorado', 2, '13/05/23'),
(12058, 'ESPECIALIDAD EN SEGURIDAD E HIGIENE INDUSTRIAL', 'No', 'Ingenieria industrial', 'Evaluar y ejecutar control en una Industria', 'Vigente', 'Cuatrimestral', 'Escolarizado', 'Doctorado', 1, '13/09/23'),
(12098, 'MAESTRIA EN CALIDAD', 'Si', 'matematicas', 'Uso servidores', 'Vigente', 'Trimestral', 'Escolarizado', 'Maestría', 1, '13/09/22');

-- --------------------------------------------------------

--
-- Table structure for table `programas_de_posgrado`
--

CREATE TABLE `programas_de_posgrado` (
  `id_unidad_academica` smallint NOT NULL,
  `id_posgrado` int NOT NULL,
  `campus` enum('Ensenada','Tijuana','Mexicali') NOT NULL,
  `coordinador` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `programas_de_posgrado`
--

INSERT INTO `programas_de_posgrado` (`id_unidad_academica`, `id_posgrado`, `campus`, `coordinador`) VALUES
(1, 12098, 'Ensenada', 2194),
(2, 12058, 'Mexicali', 2191);

-- --------------------------------------------------------

--
-- Table structure for table `unidades_academicas`
--

CREATE TABLE `unidades_academicas` (
  `id_unidad_academica` smallint NOT NULL,
  `unidad_academica` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `unidades_academicas`
--

INSERT INTO `unidades_academicas` (`id_unidad_academica`, `unidad_academica`) VALUES
(1, 'ENSENADA'),
(2, 'MEXICALI'),
(3, 'TIJUANA'),
(4, 'TECATE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `id_linea_de_investigacion` (`id_linea_de_investigacion`);

--
-- Indexes for table `areas_del_conocimiento`
--
ALTER TABLE `areas_del_conocimiento`
  ADD PRIMARY KEY (`id_area_del_conocimiento`);

--
-- Indexes for table `becas`
--
ALTER TABLE `becas`
  ADD PRIMARY KEY (`id_beca`);

--
-- Indexes for table `becas_disponibles`
--
ALTER TABLE `becas_disponibles`
  ADD PRIMARY KEY (`id_beca`),
  ADD KEY `id_posgrado` (`id_posgrado`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`nempleado`);

--
-- Indexes for table `lineas_de_investigacion`
--
ALTER TABLE `lineas_de_investigacion`
  ADD PRIMARY KEY (`id_linea_de_investigacion`),
  ADD KEY `id_posgrado` (`id_posgrado`);

--
-- Indexes for table `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indexes for table `materias_posgrado`
--
ALTER TABLE `materias_posgrado`
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `id_posgrado` (`id_posgrado`);

--
-- Indexes for table `posgrados`
--
ALTER TABLE `posgrados`
  ADD PRIMARY KEY (`id_posgrado`),
  ADD KEY `id_area_del_conocimiento` (`id_area_del_conocimiento`);

--
-- Indexes for table `programas_de_posgrado`
--
ALTER TABLE `programas_de_posgrado`
  ADD PRIMARY KEY (`id_unidad_academica`,`id_posgrado`),
  ADD KEY `id_unidad_academica` (`id_unidad_academica`),
  ADD KEY `id_posgrado` (`id_posgrado`),
  ADD KEY `coordinador` (`coordinador`);

--
-- Indexes for table `unidades_academicas`
--
ALTER TABLE `unidades_academicas`
  ADD PRIMARY KEY (`id_unidad_academica`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `matricula` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17261;

--
-- AUTO_INCREMENT for table `areas_del_conocimiento`
--
ALTER TABLE `areas_del_conocimiento`
  MODIFY `id_area_del_conocimiento` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `becas`
--
ALTER TABLE `becas`
  MODIFY `id_beca` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `becas_disponibles`
--
ALTER TABLE `becas_disponibles`
  MODIFY `id_beca` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `nempleado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2195;

--
-- AUTO_INCREMENT for table `lineas_de_investigacion`
--
ALTER TABLE `lineas_de_investigacion`
  MODIFY `id_linea_de_investigacion` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1115;

--
-- AUTO_INCREMENT for table `materias_posgrado`
--
ALTER TABLE `materias_posgrado`
  MODIFY `id_materia` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1115;

--
-- AUTO_INCREMENT for table `posgrados`
--
ALTER TABLE `posgrados`
  MODIFY `id_posgrado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12099;

--
-- AUTO_INCREMENT for table `unidades_academicas`
--
ALTER TABLE `unidades_academicas`
  MODIFY `id_unidad_academica` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_2` FOREIGN KEY (`id_linea_de_investigacion`) REFERENCES `lineas_de_investigacion` (`id_linea_de_investigacion`);

--
-- Constraints for table `becas_disponibles`
--
ALTER TABLE `becas_disponibles`
  ADD CONSTRAINT `becas_disponibles_ibfk_1` FOREIGN KEY (`id_beca`) REFERENCES `becas` (`id_beca`),
  ADD CONSTRAINT `becas_disponibles_ibfk_2` FOREIGN KEY (`id_posgrado`) REFERENCES `posgrados` (`id_posgrado`);

--
-- Constraints for table `lineas_de_investigacion`
--
ALTER TABLE `lineas_de_investigacion`
  ADD CONSTRAINT `lineas_de_investigacion_ibfk_1` FOREIGN KEY (`id_posgrado`) REFERENCES `posgrados` (`id_posgrado`);

--
-- Constraints for table `materias_posgrado`
--
ALTER TABLE `materias_posgrado`
  ADD CONSTRAINT `materias_posgrado_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`),
  ADD CONSTRAINT `materias_posgrado_ibfk_2` FOREIGN KEY (`id_posgrado`) REFERENCES `posgrados` (`id_posgrado`);

--
-- Constraints for table `posgrados`
--
ALTER TABLE `posgrados`
  ADD CONSTRAINT `posgrados_ibfk_1` FOREIGN KEY (`id_area_del_conocimiento`) REFERENCES `areas_del_conocimiento` (`id_area_del_conocimiento`);

--
-- Constraints for table `programas_de_posgrado`
--
ALTER TABLE `programas_de_posgrado`
  ADD CONSTRAINT `programas_de_posgrado_ibfk_1` FOREIGN KEY (`id_unidad_academica`) REFERENCES `unidades_academicas` (`id_unidad_academica`),
  ADD CONSTRAINT `programas_de_posgrado_ibfk_2` FOREIGN KEY (`id_posgrado`) REFERENCES `posgrados` (`id_posgrado`),
  ADD CONSTRAINT `programas_de_posgrado_ibfk_3` FOREIGN KEY (`coordinador`) REFERENCES `empleados` (`nempleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
