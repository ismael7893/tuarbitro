/*
SQLyog Enterprise v12.09 (64 bit)
MySQL - 10.4.11-MariaDB : Database - tuarbitro
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tuarbitro` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `tuarbitro`;

/*Table structure for table `campeonato_seguimiento` */

DROP TABLE IF EXISTS `campeonato_seguimiento`;

CREATE TABLE `campeonato_seguimiento` (
  `id_user` int(11) NOT NULL,
  `campeonato` int(11) NOT NULL,
  UNIQUE KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `campeonato_seguimiento` */

/*Table structure for table `campeonatos` */

DROP TABLE IF EXISTS `campeonatos`;

CREATE TABLE `campeonatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_by` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `estadio` varchar(15) NOT NULL,
  `organization` varchar(20) NOT NULL,
  `seguidores` int(11) NOT NULL,
  `description` varchar(150) NOT NULL,
  `f_inicio` varchar(20) DEFAULT NULL,
  `f_fin` varchar(20) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `foto_perfil` varchar(100) DEFAULT NULL,
  `ubicacion` varchar(250) DEFAULT NULL,
  `estado` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `campeonatos` */

insert  into `campeonatos`(`id`,`create_by`,`nombre`,`estadio`,`organization`,`seguidores`,`description`,`f_inicio`,`f_fin`,`logo`,`foto_perfil`,`ubicacion`,`estado`) values (3,'1','Default nombre','Default estadio','Default organizacion',0,'Default descripcion','2020-01-31','2020-01-31','2020-01-31','default.png','Default ubicacion','4');

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campeonato` int(11) NOT NULL,
  `NAME` varchar(15) NOT NULL,
  `f_inicio` varchar(20) DEFAULT NULL,
  `f_fin` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `categorias` */

insert  into `categorias`(`id`,`campeonato`,`NAME`,`f_inicio`,`f_fin`) values (1,1,'Categoria A','2019-10-05','2019-10-09');
insert  into `categorias`(`id`,`campeonato`,`NAME`,`f_inicio`,`f_fin`) values (2,1,'Categoria B','2019-10-10','2019-10-15');

/*Table structure for table `comments_campeonatos` */

DROP TABLE IF EXISTS `comments_campeonatos`;

CREATE TABLE `comments_campeonatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campeonato` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comentario` varchar(250) NOT NULL,
  `fecha` varchar(20) DEFAULT NULL,
  `hora` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `comments_campeonatos` */

insert  into `comments_campeonatos`(`id`,`campeonato`,`parent`,`id_user`,`comentario`,`fecha`,`hora`) values (1,1,0,0,'comentario de user1','2019-10-05','15:00');
insert  into `comments_campeonatos`(`id`,`campeonato`,`parent`,`id_user`,`comentario`,`fecha`,`hora`) values (2,1,1,0,'comentario dirigido a user1','2019-10-09','15:05');
insert  into `comments_campeonatos`(`id`,`campeonato`,`parent`,`id_user`,`comentario`,`fecha`,`hora`) values (3,1,0,0,'comentario de user2','2019-10-15','15:10');

/*Table structure for table `comments_partidos` */

DROP TABLE IF EXISTS `comments_partidos`;

CREATE TABLE `comments_partidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partido` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comentario` varchar(250) NOT NULL,
  `fecha` varchar(20) DEFAULT NULL,
  `hora` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `comments_partidos` */

insert  into `comments_partidos`(`id`,`partido`,`parent`,`id_user`,`comentario`,`fecha`,`hora`) values (1,1,0,0,'comentario de user1','2019-10-05','15:00');
insert  into `comments_partidos`(`id`,`partido`,`parent`,`id_user`,`comentario`,`fecha`,`hora`) values (2,1,1,0,'comentario dirigido a user1','2019-10-09','15:05');
insert  into `comments_partidos`(`id`,`partido`,`parent`,`id_user`,`comentario`,`fecha`,`hora`) values (3,1,0,0,'comentario de user2','2019-10-15','15:10');

/*Table structure for table `contacto` */

DROP TABLE IF EXISTS `contacto`;

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campeonato` int(11) NOT NULL,
  `pnumber` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `contacto` */

insert  into `contacto`(`id`,`campeonato`,`pnumber`) values (1,1,'4123132132');
insert  into `contacto`(`id`,`campeonato`,`pnumber`) values (2,1,'123133132');

/*Table structure for table `cuenta` */

DROP TABLE IF EXISTS `cuenta`;

CREATE TABLE `cuenta` (
  `id` varchar(15) NOT NULL,
  `username` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `role` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `cuenta` */

insert  into `cuenta`(`id`,`username`,`PASSWORD`,`role`) values ('1','user1','123','4');
insert  into `cuenta`(`id`,`username`,`PASSWORD`,`role`) values ('2','user2','123','4');

/*Table structure for table `equipos` */

DROP TABLE IF EXISTS `equipos`;

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `tecnico` varchar(30) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `create_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

/*Data for the table `equipos` */

insert  into `equipos`(`id`,`name`,`tecnico`,`imagen`,`create_by`) values (25,'equipo 1','tecnico del equipo 1','imgperfil.jpg',1);
insert  into `equipos`(`id`,`name`,`tecnico`,`imagen`,`create_by`) values (26,'equipo 2','tecnico del equipo 1','imgperfil.jpg',1);
insert  into `equipos`(`id`,`name`,`tecnico`,`imagen`,`create_by`) values (27,'equipo 3','tecnico del equipo 2','imgperfil2.jpg',1);
insert  into `equipos`(`id`,`name`,`tecnico`,`imagen`,`create_by`) values (28,'equipo 4','tecnico del equipo 3','imgperfil3.jpg',1);
insert  into `equipos`(`id`,`name`,`tecnico`,`imagen`,`create_by`) values (29,'equipo 5','tecnico del equipo 5','imgperfil5.jpg',1);
insert  into `equipos`(`id`,`name`,`tecnico`,`imagen`,`create_by`) values (30,'equipo 6','tecnico del equipo 6','imgperfil6.jpg',1);
insert  into `equipos`(`id`,`name`,`tecnico`,`imagen`,`create_by`) values (31,'equipo 7','tecnico del equipo 5','imgperfil5.jpg',1);
insert  into `equipos`(`id`,`name`,`tecnico`,`imagen`,`create_by`) values (32,'equipo 8','tecnico del equipo 5','imgperfil5.jpg',1);
insert  into `equipos`(`id`,`name`,`tecnico`,`imagen`,`create_by`) values (33,'equipo 9','tecnico del equipo 5','imgperfil5.jpg',1);
insert  into `equipos`(`id`,`name`,`tecnico`,`imagen`,`create_by`) values (34,'equipo 10','tecnico del equipo 5','imgperfil5.jpg',1);
insert  into `equipos`(`id`,`name`,`tecnico`,`imagen`,`create_by`) values (35,'equipo 11','tecnico del equipo 5','imgperfil5.jpg',1);

/*Table structure for table `estados` */

DROP TABLE IF EXISTS `estados`;

CREATE TABLE `estados` (
  `id` char(1) NOT NULL,
  `title` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `estados` */

insert  into `estados`(`id`,`title`) values ('1','ACTIVO');
insert  into `estados`(`id`,`title`) values ('2','PENDIENTE');
insert  into `estados`(`id`,`title`) values ('3','SUSPENDIDO');
insert  into `estados`(`id`,`title`) values ('4','INACTIVO');

/*Table structure for table `jugadores` */

DROP TABLE IF EXISTS `jugadores`;

CREATE TABLE `jugadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `equipo` int(11) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `numero` int(11) NOT NULL,
  `posicion` varchar(30) NOT NULL,
  `documento` varchar(15) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `f_nacimiento` varchar(50) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

/*Data for the table `jugadores` */

insert  into `jugadores`(`id`,`equipo`,`NAME`,`numero`,`posicion`,`documento`,`telefono`,`f_nacimiento`,`imagen`) values (1,1,'Diego11',10,'delantero','12345678','123456789','1970-01-01','12345678.jpg');
insert  into `jugadores`(`id`,`equipo`,`NAME`,`numero`,`posicion`,`documento`,`telefono`,`f_nacimiento`,`imagen`) values (2,1,'Diego12',9,'delantero2','12345671','123456789','1970-01-01','12345671.jpg');
insert  into `jugadores`(`id`,`equipo`,`NAME`,`numero`,`posicion`,`documento`,`telefono`,`f_nacimiento`,`imagen`) values (3,7,'Diego13',11,'delantero3','12345672','123456789','1970-01-01','12345672.jpg');
insert  into `jugadores`(`id`,`equipo`,`NAME`,`numero`,`posicion`,`documento`,`telefono`,`f_nacimiento`,`imagen`) values (4,7,'Diego14',12,'delantero4','12345673','123456789','1970-01-01','12345673.jpg');
insert  into `jugadores`(`id`,`equipo`,`NAME`,`numero`,`posicion`,`documento`,`telefono`,`f_nacimiento`,`imagen`) values (5,8,'Diego21',13,'delantero5','12345674','123456789','1970-01-01','12345674.jpg');
insert  into `jugadores`(`id`,`equipo`,`NAME`,`numero`,`posicion`,`documento`,`telefono`,`f_nacimiento`,`imagen`) values (6,8,'Diego22',14,'delantero6','12345675','123456789','1970-01-01','12345675.jpg');
insert  into `jugadores`(`id`,`equipo`,`NAME`,`numero`,`posicion`,`documento`,`telefono`,`f_nacimiento`,`imagen`) values (7,2,'Diego23',15,'delantero7','12345676','123456789','1970-01-01','12345676.jpg');
insert  into `jugadores`(`id`,`equipo`,`NAME`,`numero`,`posicion`,`documento`,`telefono`,`f_nacimiento`,`imagen`) values (8,2,'Diego24',16,'delantero8','12345677','123456789','1970-01-01','12345677.jpg');
insert  into `jugadores`(`id`,`equipo`,`NAME`,`numero`,`posicion`,`documento`,`telefono`,`f_nacimiento`,`imagen`) values (9,9,'Diego31',11,'delantero3','12345672','123456789','1970-01-01','12345672.jpg');
insert  into `jugadores`(`id`,`equipo`,`NAME`,`numero`,`posicion`,`documento`,`telefono`,`f_nacimiento`,`imagen`) values (10,9,'Diego32',12,'delantero4','12345673','123456789','1970-01-01','12345673.jpg');
insert  into `jugadores`(`id`,`equipo`,`NAME`,`numero`,`posicion`,`documento`,`telefono`,`f_nacimiento`,`imagen`) values (11,3,'Diego33',13,'delantero5','12345674','123456789','1970-01-01','12345674.jpg');
insert  into `jugadores`(`id`,`equipo`,`NAME`,`numero`,`posicion`,`documento`,`telefono`,`f_nacimiento`,`imagen`) values (12,3,'Diego34',14,'delantero6','12345675','123456789','1970-01-01','12345675.jpg');
insert  into `jugadores`(`id`,`equipo`,`NAME`,`numero`,`posicion`,`documento`,`telefono`,`f_nacimiento`,`imagen`) values (13,10,'Diego41',13,'delantero5','12345674','123456789','1970-01-01','12345674.jpg');
insert  into `jugadores`(`id`,`equipo`,`NAME`,`numero`,`posicion`,`documento`,`telefono`,`f_nacimiento`,`imagen`) values (14,10,'Diego42',14,'delantero6','12345675','123456789','1970-01-01','12345675.jpg');
insert  into `jugadores`(`id`,`equipo`,`NAME`,`numero`,`posicion`,`documento`,`telefono`,`f_nacimiento`,`imagen`) values (15,4,'Diego43',15,'delantero7','12345676','123456789','1970-01-01','12345676.jpg');
insert  into `jugadores`(`id`,`equipo`,`NAME`,`numero`,`posicion`,`documento`,`telefono`,`f_nacimiento`,`imagen`) values (16,4,'Diego44',16,'delantero8','12345677','123456789','1970-01-01','12345677.jpg');
insert  into `jugadores`(`id`,`equipo`,`NAME`,`numero`,`posicion`,`documento`,`telefono`,`f_nacimiento`,`imagen`) values (17,11,'Diego51',13,'delantero5','12345674','123456789','1970-01-01','12345674.jpg');
insert  into `jugadores`(`id`,`equipo`,`NAME`,`numero`,`posicion`,`documento`,`telefono`,`f_nacimiento`,`imagen`) values (18,11,'Diego52',14,'delantero6','12345675','123456789','1970-01-01','12345675.jpg');
insert  into `jugadores`(`id`,`equipo`,`NAME`,`numero`,`posicion`,`documento`,`telefono`,`f_nacimiento`,`imagen`) values (19,5,'Diego53',15,'delantero7','12345676','123456789','1970-01-01','12345676.jpg');
insert  into `jugadores`(`id`,`equipo`,`NAME`,`numero`,`posicion`,`documento`,`telefono`,`f_nacimiento`,`imagen`) values (20,5,'Diego54',16,'delantero8','12345677','123456789','1970-01-01','12345677.jpg');
insert  into `jugadores`(`id`,`equipo`,`NAME`,`numero`,`posicion`,`documento`,`telefono`,`f_nacimiento`,`imagen`) values (21,12,'Diego61',13,'delantero5','12345674','123456789','1970-01-01','12345674.jpg');
insert  into `jugadores`(`id`,`equipo`,`NAME`,`numero`,`posicion`,`documento`,`telefono`,`f_nacimiento`,`imagen`) values (22,12,'Diego62',14,'delantero6','12345675','123456789','1970-01-01','12345675.jpg');
insert  into `jugadores`(`id`,`equipo`,`NAME`,`numero`,`posicion`,`documento`,`telefono`,`f_nacimiento`,`imagen`) values (23,6,'Diego63',15,'delantero7','12345676','123456789','1970-01-01','12345676.jpg');
insert  into `jugadores`(`id`,`equipo`,`NAME`,`numero`,`posicion`,`documento`,`telefono`,`f_nacimiento`,`imagen`) values (24,6,'Diego64',16,'delantero8','12345677','123456789','1970-01-01','12345677.jpg');

/*Table structure for table `partidos` */

DROP TABLE IF EXISTS `partidos`;

CREATE TABLE `partidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campeonato` int(11) NOT NULL,
  `equipo1_id` varchar(20) DEFAULT NULL,
  `equipo2_id` varchar(20) DEFAULT NULL,
  `equipo1_goles` int(11) NOT NULL,
  `equipo2_goles` int(11) NOT NULL,
  `fecha` varchar(20) DEFAULT NULL,
  `hora` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

/*Data for the table `partidos` */

insert  into `partidos`(`id`,`campeonato`,`equipo1_id`,`equipo2_id`,`equipo1_goles`,`equipo2_goles`,`fecha`,`hora`) values (4,0,'equipo 7','equipo 8',0,0,'2020-01-31','12:58:23');
insert  into `partidos`(`id`,`campeonato`,`equipo1_id`,`equipo2_id`,`equipo1_goles`,`equipo2_goles`,`fecha`,`hora`) values (5,0,'equipo 1','equipo 2',0,0,'2020-01-31','12:58:23');
insert  into `partidos`(`id`,`campeonato`,`equipo1_id`,`equipo2_id`,`equipo1_goles`,`equipo2_goles`,`fecha`,`hora`) values (6,0,'equipo 6','equipo 3',0,0,'2020-01-31','12:58:23');
insert  into `partidos`(`id`,`campeonato`,`equipo1_id`,`equipo2_id`,`equipo1_goles`,`equipo2_goles`,`fecha`,`hora`) values (7,0,'equipo 4','equipo 10',0,0,'2020-01-31','12:58:23');
insert  into `partidos`(`id`,`campeonato`,`equipo1_id`,`equipo2_id`,`equipo1_goles`,`equipo2_goles`,`fecha`,`hora`) values (8,0,'equipo 5','equipo 11',0,0,'2020-01-31','12:58:23');
insert  into `partidos`(`id`,`campeonato`,`equipo1_id`,`equipo2_id`,`equipo1_goles`,`equipo2_goles`,`fecha`,`hora`) values (9,0,'equipo 9','',0,0,'2020-01-31','12:58:24');
insert  into `partidos`(`id`,`campeonato`,`equipo1_id`,`equipo2_id`,`equipo1_goles`,`equipo2_goles`,`fecha`,`hora`) values (10,0,'equipo 3','equipo 8',0,0,'2020-01-31','12:59:27');
insert  into `partidos`(`id`,`campeonato`,`equipo1_id`,`equipo2_id`,`equipo1_goles`,`equipo2_goles`,`fecha`,`hora`) values (11,0,'equipo 2','equipo 6',0,0,'2020-01-31','12:59:27');
insert  into `partidos`(`id`,`campeonato`,`equipo1_id`,`equipo2_id`,`equipo1_goles`,`equipo2_goles`,`fecha`,`hora`) values (12,0,'equipo 4','equipo 5',0,0,'2020-01-31','12:59:27');
insert  into `partidos`(`id`,`campeonato`,`equipo1_id`,`equipo2_id`,`equipo1_goles`,`equipo2_goles`,`fecha`,`hora`) values (13,0,'equipo 11','equipo 1',0,0,'2020-01-31','12:59:27');
insert  into `partidos`(`id`,`campeonato`,`equipo1_id`,`equipo2_id`,`equipo1_goles`,`equipo2_goles`,`fecha`,`hora`) values (14,0,'equipo 9','equipo 10',0,0,'2020-01-31','12:59:28');
insert  into `partidos`(`id`,`campeonato`,`equipo1_id`,`equipo2_id`,`equipo1_goles`,`equipo2_goles`,`fecha`,`hora`) values (15,0,'equipo 7','',0,0,'2020-01-31','12:59:28');
insert  into `partidos`(`id`,`campeonato`,`equipo1_id`,`equipo2_id`,`equipo1_goles`,`equipo2_goles`,`fecha`,`hora`) values (16,3,'equipo 9','equipo 4',0,0,'2020-01-31','01:00:49');
insert  into `partidos`(`id`,`campeonato`,`equipo1_id`,`equipo2_id`,`equipo1_goles`,`equipo2_goles`,`fecha`,`hora`) values (17,3,'equipo 2','equipo 3',0,0,'2020-01-31','01:00:49');
insert  into `partidos`(`id`,`campeonato`,`equipo1_id`,`equipo2_id`,`equipo1_goles`,`equipo2_goles`,`fecha`,`hora`) values (18,3,'equipo 6','equipo 8',0,0,'2020-01-31','01:00:50');
insert  into `partidos`(`id`,`campeonato`,`equipo1_id`,`equipo2_id`,`equipo1_goles`,`equipo2_goles`,`fecha`,`hora`) values (19,3,'equipo 10','equipo 1',0,0,'2020-01-31','01:00:50');
insert  into `partidos`(`id`,`campeonato`,`equipo1_id`,`equipo2_id`,`equipo1_goles`,`equipo2_goles`,`fecha`,`hora`) values (20,3,'equipo 5','equipo 7',0,0,'2020-01-31','01:00:50');
insert  into `partidos`(`id`,`campeonato`,`equipo1_id`,`equipo2_id`,`equipo1_goles`,`equipo2_goles`,`fecha`,`hora`) values (21,3,'equipo 11','',0,0,'2020-01-31','01:00:50');

/*Table structure for table `persona` */

DROP TABLE IF EXISTS `persona`;

CREATE TABLE `persona` (
  `id` varchar(15) NOT NULL,
  `NAME` varchar(15) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `persona` */

insert  into `persona`(`id`,`NAME`,`email`) values ('user1','sam','sam@hotmail.com');
insert  into `persona`(`id`,`NAME`,`email`) values ('user2','yonathan','jhon@hotmail.com');

/*Table structure for table `premios` */

DROP TABLE IF EXISTS `premios`;

CREATE TABLE `premios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campeonato` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `premios` */

insert  into `premios`(`id`,`campeonato`,`title`,`description`) values (1,1,'1 puesto','Cup');
insert  into `premios`(`id`,`campeonato`,`title`,`description`) values (2,1,'2 puesto','Cup 2');
insert  into `premios`(`id`,`campeonato`,`title`,`description`) values (3,1,'3 puesto','Cup 3');
insert  into `premios`(`id`,`campeonato`,`title`,`description`) values (4,1,'4 puesto','Silver Medal');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` char(1) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `roles` */

insert  into `roles`(`id`,`title`,`description`) values ('1','SUPERADMIN','Puede crear y eliminar usuarios con el rol de SUPERADMIN y tener control de ADMIN, SUBADMIN y USER');
insert  into `roles`(`id`,`title`,`description`) values ('2','ADMIN','Puede crear y eliminar usuarios con el rol de ADMIN y tener control de SUBADMIN y USER');
insert  into `roles`(`id`,`title`,`description`) values ('3','SUBADMIN','Tiene control de USER');
insert  into `roles`(`id`,`title`,`description`) values ('4','USER','Usuario comun');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
