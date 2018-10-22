/*
SQLyog Ultimate v8.53 
MySQL - 5.5.5-10.1.34-MariaDB : Database - jaag_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`jaag_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `jaag_db`;

/*Table structure for table `account_type_table` */

DROP TABLE IF EXISTS `account_type_table`;

CREATE TABLE `account_type_table` (
  `accountTypeId` int(6) NOT NULL AUTO_INCREMENT,
  `accountType` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`accountTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `account_type_table` */

insert  into `account_type_table`(`accountTypeId`,`accountType`) values (1,'Administrator'),(3,'Walk-in Customer'),(4,'Online Customer'),(5,'Attendant');

/*Table structure for table `address_table` */

DROP TABLE IF EXISTS `address_table`;

CREATE TABLE `address_table` (
  `addressId` int(6) NOT NULL AUTO_INCREMENT,
  `province` varchar(60) DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `barangay` varchar(60) DEFAULT NULL,
  `street` varchar(60) DEFAULT NULL,
  `buildingNumber` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`addressId`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

/*Data for the table `address_table` */

insert  into `address_table`(`addressId`,`province`,`city`,`barangay`,`street`,`buildingNumber`) values (1,'Region 12: SULTAN KUDARAT','CITY OF TACURONG','New Isabela','Malvar Street','65'),(2,'Region 02: BATANES','BASCO (Capital)','Ihubok I (Kaychanarianan)','Lapu- lapu Street','44'),(3,'Region 14: KALINGA','PASIL','Dalupa','Di Makita Street','99'),(12,'Region 12: SULTAN KUDARAT','CITY OF TACURONG','New Isabela','Barangay Road',''),(31,'Region 12: SULTAN KUDARAT','CITY OF TACURONG','San Pablo','',''),(32,'Region 01: ILOCOS NORTE','ADAMS','Adams (Pob.)','',''),(33,'Region 01: LA UNION','AGOO','Ambitacay','',''),(34,'Region 02: ISABELA','ALICIA','Amistad','',''),(35,'Region 02: ISABELA','ALICIA','Amistad','',''),(36,'Region 12: COTABATO (NORTH COTABATO)','ALAMADA','Guiling','',''),(37,'Region 12: SULTAN KUDARAT','BAGUMBAYAN','Kapaya','',''),(38,'Region 02: ISABELA','ALICIA','Amistad','',''),(39,'Region 03: BULACAN','ANGAT','Encanto','','');

/*Table structure for table `booking_table` */

DROP TABLE IF EXISTS `booking_table`;

CREATE TABLE `booking_table` (
  `bookingId` int(6) NOT NULL AUTO_INCREMENT,
  `profileId` int(6) DEFAULT NULL,
  `travelAndTourId` int(6) DEFAULT NULL,
  `bookingStatus` varchar(60) DEFAULT NULL,
  `dateBooked` date DEFAULT NULL,
  `numberOfPaxBooked` int(6) DEFAULT NULL,
  `isAttended` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`bookingId`),
  KEY `FK_booking_table` (`bookingStatus`),
  KEY `FK_booking_table2` (`travelAndTourId`),
  KEY `FK_booking_table123` (`profileId`),
  CONSTRAINT `FK_booking_table123` FOREIGN KEY (`profileId`) REFERENCES `profile_table` (`profileId`),
  CONSTRAINT `FK_booking_table2` FOREIGN KEY (`travelAndTourId`) REFERENCES `travel_and_tour_table` (`travelAndTourId`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

/*Data for the table `booking_table` */

insert  into `booking_table`(`bookingId`,`profileId`,`travelAndTourId`,`bookingStatus`,`dateBooked`,`numberOfPaxBooked`,`isAttended`) values (32,30,11,'Booked','2017-01-01',15,0),(33,31,15,'Booked','2017-10-22',5,1),(34,32,15,'Booked','2017-10-22',5,1),(35,33,15,'Booked','2017-10-22',5,2),(36,34,9,'Booked','2018-10-22',3,2),(37,35,9,'Booked','2018-10-22',4,1),(38,36,9,'Booked','2018-10-22',5,1),(39,37,9,'Booked','2018-10-22',8,0);

/*Table structure for table `comment_table` */

DROP TABLE IF EXISTS `comment_table`;

CREATE TABLE `comment_table` (
  `commentId` int(6) NOT NULL AUTO_INCREMENT,
  `commentInfo` text,
  `profileId` int(6) DEFAULT NULL,
  `dateCommented` date DEFAULT NULL,
  `respond` text,
  PRIMARY KEY (`commentId`),
  KEY `FK_comment_table` (`profileId`),
  CONSTRAINT `FK_comment_table` FOREIGN KEY (`profileId`) REFERENCES `profile_table` (`profileId`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `comment_table` */

/*Table structure for table `destination_table` */

DROP TABLE IF EXISTS `destination_table`;

CREATE TABLE `destination_table` (
  `destinationId` int(6) NOT NULL AUTO_INCREMENT,
  `placeId` int(6) DEFAULT NULL,
  `packageId` int(6) DEFAULT NULL,
  PRIMARY KEY (`destinationId`),
  KEY `FK_destination_table` (`placeId`),
  KEY `FK_destination_table2` (`packageId`),
  CONSTRAINT `FK_destination_table` FOREIGN KEY (`placeId`) REFERENCES `place_table` (`placeId`) ON DELETE SET NULL,
  CONSTRAINT `FK_destination_table2` FOREIGN KEY (`packageId`) REFERENCES `package_table` (`packageId`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `destination_table` */

insert  into `destination_table`(`destinationId`,`placeId`,`packageId`) values (20,1,8),(21,7,8),(22,2,9),(23,4,10),(24,9,11),(25,10,11),(26,12,12);

/*Table structure for table `media_table` */

DROP TABLE IF EXISTS `media_table`;

CREATE TABLE `media_table` (
  `mediaId` int(6) NOT NULL AUTO_INCREMENT,
  `mediaLocation` text,
  `postingId` int(6) DEFAULT NULL,
  `packageId` int(6) DEFAULT NULL,
  `paymentTransactionId` int(6) DEFAULT NULL,
  PRIMARY KEY (`mediaId`),
  KEY `FK_media_table` (`packageId`),
  KEY `FK_media_table3` (`postingId`),
  KEY `FK_media_table1` (`paymentTransactionId`),
  CONSTRAINT `FK_media_table` FOREIGN KEY (`packageId`) REFERENCES `package_table` (`packageId`),
  CONSTRAINT `FK_media_table1` FOREIGN KEY (`paymentTransactionId`) REFERENCES `payment_transaction_table` (`paymentTransactionId`) ON DELETE SET NULL,
  CONSTRAINT `FK_media_table3` FOREIGN KEY (`postingId`) REFERENCES `posting_table` (`postingId`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=latin1;

/*Data for the table `media_table` */

insert  into `media_table`(`mediaId`,`mediaLocation`,`postingId`,`packageId`,`paymentTransactionId`) values (125,'media/4864a56c889b106194f87532303ab9e54.jpg',NULL,7,NULL),(126,'media/989606f1b46a0156e12b8e9fe89a1b18maxresdefault.jpg',NULL,7,NULL),(127,'media/8fc4b63f643ab07da7bef0e4ab61dbeamaxresdefault (1).jpg',NULL,7,NULL),(128,'media/c38725263403ee3f9143e3a1d57a3fd3Hills View Mountain Villa Davao Room Rates (4).jpg',NULL,7,NULL),(129,'media/d4a2d5c74a9da7d25b566bfd571b9237maxresdefault.jpg',NULL,8,NULL),(130,'media/a6e4127a8a29767d8223c867d447c967HillsView03.gif',NULL,8,NULL),(131,'media/d805190621f28e52d9cd25ba52f19f05Upside-Down-Museum.jpg',NULL,8,NULL),(132,'media/ac1afddfd77facd49a1fde048ff156ff1.jpg',NULL,8,NULL),(133,'media/44a3d0f95209a650bb43214921cc5bacRiv.jpg',NULL,9,NULL),(134,'media/789e7994255d606a838efeabc45ac2bbSurigao-del-Sur-Bogac-Spring.png',NULL,9,NULL),(136,'media/8af5419f967f1958552addc741cdd946talikudislandhead.png',NULL,10,NULL),(137,'media/609051fb7b15d69193b279a19e6ac27bIsla-Reta-Beach-Featured-620x330.jpg',NULL,10,NULL),(138,'media/7c2cf43d60b39b28b96ed818956b2a0dasikasik7.jpg',NULL,11,NULL),(139,'media/1092a128d4b1d829f41bc34d511844aeimages.jpg',NULL,11,NULL),(140,'media/801cf590b7a27c24d6d887d94fa2dcb2camiguin.jpg',NULL,12,NULL),(141,'media/2d2c8b1f8ea94136819f2681a30872f4mantigue-island-camiguin-travelanyway.jpg',NULL,12,NULL);

/*Table structure for table `mode_of_payment_table` */

DROP TABLE IF EXISTS `mode_of_payment_table`;

CREATE TABLE `mode_of_payment_table` (
  `modeOfPaymentId` int(6) NOT NULL AUTO_INCREMENT,
  `paymentMode` varchar(60) DEFAULT NULL,
  `nameOfRemittanceOrBank` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`modeOfPaymentId`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `mode_of_payment_table` */

insert  into `mode_of_payment_table`(`modeOfPaymentId`,`paymentMode`,`nameOfRemittanceOrBank`) values (4,'Bank Remittance','BDO'),(5,'Bank Remittance','DBP'),(6,'Bank Remittance','Metro Bank'),(7,'Bank Remittance','EastWest'),(8,'Bank Remittance','BPI'),(9,'Bank Remittance','Union Bank'),(10,'Bank Remittance','China Bank'),(11,'Bank Remittance','PNB'),(12,'Bank Remittance','RCBC'),(13,'Bank Remittance','Security Bank'),(14,'Remittance','Palawan Express Pera Padala'),(15,'Remittance','Cebuana Lhuillier Pera Padala'),(16,'Remittance','Western Union Sulit Padala and Overseas Money Transfer'),(17,'Remittance','M Lhuillier Kwarta Padala'),(18,'Remittance','LBC Instant Peso Padala'),(19,'Remittance','TrueMoney Money Padala'),(20,'Remittance','RD Pawnshop Cash Padala'),(21,'Remittance','Smart Money'),(22,'Remittance','Globe Gcash'),(23,'In House',NULL);

/*Table structure for table `notification_table` */

DROP TABLE IF EXISTS `notification_table`;

CREATE TABLE `notification_table` (
  `notificationId` int(6) NOT NULL AUTO_INCREMENT,
  `notificationMessage` text,
  `profileId` int(6) DEFAULT NULL,
  `dateAndTime` datetime DEFAULT NULL,
  `isRead` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`notificationId`),
  KEY `FK_notification_table` (`profileId`),
  CONSTRAINT `FK_notification_table` FOREIGN KEY (`profileId`) REFERENCES `profile_table` (`profileId`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

/*Data for the table `notification_table` */

insert  into `notification_table`(`notificationId`,`notificationMessage`,`profileId`,`dateAndTime`,`isRead`) values (23,'The Travel and Tour ID: 11 is Finished',30,'2018-10-22 10:12:09',0),(24,'The Travel and Tour ID: 15 is Finished',31,'2018-10-22 10:25:09',0),(25,'The Travel and Tour ID: 15 is Finished',32,'2018-10-22 10:25:10',0),(26,'The Travel and Tour ID: 15 is Finished',33,'2018-10-22 10:25:10',0),(27,'The Travel and Tour ID: 9 is Finished',34,'2018-10-22 10:41:39',0),(28,'The Travel and Tour ID: 9 is Finished',35,'2018-10-22 10:41:40',0),(29,'The Travel and Tour ID: 9 is Finished',36,'2018-10-22 10:41:40',0),(30,'The Travel and Tour ID: 9 is Finished',37,'2018-10-22 10:41:40',0),(31,'The Travel and Tour ID: 9 is Fully Booked',34,'2018-10-22 10:43:34',0),(32,'The Travel and Tour ID: 9 is Fully Booked',35,'2018-10-22 10:43:37',0),(33,'The Travel and Tour ID: 9 is Fully Booked',36,'2018-10-22 10:43:37',0),(34,'The Travel and Tour ID: 9 is Fully Booked',37,'2018-10-22 10:43:38',0),(35,'The Travel and Tour ID: 9 is Fully Booked',34,'2018-10-22 10:43:38',0),(36,'The Travel and Tour ID: 9 is Fully Booked',35,'2018-10-22 10:43:38',0),(37,'The Travel and Tour ID: 9 is Fully Booked',36,'2018-10-22 10:43:39',0),(38,'The Travel and Tour ID: 9 is Fully Booked',37,'2018-10-22 10:43:39',0);

/*Table structure for table `package_table` */

DROP TABLE IF EXISTS `package_table`;

CREATE TABLE `package_table` (
  `packageId` int(6) NOT NULL AUTO_INCREMENT,
  `packageName` varchar(60) DEFAULT NULL,
  `packageDetails` text,
  `inclusion` text,
  `exclusion` text,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`packageId`),
  KEY `FK_package_table1` (`price`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `package_table` */

insert  into `package_table`(`packageId`,`packageName`,`packageDetails`,`inclusion`,`exclusion`,`price`) values (7,'Buda Tour','Its a day tour and A beautiful view of BUDA that you cant forget.','Transportation','Meals',700),(8,'Buda + Upside down Museum Tour','A day tour with a 2n1 travel destination.','Transportation','Meals, Entrances',800),(9,'Surigao Tour','A Travel and tour with split adventures.','Transportation','Meals, entrances',1299),(10,'Talicud Island Tour','Beaches that you will love at first sight.','Transportation','Meals, Entrances',1399),(11,'Asik-Asik Falls Tour','Lets explore Asik-asik falls','Transportation, Tour guide','Meals, Entrances',1399),(12,'Camiguin Tour','Lets explore the beauty of Camiguin Island.','Transaportation, Tour guide','Meals, ',1569);

/*Table structure for table `payment_transaction_table` */

DROP TABLE IF EXISTS `payment_transaction_table`;

CREATE TABLE `payment_transaction_table` (
  `paymentTransactionId` int(6) NOT NULL AUTO_INCREMENT,
  `modeOfPaymentId` int(6) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `dateOfPayment` date DEFAULT NULL,
  `transactionNumber` varchar(60) DEFAULT NULL,
  `nameOfSender` varchar(60) DEFAULT NULL,
  `paymentStatus` varchar(60) DEFAULT NULL,
  `bookingId` int(6) DEFAULT NULL,
  `paymentType` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`paymentTransactionId`),
  KEY `FK_payment_transaction_table` (`paymentStatus`),
  KEY `FK_payment_transaction_table123344` (`modeOfPaymentId`),
  KEY `FK_payment_transaction_table123123` (`bookingId`),
  CONSTRAINT `FK_payment_transaction_table123123` FOREIGN KEY (`bookingId`) REFERENCES `booking_table` (`bookingId`),
  CONSTRAINT `FK_payment_transaction_table123344` FOREIGN KEY (`modeOfPaymentId`) REFERENCES `mode_of_payment_table` (`modeOfPaymentId`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

/*Data for the table `payment_transaction_table` */

insert  into `payment_transaction_table`(`paymentTransactionId`,`modeOfPaymentId`,`amount`,`dateOfPayment`,`transactionNumber`,`nameOfSender`,`paymentStatus`,`bookingId`,`paymentType`) values (44,23,9742.5,'2017-10-01','','','Recieved',32,'Full Payment'),(45,23,4000,'2017-10-22','','','Recieved',33,'Full Payment'),(46,23,4000,'2017-10-22','','','Recieved',34,'Full Payment'),(47,23,4000,'2017-10-22','','','Recieved',35,'Full Payment'),(48,23,2400,'2018-10-22','','','Recieved',36,'Full Payment'),(49,23,3200,'2018-10-22','','','Recieved',37,'Full Payment'),(50,23,4000,'2018-10-22','','','Recieved',38,'Full Payment'),(51,23,6400,'2018-10-22','','','Recieved',39,'Full Payment');

/*Table structure for table `place_table` */

DROP TABLE IF EXISTS `place_table`;

CREATE TABLE `place_table` (
  `placeId` int(6) NOT NULL AUTO_INCREMENT,
  `placeName` varchar(60) DEFAULT NULL,
  `latitude` varchar(60) DEFAULT NULL,
  `longitude` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`placeId`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `place_table` */

insert  into `place_table`(`placeId`,`placeName`,`latitude`,`longitude`) values (1,'Davao City','7.18958','125.450342'),(2,'Surigao City','9.757262','125.513613'),(3,'Siargao City','9.848018','126.047856'),(4,'Talicud Island','6.929346','125.702456'),(5,'Sitio Maupot','7.106885','125.147730'),(6,'Lake Agco','7.017518','125.223099'),(7,'Buda','7.519009','125.237682'),(8,'Britania','8.700732','126.207376'),(9,'Alameda','8.733700','126.202191'),(10,'Asik asik','7.561677','124.535513'),(11,'Bohol','9.657822','123.850521'),(12,'Camiguin Island','9.175038','124.729034'),(13,'Dapitan','8.625101','123.392629'),(14,'Dakak','8.695429','123.393344'),(15,'Gloria Fantasy Tour','8.647023','123.417672'),(16,'Dinagat','10.121927','125.587540'),(17,'Garden of Tour','14.562977','120.989999'),(18,'Up-side Down Museum','14.554531','120.987396'),(19,'New Israel','6.920208','125.189145'),(20,'Lake Sebu','6.243647','124.552497'),(21,'Sohoton','9.600213','125.916649'),(22,'Talikud','6.929611','125.702675');

/*Table structure for table `posting_table` */

DROP TABLE IF EXISTS `posting_table`;

CREATE TABLE `posting_table` (
  `postingId` int(6) NOT NULL AUTO_INCREMENT,
  `postingDescription` text,
  `datePosted` date DEFAULT NULL,
  `profileId` int(6) DEFAULT NULL,
  PRIMARY KEY (`postingId`),
  KEY `FK_posting_table` (`profileId`),
  CONSTRAINT `FK_posting_table` FOREIGN KEY (`profileId`) REFERENCES `profile_table` (`profileId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `posting_table` */

/*Table structure for table `profile_table` */

DROP TABLE IF EXISTS `profile_table`;

CREATE TABLE `profile_table` (
  `profileId` int(6) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(60) DEFAULT NULL,
  `middleName` varchar(60) DEFAULT NULL,
  `lastName` varchar(60) DEFAULT NULL,
  `contactNumber` varchar(60) DEFAULT NULL,
  `addressId` int(6) DEFAULT NULL,
  `accountTypeId` int(6) DEFAULT NULL,
  `userName` varchar(60) DEFAULT NULL,
  `passWord` varchar(60) DEFAULT NULL,
  `isDeleted` tinyint(1) DEFAULT '0',
  `isActivated` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`profileId`),
  KEY `FK_profile_table` (`accountTypeId`),
  KEY `FK_profile_table1` (`addressId`),
  CONSTRAINT `FK_profile_table` FOREIGN KEY (`accountTypeId`) REFERENCES `account_type_table` (`accountTypeId`),
  CONSTRAINT `FK_profile_table1` FOREIGN KEY (`addressId`) REFERENCES `address_table` (`addressId`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Data for the table `profile_table` */

insert  into `profile_table`(`profileId`,`firstName`,`middleName`,`lastName`,`contactNumber`,`addressId`,`accountTypeId`,`userName`,`passWord`,`isDeleted`,`isActivated`) values (2,'Arra Mae','Pablo','Agusan','09057640585',1,1,'admin','21232f297a57a5a743894a0e4a801fc3',0,1),(3,'Alberto','Ranga','Madula','09754363944',2,4,'customer','91ec1f9324753048c0096d036a694f86',0,1),(4,'Mariella','Gumela','Vettan','09368545152',3,4,'customer1','91ec1f9324753048c0096d036a694f86',0,1),(13,'Daniel','Benson','DeVera','09754363944',12,5,'daniel2620','8bd39eae38511daad6152e84545e504d',0,1),(29,'John','Dela Vega','Dela Cruz','09778877109',31,4,'customer2','5ce4d191fd14ac85a1469fb8c29b7a7b',0,1),(30,'Ana','Lego','Cruz','09279864136',32,3,NULL,NULL,0,0),(31,'Mean','Median','Mode','09279864136',33,3,NULL,NULL,0,0),(32,'Rhea','Mae','Gopez','',34,3,NULL,NULL,0,0),(33,'San','Min','Soo','09279864136',35,3,NULL,NULL,0,0),(34,'Mae','Lopez','Go','',36,3,NULL,NULL,0,0),(35,'Jeffrey','Mer','Bantillo','',37,3,NULL,NULL,0,0),(36,'Eladio','hdhs','Damandaman','',38,3,NULL,NULL,0,0),(37,'Ben','Merici','Benido','',39,3,NULL,NULL,0,0);

/*Table structure for table `travel_and_tour_table` */

DROP TABLE IF EXISTS `travel_and_tour_table`;

CREATE TABLE `travel_and_tour_table` (
  `travelAndTourId` int(6) NOT NULL AUTO_INCREMENT,
  `packageId` int(6) DEFAULT NULL,
  `departureDate` date DEFAULT NULL,
  `returnDate` date DEFAULT NULL,
  `maxPax` int(6) DEFAULT NULL,
  `travelAndTourStatus` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`travelAndTourId`),
  KEY `FK_travel_and_tour_table` (`packageId`),
  CONSTRAINT `FK_travel_and_tour_table` FOREIGN KEY (`packageId`) REFERENCES `package_table` (`packageId`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `travel_and_tour_table` */

insert  into `travel_and_tour_table`(`travelAndTourId`,`packageId`,`departureDate`,`returnDate`,`maxPax`,`travelAndTourStatus`) values (8,7,'2018-11-12','2018-11-12',15,'Available'),(9,8,'2018-10-26','2018-10-26',20,'Fully Booked'),(10,8,'2018-11-21','2018-11-21',45,'Available'),(11,9,'2017-10-22','2017-10-24',15,'Finished'),(12,8,'2018-10-25','2018-10-27',15,'Available'),(13,11,'2018-11-13','2018-11-15',20,'Available'),(14,11,'2018-11-07','2018-11-09',30,'Available'),(15,8,'2017-01-11','2017-01-11',15,'Finished'),(16,11,'2018-12-28','2018-12-28',15,'Available'),(17,12,'2017-01-10','2017-01-13',50,'Available'),(18,10,'2017-02-05','2017-02-08',20,'Available');

/*Table structure for table `booking_view` */

DROP TABLE IF EXISTS `booking_view`;

/*!50001 DROP VIEW IF EXISTS `booking_view` */;
/*!50001 DROP TABLE IF EXISTS `booking_view` */;

/*!50001 CREATE TABLE  `booking_view`(
 `bookingId` int(6) ,
 `profileId` int(6) ,
 `travelAndTourId` int(6) ,
 `bookingStatus` varchar(60) ,
 `dateBooked` date ,
 `numberOfPaxBooked` int(6) ,
 `isAttended` tinyint(1) ,
 `packageId` int(6) ,
 `departureDate` date ,
 `returnDate` date ,
 `maxPax` int(6) ,
 `travelAndTourStatus` varchar(60) ,
 `packageName` varchar(60) ,
 `packageDetails` text ,
 `inclusion` text ,
 `exclusion` text ,
 `price` double ,
 `firstName` varchar(60) ,
 `middleName` varchar(60) ,
 `lastName` varchar(60) ,
 `contactNumber` varchar(60) ,
 `addressId` int(6) ,
 `accountTypeId` int(6) ,
 `userName` varchar(60) ,
 `passWord` varchar(60) ,
 `isDeleted` tinyint(1) ,
 `accountType` varchar(60) ,
 `province` varchar(60) ,
 `city` varchar(60) ,
 `barangay` varchar(60) ,
 `street` varchar(60) ,
 `buildingNumber` varchar(60) 
)*/;

/*Table structure for table `comment_view` */

DROP TABLE IF EXISTS `comment_view`;

/*!50001 DROP VIEW IF EXISTS `comment_view` */;
/*!50001 DROP TABLE IF EXISTS `comment_view` */;

/*!50001 CREATE TABLE  `comment_view`(
 `respond` text ,
 `commentId` int(6) ,
 `commentInfo` text ,
 `profileId` int(6) ,
 `dateCommented` date ,
 `firstName` varchar(60) ,
 `middleName` varchar(60) ,
 `lastName` varchar(60) ,
 `contactNumber` varchar(60) ,
 `accountTypeId` int(6) ,
 `accountType` varchar(60) ,
 `userName` varchar(60) 
)*/;

/*Table structure for table `destination_view` */

DROP TABLE IF EXISTS `destination_view`;

/*!50001 DROP VIEW IF EXISTS `destination_view` */;
/*!50001 DROP TABLE IF EXISTS `destination_view` */;

/*!50001 CREATE TABLE  `destination_view`(
 `destinationId` int(6) ,
 `placeId` int(6) ,
 `packageId` int(6) ,
 `placeName` varchar(60) ,
 `latitude` varchar(60) ,
 `longitude` varchar(60) 
)*/;

/*Table structure for table `mode_of_payment_view` */

DROP TABLE IF EXISTS `mode_of_payment_view`;

/*!50001 DROP VIEW IF EXISTS `mode_of_payment_view` */;
/*!50001 DROP TABLE IF EXISTS `mode_of_payment_view` */;

/*!50001 CREATE TABLE  `mode_of_payment_view`(
 `modeOfPaymentId` int(6) ,
 `paymentMode` varchar(60) ,
 `nameOfRemittanceOrBank` varchar(60) 
)*/;

/*Table structure for table `notification_view` */

DROP TABLE IF EXISTS `notification_view`;

/*!50001 DROP VIEW IF EXISTS `notification_view` */;
/*!50001 DROP TABLE IF EXISTS `notification_view` */;

/*!50001 CREATE TABLE  `notification_view`(
 `notificationId` int(6) ,
 `notificationMessage` text ,
 `profileId` int(6) ,
 `dateAndTime` datetime ,
 `isRead` tinyint(1) ,
 `firstName` varchar(60) ,
 `middleName` varchar(60) ,
 `lastName` varchar(60) ,
 `contactNumber` varchar(60) ,
 `accountTypeId` int(6) ,
 `accountType` varchar(60) 
)*/;

/*Table structure for table `package_media_view` */

DROP TABLE IF EXISTS `package_media_view`;

/*!50001 DROP VIEW IF EXISTS `package_media_view` */;
/*!50001 DROP TABLE IF EXISTS `package_media_view` */;

/*!50001 CREATE TABLE  `package_media_view`(
 `mediaId` int(6) ,
 `mediaLocation` text ,
 `packageId` int(6) ,
 `packageName` varchar(60) 
)*/;

/*Table structure for table `package_view` */

DROP TABLE IF EXISTS `package_view`;

/*!50001 DROP VIEW IF EXISTS `package_view` */;
/*!50001 DROP TABLE IF EXISTS `package_view` */;

/*!50001 CREATE TABLE  `package_view`(
 `packageId` int(6) ,
 `packageName` varchar(60) ,
 `packageDetails` text ,
 `inclusion` text ,
 `exclusion` text ,
 `price` double 
)*/;

/*Table structure for table `payment_transaction_media_view` */

DROP TABLE IF EXISTS `payment_transaction_media_view`;

/*!50001 DROP VIEW IF EXISTS `payment_transaction_media_view` */;
/*!50001 DROP TABLE IF EXISTS `payment_transaction_media_view` */;

/*!50001 CREATE TABLE  `payment_transaction_media_view`(
 `mediaId` int(6) ,
 `mediaLocation` text ,
 `paymentTransactionId` int(6) ,
 `modeOfPaymentId` int(6) ,
 `amount` double ,
 `dateOfPayment` date ,
 `transactionNumber` varchar(60) ,
 `nameOfSender` varchar(60) ,
 `paymentStatus` varchar(60) ,
 `bookingId` int(6) ,
 `paymentType` varchar(60) 
)*/;

/*Table structure for table `payment_transaction_view` */

DROP TABLE IF EXISTS `payment_transaction_view`;

/*!50001 DROP VIEW IF EXISTS `payment_transaction_view` */;
/*!50001 DROP TABLE IF EXISTS `payment_transaction_view` */;

/*!50001 CREATE TABLE  `payment_transaction_view`(
 `paymentTransactionId` int(6) ,
 `modeOfPaymentId` int(6) ,
 `amount` double ,
 `dateOfPayment` date ,
 `transactionNumber` varchar(60) ,
 `nameOfSender` varchar(60) ,
 `paymentStatus` varchar(60) ,
 `bookingId` int(6) ,
 `paymentType` varchar(60) ,
 `paymentMode` varchar(60) ,
 `nameOfRemittanceOrBank` varchar(60) ,
 `profileId` int(6) ,
 `travelAndTourId` int(6) ,
 `bookingStatus` varchar(60) ,
 `dateBooked` date ,
 `numberOfPaxBooked` int(6) ,
 `firstName` varchar(60) ,
 `middleName` varchar(60) ,
 `lastName` varchar(60) ,
 `contactNumber` varchar(60) ,
 `addressId` int(6) ,
 `accountTypeId` int(6) ,
 `userName` varchar(60) ,
 `passWord` varchar(60) ,
 `isDeleted` tinyint(1) ,
 `packageId` int(6) ,
 `departureDate` date ,
 `returnDate` date ,
 `maxPax` int(6) ,
 `travelAndTourStatus` varchar(60) ,
 `packageName` varchar(60) ,
 `packageDetails` text ,
 `inclusion` text ,
 `exclusion` text ,
 `price` double 
)*/;

/*Table structure for table `place_view` */

DROP TABLE IF EXISTS `place_view`;

/*!50001 DROP VIEW IF EXISTS `place_view` */;
/*!50001 DROP TABLE IF EXISTS `place_view` */;

/*!50001 CREATE TABLE  `place_view`(
 `placeId` int(6) ,
 `placeName` varchar(60) ,
 `latitude` varchar(60) ,
 `longitude` varchar(60) 
)*/;

/*Table structure for table `posting_media_view` */

DROP TABLE IF EXISTS `posting_media_view`;

/*!50001 DROP VIEW IF EXISTS `posting_media_view` */;
/*!50001 DROP TABLE IF EXISTS `posting_media_view` */;

/*!50001 CREATE TABLE  `posting_media_view`(
 `mediaId` int(6) ,
 `mediaLocation` text ,
 `postingId` int(6) 
)*/;

/*Table structure for table `posting_view` */

DROP TABLE IF EXISTS `posting_view`;

/*!50001 DROP VIEW IF EXISTS `posting_view` */;
/*!50001 DROP TABLE IF EXISTS `posting_view` */;

/*!50001 CREATE TABLE  `posting_view`(
 `postingId` int(6) ,
 `postingDescription` text ,
 `datePosted` date ,
 `profileId` int(6) ,
 `firstName` varchar(60) ,
 `middleName` varchar(60) ,
 `lastName` varchar(60) ,
 `accountTypeId` int(6) ,
 `accountType` varchar(60) 
)*/;

/*Table structure for table `profile_view` */

DROP TABLE IF EXISTS `profile_view`;

/*!50001 DROP VIEW IF EXISTS `profile_view` */;
/*!50001 DROP TABLE IF EXISTS `profile_view` */;

/*!50001 CREATE TABLE  `profile_view`(
 `profileId` int(6) ,
 `firstName` varchar(60) ,
 `middleName` varchar(60) ,
 `lastName` varchar(60) ,
 `contactNumber` varchar(60) ,
 `addressId` int(6) ,
 `accountTypeId` int(6) ,
 `userName` varchar(60) ,
 `passWord` varchar(60) ,
 `isDeleted` tinyint(1) ,
 `isActivated` tinyint(1) ,
 `province` varchar(60) ,
 `city` varchar(60) ,
 `barangay` varchar(60) ,
 `street` varchar(60) ,
 `buildingNumber` varchar(60) ,
 `accountType` varchar(60) 
)*/;

/*Table structure for table `travel_and_tour_view` */

DROP TABLE IF EXISTS `travel_and_tour_view`;

/*!50001 DROP VIEW IF EXISTS `travel_and_tour_view` */;
/*!50001 DROP TABLE IF EXISTS `travel_and_tour_view` */;

/*!50001 CREATE TABLE  `travel_and_tour_view`(
 `travelAndTourId` int(6) ,
 `packageId` int(6) ,
 `departureDate` date ,
 `returnDate` date ,
 `maxPax` int(6) ,
 `travelAndTourStatus` varchar(60) ,
 `packageName` varchar(60) ,
 `packageDetails` text ,
 `inclusion` text ,
 `exclusion` text ,
 `price` double 
)*/;

/*View structure for view booking_view */

/*!50001 DROP TABLE IF EXISTS `booking_view` */;
/*!50001 DROP VIEW IF EXISTS `booking_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `booking_view` AS select `booking_table`.`bookingId` AS `bookingId`,`booking_table`.`profileId` AS `profileId`,`booking_table`.`travelAndTourId` AS `travelAndTourId`,`booking_table`.`bookingStatus` AS `bookingStatus`,`booking_table`.`dateBooked` AS `dateBooked`,`booking_table`.`numberOfPaxBooked` AS `numberOfPaxBooked`,`booking_table`.`isAttended` AS `isAttended`,`travel_and_tour_table`.`packageId` AS `packageId`,`travel_and_tour_table`.`departureDate` AS `departureDate`,`travel_and_tour_table`.`returnDate` AS `returnDate`,`travel_and_tour_table`.`maxPax` AS `maxPax`,`travel_and_tour_table`.`travelAndTourStatus` AS `travelAndTourStatus`,`package_table`.`packageName` AS `packageName`,`package_table`.`packageDetails` AS `packageDetails`,`package_table`.`inclusion` AS `inclusion`,`package_table`.`exclusion` AS `exclusion`,`package_table`.`price` AS `price`,`profile_table`.`firstName` AS `firstName`,`profile_table`.`middleName` AS `middleName`,`profile_table`.`lastName` AS `lastName`,`profile_table`.`contactNumber` AS `contactNumber`,`profile_table`.`addressId` AS `addressId`,`profile_table`.`accountTypeId` AS `accountTypeId`,`profile_table`.`userName` AS `userName`,`profile_table`.`passWord` AS `passWord`,`profile_table`.`isDeleted` AS `isDeleted`,`account_type_table`.`accountType` AS `accountType`,`address_table`.`province` AS `province`,`address_table`.`city` AS `city`,`address_table`.`barangay` AS `barangay`,`address_table`.`street` AS `street`,`address_table`.`buildingNumber` AS `buildingNumber` from (((((`booking_table` join `travel_and_tour_table` on((`booking_table`.`travelAndTourId` = `travel_and_tour_table`.`travelAndTourId`))) join `package_table` on((`travel_and_tour_table`.`packageId` = `package_table`.`packageId`))) join `profile_table` on((`booking_table`.`profileId` = `profile_table`.`profileId`))) join `address_table` on((`profile_table`.`addressId` = `address_table`.`addressId`))) join `account_type_table` on((`profile_table`.`accountTypeId` = `account_type_table`.`accountTypeId`))) */;

/*View structure for view comment_view */

/*!50001 DROP TABLE IF EXISTS `comment_view` */;
/*!50001 DROP VIEW IF EXISTS `comment_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `comment_view` AS select `comment_table`.`respond` AS `respond`,`comment_table`.`commentId` AS `commentId`,`comment_table`.`commentInfo` AS `commentInfo`,`comment_table`.`profileId` AS `profileId`,`comment_table`.`dateCommented` AS `dateCommented`,`profile_table`.`firstName` AS `firstName`,`profile_table`.`middleName` AS `middleName`,`profile_table`.`lastName` AS `lastName`,`profile_table`.`contactNumber` AS `contactNumber`,`profile_table`.`accountTypeId` AS `accountTypeId`,`account_type_table`.`accountType` AS `accountType`,`profile_table`.`userName` AS `userName` from ((`profile_table` join `account_type_table` on((`profile_table`.`accountTypeId` = `account_type_table`.`accountTypeId`))) join `comment_table` on((`comment_table`.`profileId` = `profile_table`.`profileId`))) */;

/*View structure for view destination_view */

/*!50001 DROP TABLE IF EXISTS `destination_view` */;
/*!50001 DROP VIEW IF EXISTS `destination_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `destination_view` AS select `destination_table`.`destinationId` AS `destinationId`,`destination_table`.`placeId` AS `placeId`,`destination_table`.`packageId` AS `packageId`,`place_table`.`placeName` AS `placeName`,`place_table`.`latitude` AS `latitude`,`place_table`.`longitude` AS `longitude` from (`destination_table` join `place_table` on((`destination_table`.`placeId` = `place_table`.`placeId`))) */;

/*View structure for view mode_of_payment_view */

/*!50001 DROP TABLE IF EXISTS `mode_of_payment_view` */;
/*!50001 DROP VIEW IF EXISTS `mode_of_payment_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mode_of_payment_view` AS select `mode_of_payment_table`.`modeOfPaymentId` AS `modeOfPaymentId`,`mode_of_payment_table`.`paymentMode` AS `paymentMode`,`mode_of_payment_table`.`nameOfRemittanceOrBank` AS `nameOfRemittanceOrBank` from `mode_of_payment_table` */;

/*View structure for view notification_view */

/*!50001 DROP TABLE IF EXISTS `notification_view` */;
/*!50001 DROP VIEW IF EXISTS `notification_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `notification_view` AS select `notification_table`.`notificationId` AS `notificationId`,`notification_table`.`notificationMessage` AS `notificationMessage`,`notification_table`.`profileId` AS `profileId`,`notification_table`.`dateAndTime` AS `dateAndTime`,`notification_table`.`isRead` AS `isRead`,`profile_table`.`firstName` AS `firstName`,`profile_table`.`middleName` AS `middleName`,`profile_table`.`lastName` AS `lastName`,`profile_table`.`contactNumber` AS `contactNumber`,`profile_table`.`accountTypeId` AS `accountTypeId`,`account_type_table`.`accountType` AS `accountType` from ((`notification_table` join `profile_table` on((`notification_table`.`profileId` = `profile_table`.`profileId`))) join `account_type_table` on((`profile_table`.`accountTypeId` = `account_type_table`.`accountTypeId`))) */;

/*View structure for view package_media_view */

/*!50001 DROP TABLE IF EXISTS `package_media_view` */;
/*!50001 DROP VIEW IF EXISTS `package_media_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `package_media_view` AS select `media_table`.`mediaId` AS `mediaId`,`media_table`.`mediaLocation` AS `mediaLocation`,`media_table`.`packageId` AS `packageId`,`package_table`.`packageName` AS `packageName` from (`media_table` join `package_table` on((`media_table`.`packageId` = `package_table`.`packageId`))) */;

/*View structure for view package_view */

/*!50001 DROP TABLE IF EXISTS `package_view` */;
/*!50001 DROP VIEW IF EXISTS `package_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `package_view` AS select `package_table`.`packageId` AS `packageId`,`package_table`.`packageName` AS `packageName`,`package_table`.`packageDetails` AS `packageDetails`,`package_table`.`inclusion` AS `inclusion`,`package_table`.`exclusion` AS `exclusion`,`package_table`.`price` AS `price` from `package_table` */;

/*View structure for view payment_transaction_media_view */

/*!50001 DROP TABLE IF EXISTS `payment_transaction_media_view` */;
/*!50001 DROP VIEW IF EXISTS `payment_transaction_media_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `payment_transaction_media_view` AS select `media_table`.`mediaId` AS `mediaId`,`media_table`.`mediaLocation` AS `mediaLocation`,`media_table`.`paymentTransactionId` AS `paymentTransactionId`,`payment_transaction_table`.`modeOfPaymentId` AS `modeOfPaymentId`,`payment_transaction_table`.`amount` AS `amount`,`payment_transaction_table`.`dateOfPayment` AS `dateOfPayment`,`payment_transaction_table`.`transactionNumber` AS `transactionNumber`,`payment_transaction_table`.`nameOfSender` AS `nameOfSender`,`payment_transaction_table`.`paymentStatus` AS `paymentStatus`,`payment_transaction_table`.`bookingId` AS `bookingId`,`payment_transaction_table`.`paymentType` AS `paymentType` from (`media_table` join `payment_transaction_table` on((`media_table`.`paymentTransactionId` = `payment_transaction_table`.`paymentTransactionId`))) */;

/*View structure for view payment_transaction_view */

/*!50001 DROP TABLE IF EXISTS `payment_transaction_view` */;
/*!50001 DROP VIEW IF EXISTS `payment_transaction_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `payment_transaction_view` AS select `payment_transaction_table`.`paymentTransactionId` AS `paymentTransactionId`,`payment_transaction_table`.`modeOfPaymentId` AS `modeOfPaymentId`,`payment_transaction_table`.`amount` AS `amount`,`payment_transaction_table`.`dateOfPayment` AS `dateOfPayment`,`payment_transaction_table`.`transactionNumber` AS `transactionNumber`,`payment_transaction_table`.`nameOfSender` AS `nameOfSender`,`payment_transaction_table`.`paymentStatus` AS `paymentStatus`,`payment_transaction_table`.`bookingId` AS `bookingId`,`payment_transaction_table`.`paymentType` AS `paymentType`,`mode_of_payment_table`.`paymentMode` AS `paymentMode`,`mode_of_payment_table`.`nameOfRemittanceOrBank` AS `nameOfRemittanceOrBank`,`booking_table`.`profileId` AS `profileId`,`booking_table`.`travelAndTourId` AS `travelAndTourId`,`booking_table`.`bookingStatus` AS `bookingStatus`,`booking_table`.`dateBooked` AS `dateBooked`,`booking_table`.`numberOfPaxBooked` AS `numberOfPaxBooked`,`profile_table`.`firstName` AS `firstName`,`profile_table`.`middleName` AS `middleName`,`profile_table`.`lastName` AS `lastName`,`profile_table`.`contactNumber` AS `contactNumber`,`profile_table`.`addressId` AS `addressId`,`profile_table`.`accountTypeId` AS `accountTypeId`,`profile_table`.`userName` AS `userName`,`profile_table`.`passWord` AS `passWord`,`profile_table`.`isDeleted` AS `isDeleted`,`travel_and_tour_table`.`packageId` AS `packageId`,`travel_and_tour_table`.`departureDate` AS `departureDate`,`travel_and_tour_table`.`returnDate` AS `returnDate`,`travel_and_tour_table`.`maxPax` AS `maxPax`,`travel_and_tour_table`.`travelAndTourStatus` AS `travelAndTourStatus`,`package_table`.`packageName` AS `packageName`,`package_table`.`packageDetails` AS `packageDetails`,`package_table`.`inclusion` AS `inclusion`,`package_table`.`exclusion` AS `exclusion`,`package_table`.`price` AS `price` from (((((`payment_transaction_table` join `mode_of_payment_table` on((`payment_transaction_table`.`modeOfPaymentId` = `mode_of_payment_table`.`modeOfPaymentId`))) join `booking_table` on((`payment_transaction_table`.`bookingId` = `booking_table`.`bookingId`))) join `travel_and_tour_table` on((`booking_table`.`travelAndTourId` = `travel_and_tour_table`.`travelAndTourId`))) join `package_table` on((`travel_and_tour_table`.`packageId` = `package_table`.`packageId`))) join `profile_table` on((`booking_table`.`profileId` = `profile_table`.`profileId`))) */;

/*View structure for view place_view */

/*!50001 DROP TABLE IF EXISTS `place_view` */;
/*!50001 DROP VIEW IF EXISTS `place_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `place_view` AS select `place_table`.`placeId` AS `placeId`,`place_table`.`placeName` AS `placeName`,`place_table`.`latitude` AS `latitude`,`place_table`.`longitude` AS `longitude` from `place_table` */;

/*View structure for view posting_media_view */

/*!50001 DROP TABLE IF EXISTS `posting_media_view` */;
/*!50001 DROP VIEW IF EXISTS `posting_media_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `posting_media_view` AS select `media_table`.`mediaId` AS `mediaId`,`media_table`.`mediaLocation` AS `mediaLocation`,`media_table`.`postingId` AS `postingId` from (`media_table` join `posting_table` on((`media_table`.`postingId` = `posting_table`.`postingId`))) */;

/*View structure for view posting_view */

/*!50001 DROP TABLE IF EXISTS `posting_view` */;
/*!50001 DROP VIEW IF EXISTS `posting_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `posting_view` AS select `posting_table`.`postingId` AS `postingId`,`posting_table`.`postingDescription` AS `postingDescription`,`posting_table`.`datePosted` AS `datePosted`,`posting_table`.`profileId` AS `profileId`,`profile_table`.`firstName` AS `firstName`,`profile_table`.`middleName` AS `middleName`,`profile_table`.`lastName` AS `lastName`,`profile_table`.`accountTypeId` AS `accountTypeId`,`account_type_table`.`accountType` AS `accountType` from ((`posting_table` join `profile_table` on((`posting_table`.`profileId` = `profile_table`.`profileId`))) join `account_type_table` on((`profile_table`.`accountTypeId` = `account_type_table`.`accountTypeId`))) */;

/*View structure for view profile_view */

/*!50001 DROP TABLE IF EXISTS `profile_view` */;
/*!50001 DROP VIEW IF EXISTS `profile_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_view` AS select `profile_table`.`profileId` AS `profileId`,`profile_table`.`firstName` AS `firstName`,`profile_table`.`middleName` AS `middleName`,`profile_table`.`lastName` AS `lastName`,`profile_table`.`contactNumber` AS `contactNumber`,`profile_table`.`addressId` AS `addressId`,`profile_table`.`accountTypeId` AS `accountTypeId`,`profile_table`.`userName` AS `userName`,`profile_table`.`passWord` AS `passWord`,`profile_table`.`isDeleted` AS `isDeleted`,`profile_table`.`isActivated` AS `isActivated`,`address_table`.`province` AS `province`,`address_table`.`city` AS `city`,`address_table`.`barangay` AS `barangay`,`address_table`.`street` AS `street`,`address_table`.`buildingNumber` AS `buildingNumber`,`account_type_table`.`accountType` AS `accountType` from ((`profile_table` join `address_table` on((`profile_table`.`addressId` = `address_table`.`addressId`))) join `account_type_table` on((`profile_table`.`accountTypeId` = `account_type_table`.`accountTypeId`))) */;

/*View structure for view travel_and_tour_view */

/*!50001 DROP TABLE IF EXISTS `travel_and_tour_view` */;
/*!50001 DROP VIEW IF EXISTS `travel_and_tour_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `travel_and_tour_view` AS select `travel_and_tour_table`.`travelAndTourId` AS `travelAndTourId`,`travel_and_tour_table`.`packageId` AS `packageId`,`travel_and_tour_table`.`departureDate` AS `departureDate`,`travel_and_tour_table`.`returnDate` AS `returnDate`,`travel_and_tour_table`.`maxPax` AS `maxPax`,`travel_and_tour_table`.`travelAndTourStatus` AS `travelAndTourStatus`,`package_table`.`packageName` AS `packageName`,`package_table`.`packageDetails` AS `packageDetails`,`package_table`.`inclusion` AS `inclusion`,`package_table`.`exclusion` AS `exclusion`,`package_table`.`price` AS `price` from (`travel_and_tour_table` join `package_table` on((`travel_and_tour_table`.`packageId` = `package_table`.`packageId`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
