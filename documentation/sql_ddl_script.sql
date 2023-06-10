-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: camden_dairy_farm
-- ------------------------------------------------------
-- Server version	8.0.33-0ubuntu0.22.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `address` (
  `address_id` char(36) NOT NULL,
  `street_name` varchar(50) NOT NULL,
  `street_number` varchar(10) NOT NULL,
  `neighborhood` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES ('address64846ab87b7a18.78619350','Wall Street','1234','Teste','Sydney'),('address6484f7f26293a6.81376876','Rua A','134','Lindóia','Nowra'),('address6484f8428bed30.84997045','Rua A','134','Lindóia','Nowra'),('address6484f845462b40.30923163','Rua A','134','Lindóia','Nowra'),('address6484f85d2e87b7.72540017','Rua A','134','Lindóia','Nowra'),('address6484f86aec0bc7.68583048','Rua A','134','Lindóia','Nowra'),('address6484f882927a01.89620785','Rua A','134','Lindóia','Nowra'),('address6484fb969309b1.63072617','Wall Street','134','Test','Sydney'),('address6484fc8bbc0b47.19516469','Wall Street','1234','Test','Sydney'),('address648501b4ae0c39.58985627','Wall Street','134','Macquarie Park','Sydney'),('address64850253d88b76.23369583','Wall Street','123','Macquarie Park','Sydney');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `address_of_shipping`
--

DROP TABLE IF EXISTS `address_of_shipping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `address_of_shipping` (
  `Address_address_id` char(36) NOT NULL,
  `Order_order_id` char(36) NOT NULL,
  `deliveryDate` date DEFAULT NULL,
  PRIMARY KEY (`Address_address_id`,`Order_order_id`),
  KEY `fk_Address_order_order_id` (`Order_order_id`),
  KEY `fk_address_order_address_id` (`Address_address_id`),
  CONSTRAINT `fk_Address_has_Order_Address1` FOREIGN KEY (`Address_address_id`) REFERENCES `address` (`address_id`),
  CONSTRAINT `fk_Address_has_Order_Order1` FOREIGN KEY (`Order_order_id`) REFERENCES `order` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address_of_shipping`
--

LOCK TABLES `address_of_shipping` WRITE;
/*!40000 ALTER TABLE `address_of_shipping` DISABLE KEYS */;
/*!40000 ALTER TABLE `address_of_shipping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `client_id` char(36) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` char(13) NOT NULL,
  `address_id` char(36) NOT NULL,
  PRIMARY KEY (`client_id`),
  KEY `fk_client_address_id` (`address_id`),
  CONSTRAINT `fk_Client_Address1` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES ('client6484f8428bf884.72460542','Anderson Choren','andersonchoren@gmail.com','11111111','address6484f8428bed30.84997045'),('client6484f8454633d5.69134315','Anderson Choren','andersonchoren@gmail.com','11111111','address6484f845462b40.30923163'),('client6484f85d2e8ec1.60851314','Anderson Choren','andersonchoren@gmail.com','11111111','address6484f85d2e87b7.72540017'),('client6484f86aec12c0.81708790','Anderson Choren','andersonchoren@gmail.com','11111111','address6484f86aec0bc7.68583048'),('client6484f8829280c2.46331322','Anderson Choren','andersonchoren@gmail.com','11111111','address6484f882927a01.89620785'),('client6484fb969310f1.07525317','Steve Jobs','admin@camden.com','11111111','address6484fb969309b1.63072617'),('client6484fc8bbc1288.67687707','Tim Burton','client@camden.com','11111111','address6484fc8bbc0b47.19516469'),('client648501b4ae1374.19293476','Steve Jobs','admin@camden.com','11111111','address648501b4ae0c39.58985627'),('client64850253d892b1.06023397','Tim Burton','client@camden.com','11111111','address64850253d88b76.23369583');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order` (
  `order_id` char(36) NOT NULL,
  `value_of_deposit` decimal(6,2) NOT NULL,
  `requestDate` date NOT NULL,
  `validity` date NOT NULL,
  `payment_id` char(36) NOT NULL,
  `rate_code` char(36) NOT NULL,
  `client_id` char(36) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `fk_order_payment_id` (`payment_id`),
  KEY `fk_order_rate_id` (`rate_code`),
  KEY `fk_order_Client_id` (`client_id`),
  CONSTRAINT `fk_Order_Client1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`),
  CONSTRAINT `fk_Order_Payment` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`),
  CONSTRAINT `fk_Order_rate1` FOREIGN KEY (`rate_code`) REFERENCES `rate` (`rate_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_product` (
  `order_id` char(36) NOT NULL,
  `product_id` char(36) NOT NULL,
  `quantity` smallint NOT NULL,
  PRIMARY KEY (`order_id`,`product_id`),
  KEY `fk_order_product_product_id` (`product_id`),
  KEY `fk_order_product_order_id` (`order_id`),
  CONSTRAINT `fk_Order_has_Product_Order1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`),
  CONSTRAINT `fk_Order_has_Product_Product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_product`
--

LOCK TABLES `order_product` WRITE;
/*!40000 ALTER TABLE `order_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment` (
  `payment_id` char(36) NOT NULL,
  `paymentDate` date NOT NULL,
  `total_price` decimal(6,2) NOT NULL,
  `quotationDiscount` tinyint NOT NULL,
  `payment_method` char(5) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES ('payment6484fe27d07409.91594901','2006-10-23',3.00,0,'payid'),('payment6484ffa68fd1c0.18104010','2006-10-23',3.00,0,'payid'),('payment6485027f00e8f6.66635699','2006-10-23',1200.00,20,'payid');
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `product_id` char(36) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price_of_sale` decimal(5,2) NOT NULL,
  `stock` smallint NOT NULL,
  `expiration_date` date NOT NULL,
  `production_date` date NOT NULL,
  `production_cost` decimal(6,2) NOT NULL,
  `comments` varchar(45) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES ('product6484fd160dcc80.86089908','Milk',3.00,10000,'2023-06-12','2023-06-10',1.00,'Nothing'),('product648502f2a50dd7.64727046','Cheese',6.00,10000,'2023-06-17','2023-06-10',3.00,'Nothing');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rate`
--

DROP TABLE IF EXISTS `rate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rate` (
  `rate_code` char(36) NOT NULL,
  `quantity` int NOT NULL,
  `discount_percentage` tinyint NOT NULL,
  PRIMARY KEY (`rate_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rate`
--

LOCK TABLES `rate` WRITE;
/*!40000 ALTER TABLE `rate` DISABLE KEYS */;
/*!40000 ALTER TABLE `rate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rent`
--

DROP TABLE IF EXISTS `rent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rent` (
  `rent_id` char(36) NOT NULL,
  `rentalFee` decimal(6,2) NOT NULL,
  `address_id` char(36) NOT NULL,
  PRIMARY KEY (`rent_id`),
  KEY `fk_rent_address_id` (`address_id`),
  CONSTRAINT `fk_rent_Address1` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rent`
--

LOCK TABLES `rent` WRITE;
/*!40000 ALTER TABLE `rent` DISABLE KEYS */;
/*!40000 ALTER TABLE `rent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `adm` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'administrator','admin@camden.com','$2y$10$n7TQ1W85tKRQNKV5hdqfaOR2Fx2Jrc3gnps3aKnRtVvNQx6G7q/x.',1,'2006-10-23 03:00:00'),(2,'client','client@camden.com','$2y$10$nlAU7sJajBkN5SML4dQd1Og/deae4b5FaeobvJ9uOaJGkd13IMfxe',0,'2006-10-23 03:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-10 20:13:14
