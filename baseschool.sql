-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июл 09 2017 г., 05:59
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `baseschool`
--

-- --------------------------------------------------------

--
-- Структура таблицы `myl_pupil`
--

CREATE TABLE `myl_pupil` (
  `id` int(11) NOT NULL,
  `pupilname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `myl_pupil`
--

INSERT INTO `myl_pupil` (`id`, `pupilname`) VALUES
(10, 'Андрей'),
(7, 'Георгий'),
(9, 'Денис'),
(3, 'Женя'),
(6, 'Оксана'),
(5, 'Равшан'),
(4, 'Саша'),
(2, 'Сеня'),
(1, 'Федя'),
(8, 'Харитон');

-- --------------------------------------------------------

--
-- Структура таблицы `myl_teacher`
--

CREATE TABLE `myl_teacher` (
  `id` int(11) NOT NULL,
  `teachername` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `myl_teacher`
--

INSERT INTO `myl_teacher` (`id`, `teachername`) VALUES
(1, 'Иван Иванов'),
(6, 'Лидия Иванцова'),
(2, 'Олег Меньщиков'),
(7, 'Павел Коромыслов'),
(4, 'Петр Петелькин'),
(5, 'Сергей Дорогов'),
(3, 'Федор Достоевский');

-- --------------------------------------------------------

--
-- Структура таблицы `myl_teacher_pupil`
--

CREATE TABLE `myl_teacher_pupil` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `pupil_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `myl_teacher_pupil`
--

INSERT INTO `myl_teacher_pupil` (`id`, `teacher_id`, `pupil_id`) VALUES
(9, 1, 7),
(10, 1, 9),
(8, 1, 10),
(12, 2, 7),
(13, 2, 8),
(14, 2, 9),
(15, 2, 10),
(16, 4, 7),
(17, 4, 8),
(18, 4, 9),
(19, 4, 10),
(24, 5, 3),
(20, 5, 7),
(21, 5, 8),
(22, 5, 9),
(23, 5, 10),
(11, 6, 9);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `myl_pupil`
--
ALTER TABLE `myl_pupil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pupilname` (`pupilname`);

--
-- Индексы таблицы `myl_teacher`
--
ALTER TABLE `myl_teacher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachername` (`teachername`);

--
-- Индексы таблицы `myl_teacher_pupil`
--
ALTER TABLE `myl_teacher_pupil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `t_p` (`teacher_id`,`pupil_id`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `myl_pupil`
--
ALTER TABLE `myl_pupil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `myl_teacher`
--
ALTER TABLE `myl_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `myl_teacher_pupil`
--
ALTER TABLE `myl_teacher_pupil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
