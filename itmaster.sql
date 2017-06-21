-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 21 2017 г., 22:31
-- Версия сервера: 5.5.53
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `itmaster`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Incoming`
--

CREATE TABLE `Incoming` (
  `id` int(11) NOT NULL,
  `sender` varchar(64) DEFAULT NULL,
  `subject` varchar(128) DEFAULT NULL,
  `message` varchar(1028) DEFAULT NULL,
  `date_rec` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Sent`
--

CREATE TABLE `Sent` (
  `id` int(11) NOT NULL,
  `recipient` varchar(64) DEFAULT NULL,
  `subject` varchar(128) DEFAULT NULL,
  `message` varchar(1028) DEFAULT NULL,
  `date_dep` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Sent`
--

INSERT INTO `Sent` (`id`, `recipient`, `subject`, `message`, `date_dep`) VALUES
(1, '1@test.com', '1', 'test1', '0000-00-00 00:00:00'),
(2, '2@test.com', '2', 'test2', '0000-00-00 00:00:00'),
(3, '3@test.com', '3', 'test3', '2017-06-21 00:00:00'),
(4, '4@test.com', '4', 'test4', '2017-06-21 00:00:00'),
(6, '5@test.com', '5', 'test5', '0000-00-00 00:00:00'),
(7, '6@test.com', '6', 'test6', '0000-00-00 00:00:00'),
(8, '7@test.com', '7', 'test7', '2017-06-21 22:22:30'),
(9, '8@test.com', '8', 'test8', '2017-06-21 22:30:21');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `login` varchar(64) DEFAULT NULL,
  `pass` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Incoming`
--
ALTER TABLE `Incoming`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Sent`
--
ALTER TABLE `Sent`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Incoming`
--
ALTER TABLE `Incoming`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `Sent`
--
ALTER TABLE `Sent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
