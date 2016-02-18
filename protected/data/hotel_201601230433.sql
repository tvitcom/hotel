-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Янв 23 2016 г., 04:33
-- Версия сервера: 5.5.46-0ubuntu0.12.04.2
-- Версия PHP: 5.3.10-1ubuntu3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `hotel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(21) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `fullname` varchar(64) DEFAULT NULL COMMENT 'Full Name',
  `email` varchar(64) DEFAULT NULL COMMENT 'E-mail',
  `phone` varchar(18) NOT NULL,
  `passhash` varchar(64) DEFAULT NULL COMMENT 'pass_hash',
  `photo1` varchar(2048) DEFAULT NULL COMMENT 'User photo',
  `voicecall` varchar(45) DEFAULT NULL,
  `privs` text COMMENT 'Priveleges',
  `notes` text COMMENT 'Notes',
  `is_active` tinyint(1) unsigned DEFAULT '0' COMMENT 'Is_active',
  `user_sert` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `discounts`
--

CREATE TABLE IF NOT EXISTS `discounts` (
  `id` bigint(21) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `t_start` datetime DEFAULT NULL,
  `t_finish` datetime DEFAULT NULL,
  `percent` int(2) unsigned DEFAULT NULL,
  `notes` varchar(45) DEFAULT NULL,
  `promo_code` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `discounts`
--

INSERT INTO `discounts` (`id`, `title`, `t_start`, `t_finish`, `percent`, `notes`, `promo_code`) VALUES
(1, 'Скидка по пятницам', '2015-12-08 00:00:00', '2015-12-31 00:00:01', 50, 'для статового времени и до времени завершения', '809809809809809');

-- --------------------------------------------------------

--
-- Структура таблицы `hotels`
--

CREATE TABLE IF NOT EXISTS `hotels` (
  `id` bigint(21) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `en_name` varchar(45) DEFAULT NULL,
  `rating` tinyint(1) unsigned DEFAULT NULL,
  `market_description` text,
  `country` varchar(15) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `map_location` varchar(45) DEFAULT NULL,
  `phone1` varchar(15) DEFAULT NULL,
  `phone2` varchar(15) DEFAULT NULL,
  `phone3` varchar(15) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `website` varchar(45) DEFAULT NULL,
  `photo1` varchar(45) DEFAULT NULL,
  `photo2` varchar(45) DEFAULT NULL,
  `photo3` varchar(45) DEFAULT NULL,
  `photo4` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `en_name`, `rating`, `market_description`, `country`, `city`, `address`, `map_location`, `phone1`, `phone2`, `phone3`, `fax`, `website`, `photo1`, `photo2`, `photo3`, `photo4`) VALUES
(1, 'На Барабашова', 'Barabashovo hotel', 2, 'Отель является прекрасным местом для отдыха и проведения досуга. Имеется Баня, мангал, автосервис, уютные номера со всем необходимым для удобства и отдыха.', 'Украина', 'Харьков', 'ул. Академика Павлова, 110', NULL, NULL, NULL, NULL, NULL, 'nosite.ruru', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `price`
--

CREATE TABLE IF NOT EXISTS `price` (
  `id` bigint(21) unsigned NOT NULL AUTO_INCREMENT,
  `hotels_id` bigint(21) unsigned NOT NULL,
  `name` varchar(96) DEFAULT NULL,
  `marketing_descr` text,
  `description` text,
  `price` decimal(9,2) DEFAULT NULL,
  `price_opt` decimal(9,2) DEFAULT NULL,
  `price_unit` decimal(9,2) DEFAULT NULL,
  `price_prefer` decimal(9,2) DEFAULT NULL,
  `in_currency` char(3) DEFAULT 'USD',
  `is_active` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_price_hotels1_idx` (`hotels_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `price`
--

INSERT INTO `price` (`id`, `hotels_id`, `name`, `marketing_descr`, `description`, `price`, `price_opt`, `price_unit`, `price_prefer`, `in_currency`, `is_active`) VALUES
(1, 1, 'Завтрак в номер', 'Свежеприготовленное чтонибудь', 'Самые свежие фрукты с барабашова!!!', 100.00, NULL, 1.00, NULL, 'UAH', 1),
(2, 1, 'Обед в номер', 'Вкусненькое что нибудь на обед - обязательно отведайте:)!!!', 'Вкусненькое что нибудь', 150.00, NULL, 1.00, NULL, 'UAH', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` bigint(21) unsigned NOT NULL AUTO_INCREMENT,
  `hotels_id` bigint(21) unsigned NOT NULL,
  `room_number` char(9) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` text,
  `market_description` text,
  `maps_location` varchar(128) DEFAULT NULL,
  `address_location` varchar(128) DEFAULT NULL,
  `stage` tinyint(3) DEFAULT NULL,
  `roomtype` enum('1 bed','2 beds','appartment') DEFAULT NULL,
  `bedrooms` tinyint(1) unsigned DEFAULT NULL,
  `photo1` varchar(2048) DEFAULT NULL,
  `photo2` varchar(2048) DEFAULT NULL,
  `photo3` varchar(2048) DEFAULT NULL,
  `photo4` varchar(2048) DEFAULT NULL,
  `photo5` varchar(2048) DEFAULT NULL,
  `photo6` varchar(2048) DEFAULT NULL,
  `room_cert` text,
  `is_vacant` tinyint(1) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_rooms_hotels1_idx` (`hotels_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='room describe' AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `rooms`
--

INSERT INTO `rooms` (`id`, `hotels_id`, `room_number`, `name`, `description`, `market_description`, `maps_location`, `address_location`, `stage`, `roomtype`, `bedrooms`, `photo1`, `photo2`, `photo3`, `photo4`, `photo5`, `photo6`, `room_cert`, `is_vacant`) VALUES
(1, 1, '001', '#001', 'На первом этаже - кому не нравится не берите!!!:)', 'Квартирка жесть -- попробуйте и поймете:)', NULL, NULL, 1, '2 beds', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 1, '002', '#002', 'Комната на втором этаже.', 'Средний этаж где все должно быть удобно!', NULL, NULL, 2, '2 beds', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(3, 1, '003', '#003', 'На третьем этаже', 'самый высокий этаж в гостинице - видно все берабашово:)', NULL, NULL, 3, 'appartment', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `serviceflow`
--

CREATE TABLE IF NOT EXISTS `serviceflow` (
  `id` bigint(21) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` bigint(21) unsigned NOT NULL,
  `room_id` bigint(21) unsigned DEFAULT NULL,
  `item_id` bigint(21) unsigned DEFAULT NULL,
  `quantity_item` int(11) unsigned DEFAULT NULL,
  `t_order` varchar(45) DEFAULT NULL,
  `t_to` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_serviceflow_price1_idx` (`item_id`),
  KEY `fk_serviceflow_rooms1_idx` (`room_id`),
  KEY `fk_serviceflow_users1_idx` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(21) unsigned NOT NULL AUTO_INCREMENT,
  `fio` varchar(45) DEFAULT NULL,
  `login` varchar(20) DEFAULT NULL,
  `passhash` varchar(64) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `t_employment` datetime DEFAULT NULL,
  `privileges` text,
  `is_active` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `login`, `passhash`, `phone`, `email`, `position`, `t_employment`, `privileges`, `is_active`) VALUES
(1, 'Админ', 'admin', '$2y$13$qNIftsuAkYNX5IQne4o9J.FUAD14twzbxJFRmpdv6kvuveOp2jA0W', '000000000000', 'admin@admin.ruru', 'administrator', '2015-12-08 00:00:00', '{"role":"admin"}', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `visits`
--

CREATE TABLE IF NOT EXISTS `visits` (
  `id` bigint(21) unsigned NOT NULL AUTO_INCREMENT,
  `visiter_id` bigint(21) unsigned NOT NULL,
  `room_id` bigint(21) unsigned NOT NULL,
  `t_ingoing` datetime NOT NULL COMMENT 'Time ingoing',
  `t_outgoing` datetime NOT NULL COMMENT 'Time outgoing',
  `user_note` varchar(512) DEFAULT NULL COMMENT 'Notes from user',
  `user_review` varchar(1024) DEFAULT NULL COMMENT 'Review',
  `user_rating` tinyint(1) unsigned DEFAULT NULL COMMENT 'Rating of 5',
  `promo_code` varchar(16) DEFAULT NULL,
  `ammount` int(11) DEFAULT NULL,
  `to_pay` int(11) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `payment_sign` text,
  `payment_descr` varchar(128) DEFAULT NULL,
  `discount_id` bigint(21) unsigned DEFAULT NULL COMMENT 'id discount',
  PRIMARY KEY (`id`),
  KEY `fk_visits_user_idx` (`visiter_id`),
  KEY `fk_visits_rooms1_idx` (`room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `fk_price_hotels1` FOREIGN KEY (`hotels_id`) REFERENCES `hotels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `fk_rooms_hotels1` FOREIGN KEY (`hotels_id`) REFERENCES `hotels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `serviceflow`
--
ALTER TABLE `serviceflow`
  ADD CONSTRAINT `fk_serviceflow_price1` FOREIGN KEY (`item_id`) REFERENCES `price` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_serviceflow_rooms1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_serviceflow_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `visits`
--
ALTER TABLE `visits`
  ADD CONSTRAINT `fk_visits_rooms1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_visits_user` FOREIGN KEY (`visiter_id`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
