-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Сер 24 2017 р., 09:20
-- Версія сервера: 5.5.53
-- Версія PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `documentator`
--

-- --------------------------------------------------------

--
-- Структура таблиці `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Администратор', '7', 1495306829),
('Менеджер', '6', 1495306843),
('Супер пользователь', '4', 1494435781);

-- --------------------------------------------------------

--
-- Структура таблиці `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1494435747, 1494435747),
('/calculation/*', 2, NULL, NULL, NULL, 1495305980, 1495305980),
('/directory/*', 2, NULL, NULL, NULL, 1498307514, 1498307514),
('/product/*', 2, NULL, NULL, NULL, 1495306005, 1495306005),
('/product/index/*', 2, NULL, NULL, NULL, 1495306503, 1495306503),
('/product/index/index', 2, NULL, NULL, NULL, 1495306310, 1495306310),
('/product/index/view', 2, NULL, NULL, NULL, 1495306316, 1495306316),
('/site/*', 2, NULL, NULL, NULL, 1495305966, 1495305966),
('Администратор', 1, 'Все, кроме управления доступом', NULL, NULL, 1495306084, 1498307526),
('Менеджер', 1, 'Просмотр продукции', NULL, NULL, 1495306135, 1495308558),
('Супер пользователь', 1, 'Полный доступ', NULL, NULL, 1494435731, 1495306046);

-- --------------------------------------------------------

--
-- Структура таблиці `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Супер пользователь', '/*'),
('Администратор', '/calculation/*'),
('Администратор', '/directory/*'),
('Администратор', '/product/*'),
('Менеджер', '/product/index/*'),
('Менеджер', '/product/index/index'),
('Менеджер', '/product/index/view'),
('Администратор', '/site/*'),
('Менеджер', '/site/*');

-- --------------------------------------------------------

--
-- Структура таблиці `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `calculation`
--

CREATE TABLE `calculation` (
  `calculation_id` int(11) UNSIGNED NOT NULL,
  `calculation_product_id` int(10) UNSIGNED DEFAULT NULL,
  `calculation_product_title` varchar(255) NOT NULL,
  `calculation_date` datetime NOT NULL,
  `calculation_note` datetime DEFAULT NULL,
  `calculation_product_capacity_hour` decimal(12,2) UNSIGNED NOT NULL,
  `calculation_weight` int(12) UNSIGNED DEFAULT NULL,
  `calculation_length` decimal(10,2) UNSIGNED DEFAULT NULL,
  `calculation_width` decimal(10,2) UNSIGNED DEFAULT NULL,
  `calculation_thickness` decimal(10,2) UNSIGNED DEFAULT NULL,
  `calculation_unit` varchar(255) DEFAULT NULL,
  `calculation_materials_data` mediumtext,
  `calculation_materials_additional_data` mediumtext,
  `calculation_recipe_data` mediumtext,
  `calculation_packs_data` mediumtext,
  `calculation_positions_data` mediumtext,
  `calculation_expenses_data` mediumtext,
  `calculation_losses_data` mediumtext,
  `calculation_archive` smallint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `calculation`
--

INSERT INTO `calculation` (`calculation_id`, `calculation_product_id`, `calculation_product_title`, `calculation_date`, `calculation_note`, `calculation_product_capacity_hour`, `calculation_weight`, `calculation_length`, `calculation_width`, `calculation_thickness`, `calculation_unit`, `calculation_materials_data`, `calculation_materials_additional_data`, `calculation_recipe_data`, `calculation_packs_data`, `calculation_positions_data`, `calculation_expenses_data`, `calculation_losses_data`, `calculation_archive`) VALUES
(183, 1, 'Acoustics 600*700*1.5(архив)', '2017-07-08 22:24:30', '2017-07-09 13:34:04', '2000.00', 1200, '700.00', '600.00', '1.50', 'лист', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:495.00000000000006;s:8:\"quantity\";d:0.14999999999999999;s:4:\"summ\";d:74.25;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15.450000000000001;s:8:\"quantity\";d:0.80000000000000004;s:4:\"summ\";d:12.360000000000001;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:1:{i:10;a:8:{s:5:\"title\";s:17:\"Втулка №1\";s:4:\"unit\";s:19:\"м.погонный\";s:5:\"price\";d:15;s:8:\"quantity\";s:6:\"0.1000\";s:4:\"summ\";d:1.5;s:4:\"loss\";s:4:\"5.00\";s:6:\"weight\";d:0.014999999999999999;s:6:\"brutto\";i:0;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":2:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.12925;s:5:\"price\";d:1.5351000000000001;s:4:\"summ\";d:0.19841167500000001;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.035249999999999997;s:5:\"price\";d:1500;s:4:\"summ\";d:52.874999999999993;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.070499999999999993;s:5:\"price\";d:1312.5;s:4:\"summ\";d:92.531249999999986;}}}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:2:{i:4;a:4:{s:5:\"title\";s:23:\"Упаковка №666\";s:8:\"capacity\";s:5:\"15.00\";s:5:\"price\";s:7:\"18.0000\";s:5:\"value\";d:1.2;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";s:7:\"60.0000\";s:5:\"value\";d:0.20000000000000001;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"3.00\";s:14:\"value_per_hour\";s:5:\"15.70\";s:4:\"summ\";d:0.023549999999999998;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.012874999999999999;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.0089374999999999993;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"15.0000\";s:4:\"summ\";d:0.0074999999999999997;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"2.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:235.86052417499999;}', 1),
(185, 6, 'MaxLevel 600*700*1.5 2(архив)', '2017-07-08 22:24:30', '2017-07-09 13:34:04', '2000.00', 1200, '700.00', '600.00', '1.50', 'лист', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:495.00000000000006;s:8:\"quantity\";d:0.14999999999999999;s:4:\"summ\";d:74.25;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15.450000000000001;s:8:\"quantity\";d:0.80000000000000004;s:4:\"summ\";d:12.360000000000001;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:0:{}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":2:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.13750000000000001;s:5:\"price\";d:1.5351000000000001;s:4:\"summ\";d:0.21107625000000005;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.037499999999999999;s:5:\"price\";d:1500;s:4:\"summ\";d:56.25;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.074999999999999997;s:5:\"price\";d:1312.5;s:4:\"summ\";d:98.4375;}}}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:2:{i:1;a:4:{s:5:\"title\";s:19:\"Коробка №1\";s:8:\"capacity\";s:5:\"15.00\";s:5:\"price\";s:6:\"3.8000\";s:5:\"value\";d:0.2533333333333333;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";s:7:\"60.0000\";s:5:\"value\";d:0.20000000000000001;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"3.00\";s:14:\"value_per_hour\";s:5:\"15.70\";s:4:\"summ\";d:0.023549999999999998;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.012874999999999999;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.0089374999999999993;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"15.0000\";s:4:\"summ\";d:0.0074999999999999997;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"2.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:242.63277208333335;}', 1),
(186, 7, 'MaxLevel 600*700*1.5(архив)', '2017-07-08 22:24:30', '2017-07-09 13:34:04', '2000.00', 1200, '700.00', '600.00', '1.50', 'лист', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:495.00000000000006;s:8:\"quantity\";d:0.14999999999999999;s:4:\"summ\";d:74.25;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15.450000000000001;s:8:\"quantity\";d:0.80000000000000004;s:4:\"summ\";d:12.360000000000001;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:0:{}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":2:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.13750000000000001;s:5:\"price\";d:1.5351000000000001;s:4:\"summ\";d:0.21107625000000005;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.037499999999999999;s:5:\"price\";d:1500;s:4:\"summ\";d:56.25;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.074999999999999997;s:5:\"price\";d:1312.5;s:4:\"summ\";d:98.4375;}}}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:2:{i:1;a:4:{s:5:\"title\";s:19:\"Коробка №1\";s:8:\"capacity\";s:5:\"15.00\";s:5:\"price\";s:6:\"3.8000\";s:5:\"value\";d:0.2533333333333333;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";s:7:\"60.0000\";s:5:\"value\";d:0.20000000000000001;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"3.00\";s:14:\"value_per_hour\";s:5:\"15.70\";s:4:\"summ\";d:0.023549999999999998;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.012874999999999999;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.0089374999999999993;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"15.0000\";s:4:\"summ\";d:0.0074999999999999997;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"2.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:242.63277208333335;}', 1),
(191, 9, 'Лента К2 (архив)', '2017-07-09 00:27:13', '2017-07-09 13:34:04', '50.00', 0, '1000.00', '20.00', '1.50', 'м.погонный', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:495.00000000000006;s:8:\"quantity\";d:0.14999999999999999;s:4:\"summ\";d:74.25;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15.450000000000001;s:8:\"quantity\";d:0.80000000000000004;s:4:\"summ\";d:12.360000000000001;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:0:{}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":2:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.44;s:5:\"price\";d:1.5351000000000001;s:4:\"summ\";d:0.67544400000000004;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.12;s:5:\"price\";d:1500;s:4:\"summ\";d:180;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.23999999999999999;s:5:\"price\";d:1312.5;s:4:\"summ\";d:315;}}}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:3:{i:1;a:4:{s:5:\"title\";s:19:\"Коробка №1\";s:8:\"capacity\";s:5:\"15.00\";s:5:\"price\";s:6:\"3.8000\";s:5:\"value\";d:0.2533333333333333;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";s:7:\"60.0000\";s:5:\"value\";d:0.20000000000000001;}i:4;a:4:{s:5:\"title\";s:23:\"Упаковка №666\";s:8:\"capacity\";s:5:\"30.00\";s:5:\"price\";s:7:\"18.0000\";s:5:\"value\";d:0.59999999999999998;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"3.00\";s:14:\"value_per_hour\";s:5:\"15.70\";s:4:\"summ\";d:0.94199999999999995;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.51500000000000001;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.35749999999999998;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"15.0000\";s:4:\"summ\";d:0.29999999999999999;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"2.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:586.07127733333323;}', 1),
(192, 5, 'Acoustics 600*700*1.5 2(архив)', '2017-07-09 13:33:31', '2017-07-09 13:34:04', '2000.50', 1200, '700.00', '600.00', '1.50', 'лист', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:495.00000000000006;s:8:\"quantity\";d:0.14999999999999999;s:4:\"summ\";d:74.25;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15.450000000000001;s:8:\"quantity\";d:0.80000000000000004;s:4:\"summ\";d:12.360000000000001;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:2:{i:8;a:8:{s:5:\"title\";s:14:\"Фольга 2\";s:4:\"unit\";s:4:\"гр\";s:5:\"price\";d:0.14999999999999999;s:8:\"quantity\";s:8:\"123.0000\";s:4:\"summ\";d:18.449999999999999;s:4:\"loss\";i:0;s:6:\"weight\";d:0.123;s:6:\"brutto\";i:1;}i:10;a:8:{s:5:\"title\";s:17:\"Втулка №1\";s:4:\"unit\";s:19:\"м.погонный\";s:5:\"price\";d:15;s:8:\"quantity\";s:6:\"0.1000\";s:4:\"summ\";d:1.5;s:4:\"loss\";i:0;s:6:\"weight\";d:0.17000000000000001;s:6:\"brutto\";i:0;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":2:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.043999999999999997;s:5:\"price\";d:1.5351000000000001;s:4:\"summ\";d:0.067544400000000004;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.012;s:5:\"price\";d:1500;s:4:\"summ\";d:18;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.024;s:5:\"price\";d:1312.5;s:4:\"summ\";d:31.5;}}}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:2:{i:1;a:4:{s:5:\"title\";s:19:\"Коробка №1\";s:8:\"capacity\";s:5:\"15.00\";s:5:\"price\";s:6:\"3.8000\";s:5:\"value\";d:0.2533333333333333;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";s:7:\"60.0000\";s:5:\"value\";d:0.20000000000000001;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"3.00\";s:14:\"value_per_hour\";s:5:\"15.70\";s:4:\"summ\";d:0.02354411397150712;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.012871782054486379;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.0089352661834541363;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"15.0000\";s:4:\"summ\";d:0.0074981254686328422;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"2.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:157.25172702101145;}', 1),
(193, 1, 'Acoustics 600*700*1.5(архив)', '2017-07-09 13:34:04', '2017-07-10 20:46:36', '2000.00', 1200, '700.00', '600.00', '1.50', 'лист', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:495.00000000000006;s:8:\"quantity\";d:0.14999999999999999;s:4:\"summ\";d:74.25;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15.450000000000001;s:8:\"quantity\";d:0.80000000000000004;s:4:\"summ\";d:12.360000000000001;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:1:{i:10;a:8:{s:5:\"title\";s:17:\"Втулка №1\";s:4:\"unit\";s:19:\"м.погонный\";s:5:\"price\";d:15;s:8:\"quantity\";s:6:\"0.1000\";s:4:\"summ\";d:1.5;s:4:\"loss\";s:4:\"5.00\";s:6:\"weight\";d:0.014999999999999999;s:6:\"brutto\";i:0;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":2:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.12925;s:5:\"price\";d:1.5351000000000001;s:4:\"summ\";d:0.19841167500000001;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.035249999999999997;s:5:\"price\";d:1500;s:4:\"summ\";d:52.874999999999993;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.070499999999999993;s:5:\"price\";d:1312.5;s:4:\"summ\";d:92.531249999999986;}}}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:2:{i:4;a:4:{s:5:\"title\";s:23:\"Упаковка №666\";s:8:\"capacity\";s:5:\"15.00\";s:5:\"price\";s:7:\"18.0000\";s:5:\"value\";d:1.2;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";s:7:\"60.0000\";s:5:\"value\";d:0.20000000000000001;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"3.00\";s:14:\"value_per_hour\";s:5:\"15.70\";s:4:\"summ\";d:0.023549999999999998;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.012874999999999999;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.0089374999999999993;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"15.0000\";s:4:\"summ\";d:0.0074999999999999997;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"2.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:235.86052417499999;}', 1),
(194, 5, 'Acoustics 600*700*1.5 2(архив)', '2017-07-09 13:34:04', '2017-07-10 20:46:37', '2000.50', 1200, '700.00', '600.00', '1.50', 'лист', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:495.00000000000006;s:8:\"quantity\";d:0.14999999999999999;s:4:\"summ\";d:74.25;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15.450000000000001;s:8:\"quantity\";d:0.80000000000000004;s:4:\"summ\";d:12.360000000000001;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:2:{i:8;a:8:{s:5:\"title\";s:14:\"Фольга 2\";s:4:\"unit\";s:4:\"гр\";s:5:\"price\";d:0.14999999999999999;s:8:\"quantity\";s:8:\"123.0000\";s:4:\"summ\";d:18.449999999999999;s:4:\"loss\";i:0;s:6:\"weight\";d:0.123;s:6:\"brutto\";i:1;}i:10;a:8:{s:5:\"title\";s:17:\"Втулка №1\";s:4:\"unit\";s:19:\"м.погонный\";s:5:\"price\";d:15;s:8:\"quantity\";s:6:\"0.1000\";s:4:\"summ\";d:1.5;s:4:\"loss\";i:0;s:6:\"weight\";d:0.17000000000000001;s:6:\"brutto\";i:0;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":2:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.043999999999999997;s:5:\"price\";d:1.5351000000000001;s:4:\"summ\";d:0.067544400000000004;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.012;s:5:\"price\";d:1500;s:4:\"summ\";d:18;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.024;s:5:\"price\";d:1312.5;s:4:\"summ\";d:31.5;}}}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:2:{i:1;a:4:{s:5:\"title\";s:19:\"Коробка №1\";s:8:\"capacity\";s:5:\"15.00\";s:5:\"price\";s:6:\"3.8000\";s:5:\"value\";d:0.2533333333333333;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";s:7:\"60.0000\";s:5:\"value\";d:0.20000000000000001;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"3.00\";s:14:\"value_per_hour\";s:5:\"15.70\";s:4:\"summ\";d:0.02354411397150712;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.012871782054486379;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.0089352661834541363;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"15.0000\";s:4:\"summ\";d:0.0074981254686328422;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"2.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:157.25172702101145;}', 1),
(195, 6, 'MaxLevel 600*700*1.5 2(архив)', '2017-07-09 13:34:04', '2017-07-10 20:46:37', '2000.00', 1200, '700.00', '600.00', '1.50', 'лист', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:495.00000000000006;s:8:\"quantity\";d:0.14999999999999999;s:4:\"summ\";d:74.25;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15.450000000000001;s:8:\"quantity\";d:0.80000000000000004;s:4:\"summ\";d:12.360000000000001;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:0:{}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":2:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.13750000000000001;s:5:\"price\";d:1.5351000000000001;s:4:\"summ\";d:0.21107625000000005;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.037499999999999999;s:5:\"price\";d:1500;s:4:\"summ\";d:56.25;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.074999999999999997;s:5:\"price\";d:1312.5;s:4:\"summ\";d:98.4375;}}}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:2:{i:1;a:4:{s:5:\"title\";s:19:\"Коробка №1\";s:8:\"capacity\";s:5:\"15.00\";s:5:\"price\";s:6:\"3.8000\";s:5:\"value\";d:0.2533333333333333;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";s:7:\"60.0000\";s:5:\"value\";d:0.20000000000000001;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"3.00\";s:14:\"value_per_hour\";s:5:\"15.70\";s:4:\"summ\";d:0.023549999999999998;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.012874999999999999;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.0089374999999999993;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"15.0000\";s:4:\"summ\";d:0.0074999999999999997;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"2.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:242.63277208333335;}', 1),
(196, 7, 'MaxLevel 600*700*1.5(архив)', '2017-07-09 13:34:05', '2017-07-10 20:46:37', '2000.00', 1200, '700.00', '600.00', '1.50', 'лист', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:495.00000000000006;s:8:\"quantity\";d:0.14999999999999999;s:4:\"summ\";d:74.25;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15.450000000000001;s:8:\"quantity\";d:0.80000000000000004;s:4:\"summ\";d:12.360000000000001;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:0:{}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":2:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.13750000000000001;s:5:\"price\";d:1.5351000000000001;s:4:\"summ\";d:0.21107625000000005;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.037499999999999999;s:5:\"price\";d:1500;s:4:\"summ\";d:56.25;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.074999999999999997;s:5:\"price\";d:1312.5;s:4:\"summ\";d:98.4375;}}}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:2:{i:1;a:4:{s:5:\"title\";s:19:\"Коробка №1\";s:8:\"capacity\";s:5:\"15.00\";s:5:\"price\";s:6:\"3.8000\";s:5:\"value\";d:0.2533333333333333;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";s:7:\"60.0000\";s:5:\"value\";d:0.20000000000000001;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"3.00\";s:14:\"value_per_hour\";s:5:\"15.70\";s:4:\"summ\";d:0.023549999999999998;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.012874999999999999;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.0089374999999999993;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"15.0000\";s:4:\"summ\";d:0.0074999999999999997;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"2.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:242.63277208333335;}', 1),
(197, 9, 'Лента К2 (архив)', '2017-07-09 13:34:05', '2017-07-10 20:46:37', '50.00', 0, '1000.00', '20.00', '1.50', 'м.погонный', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:495.00000000000006;s:8:\"quantity\";d:0.14999999999999999;s:4:\"summ\";d:74.25;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15.450000000000001;s:8:\"quantity\";d:0.80000000000000004;s:4:\"summ\";d:12.360000000000001;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:0:{}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":2:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.44;s:5:\"price\";d:1.5351000000000001;s:4:\"summ\";d:0.67544400000000004;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.12;s:5:\"price\";d:1500;s:4:\"summ\";d:180;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.23999999999999999;s:5:\"price\";d:1312.5;s:4:\"summ\";d:315;}}}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:3:{i:1;a:4:{s:5:\"title\";s:19:\"Коробка №1\";s:8:\"capacity\";s:5:\"15.00\";s:5:\"price\";s:6:\"3.8000\";s:5:\"value\";d:0.2533333333333333;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";s:7:\"60.0000\";s:5:\"value\";d:0.20000000000000001;}i:4;a:4:{s:5:\"title\";s:23:\"Упаковка №666\";s:8:\"capacity\";s:5:\"30.00\";s:5:\"price\";s:7:\"18.0000\";s:5:\"value\";d:0.59999999999999998;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"3.00\";s:14:\"value_per_hour\";s:5:\"15.70\";s:4:\"summ\";d:0.94199999999999995;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.51500000000000001;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.35749999999999998;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"15.0000\";s:4:\"summ\";d:0.29999999999999999;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"2.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:586.07127733333323;}', 1),
(198, 1, 'Acoustics 600*700*1.5(архив)', '2017-07-10 20:46:37', '2017-07-13 20:10:00', '2000.00', 1200, '700.00', '600.00', '1.50', 'лист', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:495.00000000000006;s:8:\"quantity\";d:0.14999999999999999;s:4:\"summ\";d:74.25;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15.450000000000001;s:8:\"quantity\";d:0.80000000000000004;s:4:\"summ\";d:12.360000000000001;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:1:{i:10;a:8:{s:5:\"title\";s:17:\"Втулка №1\";s:4:\"unit\";s:19:\"м.погонный\";s:5:\"price\";d:15;s:8:\"quantity\";s:6:\"0.1000\";s:4:\"summ\";d:1.5;s:4:\"loss\";s:4:\"5.00\";s:6:\"weight\";d:0.014999999999999999;s:6:\"brutto\";i:0;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":2:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.12925;s:5:\"price\";d:1.5351000000000001;s:4:\"summ\";d:0.19841167500000001;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.035249999999999997;s:5:\"price\";d:1500;s:4:\"summ\";d:52.874999999999993;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.070499999999999993;s:5:\"price\";d:1312.5;s:4:\"summ\";d:92.531249999999986;}}}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:2:{i:4;a:4:{s:5:\"title\";s:23:\"Упаковка №666\";s:8:\"capacity\";s:5:\"15.00\";s:5:\"price\";s:7:\"18.0000\";s:5:\"value\";d:1.2;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";s:7:\"60.0000\";s:5:\"value\";d:0.20000000000000001;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"3.00\";s:14:\"value_per_hour\";s:5:\"15.70\";s:4:\"summ\";d:0.023549999999999998;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.012874999999999999;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.0089374999999999993;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"15.0000\";s:4:\"summ\";d:0.0074999999999999997;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"2.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:235.86052417499999;}', 1),
(199, 5, 'Acoustics 600*700*1.5 2(архив)', '2017-07-10 20:46:37', '2017-07-13 20:10:00', '2000.50', 1200, '700.00', '600.00', '1.50', 'лист', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:495.00000000000006;s:8:\"quantity\";d:0.14999999999999999;s:4:\"summ\";d:74.25;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15.450000000000001;s:8:\"quantity\";d:0.80000000000000004;s:4:\"summ\";d:12.360000000000001;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:2:{i:8;a:8:{s:5:\"title\";s:14:\"Фольга 2\";s:4:\"unit\";s:4:\"гр\";s:5:\"price\";d:0.14999999999999999;s:8:\"quantity\";s:8:\"123.0000\";s:4:\"summ\";d:18.449999999999999;s:4:\"loss\";i:0;s:6:\"weight\";d:0.123;s:6:\"brutto\";i:1;}i:10;a:8:{s:5:\"title\";s:17:\"Втулка №1\";s:4:\"unit\";s:19:\"м.погонный\";s:5:\"price\";d:15;s:8:\"quantity\";s:6:\"0.1000\";s:4:\"summ\";d:1.5;s:4:\"loss\";i:0;s:6:\"weight\";d:0.17000000000000001;s:6:\"brutto\";i:0;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":2:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.043999999999999997;s:5:\"price\";d:1.5351000000000001;s:4:\"summ\";d:0.067544400000000004;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.012;s:5:\"price\";d:1500;s:4:\"summ\";d:18;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.024;s:5:\"price\";d:1312.5;s:4:\"summ\";d:31.5;}}}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:2:{i:1;a:4:{s:5:\"title\";s:19:\"Коробка №1\";s:8:\"capacity\";s:5:\"15.00\";s:5:\"price\";s:6:\"3.8000\";s:5:\"value\";d:0.2533333333333333;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";s:7:\"60.0000\";s:5:\"value\";d:0.20000000000000001;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"3.00\";s:14:\"value_per_hour\";s:5:\"15.70\";s:4:\"summ\";d:0.02354411397150712;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.012871782054486379;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.0089352661834541363;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"15.0000\";s:4:\"summ\";d:0.0074981254686328422;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"2.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:157.25172702101145;}', 1),
(200, 6, 'MaxLevel 600*700*1.5 2(архив)', '2017-07-10 20:46:37', '2017-07-13 20:10:00', '2000.00', 1200, '700.00', '600.00', '1.50', 'лист', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:495.00000000000006;s:8:\"quantity\";d:0.14999999999999999;s:4:\"summ\";d:74.25;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15.450000000000001;s:8:\"quantity\";d:0.80000000000000004;s:4:\"summ\";d:12.360000000000001;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:0:{}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":2:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.13750000000000001;s:5:\"price\";d:1.5351000000000001;s:4:\"summ\";d:0.21107625000000005;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.037499999999999999;s:5:\"price\";d:1500;s:4:\"summ\";d:56.25;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.074999999999999997;s:5:\"price\";d:1312.5;s:4:\"summ\";d:98.4375;}}}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:2:{i:1;a:4:{s:5:\"title\";s:19:\"Коробка №1\";s:8:\"capacity\";s:5:\"15.00\";s:5:\"price\";s:6:\"3.8000\";s:5:\"value\";d:0.2533333333333333;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";s:7:\"60.0000\";s:5:\"value\";d:0.20000000000000001;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"3.00\";s:14:\"value_per_hour\";s:5:\"15.70\";s:4:\"summ\";d:0.023549999999999998;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.012874999999999999;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.0089374999999999993;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"15.0000\";s:4:\"summ\";d:0.0074999999999999997;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"2.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:242.63277208333335;}', 1),
(201, 7, 'MaxLevel 600*700*1.5(архив)', '2017-07-10 20:46:37', '2017-07-13 20:10:00', '2000.00', 1200, '700.00', '600.00', '1.50', 'лист', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:495.00000000000006;s:8:\"quantity\";d:0.14999999999999999;s:4:\"summ\";d:74.25;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15.450000000000001;s:8:\"quantity\";d:0.80000000000000004;s:4:\"summ\";d:12.360000000000001;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:0:{}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":2:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.13750000000000001;s:5:\"price\";d:1.5351000000000001;s:4:\"summ\";d:0.21107625000000005;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.037499999999999999;s:5:\"price\";d:1500;s:4:\"summ\";d:56.25;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.074999999999999997;s:5:\"price\";d:1312.5;s:4:\"summ\";d:98.4375;}}}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:2:{i:1;a:4:{s:5:\"title\";s:19:\"Коробка №1\";s:8:\"capacity\";s:5:\"15.00\";s:5:\"price\";s:6:\"3.8000\";s:5:\"value\";d:0.2533333333333333;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";s:7:\"60.0000\";s:5:\"value\";d:0.20000000000000001;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"3.00\";s:14:\"value_per_hour\";s:5:\"15.70\";s:4:\"summ\";d:0.023549999999999998;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.012874999999999999;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.0089374999999999993;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"15.0000\";s:4:\"summ\";d:0.0074999999999999997;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"2.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:242.63277208333335;}', 1);
INSERT INTO `calculation` (`calculation_id`, `calculation_product_id`, `calculation_product_title`, `calculation_date`, `calculation_note`, `calculation_product_capacity_hour`, `calculation_weight`, `calculation_length`, `calculation_width`, `calculation_thickness`, `calculation_unit`, `calculation_materials_data`, `calculation_materials_additional_data`, `calculation_recipe_data`, `calculation_packs_data`, `calculation_positions_data`, `calculation_expenses_data`, `calculation_losses_data`, `calculation_archive`) VALUES
(202, 9, 'Лента К2 (архив)', '2017-07-10 20:46:37', '2017-07-13 20:10:00', '50.00', 0, '1000.00', '20.00', '1.50', 'м.погонный', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:495.00000000000006;s:8:\"quantity\";d:0.14999999999999999;s:4:\"summ\";d:74.25;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15.450000000000001;s:8:\"quantity\";d:0.80000000000000004;s:4:\"summ\";d:12.360000000000001;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:0:{}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":2:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.44;s:5:\"price\";d:1.5351000000000001;s:4:\"summ\";d:0.67544400000000004;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.12;s:5:\"price\";d:1500;s:4:\"summ\";d:180;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.23999999999999999;s:5:\"price\";d:1312.5;s:4:\"summ\";d:315;}}}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:3:{i:1;a:4:{s:5:\"title\";s:19:\"Коробка №1\";s:8:\"capacity\";s:5:\"15.00\";s:5:\"price\";s:6:\"3.8000\";s:5:\"value\";d:0.2533333333333333;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";s:7:\"60.0000\";s:5:\"value\";d:0.20000000000000001;}i:4;a:4:{s:5:\"title\";s:23:\"Упаковка №666\";s:8:\"capacity\";s:5:\"30.00\";s:5:\"price\";s:7:\"18.0000\";s:5:\"value\";d:0.59999999999999998;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"3.00\";s:14:\"value_per_hour\";s:5:\"15.70\";s:4:\"summ\";d:0.94199999999999995;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.51500000000000001;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.35749999999999998;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"15.0000\";s:4:\"summ\";d:0.29999999999999999;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"2.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:586.07127733333323;}', 1),
(203, 1, 'Acoustics 600*700*1.5(архив)', '2017-07-13 20:10:01', '2017-07-29 19:44:57', '2000.00', 1200, '700.00', '600.00', '1.50', 'лист', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:495.00000000000006;s:8:\"quantity\";d:0.16;s:4:\"summ\";d:79.200000000000017;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15.450000000000001;s:8:\"quantity\";d:0.40000000000000002;s:4:\"summ\";d:6.1800000000000006;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:1:{i:10;a:8:{s:5:\"title\";s:17:\"Втулка №1\";s:4:\"unit\";s:19:\"м.погонный\";s:5:\"price\";d:15;s:8:\"quantity\";s:6:\"0.1500\";s:4:\"summ\";d:2.25;s:4:\"loss\";s:4:\"5.00\";s:6:\"weight\";d:0.014999999999999999;s:6:\"brutto\";i:0;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":2:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.34375;s:5:\"price\";d:1.5600000000000001;s:4:\"summ\";d:0.53625;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.09375;s:5:\"price\";d:1500;s:4:\"summ\";d:140.625;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.1875;s:5:\"price\";d:1312.5;s:4:\"summ\";d:246.09375;}}}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:2:{i:4;a:4:{s:5:\"title\";s:23:\"Упаковка №666\";s:8:\"capacity\";s:5:\"30.00\";s:5:\"price\";s:7:\"18.0000\";s:5:\"value\";d:0.59999999999999998;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";s:7:\"60.0000\";s:5:\"value\";d:0.20000000000000001;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"4.00\";s:14:\"value_per_hour\";s:5:\"15.70\";s:4:\"summ\";d:0.031399999999999997;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.012874999999999999;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.0089374999999999993;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"20.0000\";s:4:\"summ\";d:0.01;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"3.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:476.1697125;}', 1),
(204, 5, 'Acoustics 600*700*1.5 2(архив)', '2017-07-13 20:10:01', '2017-07-29 19:44:57', '2000.50', 1200, '700.00', '600.00', '1.50', 'лист', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:495.00000000000006;s:8:\"quantity\";d:0.14999999999999999;s:4:\"summ\";d:74.25;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15.450000000000001;s:8:\"quantity\";d:0.80000000000000004;s:4:\"summ\";d:12.360000000000001;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:2:{i:8;a:8:{s:5:\"title\";s:14:\"Фольга 2\";s:4:\"unit\";s:4:\"гр\";s:5:\"price\";d:0.14999999999999999;s:8:\"quantity\";s:8:\"123.0000\";s:4:\"summ\";d:18.449999999999999;s:4:\"loss\";i:0;s:6:\"weight\";d:0.123;s:6:\"brutto\";i:1;}i:10;a:8:{s:5:\"title\";s:17:\"Втулка №1\";s:4:\"unit\";s:19:\"м.погонный\";s:5:\"price\";d:15;s:8:\"quantity\";s:6:\"0.1000\";s:4:\"summ\";d:1.5;s:4:\"loss\";i:0;s:6:\"weight\";d:0.17000000000000001;s:6:\"brutto\";i:0;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":2:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.043999999999999997;s:5:\"price\";d:1.5600000000000001;s:4:\"summ\";d:0.068639999999999993;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.012;s:5:\"price\";d:1500;s:4:\"summ\";d:18;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.024;s:5:\"price\";d:1312.5;s:4:\"summ\";d:31.5;}}}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:2:{i:1;a:4:{s:5:\"title\";s:19:\"Коробка №1\";s:8:\"capacity\";s:5:\"15.00\";s:5:\"price\";s:6:\"3.5500\";s:5:\"value\";d:0.23666666666666666;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";s:7:\"60.0000\";s:5:\"value\";d:0.20000000000000001;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"3.00\";s:14:\"value_per_hour\";s:5:\"15.70\";s:4:\"summ\";d:0.02354411397150712;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.012871782054486379;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.0089352661834541363;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"15.0000\";s:4:\"summ\";d:0.0074981254686328422;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"2.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:157.23615595434475;}', 1),
(205, 6, 'MaxLevel 600*700*1.5 2(архив)', '2017-07-13 20:10:01', '2017-07-29 19:44:57', '2000.00', 1200, '700.00', '600.00', '1.50', 'лист', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:495.00000000000006;s:8:\"quantity\";d:0.14999999999999999;s:4:\"summ\";d:74.25;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15.450000000000001;s:8:\"quantity\";d:0.80000000000000004;s:4:\"summ\";d:12.360000000000001;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:0:{}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":2:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.13750000000000001;s:5:\"price\";d:1.5600000000000001;s:4:\"summ\";d:0.21450000000000002;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.037499999999999999;s:5:\"price\";d:1500;s:4:\"summ\";d:56.25;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.074999999999999997;s:5:\"price\";d:1312.5;s:4:\"summ\";d:98.4375;}}}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:2:{i:1;a:4:{s:5:\"title\";s:19:\"Коробка №1\";s:8:\"capacity\";s:5:\"15.00\";s:5:\"price\";s:6:\"3.5500\";s:5:\"value\";d:0.23666666666666666;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";s:7:\"60.0000\";s:5:\"value\";d:0.20000000000000001;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"3.00\";s:14:\"value_per_hour\";s:5:\"15.70\";s:4:\"summ\";d:0.023549999999999998;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.012874999999999999;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.0089374999999999993;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"15.0000\";s:4:\"summ\";d:0.0074999999999999997;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"2.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:242.61952916666667;}', 1),
(206, 7, 'MaxLevel 600*700*1.5(архив)', '2017-07-13 20:10:01', '2017-07-29 19:44:57', '2000.00', 1200, '700.00', '600.00', '1.50', 'лист', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:495.00000000000006;s:8:\"quantity\";d:0.14999999999999999;s:4:\"summ\";d:74.25;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15.450000000000001;s:8:\"quantity\";d:0.80000000000000004;s:4:\"summ\";d:12.360000000000001;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:0:{}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":2:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.13750000000000001;s:5:\"price\";d:1.5600000000000001;s:4:\"summ\";d:0.21450000000000002;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.037499999999999999;s:5:\"price\";d:1500;s:4:\"summ\";d:56.25;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.074999999999999997;s:5:\"price\";d:1312.5;s:4:\"summ\";d:98.4375;}}}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:2:{i:1;a:4:{s:5:\"title\";s:19:\"Коробка №1\";s:8:\"capacity\";s:5:\"15.00\";s:5:\"price\";s:6:\"3.5500\";s:5:\"value\";d:0.23666666666666666;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";s:7:\"60.0000\";s:5:\"value\";d:0.20000000000000001;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"3.00\";s:14:\"value_per_hour\";s:5:\"15.70\";s:4:\"summ\";d:0.023549999999999998;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.012874999999999999;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.0089374999999999993;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"15.0000\";s:4:\"summ\";d:0.0074999999999999997;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"2.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:242.61952916666667;}', 1),
(207, 9, 'Лента К2 (архив)', '2017-07-13 20:10:01', '2017-07-29 19:44:57', '50.00', 0, '1000.00', '20.00', '1.50', 'м.погонный', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:495.00000000000006;s:8:\"quantity\";d:0.14999999999999999;s:4:\"summ\";d:74.25;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15.450000000000001;s:8:\"quantity\";d:0.80000000000000004;s:4:\"summ\";d:12.360000000000001;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:0:{}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":2:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.44;s:5:\"price\";d:1.5600000000000001;s:4:\"summ\";d:0.68640000000000001;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.12;s:5:\"price\";d:1500;s:4:\"summ\";d:180;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.23999999999999999;s:5:\"price\";d:1312.5;s:4:\"summ\";d:315;}}}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:3:{i:1;a:4:{s:5:\"title\";s:19:\"Коробка №1\";s:8:\"capacity\";s:5:\"15.00\";s:5:\"price\";s:6:\"3.5500\";s:5:\"value\";d:0.23666666666666666;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";s:7:\"60.0000\";s:5:\"value\";d:0.20000000000000001;}i:4;a:4:{s:5:\"title\";s:23:\"Упаковка №666\";s:8:\"capacity\";s:5:\"30.00\";s:5:\"price\";s:7:\"18.0000\";s:5:\"value\";d:0.59999999999999998;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"3.00\";s:14:\"value_per_hour\";s:5:\"15.70\";s:4:\"summ\";d:0.94199999999999995;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.51500000000000001;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.35749999999999998;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"15.0000\";s:4:\"summ\";d:0.29999999999999999;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"2.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:586.06556666666654;}', 1),
(209, 1, 'Acoustics 600*700*1.5', '2017-07-29 19:44:57', NULL, '2050.00', 1200, '700.00', '600.00', '1.50', 'лист', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:514.80000000000007;s:8:\"quantity\";d:0.16;s:4:\"summ\";d:82.368000000000009;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15450.000000000002;s:8:\"quantity\";d:0.40000000000000002;s:4:\"summ\";d:6180.0000000000009;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:1:{i:10;a:8:{s:5:\"title\";s:17:\"Втулка №1\";s:4:\"unit\";s:19:\"м.погонный\";s:5:\"price\";d:15;s:8:\"quantity\";s:6:\"0.1500\";s:4:\"summ\";d:2.25;s:4:\"loss\";s:4:\"5.00\";s:6:\"weight\";d:0.014999999999999999;s:6:\"brutto\";i:0;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":3:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.34375;s:5:\"price\";d:1.56026;s:4:\"summ\";d:0.53633937499999995;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.09375;s:5:\"price\";d:1500;s:4:\"summ\";d:140.625;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.1875;s:5:\"price\";d:1365;s:4:\"summ\";d:255.9375;}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0loss\";N;}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:2:{i:4;a:4:{s:5:\"title\";s:23:\"Упаковка №666\";s:8:\"capacity\";s:5:\"30.00\";s:5:\"price\";d:18;s:5:\"value\";d:0.59999999999999998;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";d:60;s:5:\"value\";d:0.20000000000000001;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"4.00\";s:14:\"value_per_hour\";s:5:\"15.80\";s:4:\"summ\";d:0.03082926829268293;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.012560975609756098;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.008719512195121952;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"20.0000\";s:4:\"summ\";d:0.0097560975609756097;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"3.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:6971.6912052286607;}', 0),
(210, 5, 'Acoustics 600*700*1.5 2', '2017-07-29 19:44:57', NULL, '2000.50', 1200, '700.00', '600.00', '1.50', 'лист', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:514.80000000000007;s:8:\"quantity\";d:0.14999999999999999;s:4:\"summ\";d:77.220000000000013;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15450.000000000002;s:8:\"quantity\";d:0.80000000000000004;s:4:\"summ\";d:12360.000000000002;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:2:{i:8;a:8:{s:5:\"title\";s:14:\"Фольга 2\";s:4:\"unit\";s:4:\"гр\";s:5:\"price\";d:0.14999999999999999;s:8:\"quantity\";s:8:\"123.0000\";s:4:\"summ\";d:18.449999999999999;s:4:\"loss\";i:0;s:6:\"weight\";d:0.123;s:6:\"brutto\";i:1;}i:10;a:8:{s:5:\"title\";s:17:\"Втулка №1\";s:4:\"unit\";s:19:\"м.погонный\";s:5:\"price\";d:15;s:8:\"quantity\";s:6:\"0.1000\";s:4:\"summ\";d:1.5;s:4:\"loss\";i:0;s:6:\"weight\";d:0.17000000000000001;s:6:\"brutto\";i:0;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":3:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.043999999999999997;s:5:\"price\";d:1.56026;s:4:\"summ\";d:0.068651439999999994;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.012;s:5:\"price\";d:1500;s:4:\"summ\";d:18;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.024;s:5:\"price\";d:1365;s:4:\"summ\";d:32.759999999999998;}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0loss\";N;}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:2:{i:1;a:4:{s:5:\"title\";s:19:\"Коробка №1\";s:8:\"capacity\";s:5:\"15.00\";s:5:\"price\";d:3.9050000000000002;s:5:\"value\";d:0.26033333333333336;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";d:60;s:5:\"value\";d:0.20000000000000001;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"3.00\";s:14:\"value_per_hour\";s:5:\"15.80\";s:4:\"summ\";d:0.023694076480879782;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.012871782054486379;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.0089352661834541363;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"15.0000\";s:4:\"summ\";d:0.0074981254686328422;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"2.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:13126.511984023524;}', 0),
(211, 6, 'MaxLevel 600*700*1.5 2', '2017-07-29 19:44:57', NULL, '2000.00', 1200, '700.00', '600.00', '1.50', 'лист', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:514.80000000000007;s:8:\"quantity\";d:0.14999999999999999;s:4:\"summ\";d:77.220000000000013;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15450.000000000002;s:8:\"quantity\";d:0.80000000000000004;s:4:\"summ\";d:12360.000000000002;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:0:{}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":3:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.13750000000000001;s:5:\"price\";d:1.56026;s:4:\"summ\";d:0.21453575000000003;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.037499999999999999;s:5:\"price\";d:1500;s:4:\"summ\";d:56.25;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.074999999999999997;s:5:\"price\";d:1365;s:4:\"summ\";d:102.375;}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0loss\";N;}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:2:{i:1;a:4:{s:5:\"title\";s:19:\"Коробка №1\";s:8:\"capacity\";s:5:\"15.00\";s:5:\"price\";d:3.9050000000000002;s:5:\"value\";d:0.26033333333333336;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";d:60;s:5:\"value\";d:0.20000000000000001;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"3.00\";s:14:\"value_per_hour\";s:5:\"15.80\";s:4:\"summ\";d:0.023700000000000002;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.012874999999999999;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.0089374999999999993;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"15.0000\";s:4:\"summ\";d:0.0074999999999999997;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"2.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:13214.572881583334;}', 0),
(212, 7, 'MaxLevel 600*700*1.5', '2017-07-29 19:44:58', NULL, '2000.00', 1200, '700.00', '600.00', '0.00', 'лист', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:514.80000000000007;s:8:\"quantity\";d:0.14999999999999999;s:4:\"summ\";d:77.220000000000013;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15450.000000000002;s:8:\"quantity\";d:0.80000000000000004;s:4:\"summ\";d:12360.000000000002;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:1:{i:1;a:8:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:1.56026;s:8:\"quantity\";s:7:\"10.0000\";s:4:\"summ\";d:15.602599999999999;s:4:\"loss\";i:0;s:6:\"weight\";d:0.01;s:6:\"brutto\";i:0;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":3:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.13200000000000001;s:5:\"price\";d:1.56026;s:4:\"summ\";d:0.20595432;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.035999999999999997;s:5:\"price\";d:1500;s:4:\"summ\";d:53.999999999999993;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.071999999999999995;s:5:\"price\";d:1365;s:4:\"summ\";d:98.279999999999987;}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0loss\";N;}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:2:{i:1;a:4:{s:5:\"title\";s:19:\"Коробка №1\";s:8:\"capacity\";s:4:\"1.00\";s:5:\"price\";d:3.9050000000000002;s:5:\"value\";d:3.9050000000000002;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";d:60;s:5:\"value\";d:0.20000000000000001;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"3.00\";s:14:\"value_per_hour\";s:5:\"15.80\";s:4:\"summ\";d:0.023700000000000002;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.012874999999999999;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.0089374999999999993;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"15.0000\";s:4:\"summ\";d:0.0074999999999999997;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"2.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:13227.466566820001;}', 0),
(213, 9, 'Лента К2 ', '2017-07-29 19:44:58', NULL, '50.00', 0, '1000.00', '20.00', '1.50', 'м.погонный', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Materials\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Materials\0materials\";a:2:{i:2;a:6:{s:5:\"title\";s:12:\"Фольга\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:514.80000000000007;s:8:\"quantity\";d:0.14999999999999999;s:4:\"summ\";d:77.220000000000013;s:4:\"loss\";i:0;}i:5;a:6:{s:5:\"title\";s:12:\"Бумага\";s:4:\"unit\";s:4:\"кг\";s:5:\"price\";d:15450.000000000002;s:8:\"quantity\";d:0.80000000000000004;s:4:\"summ\";d:12360.000000000002;s:4:\"loss\";s:4:\"5.00\";}}}', 'O:62:\"app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\":1:{s:83:\"\0app\\modules\\calculation\\models\\calculation\\MaterialsAdditional\0materialsAdditional\";a:0:{}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Recipe\":3:{s:56:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0title\";s:23:\"Рецептура №1\";s:60:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0materials\";a:3:{i:1;a:6:{s:5:\"title\";s:6:\"Мел\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"55.00\";s:8:\"quantity\";d:0.44;s:5:\"price\";d:1.56026;s:4:\"summ\";d:0.68651439999999997;}i:4;a:6:{s:5:\"title\";s:10:\"Масло\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"15.00\";s:8:\"quantity\";d:0.12;s:5:\"price\";d:1500;s:4:\"summ\";d:180;}i:3;a:6:{s:5:\"title\";s:12:\"Каучук\";s:4:\"unit\";s:4:\"кг\";s:1:\"%\";s:5:\"30.00\";s:8:\"quantity\";d:0.23999999999999999;s:5:\"price\";d:1365;s:4:\"summ\";d:327.59999999999997;}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Recipe\0loss\";N;}', 'O:48:\"app\\modules\\calculation\\models\\calculation\\Packs\":1:{s:55:\"\0app\\modules\\calculation\\models\\calculation\\Packs\0packs\";a:3:{i:1;a:4:{s:5:\"title\";s:19:\"Коробка №1\";s:8:\"capacity\";s:5:\"15.00\";s:5:\"price\";d:3.9050000000000002;s:5:\"value\";d:0.26033333333333336;}i:3;a:4:{s:5:\"title\";s:14:\"Паллета\";s:8:\"capacity\";s:6:\"300.00\";s:5:\"price\";d:60;s:5:\"value\";d:0.20000000000000001;}i:4;a:4:{s:5:\"title\";s:23:\"Упаковка №666\";s:8:\"capacity\";s:5:\"30.00\";s:5:\"price\";d:18;s:5:\"value\";d:0.59999999999999998;}}}', 'O:52:\"app\\modules\\calculation\\models\\calculation\\Positions\":1:{s:63:\"\0app\\modules\\calculation\\models\\calculation\\Positions\0positions\";a:3:{i:1;a:4:{s:5:\"title\";s:54:\"Рабочий / экструзионная линия\";s:8:\"quantity\";s:4:\"3.00\";s:14:\"value_per_hour\";s:5:\"15.80\";s:4:\"summ\";d:0.94799999999999995;}i:2;a:4:{s:5:\"title\";s:23:\"Мастер смены\";s:8:\"quantity\";s:4:\"1.00\";s:14:\"value_per_hour\";s:5:\"25.75\";s:4:\"summ\";d:0.51500000000000001;}i:3;a:4:{s:5:\"title\";s:43:\"Начальник производства\";s:8:\"quantity\";s:4:\"0.50\";s:14:\"value_per_hour\";s:5:\"35.75\";s:4:\"summ\";d:0.35749999999999998;}}}', 'O:51:\"app\\modules\\calculation\\models\\calculation\\Expenses\":1:{s:61:\"\0app\\modules\\calculation\\models\\calculation\\Expenses\0expenses\";a:1:{i:1;a:3:{s:5:\"title\";s:28:\"Электроэнергия\";s:14:\"value_per_hour\";s:7:\"15.0000\";s:4:\"summ\";d:0.29999999999999999;}}}', 'O:49:\"app\\modules\\calculation\\models\\calculation\\Losses\":2:{s:57:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0losses\";a:2:{i:1;a:2:{s:5:\"title\";s:8:\"Брак\";s:1:\"%\";s:4:\"2.00\";}i:2;a:2:{s:5:\"title\";s:12:\"Усушка\";s:1:\"%\";s:4:\"1.00\";}}s:55:\"\0app\\modules\\calculation\\models\\calculation\\Losses\0summ\";d:13566.687347733334;}', 0);

-- --------------------------------------------------------

--
-- Структура таблиці `category`
--

CREATE TABLE `category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_title` varchar(255) NOT NULL,
  `category_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `category`
--

INSERT INTO `category` (`category_id`, `category_title`, `category_desc`) VALUES
(1, 'Разное', ''),
(2, 'Бумага', ''),
(3, 'Фольга', '');

-- --------------------------------------------------------

--
-- Структура таблиці `category_pack`
--

CREATE TABLE `category_pack` (
  `category_pack_id` int(10) UNSIGNED NOT NULL,
  `category_pack_title` varchar(255) NOT NULL,
  `category_pack_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `category_pack`
--

INSERT INTO `category_pack` (`category_pack_id`, `category_pack_title`, `category_pack_desc`) VALUES
(1, 'Упаковка', '');

-- --------------------------------------------------------

--
-- Структура таблиці `category_product`
--

CREATE TABLE `category_product` (
  `category_product_id` int(11) UNSIGNED NOT NULL,
  `category_product_title` varchar(255) NOT NULL,
  `category_product_desc` varchar(255) DEFAULT NULL,
  `category_product_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `category_product`
--

INSERT INTO `category_product` (`category_product_id`, `category_product_title`, `category_product_desc`, `category_product_img`) VALUES
(1, 'Acoustics', '', ''),
(2, 'MaxLevel', '', ''),
(3, 'Лента К2', '', ''),
(4, 'Vizol', '', ''),
(5, 'кат 1', '', ''),
(6, 'кат 2', '', ''),
(7, 'кат 3', '', ''),
(8, 'кат 4', '', ''),
(9, 'кат 5', '', ''),
(10, 'кат 6', '', ''),
(11, 'кат 7', '', ''),
(12, 'кат 8', '', ''),
(13, 'кат 9', '', ''),
(14, 'кат 10', '', ''),
(15, 'кат 11', '', ''),
(16, 'кат 12', '', ''),
(17, 'кат 13', '', ''),
(18, 'кат 14', '', ''),
(19, 'кат 15', '', ''),
(20, 'кат 16', '', ''),
(21, 'кат 17', '', ''),
(22, 'кат 18', '', ''),
(23, 'кат 19', '', ''),
(24, 'кат 20', '', '');

-- --------------------------------------------------------

--
-- Структура таблиці `config`
--

CREATE TABLE `config` (
  `config_id` int(10) UNSIGNED NOT NULL,
  `config_name` varchar(45) NOT NULL,
  `config_system_name` varchar(45) NOT NULL,
  `config_value` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `config`
--

INSERT INTO `config` (`config_id`, `config_name`, `config_system_name`, `config_value`) VALUES
(1, 'Продолжительность смены, часов', 'shift_duration', '12');

-- --------------------------------------------------------

--
-- Структура таблиці `currency`
--

CREATE TABLE `currency` (
  `currency_id` int(10) UNSIGNED NOT NULL,
  `currency_code` varchar(45) NOT NULL,
  `currency_value` decimal(12,6) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `currency`
--

INSERT INTO `currency` (`currency_id`, `currency_code`, `currency_value`) VALUES
(1, 'UAH', '1.000000'),
(2, 'USD', '26.000000'),
(3, 'EUR', '30.000000');

-- --------------------------------------------------------

--
-- Структура таблиці `file`
--

CREATE TABLE `file` (
  `file_id` int(10) UNSIGNED NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_product_id` int(10) UNSIGNED NOT NULL,
  `file_title` varchar(255) NOT NULL,
  `file_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `loss`
--

CREATE TABLE `loss` (
  `loss_id` int(10) UNSIGNED NOT NULL,
  `loss_title` varchar(255) NOT NULL COMMENT 'Table of additional losses in the production of current product',
  `loss_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='table for additional losses ';

--
-- Дамп даних таблиці `loss`
--

INSERT INTO `loss` (`loss_id`, `loss_title`, `loss_desc`) VALUES
(1, 'Брак', ''),
(2, 'Усушка', '');

-- --------------------------------------------------------

--
-- Структура таблиці `lp`
--

CREATE TABLE `lp` (
  `lp_id` int(10) UNSIGNED NOT NULL,
  `lp_loss_id` int(10) UNSIGNED NOT NULL,
  `lp_product_id` int(10) UNSIGNED NOT NULL,
  `lp_percentage` decimal(10,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `lp`
--

INSERT INTO `lp` (`lp_id`, `lp_loss_id`, `lp_product_id`, `lp_percentage`) VALUES
(1, 1, 1, '3.00'),
(2, 2, 1, '1.00'),
(3, 1, 5, '2.00'),
(4, 2, 5, '1.00'),
(5, 1, 6, '2.00'),
(6, 2, 6, '1.00'),
(7, 1, 7, '2.00'),
(8, 2, 7, '1.00'),
(9, 1, 8, '2.00'),
(10, 2, 8, '1.00'),
(11, 1, 9, '2.00'),
(12, 2, 9, '1.00');

-- --------------------------------------------------------

--
-- Структура таблиці `material`
--

CREATE TABLE `material` (
  `material_id` int(10) UNSIGNED NOT NULL,
  `material_title` varchar(255) NOT NULL,
  `material_price` decimal(12,4) UNSIGNED NOT NULL,
  `material_article` varchar(12) DEFAULT NULL,
  `material_category_id` int(10) UNSIGNED DEFAULT NULL,
  `material_unit_id` int(10) UNSIGNED NOT NULL,
  `material_currency_type` int(10) UNSIGNED DEFAULT NULL,
  `material_delivery` decimal(10,2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `material`
--

INSERT INTO `material` (`material_id`, `material_title`, `material_price`, `material_article`, `material_category_id`, `material_unit_id`, `material_currency_type`, `material_delivery`) VALUES
(1, 'Мел', '1500.2500', '', 1, 3, 1, '4.00'),
(2, 'Фольга', '18000.0000', '', 3, 3, 2, '10.00'),
(3, 'Каучук', '50.0000', '', 1, 2, 2, '5.00'),
(4, 'Масло', '1500.0000', '', 1, 2, 1, NULL),
(5, 'Бумага', '0.5000', '', 2, 1, 3, '3.00'),
(6, 'Материал', '55.0000', '', 1, 12, 1, NULL),
(7, 'Бумага 2', '35.0000', '', 2, 2, 1, NULL),
(8, 'Фольга 2', '150.0000', '', 3, 2, 1, NULL),
(9, 'Каолин', '15.0000', '', NULL, 2, 1, NULL),
(10, 'Втулка №1', '15.0000', '', 1, 14, 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `mr`
--

CREATE TABLE `mr` (
  `mr_id` int(10) UNSIGNED NOT NULL,
  `mr_percentage` decimal(5,2) UNSIGNED NOT NULL COMMENT 'Percentage of the content of this material in the recipe',
  `mr_recipe_id` int(10) UNSIGNED NOT NULL,
  `mr_material_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `mr`
--

INSERT INTO `mr` (`mr_id`, `mr_percentage`, `mr_recipe_id`, `mr_material_id`) VALUES
(1, '55.00', 1, 1),
(2, '15.00', 1, 4),
(3, '30.00', 1, 3);

-- --------------------------------------------------------

--
-- Структура таблиці `op`
--

CREATE TABLE `op` (
  `op_id` int(10) UNSIGNED NOT NULL,
  `op_other_id` int(10) UNSIGNED NOT NULL,
  `op_product_id` int(10) UNSIGNED NOT NULL,
  `op_cost_hour` decimal(12,4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `op`
--

INSERT INTO `op` (`op_id`, `op_other_id`, `op_product_id`, `op_cost_hour`) VALUES
(1, 1, 1, '20.0000'),
(2, 1, 5, '15.0000'),
(3, 1, 6, '15.0000'),
(4, 1, 7, '15.0000'),
(5, 1, 8, '15.0000'),
(6, 1, 9, '15.0000');

-- --------------------------------------------------------

--
-- Структура таблиці `other_expenses`
--

CREATE TABLE `other_expenses` (
  `other_expenses_id` int(10) UNSIGNED NOT NULL,
  `other_expenses_title` varchar(255) NOT NULL,
  `other_expenses_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `other_expenses`
--

INSERT INTO `other_expenses` (`other_expenses_id`, `other_expenses_title`, `other_expenses_desc`) VALUES
(1, 'Электроэнергия', '');

-- --------------------------------------------------------

--
-- Структура таблиці `pack`
--

CREATE TABLE `pack` (
  `pack_id` int(10) UNSIGNED NOT NULL,
  `pack_title` varchar(255) NOT NULL,
  `pack_desc` varchar(255) DEFAULT NULL,
  `pack_price` decimal(12,4) UNSIGNED NOT NULL,
  `pack_weight` decimal(12,4) UNSIGNED DEFAULT NULL,
  `pack_category_id` int(10) UNSIGNED DEFAULT NULL,
  `pack_delivery` decimal(10,2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `pack`
--

INSERT INTO `pack` (`pack_id`, `pack_title`, `pack_desc`, `pack_price`, `pack_weight`, `pack_category_id`, `pack_delivery`) VALUES
(1, 'Коробка №1', '', '3.5500', '155.0000', NULL, '10.00'),
(2, 'Коробка №2', '', '5.7500', '250.0000', 1, NULL),
(3, 'Паллета', '', '60.0000', NULL, NULL, NULL),
(4, 'Упаковка №666', '', '18.0000', '120.0000', 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `pap`
--

CREATE TABLE `pap` (
  `pap_id` int(10) UNSIGNED NOT NULL,
  `pap_pack_id` int(10) UNSIGNED NOT NULL,
  `pap_product_id` int(10) UNSIGNED NOT NULL,
  `pap_capacity` decimal(12,2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `pap`
--

INSERT INTO `pap` (`pap_id`, `pap_pack_id`, `pap_product_id`, `pap_capacity`) VALUES
(1, 4, 1, '30.00'),
(2, 3, 1, '300.00'),
(3, 1, 5, '15.00'),
(4, 3, 5, '300.00'),
(5, 1, 6, '15.00'),
(6, 3, 6, '300.00'),
(7, 1, 7, '1.00'),
(8, 3, 7, '300.00'),
(9, 1, 9, '15.00'),
(10, 3, 9, '300.00'),
(11, 4, 9, '30.00');

-- --------------------------------------------------------

--
-- Структура таблиці `papr`
--

CREATE TABLE `papr` (
  `papr_id` int(10) UNSIGNED NOT NULL,
  `papr_parameter_id` int(10) UNSIGNED NOT NULL,
  `papr_product_id` int(10) UNSIGNED NOT NULL,
  `papr_value` varchar(45) DEFAULT NULL,
  `papr_unit_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `parameter`
--

CREATE TABLE `parameter` (
  `parameter_id` int(10) UNSIGNED NOT NULL,
  `parameter_title` varchar(255) NOT NULL,
  `parameter_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `parameter`
--

INSERT INTO `parameter` (`parameter_id`, `parameter_title`, `parameter_desc`) VALUES
(1, 'Максимальная темература', '');

-- --------------------------------------------------------

--
-- Структура таблиці `pm`
--

CREATE TABLE `pm` (
  `pm_id` int(10) UNSIGNED NOT NULL,
  `pm_product_id` int(10) UNSIGNED NOT NULL,
  `pm_material_id` int(10) UNSIGNED NOT NULL,
  `pm_quantity` decimal(12,4) UNSIGNED NOT NULL,
  `pm_unit_id` int(10) UNSIGNED NOT NULL,
  `pm_square` tinyint(1) UNSIGNED DEFAULT NULL,
  `pm_loss` decimal(5,2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `pm`
--

INSERT INTO `pm` (`pm_id`, `pm_product_id`, `pm_material_id`, `pm_quantity`, `pm_unit_id`, `pm_square`, `pm_loss`) VALUES
(6, 1, 5, '0.4000', 2, 0, '5.00'),
(7, 1, 2, '160.0000', 1, 0, NULL),
(8, 5, 2, '150.0000', 1, 0, NULL),
(9, 5, 5, '0.8000', 2, 0, '5.00'),
(10, 6, 2, '150.0000', 1, 0, NULL),
(11, 6, 5, '0.8000', 2, 0, '5.00'),
(12, 7, 2, '150.0000', 1, 0, NULL),
(13, 7, 5, '0.8000', 2, 0, '5.00'),
(14, 9, 2, '150.0000', 1, 0, NULL),
(15, 9, 5, '0.8000', 2, 0, '5.00');

-- --------------------------------------------------------

--
-- Структура таблиці `pma`
--

CREATE TABLE `pma` (
  `pma_id` int(10) UNSIGNED NOT NULL,
  `pma_product_id` int(10) UNSIGNED NOT NULL,
  `pma_material_id` int(10) UNSIGNED NOT NULL,
  `pma_quantity` decimal(12,4) UNSIGNED NOT NULL,
  `pma_unit_id` int(10) UNSIGNED NOT NULL,
  `pma_loss` decimal(5,2) UNSIGNED DEFAULT NULL,
  `pma_weight` decimal(12,4) UNSIGNED DEFAULT NULL,
  `pma_brutto` tinyint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `pma`
--

INSERT INTO `pma` (`pma_id`, `pma_product_id`, `pma_material_id`, `pma_quantity`, `pma_unit_id`, `pma_loss`, `pma_weight`, `pma_brutto`) VALUES
(3, 1, 10, '0.1500', 14, '5.00', '15.0000', NULL),
(4, 5, 10, '0.1000', 14, NULL, '170.0000', 0),
(5, 5, 8, '123.0000', 1, NULL, '123.0000', 1),
(6, 7, 1, '10.0000', 2, NULL, '10.0000', 0);

-- --------------------------------------------------------

--
-- Структура таблиці `pop`
--

CREATE TABLE `pop` (
  `pop_id` int(10) UNSIGNED NOT NULL,
  `pop_position_id` int(10) UNSIGNED NOT NULL,
  `pop_product_id` int(10) UNSIGNED NOT NULL,
  `pop_num` decimal(10,2) UNSIGNED NOT NULL COMMENT 'number workers on current position for  this product'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `pop`
--

INSERT INTO `pop` (`pop_id`, `pop_position_id`, `pop_product_id`, `pop_num`) VALUES
(1, 1, 1, '4.00'),
(2, 2, 1, '1.00'),
(3, 3, 1, '0.50'),
(4, 1, 5, '3.00'),
(5, 2, 5, '1.00'),
(6, 3, 5, '0.50'),
(7, 1, 6, '3.00'),
(8, 2, 6, '1.00'),
(9, 3, 6, '0.50'),
(10, 1, 7, '3.00'),
(11, 2, 7, '1.00'),
(12, 3, 7, '0.50'),
(13, 1, 8, '3.00'),
(14, 2, 8, '1.00'),
(15, 3, 8, '0.50'),
(16, 1, 9, '3.00'),
(17, 2, 9, '1.00'),
(18, 3, 9, '0.50');

-- --------------------------------------------------------

--
-- Структура таблиці `position`
--

CREATE TABLE `position` (
  `position_id` int(10) UNSIGNED NOT NULL,
  `position_title` varchar(255) NOT NULL,
  `position_desc` varchar(255) DEFAULT NULL,
  `position_salary_hour` decimal(12,2) UNSIGNED DEFAULT NULL COMMENT 'Salary per hour'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `position`
--

INSERT INTO `position` (`position_id`, `position_title`, `position_desc`, `position_salary_hour`) VALUES
(1, 'Рабочий / экструзионная линия', '', '15.80'),
(2, 'Мастер смены', '', '25.75'),
(3, 'Начальник производства', '', '35.75');

-- --------------------------------------------------------

--
-- Структура таблиці `product`
--

CREATE TABLE `product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_capacity_hour` decimal(12,2) UNSIGNED NOT NULL COMMENT 'productivity of current product per hour',
  `product_date` datetime NOT NULL,
  `product_update` datetime NOT NULL,
  `product_unit_id` int(10) UNSIGNED NOT NULL,
  `product_price` decimal(12,2) UNSIGNED DEFAULT NULL COMMENT 'Selling price',
  `product_category_id` int(11) UNSIGNED DEFAULT NULL,
  `product_weight` int(12) UNSIGNED DEFAULT '0',
  `product_length` decimal(10,2) UNSIGNED DEFAULT NULL,
  `product_width` decimal(10,2) UNSIGNED DEFAULT NULL,
  `product_thickness` decimal(10,2) UNSIGNED DEFAULT NULL,
  `product_note` mediumtext,
  `product_recipe_id` int(10) UNSIGNED DEFAULT NULL,
  `product_recipe_weight` int(12) UNSIGNED DEFAULT NULL,
  `product_vendor_code` varchar(45) DEFAULT NULL,
  `product_archiv` tinyint(1) UNSIGNED DEFAULT '0',
  `product_tech_map` varchar(255) DEFAULT NULL,
  `product_tech_desc` varchar(255) DEFAULT NULL,
  `product_recipe_loss` decimal(4,2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `product`
--

INSERT INTO `product` (`product_id`, `product_title`, `product_capacity_hour`, `product_date`, `product_update`, `product_unit_id`, `product_price`, `product_category_id`, `product_weight`, `product_length`, `product_width`, `product_thickness`, `product_note`, `product_recipe_id`, `product_recipe_weight`, `product_vendor_code`, `product_archiv`, `product_tech_map`, `product_tech_desc`, `product_recipe_loss`) VALUES
(1, 'Acoustics 600*700*1.5', '2050.00', '2017-05-11 20:09:37', '2017-07-29 12:44:03', 8, '350.60', 1, 1200, '700.00', '600.00', '1.50', '<p><a title=\"Какой-то документ\" href=\"/uploads/Tech_maps/document.pdf\" target=\"_blank\" rel=\"noopener noreferrer\">Какой-то документ</a></p>', 1, NULL, '', 0, '../uploads/tech_map/1/tech_map.pdf', 'web/pdf/tech_desc/1/tech_desc.pdf', NULL),
(5, 'Acoustics 600*700*1.5 2', '2000.50', '2017-06-24 22:44:43', '2017-07-06 20:06:46', 8, '120.00', 1, 1200, '700.00', '600.00', '1.50', '<p><a title=\"Какой-то документ\" href=\"/uploads/Tech_maps/document.pdf\" target=\"_blank\" rel=\"noopener noreferrer\">Какой-то документ</a></p>', 1, NULL, '', 0, NULL, NULL, NULL),
(6, 'MaxLevel 600*700*1.5 2', '2000.00', '2017-06-24 22:45:16', '2017-06-24 22:45:38', 8, NULL, 2, 1200, '700.00', '600.00', '1.50', '<p><a title=\"Какой-то документ\" href=\"/uploads/Tech_maps/document.pdf\" target=\"_blank\" rel=\"noopener noreferrer\">Какой-то документ</a></p>', 1, NULL, '', 0, NULL, NULL, NULL),
(7, 'MaxLevel 600*700*1.5', '2000.00', '2017-06-24 22:45:47', '2017-07-24 20:11:46', 8, NULL, 2, 1200, '700.00', '600.00', NULL, '<p><a title=\"Какой-то документ\" href=\"/uploads/Tech_maps/document.pdf\" target=\"_blank\" rel=\"noopener noreferrer\">Какой-то документ</a></p>', 1, NULL, '', 0, NULL, NULL, NULL),
(8, 'MaxLevel 600*700*1.5 (копия)', '2000.00', '2017-06-26 20:18:06', '2017-06-27 22:08:13', 8, NULL, 2, 1200, '700.00', '600.00', '1.50', '<p><a title=\"Какой-то документ\" href=\"/uploads/Tech_maps/document.pdf\" target=\"_blank\" rel=\"noopener noreferrer\">Какой-то документ</a></p>', 1, NULL, '', 1, NULL, NULL, NULL),
(9, 'Лента К2 ', '50.00', '2017-07-02 21:03:03', '2017-07-09 00:27:02', 14, NULL, 3, NULL, '1000.00', '20.00', '1.50', '<p><a title=\"Какой-то документ\" href=\"/uploads/Tech_maps/document.pdf\" target=\"_blank\" rel=\"noopener noreferrer\">Какой-то документ</a></p>', 1, 800, '', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `recipe`
--

CREATE TABLE `recipe` (
  `recipe_id` int(10) UNSIGNED NOT NULL COMMENT 'Sealant formulation',
  `recipe_title` varchar(255) NOT NULL,
  `recipe_note` mediumtext,
  `recipe_date` datetime NOT NULL,
  `recipe_update` datetime NOT NULL,
  `recipe_approved` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Approved / not approved recipe'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `recipe`
--

INSERT INTO `recipe` (`recipe_id`, `recipe_title`, `recipe_note`, `recipe_date`, `recipe_update`, `recipe_approved`) VALUES
(1, 'Рецептура №1', '', '2017-05-11 20:03:57', '2017-06-22 19:35:21', 1);

-- --------------------------------------------------------

--
-- Структура таблиці `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `solution`
--

CREATE TABLE `solution` (
  `solution_id` int(10) UNSIGNED NOT NULL,
  `solution_title` varchar(255) NOT NULL,
  `solution_desc` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `solution`
--

INSERT INTO `solution` (`solution_id`, `solution_title`, `solution_desc`) VALUES
(1, 'Охуенное решение', 0x3c703ed09ed185d183d0b5d0bdd0bdd0bed0b520d180d0b5d188d0b5d0bdd0b8d0b53c2f703e);

-- --------------------------------------------------------

--
-- Структура таблиці `sp`
--

CREATE TABLE `sp` (
  `sp_id` int(10) UNSIGNED NOT NULL,
  `sp_solution_id` int(10) UNSIGNED NOT NULL,
  `sp_product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(10) UNSIGNED NOT NULL,
  `unit_title` varchar(45) NOT NULL,
  `unit_parent_id` int(10) UNSIGNED DEFAULT NULL,
  `unit_ratio` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_title`, `unit_parent_id`, `unit_ratio`) VALUES
(1, 'гр', 0, 1),
(2, 'кг', 1, 1000),
(3, 'т', 1, 1000000),
(4, 'мм', 0, 1),
(5, 'см', 4, 10),
(6, 'м', 4, 1000),
(7, 'км', 4, 1000000),
(8, 'лист', 0, 1),
(9, 'шт', 0, 1),
(10, '%', 0, 1),
(11, 't,C', 0, 1),
(12, 'мл', 0, 1),
(13, 'л', 12, 1000),
(14, 'м.погонный', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(4, 'DartVadius', '3ok_6A6DG0-19E4xKFj-rCy6hqAwqQDe', '$2y$13$.BOjXx2hGavTs1AGyU6BQehQnVJQIxviFGp3J3qNv4lzQinzRnNb.', NULL, 'vad261275@gmai.com', 100, 1494435649, 1498299521),
(5, 'user', 'h1RNzPU9Qifo--ofnoSDLFMKoQqR_MGp', '$2y$13$yWvdE3h9FksTPES8cUif3.7uiwgsjXrIiocqHDOnWrINNagp6CPxm', NULL, 'user@user.com', 10, 1494445500, 1495299954),
(6, 'manager', 'LQRCCI1hufQMCsiDSbCkFbdWe-MWU1Rt', '$2y$13$h7WNayaE55RIOsv7Pd1GFOQ.DRavRUoLejOhtUmYsoWFYim1LMbva', NULL, 'manager@mail.com', 30, 1495300496, 1495302057),
(7, 'adminadmin', 'wD8gDCshwQyrisO01djAGdLDx7JzTyXQ', '$2y$13$k5jSmMd0kchRoSuX3nc9geTiMfJF0wrqhdK8Gb3Ql7a3HOf/.xESW', NULL, 'admin@admin.com', 70, 1495302101, 1495305801);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Індекси таблиці `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Індекси таблиці `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Індекси таблиці `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Індекси таблиці `calculation`
--
ALTER TABLE `calculation`
  ADD PRIMARY KEY (`calculation_id`),
  ADD UNIQUE KEY `calculation_id_UNIQUE` (`calculation_id`),
  ADD KEY `fk_calc_prod_idx` (`calculation_product_id`);

--
-- Індекси таблиці `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_id_UNIQUE` (`category_id`);

--
-- Індекси таблиці `category_pack`
--
ALTER TABLE `category_pack`
  ADD PRIMARY KEY (`category_pack_id`),
  ADD UNIQUE KEY `category_pack_id_UNIQUE` (`category_pack_id`);

--
-- Індекси таблиці `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`category_product_id`),
  ADD UNIQUE KEY `category_id_UNIQUE` (`category_product_id`);

--
-- Індекси таблиці `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`config_id`),
  ADD UNIQUE KEY `config_id_UNIQUE` (`config_id`);

--
-- Індекси таблиці `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`),
  ADD UNIQUE KEY `currency_id_UNIQUE` (`currency_id`);

--
-- Індекси таблиці `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`file_id`),
  ADD UNIQUE KEY `file_id_UNIQUE` (`file_id`),
  ADD KEY `fk_file_product_idx` (`file_product_id`);

--
-- Індекси таблиці `loss`
--
ALTER TABLE `loss`
  ADD PRIMARY KEY (`loss_id`),
  ADD UNIQUE KEY `loss_loss_UNIQUE` (`loss_id`);

--
-- Індекси таблиці `lp`
--
ALTER TABLE `lp`
  ADD PRIMARY KEY (`lp_id`),
  ADD UNIQUE KEY `lp_lp_UNIQUE` (`lp_id`),
  ADD UNIQUE KEY `loss_product` (`lp_loss_id`,`lp_product_id`),
  ADD KEY `fk_lp_loss_idx` (`lp_loss_id`),
  ADD KEY `fk_lp_product_idx` (`lp_product_id`);

--
-- Індекси таблиці `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`material_id`),
  ADD UNIQUE KEY `material_id_UNIQUE` (`material_id`),
  ADD KEY `fk_material_unit_idx` (`material_unit_id`),
  ADD KEY `fk_material_category_idx` (`material_category_id`),
  ADD KEY `fk_material_currency_idx` (`material_currency_type`);

--
-- Індекси таблиці `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Індекси таблиці `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Індекси таблиці `mr`
--
ALTER TABLE `mr`
  ADD PRIMARY KEY (`mr_id`),
  ADD UNIQUE KEY `idmaterial_to_recipe_UNIQUE` (`mr_id`),
  ADD UNIQUE KEY `mr_recipe_aterial` (`mr_recipe_id`,`mr_material_id`),
  ADD KEY `fk_mr_recipe_idx` (`mr_recipe_id`),
  ADD KEY `fk_mr_material_idx` (`mr_material_id`);

--
-- Індекси таблиці `op`
--
ALTER TABLE `op`
  ADD PRIMARY KEY (`op_id`),
  ADD UNIQUE KEY `op_id_UNIQUE` (`op_id`),
  ADD UNIQUE KEY `other_product` (`op_other_id`,`op_product_id`),
  ADD KEY `fk_op_other_idx` (`op_other_id`),
  ADD KEY `fk_op_product_idx` (`op_product_id`);

--
-- Індекси таблиці `other_expenses`
--
ALTER TABLE `other_expenses`
  ADD PRIMARY KEY (`other_expenses_id`),
  ADD UNIQUE KEY `other_expenses_id_UNIQUE` (`other_expenses_id`);

--
-- Індекси таблиці `pack`
--
ALTER TABLE `pack`
  ADD PRIMARY KEY (`pack_id`),
  ADD UNIQUE KEY `pack_id_UNIQUE` (`pack_id`),
  ADD KEY `fk_category_pack` (`pack_category_id`);

--
-- Індекси таблиці `pap`
--
ALTER TABLE `pap`
  ADD PRIMARY KEY (`pap_id`),
  ADD UNIQUE KEY `pap_id_UNIQUE` (`pap_id`),
  ADD KEY `fk_pap_pack_idx` (`pap_pack_id`),
  ADD KEY `fk_pap_product_idx` (`pap_product_id`),
  ADD KEY `pack_product` (`pap_pack_id`,`pap_product_id`);

--
-- Індекси таблиці `papr`
--
ALTER TABLE `papr`
  ADD PRIMARY KEY (`papr_id`),
  ADD UNIQUE KEY `papr_id_UNIQUE` (`papr_id`),
  ADD UNIQUE KEY `product_parameter` (`papr_parameter_id`,`papr_product_id`),
  ADD KEY `fk_papr_parameter_idx` (`papr_parameter_id`),
  ADD KEY `fk_papr_product_idx` (`papr_product_id`),
  ADD KEY `fk_papr_unit_idx` (`papr_unit_id`);

--
-- Індекси таблиці `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`parameter_id`),
  ADD UNIQUE KEY `parameter_id_UNIQUE` (`parameter_id`);

--
-- Індекси таблиці `pm`
--
ALTER TABLE `pm`
  ADD PRIMARY KEY (`pm_id`),
  ADD UNIQUE KEY `pm_id_UNIQUE` (`pm_id`),
  ADD UNIQUE KEY `product_material` (`pm_product_id`,`pm_material_id`),
  ADD KEY `fk_pm_unit_idx` (`pm_unit_id`),
  ADD KEY `fk_pm_material_idx` (`pm_material_id`),
  ADD KEY `fk_pm_product_idx` (`pm_product_id`);

--
-- Індекси таблиці `pma`
--
ALTER TABLE `pma`
  ADD PRIMARY KEY (`pma_id`),
  ADD UNIQUE KEY `pma_id_UNIQUE` (`pma_id`),
  ADD UNIQUE KEY `product_material` (`pma_product_id`,`pma_material_id`),
  ADD KEY `fk_pma_material_idx` (`pma_material_id`),
  ADD KEY `fk_pma_product_idx` (`pma_product_id`),
  ADD KEY `fk_pma_unit_idx` (`pma_unit_id`);

--
-- Індекси таблиці `pop`
--
ALTER TABLE `pop`
  ADD PRIMARY KEY (`pop_id`),
  ADD UNIQUE KEY `pop_pop_UNIQUE` (`pop_id`),
  ADD UNIQUE KEY `product_position` (`pop_position_id`,`pop_product_id`),
  ADD KEY `fk_pop_product_idx` (`pop_product_id`),
  ADD KEY `fk_pop_position_idx` (`pop_position_id`);

--
-- Індекси таблиці `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`),
  ADD UNIQUE KEY `position_id_UNIQUE` (`position_id`);

--
-- Індекси таблиці `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_id_UNIQUE` (`product_id`),
  ADD KEY `fk_product_unit_idx` (`product_unit_id`),
  ADD KEY `product_category_id` (`product_category_id`),
  ADD KEY `fk_product_recipe_idx` (`product_recipe_id`);

--
-- Індекси таблиці `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Індекси таблиці `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipe_id`),
  ADD UNIQUE KEY `recipe_id_UNIQUE` (`recipe_id`);

--
-- Індекси таблиці `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Індекси таблиці `solution`
--
ALTER TABLE `solution`
  ADD PRIMARY KEY (`solution_id`),
  ADD UNIQUE KEY `solution_id_UNIQUE` (`solution_id`);

--
-- Індекси таблиці `sp`
--
ALTER TABLE `sp`
  ADD PRIMARY KEY (`sp_id`),
  ADD UNIQUE KEY `sp_id_UNIQUE` (`sp_id`),
  ADD UNIQUE KEY `solution_product` (`sp_solution_id`,`sp_product_id`),
  ADD KEY `fk_sp_solution_idx` (`sp_solution_id`),
  ADD KEY `fk_sp_product_idx` (`sp_product_id`);

--
-- Індекси таблиці `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`unit_id`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `calculation`
--
ALTER TABLE `calculation`
  MODIFY `calculation_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;
--
-- AUTO_INCREMENT для таблиці `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблиці `category_pack`
--
ALTER TABLE `category_pack`
  MODIFY `category_pack_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `category_product`
--
ALTER TABLE `category_product`
  MODIFY `category_product_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT для таблиці `config`
--
ALTER TABLE `config`
  MODIFY `config_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблиці `file`
--
ALTER TABLE `file`
  MODIFY `file_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `loss`
--
ALTER TABLE `loss`
  MODIFY `loss_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблиці `lp`
--
ALTER TABLE `lp`
  MODIFY `lp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблиці `material`
--
ALTER TABLE `material`
  MODIFY `material_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблиці `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `mr`
--
ALTER TABLE `mr`
  MODIFY `mr_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблиці `op`
--
ALTER TABLE `op`
  MODIFY `op_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблиці `other_expenses`
--
ALTER TABLE `other_expenses`
  MODIFY `other_expenses_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `pack`
--
ALTER TABLE `pack`
  MODIFY `pack_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `pap`
--
ALTER TABLE `pap`
  MODIFY `pap_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблиці `papr`
--
ALTER TABLE `papr`
  MODIFY `papr_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `parameter`
--
ALTER TABLE `parameter`
  MODIFY `parameter_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `pm`
--
ALTER TABLE `pm`
  MODIFY `pm_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблиці `pma`
--
ALTER TABLE `pma`
  MODIFY `pma_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблиці `pop`
--
ALTER TABLE `pop`
  MODIFY `pop_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблиці `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблиці `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблиці `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipe_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Sealant formulation', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `solution`
--
ALTER TABLE `solution`
  MODIFY `solution_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `sp`
--
ALTER TABLE `sp`
  MODIFY `sp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `calculation`
--
ALTER TABLE `calculation`
  ADD CONSTRAINT `fk_calc_prod` FOREIGN KEY (`calculation_product_id`) REFERENCES `product` (`product_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Обмеження зовнішнього ключа таблиці `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `fk_file_product` FOREIGN KEY (`file_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Обмеження зовнішнього ключа таблиці `lp`
--
ALTER TABLE `lp`
  ADD CONSTRAINT `fk_lp_loss` FOREIGN KEY (`lp_loss_id`) REFERENCES `loss` (`loss_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lp_product` FOREIGN KEY (`lp_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Обмеження зовнішнього ключа таблиці `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `fk_material_category` FOREIGN KEY (`material_category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_material_currency` FOREIGN KEY (`material_currency_type`) REFERENCES `currency` (`currency_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_unit` FOREIGN KEY (`material_unit_id`) REFERENCES `unit` (`unit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Обмеження зовнішнього ключа таблиці `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `mr`
--
ALTER TABLE `mr`
  ADD CONSTRAINT `fk_mr_material` FOREIGN KEY (`mr_material_id`) REFERENCES `material` (`material_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mr_recipe` FOREIGN KEY (`mr_recipe_id`) REFERENCES `recipe` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Обмеження зовнішнього ключа таблиці `op`
--
ALTER TABLE `op`
  ADD CONSTRAINT `fk_op_other` FOREIGN KEY (`op_other_id`) REFERENCES `other_expenses` (`other_expenses_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_op_product` FOREIGN KEY (`op_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Обмеження зовнішнього ключа таблиці `pack`
--
ALTER TABLE `pack`
  ADD CONSTRAINT `fk_category_pack` FOREIGN KEY (`pack_category_id`) REFERENCES `category_pack` (`category_pack_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `pap`
--
ALTER TABLE `pap`
  ADD CONSTRAINT `fk_pap_pack` FOREIGN KEY (`pap_pack_id`) REFERENCES `pack` (`pack_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pap_product` FOREIGN KEY (`pap_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Обмеження зовнішнього ключа таблиці `papr`
--
ALTER TABLE `papr`
  ADD CONSTRAINT `fk_papr_parameter` FOREIGN KEY (`papr_parameter_id`) REFERENCES `parameter` (`parameter_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_papr_product` FOREIGN KEY (`papr_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_papr_unit` FOREIGN KEY (`papr_unit_id`) REFERENCES `unit` (`unit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Обмеження зовнішнього ключа таблиці `pm`
--
ALTER TABLE `pm`
  ADD CONSTRAINT `fk_pm_material` FOREIGN KEY (`pm_material_id`) REFERENCES `material` (`material_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pm_product` FOREIGN KEY (`pm_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pm_unit` FOREIGN KEY (`pm_unit_id`) REFERENCES `unit` (`unit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Обмеження зовнішнього ключа таблиці `pma`
--
ALTER TABLE `pma`
  ADD CONSTRAINT `fk_pma_material` FOREIGN KEY (`pma_material_id`) REFERENCES `material` (`material_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pma_product` FOREIGN KEY (`pma_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pma_unit` FOREIGN KEY (`pma_unit_id`) REFERENCES `unit` (`unit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Обмеження зовнішнього ключа таблиці `pop`
--
ALTER TABLE `pop`
  ADD CONSTRAINT `fk_pop_position` FOREIGN KEY (`pop_position_id`) REFERENCES `position` (`position_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pop_product` FOREIGN KEY (`pop_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Обмеження зовнішнього ключа таблиці `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`product_category_id`) REFERENCES `category_product` (`category_product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_recipe` FOREIGN KEY (`product_recipe_id`) REFERENCES `recipe` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_unit` FOREIGN KEY (`product_unit_id`) REFERENCES `unit` (`unit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Обмеження зовнішнього ключа таблиці `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `sp`
--
ALTER TABLE `sp`
  ADD CONSTRAINT `fk_sp_product` FOREIGN KEY (`sp_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sp_solution` FOREIGN KEY (`sp_solution_id`) REFERENCES `solution` (`solution_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
