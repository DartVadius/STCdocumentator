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
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('супер пользователь', '1', 1492893952);

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/calculation/*', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/calculation/calculation/*', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/calculation/calculation/create', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/calculation/calculation/index', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/debug/*', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/debug/default/*', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/debug/default/db-explain', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/debug/default/download-mail', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/debug/default/index', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/debug/default/toolbar', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/debug/default/view', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/gii/*', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/gii/default/*', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/gii/default/action', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/gii/default/diff', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/gii/default/index', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/gii/default/preview', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/gii/default/view', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/*', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/category-product/*', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/category-product/create', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/category-product/delete', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/category-product/index', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/category-product/update', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/category-product/view', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/category/*', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/category/create', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/category/delete', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/category/index', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/category/update', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/category/view', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/index/*', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/index/index', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/loss/*', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/loss/create', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/loss/delete', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/loss/index', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/loss/update', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/loss/view', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/lp/*', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/lp/create', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/lp/delete', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/lp/index', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/lp/update', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/lp/view', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/material/*', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/material/create', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/material/delete', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/material/index', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/material/update', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/material/view', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/mr/*', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/mr/create', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/mr/delete', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/mr/index', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/mr/update', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/mr/view', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/op/*', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/op/create', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/op/delete', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/op/index', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/op/update', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/op/view', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/other-expenses/*', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/other-expenses/create', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/other-expenses/delete', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/other-expenses/index', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/other-expenses/update', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/other-expenses/view', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/pack/*', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/pack/create', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/pack/delete', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/pack/index', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/pack/update', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/pack/view', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/pap/*', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/pap/create', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/pap/delete', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/pap/index', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/pap/update', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/pap/view', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/papr/*', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/papr/create', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/papr/delete', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/papr/index', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/papr/update', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/papr/view', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/parameter/*', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/parameter/create', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/parameter/delete', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/parameter/index', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/parameter/update', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/parameter/view', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/pm/*', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/pm/create', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/pm/delete', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/pm/index', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/pm/update', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/pm/view', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/product/admin/pop/*', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/pop/create', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/pop/delete', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/pop/index', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/pop/update', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/pop/view', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/position/*', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/position/create', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/position/delete', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/position/index', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/position/update', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/position/view', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/product/*', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/product/create', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/product/delete', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/product/index', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/product/update', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/product/view', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/recipe/*', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/recipe/create', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/recipe/delete', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/recipe/index', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/recipe/update', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/recipe/view', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/solution/*', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/solution/create', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/solution/delete', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/solution/index', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/solution/update', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/solution/view', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/sp/*', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/sp/create', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/sp/delete', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/sp/index', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/sp/view', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/unit/*', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/unit/create', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/unit/delete', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/unit/index', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/unit/update', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/product/admin/unit/view', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/rbac/*', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/assignment/*', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/assignment/assign', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/assignment/index', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/assignment/revoke', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/assignment/view', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/default/*', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/default/index', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/menu/*', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/menu/create', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/menu/delete', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/menu/index', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/menu/update', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/menu/view', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/permission/*', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/permission/assign', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/permission/create', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/permission/delete', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/permission/index', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/permission/remove', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/permission/update', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/permission/view', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/role/*', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/role/assign', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/role/create', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/role/delete', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/role/index', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/role/remove', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/role/update', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/role/view', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/route/*', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/route/assign', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/route/create', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/route/index', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/route/refresh', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/route/remove', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/rule/*', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/rule/create', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/rule/delete', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/rule/index', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/rule/update', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/rule/view', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/user/*', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/user/activate', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/user/change-password', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/user/delete', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/user/index', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/user/login', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/user/logout', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/user/request-password-reset', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/user/reset-password', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/user/signup', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/rbac/user/view', 2, NULL, NULL, NULL, 1493320482, 1493320482),
('/site/*', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/site/about', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/site/captcha', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/site/contact', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/site/error', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/site/index', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/site/login', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('/site/logout', 2, NULL, NULL, NULL, 1493320483, 1493320483),
('зарегистрированный пользователь', 1, 'доступ только на главную страницу сайта', NULL, NULL, 1492895896, 1493320567),
('супер пользователь', 1, 'полный доступ', NULL, NULL, 1492889537, 1493320537);

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('супер пользователь', '/*');

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
(1, 'Номенклатура', NULL, '/admin/category-product/index', 1, 0xd09dd0bed0bcd0b5d0bdd0bad0bbd0b0d182d183d180d0b0),
(2, 'Рецептуры', NULL, '/admin/recipe/index', 2, 0xd0a0d0b5d186d0b5d0bfd182d183d180d18b);

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1492889263),
('m140506_102106_rbac_init', 1492889469),
('m140602_111327_create_menu_table', 1492890190),
('m160312_050000_create_user', 1492890190);

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'DartVadius', 'z_6Tpw4W8Tq6KDUVVWmtReNuB6f36TC1', '$2y$13$Fcy8OO2LWBd7IwK9epiabu96jsEih1t0fc7Uks/R1I2qyXN9j3RnK', NULL, 'vad261275@gmail.com', 10, 1492890422, 1492890422);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
