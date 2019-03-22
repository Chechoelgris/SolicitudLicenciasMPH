-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-03-2019 a las 19:23:20
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: solicitudrenovacion
--
CREATE DATABASE IF NOT EXISTS solicitudrenovacion DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE solicitudrenovacion;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla ta_acreditadomicilio
--

CREATE TABLE ta_acreditadomicilio (
  id_archivo int(11) NOT NULL,
  nombre_archivo varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  ruta_archivo varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla ta_claselicencia
--

CREATE TABLE ta_claselicencia (
  id_cls_licencia int(11) NOT NULL,
  tipo_licencia enum('A1','A2','A3','A4','A5','B','C','D','A1-A2 Ley 18.290') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla ta_comuna
--

CREATE TABLE ta_comuna (
  id_comuna int(11) NOT NULL,
  nombre_comuna varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  fk_id_region int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla ta_direccion
--

CREATE TABLE ta_direccion (
  id_direccion int(11) NOT NULL,
  calle_dir varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  numero_dir int(11) NOT NULL,
  dpto_dir varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  fk_id_persona int(11) NOT NULL,
  fk_id_comuna int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla ta_fecha
--

CREATE TABLE ta_fecha (
  id_fecha int(11) NOT NULL,
  fecha_asignada date NOT NULL,
  fk_id_persona int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla ta_licencia
--

CREATE TABLE ta_licencia (
  id_licencia int(11) NOT NULL,
  fechacont_licencia date NOT NULL,
  fk_id_cls_licencia int(11) NOT NULL,
  fk_id_comuna int(11) NOT NULL,
  fk_id_persona int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla ta_persona
--

CREATE TABLE ta_persona (
  id_persona int(11) NOT NULL,
  rut_persona varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  nombre_persona varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  apellidop_persona varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  apellidom_persona varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  fechan_persona date NOT NULL,
  sexo_persona enum('No Especifica','Femenino','Masculino') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No Especifica',
  correo_persona varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  telefono_persona varchar(12) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla ta_region
--

CREATE TABLE ta_region (
  id_region int(11) NOT NULL,
  nombre_region varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla ta_solicitud
--

CREATE TABLE ta_solicitud (
  id_solicitud int(11) NOT NULL,
  fk_id_persona int(11) NOT NULL,
  fk_id_archivo int(11) NOT NULL,
  fk_id_licencia int(11) NOT NULL,
  estado_solicitud enum('Pendiente','Aceptada','Rechazada') COLLATE utf8_spanish_ci NOT NULL,
  fk_id_fecha int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla ta_usuario
--

CREATE TABLE ta_usuario (
  id_usuario int(11) NOT NULL,
  rut_usuario varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  nombre_usuario varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  apellidop_usuario varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  apellidom_usuario varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  correo_usuario varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  pass_usuario varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  tipo_usuario enum('Funcionario','Administrador','Inactivo') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla ta_acreditadomicilio
--
ALTER TABLE ta_acreditadomicilio
  ADD PRIMARY KEY (id_archivo),
  ADD UNIQUE KEY nombre_archivo_UNIQUE (nombre_archivo);

--
-- Indices de la tabla ta_claselicencia
--
ALTER TABLE ta_claselicencia
  ADD PRIMARY KEY (id_cls_licencia);

--
-- Indices de la tabla ta_comuna
--
ALTER TABLE ta_comuna
  ADD PRIMARY KEY (id_comuna),
  ADD KEY fk_TA_Comuna_TA_Region1_idx (fk_id_region);

--
-- Indices de la tabla ta_direccion
--
ALTER TABLE ta_direccion
  ADD PRIMARY KEY (id_direccion),
  ADD KEY fk_TA_Direccion_TA_Persona1_idx (fk_id_persona),
  ADD KEY fk_TA_Direccion_TA_Comuna1_idx (fk_id_comuna);

--
-- Indices de la tabla ta_fecha
--
ALTER TABLE ta_fecha
  ADD PRIMARY KEY (id_fecha),
  ADD KEY fk_TA_Fecha_TA_Persona1_idx (fk_id_persona);

--
-- Indices de la tabla ta_licencia
--
ALTER TABLE ta_licencia
  ADD PRIMARY KEY (id_licencia),
  ADD KEY fk_TA_Licencia_TA_ClaseLicencia1_idx (fk_id_cls_licencia),
  ADD KEY fk_TA_Licencia_TA_Comuna1_idx (fk_id_comuna),
  ADD KEY fk_TA_Licencia_TA_Persona1_idx (fk_id_persona);

--
-- Indices de la tabla ta_persona
--
ALTER TABLE ta_persona
  ADD PRIMARY KEY (id_persona),
  ADD UNIQUE KEY rut_persona_UNIQUE (rut_persona);

--
-- Indices de la tabla ta_region
--
ALTER TABLE ta_region
  ADD PRIMARY KEY (id_region);

--
-- Indices de la tabla ta_solicitud
--
ALTER TABLE ta_solicitud
  ADD PRIMARY KEY (id_solicitud),
  ADD KEY fk_TA_Solicitud_TA_Persona1_idx (fk_id_persona),
  ADD KEY fk_TA_Solicitud_TA_AcreditaDomicilio1_idx (fk_id_archivo),
  ADD KEY fk_TA_Solicitud_TA_Licencia1_idx (fk_id_licencia),
  ADD KEY fk_TA_Solicitud_TA_Fecha2_idx (fk_id_fecha);

--
-- Indices de la tabla ta_usuario
--
ALTER TABLE ta_usuario
  ADD PRIMARY KEY (id_usuario),
  ADD UNIQUE KEY correo_usuario_UNIQUE (correo_usuario),
  ADD UNIQUE KEY rut_usuario_UNIQUE (rut_usuario);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla ta_acreditadomicilio
--
ALTER TABLE ta_acreditadomicilio
  MODIFY id_archivo int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla ta_claselicencia
--
ALTER TABLE ta_claselicencia
  MODIFY id_cls_licencia int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla ta_comuna
--
ALTER TABLE ta_comuna
  MODIFY id_comuna int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla ta_direccion
--
ALTER TABLE ta_direccion
  MODIFY id_direccion int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla ta_fecha
--
ALTER TABLE ta_fecha
  MODIFY id_fecha int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla ta_licencia
--
ALTER TABLE ta_licencia
  MODIFY id_licencia int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla ta_persona
--
ALTER TABLE ta_persona
  MODIFY id_persona int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla ta_region
--
ALTER TABLE ta_region
  MODIFY id_region int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla ta_solicitud
--
ALTER TABLE ta_solicitud
  MODIFY id_solicitud int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla ta_usuario
--
ALTER TABLE ta_usuario
  MODIFY id_usuario int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla ta_comuna
--
ALTER TABLE ta_comuna
  ADD CONSTRAINT fk_TA_Comuna_TA_Region1 FOREIGN KEY (fk_id_region) REFERENCES ta_region (id_region) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla ta_direccion
--
ALTER TABLE ta_direccion
  ADD CONSTRAINT fk_TA_Direccion_TA_Comuna1 FOREIGN KEY (fk_id_comuna) REFERENCES ta_comuna (id_comuna) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT fk_TA_Direccion_TA_Persona1 FOREIGN KEY (fk_id_persona) REFERENCES ta_persona (id_persona) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla ta_fecha
--
ALTER TABLE ta_fecha
  ADD CONSTRAINT fk_TA_Fecha_TA_Persona1 FOREIGN KEY (fk_id_persona) REFERENCES ta_persona (id_persona) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla ta_licencia
--
ALTER TABLE ta_licencia
  ADD CONSTRAINT fk_TA_Licencia_TA_ClaseLicencia1 FOREIGN KEY (fk_id_cls_licencia) REFERENCES ta_claselicencia (id_cls_licencia) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT fk_TA_Licencia_TA_Comuna1 FOREIGN KEY (fk_id_comuna) REFERENCES ta_comuna (id_comuna) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT fk_TA_Licencia_TA_Persona1 FOREIGN KEY (fk_id_persona) REFERENCES ta_persona (id_persona) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla ta_solicitud
--
ALTER TABLE ta_solicitud
  ADD CONSTRAINT fk_TA_Solicitud_TA_AcreditaDomicilio1 FOREIGN KEY (fk_id_archivo) REFERENCES ta_acreditadomicilio (id_archivo) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT fk_TA_Solicitud_TA_Fecha2 FOREIGN KEY (fk_id_fecha) REFERENCES ta_fecha (id_fecha) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT fk_TA_Solicitud_TA_Licencia1 FOREIGN KEY (fk_id_licencia) REFERENCES ta_licencia (id_licencia) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT fk_TA_Solicitud_TA_Persona1 FOREIGN KEY (fk_id_persona) REFERENCES ta_persona (id_persona) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;