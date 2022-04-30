-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2019 at 02:12 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fullfitsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `EMAIL` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `FNAME` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `LNAME` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `PASSWORD` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `ADDRESS` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `IS_ADMIN` char(1) CHARACTER SET utf8mb4 NOT NULL,
  `VERIFY_CODE` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CATEGORY_ID` int(3) NOT NULL,
  `CATEGORY_NAME` varchar(30) NOT NULL,
  `SUPER_CATEGORY` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CATEGORY_ID`, `CATEGORY_NAME`, `SUPER_CATEGORY`) VALUES
(100, 'SHIRTS', ''),
(101, 'CASUAL SHIRTS', 'SHIRTS'),
(102, 'FORMAL SHIRTS', 'SHIRTS'),
(200, 'PANTS', ''),
(201, 'JEANS', 'PANTS'),
(202, 'CHINOS', 'PANTS'),
(300, 'SHOES', ''),
(301, 'DRESS SHOES', 'SHOES'),
(302, 'CASUAL SHOES', 'SHOES'),
(400, 'ACCESSORIES', ''),
(401, 'BELTS', 'ACCESSORIES'),
(402, 'HATS', 'ACCESSORIES'),
(500, 'FORMAL WEAR', ''),
(501, 'BLAZERS', 'FORMAL WEAR'),
(502, 'DRESS PANTS', 'FORMAL WEAR'),
(600, 'DRESSES', ''),
(601, 'SUMMER DRESSES', 'DRESSES'),
(602, 'FALL DRESSES', 'DRESSES'),
(700, 'OUTERWEAR', ''),
(701, 'JACKETS', 'OUTERWEAR'),
(702, 'COATS', 'OUTERWEAR');

-- --------------------------------------------------------

--
-- Table structure for table `colours`
--

CREATE TABLE `colours` (
  `COLOUR_ID` int(4) NOT NULL,
  `COLOUR_DESC` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colours`
--

INSERT INTO `colours` (`COLOUR_ID`, `COLOUR_DESC`) VALUES
(1001, 'Black'),
(1002, 'Navy_Blue'),
(1003, 'Royal_Blue'),
(1004, 'Dark_Grey'),
(1005, 'Light_Grey'),
(1006, 'Beige'),
(1007, 'Khaki'),
(1008, 'Tan'),
(1009, 'Red'),
(1010, 'Orange'),
(1011, 'Yellow'),
(1012, 'Green'),
(1013, 'Plum'),
(1014, 'Magenta'),
(1015, 'Mauve'),
(1016, 'Pink'),
(1017, 'Dark_Brown'),
(1018, 'Taupe'),
(1019, 'Grey'),
(1020, 'Light_Brown'),
(1021, 'Blue'),
(1022, 'White'),
(1023, 'Camouflage'),
(1024, 'Brown'),
(1025, 'Dark_Blue'),
(1026, 'Blue/Green/Pink');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CUSTOMER_ID` int(4) NOT NULL,
  `FNAME` varchar(30) NOT NULL,
  `LNAME` varchar(30) NOT NULL,
  `ADDRESS` varchar(50) DEFAULT NULL,
  `POSTAL_CODE` varchar(6) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `MOBILE_NO` varchar(10) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `NOTIFICATION_ALLOWED` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `IMAGE_ID` int(4) NOT NULL,
  `ITEM_ID` int(5) NOT NULL,
  `COLOUR_ID` int(4) NOT NULL,
  `IMAGE_FILE_NAME` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`IMAGE_ID`, `ITEM_ID`, `COLOUR_ID`, `IMAGE_FILE_NAME`) VALUES
(100, 1900, 1017, 'MBelt01.jpg'),
(101, 1901, 1018, 'MBelt02.jpg'),
(102, 1902, 1019, 'MBlazer01.jpg'),
(103, 1903, 1020, 'MBlazer02.jpg'),
(104, 1904, 1021, 'MCasualShirt01.jpg'),
(105, 1905, 1009, 'MCasualShirt02.jpg'),
(106, 1906, 1002, 'MCasualShirt03.jpg'),
(107, 1907, 1015, 'MCasualShirt04.jpg'),
(108, 1908, 1002, 'MCasualShoe01.jpg'),
(109, 1909, 1022, 'MCasualShoe02.jpg'),
(110, 1910, 1006, 'MChinos01.jpg'),
(111, 1911, 1002, 'MChinos02.jpg'),
(112, 1912, 1001, 'MCoat01.jpg'),
(113, 1913, 1023, 'MCoat02.jpg'),
(114, 1914, 1004, 'MDressPant01.jpg'),
(115, 1915, 1019, 'MDressPant02.jpg'),
(116, 1916, 1024, 'MDressShoe01.jpg'),
(117, 1917, 1001, 'MDressShoe02.jpg'),
(118, 1918, 1022, 'MFormalShirt01.jpg'),
(119, 1919, 1001, 'MFormalShirt02.jpg'),
(120, 1920, 1021, 'MFormalShirt03.jpg'),
(121, 1921, 1002, 'MHat01.jpg'),
(122, 1922, 1019, 'MHat02.jpg'),
(123, 1923, 1002, 'MJacket01.jpg'),
(124, 1924, 1019, 'MJacket02.jpg'),
(125, 1925, 1025, 'MJeans01.jpg'),
(126, 1926, 1021, 'MJeans02.jpg'),
(127, 1927, 1019, 'WFallDress01.jpg'),
(128, 1928, 1009, 'WFallDress02.jpg'),
(129, 1929, 1001, 'WSummerDress01.jpg'),
(130, 1930, 1026, 'WSummerDress02.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ITEM_ID` int(5) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `SEX` varchar(1) NOT NULL,
  `CATEGORY_ID` int(5) NOT NULL,
  `PRICE` double NOT NULL,
  `DESCRIPTION` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ITEM_ID`, `Name`, `SEX`, `CATEGORY_ID`, `PRICE`, `DESCRIPTION`) VALUES
(1900, 'Leather Belt', 'M', 401, 40, 'Dark brown leather belt. Suitable for all occasions.'),
(1901, 'Leather belt', 'M', 401, 75, 'Taupe leather belt with highlight stitching. Casual elegance.'),
(1902, 'Tweed Blazer', 'M', 501, 300, 'Grey Tweed check. Dress this up or down for work or the nightclub.'),
(1903, 'Cotton Blazer', 'M', 501, 400, 'Light brown cotton weekend fare. '),
(1904, 'Denim shirt', 'M', 101, 80, 'Heavy weight denim long sleeve shirt.'),
(1905, 'Cotton Shirt', 'M', 101, 55, 'Red Checked long sleeve button up.'),
(1906, 'Cotton shirt', 'M', 101, 65, 'Soft cotton button up long sleeve shirt. Mandarin collar.'),
(1907, 'Cotton shirt', 'M', 101, 60, 'Mauve cotton button up long sleeve shirt. High contrast buttons and detail.'),
(1908, 'Suede shoe', 'M', 302, 130, 'Causal suede trainer.'),
(1909, 'Leather shoe', 'M', 302, 130, 'Casual leather trainer.'),
(1910, 'Cotton pants', 'M', 202, 90, 'Beige flat front chino.'),
(1911, 'Cotton pants', 'M', 202, 90, 'Navy flat front chino.'),
(1912, 'Wool coat', 'M', 702, 265, 'Men\'s heavy wool overcoat.'),
(1913, 'Down coat', 'M', 702, 300, 'Men\'s down-filled camo winter coat'),
(1914, 'Cotton-poly dress pants', 'M', 502, 95, 'Men\'s pleated front dress pants.'),
(1915, 'Cotton-poly dress pants', 'M', 502, 95, 'Men\'s flat-front dress pants.'),
(1916, 'Leather shoe', 'M', 301, 400, 'Men\'s brown leather brogue.'),
(1917, 'Leather shoe', 'M', 301, 450, 'Men\'s black patent leather brogue.'),
(1918, 'Cotton shirt', 'M', 102, 75, 'Men\'s white cutaway collar dress shirt with cuffs.'),
(1919, 'Cotton shirt', 'M', 102, 65, 'Men\'s black & white checked formal shirt.'),
(1920, 'Cotton shirt', 'M', 102, 60, 'Men\'s blue soft cotton formal shirt.'),
(1921, 'Toque', 'M', 402, 35, 'Men\'s winter toque.'),
(1922, 'Wool hat', 'M', 402, 85, 'Men\'s casual wool fedora.'),
(1923, 'Cotton jacket', 'M', 701, 185, 'Men\'s cotton/shearling fall jacket'),
(1924, 'Fall Jacket', 'M', 701, 80, 'Men\'s fall bomber shell.'),
(1925, 'Jeans', 'M', 201, 90, 'Men\'s selvage denim jean.'),
(1926, 'Jeans', 'M', 201, 90, 'Men\'s stone-wash denim jean.'),
(1927, 'Wool dress', 'W', 602, 155, 'Grey wool blend fall dress.'),
(1928, 'Casual Dress', 'W', 602, 145, 'Red animal print casual dress.'),
(1929, 'Casual Evening Dress', 'W', 601, 75, 'Black summer evening dress.'),
(1930, 'Casual Dress', 'W', 601, 90, 'Full length lightweight cotton print dress. ');

-- --------------------------------------------------------

--
-- Table structure for table `item_colour`
--

CREATE TABLE `item_colour` (
  `ITEM_ID` int(5) NOT NULL,
  `COLOUR_ID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_colour`
--

INSERT INTO `item_colour` (`ITEM_ID`, `COLOUR_ID`) VALUES
(1900, 1017),
(1901, 1018),
(1902, 1019),
(1903, 1020),
(1904, 1021),
(1905, 1009),
(1906, 1002),
(1907, 1015),
(1908, 1002),
(1909, 1022),
(1910, 1006),
(1911, 1002),
(1912, 1001),
(1913, 1023),
(1914, 1004),
(1915, 1019),
(1916, 1001),
(1917, 1024),
(1918, 1022),
(1919, 1001),
(1920, 1021),
(1921, 1002),
(1922, 1019),
(1923, 1002),
(1924, 1019),
(1925, 1025),
(1926, 1021),
(1927, 1019),
(1928, 1009),
(1929, 1001),
(1930, 1026);

-- --------------------------------------------------------

--
-- Table structure for table `item_keyword`
--

CREATE TABLE `item_keyword` (
  `ITEM_ID` int(5) NOT NULL,
  `KEYWORD_ID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_size`
--

CREATE TABLE `item_size` (
  `ITEM_ID` int(5) NOT NULL,
  `SIZE_ID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_size`
--

INSERT INTO `item_size` (`ITEM_ID`, `SIZE_ID`) VALUES
(1900, 1007),
(1900, 1008),
(1900, 1009),
(1900, 1010),
(1900, 1011),
(1900, 1012),
(1901, 1013),
(1901, 1014),
(1901, 1015),
(1901, 1016),
(1901, 1017),
(1901, 1018),
(1901, 1019),
(1901, 1020),
(1901, 1021),
(1901, 1022),
(1901, 1023),
(1902, 1015),
(1902, 1016),
(1902, 1017),
(1902, 1018),
(1902, 1019),
(1902, 1020),
(1902, 1021),
(1902, 1022),
(1902, 1023),
(1903, 1015),
(1903, 1016),
(1903, 1017),
(1903, 1018),
(1903, 1019),
(1903, 1020),
(1903, 1021),
(1903, 1022),
(1903, 1023),
(1904, 1001),
(1904, 1002),
(1904, 1003),
(1904, 1004),
(1904, 1005),
(1904, 1006),
(1905, 1001),
(1905, 1002),
(1905, 1003),
(1905, 1004),
(1905, 1005),
(1905, 1006),
(1906, 1001),
(1906, 1002),
(1906, 1003),
(1906, 1004),
(1906, 1005),
(1906, 1006),
(1907, 1001),
(1907, 1002),
(1907, 1003),
(1907, 1004),
(1907, 1005),
(1907, 1006),
(1908, 1007),
(1908, 1008),
(1908, 1009),
(1908, 1010),
(1908, 1011),
(1908, 1012),
(1909, 1007),
(1909, 1008),
(1909, 1009),
(1909, 1010),
(1909, 1011),
(1909, 1012),
(1910, 1013),
(1910, 1014),
(1910, 1015),
(1910, 1016),
(1910, 1017),
(1910, 1018),
(1910, 1019),
(1911, 1014),
(1911, 1015),
(1911, 1016),
(1911, 1017),
(1911, 1018),
(1911, 1019),
(1911, 10131),
(1912, 1015),
(1912, 1016),
(1912, 1017),
(1912, 1018),
(1912, 1019),
(1912, 1020),
(1912, 1021),
(1912, 1022),
(1912, 1023),
(1913, 1001),
(1913, 1002),
(1913, 1003),
(1913, 1004),
(1913, 1005),
(1913, 1006),
(1914, 1013),
(1914, 1014),
(1914, 1015),
(1914, 1016),
(1914, 1017),
(1914, 1018),
(1914, 1019),
(1915, 1013),
(1915, 1014),
(1915, 1015),
(1915, 1016),
(1915, 1017),
(1915, 1018),
(1915, 1019),
(1916, 1013),
(1916, 1014),
(1916, 1015),
(1916, 1016),
(1916, 1017),
(1916, 1018),
(1916, 1019),
(1917, 1007),
(1917, 1008),
(1917, 1009),
(1917, 1010),
(1917, 1011),
(1917, 1012),
(1918, 1001),
(1918, 1002),
(1918, 1003),
(1918, 1004),
(1918, 1005),
(1918, 1006),
(1919, 1001),
(1919, 1002),
(1919, 1003),
(1919, 1004),
(1919, 1005),
(1919, 1006),
(1920, 1001),
(1920, 1002),
(1920, 1003),
(1920, 1004),
(1920, 1005),
(1920, 1006),
(1921, 1001),
(1921, 1002),
(1921, 1003),
(1921, 1004),
(1921, 1005),
(1921, 1006),
(1922, 1001),
(1922, 1002),
(1922, 1003),
(1922, 1004),
(1922, 1005),
(1922, 1006),
(1923, 1001),
(1923, 1002),
(1923, 1003),
(1923, 1004),
(1923, 1005),
(1923, 1006),
(1924, 1001),
(1924, 1002),
(1924, 1003),
(1924, 1004),
(1924, 1005),
(1924, 1006),
(1925, 1013),
(1925, 1014),
(1925, 1015),
(1925, 1016),
(1925, 1017),
(1925, 1018),
(1925, 1019),
(1926, 1013),
(1926, 1014),
(1926, 1015),
(1926, 1016),
(1926, 1017),
(1926, 1018),
(1926, 1019),
(1927, 1001),
(1927, 1002),
(1927, 1003),
(1927, 1005),
(1927, 1006),
(1927, 10041),
(1928, 1001),
(1928, 1002),
(1928, 1003),
(1928, 1004),
(1928, 1005),
(1928, 1006),
(1929, 1001),
(1929, 1002),
(1929, 1003),
(1929, 1004),
(1929, 1005),
(1929, 1006),
(1930, 1001),
(1930, 1002),
(1930, 1003),
(1930, 1004),
(1930, 1005),
(1930, 1006);

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `KEYWORD_ID` int(4) NOT NULL,
  `KEYWORD_DESC` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`KEYWORD_ID`, `KEYWORD_DESC`) VALUES
(901, 'DRESSY'),
(902, 'TRENDY'),
(903, 'FLY'),
(904, 'BUTTONED-UP'),
(905, 'SHINY'),
(906, 'JAPANESE STYLE'),
(907, 'ITALIAN STYLE'),
(908, 'FRENCH STYLE'),
(909, 'UNDERSTATED'),
(910, 'WORKPLACE'),
(911, 'SATURDAY NIGHT');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ORDER_ID` int(6) NOT NULL,
  `ORDER_DATE` date NOT NULL,
  `CUSTOMER_ID` int(4) NOT NULL,
  `SHIPPING_ADDRESSS` varchar(100) DEFAULT NULL,
  `SHIPPING_DATE` date DEFAULT NULL,
  `PURCHASED` tinyint(1) NOT NULL,
  `CART` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `ORDER_ID` int(3) NOT NULL,
  `ITEM_ID` int(5) NOT NULL,
  `QUANTITY` int(3) NOT NULL,
  `SIZE_ID` int(4) NOT NULL,
  `COLOUR_ID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`ORDER_ID`, `ITEM_ID`, `QUANTITY`, `SIZE_ID`, `COLOUR_ID`) VALUES
(510, 1900, 1, 1007, 1017),
(510, 1914, 1, 1013, 1004),
(510, 1917, 2, 1012, 1001),
(510, 1918, 1, 1003, 1022),
(510, 1919, 1, 1001, 1001),
(511, 1901, 1, 1016, 1018),
(511, 1905, 4, 1004, 1009),
(511, 1925, 3, 1016, 1025),
(512, 1916, 1, 1017, 1024),
(512, 1927, 2, 1005, 1019),
(512, 1930, 1, 1003, 1026);

-- --------------------------------------------------------

--
-- Table structure for table `session_data`
--

CREATE TABLE `session_data` (
  `SESSION_ID` int(6) NOT NULL,
  `CUSTOMER_ID` int(4) NOT NULL,
  `SESSION_DATE` date NOT NULL,
  `ORDER_ID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `SIZE_ID` int(4) NOT NULL,
  `SIZE_DESC` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`SIZE_ID`, `SIZE_DESC`) VALUES
(1001, 'X-Small'),
(1002, 'Small'),
(1003, 'Medium'),
(1004, 'Large'),
(1005, 'X-Large'),
(1006, 'XX-Large'),
(1007, '7'),
(1008, '8'),
(1009, '9'),
(1010, '10'),
(1011, '11'),
(1012, '12'),
(1013, '28'),
(1014, '30'),
(1015, '32'),
(1016, '34'),
(1017, '36'),
(1018, '38'),
(1019, '40'),
(1020, '42'),
(1021, '44'),
(1022, '46'),
(1023, '48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`EMAIL`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Indexes for table `colours`
--
ALTER TABLE `colours`
  ADD PRIMARY KEY (`COLOUR_ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CUSTOMER_ID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`IMAGE_ID`),
  ADD KEY `ITEM_ID` (`ITEM_ID`),
  ADD KEY `COLOUR_ID` (`COLOUR_ID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ITEM_ID`),
  ADD KEY `CATEGORY_ID` (`CATEGORY_ID`);

--
-- Indexes for table `item_colour`
--
ALTER TABLE `item_colour`
  ADD PRIMARY KEY (`ITEM_ID`,`COLOUR_ID`);

--
-- Indexes for table `item_keyword`
--
ALTER TABLE `item_keyword`
  ADD PRIMARY KEY (`ITEM_ID`,`KEYWORD_ID`);

--
-- Indexes for table `item_size`
--
ALTER TABLE `item_size`
  ADD PRIMARY KEY (`ITEM_ID`,`SIZE_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ORDER_ID`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`ORDER_ID`,`ITEM_ID`),
  ADD KEY `COLOUR_ID` (`COLOUR_ID`),
  ADD KEY `SIZE_ID` (`SIZE_ID`);

--
-- Indexes for table `session_data`
--
ALTER TABLE `session_data`
  ADD PRIMARY KEY (`SESSION_ID`),
  ADD KEY `ORDER_ID` (`ORDER_ID`),
  ADD KEY `customer_id_session_data_fk` (`CUSTOMER_ID`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`SIZE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ORDER_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=513;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`ITEM_ID`) REFERENCES `items` (`ITEM_ID`),
  ADD CONSTRAINT `images_ibfk_2` FOREIGN KEY (`COLOUR_ID`) REFERENCES `colours` (`COLOUR_ID`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`CATEGORY_ID`) REFERENCES `categories` (`CATEGORY_ID`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`COLOUR_ID`) REFERENCES `colours` (`COLOUR_ID`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`SIZE_ID`) REFERENCES `sizes` (`SIZE_ID`);

--
-- Constraints for table `session_data`
--
ALTER TABLE `session_data`
  ADD CONSTRAINT `customer_id_session_data_fk` FOREIGN KEY (`CUSTOMER_ID`) REFERENCES `customers` (`CUSTOMER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
