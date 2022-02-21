-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 18 2022 г., 09:10
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `newsportal`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Eesti'),
(2, 'Maailm'),
(3, 'Krimi');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `text` varchar(500) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `news_id`, `text`, `date`) VALUES
(1, 1, 'Good', '2022-02-18 10:06:01'),
(2, 3, 'test', '2022-02-17 10:06:01'),
(3, 3, 'test2', '2022-02-15 10:07:11'),
(4, 4, 'test22', '2022-02-08 10:07:11');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_estonian_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_estonian_ci NOT NULL,
  `picture` blob DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `picture`, `category_id`, `user_id`) VALUES
(1, 'Mart Jarvik ei ilmunud', 'Tana toimus bla bla bla', '', 1, 1),
(2, 'Erisaade', '20. sunnipaeva', '', 1, 1),
(3, 'Politseikopter', 'Politsei', '', 3, 1),
(4, 'Moskva', 'Enne eliseid', '', 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `picture` blob DEFAULT NULL,
  `job` varchar(100) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `telefon` varchar(20) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `login` varchar(20) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `parol` varchar(255) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `status` varchar(20) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `registration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `picture`, `job`, `email`, `telefon`, `login`, `parol`, `status`, `registration_date`) VALUES
(1, 'Admin', NULL, 'Portal admin', 'admin@newsportal.ee', '+37251456', 'admin', 'admin', 'admin', '2022-02-18'),
(2, 'Anonim', NULL, 'Portal anonim', 'anonim@newsportal.ee', '+37258007334', 'anonim', 'anonim', 'user', '2022-02-18');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_id` (`news_id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`);

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
