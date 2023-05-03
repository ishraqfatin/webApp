-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 03, 2023 at 03:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artismdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` int(11) NOT NULL,
  `parentId` int(11) NOT NULL,
  `comment` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `productId` int(11) NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `userId` int(11) UNSIGNED NOT NULL,
  `productPrice` float NOT NULL,
  `orderQuantity` int(11) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `orderLocation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(6) NOT NULL,
  `userId` int(6) UNSIGNED NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productImage` varchar(300) DEFAULT NULL,
  `productDescription` text NOT NULL,
  `productPrice` int(11) NOT NULL,
  `productQuantity` int(10) UNSIGNED NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `userId`, `productName`, `productImage`, `productDescription`, `productPrice`, `productQuantity`, `createdAt`) VALUES
(19, 21, 'New Art What Art!', 'uploads/the-witcher-by-alena-aenami-19201080-1280Ã800.jpg', 'Commodi minima excepturi repudiandae velit hic maxime\r\ndoloremque. Quaerat provident commodi consectetur veniam similique ad \r\nearum omnis ipsum saepe, voluptas, hic voluptates pariatur est explicabo \r\nfugiat, dolorum eligendi quam cupiditate excepturi mollitia maiores labore \r\nsuscipit quas? Nulla, placeat. Voluptatem quaerat non architecto ab laudantium\r\nmodi minima sunt esse temporibus sint culpa, recusandae aliquam numquam \r\ntotam ratione voluptas quod exercitationem fuga. Possimus quis earum veniam \r\nquasi aliquam eligendi, placeat qui corporis!', 300, 21, '2023-05-02 21:43:18'),
(37, 1, 'Test Art 1', './uploads/93f45708ae89b9702ba43290f843b201.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem. Veritatis\r\nobcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam\r\nnihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,\r\ntenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,\r\nquia. Quo neque error', 200, 21, '2023-05-03 11:45:23'),
(38, 1, 'KRATOS!', './uploads/kratos-god-of-war-3840x2160-10280.jpg', 'GOD OF WAR 4: Ragnarok', 800, 90, '2023-05-03 13:31:11'),
(39, 1, 'Computer', './uploads/lorenzo-herrera-p0j-mE6mGo4-unsplash.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem. Veritatis\r\nobcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam\r\nnihil, eveniet aliquid culpa offici', 800, 20, '2023-05-03 13:20:47'),
(40, 1, '5050', './uploads/wp8501104-anime-macbook-wallpapers.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem. ', 400, 25, '2023-05-03 11:46:59'),
(41, 1, 'Leo', './uploads/discoElysium.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem. Veritatis\r\nobcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam\r\nnihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,\r\ntenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,\r\nquia. Quo neque errorapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam\r\nrecusandae alias error harum maxime adipisci amet laborum. Perspiciatis \r\nminima', 320, 12, '2023-05-03 11:47:51'),
(42, 1, 'Test Art 90', './uploads/pawel-czerwinski-fPN1w7bIuNU-unsplash.jpg', 'apiente officiis modi at sunt excepturi expedita sint? Sed quibusdam\r\nrecusandae alias error harum maxime adipisci amet laborum. Perspiciatis \r\nminimaLorem ipsum dolor sit amet. Et iure corporis qui repellat autem aut illum atque. Sed quasi autem aut vero sapiente est corrupti ipsam non quis rerum eos molestiae corrupti. Ut laborum aperiam et quaerat minima qui voluptates quasi? Et rerum modi aut mollitia reiciendis sed rerum excepturi et placeat assumenda?\r\n\r\nRem voluptatibus facilis ut consequuntur recusandae ut similique corporis a consequatur consequuntur et voluptatem suscipit eum Quis dolor! Et eveniet repellat rem deleniti galisum sit ratione dicta qui repudiandae error. Ea aperiam soluta ut alias totam qui aperiam officia aut quia voluptatum est neque dolorem non voluptatibus rerum est tempore galisum. Ut voluptas voluptas a odit voluptate ut autem eaque sit laudantium rerum cum ducimus eligendi id dolores voluptatem eum voluptatem omnis.\r\n\r\nEt nemo minus id illum excepturi eos aliquid error sed nisi fugiat ut reprehenderit dolor. Sed dolor cupiditate sit facere voluptatum aut cumque saepe sed autem voluptatem et ducimus velit. Aut impedit placeat sed omnis ipsum nam internos voluptatibus sit internos quia eum dolorum internos ut eaque reprehenderit.', 0, 90, '2023-05-03 11:49:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(6) UNSIGNED NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactNumber` varchar(100) DEFAULT NULL,
  `biography` text DEFAULT NULL,
  `userPhoto` varchar(100) DEFAULT NULL,
  `occupation` varchar(50) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `social` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `password`, `email`, `contactNumber`, `biography`, `userPhoto`, `occupation`, `dateOfBirth`, `social`) VALUES
(1, 'fatso', '123', 'fatso@gmail.com', '0123421234', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nec pulvinar purus. Curabitur hendrerit tortor ut nunc aliquam tempor. Praesent id erat consequat, dapibus erat sit amet, volutpat dolor. Aliquam dictum eros et sem sollicitudin rutrum. Vivamus pretium libero ut nunc tempus euismod. Suspendisse molestie ex non eros finibus accumsan. Integer ex nisi, dictum in ultrices nec, elementum quis lectus.', NULL, 'Web developer', '2000-05-23', NULL),
(18, 'nosehub', 'Consequat Recusanda', 'qaraso@mailinator.com', '+1 (998) 972-8849', NULL, NULL, 'Dolor delectus veli', '2020-10-21', NULL),
(19, 'topocyw', 'Commodi eos reprehen', 'vojuzavu@mailinator.com', '+1 (166) 292-9182', NULL, NULL, 'Omnis quia nisi cumq', '1995-09-12', NULL),
(20, 'habotiruz', 'Aliquam obcaecati pe', 'bijokip@mailinator.com', '+1 (262) 654-6367', NULL, NULL, 'Ut ducimus quis sun', '2011-07-04', NULL),
(21, 'dycovi', 'Ullam quod quia qui ', 'mani@mailinator.com', '+1 (533) 911-4791', NULL, NULL, 'Consequatur Eos mol', '1974-07-15', NULL),
(22, 'qimyvy', 'Praesentium voluptat', 'jamer@mailinator.com', '+1 (375) 645-3115', NULL, NULL, 'Dolor officia repudi', '1984-09-10', NULL),
(23, 'qubyby', 'Aliqua In labore ad', 'texahyq@mailinator.com', '+1 (158) 485-2077', NULL, NULL, 'Eveniet quidem porr', '2011-03-28', NULL),
(24, 'pewucaciwu', 'Sit rerum laudantiu', 'hywuja@mailinator.com', '+1 (903) 264-3629', NULL, NULL, 'Debitis deserunt ver', '1998-12-25', NULL),
(25, 'vywuvydi', 'Fuga Quo eveniet o', 'xaqyzovy@mailinator.com', '+1 (377) 562-9452', NULL, NULL, 'Fuga Labore et repr', '1981-08-08', NULL),
(26, 'zaraki', '123', 'zaraki@kenny.com', '009920912', NULL, NULL, 'Shinigami', '1994-02-08', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `productId` (`productId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `user` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `user` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
