--
-- Table structure for table `admin`
--

CREATE TABLE `admin_info` (
                         `id` int(100) NOT NULL,
                         `name` varchar(128) NOT NULL,
                         `email` varchar(225) NOT NULL,
                         `phone` varchar(20) NOT NULL,
                         `address` varchar(255) NOT NULL,
                         `openingTime1` varchar(100) NOT NULL,
                         `openingTime2` varchar(100) NOT NULL,
                         `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin_info` (`id`, `name`, `email`,`phone`,`address`,`openingTime1`,`openingTime2`,`password`) VALUES
    (99999, 'SugarRush', 'sugarrush0cakeshop@gmail.com','0569120390','Nablus, Rafidia St.','9am - 22pm','11am - 22pm','987654321');

-- --------------------------------------------------------
--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
                        `id` int(100) NOT NULL,
                        `userId` int(100) NOT NULL,
                        `productId` int(100) NOT NULL,
                        `name` varchar(100) NOT NULL,
                        `price` int(10) NOT NULL,
                        `quantity` int(10) NOT NULL,
                        `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `wishList`
--

CREATE TABLE `wishList` (
                        `id` int(100) NOT NULL,
                        `userId` int(100) NOT NULL,
                        `productId` int(100) NOT NULL,
                        `name` varchar(100) NOT NULL,
                        `price` int(10) NOT NULL,
                        `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
                            `id` int(100) NOT NULL,
                            `userId` int(100) NOT NULL,
                            `name` varchar(100) NOT NULL,
                            `email` varchar(100) NOT NULL,
                            `number` varchar(12) NOT NULL,
                            `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `messages`
--

CREATE TABLE `messagesFromAdmin` (
                            `id` int(100) NOT NULL,
                            `userId` int(100) NOT NULL,
                            `name` varchar(100) NOT NULL,
                            `email` varchar(100) NOT NULL,
                            `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
                          `orderId` int(100) NOT NULL,
                          `userId` int(11) NOT NULL,
                          `name` varchar(20) NOT NULL,
                          `phone` varchar(10) NOT NULL,
                          `email` varchar(50) NOT NULL,
                          `address` varchar(500) NOT NULL,
                          `city` varchar(255) NOT NULL,
                          `productId` int(11) NOT NULL,
                          `price` varchar(10) NOT NULL,
                          `quantity` varchar(2) NOT NULL,
                          `date` date NOT NULL DEFAULT current_timestamp(),
                          `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `orders`
--

CREATE TABLE `order_items` (
                          `id` int(100) NOT NULL,
                          `orderId` int(100) NOT NULL,
                          `userId` int(11) NOT NULL,
                          `productId` int(11) NOT NULL,
                          `name` varchar(20) NOT NULL,
                          `image` varchar(50) NOT NULL,
                          `date` date NOT NULL DEFAULT current_timestamp(),
                           PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `products`
--

CREATE TABLE `products` (
                            `productId` int(100) NOT NULL,
                            `name` varchar(50) NOT NULL,
                            `category` varchar(50) NOT NULL,
                            `type` varchar(50) NOT NULL,
                            `price` varchar(50) NOT NULL,
                            `image` varchar(50) NOT NULL,
                            `bgImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `userId` int(100) NOT NULL,
                         `name` varchar(128) NOT NULL,
                         `email` varchar(255) NOT NULL,
                         `number` varchar(10) NOT NULL,
                         `password` varchar(255) NOT NULL,
                         `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `newproducts` (
                            `newProductId` int(100) NOT NULL,
                            `productId` int(100) NOT NULL,
                            `name` varchar(50) NOT NULL,
                            `category` varchar(50) NOT NULL,
                            `type` varchar(50) NOT NULL,
                            `price` varchar(50) NOT NULL,
                            `image` varchar(50) NOT NULL,
                            `bgImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `bestseller` (
                            `bestSellerId` int(100) NOT NULL,
                            `productId` int(100) NOT NULL,
                            `name` varchar(50) NOT NULL,
                            `category` varchar(50) NOT NULL,
                            `type` varchar(50) NOT NULL,
                            `price` varchar(50) NOT NULL,
                            `image` varchar(50) NOT NULL,
                            `bgImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `messages`
--

CREATE TABLE `CandyTablesmessages` (
                            `id` int(100) NOT NULL,
                            `userId` int(100) NOT NULL,
                            `name` varchar(100) NOT NULL,
                            `email` varchar(100) NOT NULL,
                            `number` varchar(12) NOT NULL,
                            `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `admin`
--
ALTER TABLE `admin_info`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `wishList`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
    ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
    ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `bestseller`
--
ALTER TABLE `bestseller`
    ADD PRIMARY KEY (`bestSellerId`);

--
-- Indexes for table `newproducts`
--
ALTER TABLE `newproducts`
    ADD PRIMARY KEY (`newProductId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `bestseller`
--
ALTER TABLE `CandyTablesMessages`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messagesFromAdmin`
--
ALTER TABLE `messagesFromAdmin`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin_info`
    MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
    MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
    MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
    MODIFY `orderId` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
    MODIFY `productId` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `userId` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
