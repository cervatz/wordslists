-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generato il: 22 gen, 2010 at 12:39 
-- Versione MySQL: 5.1.37
-- Versione PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `mycake`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=195 ;

--
-- Dump dei dati per la tabella `countries`
--

INSERT INTO `countries` (`id`, `description`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'Andorra'),
(5, 'Angola'),
(6, 'Antigua'),
(7, 'Argentina'),
(8, 'Armenia'),
(9, 'Australia'),
(10, 'Austria'),
(11, 'Azerbaijan'),
(12, 'Bahamas'),
(13, 'Bahrain'),
(14, 'Bangladesh'),
(15, 'Barbados'),
(16, 'Belarus'),
(17, 'Belgium'),
(18, 'Belize'),
(19, 'Benin'),
(20, 'Bhutan'),
(21, 'Bolivia'),
(22, 'Bosnia Herzegovina'),
(23, 'Botswana'),
(24, 'Brazil'),
(25, 'Brunei'),
(26, 'Bulgaria'),
(27, 'Burkina'),
(28, 'Burundi'),
(29, 'Cambodia'),
(30, 'Cameroon'),
(31, 'Canada'),
(32, 'Cape Verde'),
(33, 'Central African Rep'),
(34, 'Chad'),
(35, 'Chile'),
(36, 'China'),
(37, 'Colombia'),
(38, 'Comoros'),
(39, 'Congo'),
(40, 'Costa Rica'),
(41, 'Croatia'),
(42, 'Cuba'),
(43, 'Cyprus'),
(44, 'Czech Republic'),
(45, 'Denmark'),
(46, 'Djibouti'),
(47, 'Dominica'),
(48, 'Dominican Republic'),
(49, 'East Timor'),
(50, 'Ecuador'),
(51, 'Egypt'),
(52, 'El Salvador'),
(53, 'Equatorial Guinea'),
(54, 'Eritrea'),
(55, 'Estonia'),
(56, 'Ethiopia'),
(57, 'Fiji'),
(58, 'Finland'),
(59, 'France'),
(60, 'Gabon'),
(61, 'Gambia'),
(62, 'Georgia'),
(63, 'Germany'),
(64, 'Ghana'),
(65, 'Greece'),
(66, 'Grenada'),
(67, 'Guatemala'),
(68, 'Guinea'),
(69, 'Guinea-Bissau'),
(70, 'Guyana'),
(71, 'Haiti'),
(72, 'Honduras'),
(73, 'Hungary'),
(74, 'Iceland'),
(75, 'India'),
(76, 'Indonesia'),
(77, 'Iran'),
(78, 'Iraq'),
(79, 'Ireland'),
(80, 'Israel'),
(81, 'Italy'),
(82, 'Ivory Coast'),
(83, 'Jamaica'),
(84, 'Japan'),
(85, 'Jordan'),
(86, 'Kazakhstan'),
(87, 'Kenya'),
(88, 'Kiribati'),
(89, 'Korea North'),
(90, 'Korea South'),
(91, 'Kosovo'),
(92, 'Kuwait'),
(93, 'Kyrgyzstan'),
(94, 'Laos'),
(95, 'Latvia'),
(96, 'Lebanon'),
(97, 'Lesotho'),
(98, 'Liberia'),
(99, 'Libya'),
(100, 'Liechtenstein'),
(101, 'Lithuania'),
(102, 'Luxembourg'),
(103, 'Macedonia'),
(104, 'Madagascar'),
(105, 'Malawi'),
(106, 'Malaysia'),
(107, 'Maldives'),
(108, 'Mali'),
(109, 'Malta'),
(110, 'Marshall Islands'),
(111, 'Mauritania'),
(112, 'Mauritius'),
(113, 'Mexico'),
(114, 'Micronesia'),
(115, 'Moldova'),
(116, 'Monaco'),
(117, 'Mongolia'),
(118, 'Montenegro'),
(119, 'Morocco'),
(120, 'Mozambique'),
(121, 'Myanmar'),
(122, 'Namibia'),
(123, 'Nauru'),
(124, 'Nepal'),
(125, 'Netherlands'),
(126, 'New Zealand'),
(127, 'Nicaragua'),
(128, 'Niger'),
(129, 'Nigeria'),
(130, 'Norway'),
(131, 'Oman'),
(132, 'Pakistan'),
(133, 'Palau'),
(134, 'Panama'),
(135, 'Papua New Guinea'),
(136, 'Paraguay'),
(137, 'Peru'),
(138, 'Philippines'),
(139, 'Poland'),
(140, 'Portugal'),
(141, 'Qatar'),
(142, 'Romania'),
(143, 'Russian Federation'),
(144, 'Rwanda'),
(145, 'St Kitts & Nevis'),
(146, 'St Lucia'),
(147, 'Saint Vincent & the Grenadines'),
(148, 'Samoa'),
(149, 'San Marino'),
(150, 'Sao Tome & Principe'),
(151, 'Saudi Arabia'),
(152, 'Senegal'),
(153, 'Serbia'),
(154, 'Seychelles'),
(155, 'Sierra Leone'),
(156, 'Singapore'),
(157, 'Slovakia'),
(158, 'Slovenia'),
(159, 'Solomon Islands'),
(160, 'Somalia'),
(161, 'South Africa'),
(162, 'Spain'),
(163, 'Sri Lanka'),
(164, 'Sudan'),
(165, 'Suriname'),
(166, 'Swaziland'),
(167, 'Sweden'),
(168, 'Switzerland'),
(169, 'Syria'),
(170, 'Taiwan'),
(171, 'Tajikistan'),
(172, 'Tanzania'),
(173, 'Thailand'),
(174, 'Togo'),
(175, 'Tonga'),
(176, 'Trinidad & Tobago'),
(177, 'Tunisia'),
(178, 'Turkey'),
(179, 'Turkmenistan'),
(180, 'Tuvalu'),
(181, 'Uganda'),
(182, 'Ukraine'),
(183, 'United Arab Emirates'),
(184, 'United Kingdom'),
(185, 'United States'),
(186, 'Uruguay'),
(187, 'Uzbekistan'),
(188, 'Vanuatu'),
(189, 'Vatican City'),
(190, 'Venezuela'),
(191, 'Vietnam'),
(192, 'Yemen'),
(193, 'Zambia'),
(194, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Struttura della tabella `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=39 ;

--
-- Dump dei dati per la tabella `languages`
--

INSERT INTO `languages` (`id`, `description`) VALUES
(1, 'English'),
(2, 'Spanish'),
(3, 'French'),
(4, 'German'),
(5, 'Italian'),
(6, 'Chinese'),
(7, 'Polish'),
(8, 'Korean'),
(9, 'Vietnamese'),
(10, 'Portuguese'),
(11, 'Japanese'),
(12, 'Greek'),
(13, 'Arabic'),
(14, 'Hindi'),
(15, 'Russian'),
(16, 'Yiddish'),
(17, 'Thai'),
(18, 'Persian'),
(19, 'Armenian'),
(20, 'Hungarian'),
(21, 'Hebrew'),
(22, 'Dutch'),
(23, 'Cambodian'),
(24, 'Ukrainian'),
(25, 'Czech'),
(26, 'Norwegian'),
(27, 'Slovak'),
(28, 'Swedish'),
(29, 'Serbocroatian'),
(30, 'Rumanian'),
(31, 'Lithuanian'),
(32, 'Finnish'),
(33, 'Panjabi'),
(34, 'Croatian'),
(35, 'Turkish'),
(36, 'Bengali'),
(37, 'Danish'),
(38, 'Samoan');

-- --------------------------------------------------------

--
-- Struttura della tabella `lines`
--

CREATE TABLE IF NOT EXISTS `lines` (
  `wordslist_id` int(10) unsigned NOT NULL,
  `id` int(10) unsigned NOT NULL,
  `string1` varchar(100) COLLATE utf8_bin NOT NULL,
  `string2` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`wordslist_id`,`id`),
  UNIQUE KEY `wordslist_id` (`wordslist_id`,`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `lines`
--

INSERT INTO `lines` (`wordslist_id`, `id`, `string1`, `string2`) VALUES
(26, 1, 'cane', 'perro'),
(26, 2, 'gatto', 'gato'),
(26, 3, 'mucca', 'vaca'),
(31, 4, 'book', 'libro'),
(31, 5, 'water', 'acuqa'),
(31, 8, 'pause', 'pausa'),
(31, 7, 'book', 'libercolo'),
(31, 6, 'word', 'parola'),
(31, 9, 'michael', 'michele'),
(31, 10, 'michael', 'michele'),
(31, 11, 'pen', 'penna'),
(31, 12, 'barca', 'butaca'),
(31, 13, 'dog', 'cane'),
(31, 14, 'list', 'lista');

-- --------------------------------------------------------

--
-- Struttura della tabella `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id1` int(10) NOT NULL COMMENT 'Mittente',
  `user_id2` int(10) NOT NULL COMMENT 'Ricevente',
  `object` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `new` tinyint(4) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dump dei dati per la tabella `messages`
--

INSERT INTO `messages` (`id`, `user_id1`, `user_id2`, `object`, `text`, `new`, `date`) VALUES
(1, 1, 22, 'Un bel oggetto d''effetto', 'Senti volevo dirti una cosa.. va in mona va', 0, '2010-01-22 09:55:36'),
(2, 22, 1, 'non male', 'cosa dici merda?', 1, '2010-01-22 11:18:42'),
(3, 22, 1, 'oggetttone', 'fai proprio schifo cazzo', 0, '2010-01-22 11:19:18'),
(6, 22, 0, 'Re: Un bel oggetto d''effetto', 'eh c''avrai una bella faccia da culo te allora!', 1, '2010-01-22 12:31:15'),
(7, 1, 22, 'Re: oggetttone', 'e sticazzi?', 0, '2010-01-22 12:32:20'),
(8, 22, 1, 'Re: Re: oggetttone', 'anca ancò se ciava doman!', 0, '2010-01-22 12:33:56'),
(9, 1, 22, 'Re: Re: Re: oggetttone', 'sembra che sta merda funzioni!', 0, '2010-01-22 12:34:24');

-- --------------------------------------------------------

--
-- Struttura della tabella `mothers`
--

CREATE TABLE IF NOT EXISTS `mothers` (
  `user_id` int(6) NOT NULL,
  `language_id` int(3) NOT NULL,
  PRIMARY KEY (`user_id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `mothers`
--

INSERT INTO `mothers` (`user_id`, `language_id`) VALUES
(19, 21),
(20, 12),
(20, 21),
(20, 25),
(20, 37),
(21, 6),
(21, 12),
(21, 21),
(21, 25),
(21, 37),
(22, 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `practices`
--

CREATE TABLE IF NOT EXISTS `practices` (
  `user_id` int(6) NOT NULL,
  `language_id` int(3) NOT NULL,
  PRIMARY KEY (`user_id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `practices`
--

INSERT INTO `practices` (`user_id`, `language_id`) VALUES
(19, 5),
(22, 1),
(22, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `wordslist_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `result` int(3) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Results Table' AUTO_INCREMENT=11 ;

--
-- Dump dei dati per la tabella `results`
--

INSERT INTO `results` (`id`, `wordslist_id`, `user_id`, `result`, `date`) VALUES
(10, 31, 22, 73, '2010-01-21 17:48:24'),
(9, 26, 22, 67, '2010-01-21 17:45:21');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `administrator` tinyint(1) NOT NULL,
  `public` tinyint(1) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `country_id` int(3) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=23 ;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `administrator`, `public`, `first_name`, `last_name`, `email`, `country_id`, `created`) VALUES
(1, 'enrico', 'enrico', 1, 1, 'enrico', 'cervato', 'cervatz@hotmail.com', 81, '0000-00-00'),
(2, 'judith2', 'judith2', 1, 1, 'judith2', 'conijn2', 'judith@hotmail.com', 125, '0000-00-00'),
(5, 'mike', 'mike', 1, 1, 'mike', 'bahnan', 'mike@hotmail.com', 96, '0000-00-00'),
(22, 'andrea', 'andrea', 1, 0, 'andrea', 'andrea', 'andreaurioli@gmail.com', 81, '2010-01-15');

-- --------------------------------------------------------

--
-- Struttura della tabella `wordslists`
--

CREATE TABLE IF NOT EXISTS `wordslists` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `user_id` int(6) NOT NULL,
  `shared` tinyint(4) NOT NULL,
  `description` varchar(50) COLLATE utf8_bin NOT NULL,
  `language_id1` int(3) NOT NULL,
  `language_id2` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=32 ;

--
-- Dump dei dati per la tabella `wordslists`
--

INSERT INTO `wordslists` (`id`, `name`, `user_id`, `shared`, `description`, `language_id1`, `language_id2`) VALUES
(22, 'Italian Dutch 1', 1, 0, 'Italian Dutch 1', 5, 22),
(26, 'Italiano Spagnolo', 22, 0, 'Italiano Spagnolo', 5, 2),
(27, 'Spagnolo Italiano', 22, 0, 'Spagnolo Italiano', 2, 5),
(30, 'Italiano Inglese', 22, 0, 'Italiano Inglese', 5, 1),
(31, 'English Italian', 22, 0, 'English Italian', 1, 5);
