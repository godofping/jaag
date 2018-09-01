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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `account_type_table` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `address_table` */

/*Table structure for table `booking_table` */

DROP TABLE IF EXISTS `booking_table`;

CREATE TABLE `booking_table` (
  `bookingId` int(6) NOT NULL AUTO_INCREMENT,
  `profileId` int(6) DEFAULT NULL,
  `rentId` int(6) DEFAULT NULL,
  `travelAndTourId` int(6) DEFAULT NULL,
  `statusId` int(6) DEFAULT NULL,
  `paymentTransactionId` int(6) DEFAULT NULL,
  `departure` date DEFAULT NULL,
  `return` date DEFAULT NULL,
  `destinationId` int(6) DEFAULT NULL,
  PRIMARY KEY (`bookingId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `booking_table` */

/*Table structure for table `comment_table` */

DROP TABLE IF EXISTS `comment_table`;

CREATE TABLE `comment_table` (
  `commentId` int(6) NOT NULL AUTO_INCREMENT,
  `commentInfo` text,
  `profileId` int(6) DEFAULT NULL,
  PRIMARY KEY (`commentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `comment_table` */

/*Table structure for table `destination_table` */

DROP TABLE IF EXISTS `destination_table`;

CREATE TABLE `destination_table` (
  `destinationId` int(6) NOT NULL AUTO_INCREMENT,
  `placeId` int(6) DEFAULT NULL,
  PRIMARY KEY (`destinationId`)
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `driver_table` */

/*Table structure for table `mode_of_payment_table` */

DROP TABLE IF EXISTS `mode_of_payment_table`;

CREATE TABLE `mode_of_payment_table` (
  `modeOfPaymentId` int(6) NOT NULL AUTO_INCREMENT,
  `nameOfRemittance` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`modeOfPaymentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mode_of_payment_table` */

/*Table structure for table `notification_table` */

DROP TABLE IF EXISTS `notification_table`;

CREATE TABLE `notification_table` (
  `notificationId` int(6) NOT NULL AUTO_INCREMENT,
  `notificationMessage` text,
  `profileId` int(6) DEFAULT NULL,
  PRIMARY KEY (`notificationId`)
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
  `mediaLocation` varchar(60) DEFAULT NULL,
  `priceId` int(6) DEFAULT NULL,
  PRIMARY KEY (`packageId`)
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
  `proofImage` text,
  `statusId` int(6) DEFAULT NULL,
  PRIMARY KEY (`paymentTransactionId`)
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `place_table` */

/*Table structure for table `posting_table` */

DROP TABLE IF EXISTS `posting_table`;

CREATE TABLE `posting_table` (
  `postingId` int(6) NOT NULL AUTO_INCREMENT,
  `postingDescription` varchar(60) DEFAULT NULL,
  `datePosted` date DEFAULT NULL,
  `mediaLocation` text,
  `profileId` int(6) DEFAULT NULL,
  PRIMARY KEY (`postingId`)
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
  PRIMARY KEY (`profileId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `profile_table` */

/*Table structure for table `rental_table` */

DROP TABLE IF EXISTS `rental_table`;

CREATE TABLE `rental_table` (
  `rentId` int(6) NOT NULL AUTO_INCREMENT,
  `vanId` int(6) DEFAULT NULL,
  `dateRented` date DEFAULT NULL,
  `priceId` int(6) DEFAULT NULL,
  PRIMARY KEY (`rentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `rental_table` */

/*Table structure for table `status_table` */

DROP TABLE IF EXISTS `status_table`;

CREATE TABLE `status_table` (
  `statusId` int(6) NOT NULL AUTO_INCREMENT,
  `statusDescription` varchar(60) DEFAULT NULL,
  `statusOfWhat` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`statusId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `status_table` */

/*Table structure for table `travel_and_tour_table` */

DROP TABLE IF EXISTS `travel_and_tour_table`;

CREATE TABLE `travel_and_tour_table` (
  `travelAndTourId` int(6) NOT NULL AUTO_INCREMENT,
  `packageId` int(6) DEFAULT NULL,
  `numberOfPax` int(6) DEFAULT NULL,
  `dateBooked` date DEFAULT NULL,
  PRIMARY KEY (`travelAndTourId`)
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
  PRIMARY KEY (`vanId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `van_table` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
