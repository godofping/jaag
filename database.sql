/*
SQLyog Ultimate v8.53 
MySQL - 5.5.5-10.1.33-MariaDB : Database - jaag_db
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `account_type_table` */

insert  into `account_type_table`(`accountTypeId`,`accountType`) values (1,'Administrator'),(2,'Employee'),(3,'Walk-in Customer'),(4,'Online Customer');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `address_table` */

insert  into `address_table`(`addressId`,`province`,`city`,`barangay`,`street`,`buildingNumber`) values (1,'Jose','Jose','Poblacion','Lapu-lapu','65');

/*Table structure for table `booking_table` */

DROP TABLE IF EXISTS `booking_table`;

CREATE TABLE `booking_table` (
  `bookingId` int(6) NOT NULL AUTO_INCREMENT,
  `profileId` int(6) DEFAULT NULL,
  `travelAndTourId` int(6) DEFAULT NULL,
  `statusId` int(6) DEFAULT NULL,
  `paymentTransactionId` int(6) DEFAULT NULL,
  `departure` date DEFAULT NULL,
  `return` date DEFAULT NULL,
  `rentId` int(6) DEFAULT NULL,
  PRIMARY KEY (`bookingId`),
  KEY `FK_booking_table` (`statusId`),
  KEY `FK_booking_table2` (`travelAndTourId`),
  KEY `FK_booking_table23` (`rentId`),
  KEY `FK_booking_table123` (`profileId`),
  CONSTRAINT `FK_booking_table` FOREIGN KEY (`statusId`) REFERENCES `status_table` (`statusId`),
  CONSTRAINT `FK_booking_table123` FOREIGN KEY (`profileId`) REFERENCES `profile_table` (`profileId`),
  CONSTRAINT `FK_booking_table2` FOREIGN KEY (`travelAndTourId`) REFERENCES `travel_and_tour_table` (`travelAndTourId`),
  CONSTRAINT `FK_booking_table23` FOREIGN KEY (`rentId`) REFERENCES `rental_table` (`rentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `booking_table` */

/*Table structure for table `comment_table` */

DROP TABLE IF EXISTS `comment_table`;

CREATE TABLE `comment_table` (
  `commentId` int(6) NOT NULL AUTO_INCREMENT,
  `commentInfo` text,
  `profileId` int(6) DEFAULT NULL,
  PRIMARY KEY (`commentId`),
  KEY `FK_comment_table` (`profileId`),
  CONSTRAINT `FK_comment_table` FOREIGN KEY (`profileId`) REFERENCES `profile_table` (`profileId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  CONSTRAINT `FK_destination_table` FOREIGN KEY (`placeId`) REFERENCES `place_table` (`placeId`),
  CONSTRAINT `FK_destination_table2` FOREIGN KEY (`packageId`) REFERENCES `package_table` (`packageId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `destination_table` */

/*Table structure for table `driver_table` */

DROP TABLE IF EXISTS `driver_table`;

CREATE TABLE `driver_table` (
  `driverId` int(6) NOT NULL AUTO_INCREMENT,
  `driverFirstName` varchar(60) DEFAULT NULL,
  `driverMiddleName` varchar(60) DEFAULT NULL,
  `driverLastName` varchar(60) DEFAULT NULL,
  `driverAddress` varchar(200) DEFAULT NULL,
  `driverContactNumber` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`driverId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `driver_table` */

insert  into `driver_table`(`driverId`,`driverFirstName`,`driverMiddleName`,`driverLastName`,`driverAddress`,`driverContactNumber`) values (1,'Jun','Alberto','Castador','Barangay Calean, Tacurong City, Sultan Kudarat','09168574525');

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
  KEY `FK_media_table1` (`paymentTransactionId`),
  KEY `FK_media_table3` (`postingId`),
  CONSTRAINT `FK_media_table` FOREIGN KEY (`packageId`) REFERENCES `package_table` (`packageId`),
  CONSTRAINT `FK_media_table1` FOREIGN KEY (`paymentTransactionId`) REFERENCES `payment_transaction_table` (`paymentTransactionId`),
  CONSTRAINT `FK_media_table3` FOREIGN KEY (`postingId`) REFERENCES `posting_table` (`postingId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `media_table` */

/*Table structure for table `mode_of_payment_table` */

DROP TABLE IF EXISTS `mode_of_payment_table`;

CREATE TABLE `mode_of_payment_table` (
  `modeOfPaymentId` int(6) NOT NULL AUTO_INCREMENT,
  `nameOfRemittance` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`modeOfPaymentId`),
  CONSTRAINT `FK_mode_of_payment_table` FOREIGN KEY (`modeOfPaymentId`) REFERENCES `payment_transaction_table` (`paymentTransactionId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mode_of_payment_table` */

/*Table structure for table `notification_table` */

DROP TABLE IF EXISTS `notification_table`;

CREATE TABLE `notification_table` (
  `notificationId` int(6) NOT NULL AUTO_INCREMENT,
  `notificationMessage` text,
  `profileId` int(6) DEFAULT NULL,
  PRIMARY KEY (`notificationId`),
  KEY `FK_notification_table` (`profileId`),
  CONSTRAINT `FK_notification_table` FOREIGN KEY (`profileId`) REFERENCES `profile_table` (`profileId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `notification_table` */

/*Table structure for table `package_table` */

DROP TABLE IF EXISTS `package_table`;

CREATE TABLE `package_table` (
  `packageId` int(6) NOT NULL AUTO_INCREMENT,
  `packageName` varchar(60) DEFAULT NULL,
  `packageDetails` text,
  `pax` int(6) DEFAULT NULL,
  `inclusion` text,
  `exclusion` text,
  `statusId` int(6) DEFAULT NULL,
  `priceId` int(6) DEFAULT NULL,
  PRIMARY KEY (`packageId`),
  KEY `FK_package_table1` (`priceId`),
  KEY `FK_package_table123` (`statusId`),
  CONSTRAINT `FK_package_table1` FOREIGN KEY (`priceId`) REFERENCES `price_table` (`priceId`),
  CONSTRAINT `FK_package_table123` FOREIGN KEY (`statusId`) REFERENCES `status_table` (`statusId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `package_table` */

/*Table structure for table `payment_transaction_table` */

DROP TABLE IF EXISTS `payment_transaction_table`;

CREATE TABLE `payment_transaction_table` (
  `paymentTransactionId` int(6) NOT NULL AUTO_INCREMENT,
  `modeOfPaymentId` int(6) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `datePaid` date DEFAULT NULL,
  `transactionNumber` varchar(60) DEFAULT NULL,
  `nameOfSender` varchar(60) DEFAULT NULL,
  `statusId` int(6) DEFAULT NULL,
  PRIMARY KEY (`paymentTransactionId`),
  KEY `FK_payment_transaction_table` (`statusId`),
  CONSTRAINT `FK_payment_transaction_table` FOREIGN KEY (`statusId`) REFERENCES `status_table` (`statusId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `payment_transaction_table` */

/*Table structure for table `place_table` */

DROP TABLE IF EXISTS `place_table`;

CREATE TABLE `place_table` (
  `placeId` int(6) NOT NULL AUTO_INCREMENT,
  `placeName` varchar(60) DEFAULT NULL,
  `latitude` varchar(60) DEFAULT NULL,
  `longitude` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`placeId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `place_table` */

insert  into `place_table`(`placeId`,`placeName`,`latitude`,`longitude`) values (1,'Davao City','7.18958','125.450342'),(2,'Surigao City','9.757262','125.513613'),(3,'Siargao City','9.848018','126.047856');

/*Table structure for table `posting_table` */

DROP TABLE IF EXISTS `posting_table`;

CREATE TABLE `posting_table` (
  `postingId` int(6) NOT NULL AUTO_INCREMENT,
  `postingDescription` varchar(60) DEFAULT NULL,
  `datePosted` date DEFAULT NULL,
  `profileId` int(6) DEFAULT NULL,
  PRIMARY KEY (`postingId`),
  KEY `FK_posting_table` (`profileId`),
  CONSTRAINT `FK_posting_table` FOREIGN KEY (`profileId`) REFERENCES `profile_table` (`profileId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `posting_table` */

/*Table structure for table `price_table` */

DROP TABLE IF EXISTS `price_table`;

CREATE TABLE `price_table` (
  `priceId` int(6) NOT NULL AUTO_INCREMENT,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`priceId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `price_table` */

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
  PRIMARY KEY (`profileId`),
  KEY `FK_profile_table` (`accountTypeId`),
  KEY `FK_profile_table1` (`addressId`),
  CONSTRAINT `FK_profile_table` FOREIGN KEY (`accountTypeId`) REFERENCES `account_type_table` (`accountTypeId`),
  CONSTRAINT `FK_profile_table1` FOREIGN KEY (`addressId`) REFERENCES `address_table` (`addressId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `profile_table` */

insert  into `profile_table`(`profileId`,`firstName`,`middleName`,`lastName`,`contactNumber`,`addressId`,`accountTypeId`,`userName`,`passWord`) values (2,'Jose','Malinao','Aguacito','09754214199',1,1,'admin','21232f297a57a5a743894a0e4a801fc3');

/*Table structure for table `rental_table` */

DROP TABLE IF EXISTS `rental_table`;

CREATE TABLE `rental_table` (
  `rentId` int(6) NOT NULL AUTO_INCREMENT,
  `vanId` int(6) DEFAULT NULL,
  `dateRented` date DEFAULT NULL,
  `priceId` int(6) DEFAULT NULL,
  `driverId` int(6) DEFAULT NULL,
  PRIMARY KEY (`rentId`),
  KEY `FK_rental_table` (`priceId`),
  KEY `FK_rental_table1` (`vanId`),
  KEY `FK_rental_table2` (`driverId`),
  CONSTRAINT `FK_rental_table` FOREIGN KEY (`priceId`) REFERENCES `price_table` (`priceId`),
  CONSTRAINT `FK_rental_table1` FOREIGN KEY (`vanId`) REFERENCES `van_table` (`vanId`),
  CONSTRAINT `FK_rental_table2` FOREIGN KEY (`driverId`) REFERENCES `driver_table` (`driverId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `rental_table` */

/*Table structure for table `status_table` */

DROP TABLE IF EXISTS `status_table`;

CREATE TABLE `status_table` (
  `statusId` int(6) NOT NULL AUTO_INCREMENT,
  `statusDescription` varchar(60) DEFAULT NULL,
  `statusOfWhat` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`statusId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `status_table` */

insert  into `status_table`(`statusId`,`statusDescription`,`statusOfWhat`) values (1,'Available','van_rental;'),(2,'Not Available','van_rental;'),(3,'On Travel','van_rental;');

/*Table structure for table `travel_and_tour_table` */

DROP TABLE IF EXISTS `travel_and_tour_table`;

CREATE TABLE `travel_and_tour_table` (
  `travelAndTourId` int(6) NOT NULL AUTO_INCREMENT,
  `packageId` int(6) DEFAULT NULL,
  `numberOfPax` int(6) DEFAULT NULL,
  `dateBooked` date DEFAULT NULL,
  PRIMARY KEY (`travelAndTourId`),
  KEY `FK_travel_and_tour_table` (`packageId`),
  CONSTRAINT `FK_travel_and_tour_table` FOREIGN KEY (`packageId`) REFERENCES `package_table` (`packageId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `travel_and_tour_table` */

/*Table structure for table `van_table` */

DROP TABLE IF EXISTS `van_table`;

CREATE TABLE `van_table` (
  `vanId` int(6) NOT NULL AUTO_INCREMENT,
  `vanMake` varchar(60) DEFAULT NULL,
  `vanModel` varchar(60) DEFAULT NULL,
  `vanPlateNumber` varchar(60) DEFAULT NULL,
  `statusId` int(6) DEFAULT NULL,
  PRIMARY KEY (`vanId`),
  KEY `FK_van_table123` (`statusId`),
  CONSTRAINT `FK_van_table123` FOREIGN KEY (`statusId`) REFERENCES `status_table` (`statusId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `van_table` */

insert  into `van_table`(`vanId`,`vanMake`,`vanModel`,`vanPlateNumber`,`statusId`) values (1,'Toyota','Hi-ace Commuter','TYM-1234',1),(4,'Nissan','NV350','UDW-892',1),(5,'Toyota','Hi-ace Grandia','ACD-5681',1);

/*Table structure for table `driver_view` */

DROP TABLE IF EXISTS `driver_view`;

/*!50001 DROP VIEW IF EXISTS `driver_view` */;
/*!50001 DROP TABLE IF EXISTS `driver_view` */;

/*!50001 CREATE TABLE  `driver_view`(
 `driverId` int(6) ,
 `driverFirstName` varchar(60) ,
 `driverMiddleName` varchar(60) ,
 `driverLastName` varchar(60) ,
 `driverAddress` varchar(200) ,
 `driverContactNumber` varchar(60) 
)*/;

/*Table structure for table `package_view` */

DROP TABLE IF EXISTS `package_view`;

/*!50001 DROP VIEW IF EXISTS `package_view` */;
/*!50001 DROP TABLE IF EXISTS `package_view` */;

/*!50001 CREATE TABLE  `package_view`(
 `packageId` int(6) ,
 `packageName` varchar(60) ,
 `packageDetails` text ,
 `pax` int(6) ,
 `inclusion` text ,
 `exclusion` text ,
 `statusId` int(6) ,
 `priceId` int(6) ,
 `price` double ,
 `statusDescription` varchar(60) ,
 `statusOfWhat` varchar(60) 
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
 `province` varchar(60) ,
 `city` varchar(60) ,
 `barangay` varchar(60) ,
 `street` varchar(60) ,
 `buildingNumber` varchar(60) ,
 `accountType` varchar(60) 
)*/;

/*Table structure for table `van_view` */

DROP TABLE IF EXISTS `van_view`;

/*!50001 DROP VIEW IF EXISTS `van_view` */;
/*!50001 DROP TABLE IF EXISTS `van_view` */;

/*!50001 CREATE TABLE  `van_view`(
 `vanId` int(6) ,
 `vanMake` varchar(60) ,
 `vanModel` varchar(60) ,
 `vanPlateNumber` varchar(60) ,
 `statusId` int(6) ,
 `statusDescription` varchar(60) ,
 `statusOfWhat` varchar(60) 
)*/;

/*View structure for view driver_view */

/*!50001 DROP TABLE IF EXISTS `driver_view` */;
/*!50001 DROP VIEW IF EXISTS `driver_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `driver_view` AS select `driver_table`.`driverId` AS `driverId`,`driver_table`.`driverFirstName` AS `driverFirstName`,`driver_table`.`driverMiddleName` AS `driverMiddleName`,`driver_table`.`driverLastName` AS `driverLastName`,`driver_table`.`driverAddress` AS `driverAddress`,`driver_table`.`driverContactNumber` AS `driverContactNumber` from `driver_table` */;

/*View structure for view package_view */

/*!50001 DROP TABLE IF EXISTS `package_view` */;
/*!50001 DROP VIEW IF EXISTS `package_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `package_view` AS select `package_table`.`packageId` AS `packageId`,`package_table`.`packageName` AS `packageName`,`package_table`.`packageDetails` AS `packageDetails`,`package_table`.`pax` AS `pax`,`package_table`.`inclusion` AS `inclusion`,`package_table`.`exclusion` AS `exclusion`,`package_table`.`statusId` AS `statusId`,`package_table`.`priceId` AS `priceId`,`price_table`.`price` AS `price`,`status_table`.`statusDescription` AS `statusDescription`,`status_table`.`statusOfWhat` AS `statusOfWhat` from ((`package_table` join `price_table` on((`package_table`.`priceId` = `price_table`.`priceId`))) join `status_table` on((`package_table`.`statusId` = `status_table`.`statusId`))) */;

/*View structure for view place_view */

/*!50001 DROP TABLE IF EXISTS `place_view` */;
/*!50001 DROP VIEW IF EXISTS `place_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `place_view` AS select `place_table`.`placeId` AS `placeId`,`place_table`.`placeName` AS `placeName`,`place_table`.`latitude` AS `latitude`,`place_table`.`longitude` AS `longitude` from `place_table` */;

/*View structure for view profile_view */

/*!50001 DROP TABLE IF EXISTS `profile_view` */;
/*!50001 DROP VIEW IF EXISTS `profile_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_view` AS select `profile_table`.`profileId` AS `profileId`,`profile_table`.`firstName` AS `firstName`,`profile_table`.`middleName` AS `middleName`,`profile_table`.`lastName` AS `lastName`,`profile_table`.`contactNumber` AS `contactNumber`,`profile_table`.`addressId` AS `addressId`,`profile_table`.`accountTypeId` AS `accountTypeId`,`profile_table`.`userName` AS `userName`,`profile_table`.`passWord` AS `passWord`,`address_table`.`province` AS `province`,`address_table`.`city` AS `city`,`address_table`.`barangay` AS `barangay`,`address_table`.`street` AS `street`,`address_table`.`buildingNumber` AS `buildingNumber`,`account_type_table`.`accountType` AS `accountType` from ((`profile_table` join `address_table` on((`profile_table`.`addressId` = `address_table`.`addressId`))) join `account_type_table` on((`profile_table`.`accountTypeId` = `account_type_table`.`accountTypeId`))) */;

/*View structure for view van_view */

/*!50001 DROP TABLE IF EXISTS `van_view` */;
/*!50001 DROP VIEW IF EXISTS `van_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `van_view` AS select `van_table`.`vanId` AS `vanId`,`van_table`.`vanMake` AS `vanMake`,`van_table`.`vanModel` AS `vanModel`,`van_table`.`vanPlateNumber` AS `vanPlateNumber`,`van_table`.`statusId` AS `statusId`,`status_table`.`statusDescription` AS `statusDescription`,`status_table`.`statusOfWhat` AS `statusOfWhat` from (`van_table` join `status_table` on((`van_table`.`statusId` = `status_table`.`statusId`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
