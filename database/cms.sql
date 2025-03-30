-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Бер 30 2025 р., 14:01
-- Версія сервера: 8.0.30
-- Версія PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `cms`
--

-- --------------------------------------------------------

--
-- Структура таблиці `address`
--

CREATE TABLE `address` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `address`
--

INSERT INTO `address` (`id`, `user_id`, `firstname`, `lastname`, `country`, `city`, `address`, `zip`) VALUES
(1, 1, 'asdfasd', 'fasdfdsa', 'dasfa', 'dsfasd', 'adsfasdf', 'dsf');

-- --------------------------------------------------------

--
-- Структура таблиці `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `category`
--

INSERT INTO `category` (`id`, `name`, `photo`, `description`) VALUES
(1, 'Low-Alcohol Wines', '678afba32eaba.jpg', '<p>These wines are carefully crafted to retain the rich flavors of traditional wines while reducing the alcohol content. They\'re a great choice for pairing with meals or enjoying on their own.</p>'),
(2, 'Ciders', '678afc641cb04.jpg', '<p>Ciders are fruity and refreshing beverages made from fermented apple or pear juice. They can range from sweet to dry and are perfect for any occasion.</p>'),
(3, 'Light Beers', '678b16aaa65d5', '<p>Light beers are a popular choice for those who enjoy the crisp and refreshing taste of beer without a high alcohol content. They\'re perfect for social events and casual gatherings.</p>'),
(4, 'Sparkling Cocktails:', '678b16f4c8b34', '<p>Sparkling cocktails combine the effervescence of carbonated beverages with the subtle flavors of fruits and herbs. They\'re light, refreshing, and perfect for celebrations.</p>');

-- --------------------------------------------------------

--
-- Структура таблиці `custom`
--

CREATE TABLE `custom` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `cart` text,
  `total_price` decimal(10,2) DEFAULT NULL,
  `comment` text,
  `address` text,
  `shipment` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `custom`
--

INSERT INTO `custom` (`id`, `user_id`, `user_email`, `cart`, `total_price`, `comment`, `address`, `shipment`) VALUES
(9340, 1, 'fasdfasdfas@gsdfsa.com', '[{\"product\":{\"id\":\"1\",\"name\":\"dsfsadfasf\",\"category_id\":\"2\",\"price\":\"230.00\",\"count\":\"50\",\"short_description\":\"sdafadf\",\"description\":\"dfasfasfa\",\"visible\":\"1\",\"photo\":\"63bd9c824e5cb.jpg\"},\"count\":\"1\"}]', '255.00', NULL, '{\"firstname\":\"asdfasd\",\"lastname\":\"fasdfdsa\",\"address\":\"xzcvzxvczvz\",\"country\":\"xcxvz\",\"city\":\"zcvzc\",\"zip\":\"231\"}', 'Expedited'),
(9993, 1, 'fasdfasdfas@gsdfsa.com', '[{\"product\":{\"id\":\"1\",\"name\":\"dsfsadfasf\",\"category_id\":\"2\",\"price\":\"230.00\",\"count\":\"50\",\"short_description\":\"sdafadf\",\"description\":\"dfasfasfa\",\"visible\":\"1\",\"photo\":\"63bd9c824e5cb.jpg\"},\"count\":\"1\"}]', '255.00', NULL, '{\"firstname\":\"asdfasd\",\"lastname\":\"fasdfdsa\",\"address\":\"adsfasdf\",\"country\":\"dasfa\",\"city\":\"dsfasd\",\"zip\":\"dsf\"}', 'Expedited');

-- --------------------------------------------------------

--
-- Структура таблиці `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `count` int NOT NULL,
  `short_description` text,
  `description` text,
  `visible` tinyint(1) DEFAULT '1',
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `price`, `count`, `short_description`, `description`, `visible`, `photo`) VALUES
(6, 'Knights Premium Cider 24x 500ml', 2, '10.00', 30, 'A premium quality cider crafted from a blend of the finest bittersweet and dessert apples for a refreshingly medium dry taste. Enjoy chilled.\r\n', '', 1, '678b2d0a476ef.jpg'),
(7, 'XOXO Light Pinot Grigio 750mL', 1, '90.00', 10, 'Varietal: Pinot Grigio\r\n\r\nAlcohol/Vol: 8%\r\n\r\nSize: 750ml\r\n\r\nSugar Content: Light - 17 g/l', '<p>Meet our lighter side. All your favourite flavours of Pinot Grigio, but with less alcohol!<br><br>Discover our lower alcohol, lighter Pinot Grigio as a perfect sipping wine or as part of a spritz. Pair with your favourite bites and bffs, this perfect party wine is crisp and refreshing with notes of peach, golden apple and citrus.</p>', 1, '678af05ce72e6.jpg'),
(9, 'Peller Family Vineyards Light Cabernet Sauvignon', 1, '500.00', 10, 'Varietal: Cabernet Sauvignon\r\n\r\nAlcohol/Vol: 8%\r\n\r\nSize: 750ml\r\n\r\nSugar Content: Dry - 8 g/l', '<p>Ruby red in colour with a bouquet of black cherry, blue plum and a touch of sweet spice. The Cabernet Sauvignon is a light-bodied, fruit-forward wine with flavours of cherry and blackberry. The slightly off-dry finish has notes of field berries and black tea. Enjoy while young and fresh.</p><p>8% abv</p>', 1, '678af0d094740.jpg'),
(10, 'Peller Family Vineyards Light Pinot Grigio', 1, '400.00', 12, 'Varietal: Pinot Grigio\r\n\r\nAlcohol/Vol: 8%\r\n\r\nSize: 750ml\r\n\r\nSugar Content: Off-Dry - 17 g/l', '<p>Clear and bright with a straw yellow hue and notes of Bartlett pear, melon, red apple and pink grapefruit on the nose. This Pinot Grigio is light-bodied, off-dry, smooth yet refreshing with flavours of tropical fruit and melon on the palate, then notes of pink grapefruit and tangerine on the finish. Enjoy while young and fresh.</p>', 1, '678af10cab7dc.jpg'),
(11, 'Peller Family Vineyards Pinot Noir', 1, '600.00', 20, 'Varietal: Pinot Noir\r\n\r\nAlcohol/Vol: 12.5%\r\n\r\nSize: 750ml\r\n\r\nSugar Content: Dry g/l\r\n\r\n', '<p>The perfect wine for pizza, everyday sipping and juicy red wine lovers. Purple garnet in colour with a bouquet of red plum, cherry, and wild strawberry, accented by delicate notes of spice and oak. The Pinot Noir is a dry light-bodied wine, with soft tannins, and flavours of red berry, cherry, and plum. Enjoy while young and fresh.</p>', 1, '678afb2603d1d.jpg'),
(12, 'Brothers Berry Sub-Lime Premium Cider 10x 500ml Cans', 2, '50.00', 5, 'івапми', '', 1, '678b2d3e07696.jpg'),
(13, 'Packing low-alcohol drink SHAKE Sexx On The Beach 7%', 2, '20.00', 2, 'Packing low-alcohol drink SHAKE Sexx On The Beach 7% 0.5 L x 12 cans (4820097894827) SHAKE is a stylish youth brand. Designed for courageous people who value originality and put the enjoyment ', '<h2>Packing low-alcohol drink SHAKE Sexx On The Beach 7% 0.5 L x 12 cans (4820097894827)</h2><p>SHAKE is a stylish youth brand. Designed for courageous people who value originality and put the enjoyment of their life above all else.</p><p>SHAKE drinks are an ideal choice for energetic young people who like to emphasize their individuality. SHAKE cocktail appeared on the Ukrainian market in 2003, creating a new LAB category: ready-to-drink bar cocktails.</p><p><strong>SHAKE</strong> is the key to a beautiful life.</p><p>Key benefits:</p><p>• Convenient stylish packaging</p><p>• affordable price</p><p>• convenience of consumption (you can drink anywhere, including on the go)</p><p>• taste of the best world cocktails</p><p><strong>SEXX ON THE BEACH</strong></p><p>A touch of orange, cranberry and peach, intrigue and piquancy - this is the heady taste of this Sexx on the Beach. And who knows, are we talking about passionate fantasies or the favorite cocktail of millions? Indeed, real passion is always slightly intoxicating.</p><p>&nbsp;</p>', 1, '678b2fa8e0a30.jpg'),
(14, 'Beer lemonade Friday orange / lime 0.45L 5% (4820097898139)', 2, '20.00', 20, 'text_description Beer lemonade Friday orange / lime 0.45L (4820097898139) The bright, red-and-blue contrasting label features an image of a \"packaged\" dog in studded accessories with a detonating', '<h2>Beer lemonade Friday orange / lime 0.45L (4820097898139)</h2><p>The bright, red-and-blue contrasting label features an image of a \"packaged\" dog in studded accessories with a detonating mechanism, emphasizing the uniqueness of the parallel time dimension called \"Friday.\" The dress code and face control will only be available on Monday, and today the stylized dog is bombing your party. And such a crazy Friday - every day!</p><p>FRIDAY special beer - a new generation of ready-to-drink lemonades based on natural beer - will turn your world upside down in the truest sense of the word! With one simple movement, gray working days turn into a holiday extravaganza and light mood.</p><p>Trendy Friday beer lemonade with a strength of 5% - easy during and easy after. A pleasant aftertaste is its feature, so this party will always have the airy aroma of fresh citrus and novelty of acquaintances in your memories.</p><p>Available in a unique 0.45 liter glass bottle with tactile bubbles on the surface for interest. Convenient cover \"twist-off\" (\"turn and open\") does not force you to pause in search of an opener, because Friday is the fun of a continuous weekend and not a second of domestic boredom!</p><p>Don\'t pull - FRIDAY again today!</p><p>&nbsp;</p>', 1, '678b2f4f56d42.jpg'),
(15, 'Hartwall, Cool Grape, Long Drink 5,5% 0,33l', 3, '20.00', 10, 'The beloved Cool Grape is made in the style of the original Finnish Long Drink.\r\nThis mixed fruit drink includes natural grapefruit aroma and tastes fresh and balanced.\r\nEnjoy cooled. Kippis!\r\nPrice includes can deposit 0,25€ in Germany.', '<p><strong>IMPORTANT!&nbsp;</strong>From 18! This product contains alcohol and must not be given to anyone under the legal age. Delivery to minors is not possible. With your order you confirm that you have the legal minimum age. Please be responsible when dealing with this article. More information at kenn-dein-limit.info</p><p><strong>Ingredients:</strong> water, apple wine, sugar, carbon dioxide, acidity regulator E330, stabilizers E414 and E445, natural grapefruit aroma and other natural flavors. Juice content at least 15%. Contains sulphites.</p><p><strong>Alcohol VOL:</strong> 5,5 %</p><p><strong>Category:</strong> mixed drink based on fruit wine</p><p><strong>Net weight:</strong> 0,33l</p><p><strong>Packing type:</strong> metal can</p><p><strong>Manufacturer:</strong> Royal Unibrew A/S, Faxe Allé 1, DK-4640 Faxe, Denmark</p><p><strong>Country of origin:</strong> Denmark</p>', 1, '678b3038abb7a.jpg'),
(16, 'Cosmopolitan Premixed Cocktail', 4, '50.00', 10, 'A hall-of-fame cocktail with tangy-sweet cranberry notes and Ketel One Vodka.', '', 1, '678b314d1300f.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `access_level` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `lastname`, `firstname`, `access_level`) VALUES
(1, 'fasdfasdfas@gsdfsa.com', '02c75fb22c75b23dc963c7eb91a062cc', 'fasdfdsa', 'asdfasd', 10),
(2, 'victor@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 'Khomniuk user', 'Victor user', NULL),
(8, 'nadia@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 'Koltcova', 'Nadia', 10),
(9, 'ipz224_kno@student.ztu.edu.ua', 'b59c67bf196a4758191e42f76670ceba', 'Koltsova', 'Nadia', NULL);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Індекси таблиці `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `custom`
--
ALTER TABLE `custom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Індекси таблиці `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `address`
--
ALTER TABLE `address`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `custom`
--
ALTER TABLE `custom`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9994;

--
-- AUTO_INCREMENT для таблиці `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `custom`
--
ALTER TABLE `custom`
  ADD CONSTRAINT `custom_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
