-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 16 2017 г., 16:24
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

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_title` varchar(255) NOT NULL,
  `category_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`category_id`, `category_title`, `category_desc`) VALUES
(1, 'Бумага', ''),
(2, 'Разное', ''),
(3, 'Фольга', '');

-- --------------------------------------------------------

--
-- Структура таблицы `category_product`
--

CREATE TABLE `category_product` (
  `category_product_id` int(11) UNSIGNED NOT NULL,
  `category_product_title` varchar(255) NOT NULL,
  `category_product_desc` varchar(255) DEFAULT NULL,
  `category_product_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category_product`
--

INSERT INTO `category_product` (`category_product_id`, `category_product_title`, `category_product_desc`, `category_product_img`) VALUES
(1, 'Acoustics', '', ''),
(2, 'MaxLevel', '', ''),
(3, 'Aqua Protect', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `file`
--

CREATE TABLE `file` (
  `file_id` int(10) UNSIGNED NOT NULL,
  `file_data` mediumblob NOT NULL,
  `file_product_id` int(10) UNSIGNED NOT NULL,
  `file_title` varchar(255) NOT NULL,
  `file_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `loss`
--

CREATE TABLE `loss` (
  `loss_id` int(10) UNSIGNED NOT NULL,
  `loss_title` varchar(255) NOT NULL COMMENT 'Table of additional losses in the production of current product',
  `loss_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='table for additional losses ';

-- --------------------------------------------------------

--
-- Структура таблицы `lp`
--

CREATE TABLE `lp` (
  `lp_lp` int(10) UNSIGNED NOT NULL,
  `lp_loss_id` int(10) UNSIGNED NOT NULL,
  `lp_product_id` int(10) UNSIGNED NOT NULL,
  `lp_percentage` decimal(10,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `material`
--

CREATE TABLE `material` (
  `material_id` int(10) UNSIGNED NOT NULL,
  `material_title` varchar(255) NOT NULL,
  `material_price` decimal(12,4) UNSIGNED NOT NULL,
  `material_article` varchar(12) DEFAULT NULL,
  `material_category_id` int(10) UNSIGNED DEFAULT NULL,
  `material_unit_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `material`
--

INSERT INTO `material` (`material_id`, `material_title`, `material_price`, `material_article`, `material_category_id`, `material_unit_id`) VALUES
(1, 'Мел', '1500.0000', '', 2, 3),
(2, 'Каучук', '250000.0000', '', 2, 3),
(3, 'Масло', '18000.0000', '', 2, 3),
(4, 'Фольга', '250000.0000', '', 3, 3),
(5, 'Бумага', '14.0000', '', 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `mr`
--

CREATE TABLE `mr` (
  `mr_id` int(10) UNSIGNED NOT NULL,
  `mr_percentage` decimal(5,2) UNSIGNED NOT NULL COMMENT 'Percentage of the content of this material in the recipe',
  `mr_recipe_id` int(10) UNSIGNED NOT NULL,
  `mr_material_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mr`
--

INSERT INTO `mr` (`mr_id`, `mr_percentage`, `mr_recipe_id`, `mr_material_id`) VALUES
(4, '50.00', 2, 1),
(5, '40.00', 2, 3),
(6, '10.00', 2, 2),
(7, '55.00', 1, 1),
(8, '35.00', 1, 3),
(9, '10.00', 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `op`
--

CREATE TABLE `op` (
  `op_id` int(10) UNSIGNED NOT NULL,
  `op_other_id` int(10) UNSIGNED NOT NULL,
  `op_product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `other_expenses`
--

CREATE TABLE `other_expenses` (
  `other_expenses_id` int(10) UNSIGNED NOT NULL,
  `other_expenses_title` varchar(255) NOT NULL,
  `other_expenses_desc` varchar(255) DEFAULT NULL,
  `other_expenses_costs_hour` decimal(12,4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `pack`
--

CREATE TABLE `pack` (
  `pack_id` int(10) UNSIGNED NOT NULL,
  `pack_title` varchar(255) NOT NULL,
  `pack_desc` varchar(255) DEFAULT NULL,
  `pack_price` decimal(12,4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pack`
--

INSERT INTO `pack` (`pack_id`, `pack_title`, `pack_desc`, `pack_price`) VALUES
(1, 'Коробка №1', '', '3.7500');

-- --------------------------------------------------------

--
-- Структура таблицы `pap`
--

CREATE TABLE `pap` (
  `pap_id` int(10) UNSIGNED NOT NULL,
  `pap_pack_id` int(10) UNSIGNED NOT NULL,
  `pap_product_id` int(10) UNSIGNED NOT NULL,
  `pap_capacity` decimal(12,2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pap`
--

INSERT INTO `pap` (`pap_id`, `pap_pack_id`, `pap_product_id`, `pap_capacity`) VALUES
(4, 1, 1, '15.00'),
(6, 1, 4, '15.00');

-- --------------------------------------------------------

--
-- Структура таблицы `papr`
--

CREATE TABLE `papr` (
  `papr_id` int(10) UNSIGNED NOT NULL,
  `papr_parameter_id` int(10) UNSIGNED NOT NULL,
  `papr_product_id` int(10) UNSIGNED NOT NULL,
  `papr_value` varchar(45) DEFAULT NULL,
  `papr_unit_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `papr`
--

INSERT INTO `papr` (`papr_id`, `papr_parameter_id`, `papr_product_id`, `papr_value`, `papr_unit_id`) VALUES
(1, 1, 1, '+ 35', 9),
(3, 2, 1, '- 25', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `parameter`
--

CREATE TABLE `parameter` (
  `parameter_id` int(10) UNSIGNED NOT NULL,
  `parameter_title` varchar(255) NOT NULL,
  `parameter_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `parameter`
--

INSERT INTO `parameter` (`parameter_id`, `parameter_title`, `parameter_desc`) VALUES
(1, 'Максимальная температура', ''),
(2, 'Минимальная температура', '');

-- --------------------------------------------------------

--
-- Структура таблицы `pm`
--

CREATE TABLE `pm` (
  `pm_id` int(10) UNSIGNED NOT NULL,
  `pm_product_id` int(10) UNSIGNED NOT NULL,
  `pm_material_id` int(10) UNSIGNED NOT NULL,
  `pm_quantity` decimal(12,4) UNSIGNED NOT NULL,
  `pm_unit_id` int(10) UNSIGNED NOT NULL,
  `pm_square` tinyint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pm`
--

INSERT INTO `pm` (`pm_id`, `pm_product_id`, `pm_material_id`, `pm_quantity`, `pm_unit_id`, `pm_square`) VALUES
(7, 1, 4, '250.0000', 1, 0),
(8, 1, 5, '120.0000', 1, 1),
(13, 4, 4, '250.0000', 1, 0),
(14, 4, 5, '120.0000', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `pop`
--

CREATE TABLE `pop` (
  `pop_pop` int(10) UNSIGNED NOT NULL,
  `pop_position_id` int(10) UNSIGNED NOT NULL,
  `pop_product_id` int(10) UNSIGNED NOT NULL,
  `pop_num` decimal(10,2) UNSIGNED NOT NULL COMMENT 'number workers on current position for  this product'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `position`
--

CREATE TABLE `position` (
  `position_id` int(10) UNSIGNED NOT NULL,
  `position_title` varchar(255) NOT NULL,
  `position_desc` varchar(255) DEFAULT NULL,
  `position_salary_hour` decimal(12,2) UNSIGNED DEFAULT NULL COMMENT 'Salary per hour'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_capacity_hour` int(10) UNSIGNED NOT NULL COMMENT 'productivity of current product per hour',
  `product_date` datetime NOT NULL,
  `product_update` datetime NOT NULL,
  `product_unit_id` int(10) UNSIGNED NOT NULL,
  `product_price` decimal(12,2) UNSIGNED DEFAULT NULL COMMENT 'Selling price',
  `product_category_id` int(11) UNSIGNED DEFAULT NULL,
  `product_weight` int(12) UNSIGNED DEFAULT NULL,
  `product_length` int(12) UNSIGNED DEFAULT NULL,
  `product_width` int(12) UNSIGNED DEFAULT NULL,
  `product_thickness` int(12) UNSIGNED DEFAULT NULL,
  `product_note` varchar(255) DEFAULT NULL,
  `product_recipe_id` int(10) UNSIGNED DEFAULT NULL,
  `product_vendor_code` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`product_id`, `product_title`, `product_capacity_hour`, `product_date`, `product_update`, `product_unit_id`, `product_price`, `product_category_id`, `product_weight`, `product_length`, `product_width`, `product_thickness`, `product_note`, `product_recipe_id`, `product_vendor_code`) VALUES
(1, 'Acoustics 1.5', 1000, '2017-04-09 19:00:06', '2017-04-15 20:30:45', 8, NULL, 1, 1200, 600, 700, 15, '', 1, NULL),
(4, 'Acoustics 2.5', 800, '2017-04-13 21:56:23', '2017-04-13 21:57:07', 8, NULL, 1, 1400, 600, 700, 15, '', 2, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `recipe`
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
-- Дамп данных таблицы `recipe`
--

INSERT INTO `recipe` (`recipe_id`, `recipe_title`, `recipe_note`, `recipe_date`, `recipe_update`, `recipe_approved`) VALUES
(1, 'Рецептура №1', '', '2017-04-09 15:46:18', '2017-04-13 21:10:13', 0),
(2, 'Рецептура №2', '', '2017-04-09 15:46:53', '2017-04-09 15:47:27', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `solution`
--

CREATE TABLE `solution` (
  `solution_id` int(10) UNSIGNED NOT NULL,
  `solution_title` varchar(255) NOT NULL,
  `solution_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `solution`
--

INSERT INTO `solution` (`solution_id`, `solution_title`, `solution_desc`) VALUES
(1, 'Герметизация швов', '<p><img src=\"/uploads/14001.jpg\" alt=\"\" width=\"600\" height=\"337\" /></p>\r\n<p><em><strong>Решение</strong></em></p>');

-- --------------------------------------------------------

--
-- Структура таблицы `sp`
--

CREATE TABLE `sp` (
  `sp_id` int(10) UNSIGNED NOT NULL,
  `sp_solution_id` int(10) UNSIGNED NOT NULL,
  `sp_product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(10) UNSIGNED NOT NULL,
  `unit_title` varchar(45) NOT NULL,
  `unit_parent_id` int(10) UNSIGNED DEFAULT NULL,
  `unit_ratio` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(7, 'шт', 0, 1),
(8, 'лист', 0, 1),
(9, 't,C', 0, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_id_UNIQUE` (`category_id`);

--
-- Индексы таблицы `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`category_product_id`),
  ADD UNIQUE KEY `category_id_UNIQUE` (`category_product_id`);

--
-- Индексы таблицы `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`file_id`),
  ADD UNIQUE KEY `file_id_UNIQUE` (`file_id`),
  ADD KEY `fk_file_product_idx` (`file_product_id`);

--
-- Индексы таблицы `loss`
--
ALTER TABLE `loss`
  ADD PRIMARY KEY (`loss_id`),
  ADD UNIQUE KEY `loss_loss_UNIQUE` (`loss_id`);

--
-- Индексы таблицы `lp`
--
ALTER TABLE `lp`
  ADD PRIMARY KEY (`lp_lp`),
  ADD UNIQUE KEY `lp_lp_UNIQUE` (`lp_lp`),
  ADD UNIQUE KEY `loss_product` (`lp_loss_id`,`lp_product_id`),
  ADD KEY `fk_lp_loss_idx` (`lp_loss_id`),
  ADD KEY `fk_lp_product_idx` (`lp_product_id`);

--
-- Индексы таблицы `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`material_id`),
  ADD UNIQUE KEY `material_id_UNIQUE` (`material_id`),
  ADD KEY `fk_material_unit_idx` (`material_unit_id`),
  ADD KEY `fk_material_category_idx` (`material_category_id`);

--
-- Индексы таблицы `mr`
--
ALTER TABLE `mr`
  ADD PRIMARY KEY (`mr_id`),
  ADD UNIQUE KEY `idmaterial_to_recipe_UNIQUE` (`mr_id`),
  ADD UNIQUE KEY `mr_recipe_aterial` (`mr_recipe_id`,`mr_material_id`),
  ADD KEY `fk_mr_recipe_idx` (`mr_recipe_id`),
  ADD KEY `fk_mr_material_idx` (`mr_material_id`);

--
-- Индексы таблицы `op`
--
ALTER TABLE `op`
  ADD PRIMARY KEY (`op_id`),
  ADD UNIQUE KEY `op_id_UNIQUE` (`op_id`),
  ADD UNIQUE KEY `other_product` (`op_other_id`,`op_product_id`),
  ADD KEY `fk_op_other_idx` (`op_other_id`),
  ADD KEY `fk_op_product_idx` (`op_product_id`);

--
-- Индексы таблицы `other_expenses`
--
ALTER TABLE `other_expenses`
  ADD PRIMARY KEY (`other_expenses_id`),
  ADD UNIQUE KEY `other_expenses_id_UNIQUE` (`other_expenses_id`);

--
-- Индексы таблицы `pack`
--
ALTER TABLE `pack`
  ADD PRIMARY KEY (`pack_id`),
  ADD UNIQUE KEY `pack_id_UNIQUE` (`pack_id`);

--
-- Индексы таблицы `pap`
--
ALTER TABLE `pap`
  ADD PRIMARY KEY (`pap_id`),
  ADD UNIQUE KEY `pap_id_UNIQUE` (`pap_id`),
  ADD KEY `fk_pap_pack_idx` (`pap_pack_id`),
  ADD KEY `fk_pap_product_idx` (`pap_product_id`),
  ADD KEY `pack_product` (`pap_pack_id`,`pap_product_id`);

--
-- Индексы таблицы `papr`
--
ALTER TABLE `papr`
  ADD PRIMARY KEY (`papr_id`),
  ADD UNIQUE KEY `papr_id_UNIQUE` (`papr_id`),
  ADD UNIQUE KEY `product_parameter` (`papr_parameter_id`,`papr_product_id`),
  ADD KEY `fk_papr_parameter_idx` (`papr_parameter_id`),
  ADD KEY `fk_papr_product_idx` (`papr_product_id`),
  ADD KEY `fk_papr_unit_idx` (`papr_unit_id`);

--
-- Индексы таблицы `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`parameter_id`),
  ADD UNIQUE KEY `parameter_id_UNIQUE` (`parameter_id`);

--
-- Индексы таблицы `pm`
--
ALTER TABLE `pm`
  ADD PRIMARY KEY (`pm_id`),
  ADD UNIQUE KEY `pm_id_UNIQUE` (`pm_id`),
  ADD UNIQUE KEY `product_material` (`pm_product_id`,`pm_material_id`),
  ADD KEY `fk_pm_unit_idx` (`pm_unit_id`),
  ADD KEY `fk_pm_material_idx` (`pm_material_id`),
  ADD KEY `fk_pm_product_idx` (`pm_product_id`);

--
-- Индексы таблицы `pop`
--
ALTER TABLE `pop`
  ADD PRIMARY KEY (`pop_pop`),
  ADD UNIQUE KEY `pop_pop_UNIQUE` (`pop_pop`),
  ADD UNIQUE KEY `product_position` (`pop_position_id`,`pop_product_id`),
  ADD KEY `fk_pop_product_idx` (`pop_product_id`),
  ADD KEY `fk_pop_position_idx` (`pop_position_id`);

--
-- Индексы таблицы `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`),
  ADD UNIQUE KEY `position_id_UNIQUE` (`position_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_id_UNIQUE` (`product_id`),
  ADD KEY `fk_product_unit_idx` (`product_unit_id`),
  ADD KEY `product_category_id` (`product_category_id`),
  ADD KEY `fk_product_recipe_idx` (`product_recipe_id`);

--
-- Индексы таблицы `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipe_id`),
  ADD UNIQUE KEY `recipe_id_UNIQUE` (`recipe_id`);

--
-- Индексы таблицы `solution`
--
ALTER TABLE `solution`
  ADD PRIMARY KEY (`solution_id`),
  ADD UNIQUE KEY `solution_id_UNIQUE` (`solution_id`);

--
-- Индексы таблицы `sp`
--
ALTER TABLE `sp`
  ADD PRIMARY KEY (`sp_id`),
  ADD UNIQUE KEY `sp_id_UNIQUE` (`sp_id`),
  ADD UNIQUE KEY `solution_product` (`sp_solution_id`,`sp_product_id`),
  ADD KEY `fk_sp_solution_idx` (`sp_solution_id`),
  ADD KEY `fk_sp_product_idx` (`sp_product_id`);

--
-- Индексы таблицы `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`unit_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `category_product`
--
ALTER TABLE `category_product`
  MODIFY `category_product_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `file`
--
ALTER TABLE `file`
  MODIFY `file_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `loss`
--
ALTER TABLE `loss`
  MODIFY `loss_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `lp`
--
ALTER TABLE `lp`
  MODIFY `lp_lp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `material`
--
ALTER TABLE `material`
  MODIFY `material_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `mr`
--
ALTER TABLE `mr`
  MODIFY `mr_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `op`
--
ALTER TABLE `op`
  MODIFY `op_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `other_expenses`
--
ALTER TABLE `other_expenses`
  MODIFY `other_expenses_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `pack`
--
ALTER TABLE `pack`
  MODIFY `pack_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `pap`
--
ALTER TABLE `pap`
  MODIFY `pap_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `papr`
--
ALTER TABLE `papr`
  MODIFY `papr_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `parameter`
--
ALTER TABLE `parameter`
  MODIFY `parameter_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `pm`
--
ALTER TABLE `pm`
  MODIFY `pm_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `pop`
--
ALTER TABLE `pop`
  MODIFY `pop_pop` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipe_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Sealant formulation', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `solution`
--
ALTER TABLE `solution`
  MODIFY `solution_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `sp`
--
ALTER TABLE `sp`
  MODIFY `sp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `fk_file_product` FOREIGN KEY (`file_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `lp`
--
ALTER TABLE `lp`
  ADD CONSTRAINT `fk_lp_loss` FOREIGN KEY (`lp_loss_id`) REFERENCES `loss` (`loss_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lp_product` FOREIGN KEY (`lp_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `fk_material_category` FOREIGN KEY (`material_category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_material_unit` FOREIGN KEY (`material_unit_id`) REFERENCES `unit` (`unit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `mr`
--
ALTER TABLE `mr`
  ADD CONSTRAINT `fk_mr_material` FOREIGN KEY (`mr_material_id`) REFERENCES `material` (`material_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mr_recipe` FOREIGN KEY (`mr_recipe_id`) REFERENCES `recipe` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `op`
--
ALTER TABLE `op`
  ADD CONSTRAINT `fk_op_other` FOREIGN KEY (`op_other_id`) REFERENCES `other_expenses` (`other_expenses_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_op_product` FOREIGN KEY (`op_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `pap`
--
ALTER TABLE `pap`
  ADD CONSTRAINT `fk_pap_pack` FOREIGN KEY (`pap_pack_id`) REFERENCES `pack` (`pack_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pap_product` FOREIGN KEY (`pap_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `papr`
--
ALTER TABLE `papr`
  ADD CONSTRAINT `fk_papr_parameter` FOREIGN KEY (`papr_parameter_id`) REFERENCES `parameter` (`parameter_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_papr_product` FOREIGN KEY (`papr_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_papr_unit` FOREIGN KEY (`papr_unit_id`) REFERENCES `unit` (`unit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `pm`
--
ALTER TABLE `pm`
  ADD CONSTRAINT `fk_pm_material` FOREIGN KEY (`pm_material_id`) REFERENCES `material` (`material_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pm_product` FOREIGN KEY (`pm_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pm_unit` FOREIGN KEY (`pm_unit_id`) REFERENCES `unit` (`unit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `pop`
--
ALTER TABLE `pop`
  ADD CONSTRAINT `fk_pop_position` FOREIGN KEY (`pop_position_id`) REFERENCES `position` (`position_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pop_product` FOREIGN KEY (`pop_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`product_category_id`) REFERENCES `category_product` (`category_product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_recipe` FOREIGN KEY (`product_recipe_id`) REFERENCES `recipe` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_unit` FOREIGN KEY (`product_unit_id`) REFERENCES `unit` (`unit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `sp`
--
ALTER TABLE `sp`
  ADD CONSTRAINT `fk_sp_product` FOREIGN KEY (`sp_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sp_solution` FOREIGN KEY (`sp_solution_id`) REFERENCES `solution` (`solution_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
