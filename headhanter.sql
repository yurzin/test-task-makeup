-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 11 2021 г., 11:35
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
  `id` int(11) NOT NULL,
  `city` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `city`) VALUES
(1, 'Кемерово'),
(2, 'Санкт-Петербург'),
(3, 'Новокузнецк'),
(4, 'Москва'),
(5, 'Барнаул'),
(6, 'Красноярск'),
(7, 'Новосибирск');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1609912547),
('m210107_045838_create_specialization_table', 1609995695),
('m210107_045851_create_city_table', 1609995696),
('m210107_045903_create_resume_table', 1609995700),
('m210109_114101_create_organization_table', 1610263231);

-- --------------------------------------------------------

--
-- Структура таблицы `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `resume_id` int(100) DEFAULT NULL,
  `organization` varchar(100) DEFAULT NULL,
  `start_month` varchar(100) DEFAULT NULL,
  `start_year` int(100) DEFAULT NULL,
  `end_month` varchar(100) DEFAULT NULL,
  `end_year` int(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `duties` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `organization`
--

INSERT INTO `organization` (`id`, `resume_id`, `organization`, `start_month`, `start_year`, `end_month`, `end_year`, `position`, `duties`) VALUES
(12, 68, 'ООО \"Теплотехника\"', 'Февраль', 2010, 'Март', 2020, 'Программист', NULL),
(13, 69, 'ООО \"Теплотехника\"', 'Март', 2015, 'Март', 2021, 'Программист', NULL),
(14, 70, '', 'Январь', NULL, 'Январь', NULL, '', NULL),
(15, 71, 'ООО \"Все про Все\"', 'Май', 1980, 'Январь', 2021, 'Директор', NULL),
(16, 72, 'ООО \"Сити\"', 'Май', 2015, 'Март', 2020, 'Дизайнер', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `resume`
--

CREATE TABLE `resume` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `patronymic` varchar(100) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `city_id` int(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `specialization_id` int(100) DEFAULT NULL,
  `salary` int(100) DEFAULT NULL,
  `employment` varchar(255) DEFAULT NULL,
  `schedule` varchar(255) DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  `about` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `resume`
--

INSERT INTO `resume` (`id`, `photo`, `date`, `name`, `last_name`, `patronymic`, `birth_date`, `gender`, `city_id`, `email`, `phone`, `specialization_id`, `salary`, `employment`, `schedule`, `experience`, `about`) VALUES
(68, '../../images/profile-foto.jpg', '2021-01-11 08:04:31', 'Сергей', 'Иванов', 'Иванович', '1985-12-04', 'male', 1, 'ivanov@mail.ru', '5-369-871-2400', 2, 50000, '1,2', '1,2', '4', 'С 2004 года работал в структурах АФК “Система”, в том числе и в качестве основателя и руководителя компании “СИСТЕМА-ИНФОРМ“. За год работы вывел ее в ТОП 100 ИТ компаний России. Отвечал за создание и развитие ИТ и других бизнес-проектов, включая проекты по информационной безопасности группы компаний АФК “Система”. '),
(69, '../../images/profile-foto-4.jpg', '2021-01-11 08:06:24', 'Иван', 'Иванов', 'Иванович', '1982-01-08', 'male', 2, 'ivanov@mail.ru', '5-555-555-5555', 3, 10000, '1', '1', '2', ''),
(70, '../../images/profile-foto-6.jpg', '2021-01-11 08:09:31', 'Анна', 'Иванова', 'Ивановна', '1990-01-21', 'female', 5, 'ivanova@mail.ru', '4-444-444-4444', 9, 50000, '1,5', '1,5', '1', ''),
(71, '../../images/profile-foto-10.jpg', '2021-01-11 08:15:59', 'Сергей', 'Петров', 'Иванович', '1958-01-01', 'male', 4, 'petrov@mail.ru', '8-009-857-4123', 4, 30000, '1,2', '1', '4', ''),
(72, '../../images/profile-foto-12.jpg', '2021-01-11 08:33:38', 'Максим', 'Сидоров', 'Петрович', '1995-01-16', 'male', 6, 'sidorov@mail.ru', '1-698-742-3658', 8, 30000, '1', '1', '3', '');

-- --------------------------------------------------------

--
-- Структура таблицы `specialization`
--

CREATE TABLE `specialization` (
  `id` int(11) NOT NULL,
  `specialization` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `specialization`
--

INSERT INTO `specialization` (`id`, `specialization`) VALUES
(1, 'Администратор баз данных'),
(2, 'Аналитик'),
(3, 'Арт-директор'),
(4, 'Инженер'),
(5, 'Компьютерная безопасность'),
(6, 'Контент'),
(7, 'Маркетинг'),
(8, 'Мультимедиа'),
(9, 'Оптимизация сайта (SEO)');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-city-resume_id` (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-organization-resume_id` (`id`),
  ADD KEY `fk-organization-resume_id` (`resume_id`);

--
-- Индексы таблицы `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-resume-city_id` (`city_id`),
  ADD KEY `idx-resume-specialization_id` (`specialization_id`);

--
-- Индексы таблицы `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-specialization-resume_id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `resume`
--
ALTER TABLE `resume`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT для таблицы `specialization`
--
ALTER TABLE `specialization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `organization`
--
ALTER TABLE `organization`
  ADD CONSTRAINT `fk-organization-resume_id` FOREIGN KEY (`resume_id`) REFERENCES `resume` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `resume`
--
ALTER TABLE `resume`
  ADD CONSTRAINT `fk-city-resume_id` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-specialization-resume_id` FOREIGN KEY (`specialization_id`) REFERENCES `specialization` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
