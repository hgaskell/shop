-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 09:45 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `cat_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_image`) VALUES
(14, 'Men\'s', 'nimble-made-7RIMS-NMsbc-unsplash.jpg'),
(15, 'Women\'s', 'felipe-vieira-sw80_07Rm-E-unsplash.jpg'),
(16, 'Kids', 'signature-june-LbPKZfzkQ7o-unsplash.jpg'),
(17, 'Accessories ', 'malvestida-u79wy47kvVs-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `order_transaction_id` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_currency` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_first_name` varchar(255) NOT NULL,
  `order_last_name` varchar(255) NOT NULL,
  `order_address1` varchar(255) NOT NULL,
  `order_city` varchar(255) NOT NULL,
  `order_postcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_amount`, `order_transaction_id`, `order_status`, `order_currency`, `customer_id`, `order_first_name`, `order_last_name`, `order_address1`, `order_city`, `order_postcode`) VALUES
(40, 24, '41F30790FS760810U', 'Completed', 'GBP', 16, '', '', '', '', ''),
(41, 3, '4DY63306044260452', 'Completed', 'GBP', 15, '', '', '', '', ''),
(42, 13, '2S860864JD831611J', 'Completed', 'GBP', 11, '', '', '', '', ''),
(43, 3, '9E014932UK2718646', 'Completed', 'GBP', 16, '', '', '', '', ''),
(44, 8, '0BU611092G8225253', 'Completed', 'GBP', 16, '', '', '', '', ''),
(45, 3, '7S665201CB786811K', 'Completed', 'GBP', 0, '', '', '', '', ''),
(46, 10, '384667109W2164543', 'Completed', 'GBP', 0, '', '', '', '', ''),
(47, 24, '40K43865VU824450P', 'Completed', 'GBP', 0, '', '', '', '', ''),
(48, 3, '89983364KL692441M', 'Completed', 'GBP', 0, 'Harry', '', '', '', ''),
(49, 3, '97K64055AV7061423', 'Completed', 'GBP', 0, 'Harry', 'Gaskell', '25 Bowness Street', 'Manchester', 'M32 0EA'),
(50, 49, '3XX41553FF405153J', 'Completed', 'GBP', 0, 'Harry', 'Gaskell', '25 Bowness Street', 'Manchester', 'M32 0EA');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_short_desc` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image_2` varchar(255) NOT NULL,
  `product_image_3` varchar(255) NOT NULL,
  `product_image_4` varchar(255) NOT NULL,
  `product_tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category_id`, `product_price`, `product_stock`, `product_description`, `product_short_desc`, `product_image`, `product_image_2`, `product_image_3`, `product_image_4`, `product_tag`) VALUES
(12, 'Ladies Cool Sports Crop Top', 15, 9, 100, 'UPF 30+ UV protection.\\r\\nPull on racer back style.\\r\\nSelf fabric bound scoop neckline and armholes.\\r\\nElasticated band.\\r\\nTwin needle stitching.\\r\\nTear out label.', '', 'crop-top.webp', 'crop-top2.jpg', '', '', ''),
(13, 'Lady Fit Value V Neck T-Shirt', 15, 5, 100, 'Ladies fit.\r\nCotton/Lycra® ribbed low V neckline.\r\nTaped neck.\r\nShaped side seams.\r\nTwin needle sleeves and hem.\r\nCut out label.', '', 'v-neck.webp', 'v-neck3.jpg', '', '', ''),
(14, 'Ladies Fashion Leggings', 15, 15, 100, 'This is a description...', '', 'leggings.webp', 'leggings2.webp', '', '', ''),
(15, 'Premium Lady Fit Sweat Jacket', 15, 30, 100, 'Raglan sleeves.\r\nLadies fit.\r\nFull length covered metal zip.\r\nTaped neck.\r\nFront pouch pockets.\r\nCotton/elastane ribbed cuffs and hem.\r\nCut out label.', '', 'lady-jacket.webp', 'lady-jacket2.webp', '', '', ''),
(16, 'Cool Urban Fitness T-Shirt', 14, 8, 100, 'Quick drying with inherent stretch properties.\r\nActive fit.\r\nSelf fabric collar.\r\nTaped neck.\r\nTwin needle stitching.\r\nTear out label.', '', 'men-tshirt.webp', 'men-tshirt2.webp', '', '', ''),
(17, 'Cool Contrast Windshield Jacket', 14, 18, 100, 'CoolShield™ coated fabric is showerproof and windproof.\r\nLightweight.\r\nGrown on adjustable hood.\r\nContrast hood and raglan sleeves.\r\nFull length contrast zip with reflective piping.\r\nTwo front zip pockets.\r\nBound cuffs and hem.\r\nCurved drop hem.', '', 'fit.webp', 'fit2.webp', '', '', ''),
(18, 'Pro Utility Vest', 14, 60, 100, 'Polyester mesh lining.\r\nStand up collar.\r\nFull length zip with outer storm flap and stud closure detail.\r\nLeft chest pocket with tear release flap.\r\nRight chest zip pocket.\r\nD-ring.\r\nTwo front pockets with side handwarmer entry.\r\nDrawcord waist.\r\nCut out label.', '', 'men-vest.webp', 'men-vest2.webp', '', '', ''),
(19, 'Long Sleeve Cotton Piqué Polo Shirt', 14, 15, 100, 'Stand up collar.\r\nThree button placket with horn effect buttons.\r\n1x1 ribbed narrow cuffs.\r\nSide vents.\r\nTwin needle stitching.', '', 'mens-polo.webp', 'mens-polo2.webp', '', '', ''),
(20, 'Baby/Toddler Long Sleeve Baseball T-Shirt', 16, 7, 100, 'Contrast collar and sleeves.\r\nTwin needle stitching.', '', 'kids1.webp', 'kids1-2.webp', '', '', ''),
(21, 'Baby/Toddler Rain Jacket', 16, 24, 100, 'Striped cotton lining.\r\nShowerproof.\r\nFull length zip with chin guard and studded storm flap.\r\nTwo front stud closure patch pockets.\r\nOpen cuffs and hem.\r\nUnbranded size label at neckline.', '', 'kids2.webp', 'kids2-2.webp', '', '', ''),
(22, 'Kids Denim Jacket LW750 BLU 6-12', 16, 24, 100, 'Contrast hood and sleeves.\r\nYKK popper front closure.\r\nTwo chest pockets.\r\nRibbed cuffs.\r\nJean style stitching on body.\r\nTag free.', '', 'kids3.webp', 'kids3-2.webp', '', '', ''),
(23, 'Baby/Toddler Striped Crew Neck T-Shirt', 16, 10, 100, 'Plain ribbed collar.\r\nTaped back neckline.\r\nTwin needle stitching.\r\nUnbranded size label at neckline.', '', 'fit (1).webp', 'kids-fit.webp', '', '', ''),
(24, 'Jockey Cap', 17, 16, 100, '6 panel.\r\nLow profile.\r\nStitched ventilation eyelets.\r\nUnstructured.\r\nFlat peak with contrast braiding.\r\nSelf colour adjustable strap with buckle fastener.\r\nAuthentic visor sticker.', '', 'cap.webp', 'cap2.webp', '', '', ''),
(25, 'Tarp Roll-Top Backpack', 17, 24, 100, 'Urban styling.\r\nGrab handle.\r\nPadded adjustable shoulder straps.\r\nRoll-top closure.\r\nConcealed pocket.\r\nTear out label.\r\nCapacity 15 litres.', '', 'bag.webp', 'bag-2.webp', 'bag-3.webp', 'bag-4.png', 'featured'),
(26, 'Sports Tech Soft Shell Neck Warmer', 17, 26, 100, 'Windproof and breathable.\r\nLightweight and quick drying.\r\nErgonomic fit with contoured design.\r\nAdjustable drawcord with toggle.\r\nFlatlock stitched seams.\r\nTear out label.\r\nDisclaimer: Beechfield makes no warranties, either expressed or implied, that the Morfs® prevent infection or the transmission of viruses or disease.', '', 'scarf.webp', 'scarf2.webp', '', '', ''),
(27, 'Sports Towel', 17, 3, 100, 'Sports Towel', '', 'towel.webp', 'towel2.webp', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `parent_id`, `name`, `price`, `sku`) VALUES
(2, 15, 'Small', 10, 'crop_top_small'),
(3, 15, 'Medium', 10, 'crop_top_medium'),
(4, 15, 'Large', 15, 'crop_top_large');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `product_id`, `order_id`, `product_title`, `product_price`, `product_quantity`) VALUES
(33, 25, 40, 'Tarp Roll-Top Backpack', 24, 1),
(34, 27, 41, 'Sports Towel', 3, 1),
(35, 27, 42, 'Sports Towel', 3, 1),
(36, 13, 42, 'Lady Fit Value V Neck T-Shirt', 5, 2),
(37, 27, 43, 'Sports Towel', 3, 1),
(38, 16, 44, 'Cool Urban Fitness T-Shirt', 8, 1),
(39, 27, 45, 'Sports Towel', 3, 1),
(40, 12, 46, 'Ladies Cool Sports Crop Top', 10, 1),
(41, 25, 47, 'Tarp Roll-Top Backpack', 24, 1),
(42, 27, 48, 'Sports Towel', 3, 1),
(43, 27, 49, 'Sports Towel', 3, 1),
(44, 25, 50, 'Tarp Roll-Top Backpack', 24, 1),
(45, 12, 50, 'Ladies Cool Sports Crop Top', 10, 1),
(46, 19, 50, 'Long Sleeve Cotton Piqué Polo Shirt', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_email`, `user_firstname`, `user_lastname`, `user_password`, `user_role`, `randSalt`) VALUES
(11, '', 'parker@test.com', 'Robert', 'Parker', '$2y$10$iusesomecrazystrings2ur6nj.D8DC3mirp3W7h1NPF6FmX3StMW', 'Customer', '$2y$10$iusesomecrazystrings22'),
(15, '', 'kal@test.com', 'Kalsoom', 'Mehmood', '$2y$10$iusesomecrazystrings2ur6nj.D8DC3mirp3W7h1NPF6FmX3StMW', 'Customer', '$2y$10$iusesomecrazystrings22'),
(16, '', 'joe@test.com', 'Joe', 'Wakefield', '$2y$10$iusesomecrazystrings2ur6nj.D8DC3mirp3W7h1NPF6FmX3StMW', 'Customer', '$2y$10$iusesomecrazystrings22'),
(17, '', 'hgaskell92@hotmail.com', 'Harry', 'Gaskell', '$2y$10$iusesomecrazystrings2ur6nj.D8DC3mirp3W7h1NPF6FmX3StMW', 'admin', '$2y$10$iusesomecrazystrings22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
