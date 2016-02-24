-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 24 2016 г., 23:36
-- Версия сервера: 5.5.47-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `phpblog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_ID` int(11) NOT NULL AUTO_INCREMENT,
  `message_title` varchar(120) NOT NULL,
  `message` varchar(500) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`message_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`message_ID`, `message_title`, `message`, `user_ID`, `time`) VALUES
(24, '1-Ð¾Ðµ ÑÐ¾Ð¾Ð±Ñ‰ÐµÐ½Ð¸Ðµ', 'Ð¡Ð»ÑƒÐ¶Ð±Ð° Ð½Ðµ Ð³Ð»Ð°Ð²Ð½Ð¾Ðµ, Ð³Ð»Ð°Ð²Ð½Ð¾Ðµ ÑÑ‚Ð¾ Ð²Ð¾ÐµÐ½Ð½Ð¸Ðº', 1, '2016-02-23 14:14:36'),
(25, '2-Ð¾Ðµ ÑÐ¾Ð¾Ð±Ñ‰ÐµÐ½Ð¸Ðµ', 'Ð¢Ð¾Ð»ÑŒÐºÐ¾ Ð¸Ð³Ñ€Ð° Â«Ð”Ð°Ð»ÑŒÐ½Ð¾Ð±Ð¾Ð¹Ñ‰Ð¸ÐºÐ¸Â» Ñ ÑÐ°ÑƒÐ½Ð´Ñ‚Ñ€ÐµÐºÐ¾Ð¼ Ð¾Ñ‚ Â«ÐÑ€Ð¸Ð¸Â» Ð³Ð¾Ñ‚Ð¾Ð²Ð¸Ð»Ð° ÐºÐ¾ Ð²Ð·Ñ€Ð¾ÑÐ»Ð¾Ð¹ Ð¶Ð¸Ð·Ð½Ð¸. Ð¢Ñ‹ ÐµÑ‰Ñ‘ Ð½Ðµ Ð¿Ð¾Ð»ÑƒÑ‡Ð¸Ð» Ð¿Ñ€Ð°Ð²Ð°, Ð° Ñƒ Ñ‚ÐµÐ±Ñ ÑƒÐ¶Ðµ Ð³ÐµÐ¼Ð¾Ñ€Ñ€Ð¾Ð¹ Ð¸ Ð¿Ð»Ð¾Ñ…Ð¾Ð¹ Ð²ÐºÑƒÑ', 1, '2016-02-23 14:15:02'),
(26, '3-Ðµ ÑÐ¾Ð¾Ð±Ñ‰ÐµÐ½Ð¸Ðµ', 'Ð˜Ð½Ñ‚ÐµÑ€ÐµÑÐ½Ð¾, Ñ‡Ñ‚Ð¾ Ð²Ñ‹Ñ…Ð¾Ð´Ð½Ñ‹Ð¼ Ð´Ð½ÐµÐ¼ Ð½Ð°Ð·Ñ‹Ð²Ð°ÑŽÑ‚ Ð´ÐµÐ½ÑŒ, ÐºÐ¾Ð³Ð´Ð° ÐµÐ´Ð¸Ð½ÑÑ‚Ð²ÐµÐ½Ð½Ð¾Ðµ Ð¶ÐµÐ»Ð°Ð½Ð¸Ðµ - ÑÑ‚Ð¾ Ð½Ð¸ÐºÑƒÐ´Ð° Ð½Ðµ Ð²Ñ‹Ñ…Ð¾Ð´Ð¸Ñ‚ÑŒ', 1, '2016-02-23 14:15:37'),
(27, '4', '4', 1, '2016-02-23 14:25:18'),
(28, '5', '5', 1, '2016-02-23 14:25:25'),
(29, '6', '6', 1, '2016-02-23 14:26:28'),
(30, '8', '8', 1, '2016-02-23 14:26:36'),
(31, '9', '9', 1, '2016-02-23 14:26:41');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_ID`, `login`, `password`) VALUES
(1, 'constantine', 'shkvarki');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
