-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 25 2021 г., 08:30
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
-- Структура таблицы `busyness`
--

CREATE TABLE `busyness` (
  `id` int(11) NOT NULL,
  `resume_id` int(100) DEFAULT NULL,
  `full_employment` tinyint(3) DEFAULT NULL,
  `part_time_employment` tinyint(3) DEFAULT NULL,
  `project_work` tinyint(3) DEFAULT NULL,
  `internship` tinyint(3) DEFAULT NULL,
  `volunteering` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `busyness`
--

INSERT INTO `busyness` (`id`, `resume_id`, `full_employment`, `part_time_employment`, `project_work`, `internship`, `volunteering`) VALUES
(1, 73, 1, 2, 3, 4, 5),
(2, 72, 1, 2, NULL, NULL, 5),
(3, 71, 1, 2, NULL, NULL, 5),
(4, 68, 1, NULL, NULL, NULL, NULL),
(5, 69, NULL, 2, NULL, NULL, NULL),
(6, 70, NULL, NULL, 3, NULL, NULL),
(26, 94, 1, NULL, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
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
('m210109_114101_create_organization_table', 1610263231),
('m210118_080806_create_busyness_table', 1611231422),
('m210118_080806_create_employment_table', 1610957857),
('m210121_013554_create_timetable_table', 1611231423);

-- --------------------------------------------------------

--
-- Структура таблицы `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `resume_id` int(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
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

INSERT INTO `organization` (`id`, `resume_id`, `name`, `start_month`, `start_year`, `end_month`, `end_year`, `position`, `duties`) VALUES
(12, 68, 'ООО \"Теплотехника\"', 'Февраль', 2010, 'Март', 2020, 'Программист', NULL),
(13, 69, 'ООО \"Хладотехника\"', 'Март', 2015, 'Март', 2021, 'Программист', NULL),
(15, 71, 'ООО \"Все про Все\"', 'Май', 1980, 'Январь', 2021, 'Директор', 'выполнение специальных задач под водой (плавание в ластах или на подводных средствах движения)'),
(16, 72, 'ООО \"Сити\"', 'Май', 2015, 'Март', 2020, 'Дизайнер', NULL),
(17, 73, 'ООО \"Аллес\"', 'Январь', 2002, 'Январь', 2019, 'Дворник', NULL),
(22, 94, 'ООО \"Лесторг\"', 'Март', 2014, 'Сентябрь', 2020, 'Продавец', NULL);

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
  `gender` tinyint(10) DEFAULT NULL,
  `city_id` int(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `specialization_id` int(100) DEFAULT NULL,
  `salary` int(100) DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  `about` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `resume`
--

INSERT INTO `resume` (`id`, `photo`, `date`, `name`, `last_name`, `patronymic`, `birth_date`, `gender`, `city_id`, `email`, `phone`, `specialization_id`, `salary`, `experience`, `about`) VALUES
(68, '../../images/profile-foto.jpg', '2021-01-11 08:04:31', 'Сергей', 'Иванов', 'Иванович', '1985-12-04', 1, 1, 'ivanov@mail.ru', '5-369-871-2400', 2, 50000, '4', 'С 2004 года работал в структурах АФК “Система”, в том числе и в качестве основателя и руководителя компании “СИСТЕМА-ИНФОРМ“. За год работы вывел ее в ТОП 100 ИТ компаний России. Отвечал за создание и развитие ИТ и других бизнес-проектов, включая проекты по информационной безопасности группы компаний АФК “Система”. '),
(69, '../../images/profile-foto-4.jpg', '2021-01-11 08:06:24', 'Иван', 'Иванов', 'Иванович', '1982-01-08', 1, 2, 'ivanov@mail.ru', '5-555-555-5555', 3, 10000, '2', ''),
(70, '../../images/profile-foto-6.jpg', '2021-01-11 08:09:31', 'Анна', 'Иванова', 'Ивановна', '1990-01-21', 2, 5, 'ivanova@mail.ru', '4-444-444-4444', 9, 50000, '1', ''),
(71, '../../images/profile-foto-10.jpg', '2021-01-11 08:15:59', 'Сергей', 'Петров', 'Иванович', '1958-01-01', 1, 4, 'petrov@mail.ru', '8-009-857-4123', 4, 30000, '4', 'Я всегда готов по приказу Советского правительства выступить на защиту моей Родины - Союза Советских Социалистических Республик и, как воин Вооруженных Сил СССР, я клянусь защищать ее мужественно, умело, с достоинством и честью, не щадя своей крови и самой жизни для достижения полной победы над врагами.'),
(72, '../../images/profile-foto-12.jpg', '2021-01-11 08:33:38', 'Максим', 'Сидоров', 'Петрович', '1995-01-16', 1, 6, 'sidorov@mail.ru', '1-698-742-3658', 8, 30000, '3', ''),
(73, '../../images/profile-foto-3.jpg', '2021-01-16 11:36:41', 'Сергей', 'Иванов', 'Иванович', '1988-01-07', 1, 3, 'ivanov@mail.ru', '5-689-521-4789', 2, 3000, '4', ''),
(94, '../../images/profile-foto-5.jpg', '2021-01-25 04:53:01', 'Анна', 'Иванова', 'Петровна', '1985-01-10', 2, 3, 'ivanova@mail.ru', '5-698-755-5555', 3, 32065, '2', '');

-- --------------------------------------------------------

--
-- Структура таблицы `specialization`
--

CREATE TABLE `specialization` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `specialization`
--

INSERT INTO `specialization` (`id`, `name`) VALUES
(1, 'Администратор баз данных'),
(2, 'Аналитик'),
(3, 'Арт-директор'),
(4, 'Инженер'),
(5, 'Компьютерная безопасность'),
(6, 'Контент'),
(7, 'Маркетинг'),
(8, 'Мультимедиа'),
(9, 'Оптимизация сайта (SEO)');

-- --------------------------------------------------------

--
-- Структура таблицы `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `resume_id` int(100) DEFAULT NULL,
  `full_day` tinyint(3) DEFAULT NULL,
  `shift_work` tinyint(3) DEFAULT NULL,
  `flexible_work` tinyint(3) DEFAULT NULL,
  `remote_work` tinyint(3) DEFAULT NULL,
  `shift_method` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `timetable`
--

INSERT INTO `timetable` (`id`, `resume_id`, `full_day`, `shift_work`, `flexible_work`, `remote_work`, `shift_method`) VALUES
(1, 72, 1, 2, 3, 4, 5),
(2, 71, NULL, 2, NULL, NULL, 5),
(3, 68, 1, NULL, 3, NULL, NULL),
(4, 69, NULL, 2, NULL, 4, NULL),
(5, 70, NULL, 2, NULL, NULL, NULL),
(6, 73, NULL, NULL, 3, 4, NULL),
(26, 94, 1, NULL, NULL, 4, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `busyness`
--
ALTER TABLE `busyness`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-busyness-resume_id` (`id`),
  ADD KEY `fk-busyness-resume_id` (`resume_id`);

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
-- Индексы таблицы `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-timetable-resume_id` (`id`),
  ADD KEY `fk-timetable-resume_id` (`resume_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `busyness`
--
ALTER TABLE `busyness`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `resume`
--
ALTER TABLE `resume`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT для таблицы `specialization`
--
ALTER TABLE `specialization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `busyness`
--
ALTER TABLE `busyness`
  ADD CONSTRAINT `fk-busyness-resume_id` FOREIGN KEY (`resume_id`) REFERENCES `resume` (`id`) ON DELETE CASCADE;

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

--
-- Ограничения внешнего ключа таблицы `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `fk-timetable-resume_id` FOREIGN KEY (`resume_id`) REFERENCES `resume` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
