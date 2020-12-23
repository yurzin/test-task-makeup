-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 23 2020 г., 07:06
-- Версия сервера: 5.7.29
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `headhanter`
--

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE `city` (
  `id` int(100) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `city`) VALUES
(1, 'Кемерово'),
(2, 'Новосибирск'),
(3, 'Барнаул'),
(4, 'Красноярск'),
(5, 'Иркутск'),
(6, 'Москва'),
(7, 'Санкт-Петербург');

-- --------------------------------------------------------

--
-- Структура таблицы `data`
--

CREATE TABLE `data` (
  `id` int(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `patronymic` varchar(10) NOT NULL,
  `id_city` int(100) NOT NULL,
  `id_specialization` int(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `experience` varchar(10) NOT NULL,
  `salary` int(10) NOT NULL,
  `last_work` varchar(100) NOT NULL,
  `age` int(10) NOT NULL,
  `gender` set('male','female') NOT NULL DEFAULT 'male',
  `date_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `data`
--

INSERT INTO `data` (`id`, `photo`, `date`, `name`, `last_name`, `patronymic`, `id_city`, `id_specialization`, `phone`, `email`, `experience`, `salary`, `last_work`, `age`, `gender`, `date_birth`) VALUES
(1, '../../images/profile-foto-7.jpg', '2020-12-12 23:08:52', 'Сидорова', 'Сидора', 'Сидоровна', 1, 1, '', '', '10 лет', 50000, 'ООО «ТЕПЛОВОЕ ОБОРУДОВАНИЕ»\r\n\r\n', 25, 'female', '2020-12-19'),
(2, '../../images/profile-foto-11.jpg', '2020-12-12 23:08:52', 'Петров', 'Петр', 'Петрович', 2, 2, '', '', '10', 500000, 'ООО «ТЕПЛОВОЕ ОБОРУДОВАНИЕ»', 33, 'male', '2020-12-19'),
(3, '../../images/profile-foto-2.jpg', '2020-12-12 23:08:52', 'Сидорова', 'Сидора', 'Сидоровна', 3, 3, '', '', '10 лет', 50000, 'ООО «ТЕПЛОВОЕ ОБОРУДОВАНИЕ»\r\n\r\n', 25, 'female', '2020-12-19'),
(4, '../../images/profile-foto-3.jpg', '2020-12-14 06:00:01', '', '', '', 4, 4, '', '', '5', 35000, '', 0, 'male', '2020-12-19'),
(5, '../../images/profile-foto-6.jpg', '2020-12-14 06:00:01', 'Тихонова ', 'Тихоня', 'Тихоновна', 5, 5, '', '', '20', 60000, 'ООО \"ВодГипроШахт\"', 55, 'female', '2020-12-19'),
(6, '../../images/profile-foto-4.jpg', '2020-12-14 06:00:01', '', '', '', 6, 6, '', '', '5', 35000, '', 0, 'male', '2020-12-19'),
(7, '../../images/profile-foto.jpg', '2020-12-12 23:08:52', 'Иванов', 'Иван', 'Иванович', 7, 7, '', '', '10 лет', 50000, 'ООО «ТЕПЛОВОЕ ОБОРУДОВАНИЕ»', 25, 'male', '2020-12-19'),
(9, '../../images/profile-foto-7.jpg', '2020-12-12 23:08:52', 'Сидорова', 'Сидора', 'Сидоровна', 4, 8, '', '', '10 лет', 50000, 'ООО «ТЕПЛОВОЕ ОБОРУДОВАНИЕ»\r\n\r\n', 25, 'female', '2020-12-19'),
(10, '../../images/profile-foto-11.jpg', '2020-12-12 23:08:52', 'Петров', 'Петр', 'Петрович', 3, 9, '', '', '10', 500000, 'ООО «ТЕПЛОВОЕ ОБОРУДОВАНИЕ»', 33, 'male', '2020-12-19'),
(11, '../../images/profile-foto-8.jpg', '2020-12-14 06:00:01', 'Тихонова ', 'Тихоня', 'Тихоновна', 2, 10, '', '', '20', 60000, 'ООО \"ВодГипроШахт\"', 55, 'female', '2020-12-19'),
(12, '../../images/profile-foto-9.jpg', '2020-12-14 06:00:01', '', '', '', 5, 11, '', '', '5', 35000, '', 0, 'male', '2020-12-19'),
(14, '../../images/profile-foto-12.jpg', '2020-12-12 23:08:52', 'Петров', 'Петр', 'Петрович', 6, 12, '', '', '10', 500000, 'ООО «ТЕПЛОВОЕ ОБОРУДОВАНИЕ»', 33, 'male', '2020-12-19'),
(22, '../../images/profile-foto-2.jpg', '2020-12-19 00:39:06', 'bbbbbbbbb', '', '', 7, 13, '', '', '10 лет', 5000, '', 20, 'female', '2020-12-19'),
(23, '../../images/profile-foto-6.jpg', '2020-12-19 14:48:42', 'Сергей', 'Юрзин', 'пппп', 1, 14, '89043707957', 'yurzin@mail.ru', '11', 11111, 'рлрлрлрлрл', 22, 'male', '2020-12-19'),
(24, '../../images/profile-foto-14.jpg', '2020-12-19 14:49:52', 'Сергей', 'Юрзин', 'пппп', 2, 15, '89043707957', 'yurzin@mail.ru', '11', 11111, 'рлрлрлрлрл', 22, 'male', '2020-12-19'),
(25, '../../images/profile-foto.jpg', '2020-12-19 14:59:45', 'Сергей', 'Юрзин', 'пппп', 3, 16, '89043707957', 'yurzin@mail.ru', '11', 11111, 'рлрлрлрлрл', 22, 'male', '2020-12-19'),
(26, '../../images/profile-foto-5.jpg', '2020-12-19 15:06:50', 'Сергей', 'Юрзин', 'пппп', 4, 17, '89043707957', 'yurzin@mail.ru', '11', 11111, 'рлрлрлрлрл', 22, 'male', '2020-12-19'),
(27, '../../images/profile-foto-5.jpg', '2020-12-19 15:16:48', 'Сергей', 'Юрзин', 'пппп', 5, 18, '89043707957', 'yurzin@mail.ru', '11', 11111, 'рлрлрлрлрл', 22, 'male', '2020-12-19'),
(28, '../../images/profile-foto-10.jpg', '2020-12-21 03:54:57', 'Сергей', 'Юрзин', 'П.', 6, 19, '8-904-370-7957', 'yurzin@mail.ru', '11', 11111, 'ООО', 22, 'male', '2020-12-02'),
(29, '../../images/profile-foto-10.jpg', '2020-12-21 03:55:31', 'Сергей', 'Юрзин', 'П.', 7, 20, '8-904-370-7957', 'yurzin@mail.ru', '11', 11111, 'ООО', 22, 'male', '2020-12-09'),
(30, '../../images/profile-foto-13.jpg', '2020-12-21 10:20:14', 'Сергей', 'Юрзин', 'П.', 7, 21, '8-904-370-7957', 'yurzin@mail.ru', '0', 10000, 'ООО \'\'Aless\"', 44, 'male', '2020-12-10'),
(31, '../../images/божья коровка.jpg', '2020-12-22 03:35:07', 'Сергей', 'Юрзин', 'П.', 7, 22, '8-904-370-7957', 'yurzin@mail.ru', '11', 11111, 'ООО \'\'Aless\"', 44, 'male', '2020-12-31'),
(33, 'bvbv', '2020-12-23 02:44:36', 'bvvbbv', 'vbvbb', 'Иванович', 1, 24, 'b vv', 'bb', '10 лет', 50000, 'bbb', 25, 'female', '2020-12-08'),
(34, 'vvvv', '2020-12-23 02:44:36', 'vvvv', 'vvvv', 'Петрович', 1, 26, '888', 'vvvv', 'vv', 5000, '', 33, 'male', '2020-12-08');

-- --------------------------------------------------------

--
-- Структура таблицы `specialization`
--

CREATE TABLE `specialization` (
  `id` int(100) NOT NULL,
  `specialization` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `specialization`
--

INSERT INTO `specialization` (`id`, `specialization`) VALUES
(1, 'Администратор баз данных'),
(2, 'Аналитик'),
(3, 'Арт-директор\r\n'),
(4, 'Инженер\r\n'),
(5, 'Компьютерная безопасность'),
(6, 'Контент'),
(7, 'Маркетинг'),
(8, 'Мультимедиа'),
(9, 'Оптимизация сайта (SEO)'),
(10, 'Передача данных и доступ в интернет'),
(11, 'Программирование, Разработка'),
(12, 'Продажи'),
(13, 'Продюсер'),
(14, 'Развитие бизнеса'),
(15, 'Системный администратор'),
(16, 'Системы управления предприятием (ERP)\r\n'),
(17, 'Сотовые, Беспроводные технологии'),
(18, 'Стартапы'),
(19, 'Телекоммуникации'),
(20, 'Тестирование'),
(21, 'Технический писатель'),
(22, 'Управление проектами'),
(23, 'Электронная коммерция'),
(24, 'CRM системы'),
(25, 'Web инженер'),
(26, 'Web мастер');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_city` (`id_city`),
  ADD KEY `id_specialization` (`id_specialization`);

--
-- Индексы таблицы `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `data`
--
ALTER TABLE `data`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `specialization`
--
ALTER TABLE `specialization`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`id`) REFERENCES `data` (`id_city`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`id_specialization`) REFERENCES `specialization` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
