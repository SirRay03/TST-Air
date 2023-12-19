-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 05:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlyflights`
--

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `iata` char(3) NOT NULL,
  `country_id` char(2) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`iata`, `country_id`, `city`, `name`) VALUES
('BDO', 'ID', 'Bandung', 'Husein Sastranegara International Airport'),
('BKS', 'ID', 'Bengkulu', 'Fatmawati Soekarno Airport'),
('BPN', 'ID', 'Balikpapan', 'Sultan Aji Muhammad Sulaiman Airport'),
('BTH', 'ID', 'Batam', 'Hang Nadim International Airport'),
('BTJ', 'ID', 'Banda Aceh', 'Sultan Iskandar Muda International Airport'),
('CGK', 'ID', 'Jakarta', 'Soekarno-Hatta International Airport'),
('DJB', 'ID', 'Jambi', 'Sultan Thaha Airport'),
('DPS', 'ID', 'Denpasar', 'Ngurah Rai International Airport'),
('HLP', 'ID', 'Jakarta', 'Halim Perdanakusuma Airport'),
('JOG', 'ID', 'Yogyakarta', 'Adisucipto International Airport'),
('KDI', 'ID', 'Kendari', 'Wolter Monginsidi Airport'),
('KNG', 'ID', 'Kaimana', 'Kaimana Airport'),
('KNO', 'ID', 'Medan', 'Kualanamu International Airport'),
('KOE', 'ID', 'Kupang', 'El Tari Airport'),
('LBJ', 'ID', 'Labuan Bajo', 'Komodo Airport'),
('LOP', 'ID', 'Mataram', 'Lombok International Airport'),
('MDC', 'ID', 'Manado', 'Sam Ratulangi International Airport'),
('MES', 'ID', 'Medan', 'Polonia International Airport'),
('PLM', 'ID', 'Palembang', 'Sultan Mahmud Badaruddin II International Airport'),
('PNK', 'ID', 'Pontianak', 'Supadio International Airport'),
('SOC', 'ID', 'Solo', 'Adisumarmo International Airport'),
('SRG', 'ID', 'Semarang', 'Achmad Yani International Airport'),
('SUB', 'ID', 'Surabaya', 'Juanda International Airport'),
('UPG', 'ID', 'Makassar', 'Sultan Hasanuddin International Airport');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `pnr` varchar(255) NOT NULL,
  `flight_id` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `seat_num` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`pnr`, `flight_id`, `created_at`, `seat_num`) VALUES
('0YS0Z5', 'OF-034', '2023-12-19 21:54:28', NULL),
('1', 'OF-001', '2023-12-19 17:30:17', 1),
('5LNJP5', 'OF-123', '2023-12-19 22:09:27', NULL),
('CE8MWU', 'OF-001', '2023-12-19 22:13:55', 4),
('FVGH1M', 'OF-033', '2023-12-19 22:11:16', 1),
('LE3HGT', 'OF-023', '2023-12-19 23:31:57', NULL),
('MBSUX0', 'OF-001', '2023-12-19 22:13:55', 3),
('P3CDIA', 'OF-034', '2023-12-19 21:44:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `continents`
--

CREATE TABLE `continents` (
  `code` char(2) NOT NULL COMMENT 'Continent code',
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `continents`
--

INSERT INTO `continents` (`code`, `name`) VALUES
('AF', 'Africa'),
('AN', 'Antarctica'),
('AS', 'Asia'),
('EU', 'Europe'),
('NA', 'North America'),
('OC', 'Oceania'),
('SA', 'South America');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `code` char(2) NOT NULL COMMENT 'Two-letter country code (ISO 3166-1 alpha-2)',
  `name` varchar(255) NOT NULL COMMENT 'English country name',
  `full_name` varchar(255) NOT NULL COMMENT 'Full English country name',
  `iso3` char(3) NOT NULL COMMENT 'Three-letter country code (ISO 3166-1 alpha-3)',
  `number` char(3) NOT NULL COMMENT 'Three-digit country number (ISO 3166-1 numeric)',
  `continent_code` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`code`, `name`, `full_name`, `iso3`, `number`, `continent_code`) VALUES
('AD', 'Andorra', 'Principality of Andorra', 'AND', '020', 'EU'),
('AE', 'United Arab Emirates', 'United Arab Emirates', 'ARE', '784', 'AS'),
('AF', 'Afghanistan', 'Islamic Republic of Afghanistan', 'AFG', '004', 'AS'),
('AG', 'Antigua and Barbuda', 'Antigua and Barbuda', 'ATG', '028', 'NA'),
('AI', 'Anguilla', 'Anguilla', 'AIA', '660', 'NA'),
('AL', 'Albania', 'Republic of Albania', 'ALB', '008', 'EU'),
('AM', 'Armenia', 'Republic of Armenia', 'ARM', '051', 'AS'),
('AO', 'Angola', 'Republic of Angola', 'AGO', '024', 'AF'),
('AQ', 'Antarctica', 'Antarctica (the territory South of 60 deg S)', 'ATA', '010', 'AN'),
('AR', 'Argentina', 'Argentine Republic', 'ARG', '032', 'SA'),
('AS', 'American Samoa', 'American Samoa', 'ASM', '016', 'OC'),
('AT', 'Austria', 'Republic of Austria', 'AUT', '040', 'EU'),
('AU', 'Australia', 'Commonwealth of Australia', 'AUS', '036', 'OC'),
('AW', 'Aruba', 'Aruba', 'ABW', '533', 'NA'),
('AX', '�land Islands', '�land Islands', 'ALA', '248', 'EU'),
('AZ', 'Azerbaijan', 'Republic of Azerbaijan', 'AZE', '031', 'AS'),
('BA', 'Bosnia and Herzegovina', 'Bosnia and Herzegovina', 'BIH', '070', 'EU'),
('BB', 'Barbados', 'Barbados', 'BRB', '052', 'NA'),
('BD', 'Bangladesh', 'People\'s Republic of Bangladesh', 'BGD', '050', 'AS'),
('BE', 'Belgium', 'Kingdom of Belgium', 'BEL', '056', 'EU'),
('BF', 'Burkina Faso', 'Burkina Faso', 'BFA', '854', 'AF'),
('BG', 'Bulgaria', 'Republic of Bulgaria', 'BGR', '100', 'EU'),
('BH', 'Bahrain', 'Kingdom of Bahrain', 'BHR', '048', 'AS'),
('BI', 'Burundi', 'Republic of Burundi', 'BDI', '108', 'AF'),
('BJ', 'Benin', 'Republic of Benin', 'BEN', '204', 'AF'),
('BL', 'Saint Barth�lemy', 'Saint Barth�lemy', 'BLM', '652', 'NA'),
('BM', 'Bermuda', 'Bermuda', 'BMU', '060', 'NA'),
('BN', 'Brunei Darussalam', 'Brunei Darussalam', 'BRN', '096', 'AS'),
('BO', 'Bolivia', 'Plurinational State of Bolivia', 'BOL', '068', 'SA'),
('BQ', 'Bonaire, Sint Eustatius and Saba', 'Bonaire, Sint Eustatius and Saba', 'BES', '535', 'NA'),
('BR', 'Brazil', 'Federative Republic of Brazil', 'BRA', '076', 'SA'),
('BS', 'Bahamas', 'Commonwealth of the Bahamas', 'BHS', '044', 'NA'),
('BT', 'Bhutan', 'Kingdom of Bhutan', 'BTN', '064', 'AS'),
('BV', 'Bouvet Island (Bouvet�ya)', 'Bouvet Island (Bouvet�ya)', 'BVT', '074', 'AN'),
('BW', 'Botswana', 'Republic of Botswana', 'BWA', '072', 'AF'),
('BY', 'Belarus', 'Republic of Belarus', 'BLR', '112', 'EU'),
('BZ', 'Belize', 'Belize', 'BLZ', '084', 'NA'),
('CA', 'Canada', 'Canada', 'CAN', '124', 'NA'),
('CC', 'Cocos (Keeling) Islands', 'Cocos (Keeling) Islands', 'CCK', '166', 'AS'),
('CD', 'Congo', 'Democratic Republic of the Congo', 'COD', '180', 'AF'),
('CF', 'Central African Republic', 'Central African Republic', 'CAF', '140', 'AF'),
('CG', 'Congo', 'Republic of the Congo', 'COG', '178', 'AF'),
('CH', 'Switzerland', 'Swiss Confederation', 'CHE', '756', 'EU'),
('CI', 'Cote d\'Ivoire', 'Republic of Cote d\'Ivoire', 'CIV', '384', 'AF'),
('CK', 'Cook Islands', 'Cook Islands', 'COK', '184', 'OC'),
('CL', 'Chile', 'Republic of Chile', 'CHL', '152', 'SA'),
('CM', 'Cameroon', 'Republic of Cameroon', 'CMR', '120', 'AF'),
('CN', 'China', 'People\'s Republic of China', 'CHN', '156', 'AS'),
('CO', 'Colombia', 'Republic of Colombia', 'COL', '170', 'SA'),
('CR', 'Costa Rica', 'Republic of Costa Rica', 'CRI', '188', 'NA'),
('CU', 'Cuba', 'Republic of Cuba', 'CUB', '192', 'NA'),
('CV', 'Cabo Verde', 'Republic of Cabo Verde', 'CPV', '132', 'AF'),
('CW', 'Cura�ao', 'Cura�ao', 'CUW', '531', 'NA'),
('CX', 'Christmas Island', 'Christmas Island', 'CXR', '162', 'AS'),
('CY', 'Cyprus', 'Republic of Cyprus', 'CYP', '196', 'AS'),
('CZ', 'Czechia', 'Czech Republic', 'CZE', '203', 'EU'),
('DE', 'Germany', 'Federal Republic of Germany', 'DEU', '276', 'EU'),
('DJ', 'Djibouti', 'Republic of Djibouti', 'DJI', '262', 'AF'),
('DK', 'Denmark', 'Kingdom of Denmark', 'DNK', '208', 'EU'),
('DM', 'Dominica', 'Commonwealth of Dominica', 'DMA', '212', 'NA'),
('DO', 'Dominican Republic', 'Dominican Republic', 'DOM', '214', 'NA'),
('DZ', 'Algeria', 'People\'s Democratic Republic of Algeria', 'DZA', '012', 'AF'),
('EC', 'Ecuador', 'Republic of Ecuador', 'ECU', '218', 'SA'),
('EE', 'Estonia', 'Republic of Estonia', 'EST', '233', 'EU'),
('EG', 'Egypt', 'Arab Republic of Egypt', 'EGY', '818', 'AF'),
('EH', 'Western Sahara', 'Western Sahara', 'ESH', '732', 'AF'),
('ER', 'Eritrea', 'State of Eritrea', 'ERI', '232', 'AF'),
('ES', 'Spain', 'Kingdom of Spain', 'ESP', '724', 'EU'),
('ET', 'Ethiopia', 'Federal Democratic Republic of Ethiopia', 'ETH', '231', 'AF'),
('FI', 'Finland', 'Republic of Finland', 'FIN', '246', 'EU'),
('FJ', 'Fiji', 'Republic of Fiji', 'FJI', '242', 'OC'),
('FK', 'Falkland Islands (Malvinas)', 'Falkland Islands (Malvinas)', 'FLK', '238', 'SA'),
('FM', 'Micronesia', 'Federated States of Micronesia', 'FSM', '583', 'OC'),
('FO', 'Faroe Islands', 'Faroe Islands', 'FRO', '234', 'EU'),
('FR', 'France', 'French Republic', 'FRA', '250', 'EU'),
('GA', 'Gabon', 'Gabonese Republic', 'GAB', '266', 'AF'),
('GB', 'United Kingdom of Great Britain and Northern Ireland', 'United Kingdom of Great Britain & Northern Ireland', 'GBR', '826', 'EU'),
('GD', 'Grenada', 'Grenada', 'GRD', '308', 'NA'),
('GE', 'Georgia', 'Georgia', 'GEO', '268', 'AS'),
('GF', 'French Guiana', 'French Guiana', 'GUF', '254', 'SA'),
('GG', 'Guernsey', 'Bailiwick of Guernsey', 'GGY', '831', 'EU'),
('GH', 'Ghana', 'Republic of Ghana', 'GHA', '288', 'AF'),
('GI', 'Gibraltar', 'Gibraltar', 'GIB', '292', 'EU'),
('GL', 'Greenland', 'Greenland', 'GRL', '304', 'NA'),
('GM', 'Gambia', 'Republic of the Gambia', 'GMB', '270', 'AF'),
('GN', 'Guinea', 'Republic of Guinea', 'GIN', '324', 'AF'),
('GP', 'Guadeloupe', 'Guadeloupe', 'GLP', '312', 'NA'),
('GQ', 'Equatorial Guinea', 'Republic of Equatorial Guinea', 'GNQ', '226', 'AF'),
('GR', 'Greece', 'Hellenic Republic of Greece', 'GRC', '300', 'EU'),
('GS', 'South Georgia and the South Sandwich Islands', 'South Georgia and the South Sandwich Islands', 'SGS', '239', 'AN'),
('GT', 'Guatemala', 'Republic of Guatemala', 'GTM', '320', 'NA'),
('GU', 'Guam', 'Guam', 'GUM', '316', 'OC'),
('GW', 'Guinea-Bissau', 'Republic of Guinea-Bissau', 'GNB', '624', 'AF'),
('GY', 'Guyana', 'Co-operative Republic of Guyana', 'GUY', '328', 'SA'),
('HK', 'Hong Kong', 'Hong Kong Special Administrative Region of China', 'HKG', '344', 'AS'),
('HM', 'Heard Island and McDonald Islands', 'Heard Island and McDonald Islands', 'HMD', '334', 'AN'),
('HN', 'Honduras', 'Republic of Honduras', 'HND', '340', 'NA'),
('HR', 'Croatia', 'Republic of Croatia', 'HRV', '191', 'EU'),
('HT', 'Haiti', 'Republic of Haiti', 'HTI', '332', 'NA'),
('HU', 'Hungary', 'Hungary', 'HUN', '348', 'EU'),
('ID', 'Indonesia', 'Republic of Indonesia', 'IDN', '360', 'AS'),
('IE', 'Ireland', 'Ireland', 'IRL', '372', 'EU'),
('IL', 'Israel', 'State of Israel', 'ISR', '376', 'AS'),
('IM', 'Isle of Man', 'Isle of Man', 'IMN', '833', 'EU'),
('IN', 'India', 'Republic of India', 'IND', '356', 'AS'),
('IO', 'British Indian Ocean Territory (Chagos Archipelago)', 'British Indian Ocean Territory (Chagos Archipelago)', 'IOT', '086', 'AS'),
('IQ', 'Iraq', 'Republic of Iraq', 'IRQ', '368', 'AS'),
('IR', 'Iran', 'Islamic Republic of Iran', 'IRN', '364', 'AS'),
('IS', 'Iceland', 'Iceland', 'ISL', '352', 'EU'),
('IT', 'Italy', 'Republic of Italy', 'ITA', '380', 'EU'),
('JE', 'Jersey', 'Bailiwick of Jersey', 'JEY', '832', 'EU'),
('JM', 'Jamaica', 'Jamaica', 'JAM', '388', 'NA'),
('JO', 'Jordan', 'Hashemite Kingdom of Jordan', 'JOR', '400', 'AS'),
('JP', 'Japan', 'Japan', 'JPN', '392', 'AS'),
('KE', 'Kenya', 'Republic of Kenya', 'KEN', '404', 'AF'),
('KG', 'Kyrgyz Republic', 'Kyrgyz Republic', 'KGZ', '417', 'AS'),
('KH', 'Cambodia', 'Kingdom of Cambodia', 'KHM', '116', 'AS'),
('KI', 'Kiribati', 'Republic of Kiribati', 'KIR', '296', 'OC'),
('KM', 'Comoros', 'Union of the Comoros', 'COM', '174', 'AF'),
('KN', 'Saint Kitts and Nevis', 'Federation of Saint Kitts and Nevis', 'KNA', '659', 'NA'),
('KP', 'Korea', 'Democratic People\'s Republic of Korea', 'PRK', '408', 'AS'),
('KR', 'Korea', 'Republic of Korea', 'KOR', '410', 'AS'),
('KW', 'Kuwait', 'State of Kuwait', 'KWT', '414', 'AS'),
('KY', 'Cayman Islands', 'Cayman Islands', 'CYM', '136', 'NA'),
('KZ', 'Kazakhstan', 'Republic of Kazakhstan', 'KAZ', '398', 'AS'),
('LA', 'Lao People\'s Democratic Republic', 'Lao People\'s Democratic Republic', 'LAO', '418', 'AS'),
('LB', 'Lebanon', 'Lebanese Republic', 'LBN', '422', 'AS'),
('LC', 'Saint Lucia', 'Saint Lucia', 'LCA', '662', 'NA'),
('LI', 'Liechtenstein', 'Principality of Liechtenstein', 'LIE', '438', 'EU'),
('LK', 'Sri Lanka', 'Democratic Socialist Republic of Sri Lanka', 'LKA', '144', 'AS'),
('LR', 'Liberia', 'Republic of Liberia', 'LBR', '430', 'AF'),
('LS', 'Lesotho', 'Kingdom of Lesotho', 'LSO', '426', 'AF'),
('LT', 'Lithuania', 'Republic of Lithuania', 'LTU', '440', 'EU'),
('LU', 'Luxembourg', 'Grand Duchy of Luxembourg', 'LUX', '442', 'EU'),
('LV', 'Latvia', 'Republic of Latvia', 'LVA', '428', 'EU'),
('LY', 'Libya', 'State of Libya', 'LBY', '434', 'AF'),
('MA', 'Morocco', 'Kingdom of Morocco', 'MAR', '504', 'AF'),
('MC', 'Monaco', 'Principality of Monaco', 'MCO', '492', 'EU'),
('MD', 'Moldova', 'Republic of Moldova', 'MDA', '498', 'EU'),
('ME', 'Montenegro', 'Montenegro', 'MNE', '499', 'EU'),
('MF', 'Saint Martin', 'Saint Martin (French part)', 'MAF', '663', 'NA'),
('MG', 'Madagascar', 'Republic of Madagascar', 'MDG', '450', 'AF'),
('MH', 'Marshall Islands', 'Republic of the Marshall Islands', 'MHL', '584', 'OC'),
('MK', 'North Macedonia', 'Republic of North Macedonia', 'MKD', '807', 'EU'),
('ML', 'Mali', 'Republic of Mali', 'MLI', '466', 'AF'),
('MM', 'Myanmar', 'Republic of the Union of Myanmar', 'MMR', '104', 'AS'),
('MN', 'Mongolia', 'Mongolia', 'MNG', '496', 'AS'),
('MO', 'Macao', 'Macao Special Administrative Region of China', 'MAC', '446', 'AS'),
('MP', 'Northern Mariana Islands', 'Commonwealth of the Northern Mariana Islands', 'MNP', '580', 'OC'),
('MQ', 'Martinique', 'Martinique', 'MTQ', '474', 'NA'),
('MR', 'Mauritania', 'Islamic Republic of Mauritania', 'MRT', '478', 'AF'),
('MS', 'Montserrat', 'Montserrat', 'MSR', '500', 'NA'),
('MT', 'Malta', 'Republic of Malta', 'MLT', '470', 'EU'),
('MU', 'Mauritius', 'Republic of Mauritius', 'MUS', '480', 'AF'),
('MV', 'Maldives', 'Republic of Maldives', 'MDV', '462', 'AS'),
('MW', 'Malawi', 'Republic of Malawi', 'MWI', '454', 'AF'),
('MX', 'Mexico', 'United Mexican States', 'MEX', '484', 'NA'),
('MY', 'Malaysia', 'Malaysia', 'MYS', '458', 'AS'),
('MZ', 'Mozambique', 'Republic of Mozambique', 'MOZ', '508', 'AF'),
('NA', 'Namibia', 'Republic of Namibia', 'NAM', '516', 'AF'),
('NC', 'New Caledonia', 'New Caledonia', 'NCL', '540', 'OC'),
('NE', 'Niger', 'Republic of Niger', 'NER', '562', 'AF'),
('NF', 'Norfolk Island', 'Norfolk Island', 'NFK', '574', 'OC'),
('NG', 'Nigeria', 'Federal Republic of Nigeria', 'NGA', '566', 'AF'),
('NI', 'Nicaragua', 'Republic of Nicaragua', 'NIC', '558', 'NA'),
('NL', 'Netherlands', 'Kingdom of the Netherlands', 'NLD', '528', 'EU'),
('NO', 'Norway', 'Kingdom of Norway', 'NOR', '578', 'EU'),
('NP', 'Nepal', 'Nepal', 'NPL', '524', 'AS'),
('NR', 'Nauru', 'Republic of Nauru', 'NRU', '520', 'OC'),
('NU', 'Niue', 'Niue', 'NIU', '570', 'OC'),
('NZ', 'New Zealand', 'New Zealand', 'NZL', '554', 'OC'),
('OM', 'Oman', 'Sultanate of Oman', 'OMN', '512', 'AS'),
('PA', 'Panama', 'Republic of Panama', 'PAN', '591', 'NA'),
('PE', 'Peru', 'Republic of Peru', 'PER', '604', 'SA'),
('PF', 'French Polynesia', 'French Polynesia', 'PYF', '258', 'OC'),
('PG', 'Papua New Guinea', 'Independent State of Papua New Guinea', 'PNG', '598', 'OC'),
('PH', 'Philippines', 'Republic of the Philippines', 'PHL', '608', 'AS'),
('PK', 'Pakistan', 'Islamic Republic of Pakistan', 'PAK', '586', 'AS'),
('PL', 'Poland', 'Republic of Poland', 'POL', '616', 'EU'),
('PM', 'Saint Pierre and Miquelon', 'Saint Pierre and Miquelon', 'SPM', '666', 'NA'),
('PN', 'Pitcairn Islands', 'Pitcairn Islands', 'PCN', '612', 'OC'),
('PR', 'Puerto Rico', 'Commonwealth of Puerto Rico', 'PRI', '630', 'NA'),
('PS', 'Palestine', 'State of Palestine', 'PSE', '275', 'AS'),
('PT', 'Portugal', 'Portuguese Republic', 'PRT', '620', 'EU'),
('PW', 'Palau', 'Republic of Palau', 'PLW', '585', 'OC'),
('PY', 'Paraguay', 'Republic of Paraguay', 'PRY', '600', 'SA'),
('QA', 'Qatar', 'State of Qatar', 'QAT', '634', 'AS'),
('RE', 'R�union', 'R�union', 'REU', '638', 'AF'),
('RO', 'Romania', 'Romania', 'ROU', '642', 'EU'),
('RS', 'Serbia', 'Republic of Serbia', 'SRB', '688', 'EU'),
('RU', 'Russian Federation', 'Russian Federation', 'RUS', '643', 'EU'),
('RW', 'Rwanda', 'Republic of Rwanda', 'RWA', '646', 'AF'),
('SA', 'Saudi Arabia', 'Kingdom of Saudi Arabia', 'SAU', '682', 'AS'),
('SB', 'Solomon Islands', 'Solomon Islands', 'SLB', '090', 'OC'),
('SC', 'Seychelles', 'Republic of Seychelles', 'SYC', '690', 'AF'),
('SD', 'Sudan', 'Republic of Sudan', 'SDN', '729', 'AF'),
('SE', 'Sweden', 'Kingdom of Sweden', 'SWE', '752', 'EU'),
('SG', 'Singapore', 'Republic of Singapore', 'SGP', '702', 'AS'),
('SH', 'Saint Helena, Ascension and Tristan da Cunha', 'Saint Helena, Ascension and Tristan da Cunha', 'SHN', '654', 'AF'),
('SI', 'Slovenia', 'Republic of Slovenia', 'SVN', '705', 'EU'),
('SJ', 'Svalbard & Jan Mayen Islands', 'Svalbard & Jan Mayen Islands', 'SJM', '744', 'EU'),
('SK', 'Slovakia (Slovak Republic)', 'Slovakia (Slovak Republic)', 'SVK', '703', 'EU'),
('SL', 'Sierra Leone', 'Republic of Sierra Leone', 'SLE', '694', 'AF'),
('SM', 'San Marino', 'Republic of San Marino', 'SMR', '674', 'EU'),
('SN', 'Senegal', 'Republic of Senegal', 'SEN', '686', 'AF'),
('SO', 'Somalia', 'Federal Republic of Somalia', 'SOM', '706', 'AF'),
('SR', 'Suriname', 'Republic of Suriname', 'SUR', '740', 'SA'),
('SS', 'South Sudan', 'Republic of South Sudan', 'SSD', '728', 'AF'),
('ST', 'Sao Tome and Principe', 'Democratic Republic of Sao Tome and Principe', 'STP', '678', 'AF'),
('SV', 'El Salvador', 'Republic of El Salvador', 'SLV', '222', 'NA'),
('SX', 'Sint Maarten (Dutch part)', 'Sint Maarten (Dutch part)', 'SXM', '534', 'NA'),
('SY', 'Syrian Arab Republic', 'Syrian Arab Republic', 'SYR', '760', 'AS'),
('SZ', 'Eswatini', 'Kingdom of Eswatini', 'SWZ', '748', 'AF'),
('TC', 'Turks and Caicos Islands', 'Turks and Caicos Islands', 'TCA', '796', 'NA'),
('TD', 'Chad', 'Republic of Chad', 'TCD', '148', 'AF'),
('TF', 'French Southern Territories', 'French Southern Territories', 'ATF', '260', 'AN'),
('TG', 'Togo', 'Togolese Republic', 'TGO', '768', 'AF'),
('TH', 'Thailand', 'Kingdom of Thailand', 'THA', '764', 'AS'),
('TJ', 'Tajikistan', 'Republic of Tajikistan', 'TJK', '762', 'AS'),
('TK', 'Tokelau', 'Tokelau', 'TKL', '772', 'OC'),
('TL', 'Timor-Leste', 'Democratic Republic of Timor-Leste', 'TLS', '626', 'AS'),
('TM', 'Turkmenistan', 'Turkmenistan', 'TKM', '795', 'AS'),
('TN', 'Tunisia', 'Tunisian Republic', 'TUN', '788', 'AF'),
('TO', 'Tonga', 'Kingdom of Tonga', 'TON', '776', 'OC'),
('TR', 'T�rkiye', 'Republic of T�rkiye', 'TUR', '792', 'AS'),
('TT', 'Trinidad and Tobago', 'Republic of Trinidad and Tobago', 'TTO', '780', 'NA'),
('TV', 'Tuvalu', 'Tuvalu', 'TUV', '798', 'OC'),
('TW', 'Taiwan', 'Taiwan, Province of China', 'TWN', '158', 'AS'),
('TZ', 'Tanzania', 'United Republic of Tanzania', 'TZA', '834', 'AF'),
('UA', 'Ukraine', 'Ukraine', 'UKR', '804', 'EU'),
('UG', 'Uganda', 'Republic of Uganda', 'UGA', '800', 'AF'),
('UM', 'United States Minor Outlying Islands', 'United States Minor Outlying Islands', 'UMI', '581', 'OC'),
('US', 'United States of America', 'United States of America', 'USA', '840', 'NA'),
('UY', 'Uruguay', 'Eastern Republic of Uruguay', 'URY', '858', 'SA'),
('UZ', 'Uzbekistan', 'Republic of Uzbekistan', 'UZB', '860', 'AS'),
('VA', 'Holy See (Vatican City State)', 'Holy See (Vatican City State)', 'VAT', '336', 'EU'),
('VC', 'Saint Vincent and the Grenadines', 'Saint Vincent and the Grenadines', 'VCT', '670', 'NA'),
('VE', 'Venezuela', 'Bolivarian Republic of Venezuela', 'VEN', '862', 'SA'),
('VG', 'British Virgin Islands', 'British Virgin Islands', 'VGB', '092', 'NA'),
('VI', 'United States Virgin Islands', 'United States Virgin Islands', 'VIR', '850', 'NA'),
('VN', 'Vietnam', 'Socialist Republic of Vietnam', 'VNM', '704', 'AS'),
('VU', 'Vanuatu', 'Republic of Vanuatu', 'VUT', '548', 'OC'),
('WF', 'Wallis and Futuna', 'Wallis and Futuna', 'WLF', '876', 'OC'),
('WS', 'Samoa', 'Independent State of Samoa', 'WSM', '882', 'OC'),
('YE', 'Yemen', 'Yemen', 'YEM', '887', 'AS'),
('YT', 'Mayotte', 'Mayotte', 'MYT', '175', 'AF'),
('ZA', 'South Africa', 'Republic of South Africa', 'ZAF', '710', 'AF'),
('ZM', 'Zambia', 'Republic of Zambia', 'ZMB', '894', 'AF'),
('ZW', 'Zimbabwe', 'Republic of Zimbabwe', 'ZWE', '716', 'AF');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `email`, `password`) VALUES
('083fb78fe99d91ec891dc97e2ac10f14', 'admin@tst-ticket.anastasia', '499de4ba50697d484d8e4de59a32c3bb'),
('1', 'admin@onlyflights.18s', '482c811da5d5b4bc6d497ffa98491e38');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `id` varchar(255) NOT NULL,
  `origin_id` char(3) DEFAULT NULL,
  `destination_id` char(3) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `schedule` datetime DEFAULT NULL,
  `duration` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`id`, `origin_id`, `destination_id`, `price`, `capacity`, `schedule`, `duration`) VALUES
('OF-001', 'CGK', 'HLP', 500000, 150, '2023-12-17 08:00:00', '01:00:00'),
('OF-002', 'HLP', 'CGK', 500000, 150, '2023-12-17 09:00:00', '01:00:00'),
('OF-003', 'CGK', 'DPS', 1000000, 150, '2023-12-17 10:00:00', '02:00:00'),
('OF-004', 'DPS', 'CGK', 1000000, 150, '2023-12-17 11:00:00', '02:00:00'),
('OF-005', 'CGK', 'SUB', 1500000, 150, '2023-12-17 12:00:00', '02:00:00'),
('OF-006', 'SUB', 'CGK', 1500000, 150, '2023-12-17 13:00:00', '02:00:00'),
('OF-007', 'CGK', 'BDO', 2000000, 150, '2023-12-17 14:00:00', '02:00:00'),
('OF-008', 'BDO', 'CGK', 2000000, 150, '2023-12-17 15:00:00', '02:00:00'),
('OF-009', 'CGK', 'SRG', 2500000, 150, '2023-12-17 16:00:00', '02:00:00'),
('OF-010', 'SRG', 'CGK', 2500000, 150, '2023-12-17 17:00:00', '02:00:00'),
('OF-011', 'CGK', 'KNO', 3000000, 150, '2023-12-17 18:00:00', '02:00:00'),
('OF-012', 'KNO', 'CGK', 3000000, 150, '2023-12-17 19:00:00', '02:00:00'),
('OF-013', 'CGK', 'MES', 3500000, 150, '2023-12-17 20:00:00', '02:00:00'),
('OF-014', 'MES', 'CGK', 3500000, 150, '2023-12-17 21:00:00', '02:00:00'),
('OF-015', 'CGK', 'PLM', 4000000, 150, '2023-12-17 22:00:00', '02:00:00'),
('OF-016', 'PLM', 'CGK', 4000000, 150, '2023-12-17 23:00:00', '02:00:00'),
('OF-017', 'CGK', 'PNK', 4500000, 150, '2023-12-17 00:00:00', '02:00:00'),
('OF-018', 'PNK', 'CGK', 4500000, 150, '2023-12-17 01:00:00', '02:00:00'),
('OF-019', 'CGK', 'BPN', 5000000, 150, '2023-12-17 02:00:00', '02:00:00'),
('OF-020', 'BPN', 'CGK', 5000000, 150, '2023-12-17 03:00:00', '02:00:00'),
('OF-021', 'CGK', 'MDC', 5500000, 150, '2023-12-17 04:00:00', '02:00:00'),
('OF-022', 'MDC', 'CGK', 5500000, 150, '2023-12-17 05:00:00', '02:00:00'),
('OF-023', 'CGK', 'UPG', 6000000, 150, '2023-12-17 06:00:00', '02:00:00'),
('OF-024', 'UPG', 'CGK', 6000000, 150, '2023-12-17 07:00:00', '02:00:00'),
('OF-025', 'CGK', 'LOP', 6500000, 150, '2023-12-17 08:00:00', '02:00:00'),
('OF-026', 'LOP', 'CGK', 6500000, 150, '2023-12-17 09:00:00', '02:00:00'),
('OF-027', 'CGK', 'JOG', 7000000, 150, '2023-12-17 10:00:00', '02:00:00'),
('OF-028', 'JOG', 'CGK', 7000000, 150, '2023-12-17 11:00:00', '02:00:00'),
('OF-029', 'CGK', 'SRG', 7500000, 150, '2023-12-17 12:00:00', '02:00:00'),
('OF-030', 'SRG', 'CGK', 7500000, 150, '2023-12-17 13:00:00', '02:00:00'),
('OF-031', 'CGK', 'SOC', 8000000, 150, '2023-12-17 14:00:00', '02:00:00'),
('OF-032', 'SOC', 'CGK', 8000000, 150, '2023-12-17 15:00:00', '02:00:00'),
('OF-033', 'CGK', 'BTH', 8500000, 150, '2023-12-17 16:00:00', '02:00:00'),
('OF-034', 'SUB', 'BDO', 700000, 10, '2023-12-20 20:23:00', '02:00:00'),
('OF-123', 'BDO', 'BPN', 750000, 10, '2023-12-30 13:44:00', '02:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`iata`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`pnr`),
  ADD KEY `flight_id` (`flight_id`);

--
-- Indexes for table `continents`
--
ALTER TABLE `continents`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`code`),
  ADD KEY `continent_code` (`continent_code`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`id`),
  ADD KEY `origin_id` (`origin_id`),
  ADD KEY `destination_id` (`destination_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `airport`
--
ALTER TABLE `airport`
  ADD CONSTRAINT `airport_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`code`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`id`);

--
-- Constraints for table `countries`
--
ALTER TABLE `countries`
  ADD CONSTRAINT `fk_countries_continents` FOREIGN KEY (`continent_code`) REFERENCES `continents` (`code`);

--
-- Constraints for table `flight`
--
ALTER TABLE `flight`
  ADD CONSTRAINT `flight_ibfk_1` FOREIGN KEY (`origin_id`) REFERENCES `airport` (`iata`),
  ADD CONSTRAINT `flight_ibfk_2` FOREIGN KEY (`destination_id`) REFERENCES `airport` (`iata`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
