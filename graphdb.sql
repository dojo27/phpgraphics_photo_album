-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 10 2019 г., 15:57
-- Версия сервера: 5.7.20
-- Версия PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `graphdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `message`, `date`) VALUES
(1, 'Отличные фотографии!', '2019-12-06 23:45:34'),
(2, 'Be my lover Wanna be me lover. Verse1 Looking back on all the time we spent together You oughta know right now if you wanna be my lover Wanna be my lover Go ahead and take your time, boy you gotta feel secure Before I make you mine, baby, you have to be sure You wanna be my lover, wanna be my lover, wanna be my lover.', '2019-12-06 23:46:45'),
(3, 'Do you still remember, how we used to be\r\nFeeling together, believe in whatever\r\nMy lover said to me,\r\nBoth of us were dreamers,\r\nYoung love in the sun\r\nFelt like my Saviour, my spirit I gave you\r\nWe\'d only just begun\r\n\r\nHasta mañana, always be mine\r\n\r\nViva forever, I\'ll be waiting\r\nEverlasting like the sun\r\nLive Forever for the moment\r\nEver searching for the one\r\n\r\nОригинал: https://en.lyrsense.com/spice_girls/viva_forever\r\nCopyright: https://lyrsense.com ©', '2019-12-06 23:48:15'),
(4, 'Candle light and soul forever\r\nA dream of you and me together\r\nSay you believe it, say you believe it\r\nFree your mind of doubt and danger...', '2019-12-06 23:49:07'),
(5, 'She used to be my only enemy and never let me free\r\nCatching me in places that I know I shouldn’t be Every other day I crossed the line\r\nI didn’t mean to be so bad\r\nI never thought you would...', '2019-12-06 23:49:37'),
(6, 'Спасибо за просмотр!!!', '2019-12-10 11:57:13');

-- --------------------------------------------------------

--
-- Структура таблицы `graph`
--

CREATE TABLE `graph` (
  `id` int(10) UNSIGNED NOT NULL,
  `link` varchar(255) DEFAULT '0' COMMENT 'путь к файлу изображения',
  `pic_link` varchar(255) DEFAULT '0' COMMENT 'путь к картинке с надписью',
  `out_text` varchar(255) DEFAULT '0' COMMENT 'текст изображения',
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Эта таблица предназначеная для храненпия изображений.';

--
-- Дамп данных таблицы `graph`
--

INSERT INTO `graph` (`id`, `link`, `pic_link`, `out_text`, `name`) VALUES
(1, 'Spice girls', '39[1].jpg', 'Джери Холивелл', 'Spice girls'),
(2, 'Viva Forever', 'Spice-Girls-spice-girls-31146933-2310-1802.jpg', 'Viva Forever', 'Spice Girls'),
(3, 'Emma Button', '173607_1920x1080x500[1].jpg', 'Emma Button', 'Emma Button'),
(4, '', '3735c81e2d9e9986ebc23a60407e3238[1].jpg', 'Wannabe', 'Спайз Герзл'),
(5, 'Say you\'ll be where', '7ec0fdcda775f68d203b6d6d3be724d9-1523886283[1].jpg', 'Say you\'ll be where', 'Spice girls2'),
(6, 'Generation next', '85368e35c50f7385c3ea116342354e10[1].jpg', 'Generation next', 'Spice girls'),
(7, 'Emma Button2', 'CPH6jj4WEAAVCTa[1].jpg', 'Emma Button', 'Emma Button'),
(8, 'Emma Button3', 'Emma20Bunton2005[1].jpg', 'Emma Button', 'Emma Button'),
(10, 'Melanie B', 'Mel-B-Pics-mel-b-14591325-699-982[1].jpg', 'Melanie B', 'Melanie B'),
(11, '2 become 2', 'img_085455fedce16a2f62607f7598b345b5_2_1400x1100[1].jpg', '2 become 2', 'Spice Girls'),
(12, 'Melanie C', 'melc11[1].jpg', 'Melanie C', 'Melanie C'),
(13, 'Spice Girls2', 'original[1].jpg', 'Spice Girls', 'Spice Girls'),
(14, 'Spice Girls3', 'pttj665_pw247_h-cb7de47d-4452-45db-af4f-873a248ec67b[1].jpg', 'Spice Girls', 'Спай Гёрлз'),
(15, 'Spice Girls4', 'spice-girls[1].jpg', 'Spice Girls', ''),
(16, 'Spice Girls5', 'spice_girls.jpg', 'Spice Girls', 'Spice Girls'),
(22, 'Spice Girls7', 'orig-b393dcdc2d9e9690b2d5b7bbf1ea5561-1541258791[1].jpg', 'She used to be my only enemy and never let \r\nme free Catching me in places that I know \r\nI shouldn’t be Every other day I crossed \r\nthe line I didn’t mean to be so bad \r\nI never thought you would...', 'Spice Girls');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `graph`
--
ALTER TABLE `graph`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `graph`
--
ALTER TABLE `graph`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
