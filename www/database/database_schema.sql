-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Nov 28, 2021 at 11:11 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uabc_db_gratuated_system`
--
DROP DATABASE IF EXISTS uabc_db_gratuated_system;
CREATE DATABASE uabc_db_gratuated_system;
USE uabc_db_gratuated_system;

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

CREATE TABLE `alumnos`
(
    `matricula`                 int         NOT NULL,
    `nombre`                    varchar(30) NOT NULL,
    `apaterno`                  varchar(30) NOT NULL,
    `amaterno`                  varchar(30) DEFAULT NULL,
    `correo`                    varchar(30) NOT NULL,
    `calle`                     varchar(50) NOT NULL,
    `codigo_postal`             int         NOT NULL,
    `telefono`                  varchar(10) NOT NULL,
    `id_estatus_de_alumno`      tinyint     NOT NULL,
    `genero`                    tinyint     NOT NULL,
    `fecha_de_nacimiento`       date        NOT NULL,
    `id_linea_de_investigacion` smallint    NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `areas_del_conocimiento`
--

CREATE TABLE `areas_del_conocimiento`
(
    `id_area_del_conocimiento` smallint    NOT NULL,
    `area`                     varchar(30) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

--
-- Dumping data for table `areas_del_conocimiento`
--

INSERT INTO `areas_del_conocimiento` (`id_area_del_conocimiento`, `area`)
VALUES (1, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `becas`
--

CREATE TABLE `becas`
(
    `id_beca`     tinyint      NOT NULL,
    `nombre`      varchar(30)  NOT NULL,
    `descripcion` varchar(200) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `becas_disponibles`
--

CREATE TABLE `becas_disponibles`
(
    `id_beca`     tinyint NOT NULL,
    `id_posgrado` int     NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados`
(
    `nempleado` int         NOT NULL,
    `nombre`    varchar(30) NOT NULL,
    `apaterno`  varchar(30) NOT NULL,
    `amaterno`  varchar(30) NOT NULL,
    `rol`       tinyint     NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estatus_de_alumno`
--

CREATE TABLE `estatus_de_alumno`
(
    `id_estatus_de_alumno` tinyint     NOT NULL,
    `estatus`              varchar(30) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lineas_de_investigacion`
--

CREATE TABLE `lineas_de_investigacion`
(
    `id_linea_de_investigacion` smallint    NOT NULL,
    `linea_de_investigacion`    varchar(30) NOT NULL,
    `id_posgrado`               int         NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materias`
--

CREATE TABLE `materias`
(
    `id_materia` smallint    NOT NULL,
    `materia`    varchar(50) NOT NULL,
    `HC`         tinyint     NOT NULL,
    `HL`         tinyint     NOT NULL,
    `HT`         tinyint     NOT NULL,
    `HPTC`       tinyint     NOT NULL,
    `creditos`   tinyint     NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materias_posgrado`
--

CREATE TABLE `materias_posgrado`
(
    `id_materia`  smallint NOT NULL,
    `id_posgrado` int      NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posgrados`
--

CREATE TABLE `posgrados`
(
    `id_posgrado`              int         NOT NULL,
    `posgrado`                 varchar(100) NOT NULL,
    `reconocimiento_conacyt`   tinyint     NOT NULL,
    `perfil_de_ingreso`        text        NOT NULL,
    `perfil_de_egreso`         text        NOT NULL,
    `estatus`                  tinyint     NOT NULL,
    `tipo_de_plan`             tinyint     NOT NULL,
    `modalidad`                tinyint     NOT NULL,
    `tipo_de_programa`         varchar(20) NOT NULL,
    `id_area_del_conocimiento` smallint    NOT NULL,
    `fecha_de_ingreso`         text        NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programas_de_posgrado`
--

CREATE TABLE `programas_de_posgrado`
(
    `id_programa`         tinyint  NOT NULL,
    `id_unidad_academica` smallint NOT NULL,
    `id_posgrado`         int      NOT NULL,
    `campus`              tinyint  NOT NULL,
    `coordinador`         int      NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unidades_academicas`
--

CREATE TABLE `unidades_academicas`
(
    `id_unidad_academica` smallint    NOT NULL,
    `unidad_academica`    varchar(50) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnos`
--
ALTER TABLE `alumnos`
    ADD PRIMARY KEY (`matricula`),
    ADD KEY `id_estatus_de_alumno` (`id_estatus_de_alumno`),
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
-- Indexes for table `estatus_de_alumno`
--
ALTER TABLE `estatus_de_alumno`
    ADD PRIMARY KEY (`id_estatus_de_alumno`);

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
    ADD PRIMARY KEY (`id_programa`),
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
    MODIFY `matricula` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `areas_del_conocimiento`
--
ALTER TABLE `areas_del_conocimiento`
    MODIFY `id_area_del_conocimiento` smallint NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `becas`
--
ALTER TABLE `becas`
    MODIFY `id_beca` tinyint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `becas_disponibles`
--
ALTER TABLE `becas_disponibles`
    MODIFY `id_beca` tinyint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
    MODIFY `nempleado` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estatus_de_alumno`
--
ALTER TABLE `estatus_de_alumno`
    MODIFY `id_estatus_de_alumno` tinyint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lineas_de_investigacion`
--
ALTER TABLE `lineas_de_investigacion`
    MODIFY `id_linea_de_investigacion` smallint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materias`
--
ALTER TABLE `materias`
    MODIFY `id_materia` smallint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materias_posgrado`
--
ALTER TABLE `materias_posgrado`
    MODIFY `id_materia` smallint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posgrados`
--
ALTER TABLE `posgrados`
    MODIFY `id_posgrado` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programas_de_posgrado`
--
ALTER TABLE `programas_de_posgrado`
    MODIFY `id_programa` tinyint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unidades_academicas`
--
ALTER TABLE `unidades_academicas`
    MODIFY `id_unidad_academica` smallint NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumnos`
--
ALTER TABLE `alumnos`
    ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`id_estatus_de_alumno`) REFERENCES `estatus_de_alumno` (`id_estatus_de_alumno`),
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

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
