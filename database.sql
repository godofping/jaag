/*
SQLyog Ultimate v8.53 
MySQL - 5.5.5-10.1.35-MariaDB : Database - jaag_db
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

LOCK TABLES `account_type_table` WRITE;

insert  into `account_type_table`(`accountTypeId`,`accountType`) values (1,'Administrator'),(3,'Walk-in Customer'),(4,'Online Customer'),(5,'Attendant');

UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `address_table` */

LOCK TABLES `address_table` WRITE;

insert  into `address_table`(`addressId`,`province`,`city`,`barangay`,`street`,`buildingNumber`) values (1,'Region 10: MISAMIS OCCIDENTAL','BONIFACIO','Bag-ong Anonang','Malvar Street','65'),(2,'Region 02: BATANES','BASCO (Capital)','Ihubok I (Kaychanarianan)','Lapu- lapu Street','44'),(3,'Region 14: KALINGA','PASIL','Dalupa','Di Makita Street','99'),(4,'1298','129804','Ar-arusip','asd','22'),(5,'','','New Panay','Barangay Road','65'),(6,'Region 12: SULTAN KUDARAT','ESPERANZA','Poblacion','Barangay Road','65'),(7,'Region 12: SULTAN KUDARAT','ISULAN (Capital)','Kalawag I (Pob.)','National Road','56'),(8,'Region 12: SULTAN KUDARAT','CITY OF TACURONG','New Isabela','Barangay Road',''),(9,'Region 12: SULTAN KUDARAT','CITY OF TACURONG','New Isabela','Barangay Road',''),(10,'Region 12: SULTAN KUDARAT','CITY OF TACURONG','New Isabela','Barangay Road',''),(11,'Region 12: SULTAN KUDARAT','CITY OF TACURONG','New Isabela','Barangay Road',''),(12,'Region 12: SULTAN KUDARAT','CITY OF TACURONG','New Isabela','Barangay Road',''),(13,'','','New Isabela','Barangay Road','65'),(14,'','','Adams (Pob.)','123','123'),(15,'','','Adams (Pob.)','12','312'),(16,'','','San Pablo','123','123'),(17,'','','Adams (Pob.)','',''),(18,'','','Adams (Pob.)','',''),(19,'','','Cullalabo Del Sur','1231','23123123'),(20,'','','Adams (Pob.)','',''),(21,'','','Adams (Pob.)','',''),(22,'','','Adams (Pob.)','',''),(23,'Region 02: CAGAYAN','ABULUG','Dana-Ili','123','123'),(24,'Region 01: ILOCOS SUR','ALILEM','Alilem Daya (Pob.)','',''),(25,'Region 12: SULTAN KUDARAT','CITY OF TACURONG','New Lagao','',''),(26,'Region 02: BATANES','BASCO (Capital)','Ihubok II (Kayvaluganan)','',''),(27,'Region 01: PANGASINAN','AGNO','Allabon','asd','asd'),(28,'Region 01: LA UNION','AGOO','Ambitacay','123','123'),(29,'Region 01: LA UNION','AGOO','Ambitacay','123','123');

UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `booking_table` */

LOCK TABLES `booking_table` WRITE;

insert  into `booking_table`(`bookingId`,`profileId`,`travelAndTourId`,`bookingStatus`,`dateBooked`,`numberOfPaxBooked`,`isAttended`) values (22,3,6,'Booked','2018-10-01',7,0),(26,27,6,'Booked','2018-10-02',4,0);

UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `comment_table` */

LOCK TABLES `comment_table` WRITE;

insert  into `comment_table`(`commentId`,`commentInfo`,`profileId`,`dateCommented`,`respond`) values (11,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In nec metus ipsum. Quisque non tristique justo. Integer eu quam id lectus blandit condimentum. Donec bibendum vitae magna et ornare. Suspendisse vestibulum nibh at semper placerat. Nullam ut tristique elit. Proin sit amet nulla erat. Curabitur hendrerit neque vel suscipit bibendum. Donec ut arcu a dolor interdum imperdiet eget ac magna. Aenean quis ullamcorper mauris, at vulputate justo. Sed porttitor, massa eget placerat suscipit, tortor felis imperdiet turpis, commodo placerat quam tortor sed neque. Nullam dictum tempor purus in aliquam.',3,'2018-09-27','ganun ba'),(12,'aasd',3,'2018-09-27',NULL);

UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `destination_table` */

LOCK TABLES `destination_table` WRITE;

insert  into `destination_table`(`destinationId`,`placeId`,`packageId`) values (8,21,6),(9,16,5),(10,20,4),(11,12,3),(12,7,2),(13,2,1);

UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

/*Data for the table `media_table` */

LOCK TABLES `media_table` WRITE;

insert  into `media_table`(`mediaId`,`mediaLocation`,`postingId`,`packageId`,`paymentTransactionId`) values (13,'media/386b81e31014a480f5abbd1089bf9037Enchanted-River-11.jpg',NULL,1,NULL),(14,'media/701b6c51d4017ef032663d897a9e8a62Riv.jpg',NULL,1,NULL),(15,'media/c6e70a1aa3d236578cce76a1cd13e8a7siargao-surigao-province.jpg',NULL,1,NULL),(16,'media/b03b8ae8b280f584dff61c824b945deeSurigao-del-Sur-Bogac-Spring.png',NULL,1,NULL),(17,'media/56235fc53b155738b0c5d0c74586eaf34.jpg',NULL,2,NULL),(18,'media/c238cf07380d960ae2947a7d47084f4c1200px-View_on_the_half_way_to_Kayangan_Lake_-_panoramio.jpg',NULL,2,NULL),(19,'media/6e119d089cbe9ce20d03be211e0b65a5beautiful-view-mountain-ranges-philippines-islands-mountain-views-100246883.jpg',NULL,2,NULL),(20,'media/811b17ea6018bca792208b6d4fd76f6abudahernel3.jpg',NULL,2,NULL),(21,'media/d42a6f5aec09508c4da0a9d97db7af74Hills View Mountain Villa Davao Room Rates (4).jpg',NULL,2,NULL),(22,'media/e2f7d6c45e52e80292c6b389feddf643HillsView03.gif',NULL,2,NULL),(23,'media/66d8e8eec57ea38f704158e87962a77emaxresdefault (1).jpg',NULL,2,NULL),(24,'media/1c4ae11ed4985ce67c1f881cf36768d6maxresdefault.jpg',NULL,2,NULL),(25,'media/45aae00794e4e00a752185308f06c6baoverview-3.jpg',NULL,2,NULL),(26,'media/881f50f9f1480f61d6f8e1d62f6a10edcamiguin.jpg',NULL,3,NULL),(27,'media/9944625c38dd9564cee4f4d4758a6598download (2).jpg',NULL,3,NULL),(28,'media/01c8d67a383a7f13c37e494a2ef700eemantigue-island-camiguin-travelanyway.jpg',NULL,3,NULL),(29,'media/aa422dcdca51b1b8a4be3bb3a5b23dfc5410599211_1a0492737b_b.jpg',NULL,6,NULL),(30,'media/cdf126124bcc287d773a748530c3fa2adownload.jpg',NULL,6,NULL),(31,'media/c921c468f478c7b74a8b6b1eb531b195entrance-to-sohoton-cove-inside-view.jpg',NULL,6,NULL),(32,'media/7cf357ccce1e943f00ea7083502b70eeimages.jpg',NULL,6,NULL),(33,'media/19f1839da3dcb0664a72d9581329a27csohoton-cave-opening.jpg',NULL,6,NULL),(34,'media/885c5df2035b79416ed05d74e32f891458963_1.jpg',NULL,5,NULL),(35,'media/88b4668706946f83d81005975288421fBarangan-Magsaysay-Dinagat-Islands.jpg',NULL,5,NULL),(36,'media/c7a9fef3e9912e8121b614ff77eab601Basilisa-Beach-Dinagat-Islands.jpg',NULL,5,NULL),(37,'media/1e648ce8b40c56f9d735feaca67c8c20IMG_8011982432648.jpeg',NULL,5,NULL),(38,'media/fbcb11a71758588a4a5104ca4348fc65Isla-Aga-Dinagat-Islands.jpg',NULL,5,NULL),(39,'media/e6878b58199b13e284eec10f1dbed005Sohoton-National-Park-Bucas-Grande-Surigao-del-Norte.jpg',NULL,5,NULL),(40,'media/0b378294054d4eec0ff20c3d1a31e5e1download.jpg',NULL,4,NULL),(41,'media/064c7e7b2733935a2173113b4ed286a7Footpath to Hikong Alo  Seven Falls Lake Sebu.jpg',NULL,4,NULL),(42,'media/144c126e13645866c09ce3c4067a0987images.jpg',NULL,4,NULL),(48,'media/ad24047ee1df064e4fa1012c656cbba6download.jpg',4,NULL,NULL),(50,'media/2f5781128a1dfc6a7ba7adef13571d66download (2).jpg',6,NULL,NULL),(65,'media/aff61842fe81a9602c9f8653f106ab2cWindows-10-1709-Fall-Creators-Update-with-Intune-Update-Rings2.jpg',10,NULL,NULL),(74,'dashboard/media/c9bc7c23d25eaf9dac9785a1bc96e4b342332479_325008914915271_8107766354871844864_n.jpg',NULL,NULL,1),(78,'dashboard/media/not-available.jpg',NULL,NULL,5),(98,'dashboard/media/not-available.jpg',NULL,NULL,NULL),(99,'dashboard/media/not-available.jpg',NULL,NULL,NULL),(100,'dashboard/media/not-available.jpg',NULL,NULL,NULL),(101,'dashboard/media/not-available.jpg',NULL,NULL,NULL),(102,'dashboard/media/95de323ad7990589861ece35d7d04d19admin_top - Copy - Copy.jpg',NULL,NULL,NULL),(103,'dashboard/media/d9f37abe47905d993e3f35e0f5b2e978admin_top - Copy - Copy.jpg',NULL,NULL,NULL),(104,'dashboard/media/not-available.jpg',NULL,NULL,NULL),(105,'dashboard/media/not-available.jpg',NULL,NULL,NULL),(106,'dashboard/media/not-available.jpg',NULL,NULL,41);

UNLOCK TABLES;

/*Table structure for table `mode_of_payment_table` */

DROP TABLE IF EXISTS `mode_of_payment_table`;

CREATE TABLE `mode_of_payment_table` (
  `modeOfPaymentId` int(6) NOT NULL AUTO_INCREMENT,
  `paymentMode` varchar(60) DEFAULT NULL,
  `nameOfRemittanceOrBank` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`modeOfPaymentId`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `mode_of_payment_table` */

LOCK TABLES `mode_of_payment_table` WRITE;

insert  into `mode_of_payment_table`(`modeOfPaymentId`,`paymentMode`,`nameOfRemittanceOrBank`) values (4,'Bank Transfer','BDO'),(5,'Bank Transfer','DBP'),(6,'Bank Transfer','Metro Bank'),(7,'Bank Transfer','EastWest'),(8,'Bank Transfer','BPI'),(9,'Bank Transfer','Union Bank'),(10,'Bank Transfer','China Bank'),(11,'Bank Transfer','PNB'),(12,'Bank Transfer','RCBC'),(13,'Bank Transfer','Security Bank'),(14,'Remittance','Palawan Express Pera Padala'),(15,'Remittance','Cebuana Lhuillier Pera Padala'),(16,'Remittance','Western Union Sulit Padala and Overseas Money Transfer'),(17,'Remittance','M Lhuillier Kwarta Padala'),(18,'Remittance','LBC Instant Peso Padala'),(19,'Remittance','TrueMoney Money Padala'),(20,'Remittance','RD Pawnshop Cash Padala'),(21,'Remittance','Smart Money'),(22,'Remittance','Globe Gcash'),(23,'In House',NULL);

UNLOCK TABLES;

/*Table structure for table `notification_table` */

DROP TABLE IF EXISTS `notification_table`;

CREATE TABLE `notification_table` (
  `notificationId` int(6) NOT NULL AUTO_INCREMENT,
  `notificationMessage` text,
  `profileId` int(6) DEFAULT NULL,
  `dateAndTime` datetime DEFAULT NULL,
  PRIMARY KEY (`notificationId`),
  KEY `FK_notification_table` (`profileId`),
  CONSTRAINT `FK_notification_table` FOREIGN KEY (`profileId`) REFERENCES `profile_table` (`profileId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `notification_table` */

LOCK TABLES `notification_table` WRITE;

UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `package_table` */

LOCK TABLES `package_table` WRITE;

insert  into `package_table`(`packageId`,`packageName`,`packageDetails`,`inclusion`,`exclusion`,`price`) values (1,'Surigao Tour','Details....','TRANSPORTATIONS','MEALS',799),(2,'Buda Tour','Bla bla bla...','TRANSPORATIONS','MEALS',699),(3,'Camiguin Island Tour','Bla bla bla bla','TRANSPORTATION','MEALS',1499),(4,'Lake Sebu Tour','none','TRANSPORTATION','MEALS, TICKETS',1399),(5,'Dinagat Tour','...','TRANSPORATIONS','MEALS',999),(6,'Sohoton Tour','....','TRANSPORATIONS','MEALS',1999);

UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

/*Data for the table `payment_transaction_table` */

LOCK TABLES `payment_transaction_table` WRITE;

insert  into `payment_transaction_table`(`paymentTransactionId`,`modeOfPaymentId`,`amount`,`dateOfPayment`,`transactionNumber`,`nameOfSender`,`paymentStatus`,`bookingId`,`paymentType`) values (1,7,5593,'2018-10-02','asd','asd','Recieved',22,'Full Payment'),(5,23,1598,'2018-10-02','','','Recieved',26,'Down Payment'),(41,4,1598,'2018-10-02','','','Recieved',26,'Outstanding Payment');

UNLOCK TABLES;

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

LOCK TABLES `place_table` WRITE;

insert  into `place_table`(`placeId`,`placeName`,`latitude`,`longitude`) values (1,'Davao City','7.18958','125.450342'),(2,'Surigao City','9.757262','125.513613'),(3,'Siargao City','9.848018','126.047856'),(4,'Talicud Island','6.929346','125.702456'),(5,'Sitio Maupot','7.106885','125.147730'),(6,'Lake Agco','7.017518','125.223099'),(7,'Buda','7.519009','125.237682'),(8,'Britania','8.700732','126.207376'),(9,'Alameda','8.733700','126.202191'),(10,'Asik asik','7.561677','124.535513'),(11,'Bohol','9.657822','123.850521'),(12,'Camiguin Island','9.175038','124.729034'),(13,'Dapitan','8.625101','123.392629'),(14,'Dakak','8.695429','123.393344'),(15,'Gloria Fantasy Tour','8.647023','123.417672'),(16,'Dinagat','10.121927','125.587540'),(17,'Garden of Tour','14.562977','120.989999'),(18,'Up-side Down Museum','14.554531','120.987396'),(19,'New Israel','6.920208','125.189145'),(20,'Lake Sebu','6.243647','124.552497'),(21,'Sohoton','9.600213','125.916649'),(22,'Talikud','6.929611','125.702675');

UNLOCK TABLES;

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

LOCK TABLES `posting_table` WRITE;

insert  into `posting_table`(`postingId`,`postingDescription`,`datePosted`,`profileId`) values (4,'watch out','2018-09-07',2),(6,'Announcement bla bla bla','2018-09-07',2),(10,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In nec metus ipsum. Quisque non tristique justo. Integer eu quam id lectus blandit condimentum. Donec bibendum vitae magna et ornare. Suspendisse vestibulum nibh at semper placerat. Nullam ut tristique elit. Proin sit amet nulla erat. Curabitur hendrerit neque vel suscipit bibendum. Donec ut arcu a dolor interdum imperdiet eget ac magna. Aenean quis ullamcorper mauris, at vulputate justo. Sed porttitor, massa eget placerat suscipit, tortor felis imperdiet turpis, commodo placerat quam tortor sed neque. Nullam dictum tempor purus in aliquam.','2018-09-27',2);

UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `profile_table` */

LOCK TABLES `profile_table` WRITE;

insert  into `profile_table`(`profileId`,`firstName`,`middleName`,`lastName`,`contactNumber`,`addressId`,`accountTypeId`,`userName`,`passWord`,`isDeleted`,`isActivated`) values (2,'1','Malinao','Aguacito','09754363944',1,1,'admin','21232f297a57a5a743894a0e4a801fc3',0,1),(3,'Alberto','Ranga','Madula','09754363944',2,4,'customer','91ec1f9324753048c0096d036a694f86',0,1),(4,'Mariella','Gumela','Vettan','09368545152',3,4,'customer1','91ec1f9324753048c0096d036a694f86',0,1),(13,'Daniel','Benson','DeVera','09754363944',12,5,'daniel2620','8bd39eae38511daad6152e84545e504d',0,1),(23,'Lester','Jan','Castillo','09754363944',25,4,'lester','21426b290d975ec5d264c38031da8fac',0,1),(24,'Jasper','Quison','Acevedo','09754363944',26,3,NULL,NULL,0,0),(25,'asdasd','asda','sdasd','09754363944',27,3,NULL,NULL,0,0),(26,'1231','231','23123','09754363944',28,3,NULL,NULL,0,0),(27,'123','123','1231231','09754363944',29,3,NULL,NULL,0,0);

UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `travel_and_tour_table` */

LOCK TABLES `travel_and_tour_table` WRITE;

insert  into `travel_and_tour_table`(`travelAndTourId`,`packageId`,`departureDate`,`returnDate`,`maxPax`,`travelAndTourStatus`) values (6,1,'2018-10-08','2018-10-10',14,'Available'),(7,1,'2018-10-18','2018-10-20',14,'Available');

UNLOCK TABLES;

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

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `notification_view` AS select `notification_table`.`notificationId` AS `notificationId`,`notification_table`.`notificationMessage` AS `notificationMessage`,`notification_table`.`profileId` AS `profileId`,`notification_table`.`dateAndTime` AS `dateAndTime`,`profile_table`.`firstName` AS `firstName`,`profile_table`.`middleName` AS `middleName`,`profile_table`.`lastName` AS `lastName`,`profile_table`.`contactNumber` AS `contactNumber`,`profile_table`.`accountTypeId` AS `accountTypeId`,`account_type_table`.`accountType` AS `accountType` from ((`notification_table` join `profile_table` on((`notification_table`.`profileId` = `profile_table`.`profileId`))) join `account_type_table` on((`profile_table`.`accountTypeId` = `account_type_table`.`accountTypeId`))) */;

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
