-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 30 2017 г., 15:08
-- Версия сервера: 5.5.53
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `documentator`
--

--
-- Дамп данных таблицы `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_title`, `unit_parent_id`, `unit_ratio`) VALUES
(1, 'г', 0, 1),
(2, 'кг', 1, 1000),
(3, 'т', 1, 1000000),
(4, 'мм', 0, 1),
(5, 'см', 4, 10),
(6, 'м', 4, 1000),
(7, 'км', 4, 1000000),
(8, 'лист', 0, 1),
(9, 'шт', 0, 1),
(10, '%', 0, 1),
(11, 't,C', 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
