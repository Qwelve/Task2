-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 29 2021 г., 01:20
-- Версия сервера: 10.1.44-MariaDB
-- Версия PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `csv`
--

-- --------------------------------------------------------

--
-- Структура таблицы `urlinfo`
--

CREATE TABLE `urlinfo` (
  `id` int(10) NOT NULL,
  `ip` text NOT NULL,
  `url_referer` text NOT NULL,
  `url_current` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `urlinfo`
--

INSERT INTO `urlinfo` (`id`, `ip`, `url_referer`, `url_current`, `date`, `time`) VALUES
(1, '192.168.0.1', 'https://mysite.ru/test?ref=101', 'https://mysite.ru/test?cur=1', '2021-01-01', '10:20:00'),
(2, '192.168.0.2', 'https://mysite.ru/test?ref=2', 'https://mysite.ru/test?cur=2', '2021-01-02', '11:20:00'),
(3, '192.168.0.3', 'https://mysite.ru/test?ref=3', 'https://mysite.ru/test?cur=3', '2021-01-03', '12:20:00'),
(4, '192.168.0.4', 'https://mysite.ru/test?ref=4', 'https://mysite.ru/test?cur=4', '2021-01-04', '13:20:00'),
(5, '192.168.0.1', 'https://mysite.ru/test?ref=5', 'https://mysite.ru/test?cur=5', '2021-01-05', '14:20:00'),
(6, '192.168.0.1', 'https://mysite.ru/test?ref=6', 'https://mysite.ru/test?cur=6', '2021-01-06', '15:20:00'),
(7, '192.168.0.7', 'https://mysite.ru/test?ref=7', 'https://mysite.ru/test?cur=7', '2021-01-07', '16:20:00'),
(8, '192.168.0.8', 'https://mysite.ru/test?ref=8', 'https://mysite.ru/test?cur=8', '2021-01-08', '17:20:00'),
(9, '192.168.0.9', 'https://mysite.ru/test?ref=9', 'https://mysite.ru/test?cur=9', '2021-01-09', '18:20:00'),
(10, '192.168.0.2', 'https://mysite.ru/test?ref=10', 'https://mysite.ru/test?cur=10', '2021-01-10', '19:20:00');

-- --------------------------------------------------------

--
-- Структура таблицы `userinfo`
--

CREATE TABLE `userinfo` (
  `id` int(10) NOT NULL,
  `ip` text NOT NULL,
  `browser_name` text NOT NULL,
  `os_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `userinfo`
--

INSERT INTO `userinfo` (`id`, `ip`, `browser_name`, `os_name`) VALUES
(1, '192.168.0.1', 'Firefox', 'Linux'),
(2, '192.168.0.2', 'Firefox', 'Windows'),
(3, '192.168.0.3', 'Chrome', 'Windows'),
(4, '192.168.0.5', 'IE', 'Windows'),
(5, '192.168.0.6', 'Chrome', 'Linux'),
(6, '192.168.0.8', 'Opera', 'Mac'),
(7, '192.168.0.9', 'Firefox', 'Mac'),
(8, '192.168.0.10', 'Firefox', 'Mac');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `urlinfo`
--
ALTER TABLE `urlinfo`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Индексы таблицы `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `urlinfo`
--
ALTER TABLE `urlinfo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
