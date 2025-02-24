-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2025 at 03:05 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `valorador`
--

-- --------------------------------------------------------

--
-- Table structure for table `actualizacion_antecedentes_docentes`
--

CREATE TABLE `actualizacion_antecedentes_docentes` (
  `id_act_ant_doc` int(11) NOT NULL,
  `id_ant_doc` int(11) NOT NULL,
  `detalle_act_ant_doc` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_detalle_doc` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actualizacion_antecedentes_docentes`
--

INSERT INTO `actualizacion_antecedentes_docentes` (`id_act_ant_doc`, `id_ant_doc`, `detalle_act_ant_doc`, `cantidad`, `id_detalle_doc`, `fecha`) VALUES
(6, 114, 'IES MANUEL BELGRANO0', 7, 1, '2025-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `actualizacion_antecedentes_laborales`
--

CREATE TABLE `actualizacion_antecedentes_laborales` (
  `id_act_lab` int(11) NOT NULL,
  `id_ant_lab` int(11) NOT NULL,
  `detalle_act_lab` varchar(100) NOT NULL,
  `id_detalle_lab` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `actualizacion_capacitacion`
--

CREATE TABLE `actualizacion_capacitacion` (
  `id_act_capacitacion` int(11) NOT NULL,
  `id_capacitacion` int(11) NOT NULL,
  `detalle_act_capacitacion` varchar(100) NOT NULL,
  `id_detalle_capacitacion` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `actualizacion_formacion_ofrecida`
--

CREATE TABLE `actualizacion_formacion_ofrecida` (
  `id_act_for_of` int(11) NOT NULL,
  `id_formacion` int(11) NOT NULL,
  `detalle_act_for_of` varchar(100) NOT NULL,
  `id_formacion_ofrecida` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `actualizacion_investigacion`
--

CREATE TABLE `actualizacion_investigacion` (
  `id_act_investigacion` int(11) NOT NULL,
  `id_investigacion` int(11) NOT NULL,
  `detalle_act_investigacion` varchar(100) NOT NULL,
  `id_detalle_investigacion` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `actualizacion_otros_antecedentes`
--

CREATE TABLE `actualizacion_otros_antecedentes` (
  `id_act_otros` int(11) NOT NULL,
  `id_detalle_ant` int(11) NOT NULL,
  `detalle_act_otros` varchar(100) NOT NULL,
  `id_detalle_otros_ant` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `actualizacion_otros_titulos`
--

CREATE TABLE `actualizacion_otros_titulos` (
  `id_act_otros_tit` int(11) NOT NULL,
  `id_otros_t` int(11) NOT NULL,
  `detalle_act_otros_tit` varchar(100) NOT NULL,
  `id_otros_titulos` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `actualizacion_postgrado`
--

CREATE TABLE `actualizacion_postgrado` (
  `id_act_postgrado` int(11) NOT NULL,
  `id_postgrado` int(11) NOT NULL,
  `detalle_act_postgrado` varchar(100) NOT NULL,
  `id_titulo_postgrado` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `antecedentes_docentes`
--

CREATE TABLE `antecedentes_docentes` (
  `id_ant_doc` int(11) NOT NULL,
  `id_valoracion` int(11) NOT NULL,
  `detalle_ant_doc` varchar(100) NOT NULL,
  `cantidad` varchar(2) NOT NULL,
  `id_detalle_doc` int(11) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_modifica` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `antecedentes_docentes`
--

INSERT INTO `antecedentes_docentes` (`id_ant_doc`, `id_valoracion`, `detalle_ant_doc`, `cantidad`, `id_detalle_doc`, `fecha_alta`, `fecha_modifica`) VALUES
(114, 310, 'IES MANUEL BELGRANO0', '7', 1, '2025-02-22 20:05:39', '2025-02-23 14:21:29'),
(115, 310, 'IES MANUEL BELGRANO', '7', 2, '2025-02-22 20:05:39', '2025-02-22 20:05:39'),
(116, 310, 'IES MANUEL BELGRANO', '7', 3, '2025-02-22 20:05:39', '2025-02-22 20:05:39'),
(117, 310, 'ISFT ANGACO', '5', 4, '2025-02-22 20:05:39', '2025-02-22 20:05:39'),
(118, 310, 'ISFT ANGACO', '4', 5, '2025-02-22 20:05:39', '2025-02-22 20:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `antecedentes_laborales`
--

CREATE TABLE `antecedentes_laborales` (
  `id_ant_lab` int(11) NOT NULL,
  `id_valoracion` int(11) NOT NULL,
  `detalle_ant_lab` varchar(50) NOT NULL,
  `cantidad` float NOT NULL,
  `id_detalle_lab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `antecedentes_laborales`
--

INSERT INTO `antecedentes_laborales` (`id_ant_lab`, `id_valoracion`, `detalle_ant_lab`, `cantidad`, `id_detalle_lab`) VALUES
(93, 310, 'MINISTERIO DE EDUCACIÓN', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `capacitacion`
--

CREATE TABLE `capacitacion` (
  `id_capacitacion` int(11) NOT NULL,
  `id_valoracion` int(11) NOT NULL,
  `detalle_capacitacion` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `id_detalle_capacitacion` int(11) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_modifica` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `capacitacion`
--

INSERT INTO `capacitacion` (`id_capacitacion`, `id_valoracion`, `detalle_capacitacion`, `fecha`, `id_detalle_capacitacion`, `fecha_alta`, `fecha_modifica`) VALUES
(133, 310, 'CIBERSESGURIDAD UNI SANTO TOME', '2022-06-07', 1, '2025-02-22 20:05:39', '2025-02-22 20:05:39'),
(134, 310, 'CURSO PYTHON', '2024-02-22', 6, '2025-02-22 20:05:39', '2025-02-22 20:05:39'),
(135, 310, 'CURSO BACKEND', '2025-02-06', 6, '2025-02-22 20:05:39', '2025-02-22 20:05:39'),
(136, 310, 'CURSO CSS', '2025-02-04', 6, '2025-02-22 20:05:39', '2025-02-22 20:05:39'),
(137, 310, 'DIPLOMATURA EN REDES', '2023-06-06', 1, '2025-02-22 21:06:50', '2025-02-22 21:06:50'),
(138, 314, 'DIPLOMATURA EN BAKEND', '2025-02-05', 1, '2025-02-22 21:34:40', '2025-02-22 21:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `carreras`
--

CREATE TABLE `carreras` (
  `id_carrera` int(11) NOT NULL,
  `nombre_carrera` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carreras`
--

INSERT INTO `carreras` (`id_carrera`, `nombre_carrera`) VALUES
(1, 'Tecnicatura Superior en Desarrollo de Software'),
(2, 'Energías Renovables');

-- --------------------------------------------------------

--
-- Table structure for table `condicion_docente`
--

CREATE TABLE `condicion_docente` (
  `id_condicion` int(11) NOT NULL,
  `detalle_condicion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `condicion_docente`
--

INSERT INTO `condicion_docente` (`id_condicion`, `detalle_condicion`) VALUES
(1, 'Docente'),
(2, 'Habilitante');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_ant_doc`
--

CREATE TABLE `detalle_ant_doc` (
  `id_detalle_doc` int(11) NOT NULL,
  `detalle_ant_doc` varchar(100) NOT NULL,
  `puntaje` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detalle_ant_doc`
--

INSERT INTO `detalle_ant_doc` (`id_detalle_doc`, `detalle_ant_doc`, `puntaje`) VALUES
(1, 'En la docencia', 0.1),
(2, 'En el nivel superior', 0.15),
(3, 'En el nivel superior técnico', 0.2),
(4, 'En la institución', 0.25),
(5, 'En la unidad curricular', 0.3);

-- --------------------------------------------------------

--
-- Table structure for table `detalle_ant_lab`
--

CREATE TABLE `detalle_ant_lab` (
  `id_detalle_lab` int(11) NOT NULL,
  `detalle_ant_lab` varchar(100) NOT NULL,
  `puntaje` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detalle_ant_lab`
--

INSERT INTO `detalle_ant_lab` (`id_detalle_lab`, `detalle_ant_lab`, `puntaje`) VALUES
(1, 'Antecedentes en relación de dependencias(con organismos del Estado o privados)', 0.4),
(2, 'Antecedentes sin relación de dependencia y/o emprendimientos propios', 0.6);

-- --------------------------------------------------------

--
-- Table structure for table `detalle_capacitacion`
--

CREATE TABLE `detalle_capacitacion` (
  `id_detalle_capacitacion` int(11) NOT NULL,
  `detalle` varchar(50) NOT NULL,
  `puntaje` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detalle_capacitacion`
--

INSERT INTO `detalle_capacitacion` (`id_detalle_capacitacion`, `detalle`, `puntaje`) VALUES
(1, 'Diplomatura.Por certificación.', 1),
(2, 'Curso de Postgrado.Más de 81 hs.', 0.5),
(3, 'Curso de Postgrado.Entre 41 y 80 hs.', 0.4),
(4, 'Curso de Postgrado.Entre 21 y 40 hs.', 0.15),
(5, 'Curso de Postgrado.Hasta 20 hs.', 0.2),
(6, 'Cursos.Con evaluación.41 o más horas.', 0.05),
(7, 'Cursos.Con evaluación.Entre 21 y 40 hs.', 0.04),
(8, 'Trayectos.Hasta 20 hs.', 0.03),
(9, 'Trayectos.Donde consten días y no horas.', 0.003),
(10, 'Trayectos.Sin evaluación.', 0.002),
(11, 'Congresos.Eventos internacionales.', 0.2),
(12, 'Congresos.Eventos nacionales.', 0.15),
(13, 'Congresos.Eventos provinciales.', 0.1),
(14, 'Congresos.Eventos departamentales.', 0.05),
(15, 'Congresos.Eventos institucionales.', 0.02);

-- --------------------------------------------------------

--
-- Table structure for table `detalle_formacion_ofrecida`
--

CREATE TABLE `detalle_formacion_ofrecida` (
  `id_formacion_ofrecida` int(11) NOT NULL,
  `detalle` varchar(100) NOT NULL,
  `puntaje` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detalle_formacion_ofrecida`
--

INSERT INTO `detalle_formacion_ofrecida` (`id_formacion_ofrecida`, `detalle`, `puntaje`) VALUES
(1, 'Cursos,seminarios,foros,etc.Con normativa de aval de organismo oficial.Más de 81 hs.', 0.25),
(2, 'Cursos,seminarios,foros,etc.Con normativa de aval de organismo oficial.Entre 41 y 80 hs.', 0.2),
(3, 'Cursos,seminarios,foros,etc.Con normativa de aval de organismo oficial.Entre 21 y 40 hs.', 0.15),
(4, 'Cursos,seminarios,foros,etc.Con normativa de aval de organismo oficial.Hasta 20 hs.', 0.1),
(5, 'Cursos,seminarios,foros,etc.Sin normativa de aval de organismo oficial.Por certificación', 0.05),
(6, 'Congresos y Simposios.Eventos internacionales.Coordinador/moderador', 0.25),
(7, 'Congresos y Simposios.Eventos internacionales.Expositor/Distante', 0.3),
(9, 'Congresos y Simposios.Eventos nacionales.Coordinaodr/Moderador.', 0.2),
(10, 'Congresos y Simposios.Eventos nacionales.Expositor/Disertante', 0.25),
(11, 'Congresos y Simposios.Eventos provinciales.Coordinador/moderador', 0.1),
(12, 'Congresos y Simposios.Eventos provinciales.Expositor/Disertante', 0.15),
(13, 'Congresos y Simposios.Eventos departamentales.Coordinador/moderador', 0.05),
(14, 'Congresos y Simposios.Eventos departamentales.Expositor/Disertante', 0.03),
(15, 'Congresos y Simposios.Eventos departamentales.Coordinador/moderador', 0.05),
(16, 'Congresos y Simposios.Eventos departamentales.Expositor/Disertante', 0.1),
(17, 'Congresos y Simposios.Eventos institucionales.Coordinador/moderador', 0.03),
(18, 'Congresos y Simposios.Eventos institucionales.Expositor/Disertante', 0.05);

-- --------------------------------------------------------

--
-- Table structure for table `detalle_investigacion`
--

CREATE TABLE `detalle_investigacion` (
  `id_detalle_investigacion` int(11) NOT NULL,
  `detalle` varchar(100) NOT NULL,
  `puntaje` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detalle_investigacion`
--

INSERT INTO `detalle_investigacion` (`id_detalle_investigacion`, `detalle`, `puntaje`) VALUES
(1, 'Proyecto de investigación relacionado con el espacio curricular y/o la carrera', 1),
(2, 'Publicaciones científicas y/o académcias.Libro.Autor', 0.5),
(3, 'Publicaciones científicas y/o académcias.Libro.Co-Autor', 0.25),
(4, 'Publicaciones científicas y/o académcias.Libro.Compilador', 0.1),
(5, 'Publicaciones científicas y/o académcias.Capítulo.Autor', 0.25),
(6, 'Publicaciones científicas y/o académcias.Capítulo.Co-Autor.', 0.15),
(7, 'Publicaciones científicas y/o académcias.Capítulo.Compilador', 0.1),
(8, 'Publicaciones científicas y/o académcias.Artículo.Autor', 0.15),
(9, 'Publicaciones científicas y/o académcias.Artículo.Co-Autor', 0.1),
(10, 'Publicaciones científicas y/o académcias.Artículo.Compilador', 0.05),
(11, 'Otras publicaciones relativas a la especificidad de la carrera', 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `detalle_otros_ant_doc`
--

CREATE TABLE `detalle_otros_ant_doc` (
  `id_detalle_otros_ant` int(11) NOT NULL,
  `detalle_otros_ant` varchar(200) NOT NULL,
  `puntaje` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detalle_otros_ant_doc`
--

INSERT INTO `detalle_otros_ant_doc` (`id_detalle_otros_ant`, `detalle_otros_ant`, `puntaje`) VALUES
(1, 'Jurado de concursos de valoración de antecedentes(hasta un 1 punto)', 0.03),
(2, 'Miembro del comité de elaboración e diseños curriculares de carreras de Nivel Superior.Coordinador', 1),
(3, 'Miembro del comité de elaboración e diseños curriculares de carreras de Nivel Superior.Colaboradores', 0.2),
(4, 'Becas,concursos,premios relacionados con el espacio curricular y con la carrera,realizados en los últimos 5 años Internacionales', 0.2),
(5, 'Becas,concursos,premios relacionados con el espacio curricular y con la carrera,realizados en los últimos 5 años Nacionales', 0.1),
(6, 'Becas,concursos,premios relacionados con el espacio curricular y con la carrera,realizados en los últimos 5 años Provinciales', 0.05),
(7, 'Antecedentes en gestión(por año de gestión o fracción mayor a 6 meses)hasta cuatro(4)puntos.Rector', 0.4),
(8, 'Antecedentes en gestión(por año de gestión o fracción mayor a 6 meses)hasta cuatro(4)puntos.Coordinador', 0.35);

-- --------------------------------------------------------

--
-- Table structure for table `docente`
--

CREATE TABLE `docente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `docente`
--

INSERT INTO `docente` (`id`, `nombre`, `apellido`, `dni`, `email`, `estado`, `usuario`, `clave`) VALUES
(1, 'ANALIA VERONICA', 'HEREDIA', '23922369', '', 0, '', ''),
(2, 'JOSE RUBEN', 'MOLL', '29588455', '', 0, '', ''),
(3, 'LUIS FERNANDO NICOLAS', 'ZALAZAR GARCIA', '28773900', 'gastongefb222@gmail.com', 0, '', ''),
(4, 'LAURA EMILIA', 'ROMERO', '31642634', '', 0, '', ''),
(5, 'CINTIA', 'MOLL', '32887912', 'mollcintia830@gmail.com', 0, '', ''),
(6, 'SERGIO GASTON', 'GARBEROGLIO', '27269774', 'gastongefb222@gmail.com', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `dynamic_inputs_table`
--

CREATE TABLE `dynamic_inputs_table` (
  `id` int(11) NOT NULL,
  `input_value` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dynamic_inputs_table`
--

INSERT INTO `dynamic_inputs_table` (`id`, `input_value`) VALUES
(232, ''),
(233, ''),
(234, ''),
(235, ''),
(236, ''),
(237, ''),
(238, ''),
(239, ''),
(240, ''),
(241, ''),
(242, ''),
(243, '');

-- --------------------------------------------------------

--
-- Table structure for table `formacion_ofrecida`
--

CREATE TABLE `formacion_ofrecida` (
  `id_formacion` int(11) NOT NULL,
  `id_valoracion` int(11) NOT NULL,
  `detalle_formacion` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `id_formacion_ofrecida` int(11) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_modifica` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `investigacion`
--

CREATE TABLE `investigacion` (
  `id_investigacion` int(11) NOT NULL,
  `id_valoracion` int(11) NOT NULL,
  `detalle_investigacion` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `id_detalle_investigacion` int(11) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_modifica` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(40) NOT NULL,
  `cuatrimestre` int(11) NOT NULL,
  `id_carrera_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materias`
--

INSERT INTO `materias` (`id_materia`, `nombre_materia`, `cuatrimestre`, `id_carrera_materia`) VALUES
(1, 'Programacion I', 1, 1),
(2, 'Sistemas de Información', 1, 1),
(32, 'Energías Renovables', 1, 2),
(33, 'Energía Fotovoltáica', 2, 2),
(34, 'Desarrollo de software I', 1, 1),
(35, 'Ambiente Empresarial', 2, 1),
(37, 'Energía de la Biomasa', 1, 2),
(38, 'Inglés Técnico', 1, 1),
(42, 'Energia de la Biomasa', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `otros_antecedentes_docentes`
--

CREATE TABLE `otros_antecedentes_docentes` (
  `id_detalle_ant` int(11) NOT NULL,
  `id_valoracion` int(11) NOT NULL,
  `detalle_otros_ant_doc` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `id_detalle_otros_ant` int(11) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_modifica` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otros_antecedentes_docentes`
--

INSERT INTO `otros_antecedentes_docentes` (`id_detalle_ant`, `id_valoracion`, `detalle_otros_ant_doc`, `fecha`, `id_detalle_otros_ant`, `fecha_alta`, `fecha_modifica`) VALUES
(34, 310, 'JURADO EN ISFT ULLUM', '2024-05-08', 1, '2025-02-22 20:05:39', '2025-02-22 20:05:39'),
(35, 310, 'JURADO EN ISFT CENT 18', '2023-07-13', 1, '2025-02-22 20:05:39', '2025-02-22 20:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `otros_titulos`
--

CREATE TABLE `otros_titulos` (
  `id_otros_titulos` int(11) NOT NULL,
  `detalle_otros_titulos` varchar(100) NOT NULL,
  `puntaje` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otros_titulos`
--

INSERT INTO `otros_titulos` (`id_otros_titulos`, `detalle_otros_titulos`, `puntaje`) VALUES
(1, 'Docente de nivel superior universitario', 2),
(2, 'Docente de nivel superior.(No universitario)', 1),
(3, 'No Docente de nivel superior universitario', 1.5),
(4, 'No docente de nivel superior', 0.5),
(5, 'Otros', 0.25);

-- --------------------------------------------------------

--
-- Table structure for table `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `comentarios` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `apellido`, `telefono`, `email`, `comentarios`, `created_at`) VALUES
(1, 'gas', 'garbe', '2644409547', 'gastongefb@yahoo.com.ar', 'dfddfdfdfd', '2024-10-04 13:50:08'),
(2, 'sergio gastón', 'garberoglio', '2644409547', 'gastongefb@yahoo.com.ar', 'sdsddsds', '2024-10-04 13:55:11'),
(3, 'pep', 'luis', '2644409547', 'mollcinta830@gmail.com', 'dfddfdfd', '2024-10-04 13:55:46'),
(4, 'tobi', 'Moll', '2644409547', 'gastongefb@yahoo.com.ar', 'RTRRTRR', '2024-10-04 14:05:09'),
(5, '', '', '', '', '', '2024-10-04 14:05:43'),
(6, 'serg', 'DFDFDF', '', '', 'DDDDDD', '2024-10-04 14:07:36'),
(7, 'www', 'erere', NULL, NULL, NULL, '2024-10-04 14:50:32'),
(8, 'www', 'erere', NULL, NULL, NULL, '2024-10-04 14:50:58'),
(9, 'ere', 'erere', NULL, NULL, NULL, '2024-10-04 14:54:58'),
(10, 'ddd', 'wwww', '2644409547', 'gastongefb@yahoo.com.ar', NULL, '2024-10-04 14:59:52'),
(11, 'ere', 'erere', '2644409547', 'gastongefb@yahoo.com.ar', NULL, '2024-10-04 15:02:41'),
(12, 'ere', 'ssss', '2644409547', 'gastongefb@yahoo.com.ar', NULL, '2024-10-04 15:05:53'),
(13, 'www', 'erere', '2644409547', 'gastongefb@yahoo.com.ar', NULL, '2024-10-04 15:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `name`, `email`) VALUES
(1, 'gastonnnn', 'garbee'),
(2, 'cintia', 'mollllll');

-- --------------------------------------------------------

--
-- Table structure for table `titulos`
--

CREATE TABLE `titulos` (
  `id_titulo` int(11) NOT NULL,
  `detalle_titulo` varchar(50) NOT NULL,
  `puntaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `titulos`
--

INSERT INTO `titulos` (`id_titulo`, `detalle_titulo`, `puntaje`) VALUES
(1, 'Docente', 9),
(2, 'Habilitante', 6),
(3, 'Supletorio', 3);

-- --------------------------------------------------------

--
-- Table structure for table `titulos_postgrado`
--

CREATE TABLE `titulos_postgrado` (
  `id_titulo_postgrado` int(11) NOT NULL,
  `detalle_postgrado` varchar(100) NOT NULL,
  `puntaje` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `titulos_postgrado`
--

INSERT INTO `titulos_postgrado` (`id_titulo_postgrado`, `detalle_postgrado`, `puntaje`) VALUES
(1, 'Actualización académica (200 horas cátedra o más).', 1),
(2, 'Especialización docente de Nivel Superior (400 horas cátedra o más)', 2),
(3, 'Diplomatura Superior (600 horas cátedra o más)', 3),
(4, 'Especialización (360 horas o más)', 3.5),
(5, 'Maestría (700 horas reloj o más)', 5),
(6, 'Doctorado', 6),
(7, 'Postdoctorado', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`) VALUES
('gaston', '123', 'gaston@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `contrasena`, `fecha_registro`) VALUES
(1, 'admin', '123', '2024-04-29 22:11:43'),
(1, 'admin', '123', '2024-04-29 22:11:43'),
(3, 'gas', '1234', '2025-01-13 10:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `valoracion`
--

CREATE TABLE `valoracion` (
  `id_valoracion` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `id_titulo` int(11) NOT NULL,
  `j1` int(11) NOT NULL,
  `j2` int(11) NOT NULL,
  `j3` int(11) NOT NULL,
  `id_materia_valoracion` int(11) NOT NULL,
  `id_condicion` int(11) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_modifica` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `valoracion`
--

INSERT INTO `valoracion` (`id_valoracion`, `dni`, `id_titulo`, `j1`, `j2`, `j3`, `id_materia_valoracion`, `id_condicion`, `fecha_alta`, `fecha_modifica`) VALUES
(310, 27269774, 3, 19222333, 29789456, 25412789, 1, 0, '2025-02-22 20:05:39', '2025-02-22 20:05:39'),
(311, 28773900, 2, 122211121, 23232323, 33434343, 1, 0, '2025-02-22 20:11:33', '2025-02-22 20:11:33'),
(312, 31642634, 1, 343, 29789456, 25412789, 38, 0, '2025-02-22 21:12:00', '2025-02-22 21:12:00'),
(313, 23922369, 1, 19222333, 334, 25412789, 1, 0, '2025-02-22 21:25:28', '2025-02-22 21:25:28'),
(314, 27269774, 2, 19222333, 29789456, 25412789, 2, 0, '2025-02-22 21:34:40', '2025-02-22 21:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `valoracion_otros_titulos`
--

CREATE TABLE `valoracion_otros_titulos` (
  `id_otros_t` int(11) NOT NULL,
  `id_valoracion` int(11) NOT NULL,
  `detalle_otros_titulos` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `id_otros_titulos` int(11) NOT NULL,
  `fecha_alta` date NOT NULL,
  `fecha_modifica` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `valoracion_otros_titulos`
--

INSERT INTO `valoracion_otros_titulos` (`id_otros_t`, `id_valoracion`, `detalle_otros_titulos`, `fecha`, `id_otros_titulos`, `fecha_alta`, `fecha_modifica`) VALUES
(108, 311, 'profesor', '2023-06-06', 1, '2025-02-22', '2025-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `valoracion_postgrado`
--

CREATE TABLE `valoracion_postgrado` (
  `id_postgrado` int(11) NOT NULL,
  `id_valoracion` int(11) NOT NULL,
  `detalle_valoracion_postgrado` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `id_titulo_postgrado` int(11) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_modifica` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `valoracion_postgrado`
--

INSERT INTO `valoracion_postgrado` (`id_postgrado`, `id_valoracion`, `detalle_valoracion_postgrado`, `fecha`, `id_titulo_postgrado`, `fecha_alta`, `fecha_modifica`) VALUES
(223, 312, 'ESPECIALIZACIÓN EN INGLÉS', '2025-02-05', 1, '2025-02-22 21:12:00', '2025-02-22 21:12:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actualizacion_antecedentes_docentes`
--
ALTER TABLE `actualizacion_antecedentes_docentes`
  ADD PRIMARY KEY (`id_act_ant_doc`);

--
-- Indexes for table `actualizacion_antecedentes_laborales`
--
ALTER TABLE `actualizacion_antecedentes_laborales`
  ADD PRIMARY KEY (`id_act_lab`);

--
-- Indexes for table `actualizacion_capacitacion`
--
ALTER TABLE `actualizacion_capacitacion`
  ADD PRIMARY KEY (`id_act_capacitacion`);

--
-- Indexes for table `actualizacion_formacion_ofrecida`
--
ALTER TABLE `actualizacion_formacion_ofrecida`
  ADD PRIMARY KEY (`id_act_for_of`);

--
-- Indexes for table `actualizacion_investigacion`
--
ALTER TABLE `actualizacion_investigacion`
  ADD PRIMARY KEY (`id_act_investigacion`);

--
-- Indexes for table `actualizacion_otros_antecedentes`
--
ALTER TABLE `actualizacion_otros_antecedentes`
  ADD PRIMARY KEY (`id_act_otros`);

--
-- Indexes for table `actualizacion_otros_titulos`
--
ALTER TABLE `actualizacion_otros_titulos`
  ADD PRIMARY KEY (`id_act_otros_tit`);

--
-- Indexes for table `actualizacion_postgrado`
--
ALTER TABLE `actualizacion_postgrado`
  ADD PRIMARY KEY (`id_act_postgrado`);

--
-- Indexes for table `antecedentes_docentes`
--
ALTER TABLE `antecedentes_docentes`
  ADD PRIMARY KEY (`id_ant_doc`);

--
-- Indexes for table `antecedentes_laborales`
--
ALTER TABLE `antecedentes_laborales`
  ADD PRIMARY KEY (`id_ant_lab`);

--
-- Indexes for table `capacitacion`
--
ALTER TABLE `capacitacion`
  ADD PRIMARY KEY (`id_capacitacion`);

--
-- Indexes for table `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indexes for table `condicion_docente`
--
ALTER TABLE `condicion_docente`
  ADD PRIMARY KEY (`id_condicion`);

--
-- Indexes for table `detalle_ant_doc`
--
ALTER TABLE `detalle_ant_doc`
  ADD PRIMARY KEY (`id_detalle_doc`);

--
-- Indexes for table `detalle_ant_lab`
--
ALTER TABLE `detalle_ant_lab`
  ADD PRIMARY KEY (`id_detalle_lab`);

--
-- Indexes for table `detalle_capacitacion`
--
ALTER TABLE `detalle_capacitacion`
  ADD PRIMARY KEY (`id_detalle_capacitacion`);

--
-- Indexes for table `detalle_formacion_ofrecida`
--
ALTER TABLE `detalle_formacion_ofrecida`
  ADD PRIMARY KEY (`id_formacion_ofrecida`);

--
-- Indexes for table `detalle_investigacion`
--
ALTER TABLE `detalle_investigacion`
  ADD PRIMARY KEY (`id_detalle_investigacion`);

--
-- Indexes for table `detalle_otros_ant_doc`
--
ALTER TABLE `detalle_otros_ant_doc`
  ADD PRIMARY KEY (`id_detalle_otros_ant`);

--
-- Indexes for table `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dynamic_inputs_table`
--
ALTER TABLE `dynamic_inputs_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formacion_ofrecida`
--
ALTER TABLE `formacion_ofrecida`
  ADD PRIMARY KEY (`id_formacion`);

--
-- Indexes for table `investigacion`
--
ALTER TABLE `investigacion`
  ADD PRIMARY KEY (`id_investigacion`);

--
-- Indexes for table `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `id_carrera_materia` (`id_carrera_materia`);

--
-- Indexes for table `otros_antecedentes_docentes`
--
ALTER TABLE `otros_antecedentes_docentes`
  ADD PRIMARY KEY (`id_detalle_ant`);

--
-- Indexes for table `otros_titulos`
--
ALTER TABLE `otros_titulos`
  ADD PRIMARY KEY (`id_otros_titulos`);

--
-- Indexes for table `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titulos`
--
ALTER TABLE `titulos`
  ADD PRIMARY KEY (`id_titulo`);

--
-- Indexes for table `titulos_postgrado`
--
ALTER TABLE `titulos_postgrado`
  ADD PRIMARY KEY (`id_titulo_postgrado`);

--
-- Indexes for table `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`id_valoracion`);

--
-- Indexes for table `valoracion_otros_titulos`
--
ALTER TABLE `valoracion_otros_titulos`
  ADD PRIMARY KEY (`id_otros_t`);

--
-- Indexes for table `valoracion_postgrado`
--
ALTER TABLE `valoracion_postgrado`
  ADD PRIMARY KEY (`id_postgrado`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actualizacion_antecedentes_docentes`
--
ALTER TABLE `actualizacion_antecedentes_docentes`
  MODIFY `id_act_ant_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `actualizacion_antecedentes_laborales`
--
ALTER TABLE `actualizacion_antecedentes_laborales`
  MODIFY `id_act_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `actualizacion_capacitacion`
--
ALTER TABLE `actualizacion_capacitacion`
  MODIFY `id_act_capacitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `actualizacion_formacion_ofrecida`
--
ALTER TABLE `actualizacion_formacion_ofrecida`
  MODIFY `id_act_for_of` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `actualizacion_investigacion`
--
ALTER TABLE `actualizacion_investigacion`
  MODIFY `id_act_investigacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `actualizacion_otros_antecedentes`
--
ALTER TABLE `actualizacion_otros_antecedentes`
  MODIFY `id_act_otros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `actualizacion_otros_titulos`
--
ALTER TABLE `actualizacion_otros_titulos`
  MODIFY `id_act_otros_tit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `actualizacion_postgrado`
--
ALTER TABLE `actualizacion_postgrado`
  MODIFY `id_act_postgrado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `antecedentes_docentes`
--
ALTER TABLE `antecedentes_docentes`
  MODIFY `id_ant_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `antecedentes_laborales`
--
ALTER TABLE `antecedentes_laborales`
  MODIFY `id_ant_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `capacitacion`
--
ALTER TABLE `capacitacion`
  MODIFY `id_capacitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `condicion_docente`
--
ALTER TABLE `condicion_docente`
  MODIFY `id_condicion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detalle_ant_doc`
--
ALTER TABLE `detalle_ant_doc`
  MODIFY `id_detalle_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detalle_ant_lab`
--
ALTER TABLE `detalle_ant_lab`
  MODIFY `id_detalle_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detalle_capacitacion`
--
ALTER TABLE `detalle_capacitacion`
  MODIFY `id_detalle_capacitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `detalle_formacion_ofrecida`
--
ALTER TABLE `detalle_formacion_ofrecida`
  MODIFY `id_formacion_ofrecida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `detalle_investigacion`
--
ALTER TABLE `detalle_investigacion`
  MODIFY `id_detalle_investigacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detalle_otros_ant_doc`
--
ALTER TABLE `detalle_otros_ant_doc`
  MODIFY `id_detalle_otros_ant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `docente`
--
ALTER TABLE `docente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dynamic_inputs_table`
--
ALTER TABLE `dynamic_inputs_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `formacion_ofrecida`
--
ALTER TABLE `formacion_ofrecida`
  MODIFY `id_formacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `investigacion`
--
ALTER TABLE `investigacion`
  MODIFY `id_investigacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `otros_antecedentes_docentes`
--
ALTER TABLE `otros_antecedentes_docentes`
  MODIFY `id_detalle_ant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `otros_titulos`
--
ALTER TABLE `otros_titulos`
  MODIFY `id_otros_titulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `titulos`
--
ALTER TABLE `titulos`
  MODIFY `id_titulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `titulos_postgrado`
--
ALTER TABLE `titulos_postgrado`
  MODIFY `id_titulo_postgrado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `valoracion`
--
ALTER TABLE `valoracion`
  MODIFY `id_valoracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT for table `valoracion_otros_titulos`
--
ALTER TABLE `valoracion_otros_titulos`
  MODIFY `id_otros_t` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `valoracion_postgrado`
--
ALTER TABLE `valoracion_postgrado`
  MODIFY `id_postgrado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`id_carrera_materia`) REFERENCES `carreras` (`id_carrera`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
