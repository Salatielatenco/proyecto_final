CREATE DATABASE IF NOT EXISTS `gestor` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `gestor`;

CREATE TABLE IF NOT EXISTS `usuarios` (
`id_usuario` int(11) NOT NULL AUTO_INCREMENT,
`nombre` varchar(50) NOT NULL DEFAULT ,
`fechaNacimiento` date(50) NOT NULL DEFAULT ,
`email` varchar(50) NOT NULL DEFAULT ,
`usuario` varchar(50) NOT NULL DEFAULT ,
`password` Text  NULL,
`insert` DateTime NOT NULL DEFAULT now(),
PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;