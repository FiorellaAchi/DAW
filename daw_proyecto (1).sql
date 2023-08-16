-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-08-2023 a las 14:29:05
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `daw_proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta_medica`
--

CREATE TABLE `consulta_medica` (
  `idConsulta` int(4) NOT NULL,
  `nombrePaciente` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `especialidadMedica` varchar(20) NOT NULL,
  `fechaConsulta` date NOT NULL,
  `horaConsulta` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `consulta_medica`
--

INSERT INTO `consulta_medica` (`idConsulta`, `nombrePaciente`, `email`, `telefono`, `especialidadMedica`, `fechaConsulta`, `horaConsulta`) VALUES
(1, 'Josefina Cañizales', 'josefinac@ug.edu.ec', '0965478125', 'Infectologia', '2020-10-30', '18:15:00'),
(2, 'Jose Marcelo', 'josemar@outlook.com', '0999124785', 'Neurología', '2023-08-04', '18:15:00'),
(3, 'Luis Bedoya Jaime', 'luisbedoya72@gmail.com', '0988293905', 'Dermatología', '2023-07-30', '11:30:00'),
(4, 'Hercilia Jaime Morales', 'herciliajaime@gmail.com', '0993531894', 'Neurología', '2023-07-29', '10:15:00'),
(5, 'Fiorella Achi Limones', 'fiorella@gmail.com', '0981541318', 'Pediatria', '2023-07-29', '11:45:00'),
(6, 'Fiorella Achi', 'fiorella.achi@gmail.com', '0987456325', 'Gastroenterología', '2023-07-11', '21:30:00'),
(7, 'Marcelo Cevallos', 'm.cevallos@gmail.com', '0952145631', 'Cardiología', '2023-07-27', '11:10:00'),
(8, 'Romeo Santos', 'rmsns@gmail.com', '0987556621', 'Pediatría', '2023-07-26', '11:20:00'),
(9, 'Angelo Meza', 'meza777@gmail.com', '0987455887', 'Pediatría', '2023-07-06', '07:30:00'),
(10, 'Lotenzo marcelo', 'lotenzo123@gmail.com', '0879431346', 'SaludOral', '2023-07-25', '13:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `ID` int(3) NOT NULL,
  `Cedula` varchar(10) NOT NULL,
  `Nombres` varchar(40) NOT NULL,
  `Apellidos` varchar(40) NOT NULL,
  `Edad` varchar(3) NOT NULL,
  `Especialidad` varchar(20) NOT NULL,
  `Correo` varchar(40) NOT NULL,
  `Numero_Telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`ID`, `Cedula`, `Nombres`, `Apellidos`, `Edad`, `Especialidad`, `Correo`, `Numero_Telefono`) VALUES
(1, '0987456321', 'Dr. Henry Marcelo', 'Cavill Cedeño', '29', 'Alergologia', 'Hcavill777@gmail.com', '0987451458'),
(2, '0963214587', 'Johnny', 'Depp', '40', 'Anestesiología', 'jack.sparrow@hotmail.com', '0963541789'),
(3, '0944316042', 'Rhea Demi', 'Bennett Ripley', '29', 'Cardiologa', 'rhearipley@gmail.com', '0931123806'),
(4, '0931123803', 'Henry William', 'Dalgliesh Cavill', '40', 'Obstetra', 'hencav@hotmail.com', '0983456890'),
(6, '0987451203', 'Loretta Mariela', 'Montreal Ramirez', '29', 'Dentista', 'Loretta.montrealR@asec.gob.ec', '0987451232');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `idPaciente` int(4) NOT NULL,
  `nombre` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cedula` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `edad` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `genero` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `correo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `telefono` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`idPaciente`, `nombre`, `cedula`, `edad`, `genero`, `correo`, `direccion`, `telefono`) VALUES
(2, 'Azucena Morales', '0987452135', '24', 'Mujer', 'azu.mora24@gmail.com', 'Sauces 6', '0958812475'),
(3, 'John Ati', '0977851235', '21', 'Hombre', 'yonati1234@gmail.com', 'Entrada de la 8', '0987455582'),
(4, 'Angelo Valencia', '0484521225', '18', 'Hombre', 'greatmisive@outlook.com', 'Samanes 3', '0965478125');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`) VALUES
(1, 'Paracetamol 500mg', 5.99),
(2, 'Ibuprofeno 400mg', 7.50),
(3, 'Amoxicilina 250mg', 12.25),
(4, 'Loratadina 10mg', 8.75),
(5, 'Omeprazol 20mg', 15.30),
(6, 'Aspirina 100mg', 3.25),
(7, 'Atorvastatina 20mg', 20.00),
(8, 'Metformina 500mg', 9.50),
(9, 'Losartán 50mg', 11.80),
(10, 'Diazepam 5mg', 6.75),
(11, 'Guantes de látex (par)', 1.20),
(12, 'Venda elástica 5cm x 4.5m', 3.75),
(13, 'Mascarilla quirúrgica', 0.50),
(14, 'Gasas estériles (paquete de 10)', 5.99),
(15, 'Jeringa de 5ml', 1.80),
(16, 'Agujas para inyección (paquete de 100)', 7.50),
(17, 'Alcohol isopropílico 70% (500ml)', 4.25),
(18, 'Termómetro clínico', 9.99),
(19, 'Bata médica desechable', 8.50),
(20, 'Esparadrapo hipoalergénico', 2.25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `idServicio` int(4) NOT NULL,
  `nombreServicio` varchar(100) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `medico_id` int(3) NOT NULL,
  `paciente_id` int(4) NOT NULL,
  `consultamedica_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`idServicio`, `nombreServicio`, `descripcion`, `medico_id`, `paciente_id`, `consultamedica_id`) VALUES
(7, 'Servicio Traslado', 'Traslado al hospital', 1, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(4) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `nombreUsuario` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nombreRol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellido`, `nombreUsuario`, `password`, `nombreRol`) VALUES
(1, 'Luis', 'Bedoya', 'luisb', 'clave123', 'Administrador'),
(3, 'Domenica', 'Ortiz', 'domenicao', 'clave12345', 'Medico'),
(8, 'Fiorella', 'Achi', 'fiorelaa', 'clave1234', 'Cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consulta_medica`
--
ALTER TABLE `consulta_medica`
  ADD PRIMARY KEY (`idConsulta`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`idPaciente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`idServicio`),
  ADD KEY `medico_id` (`medico_id`),
  ADD KEY `paciente_id` (`paciente_id`),
  ADD KEY `consultamedica_id` (`consultamedica_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consulta_medica`
--
ALTER TABLE `consulta_medica`
  MODIFY `idConsulta` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `idPaciente` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `idServicio` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`medico_id`) REFERENCES `medicos` (`ID`),
  ADD CONSTRAINT `servicios_ibfk_2` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`idPaciente`),
  ADD CONSTRAINT `servicios_ibfk_3` FOREIGN KEY (`consultamedica_id`) REFERENCES `consulta_medica` (`idConsulta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
