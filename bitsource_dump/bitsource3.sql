-- phpMyAdmin SQL Dump
-- version 4.3.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2016 at 05:43 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bitsource3`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(10) unsigned NOT NULL,
  `eId` int(10) unsigned NOT NULL,
  `adTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adCompany` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adCity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adStudies` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adDesc` longtext COLLATE utf8_unicode_ci NOT NULL,
  `adProvisions` longtext COLLATE utf8_unicode_ci NOT NULL,
  `adEmail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adWebsite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `eId`, `adTitle`, `adCompany`, `adType`, `adCity`, `adStudies`, `adDesc`, `adProvisions`, `adEmail`, `adWebsite`, `created_at`, `updated_at`) VALUES
(7, 6, 'Mobile Developer', 'Textkernel', 'pliris', 'Volos', 'aei', 'Πολυεθνική εταιρία, ηγέτης στον κλάδο της στην ελληνική αγορά, αναζητά για άμεση πρόσληψη Προγραμματιστή για το τμήμα μηχανογράφησης του εργοστασίου στην Θεσσαλονίκη.\r\n\r\nΟι βασικές  του αρμοδιότητες θα είναι να:\r\n\r\n    Ανάπτυξη εφαρμογών\r\n    Υποστήριξη σε συστήματα ERP\r\n', '\r\n    Πτυχίο Πληροφορικής (ΑΕΙ/ ΤΕΙ/ Κολλέγιο/ ΙΕΚ)\r\n    Γνώσεις προγραμματισμού σε σύγχρονη γλώσσα: Visual  Basic, C#, C++\r\n    Γνώσεις Βάσεων Δεδομένων (SQL)\r\n    Εκπληρωμένες στρατιωτικές υποχρεώσεις\r\n    Άριστη γνώση Αγγλικών\r\n    Βασικές γνώσεις ERP – υποστήριξη χρηστών\r\n    Βασικές γνώσεις Υπολογιστών\r\n', 'textkernel@gmail.com', 'www.textkernel.com', '2016-07-25 03:27:57', '2016-07-25 03:27:57'),
(8, 9, 'Web Developer', 'Netscape - IT Solutions', 'pliris', 'Athens', 'aei', 'H startup Netscape, μετά την πετυχημένη ολοκλήρωση του seed γύρου χρηματοδότησης, την συμμετοχή του NBG Business Seed στο μετοχικό της κεφάλαιο, και την ανάδειξη της ως νικήτρια του Ελληνικού βραβείου Επιχειρηματικότητας 2016, μεγαλώνει την ομάδα της και επιθυμεί να προσλάβει έναν Junior Web Developer, που να έχει όρεξη για δημιουργική δουλειά με διεθνής προοπτικές.', 'Εμπειρία 2 – 5 ετών σε παραγωγικό περιβάλλον.\r\nPHP, MySQL, HTML/CSS, Javascript, JSON, Ajax, JQuery.', 'netscape@yahoo.com', 'http://isp.netscape.com/', '2016-07-25 11:57:19', '2016-07-25 11:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `ad_skill`
--

CREATE TABLE IF NOT EXISTS `ad_skill` (
  `id` int(10) unsigned NOT NULL,
  `aId` int(10) unsigned NOT NULL,
  `sId` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ad_skill`
--

INSERT INTO `ad_skill` (`id`, `aId`, `sId`, `created_at`, `updated_at`) VALUES
(22, 8, 3, NULL, NULL),
(23, 8, 2, NULL, NULL),
(24, 8, 15, NULL, NULL),
(25, 8, 17, NULL, NULL),
(26, 8, 4, NULL, NULL),
(27, 7, 11, NULL, NULL),
(28, 7, 12, NULL, NULL),
(29, 7, 19, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL,
  `profileOwner` int(10) DEFAULT NULL,
  `reviewer` int(10) DEFAULT NULL,
  `rTitle` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rComment` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `userType` int(11) DEFAULT NULL,
  `userRating` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `profileOwner`, `reviewer`, `rTitle`, `rComment`, `userType`, `userRating`) VALUES
(49, 228, 222, 'Google Maps and Forms', 'Άψογη συνεργασία!', 2, 5),
(73, 222, 228, 'Κατασκευή E-shop (Drupal)', 'Πολύ καλή συνεργασία', 1, 4),
(75, 222, 230, 'Κατασκευή slack bot', 'Άριστη συνεργασία', 1, 5),
(79, 222, 234, 'Κατασκευή outsourcing πλατφόρμας.', 'Απόλυτα ευχαριστημένοι', 1, 5),
(80, 222, 232, 'Ενσωμάτωση machine learning σε mobile app.', 'Άριστη συνεργασία!', 1, 5),
(81, 228, 231, 'Κατασκευή eCommerce πλατφόρμας (Magento).', 'Πάρα πολύ καλή συνεργασία.', 2, 4.5),
(82, 228, 230, 'SEO για το neuvoo.gr', 'Πολύ καλή συνεργασία.', 2, 3.5),
(83, 230, 222, 'Κατασκευή e-Commerce πλατφόρμας (Joomla)', 'Άψογη συνεργασία!', 1, 3.5),
(84, 230, 231, 'Κατασκευή slack bot.', 'Πάρα πολύ καλός!', 1, 3.5),
(85, 230, 228, 'SEO για το oneman.gr', 'Άριστος', 1, 5),
(88, 230, 232, 'Ενσωμάτοση machine learning σε mobile app.', 'Πολύ καλός.', 2, 3.5),
(89, 230, 233, 'Εξόρυξη δεδομένων ', 'Άριστος', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `completes`
--

CREATE TABLE IF NOT EXISTS `completes` (
  `id` int(10) unsigned NOT NULL,
  `tdId` int(10) unsigned NOT NULL,
  `task` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `completes`
--

INSERT INTO `completes` (`id`, `tdId`, `task`, `created_at`, `updated_at`) VALUES
(88, 13, 'Κατασκευή front end bitsource.', '2016-08-02 04:15:16', '2016-08-02 04:15:16'),
(89, 14, 'Επικοινωνία με τον Πέτρου για το Drupal project.', '2016-10-05 16:37:19', '2016-10-05 16:37:19'),
(90, 15, 'Εξαγωγή tasks για το hirecorfu.gr', '2016-10-05 16:39:30', '2016-10-05 16:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(10) unsigned NOT NULL,
  `pId` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `pId`, `created_at`, `updated_at`) VALUES
(6, 228, '2016-06-03 06:37:20', '2016-06-03 06:37:20'),
(8, 222, NULL, NULL),
(9, 230, '2016-07-01 07:18:18', '2016-07-01 07:18:18'),
(10, 231, '2016-10-05 15:37:43', '2016-10-05 15:37:43'),
(11, 232, '2016-10-05 15:49:29', '2016-10-05 15:49:29'),
(12, 233, '2016-10-05 16:13:49', '2016-10-05 16:13:49'),
(13, 234, '2016-10-05 16:22:29', '2016-10-05 16:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `employee_freelancer`
--

CREATE TABLE IF NOT EXISTS `employee_freelancer` (
  `id` int(10) unsigned NOT NULL,
  `fId` int(10) unsigned DEFAULT NULL,
  `eId` int(10) unsigned DEFAULT NULL,
  `rTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rComment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `userType` int(11) DEFAULT NULL,
  `userRating` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `freelancers`
--

CREATE TABLE IF NOT EXISTS `freelancers` (
  `id` int(10) unsigned NOT NULL,
  `pId` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `freelancers`
--

INSERT INTO `freelancers` (`id`, `pId`, `created_at`, `updated_at`) VALUES
(4, 222, '2016-05-16 11:11:41', '2016-05-16 11:11:41'),
(6, 228, NULL, NULL),
(7, 230, '2016-07-01 07:18:18', '2016-07-01 07:18:18'),
(8, 231, '2016-10-05 15:37:43', '2016-10-05 15:37:43'),
(9, 232, '2016-10-05 15:49:29', '2016-10-05 15:49:29'),
(10, 233, '2016-10-05 16:13:49', '2016-10-05 16:13:49'),
(11, 234, '2016-10-05 16:22:29', '2016-10-05 16:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_task`
--

CREATE TABLE IF NOT EXISTS `freelancer_task` (
  `id` int(10) unsigned NOT NULL,
  `tId` int(10) unsigned DEFAULT NULL,
  `fId` int(10) unsigned DEFAULT NULL,
  `mbComment` longtext COLLATE utf8_unicode_ci,
  `mbBid` double DEFAULT NULL,
  `mbDate` date DEFAULT NULL,
  `mbTime` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `freelancer_task`
--

INSERT INTO `freelancer_task` (`id`, `tId`, `fId`, `mbComment`, `mbBid`, `mbDate`, `mbTime`, `created_at`, `updated_at`) VALUES
(12, 18, 7, 'Είμαι άριστος γνώστης της PHP, μπορώ να ολοκληρώσω την εργασίας σε πολύ σύντομο χρονικό διάστημα. ', 250, NULL, NULL, NULL, NULL),
(13, 18, 4, 'Το portfolio μου περιλαμβάνει πλήθος παρόμοιων εργασιών.', 270, NULL, NULL, NULL, NULL),
(15, 20, 4, 'Έχω ισχυρή εμπειρία στην κατασκευή bots. Μπορώ να ολοκληρώσω τη εργασία σε μια βδομάδα.', 150, NULL, NULL, NULL, NULL),
(16, 20, 8, 'Στο πορτφόλιο μου μπορείτε να ψάξετε για παρόμοια έργα.', 120, NULL, NULL, NULL, NULL),
(17, 20, 10, 'Μπορώ να ολοκληρώσω την εργασία με επιτυχία μέσα σε τρεις μέρες!!!', 220, NULL, NULL, NULL, NULL),
(18, 20, 9, 'Μπορώ να προσφέρω το καλύτερο δυνατό αποτέλεσμα. ', 90, NULL, NULL, NULL, NULL),
(19, 18, 8, 'Μπορώ να ολοκληρώσω την εργασία σε πολύ σύντομο χρονικό διάστημα. ', 120, NULL, NULL, NULL, NULL),
(20, 21, 4, 'Μπορώ να ολοκληρώσω την εργασία σε πολύ σύντομο χρονικό διάστημα.', 900, NULL, NULL, NULL, NULL),
(21, 21, 8, 'Το πορτφόλιο που περιλαμβάνει πλήθος παρόμοιων εργασιών.', 850, NULL, NULL, NULL, NULL),
(22, 21, 9, 'Μπορώ να ολοκληρώσω την εργασία στο χαμηλότερο κόστος.', 500, NULL, NULL, NULL, NULL),
(23, 22, 9, 'Μπορώ να ολοκληρώσω την εργασία σε πολύ σύντομο χρονικό διάστημα.', 120, NULL, NULL, NULL, NULL),
(24, 22, 8, 'Το πορτφόλιο μου περιλαμβάνει πλήθος σχετικών πρότζεκς.', 160, NULL, NULL, NULL, NULL),
(25, 22, 4, 'Μπορώ να ολοκληρώσω την εργασία σε τρείς μέρες.', 220, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1),
('2016_03_25_132839_create_users_table', 1),
('2016_04_07_155521_create_profiles_table', 2),
('2016_04_07_160516_create_profiles_table', 3),
('2016_04_07_160703_create_freelancers_table', 4),
('2016_04_07_161023_create_employees_table', 5),
('2016_04_07_161246_create_tasks_table', 6),
('2016_04_07_161626_create_freelancer_task_table', 7),
('2016_04_07_161836_create_employee_freelancer_table', 8),
('2016_04_13_090123_add_pAvatar_to_profiles_table', 9),
('2016_05_02_144820_create_portfolios_table', 10),
('2016_05_10_133510_create_skills_table', 11),
('2016_05_10_141809_create_profile_skill_table', 12),
('2016_07_15_140408_create_skill_task_table', 13),
('2016_07_22_144509_create_ads_table', 14),
('2016_07_24_074100_create_ad_skill_table', 15),
('2016_07_29_124003_create_to_do_list_table', 16),
('2016_07_29_134653_create_todolists_table', 17),
('2016_07_29_162133_create_todos_table', 18),
('2016_07_29_163933_create_completes_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE IF NOT EXISTS `portfolios` (
  `id` int(10) unsigned NOT NULL,
  `pId` int(10) unsigned NOT NULL,
  `pLink` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pDescription` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `pId`, `pLink`, `pDescription`, `created_at`, `updated_at`) VALUES
(130, 222, 'http://launch.stemcrates.com/', 'Web application χτισμένο με το Laravel PHP framework. Απευθύνετε σε μουσικούς παραγωγούς για την κατασκευή remixes μέσω stems.', '2016-10-05 13:45:41', '2016-10-05 13:45:41'),
(131, 222, 'http://www.factmag.com/', 'Web site με κυκλοφορίες καλλιτεχνών της νέας εναλλακτικής μουσικής σκηνής. ', '2016-10-05 13:45:41', '2016-10-05 13:45:41'),
(135, 228, 'http://www.b-open.gr/auto-cloud.html', 'Μια ολοκληρωμένη λύση για τη βιομηχανία αυτοκινήτων. Η δημοφιλής εφαρμογή που ενσωματώνει ERP, CRM και BPM λειτουργίες, συνδέεται με οποιοδήποτε τεχνικό εξοπλισμό ελέγχου και δημιουργεί άμεσους διαύλους επικοινωνίας με τους ιδιοκτήτες των οχημάτων μέσω έξ', '2016-10-05 15:21:39', '2016-10-05 15:21:39'),
(136, 228, 'https://www.comidor.com/', 'Comidor είναι μια σουίτα λογισμικού για επιχειρήσεις στο σύννεφο που συνεργάζεται άψογα με τομείς του Enterprise Communication, Enterprise Task Management, Document Management, Business Processes, Project Management, CRM and Business Performance και Busin', '2016-10-05 15:21:39', '2016-10-05 15:21:39'),
(137, 230, 'http://www.oneman.gr/', 'Lifestyle Greek magazino developed with Drupal 8.', '2016-10-05 15:27:45', '2016-10-05 15:27:45'),
(138, 230, 'http://www.corfucarrentals.com/', 'Value Plus, Corfu Car Rental is one of the few large independent car hire companies on the island of Corfu, with an impressive, unrivaled selection of new cars and many satisfied customers.', '2016-10-05 15:27:45', '2016-10-05 15:27:45'),
(139, 231, 'http://www.spindrift-racing.com/jules-verne/', 'E-shop for one of the best sunglasses designers in Greece. ', '2016-10-05 15:37:43', '2016-10-05 15:37:43'),
(140, 231, 'https://discovery.wisc.edu/', 'A web guide for visiting the city of Athens.', '2016-10-05 15:37:43', '2016-10-05 15:37:43'),
(143, 232, 'http://www.happn.gr', 'A dating app for people in Greece.', '2016-10-05 15:52:26', '2016-10-05 15:52:26'),
(144, 232, 'http://www.pandora.com/', 'One of the most popular websites like Spotify, Pandora focuses heavily on discovery of music.  It allows you to create custom radio stations based on songs or artists that you like, and it allows 100 as opposed to Spotify''s 20! Made with node.js.', '2016-10-05 15:52:26', '2016-10-05 15:52:26'),
(145, 233, 'http://www.lonelyplanet.com/', 'Visit Lonely Planet to read down-to-earth travel guides for worldwide destinations. Also offers maps, books, online forums, feature articles, and travel services.', '2016-10-05 16:13:49', '2016-10-05 16:13:49'),
(146, 233, 'http://www.fodors.com/', 'Explore Fodor''s for extensive guides to travel destinations, hotels, and restaurants around the world.', '2016-10-05 16:13:49', '2016-10-05 16:13:49'),
(147, 234, 'http://www.hotels.com/', 'Find rooms at hotels, motels, and resorts in the U.S. and worldwide with Hotels.com. Reserve condos or suites, browse vacation packages and special deals, or find out more about popular destinations.', '2016-10-05 16:22:29', '2016-10-05 16:22:29'),
(148, 234, 'http://www.mrandmrssmith.com/', 'Hotel directory offering accommodation information and hotel reservation services for luxury and boutique hotels across the world.', '2016-10-05 16:22:29', '2016-10-05 16:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(10) unsigned NOT NULL,
  `uId` int(10) unsigned NOT NULL,
  `pLocation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pCategory` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pDescription` longtext COLLATE utf8_unicode_ci,
  `pSalary` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pAvatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pTelephone` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=235 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `uId`, `pLocation`, `pCategory`, `pTitle`, `pDescription`, `pSalary`, `created_at`, `updated_at`, `pAvatar`, `pTelephone`) VALUES
(222, 17, 'Xanthi', 'freelancer', 'Web Developer | Specialized in Laravel Framework', 'O Καραογλάνης Πέτρος είναι ένας Web specialist, κάτοχος Master Deegre στα ευφυεί συστήματα διαδικτύου με άριστη εμπειρία σε διαδικτυακά έργα με το πέρασμα των χρόνων. Διαθέτει γνώση και εμπειρία πάνω σε γλώσσες και frameworks όπως PHP, Laravel, Javascript, AJAX, JQuery, Angular, XML, CSS, HTML και Bootstrap τα οποία και χρησιμοποιεί για την κατασκευή των εφαρμογών του.  Επιπλέον διαθέτει άριστες γνώσεις πάνω στο PhoneGap και Ionic UI Framework για την κατασκευή mobile εφαρμογών καθώς και REST API & SOAP για τα Web servises. \r\n', 25, '2016-05-16 11:11:41', '2016-05-16 11:11:41', '1475685657-12670617_684047495070339_5121374043017912503_n.jpg', '6955881398'),
(228, 24, 'Athens', 'employee', 'Team One - IT Solutions', 'H εταιρεία μας άρχισε τα πρώτα της βήματα στη hight Tech βιομηχανία στις αρχές του 2004. Το 2004 η πλατφόρμα μας jSpot δημιουργήθηκε, πέρασε τα αναγκαία τεστ και χρησιμοποιήθηκε ως κύριο εργαλείο στο τεχνικό τμήμα ελέγχου οχημάτων.  Πλέον η πλατφόρμα μας χρησιμοποιείτε σε πάνω από το 60% της αγοράς των VTC, μετατρέποντας την εταιρεία μας σε ηγέτη της βιομηχανίας ελέγχου οχημάτων. \r\n\r\n\r\n\r\n\r\n', 0, '2016-06-03 06:37:20', '2016-06-03 06:37:20', '1475691699-225.png', '2541025324'),
(230, 26, 'Larisa', 'both', 'Web Developer | Mobile Developer | Drupal Theme Designer', 'We specialise in high end and luxury responsive web design using Wordpress and graphic design for print, advertising and digital. If you need responsive website design, branding and a website that looks both beautiful and converts visitors, feel free to get in touch. We won''t bore you with technical jargon and will give you friendly free advice about the direction to take your website if you''re unsure about which visual direction to go in.', 7, '2016-07-01 07:18:18', '2016-07-01 07:18:18', '1475692065-aa.jpg', '69521345'),
(231, 27, 'Thessaloniki', 'freelancer', 'Web & Mobile UI/UX Designer | Bespoke Website, Layout & App Design', 'TOPCERT ranked visual mockup designer. UK based. Over 10 years worth of experience designing website and mobile visuals #UI #UX\r\n---\r\n\r\n"Absolutely unbelievable workmanship - Matt is brilliant. Really pleased and can''t wait to use again. Speed, efficiency and professionalism was second to none. Thank you" - Angus Elphinstone, CEO - http://www.anyvan.com ★★★★★', 12, '2016-10-05 15:37:43', '2016-10-05 15:37:43', '1475692663-aaa.png', '67892342'),
(232, 28, 'Kavala', 'both', 'Responsive Web Design / WordPress / Front End Developer / HTML5 / CSS3', 'I have been working in the internet industry as a full time freelance professional since September 1996, accumulating a wealth of knowledge and experience during these past 19 years.\r\n\r\nI specialise in best practice front end development; this covers web design including content management system integration, website accessibility and usability.\r\n\r\nThe advent of smart phones and tablets have changed the web landscape forever, your customers are no longer tied to a desktop or laptop; instead they will be using a myriad of devices to view your website, as such I am an advocate of responsive website design (RWD). RWD means that your website will be device agnostic, functioning perfectly no matter the device your customer is using to view it, e.g. iPhone, iPad, Android phone or Android tablet. ', 25, '2016-10-05 15:49:29', '2016-10-05 15:49:29', '1475693369-zzz.jpg', '678456345'),
(233, 29, 'Volos', 'both', 'Web Developer', 'I proudly hold the Top CERT badge placing me in the top 15 sellers of PPH.\r\n\r\nI''ve been very fortunate to have a challenging and wide-ranging career in web development. Been working in the internet industry as a full time freelance professional since April 2011, accumulating a wealth of knowledge and experience during these past 5 years.', 15, '2016-10-05 16:13:49', '2016-10-05 16:13:49', '1475694829-91b817014298b66c804f94b585794308_150x150.jpg', '678934562'),
(234, 30, 'Larisa', 'employee', 'Apply IT Solutions', 'The company B-open started its course in the high Tech industry in the beginning of 2004. In 2004 the jPlaton Platform was already developed, tested and the same year applied in the Vehicle Technical Control industry with the jKteoVTC. Product has been adopted by the 60% of the VTC Market making B-open a leader in the industry of Technical Controls.\r\n\r\nBopen innovates with jPlaton\r\njPlaton platform is a modern design environment for the development of Open Distributed Management Applications (Design, Development and Runtime Environment for Open Distributed Enterprise Applications).\r\n\r\nIt is the first worldwide known implementation of an integrated programming model of ''multi-level programming'' (Multi Layer Programming - MLP), which was first presented in the 2004 Infosystem exhibition and since then grows along with the theoretical background. The Multi Layer planning is an idea that has been already applied in image processing (Multilayer Image Processing). It allows an application to be developed on multiple layers which affect each other in a hierarchical model based on conditions.', 0, '2016-10-05 16:22:29', '2016-10-05 16:22:29', '1475695349-picture12377565156398.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `profile_skill`
--

CREATE TABLE IF NOT EXISTS `profile_skill` (
  `id` int(10) unsigned NOT NULL,
  `pId` int(10) unsigned NOT NULL,
  `sId` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile_skill`
--

INSERT INTO `profile_skill` (`id`, `pId`, `sId`, `created_at`, `updated_at`) VALUES
(58, 222, 1, NULL, NULL),
(59, 222, 2, NULL, NULL),
(60, 222, 3, NULL, NULL),
(61, 222, 16, NULL, NULL),
(62, 222, 4, NULL, NULL),
(63, 230, 1, NULL, NULL),
(64, 230, 2, NULL, NULL),
(65, 230, 3, NULL, NULL),
(66, 230, 6, NULL, NULL),
(67, 230, 16, NULL, NULL),
(68, 231, 1, NULL, NULL),
(69, 231, 2, NULL, NULL),
(70, 231, 3, NULL, NULL),
(71, 231, 17, NULL, NULL),
(72, 231, 16, NULL, NULL),
(78, 232, 9, NULL, NULL),
(79, 232, 13, NULL, NULL),
(80, 232, 19, NULL, NULL),
(81, 232, 4, NULL, NULL),
(82, 232, 17, NULL, NULL),
(83, 233, 6, NULL, NULL),
(84, 233, 9, NULL, NULL),
(85, 233, 19, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(10) unsigned NOT NULL,
  `sName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `sName`, `created_at`, `updated_at`) VALUES
(1, 'HTML', NULL, NULL),
(2, 'CSS', NULL, NULL),
(3, 'Javascript', NULL, NULL),
(4, 'PHP', NULL, NULL),
(5, 'C#', NULL, NULL),
(6, 'Python', NULL, NULL),
(7, 'Ruby', NULL, NULL),
(8, 'Go', NULL, NULL),
(9, 'Node.js', NULL, NULL),
(10, 'Ruby on Rails', NULL, NULL),
(11, 'Java', NULL, NULL),
(12, 'Android', NULL, NULL),
(13, 'MySQL', NULL, NULL),
(14, 'AngularJS', NULL, NULL),
(15, 'React', NULL, NULL),
(16, 'jQuery', NULL, NULL),
(17, 'Bootstrap', NULL, NULL),
(18, 'Foundation', NULL, NULL),
(19, 'MongoDB', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skill_task`
--

CREATE TABLE IF NOT EXISTS `skill_task` (
  `id` int(10) unsigned NOT NULL,
  `sId` int(10) unsigned DEFAULT NULL,
  `tId` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `skill_task`
--

INSERT INTO `skill_task` (`id`, `sId`, `tId`, `created_at`, `updated_at`) VALUES
(29, 1, 18, NULL, NULL),
(30, 2, 18, NULL, NULL),
(31, 4, 18, NULL, NULL),
(32, 1, 20, NULL, NULL),
(33, 2, 20, NULL, NULL),
(34, 9, 20, NULL, NULL),
(35, 6, 21, NULL, NULL),
(36, 19, 21, NULL, NULL),
(37, 10, 22, NULL, NULL),
(38, 15, 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(10) unsigned NOT NULL,
  `fId` int(10) unsigned DEFAULT NULL,
  `eId` int(10) unsigned DEFAULT NULL,
  `tTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tTotalBids` int(10) unsigned DEFAULT NULL,
  `tAverageBids` double unsigned DEFAULT NULL,
  `tCondition` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tBudget` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tDescription` longtext COLLATE utf8_unicode_ci,
  `tBestOffer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inStartDate` date DEFAULT NULL,
  `inEndDate` date DEFAULT NULL,
  `inStartTime` time DEFAULT NULL,
  `inEndTime` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tEnds` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `fId`, `eId`, `tTitle`, `tTotalBids`, `tAverageBids`, `tCondition`, `tBudget`, `tDescription`, `tBestOffer`, `inStartDate`, `inEndDate`, `inStartTime`, `inEndTime`, `created_at`, `updated_at`, `tEnds`) VALUES
(18, 4, 6, 'Google Maps and Forms', NULL, NULL, NULL, '250 - 500 €', 'Hello\r\n\r\nI need a few tasks done in my website:\r\n\r\n1) Using the existing form, develop 2 address fields: "from" and "to" and draw directions in a map using google maps api https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-directions (We are currently using the plugin VFBPRO to manage forms)\r\n\r\n2) The 2 address fields must have google autocomplete feature\r\n\r\n3) The two addresses and map (as a picture) must be included in the forms submission data.\r\n\r\nRegards,\r\nJosias Avila', '270€', NULL, NULL, NULL, NULL, '2016-07-20 06:07:28', '2016-07-20 06:07:28', '5/6/2017'),
(20, 8, 9, 'Bot Task Place Order', NULL, NULL, NULL, '50 - 250 €', 'So I decided to build a trading bot for alt-coin trading.\r\n\r\nI am looking for people with whom I can consult, they need to be ACTIVE alt-coin traders, such that trade on poloniex and elsewhere. \r\n\r\nBasically I am looking to get ideas for the best scheme for the bot. i.e: what would be easiest to implement and still be effective making money. \r\n\r\nNOTE: I am building the bot myself in Python, I basically need a trader''s help, rather than a coder''s help.', '120€', NULL, NULL, NULL, NULL, '2016-07-21 13:23:10', '2016-07-21 13:23:10', '4/5/2017'),
(21, 9, 9, ' Development of a bot for Telegrams messenger', NULL, NULL, NULL, '500 - 1000 €', 'Development of a bot for Telegrams messenger. \r\nWe would like to see service based on Telegram which will provide cryptocurrency communication between clients and necessary functionality. \r\nWhat we look for:\r\nSenior back-end developer\r\nwith experience in cryptocurrency.\r\nPreferably with understanding structure of messenger services and desire to grow skill in that subject. \r\n\r\nHere is an example of related project @BTC_CHANGE_BOT\r\n\r\n\r\nWe are looking for a candidate who can build a long-term business relations. \r\n\r\nRussian language requires', '500€', NULL, NULL, NULL, NULL, '2016-10-06 03:51:51', '2016-10-06 03:51:51', '1-2-2017'),
(22, 8, 13, 'Automatic BTC/ETH small & smart gambling website', NULL, NULL, NULL, '50 - 250 €', 'Dear Freelancers,\r\n\r\nI''m searching about BTC/ETH programer and webdesigner for this project.\r\n\r\nFew words and main features about the project :\r\n- Clean and soft HTML5/CSS3/PHP/SQL website design\r\n- BTC and ETH payments method with direct deposit / withdrawal (no registration needed)\r\n- 3 differents games inside to code : Roulette, Dice and coinflip games\r\n- Provably fair\r\n- Little chat box\r\n\r\nI have some examples about what i exactly would like.\r\nI will give some more details about the project later.\r\n\r\nBest regards,\r\nRickey', '160€', NULL, NULL, NULL, NULL, '2016-10-06 03:59:33', '2016-10-06 03:59:33', '2-4-2017');

-- --------------------------------------------------------

--
-- Table structure for table `todolists`
--

CREATE TABLE IF NOT EXISTS `todolists` (
  `id` int(10) unsigned NOT NULL,
  `uId` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `todolists`
--

INSERT INTO `todolists` (`id`, `uId`, `created_at`, `updated_at`) VALUES
(13, 17, '2016-07-29 14:02:07', '2016-07-29 14:02:07'),
(14, 24, NULL, NULL),
(15, 26, NULL, NULL),
(16, 27, '2016-10-05 15:37:43', '2016-10-05 15:37:43'),
(17, 28, '2016-10-05 15:49:29', '2016-10-05 15:49:29'),
(18, 29, '2016-10-05 16:13:49', '2016-10-05 16:13:49'),
(19, 30, '2016-10-05 16:22:29', '2016-10-05 16:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE IF NOT EXISTS `todos` (
  `id` int(10) unsigned NOT NULL,
  `tdId` int(10) unsigned NOT NULL,
  `task` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `tdId`, `task`, `created_at`, `updated_at`) VALUES
(184, 13, 'Responsive design bitsource.', '2016-08-02 04:15:16', '2016-08-02 04:15:16'),
(185, 13, 'Βάση δεδομένων bitsource.', '2016-08-02 04:15:16', '2016-08-02 04:15:16'),
(207, 14, 'Debugging στο hotels.gr ', '2016-10-05 16:37:19', '2016-10-05 16:37:19'),
(208, 14, 'Εξαγωγή tasks gia to Woofbnb', '2016-10-05 16:37:19', '2016-10-05 16:37:19'),
(209, 15, 'Debugging στο askmen.gr', '2016-10-05 16:39:30', '2016-10-05 16:39:30'),
(210, 15, 'Επικοινωνία με τον Παπαδόπουλο για την πληρωμή. ', '2016-10-05 16:39:30', '2016-10-05 16:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `uFname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uLname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `uFname`, `uLname`, `remember_token`, `created_at`, `updated_at`) VALUES
(17, 'pekaras86@gmail.com', '$2y$10$egEofhWgr0WC3L/DydO/3OtcxzfovSOoASD8xsJRrrg7hJAMWhGJ6', 'Petros', 'Karaoglanis', 'g4ggaT2B4XNp1rkY6eMeTgtvd0d11KxtSVVWyoIClOnjvDqVfjlNidqIjIhs', '2016-04-08 09:41:36', '2016-10-08 05:52:52'),
(24, 'giannoulis@hotmail.com', '$2y$10$ZYiCmL8dW/df5V7T7b9FRuwlH//g6VJSefmUvqK3DgKafdIQX950y', 'Giannis', 'Giannoulis', 'S4KrTyM2P17cqlHHcXt4v9QSqQLnwIIk4YhCJNabKcYPijiuf7NpFyaBjjeU', '2016-06-03 06:20:39', '2016-10-06 03:52:34'),
(26, 'antoniou@gmail.com', '$2y$10$x95qZRFZvu4Mzk/xkQUHWuTsaGm8DW5yokaPiesz7eX/Y.n0TRRxW', 'Antonis', 'Antoniou', 'LDFRkvP1YANCI49FI3iOYM5iBtDgflZFj4ZG9VkQypCbNZry18wCrwpfDUne', '2016-07-01 07:15:40', '2016-10-08 05:54:06'),
(27, 'kwstoglou@gmail.com', '$2y$10$aQ.sWTnugGZg79tsc6Ah7uz58.vWjKJsoFJXXq9G7jckZzJnM9FGO', 'Kwstas', 'Kwstoglou', 'YRDsuoYzRCNnbxkOahmI33MIS6vTqaRocwJwrSZmKjh3JxY4ZWVRL4fDMHsK', '2016-10-05 15:31:25', '2016-10-06 04:02:36'),
(28, 'amiridis@hotmail.com', '$2y$10$KATsZW7e10V9QFGQK.CNn.uQcSYFdWBnJ7fNf2T42wIvM6wBvk9N.', 'Filipos', 'Amiridis', 'WFRWRunkJP5oj9C9CEu88KhyIEDe2Uv4b8lMBj1ySREgzHZD1FbNmfCamQpY', '2016-10-05 15:45:27', '2016-10-06 04:01:08'),
(29, 'ligeros@yahoo.com', '$2y$10$KI1DCjqcZHqz70gYXZtA/OG.WY11tfMpfU8suFJ28xfbUsu9u1HAW', 'Aggelos', 'Ligeros', 'gdZ1Ffyh5XVViJaNiFKDOqyZ7SFMJ6SxqipdSDv5MVp1N80DgIHLi9kOFtqR', '2016-10-05 16:10:29', '2016-10-06 03:36:37'),
(30, 'filpap@gmail.com', '$2y$10$JuMaVdEhszbyBmeoL.tU4.umMoS3DdqqOCrvfpv1I6v7QjeL6ID5a', 'Filipos', 'Papadopoulos', 'RacvRL9BzOrU5k5bWJMoX4VOxdHUQ19CpXgJe95IQMNIyEGObq2wzdAZVRg3', '2016-10-05 16:17:10', '2016-10-06 04:04:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`), ADD KEY `ads_eid_foreign` (`eId`);

--
-- Indexes for table `ad_skill`
--
ALTER TABLE `ad_skill`
  ADD PRIMARY KEY (`id`), ADD KEY `ad_skill_aid_foreign` (`aId`), ADD KEY `ad_skill_sid_foreign` (`sId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `completes`
--
ALTER TABLE `completes`
  ADD PRIMARY KEY (`id`), ADD KEY `completes_tdid_foreign` (`tdId`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`), ADD KEY `employees_pid_foreign` (`pId`);

--
-- Indexes for table `employee_freelancer`
--
ALTER TABLE `employee_freelancer`
  ADD PRIMARY KEY (`id`), ADD KEY `employee_freelancer_fid_foreign` (`fId`), ADD KEY `employee_freelancer_eid_foreign` (`eId`);

--
-- Indexes for table `freelancers`
--
ALTER TABLE `freelancers`
  ADD PRIMARY KEY (`id`), ADD KEY `freelancers_pid_foreign` (`pId`);

--
-- Indexes for table `freelancer_task`
--
ALTER TABLE `freelancer_task`
  ADD PRIMARY KEY (`id`), ADD KEY `freelancer_task_tid_foreign` (`tId`), ADD KEY `freelancer_task_fid_foreign` (`fId`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`), ADD KEY `portfolios_pid_foreign` (`pId`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`), ADD KEY `profiles_uid_foreign` (`uId`);

--
-- Indexes for table `profile_skill`
--
ALTER TABLE `profile_skill`
  ADD PRIMARY KEY (`id`), ADD KEY `profile_skill_pid_foreign` (`pId`), ADD KEY `profile_skill_sid_foreign` (`sId`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_task`
--
ALTER TABLE `skill_task`
  ADD PRIMARY KEY (`id`), ADD KEY `skill_task_sid_foreign` (`sId`), ADD KEY `skill_task_tid_foreign` (`tId`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`), ADD KEY `tasks_fid_foreign` (`fId`), ADD KEY `tasks_eid_foreign` (`eId`);

--
-- Indexes for table `todolists`
--
ALTER TABLE `todolists`
  ADD PRIMARY KEY (`id`), ADD KEY `todolists_uid_foreign` (`uId`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`), ADD KEY `todos_tdid_foreign` (`tdId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ad_skill`
--
ALTER TABLE `ad_skill`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `completes`
--
ALTER TABLE `completes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `employee_freelancer`
--
ALTER TABLE `employee_freelancer`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `freelancers`
--
ALTER TABLE `freelancers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `freelancer_task`
--
ALTER TABLE `freelancer_task`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=149;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=235;
--
-- AUTO_INCREMENT for table `profile_skill`
--
ALTER TABLE `profile_skill`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `skill_task`
--
ALTER TABLE `skill_task`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `todolists`
--
ALTER TABLE `todolists`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=211;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ads`
--
ALTER TABLE `ads`
ADD CONSTRAINT `ads_eid_foreign` FOREIGN KEY (`eId`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ad_skill`
--
ALTER TABLE `ad_skill`
ADD CONSTRAINT `ad_skill_aid_foreign` FOREIGN KEY (`aId`) REFERENCES `ads` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `ad_skill_sid_foreign` FOREIGN KEY (`sId`) REFERENCES `skills` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `completes`
--
ALTER TABLE `completes`
ADD CONSTRAINT `completes_tdid_foreign` FOREIGN KEY (`tdId`) REFERENCES `todolists` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
ADD CONSTRAINT `employees_pid_foreign` FOREIGN KEY (`pId`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_freelancer`
--
ALTER TABLE `employee_freelancer`
ADD CONSTRAINT `employee_freelancer_eid_foreign` FOREIGN KEY (`eId`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `employee_freelancer_fid_foreign` FOREIGN KEY (`fId`) REFERENCES `freelancers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `freelancers`
--
ALTER TABLE `freelancers`
ADD CONSTRAINT `freelancers_pid_foreign` FOREIGN KEY (`pId`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `freelancer_task`
--
ALTER TABLE `freelancer_task`
ADD CONSTRAINT `freelancer_task_fid_foreign` FOREIGN KEY (`fId`) REFERENCES `freelancers` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `freelancer_task_tid_foreign` FOREIGN KEY (`tId`) REFERENCES `tasks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `portfolios`
--
ALTER TABLE `portfolios`
ADD CONSTRAINT `portfolios_pid_foreign` FOREIGN KEY (`pId`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
ADD CONSTRAINT `profiles_uid_foreign` FOREIGN KEY (`uId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profile_skill`
--
ALTER TABLE `profile_skill`
ADD CONSTRAINT `profile_skill_pid_foreign` FOREIGN KEY (`pId`) REFERENCES `profiles` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `profile_skill_sid_foreign` FOREIGN KEY (`sId`) REFERENCES `skills` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `skill_task`
--
ALTER TABLE `skill_task`
ADD CONSTRAINT `skill_task_sid_foreign` FOREIGN KEY (`sId`) REFERENCES `skills` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `skill_task_tid_foreign` FOREIGN KEY (`tId`) REFERENCES `tasks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
ADD CONSTRAINT `tasks_eid_foreign` FOREIGN KEY (`eId`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tasks_fid_foreign` FOREIGN KEY (`fId`) REFERENCES `freelancers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `todolists`
--
ALTER TABLE `todolists`
ADD CONSTRAINT `todolists_uid_foreign` FOREIGN KEY (`uId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `todos`
--
ALTER TABLE `todos`
ADD CONSTRAINT `todos_tdid_foreign` FOREIGN KEY (`tdId`) REFERENCES `todolists` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
