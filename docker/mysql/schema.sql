/*
SQLyog Trial v13.1.5  (64 bit)
MySQL - 5.6.10-log : Database - db_apt_feria4c_dev
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mdb_apt_fairs` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `mdb_apt_fairs`;

/*Table structure for table `company` */

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ruc` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trade_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `business_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Educacion',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `company` */

insert  into `company`(`id`,`ruc`,`trade_name`,`business_name`,`slug`,`image`,`state`,`latitude`,`longitude`,`category`) values
(1,'20552041012','Talent 360','Empresa 1','talent-360','https://cde.dev.4a.aptitus.com/logos/Company-5963-7d3f4f926812cd1c8e57ed46d86ddbaf_png_90x90_q80.png',1,NULL,NULL,'Empleo'),
(2,'20414989277','ATENTO ','Teleatento Del Peru ','atento','https://dev.cde.expo.aptitus.g3c.pe/logo/fair-6be047c2dd655b06e98e8f64998934e3.jpg',1,NULL,NULL,'Empleo'),
(3,'20382984537','Adecco','Adecco Peru S A','adecco','https://dev.cde.expo.aptitus.g3c.pe/logo/fair-3d8f03e61d05e023b0686ae52615a0bd.png',1,NULL,NULL,'Empleo'),
(4,'20512973931','C M Y V A L','Cm & Val Servicios SRL','c-m-y-v-a-l','https://dev.cde.expo.aptitus.g3c.pe/logo/fair-0018c133c39c566f287081259f0db09a.jpeg',1,NULL,NULL,'Empleo'),
(5,'20517905454','Cencosud Perú','CENCOSUD PERU SA','cencosud-peru','https://dev.cde.expo.aptitus.g3c.pe/logo/fair-f0e6b731b436e95ec869e0216f4070c7.png',1,-12.063466,-77.025287,'Empleo'),
(6,'20514020907','CENTRO COMERCIAL PLAZA NORTE','CENTRO COMERCIAL PLAZA NORTE SAC','centro-comercial-plaza-norte','https://dev.cde.expo.aptitus.g3c.pe/logo/fair-146c8c185f22c393b42bf518f7866b0c.jpg',1,NULL,NULL,'Empleo'),
(7,'20544304934','Grupo Educa','Grupo Educa s.a.c','grupo-educa','https://dev4c.cde.aptitus.g3c.pe/logos/Company-4290-facafed571af58e03998a80fb5d6a51d_jpg_90x90_q80.jpg',1,NULL,NULL,'Empleo'),
(8,'20553098832','SHINRA','Shinra SAC','shinra','https://dev4c.cde.aptitus.g3c.pe/logos/Company-9992-60a8727cdaa401a011e610146c7f7035_png_90x90_q80.png',1,NULL,NULL,'Empleo'),
(9,'20462509236','UTP','Universidad Tecnologica Del Peru SAC ','utp','https://dev4c.cde.aptitus.g3c.pe/logos/Company-7481-76e30596ed5308474a969e238eb7a4e2_jpg_90x90_q80.jpg',1,NULL,NULL,'Empleo'),
(10,'20422293699','G4S Peru','G4S Peru SAC','g4s-peru','https://dev.cde.expo.aptitus.g3c.pe/logo/fair-d2e3027df7130564b532939e5dabc973.jpg',1,NULL,NULL,'Empleo'),
(11,'20100070970','SUPERMERCADOS PERUANOS','Supermercados Peruanos SA ','supermercados-peruanos','https://dev.cde.expo.aptitus.g3c.pe/logo/fair-f608128bb3596a73b283d46615a8b17c.png',1,NULL,NULL,'Empleo'),
(12,'20329545459','Manpower Perú ','Manpower Perú ','manpower-peru','https://dev4c.cde.aptitus.g3c.pe/logos/Company-5139-d537560dad50d0b47793a46d43ebe949_jpg_90x90_q80.jpg',1,NULL,NULL,'Empleo'),
(13,'20512752501','Tawa Perú','Tawa Perú S.A.C.','tawa-peru','https://dev4c.cde.aptitus.g3c.pe/logos/Company-1762-219c80331c0b315b4b0c36b5b07c4d54_jpg_90x90_q80.jpg',1,NULL,NULL,'Empleo'),
(14,'20522088073','Dupree','DUPREE VENTAS DIRECTA S.R.L.','dupree','https://dev4c.cde.aptitus.g3c.pe/logos/Company-6180-a09c66e30d08e1235571c411c72751bd_jpg_90x90_q80.jpg',1,NULL,NULL,'Empleo'),
(15,'20513112727','Comdata Group','Digitex Peru SAC','comdata-group','https://dev4c.cde.aptitus.g3c.pe/logos/Company-1039-65777fa54095e9f93e7ef4f929ba3b3f_png_90x90_q80.png',1,NULL,NULL,'Empleo'),
(16,'20414766308','Sodexo','Sodexo Peru SAC ','sodexo','https://dev4c.cde.aptitus.g3c.pe/logos/Company-3193-48c8db225d9030138a73173a580c13bb_jpg_90x90_q80.jpg',1,NULL,NULL,'Empleo'),
(17,'20523621212','LAMSAC','LINEA AMARILLA S.A.C.','lamsac','https://dev4c.cde.aptitus.g3c.pe/logos/Company-9145-494b5d32c3482166fe196f594df069a3_png_90x90_q80.png',1,NULL,NULL,'Empleo'),
(18,'20515802658','Aenor Perú Sac','Aenor Peru Sac','aenor-peru-sac','https://dev4c.cde.aptitus.g3c.pe/logos/Company-7376-a2c0fa5fa766df86a71966e39e6a59c5_png_90x90_q80.png',1,NULL,NULL,'Empleo'),
(19,'20601665817','Calling Peru s.a.c','calling peru sociedad anonima cerrada','calling-peru-s-a-c','https://dev4c.cde.aptitus.g3c.pe/logos/Company-8253-a45dcb0129a9248e587e19a2276dd999_jpg_90x90_q80.jpg',1,NULL,NULL,'Empleo'),
(20,'20337996834','FINANCIERA TFC','FINANCIERA TFC SA','financiera-tfc','https://dev4c.cde.aptitus.g3c.pe/logos/Company-5491-f68caa40eef8ca5d2cdf2b53a92c9cbe_jpg_90x90_q80.jpg',1,NULL,NULL,'Empleo'),
(21,'20143229816','Grupo El Comercio','Empresa Editora El Comercio SA ','grupo-el-comercio','https://dev.cde.expo.aptitus.g3c.pe/logo/fair-8a6a3081054e4cc9ab496c261cbbf172.jpeg',1,NULL,NULL,'Empleo'),
(22,'20600106636','gntelcom','gntelcom','gntelcom','https://dev4c.cds.aptitus.g3c.pe/images/icon-empresa-blank.png?v=201607131447',1,NULL,NULL,'Empleo'),
(23,'20509252000','PLANET GAME SAC','MILLENNIUM GAME SAC.','planet-game-sac','https://dev4c.cde.aptitus.g3c.pe/logos/Company-4267-c59beb2613b17f1bb4aeaf72b9c31ec7_jpg_90x90_q80.jpg',1,NULL,NULL,'Empleo'),
(24,'20504212280','Econoavisos Sac','Econoavisos Sac','econoavisos-sac','https://dev4c.cds.aptitus.g3c.pe/images/icon-empresa-blank.png?v=201607131447',1,NULL,NULL,'Empleo'),
(25,'20464993879','Avisos Destacados','Avisos Destacados','avisos-destacados','https://dev.cde.expo.aptitus.g3c.pe/logo/fair-4ab7e64533fd12e55839ac12442cb4d4.png',1,NULL,NULL,'Empleo'),
(29,'20451649761','UNIVERSIDAD JAIRITO PULPIN',' JAIRITO PULPIN SAC','universidad-jairito-pulpin','https://dev.cde.expo.aptitus.g3c.pe/logo/fair-bd769b6390dd80d99deccb77a957d7ab.jpg',1,NULL,NULL,'Educacion'),
(30,'20481864080','Jairo','CUC S.A.C.','jairo','https://dev.cde.expo.aptitus.g3c.pe/logo/fair-e83278724bf9b11ebaf219e43d5c0c11.jpg',1,NULL,NULL,'Educacion'),
(31,'20465826160','CENTRO DE CAPACITACIÓN Y EDUCACIÓN CONTINUA  FIDE','FORMACIÓN INTEGRAL Y DESARROLLO EMPRESARIAL SAC','centro-de-capacitacion-y-educacion-continua-fide','https://dev1a.cde.maseducacion.g3c.pe/imagenes/institucion/institucion-da6be257ff93c31d86a92f709501311a.jpeg',1,NULL,NULL,'Educacion'),
(32,'20154644530','Grupo El Comercio','Grupo El Comercio','grupo-el-comercio','https://dev.cde.expo.aptitus.g3c.pe/logo/fair-261285c31120b84e2f8e03c957d229d2.jpeg',1,NULL,NULL,'Empleo'),
(37,'10458164326','phpauldj','Paul Taboada','phpauldj','https://dev.cde.expo.aptitus.g3c.pe/logo/fair-3462c4e11ded592db013adafb5e3b7cb.jpg',1,-12.065569,-77.03611,'Empleo'),
(38,'20106458830','CEOGNE TOMAS ALVA EDISON','CEOGNE TOMAS ALVA EDISON','ceogne-tomas-alva-edison','https://dev4c.cde.aptitus.g3c.pe/logos/Company-2161-b800236255d0b11fa7555aa110388527_jpg_90x90_q80.jpg',1,-11.9972861,-77.0571134,'Empleo'),
(40,'20445878783','Paul Yanapay Empresa','Paul Yanapay Enterprise','paul-yanapay-empresa','https://dev4c.cde.aptitus.g3c.pe/logos/Company-1933-529ec3e8d4efb85795327f33dce61e59_jpg_90x90_q80.jpg',1,-12.0963327,-77.0302661,'Empleo'),
(42,'20451212452','Paul Yanapay 2','Paul Yanapay Comerce 2','paul-yanapay-2','https://dev.cde.expo.aptitus.g3c.pe/logo/fair-2b7ccd6d6a552a12baf60e0e137d7111.jpg',1,-12.0963327,-77.0302661,'Empleo'),
(43,'20444193191','Universidad del Pacífico',' Universidad del Pacífico','universidad-del-pacifico','https://dev1a.cde.maseducacion.g3c.pe/imagenes/institucion/institucion-962acb8d343fb030e8cef0cf884d727f.png',1,NULL,NULL,'Educacion'),
(44,'20107798049','Universidad de Lima','Universidad de Lima ','universidad-de-lima','https://dev1a.cde.maseducacion.g3c.pe/imagenes/institucion/institucion-31163aaa8c7dae92db723c2532aeccc6.jpeg',1,NULL,NULL,'Educacion');

/*Table structure for table `company_fair` */

DROP TABLE IF EXISTS `company_fair`;

CREATE TABLE `company_fair` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `fair_id` int(11) NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `industry_id` int(11) NOT NULL,
  `industry_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `mapping` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mapping_tablet` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `offer_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3F450CC4979B1AD6` (`company_id`),
  KEY `IDX_3F450CC47AB61B57` (`fair_id`),
  CONSTRAINT `FK_3F450CC47AB61B57` FOREIGN KEY (`fair_id`) REFERENCES `fair` (`id`),
  CONSTRAINT `FK_3F450CC4979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `company_fair` */

insert  into `company_fair`(`id`,`company_id`,`fair_id`,`category`,`industry_id`,`industry_name`,`state`,`mapping`,`mapping_tablet`,`offer_type`) values
(1,1,1,'Empleo',24,'Tecnología y sistemas.',1,'','',NULL),
(2,2,1,'Empleo',26,'Telecomunicaciones',1,'859,372,962,388,962,429,860,416','859,372,962,388,962,429,860,416',NULL),
(3,3,1,'Empleo',5,'Industrial',1,'','',NULL),
(4,4,1,'Empleo',11,'Comunicaciones',1,'','',NULL),
(5,5,1,'Empleo',27,'Retail',1,'595,52,731,117,730,170,592,107','164,62,295,126,294,180,162,121',NULL),
(6,6,1,'Empleo',29,'Consumo Masivo',1,'','',NULL),
(7,7,1,'Empleo',11,'Comunicaciones',1,'','',NULL),
(8,8,1,'Empleo',7,'Energía y Minas',1,'','',NULL),
(9,9,1,'Educacion',10,'Transportes',1,'444,129,581,51,584,112,445,187','444,129,581,51,584,112,445,187',NULL),
(10,10,1,'Empleo',6,'Seguridad',1,'','',NULL),
(11,11,1,'Empleo',4,'Forestal',1,'1185,77,1317,135,1320,194,1184,135','1185,77,1317,135,1320,194,1184,135',NULL),
(12,12,1,'Empleo',3,'Pesquería',1,'508,359,610,327,611,378,512,403','508,359,610,327,611,378,512,403',NULL),
(13,13,1,'Empleo',1,'Agrícultura',1,'705,234,807,258,807,305,704,279','705,234,807,258,807,305,704,279',NULL),
(14,14,1,'Empleo',1,'Agrícultura',1,'704,327,806,343,807,388,704,372,707,373','704,327,806,343,807,388,704,372,707,373',NULL),
(15,15,1,'Empleo',1,'Agrícultura',1,'707,413,807,425,805,471,705,461','707,413,807,425,805,471,705,461',NULL),
(16,16,1,'Empleo',1,'Agrícultura',1,'948,196,1087,141,1087,208,949,256','948,196,1087,141,1087,208,949,256',NULL),
(17,17,1,'Empleo',16,'Salud',1,'1067,296,1148,318,1145,349,1069,331','1067,296,1148,318,1145,349,1069,331',NULL),
(18,18,1,'Empleo',1,'Agrícultura',1,'1070,369,1148,385,1147,414,1070,402','1070,369,1148,385,1147,414,1070,402',NULL),
(19,19,1,'Empleo',1,'Agrícultura',1,'1211,199,1291,226,1287,259,1207,232','1211,199,1291,226,1287,259,1207,232',NULL),
(20,20,1,'Empleo',2,'Ganadería',1,'1207,266,1289,292,1287,323,1209,301','763,275,841,299,841,332,764,308',NULL),
(21,21,1,'Empleo',1,'Agrícultura',1,'1344,362,1422,374,1421,408,1343,398','894,369,967,377,970,409,893,403',NULL),
(22,22,1,'Empleo',3,'Pesquería',1,'1340,298,1419,309,1419,342,1342,332','1340,298,1419,309,1419,342,1342,332',NULL),
(23,23,1,'Empleo',2,'Ganadería',1,'1367,111,1386,103,1412,100,1460,108,1490,124,1501,119,1505,132,1527,135,1508,140,1502,148,1508,160,1503,164,1486,152,1457,158,1458,166,1447,169,1432,167,1432,160,1400,154,1378,147,1365,136,1358,123','1367,111,1386,103,1412,100,1460,108,1490,124,1501,119,1505,132,1527,135,1508,140,1502,148,1508,160,1503,164,1486,152,1457,158,1458,166,1447,169,1432,167,1432,160,1400,154,1378,147,1365,136,1358,123',NULL),
(24,24,1,'Empleo',2,'Ganadería',1,'1368,487,1386,485,1453,492,1447,585,1377,584,1368,583','1368,487,1386,485,1453,492,1447,585,1377,584,1368,583',NULL),
(25,25,1,'Empleo',7,'Energía y Minas',1,'1386,489,1379,582,1445,584,1451,496','942,581,948,488,1013,495,1008,583',NULL),
(29,29,1,'Educacion',18,'Educación',0,'','','curso'),
(30,30,1,'Educacion',18,'Educación',0,'','','postgrado'),
(31,31,1,'Educacion',18,'Educación',0,'','','curso'),
(32,32,1,'Empleo',1,'Agrícultura',1,'','',NULL),
(33,32,1,'Empleo',3,'Pesquería',1,'445,129,446,186,583,112,583,52','8,129,8,185,145,112,145,52',NULL),
(38,37,1,'Empleo',24,'Tecnología y sistemas.',1,'','',NULL),
(39,38,1,'Empleo',1,'Agrícultura',1,'','',NULL),
(41,40,1,'Empleo',24,'Tecnología y sistemas.',1,'','',NULL),
(43,42,1,'Empleo',20,'Banca y Entidades Financieras',1,'','',NULL),
(44,43,1,'Educacion',18,'Educación',1,'707,259,707,320,844,338,844,281','320,258,320,319,457,337,457,280','postgrado'),
(45,44,1,'Educacion',18,'Educación',1,'','','postgrado');

/*Table structure for table `document` */

DROP TABLE IF EXISTS `document`;

CREATE TABLE `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_fair_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D8698A765AE40180` (`company_fair_id`),
  CONSTRAINT `FK_D8698A765AE40180` FOREIGN KEY (`company_fair_id`) REFERENCES `company_fair` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `document` */

insert  into `document`(`id`,`company_fair_id`,`name`,`title`) values
(1,1,'fair-31ba7b8c9ef1635fc9841efeb08f0a0e.pdf','DESCARGA 1'),
(2,29,'fair-b410cf8dda673c56405297c7ac61ebb8.doc','sdfsdf'),
(5,38,'fair-8f82641c7624d79aa6d71718380abfd1.pdf','info'),
(6,38,'fair-6db51954496e39cfaa75433b190a87ef.pdf','the-handbook-wework'),
(7,41,'fair-6a506c693edffc3077754824dcc6fab6.pdf','pdf1'),
(8,41,'fair-1ecba8100bfb857684d531f69806923a.pdf','pdf2'),
(11,43,'fair-f32fe733c7d60c50412b7455f700d6be.pdf','manual_vpn');

/*Table structure for table `fair` */

DROP TABLE IF EXISTS `fair`;

CREATE TABLE `fair` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slogan` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fair` */

insert  into `fair`(`id`,`name`,`image`,`slogan`,`start_date`,`end_date`,`create_at`,`state`) values
(1,'ExpoAptitus IV 2017',NULL,NULL,NULL,NULL,NULL,0),
(2,'ExpoGrados',NULL,NULL,NULL,NULL,NULL,1);

/*Table structure for table `image_gallery` */

DROP TABLE IF EXISTS `image_gallery`;

CREATE TABLE `image_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_fair_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D23B2FE65AE40180` (`company_fair_id`),
  CONSTRAINT `FK_D23B2FE65AE40180` FOREIGN KEY (`company_fair_id`) REFERENCES `company_fair` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `image_gallery` */

insert  into `image_gallery`(`id`,`company_fair_id`,`name`) values
(1,1,'fair-a55a3e57d1c0b2971eab830d2030163a.jpeg'),
(2,1,'fair-4878072019bf60cc32125093b22ccfbe.png'),
(3,1,'fair-623e59b843e595d67dac496d43d488a9.jpg'),
(4,1,'fair-9af7d02a0969a37e24fdfa314a8ad834.jpg'),
(6,29,'fair-b4f83b941b3c7e4f36cd994dac387738.jpg'),
(11,38,'fair-6bf3c2edcb84257a082ada1f3c19309d.jpg'),
(12,38,'fair-7ef251c517eaf3871265c8949d9f0f7f.jpeg'),
(13,38,'fair-c4adcc85f2dfd72e7fe672f026f41976.jpg'),
(14,38,'fair-df83c0b3bcea6f518aeb87b35db82a53.png'),
(18,41,'fair-5387d1e7bfb7e84ef24cf7fa8b5ab365.png'),
(19,41,'fair-402f9641628624b6da2a21db3750cb86.jpg'),
(20,41,'fair-d71afcc48a603dafcc978548a3050a1c.jpg'),
(30,43,'fair-f7b73de50dead6a6455b8903cd259afc.png');

/*Table structure for table `profile` */

DROP TABLE IF EXISTS `profile`;

CREATE TABLE `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_fair_id` int(11) NOT NULL,
  `label` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8157AA0F5AE40180` (`company_fair_id`),
  CONSTRAINT `FK_8157AA0F5AE40180` FOREIGN KEY (`company_fair_id`) REFERENCES `company_fair` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `profile` */

insert  into `profile`(`id`,`company_fair_id`,`label`,`description`) values
(1,1,'Misión','<p>misi&oacute;n de la empresa</p>'),
(2,1,'Visión','<p>visi&oacute;n de la empresa</p>'),
(3,1,'Quiénes somos','<p>Qui&eacute;nes somos de la empresa</p>'),
(5,29,'fdsgfdgfdg','<p>Hola mundo</p>'),
(6,30,'fdgdsgsd','<p>gfsdgdsgsdg</p>'),
(10,38,'Misión','<p>Es una poruebaasjd&ntilde;lka sdjsa&ntilde;ldkjasdjsa&ntilde;lkdhkjsagdla cabsckja hdkjsahkdhsakjdh lkasd sadhkjsadhkjsadhsakjhdlkjsa dsad sakdhaskjd hsakjhd kjad sadsakd hashdalkjshdkjahsdkj sakda hsd asdhkja skdhsa jdhalksjhdkjsa hkjdahskjdhsakjhd kjsadk asdakjsdhlkjsahdkjahskjdha kjsd asdha kshdkjashdkjahsdkj askd ashd kjsahdkjahsdkjhsakjd haslkj dahsd saj hdkjashdlkjhsakjdhsa kjdhsad haskdhkjsahdkja hskjd haskj das</p>'),
(11,38,'Visión','<p>es una prueba de eje,mploo para que christiam pueda chambear.... tu mismo eres batedia.</p>'),
(12,38,'¿Quien eres?','<p>somos personas capaces de hacer buenas cosas en pro de aptitus.</p>'),
(16,41,'Misión','<p>Es un perfil institucional.</p>'),
(17,41,'Visión','<p>Para un perfil institucional.</p>'),
(18,41,'Somos','<p>Lo que somos.</p>'),
(28,43,'Mi Mision','<p>Jojojojojo</p>'),
(29,43,'Mi Vision','<p>ejejejejejeje</p>'),
(30,43,'Quien soy','<p>jujujujujujujuju</p>');

/*Table structure for table `social_media` */

DROP TABLE IF EXISTS `social_media`;

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_fair_id` int(11) NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_20BC159E5AE40180` (`company_fair_id`),
  CONSTRAINT `FK_20BC159E5AE40180` FOREIGN KEY (`company_fair_id`) REFERENCES `company_fair` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `social_media` */

insert  into `social_media`(`id`,`company_fair_id`,`link`,`type`) values
(1,1,'https://www.facebook.com/','Facebook'),
(2,1,'https://twitter.com/aptitusempleos?lang=es','Twitter'),
(7,38,'https://www.facebook.com/EnglishIF/','Facebook'),
(8,38,'https://twitter.com/TensorFlow?lang=es','Twitter'),
(9,38,'https://twitter.com/TensorFlow?lang=es','Google+'),
(10,38,'https://www.linkedin.com/company/aptitus/','Linkedin'),
(13,41,'https://www.facebook.com/englishwithjenniferlebedev/','Facebook'),
(14,41,'https://www.youtube.com/watch?v=IZOHopZC6BE','Youtube'),
(18,43,'https://www.youtube.com/watch?v=tHpY2t111Io','Youtube');

/*Table structure for table `sponsor` */

DROP TABLE IF EXISTS `sponsor`;

CREATE TABLE `sponsor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `company_name` (`company_name`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sponsor` */

insert  into `sponsor`(`id`,`company_name`,`image`,`url`) values
(1,'sdfsfsdf','sponsor-atento.jpg','https://goo.gl/5Qoysz'),
(2,'Romaguera, Goyette and Rolfson','fair-f33a951a754662d3a9132d280dc2f6bf.png','https://marcia.biz'),
(3,'Romaguera, Goyette and Rolfson','fair-f33a951a754662d3a9132d280dc2f6bf.png','https://marcia.biz'),
(4,'Romaguera, Goyette and Rolfson','fair-f33a951a754662d3a9132d280dc2f6bf.png','https://marcia.biz'),
(5,'Romaguera, Goyette and Rolfson','fair-f33a951a754662d3a9132d280dc2f6bf.png','https://marcia.biz'),
(6,'Romaguera, Goyette and Rolfson','fair-f33a951a754662d3a9132d280dc2f6bf.png','https://marcia.biz'),
(7,'Romaguera, Goyette and Rolfson','fair-f33a951a754662d3a9132d280dc2f6bf.png','https://marcia.biz'),
(8,'Romaguera, Goyette and Rolfson','fair-f33a951a754662d3a9132d280dc2f6bf.png','https://marcia.biz'),
(9,'Romaguera, Goyette and Rolfson','fair-f33a951a754662d3a9132d280dc2f6bf.png','https://marcia.biz'),
(10,'Romaguera, Goyette and Rolfson','fair-f33a951a754662d3a9132d280dc2f6bf.png','https://marcia.biz'),
(11,'Romaguera, Goyette and Rolfson','fair-f33a951a754662d3a9132d280dc2f6bf.png','https://marcia.biz'),
(12,'Romaguera, Goyette and Rolfson','fair-f33a951a754662d3a9132d280dc2f6bf.png','https://marcia.biz'),
(13,'Romaguera, Goyette and Rolfson','fair-f33a951a754662d3a9132d280dc2f6bf.png','https://marcia.biz'),
(14,'Romaguera, Goyette and Rolfson','fair-f33a951a754662d3a9132d280dc2f6bf.png','https://marcia.biz'),
(15,'Romaguera, Goyette and Rolfson','fair-f33a951a754662d3a9132d280dc2f6bf.png','https://marcia.biz'),
(16,'Romaguera, Goyette and Rolfson','fair-f33a951a754662d3a9132d280dc2f6bf.png','https://marcia.biz'),
(17,'Romaguera, Goyette and Rolfson','fair-f33a951a754662d3a9132d280dc2f6bf.png','https://marcia.biz'),
(18,'Romaguera, Goyette and Rolfson','fair-f33a951a754662d3a9132d280dc2f6bf.png','https://marcia.biz'),
(19,'Romaguera, Goyette and Rolfson','fair-f33a951a754662d3a9132d280dc2f6bf.png','https://marcia.biz'),
(20,'Romaguera, Goyette and Rolfson','fair-f33a951a754662d3a9132d280dc2f6bf.png','https://marcia.biz'),
(21,'Romaguera, Goyette and Rolfson','fair-f33a951a754662d3a9132d280dc2f6bf.png','https://marcia.biz'),
(22,'Romaguera, Goyette and Rolfson','fair-f33a951a754662d3a9132d280dc2f6bf.png','https://marcia.biz'),
(23,'Romaguera, Goyette and Rolfson','fair-f33a951a754662d3a9132d280dc2f6bf.png','https://marcia.biz'),
(24,'Ripley','fair-4435fd1aaaaf293227474e6d609e2881.jpg','https://goo.gl/5Qoysz'),
(25,'Romaguera, Goyette and Rolfson','fair-f33a951a754662d3a9132d280dc2f6bf.png','https://marcia.biz'),
(26,'Jair, Goyette and Rolfson','fair-fqq33a951a754662d3a9132d280dc2f6bf.png','https://maqqrcia.biz'),
(27,'Jair, Goyette and Rolfson','fair-fqq33a951a754662d3a9132d280dc2f6bf.png','https://maqqrcia.biz'),
(28,'Jair, Goyette and Rolfson','fair-fqq33a951a754662d3a9132d280dc2f6bf.png','https://maqqrcia.biz'),
(29,'Jair, Goyette and Rolfson','fair-fqq33a951a754662d3a9132d280dc2f6bf.png','https://maqqrcia.biz'),
(30,'BBVA','fair-befa0c9561e5930282c44ce3a8549bec.png','https://bbva.com'),
(31,'Hola','fair-f304f078a4779392374ff93c9dc949bf.jpeg','http://hola.com'),
(32,'Hola','fair-6fcd912cff29641a08d643748192b19c.jpeg','http://hola.com'),
(33,'chau','fair-2d0bf378bb4e00f7bf99cb25c9a8c401.jpeg','http://chau.com'),
(34,'Hola','fair-3305ed374a2ab87ab9671173241a779c.jpg','http://hola.com'),
(35,'Alo','fair-75540ba0475281c5ccf4a3c3d7ef40fa.png','http://alo.com'),
(36,'Hola','fair-a58f73032a756ea61a34213b98fe1530.png','http://hola.com'),
(37,'Hola','fair-0741b1229f79b0b0155c2343f30266a9.png','http://hola.com'),
(38,'Jueve','fair-29316e82c57b30d3d62362bba17ce43a.png','http://jueves.org'),
(39,'Jair, Goyette and Rolfson','fair-fqq33a951a754662d3a9132d280dc2f6bf.png','https://maqqrcia.biz'),
(40,'veevve','fair-fe334aa08555088cdc21a16b81a98472.png','http://ereg.com'),
(41,'prueba','fair-b1277c98d99a6486c1a225c2cd5b5cd3.png','http://dev.adminexpo.aptitus.com/patrocinadores/agregar'),
(42,'SHINRA','fair-f0a337044d008030ffc6162ccb0d913e.jpg','https://shinra.com'),
(43,'GEC','fair-757270519c8090be13223c5d12483333.jpg','http://grupoelcomercio.com.pe/'),
(44,'Patrocinador Modificado','fair-ab15e42f18cd86d51f0e48363059741b.jpg','https://localhost.com/patrocinadores/agregar-modificador'),
(45,'Sodexo','fair-bb833ce39a9fe4cfdf24b14bf916f194.jpg','https://dev4c.adminexpo.aptitus.com/patrocinadores/agregar'),
(46,'dsafdsgfdsfdsf','fair-253713a76912425ab895949a16ccf886.jpg','https://tinyjpg.com/');

/*Table structure for table `sponsor_fair` */

DROP TABLE IF EXISTS `sponsor_fair`;

CREATE TABLE `sponsor_fair` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sponsor_id` int(11) NOT NULL,
  `fair_id` int(11) NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `mapping` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mapping_tablet` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3F450CC4979B1JJ6` (`sponsor_id`),
  KEY `IDX_3F450CC47AB61JJ7` (`fair_id`),
  CONSTRAINT `FK_3F450CC47AB61JJ7` FOREIGN KEY (`fair_id`) REFERENCES `fair` (`id`),
  CONSTRAINT `FK_3F450CC4979B1JJ6` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sponsor_fair` */

insert  into `sponsor_fair`(`id`,`sponsor_id`,`fair_id`,`category`,`state`,`mapping`,`mapping_tablet`) values
(166,1,2,'Educacion',1,'1252,105,1260,96,1277,87,1307,83,1341,89,1374,101,1399,117,1401,125,1389,132,1361,141,1316,142,1285,135,1266,126,1255,115','744,411,786,411,786,542,744,542'),
(167,23,1,'Educacion',0,'1252,105,1260,96,1277,87,1307,83,1341,89,1374,101,1399,117,1401,125,1389,132,1361,141,1316,142,1285,135,1266,126,1255,115','744,411,786,411,786,542,744,542'),
(168,24,1,'Educacion',0,'1242,112,1250,103,1266,94,1289,91,1327,94,1363,107,1391,126,1391,131,1375,141,1351,147,1330,150,1294,147,1265,137,1250,128','863,116,873,105,894,97,922,95,960,101,994,117,1012,131,1012,136,999,144,971,152,927,153,894,146,871,132'),
(169,25,2,'Educacion',1,'1252,105,1260,96,1277,87,1307,83,1341,89,1374,101,1399,117,1401,125,1389,132,1361,141,1316,142,1285,135,1266,126,1255,115','744,411,786,411,786,542,744,542'),
(170,26,2,'Empleo',1,'125212,105,1260,96,1277,87,1307,83,1341,89,1374,101,1399,117,1401,125,1389,132,1361,141,1316,142,1285,135,1266,126,1255,115','744,41121,786,411,786,542,744,542'),
(171,27,2,'Empleo',1,'125212,105,1260,96,1277,87,1307,83,1341,89,1374,101,1399,117,1401,125,1389,132,1361,141,1316,142,1285,135,1266,126,1255,115','744,41121,786,411,786,542,744,542'),
(172,28,2,'Educacion',1,'125212,105,1260,96,1277,87,1307,83,1341,89,1374,101,1399,117,1401,125,1389,132,1361,141,1316,142,1285,135,1266,126,1255,115','744,41121,786,411,786,542,744,542'),
(173,29,2,'Educacion',1,'125212,105,1260,96,1277,87,1307,83,1341,89,1374,101,1399,117,1401,125,1389,132,1361,141,1316,142,1285,135,1266,126,1255,115','744,41121,786,411,786,542,744,542'),
(174,30,1,'Educacion',0,'1023,412,1066,412,1066,542,1023,542','622,411,665,411,665,542,622,542'),
(175,31,1,'Educacion',0,'1234','1234'),
(176,32,1,'Educacion',0,'1234','1234'),
(177,33,1,'Educacion',0,'12344','1344'),
(178,34,1,'Educacion',0,'1235','1235'),
(179,35,1,'Educacion',0,'1235','1235'),
(180,36,1,'Educacion',0,'1234','1234'),
(181,37,1,'Educacion',0,'1023,411,1066,411,1066,542,1023,542','636,411,680,411,680,542,636,542'),
(182,38,1,'Educacion',0,'1084,411,1128,411,1128,543,1084,543','697,411,740,411,740,542,697,542'),
(183,39,1,'Educacion',0,'1146,411,1188,411,1188,542,1146,542','758,411,801,411,801,542,758,542'),
(184,40,1,'Educacion',0,'',''),
(185,41,1,'Educacion',0,'',''),
(186,42,1,'Empleo',0,'',''),
(187,43,1,'Empleo',0,'',''),
(188,44,1,'Empleo',0,'',''),
(189,45,1,'Empleo',0,'',''),
(190,46,1,'Empleo',0,'','');

/*Table structure for table `stand` */

DROP TABLE IF EXISTS `stand`;

CREATE TABLE `stand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stand_type_id` int(11) NOT NULL,
  `stand_model_id` int(11) NOT NULL,
  `company_fair_id` int(11) NOT NULL,
  `stand_amphitryon_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_64B918B6A4DBF357` (`stand_type_id`),
  KEY `IDX_64B918B6E51D2631` (`stand_model_id`),
  KEY `IDX_64B918B65AE40180` (`company_fair_id`),
  KEY `IDX_64B918B6181C246E` (`stand_amphitryon_id`),
  CONSTRAINT `FK_64B918B6181C246E` FOREIGN KEY (`stand_amphitryon_id`) REFERENCES `stand_amphitryon` (`id`),
  CONSTRAINT `FK_64B918B65AE40180` FOREIGN KEY (`company_fair_id`) REFERENCES `company_fair` (`id`),
  CONSTRAINT `FK_64B918B6A4DBF357` FOREIGN KEY (`stand_type_id`) REFERENCES `stand_type` (`id`),
  CONSTRAINT `FK_64B918B6E51D2631` FOREIGN KEY (`stand_model_id`) REFERENCES `stand_model` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `stand` */

insert  into `stand`(`id`,`stand_type_id`,`stand_model_id`,`company_fair_id`,`stand_amphitryon_id`) values
(1,1,2,1,2),
(2,3,9,2,1),
(3,2,7,3,2),
(4,3,9,4,4),
(5,2,6,5,2),
(6,1,3,6,2),
(7,1,1,7,1),
(8,2,6,8,1),
(9,3,9,9,1),
(10,1,1,10,1),
(11,3,9,11,1),
(12,3,9,12,1),
(13,3,9,13,1),
(14,3,9,14,2),
(15,3,9,15,3),
(16,3,9,16,6),
(17,3,9,17,6),
(18,3,9,18,6),
(19,3,9,19,6),
(20,3,9,20,3),
(21,3,9,21,2),
(22,3,9,22,5),
(23,3,9,23,6),
(24,3,9,24,6),
(25,2,6,25,2),
(29,1,2,29,1),
(30,1,1,30,1),
(31,1,1,31,1),
(32,1,1,32,1),
(33,1,2,33,3),
(38,1,3,38,3),
(39,1,3,39,1),
(41,1,4,41,4),
(43,2,8,43,4),
(44,1,4,44,4),
(45,2,7,45,5);

/*Table structure for table `stand_amphitryon` */

DROP TABLE IF EXISTS `stand_amphitryon`;

CREATE TABLE `stand_amphitryon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `stand_amphitryon` */

insert  into `stand_amphitryon`(`id`,`name`,`state`) values
(1,'Anfitriona 1',1),
(2,'Anfitriona 2',1),
(3,'Anfitriona 3',1),
(4,'Anfitriona 4',1),
(5,'Anfitriona 5',1),
(6,'Anfitriona 6',1);

/*Table structure for table `stand_color` */

DROP TABLE IF EXISTS `stand_color`;

CREATE TABLE `stand_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stand_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5FC9EAB29734D487` (`stand_id`),
  CONSTRAINT `FK_5FC9EAB29734D487` FOREIGN KEY (`stand_id`) REFERENCES `stand` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `stand_color` */

insert  into `stand_color`(`id`,`stand_id`,`name`,`type`) values
(1,1,'#378cc8','color_1'),
(2,1,'#045584','color_2'),
(3,2,'#378cc8','color_1'),
(4,2,'#045584','color_2'),
(5,3,'#c83756','color_1'),
(6,3,'#f00','color_2'),
(7,4,'#6db7eb','color_1'),
(8,4,'#045584','color_2'),
(9,5,'#378cc8','color_1'),
(10,5,'#e9e9e9','color_2'),
(11,6,'#378cc8','color_1'),
(12,6,'#40ad0f','color_2'),
(13,7,'#378cc8','color_1'),
(14,7,'#045584','color_2'),
(15,8,'#e6092f','color_1'),
(16,8,'#e5e9eb','color_2'),
(17,9,'#378cc8','color_1'),
(18,9,'#045584','color_2'),
(19,10,'#f70020','color_1'),
(20,10,'#1a1b1b','color_2'),
(21,11,'#118522','color_1'),
(22,11,'#f53205','color_2'),
(23,12,'#378cc8','color_1'),
(24,12,'#045584','color_2'),
(25,13,'#378cc8','color_1'),
(26,13,'#045584','color_2'),
(27,14,'#378cc8','color_1'),
(28,14,'#045584','color_2'),
(29,15,'#378cc8','color_1'),
(30,15,'#045584','color_2'),
(31,16,'#378cc8','color_1'),
(32,16,'#045584','color_2'),
(33,17,'#378cc8','color_1'),
(34,17,'#045584','color_2'),
(35,18,'#378cc8','color_1'),
(36,18,'#045584','color_2'),
(37,19,'#378cc8','color_1'),
(38,19,'#045584','color_2'),
(39,20,'#378cc8','color_1'),
(40,20,'#045584','color_2'),
(41,21,'#378cc8','color_1'),
(42,21,'#045584','color_2'),
(43,22,'#378cc8','color_1'),
(44,22,'#045584','color_2'),
(45,23,'#378cc8','color_1'),
(46,23,'#045584','color_2'),
(47,24,'#378cc8','color_1'),
(48,24,'#045584','color_2'),
(49,25,'#378cc8','color_1'),
(50,25,'#045584','color_2'),
(57,29,'#378CC8','color_1'),
(58,29,'#045584','color_2'),
(59,30,'#378CC8','color_1'),
(60,30,'#045584','color_2'),
(61,31,'#378cc8','color_1'),
(62,31,'#045584','color_2'),
(63,32,'#378cc8','color_1'),
(64,32,'#045584','color_2'),
(65,33,'#378cc8','color_1'),
(66,33,'#045584','color_2'),
(75,38,'#378cc8','color_1'),
(76,38,'#045584','color_2'),
(77,39,'#378cc8','color_1'),
(78,39,'#045584','color_2'),
(81,41,'#378cc8','color_1'),
(82,41,'#045584','color_2'),
(85,43,'#378cc8','color_1'),
(86,43,'#045584','color_2'),
(87,44,'#378cc8','color_1'),
(88,44,'#045584','color_2'),
(89,45,'#378cc8','color_1'),
(90,45,'#045584','color_2');

/*Table structure for table `stand_image` */

DROP TABLE IF EXISTS `stand_image`;

CREATE TABLE `stand_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stand_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FCA2A6049734D487` (`stand_id`),
  CONSTRAINT `FK_FCA2A6049734D487` FOREIGN KEY (`stand_id`) REFERENCES `stand` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=361 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `stand_image` */

insert  into `stand_image`(`id`,`stand_id`,`name`,`type`) values
(1,1,'fair-100d3e48f1728b431221c1525b4fa99f.jpg','image_totem'),
(2,1,'fair-9d6eaa3840c929dcaac2e0b45f19d803.jpeg','image_banderole_1'),
(3,1,'fair-68bf2e1e6c82a78a0dfbf821617d8b12.jpeg','image_banderole_2'),
(4,1,'fair-7f58abcf70a89363cf8ac5a83c41fd7c.png','image_top'),
(5,1,'fair-96d9c223de7a71fda82dc4b1f7507e8b.png','image_counter'),
(6,1,'fair-3d52b21e768a61031bc8d2d29b3d0a19.jpg','image_monitor'),
(17,3,'fair-0baf4c70d9e23b2159c8a51cbc2ac509.png','image_totem'),
(18,3,'fair-50ecdf91f4e0514580ebaddf158ecda9.jpeg','image_poster_1'),
(19,3,'fair-7cdf9ecd6b2f0a2f59e53c6654295ec3.jpeg','image_poster_2'),
(20,3,'fair-3d2ccbfc1f7cc363459c4d9845686424.png','image_top'),
(21,3,'fair-7fdce56f6ee670cba450f1301a6033df.png','image_counter'),
(22,3,'fair-d539e079f57731d1baf30a51101da9fd.jpeg','image_monitor'),
(23,4,'fair-245244bffa3c47fa80094b33af5822af.jpg','image_banderole_1'),
(24,4,'fair-c7d4552293552f12ee934328b34b1b90.jpg','image_poster_1'),
(25,4,'fair-8918237075039a4b2fa44620b3ecb5a5.jpeg','image_top'),
(26,4,'fair-f6fc4646f1902894e8af7ebb33b77436.jpeg','image_counter'),
(27,4,'fair-dbc98b53a90c7ddf037e4a40577abe53.jpg','image_monitor'),
(34,6,'fair-ea2e1aa02f2701d4cdcb4ca181a89c0a.jpg','image_totem'),
(35,6,'fair-e443d066f7d7807844b7d56127c58fce.jpg','image_banderole_1'),
(36,6,'fair-a035f159369616dbcd9497e7c049d310.jpg','image_banderole_2'),
(37,6,'fair-a02991ec20659b49b4cfcc3cdca8b380.png','image_top'),
(38,6,'fair-e823bcdd1c24d49949affaae410eb652.jpg','image_counter'),
(39,6,'fair-981051617d12675e55ac8661d8d69f13.jpg','image_monitor'),
(40,7,'fair-417bb9cd6bdd6436bc3c6b21f335f044.png','image_totem'),
(41,7,'fair-225798c3d8b94757aa889263b54e4b35.png','image_banderole_1'),
(42,7,'fair-444a5084315046a12021ec671fe8edf7.png','image_banderole_2'),
(43,7,'fair-574b2de2d71b356072df117fde1925af.png','image_top'),
(44,7,'fair-9a115535cdd7b1f461442932f23d5086.png','image_counter'),
(45,7,'fair-a1f982c117c8d06bf3372d4b705176db.png','image_monitor'),
(52,8,'fair-d6776f1c73c56d117a00627f60e6a751.png','image_totem'),
(53,8,'fair-7fef70afa44434caf84a9f2f6908e90b.jpeg','image_poster_1'),
(54,8,'fair-c394c98a40043e4a1cc7ef39afd3b5b6.jpeg','image_poster_2'),
(55,8,'fair-778fa902a6672e538bd19e672a515f54.jpeg','image_top'),
(56,8,'fair-4112a7eea3b5ceb1fe200922f1fd2685.jpg','image_counter'),
(57,8,'fair-2f182fe325529a5c68c6728d3ad46794.jpeg','image_monitor'),
(58,9,'fair-e5828aa4270f0eb9970cfeb37a295dcb.png','image_banderole_1'),
(59,9,'fair-edb9d3c722b5a5da09d76ea565925ec9.png','image_poster_1'),
(60,9,'fair-c6e14bb148134eceaf59122713eebdfc.png','image_top'),
(61,9,'fair-99b745e93081c779ef08975ecb80a996.png','image_counter'),
(62,9,'fair-1d317411086ad8c084816e0f5dc3b378.png','image_monitor'),
(63,10,'fair-0fd88040519898b7ed0b8394485352d7.jpg','image_totem'),
(64,10,'fair-f7c3a54e4e63f2876de9dac796239165.jpg','image_banderole_1'),
(65,10,'fair-58b0844b07b511b76c92cb7aff0a11bf.jpg','image_banderole_2'),
(66,10,'fair-641b8a346be5b72c9528de2f5a22d5f8.png','image_top'),
(67,10,'fair-d17522e36e70b65377ce52ffaa0da85f.png','image_counter'),
(68,10,'fair-5eea48bbbeaa5d3350a217c50b9f3d58.png','image_monitor'),
(79,12,'fair-404bc78732e51b28429b09ce73708243.png','image_banderole_1'),
(80,12,'fair-0f3c0304569fe15aa9073c24e3748eaa.png','image_poster_1'),
(81,12,'fair-ab655c68da0857de647a61093929153d.png','image_top'),
(82,12,'fair-74f8edd36bd26a096021fb3948181f70.png','image_counter'),
(83,12,'fair-5730960be77b969240d2ef6f36aee8c3.png','image_monitor'),
(95,13,'fair-362edc81875bb049956d2295dc7f5723.png','image_banderole_1'),
(96,13,'fair-70491de77051c71a47040f133ac74c94.png','image_poster_1'),
(97,13,'fair-748037d8e53053039c1594723525d2a5.png','image_top'),
(98,13,'fair-851731d10ad68ba5cbe4c3e4a91693f0.png','image_counter'),
(99,13,'fair-4ca9fca2d45c5e80d57cc884bd2d4125.png','image_monitor'),
(100,14,'fair-6a41329c0d73e09c18125cbfbeb77149.png','image_banderole_1'),
(101,14,'fair-51daed8c75bcc009784827a98acef77b.png','image_poster_1'),
(102,14,'fair-1f97149371089751a58001d89c55200f.png','image_top'),
(103,14,'fair-6f3c138496e626dc43be4a5dd0205412.png','image_counter'),
(104,14,'fair-ef964356afb102c6b06ba374e303b952.png','image_monitor'),
(105,15,'fair-fe304d6c6f14b9ea4d018824d6d5de31.png','image_banderole_1'),
(106,15,'fair-d6a6d9df29159e784ddfcc86293332f0.png','image_poster_1'),
(107,15,'fair-0c828ea34ec8fd4595271ffe54f426f7.png','image_top'),
(108,15,'fair-9728df40551b242ed6b39bbf01ac805e.png','image_counter'),
(109,15,'fair-80051662731f6216d5bde9a66b1d9741.png','image_monitor'),
(110,2,'fair-02dbbef2bfa3d4f736651c1e9aa7a89f.png','image_banderole_1'),
(111,2,'fair-a17e043f9fe1b18e4a142364c6860442.png','image_poster_1'),
(112,2,'fair-5dac17735c2458e70237f0e06cc4533a.jpeg','image_top'),
(113,2,'fair-d94540e664f011a0ee03d2ad7b5128a0.jpg','image_counter'),
(114,2,'fair-53f4243add83fce0ab1e3d75abbf70ec.jpg','image_monitor'),
(115,16,'fair-b46ad5d65a0d07134ce25d9aeea5b1cd.png','image_banderole_1'),
(116,16,'fair-fdfb79bf482814f3c432ddb5f1480e97.png','image_poster_1'),
(117,16,'fair-6755fcd9212cd541e445a60879452b40.png','image_top'),
(118,16,'fair-65a24f888dadf99beeb4ffed8e381327.png','image_counter'),
(119,16,'fair-d6f959a02a5f429a787f007137532f52.png','image_monitor'),
(120,17,'fair-f1d6eba6b3eb8d41796a03d17710bccb.png','image_banderole_1'),
(121,17,'fair-e2e9c5a9db86a8d023eb1138c0f457a2.png','image_poster_1'),
(122,17,'fair-5a9b4687350f9bebd0d1f35a79b40d5f.png','image_top'),
(123,17,'fair-745fcaa71fc9a902fad83e6e21f4ddc1.png','image_counter'),
(124,17,'fair-0d5edfee87cb316cb6a62002637a7861.png','image_monitor'),
(125,18,'fair-6dee077e25de3dde5d6575201a80a0fe.png','image_banderole_1'),
(126,18,'fair-8b1ccea6e38b5004102cd01f773716a3.png','image_poster_1'),
(127,18,'fair-a849184635bfc20315bc6008715f8b5d.png','image_top'),
(128,18,'fair-b9503eb0195d8b12093e40aba1420758.png','image_counter'),
(129,18,'fair-25074574a688a16077ffaa1c09123f59.png','image_monitor'),
(130,11,'fair-a4d751aacf5e0afaa9de7a0889db748d.png','image_banderole_1'),
(131,11,'fair-ef4b30816112e63f52eee2a1cc05efa9.png','image_poster_1'),
(132,11,'fair-1fe176d0aeea0398d08f514ff562deea.jpeg','image_top'),
(133,11,'fair-884e5134a790e7f1cff9e32c0e29f4e3.jpg','image_counter'),
(134,11,'fair-56650c67895741d62860ccbca60aa86d.jpg','image_monitor'),
(135,19,'fair-bae5cdad7b485298d468f66cfec7ddcb.png','image_banderole_1'),
(136,19,'fair-099d8ccb93408f6f95c6e55951100489.png','image_poster_1'),
(137,19,'fair-101739f1c6a46470e283ad379b4ae2f8.png','image_top'),
(138,19,'fair-fb5d8473a80bf8e3f209e7fcba059d92.png','image_counter'),
(139,19,'fair-25cce0c8cb999529f43bf93578350e11.png','image_monitor'),
(150,22,'fair-fc14a791096766375b2d02e5865ccbc4.png','image_banderole_1'),
(151,22,'fair-e1ea29a7026f53764ffe3c80275c3572.png','image_poster_1'),
(152,22,'fair-7226442392432b11bfce48b3f56f8b7b.png','image_top'),
(153,22,'fair-19ab6b1991b646e3a953bc4b9ee30d23.png','image_counter'),
(154,22,'fair-4a8066818dbe175672a6d77ba2e59c65.png','image_monitor'),
(155,23,'fair-4247ff4da4f6ea0848732aa664443ee4.png','image_banderole_1'),
(156,23,'fair-0dbaadb1ad01d17bba2d47e0a5bbff34.png','image_poster_1'),
(157,23,'fair-b101327adc7b8ff63532f5b9ac0c142f.png','image_top'),
(158,23,'fair-c7c4b6b8cbb9726fe937b74928fe086b.png','image_counter'),
(159,23,'fair-817c7dad0c80cadd3c14f2eac60924ee.png','image_monitor'),
(160,24,'fair-7b6a1c01c5b6a6ec6a45209c0c718111.png','image_banderole_1'),
(161,24,'fair-079272456a9ea18f422087174e8379d0.png','image_poster_1'),
(162,24,'fair-c19275eaa1f8b94fa51f707ca8edf629.png','image_top'),
(163,24,'fair-9fa1e8f12e1c802a2b7197217559ea62.png','image_counter'),
(164,24,'fair-3482bbb982938e72aa716ed7bed03088.png','image_monitor'),
(171,25,'fair-f694d1302247c973011af39991a5ad12.png','image_totem'),
(172,25,'fair-a7e789e4c04b43627f7247da1bd8828c.png','image_poster_1'),
(173,25,'fair-4a6c791cfe3d1df51f606d445c2e0b0b.jpg','image_poster_2'),
(174,25,'fair-a1847755eabd8e395a2a45fc845cc25c.png','image_top'),
(175,25,'fair-eb1885db97a0e8bbae734c4d8d462923.jpg','image_counter'),
(176,25,'fair-4ca822af3f6ad7244c693f1fbb217909.jpg','image_monitor'),
(177,21,'fair-b09ff5d5b3a403a6e60aefcca0cdc9b2.png','image_banderole_1'),
(178,21,'fair-89c77fd86f68b328eff993b43fe5c8c6.png','image_poster_1'),
(179,21,'fair-8cccd7542b0808a57c0b137670047575.png','image_top'),
(180,21,'fair-1b156890218949c0b86a46bee05f6bce.png','image_counter'),
(181,21,'fair-91504958a6c05b7c44b878e8435ed658.png','image_monitor'),
(182,20,'fair-8bf5d79ef1dae3f59b11356babbc51f2.png','image_banderole_1'),
(183,20,'fair-b78ecd1882bf5ebd4d5c8dde081af2a0.png','image_poster_1'),
(184,20,'fair-dfa79165c8ad16115fa21a59dc81729e.png','image_top'),
(185,20,'fair-8c732cbc3e59c03150827a0aefa23f66.png','image_counter'),
(186,20,'fair-335e65caa31dcc2689dbb1dd48b423e6.png','image_monitor'),
(193,5,'fair-575fa6f54b0c83c9e6f10914eff20b15.jpg','image_totem'),
(194,5,'fair-269e8638e5c2ab9f82542092d24ef0f9.png','image_poster_1'),
(195,5,'fair-f3e9d3f60c52e4a1f5a49f1b3ecb8e5a.png','image_poster_2'),
(196,5,'fair-35f3afdb3f2d74dbabe1e489f3e234c9.png','image_top'),
(197,5,'fair-d6cf929108b51514391861917280fef3.png','image_counter'),
(198,5,'fair-500eb5f269f1d4f38b8941378ae5276b.jpg','image_monitor'),
(217,29,'fair-8eb371d638305b618ca9130603c82758.jpg','image_totem'),
(218,29,'fair-6ca2adf1ca596aba4bc16c38367f6dba.jpg','image_banderole_1'),
(219,29,'fair-bb22d8af692598f91d67006488ec6b3d.jpg','image_banderole_2'),
(220,29,'fair-ab6ef04b58cacc5dd95a5950ec9f22cb.jpg','image_top'),
(221,29,'fair-aef712181f8721cf7494e3ff418fe013.jpg','image_counter'),
(222,29,'fair-cf5da0fd5a77d156ae674c3b3da08dd3.jpg','image_monitor'),
(223,30,'fair-90efc14ee73ebe1d27f30a084584e23f.jpg','image_totem'),
(224,30,'fair-75e086857d846dd575e4146d68cc9a09.jpg','image_banderole_1'),
(225,30,'fair-a437e6831a60f0a69000fb83991cf46e.jpg','image_banderole_2'),
(226,30,'fair-431670b095e5b87338110bb45da47204.jpg','image_top'),
(227,30,'fair-b7fae2308b6547258233bfe6054d9a37.jpg','image_counter'),
(228,30,'fair-4242a945e6667f5f1f0434ec65aa2009.jpg','image_monitor'),
(229,31,'fair-d1419cec9ea79bdb7aaa3e179b5d3aee.jpg','image_totem'),
(230,31,'fair-ca728635caa09ed12bd72fcda40e624d.jpg','image_banderole_1'),
(231,31,'fair-d647a6019eb218fe0dcb5de3162b7503.jpg','image_banderole_2'),
(232,31,'fair-5eb9302d598db4228e9224750064fac6.jpg','image_top'),
(233,31,'fair-ce6bdc021603d1ca7fd81650cfde5440.jpg','image_counter'),
(234,31,'fair-d1571e1ec30c0a7ce5d0ce3f4df6c6d3.jpg','image_monitor'),
(235,32,'fair-d8c8614df9b3242b0b0a275fbcf18778.jpeg','image_totem'),
(236,32,'fair-697a43bafd56f89e0332fc252303e8d8.jpeg','image_banderole_1'),
(237,32,'fair-c8c2d4bb3dc9fa4f6cae5f9c67e35bbd.jpeg','image_banderole_2'),
(238,32,'fair-8569c8866c5e84e62f7807999f513ae9.jpeg','image_top'),
(239,32,'fair-bc24aadf13453fa34fbca9931e5f5bd4.jpeg','image_counter'),
(240,32,'fair-5e9025b33753e0e4194e80697a73080e.jpeg','image_monitor'),
(277,38,'fair-8aff50d0d38dcd2f59e94c5f8ca1946f.jpg','image_totem'),
(278,38,'fair-f5a1b96370e52f540ed0ec035bcf58c0.png','image_banderole_1'),
(279,38,'fair-7bfdb4d61fb597e2d5e370e82ff85cf3.jpeg','image_banderole_2'),
(280,38,'fair-3de968f9cba5bcd692e2b167ee66674e.png','image_top'),
(281,38,'fair-8a8c47cdf0796087b456a45e3db90dfa.png','image_counter'),
(282,38,'fair-538cce3b09edef6c044fe21353671767.jpg','image_monitor'),
(283,33,'fair-8de9365d559ac713fda7d562f5e9d135.jpeg','image_totem'),
(284,33,'fair-b9ad7165e2cea57685eccbc270d1ad23.jpeg','image_banderole_1'),
(285,33,'fair-b9f59301afbbe5283c2798646aab4abd.jpeg','image_banderole_2'),
(286,33,'fair-a8a1f7d5789acf9db20c24366d730a84.jpeg','image_top'),
(287,33,'fair-cac8c71987df159085d1cd456177b30d.jpeg','image_counter'),
(288,33,'fair-53ee4afb9c73a31e744b693f7b41b24a.jpeg','image_monitor'),
(301,39,'fair-905cf5afbdd794cea72eccb611e5427d.jpeg','image_totem'),
(302,39,'fair-55baf502dff67d2efd05bb41c077e441.jpeg','image_banderole_1'),
(303,39,'fair-31ebdfa533e0bc992b73eed3ba5ba956.png','image_banderole_2'),
(304,39,'fair-743a55493932be09c72412866ffb5c5a.jpeg','image_top'),
(305,39,'fair-87e8abef6910cccc58cef7538f883125.png','image_counter'),
(306,39,'fair-19efe5ea59985de133610dfdaf61ef57.png','image_monitor'),
(313,41,'fair-357f4ee0355288bcfc28721c050f4f56.jpg','image_totem'),
(314,41,'fair-b22e049fea18ffd9f9e9d020f19ff3de.jpg','image_banderole_1'),
(315,41,'fair-3b10dbb900a375d69903789d693c0b11.jpg','image_banderole_2'),
(316,41,'fair-0cf851801f8f18537133a14392c57f0d.jpg','image_top'),
(317,41,'fair-b6ff2589fcc0cc81c0acbf668f6bbb56.jpg','image_counter'),
(318,41,'fair-a380ff57280a067a2111b4a19b453e96.jpg','image_monitor'),
(337,43,'fair-d4b454bf5a5611f3db2a22c10a3a1eb0.jpeg','image_totem'),
(338,43,'fair-00af4b6d42ad115a5cb12cf64181c7a6.jpg','image_poster_1'),
(339,43,'fair-0742e6dc1a8869627762f73988c45f8b.jpg','image_poster_2'),
(340,43,'fair-a26d7e62a4a6251e84b7570254b1c954.jpeg','image_top'),
(341,43,'fair-531f02096ca976aade79499c90034c56.jpeg','image_counter'),
(342,43,'fair-7617e88911435f64333e9a4e169d2b6d.png','image_monitor'),
(349,45,'fair-9511c88ad332dee2033f0ddf448cda44.png','image_totem'),
(350,45,'fair-3913bfa9908816291ee9763c7489f664.jpg','image_poster_1'),
(351,45,'fair-825fe980e71287f275be837c15175cec.jpg','image_poster_2'),
(352,45,'fair-59c7dddaca1ec14a054458986e001312.jpeg','image_top'),
(353,45,'fair-9b5dc5b924772dc47e72fe3ed9933ec5.jpg','image_counter'),
(354,45,'fair-5d1f8a0c2f7a84333a6845f0ca86d34e.jpg','image_monitor'),
(355,44,'fair-26753543f8988de1c950a56cf95d8672.png','image_totem'),
(356,44,'fair-b04e6cfbd1b0bc91050cae6160c6af7f.jpg','image_banderole_1'),
(357,44,'fair-3e21ee039f2548348d0d0d0a19f0a88c.jpg','image_banderole_2'),
(358,44,'fair-5e7d788e354a90b5367a39ecc14f15ed.jpg','image_top'),
(359,44,'fair-9c7d2ce26aad4698d857af6f47403cf0.png','image_counter'),
(360,44,'fair-779e39618730a7baf1cd2c458653fe1a.png','image_monitor');

/*Table structure for table `stand_model` */

DROP TABLE IF EXISTS `stand_model`;

CREATE TABLE `stand_model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `stand_model` */

insert  into `stand_model`(`id`,`name`,`state`) values
(1,'Modelo 1',1),
(2,'Modelo 2',1),
(3,'Modelo 3',1),
(4,'Modelo 4',1),
(5,'Modelo 5',1),
(6,'Modelo 6',1),
(7,'Modelo 7',1),
(8,'Modelo 8',1),
(9,'Modelo 9',1);

/*Table structure for table `stand_type` */

DROP TABLE IF EXISTS `stand_type`;

CREATE TABLE `stand_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `stand_type` */

insert  into `stand_type`(`id`,`name`,`state`) values
(1,'ORO',1),
(2,'PLATA',1),
(3,'BRONCE',1);

/*Table structure for table `stand_type_amphitryon` */

DROP TABLE IF EXISTS `stand_type_amphitryon`;

CREATE TABLE `stand_type_amphitryon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stand_type_id` int(11) NOT NULL,
  `stand_amphitryon_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C8A4AD97A4DBF357` (`stand_type_id`),
  KEY `IDX_C8A4AD97181C246E` (`stand_amphitryon_id`),
  CONSTRAINT `FK_C8A4AD97181C246E` FOREIGN KEY (`stand_amphitryon_id`) REFERENCES `stand_amphitryon` (`id`),
  CONSTRAINT `FK_C8A4AD97A4DBF357` FOREIGN KEY (`stand_type_id`) REFERENCES `stand_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `stand_type_amphitryon` */

insert  into `stand_type_amphitryon`(`id`,`stand_type_id`,`stand_amphitryon_id`) values
(1,1,1),
(2,1,2),
(3,1,3),
(4,1,4),
(5,1,5),
(6,1,6),
(9,2,1),
(10,2,2),
(11,2,3),
(12,2,4),
(13,2,5),
(14,2,6),
(17,3,1),
(18,3,2),
(19,3,3),
(20,3,4),
(21,3,5),
(22,3,6);

/*Table structure for table `stand_type_model` */

DROP TABLE IF EXISTS `stand_type_model`;

CREATE TABLE `stand_type_model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stand_type_id` int(11) NOT NULL,
  `stand_model_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_89F3A80DA4DBF357` (`stand_type_id`),
  KEY `IDX_89F3A80DE51D2631` (`stand_model_id`),
  CONSTRAINT `FK_89F3A80DA4DBF357` FOREIGN KEY (`stand_type_id`) REFERENCES `stand_type` (`id`),
  CONSTRAINT `FK_89F3A80DE51D2631` FOREIGN KEY (`stand_model_id`) REFERENCES `stand_model` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `stand_type_model` */

insert  into `stand_type_model`(`id`,`stand_type_id`,`stand_model_id`) values
(1,1,1),
(2,1,2),
(3,1,3),
(4,1,4),
(5,1,5),
(6,2,6),
(7,2,7),
(8,2,8),
(9,3,9);

/*Table structure for table `stand_type_rule` */

DROP TABLE IF EXISTS `stand_type_rule`;

CREATE TABLE `stand_type_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stand_type_id` int(11) NOT NULL,
  `rule` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `IDX_FEFB76B4A4DBF357` (`stand_type_id`),
  CONSTRAINT `FK_FEFB76B4A4DBF357` FOREIGN KEY (`stand_type_id`) REFERENCES `stand_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `stand_type_rule` */

insert  into `stand_type_rule`(`id`,`stand_type_id`,`rule`,`required`,`state`) values
(1,1,'image_monitor',1,1),
(2,1,'image_totem',1,1),
(3,1,'image_banderole_1',1,1),
(4,1,'image_banderole_2',1,1),
(5,1,'image_top',1,1),
(6,1,'image_counter',1,1),
(7,1,'color_1',1,1),
(8,1,'color_2',1,1),
(9,1,'amphitryon',1,1),
(10,1,'video',0,1),
(11,2,'image_monitor',1,1),
(12,2,'image_totem',1,1),
(13,2,'image_poster_1',1,1),
(14,2,'image_top',1,1),
(15,2,'image_counter',1,1),
(16,2,'color_1',1,1),
(17,2,'color_2',1,1),
(18,2,'amphitryon',1,1),
(19,2,'video',0,1),
(20,3,'image_monitor',1,1),
(21,3,'image_banderole_1',1,1),
(22,3,'image_poster_1',1,1),
(23,3,'image_top',1,1),
(24,3,'image_counter',1,1),
(25,3,'color_1',1,1),
(26,3,'color_2',1,1),
(27,3,'amphitryon',1,1),
(28,2,'image_poster_2',1,1),
(29,2,'image_poster_2',1,1);

/*Table structure for table `stand_video` */

DROP TABLE IF EXISTS `stand_video`;

CREATE TABLE `stand_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stand_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_455878779734D487` (`stand_id`),
  CONSTRAINT `FK_455878779734D487` FOREIGN KEY (`stand_id`) REFERENCES `stand` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `stand_video` */

insert  into `stand_video`(`id`,`stand_id`,`name`,`type`) values
(1,1,'https://www.youtube.com/watch?v=Uv8ve234Hbk','monitor'),
(2,3,'https://youtube.com','monitor'),
(3,5,'https://youtube.com','monitor'),
(4,6,'https://youtube.com','monitor'),
(5,7,'https://www.youtube.com/watch?v=zAWsoFk2yVw&start_radio=1&list=RDzAWsoFk2yVw','monitor'),
(6,8,'https://youtube.com','monitor'),
(7,10,'https://youtube.com','monitor'),
(8,25,'https://youtube.com','monitor'),
(12,29,'https://www.youtube.com/watch?v=hzv_NiAsjtU&list=RDhzv_NiAsjtU&start_radio=1','monitor'),
(13,30,'https://www.youtube.com/watch?v=hzv_NiAsjtU&start_radio=1&list=RDhzv_NiAsjtU','monitor'),
(14,31,'https://www.youtube.com/watch?v=eDbUrN3bsv8','monitor'),
(15,32,'https://www.youtube.com/watch?v=eJnQBXmZ7Ek','monitor'),
(16,33,'https://www.youtube.com/watch?v=YxIiPLVR6NA','monitor'),
(21,38,'https://www.youtube.com/watch?v=wDjeBNv6ip0','monitor'),
(22,39,'https://www.youtube.com/watch?v=yIRXDu2VrLc','monitor'),
(24,41,'https://www.youtube.com/watch?v=IZOHopZC6BE','monitor'),
(26,43,'https://www.youtube.com/watch?v=o1tj2zJ2Wvg','monitor'),
(27,44,'https://www.youtube.com/watch?v=1V_xRb0x9aw','monitor'),
(28,45,'https://www.youtube.com/watch?v=gOMhN-hfMtY','monitor');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `last_date_login` datetime NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`surname`,`rol`,`email`,`password`,`created_at`,`last_date_login`,`state`) values
(1,'Admin','Admin','admin','administrador@aptitus.com','$2a$04$GhyfCROls/2mjlHW2cXblOfPmPPS5xefT7JKu7i4dH1iNLBCzJGgm','2017-06-16 12:36:48','2019-08-07 18:09:16',1),
(2,'Ximena','Fernandez','admin','ximena.fernandez@aptitus.pe','$2a$04$GhyfCROls/2mjlHW2cXblOfPmPPS5xefT7JKu7i4dH1iNLBCzJGgm','2018-04-26 10:43:00','2018-04-26 10:46:43',1),
(3,'Adriana','Mendoza','admin','adriana.mendoza@aptitus.pe','$2a$04$GhyfCROls/2mjlHW2cXblOfPmPPS5xefT7JKu7i4dH1iNLBCzJGgm','2018-04-26 10:43:00','2018-04-26 11:01:12',1),
(4,'Cristina','De la Fuente','admin','cristina.delafuente@aptitus.pe','$2a$04$GhyfCROls/2mjlHW2cXblOfPmPPS5xefT7JKu7i4dH1iNLBCzJGgm','2018-04-26 10:43:00','2018-04-26 11:01:20',1),
(5,'Shirley','Cruz','admin','shirley.cruz@aptitus.pe','$2a$04$GhyfCROls/2mjlHW2cXblOfPmPPS5xefT7JKu7i4dH1iNLBCzJGgm','2018-04-26 10:43:00','2018-04-26 11:01:30',1),
(6,'Estefany','Franco','admin','estefany.franco@comercio.com.pe','$2a$04$GhyfCROls/2mjlHW2cXblOfPmPPS5xefT7JKu7i4dH1iNLBCzJGgm','2018-04-26 10:43:00','2018-04-26 11:01:38',1),
(7,'Alejandra','Fonseca','admin','alejandra.fonseca@aptitus.pe','$2a$04$GhyfCROls/2mjlHW2cXblOfPmPPS5xefT7JKu7i4dH1iNLBCzJGgm','2018-04-26 10:43:00','2018-04-26 11:01:48',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
