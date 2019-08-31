-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 18 2019 г., 21:37
-- Версия сервера: 5.5.63-MariaDB
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `farpost_broni`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`) VALUES
(1, 'bayn151@gmail.com', 'test'),
(2, 'admin@admin.ru', '123456'),
(3, 'w@w.ru', '1234567');

-- --------------------------------------------------------

--
-- Структура таблицы `os_days`
--

CREATE TABLE `os_days` (
  `id_day` int(2) NOT NULL,
  `name_day` varchar(20) DEFAULT NULL,
  `status_day` int(1) DEFAULT NULL,
  `startwork_day` time DEFAULT NULL,
  `endwork_day` time DEFAULT NULL,
  `number_day` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `os_days`
--

INSERT INTO `os_days` (`id_day`, `name_day`, `status_day`, `startwork_day`, `endwork_day`, `number_day`) VALUES
(1, 'Понедельник', 0, '07:00:00', '20:00:00', 1),
(2, 'Вторник', 0, '08:00:00', '20:00:00', 2),
(3, 'Среда', 0, '08:00:00', '20:00:00', 3),
(4, 'Четверг', 1, '08:00:00', '20:00:00', 4),
(5, 'Пятница', 1, '09:00:00', '19:00:00', 5),
(6, 'Субота', 1, '09:00:00', '15:00:00', 6),
(7, 'Воскресенье', 0, '08:00:00', '20:00:00', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `os_order`
--

CREATE TABLE `os_order` (
  `id_table` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `stol` varchar(50) DEFAULT NULL,
  `time_order` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_order` varchar(255) NOT NULL,
  `data_time` varchar(255) NOT NULL,
  `period` varchar(255) DEFAULT NULL,
  `data_minutes` varchar(255) DEFAULT NULL,
  `start_order` datetime NOT NULL,
  `end_order` datetime DEFAULT NULL,
  `status_order` int(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `os_order`
--

INSERT INTO `os_order` (`id_table`, `name`, `tel`, `stol`, `time_order`, `data_order`, `data_time`, `period`, `data_minutes`, `start_order`, `end_order`, `status_order`) VALUES
(77, 'dgongalaher', '888888888', 'Большой(8 чел)', '2019-06-13 19:25:22', ' 19-06-2019 ', '8', '1', '30', '2019-06-19 08:30:00', '2019-06-19 09:30:00', 0),
(76, 'svd', '8888888888888888', 'Средний(4 чел)', '2019-06-13 10:03:54', ' 13-06-2019 ', '8', '1', '00', '2019-06-13 08:00:00', '2019-06-13 09:00:00', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `os_days`
--
ALTER TABLE `os_days`
  ADD PRIMARY KEY (`id_day`);

--
-- Индексы таблицы `os_order`
--
ALTER TABLE `os_order`
  ADD PRIMARY KEY (`id_table`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `os_days`
--
ALTER TABLE `os_days`
  MODIFY `id_day` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `os_order`
--
ALTER TABLE `os_order`
  MODIFY `id_table` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
