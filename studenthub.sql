-- phpMyAdmin SQL Dump
-- version 4.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2015 at 11:21 AM
-- Server version: 5.6.22
-- PHP Version: 5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `studenthub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `admin_auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `admin_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `admin_password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_auth_key`, `admin_password_hash`, `admin_password_reset_token`, `admin_datetime`) VALUES
(3, 'Khalid', 'khalid@bawes.net', 'CT7I0NqtWqYJD1idnQbf1ErsCf_IEfHi', '$2y$13$19xvlFkaK.V35y98MhDjP.FSJLSZpJGXN3YUzY9i6OE0IjSRIbuui', '25bm_z6lZ_VGLlwPCxyMMgg0z2ixFKZb_1428396173', '2015-04-07 09:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) unsigned NOT NULL,
  `country_id` int(11) unsigned NOT NULL,
  `city_name_en` varchar(255) NOT NULL,
  `city_name_ar` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `country_id`, `city_name_en`, `city_name_ar`) VALUES
(1, 84, 'Kuwait City', 'مدينة الكويت'),
(2, 84, 'Dasmān', 'دسمان'),
(3, 84, 'Sharq', 'شرق'),
(4, 84, 'Dasma', 'الدسمة'),
(5, 84, 'Da''iya', 'الدعية'),
(6, 84, 'Sawābir', 'الصوابر'),
(7, 84, 'Mirgāb', 'المرقاب'),
(8, 84, 'Jibla', 'قبلة'),
(9, 84, 'Salhiya', 'الصالحية'),
(10, 84, 'Bneid il-Gār', 'بنيد القار'),
(11, 84, 'Keifan', 'كيفان'),
(12, 84, 'Mansūriya', 'المنصورية'),
(13, 84, 'Abdullah as-Salim suburb', 'ضاحية عبد الله السالم'),
(14, 84, 'Nuzha', 'النزهة'),
(15, 84, 'Faiha''', 'الفيحاء'),
(16, 84, 'Shamiya', 'الشامية'),
(17, 84, 'Rawda', 'الروضة'),
(18, 84, 'Adiliya', 'النزهة'),
(19, 84, 'Khaldiya', 'الخالدية'),
(20, 84, 'Qadsiya', 'القادسية'),
(21, 84, 'Qurtuba', 'قرطبة'),
(22, 84, 'Surra', 'السرة'),
(23, 84, 'Yarmūk', 'اليرموك'),
(24, 84, 'Shuwaikh', 'الشويخ'),
(25, 84, 'Rai', 'الري'),
(26, 84, 'Ghirnata', 'غرناطة'),
(27, 84, 'Sulaibikhat', 'الصليبخات'),
(28, 84, 'Doha', 'الدوحة'),
(29, 84, 'Nahdha', 'النهضة'),
(30, 84, 'Jabir al-Ahmad City', 'مدينة جابر الأحمد'),
(31, 84, 'Qairawān', 'القيروان'),
(32, 84, 'Ahmadi', 'الأحمدي'),
(33, 84, 'Aqila', 'العقيلة'),
(34, 84, 'Zuhar', 'الظهر'),
(35, 84, 'Miqwa''', 'المقوع'),
(36, 84, 'Mahbula', 'المهبولة'),
(37, 84, 'Rigga', 'الرقة'),
(38, 84, 'Hadiya', 'هدية'),
(39, 84, 'Abu Hulaifa', 'أبو حليفة'),
(40, 84, 'Sabahiya', 'الصباحية'),
(41, 84, 'Mangaf', 'المنقف'),
(42, 84, 'Fahaheel', 'الفحيحيل'),
(43, 84, 'Wafra', 'الوفرة'),
(44, 84, 'Zoor', 'الزور'),
(45, 84, 'Khairan', 'الخيران'),
(46, 84, 'Abdullah Port', 'ميناء عبد الله'),
(47, 84, 'Agricultural Wafra', 'الوفرة الزراعية'),
(48, 84, 'Bneidar', 'بتيدر'),
(49, 84, 'Jilei''a', 'الجليعة'),
(50, 84, 'Jabir al-Ali Suburb', 'ضاحية جابر العلي'),
(51, 84, 'Fahd al-Ahmad Suburb', 'ضاحية فهد الأحمد'),
(52, 84, 'Shu''aiba', 'الشعيبة'),
(53, 84, 'Sabah al-Ahmad City', 'مدينة صباح الأحمد'),
(54, 84, 'Nuwaiseeb', 'النويصيب'),
(55, 84, 'Khairan City', 'مدينة الخيران'),
(56, 84, 'Ali as-Salim suburb', 'ضاحية علي صباح السالم'),
(57, 84, 'Sabah al-Ahmad Nautical City', 'مدينة صباح الأحمد البحرية'),
(58, 84, 'Hawally', 'حولي'),
(59, 84, 'Rumaithiya', 'الرميثية'),
(60, 84, 'Jabriya', 'الجابرية'),
(61, 84, 'Salmiya', 'السالمية'),
(62, 84, 'Mishrif', 'مشرف'),
(63, 84, 'Sha''ab', 'الشعب'),
(64, 84, 'Bayān', 'بيان'),
(65, 84, 'Bi''di''', 'البدع'),
(66, 84, 'Nigra', 'النقرة'),
(67, 84, 'Salwa', 'سلوى'),
(68, 84, 'Maidan Hawalli', 'ميدان حولي'),
(69, 84, 'Mubarak aj-Jabir suburb', 'ضاحية مبارك الجابر'),
(70, 84, 'South Surra', 'جنوب السرة'),
(71, 84, 'Hittin', 'حطين'),
(72, 84, 'Mubarak al-Kabeer', 'مبارك الكبير'),
(73, 84, 'Adān', 'العدان'),
(74, 84, 'Qurain', 'القرين'),
(75, 84, 'Qusūr', 'القصور'),
(76, 84, 'Sabah as-Salim suburb', 'ضاحية صباح السالم'),
(77, 84, 'Misīla', 'المسيلة'),
(78, 84, 'Abu ''Fteira', 'أبو فطيرة'),
(79, 84, 'Sabhān', 'صبحان'),
(80, 84, 'Fintās', 'الفنطاس'),
(81, 84, 'Funaitīs', 'الفنيطيس');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) unsigned NOT NULL,
  `country_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `country_name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `country_nationality_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `country_nationality_name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name_en`, `country_name_ar`, `country_nationality_name_en`, `country_nationality_name_ar`) VALUES
(1, 'Afghanistan', 'أفغانستان', 'Afghan', 'الأفغاني'),
(2, 'Albania', 'ألبانيا', 'Albanian', 'الألبانية'),
(3, 'Algeria', 'الجزائر', 'Algerian', 'جزائري'),
(4, 'Andorra', 'أندورا', 'Andorran', 'أندورا'),
(5, 'Angola', 'أنغولا', 'Angolan', 'الأنغولية'),
(6, 'Argentina', 'الأرجنتين', 'Argentinian', 'الأرجنتيني'),
(7, 'Armenia', 'أرمينيا', 'Armenian', 'الأرميني'),
(8, 'Australia', 'أستراليا', 'Australian', 'الأسترالي'),
(9, 'Austria', 'النمسا', 'Austrian', 'النمساوي'),
(10, 'Azerbaijan', 'أذربيجان', 'Azerbaijani', 'أذربيجان'),
(11, 'Bahamas', 'جزر البهاما', 'Bahamian', 'جزر البهاما'),
(12, 'Bahrain', 'مملكة البحرين', 'Bahraini', 'البحريني'),
(13, 'Bangladesh', 'بنغلاديش', 'Bangladeshi', 'بنجلاديش'),
(14, 'Barbados', 'بربادوس', 'Barbadian', 'باربادوسي'),
(15, 'Belarus', 'روسيا البيضاء', 'Belarusian', 'البيلاروسية'),
(16, 'Belgium', 'بلجيكا', 'Belgian', 'بلجيكي'),
(17, 'Belize', 'بليز', 'Belizean', 'بليز'),
(18, 'Benin', 'بنين', 'Beninese', 'بنين'),
(19, 'Bhutan', 'بوتان', 'Bhutanese', 'بوتان'),
(20, 'Bolivia', 'بوليفيا', 'Bolivian', 'بوليفي'),
(21, 'Bosnia-Herzegovina', 'البوسنة والهرسك', 'Bosnian', 'البوسنية'),
(22, 'Botswana', 'بوتسوانا', 'Botswanan', 'بوتسوانا'),
(23, 'Brazil', 'من البرازيل', 'Brazilian', 'برازيلي'),
(24, 'Britain', 'بريطانيا', 'British', 'البريطانيون'),
(25, 'Brunei', 'بروناي', 'Bruneian', 'بروناى'),
(26, 'Bulgaria', 'بلغاريا', 'Bulgarian', 'البلغارية'),
(27, 'Burkina', 'فاسو', 'Burkinese', 'البوركينية'),
(28, 'Burma (official name Myanmar)', 'بورما (الاسم الرسمي ميانمار)', 'Burmese', 'البورمي'),
(29, 'Burundi', 'بوروندي', 'Burundian', 'بوروندي'),
(30, 'Cambodia', 'كمبوديا', 'Cambodian', 'كمبوديا'),
(31, 'Cameroon', 'الكاميرون', 'Cameroonian', 'الكاميروني'),
(32, 'Canada', 'كندا', 'Canadian', 'الكندية'),
(33, 'Cape Verde Islands', 'جزر الرأس الأخضر', 'Cape Verdean', 'الرأس الأخضر'),
(34, 'Chad', 'تشاد', 'Chadian', 'التشادية'),
(35, 'Chile', 'تشيلي', 'Chilean', 'شيلي'),
(36, 'China', 'الصين', 'Chinese', 'الصينية'),
(37, 'Colombia', 'كولومبيا', 'Colombian', 'كولومبي'),
(38, 'Congo', 'الكونغو', 'Congolese', 'الكونغوليين'),
(39, 'Costa Rica', 'كوستا ريكا', 'Costa Rican', 'كوستاريكا'),
(40, 'Croatia', 'كرواتيا', 'Croat', 'الكرواتي'),
(41, 'Cuba', 'كوبا', 'Cuban', 'الكوبية'),
(42, 'Cyprus', 'قبرص', 'Cypriot', 'القبرصي'),
(43, 'Czech Republic', 'جمهورية التشيك', 'Czech', 'تشيكي'),
(44, 'Denmark', 'الدنمارك', 'Danish', 'دانماركي'),
(45, 'Djibouti', 'جيبوتي', 'Djiboutian', 'جيبوتي'),
(46, 'Dominica', 'دومينيكا', 'Dominican', 'الدومينيكان'),
(47, 'Dominican Republic', 'جمهورية الدومينيكان', 'Dominican', 'الدومينيكان'),
(48, 'Ecuador', 'الإكوادور', 'Ecuadorean', 'الاكوادور'),
(49, 'Egypt', 'مصر', 'Egyptian', 'مصري'),
(50, 'El Salvador', 'السلفادور', 'Salvadorean', 'السلفادورية'),
(51, 'England', 'انجلترا', 'English', 'اللغة الانكليزية'),
(52, 'Eritrea', 'إريتريا', 'Eritrean', 'الإريترية'),
(53, 'Estonia', 'استونيا', 'Estonian', 'الإستونية'),
(54, 'Ethiopia', 'أثيوبيا', 'Ethiopian', 'حبشي'),
(55, 'Fiji', 'فيجي', 'Fijian', 'الفيجية'),
(56, 'Finland', 'فنلندا', 'Finnish', 'اللغة الفنلندية'),
(57, 'France', 'فرنسا', 'French', 'لغة فرنسية'),
(58, 'Gabon', 'الغابون', 'Gabonese', 'الجابون'),
(59, 'Gambia, the', 'غامبيا، ل', 'Gambian', 'غامبي'),
(60, 'Georgia', 'جورجيا', 'Georgian', 'الجورجية'),
(61, 'Germany', 'ألمانيا', 'German', 'ألماني'),
(62, 'Ghana', 'غانا', 'Ghanaian', 'الغاني'),
(63, 'Greece', 'يونان', 'Greek', 'اللغة اليونانية'),
(64, 'Grenada', 'غرينادا', 'Grenadian', 'جرينادا'),
(65, 'Guatemala', 'غواتيمالا', 'Guatemalan', 'غواتيمالا'),
(66, 'Guinea', 'غينيا', 'Guinean', 'الغينية'),
(67, 'Guyana', 'غيانا', 'Guyanese', 'جويانا'),
(68, 'Haiti', 'هايتي', 'Haitian', 'هايتي'),
(69, 'Holland (also Netherlands)', 'هولندا (هولندا أيضا)', 'Dutch', 'اللغة الهولندية'),
(70, 'Honduras', 'هندوراس', 'Honduran', 'هندوراس'),
(71, 'Hungary', 'هنغاريا', 'Hungarian', 'الهنغارية'),
(72, 'Iceland', 'أيسلندا', 'Icelandic', 'أيسلندي'),
(73, 'India', 'الهند', 'Indian', 'هندي'),
(74, 'Indonesia', 'أندونيسيا', 'Indonesian', 'الأندونيسية'),
(75, 'Iran', 'إيران', 'Iranian', 'إيراني'),
(76, 'Iraq', 'العراق', 'Iraqi', 'عراقي'),
(77, 'Ireland, Republic of', 'ايرلندا، جمهورية', 'Irish', 'الإيرلنديون'),
(78, 'Italy', 'إيطاليا', 'Italian', 'الإيطالي'),
(79, 'Jamaica', 'جامايكا', 'Jamaican', 'الجامايكي'),
(80, 'Japan', 'اليابان', 'Japanese', 'اللغة اليابانية'),
(81, 'Jordan', 'الأردن', 'Jordanian', 'أردني'),
(82, 'Kazakhstan', 'كازاخستان', 'Kazakh', 'الكازاخستاني'),
(83, 'Kenya', 'كينيا', 'Kenyan', 'الكيني'),
(84, 'Kuwait', 'مدينة الكويت', 'Kuwaiti', 'كويتي'),
(85, 'Laos', 'لاوس', 'Laotian', 'اللاوسي'),
(86, 'Latvia', 'لاتفيا', 'Latvian', 'اللاتفية'),
(87, 'Lebanon', 'لبنان', 'Lebanese', 'لبناني'),
(88, 'Liberia', 'ليبيريا', 'Liberian', 'ليبيريا'),
(89, 'Libya', 'ليبيا', 'Libyan', 'ليبي'),
(90, 'Liechtenstein', 'ليختنشتاين', '-', '-'),
(91, 'Lithuania', 'ليتوانيا', 'Lithuanian', 'اللتوانية'),
(92, 'Luxembourg', 'لوكسمبورغ', '-', '-'),
(93, 'Macedonia', 'مقدونيا', 'Macedonian', 'المقدونية'),
(94, 'Madagascar', 'مدغشقر', 'Madagascan', 'مدغشقر'),
(95, 'Malawi', 'ملاوي', 'Malawian', 'مالاوى'),
(96, 'Malaysia', 'ماليزيا', 'Malaysian', 'الماليزي'),
(97, 'Maldives', 'جزر المالديف', 'Maldivian', 'المالديف'),
(98, 'Mali', 'مالي', 'Malian', 'مالي'),
(99, 'Malta', 'مالطا', 'Maltese', 'المالطية'),
(100, 'Mauritania', 'موريتانيا', 'Mauritanian', 'الموريتاني'),
(101, 'Mauritius', 'موريشيوس', 'Mauritian', 'موريشيوس'),
(102, 'Mexico', 'المكسيك', 'Mexican', 'المكسيكي'),
(103, 'Moldova', 'مولدوفا', 'Moldovan', 'مولدوفا'),
(104, 'Monaco', 'موناكو', 'Monacan', 'موناكو'),
(105, 'Mongolia', 'منغوليا', 'Mongolian', 'المنغولية'),
(106, 'Montenegro', 'الجبل الأسود', 'Montenegrin', 'الجبل الأسود'),
(107, 'Morocco', 'بلاد المغرب', 'Moroccan', 'مغربي'),
(108, 'Mozambique', 'موزمبيق', 'Mozambican', 'موزمبيق'),
(109, 'Myanmar see Burma', 'ميانمار نرى بورما', '-', '-'),
(110, 'Namibia', 'ناميبيا', 'Namibian', 'الناميبي'),
(111, 'Nepal', 'نيبال', 'Nepalese', 'النيبالي'),
(112, 'Netherlands, the (see Holland)', 'هولندا، و(انظر هولندا)', 'Dutch', 'اللغة الهولندية'),
(113, 'New Zealand', 'نيوزيلندا', 'New Zealand', 'نيوزيلندا'),
(114, 'Nicaragua', 'نيكاراغوا', 'Nicaraguan', 'نيكاراغوا'),
(115, 'Niger', 'النيجر', 'Nigerien', 'النيجر'),
(116, 'Nigeria', 'نيجيريا', 'Nigerian', 'النيجيري'),
(117, 'North Korea', 'كوريا الشمالية', 'North Korean', 'كوريا الشمالية'),
(118, 'Norway', 'النرويج', 'Norwegian', 'النرويجية'),
(119, 'Oman', 'يا شيخ', 'Omani', 'العماني'),
(120, 'Pakistan', 'باكستان', 'Pakistani', 'باكستاني'),
(121, 'Panama', 'بناما', 'Panamanian', 'بنمية'),
(122, 'Papua New Guinea', 'بابوا غينيا الجديدة', 'Guinean', 'الغينية'),
(123, 'Paraguay', 'باراغواي', 'Paraguayan', 'باراغواي'),
(124, 'Peru', 'بيرو', 'Peruvian', 'بيرو'),
(125, 'the Philippines', 'الفلبين', 'Philippine', 'الفلبين'),
(126, 'Poland', 'بولندا', 'Polish', 'البولندية'),
(127, 'Portugal', 'البرتغال', 'Portuguese', 'اللغة البرتغالية'),
(128, 'Qatar', 'دولة قطر', 'Qatari', 'قطري'),
(129, 'Romania', 'رومانيا', 'Romanian', 'الرومانية'),
(130, 'Russia', 'روسيا', 'Russian', 'الروسية'),
(131, 'Rwanda', 'رواندا', 'Rwandan', 'رواندا'),
(132, 'Saudi Arabia', 'المملكة العربية السعودية', 'Saudi', 'سعودي'),
(133, 'Scotland', 'أسكتلندا', 'Scottish', 'الاسكتلندي'),
(134, 'Senegal', 'السنغال', 'Senegalese', 'سنغالي'),
(135, 'Serbia', 'صربيا', 'Serb or Serbian', 'الصربية أو الصربية'),
(136, 'Seychelles, the', 'سيشيل، ل', 'Seychellois', 'سيشل'),
(137, 'Sierra Leone', 'سيرا ليون', 'Sierra Leonian', 'السيراليوني'),
(138, 'Singapore', 'سنغافورة', 'Singaporean', 'سنغافورة'),
(139, 'Slovakia', 'سلوفاكيا', 'Slovak', 'السلوفاكية'),
(140, 'Slovenia', 'سلوفينيا', 'Slovenian', 'سلوفيني'),
(141, 'Solomon Islands', 'جزر سليمان', '-', '-'),
(142, 'Somalia', 'الصومال', 'Somali', 'الصومالية'),
(143, 'South Africa', 'جنوب أفريقيا', 'South African', 'جنوب أفريقيا'),
(144, 'South Korea', 'كوريا الجنوبية', 'South Korean', 'كوريا الجنوبية'),
(145, 'Spain', 'إسبانيا', 'Spanish', 'اللغة الاسبانية'),
(146, 'Sri Lanka', 'سيريلانكا', 'Sri Lankan', 'سري لانكا'),
(147, 'Sudan', 'سودان', 'Sudanese', 'سوداني'),
(148, 'Suriname', 'سورينام', 'Surinamese', 'سورينامي'),
(149, 'Swaziland', 'سوازيلاند', 'Swazi', 'سوازي'),
(150, 'Sweden', 'السويد', 'Swedish', 'اللغة السويدية'),
(151, 'Switzerland', 'سويسرا', 'Swiss', 'سويسري'),
(152, 'Syria', 'سوريا', 'Syrian', 'سوري'),
(153, 'Taiwan', 'تايوان', 'Taiwanese', 'تايوانية'),
(154, 'Tajikistan', 'طاجيكستان', 'Tadjik', 'الطاجيك'),
(155, 'Tanzania', 'تنزانيا', 'Tanzanian', 'تنزانية'),
(156, 'Thailand', 'تايلاند', 'Thai', 'التايلاندية'),
(157, 'Togo', 'توغو', 'Togolese', 'توغو'),
(158, 'Trinidad and Tobago', 'ترينداد وتوباغو', 'Trinidadian', 'ترينيداد'),
(159, 'Tobagonian', 'Tobagonian', 'Trinidadian', 'ترينيداد'),
(160, 'Tunisia', 'تونس', 'Tunisian', 'التونسية'),
(161, 'Turkey', 'الديك الرومي', 'Turkish', 'اللغة التركية'),
(162, 'Turkmenistan', 'تركمانستان', 'Turkmen', 'التركمان'),
(163, 'Tuvalu', 'توفالو', 'Tuvaluan', 'التوفالية'),
(164, 'Uganda', 'أوغندا', 'Ugandan', 'الأوغندي'),
(165, 'Ukraine', 'أوكرانيا', 'Ukrainian', 'الأوكراني'),
(166, 'United Arab Emirates (UAE)', 'الإمارات العربية المتحدة (UAE)', 'Emirati', 'الإماراتي'),
(167, 'United Kingdom (UK)', 'المملكة المتحدة (UK)', 'British', 'البريطانيون'),
(168, 'United States of America (USA)', 'الولايات المتحدة الأمريكية (USA)', 'US', 'الولايات المتحدة'),
(169, 'Uruguay', 'أوروغواي', 'Uruguayan', 'عرفي'),
(170, 'Uzbekistan', 'أوزبكستان', 'Uzbek', 'الأوزبكي'),
(171, 'Vanuatu', 'فانواتو', 'Vanuatuan', 'فانواتو'),
(172, 'Vatican City', 'مدينة الفاتيكان', '-', '-'),
(173, 'Venezuela', 'فنزويلا', 'Venezuelan', 'الفنزويلي'),
(174, 'Vietnam', 'فيتنام', 'Vietnamese', 'الفيتنامية'),
(175, 'Wales', 'ويلز', 'Welsh', 'ويلزي'),
(176, 'Western Samoa', 'ساموا الغربية', 'Western Samoan', 'الغربية ساموا'),
(177, 'Yemen', 'يمني', 'Yemeni', 'يمني'),
(178, 'Yugoslavia', 'يوغوسلافيا', 'Yugoslav', 'اليوغوسلافية'),
(179, 'Zaire', 'زائير', 'Zaïrean', 'زائير'),
(180, 'Zambia', 'زامبيا', 'Zambian', 'زامبيا'),
(181, 'Zimbabwe', 'زيمبابوي', 'Zimbabwean', 'زيمبابوي');

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE IF NOT EXISTS `degree` (
  `degree_id` int(11) unsigned NOT NULL,
  `degree_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `degree_name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`degree_id`, `degree_name_en`, `degree_name_ar`) VALUES
(1, 'Diploma', 'شهادة دبلوم'),
(2, 'Bachelor', 'البكالوريوس'),
(3, 'Masters', 'الماجستير'),
(4, 'PhD', 'الدكتوراه');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE IF NOT EXISTS `employer` (
  `employer_id` int(11) unsigned NOT NULL,
  `industry_id` int(11) unsigned NOT NULL,
  `city_id` int(11) unsigned NOT NULL,
  `employer_company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `employer_logo` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `employer_background_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `employer_background_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employer_website` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `employer_company_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `employer_num_employees` int(11) NOT NULL,
  `employer_contact_firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employer_contact_lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employer_contact_number` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `employer_credit` decimal(10,0) NOT NULL DEFAULT '0',
  `employer_email_preference` tinyint(4) NOT NULL COMMENT 'Off(0), Daily(1), Weekly(2)',
  `employer_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employer_auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `employer_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `employer_password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `employer_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filter`
--

CREATE TABLE IF NOT EXISTS `filter` (
  `filter_id` int(11) unsigned NOT NULL,
  `job_id` int(11) unsigned NOT NULL,
  `university_id` int(11) unsigned NOT NULL,
  `degree_id` int(11) unsigned NOT NULL,
  `filter_gpa` decimal(10,2) NOT NULL,
  `filter_graduation_year_start` year(4) NOT NULL,
  `filter_graduation_year_end` year(4) NOT NULL,
  `filter_transportation` tinyint(4) NOT NULL COMMENT 'true (1), false (0)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filter_country`
--

CREATE TABLE IF NOT EXISTS `filter_country` (
  `filter_id` int(11) unsigned NOT NULL,
  `country_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filter_language`
--

CREATE TABLE IF NOT EXISTS `filter_language` (
  `filter_id` int(11) unsigned NOT NULL,
  `language_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filter_major`
--

CREATE TABLE IF NOT EXISTS `filter_major` (
  `filter_id` int(11) unsigned NOT NULL,
  `major_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE IF NOT EXISTS `industry` (
  `industry_id` int(11) unsigned NOT NULL,
  `industry_name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `industry_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`industry_id`, `industry_name_ar`, `industry_name_en`) VALUES
(1, 'الزراعة', 'Agriculture'),
(2, 'المحاسبة', 'Accounting'),
(3, 'دعايه واعلان', 'Advertising'),
(4, 'الفضاء', 'Aerospace'),
(5, 'الطائرات', 'Aircraft'),
(6, 'شركة طيران', 'Airline'),
(7, 'ملابس واكسسوارات', 'Apparel & Accessories'),
(8, 'السيارات', 'Automotive'),
(9, 'مصرفي', 'Banking'),
(10, 'إذاعة', 'Broadcasting'),
(11, 'سمسرة', 'Brokerage'),
(12, 'التكنولوجيا الحيوية', 'Biotechnology'),
(13, 'مراكز الاتصال', 'Call Centers'),
(14, 'البضائع المناولة', 'Cargo Handling'),
(15, 'مادة كيميائية', 'Chemical'),
(16, 'حاسب الالي', 'Computer'),
(17, 'الاستشارات', 'Consulting'),
(18, 'منتجات المستهلك', 'Consumer Products'),
(19, 'مواد التجميل', 'Cosmetics'),
(20, 'الدفاع', 'Defense'),
(21, 'المتاجر', 'Department Stores'),
(22, 'تربية وتعليم', 'Education'),
(23, 'إلكترونيات', 'Electronics'),
(24, 'طاقة', 'Energy'),
(25, 'الترفيه والترويح', 'Entertainment & Leisure'),
(26, 'البحث التنفيذي', 'Executive Search'),
(27, 'الخدمات المالية', 'Financial Services'),
(28, 'طعام وشراب', 'Food & Beverage'),
(29, 'بقالة', 'Grocery'),
(30, 'رعاية صحية', 'Health Care'),
(31, 'النشر على شبكة الإنترنت', 'Internet Publishing'),
(32, 'الخدمات المصرفية الاستثمارية', 'Investment Banking'),
(33, 'قانوني', 'Legal'),
(34, 'تصنيع', 'Manufacturing'),
(35, 'الحركة صور والفيديو', 'Motion Picture & Video'),
(36, 'موسيقى', 'Music'),
(37, 'ناشري الصحف', 'Newspaper Publishers'),
(38, 'مزادات على الانترنت', 'Online Auctions'),
(39, 'صناديق التقاعد', 'Pension Funds'),
(40, 'المستحضرات الصيدلانية', 'Pharmaceuticals'),
(41, 'الأسهم الخاصة', 'Private Equity'),
(42, 'نشر', 'Publishing'),
(43, 'العقارات', 'Real Estate'),
(44, 'التجزئة والبيع بالجملة', 'Retail & Wholesale'),
(45, 'الأوراق المالية وتبادل السلع', 'Securities & Commodity Exchanges'),
(46, 'خدمة', 'Service'),
(47, 'الصابون والمنظفات', 'Soap & Detergent'),
(48, 'سوفت وير', 'Software'),
(49, 'الرياضة', 'Sports'),
(50, 'تكنولوجيا', 'Technology'),
(51, 'الاتصالات السلكية و اللاسلكية', 'Telecommunications'),
(52, 'تلفزيون', 'Television'),
(53, 'وسائل النقل', 'Transportation'),
(54, 'النقل بالشاحنات', 'Trucking'),
(55, 'فينشر كابيتال', 'Venture Capital');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `job_id` int(11) unsigned NOT NULL,
  `jobtype_id` int(11) unsigned NOT NULL,
  `employer_id` int(11) unsigned NOT NULL,
  `job_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_pay` tinyint(4) NOT NULL COMMENT 'Pay (1), No Pay (0)',
  `job_startdate` date NOT NULL,
  `job_responsibilites` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_other_quilifications` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_desired_skill` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_compensation` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `job_question_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_question_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_max_applicants` int(11) NOT NULL,
  `job_current_num_applicants` int(11) NOT NULL,
  `job_status` tinyint(4) NOT NULL COMMENT 'close (0), open (1), draft (2)',
  `job_created_datetime` date NOT NULL,
  `job_price_per_applicant` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobtype`
--

CREATE TABLE IF NOT EXISTS `jobtype` (
  `jobtype_id` int(11) unsigned NOT NULL,
  `jobtype_name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jobtype_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `language_id` int(11) unsigned NOT NULL,
  `language_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `language_name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_id`, `language_name_en`, `language_name_ar`) VALUES
(1, 'Abkhaz', 'أبخازيا'),
(2, 'Afar', 'بعيدا'),
(3, 'Afrikaans', 'اللغة الأفريكانية'),
(4, 'Akan', 'اكان'),
(5, 'Albanian', 'الألبانية'),
(6, 'Amharic', 'الأمهرية'),
(7, 'Arabic', 'لغة العربية'),
(8, 'Aragonese', 'أراغون'),
(9, 'Armenian', 'الأرميني'),
(10, 'Assamese', 'الأسامية'),
(11, 'Avaric', 'الأفاريكية'),
(12, 'Avestan', 'الآيسلندية الإيطالية'),
(13, 'Aymara', 'الأيمارا'),
(14, 'Azerbaijani', 'أذربيجان'),
(15, 'Bambara', 'البامبارا'),
(16, 'Bashkir', 'الباشكيرية'),
(17, 'Basque', 'الباسكي'),
(18, 'Belarusian', 'البيلاروسية'),
(19, 'Bengali, Bangla', 'البنغالية، البنغالية'),
(20, 'Bihari', 'بيهاري'),
(21, 'Bislama', 'البيسلامية'),
(22, 'Bosnian', 'البوسنية'),
(23, 'Breton', 'بريتون'),
(24, 'Bulgarian', 'البلغارية'),
(25, 'Burmese', 'البورمي'),
(26, 'Catalan', 'التشيكية'),
(27, 'Chamorro', 'تشامورو'),
(28, 'Chechen', 'الشيشان'),
(29, 'Chichewa, Chewa, Nyanja', 'الشيشيوا، الشيوا، نيانجا'),
(30, 'Chinese', 'الصينية'),
(31, 'Chuvash', 'التشفاش'),
(32, 'Cornish', 'كورنيش'),
(33, 'Corsican', 'الكورسيكية'),
(34, 'Cree', 'كري'),
(35, 'Croatian', 'الكرواتية'),
(36, 'Czech', 'تشيكي'),
(37, 'Danish', 'دانماركي'),
(38, 'Divehi, Dhivehi, Maldivian', 'المالديفية، الديفيهي، المالديف'),
(39, 'Dutch', 'اللغة الهولندية'),
(40, 'Dzongkha', 'الزونخاية'),
(41, 'English', 'اللغة الانكليزية'),
(42, 'Esperanto', 'الاسبرانتو'),
(43, 'Estonian', 'الإستونية'),
(44, 'Ewe', 'نعجة'),
(45, 'Faroese', 'جزر فارو'),
(46, 'Fijian', 'الفيجية'),
(47, 'Finnish', 'اللغة الفنلندية'),
(48, 'French', 'لغة فرنسية'),
(49, 'Fula, Fulah, Pulaar, Pular', 'فولا، الفلاح، البولار، البولار'),
(50, 'Galician', 'الجاليكية'),
(51, 'Georgian', 'الجورجية'),
(52, 'German', 'ألماني'),
(53, 'Greek (modern)', 'اليونانية (الحديثة)'),
(54, 'Guaraní', 'غواراني'),
(55, 'Gujarati', 'الغوجاراتية'),
(56, 'Haitian, Haitian Creole', 'هايتي، الكريول الهايتية'),
(57, 'Hausa', 'الهوسا'),
(58, 'Hebrew (modern)', 'العبرية (الحديث)'),
(59, 'Herero', 'هيريرو'),
(60, 'Hindi', 'الهندية'),
(61, 'Hiri Motu', 'الحيري موتو'),
(62, 'Hungarian', 'الهنغارية'),
(63, 'Interlingua', 'اللغة الوسيطة'),
(64, 'Indonesian', 'الأندونيسية'),
(65, 'Interlingue', 'إنترلينجوا'),
(66, 'Irish', 'الإيرلنديون'),
(67, 'Igbo', 'الإيبو'),
(68, 'Inupiaq', 'الاينبياك'),
(69, 'Ido', 'أنا'),
(70, 'Icelandic', 'أيسلندي'),
(71, 'Italian', 'الإيطالي'),
(72, 'Inuktitut', 'الكردية'),
(73, 'Japanese', 'اللغة اليابانية'),
(74, 'Javanese', 'جاوي'),
(75, 'Kalaallisut, Greenlandic', 'الكالاليست، غرينلاند'),
(76, 'Kannada', 'الكانادا'),
(77, 'Kanuri', 'الكانوري'),
(78, 'Kashmiri', 'الكشميري'),
(79, 'Kazakh', 'الكازاخستاني'),
(80, 'Khmer', 'الخمير'),
(81, 'Kikuyu, Gikuyu', 'الكيكويو، Gikuyu'),
(82, 'Kinyarwanda', 'كينيارواندا'),
(83, 'Kyrgyz', 'قيرغيزستان'),
(84, 'Komi', 'كومي'),
(85, 'Kongo', 'كونغو'),
(86, 'Korean', 'اللغة الكورية'),
(87, 'Kurdish', 'كردي'),
(88, 'Kwanyama, Kuanyama', 'Kwanyama، الكيونياما'),
(89, 'Latin', 'لاتينية'),
(90, 'Luxembourgish, Letzeburgesch', 'اللوكسمبرجية، Letzeburgesch'),
(91, 'Ganda', 'غاندا'),
(92, 'Limburgish, Limburgan, Limburger', 'الليمبرجيشية، الليمبرجيشية، يمبرجر'),
(93, 'Lingala', 'اللينغالا'),
(94, 'Lao', 'لاو'),
(95, 'Lithuanian', 'اللتوانية'),
(96, 'Luba-Katanga', 'وبا-كاتانغا'),
(97, 'Latvian', 'اللاتفية'),
(98, 'Manx', 'مانكس'),
(99, 'Macedonian', 'المقدونية'),
(100, 'Malagasy', 'مدغشقر'),
(101, 'Malay', 'لغة الملايو'),
(102, 'Malayalam', 'المالايالامية'),
(103, 'Maltese', 'المالطية'),
(104, 'Māori', 'الماوري'),
(105, 'Marathi (Marāṭhī)', 'الماراثية (المهاراتية)'),
(106, 'Marshallese', 'المارشالية'),
(107, 'Mongolian', 'المنغولية'),
(108, 'Nauru', 'ناورو'),
(109, 'Navajo, Navaho', 'نافاجو، النافاهو'),
(110, 'Northern Ndebele', 'الشمالية نديبيلي'),
(111, 'Nepali', 'النيبالية'),
(112, 'Ndonga', 'Ndonga'),
(113, 'Norwegian Bokmål', 'النرويجية'),
(114, 'Norwegian Nynorsk', 'النينورسك النرويجي'),
(115, 'Norwegian', 'النرويجية'),
(116, 'Nuosu', 'Nuosu'),
(117, 'Southern Ndebele', 'جنوب نديبيلي'),
(118, 'Occitan', 'الأوكيتانية'),
(119, 'Ojibwe, Ojibwa', '[أجيبو]، الأوجيبوا'),
(120, 'Old Church Slavonic, Church Slavonic, Old Bulgarian', 'الكنيسة السلافية القديمة، الكنيسة السلافية، قديم البلغارية'),
(121, 'Oromo', 'أورومو'),
(122, 'Oriya', 'الأوريا'),
(123, 'Ossetian, Ossetic', 'أوسيتيا، الأوسيتيك'),
(124, 'Panjabi, Punjabi', 'بنجابي، البنجابية'),
(125, 'Pāli', 'بالي'),
(126, 'Persian (Farsi)', 'الفارسية'),
(127, 'Polish', 'البولندية'),
(128, 'Pashto, Pushto', 'الباشتو، بشتو'),
(129, 'Portuguese', 'اللغة البرتغالية'),
(130, 'Quechua', 'الكيشوا'),
(131, 'Romansh', 'الرومانش'),
(132, 'Kirundi', 'كيروندي'),
(133, 'Romanian', 'الرومانية'),
(134, 'Russian', 'الروسية'),
(135, 'Sanskrit (Saṁskṛta)', 'السنسكريتية (Saṁskṛta)'),
(136, 'Sardinian', 'سردينيا'),
(137, 'Sindhi', 'السندية'),
(138, 'Northern Sami', 'سامي الشمالية'),
(139, 'Samoan', 'ساموا'),
(140, 'Sango', 'سانغو'),
(141, 'Serbian', 'صربي'),
(142, 'Scottish Gaelic, Gaelic', 'الغيلية الأسكتلندية، الغيلية'),
(143, 'Shona', 'شونا'),
(144, 'Sinhala, Sinhalese', 'السنهالية، السنهالية'),
(145, 'Slovak', 'السلوفاكية'),
(146, 'Slovene', 'السلوفينية'),
(147, 'Somali', 'الصومالية'),
(148, 'Southern Sotho', 'السوتو الجنوبية'),
(149, 'Spanish', 'اللغة الاسبانية'),
(150, 'Sundanese', 'السودانية'),
(151, 'Swahili', 'السواحلية'),
(152, 'Swati', 'سواتي'),
(153, 'Swedish', 'اللغة السويدية'),
(154, 'Tamil', 'التاميل'),
(155, 'Telugu', 'التيلجو'),
(156, 'Tajik', 'الطاجيكية'),
(157, 'Thai', 'التايلاندية'),
(158, 'Tigrinya', 'التغرينية'),
(159, 'Tibetan Standard, Tibetan, Central', 'ستاندرد التبتية، التبتية، الوسطى'),
(160, 'Turkmen', 'التركمان'),
(161, 'Tagalog', 'التغالوغ'),
(162, 'Tswana', 'التسوانية'),
(163, 'Tonga (Tonga Islands)', 'تونغا (جزر تونغا)'),
(164, 'Turkish', 'اللغة التركية'),
(165, 'Tsonga', 'تسونجا'),
(166, 'Tatar', 'تتاري'),
(167, 'Twi', 'التوي'),
(168, 'Tahitian', 'التاهيتية'),
(169, 'Uyghur', 'الأويغور'),
(170, 'Ukrainian', 'الأوكراني'),
(171, 'Urdu', 'الأردية'),
(172, 'Uzbek', 'الأوزبكي'),
(173, 'Venda', 'فندا'),
(174, 'Vietnamese', 'الفيتنامية'),
(175, 'Volapük', 'فولابوك'),
(176, 'Walloon', 'والون'),
(177, 'Welsh', 'ويلزي'),
(178, 'Wolof', 'الولوف'),
(179, 'Western Frisian', 'الغربية الفريزية'),
(180, 'Xhosa', 'زوسا'),
(181, 'Yiddish', 'اليديشية'),
(182, 'Yoruba', 'اليوروبا'),
(183, 'Zhuang, Chuang', 'الحكم لقومية تشوانغ، تشوانغ'),
(184, 'Zulu', 'الزولو');

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE IF NOT EXISTS `major` (
  `major_id` int(11) unsigned NOT NULL,
  `major_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `major_name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1589 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`major_id`, `major_name_en`, `major_name_ar`) VALUES
(1, 'Agriculture, Agriculture Operations, and Related Sciences', 'الزراعة وعمليات الزراعة، والعلوم ذات الصلة'),
(2, 'Agricultural and Domestic Animal Services', 'الزراعية والخدمات حيوانات المستأنسة'),
(3, 'Animal Training', 'تدريب الحيوانات'),
(4, 'Dog/Pet/Animal Grooming', 'الكلب / الحيوانات الأليفة / الاستمالة الحيوان'),
(5, 'Equestrian/Equine Studies', 'الفروسية / الدراسات فرسي'),
(6, 'Taxidermy/Taxidermist', 'التحنيط / المحنط'),
(7, 'Agricultural and Food Products Processing', 'المنتجات الزراعية والغذائية المعالجة'),
(8, 'Agricultural and Food Products Processing', 'المنتجات الزراعية والغذائية المعالجة'),
(9, 'Agricultural Business and Management', 'الأعمال والإدارة الزراعية'),
(10, 'Agribusiness/Agricultural Business Operations', 'الأعمال الزراعية / العمليات التجارية الزراعية'),
(11, 'Agricultural Business and Management', 'الأعمال والإدارة الزراعية'),
(12, 'Agricultural Business Technology', 'الزراعية تكنولوجيا الأعمال'),
(13, 'Agricultural Economics', 'الاقتصاد الزراعي'),
(14, 'Agricultural/Farm Supplies Retailing and Wholesaling', 'الزراعة / مزرعة لوازم البيع بالتجزئة والبيع بالجملة'),
(15, 'Farm/Farm and Ranch Management', 'مزرعة / مزرعة وإدارة مزرعة'),
(16, 'Agricultural Mechanization', 'الميكنة الزراعية'),
(17, 'Agricultural Mechanics and Equipment/Machine Technology', 'ميكانيكا الزراعية ومعدات آلة / تكنولوجيا'),
(18, 'Agricultural Mechanization', 'الميكنة الزراعية'),
(19, 'Agricultural Power Machinery Operation', 'الطاقة الآلات الزراعية عملية'),
(20, 'Agricultural Production Operations', 'عمليات الإنتاج الزراعي'),
(21, 'Agricultural Production Operations', 'عمليات الإنتاج الزراعي'),
(22, 'Agroecology and Sustainable Agriculture', 'الزراعة الإيكولوجية والزراعة المستدامة'),
(23, 'Animal/Livestock Husbandry and Production', 'الحيوان / تربية تربية والإنتاج'),
(24, 'Aquaculture', 'تربية الأحياء المائية'),
(25, 'Crop Production', 'إنتاج المحاصيل'),
(26, 'Dairy Husbandry and Production', 'الألبان تربية والإنتاج'),
(27, 'Horse Husbandry/Equine Science and Management', 'الحصان تربية / فرسي العلوم والإدارة'),
(28, 'Viticulture and Enology', 'زراعة الكروم وعلم التخمير'),
(29, 'Agricultural Public Services', 'الخدمات العامة الزراعية'),
(30, 'Agricultural and Extension Education Services', 'الزراعية والخدمات التعليم الإرشاد'),
(31, 'Agricultural Communication/Journalism', 'الاتصالات الزراعي / الصحافة'),
(32, 'Animal Sciences', 'علوم الحيوان'),
(33, 'Agricultural Animal Breeding', 'تربية الحيوانات الزراعية'),
(34, 'Animal Health', 'صحة الحيوان'),
(35, 'Animal Nutrition', 'تغذية الحيوان'),
(36, 'Animal Sciences', 'علوم الحيوان'),
(37, 'Dairy Science', 'علوم الألبان'),
(38, 'Livestock Management', 'إدارة الثروة الحيوانية'),
(39, 'Poultry Science', 'علوم الدواجن'),
(40, 'Applied Horticulture and Horticultural Business Services', 'البستنة التطبيقية والبستانية خدمات رجال'),
(41, 'Applied Horticulture/Horticulture Operations', 'البستنة / عمليات البستنة التطبيقية'),
(42, 'Floriculture/Floristry Operations and Management', 'زراعة نباتات الزينة / عمليات زراعة الزهور والإدارة'),
(43, 'Greenhouse Operations and Management', 'عمليات المسببة للاحتباس الحراري والإدارة'),
(44, 'Landscaping and Groundskeeping', 'المناظر الطبيعية وGroundskeeping'),
(45, 'Ornamental Horticulture', 'البستنة الزينة'),
(46, 'Plant Nursery Operations and Management', 'مشتل العمليات والإدارة'),
(47, 'Turf and Turfgrass Management', 'العشب وإدارة المروج'),
(48, 'Food Science and Technology', 'علوم وتكنولوجيا الأغذية'),
(49, 'Food Science', 'علوم الأغذية'),
(50, 'Food Technology and Processing', 'تكنولوجيا الغذاء وتجهيز'),
(51, 'International Agriculture', 'الزراعة الدولية'),
(52, 'International Agriculture', 'الزراعة الدولية'),
(53, 'Plant Sciences', 'علوم النبات'),
(54, 'Agricultural and Horticultural Plant Breeding', 'تربية النبات الزراعية والبستانية'),
(55, 'Agronomy and Crop Science', 'الهندسة الزراعية وعلوم المحاصيل'),
(56, 'Horticultural Science', 'العلوم البستانية'),
(57, 'Plant Protection and Integrated Pest Management', 'إدارة المصنع حماية والمتكاملة للآفات'),
(58, 'Plant Sciences', 'علوم النبات'),
(59, 'Range Science and Management', 'مجموعة العلوم والإدارة'),
(60, 'Soil Sciences', 'علوم التربة'),
(61, 'Soil Chemistry and Physics', 'كيمياء وفيزياء التربة'),
(62, 'Soil Microbiology', 'علم الأحياء الدقيقة في التربة'),
(63, 'Soil Science and Agronomy', 'علوم التربة والهندسة الزراعية'),
(64, 'Architecture and Related Services', 'الهندسة المعمارية والخدمات ذات الصلة'),
(65, 'Architectural History and Criticism', 'التاريخ المعماري ونقد'),
(66, 'Architectural History and Criticism', 'التاريخ المعماري ونقد'),
(67, 'Architectural Sciences and Technology', 'العلوم المعمارية والتكنولوجيا'),
(68, 'Architectural and Building Sciences/Technology', 'علوم البناء المعماري و/ تكنولوجيا'),
(69, 'Architectural Technology/Technician', 'تكنولوجيا الهندسة المعمارية / فني'),
(70, 'Architecture', 'هندسة العمارة'),
(71, 'Architecture', 'هندسة العمارة'),
(72, 'City/Urban, Community and Regional Planning', 'المدينة / الحضرية، والجماعة والتخطيط الإقليمي'),
(73, 'City/Urban, Community and Regional Planning', 'المدينة / الحضرية، والجماعة والتخطيط الإقليمي'),
(74, 'Environmental Design', 'التصميم البيئي'),
(75, 'Environmental Design/Architecture', 'التصميم البيئي / الهندسة المعمارية'),
(76, 'Interior Architecture', 'العمارة الداخلية'),
(77, 'Interior Architecture', 'العمارة الداخلية'),
(78, 'Landscape Architecture', 'هندسة المناظر الطبيعية'),
(79, 'Landscape Architecture', 'هندسة المناظر الطبيعية'),
(80, 'Real Estate Development', 'التطوير العقاري'),
(81, 'Real Estate Development', 'التطوير العقاري'),
(82, 'Area, Ethnic, Cultural, Gender, and Group Studies', 'الإثنية والثقافية والجنس، والدراسات المجموعة المنطقة'),
(83, 'Area Studies', 'دراسات المنطقة'),
(84, 'African Studies', 'الدراسات الأفريقية'),
(85, 'American/United States Studies/Civilization', 'الدراسات الأمريكية / الولايات المتحدة / الحضارة'),
(86, 'Asian Studies/Civilization', 'الدراسات الآسيوية / الحضارة'),
(87, 'Balkans Studies', 'البلقان الدراسات'),
(88, 'Baltic Studies', 'دراسات البلطيق'),
(89, 'Canadian Studies', 'الدراسات الكندية'),
(90, 'Caribbean Studies', 'دراسات البحر الكاريبي'),
(91, 'Chinese Studies', 'الدراسات الصينية'),
(92, 'Commonwealth Studies', 'دراسات الكومنولث'),
(93, 'East Asian Studies', 'دراسات شرق آسيا'),
(94, 'European Studies/Civilization', 'الدراسات الأوروبية / الحضارة'),
(95, 'French Studies', 'الدراسات الفرنسية'),
(96, 'German Studies', 'الدراسات الألمانية'),
(97, 'Irish Studies', 'الدراسات الأيرلندية'),
(98, 'Italian Studies', 'الدراسات الإيطالية'),
(99, 'Japanese Studies', 'الدراسات اليابانية'),
(100, 'Korean Studies', 'الدراسات الكورية'),
(101, 'Latin American and Caribbean Studies', 'دراسات أمريكا اللاتينية والكاريبي'),
(102, 'Latin American Studies', 'الدراسات الأمريكية اللاتينية'),
(103, 'Near and Middle Eastern Studies', 'دراسات الشرق الادنى والاوسط'),
(104, 'Pacific Area/Pacific Rim Studies', '-المحيط الهادي / باسيفيك ريم الدراسات'),
(105, 'Polish Studies', 'الدراسات البولندية'),
(106, 'Regional Studies (US, Canadian, Foreign)', 'الدراسات الإقليمية (الولايات المتحدة وكندا، الخارجية)'),
(107, 'Russian Studies', 'الدراسات الروسية'),
(108, 'Russian, Central European, East European and Eurasian Studies', 'الدراسات الأوروبية وسط وشرق أوروبا وأوراسيا الروسية'),
(109, 'Scandinavian Studies', 'الدراسات الاسكندنافية'),
(110, 'Slavic Studies', 'الدراسات السلافية'),
(111, 'South Asian Studies', 'دراسات جنوب آسيا'),
(112, 'Southeast Asian Studies', 'دراسات جنوب شرق اسيا'),
(113, 'Spanish and Iberian Studies', 'الدراسات الإسبانية والإيبيرية'),
(114, 'Tibetan Studies', 'دراسات التبتية'),
(115, 'Ukraine Studies', 'الدراسات أوكرانيا'),
(116, 'Ural-Altaic and Central Asian Studies', 'دراسات آسيا الوسطى الأورال-التاى و'),
(117, 'Western European Studies', 'الدراسات الأوروبية الغربية'),
(118, 'Ethnic Studies', 'الدراسات العرقية'),
(119, 'African-American/Black Studies', '/ الدراسات الأسود الأفريقية-الأمريكية'),
(120, 'American Indian/Native American Studies', '/ الدراسات الأمريكية الأصلية الهندية الأمريكية'),
(121, 'Asian-American Studies', 'الدراسات الآسيوية للولايات المتحدة'),
(122, 'Deaf Studies', 'دراسات الصم'),
(123, 'Disability Studies', 'دراسات الإعاقة'),
(124, 'Folklore Studies', 'دراسات الفولكلور'),
(125, 'Gay/Lesbian Studies', 'مثلي الجنس / الدراسات مثليه'),
(126, 'Hispanic-American, Puerto Rican, and Mexican-American/Chicano Studies', '/ الدراسات الشيكانو ابيض للولايات المتحدة، بورتوريكو، والمكسيكية الأمريكية'),
(127, 'Women''s Studies', 'دراسات المرأة'),
(128, 'Aviation', 'طيران'),
(129, 'Aviation / Flight Training (UND Aerospace)', 'الطيران / تدريب الطيران (UND الفضاء)'),
(130, 'Biological and Biomedical Sciences', 'العلوم البيولوجية والطبية الحيوية'),
(131, 'Biochemistry, Biophysics and Molecular Biology', 'الكيمياء الحيوية، الفيزياء الحيوية والبيولوجيا الجزيئية'),
(132, 'Biochemistry', 'الكيمياء الحيوية'),
(133, 'Biochemistry and Molecular Biology', 'الكيمياء الحيوية والبيولوجيا الجزيئية'),
(134, 'Biophysics', 'فيزياء حيوية'),
(135, 'Molecular Biochemistry', 'الجزيئية الكيمياء الحيوية'),
(136, 'Molecular Biology', 'علم الأحياء الجزيئي'),
(137, 'Molecular Biophysics', 'الفيزياء الحيوية الجزيئية'),
(138, 'Photobiology', 'البيولوجيا الضوئية'),
(139, 'Radiation Biology/Radiobiology', 'إشعاع علم الأحياء / علم الاحياء الاشعاعي'),
(140, 'Structural Biology', 'علم الأحياء الهيكلي'),
(141, 'Biology', 'علوم الاحياء'),
(142, 'Biology/Biological Sciences', 'علم الأحياء / العلوم البيولوجية'),
(143, 'Biomedical Sciences', 'العلوم الطبية الحيوية'),
(144, 'Biomathematics, Bioinformatics, and Computational Biology', 'علم الأحياء الرياضيات البيولوجية، المعلوماتية الحيوية، والحاسوبية'),
(145, 'Bioinformatics', 'المعلوماتية الحيوية'),
(146, 'Biometry/Biometrics', 'علم الإحصاء الحيوي / القياسات الحيوية'),
(147, 'Biostatistics', 'الإحصاء الحيوي'),
(148, 'Computational Biology', 'علم الأحياء الحسابي'),
(149, 'Biotechnology', 'التكنولوجيا الحيوية'),
(150, 'Biotechnology', 'التكنولوجيا الحيوية'),
(151, 'Botany/Plant Biology', 'علم النبات / بيولوجيا النبات'),
(152, 'Botany/Plant Biology', 'علم النبات / بيولوجيا النبات'),
(153, 'Plant Molecular Biology', 'مصنع البيولوجيا الجزيئية'),
(154, 'Plant Pathology/Phytopathology', 'أمراض النبات / امراض النبات'),
(155, 'Plant Physiology', 'فسيولوجيا النبات'),
(156, 'Cell/Cellular Biology and Anatomical Sciences', 'خلية / علم الأحياء الخلوي والعلوم تشريحية'),
(157, 'Anatomy', 'علم التشريح'),
(158, 'Cell Biology and Anatomy', 'بيولوجيا الخلية والتشريح'),
(159, 'Cell/Cellular and Molecular Biology', 'خلية / الخليوي والبيولوجيا الجزيئية'),
(160, 'Cell/Cellular Biology and Histology', 'خلية / علم الأحياء الخلوي وعلم الأنسجة'),
(161, 'Developmental Biology and Embryology', 'علم الأحياء التنموي وعلم الأجنة'),
(162, 'Ecology, Evolution, Systematics, and Population Biology', 'علم الأحياء علم البيئة، تطور، النظاميات، والسكان'),
(163, 'Aquatic Biology/Limnology', 'الأحياء المائية / علم المياه العذبة'),
(164, 'Conservation Biology', 'بيولوجيا الحفظ'),
(165, 'Ecology', 'علم البيئة'),
(166, 'Ecology and Evolutionary Biology', 'علم البيئة وعلم الأحياء التطوري'),
(167, 'Environmental Biology', 'علم الأحياء البيئي'),
(168, 'Epidemiology', 'علم الأوبئة'),
(169, 'Evolutionary Biology', 'علم الأحياء التطوري'),
(170, 'Marine Biology and Biological Oceanography', 'علم الأحياء البحرية وعلوم المحيطات البيولوجية'),
(171, 'Population Biology', 'علم الأحياء السكان'),
(172, 'Systematic Biology/Biological Systematics', 'علم الأحياء منهجي / النظاميات البيولوجي'),
(173, 'Genetics', 'علم الوراثة'),
(174, 'Animal Genetics', 'علم الوراثة الحيواني'),
(175, 'Genetics', 'علم الوراثة'),
(176, 'Genome Sciences/Genomics', 'علوم الجينوم / علم الجينوم'),
(177, 'Human/Medical Genetics', 'الإنسان / علم الوراثة الطبية'),
(178, 'Microbial and Eukaryotic Genetics', 'الميكروبية وحقيقية النواة علم الوراثة'),
(179, 'Molecular Genetics', 'علم الوراثة الجزيئية'),
(180, 'Plant Genetics', 'علم الوراثة النباتية'),
(181, 'Microbiological Sciences and Immunology', 'علوم الميكروبيولوجية والمناعة'),
(182, 'Immunology', 'علم المناعة'),
(183, 'Medical Microbiology and Bacteriology', 'علم الأحياء الدقيقة الطبية وعلم الجراثيم'),
(184, 'Microbiology', 'الاحياء الدقيقة'),
(185, 'Microbiology and Immunology', 'علم الأحياء الدقيقة والمناعة'),
(186, 'Mycology', 'علم الفطريات'),
(187, 'Parasitology', 'علم الطفيليات'),
(188, 'Virology', 'مبحث الفيروسات'),
(189, 'Molecular Medicine', 'الطب الجزيئي'),
(190, 'Molecular Medicine', 'الطب الجزيئي'),
(191, 'Neurobiology and Neurosciences', 'علم الأعصاب والعلوم العصبية'),
(192, 'Neuroanatomy', 'التشريح العصبي'),
(193, 'Neurobiology and Anatomy', 'علم الأعصاب وعلم التشريح'),
(194, 'Neurobiology and Behavior', 'علم الأعصاب والسلوك'),
(195, 'Neuroscience', 'علم الأعصاب'),
(196, 'Pharmacology and Toxicology', 'الأدوية والسموم'),
(197, 'Environmental Toxicology', 'علم السموم البيئية'),
(198, 'Molecular Pharmacology', 'الصيدلة الجزيئية'),
(199, 'Molecular Toxicology', 'علم السموم الجزيئي'),
(200, 'Neuropharmacology', 'الفارماكولوجيا العصبية'),
(201, 'Pharmacology', 'علم العقاقير'),
(202, 'Pharmacology and Toxicology', 'الأدوية والسموم'),
(203, 'Toxicology', 'علم السموم'),
(204, 'Physiology, Pathology and Related Sciences', 'علم وظائف الأعضاء، علم الأمراض وذات العلوم'),
(205, 'Aerospace Physiology and Medicine', 'الفضاء علم وظائف الأعضاء والطب'),
(206, 'Cardiovascular Science', 'علوم القلب والأوعية الدموية'),
(207, 'Cell Physiology', 'علم وظائف الأعضاء خلية'),
(208, 'Endocrinology', 'علم الغدد'),
(209, 'Exercise Physiology', 'ممارسة علم وظائف الأعضاء'),
(210, 'Molecular Physiology', 'علم وظائف الأعضاء الجزيئي'),
(211, 'Oncology and Cancer Biology', 'الأورام وسرطان الأحياء'),
(212, 'Pathology/Experimental Pathology', 'علم الأمراض / علم الأمراض التجريبي'),
(213, 'Physiology', 'علم وظائف الأعضاء'),
(214, 'Reproductive Biology', 'علم الأحياء الإنجابي'),
(215, 'Vision Science/Physiological Optics', 'رؤية علوم / البصريات الفسيولوجية'),
(216, 'Zoology/Animal Biology', 'علم الحيوان / علم الأحياء الحيوانية'),
(217, 'Animal Behavior and Ethology', 'سلوك الحيوان وعلم السلوك'),
(218, 'Animal Physiology', 'فسيولوجيا الحيوان'),
(219, 'Entomology', 'علم الحشرات'),
(220, 'Wildlife Biology', 'الحياة البرية الأحياء'),
(221, 'Zoology/Animal Biology', 'علم الحيوان / علم الأحياء الحيوانية'),
(222, 'Business, Management, Marketing, and Related Support Services', 'الأعمال التجارية والإدارة والتسويق، وخدمات الدعم ذات الصلة'),
(223, 'Accounting and Related Services', 'المحاسبة والخدمات ذات الصلة'),
(224, 'Accounting', 'المحاسبة'),
(225, 'Accounting and Business/Management', 'المحاسبة والأعمال / الإدارة'),
(226, 'Accounting and Finance', 'المحاسبة والمالية'),
(227, 'Accounting Technology/Technician and Bookkeeping', 'تقنية المحاسبة / فني ومسك الدفاتر'),
(228, 'Auditing', 'التدقيق'),
(229, 'Business Administration, Management and Operations', 'إدارة الأعمال، الإدارة والعمليات'),
(230, 'Business Administration and Management', 'إدارة الأعمال والإدارة'),
(231, 'Customer Service Management', 'إدارة خدمة العملاء'),
(232, 'E-Commerce/Electronic Commerce', 'E-التجارة / التجارة الإلكترونية'),
(233, 'Logistics, Materials, and Supply Chain Management', 'الخدمات اللوجستية، مواد، وإدارة سلسلة التوريد'),
(234, 'Non-Profit/Public/Organizational Management', 'غير الهادفة للربح / العامة / الإدارة التنظيمية'),
(235, 'Office Management and Supervision', 'إدارة المكاتب والإشراف'),
(236, 'Operations Management and Supervision', 'إدارة العمليات والإشراف'),
(237, 'Organizational Leadership', 'القيادة التنظيمية'),
(238, 'Project Management', 'ادارة مشاريع'),
(239, 'Purchasing, Procurement/Acquisitions and Contracts Management', 'المشتريات، والمشتريات / الشراء والعقود إدارة'),
(240, 'Research and Development Management', 'البحث والتطوير الإداري'),
(241, 'Retail Management', 'إدارة البيع بالتجزئة'),
(242, 'Transportation/Mobility Management', 'نقل إدارة / التنقل'),
(243, 'Business Operations Support and Assistant Services', 'عمليات دعم الأعمال والخدمات مساعد'),
(244, 'Administrative Assistant and Secretarial Science', 'مساعد الإداري وعلوم سكرتارية'),
(245, 'Business/Office Automation/Technology/Data Entry', 'الأعمال / أتمتة المكاتب / تكنولوجيا إدخال البيانات /'),
(246, 'Customer Service Support/Call Center/Teleservice Operation', 'دعم خدمة العملاء / مركز الاتصال / TELESERVICE عملية'),
(247, 'Executive Assistant/Executive Secretary', 'مساعد / الأمين التنفيذي التنفيذي'),
(248, 'General Office Occupations and Clerical Services', 'عام المهن المكتبية والخدمات المكتبية'),
(249, 'Parts, Warehousing, and Inventory Management Operations', 'أجزاء والتخزين، وإدارة المخزون العمليات'),
(250, 'Receptionist', 'موظف استقبال'),
(251, 'Traffic, Customs, and Transportation Clerk/Technician', 'المرور، والجمارك، والنقل كاتب / فني'),
(252, 'Business/Commerce', 'الأعمال / التجارة'),
(253, 'Business/Commerce', 'الأعمال / التجارة'),
(254, 'Business/Corporate Communications', 'الأعمال / دائرة الاتصالات التنفيذية'),
(255, 'Business/Corporate Communications', 'الأعمال / دائرة الاتصالات التنفيذية'),
(256, 'Business/Managerial Economics', 'الاقتصاد التجاري / الإداري'),
(257, 'Business/Managerial Economics', 'الاقتصاد التجاري / الإداري'),
(258, 'Construction Management', 'إدارة البناء'),
(259, 'Construction Management', 'إدارة البناء'),
(260, 'Entrepreneurial and Small Business Operations', 'العمليات التجارية الريادية والصغيرة'),
(261, 'Entrepreneurship/Entrepreneurial Studies', 'ريادة الأعمال / الدراسات الريادية'),
(262, 'Franchising and Franchise Operations', 'عمليات الامتياز والامتياز'),
(263, 'Small Business Administration/Management', 'إدارة الأعمال الصغيرة / إدارة'),
(264, 'Finance and Financial Management Services', 'المالية والخدمات الإدارة المالية'),
(265, 'Banking and Financial Support Services', 'خدمات الدعم المالية والمصرفية'),
(266, 'Credit Management', 'إدارة الائتمان'),
(267, 'Finance', 'المالية'),
(268, 'Financial Planning and Services', 'التخطيط والخدمات المالية'),
(269, 'International Finance', 'التمويل الدولية'),
(270, 'Investments and Securities', 'الاستثمارات والأوراق المالية'),
(271, 'Public Finance', 'المالية العامة'),
(272, 'General Sales, Merchandising and Related Marketing Operations', 'العامة على المبيعات، والتسويق وعمليات التسويق ذات'),
(273, 'Merchandising and Buying Operations', 'عمليات الترويج وشراء'),
(274, 'Retailing and Retail Operations', 'عمليات البيع بالتجزئة والبيع بالتجزئة'),
(275, 'Sales, Distribution, and Marketing Operations', 'المبيعات والتوزيع، وعمليات التسويق'),
(276, 'Selling Skills and Sales Operations', 'مهارات وعمليات المبيعات بيع'),
(277, 'Hospitality Administration/Management', 'إدارة الضيافة / إدارة'),
(278, 'Casino Management', 'إدارة الكازينو'),
(279, 'Hospitality Administration/Management', 'إدارة الضيافة / إدارة'),
(280, 'Hotel, Motel, and Restaurant Management', 'فندق، موتيل، وإدارة المطاعم'),
(281, 'Hotel/Motel Administration/Management', 'فندق / موتيل إدارة / إدارة'),
(282, 'Meeting and Event Planning', 'الاجتماعات وتنظيم الحفلات'),
(283, 'Resort Management', 'إدارة منتجع'),
(284, 'Restaurant/Food Services Management', 'مطعم / إدارة الخدمات الغذائية'),
(285, 'Tourism and Travel Services Management', 'السياحة وخدمات السفر إدارة'),
(286, 'Human Resources Management and Services', 'إدارة وخدمات الموارد البشرية'),
(287, 'Human Resources Development', 'تنمية الموارد البشرية'),
(288, 'Human Resources Management/Personnel Administration', 'إدارة إدارة الموارد البشرية / الموظفين'),
(289, 'Labor and Industrial Relations', 'العمل والعلاقات الصناعية'),
(290, 'Labor Studies', 'دراسات العمل'),
(291, 'Organizational Behavior Studies', 'دراسات السلوك التنظيمي'),
(292, 'Insurance', 'تأمين'),
(293, 'Insurance', 'تأمين'),
(294, 'International Business', 'اعمال عالمية'),
(295, 'International Business/Trade/Commerce', 'الأعمال الدولية / التجارة / تجارة'),
(296, 'Management Information Systems and Services', 'إدارة نظم وخدمات المعلومات'),
(297, 'Information Resources Management', 'إدارة الموارد المعلومات'),
(298, 'Knowledge Management', 'إدارة المعرفة'),
(299, 'Management Information Systems', 'نظم معلومات ادارية'),
(300, 'Management Sciences and Quantitative Methods', 'علوم الإدارة والأساليب الكمية'),
(301, 'Actuarial Science', 'العلوم الاكتوارية'),
(302, 'Business Statistics', 'الاحصائيات الأعمال'),
(303, 'Management Science', 'العلوم الإدارية'),
(304, 'Marketing', 'تسويق'),
(305, 'International Marketing', 'التسويق الدولي'),
(306, 'Marketing Research', 'بحوث التسويق'),
(307, 'Marketing/Marketing Management', 'تسويق / إدارة التسويق'),
(308, 'Real Estate', 'العقارات'),
(309, 'Real Estate', 'العقارات'),
(310, 'Specialized Sales, Merchandising and Marketing Operations', 'المبيعات المتخصصة، والتسويق وعمليات التسويق'),
(311, 'Apparel and Accessories Marketing Operations', 'عمليات التسويق ملابس واكسسوارات'),
(312, 'Auctioneering', 'الدلالة'),
(313, 'Business and Personal/Financial Services Marketing Operations', 'الأعمال التجارية والشخصية / الخدمات المالية عمليات التسويق'),
(314, 'Fashion Merchandising', 'تجارة الأزياء'),
(315, 'Fashion Modeling', 'الازياء'),
(316, 'Hospitality and Recreation Marketing Operations', 'الضيافة وعمليات التسويق الترفيه'),
(317, 'Special Products Marketing Operations', 'المنتجات عمليات التسويق الخاصة'),
(318, 'Tourism and Travel Services Marketing Operations', 'السياحة والخدمات عمليات التسويق سفر'),
(319, 'Tourism Promotion Operations', 'عمليات الترويج السياحي'),
(320, 'Vehicle and Vehicle Parts and Accessories Marketing Operations', 'المركبات وقطع غيار المركبات وملحقاتها عمليات التسويق'),
(321, 'Taxation', 'فرض الضرائب'),
(322, 'Taxation', 'فرض الضرائب'),
(323, 'Telecommunications Management', 'إدارة الاتصالات'),
(324, 'Telecommunications Management', 'إدارة الاتصالات'),
(325, 'Communication, Journalism, and Related Programs', 'الاتصالات، برامج الصحافة، وما يتصل'),
(326, 'Communication and Media Studies', 'الاتصالات والدراسات الإعلامية'),
(327, 'Mass Communication/Media Studies', 'الإعلام / الدراسات الإعلامية'),
(328, 'Speech Communication and Rhetoric', 'خطاب الاتصالات والبلاغة'),
(329, 'Journalism', 'صحافة'),
(330, 'Broadcast Journalism', 'الصحافة الإذاعية والتلفزيونية'),
(331, 'Journalism', 'صحافة'),
(332, 'Photojournalism', 'التصوير الصحفي'),
(333, 'Public Relations, Advertising, and Applied Communication', 'العلاقات العامة، الإعلان، والاتصالات التطبيقية'),
(334, 'Advertising', 'دعايه واعلان'),
(335, 'Health Communication', 'الاتصالات الصحة'),
(336, 'International and Intercultural Communication', 'الاتصالات الدولي وبين الثقافات'),
(337, 'Organizational Communication', 'الاتصال التنظيمي'),
(338, 'Political Communication', 'الاتصالات السياسية'),
(339, 'Public Relations/Image Management', 'العلاقات العامة / إدارة الصور'),
(340, 'Sports Communication', 'الاتصالات الرياضة'),
(341, 'Technical and Scientific Communication', 'الاتصالات التقني والعلمي'),
(342, 'Publishing', 'نشر'),
(343, 'Publishing', 'نشر'),
(344, 'Radio, Television, and Digital Communication', 'الإذاعة والتلفزيون، والاتصالات الرقمية'),
(345, 'Digital Communication and Media/Multimedia', 'الاتصالات الرقمية والإعلام / الوسائط المتعددة'),
(346, 'Radio and Television', 'الإذاعة والتلفزيون'),
(347, 'Communications Technologies/technicians and Support Services', 'تكنولوجيا الاتصالات / فنيين وخدمات الدعم'),
(348, 'Audiovisual Communications Technologies/Technicians', 'الاتصالات السمعية البصرية تكنولوجيز / فنيي'),
(349, 'Photographic and Film/Video Technology/Technician and Assistant', 'التصوير الفوتوغرافي والسينمائي / تكنولوجيا الفيديو / فني ومساعد'),
(350, 'Radio and Television Broadcasting Technology/Technician', 'البث الإذاعي والتلفزيوني تكنولوجيا / فني'),
(351, 'Recording Arts Technology/Technician', 'تسجيل الفنون والتكنولوجيا / فني'),
(352, 'Communications Technology/Technician', 'تكنولوجيا الاتصالات / فني'),
(353, 'Communications Technology/Technician', 'تكنولوجيا الاتصالات / فني'),
(354, 'Graphic Communications', 'الرسم الاتصالات'),
(355, 'Animation, Interactive Technology, Video Graphics and Special Effects', 'الرسوم المتحركة والتكنولوجيا التفاعلية، رسومات الفيديو والمؤثرات الخاصة'),
(356, 'Computer Typography and Composition Equipment Operator', 'الكمبيوتر الطباعة ومشغل معدات التركيب'),
(357, 'Graphic and Printing Equipment Operator Production', 'إنتاج الرسوم البيانية ومعدات الطباعة المشغل'),
(358, 'Graphic Communications', 'الرسم الاتصالات'),
(359, 'Platemaker/Imager', 'Platemaker / تصوير'),
(360, 'Prepress/Desktop Publishing and Digital Imaging Design', 'ما قبل الطباعة / النشر المكتبي والتصميم التصوير الرقمي'),
(361, 'Printing Management', 'إدارة الطباعة'),
(362, 'Printing Press Operator', 'الطباعة المشغل الصحافة'),
(363, 'Computer and Information Sciences and Support Services', 'خدمات الكمبيوتر، وعلوم المعلومات ودعم'),
(364, 'Computer and Information Sciences', 'علوم الحاسوب والاتصال'),
(365, 'Artificial Intelligence', 'الذكاء الاصطناعي'),
(366, 'Computer and Information Sciences', 'علوم الحاسوب والاتصال'),
(367, 'Informatics', 'المعلوماتية'),
(368, 'Information Technology', 'تكنولوجيا المعلومات'),
(369, 'Computer Programming', 'برمجة الحاسوب'),
(370, 'Computer Programming, Specific Applications', 'برمجة الحاسب الآلي، تطبيقات معينة'),
(371, 'Computer Programming, Vendor/Product Certification', 'برمجة الحاسوب، البائع / شهادة المنتج'),
(372, 'Computer Programming/Programmer', 'برمجة الحاسوب / مبرمج'),
(373, 'Computer Science', 'علوم الحاسوب'),
(374, 'Computer Science', 'علوم الحاسوب'),
(375, 'Computer Software and Media Applications', 'الكمبيوتر البرامج والتطبيقات وسائل الإعلام'),
(376, 'Computer Graphics', 'الرسومات الكمبيوتر'),
(377, 'Data Modeling/Warehousing and Database Administration', 'بيانات النمذجة / التخزين وإدارة قواعد البيانات'),
(378, 'Modeling, Virtual Environments and Simulation', 'النمذجة، والمحاكاة البيئات الافتراضية'),
(379, 'Web Page, Digital/Multimedia and Information Resources Design', 'صفحة ويب، الرقمية / الوسائط المتعددة وتصميم مصادر المعلومات'),
(380, 'Computer Systems Analysis', 'كمبيوتر تحليل النظم'),
(381, 'Computer Systems Analysis/Analyst', 'كمبيوتر تحليل النظم / محلل'),
(382, 'Computer Systems Networking and Telecommunications', 'أنظمة الكمبيوتر والشبكات والاتصالات'),
(383, 'Computer Systems Networking and Telecommunications', 'أنظمة الكمبيوتر والشبكات والاتصالات'),
(384, 'Computer/Information Technology Administration and Management', 'الكمبيوتر / إدارة تقنية المعلومات وإدارة'),
(385, 'Computer and Information Systems Security/Information Assurance', 'الحاسوب وأمن نظم المعلومات / أمن المعلومات'),
(386, 'Computer Support Specialist', 'أخصائي دعم الكمبيوتر'),
(387, 'Information Technology Project Management', 'إدارة مشروع تكنولوجيا المعلومات'),
(388, 'Network and System Administration/Administrator', 'شبكة ونظام إدارة / مدير'),
(389, 'System, Networking, and LAN/WAN Management/Manager', 'النظام، والشبكات، وLAN / WAN إدارة / مدير'),
(390, 'Web/Multimedia Management and Webmaster', '/ إدارة الوسائط المتعددة على شبكة الإنترنت ومشرفي'),
(391, 'Data Entry/Microcomputer Applications', 'إدخال البيانات تطبيقات / الدقيقة'),
(392, 'Data Entry/Microcomputer Applications', 'إدخال البيانات تطبيقات / الدقيقة'),
(393, 'Word Processing', 'معالجة الكلمة'),
(394, 'Data Processing', 'معالجة البيانات'),
(395, 'Data Processing and Data Processing Technology/Technician', 'معالجة البيانات وتقنية معالجة البيانات / فني'),
(396, 'Information Science/Studies', 'علم المعلومات / دراسات'),
(397, 'Information Science/Studies', 'علم المعلومات / دراسات'),
(398, 'Construction Trades', 'الصفقات البناء'),
(399, 'Building/Construction Finishing, Management, and Inspection', 'التشطيب البناء / التعمير والإدارة والتفتيش'),
(400, 'Building Construction Technology', 'بناء تكنولوجيا البناء'),
(401, 'Building/Construction Site Management/Manager', 'بناء / بناء إدارة الموقع / مدير'),
(402, 'Building/Home/Construction Inspection/Inspector', 'بناء / الرئيسية / البناء التفتيش / المفتش'),
(403, 'Building/Property Maintenance', 'بناء / صيانة الملكية'),
(404, 'Carpet, Floor, and Tile Worker', 'السجاد، الأرضيات، وبلاط العمال'),
(405, 'Concrete Finishing/Concrete Finisher', 'التشطيب ملموسة / تشطيب الخرسانة'),
(406, 'Drywall Installation/Drywaller', 'دريوال تركيب / Drywaller'),
(407, 'Glazier', 'زجاج'),
(408, 'Insulator', 'عازل'),
(409, 'Metal Building Assembly/Assembler', 'المعادن مبنى الجمعية / مجمع'),
(410, 'Painting/Painter and Wall Coverer', 'اللوحة / الرسام وحائط المغطي'),
(411, 'Roofer', 'ساقف'),
(412, 'Carpenters', 'النجارين'),
(413, 'Carpentry/Carpenter', 'النجارة / كاربنتر'),
(414, 'Electrical and Power Transmission Installers', 'التركيب نقل الطاقة الكهربائية والطاقة'),
(415, 'Electrical and Power Transmission Installation/Installer', 'التركيبات الكهربائية ونقل الطاقة / المثبت'),
(416, 'Electrician', 'فنى كهربائى'),
(417, 'Lineworker', 'Lineworker'),
(418, 'Mason/Masonry', 'ميسون / الماسونية'),
(419, 'Mason/Masonry', 'ميسون / الماسونية'),
(420, 'Plumbing and Related Water Supply Services', 'السباكة والمياه خدمات مرتبطة بها التموين'),
(421, 'Blasting/Blaster', 'التفجير / مكبر'),
(422, 'Pipefitting/Pipefitter and Sprinkler Fitter', 'Pipefitting / معطى الأسرار والرشاش الميكانيكي'),
(423, 'Plumbing Technology/Plumber', 'السباكة تكنولوجيا / سباك'),
(424, 'Well Drilling/Driller', 'حفر آبار / الحفار'),
(425, 'Education', 'تربية وتعليم'),
(426, 'Bilingual, Multilingual, and Multicultural Education', 'ثنائية اللغة، متعددة اللغات، والتعليم متعدد الثقافات'),
(427, 'Bilingual and Multilingual Education', 'ثنائية اللغة والتعليم المتعدد اللغات'),
(428, 'Indian/Native American Education', 'الهندي / الأصلية التعليم الأمريكية'),
(429, 'Multicultural Education', 'التعليم متعدد الثقافات'),
(430, 'Curriculum and Instruction', 'المناهج وطرق التدريس'),
(431, 'Curriculum and Instruction', 'المناهج وطرق التدريس'),
(432, 'Educational Administration and Supervision', 'الإدارة التربوية والإشراف'),
(433, 'Administration of Special Education', 'إدارة التربية الخاصة'),
(434, 'Adult and Continuing Education Administration', 'الكبار وإدارة التعليم المستمر'),
(435, 'Community College Education', 'كلية المجتمع التعليم'),
(436, 'Educational Leadership and Administration', 'القيادة التربوية والإدارة'),
(437, 'Educational, Instructional, and Curriculum Supervision', 'تربية والتعليمية، والمناهج الإشراف'),
(438, 'Elementary and Middle School Administration/Principalship', 'الابتدائية والإعدادية الإدارة / برينسيبالشيب'),
(439, 'Higher Education/Higher Education Administration', 'إدارة / التعليم العالي التعليم العالي'),
(440, 'Secondary School Administration/Principalship', 'الثانوي مدرسة الإدارة / برينسيبالشيب'),
(441, 'Superintendency and Educational System Administration', 'إدارة الرقابة وتربية النظام'),
(442, 'Urban Education and Leadership', 'التعليم في المناطق الحضرية والقيادة'),
(443, 'Educational Assessment, Evaluation, and Research', 'تقييم للتربية والتقييم، والبحوث'),
(444, 'Educational Assessment, Testing, and Measurement', 'تقييم للتربية واختبار، والقياس'),
(445, 'Educational Evaluation and Research', 'تقييم والبحوث التربوية'),
(446, 'Educational Statistics and Research Methods', 'الإحصاء التربوي ومناهج البحث'),
(447, 'Learning Sciences', 'علوم التعلم'),
(448, 'Educational/Instructional Media Design', 'تربية / التصميم التعليمي وسائل الإعلام'),
(449, 'Educational/Instructional Technology', 'تربية / تكنولوجيا التعليم'),
(450, 'Education', 'تربية وتعليم'),
(451, 'Education', 'تربية وتعليم'),
(452, 'International and Comparative Education', 'الدولي والتربية المقارنة'),
(453, 'International and Comparative Education', 'الدولي والتربية المقارنة'),
(454, 'Social and Philosophical Foundations of Education', 'الأسس الاجتماعية والفلسفية التربية والتعليم'),
(455, 'Social and Philosophical Foundations of Education', 'الأسس الاجتماعية والفلسفية التربية والتعليم'),
(456, 'Special Education and Teaching', 'التعليم الخاص والتعليم'),
(457, 'Education/Teaching of Individuals in Early Childhood Special Education Programs', 'التعليم / تعليم الأفراد في مرحلة الطفولة المبكرة برامج التربية الخاصة'),
(458, 'Education/Teaching of Individuals in Elementary Special Education Programs', 'التعليم / تعليم الأفراد في الابتدائية برامج التربية الخاصة'),
(459, 'Education/Teaching of Individuals in Junior High/Middle School Special Education Programs', 'التعليم / تعليم الأفراد في الإعدادية / مدرسة الأوسط برامج التربية الخاصة'),
(460, 'Education/Teaching of Individuals in Secondary Special Education Programs', 'التعليم / تعليم الأفراد في برامج التربية الخاصة الثانوية'),
(461, 'Education/Teaching of Individuals Who are Developmentally Delayed', 'التعليم / تعليم للأفراد الذين يتم تأخير تنمويا'),
(462, 'Education/Teaching of Individuals with Autism', 'التعليم / تعليم الأفراد المصابين بالتوحد'),
(463, 'Education/Teaching of Individuals with Emotional Disturbances', 'التعليم / تعليم الأفراد مع الاضطرابات العاطفية'),
(464, 'Education/Teaching of Individuals with Hearing Impairments Including Deafness', 'التعليم / تعليم الأفراد يعانون من ضعف السمع بما في ذلك الصمم'),
(465, 'Education/Teaching of Individuals with Mental Retardation', 'التعليم / تعليم الأفراد ذوي التخلف العقلي'),
(466, 'Education/Teaching of Individuals with Multiple Disabilities', 'التعليم / تعليم الأفراد ذوي الإعاقة متعددة'),
(467, 'Education/Teaching of Individuals with Specific Learning Disabilities', 'التعليم / تعليم الأفراد ذوي صعوبات التعلم المحددة'),
(468, 'Education/Teaching of Individuals with Speech or Language Impairments', 'التعليم / تعليم الأفراد مع الكلام أو اللغة الإعاقات'),
(469, 'Education/Teaching of Individuals with Traumatic Brain Injuries', 'التعليم / تعليم الأفراد مع إصابات الدماغ الرضية'),
(470, 'Education/Teaching of Individuals with Vision Impairments Including Blindness', 'التعليم / تعليم الأفراد مع الرؤية الإعاقات بما في ذلك العمى'),
(471, 'Education/Teaching of the Gifted and Talented', 'التعليم / تعليم لرعاية الموهوبين والمتفوقين'),
(472, 'Special Education and Teaching', 'التعليم الخاص والتعليم'),
(473, 'Student Counseling and Personnel Services', 'الإرشاد الطلابي وخدمات الموظفين'),
(474, 'College Student Counseling and Personnel Services', 'كلية الإرشاد الطلابي وخدمات الموظفين'),
(475, 'Counselor Education/School Counseling and Guidance Services', 'مستشار التعليم / مدرسة الإرشاد وخدمات التوجيه'),
(476, 'Teacher Education and Professional Development, Specific Levels and Methods', 'يا معلم التعليم والتطوير المهني، مستويات محددة وطرق'),
(477, 'Adult and Continuing Education and Teaching', 'تعليم الكبار والتعليم المستمر والتعليم'),
(478, 'Early Childhood Education and Teaching', 'التعليم في مرحلة الطفولة المبكرة والتعليم'),
(479, 'Elementary Education and Teaching', 'التعليم الابتدائي والتعليم'),
(480, 'Junior High/Intermediate/Middle School Education and Teaching', 'الإعدادية / المتوسطة / الشرق التعليم مدرسة والتعليم'),
(481, 'Kindergarten/Preschool Education and Teaching', 'روضة أطفال / مرحلة ما قبل المدرسة التربية والتعليم'),
(482, 'Montessori Teacher Education', 'مونتيسوري المعلمين'),
(483, 'Secondary Education and Teaching', 'التعليم الثانوي والتعليم'),
(484, 'Teacher Education, Multiple Levels', 'يا معلم التعليم، مستويات متعددة'),
(485, 'Waldorf/Steiner Teacher Education', 'والدورف / شتاينر المعلمين'),
(486, 'Teacher Education and Professional Development, Specific Subject Areas', 'يا معلم التعليم والتنمية المهنية، مناطق موضوع معين'),
(487, 'Agricultural Teacher Education', 'الزراعية المعلمين'),
(488, 'Art Teacher Education', 'الفن المعلمين'),
(489, 'Biology Teacher Education', 'علم الأحياء المعلمين'),
(490, 'Business Teacher Education', 'الأعمال المعلمين'),
(491, 'Chemistry Teacher Education', 'الكيمياء المعلمين'),
(492, 'Computer Teacher Education', 'كمبيوتر المعلمين'),
(493, 'Drama and Dance Teacher Education', 'الدراما والرقص المعلمين'),
(494, 'Driver and Safety Teacher Education', 'السائق والسلامة المعلمين'),
(495, 'Earth Science Teacher Education', 'علوم الأرض المعلمين'),
(496, 'English/Language Arts Teacher Education', 'الإنجليزية / فنون اللغة المعلمين'),
(497, 'Environmental Education', 'التربية البيئية'),
(498, 'Family and Consumer Sciences/Home Economics Teacher Education', 'علوم الأسرة والمستهلك / الاقتصاد المنزلي المعلمين'),
(499, 'Foreign Language Teacher Education', 'الخارجية مدرس لغة التعليم'),
(500, 'French Language Teacher Education', 'الفرنسية مدرس لغة التعليم'),
(501, 'Geography Teacher Education', 'الجغرافيا المعلمين'),
(502, 'German Language Teacher Education', 'اللغة الألمانية المعلمين'),
(503, 'Health Occupations Teacher Education', 'الصحة المهن المعلمين'),
(504, 'Health Teacher Education', 'الصحة المعلمين'),
(505, 'History Teacher Education', 'مدرس التاريخ التعليم'),
(506, 'Latin Teacher Education', 'اللاتينية المعلمين'),
(507, 'Mathematics Teacher Education', 'الرياضيات المعلمين'),
(508, 'Music Teacher Education', 'الموسيقى المعلمين'),
(509, 'Physical Education Teaching and Coaching', 'التربية البدنية التعليم والتدريب'),
(510, 'Physics Teacher Education', 'الفيزياء المعلمين'),
(511, 'Psychology Teacher Education', 'علم النفس المعلمين'),
(512, 'Reading Teacher Education', 'القراءة المعلمين'),
(513, 'Sales and Marketing Operations/Marketing and Distribution Teacher Education', 'المبيعات وعمليات التسويق / التسويق والتوزيع المعلمين'),
(514, 'School Librarian/School Library Media Specialist', 'أخصائي المدرسة مكتبة / مدرسة مكتبة الوسائط'),
(515, 'Science Teacher Education/General Science Teacher Education', 'مدرس العلوم التعليم / عامة العلوم المعلمين'),
(516, 'Social Science Teacher Education', 'العلوم الاجتماعية المعلمين'),
(517, 'Social Studies Teacher Education', 'الدراسات الاجتماعية المعلمين'),
(518, 'Spanish Language Teacher Education', 'الأسبانية مدرس لغة التعليم'),
(519, 'Speech Teacher Education', 'خطاب المعلمين'),
(520, 'Technical Teacher Education', 'التقنية المعلمين'),
(521, 'Technology Teacher Education/Industrial Arts Teacher Education', 'التكنولوجيا المعلمين / الصناعية الفنون المعلمين'),
(522, 'Trade and Industrial Teacher Education', 'التجارة والصناعية المعلمين'),
(523, 'Teaching Assistants/Aides', 'التدريس المساعدين / مساعدون'),
(524, 'Adult Literacy Tutor/Instructor', 'محو أمية الكبار مدرس / مدرس'),
(525, 'Teacher Assistant/Aide', 'مدرس مساعد / مساعد'),
(526, 'Teaching English or French as a Second or Foreign Language', 'تدريس اللغة الإنجليزية أو الفرنسية كلغة ثانية أو لغة أجنبية'),
(527, 'Teaching English as a Second or Foreign Language/ESL Language Instructor', 'تدريس اللغة الإنجليزية لغير مدرس الثانية أو اللغات الأجنبية / ESL اللغة'),
(528, 'Teaching French as a Second or Foreign Language', 'تدريس اللغة الفرنسية كلغة ثانية أو لغة أجنبية'),
(529, 'Engineering Technologies and Engineering-Related Fields', 'تكنولوجيا الهندسة والمجالات الهندسية المتصلة'),
(530, 'Architectural Engineering Technologies/Technicians', 'المعماري تكنولوجيا الهندسة / فنيي'),
(531, 'Architectural Engineering Technology/Technician', 'تكنولوجيا الهندسة المعمارية / فني'),
(532, 'Civil Engineering Technologies/Technicians', 'هندسة تقنيات المدنية / فنيي'),
(533, 'Civil Engineering Technology/Technician', 'تكنولوجيا الهندسة المدنية / فني'),
(534, 'Computer Engineering Technologies/Technicians', 'هندسة الكمبيوتر تكنولوجيز / فنيي'),
(535, 'Computer Engineering Technology/Technician', 'الكمبيوتر والتكنولوجيا الهندسة / فني'),
(536, 'Computer Hardware Technology/Technician', 'تكنولوجيا الكمبيوترات / فني'),
(537, 'Computer Software Technology/Technician', 'كمبيوتر تكنولوجيا البرمجيات / فني'),
(538, 'Computer Technology/Computer Systems Technology', 'تقنية الكمبيوتر / كمبيوتر سيستمز تكنولوجيا'),
(539, 'Construction Engineering Technologies', 'هندسة البناء تكنولوجيز'),
(540, 'Construction Engineering Technology/Technician', 'بناء تكنولوجيا الهندسة / فني'),
(541, 'Drafting/Design Engineering Technologies/Technicians', 'صياغة / التصميم الهندسي للتكنولوجيا / فنيي'),
(542, 'Architectural Drafting and Architectural CAD/CADD', 'الصياغة المعمارية والهندسة المعمارية CAD / CADD'),
(543, 'CAD/CADD Drafting and/or Design Technology/Technician', 'CAD / CADD صياغة و / أو تقنية التصميم / فني'),
(544, 'Civil Drafting and Civil Engineering CAD/CADD', 'صياغة المدنية والهندسة المدنية CAD / CADD'),
(545, 'Drafting and Design Technology/Technician', 'الصياغة والتكنولوجيا التصميم / فني'),
(546, 'Electrical/Electronics Drafting and Electrical/Electronics CAD/CADD', 'الكهربائية / إلكترونيات صياغة والكهربائية / إلكترونيات CAD / CADD'),
(547, 'Mechanical Drafting and Mechanical Drafting CAD/CADD', 'صياغة الميكانيكية والميكانيكية صياغة CAD / CADD'),
(548, 'Electrical Engineering Technologies/Technicians', 'الهندسة الكهربائية تكنولوجيز / فنيي'),
(549, 'Electrical, Electronic and Communications Engineering Technology/Technician', 'الكهربائية والالكترونية والاتصالات وتكنولوجيا الهندسة / فني'),
(550, 'Integrated Circuit Design', 'تصميم الدوائر المتكاملة'),
(551, 'Laser and Optical Technology/Technician', 'الليزر والتكنولوجيا البصرية / فني'),
(552, 'Telecommunications Technology/Technician', 'تكنولوجيا الاتصالات / فني'),
(553, 'Electromechanical Instrumentation and Maintenance Technologies/Technicians', 'الأجهزة الكهربائية والصيانة تكنولوجيز / فنيي'),
(554, 'Automation Engineer Technology/Technician', 'أتمتة المهندس تكنولوجيا / فني'),
(555, 'Biomedical Technology/Technician', 'التكنولوجيا الطبية الحيوية / فني'),
(556, 'Electromechanical Technology/Electromechanical Engineering Technology', 'تكنولوجيا الكهروميكانيكية / تكنولوجيا الهندسة الكهروميكانيكية'),
(557, 'Instrumentation Technology/Technician', 'تقنية الأجهزة / فني'),
(558, 'Robotics Technology/Technician', 'الروبوتات تكنولوجيا / فني'),
(559, 'Engineering-Related Fields', 'الحقول المتصلة الهندسة'),
(560, 'Engineering Design', 'التصميم الهندسي'),
(561, 'Engineering/Industrial Management', 'الهندسة / الإدارة الصناعية'),
(562, 'Packaging Science', 'علوم التعبئة والتغليف'),
(563, 'Engineering-Related Technologies', 'المتصلة هندسة تكنولوجيا'),
(564, 'Hydraulics and Fluid Power Technology/Technician', 'الهيدروليكية والسائل تكنولوجيا الطاقة / فني'),
(565, 'Surveying Technology/Surveying', 'مسح تكنولوجيا / المسح'),
(566, 'Environmental Control Technologies/Technicians', 'الرقابة البيئية تكنولوجيز / فنيي'),
(567, 'Energy Management and Systems Technology/Technician', 'إدارة الطاقة وأنظمة تكنولوجيا / فني'),
(568, 'Environmental Engineering Technology/Environmental Technology', 'تقنية الهندسة البيئية / تكنولوجيا البيئة'),
(569, 'Hazardous Materials Management and Waste Technology/Technician', 'إدارة المواد الخطرة والتكنولوجيا المخلفات / فني'),
(570, 'Heating, Ventilation, Air Conditioning and Refrigeration Engineering Technology/Technician', 'التدفئة والتهوية وتكييف الهواء والتبريد الهندسة والتكنولوجيا / فني'),
(571, 'Solar Energy Technology/Technician', 'تكنولوجيا الطاقة الشمسية / فني'),
(572, 'Water Quality and Wastewater Treatment Management and Recycling Technology/Technician', 'نوعية المياه وإدارة معالجة المياه العادمة وإعادة تقنية / فني'),
(573, 'Industrial Production Technologies/Technicians', 'الإنتاج الصناعي تكنولوجيز / فنيي'),
(574, 'Chemical Engineering Technology/Technician', 'تكنولوجيا الهندسة الكيميائية / فني'),
(575, 'Industrial Technology/Technician', 'التكنولوجيا الصناعية / فني'),
(576, 'Manufacturing Engineering Technology/Technician', 'صناعة تكنولوجيا الهندسة / فني'),
(577, 'Metallurgical Technology/Technician', 'تكنولوجيا المعادن / فني'),
(578, 'Plastics and Polymer Engineering Technology/Technician', 'البلاستيك والبوليمرات تقنية الهندسة / فني'),
(579, 'Semiconductor Manufacturing Technology', 'أشباه الموصلات تكنولوجيا التصنيع'),
(580, 'Welding Engineering Technology/Technician', 'لحام تكنولوجيا الهندسة / فني'),
(581, 'Mechanical Engineering Related Technologies/Technicians', 'الهندسة الميكانيكية التكنولوجيات ذات الصلة / فنيي'),
(582, 'Aeronautical/Aerospace Engineering Technology/Technician', 'الطيران / الفضاء تكنولوجيا الهندسة / فني'),
(583, 'Automotive Engineering Technology/Technician', 'السيارات تكنولوجيا الهندسة / فني'),
(584, 'Mechanical Engineering/Mechanical Technology/Technician', 'الهندسة الميكانيكية / التقنية الميكانيكية / فني'),
(585, 'Mining and Petroleum Technologies/Technicians', 'التعدين وتقنيات البترول / فنيي'),
(586, 'Mining Technology/Technician', 'تكنولوجيا التعدين / فني'),
(587, 'Petroleum Technology/Technician', 'تكنولوجيا البترول / فني'),
(588, 'Nanotechnology', 'تكنولوجيا النانو'),
(589, 'Nanotechnology', 'تكنولوجيا النانو'),
(590, 'Nuclear Engineering Technologies/Technicians', 'الهندسة النووية تكنولوجيز / فنيي'),
(591, 'Nuclear Engineering Technology/Technician', 'تقنية الهندسة النووية / فني'),
(592, 'Quality Control and Safety Technologies/Technicians', 'مراقبة الجودة وتقنيات السلامة / فنيي'),
(593, 'Hazardous Materials Information Systems Technology/Technician', 'نظم تكنولوجيا المعلومات الخطرة المواد / فني'),
(594, 'Industrial Safety Technology/Technician', 'تكنولوجيا السلامة الصناعية / فني'),
(595, 'Occupational Safety and Health Technology/Technician', 'السلامة المهنية وتكنولوجيا الصحة / فني'),
(596, 'Quality Control Technology/Technician', 'جودة مراقبة تكنولوجيا / فني'),
(597, 'Engineering', 'هندسة'),
(598, 'Aerospace, Aeronautical and Astronautical Engineering', 'الفضاء، الطيران والملاحة الفضائية الهندسة'),
(599, 'Aerospace, Aeronautical and Astronautical/Space Engineering', 'الفضاء، الطيران والملاحة الفضائية / هندسة الفضاء'),
(600, 'Agricultural Engineering', 'الهندسة الزراعية'),
(601, 'Agricultural Engineering', 'الهندسة الزراعية'),
(602, 'Architectural Engineering', 'هندسة معماري'),
(603, 'Architectural Engineering', 'هندسة معماري'),
(604, 'Biochemical Engineering', 'الهندسة البيوكيميائية'),
(605, 'Biochemical Engineering', 'الهندسة البيوكيميائية'),
(606, 'Biological/Biosystems Engineering', 'البيولوجي / النظم البيولوجية الهندسة'),
(607, 'Biological/Biosystems Engineering', 'البيولوجي / النظم البيولوجية الهندسة'),
(608, 'Biomedical/Medical Engineering', 'الطب الحيوي / الهندسة الطبية'),
(609, 'Bioengineering and Biomedical Engineering', 'الهندسة الحيوية والطبية الحيوية'),
(610, 'Ceramic Sciences and Engineering', 'العلوم السيراميك والهندسة'),
(611, 'Ceramic Sciences and Engineering', 'العلوم السيراميك والهندسة'),
(612, 'Chemical Engineering', 'الهندسة الكيميائية'),
(613, 'Chemical and Biomolecular Engineering', 'هندسة الكيميائية والبيولوجية'),
(614, 'Chemical Engineering', 'الهندسة الكيميائية'),
(615, 'Civil Engineering', 'هندسه مدنيه'),
(616, 'Civil Engineering', 'هندسه مدنيه'),
(617, 'Geotechnical and Geoenvironmental Engineering', 'الهندسة الجيوتقنية وGeoenvironmental'),
(618, 'Structural Engineering', 'الهندسة الإنشائية'),
(619, 'Transportation and Highway Engineering', 'النقل وهندسة الطرق السريعة'),
(620, 'Water Resources Engineering', 'هندسة الموارد المائية'),
(621, 'Computer Engineering', 'هندسة حاسوب'),
(622, 'Computer Engineering', 'هندسة حاسوب'),
(623, 'Computer Hardware Engineering', 'الهندسة الكمبيوترات و قطع الغيار'),
(624, 'Computer Software Engineering', 'هندسة برامج الكمبيوتر'),
(625, 'Construction Engineering', 'هندسة البناء'),
(626, 'Construction Engineering', 'هندسة البناء'),
(627, 'Electrical, Electronics and Communications Engineering', 'الكهربائية، هندسة الالكترونيات والاتصالات'),
(628, 'Electrical and Electronics Engineering', 'الهندسة الكهربائية والإلكترونيات'),
(629, 'Laser and Optical Engineering', 'الليزر والهندسة الضوئية'),
(630, 'Telecommunications Engineering', 'هندسه اتصالات'),
(631, 'Electromechanical Engineering', 'الهندسة الكهروميكانيكية'),
(632, 'Electromechanical Engineering', 'الهندسة الكهروميكانيكية'),
(633, 'Engineering Chemistry', 'الكيمياء والهندسة'),
(634, 'Engineering Chemistry', 'الكيمياء والهندسة'),
(635, 'Engineering Mechanics', 'ميكانيكا هندسة'),
(636, 'Engineering Mechanics', 'ميكانيكا هندسة'),
(637, 'Engineering Physics', 'الفيزياء الهندسية'),
(638, 'Engineering Physics/Applied Physics', 'الفيزياء الهندسية / الفيزياء التطبيقية'),
(639, 'Engineering Science', 'علم الهندسة'),
(640, 'Engineering Science', 'علم الهندسة'),
(641, 'Engineering', 'هندسة'),
(642, 'Engineering', 'هندسة'),
(643, 'Pre-Engineering', 'قبل الهندسة'),
(644, 'Environmental/Environmental Health Engineering', 'البيئة / الهندسة البيئية الصحة'),
(645, 'Environmental/Environmental Health Engineering', 'البيئة / الهندسة البيئية الصحة'),
(646, 'Forest Engineering', 'هندسة الغابات'),
(647, 'Forest Engineering', 'هندسة الغابات'),
(648, 'Geological/Geophysical Engineering', 'الجيولوجية / الهندسة الجيوفيزيائية'),
(649, 'Geological/Geophysical Engineering', 'الجيولوجية / الهندسة الجيوفيزيائية'),
(650, 'Industrial Engineering', 'الهندسة الصناعية'),
(651, 'Industrial Engineering', 'الهندسة الصناعية'),
(652, 'Manufacturing Engineering', 'هندسة التصنيع'),
(653, 'Manufacturing Engineering', 'هندسة التصنيع'),
(654, 'Materials Engineering', 'هندسة المواد'),
(655, 'Materials Engineering', 'هندسة المواد'),
(656, 'Mechanical Engineering', 'هندسة ميكانيك'),
(657, 'Mechanical Engineering', 'هندسة ميكانيك'),
(658, 'Mechatronics, Robotics, and Automation Engineering', 'هندسة الميكاترونكس، والروبوتات، وأتمتة الهندسة'),
(659, 'Mechatronics, Robotics, and Automation Engineering', 'هندسة الميكاترونكس، والروبوتات، وأتمتة الهندسة'),
(660, 'Metallurgical Engineering', 'الهندسة المدنية'),
(661, 'Metallurgical Engineering', 'الهندسة المدنية'),
(662, 'Mining and Mineral Engineering', 'هندسة التعدين'),
(663, 'Mining and Mineral Engineering', 'هندسة التعدين'),
(664, 'Naval Architecture and Marine Engineering', 'هندسة المنشآت البحرية والهندسة البحرية'),
(665, 'Naval Architecture and Marine Engineering', 'هندسة المنشآت البحرية والهندسة البحرية'),
(666, 'Nuclear Engineering', 'الهندسة النووية'),
(667, 'Nuclear Engineering', 'الهندسة النووية'),
(668, 'Ocean Engineering', 'هندسة المحيطات'),
(669, 'Ocean Engineering', 'هندسة المحيطات'),
(670, 'Operations Research', 'بحوث العمليات'),
(671, 'Operations Research', 'بحوث العمليات'),
(672, 'Paper Science and Engineering', 'ورقة للعلوم والهندسة'),
(673, 'Paper Science and Engineering', 'ورقة للعلوم والهندسة'),
(674, 'Petroleum Engineering', 'هندسة نفط'),
(675, 'Petroleum Engineering', 'هندسة نفط'),
(676, 'Polymer/Plastics Engineering', 'البوليمر / هندسة البلاستيك'),
(677, 'Polymer/Plastics Engineering', 'البوليمر / هندسة البلاستيك'),
(678, 'Surveying Engineering', 'هندسة المساحة'),
(679, 'Surveying Engineering', 'هندسة المساحة'),
(680, 'Systems Engineering', 'هندسة النظم'),
(681, 'Systems Engineering', 'هندسة النظم'),
(682, 'Textile Sciences and Engineering', 'علوم النسيج وهندسته'),
(683, 'Textile Sciences and Engineering', 'علوم النسيج وهندسته'),
(684, 'English Language and Literature/letters', 'اللغة الإنجليزية وآدابها / رسائل'),
(685, 'English Language and Literature', 'اللغة الإنجليزية وآدابها'),
(686, 'English Language and Literature', 'اللغة الإنجليزية وآدابها'),
(687, 'Literature', 'أدب'),
(688, 'American Literature (Canadian)', 'الأدب الأمريكي (الكندية)'),
(689, 'American Literature (United States)', 'الأدب الأمريكي (الولايات المتحدة الأمريكية)'),
(690, 'Children''s and Adolescent Literature', 'أطفال والمراهقين الأدب'),
(691, 'English Literature (British and Commonwealth)', 'الأدب الإنجليزي (البريطانية والكومنولث)'),
(692, 'General Literature', 'الأدب العام'),
(693, 'Rhetoric and Composition/Writing Studies', 'البلاغة والتأليف الدراسات / الكتابة'),
(694, 'Creative Writing', 'الكتابة الإبداعية'),
(695, 'Professional, Technical, Business, and Scientific Writing', 'الفنية والتقنية، والأعمال التجارية، والعلمية الكتابة'),
(696, 'Rhetoric and Composition', 'البلاغة والتأليف'),
(697, 'Writing', 'كتابة'),
(698, 'Family and Consumer Sciences/human Sciences', 'علوم الأسرة والمستهلك / علوم الإنسان'),
(699, 'Apparel and Textiles', 'ملابس والمنسوجات'),
(700, 'Apparel and Textile Manufacture', 'الملابس والنسيج صناعة'),
(701, 'Apparel and Textile Marketing Management', 'إدارة الملابس والنسيج التسويق'),
(702, 'Apparel and Textiles', 'ملابس والمنسوجات'),
(703, 'Fashion and Fabric Consultant', 'الأزياء والنسيج استشاري'),
(704, 'Textile Science', 'العلوم النسيج');
INSERT INTO `major` (`major_id`, `major_name_en`, `major_name_ar`) VALUES
(705, 'Family and Consumer Economics and Related Studies', 'دراسات الأسرية والاقتصاد المستهلك وذات علاقة'),
(706, 'Consumer Economics', 'الاقتصاد المستهلك'),
(707, 'Consumer Services and Advocacy', 'الخدمات الاستهلاكية والدعوة'),
(708, 'Family Resource Management Studies', 'دراسات إدارة الموارد الأسرية'),
(709, 'Family and Consumer Sciences/Human Sciences Business Services', 'علوم الأسرة والمستهلك / العلوم الإنسانية خدمات رجال'),
(710, 'Business Family and Consumer Sciences/Human Sciences', 'الشركات العائلية وعلوم المستهلك / العلوم الإنسانية'),
(711, 'Consumer Merchandising/Retailing Management', 'تجارة المستهلك / إدارة البيع بالتجزئة'),
(712, 'Family and Consumer Sciences/Human Sciences Communication', 'علوم الأسرة والمستهلك / العلوم الإنسانية الاتصالات'),
(713, 'Family and Consumer Sciences/Human Sciences', 'علوم الأسرة والمستهلك / العلوم الإنسانية'),
(714, 'Family and Consumer Sciences/Human Sciences', 'علوم الأسرة والمستهلك / العلوم الإنسانية'),
(715, 'Foods, Nutrition, and Related Services', 'الأطعمة والتغذية وخدمات مرتبطة بها'),
(716, 'Foods, Nutrition, and Wellness Studies', 'أطعمة، دراسات التغذية والعافية'),
(717, 'Foodservice Systems Administration/Management', 'خدمات الطعام ادارة نظم المعلومات / إدارة'),
(718, 'Human Nutrition', 'التغذية البشرية'),
(719, 'Housing and Human Environments', 'الإسكان والبيئات الإنسان'),
(720, 'Facilities Planning and Management', 'مرافق التخطيط والإدارة'),
(721, 'Home Furnishings and Equipment Installers', 'المفروشات المنزلية ومعدات التركيب'),
(722, 'Housing and Human Environments', 'الإسكان والبيئات الإنسان'),
(723, 'Human Development, Family Studies, and Related Services', 'التنمية البشرية، دراسات الأسرية وخدمات مرتبطة بها'),
(724, 'Adult Development and Aging', 'التنمية الكبار والشيخوخة'),
(725, 'Child Care and Support Services Management', 'رعاية الطفل وإدارة خدمات الدعم'),
(726, 'Child Care Provider/Assistant', 'مزود رعاية الطفل / مساعد'),
(727, 'Child Development', 'تنمية الطفل'),
(728, 'Developmental Services Worker', 'الخدمات التنموية العمال'),
(729, 'Family and Community Services', 'خدمة المجتمع والأسرة'),
(730, 'Family Systems', 'نظم الأسرة'),
(731, 'Human Development and Family Studies', 'التنمية البشرية ودراسات الأسرة'),
(732, 'Foreign Languages, Literatures, and Linguistics', 'اللغات الأجنبية، الآداب، وعلم اللغة'),
(733, 'African Languages, Literatures, and Linguistics', 'اللغات الإفريقية، الآداب، وعلم اللغة'),
(734, 'African Languages, Literatures, and Linguistics', 'اللغات الإفريقية، الآداب، وعلم اللغة'),
(735, 'American Indian/Native American Languages, Literatures, and Linguistics', 'الأمريكية الهندية / الأميركيين الأصليين اللغات والآداب، وعلم اللغة'),
(736, 'American Indian/Native American Languages, Literatures, and Linguistics', 'الأمريكية الهندية / الأميركيين الأصليين اللغات والآداب، وعلم اللغة'),
(737, 'American Sign Language', 'لغة الإشارة الأمريكية'),
(738, 'American Sign Language (ASL)', 'لغة الإشارة الأمريكية (ASL)'),
(739, 'Sign Language Interpretation and Translation', 'توقيع تفسير اللغة والترجمة'),
(740, 'Celtic Languages, Literatures, and Linguistics', 'سلتيك اللغات، والآداب، وعلم اللغة'),
(741, 'Celtic Languages, Literatures, and Linguistics', 'سلتيك اللغات، والآداب، وعلم اللغة'),
(742, 'Classics and Classical Languages, Literatures, and Linguistics', 'الكلاسيكية واللغات الكلاسيكية، الآداب، وعلم اللغة'),
(743, 'Ancient/Classical Greek Language and Literature', 'القديمة / الكلاسيكية اللغة اليونانية وآدابها'),
(744, 'Latin Language and Literature', 'اللغة اللاتينية والأدب'),
(745, 'East Asian Languages, Literatures, and Linguistics', 'شرق آسيا اللغات والآداب، وعلم اللغة'),
(746, 'Chinese Language and Literature', 'اللغة الصينية وآدابها'),
(747, 'Japanese Language and Literature', 'اللغة اليابانية والأدب'),
(748, 'Korean Language and Literature', 'اللغة الكورية والأدب'),
(749, 'Tibetan Language and Literature', 'اللغة التبتية والأدب'),
(750, 'Germanic Languages, Literatures, and Linguistics', 'الجرمانية اللغات، والآداب، وعلم اللغة'),
(751, 'Danish Language and Literature', 'اللغة الدنماركية والأدب'),
(752, 'Dutch/Flemish Language and Literature', 'الهولندية اللغة الفلمنكية / والأدب'),
(753, 'German Language and Literature', 'اللغة الألمانية وآدابها'),
(754, 'Norwegian Language and Literature', 'اللغة النرويجية والأدب'),
(755, 'Scandinavian Languages, Literatures, and Linguistics', 'الاسكندنافية اللغات، والآداب، وعلم اللغة'),
(756, 'Swedish Language and Literature', 'اللغة السويدية والأدب'),
(757, 'Iranian/Persian Languages, Literatures, and Linguistics', 'الإيرانية / الفارسي اللغات والآداب، وعلم اللغة'),
(758, 'Iranian Languages, Literatures, and Linguistics', 'اللغات الإيرانية، الآداب، وعلم اللغة'),
(759, 'Linguistic, Comparative, and Related Language Studies and Services', 'دراسات اللغة اللغوية، المقارن، وما يتصل والخدمات'),
(760, 'Applied Linguistics', 'اللغويات التطبيقية'),
(761, 'Comparative Literature', 'الأدب المقارن'),
(762, 'Foreign Languages and Literatures', 'اللغات الأجنبية والآداب'),
(763, 'Language Interpretation and Translation', 'تفسير اللغة والترجمة'),
(764, 'Linguistics', 'علم اللغة'),
(765, 'Middle/Near Eastern and Semitic Languages, Literatures, and Linguistics', 'الشرق / الشرق الأدنى واللغات السامية، والآداب، وعلم اللغة'),
(766, 'Ancient Near Eastern and Biblical Languages, Literatures, and Linguistics', 'القديمة الشرق الأدنى واللغات الكتابية، الآداب، وعلم اللغة'),
(767, 'Arabic Language and Literature', 'اللغة العربية وآدابها'),
(768, 'Hebrew Language and Literature', 'اللغة العبرية وآدابها'),
(769, 'Modern Greek Language and Literature', 'اللغة اليونانية الحديثة والأدب'),
(770, 'Modern Greek Language and Literature', 'اللغة اليونانية الحديثة والأدب'),
(771, 'Romance Languages, Literatures, and Linguistics', 'الرومانسية اللغات، والآداب، وعلم اللغة'),
(772, 'Catalan Language and Literature', 'التشيكية اللغة والأدب'),
(773, 'French Language and Literature', 'اللغة الفرنسية وآدابها'),
(774, 'Hispanic and Latin American Languages, Literatures, and Linguistics', 'من أصل اسباني وأمريكا اللاتينية اللغات، الآداب، وعلم اللغة'),
(775, 'Italian Language and Literature', 'اللغة الإيطالية والأدب'),
(776, 'Portuguese Language and Literature', 'اللغة البرتغالية والأدب'),
(777, 'Romanian Language and Literature', 'اللغة الرومانية وآدابها'),
(778, 'Spanish Language and Literature', 'اللغة الأسبانية وآدابها'),
(779, 'Slavic Languages, Literatures, and Linguistics', 'اللغات السلافية، الآداب، وعلم اللغة'),
(780, 'Albanian Language and Literature', 'اللغة الألبانية والأدب'),
(781, 'Baltic Languages, Literatures, and Linguistics', 'البلطيق اللغات والآداب، وعلم اللغة'),
(782, 'Bosnian, Serbian, and Croatian Languages and Literatures', 'البوسنية والصربية والكرواتية واللغات والآداب'),
(783, 'Bulgarian Language and Literature', 'اللغة البلغارية والأدب'),
(784, 'Czech Language and Literature', 'التشيكية اللغة والأدب'),
(785, 'Polish Language and Literature', 'اللغة البولندية وآدابها'),
(786, 'Russian Language and Literature', 'اللغة والأدب الروسي'),
(787, 'Slovak Language and Literature', 'السلوفاكية اللغة والأدب'),
(788, 'Ukrainian Language and Literature', 'اللغة الأوكرانية والأدب'),
(789, 'South Asian Languages, Literatures, and Linguistics', 'جنوب آسيا اللغات والآداب، وعلم اللغة'),
(790, 'Bengali Language and Literature', 'البنغالية اللغة والأدب'),
(791, 'Hindi Language and Literature', 'الهندية اللغة والأدب'),
(792, 'Punjabi Language and Literature', 'البنجابية اللغة والأدب'),
(793, 'Sanskrit and Classical Indian Languages, Literatures, and Linguistics', 'السنسكريتية واللغات الهندية الكلاسيكية، الآداب، وعلم اللغة'),
(794, 'Tamil Language and Literature', 'اللغة التاميلية والأدب'),
(795, 'Urdu Language and Literature', 'الأردية اللغة والأدب'),
(796, 'Southeast Asian and Australasian/Pacific Languages, Literatures, and Linguistics', 'جنوب شرق آسيا والأسترالية / المحيط الهادئ اللغات، والآداب، وعلم اللغة'),
(797, 'Australian/Oceanic/Pacific Languages, Literatures, and Linguistics', 'الاسترالية / محيطات / المحيط الهادئ اللغات والآداب، وعلم اللغة'),
(798, 'Burmese Language and Literature', 'اللغة البورمية والأدب'),
(799, 'Filipino/Tagalog Language and Literature', 'الفلبينية / التغالوغ اللغة والأدب'),
(800, 'Indonesian/Malay Languages and Literatures', 'الاندونيسية / الماليزية اللغات والآداب'),
(801, 'Khmer/Cambodian Language and Literature', 'الخمير / الكمبودي اللغة والأدب'),
(802, 'Lao Language and Literature', 'لاو والأدب'),
(803, 'Thai Language and Literature', 'اللغة التايلاندية والأدب'),
(804, 'Vietnamese Language and Literature', 'اللغة الفيتنامية والأدب'),
(805, 'Turkic, Uralic-Altaic, Caucasian, and Central Asian Languages, Literatures, and Linguistics', 'بالتركية، الأورالية-التاى، القوقاز، وآسيا الوسطى اللغات، والآداب، وعلم اللغة'),
(806, 'Hungarian/Magyar Language and Literature', 'الهنغارية / المجرية اللغة والأدب'),
(807, 'Mongolian Language and Literature', 'اللغة المنغولية والأدب'),
(808, 'Turkish Language and Literature', 'اللغة التركية وآدابها'),
(809, 'Uralic Languages, Literatures, and Linguistics', 'الأورالية اللغات، والآداب، وعلم اللغة'),
(810, 'Health Professions and Related Programs', 'المهن الصحية والبرامج ذات الصلة'),
(811, 'Health and Wellness', 'بصحة والعافية'),
(812, 'Advanced/Graduate Dentistry and Oral Sciences', 'المتقدم / دراسات عليا طب الأسنان وعلوم الفم'),
(813, 'Advanced General Dentistry', 'طب الأسنان العام المتقدم'),
(814, 'Dental Clinical Sciences', 'العلوم السريرية طب الأسنان'),
(815, 'Dental Materials', 'مواد طب الأسنان'),
(816, 'Dental Public Health and Education', 'طب الأسنان الصحة العامة والتعليم'),
(817, 'Endodontics/Endodontology', 'حشو الأسنان / طب لب الأسنان'),
(818, 'Oral Biology and Oral and Maxillofacial Pathology', 'علم الأحياء عن طريق الفم وأمراض الفم والوجه والفكين'),
(819, 'Oral/Maxillofacial Surgery', 'عن طريق الفم / جراحة الوجه والفكين'),
(820, 'Orthodontics/Orthodontology', 'تقويم الأسنان / طب تقويم الأسنان'),
(821, 'Pediatric Dentistry/Pedodontics', 'طب أسنان الأطفال / أسنان الأطفال'),
(822, 'Periodontics/Periodontology', 'اللثة / اللثة'),
(823, 'Prosthodontics/Prosthodontology', 'التركيبات / Prosthodontology'),
(824, 'Allied Health and Medical Assisting Services', 'الخدمات المساعدة الطبية المساعدة والطبية'),
(825, 'Anesthesiologist Assistant', 'مساعد طبيب التخدير'),
(826, 'Chiropractic Assistant/Technician', 'مساعد بتقويم العمود الفقري / فني'),
(827, 'Clinical/Medical Laboratory Assistant', 'السريرية / مساعد المختبرات الطبية'),
(828, 'Emergency Care Attendant (EMT Ambulance)', 'العناية الطارئة المصاحبة (EMT الإسعاف)'),
(829, 'Lactation Consultant', 'الرضاعة استشاري'),
(830, 'Medical/Clinical Assistant', 'طب / مساعد السريرية'),
(831, 'Occupational Therapist Assistant', 'مساعد العلاج الطبيعي المهني'),
(832, 'Pathology/Pathologist Assistant', 'علم الأمراض / مساعد علم الأمراض'),
(833, 'Pharmacy Technician/Assistant', 'فني الصيدلة / مساعد'),
(834, 'Physical Therapy Technician/Assistant', 'العلاج الفيزيائي فني / مساعد'),
(835, 'Radiologist Assistant', 'مساعد طبيب الأشعة'),
(836, 'Respiratory Therapy Technician/Assistant', 'الجهاز التنفسي العلاج فني / مساعد'),
(837, 'Speech-Language Pathology Assistant', 'النطق واللغة مساعد علم الأمراض'),
(838, 'Veterinary/Animal Health Technology/Technician and Veterinary Assistant', 'البيطرية / الحيوانية التكنولوجيا الصحية / فني ومساعد والبيطرية'),
(839, 'Allied Health Diagnostic, Intervention, and Treatment Professions', 'الحلفاء الصحة التشخيص والتدخل والعلاج والمهن'),
(840, 'Athletic Training/Trainer', 'التدريب الرياضي / المدرب'),
(841, 'Cardiopulmonary Technology/Technologist', 'القلبي تكنولوجيا / تقني'),
(842, 'Cardiovascular Technology/Technologist', 'تقنية القلب والأوعية الدموية / تقني'),
(843, 'Diagnostic Medical Sonography/Sonographer and Ultrasound Technician', 'التشخيص الطبي بالموجات فوق الصوتية / مخطط الصدى والموجات فوق الصوتية فني'),
(844, 'Electrocardiograph Technology/Technician', 'تخطيط القلب تقنية / فني'),
(845, 'Electroneurodiagnostic/Electroencephalographic Technology/Technologist', 'التشخيص العصبي الكهربي / الكهربي تكنولوجيا / تقني'),
(846, 'Emergency Medical Technology/Technician (EMT Paramedic)', 'الطوارئ الطبية / فني (EMT الإسعاف)'),
(847, 'Gene/Genetic Therapy', 'جين / العلاج الجيني'),
(848, 'Hearing Instrument Specialist', 'سماع أخصائي صك'),
(849, 'Magnetic Resonance Imaging (MRI) Technology/Technician', 'التصوير بالرنين المغناطيسي (MRI) تقنية / فني'),
(850, 'Mammography Technician/Technology', 'التصوير الشعاعي للثدي فني / تكنولوجيا'),
(851, 'Medical Radiologic Technology/Science - Radiation Therapist', 'الطبية إشعاعي تكنولوجيا / علوم - الإشعاع المعالج'),
(852, 'Nuclear Medical Technology/Technologist', 'النووية التكنولوجيا الطبية / تقني'),
(853, 'Perfusion Technology/Perfusionist', 'نضح تكنولوجيا / اختصاصي الإرواء'),
(854, 'Physician Assistant', 'مساعد طبيب'),
(855, 'Polysomnography', 'دراسة النوم'),
(856, 'Radiation Protection/Health Physics Technician', 'الحماية من الإشعاع / صحة الفيزياء فني'),
(857, 'Radiologic Technology/Science - Radiographer', 'إشعاعي تكنولوجيا / علوم - فني الأشعة'),
(858, 'Respiratory Care Therapy/Therapist', 'الجهاز التنفسي العناية العلاج / المعالج'),
(859, 'Surgical Technology/Technologist', 'تقنية جراحية / تقني'),
(860, 'Alternative and Complementary Medical Support Services', 'خدمات الدعم الطبي البديلة والتكميلية'),
(861, 'Direct Entry Midwifery', 'المباشرة القبالة الدخول'),
(862, 'Alternative and Complementary Medicine and Medical Systems', 'الطب و طب أنظمة بديلة ومكملة'),
(863, 'Acupuncture and Oriental Medicine', 'الوخز بالإبر والطب الشرقية'),
(864, 'Ayurvedic Medicine/Ayurveda', 'الايورفيدا الطب / الأيورفيدا'),
(865, 'Holistic Health', 'كلية الصحة'),
(866, 'Homeopathic Medicine/Homeopathy', 'الطب المثلية / المثلية'),
(867, 'Naturopathic Medicine/Naturopathy', 'ناتوروباتشيك الطب / العلاج الطبيعي'),
(868, 'Traditional Chinese Medicine and Chinese Herbology', 'الطب الصيني التقليدي وعلم الأعشاب الصينية'),
(869, 'Bioethics/Medical Ethics', 'أخلاقيات علم الأحياء / آداب مهنة الطب'),
(870, 'Bioethics/Medical Ethics', 'أخلاقيات علم الأحياء / آداب مهنة الطب'),
(871, 'Chiropractic', 'العلاج بتقويم العمود الفقري'),
(872, 'Chiropractic', 'العلاج بتقويم العمود الفقري'),
(873, 'Clinical/Medical Laboratory Science/Research and Allied Professions', 'السريرية / علوم المختبرات الطبية / البحوث والمهن'),
(874, 'Blood Bank Technology Specialist', 'الدم أخصائي تكنولوجيا البنك'),
(875, 'Clinical Laboratory Science/Medical Technology/Technologist', 'علوم المختبرات السريرية / التكنولوجيا الطبية / تقني'),
(876, 'Clinical/Medical Laboratory Technician', 'السريرية / فني مختبر طبي'),
(877, 'Cytogenetics/Genetics/Clinical Genetics Technology/Technologist', 'علم الوراثة الخلوية / علم الوراثة / علم الوراثة السريرية تكنولوجيا / تقني'),
(878, 'Cytotechnology/Cytotechnologist', 'تكنولوجيا خلوية / تقني السيتولوجيا'),
(879, 'Hematology Technology/Technician', 'تقنية أمراض الدم / فني'),
(880, 'Histologic Technician', 'نسيجية فني'),
(881, 'Histologic Technology/Histotechnologist', 'نسيجية تكنولوجيا / Histotechnologist'),
(882, 'Ophthalmic Laboratory Technology/Technician', 'العيون تقنية المختبرات / فني'),
(883, 'Phlebotomy Technician/Phlebotomist', 'الفصد فني / فصاد'),
(884, 'Renal/Dialysis Technologist/Technician', 'كلوي / غسيل الكلى تقني / فني'),
(885, 'Sterile Processing Technology/Technician', 'عقيمة تكنولوجيا معالجة / فني'),
(886, 'Communication Disorders Sciences and Services', 'اضطرابات التواصل العلوم والخدمات'),
(887, 'Audiology/Audiologist', 'السمع / اختصاصي السمع'),
(888, 'Audiology/Audiologist and Speech-Language Pathology/Pathologist', 'السمع / اختصاصي السمع والنطق واللغة علم الأمراض / علم الأمراض'),
(889, 'Communication Sciences and Disorders', 'علوم الاتصال واضطرابات'),
(890, 'Speech-Language Pathology/Pathologist', 'النطق واللغة علم الأمراض / علم الأمراض'),
(891, 'Dental Support Services and Allied Professions', 'خدمات الدعم الأسنان والمهن'),
(892, 'Dental Assisting/Assistant', 'الأسنان مساعدة / مساعد'),
(893, 'Dental Hygiene/Hygienist', 'صحة الأسنان / المساعد الصحي'),
(894, 'Dental Laboratory Technology/Technician', 'الأسنان تقنية المختبرات / فني'),
(895, 'Dentistry', 'طب الاسنان'),
(896, 'Dentistry', 'طب الاسنان'),
(897, 'Dietetics and Clinical Nutrition Services', 'علم التغذية والخدمات تغذية السريرية'),
(898, 'Clinical Nutrition/Nutritionist', 'التغذية السريرية / التغذية'),
(899, 'Dietetic Technician', 'فني الحمية'),
(900, 'Dietetics/Dietitian', 'علم التغذية / اختصاصي تغذية'),
(901, 'Dietitian Assistant', 'مساعد اختصاصي تغذية'),
(902, 'Energy and Biologically Based Therapies', 'الطاقة وبيولوجيا وبناء العلاجات'),
(903, 'Aromatherapy', 'الروائح'),
(904, 'Herbalism/Herbalist', 'أعشاب طبية / بالأعشاب'),
(905, 'Polarity Therapy', 'العلاج قطبية'),
(906, 'Reiki', 'الريكي'),
(907, 'Health Aides/Attendants/Orderlies', 'مساعدون الصحية / الحضور / الممرضون'),
(908, 'Health Aide', 'معاون الصحة'),
(909, 'Home Health Aide/Home Attendant', 'الصحية المنزلية مساعد / المصاحبة الرئيسية'),
(910, 'Medication Aide', 'دواء مساعد'),
(911, 'Rehabilitation Aide', 'معاون إعادة التأهيل'),
(912, 'Health and Medical Administrative Services', 'الصحة والخدمات الإدارية الطبية'),
(913, 'Clinical Research Coordinator', 'منسق البحوث السريرية'),
(914, 'Health Information/Medical Records Administration/Administrator', 'معلومات صحية / إدارة السجلات الطبية / مدير'),
(915, 'Health Information/Medical Records Technology/Technician', 'معلومات الصحية / الطبية السجلات تكنولوجيا / فني'),
(916, 'Health Unit Coordinator/Ward Clerk', 'منسق وحدة الصحة / وارد كاتب'),
(917, 'Health Unit Manager/Ward Supervisor', 'مدير وحدة الصحة / وارد المشرف'),
(918, 'Health/Health Care Administration/Management', 'الصحة / إدارة الرعاية الصحية / إدارة'),
(919, 'Health/Medical Claims Examiner', 'الصحة / الطبية المطالبات ممتحن'),
(920, 'Hospital and Health Care Facilities Administration/Management', 'المستشفيات وإدارة الرعاية الصحية / مرافق للإدارة'),
(921, 'Long Term Care Administration/Management', 'إدارة الرعاية طويلة الأمد / إدارة'),
(922, 'Medical Administrative/Executive Assistant and Medical Secretary', 'الإدارية الطبية / المساعد التنفيذي والأمين الطبية'),
(923, 'Medical Insurance Coding Specialist/Coder', 'التأمين الطبي التخصصي الترميز / المبرمج'),
(924, 'Medical Insurance Specialist/Medical Biller', 'أخصائي التأمين الطبي / الفواتير الطبية'),
(925, 'Medical Office Assistant/Specialist', 'مساعد Office الطبية / التخصصي'),
(926, 'Medical Office Computer Specialist/Assistant', 'أخصائي مكتب الطبية الحاسوب / مساعد'),
(927, 'Medical Office Management/Administration', 'إدارة المكاتب الطبية / إدارة'),
(928, 'Medical Reception/Receptionist', 'الاستقبال الطبي / موظف استقبال'),
(929, 'Medical Staff Services Technology/Technician', 'موظفي خدمات التكنولوجيا الطبية / فني'),
(930, 'Medical Transcription/Transcriptionist', 'النسخ الطبي / ناسخة'),
(931, 'Medical/Health Management and Clinical Assistant/Specialist', 'طب / إدارة الصحة ومساعد السريرية / التخصصي'),
(932, 'Health/Medical Preparatory Programs', 'الصحة / البرامج التحضيرية الطبية'),
(933, 'Pre-Chiropractic Studies', 'دراسات ما قبل العلاج بتقويم العمود الفقري'),
(934, 'Pre-Dentistry Studies', 'ما قبل طب الأسنان الدراسات'),
(935, 'Pre-Medicine/Pre-Medical Studies', 'ما قبل الطب / الدراسات ما قبل الطبية'),
(936, 'Pre-Nursing Studies', 'دراسات ما قبل التمريض'),
(937, 'Pre-Occupational Therapy Studies', 'ما قبل المهني الدراسات العلاج'),
(938, 'Pre-Optometry Studies', 'قبل البصريات الدراسات'),
(939, 'Pre-Pharmacy Studies', 'ما قبل الصيدلة الدراسات'),
(940, 'Pre-Physical Therapy Studies', 'الدراسات قبل العلاج الطبيعي'),
(941, 'Pre-Veterinary Studies', 'دراسات ما قبل الطب البيطري'),
(942, 'Medical Clinical Sciences/Graduate Medical Studies', 'العلوم السريرية الطبية / الدراسات الطبية العليا'),
(943, 'Medical Scientist', 'عالم الطبية'),
(944, 'Medical Illustration and Informatics', 'توضيحات الطبية والمعلوماتية'),
(945, 'Medical Illustration/Medical Illustrator', 'توضيحات الطبي / المصور الطبية'),
(946, 'Medical Informatics', 'المعلوماتية الطبية'),
(947, 'Medicine', 'علم الطب'),
(948, 'Medicine', 'علم الطب'),
(949, 'Mental and Social Health Services and Allied Professions', 'العقلية والاجتماعية الخدمات الصحية والمهن'),
(950, 'Clinical Pastoral Counseling/Patient Counseling', 'الإرشاد الرعوية السريرية / الإرشاد المرضى'),
(951, 'Clinical/Medical Social Work', 'السريرية / الطبية العمل الاجتماعي'),
(952, 'Community Health Services/Liaison/Counseling', 'خدمات صحة المجتمع / الاتصال / الإرشاد'),
(953, 'Genetic Counseling/Counselor', 'الاستشارة الوراثية / المستشار'),
(954, 'Marriage and Family Therapy/Counseling', 'الزواج والعلاج الأسري / الإرشاد'),
(955, 'Mental Health Counseling/Counselor', 'الصحة النفسية الإرشاد / المستشار'),
(956, 'Psychiatric/Mental Health Services Technician', 'الطب النفسي / الصحة النفسية خدمات فني'),
(957, 'Substance Abuse/Addiction Counseling', 'إساءة استعمال المواد المخدرة / الإدمان الإرشاد'),
(958, 'Movement and Mind-Body Therapies and Education', 'الحركة والعقل والجسم العلاج والتعليم'),
(959, 'Movement Therapy and Movement Education', 'حركة العلاج وحركة التعليم'),
(960, 'Yoga Teacher Training/Yoga Therapy', 'اليوغا تدريب المعلمين / العلاج اليوغا'),
(961, 'Ophthalmic and Optometric Support Services and Allied Professions', 'خدمات الدعم العيون ومتعلق بإخصائي النظارات والمهن'),
(962, 'Ophthalmic Technician/Technologist', 'فني طب العيون / تقني'),
(963, 'Opticianry/Ophthalmic Dispensing Optician', 'البصريات / العيون التركيب النظاراتي'),
(964, 'Optometric Technician/Assistant', 'فني متعلق بإخصائي النظارات / مساعد'),
(965, 'Orthoptics/Orthoptist', 'تقويم البصر / مقوم البصر'),
(966, 'Optometry', 'قياس مدى البصر'),
(967, 'Optometry', 'قياس مدى البصر'),
(968, 'Osteopathic Medicine/Osteopathy', 'الطب التقويمي / تجبير العظام'),
(969, 'Osteopathic Medicine/Osteopathy', 'الطب التقويمي / تجبير العظام'),
(970, 'Pharmacy, Pharmaceutical Sciences, and Administration', 'الصيدلة، العلوم الصيدلية، والإدارة'),
(971, 'Clinical and Industrial Drug Development', 'السريرية وتطوير العقاقير الصناعية'),
(972, 'Clinical, Hospital, and Managed Care Pharmacy', 'السريرية، الصيدلة العناية مستشفى، وإدارتها'),
(973, 'Industrial and Physical Pharmacy and Cosmetic Sciences', 'الصيدلة الصناعية والعلوم الفيزيائية ومستحضرات التجميل'),
(974, 'Medicinal and Pharmaceutical Chemistry', 'الطبية والكيمياء الصيدلية'),
(975, 'Natural Products Chemistry and Pharmacognosy', 'المنتجات الطبيعية الكيمياء والعقاقير'),
(976, 'Pharmaceutical Marketing and Management', 'تسويق الأدوية وإدارة'),
(977, 'Pharmaceutical Sciences', 'العلوم الصيدلانية'),
(978, 'Pharmaceutics and Drug Design', 'المستحضرات الصيدلانية والعقاقير تصميم'),
(979, 'Pharmacoeconomics/Pharmaceutical Economics', 'اقتصاديات الدواء / اقتصاد الدوائية'),
(980, 'Pharmacy', 'صيدلية'),
(981, 'Pharmacy Administration and Pharmacy Policy and Regulatory Affairs', 'إدارة الصيدلة وسياسة الصيدلة والشؤون التنظيمية'),
(982, 'Podiatric Medicine/Podiatry', 'الطب العناية بالقدم / طب الأقدام'),
(983, 'Podiatric Medicine/Podiatry', 'الطب العناية بالقدم / طب الأقدام'),
(984, 'Practical Nursing, Vocational Nursing and Nursing Assistants', 'التمريض العملي، التمريض المهني والتمريض مساعدين'),
(985, 'Licensed Practical/Vocational Nurse Training', 'مرخص العملي / التدريب المهني ممرضة'),
(986, 'Nursing Assistant/Aide and Patient Care Assistant/Aide', 'مساعد التمريض / معاون ورعاية المرضى مساعد / مساعد'),
(987, 'Public Health', 'الصحة العامة'),
(988, 'Behavioral Aspects of Health', 'الجوانب السلوكية للصحة'),
(989, 'Community Health and Preventive Medicine', 'صحة المجتمع والطب الوقائي'),
(990, 'Environmental Health', 'الصحة البيئية'),
(991, 'Health Services Administration', 'إدارة الخدمات الصحية'),
(992, 'Health/Medical Physics', 'الصحة / الفيزياء الطبية'),
(993, 'International Public Health/International Health', 'الدولية الصحة العامة / الصحة الدولية'),
(994, 'Maternal and Child Health', 'صحة الأم والطفل'),
(995, 'Occupational Health and Industrial Hygiene', 'الصحة المهنية والنظافة الصناعية'),
(996, 'Public Health', 'الصحة العامة'),
(997, 'Public Health Education and Promotion', 'تعليم الصحة العمومية وتعزيز'),
(998, 'Registered Nursing, Nursing Administration, Nursing Research and Clinical Nursing', 'التمريض المسجلة، إدارة التمريض، بحوث التمريض والتمريض السريري'),
(999, 'Adult Health Nurse/Nursing', 'ممرضة الصحة الكبار / التمريض'),
(1000, 'Clinical Nurse Leader', 'السريرية زعيم ممرضة'),
(1001, 'Clinical Nurse Specialist', 'أخصائي ممرضة سريرية'),
(1002, 'Critical Care Nursing', 'الناقد تمريض العناية'),
(1003, 'Emergency Room/Trauma Nursing', 'غرفة الطوارئ / الصدمة التمريض'),
(1004, 'Family Practice Nurse/Nursing', 'الممارسة ممرضة الأسرة / التمريض'),
(1005, 'Geriatric Nurse/Nursing', 'ممرضة الشيخوخة / التمريض'),
(1006, 'Maternal/Child Health and Neonatal Nurse/Nursing', 'الأم / صحة الطفل وحديثي الولادة ممرضة / التمريض'),
(1007, 'Nurse Anesthetist', 'ممرضة التخدير'),
(1008, 'Nurse Midwife/Nursing Midwifery', 'ممرضة قابلة / التمريض القبالة'),
(1009, 'Nursing Administration', 'إدارة التمريض'),
(1010, 'Nursing Education', 'تعليم التمريض'),
(1011, 'Nursing Practice', 'ممارسة التمريض'),
(1012, 'Nursing Science', 'علوم التمريض'),
(1013, 'Occupational and Environmental Health Nursing', 'التمريض المهنية والصحة البيئية'),
(1014, 'Palliative Care Nursing', 'العناية التلطيفية التمريض'),
(1015, 'Pediatric Nurse/Nursing', 'ممرضة الأطفال / التمريض'),
(1016, 'Perioperative/Operating Room and Surgical Nurse/Nursing', 'العمليات الجراحية / غرفة عمليات وجراحة ممرضة / التمريض'),
(1017, 'Psychiatric/Mental Health Nurse/Nursing', 'الطب النفسي / ممرضة الصحة العقلية / التمريض'),
(1018, 'Public Health/Community Nurse/Nursing', 'الصحة العامة / المجتمعي ممرضة / التمريض'),
(1019, 'Registered Nursing/Registered Nurse', 'التمريض مسجل / ممرضة مسجلة'),
(1020, 'Women''s Health Nurse/Nursing', 'المرأة ممرضة الصحة / التمريض'),
(1021, 'Rehabilitation and Therapeutic Professions', 'إعادة التأهيل والعلاجية المهن'),
(1022, 'Animal-Assisted Therapy', 'العلاج بمساعدة الحيوانات'),
(1023, 'Art Therapy/Therapist', 'فن العلاج / المعالج'),
(1024, 'Assistive/Augmentative Technology and Rehabilitation Engineering', 'المساعدة / المعززة الهندسة والتكنولوجيا التأهيل'),
(1025, 'Dance Therapy/Therapist', 'الرقص العلاج / المعالج'),
(1026, 'Music Therapy/Therapist', 'العلاج بالموسيقى / المعالج'),
(1027, 'Occupational Therapy/Therapist', 'العلاج الوظيفي / المعالج'),
(1028, 'Orthotist/Prosthetist', 'أخصائي الأطراف الصناعية / تعويضات'),
(1029, 'Physical Therapy/Therapist', 'العلاج الفيزيائي / المعالج'),
(1030, 'Rehabilitation Science', 'علوم إعادة التأهيل'),
(1031, 'Therapeutic Recreation/Recreational Therapy', 'منتزهات العلاجية / العلاج الترفيهية'),
(1032, 'Vocational Rehabilitation Counseling/Counselor', 'التأهيل المهني الإرشاد / المستشار'),
(1033, 'Somatic Bodywork and Related Therapeutic Services', 'جسدية هيكل السيارة وخدمات مرتبطة بها العلاجية'),
(1034, 'Asian Bodywork Therapy', 'العلاج هيكل السيارة آسيا'),
(1035, 'Massage Therapy/Therapeutic Massage', 'العلاج بالتدليك / تدليك العلاجي'),
(1036, 'Somatic Bodywork', 'جسدية هيكل السيارة'),
(1037, 'Veterinary Biomedical and Clinical Sciences', 'الطبية الحيوية والطب البيطري والعلوم السريرية'),
(1038, 'Comparative and Laboratory Animal Medicine', 'المقارن والطب المخبري الحيوانية'),
(1039, 'Large Animal/Food Animal and Equine Surgery and Medicine', 'كبير الحيوان / الأغذية الحيوانية وجراحة فرسي والطب'),
(1040, 'Small/Companion Animal Surgery and Medicine', '/ رفيق جراحة الحيوانات الصغيرة والطب'),
(1041, 'Veterinary Anatomy', 'التشريح البيطري'),
(1042, 'Veterinary Infectious Diseases', 'الأمراض المعدية البيطرية'),
(1043, 'Veterinary Microbiology and Immunobiology', 'علم الأحياء الدقيقة والطب البيطري وعلم المناعة'),
(1044, 'Veterinary Pathology and Pathobiology', 'علم الأمراض والطب البيطري والبيولوجيا المرضية'),
(1045, 'Veterinary Physiology', 'علم وظائف الأعضاء البيطرية'),
(1046, 'Veterinary Preventive Medicine, Epidemiology, and Public Health', 'الطب البيطري الوقائي، علم الأوبئة، والصحة العامة'),
(1047, 'Veterinary Sciences/Veterinary Clinical Sciences', 'العلوم البيطرية / العلوم السريرية البيطرية'),
(1048, 'Veterinary Toxicology and Pharmacology', 'علم السموم والطب البيطري والصيدلة'),
(1049, 'Veterinary Medicine', 'الطب البيطري'),
(1050, 'Veterinary Medicine', 'الطب البيطري'),
(1051, 'History', 'تاريخ'),
(1052, 'History', 'تاريخ'),
(1053, 'American History (United States)', 'تاريخ الولايات المتحدة الأمريكية (الولايات المتحدة)'),
(1054, 'Asian History', 'التاريخ الآسيوي'),
(1055, 'Canadian History', 'التاريخ الكندي'),
(1056, 'European History', 'التاريخ الأوروبي'),
(1057, 'History', 'تاريخ'),
(1058, 'History and Philosophy of Science and Technology', 'تاريخ وفلسفة العلوم والتكنولوجيا'),
(1059, 'Military History', 'التاريخ العسكري'),
(1060, 'Public/Applied History', 'الجمهور / التاريخ التطبيقية'),
(1061, 'Homeland Security, Law Enforcement, Firefighting', 'الأمن الداخلي، تنفيذ القوانين، مكافحة الحرائق'),
(1062, 'Criminal Justice and Corrections', 'العدالة الجنائية وتصحيحات'),
(1063, 'Corrections', 'تصحيحات'),
(1064, 'Corrections Administration', 'إدارة التصحيحات'),
(1065, 'Criminal Justice/Law Enforcement Administration', 'إقامة العدل / إنفاذ القانون الجنائي'),
(1066, 'Criminal Justice/Police Science', 'العدالة الجنائية / علوم الشرطة'),
(1067, 'Criminal Justice/Safety Studies', 'العدالة الجنائية / دراسات السلامة'),
(1068, 'Criminalistics and Criminal Science', 'الإجرام والعلوم الجنائية'),
(1069, 'Critical Incident Response/Special Police Operations', '/ عمليات الشرطة الخاصة الاستجابة للحوادث حرجة'),
(1070, 'Cultural/Archaelogical Resources Protection', 'الثقافية / الآثري حماية الموارد'),
(1071, 'Cyber/Computer Forensics and Counterterrorism', 'سايبر / الحاسب الآلي الطب الشرعي ومكافحة الإرهاب'),
(1072, 'Financial Forensics and Fraud Investigation', 'الطب الشرعي المالية والاحتيال التحقيق'),
(1073, 'Forensic Science and Technology', 'العلوم والتكنولوجيا في الطب الشرعي'),
(1074, 'Juvenile Corrections', 'تصحيحات الأحداث'),
(1075, 'Law Enforcement Intelligence Analysis', 'تحليل الاستخبارات المكلفين بإنفاذ القانون'),
(1076, 'Law Enforcement Investigation and Interviewing', 'التحقيق المكلفين بإنفاذ القانون وإجراء المقابلات'),
(1077, 'Law Enforcement Record-Keeping and Evidence Management', 'إنفاذ القانون حفظ السجلات وإدارة الأدلة'),
(1078, 'Maritime Law Enforcement', 'إنفاذ القانون البحري'),
(1079, 'Protective Services Operations', 'عمليات خدمات حماية'),
(1080, 'Securities Services Administration/Management', 'إدارة خدمات الأوراق المالية / إدارة'),
(1081, 'Security and Loss Prevention Services', 'خدمات الوقاية الأمن وفقدان'),
(1082, 'Suspension and Debarment Investigation', 'التعليق والحرمان التحقيق'),
(1083, 'Fire Protection', 'الحماية من الحرائق'),
(1084, 'Fire Prevention and Safety Technology/Technician', 'الوقاية من الحرائق وتكنولوجيا السلامة / فني'),
(1085, 'Fire Science/Fire-fighting', 'العلوم النار / مكافحة الحرائق'),
(1086, 'Fire Services Administration', 'إدارة الخدمات النار'),
(1087, 'Fire Systems Technology', 'حريق أنظمة تقنية'),
(1088, 'Fire/Arson Investigation and Prevention', 'النار / الحرق التحقيق ومنع'),
(1089, 'Wildland/Forest Firefighting and Investigation', 'البراري / غابة مكافحة الحرائق والتحقيق'),
(1090, 'Homeland Security', 'أمن الوطن'),
(1091, 'Crisis/Emergency/Disaster Management', 'الأزمات / الطوارئ / إدارة الكوارث'),
(1092, 'Critical Infrastructure Protection', 'حماية البنية التحتية الحرجة'),
(1093, 'Homeland Security', 'أمن الوطن'),
(1094, 'Terrorism and Counterterrorism Operations', 'الإرهاب وعمليات مكافحة الإرهاب'),
(1095, 'Human Services', 'الخدمات الإنسانية'),
(1096, 'Community Organization and Advocacy', 'منظمة المجتمع والدعوة'),
(1097, 'Community Organization and Advocacy', 'منظمة المجتمع والدعوة'),
(1098, 'Public Administration', 'الإدارة العامة'),
(1099, 'Public Administration', 'الإدارة العامة'),
(1100, 'Public Policy Analysis', 'تحليل السياسات العامة'),
(1101, 'Education Policy Analysis', 'تحليل السياسات التعليمية'),
(1102, 'Health Policy Analysis', 'تحليل السياسات الصحية'),
(1103, 'International Policy Analysis', 'تحليل السياسة الدولية'),
(1104, 'Public Policy Analysis', 'تحليل السياسات العامة'),
(1105, 'Social Work', 'العمل الاجتماعي'),
(1106, 'Social Work', 'العمل الاجتماعي'),
(1107, 'Youth Services/Administration', 'خدمات الشباب / الإدارة'),
(1108, 'Legal Professions and Studies', 'المهن والدراسات القانونية'),
(1109, 'Pre-Law Studies', 'قبل قانون الدراسات'),
(1110, 'Law', 'القانون'),
(1111, 'Law', 'القانون'),
(1112, 'Legal Research and Advanced Professional Studies', 'الأبحاث القانونية والدراسات الفنية المتقدم'),
(1113, 'Advanced Legal Research/Studies', 'الأبحاث القانونية المتقدم / دراسات'),
(1114, 'American/US Law/Legal Studies/Jurisprudence', 'القانون الأمريكي / الولايات المتحدة / الدراسات القانونية / الفقه'),
(1115, 'Banking, Corporate, Finance, and Securities Law', 'قانون البنوك، الشركات، والمالية، والأوراق المالية'),
(1116, 'Canadian Law/Legal Studies/Jurisprudence', 'القانون الكندي / الدراسات القانونية / الفقه'),
(1117, 'Comparative Law', 'القانون المقارن'),
(1118, 'Energy, Environment, and Natural Resources Law', 'قانون الطاقة والبيئة، والموارد الطبيعية'),
(1119, 'Health Law', 'قانون الصحة'),
(1120, 'Intellectual Property Law', 'قانون الملكية الفكرية'),
(1121, 'International Business, Trade, and Tax Law', 'الأعمال الدولية والتجارة وقانون الضرائب'),
(1122, 'International Law and Legal Studies', 'القانون الدولي والدراسات القانونية'),
(1123, 'Programs for Foreign Lawyers', 'برامج للمحامين الخارجية'),
(1124, 'Tax Law/Taxation', 'قانون الضرائب / الضرائب'),
(1125, 'Legal Support Services', 'خدمات الدعم القانونية'),
(1126, 'Court Reporting/Court Reporter', 'مراسل المحكمة التقارير / المحكمة'),
(1127, 'Legal Administrative Assistant/Secretary', 'قانوني مساعد إداري / أمين'),
(1128, 'Legal Assistant/Paralegal', 'مساعد قانوني / شبه'),
(1129, 'Liberal Arts and Sciences Studies and Humanities', 'الآداب والعلوم الدراسات والعلوم الإنسانية'),
(1130, 'Liberal Arts and Sciences Studies and Humanities', 'الآداب والعلوم الدراسات والعلوم الإنسانية'),
(1131, 'General Studies', 'دراسات عامة'),
(1132, 'Humanities/Humanistic Studies', 'الدراسات الإنسانية / الدراسات الإنسانية'),
(1133, 'Liberal Arts and Sciences/Liberal Studies', 'الآداب والعلوم / الدراسات الليبرالية'),
(1134, 'Library Science', 'علم المكتبات'),
(1135, 'Library and Archives Assisting', 'دار الكتب والوثائق المساعدة'),
(1136, 'Library and Archives Assisting', 'دار الكتب والوثائق المساعدة'),
(1137, 'Library Science and Administration', 'مكتبة العلوم والإدارة'),
(1138, 'Archives/Archival Administration', 'أرشيف الإدارة / المحفوظات'),
(1139, 'Children and Youth Library Services', 'الأطفال والشباب خدمات المكتبة'),
(1140, 'Library and Information Science', 'علوم المكتبات والمعلومات'),
(1141, 'Mathematics and Statistics', 'الرياضيات والإحصاء'),
(1142, 'Applied Mathematics', 'الرياضيات التطبيقية'),
(1143, 'Applied Mathematics', 'الرياضيات التطبيقية'),
(1144, 'Computational and Applied Mathematics', 'الرياضيات الحسابية والتطبيقية'),
(1145, 'Computational Mathematics', 'الرياضيات الحاسوبية'),
(1146, 'Financial Mathematics', 'الرياضيات المالية'),
(1147, 'Mathematical Biology', 'علم الأحياء الرياضي'),
(1148, 'Mathematics', 'علم الرياضيات'),
(1149, 'Algebra and Number Theory', 'الجبر ونظرية الأعداد'),
(1150, 'Analysis and Functional Analysis', 'التحليل والتحليل الوظيفي'),
(1151, 'Geometry/Geometric Analysis', 'الهندسة / التحليل الهندسي'),
(1152, 'Mathematics', 'علم الرياضيات'),
(1153, 'Topology and Foundations', 'طوبولوجيا والمؤسسات'),
(1154, 'Statistics', 'إحصائيات'),
(1155, 'Mathematical Statistics and Probability', 'الاحصائيات الرياضية والاحتمالات'),
(1156, 'Mathematics and Statistics', 'الرياضيات والإحصاء'),
(1157, 'Statistics', 'إحصائيات'),
(1158, 'Mechanic and Repair Technologies/technicians', 'ميكانيكي وإصلاح تكنولوجيز / الفنيين'),
(1159, 'Electrical/Electronics Maintenance and Repair Technology', 'الكهربائية / صيانة الالكترونيات والتكنولوجيا إصلاح'),
(1160, 'Appliance Installation and Repair Technology/Technician', 'الأجهزة تركيب والتكنولوجيا إصلاح / فني'),
(1161, 'Business Machine Repair', 'إصلاح آلة الأعمال'),
(1162, 'Communications Systems Installation and Repair Technology', 'أنظمة الاتصالات تركيب والتكنولوجيا إصلاح'),
(1163, 'Computer Installation and Repair Technology/Technician', 'تركيب جهاز الكمبيوتر والتكنولوجيا إصلاح / فني'),
(1164, 'Electrical/Electronics Equipment Installation and Repair', 'معدات إلكترونيات الكهربائية / تركيب وإصلاح'),
(1165, 'Industrial Electronics Technology/Technician', 'الصناعية الالكترونيات والتكنولوجيا / فني'),
(1166, 'Security System Installation, Repair, and Inspection Technology/Technician', 'تركيب نظام الأمن، إصلاح، والتفتيش والتكنولوجيا / فني'),
(1167, 'Heating, Air Conditioning, Ventilation and Refrigeration Maintenance Technology/Technician (HAC, HACR, HVAC, HVACR)', 'تدفئة، تكييف الهواء والتهوية والتبريد صيانة تكنولوجيا / فني (HAC، HACR، HVAC، HVACR)'),
(1168, 'Heating, Air Conditioning, Ventilation and Refrigeration Maintenance Technology/Technician', 'تدفئة، تكييف الهواء والتهوية وتكنولوجيا صيانة التبريد / فني'),
(1169, 'Heavy/Industrial Equipment Maintenance Technologies', 'الثقيلة / الصناعية معدات صيانة تكنولوجيا'),
(1170, 'Heavy Equipment Maintenance Technology/Technician', 'معدات ثقيلة تكنولوجيا صيانة / فني'),
(1171, 'Industrial Mechanics and Maintenance Technology', 'ميكانيكا الصناعية وتكنولوجيا الصيانة'),
(1172, 'Precision Systems Maintenance and Repair Technologies', 'الدقة صيانة أنظمة وتقنيات إصلاح'),
(1173, 'Gunsmithing/Gunsmith', 'Gunsmithing / صانع الأسلحة'),
(1174, 'Locksmithing and Safe Repair', 'صناعة الأقفال وإصلاح آمن'),
(1175, 'Musical Instrument Fabrication and Repair', 'موسيقي تصنيع الآلات وإصلاح'),
(1176, 'Parts and Warehousing Operations and Maintenance Technology/Technician', 'قطع الغيار وعمليات التخزين وتكنولوجيا صيانة / فني'),
(1177, 'Watchmaking and Jewelrymaking', 'صناعة الساعات وJewelrymaking'),
(1178, 'Vehicle Maintenance and Repair Technologies', 'صيانة السيارة وتقنيات إصلاح'),
(1179, 'Aircraft Powerplant Technology/Technician', 'الطائرات بويربلانت تكنولوجيا / فني'),
(1180, 'Airframe Mechanics and Aircraft Maintenance Technology/Technician', 'ميكانيكا هيكل الطائرة والتكنولوجيا لصيانة الطائرات / فني'),
(1181, 'Alternative Fuel Vehicle Technology/Technician', 'الوقود البديل تكنولوجيا مركبات / فني'),
(1182, 'Autobody/Collision and Repair Technology/Technician', 'Autobody / التصادم والتكنولوجيا إصلاح / فني'),
(1183, 'Automobile/Automotive Mechanics Technology/Technician', 'السيارات / ميكانيكا السيارات تكنولوجيا / فني'),
(1184, 'Avionics Maintenance Technology/Technician', 'تكنولوجيا صيانة الكترونيات الطيران / فني'),
(1185, 'Bicycle Mechanics and Repair Technology/Technician', 'ميكانيكا الدراجات والتكنولوجيا إصلاح / فني'),
(1186, 'Diesel Mechanics Technology/Technician', 'ميكانيكا الديزل تكنولوجيا / فني'),
(1187, 'Engine Machinist', 'محرك الماكنه'),
(1188, 'High Performance and Custom Engine Technician/Mechanic', 'عالية الأداء والمحرك فني مخصص / ميكانيكي'),
(1189, 'Marine Maintenance/Fitter and Ship Repair Technology/Technician', 'البحرية صيانة / الميكانيكي وإصلاح السفن تكنولوجيا / فني'),
(1190, 'Medium/Heavy Vehicle and Truck Technology/Technician', 'متوسطة / الثقيلة المركبات وشاحنة تقنية / فني'),
(1191, 'Motorcycle Maintenance and Repair Technology/Technician', 'صيانة الدراجات النارية والتكنولوجيا إصلاح / فني'),
(1192, 'Recreation Vehicle (RV) Service Technician', 'الترفيه السيارات (RV) فني الخدمة'),
(1193, 'Small Engine Mechanics and Repair Technology/Technician', 'ميكانيكا المحرك الصغيرة وتكنولوجيا إصلاح / فني'),
(1194, 'Vehicle Emissions Inspection and Maintenance Technology/Technician', 'الانبعاثات من المركبات التفتيش والتكنولوجيا صيانة / فني'),
(1195, 'Military Technologies and Applied Sciences', 'التكنولوجيات العسكرية والعلوم التطبيقية'),
(1196, 'Intelligence, Command Control and Information Operations', 'الذكاء، تحكم القيادة وعمليات المعلومات'),
(1197, 'Command & Control (C3, C4I) Systems and Operations', 'القيادة والسيطرة (C3، C4I) نظم والعمليات'),
(1198, 'Cyber/Electronic Operations and Warfare', 'سايبر / عمليات الالكترونية والحرب'),
(1199, 'Information Operations/Joint Information Operations', 'عمليات المعلومات / عمليات المعلومات المشتركة'),
(1200, 'Information/Psychological Warfare and Military Media Relations', 'المعلومات / الحرب النفسية والعلاقات الإعلامية العسكرية'),
(1201, 'Intelligence', 'ذكاء'),
(1202, 'Signal/Geospatial Intelligence', 'إشارة / الجغرافية المكانية الاستخبارات'),
(1203, 'Strategic Intelligence', 'الاستخبارات الاستراتيجية'),
(1204, 'Military Applied Sciences', 'العلوم التطبيقية الجيش'),
(1205, 'Combat Systems Engineering', 'هندسة النظم القتالية'),
(1206, 'Directed Energy Systems', 'أنظمة الطاقة الموجهة'),
(1207, 'Engineering Acoustics', 'هندسة الصوتيات'),
(1208, 'Low-Observables and Stealth Technology', 'المنخفضة المتغيرات الظاهرة والشبح تكنولوجيا'),
(1209, 'Operational Oceanography', 'علم المحيطات التشغيلي'),
(1210, 'Space Systems Operations', 'عمليات أنظمة الفضاء'),
(1211, 'Undersea Warfare', 'الحرب تحت البحر'),
(1212, 'Military Systems and Maintenance Technology', 'نظم الجيش وتكنولوجيا الصيانة'),
(1213, 'Aerospace Ground Equipment Technology', 'الفضاء الأرضي معدات تكنولوجيا'),
(1214, 'Air and Space Operations Technology', 'الهواء وتكنولوجيا العمليات الفضائية'),
(1215, 'Aircraft Armament Systems Technology', 'الطائرات التسلح أنظمة تقنية'),
(1216, 'Explosive Ordinance/Bomb Disposal', 'مرسوم ناسفة / التخلص منها قنبلة'),
(1217, 'Joint Command/Task Force (C3, C4I) Systems', 'قوة القيادة المشتركة / المهام (C3، C4I) نظم'),
(1218, 'Military Information Systems Technology', 'نظم المعلومات العسكرية التقنية'),
(1219, 'Missile and Space Systems Technology', 'الصواريخ وأنظمة تكنولوجيا الفضاء'),
(1220, 'Munitions Systems/Ordinance Technology', 'الذخائر أنظمة / قانون تكنولوجيا'),
(1221, 'Radar Communications and Systems Technology', 'الاتصالات الرادار وأنظمة تقنية'),
(1222, 'Multi/interdisciplinary Studies', 'موضوع / دراسات متعددة التخصصات'),
(1223, 'Accounting and Computer Science', 'المحاسبة وعلوم الحاسب الآلي'),
(1224, 'Accounting and Computer Science', 'المحاسبة وعلوم الحاسب الآلي'),
(1225, 'Behavioral Sciences', 'العلوم السلوكية'),
(1226, 'Behavioral Sciences', 'العلوم السلوكية'),
(1227, 'Biological and Physical Sciences', 'العلوم البيولوجية والفيزيائية'),
(1228, 'Biological and Physical Sciences', 'العلوم البيولوجية والفيزيائية'),
(1229, 'Biopsychology', 'البيولوجيا النفسية'),
(1230, 'Biopsychology', 'البيولوجيا النفسية'),
(1231, 'Classical and Ancient Studies', 'الدراسات الكلاسيكية والقديمة'),
(1232, 'Ancient Studies/Civilization', 'الدراسات القديمة / الحضارة'),
(1233, 'Classical, Ancient Mediterranean and Near Eastern Studies and Archaeology', 'الكلاسيكية، البحر الأبيض المتوسط ​​القديمة ودراسات الشرق الأدنى وعلم الآثار'),
(1234, 'Cognitive Science', 'العلوم المعرفية'),
(1235, 'Cognitive Science', 'العلوم المعرفية'),
(1236, 'Computational Science', 'العلوم الحسابية'),
(1237, 'Computational Science', 'العلوم الحسابية'),
(1238, 'Cultural Studies/Critical Theory and Analysis', 'الدراسات الثقافية / النظرية والتحليل النقدي'),
(1239, 'Cultural Studies/Critical Theory and Analysis', 'الدراسات الثقافية / النظرية والتحليل النقدي'),
(1240, 'Dispute Resolution', 'تسوية المنازعات'),
(1241, 'Dispute Resolution', 'تسوية المنازعات'),
(1242, 'Gerontology', 'علم الشيخوخة'),
(1243, 'Gerontology', 'علم الشيخوخة'),
(1244, 'Historic Preservation and Conservation', 'المحافظة على المواقع التاريخية والمحافظة عليها'),
(1245, 'Cultural Resource Management and Policy Analysis', 'إدارة الموارد الثقافية وتحليل السياسات'),
(1246, 'Historic Preservation and Conservation', 'المحافظة على المواقع التاريخية والمحافظة عليها'),
(1247, 'Holocaust and Related Studies', 'المحرقة والدراسات ذات الصلة'),
(1248, 'Holocaust and Related Studies', 'المحرقة والدراسات ذات الصلة'),
(1249, 'Human Biology', 'علم الأحياء البشري'),
(1250, 'Human Biology', 'علم الأحياء البشري'),
(1251, 'Human Computer Interaction', 'التفاعل البشري الحاسوب'),
(1252, 'Human Computer Interaction', 'التفاعل البشري الحاسوب'),
(1253, 'Intercultural/Multicultural and Diversity Studies', 'الثقافات / متعددة الثقافات والدراسات التنوع'),
(1254, 'Intercultural/Multicultural and Diversity Studies', 'الثقافات / متعددة الثقافات والدراسات التنوع'),
(1255, 'International/Global Studies', '/ الدراسات العالمية الدولية'),
(1256, 'International/Global Studies', '/ الدراسات العالمية الدولية'),
(1257, 'Marine Sciences', 'علوم البحار'),
(1258, 'Marine Sciences', 'علوم البحار'),
(1259, 'Maritime Studies', 'الدراسات البحرية'),
(1260, 'Maritime Studies', 'الدراسات البحرية'),
(1261, 'Mathematics and Computer Science', 'الرياضيات وعلوم الحاسوب'),
(1262, 'Mathematics and Computer Science', 'الرياضيات وعلوم الحاسوب'),
(1263, 'Medieval and Renaissance Studies', 'دراسات العصور الوسطى وعصر النهضة'),
(1264, 'Medieval and Renaissance Studies', 'دراسات العصور الوسطى وعصر النهضة'),
(1265, 'Museology/Museum Studies', 'علم المتاحف / الدراسات متحف'),
(1266, 'Museology/Museum Studies', 'علم المتاحف / الدراسات متحف'),
(1267, 'Natural Sciences', 'العلوم الطبيعية'),
(1268, 'Natural Sciences', 'العلوم الطبيعية'),
(1269, 'Nutrition Sciences', 'علوم التغذية'),
(1270, 'Nutrition Sciences', 'علوم التغذية'),
(1271, 'Peace Studies and Conflict Resolution', 'دراسات السلام وحل النزاعات'),
(1272, 'Peace Studies and Conflict Resolution', 'دراسات السلام وحل النزاعات'),
(1273, 'Science, Technology and Society', 'العلوم والتكنولوجيا والمجتمع'),
(1274, 'Science, Technology and Society', 'العلوم والتكنولوجيا والمجتمع'),
(1275, 'Sustainability Studies', 'دراسات الاستدامة'),
(1276, 'Sustainability Studies', 'دراسات الاستدامة'),
(1277, 'Systems Science and Theory', 'نظم العلوم ونظرية'),
(1278, 'Systems Science and Theory', 'نظم العلوم ونظرية'),
(1279, 'Natural Resources and Conservation', 'الموارد الطبيعية والمحافظة عليها'),
(1280, 'Fishing and Fisheries Sciences and Management', 'الصيد وعلوم مصايد الأسماك وإدارة'),
(1281, 'Fishing and Fisheries Sciences and Management', 'الصيد وعلوم مصايد الأسماك وإدارة'),
(1282, 'Forestry', 'الغابات'),
(1283, 'Forest Management/Forest Resources Management', 'إدارة الغابات إدارة / الموارد الحرجية'),
(1284, 'Forest Resources Production and Management', 'الغابات إنتاج وإدارة الموارد'),
(1285, 'Forest Sciences and Biology', 'علوم الغابات والأحياء'),
(1286, 'Forest Technology/Technician', 'تكنولوجيا الغابات / فني'),
(1287, 'Forestry', 'الغابات'),
(1288, 'Urban Forestry', 'الغابات في المناطق الحضرية'),
(1289, 'Wood Science and Wood Products/Pulp and Paper Technology', 'علوم الخشب والمنتجات الخشبية / اللب وتكنولوجيا الورق'),
(1290, 'Natural Resources Conservation and Research', 'الحفاظ على الموارد الطبيعية والبحوث'),
(1291, 'Environmental Science', 'العلوم البيئية'),
(1292, 'Environmental Studies', 'الدراسات البيئية'),
(1293, 'Natural Resources/Conservation', 'الموارد الطبيعية / الحفاظ عليها'),
(1294, 'Natural Resources Management and Policy', 'إدارة الموارد الطبيعية والسياسة'),
(1295, 'Land Use Planning and Management/Development', 'تخطيط استخدام الأراضي وإدارة تنمية /'),
(1296, 'Natural Resource Economics', 'اقتصاد الموارد الطبيعية'),
(1297, 'Natural Resource Recreation and Tourism', 'منتزهات الموارد الطبيعية والسياحة'),
(1298, 'Natural Resources Law Enforcement and Protective Services', 'الموارد الطبيعية إنفاذ القانون وخدمات حماية'),
(1299, 'Natural Resources Management and Policy', 'إدارة الموارد الطبيعية والسياسة'),
(1300, 'Water, Wetlands, and Marine Resources Management', 'المياه والأراضي الرطبة، والموارد البحرية الإدارة'),
(1301, 'Wildlife and Wildlands Science and Management', 'الحياة البرية والحياة البرية والعلوم الإدارية'),
(1302, 'Wildlife, Fish and Wildlands Science and Management', 'الحياة البرية والأسماك والحياة البرية العلوم والإدارة'),
(1303, 'Parks, Recreation, Leisure, and Fitness Studies', 'الحدائق والترفيه، دراسات الترويح، واللياقة البدنية'),
(1304, 'Health and Physical Education/Fitness', 'الصحة والتربية البدنية / اللياقة البدنية'),
(1305, 'Health and Physical Education/Fitness', 'الصحة والتربية البدنية / اللياقة البدنية'),
(1306, 'Kinesiology and Exercise Science', 'علم الحركة وممارسة العلم'),
(1307, 'Physical Fitness Technician', 'اللياقة البدنية فني'),
(1308, 'Sport and Fitness Administration/Management', 'الرياضة والإدارة اللياقة البدنية / إدارة'),
(1309, 'Sports Studies', 'الدراسات الرياضية'),
(1310, 'Outdoor Education', 'التعليم في الهواء الطلق'),
(1311, 'Outdoor Education', 'التعليم في الهواء الطلق'),
(1312, 'Parks, Recreation and Leisure Facilities Management', 'باركس، الترويح والترفيه إدارة المرافق'),
(1313, 'Golf Course Operation and Grounds Management', 'ملعب غولف تشغيل وإدارة أرض'),
(1314, 'Parks, Recreation and Leisure Facilities Management', 'باركس، الترويح والترفيه إدارة المرافق'),
(1315, 'Parks, Recreation and Leisure Studies', 'دراسات متنزهات، الترويح والترفيه'),
(1316, 'Parks, Recreation and Leisure Studies', 'دراسات متنزهات، الترويح والترفيه'),
(1317, 'Personal and Culinary Services', 'الخدمات الشخصية والطهي'),
(1318, 'Cooking and Related Culinary Arts', 'الطبخ وفنون الطبخ ذات علاقة'),
(1319, 'Baking and Pastry Arts/Baker/Pastry Chef', 'الخبز والمعجنات الفنون / بيكر / المعجنات الشيف'),
(1320, 'Bartending/Bartender', 'Bartending / نادل'),
(1321, 'Culinary Arts/Chef Training', 'فنون الطهي / تدريب الشيف'),
(1322, 'Culinary Science/Culinology', 'العلوم الطهي / Culinology'),
(1323, 'Food Preparation/Professional Cooking/Kitchen Assistant', 'إعداد الطعام / المحترف مساعد / المطبخ الطبخ'),
(1324, 'Food Service, Waiter/Waitress, and Dining Room Management/Manager', 'المأكولات الخدمة، النادل / النادلة، وغرفة الطعام إدارة / مدير'),
(1325, 'Institutional Food Workers', 'المؤسسية عمال الأغذية'),
(1326, 'Meat Cutting/Meat Cutter', 'تقطيع اللحم / اللحوم كتر'),
(1327, 'Restaurant, Culinary, and Catering Management/Manager', 'مطعم، الطبخ، وإدارة التموين / مدير'),
(1328, 'Wine Steward/Sommelier', 'النبيذ ستيوارد / الساقي'),
(1329, 'Cosmetology and Related Personal Grooming Services', 'مستحضرات التجميل وذات شخصية خدمات النظافة الشخصية'),
(1330, 'Aesthetician/Esthetician and Skin Care Specialist', 'Aesthetician / الجماليات والعناية بالبشرة التخصصي'),
(1331, 'Barbering/Barber', 'الحلاقة / الحلاق'),
(1332, 'Cosmetology, Barber/Styling, and Nail Instructor', 'التجميل، محل حلاقة / تصفيف، والأظافر مدرس'),
(1333, 'Cosmetology/Cosmetologist', 'التجميل / فيزيائيين'),
(1334, 'Electrolysis/Electrology and Electrolysis Technician', 'التحليل الكهربائي / Electrology والتحليل الكهربائي فني'),
(1335, 'Facial Treatment Specialist/Facialist', 'أخصائي علاج الوجه / Facialist'),
(1336, 'Hair Styling/Stylist and Hair Design', 'تصفيف الشعر / المصمم والتصميم الشعر'),
(1337, 'Make-Up Artist/Specialist', 'المكياج الفنان / التخصصي'),
(1338, 'Master Aesthetician/Esthetician', 'سيد Aesthetician / الجماليات'),
(1339, 'Nail Technician/Specialist and Manicurist', 'فني مسمار / التخصصي ومدرم الأظافر'),
(1340, 'Permanent Cosmetics/Makeup and Tattooing', 'مستحضرات التجميل الدائمة / ماكياج والوشم'),
(1341, 'Salon/Beauty Salon Management/Manager', 'صالون / الجمال إدارة صالون / مدير'),
(1342, 'Funeral Service and Mortuary Science', 'مراسم الجنازة والجنائزى العلوم'),
(1343, 'Funeral Direction/Service', 'اتجاه الجنازة / الخدمة'),
(1344, 'Funeral Service and Mortuary Science', 'مراسم الجنازة والجنائزى العلوم'),
(1345, 'Mortuary Science and Embalming/Embalmer', 'مشرحة العلوم والتحنيط / المحنط'),
(1346, 'Philosophy and Religious Studies', 'الفلسفة والدراسات الدينية'),
(1347, 'Philosophy and Religious Studies', 'الفلسفة والدراسات الدينية'),
(1348, 'Philosophy', 'فلسفة'),
(1349, 'Applied and Professional Ethics', 'التطبيقية وآداب المهنة'),
(1350, 'Ethics', 'علم الأخلاق'),
(1351, 'Logic', 'علم المنطق'),
(1352, 'Philosophy', 'فلسفة');
INSERT INTO `major` (`major_id`, `major_name_en`, `major_name_ar`) VALUES
(1353, 'Religion/Religious Studies', 'الدين / الدراسات الدينية'),
(1354, 'Buddhist Studies', 'الدراسات البوذية'),
(1355, 'Christian Studies', 'الدراسات المسيحية'),
(1356, 'Hindu Studies', 'دراسات الهندوسية'),
(1357, 'Islamic Studies', 'الدراسات الاسلامية'),
(1358, 'Jewish/Judaic Studies', '/ الدراسات اليهودية اليهودية'),
(1359, 'Religion/Religious Studies', 'الدين / الدراسات الدينية'),
(1360, 'Physical Sciences', 'العلوم الفيزيائية'),
(1361, 'Astronomy and Astrophysics', 'علم الفلك والفيزياء الفلكية'),
(1362, 'Astronomy', 'علم الفلك'),
(1363, 'Astrophysics', 'الفيزياء الفلكية'),
(1364, 'Planetary Astronomy and Science', 'علم الفلك الكواكب والعلوم'),
(1365, 'Atmospheric Sciences and Meteorology', 'علوم الغلاف الجوي والأرصاد الجوية'),
(1366, 'Atmospheric Chemistry and Climatology', 'كيمياء الغلاف الجوي والمناخ'),
(1367, 'Atmospheric Physics and Dynamics', 'فيزياء الغلاف الجوي والديناميات'),
(1368, 'Atmospheric Sciences and Meteorology', 'علوم الغلاف الجوي والأرصاد الجوية'),
(1369, 'Meteorology', 'الأرصاد الجوية'),
(1370, 'Chemistry', 'مادة الكيمياء'),
(1371, 'Analytical Chemistry', 'الكيمياء التحليلية'),
(1372, 'Chemical Physics', 'الفيزياء الكيميائية'),
(1373, 'Chemistry', 'مادة الكيمياء'),
(1374, 'Environmental Chemistry', 'الكيمياء البيئية'),
(1375, 'Forensic Chemistry', 'كيمياء الطب الشرعي'),
(1376, 'Inorganic Chemistry', 'الكيمياء غير العضوية'),
(1377, 'Organic Chemistry', 'الكيمياء العضوية'),
(1378, 'Physical Chemistry', 'الكيمياء الفيزيائية'),
(1379, 'Polymer Chemistry', 'كيمياء البوليمرات'),
(1380, 'Theoretical Chemistry', 'الكيمياء النظرية'),
(1381, 'Geological and Earth Sciences/Geosciences', 'الجيولوجية وعلوم الأرض / علوم الأرض'),
(1382, 'Geochemistry', 'الجيوكيمياء'),
(1383, 'Geochemistry and Petrology', 'الكيمياء الجيولوجية والصخور'),
(1384, 'Geology/Earth Science', 'الجيولوجيا / علوم الأرض'),
(1385, 'Geophysics and Seismology', 'الجيوفيزياء وعلم الزلازل'),
(1386, 'Hydrology and Water Resources Science', 'الهيدرولوجيا وعلوم الموارد المائية'),
(1387, 'Oceanography, Chemical and Physical', 'علم المحيطات، والمواد الكيميائية والفيزيائية'),
(1388, 'Paleontology', 'علم المتحجرات'),
(1389, 'Materials Sciences', 'علوم المواد'),
(1390, 'Materials Chemistry', 'كيمياء المواد'),
(1391, 'Materials Science', 'علوم المواد'),
(1392, 'Physical Sciences', 'العلوم الفيزيائية'),
(1393, 'Physical Sciences', 'العلوم الفيزيائية'),
(1394, 'Physics', 'مادة الفيزياء'),
(1395, 'Acoustics', 'الصوتيات'),
(1396, 'Atomic/Molecular Physics', 'الذرية / الفيزياء الجزيئية'),
(1397, 'Condensed Matter and Materials Physics', 'المواد المكثفة وفيزياء المواد'),
(1398, 'Elementary Particle Physics', 'فيزياء الجسيمات الأولية'),
(1399, 'Nuclear Physics', 'الفيزياء النووية'),
(1400, 'Optics/Optical Sciences', 'البصريات / العلوم البصرية'),
(1401, 'Physics', 'مادة الفيزياء'),
(1402, 'Plasma and High-Temperature Physics', 'فيزياء البلازما وارتفاع درجة الحرارة'),
(1403, 'Theoretical and Mathematical Physics', 'الفيزياء النظرية والرياضية'),
(1404, 'Precision Production', 'إنتاج الدقة'),
(1405, 'Boilermaking/Boilermaker', 'نحاسة / الصانع غلايات'),
(1406, 'Boilermaking/Boilermaker', 'نحاسة / الصانع غلايات'),
(1407, 'Leatherworking and Upholstery', 'Leatherworking وتنجيد'),
(1408, 'Shoe, Boot and Leather Repair', 'الحذاء، الحذاء وجلد إصلاح'),
(1409, 'Upholstery/Upholsterer', 'المفروشات / منجد'),
(1410, 'Precision Metal Working', 'دقة صناعة المعادن'),
(1411, 'Computer Numerically Controlled (CNC) Machinist Technology/CNC Machinist', 'الكمبيوتر التي تسيطر عليها عدديا (CNC) الماكنه تكنولوجيا / CNC الماكنه'),
(1412, 'Ironworking/Ironworker', 'الحدادة / الحداد'),
(1413, 'Machine Shop Technology/Assistant', 'آلة متجر تكنولوجيا / مساعد'),
(1414, 'Machine Tool Technology/Machinist', 'آلة أداة تقنية / الماكنه'),
(1415, 'Metal Fabricator', 'المعادن المفتري'),
(1416, 'Sheet Metal Technology/Sheetworking', 'المعادن ورقة تقنية / Sheetworking'),
(1417, 'Tool and Die Technology/Technician', 'أداة ويموت تكنولوجيا / فني'),
(1418, 'Welding Technology/Welder', 'تكنولوجيا اللحام / لحام'),
(1419, 'Woodworking', 'النجارة'),
(1420, 'Cabinetmaking and Millwork', 'الخزائن ومطاحن'),
(1421, 'Furniture Design and Manufacturing', 'تصميم الأثاث والتصنيع'),
(1422, 'Woodworking', 'النجارة'),
(1423, 'Psychology', 'علم النفس'),
(1424, 'Psychology', 'علم النفس'),
(1425, 'Psychology', 'علم النفس'),
(1426, 'Research and Experimental Psychology', 'بحث وعلم النفس التجريبي'),
(1427, 'Cognitive Psychology and Psycholinguistics', 'علم النفس المعرفي وعلم اللغة النفسي'),
(1428, 'Comparative Psychology', 'علم النفس المقارن'),
(1429, 'Developmental and Child Psychology', 'علم النفس التنموي والطفل'),
(1430, 'Experimental Psychology', 'علم النفس التجريبي'),
(1431, 'Personality Psychology', 'علم النفس الشخصية'),
(1432, 'Physiological Psychology/Psychobiology', 'علم النفس الفسيولوجي / علم النفس الأحيائي'),
(1433, 'Psychometrics and Quantitative Psychology', 'القياس النفسي وعلم النفس الكمي'),
(1434, 'Psychopharmacology', 'علم الأدوية النفسية'),
(1435, 'Social Psychology', 'علم النفس الاجتماعي'),
(1436, 'Science Technologies/technicians', 'تكنولوجيا العلوم / الفنيين'),
(1437, 'Biology Technician/Biotechnology Laboratory Technician', 'فني البيولوجيا / فني مختبر التكنولوجيا الحيوية'),
(1438, 'Biology Technician/Biotechnology Laboratory Technician', 'فني البيولوجيا / فني مختبر التكنولوجيا الحيوية'),
(1439, 'Nuclear and Industrial Radiologic Technologies/Technicians', 'النووية والصناعية إشعاعي تكنولوجيز / فنيي'),
(1440, 'Industrial Radiologic Technology/Technician', 'الصناعية إشعاعي تكنولوجيا / فني'),
(1441, 'Nuclear/Nuclear Power Technology/Technician', 'النووية / تكنولوجيا الطاقة النووية / فني'),
(1442, 'Physical Science Technologies/Technicians', 'العلوم الفيزيائية تكنولوجيز / فنيي'),
(1443, 'Chemical Process Technology', 'تكنولوجيا العمليات الكيميائية'),
(1444, 'Chemical Technology/Technician', 'التكنولوجيا الكيميائية / فني'),
(1445, 'Social Sciences', 'علوم اجتماعية'),
(1446, 'Anthropology', 'علم الانسان'),
(1447, 'Anthropology', 'علم الانسان'),
(1448, 'Cultural Anthropology', 'الأنثروبولوجيا الثقافية'),
(1449, 'Medical Anthropology', 'الأنثروبولوجيا الطبية'),
(1450, 'Physical and Biological Anthropology', 'الأنثروبولوجيا الفيزيائية والبيولوجية'),
(1451, 'Archeology', 'علم الآثار'),
(1452, 'Archeology', 'علم الآثار'),
(1453, 'Criminology', 'علم الاجرام'),
(1454, 'Criminology', 'علم الاجرام'),
(1455, 'Demography and Population Studies', 'الدراسات السكانية الديموغرافيا و'),
(1456, 'Demography and Population Studies', 'الدراسات السكانية الديموغرافيا و'),
(1457, 'Economics', 'علم الاقتصاد'),
(1458, 'Applied Economics', 'الاقتصاد التطبيقي'),
(1459, 'Development Economics and International Development', 'اقتصاديات التنمية والتنمية الدولية'),
(1460, 'Econometrics and Quantitative Economics', 'الاقتصاد القياسي والاقتصاد الكمي'),
(1461, 'Economics', 'علم الاقتصاد'),
(1462, 'International Economics', 'الاقتصاد الدولي'),
(1463, 'Geography and Cartography', 'الجغرافيا ورسم الخرائط'),
(1464, 'Geographic Information Science and Cartography', 'علوم المعلومات الجغرافية ورسم الخرائط'),
(1465, 'Geography', 'جغرافية'),
(1466, 'International Relations and National Security Studies', 'العلاقات الدولية ودراسات الأمن القومي'),
(1467, 'International Relations and Affairs', 'العلاقات الدولية والشؤون'),
(1468, 'National Security Policy Studies', 'دراسات سياسة الأمن القومي'),
(1469, 'Political Science and Government', 'العلوم السياسية والحكومة'),
(1470, 'American Government and Politics (United States)', 'الحكومة الأمريكية والسياسة (الولايات المتحدة الأمريكية)'),
(1471, 'Canadian Government and Politics', 'الحكومة الكندية والسياسة'),
(1472, 'Political Economy', 'الاقتصاد السياسي'),
(1473, 'Political Science and Government', 'العلوم السياسية والحكومة'),
(1474, 'Rural Sociology', 'علم الاجتماع الريفي'),
(1475, 'Rural Sociology', 'علم الاجتماع الريفي'),
(1476, 'Social Sciences', 'علوم اجتماعية'),
(1477, 'Research Methodology and Quantitative Methods', 'مناهج البحث العلمي والأساليب الكمية'),
(1478, 'Social Sciences', 'علوم اجتماعية'),
(1479, 'Sociology and Anthropology', 'علم الاجتماع والأنثروبولوجيا'),
(1480, 'Sociology and Anthropology', 'علم الاجتماع والأنثروبولوجيا'),
(1481, 'Sociology', 'علم الاجتماع'),
(1482, 'Sociology', 'علم الاجتماع'),
(1483, 'Urban Studies/Affairs', 'الدراسات الحضرية الشؤون /'),
(1484, 'Urban Studies/Affairs', 'الدراسات الحضرية الشؤون /'),
(1485, 'Theology and Religious Vocations', 'اللاهوت والدعوات الدينية'),
(1486, 'Bible/Biblical Studies', 'الكتاب المقدس / الدراسات الإنجيلية'),
(1487, 'Bible/Biblical Studies', 'الكتاب المقدس / الدراسات الإنجيلية'),
(1488, 'Missions/Missionary Studies and Missiology', 'البعثات / الدراسات التبشيرية وMissiology'),
(1489, 'Missions/Missionary Studies and Missiology', 'البعثات / الدراسات التبشيرية وMissiology'),
(1490, 'Pastoral Counseling and Specialized Ministries', 'الإرشاد الرعوية والوزارات المتخصصة'),
(1491, 'Lay Ministry', 'وزارة لاي'),
(1492, 'Pastoral Studies/Counseling', 'الدراسات الرعوية / الإرشاد'),
(1493, 'Urban Ministry', 'وزارة العمراني'),
(1494, 'Women''s Ministry', 'وزارة المرأة'),
(1495, 'Youth Ministry', 'وزارة الشباب'),
(1496, 'Religious Education', 'التربية الدينية'),
(1497, 'Religious Education', 'التربية الدينية'),
(1498, 'Religious/Sacred Music', 'الديني / موسيقى الروحية'),
(1499, 'Religious/Sacred Music', 'الديني / موسيقى الروحية'),
(1500, 'Theological and Ministerial Studies', 'اللاهوتية والدراسات الوزاري'),
(1501, 'Divinity/Ministry', 'الألوهية / وزارة'),
(1502, 'Pre-Theology/Pre-Ministerial Studies', 'قبل اللاهوت / دراسات ما قبل الوزارية'),
(1503, 'Rabbinical Studies', 'الدراسات الحاخامية'),
(1504, 'Talmudic Studies', 'الدراسات التلمودية'),
(1505, 'Theology/Theological Studies', 'لاهوت / الدراسات اللاهوتية'),
(1506, 'Transportation and Materials Moving', 'النقل والمواد الانتقال'),
(1507, 'Air Transportation', 'النقل الجوي'),
(1508, 'Aeronautics/Aviation/Aerospace Science and Technology', 'الطيران / الطيران / علوم الفضاء والتكنولوجيا'),
(1509, 'Air Traffic Controller', 'مراقب الحركة الجوية'),
(1510, 'Airline Flight Attendant', 'مضيفات الطيران'),
(1511, 'Airline/Commercial/Professional Pilot and Flight Crew', 'شركة طيران / تجاري / الفنية التجريبية والطيران الطاقم'),
(1512, 'Aviation/Airway Management and Operations', 'الطيران / إدارة الخطوط الجوية والعمليات'),
(1513, 'Flight Instructor', 'مدرب طيران'),
(1514, 'Ground Transportation', 'النقل البري'),
(1515, 'Construction/Heavy Equipment/Earthmoving Equipment Operation', 'البناء / المعدات الثقيلة / الحفر والنقل تشغيل المعدات'),
(1516, 'Flagging and Traffic Control', 'ضعف ومراقبة الحركة'),
(1517, 'Mobil Crane Operation/Operator', 'موبيل كرين التشغيل / المشغل'),
(1518, 'Railroad and Railway Transportation', 'السكك الحديدية والنقل بالسكك الحديدية'),
(1519, 'Truck and Bus Driver/Commercial Vehicle Operator and Instructor', 'شاحنة وحافلة سائق / مشغل التجاري المركبات ومدرس'),
(1520, 'Marine Transportation', 'النقل البحري'),
(1521, 'Commercial Fishing', 'الصيد التجاري'),
(1522, 'Diver, Professional and Instructor', 'غواص، المهنية ومدرس'),
(1523, 'Marine Science/Merchant Marine Officer', 'علوم / تاجر ضابط البحرية البحرية'),
(1524, 'Visual and Performing Arts', 'الفنون البصرية والأدائية'),
(1525, 'Arts, Entertainment,and Media Management', 'الفنون والترفيه والإعلام إدارة'),
(1526, 'Arts, Entertainment,and Media Management', 'الفنون والترفيه والإعلام إدارة'),
(1527, 'Fine and Studio Arts Management', 'إدارة الفنون الجميلة وستوديو'),
(1528, 'Music Management', 'إدارة الموسيقى'),
(1529, 'Theatre/Theatre Arts Management', 'مسرح / إدارة الفنون المسرحية'),
(1530, 'Crafts/Craft Design, Folk Art and Artisanry', 'الحرف / كرافت التصميم، الفن الشعبي وArtisanry'),
(1531, 'Crafts/Craft Design, Folk Art and Artisanry', 'الحرف / كرافت التصميم، الفن الشعبي وArtisanry'),
(1532, 'Dance', 'رقص'),
(1533, 'Ballet', 'رقص الباليه'),
(1534, 'Dance', 'رقص'),
(1535, 'Design and Applied Arts', 'تصميم والفنون التطبيقية'),
(1536, 'Commercial and Advertising Art', 'الفن التجاري والدعاية والإعلان'),
(1537, 'Commercial Photography', 'التصوير التجاري'),
(1538, 'Design and Visual Communications', 'تصميم والاتصالات البصرية'),
(1539, 'Fashion/Apparel Design', 'الموضة / ملابس التصميم'),
(1540, 'Game and Interactive Media Design', 'اللعبة وتصميم وسائل الإعلام التفاعلية'),
(1541, 'Graphic Design', 'تصميم جرافيك'),
(1542, 'Illustration', 'رسم توضيحى'),
(1543, 'Industrial and Product Design', 'التصميم الصناعي والمنتج'),
(1544, 'Interior Design', 'التصميم الداخلي'),
(1545, 'Drama/Theatre Arts and Stagecraft', 'الدراما / الفنون المسرحية وStagecraft'),
(1546, 'Acting', 'القائم بأعمال'),
(1547, 'Costume Design', 'تصميم زي'),
(1548, 'Directing and Theatrical Production', 'الإخراج والإنتاج المسرحي'),
(1549, 'Drama and Dramatics/Theatre Arts', 'الدراما والفنون فن التمثيل / مسرح'),
(1550, 'Musical Theatre', 'المسرح الموسيقي'),
(1551, 'Playwriting and Screenwriting', 'الكتابة المسرحية وكتابة السيناريو'),
(1552, 'Technical Theatre/Theatre Design and Technology', 'مسرح مجال الهندسة / تصميم المسرح والتكنولوجيا'),
(1553, 'Theatre Literature, History and Criticism', 'أدب المسرح، التاريخ ونقد'),
(1554, 'Film/Video and Photographic Arts', 'الفيلم / الفيديو وفنون التصوير الفوتوغرافي'),
(1555, 'Cinematography and Film/Video Production', 'السينما والأفلام / الفيديو الإنتاج'),
(1556, 'Documentary Production', 'إنتاج فيلم وثائقي'),
(1557, 'Film/Cinema/Video Studies', 'فيلم / سينما / الدراسات فيديو'),
(1558, 'Photography', 'تصوير فوتوغرافي'),
(1559, 'Fine and Studio Arts', 'الفنون الجميلة وستوديو'),
(1560, 'Art History, Criticism and Conservation', 'تاريخ الفن والنقد والحفظ'),
(1561, 'Art/Art Studies', 'الفن / الدراسات الفنية'),
(1562, 'Ceramic Arts and Ceramics', 'الفنون الخزفية والسيراميك'),
(1563, 'Drawing', 'رسم'),
(1564, 'Fiber, Textile and Weaving Arts', 'الألياف والنسيج والحياكة الفنون'),
(1565, 'Fine/Studio Arts', 'غرامة / ستوديو الفنون'),
(1566, 'Intermedia/Multimedia', 'إنترميديا ​​/ الوسائط المتعددة'),
(1567, 'Metal and Jewelry Arts', 'المعادن والمجوهرات الفنون'),
(1568, 'Painting', 'فن الرسم'),
(1569, 'Printmaking', 'الطباعة'),
(1570, 'Sculpture', 'فن النحت'),
(1571, 'Music', 'موسيقى'),
(1572, 'Brass Instruments', 'الأدوات النحاسية'),
(1573, 'Conducting', 'إجراء'),
(1574, 'Jazz/Jazz Studies', 'الجاز / الدراسات جاز'),
(1575, 'Keyboard Instruments', 'الآلات لوحة المفاتيح'),
(1576, 'Music', 'موسيقى'),
(1577, 'Music History, Literature, and Theory', 'تاريخ الموسيقى والأدب ونظرية'),
(1578, 'Music Pedagogy', 'التربية الموسيقى'),
(1579, 'Music Performance', 'الأداء الموسيقي'),
(1580, 'Music Technology', 'تكنولوجيا الموسيقى'),
(1581, 'Music Theory and Composition', 'نظرية الموسيقى والتأليف'),
(1582, 'Musicology and Ethnomusicology', 'علم الموسيقى وعلم الموسيقى العرقي'),
(1583, 'Percussion Instruments', 'الآلات الإيقاعية'),
(1584, 'Stringed Instruments', 'الآلات الوترية'),
(1585, 'Voice and Opera', 'صوت وأوبرا'),
(1586, 'Woodwind Instruments', 'الصكوك آلات النفخ'),
(1587, 'Visual and Performing Arts', 'الفنون البصرية والأدائية'),
(1588, 'Digital Arts', 'الفنون الرقمية');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1427888406),
('m130524_201442_init', 1427888423);

-- --------------------------------------------------------

--
-- Table structure for table `notification_employer`
--

CREATE TABLE IF NOT EXISTS `notification_employer` (
  `notification_id` int(11) unsigned NOT NULL,
  `employer_id` int(11) unsigned NOT NULL,
  `student_id` int(11) unsigned NOT NULL,
  `job_id` int(11) unsigned NOT NULL,
  `notication_sent` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'False (0), True (1)',
  `notification_viewed` tinyint(4) NOT NULL,
  `notification_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_student`
--

CREATE TABLE IF NOT EXISTS `notification_student` (
  `notification_id` int(11) unsigned NOT NULL,
  `student_id` int(11) unsigned NOT NULL,
  `job_id` int(11) unsigned NOT NULL,
  `notification_sent` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'False (0), True (1)',
  `notification_viewed` tinyint(4) NOT NULL,
  `notification_datetime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) unsigned NOT NULL,
  `employer_id` int(11) unsigned NOT NULL,
  `payment_type_id` int(11) unsigned NOT NULL,
  `payment_datetime` date NOT NULL,
  `payment_amount` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE IF NOT EXISTS `payment_type` (
  `payment_type_id` int(11) unsigned NOT NULL,
  `payment_type_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) unsigned NOT NULL,
  `degree_id` int(11) unsigned NOT NULL,
  `major_id` int(11) unsigned NOT NULL,
  `country_id` int(11) unsigned NOT NULL,
  `university_id` int(11) unsigned NOT NULL,
  `student_firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `student_lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_dob` date NOT NULL,
  `student_status` tinyint(4) NOT NULL COMMENT 'Full Time (1) Part Time (0)',
  `student_enrolment_year` year(4) NOT NULL,
  `student_graduating_year` year(4) NOT NULL,
  `student_gpa` decimal(10,2) NOT NULL,
  `student_gender` tinyint(4) NOT NULL COMMENT 'Male (1) Female (0)',
  `student_transportation` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'true (1), false (0)',
  `student_contact_number` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `student_interestingfacts` text COLLATE utf8_unicode_ci NOT NULL,
  `student_photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `student_cv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_skill` text COLLATE utf8_unicode_ci NOT NULL,
  `student_hobby` text COLLATE utf8_unicode_ci NOT NULL,
  `student_club` text COLLATE utf8_unicode_ci NOT NULL,
  `student_sport` text COLLATE utf8_unicode_ci NOT NULL,
  `student_verfication_attachment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_email_verfication` tinyint(4) NOT NULL DEFAULT '0',
  `student_id_verfication` tinyint(255) NOT NULL DEFAULT '0',
  `student_email_preference` tinyint(4) NOT NULL COMMENT 'Off(0), Daily(1), Weekly(2)',
  `student_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `student_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `student_password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `student_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_job_application`
--

CREATE TABLE IF NOT EXISTS `student_job_application` (
  `application_id` int(11) unsigned NOT NULL,
  `student_id` int(11) unsigned NOT NULL,
  `job_id` int(11) unsigned NOT NULL,
  `application_answer_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `application_answer_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `application_hidden` tinyint(11) NOT NULL,
  `application_date_apply` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_language`
--

CREATE TABLE IF NOT EXISTS `student_language` (
  `language_id` int(11) unsigned NOT NULL,
  `student_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_id` int(11) unsigned NOT NULL,
  `job_id` int(11) unsigned NOT NULL,
  `transaction_number_of_applicants` int(11) NOT NULL,
  `transaction_price_per_applicant` decimal(10,0) NOT NULL,
  `transaction_price_total` decimal(11,0) NOT NULL,
  `transaction_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE IF NOT EXISTS `university` (
  `university_id` int(11) unsigned NOT NULL,
  `university_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `university_domain` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Example: @gust.edu.kw',
  `university_require_verify` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Require Verification (0); Does not require verification (1)',
  `university_id_template` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'A photo to define what verification we require',
  `university_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `university_graphic` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`), ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`degree_id`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`employer_id`), ADD KEY `industry_id` (`industry_id`), ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `filter`
--
ALTER TABLE `filter`
  ADD PRIMARY KEY (`filter_id`), ADD KEY `job_id` (`job_id`), ADD KEY `university_id` (`university_id`), ADD KEY `degree_id` (`degree_id`);

--
-- Indexes for table `filter_country`
--
ALTER TABLE `filter_country`
  ADD PRIMARY KEY (`filter_id`,`country_id`), ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `filter_language`
--
ALTER TABLE `filter_language`
  ADD PRIMARY KEY (`filter_id`,`language_id`), ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `filter_major`
--
ALTER TABLE `filter_major`
  ADD PRIMARY KEY (`filter_id`,`major_id`), ADD KEY `major_id` (`major_id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`industry_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`), ADD KEY `jobtype_id` (`jobtype_id`), ADD KEY `employer_id` (`employer_id`);

--
-- Indexes for table `jobtype`
--
ALTER TABLE `jobtype`
  ADD PRIMARY KEY (`jobtype_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`major_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `notification_employer`
--
ALTER TABLE `notification_employer`
  ADD PRIMARY KEY (`notification_id`), ADD KEY `employer_id` (`employer_id`), ADD KEY `student_id` (`student_id`), ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `notification_student`
--
ALTER TABLE `notification_student`
  ADD PRIMARY KEY (`notification_id`), ADD KEY `student_id` (`student_id`), ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`), ADD KEY `employer_id` (`employer_id`), ADD KEY `payment_type_id` (`payment_type_id`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`payment_type_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`), ADD KEY `degree_id` (`degree_id`), ADD KEY `major_id` (`major_id`), ADD KEY `university_id` (`university_id`), ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `student_job_application`
--
ALTER TABLE `student_job_application`
  ADD PRIMARY KEY (`application_id`), ADD KEY `student_id` (`student_id`), ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `student_language`
--
ALTER TABLE `student_language`
  ADD PRIMARY KEY (`language_id`,`student_id`), ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`), ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`university_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=182;
--
-- AUTO_INCREMENT for table `degree`
--
ALTER TABLE `degree`
  MODIFY `degree_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `employer_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `filter`
--
ALTER TABLE `filter`
  MODIFY `filter_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `industry_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobtype`
--
ALTER TABLE `jobtype`
  MODIFY `jobtype_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `language_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=185;
--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `major_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1589;
--
-- AUTO_INCREMENT for table `notification_employer`
--
ALTER TABLE `notification_employer`
  MODIFY `notification_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification_student`
--
ALTER TABLE `notification_student`
  MODIFY `notification_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `payment_type_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_job_application`
--
ALTER TABLE `student_job_application`
  MODIFY `application_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `university_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`);

--
-- Constraints for table `employer`
--
ALTER TABLE `employer`
ADD CONSTRAINT `employer_ibfk_1` FOREIGN KEY (`industry_id`) REFERENCES `industry` (`industry_id`),
ADD CONSTRAINT `employer_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`);

--
-- Constraints for table `filter`
--
ALTER TABLE `filter`
ADD CONSTRAINT `filter_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`),
ADD CONSTRAINT `filter_ibfk_2` FOREIGN KEY (`university_id`) REFERENCES `university` (`university_id`),
ADD CONSTRAINT `filter_ibfk_3` FOREIGN KEY (`degree_id`) REFERENCES `degree` (`degree_id`);

--
-- Constraints for table `filter_country`
--
ALTER TABLE `filter_country`
ADD CONSTRAINT `filter_country_ibfk_1` FOREIGN KEY (`filter_id`) REFERENCES `filter` (`filter_id`),
ADD CONSTRAINT `filter_country_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`);

--
-- Constraints for table `filter_language`
--
ALTER TABLE `filter_language`
ADD CONSTRAINT `filter_language_ibfk_1` FOREIGN KEY (`filter_id`) REFERENCES `filter` (`filter_id`),
ADD CONSTRAINT `filter_language_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`);

--
-- Constraints for table `filter_major`
--
ALTER TABLE `filter_major`
ADD CONSTRAINT `filter_major_ibfk_1` FOREIGN KEY (`filter_id`) REFERENCES `filter` (`filter_id`),
ADD CONSTRAINT `filter_major_ibfk_2` FOREIGN KEY (`major_id`) REFERENCES `major` (`major_id`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`jobtype_id`) REFERENCES `jobtype` (`jobtype_id`),
ADD CONSTRAINT `job_ibfk_2` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`employer_id`);

--
-- Constraints for table `notification_employer`
--
ALTER TABLE `notification_employer`
ADD CONSTRAINT `notification_employer_ibfk_1` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`employer_id`),
ADD CONSTRAINT `notification_employer_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
ADD CONSTRAINT `notification_employer_ibfk_3` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`);

--
-- Constraints for table `notification_student`
--
ALTER TABLE `notification_student`
ADD CONSTRAINT `notification_student_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
ADD CONSTRAINT `notification_student_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`employer_id`),
ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_type` (`payment_type_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`degree_id`) REFERENCES `degree` (`degree_id`),
ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`major_id`) REFERENCES `major` (`major_id`),
ADD CONSTRAINT `student_ibfk_4` FOREIGN KEY (`university_id`) REFERENCES `university` (`university_id`),
ADD CONSTRAINT `student_ibfk_5` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`);

--
-- Constraints for table `student_job_application`
--
ALTER TABLE `student_job_application`
ADD CONSTRAINT `student_job_application_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
ADD CONSTRAINT `student_job_application_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`);

--
-- Constraints for table `student_language`
--
ALTER TABLE `student_language`
ADD CONSTRAINT `student_language_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`),
ADD CONSTRAINT `student_language_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
