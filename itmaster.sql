-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 28 2017 г., 22:52
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
  `date_dep` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Sent`
--

INSERT INTO `Sent` (`id`, `recipient`, `subject`, `message`, `date_dep`) VALUES
(63, 'sanya_fl@ukr.net', 'test', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores beatae distinctio eaque eligendi esse eum eveniet fuga id illo inventore ipsa iure laudantium minus modi officia pariatur quos, ut vitae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores beatae distinctio eaque eligendi esse eum eveniet fuga id illo inventore ipsa iure laudantium minus modi officia pariatur quos, ut vitae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores beatae distinctio eaque eligendi esse eum eveniet fuga id illo inventore ipsa iure laudantium minus modi officia pariatur quos, ut vitae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores beatae distinctio eaque eligendi esse eum eveniet fuga id illo inventore ipsa iure laudantium minus modi officia pariatur quos, ut vitae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores beatae distinctio eaque eligendi esse eum eveniet fuga id illo inventore ipsa iure laudantium minus modi officia pariatur quos, ut ', '28.06.2017 18:09');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `login` varchar(64) DEFAULT NULL,
  `pass` varchar(64) DEFAULT NULL,
  `auth_key` varchar(32) DEFAULT NULL,
  `access_token` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`id`, `login`, `pass`, `auth_key`, `access_token`) VALUES
(1, 'demo', 'demo', NULL, NULL),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
