-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 03:36 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uic`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_noticia` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(10) NOT NULL,
  `mensaje` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_usuario`, `id_noticia`, `descripcion`, `fecha`, `estado`, `mensaje`) VALUES
(21, 2, 1, 'Endfsd fsdalsd sfalsdfañlsdfj kasfsalskdjief fslaskdjfisd dasdfi fasdlf fsdfasdlf asdlfj dasldfji dfsie fnlasdf liislasjdflasf alfsdifjeijg faslienghds dfnslasdjfn asdfliasdn adfnlasi', '2020-10-03', 'false', 'false'),
(22, 2, 5, 'dnlaskdf alisdfjsaijdfj aldfjailsdjfij asdifjalsd dasdlif asdfisjidf asdlfj fadsfs asdfadfj a disdjf asldfjalsdi asdfjalsdifj aidfjalidsjf adifd aa s dssfisfjalsfjdkfiefefnsl alsdfnalsdkf akdfaldfk asdfaldg', '2020-09-28', 'false', 'false'),
(24, 52, 1, 'lskjdalsdjfla;sd adlsjalkdjgl sdlfgjs;ldfkjg sdlfgjsldfkjg; sfdkjg; lskfjdgkl;sdfkjgsdfjl; slfdkgjlskdfjgjaf shfkjasdfkjh adjfhalsdhgahgdijifjg sghhsdhfkh skfhglsdfglsdfgkjsdfg sghsdfjghslfgh sh lfghlsdfjglksdj flksjglk fjg ldfks dlg flds fkdjgl slkfj kls dkgjls slkfjglk slfkg fks lkjglsjgifgjifsjlidrgh lfgdfsjdirg ilrslgkfgjirg islfkjgierg glsidrjg lsirjgirgj slrigjlsirigsdliirgls ilsdjglrijgil sirjglisdrh ilsdjrgi jrigsljgihgis rislg islgiljsrl i slihuhawdl iefdiajidsf idaldif adjfif alfjfiogidsg isgsdhgdfughrg slfglsidrg isfgjs fighsfglsf isglfigjlsi gisfglishfglisjfglisji sifjglsifjglisj lsifjgslfigisg isdffgls', '2020-09-30', 'true', 'false'),
(25, 1, 1, 'dafadfadfadfdfadfadfdafff adfadfadfdadf       adfasdfadfdfa adfafadf adfadfadfad', '2020-10-02', 'false', 'false'),
(26, 2, 1, 'sdfasdfsdafsdfsadf asdfsdafasdfasdfsdafasf afdsdfsdfadf f adsfsdfsdafd adfsdfadf adsfds adfa df adsf adfsdfadfsdafds asdfasdfsdaf adfaf', '2020-10-05', 'true', 'false'),
(27, 2, 1, 'dasdaddsdsdd asfsdfasdfsafddsfsadfadf adfasfdasfdfafdfdfsafdfadfdfadf afdfasdfadf', '2020-10-03', 'false', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `cursos`
--

CREATE TABLE `cursos` (
  `tema` varchar(25) NOT NULL,
  `profesor` varchar(20) NOT NULL,
  `matricula` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `id_curso` int(11) NOT NULL,
  `frecuencia` varchar(25) NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cursos`
--

INSERT INTO `cursos` (`tema`, `profesor`, `matricula`, `descripcion`, `id_curso`, `frecuencia`, `hora_entrada`, `hora_salida`) VALUES
('Python', 'Torres Lopez ', 25, 'Curso que tratara los aspectos fundamentales del lenguaje de turno', 4, 'Lunes,martes,miercoles', '08:00:00', '10:40:00'),
('PHP 7', 'Lucas Perez', 18, 'Curso que le permitira saber sobre cuestones fundamentales del lenguaje', 5, 'Lunes,martes,miercoles', '08:00:00', '10:40:00'),
('Expresiones Regulares', 'Lucas Estrada', 15, 'asdhasdjkhaskdhaskjdh asjkdhaskjdhajkhdahsjkd aksjhdajkdhkadshdkajhdd', 8, 'lunes,martes,miercoles', '08:00:00', '10:40:00'),
('Git Hub', 'Torres Lopez ', 15, 'dasdasd SDasdASDASD DSADASDSDAD', 9, 'lunes,martes,miercoles', '09:00:00', '15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_culminacion` date NOT NULL,
  `contacto` varchar(20) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`id_evento`, `nombre`, `lugar`, `fecha_inicio`, `fecha_culminacion`, `contacto`, `descripcion`) VALUES
(8, 'Las TIC en Cuba', 'UCI', '2021-05-03', '2021-05-10', 'dasdasd@dasdds.cu', 'Evento cientifico de gran repercusion para las tics en cub'),
(9, 'La ciencia Cubana', 'UCI', '2020-11-08', '2020-11-18', 'tic@contest.cu', 'ssadadasda asdSADASDASD ADASDASDSD SADASD');

-- --------------------------------------------------------

--
-- Table structure for table `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `autor` varchar(20) NOT NULL,
  `pie_foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `descripcion`, `imagen`, `fecha`, `titulo`, `autor`, `pie_foto`) VALUES
(1, ' El fichaje costo 60 millones de euros,fue fantastico la aficion pudeods askdnasjn jkbaldbfks bajgsdjkbakjd ngjkadsdAS.FASDF NSJNF JKASBGJK DBGKJS DBFKJSBD KJGBKAJ;BSKDJBG;SDJGBSD GKLDNG.FDSJBGKAJSBD GAJDNGALSK DNGLKSN GKLSDNALK SDNGLKSDNGAL DNKGLS NDGKLN.DFNSDJ FNJSD JFNSLD NFDF,FNorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis, mollitia? Laudantium consequatur tempore rerum recusandae officiis assumenda nostrum itaque, dolorum quibusdam doloribus sapiente nihil explicabo numquam esse deserunt non illum. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis, mollitia? Laudantium consequatur tempore rerum recusandae officiis assumenda nostrum itaque, dolorum quibusdam doloribus sapiente nihil explicabo numquam esse deserunt non illum. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis, mollitia? Laudantium consequatur tempore rerum recusandae officiis assumenda nostrum itaque, dolorum quibusdam doloribus sapiente nihil explicabo numquam esse deserunt non illum.', 'noticia1.png', '2017-09-22', 'El Manchester united compra a Bruno Fernandez', 'Milton Dias Canter', 'Bruno Fernandez en Old Traford'),
(5, 'jkbaldbfks bajgsdjkbakjd ngjkadsdAS.FASDF NSJNF JKASBGJK DBGKJS DBFKJSBD KJGBKAJ;BSKDJBG;SDJGBSD GKLDNG.FDSJBGKAJSBD GAJDNGALSK DNGLKSN GKLSDNALK SDNGLKSDNGAL DNKGLS NDGKLN.DFNSDJ FNJSD JFNSLD NFDF,FNorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis, mollitia? Laudantium consequatur tempore rerum recusandae officiis assumenda nostrum itaque, dolorum quibusdam doloribus sapiente nihil explicabo numquam esse deserunt non illum. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis, mollitia? Laudantium consequatur tempore rerum recusandae officiis assumenda nostrum itaque, dolorum quibusdam doloribus sapiente nihil explicabo numquam esse deserunt non illum. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis, mollitia? Laudantium consequatur tempore rerum recusandae officiis assumenda nostrum itaque, dolorum quibusdam doloribus sapiente nihil explicabo numquam esse deserunt non illum.', '20200303_182804.jpg', '2020-09-28', 'El capitolio ', 'Julio Acanda', ' Capitol Hill');

-- --------------------------------------------------------

--
-- Table structure for table `quejas`
--

CREATE TABLE `quejas` (
  `id_queja` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` varchar(10) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quejas`
--

INSERT INTO `quejas` (`id_queja`, `id_usuario`, `descripcion`, `estado`, `fecha`) VALUES
(5, 52, 'hkjhakhsd ajfhaksdhfjshal asdjfhaksdjhf asdjfh asjdfhkasd asdfhasudfh asdfhaskd asdfha skdf asdjfh asldf asdjfhasdf adsfhusdhf  aksudfhausdhf asdfu asdhfusahdufh adsufh asdhfuasdh adufhahsdfuh audsfh akdusfhausdfh audfhasudf asudfhsasudhf audfhaksauhef audfhehfakd ausdfhefha uadhf ehfka udfhuahuefh akudfh fahskfusehf fkaehfasufh auhfus8fha kufhaehf akefh8ehf aefh8fh a8efh8    e8fa8fh asfhaols8ef ase8fh ae8fh a8efh a8efh a8efh oaef a8efh a8efh aefh aosef a;oefh asf asefha f kdasf adkf asfasefh84hf alsd fh as f es aifiaf dasdf ;a ai;f hdhasd ha fsehf aif heaef', 'true', '2020-10-01'),
(9, 2, 'hafsduhfusadfhasfhladfj adshfliasdhfhasldiflsf asdhflsdahflahfld asdihfliashdfilahdlfh adifhalisfhlasldfdf', 'false', '2020-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `ci` bigint(11) NOT NULL,
  `contrasenna` varchar(60) NOT NULL,
  `direccion` text NOT NULL,
  `correo` varchar(20) NOT NULL,
  `sexo` varchar(11) NOT NULL,
  `centro` varchar(11) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `nombre`, `ci`, `contrasenna`, `direccion`, `correo`, `sexo`, `centro`, `telefono`) VALUES
(1, 'ADMINISTRADOR', 'Joaquin Carlos Fernande', 11111111111, '$2y$12$C9aJYro2zLr6v3WD1b46re3utuv0VK2lQamF.zAYzKEwrVg2iFzFW', 'La Habana , Plaza de la Revolucion , Vedado , calle 23 entre 12 y 10', 'joaco@developer.com', '1', 'uic', 5567839),
(2, 'Dairon', 'Dairon Isidro Rodriguez del Po', 98051508500, '$2y$12$y5bm0XpFlbOr5J03Ix331OADFh289P1xIBnO8QD8W3QoZvwrlLnay', 'La Habana,Arroyo Naranjo,Vibora Park, Mantua entre Lourdes y Alegria', 'daironirdp@uci.cu', '1', 'UCI', 34567856),
(52, 'Prueba', 'Prueba', 97897897954, '$2y$12$IvpwD8qhq.78fWc8j0TQ7uH5i4NGSCkPfHfo5BQeTXbnUg73Lde0q', 'La Habana , Plaza de la Revolucion , Vedado , calle 23 entre 12 y 10', 'robert@developer.co', '1', 'UCI', 5567839);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_cursos`
--

CREATE TABLE `usuarios_cursos` (
  `id_curso` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios_cursos`
--

INSERT INTO `usuarios_cursos` (`id_curso`, `id_usuario`) VALUES
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_eventos`
--

CREATE TABLE `usuarios_eventos` (
  `id_evento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tema_trabajo` varchar(25) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_usuario` (`id_usuario`) USING BTREE,
  ADD KEY `id_noticias` (`id_noticia`) USING BTREE;

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indexes for table `quejas`
--
ALTER TABLE `quejas`
  ADD PRIMARY KEY (`id_queja`),
  ADD KEY `id_usuario` (`id_usuario`) USING BTREE;

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `CI` (`ci`) USING BTREE;

--
-- Indexes for table `usuarios_cursos`
--
ALTER TABLE `usuarios_cursos`
  ADD PRIMARY KEY (`id_curso`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `usuarios_eventos`
--
ALTER TABLE `usuarios_eventos`
  ADD PRIMARY KEY (`id_evento`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `quejas`
--
ALTER TABLE `quejas`
  MODIFY `id_queja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_noticia`) REFERENCES `noticias` (`id_noticia`);

--
-- Constraints for table `quejas`
--
ALTER TABLE `quejas`
  ADD CONSTRAINT `quejas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Constraints for table `usuarios_cursos`
--
ALTER TABLE `usuarios_cursos`
  ADD CONSTRAINT `usuarios_cursos_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`),
  ADD CONSTRAINT `usuarios_cursos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Constraints for table `usuarios_eventos`
--
ALTER TABLE `usuarios_eventos`
  ADD CONSTRAINT `usuarios_eventos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `usuarios_eventos_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
