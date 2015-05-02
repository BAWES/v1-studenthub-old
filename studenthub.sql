-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 02, 2015 at 01:28 PM
-- Server version: 5.6.23
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(91, 'Lithuania', 'ليتوانيا', 'Lithuanian', 'اللتوانية'),
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
(173, 'Venezuela', 'فنزويلا', 'Venezuelan', 'الفنزويلي'),
(174, 'Vietnam', 'فيتنام', 'Vietnamese', 'الفيتنامية'),
(175, 'Wales', 'ويلز', 'Welsh', 'ويلزي'),
(176, 'Western Samoa', 'ساموا الغربية', 'Western Samoan', 'الغربية ساموا'),
(177, 'Yemen', 'يمني', 'Yemeni', 'يمني'),
(178, 'Yugoslavia', 'يوغوسلافيا', 'Yugoslav', 'اليوغوسلافية'),
(179, 'Zaire', 'زائير', 'Zaïrean', 'زائير'),
(180, 'Zambia', 'زامبيا', 'Zambian', 'زامبيا'),
(181, 'Zimbabwe', 'زيمبابوي', 'Zimbabwean', 'زيمبابوي'),
(182, 'America', 'أمريكا', 'American', 'أمريكي');

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
(1, 'Diploma', 'دبلوم'),
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
  `employer_logo` varchar(128) COLLATE utf8_unicode_ci DEFAULT '',
  `employer_website` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `employer_company_desc` text COLLATE utf8_unicode_ci,
  `employer_num_employees` int(11) DEFAULT NULL,
  `employer_contact_firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employer_contact_lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employer_contact_number` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `employer_credit` decimal(10,0) NOT NULL DEFAULT '0',
  `employer_email_preference` tinyint(4) NOT NULL COMMENT 'Off(0), Daily(1), Weekly(2)',
  `employer_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employer_email_verification` tinyint(4) NOT NULL DEFAULT '0',
  `employer_auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `employer_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `employer_password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `employer_language_pref` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en-US',
  `employer_datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`employer_id`, `industry_id`, `city_id`, `employer_company_name`, `employer_logo`, `employer_website`, `employer_company_desc`, `employer_num_employees`, `employer_contact_firstname`, `employer_contact_lastname`, `employer_contact_number`, `employer_credit`, `employer_email_preference`, `employer_email`, `employer_email_verification`, `employer_auth_key`, `employer_password_hash`, `employer_password_reset_token`, `employer_language_pref`, `employer_datetime`) VALUES
(1, 1, 4, 'BAWES', NULL, 'http://bawes.net', 'Develop awesome stuff\r\nThe best of the best\r\nWe are awesome', 3, 'Khalid', 'Al-Mutawa', '99811042', '0', 0, 'khalid@bawes.net', 1, 'AWLsiuInKDt_5Jz8ARA6c0q2dHX6-joB', '$2y$13$SRXEKOXoc0HzY3TeKiiHp.CvmK.9dkH3WafV49prFXyOhwuin36N2', '', 'en-US', '2015-05-02 16:15:30'),
(2, 1, 1, 'Test Company', NULL, NULL, 'sqSQ', NULL, 'DWAD', 'dwadwa', '99811042', '0', 1, 'dwadwadw@dwad.com', 1, 'RkJCWLIjxJPziHMmyx-GTHgf9Q8RBndT', '$2y$13$KONg0F9VYiie8LDelIsuZeSo6Hd4AuB/1Xq2GflzO7Eqw4Rdl3wOK', '', 'en-US', '2015-05-02 16:27:38');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jobtype`
--

INSERT INTO `jobtype` (`jobtype_id`, `jobtype_name_ar`, `jobtype_name_en`) VALUES
(1, 'متدرب', 'Intern'),
(2, 'متطوع', 'Volunteer'),
(3, 'وظيفة بدوام واحد', 'One-time Job'),
(4, 'وظيفة بدوام جزئي', 'Part-time Job'),
(5, 'وظيفة بدوام كامل', 'Full-time Job');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `language_id` int(11) unsigned NOT NULL,
  `language_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `language_name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_id`, `language_name_en`, `language_name_ar`) VALUES
(1, 'English', 'الإنجليزية'),
(2, 'Arabic', 'العربية'),
(3, 'French', 'الفرنسية'),
(4, 'Spanish', 'الأسبانية'),
(5, 'German', 'الالمانية'),
(6, 'Hindi', 'الهندية'),
(7, 'Urdu', 'الأردية'),
(8, 'Farsi', 'الفارسية');

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE IF NOT EXISTS `major` (
  `major_id` int(11) unsigned NOT NULL,
  `major_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `major_name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1409 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`major_id`, `major_name_en`, `major_name_ar`) VALUES
(2, 'Agricultural and Domestic Animal Services', 'خدمات الزراعة والحيوانات المنزلية'),
(3, 'Animal Training', 'تدريب الحيوانات'),
(4, 'Dog/Pet/Animal Grooming', 'تحسين الحيوانات/الحيوانات الاليفة/الكلاب'),
(5, 'Equestrian/Equine Studies', 'الفروسية / دراسات الفروسية'),
(6, 'Taxidermy/Taxidermist', 'تحنيط الحيوانات / محنط الحيوانات'),
(7, 'Agricultural and Food Products Processing', 'معالجة المنتجات الزراعية والغذائية'),
(8, 'Agricultural Business and Management', 'الأعمال والإدارة الزراعية'),
(9, 'Agribusiness/Agricultural Business Operations', 'الأعمال الزراعية / العمليات التجارية الزراعية'),
(10, 'Agricultural Business Technology', 'تكنولوجيا الاعمال الزراعية'),
(11, 'Agricultural Economics', 'الاقتصاد الزراعي'),
(12, 'Agricultural/Farm Supplies Retailing and Wholesaling', 'تجارة بيع المستلزمات الزراعية بالتجزئة والجملة'),
(13, 'Farm/Farm and Ranch Management', 'مزرعة / ادارة المزارع و مزارع المواشي'),
(14, 'Agricultural Mechanization', 'الميكنة الزراعية'),
(15, 'Agricultural Mechanics and Equipment/Machine Technology', 'الميكانيكا الزراعية و تكنولوجيا المعدات والآلات  '),
(16, 'Agricultural Power Machinery Operation', 'عملية آلات الطاقة الزراعية'),
(17, 'Agricultural Production Operations', 'عمليات الإنتاج الزراعي'),
(18, 'Agroecology and Sustainable Agriculture', 'الزراعة الإيكولوجية والزراعة المستدامة'),
(19, 'Animal/Livestock Husbandry and Production', 'تربية وانتاج الثروة الحيوانية'),
(20, 'Aquaculture', 'تربية الأحياء المائية'),
(21, 'Crop Production', 'إنتاج المحاصيل'),
(22, 'Dairy Husbandry and Production', 'تربية الحيوانات المنتجة للالبان'),
(23, 'Horse Husbandry/Equine Science and Management', 'تربية الخيل/ علوم و ادارة الفروسية'),
(24, 'Viticulture and Enology', 'زراعة الكروم وعلم التخمير'),
(25, 'Agricultural Public Services', 'الخدمات الزراعية العامة'),
(26, 'Agricultural and Extension Education Services', 'خدمات الزراعة و تمديد التعليم'),
(27, 'Agricultural Communication/Journalism', 'الاتصالات/الصحافة الزراعية'),
(28, 'Animal Sciences', 'علوم الحيوان'),
(29, 'Agricultural Animal Breeding', 'تربية الحيوانات الزراعية'),
(30, 'Animal Health', 'صحة الحيوان'),
(31, 'Animal Nutrition', 'تغذية الحيوان'),
(32, 'Dairy Science', 'علوم الألبان'),
(33, 'Livestock Management', 'إدارة الثروة الحيوانية'),
(34, 'Poultry Science', 'علوم الدواجن'),
(35, 'Applied Horticulture and Horticultural Business Services', 'خدمات اعمال البستنة والبستنة التطبيقية'),
(36, 'Applied Horticulture/Horticulture Operations', 'البستنة / عمليات البستنة التطبيقية'),
(37, 'Floriculture/Floristry Operations and Management', 'عمليات و ادارة تزيين الزهور'),
(38, 'Greenhouse Operations and Management', 'عمليات وادارة المشاتل'),
(39, 'Landscaping and Groundskeeping', 'المناظر الطبيعية وGroundskeeping'),
(40, 'Ornamental Horticulture', 'البستنة التزيينية'),
(41, 'Plant Nursery Operations and Management', 'مشتل العمليات والإدارة'),
(42, 'Turf and Turfgrass Management', 'العشب وإدارة المروج'),
(43, 'Food Science and Technology', 'علوم وتكنولوجيا الأغذية'),
(44, 'Food Science', 'علوم الأغذية'),
(45, 'Food Technology and Processing', 'تكنولوجيا الغذاء وتجهيز'),
(46, 'International Agriculture', 'الزراعة الدولية'),
(47, 'Plant Sciences', 'علوم النبات'),
(48, 'Agricultural and Horticultural Plant Breeding', 'تربية النبات الزراعية والبستانية'),
(49, 'Agronomy and Crop Science', 'الهندسة الزراعية وعلوم المحاصيل'),
(50, 'Horticultural Science', 'العلوم البستانية'),
(51, 'Plant Protection and Integrated Pest Management', 'إدارة المصنع حماية والمتكاملة للآفات'),
(52, 'Range Science and Management', 'مجموعة العلوم والإدارة'),
(53, 'Soil Sciences', 'علوم التربة'),
(54, 'Soil Chemistry and Physics', 'كيمياء وفيزياء التربة'),
(55, 'Soil Microbiology', 'علم الأحياء الدقيقة في التربة'),
(56, 'Soil Science and Agronomy', 'علوم التربة والهندسة الزراعية'),
(57, 'Architecture and Related Services', 'الهندسة المعمارية والخدمات ذات الصلة'),
(58, 'Architectural History and Criticism', 'التاريخ المعماري ونقد'),
(59, 'Architectural Sciences and Technology', 'العلوم المعمارية والتكنولوجيا'),
(60, 'Architectural and Building Sciences/Technology', 'علوم البناء المعماري و/ تكنولوجيا'),
(61, 'Architectural Technology/Technician', 'تكنولوجيا الهندسة المعمارية / فني'),
(62, 'Architecture', 'هندسة العمارة'),
(63, 'City/Urban, Community and Regional Planning', 'المدينة / الحضرية، والجماعة والتخطيط الإقليمي'),
(64, 'Environmental Design', 'التصميم البيئي'),
(65, 'Environmental Design/Architecture', 'التصميم البيئي / الهندسة المعمارية'),
(66, 'Interior Architecture', 'العمارة الداخلية'),
(67, 'Landscape Architecture', 'هندسة المناظر الطبيعية'),
(68, 'Real Estate Development', 'التطوير العقاري'),
(69, 'Area, Ethnic, Cultural, Gender, and Group Studies', 'الإثنية والثقافية والجنس، والدراسات المجموعة المنطقة'),
(70, 'Area Studies', 'دراسات المنطقة'),
(71, 'African Studies', 'الدراسات الأفريقية'),
(72, 'American/United States Studies/Civilization', 'الدراسات الأمريكية / الولايات المتحدة / الحضارة'),
(73, 'Asian Studies/Civilization', 'الدراسات الآسيوية / الحضارة'),
(74, 'Balkans Studies', 'البلقان الدراسات'),
(75, 'Baltic Studies', 'دراسات البلطيق'),
(76, 'Canadian Studies', 'الدراسات الكندية'),
(77, 'Caribbean Studies', 'دراسات البحر الكاريبي'),
(78, 'Chinese Studies', 'الدراسات الصينية'),
(79, 'Commonwealth Studies', 'دراسات الكومنولث'),
(80, 'East Asian Studies', 'دراسات شرق آسيا'),
(81, 'European Studies/Civilization', 'الدراسات الأوروبية / الحضارة'),
(82, 'French Studies', 'الدراسات الفرنسية'),
(83, 'German Studies', 'الدراسات الألمانية'),
(84, 'Irish Studies', 'الدراسات الأيرلندية'),
(85, 'Italian Studies', 'الدراسات الإيطالية'),
(86, 'Japanese Studies', 'الدراسات اليابانية'),
(87, 'Korean Studies', 'الدراسات الكورية'),
(88, 'Latin American and Caribbean Studies', 'دراسات أمريكا اللاتينية والكاريبي'),
(89, 'Latin American Studies', 'الدراسات الأمريكية اللاتينية'),
(90, 'Near and Middle Eastern Studies', 'دراسات الشرق الادنى والاوسط'),
(91, 'Pacific Area/Pacific Rim Studies', '-المحيط الهادي / باسيفيك ريم الدراسات'),
(92, 'Polish Studies', 'الدراسات البولندية'),
(93, 'Regional Studies (US, Canadian, Foreign)', 'الدراسات الإقليمية (الولايات المتحدة وكندا، الخارجية)'),
(94, 'Russian Studies', 'الدراسات الروسية'),
(95, 'Russian, Central European, East European and Eurasian Studies', 'الدراسات الأوروبية وسط وشرق أوروبا وأوراسيا الروسية'),
(96, 'Scandinavian Studies', 'الدراسات الاسكندنافية'),
(97, 'Slavic Studies', 'الدراسات السلافية'),
(98, 'South Asian Studies', 'دراسات جنوب آسيا'),
(99, 'Southeast Asian Studies', 'دراسات جنوب شرق اسيا'),
(100, 'Spanish and Iberian Studies', 'الدراسات الإسبانية والإيبيرية'),
(101, 'Tibetan Studies', 'دراسات التبتية'),
(102, 'Ukraine Studies', 'الدراسات أوكرانيا'),
(103, 'Ural-Altaic and Central Asian Studies', 'دراسات آسيا الوسطى الأورال-التاى و'),
(104, 'Western European Studies', 'الدراسات الأوروبية الغربية'),
(105, 'Ethnic Studies', 'الدراسات العرقية'),
(106, 'African-American/Black Studies', '/ الدراسات الأسود الأفريقية-الأمريكية'),
(107, 'American Indian/Native American Studies', '/ الدراسات الأمريكية الأصلية الهندية الأمريكية'),
(108, 'Asian-American Studies', 'الدراسات الآسيوية للولايات المتحدة'),
(109, 'Deaf Studies', 'دراسات الصم'),
(110, 'Disability Studies', 'دراسات الإعاقة'),
(111, 'Folklore Studies', 'دراسات الفولكلور'),
(112, 'Gay/Lesbian Studies', 'مثلي الجنس / الدراسات مثليه'),
(113, 'Hispanic-American, Puerto Rican, and Mexican-American/Chicano Studies', '/ الدراسات الشيكانو ابيض للولايات المتحدة، بورتوريكو، والمكسيكية الأمريكية'),
(114, 'Women''s Studies', 'دراسات المرأة'),
(115, 'Aviation', 'طيران'),
(116, 'Aviation / Flight Training (UND Aerospace)', 'الطيران / تدريب الطيران (UND الفضاء)'),
(117, 'Biological and Biomedical Sciences', 'العلوم البيولوجية والطبية الحيوية'),
(118, 'Biochemistry, Biophysics and Molecular Biology', 'الكيمياء الحيوية، الفيزياء الحيوية والبيولوجيا الجزيئية'),
(119, 'Biochemistry', 'الكيمياء الحيوية'),
(120, 'Biochemistry and Molecular Biology', 'الكيمياء الحيوية والبيولوجيا الجزيئية'),
(121, 'Biophysics', 'فيزياء حيوية'),
(122, 'Molecular Biochemistry', 'الجزيئية الكيمياء الحيوية'),
(123, 'Molecular Biology', 'علم الأحياء الجزيئي'),
(124, 'Molecular Biophysics', 'الفيزياء الحيوية الجزيئية'),
(125, 'Photobiology', 'البيولوجيا الضوئية'),
(126, 'Radiation Biology/Radiobiology', 'إشعاع علم الأحياء / علم الاحياء الاشعاعي'),
(127, 'Structural Biology', 'علم الأحياء الهيكلي'),
(128, 'Biology', 'علوم الاحياء'),
(129, 'Biology/Biological Sciences', 'علم الأحياء / العلوم البيولوجية'),
(130, 'Biomedical Sciences', 'العلوم الطبية الحيوية'),
(131, 'Biomathematics, Bioinformatics, and Computational Biology', 'علم الأحياء الرياضيات البيولوجية، المعلوماتية الحيوية، والحاسوبية'),
(132, 'Bioinformatics', 'المعلوماتية الحيوية'),
(133, 'Biometry/Biometrics', 'علم الإحصاء الحيوي / القياسات الحيوية'),
(134, 'Biostatistics', 'الإحصاء الحيوي'),
(135, 'Computational Biology', 'علم الأحياء الحسابي'),
(136, 'Biotechnology', 'التكنولوجيا الحيوية'),
(137, 'Botany/Plant Biology', 'علم النبات / بيولوجيا النبات'),
(138, 'Plant Molecular Biology', 'مصنع البيولوجيا الجزيئية'),
(139, 'Plant Pathology/Phytopathology', 'أمراض النبات / امراض النبات'),
(140, 'Plant Physiology', 'فسيولوجيا النبات'),
(141, 'Cell/Cellular Biology and Anatomical Sciences', 'خلية / علم الأحياء الخلوي والعلوم تشريحية'),
(142, 'Anatomy', 'علم التشريح'),
(143, 'Cell Biology and Anatomy', 'بيولوجيا الخلية والتشريح'),
(144, 'Cell/Cellular and Molecular Biology', 'خلية / الخليوي والبيولوجيا الجزيئية'),
(145, 'Cell/Cellular Biology and Histology', 'خلية / علم الأحياء الخلوي وعلم الأنسجة'),
(146, 'Developmental Biology and Embryology', 'علم الأحياء التنموي وعلم الأجنة'),
(147, 'Ecology, Evolution, Systematics, and Population Biology', 'علم الأحياء علم البيئة، تطور، النظاميات، والسكان'),
(148, 'Aquatic Biology/Limnology', 'الأحياء المائية / علم المياه العذبة'),
(149, 'Conservation Biology', 'بيولوجيا الحفظ'),
(150, 'Ecology', 'علم البيئة'),
(151, 'Ecology and Evolutionary Biology', 'علم البيئة وعلم الأحياء التطوري'),
(152, 'Environmental Biology', 'علم الأحياء البيئي'),
(153, 'Epidemiology', 'علم الأوبئة'),
(154, 'Evolutionary Biology', 'علم الأحياء التطوري'),
(155, 'Marine Biology and Biological Oceanography', 'علم الأحياء البحرية وعلوم المحيطات البيولوجية'),
(156, 'Population Biology', 'علم الأحياء السكان'),
(157, 'Systematic Biology/Biological Systematics', 'علم الأحياء منهجي / النظاميات البيولوجي'),
(158, 'Genetics', 'علم الوراثة'),
(159, 'Animal Genetics', 'علم الوراثة الحيواني'),
(160, 'Genome Sciences/Genomics', 'علوم الجينوم / علم الجينوم'),
(161, 'Human/Medical Genetics', 'الإنسان / علم الوراثة الطبية'),
(162, 'Microbial and Eukaryotic Genetics', 'الميكروبية وحقيقية النواة علم الوراثة'),
(163, 'Molecular Genetics', 'علم الوراثة الجزيئية'),
(164, 'Plant Genetics', 'علم الوراثة النباتية'),
(165, 'Microbiological Sciences and Immunology', 'علوم الميكروبيولوجية والمناعة'),
(166, 'Immunology', 'علم المناعة'),
(167, 'Medical Microbiology and Bacteriology', 'علم الأحياء الدقيقة الطبية وعلم الجراثيم'),
(168, 'Microbiology', 'الاحياء الدقيقة'),
(169, 'Microbiology and Immunology', 'علم الأحياء الدقيقة والمناعة'),
(170, 'Mycology', 'علم الفطريات'),
(171, 'Parasitology', 'علم الطفيليات'),
(172, 'Virology', 'مبحث الفيروسات'),
(173, 'Molecular Medicine', 'الطب الجزيئي'),
(174, 'Neurobiology and Neurosciences', 'علم الأعصاب والعلوم العصبية'),
(175, 'Neuroanatomy', 'التشريح العصبي'),
(176, 'Neurobiology and Anatomy', 'علم الأعصاب وعلم التشريح'),
(177, 'Neurobiology and Behavior', 'علم الأعصاب والسلوك'),
(178, 'Neuroscience', 'علم الأعصاب'),
(179, 'Pharmacology and Toxicology', 'الأدوية والسموم'),
(180, 'Environmental Toxicology', 'علم السموم البيئية'),
(181, 'Molecular Pharmacology', 'الصيدلة الجزيئية'),
(182, 'Molecular Toxicology', 'علم السموم الجزيئي'),
(183, 'Neuropharmacology', 'الفارماكولوجيا العصبية'),
(184, 'Pharmacology', 'علم العقاقير'),
(185, 'Toxicology', 'علم السموم'),
(186, 'Physiology, Pathology and Related Sciences', 'علم وظائف الأعضاء، علم الأمراض وذات العلوم'),
(187, 'Aerospace Physiology and Medicine', 'الفضاء علم وظائف الأعضاء والطب'),
(188, 'Cardiovascular Science', 'علوم القلب والأوعية الدموية'),
(189, 'Cell Physiology', 'علم وظائف الأعضاء خلية'),
(190, 'Endocrinology', 'علم الغدد'),
(191, 'Exercise Physiology', 'ممارسة علم وظائف الأعضاء'),
(192, 'Molecular Physiology', 'علم وظائف الأعضاء الجزيئي'),
(193, 'Oncology and Cancer Biology', 'الأورام وسرطان الأحياء'),
(194, 'Pathology/Experimental Pathology', 'علم الأمراض / علم الأمراض التجريبي'),
(195, 'Physiology', 'علم وظائف الأعضاء'),
(196, 'Reproductive Biology', 'علم الأحياء الإنجابي'),
(197, 'Vision Science/Physiological Optics', 'رؤية علوم / البصريات الفسيولوجية'),
(198, 'Zoology/Animal Biology', 'علم الحيوان / علم الأحياء الحيوانية'),
(199, 'Animal Behavior and Ethology', 'سلوك الحيوان وعلم السلوك'),
(200, 'Animal Physiology', 'فسيولوجيا الحيوان'),
(201, 'Entomology', 'علم الحشرات'),
(202, 'Wildlife Biology', 'الحياة البرية الأحياء'),
(203, 'Business, Management, Marketing, and Related Support Services', 'الأعمال التجارية والإدارة والتسويق، وخدمات الدعم ذات الصلة'),
(204, 'Accounting and Related Services', 'المحاسبة والخدمات ذات الصلة'),
(205, 'Accounting', 'المحاسبة'),
(206, 'Accounting and Business/Management', 'المحاسبة والأعمال / الإدارة'),
(207, 'Accounting and Finance', 'المحاسبة والمالية'),
(208, 'Accounting Technology/Technician and Bookkeeping', 'تقنية المحاسبة / فني ومسك الدفاتر'),
(209, 'Auditing', 'التدقيق'),
(210, 'Business Administration, Management and Operations', 'إدارة الأعمال، الإدارة والعمليات'),
(211, 'Business Administration and Management', 'إدارة الأعمال والإدارة'),
(212, 'Customer Service Management', 'إدارة خدمة العملاء'),
(213, 'E-Commerce/Electronic Commerce', 'E-التجارة / التجارة الإلكترونية'),
(214, 'Logistics, Materials, and Supply Chain Management', 'الخدمات اللوجستية، مواد، وإدارة سلسلة التوريد'),
(215, 'Non-Profit/Public/Organizational Management', 'غير الهادفة للربح / العامة / الإدارة التنظيمية'),
(216, 'Office Management and Supervision', 'إدارة المكاتب والإشراف'),
(217, 'Operations Management and Supervision', 'إدارة العمليات والإشراف'),
(218, 'Organizational Leadership', 'القيادة التنظيمية'),
(219, 'Project Management', 'ادارة مشاريع'),
(220, 'Purchasing, Procurement/Acquisitions and Contracts Management', 'المشتريات، والمشتريات / الشراء والعقود إدارة'),
(221, 'Research and Development Management', 'البحث والتطوير الإداري'),
(222, 'Retail Management', 'إدارة البيع بالتجزئة'),
(223, 'Transportation/Mobility Management', 'نقل إدارة / التنقل'),
(224, 'Business Operations Support and Assistant Services', 'عمليات دعم الأعمال والخدمات مساعد'),
(225, 'Administrative Assistant and Secretarial Science', 'مساعد الإداري وعلوم سكرتارية'),
(226, 'Business/Office Automation/Technology/Data Entry', 'الأعمال / أتمتة المكاتب / تكنولوجيا إدخال البيانات /'),
(227, 'Customer Service Support/Call Center/Teleservice Operation', 'دعم خدمة العملاء / مركز الاتصال / TELESERVICE عملية'),
(228, 'Executive Assistant/Executive Secretary', 'مساعد / الأمين التنفيذي التنفيذي'),
(229, 'General Office Occupations and Clerical Services', 'عام المهن المكتبية والخدمات المكتبية'),
(230, 'Parts, Warehousing, and Inventory Management Operations', 'أجزاء والتخزين، وإدارة المخزون العمليات'),
(231, 'Receptionist', 'موظف استقبال'),
(232, 'Traffic, Customs, and Transportation Clerk/Technician', 'المرور، والجمارك، والنقل كاتب / فني'),
(233, 'Business/Commerce', 'الأعمال / التجارة'),
(234, 'Business/Corporate Communications', 'الأعمال / دائرة الاتصالات التنفيذية'),
(235, 'Business/Managerial Economics', 'الاقتصاد التجاري / الإداري'),
(236, 'Construction Management', 'إدارة البناء'),
(237, 'Entrepreneurial and Small Business Operations', 'العمليات التجارية الريادية والصغيرة'),
(238, 'Entrepreneurship/Entrepreneurial Studies', 'ريادة الأعمال / الدراسات الريادية'),
(239, 'Franchising and Franchise Operations', 'عمليات الامتياز والامتياز'),
(240, 'Small Business Administration/Management', 'إدارة الأعمال الصغيرة / إدارة'),
(241, 'Finance and Financial Management Services', 'المالية والخدمات الإدارة المالية'),
(242, 'Banking and Financial Support Services', 'خدمات الدعم المالية والمصرفية'),
(243, 'Credit Management', 'إدارة الائتمان'),
(244, 'Finance', 'المالية'),
(245, 'Financial Planning and Services', 'التخطيط والخدمات المالية'),
(246, 'International Finance', 'التمويل الدولية'),
(247, 'Investments and Securities', 'الاستثمارات والأوراق المالية'),
(248, 'Public Finance', 'المالية العامة'),
(249, 'General Sales, Merchandising and Related Marketing Operations', 'العامة على المبيعات، والتسويق وعمليات التسويق ذات'),
(250, 'Merchandising and Buying Operations', 'عمليات الترويج وشراء'),
(251, 'Retailing and Retail Operations', 'عمليات البيع بالتجزئة والبيع بالتجزئة'),
(252, 'Sales, Distribution, and Marketing Operations', 'المبيعات والتوزيع، وعمليات التسويق'),
(253, 'Selling Skills and Sales Operations', 'مهارات وعمليات المبيعات بيع'),
(254, 'Hospitality Administration/Management', 'إدارة الضيافة / إدارة'),
(255, 'Casino Management', 'إدارة الكازينو'),
(256, 'Hotel, Motel, and Restaurant Management', 'فندق، موتيل، وإدارة المطاعم'),
(257, 'Hotel/Motel Administration/Management', 'فندق / موتيل إدارة / إدارة'),
(258, 'Meeting and Event Planning', 'الاجتماعات وتنظيم الحفلات'),
(259, 'Resort Management', 'إدارة منتجع'),
(260, 'Restaurant/Food Services Management', 'مطعم / إدارة الخدمات الغذائية'),
(261, 'Tourism and Travel Services Management', 'السياحة وخدمات السفر إدارة'),
(262, 'Human Resources Management and Services', 'إدارة وخدمات الموارد البشرية'),
(263, 'Human Resources Development', 'تنمية الموارد البشرية'),
(264, 'Human Resources Management/Personnel Administration', 'إدارة إدارة الموارد البشرية / الموظفين'),
(265, 'Labor and Industrial Relations', 'العمل والعلاقات الصناعية'),
(266, 'Labor Studies', 'دراسات العمل'),
(267, 'Organizational Behavior Studies', 'دراسات السلوك التنظيمي'),
(268, 'Insurance', 'تأمين'),
(269, 'International Business', 'اعمال عالمية'),
(270, 'International Business/Trade/Commerce', 'الأعمال الدولية / التجارة / تجارة'),
(271, 'Management Information Systems and Services', 'إدارة نظم وخدمات المعلومات'),
(272, 'Information Resources Management', 'إدارة الموارد المعلومات'),
(273, 'Knowledge Management', 'إدارة المعرفة'),
(274, 'Management Information Systems', 'إدارة نظم معلومات'),
(275, 'Management Sciences and Quantitative Methods', 'علوم الإدارة والأساليب الكمية'),
(276, 'Actuarial Science', 'العلوم الاكتوارية'),
(277, 'Business Statistics', 'الاحصائيات الأعمال'),
(278, 'Management Science', 'العلوم الإدارية'),
(279, 'Marketing', 'تسويق'),
(280, 'International Marketing', 'التسويق الدولي'),
(281, 'Marketing Research', 'بحوث التسويق'),
(282, 'Marketing/Marketing Management', 'تسويق / إدارة التسويق'),
(283, 'Real Estate', 'العقارات'),
(284, 'Specialized Sales, Merchandising and Marketing Operations', 'المبيعات المتخصصة، والتسويق وعمليات التسويق'),
(285, 'Apparel and Accessories Marketing Operations', 'عمليات التسويق ملابس واكسسوارات'),
(286, 'Auctioneering', 'الدلالة'),
(287, 'Business and Personal/Financial Services Marketing Operations', 'الأعمال التجارية والشخصية / الخدمات المالية عمليات التسويق'),
(288, 'Fashion Merchandising', 'تجارة الأزياء'),
(289, 'Fashion Modeling', 'الازياء'),
(290, 'Hospitality and Recreation Marketing Operations', 'الضيافة وعمليات التسويق الترفيه'),
(291, 'Special Products Marketing Operations', 'المنتجات عمليات التسويق الخاصة'),
(292, 'Tourism and Travel Services Marketing Operations', 'السياحة والخدمات عمليات التسويق سفر'),
(293, 'Tourism Promotion Operations', 'عمليات الترويج السياحي'),
(294, 'Vehicle and Vehicle Parts and Accessories Marketing Operations', 'المركبات وقطع غيار المركبات وملحقاتها عمليات التسويق'),
(295, 'Taxation', 'فرض الضرائب'),
(296, 'Telecommunications Management', 'إدارة الاتصالات'),
(297, 'Communication, Journalism, and Related Programs', 'الاتصالات، برامج الصحافة، وما يتصل'),
(298, 'Communication and Media Studies', 'الاتصالات والدراسات الإعلامية'),
(299, 'Mass Communication/Media Studies', 'الإعلام / الدراسات الإعلامية'),
(300, 'Speech Communication and Rhetoric', 'خطاب الاتصالات والبلاغة'),
(301, 'Journalism', 'صحافة'),
(302, 'Broadcast Journalism', 'الصحافة الإذاعية والتلفزيونية'),
(303, 'Photojournalism', 'التصوير الصحفي'),
(304, 'Public Relations, Advertising, and Applied Communication', 'العلاقات العامة، الإعلان، والاتصالات التطبيقية'),
(305, 'Advertising', 'دعايه واعلان'),
(306, 'Health Communication', 'الاتصالات الصحة'),
(307, 'International and Intercultural Communication', 'الاتصالات الدولي وبين الثقافات'),
(308, 'Organizational Communication', 'الاتصال التنظيمي'),
(309, 'Political Communication', 'الاتصالات السياسية'),
(310, 'Public Relations/Image Management', 'العلاقات العامة / إدارة الصور'),
(311, 'Sports Communication', 'الاتصالات الرياضة'),
(312, 'Technical and Scientific Communication', 'الاتصالات التقني والعلمي'),
(313, 'Publishing', 'نشر'),
(314, 'Radio, Television, and Digital Communication', 'الإذاعة والتلفزيون، والاتصالات الرقمية'),
(315, 'Digital Communication and Media/Multimedia', 'الاتصالات الرقمية والإعلام / الوسائط المتعددة'),
(316, 'Radio and Television', 'الإذاعة والتلفزيون'),
(317, 'Communications Technologies/technicians and Support Services', 'تكنولوجيا الاتصالات / فنيين وخدمات الدعم'),
(318, 'Audiovisual Communications Technologies/Technicians', 'الاتصالات السمعية البصرية تكنولوجيز / فنيي'),
(319, 'Photographic and Film/Video Technology/Technician and Assistant', 'التصوير الفوتوغرافي والسينمائي / تكنولوجيا الفيديو / فني ومساعد'),
(320, 'Radio and Television Broadcasting Technology/Technician', 'البث الإذاعي والتلفزيوني تكنولوجيا / فني'),
(321, 'Recording Arts Technology/Technician', 'تسجيل الفنون والتكنولوجيا / فني'),
(322, 'Communications Technology/Technician', 'تكنولوجيا الاتصالات / فني'),
(323, 'Graphic Communications', 'الرسم الاتصالات'),
(324, 'Animation, Interactive Technology, Video Graphics and Special Effects', 'الرسوم المتحركة والتكنولوجيا التفاعلية، رسومات الفيديو والمؤثرات الخاصة'),
(325, 'Computer Typography and Composition Equipment Operator', 'الكمبيوتر الطباعة ومشغل معدات التركيب'),
(326, 'Graphic and Printing Equipment Operator Production', 'إنتاج الرسوم البيانية ومعدات الطباعة المشغل'),
(327, 'Platemaker/Imager', 'Platemaker / تصوير'),
(328, 'Prepress/Desktop Publishing and Digital Imaging Design', 'ما قبل الطباعة / النشر المكتبي والتصميم التصوير الرقمي'),
(329, 'Printing Management', 'إدارة الطباعة'),
(330, 'Printing Press Operator', 'الطباعة المشغل الصحافة'),
(331, 'Computer and Information Sciences and Support Services', 'خدمات الكمبيوتر، وعلوم المعلومات ودعم'),
(332, 'Computer and Information Sciences', 'علوم الحاسوب والاتصال'),
(333, 'Artificial Intelligence', 'الذكاء الاصطناعي'),
(334, 'Informatics', 'المعلوماتية'),
(335, 'Information Technology', 'تكنولوجيا المعلومات'),
(336, 'Computer Programming', 'برمجة الحاسوب'),
(337, 'Computer Programming, Specific Applications', 'برمجة الحاسب الآلي، تطبيقات معينة'),
(338, 'Computer Programming, Vendor/Product Certification', 'برمجة الحاسوب، البائع / شهادة المنتج'),
(339, 'Computer Programming/Programmer', 'برمجة الحاسوب / مبرمج'),
(340, 'Computer Science', 'علوم الحاسوب'),
(341, 'Computer Software and Media Applications', 'الكمبيوتر البرامج والتطبيقات وسائل الإعلام'),
(342, 'Computer Graphics', 'الرسومات الكمبيوتر'),
(343, 'Data Modeling/Warehousing and Database Administration', 'بيانات النمذجة / التخزين وإدارة قواعد البيانات'),
(344, 'Modeling, Virtual Environments and Simulation', 'النمذجة، والمحاكاة البيئات الافتراضية'),
(345, 'Web Page, Digital/Multimedia and Information Resources Design', 'صفحة ويب، الرقمية / الوسائط المتعددة وتصميم مصادر المعلومات'),
(346, 'Computer Systems Analysis', 'كمبيوتر تحليل النظم'),
(347, 'Computer Systems Analysis/Analyst', 'كمبيوتر تحليل النظم / محلل'),
(348, 'Computer Systems Networking and Telecommunications', 'أنظمة الكمبيوتر والشبكات والاتصالات'),
(349, 'Computer/Information Technology Administration and Management', 'الكمبيوتر / إدارة تقنية المعلومات وإدارة'),
(350, 'Computer and Information Systems Security/Information Assurance', 'الحاسوب وأمن نظم المعلومات / أمن المعلومات'),
(351, 'Computer Support Specialist', 'أخصائي دعم الكمبيوتر'),
(352, 'Information Technology Project Management', 'إدارة مشروع تكنولوجيا المعلومات'),
(353, 'Network and System Administration/Administrator', 'شبكة ونظام إدارة / مدير'),
(354, 'System, Networking, and LAN/WAN Management/Manager', 'النظام، والشبكات، وLAN / WAN إدارة / مدير'),
(355, 'Web/Multimedia Management and Webmaster', '/ إدارة الوسائط المتعددة على شبكة الإنترنت ومشرفي'),
(356, 'Data Entry/Microcomputer Applications', 'إدخال البيانات تطبيقات / الدقيقة'),
(357, 'Word Processing', 'معالجة الكلمة'),
(358, 'Data Processing', 'معالجة البيانات'),
(359, 'Data Processing and Data Processing Technology/Technician', 'معالجة البيانات وتقنية معالجة البيانات / فني'),
(360, 'Information Science/Studies', 'علم المعلومات / دراسات'),
(361, 'Construction Trades', 'الصفقات البناء'),
(362, 'Building/Construction Finishing, Management, and Inspection', 'التشطيب البناء / التعمير والإدارة والتفتيش'),
(363, 'Building Construction Technology', 'بناء تكنولوجيا البناء'),
(364, 'Building/Construction Site Management/Manager', 'بناء / بناء إدارة الموقع / مدير'),
(365, 'Building/Home/Construction Inspection/Inspector', 'بناء / الرئيسية / البناء التفتيش / المفتش'),
(366, 'Building/Property Maintenance', 'بناء / صيانة الملكية'),
(367, 'Carpet, Floor, and Tile Worker', 'السجاد، الأرضيات، وبلاط العمال'),
(368, 'Concrete Finishing/Concrete Finisher', 'التشطيب ملموسة / تشطيب الخرسانة'),
(369, 'Drywall Installation/Drywaller', 'دريوال تركيب / Drywaller'),
(370, 'Glazier', 'زجاج'),
(371, 'Insulator', 'عازل'),
(372, 'Metal Building Assembly/Assembler', 'المعادن مبنى الجمعية / مجمع'),
(373, 'Painting/Painter and Wall Coverer', 'اللوحة / الرسام وحائط المغطي'),
(374, 'Roofer', 'ساقف'),
(375, 'Carpenters', 'النجارين'),
(376, 'Carpentry/Carpenter', 'النجارة / كاربنتر'),
(377, 'Electrical and Power Transmission Installers', 'التركيب نقل الطاقة الكهربائية والطاقة'),
(378, 'Electrical and Power Transmission Installation/Installer', 'التركيبات الكهربائية ونقل الطاقة / المثبت'),
(379, 'Electrician', 'فنى كهربائى'),
(380, 'Lineworker', 'Lineworker'),
(381, 'Mason/Masonry', 'ميسون / الماسونية'),
(382, 'Plumbing and Related Water Supply Services', 'السباكة والمياه خدمات مرتبطة بها التموين'),
(383, 'Blasting/Blaster', 'التفجير / مكبر'),
(384, 'Pipefitting/Pipefitter and Sprinkler Fitter', 'Pipefitting / معطى الأسرار والرشاش الميكانيكي'),
(385, 'Plumbing Technology/Plumber', 'السباكة تكنولوجيا / سباك'),
(386, 'Well Drilling/Driller', 'حفر آبار / الحفار'),
(387, 'Education', 'تربية وتعليم'),
(388, 'Bilingual, Multilingual, and Multicultural Education', 'ثنائية اللغة، متعددة اللغات، والتعليم متعدد الثقافات'),
(389, 'Bilingual and Multilingual Education', 'ثنائية اللغة والتعليم المتعدد اللغات'),
(390, 'Indian/Native American Education', 'الهندي / الأصلية التعليم الأمريكية'),
(391, 'Multicultural Education', 'التعليم متعدد الثقافات'),
(392, 'Curriculum and Instruction', 'المناهج وطرق التدريس'),
(393, 'Educational Administration and Supervision', 'الإدارة التربوية والإشراف'),
(394, 'Administration of Special Education', 'إدارة التربية الخاصة'),
(395, 'Adult and Continuing Education Administration', 'الكبار وإدارة التعليم المستمر'),
(396, 'Community College Education', 'كلية المجتمع التعليم'),
(397, 'Educational Leadership and Administration', 'القيادة التربوية والإدارة'),
(398, 'Educational, Instructional, and Curriculum Supervision', 'تربية والتعليمية، والمناهج الإشراف'),
(399, 'Elementary and Middle School Administration/Principalship', 'الابتدائية والإعدادية الإدارة / برينسيبالشيب'),
(400, 'Higher Education/Higher Education Administration', 'إدارة / التعليم العالي التعليم العالي'),
(401, 'Secondary School Administration/Principalship', 'الثانوي مدرسة الإدارة / برينسيبالشيب'),
(402, 'Superintendency and Educational System Administration', 'إدارة الرقابة وتربية النظام'),
(403, 'Urban Education and Leadership', 'التعليم في المناطق الحضرية والقيادة'),
(404, 'Educational Assessment, Evaluation, and Research', 'تقييم للتربية والتقييم، والبحوث'),
(405, 'Educational Assessment, Testing, and Measurement', 'تقييم للتربية واختبار، والقياس'),
(406, 'Educational Evaluation and Research', 'تقييم والبحوث التربوية'),
(407, 'Educational Statistics and Research Methods', 'الإحصاء التربوي ومناهج البحث'),
(408, 'Learning Sciences', 'علوم التعلم'),
(409, 'Educational/Instructional Media Design', 'تربية / التصميم التعليمي وسائل الإعلام'),
(410, 'Educational/Instructional Technology', 'تربية / تكنولوجيا التعليم'),
(411, 'International and Comparative Education', 'الدولي والتربية المقارنة'),
(412, 'Social and Philosophical Foundations of Education', 'الأسس الاجتماعية والفلسفية التربية والتعليم'),
(413, 'Special Education and Teaching', 'التعليم الخاص والتعليم'),
(414, 'Education/Teaching of Individuals in Early Childhood Special Education Programs', 'التعليم / تعليم الأفراد في مرحلة الطفولة المبكرة برامج التربية الخاصة'),
(415, 'Education/Teaching of Individuals in Elementary Special Education Programs', 'التعليم / تعليم الأفراد في الابتدائية برامج التربية الخاصة'),
(416, 'Education/Teaching of Individuals in Junior High/Middle School Special Education Programs', 'التعليم / تعليم الأفراد في الإعدادية / مدرسة الأوسط برامج التربية الخاصة'),
(417, 'Education/Teaching of Individuals in Secondary Special Education Programs', 'التعليم / تعليم الأفراد في برامج التربية الخاصة الثانوية'),
(418, 'Education/Teaching of Individuals Who are Developmentally Delayed', 'التعليم / تعليم للأفراد الذين يتم تأخير تنمويا'),
(419, 'Education/Teaching of Individuals with Autism', 'التعليم / تعليم الأفراد المصابين بالتوحد'),
(420, 'Education/Teaching of Individuals with Emotional Disturbances', 'التعليم / تعليم الأفراد مع الاضطرابات العاطفية'),
(421, 'Education/Teaching of Individuals with Hearing Impairments Including Deafness', 'التعليم / تعليم الأفراد يعانون من ضعف السمع بما في ذلك الصمم'),
(422, 'Education/Teaching of Individuals with Mental Retardation', 'التعليم / تعليم الأفراد ذوي التخلف العقلي'),
(423, 'Education/Teaching of Individuals with Multiple Disabilities', 'التعليم / تعليم الأفراد ذوي الإعاقة متعددة'),
(424, 'Education/Teaching of Individuals with Specific Learning Disabilities', 'التعليم / تعليم الأفراد ذوي صعوبات التعلم المحددة'),
(425, 'Education/Teaching of Individuals with Speech or Language Impairments', 'التعليم / تعليم الأفراد مع الكلام أو اللغة الإعاقات'),
(426, 'Education/Teaching of Individuals with Traumatic Brain Injuries', 'التعليم / تعليم الأفراد مع إصابات الدماغ الرضية'),
(427, 'Education/Teaching of Individuals with Vision Impairments Including Blindness', 'التعليم / تعليم الأفراد مع الرؤية الإعاقات بما في ذلك العمى'),
(428, 'Education/Teaching of the Gifted and Talented', 'التعليم / تعليم لرعاية الموهوبين والمتفوقين'),
(429, 'Student Counseling and Personnel Services', 'الإرشاد الطلابي وخدمات الموظفين'),
(430, 'College Student Counseling and Personnel Services', 'كلية الإرشاد الطلابي وخدمات الموظفين'),
(431, 'Counselor Education/School Counseling and Guidance Services', 'مستشار التعليم / مدرسة الإرشاد وخدمات التوجيه'),
(432, 'Teacher Education and Professional Development, Specific Levels and Methods', 'يا معلم التعليم والتطوير المهني، مستويات محددة وطرق'),
(433, 'Adult and Continuing Education and Teaching', 'تعليم الكبار والتعليم المستمر والتعليم'),
(434, 'Early Childhood Education and Teaching', 'التعليم في مرحلة الطفولة المبكرة والتعليم'),
(435, 'Elementary Education and Teaching', 'التعليم الابتدائي والتعليم'),
(436, 'Junior High/Intermediate/Middle School Education and Teaching', 'الإعدادية / المتوسطة / الشرق التعليم مدرسة والتعليم'),
(437, 'Kindergarten/Preschool Education and Teaching', 'روضة أطفال / مرحلة ما قبل المدرسة التربية والتعليم'),
(438, 'Montessori Teacher Education', 'مونتيسوري المعلمين'),
(439, 'Secondary Education and Teaching', 'التعليم الثانوي والتعليم'),
(440, 'Teacher Education, Multiple Levels', 'يا معلم التعليم، مستويات متعددة'),
(441, 'Waldorf/Steiner Teacher Education', 'والدورف / شتاينر المعلمين'),
(442, 'Teacher Education and Professional Development, Specific Subject Areas', 'يا معلم التعليم والتنمية المهنية، مناطق موضوع معين'),
(443, 'Agricultural Teacher Education', 'الزراعية المعلمين'),
(444, 'Art Teacher Education', 'الفن المعلمين'),
(445, 'Biology Teacher Education', 'علم الأحياء المعلمين'),
(446, 'Business Teacher Education', 'الأعمال المعلمين'),
(447, 'Chemistry Teacher Education', 'الكيمياء المعلمين'),
(448, 'Computer Teacher Education', 'كمبيوتر المعلمين'),
(449, 'Drama and Dance Teacher Education', 'الدراما والرقص المعلمين'),
(450, 'Driver and Safety Teacher Education', 'السائق والسلامة المعلمين'),
(451, 'Earth Science Teacher Education', 'علوم الأرض المعلمين'),
(452, 'English/Language Arts Teacher Education', 'الإنجليزية / فنون اللغة المعلمين'),
(453, 'Environmental Education', 'التربية البيئية'),
(454, 'Family and Consumer Sciences/Home Economics Teacher Education', 'علوم الأسرة والمستهلك / الاقتصاد المنزلي المعلمين'),
(455, 'Foreign Language Teacher Education', 'الخارجية مدرس لغة التعليم'),
(456, 'French Language Teacher Education', 'الفرنسية مدرس لغة التعليم'),
(457, 'Geography Teacher Education', 'الجغرافيا المعلمين'),
(458, 'German Language Teacher Education', 'اللغة الألمانية المعلمين'),
(459, 'Health Occupations Teacher Education', 'الصحة المهن المعلمين'),
(460, 'Health Teacher Education', 'الصحة المعلمين'),
(461, 'History Teacher Education', 'مدرس التاريخ التعليم'),
(462, 'Latin Teacher Education', 'اللاتينية المعلمين'),
(463, 'Mathematics Teacher Education', 'الرياضيات المعلمين'),
(464, 'Music Teacher Education', 'الموسيقى المعلمين'),
(465, 'Physical Education Teaching and Coaching', 'التربية البدنية التعليم والتدريب'),
(466, 'Physics Teacher Education', 'الفيزياء المعلمين'),
(467, 'Psychology Teacher Education', 'علم النفس المعلمين'),
(468, 'Reading Teacher Education', 'القراءة المعلمين'),
(469, 'Sales and Marketing Operations/Marketing and Distribution Teacher Education', 'المبيعات وعمليات التسويق / التسويق والتوزيع المعلمين'),
(470, 'School Librarian/School Library Media Specialist', 'أخصائي المدرسة مكتبة / مدرسة مكتبة الوسائط'),
(471, 'Science Teacher Education/General Science Teacher Education', 'مدرس العلوم التعليم / عامة العلوم المعلمين'),
(472, 'Social Science Teacher Education', 'العلوم الاجتماعية المعلمين'),
(473, 'Social Studies Teacher Education', 'الدراسات الاجتماعية المعلمين'),
(474, 'Spanish Language Teacher Education', 'الأسبانية مدرس لغة التعليم'),
(475, 'Speech Teacher Education', 'خطاب المعلمين'),
(476, 'Technical Teacher Education', 'التقنية المعلمين'),
(477, 'Technology Teacher Education/Industrial Arts Teacher Education', 'التكنولوجيا المعلمين / الصناعية الفنون المعلمين'),
(478, 'Trade and Industrial Teacher Education', 'التجارة والصناعية المعلمين'),
(479, 'Teaching Assistants/Aides', 'التدريس المساعدين / مساعدون'),
(480, 'Adult Literacy Tutor/Instructor', 'محو أمية الكبار مدرس / مدرس'),
(481, 'Teacher Assistant/Aide', 'مدرس مساعد / مساعد'),
(482, 'Teaching English or French as a Second or Foreign Language', 'تدريس اللغة الإنجليزية أو الفرنسية كلغة ثانية أو لغة أجنبية'),
(483, 'Teaching English as a Second or Foreign Language/ESL Language Instructor', 'تدريس اللغة الإنجليزية لغير مدرس الثانية أو اللغات الأجنبية / ESL اللغة'),
(484, 'Teaching French as a Second or Foreign Language', 'تدريس اللغة الفرنسية كلغة ثانية أو لغة أجنبية'),
(485, 'Engineering Technologies and Engineering-Related Fields', 'تكنولوجيا الهندسة والمجالات الهندسية المتصلة'),
(486, 'Architectural Engineering Technologies/Technicians', 'المعماري تكنولوجيا الهندسة / فنيي'),
(487, 'Architectural Engineering Technology/Technician', 'تكنولوجيا الهندسة المعمارية / فني'),
(488, 'Civil Engineering Technologies/Technicians', 'هندسة تقنيات المدنية / فنيي'),
(489, 'Civil Engineering Technology/Technician', 'تكنولوجيا الهندسة المدنية / فني'),
(490, 'Computer Engineering Technologies/Technicians', 'هندسة الكمبيوتر تكنولوجيز / فنيي'),
(491, 'Computer Engineering Technology/Technician', 'الكمبيوتر والتكنولوجيا الهندسة / فني'),
(492, 'Computer Hardware Technology/Technician', 'تكنولوجيا الكمبيوترات / فني'),
(493, 'Computer Software Technology/Technician', 'كمبيوتر تكنولوجيا البرمجيات / فني'),
(494, 'Computer Technology/Computer Systems Technology', 'تقنية الكمبيوتر / كمبيوتر سيستمز تكنولوجيا'),
(495, 'Construction Engineering Technologies', 'هندسة البناء تكنولوجيز'),
(496, 'Construction Engineering Technology/Technician', 'بناء تكنولوجيا الهندسة / فني'),
(497, 'Drafting/Design Engineering Technologies/Technicians', 'صياغة / التصميم الهندسي للتكنولوجيا / فنيي'),
(498, 'Architectural Drafting and Architectural CAD/CADD', 'الصياغة المعمارية والهندسة المعمارية CAD / CADD'),
(499, 'CAD/CADD Drafting and/or Design Technology/Technician', 'CAD / CADD صياغة و / أو تقنية التصميم / فني'),
(500, 'Civil Drafting and Civil Engineering CAD/CADD', 'صياغة المدنية والهندسة المدنية CAD / CADD'),
(501, 'Drafting and Design Technology/Technician', 'الصياغة والتكنولوجيا التصميم / فني'),
(502, 'Electrical/Electronics Drafting and Electrical/Electronics CAD/CADD', 'الكهربائية / إلكترونيات صياغة والكهربائية / إلكترونيات CAD / CADD'),
(503, 'Mechanical Drafting and Mechanical Drafting CAD/CADD', 'صياغة الميكانيكية والميكانيكية صياغة CAD / CADD'),
(504, 'Electrical Engineering Technologies/Technicians', 'الهندسة الكهربائية تكنولوجيز / فنيي'),
(505, 'Electrical, Electronic and Communications Engineering Technology/Technician', 'الكهربائية والالكترونية والاتصالات وتكنولوجيا الهندسة / فني'),
(506, 'Integrated Circuit Design', 'تصميم الدوائر المتكاملة'),
(507, 'Laser and Optical Technology/Technician', 'الليزر والتكنولوجيا البصرية / فني'),
(508, 'Telecommunications Technology/Technician', 'تكنولوجيا الاتصالات / فني'),
(509, 'Electromechanical Instrumentation and Maintenance Technologies/Technicians', 'الأجهزة الكهربائية والصيانة تكنولوجيز / فنيي'),
(510, 'Automation Engineer Technology/Technician', 'أتمتة المهندس تكنولوجيا / فني'),
(511, 'Biomedical Technology/Technician', 'التكنولوجيا الطبية الحيوية / فني'),
(512, 'Electromechanical Technology/Electromechanical Engineering Technology', 'تكنولوجيا الكهروميكانيكية / تكنولوجيا الهندسة الكهروميكانيكية'),
(513, 'Instrumentation Technology/Technician', 'تقنية الأجهزة / فني'),
(514, 'Robotics Technology/Technician', 'الروبوتات تكنولوجيا / فني'),
(515, 'Engineering-Related Fields', 'الحقول المتصلة الهندسة'),
(516, 'Engineering Design', 'التصميم الهندسي'),
(517, 'Engineering/Industrial Management', 'الهندسة / الإدارة الصناعية'),
(518, 'Packaging Science', 'علوم التعبئة والتغليف'),
(519, 'Engineering-Related Technologies', 'المتصلة هندسة تكنولوجيا'),
(520, 'Hydraulics and Fluid Power Technology/Technician', 'الهيدروليكية والسائل تكنولوجيا الطاقة / فني'),
(521, 'Surveying Technology/Surveying', 'مسح تكنولوجيا / المسح'),
(522, 'Environmental Control Technologies/Technicians', 'الرقابة البيئية تكنولوجيز / فنيي'),
(523, 'Energy Management and Systems Technology/Technician', 'إدارة الطاقة وأنظمة تكنولوجيا / فني'),
(524, 'Environmental Engineering Technology/Environmental Technology', 'تقنية الهندسة البيئية / تكنولوجيا البيئة'),
(525, 'Hazardous Materials Management and Waste Technology/Technician', 'إدارة المواد الخطرة والتكنولوجيا المخلفات / فني'),
(526, 'Heating, Ventilation, Air Conditioning and Refrigeration Engineering Technology/Technician', 'التدفئة والتهوية وتكييف الهواء والتبريد الهندسة والتكنولوجيا / فني'),
(527, 'Solar Energy Technology/Technician', 'تكنولوجيا الطاقة الشمسية / فني'),
(528, 'Water Quality and Wastewater Treatment Management and Recycling Technology/Technician', 'نوعية المياه وإدارة معالجة المياه العادمة وإعادة تقنية / فني'),
(529, 'Industrial Production Technologies/Technicians', 'الإنتاج الصناعي تكنولوجيز / فنيي'),
(530, 'Chemical Engineering Technology/Technician', 'تكنولوجيا الهندسة الكيميائية / فني'),
(531, 'Industrial Technology/Technician', 'التكنولوجيا الصناعية / فني'),
(532, 'Manufacturing Engineering Technology/Technician', 'صناعة تكنولوجيا الهندسة / فني'),
(533, 'Metallurgical Technology/Technician', 'تكنولوجيا المعادن / فني'),
(534, 'Plastics and Polymer Engineering Technology/Technician', 'البلاستيك والبوليمرات تقنية الهندسة / فني'),
(535, 'Semiconductor Manufacturing Technology', 'أشباه الموصلات تكنولوجيا التصنيع'),
(536, 'Welding Engineering Technology/Technician', 'لحام تكنولوجيا الهندسة / فني'),
(537, 'Mechanical Engineering Related Technologies/Technicians', 'الهندسة الميكانيكية التكنولوجيات ذات الصلة / فنيي'),
(538, 'Aeronautical/Aerospace Engineering Technology/Technician', 'الطيران / الفضاء تكنولوجيا الهندسة / فني'),
(539, 'Automotive Engineering Technology/Technician', 'السيارات تكنولوجيا الهندسة / فني'),
(540, 'Mechanical Engineering/Mechanical Technology/Technician', 'الهندسة الميكانيكية / التقنية الميكانيكية / فني'),
(541, 'Mining and Petroleum Technologies/Technicians', 'التعدين وتقنيات البترول / فنيي'),
(542, 'Mining Technology/Technician', 'تكنولوجيا التعدين / فني'),
(543, 'Petroleum Technology/Technician', 'تكنولوجيا البترول / فني'),
(544, 'Nanotechnology', 'تكنولوجيا النانو'),
(545, 'Nuclear Engineering Technologies/Technicians', 'الهندسة النووية تكنولوجيز / فنيي'),
(546, 'Nuclear Engineering Technology/Technician', 'تقنية الهندسة النووية / فني'),
(547, 'Quality Control and Safety Technologies/Technicians', 'مراقبة الجودة وتقنيات السلامة / فنيي'),
(548, 'Hazardous Materials Information Systems Technology/Technician', 'نظم تكنولوجيا المعلومات الخطرة المواد / فني'),
(549, 'Industrial Safety Technology/Technician', 'تكنولوجيا السلامة الصناعية / فني'),
(550, 'Occupational Safety and Health Technology/Technician', 'السلامة المهنية وتكنولوجيا الصحة / فني'),
(551, 'Quality Control Technology/Technician', 'جودة مراقبة تكنولوجيا / فني'),
(552, 'Engineering', 'هندسة'),
(553, 'Aerospace, Aeronautical and Astronautical Engineering', 'هندسة الطيران ، الفضاء و الملاحة الفضائية'),
(554, 'Aerospace, Aeronautical and Astronautical/Space Engineering', 'الفضاء، الطيران والملاحة الفضائية / هندسة الفضاء'),
(555, 'Agricultural Engineering', 'الهندسة الزراعية'),
(556, 'Architectural Engineering', 'هندسة معماري'),
(557, 'Biochemical Engineering', 'الهندسة البيوكيميائية'),
(558, 'Biological/Biosystems Engineering', 'البيولوجي / النظم البيولوجية الهندسة'),
(559, 'Biomedical/Medical Engineering', 'الطب الحيوي / الهندسة الطبية'),
(560, 'Bioengineering and Biomedical Engineering', 'الهندسة الحيوية والطبية الحيوية'),
(561, 'Ceramic Sciences and Engineering', 'العلوم السيراميك والهندسة'),
(562, 'Chemical Engineering', 'الهندسة الكيميائية'),
(563, 'Chemical and Biomolecular Engineering', 'هندسة الكيميائية والبيولوجية'),
(564, 'Civil Engineering', 'هندسه مدنيه'),
(565, 'Geotechnical and Geoenvironmental Engineering', 'الهندسة الجيوتقنية وGeoenvironmental'),
(566, 'Structural Engineering', 'الهندسة الإنشائية'),
(567, 'Transportation and Highway Engineering', 'النقل وهندسة الطرق السريعة'),
(568, 'Water Resources Engineering', 'هندسة الموارد المائية'),
(569, 'Computer Engineering', 'هندسة حاسوب'),
(570, 'Computer Hardware Engineering', 'الهندسة الكمبيوترات و قطع الغيار'),
(571, 'Computer Software Engineering', 'هندسة برامج الكمبيوتر'),
(572, 'Construction Engineering', 'هندسة البناء'),
(573, 'Electrical, Electronics and Communications Engineering', 'الكهربائية، هندسة الالكترونيات والاتصالات'),
(574, 'Electrical and Electronics Engineering', 'الهندسة الكهربائية والإلكترونيات'),
(575, 'Laser and Optical Engineering', 'الليزر والهندسة الضوئية'),
(576, 'Telecommunications Engineering', 'هندسه اتصالات'),
(577, 'Electromechanical Engineering', 'الهندسة الكهروميكانيكية'),
(578, 'Engineering Chemistry', 'الكيمياء الهندسية'),
(579, 'Engineering Mechanics', 'ميكانيكا الهندسة'),
(580, 'Engineering Physics', 'الفيزياء الهندسية'),
(581, 'Engineering Physics/Applied Physics', 'الفيزياء الهندسية / الفيزياء التطبيقية'),
(582, 'Engineering Science', 'علم الهندسة'),
(583, 'Pre-Engineering', 'قبل الهندسة'),
(584, 'Environmental/Environmental Health Engineering', 'البيئة / الهندسة البيئية الصحة'),
(585, 'Forest Engineering', 'هندسة الغابات'),
(586, 'Geological/Geophysical Engineering', 'الجيولوجية / الهندسة الجيوفيزيائية'),
(587, 'Industrial Engineering', 'الهندسة الصناعية'),
(588, 'Manufacturing Engineering', 'هندسة التصنيع'),
(589, 'Materials Engineering', 'هندسة المواد'),
(590, 'Mechanical Engineering', 'هندسة ميكانيك'),
(591, 'Mechatronics, Robotics, and Automation Engineering', 'هندسة الميكاترونكس، والروبوتات، وأتمتة الهندسة'),
(592, 'Metallurgical Engineering', 'الهندسة المدنية'),
(593, 'Mining and Mineral Engineering', 'هندسة التعدين'),
(594, 'Naval Architecture and Marine Engineering', 'هندسة المنشآت البحرية والهندسة البحرية'),
(595, 'Nuclear Engineering', 'الهندسة النووية'),
(596, 'Ocean Engineering', 'هندسة المحيطات'),
(597, 'Operations Research', 'بحوث العمليات'),
(598, 'Paper Science and Engineering', 'ورقة للعلوم والهندسة'),
(599, 'Petroleum Engineering', 'هندسة نفط'),
(600, 'Polymer/Plastics Engineering', 'البوليمر / هندسة البلاستيك'),
(601, 'Surveying Engineering', 'هندسة المساحة'),
(602, 'Systems Engineering', 'هندسة النظم'),
(603, 'Textile Sciences and Engineering', 'علوم النسيج وهندسته'),
(604, 'English Language and Literature/letters', 'اللغة الإنجليزية وآدابها / رسائل'),
(605, 'English Language and Literature', 'اللغة الإنجليزية وآدابها'),
(606, 'Literature', 'أدب'),
(607, 'American Literature (Canadian)', 'الأدب الأمريكي (الكندي)'),
(608, 'American Literature (United States)', 'الأدب الأمريكي (الولايات المتحدة الأمريكية)'),
(609, 'Children''s and Adolescent Literature', 'أطفال والمراهقين الأدب'),
(610, 'English Literature (British and Commonwealth)', 'الأدب الإنجليزي (بريطانيا و رابطة الشعوب البريطانية)'),
(611, 'General Literature', 'الأدب العام'),
(612, 'Rhetoric and Composition/Writing Studies', 'دراسات الكتابة البلاغية والتأليفية '),
(613, 'Creative Writing', 'الكتابة الإبداعية'),
(614, 'Professional, Technical, Business, and Scientific Writing', 'الكتابة الاحترافية ، التقنية ، التجارية والعلمية'),
(615, 'Rhetoric and Composition', 'البلاغة والتأليف'),
(616, 'Writing', 'كتابة'),
(617, 'Family and Consumer Sciences/human Sciences', 'علوم الأسرة والمستهلك / علوم الإنسان'),
(618, 'Apparel and Textiles', 'ملابس والمنسوجات'),
(619, 'Apparel and Textile Manufacture', 'الملابس والنسيج صناعة'),
(620, 'Apparel and Textile Marketing Management', 'إدارة الملابس والنسيج التسويق'),
(621, 'Fashion and Fabric Consultant', 'الأزياء والنسيج استشاري'),
(622, 'Textile Science', 'العلوم النسيج'),
(623, 'Family and Consumer Economics and Related Studies', 'دراسات الأسرية والاقتصاد المستهلك وذات علاقة'),
(624, 'Consumer Economics', 'الاقتصاد المستهلك'),
(625, 'Consumer Services and Advocacy', 'الخدمات الاستهلاكية والدعوة'),
(626, 'Family Resource Management Studies', 'دراسات إدارة الموارد الأسرية'),
(627, 'Family and Consumer Sciences/Human Sciences Business Services', 'علوم الأسرة والمستهلك / العلوم الإنسانية خدمات رجال'),
(628, 'Business Family and Consumer Sciences/Human Sciences', 'الشركات العائلية وعلوم المستهلك / العلوم الإنسانية'),
(629, 'Consumer Merchandising/Retailing Management', 'تجارة المستهلك / إدارة البيع بالتجزئة'),
(630, 'Family and Consumer Sciences/Human Sciences Communication', 'علوم الأسرة والمستهلك / العلوم الإنسانية الاتصالات'),
(631, 'Foods, Nutrition, and Related Services', 'الأطعمة والتغذية وخدمات مرتبطة بها'),
(632, 'Foods, Nutrition, and Wellness Studies', 'أطعمة، دراسات التغذية والعافية'),
(633, 'Foodservice Systems Administration/Management', 'خدمات الطعام ادارة نظم المعلومات / إدارة'),
(634, 'Human Nutrition', 'التغذية البشرية'),
(635, 'Housing and Human Environments', 'الإسكان والبيئات الإنسان'),
(636, 'Facilities Planning and Management', 'مرافق التخطيط والإدارة'),
(637, 'Home Furnishings and Equipment Installers', 'المفروشات المنزلية ومعدات التركيب'),
(638, 'Human Development, Family Studies, and Related Services', 'التنمية البشرية، دراسات الأسرية وخدمات مرتبطة بها'),
(639, 'Adult Development and Aging', 'التنمية الكبار والشيخوخة'),
(640, 'Child Care and Support Services Management', 'رعاية الطفل وإدارة خدمات الدعم'),
(641, 'Child Care Provider/Assistant', 'مزود رعاية الطفل / مساعد'),
(642, 'Child Development', 'تنمية الطفل'),
(643, 'Developmental Services Worker', 'الخدمات التنموية العمال'),
(644, 'Family and Community Services', 'خدمة المجتمع والأسرة'),
(645, 'Family Systems', 'نظم الأسرة'),
(646, 'Human Development and Family Studies', 'التنمية البشرية ودراسات الأسرة'),
(647, 'Foreign Languages, Literatures, and Linguistics', 'اللغات الأجنبية، الآداب، وعلم اللغة'),
(648, 'African Languages, Literatures, and Linguistics', 'اللغات الإفريقية، الآداب، وعلم اللغة'),
(649, 'American Indian/Native American Languages, Literatures, and Linguistics', 'الأمريكية الهندية / الأميركيين الأصليين اللغات والآداب، وعلم اللغة'),
(650, 'American Sign Language', 'لغة الإشارة الأمريكية'),
(651, 'American Sign Language (ASL)', 'لغة الإشارة الأمريكية (ASL)'),
(652, 'Sign Language Interpretation and Translation', 'توقيع تفسير اللغة والترجمة'),
(653, 'Celtic Languages, Literatures, and Linguistics', 'سلتيك اللغات، والآداب، وعلم اللغة'),
(654, 'Classics and Classical Languages, Literatures, and Linguistics', 'الكلاسيكية واللغات الكلاسيكية، الآداب، وعلم اللغة'),
(655, 'Ancient/Classical Greek Language and Literature', 'القديمة / الكلاسيكية اللغة اليونانية وآدابها'),
(656, 'Latin Language and Literature', 'اللغة اللاتينية والأدب'),
(657, 'East Asian Languages, Literatures, and Linguistics', 'شرق آسيا اللغات والآداب، وعلم اللغة'),
(658, 'Chinese Language and Literature', 'اللغة الصينية وآدابها'),
(659, 'Japanese Language and Literature', 'اللغة اليابانية والأدب'),
(660, 'Korean Language and Literature', 'اللغة الكورية والأدب'),
(661, 'Tibetan Language and Literature', 'اللغة التبتية والأدب'),
(662, 'Germanic Languages, Literatures, and Linguistics', 'الجرمانية اللغات، والآداب، وعلم اللغة'),
(663, 'Danish Language and Literature', 'اللغة الدنماركية والأدب'),
(664, 'Dutch/Flemish Language and Literature', 'الهولندية اللغة الفلمنكية / والأدب'),
(665, 'German Language and Literature', 'اللغة الألمانية وآدابها'),
(666, 'Norwegian Language and Literature', 'اللغة النرويجية والأدب'),
(667, 'Scandinavian Languages, Literatures, and Linguistics', 'الاسكندنافية اللغات، والآداب، وعلم اللغة'),
(668, 'Swedish Language and Literature', 'اللغة السويدية والأدب'),
(669, 'Iranian/Persian Languages, Literatures, and Linguistics', 'الإيرانية / الفارسي اللغات والآداب، وعلم اللغة'),
(670, 'Iranian Languages, Literatures, and Linguistics', 'اللغات الإيرانية، الآداب، وعلم اللغة'),
(671, 'Linguistic, Comparative, and Related Language Studies and Services', 'دراسات اللغة اللغوية، المقارن، وما يتصل والخدمات'),
(672, 'Applied Linguistics', 'اللغويات التطبيقية'),
(673, 'Comparative Literature', 'الأدب المقارن'),
(674, 'Foreign Languages and Literatures', 'اللغات والآداب الأجنبية'),
(675, 'Language Interpretation and Translation', 'تفسير وترجمة اللغة'),
(676, 'Linguistics', 'علم اللغة'),
(677, 'Middle/Near Eastern and Semitic Languages, Literatures, and Linguistics', 'اللغات السامية، والآداب، وعلوم اللغات الشرقية / الشرقية القريبة'),
(678, 'Ancient Near Eastern and Biblical Languages, Literatures, and Linguistics', 'لغات و آداب و علوم اللغات الشرقية القريبة القديمة'),
(679, 'Arabic Language and Literature', 'اللغة العربية وآدابها');
INSERT INTO `major` (`major_id`, `major_name_en`, `major_name_ar`) VALUES
(680, 'Hebrew Language and Literature', 'اللغة العبرية وآدابها'),
(681, 'Modern Greek Language and Literature', 'اللغة اليونانية الحديثة وآدابها'),
(682, 'Romance Languages, Literatures, and Linguistics', 'اللغات و الآداب الرومانسية'),
(683, 'Catalan Language and Literature', 'اللغة التشيكية و آدابها'),
(684, 'French Language and Literature', 'اللغة الفرنسية وآدابها'),
(685, 'Hispanic and Latin American Languages, Literatures, and Linguistics', 'اللغات اللاتينية و أسبانية الأصل و آدابها'),
(686, 'Italian Language and Literature', 'اللغة الإيطالية و آدابها'),
(687, 'Portuguese Language and Literature', 'اللغة البرتغالية و آدابها'),
(688, 'Romanian Language and Literature', 'اللغة الرومانية وآدابها'),
(689, 'Spanish Language and Literature', 'اللغة الأسبانية وآدابها'),
(690, 'Slavic Languages, Literatures, and Linguistics', 'اللغات السلافية و آدابها و علومها'),
(691, 'Albanian Language and Literature', 'اللغة الألبانية و آدابها'),
(692, 'Baltic Languages, Literatures, and Linguistics', 'لغات البلطيق و آدابها و علومها '),
(693, 'Bosnian, Serbian, and Croatian Languages and Literatures', 'اللغات البوسنية والصربية والكرواتية و آدابها'),
(694, 'Bulgarian Language and Literature', 'اللغة البلغارية و آدابها'),
(695, 'Czech Language and Literature', 'اللغة  التشيكية و آدابها'),
(696, 'Polish Language and Literature', 'اللغة البولندية وآدابها'),
(697, 'Russian Language and Literature', 'اللغة الروسية و آدابها'),
(698, 'Slovak Language and Literature', 'اللغة السلوفاكية و آدابها'),
(699, 'Ukrainian Language and Literature', 'اللغة الأوكرانية و آدابها'),
(700, 'South Asian Languages, Literatures, and Linguistics', 'لغات جنوب آسيا و آدابها و علومها'),
(701, 'Bengali Language and Literature', 'البنغالية اللغة والأدب'),
(702, 'Hindi Language and Literature', 'الهندية اللغة والأدب'),
(703, 'Punjabi Language and Literature', 'البنجابية اللغة والأدب'),
(704, 'Sanskrit and Classical Indian Languages, Literatures, and Linguistics', 'السنسكريتية واللغات الهندية الكلاسيكية، الآداب، وعلم اللغة'),
(705, 'Tamil Language and Literature', 'اللغة التاميلية و آدابها'),
(706, 'Urdu Language and Literature', 'اللغة الأردية و آدابها'),
(707, 'Southeast Asian and Australasian/Pacific Languages, Literatures, and Linguistics', 'جنوب شرق آسيا والأسترالية / المحيط الهادئ اللغات، والآداب، وعلم اللغة'),
(708, 'Australian/Oceanic/Pacific Languages, Literatures, and Linguistics', 'الاسترالية / محيطات / المحيط الهادئ اللغات والآداب، وعلم اللغة'),
(709, 'Burmese Language and Literature', 'اللغة البورمية والأدب'),
(710, 'Filipino/Tagalog Language and Literature', 'الفلبينية / التغالوغ اللغة والأدب'),
(711, 'Indonesian/Malay Languages and Literatures', 'الاندونيسية / الماليزية اللغات والآداب'),
(712, 'Khmer/Cambodian Language and Literature', 'الخمير / الكمبودي اللغة والأدب'),
(713, 'Lao Language and Literature', 'لاو والأدب'),
(714, 'Thai Language and Literature', 'اللغة التايلاندية والأدب'),
(715, 'Vietnamese Language and Literature', 'اللغة الفيتنامية والأدب'),
(716, 'Turkic, Uralic-Altaic, Caucasian, and Central Asian Languages, Literatures, and Linguistics', 'بالتركية، الأورالية-التاى، القوقاز، وآسيا الوسطى اللغات، والآداب، وعلم اللغة'),
(717, 'Hungarian/Magyar Language and Literature', 'الهنغارية / المجرية اللغة والأدب'),
(718, 'Mongolian Language and Literature', 'اللغة المنغولية والأدب'),
(719, 'Turkish Language and Literature', 'اللغة التركية وآدابها'),
(720, 'Uralic Languages, Literatures, and Linguistics', 'الأورالية اللغات، والآداب، وعلم اللغة'),
(721, 'Health Professions and Related Programs', 'المهن الصحية والبرامج ذات الصلة'),
(722, 'Health and Wellness', 'بصحة والعافية'),
(723, 'Advanced/Graduate Dentistry and Oral Sciences', 'المتقدم / دراسات عليا طب الأسنان وعلوم الفم'),
(724, 'Advanced General Dentistry', 'طب الأسنان العام المتقدم'),
(725, 'Dental Clinical Sciences', 'العلوم السريرية طب الأسنان'),
(726, 'Dental Materials', 'مواد طب الأسنان'),
(727, 'Dental Public Health and Education', 'طب الأسنان الصحة العامة والتعليم'),
(728, 'Endodontics/Endodontology', 'حشو الأسنان / طب لب الأسنان'),
(729, 'Oral Biology and Oral and Maxillofacial Pathology', 'علم الأحياء عن طريق الفم وأمراض الفم والوجه والفكين'),
(730, 'Oral/Maxillofacial Surgery', 'عن طريق الفم / جراحة الوجه والفكين'),
(731, 'Orthodontics/Orthodontology', 'تقويم الأسنان / طب تقويم الأسنان'),
(732, 'Pediatric Dentistry/Pedodontics', 'طب أسنان الأطفال / أسنان الأطفال'),
(733, 'Periodontics/Periodontology', 'اللثة / اللثة'),
(734, 'Prosthodontics/Prosthodontology', 'التركيبات / Prosthodontology'),
(735, 'Allied Health and Medical Assisting Services', 'الخدمات المساعدة الطبية المساعدة والطبية'),
(736, 'Anesthesiologist Assistant', 'مساعد طبيب التخدير'),
(737, 'Chiropractic Assistant/Technician', 'مساعد بتقويم العمود الفقري / فني'),
(738, 'Clinical/Medical Laboratory Assistant', 'السريرية / مساعد المختبرات الطبية'),
(739, 'Emergency Care Attendant (EMT Ambulance)', 'العناية الطارئة المصاحبة (EMT الإسعاف)'),
(740, 'Lactation Consultant', 'الرضاعة استشاري'),
(741, 'Medical/Clinical Assistant', 'طب / مساعد السريرية'),
(742, 'Occupational Therapist Assistant', 'مساعد العلاج الطبيعي المهني'),
(743, 'Pathology/Pathologist Assistant', 'علم الأمراض / مساعد علم الأمراض'),
(744, 'Pharmacy Technician/Assistant', 'فني الصيدلة / مساعد'),
(745, 'Physical Therapy Technician/Assistant', 'العلاج الفيزيائي فني / مساعد'),
(746, 'Radiologist Assistant', 'مساعد طبيب الأشعة'),
(747, 'Respiratory Therapy Technician/Assistant', 'الجهاز التنفسي العلاج فني / مساعد'),
(748, 'Speech-Language Pathology Assistant', 'النطق واللغة مساعد علم الأمراض'),
(749, 'Veterinary/Animal Health Technology/Technician and Veterinary Assistant', 'البيطرية / الحيوانية التكنولوجيا الصحية / فني ومساعد والبيطرية'),
(750, 'Allied Health Diagnostic, Intervention, and Treatment Professions', 'الحلفاء الصحة التشخيص والتدخل والعلاج والمهن'),
(751, 'Athletic Training/Trainer', 'التدريب الرياضي / المدرب'),
(752, 'Cardiopulmonary Technology/Technologist', 'القلبي تكنولوجيا / تقني'),
(753, 'Cardiovascular Technology/Technologist', 'تقنية القلب والأوعية الدموية / تقني'),
(754, 'Diagnostic Medical Sonography/Sonographer and Ultrasound Technician', 'التشخيص الطبي بالموجات فوق الصوتية / مخطط الصدى والموجات فوق الصوتية فني'),
(755, 'Electrocardiograph Technology/Technician', 'تخطيط القلب تقنية / فني'),
(756, 'Electroneurodiagnostic/Electroencephalographic Technology/Technologist', 'التشخيص العصبي الكهربي / الكهربي تكنولوجيا / تقني'),
(757, 'Emergency Medical Technology/Technician (EMT Paramedic)', 'الطوارئ الطبية / فني (EMT الإسعاف)'),
(758, 'Gene/Genetic Therapy', 'جين / العلاج الجيني'),
(759, 'Hearing Instrument Specialist', 'اخصائي آلات السمع'),
(760, 'Magnetic Resonance Imaging (MRI) Technology/Technician', 'التصوير بالرنين المغناطيسي (MRI) تقنية / فني'),
(761, 'Mammography Technician/Technology', 'التصوير الشعاعي للثدي فني / تكنولوجيا'),
(762, 'Medical Radiologic Technology/Science - Radiation Therapist', 'الطبية إشعاعي تكنولوجيا / علوم - الإشعاع المعالج'),
(763, 'Nuclear Medical Technology/Technologist', 'النووية التكنولوجيا الطبية / تقني'),
(764, 'Perfusion Technology/Perfusionist', 'نضح تكنولوجيا / اختصاصي الإرواء'),
(765, 'Physician Assistant', 'مساعد طبيب'),
(766, 'Polysomnography', 'دراسة النوم'),
(767, 'Radiation Protection/Health Physics Technician', 'الحماية من الإشعاع / صحة الفيزياء فني'),
(768, 'Radiologic Technology/Science - Radiographer', 'إشعاعي تكنولوجيا / علوم - فني الأشعة'),
(769, 'Respiratory Care Therapy/Therapist', 'الجهاز التنفسي العناية العلاج / المعالج'),
(770, 'Surgical Technology/Technologist', 'تقنية جراحية / تقني'),
(771, 'Alternative and Complementary Medical Support Services', 'خدمات الدعم الطبي البديلة والتكميلية'),
(772, 'Direct Entry Midwifery', 'المباشرة القبالة الدخول'),
(773, 'Alternative and Complementary Medicine and Medical Systems', 'الطب و طب أنظمة بديلة ومكملة'),
(774, 'Acupuncture and Oriental Medicine', 'الوخز بالإبر والطب الشرقية'),
(775, 'Ayurvedic Medicine/Ayurveda', 'الايورفيدا الطب / الأيورفيدا'),
(776, 'Holistic Health', 'كلية الصحة'),
(777, 'Homeopathic Medicine/Homeopathy', 'الطب المثلية / المثلية'),
(778, 'Naturopathic Medicine/Naturopathy', 'ناتوروباتشيك الطب / العلاج الطبيعي'),
(779, 'Traditional Chinese Medicine and Chinese Herbology', 'الطب الصيني التقليدي وعلم الأعشاب الصينية'),
(780, 'Bioethics/Medical Ethics', 'أخلاقيات علم الأحياء / آداب مهنة الطب'),
(781, 'Chiropractic', 'العلاج بتقويم العمود الفقري'),
(782, 'Clinical/Medical Laboratory Science/Research and Allied Professions', 'السريرية / علوم المختبرات الطبية / البحوث والمهن'),
(783, 'Blood Bank Technology Specialist', 'الدم أخصائي تكنولوجيا البنك'),
(784, 'Clinical Laboratory Science/Medical Technology/Technologist', 'علوم المختبرات السريرية / التكنولوجيا الطبية / تقني'),
(785, 'Clinical/Medical Laboratory Technician', 'السريرية / فني مختبر طبي'),
(786, 'Cytogenetics/Genetics/Clinical Genetics Technology/Technologist', 'علم الوراثة الخلوية / علم الوراثة / علم الوراثة السريرية تكنولوجيا / تقني'),
(787, 'Cytotechnology/Cytotechnologist', 'تكنولوجيا خلوية / تقني السيتولوجيا'),
(788, 'Hematology Technology/Technician', 'تقنية أمراض الدم / فني'),
(789, 'Histologic Technician', 'نسيجية فني'),
(790, 'Histologic Technology/Histotechnologist', 'نسيجية تكنولوجيا / Histotechnologist'),
(791, 'Ophthalmic Laboratory Technology/Technician', 'العيون تقنية المختبرات / فني'),
(792, 'Phlebotomy Technician/Phlebotomist', 'الفصد فني / فصاد'),
(793, 'Renal/Dialysis Technologist/Technician', 'كلوي / غسيل الكلى تقني / فني'),
(794, 'Sterile Processing Technology/Technician', 'عقيمة تكنولوجيا معالجة / فني'),
(795, 'Communication Disorders Sciences and Services', 'اضطرابات التواصل العلوم والخدمات'),
(796, 'Audiology/Audiologist', 'السمع / اختصاصي السمع'),
(797, 'Audiology/Audiologist and Speech-Language Pathology/Pathologist', 'السمع / اختصاصي السمع والنطق واللغة علم الأمراض / علم الأمراض'),
(798, 'Communication Sciences and Disorders', 'علوم الاتصال واضطرابات'),
(799, 'Speech-Language Pathology/Pathologist', 'النطق واللغة علم الأمراض / علم الأمراض'),
(800, 'Dental Support Services and Allied Professions', 'خدمات الدعم الأسنان والمهن'),
(801, 'Dental Assisting/Assistant', 'الأسنان مساعدة / مساعد'),
(802, 'Dental Hygiene/Hygienist', 'صحة الأسنان / المساعد الصحي'),
(803, 'Dental Laboratory Technology/Technician', 'الأسنان تقنية المختبرات / فني'),
(804, 'Dentistry', 'طب الاسنان'),
(805, 'Dietetics and Clinical Nutrition Services', 'علم التغذية والخدمات تغذية السريرية'),
(806, 'Clinical Nutrition/Nutritionist', 'التغذية السريرية / التغذية'),
(807, 'Dietetic Technician', 'فني الحمية'),
(808, 'Dietetics/Dietitian', 'علم التغذية / اختصاصي تغذية'),
(809, 'Dietitian Assistant', 'مساعد اختصاصي تغذية'),
(810, 'Energy and Biologically Based Therapies', 'الطاقة وبيولوجيا وبناء العلاجات'),
(811, 'Aromatherapy', 'الروائح'),
(812, 'Herbalism/Herbalist', 'أعشاب طبية / بالأعشاب'),
(813, 'Polarity Therapy', 'العلاج قطبية'),
(814, 'Reiki', 'الريكي'),
(815, 'Health Aides/Attendants/Orderlies', 'مساعدون الصحية / الحضور / الممرضون'),
(816, 'Health Aide', 'معاون الصحة'),
(817, 'Home Health Aide/Home Attendant', 'الصحية المنزلية مساعد / المصاحبة الرئيسية'),
(818, 'Medication Aide', 'دواء مساعد'),
(819, 'Rehabilitation Aide', 'معاون إعادة التأهيل'),
(820, 'Health and Medical Administrative Services', 'الصحة والخدمات الإدارية الطبية'),
(821, 'Clinical Research Coordinator', 'منسق البحوث السريرية'),
(822, 'Health Information/Medical Records Administration/Administrator', 'معلومات صحية / إدارة السجلات الطبية / مدير'),
(823, 'Health Information/Medical Records Technology/Technician', 'معلومات الصحية / الطبية السجلات تكنولوجيا / فني'),
(824, 'Health Unit Coordinator/Ward Clerk', 'منسق وحدة الصحة / وارد كاتب'),
(825, 'Health Unit Manager/Ward Supervisor', 'مدير وحدة الصحة / وارد المشرف'),
(826, 'Health/Health Care Administration/Management', 'الصحة / إدارة الرعاية الصحية / إدارة'),
(827, 'Health/Medical Claims Examiner', 'الصحة / الطبية المطالبات ممتحن'),
(828, 'Hospital and Health Care Facilities Administration/Management', 'المستشفيات وإدارة الرعاية الصحية / مرافق للإدارة'),
(829, 'Long Term Care Administration/Management', 'إدارة الرعاية طويلة الأمد / إدارة'),
(830, 'Medical Administrative/Executive Assistant and Medical Secretary', 'الإدارية الطبية / المساعد التنفيذي والأمين الطبية'),
(831, 'Medical Insurance Coding Specialist/Coder', 'التأمين الطبي التخصصي الترميز / المبرمج'),
(832, 'Medical Insurance Specialist/Medical Biller', 'أخصائي التأمين الطبي / الفواتير الطبية'),
(833, 'Medical Office Assistant/Specialist', 'مساعد Office الطبية / التخصصي'),
(834, 'Medical Office Computer Specialist/Assistant', 'أخصائي مكتب الطبية الحاسوب / مساعد'),
(835, 'Medical Office Management/Administration', 'إدارة المكاتب الطبية / إدارة'),
(836, 'Medical Reception/Receptionist', 'الاستقبال الطبي / موظف استقبال'),
(837, 'Medical Staff Services Technology/Technician', 'موظفي خدمات التكنولوجيا الطبية / فني'),
(838, 'Medical Transcription/Transcriptionist', 'النسخ الطبي / ناسخة'),
(839, 'Medical/Health Management and Clinical Assistant/Specialist', 'طب / إدارة الصحة ومساعد السريرية / التخصصي'),
(840, 'Health/Medical Preparatory Programs', 'الصحة / البرامج التحضيرية الطبية'),
(841, 'Pre-Chiropractic Studies', 'دراسات ما قبل العلاج بتقويم العمود الفقري'),
(842, 'Pre-Dentistry Studies', 'ما قبل طب الأسنان الدراسات'),
(843, 'Pre-Medicine/Pre-Medical Studies', 'ما قبل الطب / الدراسات ما قبل الطبية'),
(844, 'Pre-Nursing Studies', 'دراسات ما قبل التمريض'),
(845, 'Pre-Occupational Therapy Studies', 'ما قبل المهني الدراسات العلاج'),
(846, 'Pre-Optometry Studies', 'قبل البصريات الدراسات'),
(847, 'Pre-Pharmacy Studies', 'ما قبل الصيدلة الدراسات'),
(848, 'Pre-Physical Therapy Studies', 'الدراسات قبل العلاج الطبيعي'),
(849, 'Pre-Veterinary Studies', 'دراسات ما قبل الطب البيطري'),
(850, 'Medical Clinical Sciences/Graduate Medical Studies', 'العلوم السريرية الطبية / الدراسات الطبية العليا'),
(851, 'Medical Scientist', 'عالم الطبية'),
(852, 'Medical Illustration and Informatics', 'توضيحات الطبية والمعلوماتية'),
(853, 'Medical Illustration/Medical Illustrator', 'توضيحات الطبي / المصور الطبية'),
(854, 'Medical Informatics', 'المعلوماتية الطبية'),
(855, 'Medicine', 'علم الطب'),
(856, 'Mental and Social Health Services and Allied Professions', 'العقلية والاجتماعية الخدمات الصحية والمهن'),
(857, 'Clinical Pastoral Counseling/Patient Counseling', 'الإرشاد الرعوية السريرية / الإرشاد المرضى'),
(858, 'Clinical/Medical Social Work', 'السريرية / الطبية العمل الاجتماعي'),
(859, 'Community Health Services/Liaison/Counseling', 'خدمات صحة المجتمع / الاتصال / الإرشاد'),
(860, 'Genetic Counseling/Counselor', 'الاستشارة الوراثية / المستشار'),
(861, 'Marriage and Family Therapy/Counseling', 'الزواج والعلاج الأسري / الإرشاد'),
(862, 'Mental Health Counseling/Counselor', 'الصحة النفسية الإرشاد / المستشار'),
(863, 'Psychiatric/Mental Health Services Technician', 'الطب النفسي / الصحة النفسية خدمات فني'),
(864, 'Substance Abuse/Addiction Counseling', 'إساءة استعمال المواد المخدرة / الإدمان الإرشاد'),
(865, 'Movement and Mind-Body Therapies and Education', 'الحركة والعقل والجسم العلاج والتعليم'),
(866, 'Movement Therapy and Movement Education', 'حركة العلاج وحركة التعليم'),
(867, 'Yoga Teacher Training/Yoga Therapy', 'اليوغا تدريب المعلمين / العلاج اليوغا'),
(868, 'Ophthalmic and Optometric Support Services and Allied Professions', 'خدمات الدعم العيون ومتعلق بإخصائي النظارات والمهن'),
(869, 'Ophthalmic Technician/Technologist', 'فني طب العيون / تقني'),
(870, 'Opticianry/Ophthalmic Dispensing Optician', 'البصريات / العيون التركيب النظاراتي'),
(871, 'Optometric Technician/Assistant', 'فني متعلق بإخصائي النظارات / مساعد'),
(872, 'Orthoptics/Orthoptist', 'تقويم البصر / مقوم البصر'),
(873, 'Optometry', 'قياس مدى البصر'),
(874, 'Osteopathic Medicine/Osteopathy', 'الطب التقويمي / تجبير العظام'),
(875, 'Pharmacy, Pharmaceutical Sciences, and Administration', 'الصيدلة، العلوم الصيدلية، والإدارة'),
(876, 'Clinical and Industrial Drug Development', 'السريرية وتطوير العقاقير الصناعية'),
(877, 'Clinical, Hospital, and Managed Care Pharmacy', 'السريرية، الصيدلة العناية مستشفى، وإدارتها'),
(878, 'Industrial and Physical Pharmacy and Cosmetic Sciences', 'الصيدلة الصناعية والعلوم الفيزيائية ومستحضرات التجميل'),
(879, 'Medicinal and Pharmaceutical Chemistry', 'الطبية والكيمياء الصيدلية'),
(880, 'Natural Products Chemistry and Pharmacognosy', 'المنتجات الطبيعية الكيمياء والعقاقير'),
(881, 'Pharmaceutical Marketing and Management', 'تسويق الأدوية وإدارة'),
(882, 'Pharmaceutical Sciences', 'العلوم الصيدلانية'),
(883, 'Pharmaceutics and Drug Design', 'المستحضرات الصيدلانية والعقاقير تصميم'),
(884, 'Pharmacoeconomics/Pharmaceutical Economics', 'اقتصاديات الدواء / اقتصاد الدوائية'),
(885, 'Pharmacy', 'صيدلية'),
(886, 'Pharmacy Administration and Pharmacy Policy and Regulatory Affairs', 'إدارة الصيدلة وسياسة الصيدلة والشؤون التنظيمية'),
(887, 'Podiatric Medicine/Podiatry', 'الطب العناية بالقدم / طب الأقدام'),
(888, 'Practical Nursing, Vocational Nursing and Nursing Assistants', 'التمريض العملي، التمريض المهني والتمريض مساعدين'),
(889, 'Licensed Practical/Vocational Nurse Training', 'مرخص العملي / التدريب المهني ممرضة'),
(890, 'Nursing Assistant/Aide and Patient Care Assistant/Aide', 'مساعد التمريض / معاون ورعاية المرضى مساعد / مساعد'),
(891, 'Public Health', 'الصحة العامة'),
(892, 'Behavioral Aspects of Health', 'الجوانب السلوكية للصحة'),
(893, 'Community Health and Preventive Medicine', 'صحة المجتمع والطب الوقائي'),
(894, 'Environmental Health', 'الصحة البيئية'),
(895, 'Health Services Administration', 'إدارة الخدمات الصحية'),
(896, 'Health/Medical Physics', 'الصحة / الفيزياء الطبية'),
(897, 'International Public Health/International Health', 'الدولية الصحة العامة / الصحة الدولية'),
(898, 'Maternal and Child Health', 'صحة الأم والطفل'),
(899, 'Occupational Health and Industrial Hygiene', 'الصحة المهنية والنظافة الصناعية'),
(900, 'Public Health Education and Promotion', 'تعليم الصحة العمومية وتعزيز'),
(901, 'Registered Nursing, Nursing Administration, Nursing Research and Clinical Nursing', 'التمريض المسجلة، إدارة التمريض، بحوث التمريض والتمريض السريري'),
(902, 'Adult Health Nurse/Nursing', 'ممرضة الصحة الكبار / التمريض'),
(903, 'Clinical Nurse Leader', 'السريرية زعيم ممرضة'),
(904, 'Clinical Nurse Specialist', 'أخصائي ممرضة سريرية'),
(905, 'Critical Care Nursing', 'الناقد تمريض العناية'),
(906, 'Emergency Room/Trauma Nursing', 'غرفة الطوارئ / الصدمة التمريض'),
(907, 'Family Practice Nurse/Nursing', 'الممارسة ممرضة الأسرة / التمريض'),
(908, 'Geriatric Nurse/Nursing', 'ممرضة الشيخوخة / التمريض'),
(909, 'Maternal/Child Health and Neonatal Nurse/Nursing', 'الأم / صحة الطفل وحديثي الولادة ممرضة / التمريض'),
(910, 'Nurse Anesthetist', 'ممرضة التخدير'),
(911, 'Nurse Midwife/Nursing Midwifery', 'ممرضة قابلة / التمريض القبالة'),
(912, 'Nursing Administration', 'إدارة التمريض'),
(913, 'Nursing Education', 'تعليم التمريض'),
(914, 'Nursing Practice', 'ممارسة التمريض'),
(915, 'Nursing Science', 'علوم التمريض'),
(916, 'Occupational and Environmental Health Nursing', 'التمريض المهنية والصحة البيئية'),
(917, 'Palliative Care Nursing', 'العناية التلطيفية التمريض'),
(918, 'Pediatric Nurse/Nursing', 'ممرضة الأطفال / التمريض'),
(919, 'Perioperative/Operating Room and Surgical Nurse/Nursing', 'العمليات الجراحية / غرفة عمليات وجراحة ممرضة / التمريض'),
(920, 'Psychiatric/Mental Health Nurse/Nursing', 'الطب النفسي / ممرضة الصحة العقلية / التمريض'),
(921, 'Public Health/Community Nurse/Nursing', 'الصحة العامة / المجتمعي ممرضة / التمريض'),
(922, 'Registered Nursing/Registered Nurse', 'التمريض مسجل / ممرضة مسجلة'),
(923, 'Women''s Health Nurse/Nursing', 'المرأة ممرضة الصحة / التمريض'),
(924, 'Rehabilitation and Therapeutic Professions', 'إعادة التأهيل والعلاجية المهن'),
(925, 'Animal-Assisted Therapy', 'العلاج بمساعدة الحيوانات'),
(926, 'Art Therapy/Therapist', 'فن العلاج / المعالج'),
(927, 'Assistive/Augmentative Technology and Rehabilitation Engineering', 'المساعدة / المعززة الهندسة والتكنولوجيا التأهيل'),
(928, 'Dance Therapy/Therapist', 'الرقص العلاج / المعالج'),
(929, 'Music Therapy/Therapist', 'العلاج بالموسيقى / المعالج'),
(930, 'Occupational Therapy/Therapist', 'العلاج الوظيفي / المعالج'),
(931, 'Orthotist/Prosthetist', 'أخصائي الأطراف الصناعية / تعويضات'),
(932, 'Physical Therapy/Therapist', 'العلاج الفيزيائي / المعالج'),
(933, 'Rehabilitation Science', 'علوم إعادة التأهيل'),
(934, 'Therapeutic Recreation/Recreational Therapy', 'منتزهات العلاجية / العلاج الترفيهية'),
(935, 'Vocational Rehabilitation Counseling/Counselor', 'التأهيل المهني الإرشاد / المستشار'),
(936, 'Somatic Bodywork and Related Therapeutic Services', 'جسدية هيكل السيارة وخدمات مرتبطة بها العلاجية'),
(937, 'Asian Bodywork Therapy', 'العلاج هيكل السيارة آسيا'),
(938, 'Massage Therapy/Therapeutic Massage', 'العلاج بالتدليك / تدليك العلاجي'),
(939, 'Somatic Bodywork', 'جسدية هيكل السيارة'),
(940, 'Veterinary Biomedical and Clinical Sciences', 'الطبية الحيوية والطب البيطري والعلوم السريرية'),
(941, 'Comparative and Laboratory Animal Medicine', 'المقارن والطب المخبري الحيوانية'),
(942, 'Large Animal/Food Animal and Equine Surgery and Medicine', 'كبير الحيوان / الأغذية الحيوانية وجراحة فرسي والطب'),
(943, 'Small/Companion Animal Surgery and Medicine', '/ رفيق جراحة الحيوانات الصغيرة والطب'),
(944, 'Veterinary Anatomy', 'التشريح البيطري'),
(945, 'Veterinary Infectious Diseases', 'الأمراض المعدية البيطرية'),
(946, 'Veterinary Microbiology and Immunobiology', 'علم الأحياء الدقيقة والطب البيطري وعلم المناعة'),
(947, 'Veterinary Pathology and Pathobiology', 'علم الأمراض والطب البيطري والبيولوجيا المرضية'),
(948, 'Veterinary Physiology', 'علم وظائف الأعضاء البيطرية'),
(949, 'Veterinary Preventive Medicine, Epidemiology, and Public Health', 'الطب البيطري الوقائي، علم الأوبئة، والصحة العامة'),
(950, 'Veterinary Sciences/Veterinary Clinical Sciences', 'العلوم البيطرية / العلوم السريرية البيطرية'),
(951, 'Veterinary Toxicology and Pharmacology', 'علم السموم والطب البيطري والصيدلة'),
(952, 'Veterinary Medicine', 'الطب البيطري'),
(953, 'History', 'تاريخ'),
(954, 'American History (United States)', 'تاريخ الولايات المتحدة الأمريكية (الولايات المتحدة)'),
(955, 'Asian History', 'التاريخ الآسيوي'),
(956, 'Canadian History', 'التاريخ الكندي'),
(957, 'European History', 'التاريخ الأوروبي'),
(958, 'History and Philosophy of Science and Technology', 'تاريخ وفلسفة العلوم والتكنولوجيا'),
(959, 'Military History', 'التاريخ العسكري'),
(960, 'Public/Applied History', 'الجمهور / التاريخ التطبيقية'),
(961, 'Homeland Security, Law Enforcement, Firefighting', 'الأمن الداخلي، تنفيذ القوانين، مكافحة الحرائق'),
(962, 'Criminal Justice and Corrections', 'العدالة الجنائية وتصحيحات'),
(963, 'Corrections', 'تصحيحات'),
(964, 'Corrections Administration', 'إدارة التصحيحات'),
(965, 'Criminal Justice/Law Enforcement Administration', 'إقامة العدل / إنفاذ القانون الجنائي'),
(966, 'Criminal Justice/Police Science', 'العدالة الجنائية / علوم الشرطة'),
(967, 'Criminal Justice/Safety Studies', 'العدالة الجنائية / دراسات السلامة'),
(968, 'Criminalistics and Criminal Science', 'الإجرام والعلوم الجنائية'),
(969, 'Critical Incident Response/Special Police Operations', '/ عمليات الشرطة الخاصة الاستجابة للحوادث حرجة'),
(970, 'Cultural/Archaelogical Resources Protection', 'الثقافية / الآثري حماية الموارد'),
(971, 'Cyber/Computer Forensics and Counterterrorism', 'سايبر / الحاسب الآلي الطب الشرعي ومكافحة الإرهاب'),
(972, 'Financial Forensics and Fraud Investigation', 'الطب الشرعي المالية والاحتيال التحقيق'),
(973, 'Forensic Science and Technology', 'العلوم والتكنولوجيا في الطب الشرعي'),
(974, 'Juvenile Corrections', 'تصحيحات الأحداث'),
(975, 'Law Enforcement Intelligence Analysis', 'تحليل الاستخبارات المكلفين بإنفاذ القانون'),
(976, 'Law Enforcement Investigation and Interviewing', 'التحقيق المكلفين بإنفاذ القانون وإجراء المقابلات'),
(977, 'Law Enforcement Record-Keeping and Evidence Management', 'إنفاذ القانون حفظ السجلات وإدارة الأدلة'),
(978, 'Maritime Law Enforcement', 'إنفاذ القانون البحري'),
(979, 'Protective Services Operations', 'عمليات خدمات حماية'),
(980, 'Securities Services Administration/Management', 'إدارة خدمات الأوراق المالية / إدارة'),
(981, 'Security and Loss Prevention Services', 'خدمات الوقاية الأمن وفقدان'),
(982, 'Suspension and Debarment Investigation', 'التعليق والحرمان التحقيق'),
(983, 'Fire Protection', 'الحماية من الحرائق'),
(984, 'Fire Prevention and Safety Technology/Technician', 'الوقاية من الحرائق وتكنولوجيا السلامة / فني'),
(985, 'Fire Science/Fire-fighting', 'العلوم النار / مكافحة الحرائق'),
(986, 'Fire Services Administration', 'إدارة الخدمات النار'),
(987, 'Fire Systems Technology', 'حريق أنظمة تقنية'),
(988, 'Fire/Arson Investigation and Prevention', 'النار / الحرق التحقيق ومنع'),
(989, 'Wildland/Forest Firefighting and Investigation', 'البراري / غابة مكافحة الحرائق والتحقيق'),
(990, 'Homeland Security', 'أمن الوطن'),
(991, 'Crisis/Emergency/Disaster Management', 'الأزمات / الطوارئ / إدارة الكوارث'),
(992, 'Critical Infrastructure Protection', 'حماية البنية التحتية الحرجة'),
(993, 'Terrorism and Counterterrorism Operations', 'الإرهاب وعمليات مكافحة الإرهاب'),
(994, 'Human Services', 'الخدمات الإنسانية'),
(995, 'Community Organization and Advocacy', 'منظمة المجتمع والدعوة'),
(996, 'Public Administration', 'الإدارة العامة'),
(997, 'Public Policy Analysis', 'تحليل السياسات العامة'),
(998, 'Education Policy Analysis', 'تحليل السياسات التعليمية'),
(999, 'Health Policy Analysis', 'تحليل السياسات الصحية'),
(1000, 'International Policy Analysis', 'تحليل السياسة الدولية'),
(1001, 'Social Work', 'العمل الاجتماعي'),
(1002, 'Youth Services/Administration', 'خدمات الشباب / الإدارة'),
(1003, 'Legal Professions and Studies', 'المهن والدراسات القانونية'),
(1004, 'Pre-Law Studies', 'قبل قانون الدراسات'),
(1005, 'Law', 'القانون'),
(1006, 'Legal Research and Advanced Professional Studies', 'الأبحاث القانونية والدراسات الفنية المتقدم'),
(1007, 'Advanced Legal Research/Studies', 'الأبحاث القانونية المتقدم / دراسات'),
(1008, 'American/US Law/Legal Studies/Jurisprudence', 'القانون الأمريكي / الولايات المتحدة / الدراسات القانونية / الفقه'),
(1009, 'Banking, Corporate, Finance, and Securities Law', 'قانون البنوك، الشركات، والمالية، والأوراق المالية'),
(1010, 'Canadian Law/Legal Studies/Jurisprudence', 'القانون الكندي / الدراسات القانونية / الفقه'),
(1011, 'Comparative Law', 'القانون المقارن'),
(1012, 'Energy, Environment, and Natural Resources Law', 'قانون الطاقة والبيئة، والموارد الطبيعية'),
(1013, 'Health Law', 'قانون الصحة'),
(1014, 'Intellectual Property Law', 'قانون الملكية الفكرية'),
(1015, 'International Business, Trade, and Tax Law', 'الأعمال الدولية والتجارة وقانون الضرائب'),
(1016, 'International Law and Legal Studies', 'القانون الدولي والدراسات القانونية'),
(1017, 'Programs for Foreign Lawyers', 'برامج للمحامين الخارجية'),
(1018, 'Tax Law/Taxation', 'قانون الضرائب / الضرائب'),
(1019, 'Legal Support Services', 'خدمات الدعم القانونية'),
(1020, 'Court Reporting/Court Reporter', 'مراسل المحكمة التقارير / المحكمة'),
(1021, 'Legal Administrative Assistant/Secretary', 'قانوني مساعد إداري / أمين'),
(1022, 'Legal Assistant/Paralegal', 'مساعد قانوني / شبه'),
(1023, 'Liberal Arts and Sciences Studies and Humanities', 'الآداب والعلوم الدراسات والعلوم الإنسانية'),
(1024, 'General Studies', 'دراسات عامة'),
(1025, 'Humanities/Humanistic Studies', 'الدراسات الإنسانية / الدراسات الإنسانية'),
(1026, 'Liberal Arts and Sciences/Liberal Studies', 'الآداب والعلوم / الدراسات الليبرالية'),
(1027, 'Library Science', 'علم المكتبات'),
(1028, 'Library and Archives Assisting', 'دار الكتب والوثائق المساعدة'),
(1029, 'Library Science and Administration', 'مكتبة العلوم والإدارة'),
(1030, 'Archives/Archival Administration', 'أرشيف الإدارة / المحفوظات'),
(1031, 'Children and Youth Library Services', 'الأطفال والشباب خدمات المكتبة'),
(1032, 'Library and Information Science', 'علوم المكتبات والمعلومات'),
(1033, 'Mathematics and Statistics', 'الرياضيات والإحصاء'),
(1034, 'Applied Mathematics', 'الرياضيات التطبيقية'),
(1035, 'Computational and Applied Mathematics', 'الرياضيات الحسابية والتطبيقية'),
(1036, 'Computational Mathematics', 'الرياضيات الحاسوبية'),
(1037, 'Financial Mathematics', 'الرياضيات المالية'),
(1038, 'Mathematical Biology', 'علم الأحياء الرياضي'),
(1039, 'Mathematics', 'علم الرياضيات'),
(1040, 'Algebra and Number Theory', 'الجبر ونظرية الأعداد'),
(1041, 'Analysis and Functional Analysis', 'التحليل والتحليل الوظيفي'),
(1042, 'Geometry/Geometric Analysis', 'الهندسة / التحليل الهندسي'),
(1043, 'Topology and Foundations', 'طوبولوجيا والمؤسسات'),
(1044, 'Statistics', 'إحصائيات'),
(1045, 'Mathematical Statistics and Probability', 'الاحصائيات الرياضية والاحتمالات'),
(1046, 'Mechanic and Repair Technologies/technicians', 'ميكانيكي وإصلاح تكنولوجيز / الفنيين'),
(1047, 'Electrical/Electronics Maintenance and Repair Technology', 'الكهربائية / صيانة الالكترونيات والتكنولوجيا إصلاح'),
(1048, 'Appliance Installation and Repair Technology/Technician', 'الأجهزة تركيب والتكنولوجيا إصلاح / فني'),
(1049, 'Business Machine Repair', 'إصلاح آلة الأعمال'),
(1050, 'Communications Systems Installation and Repair Technology', 'أنظمة الاتصالات تركيب والتكنولوجيا إصلاح'),
(1051, 'Computer Installation and Repair Technology/Technician', 'تركيب جهاز الكمبيوتر والتكنولوجيا إصلاح / فني'),
(1052, 'Electrical/Electronics Equipment Installation and Repair', 'معدات إلكترونيات الكهربائية / تركيب وإصلاح'),
(1053, 'Industrial Electronics Technology/Technician', 'الصناعية الالكترونيات والتكنولوجيا / فني'),
(1054, 'Security System Installation, Repair, and Inspection Technology/Technician', 'تركيب نظام الأمن، إصلاح، والتفتيش والتكنولوجيا / فني'),
(1055, 'Heating, Air Conditioning, Ventilation and Refrigeration Maintenance Technology/Technician (HAC, HACR, HVAC, HVACR)', 'تدفئة، تكييف الهواء والتهوية والتبريد صيانة تكنولوجيا / فني (HAC، HACR، HVAC، HVACR)'),
(1056, 'Heating, Air Conditioning, Ventilation and Refrigeration Maintenance Technology/Technician', 'تدفئة، تكييف الهواء والتهوية وتكنولوجيا صيانة التبريد / فني'),
(1057, 'Heavy/Industrial Equipment Maintenance Technologies', 'الثقيلة / الصناعية معدات صيانة تكنولوجيا'),
(1058, 'Heavy Equipment Maintenance Technology/Technician', 'معدات ثقيلة تكنولوجيا صيانة / فني'),
(1059, 'Industrial Mechanics and Maintenance Technology', 'ميكانيكا الصناعية وتكنولوجيا الصيانة'),
(1060, 'Precision Systems Maintenance and Repair Technologies', 'الدقة صيانة أنظمة وتقنيات إصلاح'),
(1061, 'Gunsmithing/Gunsmith', 'Gunsmithing / صانع الأسلحة'),
(1062, 'Locksmithing and Safe Repair', 'صناعة الأقفال وإصلاح آمن'),
(1063, 'Musical Instrument Fabrication and Repair', 'موسيقي تصنيع الآلات وإصلاح'),
(1064, 'Parts and Warehousing Operations and Maintenance Technology/Technician', 'قطع الغيار وعمليات التخزين وتكنولوجيا صيانة / فني'),
(1065, 'Watchmaking and Jewelrymaking', 'صناعة الساعات وJewelrymaking'),
(1066, 'Vehicle Maintenance and Repair Technologies', 'صيانة السيارة وتقنيات إصلاح'),
(1067, 'Aircraft Powerplant Technology/Technician', 'الطائرات بويربلانت تكنولوجيا / فني'),
(1068, 'Airframe Mechanics and Aircraft Maintenance Technology/Technician', 'ميكانيكا هيكل الطائرة والتكنولوجيا لصيانة الطائرات / فني'),
(1069, 'Alternative Fuel Vehicle Technology/Technician', 'الوقود البديل تكنولوجيا مركبات / فني'),
(1070, 'Autobody/Collision and Repair Technology/Technician', 'Autobody / التصادم والتكنولوجيا إصلاح / فني'),
(1071, 'Automobile/Automotive Mechanics Technology/Technician', 'السيارات / ميكانيكا السيارات تكنولوجيا / فني'),
(1072, 'Avionics Maintenance Technology/Technician', 'تكنولوجيا صيانة الكترونيات الطيران / فني'),
(1073, 'Bicycle Mechanics and Repair Technology/Technician', 'ميكانيكا الدراجات والتكنولوجيا إصلاح / فني'),
(1074, 'Diesel Mechanics Technology/Technician', 'ميكانيكا الديزل تكنولوجيا / فني'),
(1075, 'Engine Machinist', 'محرك الماكنه'),
(1076, 'High Performance and Custom Engine Technician/Mechanic', 'عالية الأداء والمحرك فني مخصص / ميكانيكي'),
(1077, 'Marine Maintenance/Fitter and Ship Repair Technology/Technician', 'البحرية صيانة / الميكانيكي وإصلاح السفن تكنولوجيا / فني'),
(1078, 'Medium/Heavy Vehicle and Truck Technology/Technician', 'متوسطة / الثقيلة المركبات وشاحنة تقنية / فني'),
(1079, 'Motorcycle Maintenance and Repair Technology/Technician', 'صيانة الدراجات النارية والتكنولوجيا إصلاح / فني'),
(1080, 'Recreation Vehicle (RV) Service Technician', 'الترفيه السيارات (RV) فني الخدمة'),
(1081, 'Small Engine Mechanics and Repair Technology/Technician', 'ميكانيكا المحرك الصغيرة وتكنولوجيا إصلاح / فني'),
(1082, 'Vehicle Emissions Inspection and Maintenance Technology/Technician', 'الانبعاثات من المركبات التفتيش والتكنولوجيا صيانة / فني'),
(1083, 'Military Technologies and Applied Sciences', 'التكنولوجيات العسكرية والعلوم التطبيقية'),
(1084, 'Intelligence, Command Control and Information Operations', 'الذكاء، تحكم القيادة وعمليات المعلومات'),
(1085, 'Command & Control (C3, C4I) Systems and Operations', 'القيادة والسيطرة (C3، C4I) نظم والعمليات'),
(1086, 'Cyber/Electronic Operations and Warfare', 'سايبر / عمليات الالكترونية والحرب'),
(1087, 'Information Operations/Joint Information Operations', 'عمليات المعلومات / عمليات المعلومات المشتركة'),
(1088, 'Information/Psychological Warfare and Military Media Relations', 'المعلومات / الحرب النفسية والعلاقات الإعلامية العسكرية'),
(1089, 'Intelligence', 'ذكاء'),
(1090, 'Signal/Geospatial Intelligence', 'إشارة / الجغرافية المكانية الاستخبارات'),
(1091, 'Strategic Intelligence', 'الاستخبارات الاستراتيجية'),
(1092, 'Military Applied Sciences', 'العلوم التطبيقية الجيش'),
(1093, 'Combat Systems Engineering', 'هندسة النظم القتالية'),
(1094, 'Directed Energy Systems', 'أنظمة الطاقة الموجهة'),
(1095, 'Engineering Acoustics', 'هندسة الصوتيات'),
(1096, 'Low-Observables and Stealth Technology', 'المنخفضة المتغيرات الظاهرة والشبح تكنولوجيا'),
(1097, 'Operational Oceanography', 'علم المحيطات التشغيلي'),
(1098, 'Space Systems Operations', 'عمليات أنظمة الفضاء'),
(1099, 'Undersea Warfare', 'الحرب تحت البحر'),
(1100, 'Military Systems and Maintenance Technology', 'نظم الجيش وتكنولوجيا الصيانة'),
(1101, 'Aerospace Ground Equipment Technology', 'الفضاء الأرضي معدات تكنولوجيا'),
(1102, 'Air and Space Operations Technology', 'الهواء وتكنولوجيا العمليات الفضائية'),
(1103, 'Aircraft Armament Systems Technology', 'الطائرات التسلح أنظمة تقنية'),
(1104, 'Explosive Ordinance/Bomb Disposal', 'مرسوم ناسفة / التخلص منها قنبلة'),
(1105, 'Joint Command/Task Force (C3, C4I) Systems', 'قوة القيادة المشتركة / المهام (C3، C4I) نظم'),
(1106, 'Military Information Systems Technology', 'نظم المعلومات العسكرية التقنية'),
(1107, 'Missile and Space Systems Technology', 'الصواريخ وأنظمة تكنولوجيا الفضاء'),
(1108, 'Munitions Systems/Ordinance Technology', 'الذخائر أنظمة / قانون تكنولوجيا'),
(1109, 'Radar Communications and Systems Technology', 'الاتصالات الرادار وأنظمة تقنية'),
(1110, 'Multi/interdisciplinary Studies', 'موضوع / دراسات متعددة التخصصات'),
(1111, 'Accounting and Computer Science', 'المحاسبة وعلوم الحاسب الآلي'),
(1112, 'Behavioral Sciences', 'العلوم السلوكية'),
(1113, 'Biological and Physical Sciences', 'العلوم البيولوجية والفيزيائية'),
(1114, 'Biopsychology', 'البيولوجيا النفسية'),
(1115, 'Classical and Ancient Studies', 'الدراسات الكلاسيكية والقديمة'),
(1116, 'Ancient Studies/Civilization', 'الدراسات القديمة / الحضارة'),
(1117, 'Classical, Ancient Mediterranean and Near Eastern Studies and Archaeology', 'الكلاسيكية، البحر الأبيض المتوسط ​​القديمة ودراسات الشرق الأدنى وعلم الآثار'),
(1118, 'Cognitive Science', 'العلوم المعرفية'),
(1119, 'Computational Science', 'العلوم الحسابية'),
(1120, 'Cultural Studies/Critical Theory and Analysis', 'الدراسات الثقافية / النظرية والتحليل النقدي'),
(1121, 'Dispute Resolution', 'تسوية المنازعات'),
(1122, 'Gerontology', 'علم الشيخوخة'),
(1123, 'Historic Preservation and Conservation', 'المحافظة على المواقع التاريخية والمحافظة عليها'),
(1124, 'Cultural Resource Management and Policy Analysis', 'إدارة الموارد الثقافية وتحليل السياسات'),
(1125, 'Holocaust and Related Studies', 'المحرقة والدراسات ذات الصلة'),
(1126, 'Human Biology', 'علم الأحياء البشري'),
(1127, 'Human Computer Interaction', 'التفاعل البشري الحاسوب'),
(1128, 'Intercultural/Multicultural and Diversity Studies', 'الثقافات / متعددة الثقافات والدراسات التنوع'),
(1129, 'International/Global Studies', '/ الدراسات العالمية الدولية'),
(1130, 'Marine Sciences', 'علوم البحار'),
(1131, 'Maritime Studies', 'الدراسات البحرية'),
(1132, 'Mathematics and Computer Science', 'الرياضيات وعلوم الحاسوب'),
(1133, 'Medieval and Renaissance Studies', 'دراسات العصور الوسطى وعصر النهضة'),
(1134, 'Museology/Museum Studies', 'علم المتاحف / الدراسات متحف'),
(1135, 'Natural Sciences', 'العلوم الطبيعية'),
(1136, 'Nutrition Sciences', 'علوم التغذية'),
(1137, 'Peace Studies and Conflict Resolution', 'دراسات السلام وحل النزاعات'),
(1138, 'Science, Technology and Society', 'العلوم والتكنولوجيا والمجتمع'),
(1139, 'Sustainability Studies', 'دراسات الاستدامة'),
(1140, 'Systems Science and Theory', 'نظم العلوم ونظرية'),
(1141, 'Natural Resources and Conservation', 'الموارد الطبيعية والمحافظة عليها'),
(1142, 'Fishing and Fisheries Sciences and Management', 'الصيد وعلوم مصايد الأسماك وإدارة'),
(1143, 'Forestry', 'الغابات'),
(1144, 'Forest Management/Forest Resources Management', 'إدارة الغابات إدارة / الموارد الحرجية'),
(1145, 'Forest Resources Production and Management', 'الغابات إنتاج وإدارة الموارد'),
(1146, 'Forest Sciences and Biology', 'علوم الغابات والأحياء'),
(1147, 'Forest Technology/Technician', 'تكنولوجيا الغابات / فني'),
(1148, 'Urban Forestry', 'الغابات في المناطق الحضرية'),
(1149, 'Wood Science and Wood Products/Pulp and Paper Technology', 'علوم الخشب والمنتجات الخشبية / اللب وتكنولوجيا الورق'),
(1150, 'Natural Resources Conservation and Research', 'الحفاظ على الموارد الطبيعية والبحوث'),
(1151, 'Environmental Science', 'العلوم البيئية'),
(1152, 'Environmental Studies', 'الدراسات البيئية'),
(1153, 'Natural Resources/Conservation', 'الموارد الطبيعية / الحفاظ عليها'),
(1154, 'Natural Resources Management and Policy', 'إدارة الموارد الطبيعية والسياسة'),
(1155, 'Land Use Planning and Management/Development', 'تخطيط استخدام الأراضي وإدارة تنمية /'),
(1156, 'Natural Resource Economics', 'اقتصاد الموارد الطبيعية'),
(1157, 'Natural Resource Recreation and Tourism', 'منتزهات الموارد الطبيعية والسياحة'),
(1158, 'Natural Resources Law Enforcement and Protective Services', 'الموارد الطبيعية إنفاذ القانون وخدمات حماية'),
(1159, 'Water, Wetlands, and Marine Resources Management', 'المياه والأراضي الرطبة، والموارد البحرية الإدارة'),
(1160, 'Wildlife and Wildlands Science and Management', 'الحياة البرية والحياة البرية والعلوم الإدارية'),
(1161, 'Wildlife, Fish and Wildlands Science and Management', 'الحياة البرية والأسماك والحياة البرية العلوم والإدارة'),
(1162, 'Parks, Recreation, Leisure, and Fitness Studies', 'الحدائق والترفيه، دراسات الترويح، واللياقة البدنية'),
(1163, 'Health and Physical Education/Fitness', 'الصحة والتربية البدنية / اللياقة البدنية'),
(1164, 'Kinesiology and Exercise Science', 'علم الحركة وممارسة العلم'),
(1165, 'Physical Fitness Technician', 'اللياقة البدنية فني'),
(1166, 'Sport and Fitness Administration/Management', 'الرياضة والإدارة اللياقة البدنية / إدارة'),
(1167, 'Sports Studies', 'الدراسات الرياضية'),
(1168, 'Outdoor Education', 'التعليم في الهواء الطلق'),
(1169, 'Parks, Recreation and Leisure Facilities Management', 'باركس، الترويح والترفيه إدارة المرافق'),
(1170, 'Golf Course Operation and Grounds Management', 'ملعب غولف تشغيل وإدارة أرض'),
(1171, 'Parks, Recreation and Leisure Studies', 'دراسات متنزهات، الترويح والترفيه'),
(1172, 'Personal and Culinary Services', 'الخدمات الشخصية والطهي'),
(1173, 'Cooking and Related Culinary Arts', 'الطبخ وفنون الطبخ ذات علاقة'),
(1174, 'Baking and Pastry Arts/Baker/Pastry Chef', 'الخبز والمعجنات الفنون / بيكر / المعجنات الشيف'),
(1175, 'Bartending/Bartender', 'Bartending / نادل'),
(1176, 'Culinary Arts/Chef Training', 'فنون الطهي / تدريب الشيف'),
(1177, 'Culinary Science/Culinology', 'العلوم الطهي / Culinology'),
(1178, 'Food Preparation/Professional Cooking/Kitchen Assistant', 'إعداد الطعام / المحترف مساعد / المطبخ الطبخ'),
(1179, 'Food Service, Waiter/Waitress, and Dining Room Management/Manager', 'المأكولات الخدمة، النادل / النادلة، وغرفة الطعام إدارة / مدير'),
(1180, 'Institutional Food Workers', 'المؤسسية عمال الأغذية'),
(1181, 'Meat Cutting/Meat Cutter', 'تقطيع اللحم / اللحوم كتر'),
(1182, 'Restaurant, Culinary, and Catering Management/Manager', 'مطعم، الطبخ، وإدارة التموين / مدير'),
(1183, 'Wine Steward/Sommelier', 'النبيذ ستيوارد / الساقي'),
(1184, 'Cosmetology and Related Personal Grooming Services', 'مستحضرات التجميل وذات شخصية خدمات النظافة الشخصية'),
(1185, 'Aesthetician/Esthetician and Skin Care Specialist', 'Aesthetician / الجماليات والعناية بالبشرة التخصصي'),
(1186, 'Barbering/Barber', 'الحلاقة / الحلاق'),
(1187, 'Cosmetology, Barber/Styling, and Nail Instructor', 'التجميل، محل حلاقة / تصفيف، والأظافر مدرس'),
(1188, 'Cosmetology/Cosmetologist', 'التجميل / فيزيائيين'),
(1189, 'Electrolysis/Electrology and Electrolysis Technician', 'التحليل الكهربائي / Electrology والتحليل الكهربائي فني'),
(1190, 'Facial Treatment Specialist/Facialist', 'أخصائي علاج الوجه / Facialist'),
(1191, 'Hair Styling/Stylist and Hair Design', 'تصفيف الشعر / المصمم والتصميم الشعر'),
(1192, 'Make-Up Artist/Specialist', 'المكياج الفنان / التخصصي'),
(1193, 'Master Aesthetician/Esthetician', 'سيد Aesthetician / الجماليات'),
(1194, 'Nail Technician/Specialist and Manicurist', 'فني مسمار / التخصصي ومدرم الأظافر'),
(1195, 'Permanent Cosmetics/Makeup and Tattooing', 'مستحضرات التجميل الدائمة / ماكياج والوشم'),
(1196, 'Salon/Beauty Salon Management/Manager', 'صالون / الجمال إدارة صالون / مدير'),
(1197, 'Funeral Service and Mortuary Science', 'مراسم الجنازة والجنائزى العلوم'),
(1198, 'Funeral Direction/Service', 'اتجاه الجنازة / الخدمة'),
(1199, 'Mortuary Science and Embalming/Embalmer', 'مشرحة العلوم والتحنيط / المحنط'),
(1200, 'Philosophy and Religious Studies', 'الفلسفة والدراسات الدينية'),
(1201, 'Philosophy', 'فلسفة'),
(1202, 'Applied and Professional Ethics', 'التطبيقية وآداب المهنة'),
(1203, 'Ethics', 'علم الأخلاق'),
(1204, 'Logic', 'علم المنطق'),
(1205, 'Religion/Religious Studies', 'الدين / الدراسات الدينية'),
(1206, 'Buddhist Studies', 'الدراسات البوذية'),
(1207, 'Christian Studies', 'الدراسات المسيحية'),
(1208, 'Hindu Studies', 'دراسات الهندوسية'),
(1209, 'Islamic Studies', 'الدراسات الاسلامية'),
(1210, 'Jewish/Judaic Studies', '/ الدراسات اليهودية اليهودية'),
(1211, 'Physical Sciences', 'العلوم الفيزيائية'),
(1212, 'Astronomy and Astrophysics', 'علم الفلك والفيزياء الفلكية'),
(1213, 'Astronomy', 'علم الفلك'),
(1214, 'Astrophysics', 'الفيزياء الفلكية'),
(1215, 'Planetary Astronomy and Science', 'علم الفلك الكواكب والعلوم'),
(1216, 'Atmospheric Sciences and Meteorology', 'علوم الغلاف الجوي والأرصاد الجوية'),
(1217, 'Atmospheric Chemistry and Climatology', 'كيمياء الغلاف الجوي والمناخ'),
(1218, 'Atmospheric Physics and Dynamics', 'فيزياء الغلاف الجوي والديناميات'),
(1219, 'Meteorology', 'الأرصاد الجوية'),
(1220, 'Chemistry', 'مادة الكيمياء'),
(1221, 'Analytical Chemistry', 'الكيمياء التحليلية'),
(1222, 'Chemical Physics', 'الفيزياء الكيميائية'),
(1223, 'Environmental Chemistry', 'الكيمياء البيئية'),
(1224, 'Forensic Chemistry', 'كيمياء الطب الشرعي'),
(1225, 'Inorganic Chemistry', 'الكيمياء غير العضوية'),
(1226, 'Organic Chemistry', 'الكيمياء العضوية'),
(1227, 'Physical Chemistry', 'الكيمياء الفيزيائية'),
(1228, 'Polymer Chemistry', 'كيمياء البوليمرات'),
(1229, 'Theoretical Chemistry', 'الكيمياء النظرية'),
(1230, 'Geological and Earth Sciences/Geosciences', 'الجيولوجية وعلوم الأرض / علوم الأرض'),
(1231, 'Geochemistry', 'الجيوكيمياء'),
(1232, 'Geochemistry and Petrology', 'الكيمياء الجيولوجية والصخور'),
(1233, 'Geology/Earth Science', 'الجيولوجيا / علوم الأرض'),
(1234, 'Geophysics and Seismology', 'الجيوفيزياء وعلم الزلازل'),
(1235, 'Hydrology and Water Resources Science', 'الهيدرولوجيا وعلوم الموارد المائية'),
(1236, 'Oceanography, Chemical and Physical', 'علم المحيطات، والمواد الكيميائية والفيزيائية'),
(1237, 'Paleontology', 'علم المتحجرات'),
(1238, 'Materials Sciences', 'علوم المواد'),
(1239, 'Materials Chemistry', 'كيمياء المواد'),
(1240, 'Materials Science', 'علوم المواد'),
(1241, 'Physics', 'الفيزياء'),
(1242, 'Acoustics', 'الصوتيات'),
(1243, 'Atomic/Molecular Physics', 'الذرية / الفيزياء الجزيئية'),
(1244, 'Condensed Matter and Materials Physics', 'المواد المكثفة وفيزياء المواد'),
(1245, 'Elementary Particle Physics', 'فيزياء الجسيمات الأولية'),
(1246, 'Nuclear Physics', 'الفيزياء النووية'),
(1247, 'Optics/Optical Sciences', 'البصريات / العلوم البصرية'),
(1248, 'Plasma and High-Temperature Physics', 'فيزياء البلازما وارتفاع درجة الحرارة'),
(1249, 'Theoretical and Mathematical Physics', 'الفيزياء النظرية والرياضية'),
(1250, 'Precision Production', 'إنتاج الدقة'),
(1251, 'Boilermaking/Boilermaker', 'نحاسة / الصانع غلايات'),
(1252, 'Leatherworking and Upholstery', 'Leatherworking وتنجيد'),
(1253, 'Shoe, Boot and Leather Repair', 'الحذاء، الحذاء وجلد إصلاح'),
(1254, 'Upholstery/Upholsterer', 'المفروشات / منجد'),
(1255, 'Precision Metal Working', 'دقة صناعة المعادن'),
(1256, 'Computer Numerically Controlled (CNC) Machinist Technology/CNC Machinist', 'الكمبيوتر التي تسيطر عليها عدديا (CNC) الماكنه تكنولوجيا / CNC الماكنه'),
(1257, 'Ironworking/Ironworker', 'الحدادة / الحداد'),
(1258, 'Machine Shop Technology/Assistant', 'آلة متجر تكنولوجيا / مساعد'),
(1259, 'Machine Tool Technology/Machinist', 'آلة أداة تقنية / الماكنه'),
(1260, 'Metal Fabricator', 'المعادن المفتري'),
(1261, 'Sheet Metal Technology/Sheetworking', 'المعادن ورقة تقنية / Sheetworking'),
(1262, 'Tool and Die Technology/Technician', 'أداة ويموت تكنولوجيا / فني'),
(1263, 'Welding Technology/Welder', 'تكنولوجيا اللحام / لحام'),
(1264, 'Woodworking', 'النجارة'),
(1265, 'Cabinetmaking and Millwork', 'الخزائن ومطاحن'),
(1266, 'Furniture Design and Manufacturing', 'تصميم الأثاث والتصنيع'),
(1267, 'Psychology', 'علم النفس'),
(1268, 'Research and Experimental Psychology', 'بحث وعلم النفس التجريبي'),
(1269, 'Cognitive Psychology and Psycholinguistics', 'علم النفس المعرفي وعلم اللغة النفسي'),
(1270, 'Comparative Psychology', 'علم النفس المقارن'),
(1271, 'Developmental and Child Psychology', 'علم النفس التنموي والطفل'),
(1272, 'Experimental Psychology', 'علم النفس التجريبي'),
(1273, 'Personality Psychology', 'علم النفس الشخصية'),
(1274, 'Physiological Psychology/Psychobiology', 'علم النفس الفسيولوجي / علم النفس الأحيائي'),
(1275, 'Psychometrics and Quantitative Psychology', 'القياس النفسي وعلم النفس الكمي'),
(1276, 'Psychopharmacology', 'علم الأدوية النفسية'),
(1277, 'Social Psychology', 'علم النفس الاجتماعي'),
(1278, 'Science Technologies/technicians', 'تكنولوجيا العلوم'),
(1279, 'Biology Technician/Biotechnology Laboratory Technician', 'فني البيولوجيا / فني مختبر التكنولوجيا الحيوية'),
(1280, 'Nuclear and Industrial Radiologic Technologies/Technicians', 'التكنولوجيا النووية و تكنولوجيا الاشعاعات الصناعيات'),
(1281, 'Industrial Radiologic Technology/Technician', 'تكنولوجيا الاشعاعات الصناعية'),
(1282, 'Nuclear/Nuclear Power Technology/Technician', 'تكنولوجيا الطاقة النووية'),
(1283, 'Physical Science Technologies/Technicians', 'تكنولوجيا العلوم الفيزيائية'),
(1284, 'Chemical Process Technology', 'تكنولوجيا العمليات الكيميائية'),
(1285, 'Chemical Technology/Technician', 'التكنولوجيا الكيميائية'),
(1286, 'Social Sciences', 'علوم اجتماعية'),
(1287, 'Anthropology', 'انثروبولوجيا'),
(1288, 'Cultural Anthropology', 'الأنثروبولوجيا الحضارية'),
(1289, 'Medical Anthropology', 'الأنثروبولوجيا الطبية'),
(1290, 'Physical and Biological Anthropology', 'الأنثروبولوجيا الفيزيائية والبيولوجية'),
(1291, 'Archeology', 'علم الآثار'),
(1292, 'Criminology', 'علم الاجرام'),
(1293, 'Demography and Population Studies', 'الدراسات السكانية و الديموغرافيا'),
(1294, 'Economics', 'علم الاقتصاد'),
(1295, 'Applied Economics', 'الاقتصاد التطبيقي'),
(1296, 'Development Economics and International Development', 'اقتصاديات التنمية والتنمية الدولية'),
(1297, 'Econometrics and Quantitative Economics', 'الاقتصاد القياسي والاقتصاد الكمي'),
(1298, 'International Economics', 'الاقتصاد الدولي'),
(1299, 'Geography and Cartography', 'الجغرافيا ورسم الخرائط'),
(1300, 'Geographic Information Science and Cartography', 'علوم المعلومات الجغرافية و علم رسم الخرائط'),
(1301, 'Geography', 'الجغرافيا'),
(1302, 'International Relations and National Security Studies', 'العلاقات الدولية ودراسات الأمن القومي'),
(1303, 'International Relations and Affairs', 'العلاقات والشؤون الدولية'),
(1304, 'National Security Policy Studies', 'دراسات سياسة الأمن القومي'),
(1305, 'Political Science and Government', 'العلوم السياسية والحكومة'),
(1306, 'American Government and Politics (United States)', 'الحكومة الأمريكية والسياسة (الولايات المتحدة الأمريكية)'),
(1307, 'Canadian Government and Politics', 'الحكومة الكندية والسياسة'),
(1308, 'Political Economy', 'الاقتصاد السياسي'),
(1309, 'Rural Sociology', 'علم الاجتماع الريفي'),
(1310, 'Research Methodology and Quantitative Methods', 'مناهج البحث العلمي والأساليب الكمية'),
(1311, 'Sociology and Anthropology', 'العلوم الاجتماعية والأنثروبولوجيا'),
(1312, 'Sociology', 'العلوم الاجتماعية'),
(1313, 'Urban Studies/Affairs', 'الدراسات الحضرية الشؤون /'),
(1314, 'Theology and Religious Vocations', 'اللاهوت والدعوات الدينية'),
(1315, 'Bible/Biblical Studies', 'الإنجيل/ الدراسات الإنجيلية'),
(1316, 'Missions/Missionary Studies and Missiology', 'البعثات / الدراسات التبشيرية وعلم التبشير'),
(1317, 'Pastoral Counseling and Specialized Ministries', 'الإرشاد الرعوي والوزارات المتخصصة'),
(1318, 'Lay Ministry', 'وزارة لاي'),
(1319, 'Pastoral Studies/Counseling', 'الدراسات الرعوية / الإرشاد'),
(1320, 'Urban Ministry', 'وزارة العمراني'),
(1321, 'Women''s Ministry', 'وزارة المرأة'),
(1322, 'Youth Ministry', 'وزارة الشباب'),
(1323, 'Religious Education', 'التربية الدينية'),
(1324, 'Religious/Sacred Music', 'الموسيقى الدينية / الروحية'),
(1325, 'Theological and Ministerial Studies', 'اللاهوتية والدراسات الوزاري'),
(1326, 'Divinity/Ministry', 'الألوهية / وزارة'),
(1327, 'Pre-Theology/Pre-Ministerial Studies', 'قبل اللاهوت / دراسات ما قبل الوزارية'),
(1328, 'Rabbinical Studies', 'الدراسات الحاخامية'),
(1329, 'Talmudic Studies', 'الدراسات التلمودية'),
(1330, 'Theology/Theological Studies', 'لاهوت / الدراسات اللاهوتية'),
(1331, 'Transportation and Materials Moving', 'النقل والمواد الانتقال'),
(1332, 'Air Transportation', 'النقل الجوي'),
(1333, 'Aeronautics/Aviation/Aerospace Science and Technology', 'علوم و تكنولوجيا الطيران والفضاء'),
(1334, 'Air Traffic Controller', 'مراقب الحركة الجوية'),
(1335, 'Airline Flight Attendant', 'مضيف طيران'),
(1336, 'Airline/Commercial/Professional Pilot and Flight Crew', 'شركة طيران / تجاري / الفنية التجريبية والطيران الطاقم'),
(1337, 'Aviation/Airway Management and Operations', 'الطيران / إدارة الخطوط الجوية والعمليات'),
(1338, 'Flight Instructor', 'مدرب طيران'),
(1339, 'Ground Transportation', 'النقل البري'),
(1340, 'Construction/Heavy Equipment/Earthmoving Equipment Operation', 'عمليات البناء / المعدات الثقيلة / معدات الحفر والنقل'),
(1341, 'Flagging and Traffic Control', 'ضعف ومراقبة الحركة'),
(1342, 'Mobil Crane Operation/Operator', 'موبيل كرين التشغيل / المشغل'),
(1343, 'Railroad and Railway Transportation', 'السكك الحديدية والنقل بالسكك الحديدية');
INSERT INTO `major` (`major_id`, `major_name_en`, `major_name_ar`) VALUES
(1344, 'Truck and Bus Driver/Commercial Vehicle Operator and Instructor', 'سائق شاحنة وحافلة / مشغل ومدرس المركبات التجاري '),
(1345, 'Marine Transportation', 'النقل البحري'),
(1346, 'Commercial Fishing', 'الصيد التجاري'),
(1347, 'Diver, Professional and Instructor', 'غواص، معلم ومحترف'),
(1348, 'Marine Science/Merchant Marine Officer', 'علوم بحرية/ تاجر علوم البحرية'),
(1349, 'Visual and Performing Arts', 'الفنون البصرية والأدائية'),
(1350, 'Arts, Entertainment,and Media Management', 'إدارة الفنون والترفيه والإعلام'),
(1351, 'Fine and Studio Arts Management', 'إدارة الفنون التشكيلية و فنون الاستوديو'),
(1352, 'Music Management', 'إدارة الموسيقى'),
(1353, 'Theatre/Theatre Arts Management', 'مسرح / إدارة الفنون المسرحية'),
(1354, 'Crafts/Craft Design, Folk Art and Artisanry', 'الحرف / كرافت التصميم، الفن الشعبي وArtisanry'),
(1355, 'Dance', 'الرقص'),
(1356, 'Ballet', 'رقص الباليه'),
(1357, 'Design and Applied Arts', 'التصميم والفنون التطبيقية'),
(1358, 'Commercial and Advertising Art', 'الفن التجاري والإعلاني'),
(1359, 'Commercial Photography', 'التصوير التجاري'),
(1360, 'Design and Visual Communications', 'التصميم والاتصالات البصرية'),
(1361, 'Fashion/Apparel Design', 'تصميم الازياء'),
(1362, 'Game and Interactive Media Design', 'تصميم  الالعاب و وسائل الإعلام التفاعلية'),
(1363, 'Graphic Design', 'تصميم جرافيكي'),
(1364, 'Illustration', 'الرسم التوضيحى'),
(1365, 'Industrial and Product Design', 'التصميم الصناعي والانتاجي'),
(1366, 'Interior Design', 'التصميم الداخلي'),
(1367, 'Drama/Theatre Arts and Stagecraft', 'الدراما/ الفنون والحرف المسرحية'),
(1368, 'Acting', 'التمثيل'),
(1369, 'Costume Design', 'تصميم الازياء المسرحية'),
(1370, 'Directing and Theatrical Production', 'الإخراج والإنتاج المسرحي'),
(1371, 'Drama and Dramatics/Theatre Arts', 'الدراما و فنون التمثيل المسرحي'),
(1372, 'Musical Theatre', 'المسرح الموسيقي'),
(1373, 'Playwriting and Screenwriting', 'الكتابة المسرحية وكتابة السيناريو'),
(1374, 'Technical Theatre/Theatre Design and Technology', 'المسرح التقني / تصميم وتكنولوجيا المسرح'),
(1375, 'Theatre Literature, History and Criticism', 'الأدب و التاريخ و النقد المسرحي'),
(1376, 'Film/Video and Photographic Arts', 'فنون الفيلم / الفيديو و التصوير الفوتوغرافي'),
(1377, 'Cinematography and Film/Video Production', 'التصوير السينمائي و انتاج الفيلم/الفيديو'),
(1378, 'Documentary Production', 'إنتاج فيلم وثائقي'),
(1379, 'Film/Cinema/Video Studies', 'فيلم / سينما / دراسات الفيديو'),
(1380, 'Photography', 'تصوير فوتوغرافي'),
(1381, 'Fine and Studio Arts', 'الفنون التشكيلية'),
(1382, 'Art History, Criticism and Conservation', 'تاريخ و نقد و حفظ الفن'),
(1383, 'Art/Art Studies', 'الفن / الدراسات الفنية'),
(1384, 'Ceramic Arts and Ceramics', 'الفنون الخزفية والسيراميكية'),
(1385, 'Drawing', 'رسم'),
(1386, 'Fiber, Textile and Weaving Arts', 'فنون الألياف والنسيج والحياكة'),
(1387, 'Fine/Studio Arts', 'الفنون التشكيلية'),
(1388, 'Intermedia/Multimedia', 'إنترميديا ​​/ الوسائط المتعددة'),
(1389, 'Metal and Jewelry Arts', 'فنون المعادن والمجوهرات'),
(1390, 'Painting', 'فن الرسم'),
(1391, 'Printmaking', 'الطباعة'),
(1392, 'Sculpture', 'فن النحت'),
(1393, 'Music', 'موسيقى'),
(1394, 'Brass Instruments', 'الآلات النحاسية'),
(1395, 'Conducting', 'إجراء'),
(1396, 'Jazz/Jazz Studies', 'الجاز / دراسات الجاز'),
(1397, 'Keyboard Instruments', 'آلات لوحة المفاتيح'),
(1398, 'Music History, Literature, and Theory', 'نظريات و آداب و تاريخ الموسيقى'),
(1399, 'Music Pedagogy', 'التربية الموسيقى'),
(1400, 'Music Performance', 'الأداء الموسيقي'),
(1401, 'Music Technology', 'تكنولوجيا الموسيقى'),
(1402, 'Music Theory and Composition', 'نظرية الموسيقى والتأليف'),
(1403, 'Musicology and Ethnomusicology', 'علم الموسيقى وعلم الموسيقى العرقي'),
(1404, 'Percussion Instruments', 'الآلات الإيقاعية'),
(1405, 'Stringed Instruments', 'الآلات الوترية'),
(1406, 'Voice and Opera', 'صوت وأوبرا'),
(1407, 'Woodwind Instruments', 'آلات النفخ'),
(1408, 'Digital Arts', 'الفنون الرقمية');

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
  `country_id` int(11) unsigned NOT NULL,
  `university_id` int(11) unsigned NOT NULL,
  `student_firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `student_lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_dob` date NOT NULL,
  `student_status` tinyint(4) NOT NULL COMMENT 'Full Time (1) Part Time (0)',
  `student_enrolment_year` year(4) NOT NULL,
  `student_graduating_year` year(4) NOT NULL,
  `student_gpa` decimal(10,2) NOT NULL,
  `student_english_level` tinyint(4) NOT NULL,
  `student_gender` tinyint(4) NOT NULL COMMENT 'Male (1) Female (0)',
  `student_transportation` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'true (1), false (0)',
  `student_contact_number` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `student_interestingfacts` text COLLATE utf8_unicode_ci,
  `student_photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `student_cv` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `student_skill` text COLLATE utf8_unicode_ci,
  `student_hobby` text COLLATE utf8_unicode_ci,
  `student_club` text COLLATE utf8_unicode_ci,
  `student_sport` text COLLATE utf8_unicode_ci,
  `student_experience_company` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `student_experience_position` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `student_verification_attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `student_email_verification` tinyint(4) NOT NULL DEFAULT '0',
  `student_id_verification` tinyint(4) NOT NULL DEFAULT '0',
  `student_id_number` varchar(128) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'University ID Number to keep track of duplicates',
  `student_email_preference` tinyint(4) NOT NULL COMMENT 'Off(0), Daily(1), Weekly(2)',
  `student_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `student_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `student_password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `student_language_pref` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en-US',
  `student_banned` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1 - for banned',
  `student_updated_datetime` datetime NOT NULL,
  `student_datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `degree_id`, `country_id`, `university_id`, `student_firstname`, `student_lastname`, `student_dob`, `student_status`, `student_enrolment_year`, `student_graduating_year`, `student_gpa`, `student_english_level`, `student_gender`, `student_transportation`, `student_contact_number`, `student_interestingfacts`, `student_photo`, `student_cv`, `student_skill`, `student_hobby`, `student_club`, `student_sport`, `student_experience_company`, `student_experience_position`, `student_verification_attachment`, `student_email_verification`, `student_id_verification`, `student_id_number`, `student_email_preference`, `student_email`, `student_auth_key`, `student_password_hash`, `student_password_reset_token`, `student_language_pref`, `student_banned`, `student_updated_datetime`, `student_datetime`) VALUES
(13, 2, 9, 1, 'dwadwa', 'dwadwa', '1984-04-12', 1, 2013, 2017, '2.00', 2, 0, 0, '99811042', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 0, 'dawd@gust.edu.kw', 'V0nH70XkhjxuBSP3k4Mi-Rq5c_Lj6bvc', '$2y$13$zCplTcuoqlXfTMXl8jGrC.3v0DD52vqR276ostHuialSExU07bNDe', '', 'en-US', 0, '2015-04-27 10:51:37', '2015-04-27 10:51:37');

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
  `student_id` int(11) unsigned NOT NULL,
  `language_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_language`
--

INSERT INTO `student_language` (`student_id`, `language_id`) VALUES
(13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `student_major`
--

CREATE TABLE IF NOT EXISTS `student_major` (
  `student_id` int(11) unsigned NOT NULL,
  `major_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_major`
--

INSERT INTO `student_major` (`student_id`, `major_id`) VALUES
(13, 7);

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
  `university_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `university_name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `university_domain` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Example: @gust.edu.kw',
  `university_require_verify` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Require Verification (0); Does not require verification (1)',
  `university_id_template` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'A photo to define what verification we require',
  `university_logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `university_graphic` varchar(255) COLLATE utf8_unicode_ci DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`university_id`, `university_name_en`, `university_name_ar`, `university_domain`, `university_require_verify`, `university_id_template`, `university_logo`, `university_graphic`) VALUES
(1, 'Gulf University for Science and Technology', 'جامعة الخليج للعلوم والتكنولوجيا', 'gust.edu.kw', 0, '', 'qUAt0IwPfBTbl9idqErSAnx2vmpvwozo.jpg', ''),
(2, 'Kuwait University', 'جامعة الكويت‎', '', 1, 'xr0g0UNj4zL13GP79iAFv6oUOfe6mcr4.jpg', 'J_ldXRaXJzUZU3XtKNxk9AqrtTNvEXBF.jpg', ''),
(3, 'Arab Open University', 'الجامعة العربية المفتوحة', '', 1, 'JE9jUQPJggoG3x1sRVUtjU4WYI1-bmFT.jpg', 'wsZ3G0i_VYJ4F0YveBMFcZwmypZY0YsM.jpg', ''),
(4, 'American University of Kuwait', 'الجامعة الأمريكية في الكويت', 'auk.edu.kw', 0, '', 'O0dIA6cvKyQem3BuOxoNmCDg40E5vtdC.jpg', ''),
(5, 'Australian College of Kuwait', 'الكلية الأسترالية في الكويت', 'go.ack.edu.kw', 0, '', 'R_WppSNgGrtxJhMxKG-g2pwjc0dM7mFJ.jpg', ''),
(6, 'American University of the Middle East', 'جامعة الشرق الأوسط الأمريكية', 'aum.edu.kw', 0, '', 'qmLYygvyTXmhWpqthmlO1MoRfYpC1fb5.jpg', ''),
(7, 'American College of the Middle East', 'كلية الشرق الأوسط الأمريكية', 'acm.edu.kw', 0, '', 'WlZBHhBDbkC3rrnv4JDItlCcQtuPXcxW.jpg', ''),
(8, 'Kuwait Maastricht Business School', 'كلية كويت - ماسترخت لإدارة الأعمـال', 'kmbs.edu.kw', 0, '', '0TAm5biJGCIvCbLCUBq18hMGwnhCq1a4.jpg', ''),
(9, 'Box Hill College Kuwait', 'كلية بوكسهل', 'bhck.edu.kw', 0, '', 'rPY-R1mNxDhgMXNsZFu8ml9t1hMhmqVi.jpg', ''),
(10, 'Kuwait International Law School', 'كلية القانون الكويتية العالمية', 'killaw.edu.kw', 0, '', 'rbitcXx-CcFTG2W14ZxBjyTwb2tPAlkZ.jpg', ''),
(11, 'Public Authority for Applied Education and Training ', 'الهيئة العامة للتعليم التطبيقي والتدريب', '', 1, '-eLcPm0VBr-maVC9AKD0EbX-dN9sJbHU.jpg', '_0-iJE4dU4LKDrKhcVKntH1gVxCvh-El.jpg', ''),
(12, 'Other', 'اخرى', '', 1, 'zmVWxUv27GyG0ij69jPHIRSvD5KMh5O0.jpg', '', '');

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
  ADD PRIMARY KEY (`student_id`), ADD KEY `degree_id` (`degree_id`), ADD KEY `university_id` (`university_id`), ADD KEY `country_id` (`country_id`);

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
-- Indexes for table `student_major`
--
ALTER TABLE `student_major`
  ADD PRIMARY KEY (`student_id`,`major_id`), ADD KEY `major_id` (`major_id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=183;
--
-- AUTO_INCREMENT for table `degree`
--
ALTER TABLE `degree`
  MODIFY `degree_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `employer_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
  MODIFY `jobtype_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `language_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `major_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1409;
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
  MODIFY `student_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
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
  MODIFY `university_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
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
-- Constraints for table `student_major`
--
ALTER TABLE `student_major`
ADD CONSTRAINT `student_major_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
ADD CONSTRAINT `student_major_ibfk_2` FOREIGN KEY (`major_id`) REFERENCES `major` (`major_id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
