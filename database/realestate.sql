-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 21, 2023 at 10:23 PM
-- Server version: 8.0.33-0ubuntu0.20.04.2
-- PHP Version: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint UNSIGNED NOT NULL,
  `amenities_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `amenities_name`, `created_at`, `updated_at`) VALUES
(8, 'Aire Acondicionado', NULL, NULL),
(9, 'Alberca', NULL, NULL),
(10, 'Cancha de Tenis', NULL, NULL),
(11, 'Cancha de Basket Ball', NULL, NULL),
(12, 'Servicios de Limpieza', NULL, NULL),
(13, 'Regadera Externa', NULL, NULL),
(14, 'Refrigerador', NULL, NULL),
(15, 'Lavaplatos automatico', NULL, NULL),
(16, 'Micro Ondas', NULL, NULL),
(17, 'Gimnasio', NULL, NULL),
(18, 'Pisos de madera', NULL, NULL),
(19, 'Amigable con Mascotas', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `compares`
--

CREATE TABLE `compares` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `compares`
--

INSERT INTO `compares` (`id`, `user_id`, `property_id`, `created_at`, `updated_at`) VALUES
(4, 3, 8, '2023-06-21 18:19:21', NULL),
(5, 3, 9, '2023-06-21 18:19:22', NULL),
(6, 3, 10, '2023-06-21 18:19:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint UNSIGNED NOT NULL,
  `property_id` int NOT NULL,
  `facility_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `property_id`, `facility_name`, `distance`, `created_at`, `updated_at`) VALUES
(42, 10, 'Aeropuerto', '5', '2023-06-12 05:59:25', '2023-06-12 05:59:25'),
(43, 10, 'Parada de autobus', '5', '2023-06-12 05:59:25', '2023-06-12 05:59:25'),
(44, 10, 'Playa', '5', '2023-06-12 05:59:25', '2023-06-12 05:59:25'),
(47, 12, 'Farmacia', '1', '2023-06-12 19:17:59', '2023-06-12 19:17:59'),
(48, 12, 'Playa', '1', '2023-06-12 19:17:59', '2023-06-12 19:17:59'),
(49, 13, 'Cine', '1', '2023-06-13 01:22:03', '2023-06-13 01:22:03'),
(50, 13, 'Playa', '2', '2023-06-13 01:22:03', '2023-06-13 01:22:03'),
(51, 14, 'Playa', '2', '2023-06-13 01:23:42', '2023-06-13 01:23:42'),
(52, 14, 'Escuela', '3', '2023-06-13 01:23:42', '2023-06-13 01:23:42'),
(53, 15, 'Estación de Tren', '1', '2023-06-13 01:24:29', '2023-06-13 01:24:29'),
(54, 16, 'Cine', '1', '2023-06-13 20:07:11', '2023-06-13 20:07:11'),
(55, 16, 'Banco', '2', '2023-06-13 20:07:11', '2023-06-13 20:07:11'),
(56, 17, 'Aeropuerto', '4', '2023-06-13 20:11:53', '2023-06-13 20:11:53'),
(57, 17, 'Parada de autobus', '1', '2023-06-13 20:11:53', '2023-06-13 20:11:53'),
(61, 9, 'Playa', '1', '2023-06-15 22:36:15', '2023-06-15 22:36:15'),
(62, 9, 'Centro Comercial', '0', '2023-06-15 22:36:15', '2023-06-15 22:36:15'),
(63, 9, 'Entretenimiento', '0.2', '2023-06-15 22:36:15', '2023-06-15 22:36:15'),
(64, 9, 'Banco', '0.3', '2023-06-15 22:36:15', '2023-06-15 22:36:15'),
(73, 8, 'Hospital', '1', '2023-06-16 01:41:14', '2023-06-16 01:41:14'),
(74, 8, 'Playa', '0.5', '2023-06-16 01:41:14', '2023-06-16 01:41:14'),
(75, 8, 'Cine', '0.2', '2023-06-16 01:41:14', '2023-06-16 01:41:14'),
(76, 8, 'Banco', '1', '2023-06-16 01:41:14', '2023-06-16 01:41:14'),
(77, 8, 'Farmacia', '1', '2023-06-16 01:41:14', '2023-06-16 01:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_31_212917_create_property_types_table', 2),
(6, '2023_06_01_151806_create_amenities_table', 3),
(7, '2023_06_02_011542_create_properties_table', 4),
(8, '2023_06_02_013822_create_multi_images_table', 4),
(9, '2023_06_02_014659_create_facilities_table', 4),
(10, '2023_06_12_104957_create_package_plans_table', 5),
(11, '2023_06_17_120222_create_wishlists_table', 6),
(12, '2023_06_20_192002_create_compares_table', 7),
(13, '2023_06_21_123938_create_property_messages_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `multi_images`
--

CREATE TABLE `multi_images` (
  `id` bigint UNSIGNED NOT NULL,
  `property_id` int NOT NULL,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_images`
--

INSERT INTO `multi_images` (`id`, `property_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(29, 10, 'upload/property/multi-image/1768459775859115.jpg', '2023-06-12 01:51:08', NULL),
(30, 10, 'upload/property/multi-image/1768459776053180.jpg', '2023-06-12 01:51:08', NULL),
(31, 10, 'upload/property/multi-image/1768474851954993.jpg', '2023-06-12 05:50:45', NULL),
(35, 12, 'upload/property/multi-image/1768525638387293.jpg', '2023-06-12 19:17:59', NULL),
(36, 12, 'upload/property/multi-image/1768525638512420.jpg', '2023-06-12 19:17:59', NULL),
(37, 12, 'upload/property/multi-image/1768525638637745.jpg', '2023-06-12 19:17:59', NULL),
(38, 13, 'upload/property/multi-image/1768548543093908.jpg', '2023-06-13 01:22:03', NULL),
(39, 13, 'upload/property/multi-image/1768548543296200.jpg', '2023-06-13 01:22:03', NULL),
(40, 13, 'upload/property/multi-image/1768548543431128.jpg', '2023-06-13 01:22:03', NULL),
(41, 14, 'upload/property/multi-image/1768548646966844.jpg', '2023-06-13 01:23:42', NULL),
(42, 14, 'upload/property/multi-image/1768548647160048.jpg', '2023-06-13 01:23:42', NULL),
(43, 15, 'upload/property/multi-image/1768548696672114.jpg', '2023-06-13 01:24:29', NULL),
(44, 15, 'upload/property/multi-image/1768548696808426.jpg', '2023-06-13 01:24:29', NULL),
(45, 15, 'upload/property/multi-image/1768548696926268.jpg', '2023-06-13 01:24:29', NULL),
(46, 16, 'upload/property/multi-image/1768619330399452.jpg', '2023-06-13 20:07:11', NULL),
(47, 16, 'upload/property/multi-image/1768619330592026.jpg', '2023-06-13 20:07:11', NULL),
(48, 17, 'upload/property/multi-image/1768619625924176.jpg', '2023-06-13 20:11:52', NULL),
(49, 17, 'upload/property/multi-image/1768619626055292.jpg', '2023-06-13 20:11:53', NULL),
(50, 8, 'upload/property/multi-image/1768785767897283.jpeg', '2023-06-15 16:12:38', NULL),
(51, 8, 'upload/property/multi-image/1768785800177525.jpeg', '2023-06-15 16:13:08', NULL),
(52, 8, 'upload/property/multi-image/1768785815492143.jpeg', '2023-06-15 16:13:23', NULL),
(53, 8, 'upload/property/multi-image/1768785827964323.jpeg', '2023-06-15 16:13:35', NULL),
(54, 9, 'upload/property/multi-image/1768809836605575.png', '2023-06-15 22:35:12', NULL),
(55, 9, 'upload/property/multi-image/1768809846715561.png', '2023-06-15 22:35:21', NULL),
(56, 9, 'upload/property/multi-image/1768809857706924.png', '2023-06-15 22:35:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `package_plans`
--

CREATE TABLE `package_plans` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_credits` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_plans`
--

INSERT INTO `package_plans` (`id`, `user_id`, `package_name`, `package_credits`, `invoice`, `package_amount`, `created_at`, `updated_at`) VALUES
(1, 2, 'Business', '3', 'ERS44502884', '20', '2023-06-13 01:16:19', NULL),
(2, 2, 'Professional', '10', 'ERS11300504', '50', '2023-06-13 05:01:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint UNSIGNED NOT NULL,
  `ptype_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amenities_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lowest_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_thambnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_descp` text COLLATE utf8mb4_unicode_ci,
  `long_descp` text COLLATE utf8mb4_unicode_ci,
  `bedrooms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bathrooms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `garage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `garage_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `neighborhood` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_map` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_id` int DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `ptype_id`, `amenities_id`, `property_name`, `property_slug`, `property_code`, `property_status`, `lowest_price`, `max_price`, `property_thambnail`, `short_descp`, `long_descp`, `bedrooms`, `bathrooms`, `garage`, `garage_size`, `property_size`, `property_video`, `address`, `city`, `state`, `postal_code`, `neighborhood`, `latitude`, `longitude`, `google_map`, `featured`, `hot`, `agent_id`, `status`, `created_at`, `updated_at`) VALUES
(8, '9', 'Aire Acondicionado,Alberca,Cancha de Tenis,Cancha de Basket Ball,Servicios de Limpieza', 'Iglesia Estrella Del Mar', 'iglesia-estrella-del-mar', 'PC003', 'rent', '67,320.00', '86,458.00', 'upload/property/thambnail/1768786117323198.jpeg', 'Les invitamos a vivir nuestra semana santa. El domingo de ramos las bendiciones de palmas se llevarán a cabo en cada misa. 08:00 y 10:00 AM. 12:00, 01:30,05:00,07:00&08:15 pm', '<p>Hermosa peque&ntilde;a iglesia cat&oacute;lica en el coraz&oacute;n de playas de Tijuana.&nbsp;<br>Muy limpio y bien mantenido.&nbsp;<br>El patio tiene fuentes y peque&ntilde;os vendedores que venden art&iacute;culos religiosos.&nbsp;<br>Esta es la iglesia a la que me encanta ir cuando estoy en Tijuana.</p>\r\n<p>Datos de inter&eacute;s sobre esta Parroquia</p>\r\n<p>Tipo de iglesia: &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Parroquia<br>Nombre completo: &nbsp; &nbsp;Santa Mar&iacute;a Estrella del Mar<br>Di&oacute;cesis: &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Arquidi&oacute;cesis de Tijuana<br>Calle y n&uacute;mero: &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Paseo Ensenada 950,<br>C&oacute;digo postal: &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 22206<br>Colonia: &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Playas de Tijuana, Secc. Jardines del Sol<br>Municipio: &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tijuana<br>Estado: &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Baja California<br>Pa&iacute;s: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; M&eacute;xico<br>Tel&eacute;fono: &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; +526646802827</p>', '3', '2', '1', '100', '546', 'https://www.youtube.com/embed/wo4skpTQKAc', 'Paseo Ensenada 950, Sección Jardínes Playas de Tijuana', 'Tijuana', 'BC', '22500', 'La Mesa', '32.527142', '-117.115599', 'https://goo.gl/maps/eK8L7DbqUzmnqcbw9', '1', '1', NULL, '1', '2023-06-06 16:44:36', '2023-06-17 17:32:44'),
(9, '9', 'Aire Acondicionado,Alberca,Cancha de Tenis,Cancha de Basket Ball,Servicios de Limpieza,Regadera Externa,Refrigerador,Micro Ondas', 'Centro Comercial Playas', 'centro-comercial-playas', 'PC004', 'rent', '168,568.00', '356,678.00', 'upload/property/thambnail/1768809803696277.png', 'Descripción Corta para Centro Comercial Playas de Tijuana', '<p><span style=\"color: rgb(0, 0, 0);\">Descripci&oacute;n Larga para Centro Comercial Playas de Tijuana</span></p>', '2', '1', '5', '100', '314', 'https://www.youtube.com/embed/TuZ4fA0fZ6M', 'Estrella del Mar #605, Playas, SECCION CORONADO', 'Tijuana', 'BC', '456789', 'Playas', '32.532438', '-117.113893', NULL, '1', '1', 2, '1', '2023-06-12 01:44:34', '2023-06-17 17:41:12'),
(10, '1', 'Aire Acondicionado,Alberca,Cancha de Tenis,Cancha de Basket Ball', 'Aaron Doyle', 'aaron-doyle', 'PC005', 'buy', '56,722.00', '63,322.00', 'upload/property/thambnail/1768464265471462.jpg', 'Descripción corta para la propiedad Aaron Doyle', '<p><span style=\"color: rgb(0, 0, 0);\">Descripci&oacute;n larga para la propiedad Aaron Doyle.</span></p>\r\n<p><span style=\"color: rgb(0, 0, 0);\"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '3', '2', '0', '0', '540', 'Perferendis est qui', 'Cillum velit illum', 'Accusamus labore ut', 'Sint officia rem re', '22116', 'Eaque molestiae prov', '32', '-32', NULL, '1', NULL, 15, '1', '2023-06-12 01:51:07', '2023-06-16 15:21:19'),
(12, '3', 'Cancha de Tenis,Servicios de Limpieza,Refrigerador,Micro Ondas', 'Willow Travis', 'willow-travis', 'PC006', 'buy', '601', '932', 'upload/property/thambnail/1768525638288221.jpg', 'Nihil distinctio Qu', '<p>Possimus, eaque et v.</p>', '4', '2', '0', '0', '245', 'Est exercitationem', 'Mollit et itaque ess', 'Nam numquam quis dig', 'Veritatis est quaer', 'Enim laborum Facili', 'Id aute voluptatibu', 'Similique nisi sunt', 'Ea mollitia consecte', NULL, NULL, '1', 2, '1', '2023-06-12 19:17:59', '2023-06-14 16:46:55'),
(13, '1', 'Cancha de Tenis,Cancha de Basket Ball,Regadera Externa,Refrigerador,Lavaplatos automatico,Micro Ondas,Gimnasio,Amigable con Mascotas', 'Oscar Boone', 'oscar-boone', 'PC007', 'buy', '3', '567', 'upload/property/thambnail/1768548542989246.jpg', 'Aperiam nulla sint v', '<p>Incidunt, est, assum.</p>', 'Nostrum non amet fu', 'Laudantium et repre', 'Sit aspernatur impe', 'Sit recusandae Cul', 'Accusamus cum id si', 'Provident dignissim', 'Nam obcaecati duis o', 'Explicabo Quos mini', 'Numquam porro enim e', 'Vitae in porro culpa', 'Dolore ut at libero', 'Ducimus fugiat del', 'Quo odio cumque illo', NULL, NULL, '1', 2, '1', '2023-06-13 01:22:02', NULL),
(14, '9', 'Servicios de Limpieza,Lavaplatos automatico', 'Martena Landry', 'martena-landry', 'PC008', 'rent', '345', '208', 'upload/property/thambnail/1768548646880027.jpg', 'Qui laborum tenetur', '<p>Voluptate mollitia a.</p>', '4', '1', '0', '0', '216', 'Ullamco veniam dolo', 'Velit tenetur dicta', 'Nihil maiores vel qu', 'Reprehenderit ut ea', '34234', 'Libero est sit veni', '32', '-32', NULL, '1', '1', 2, '1', '2023-06-13 01:23:41', '2023-06-17 17:34:08'),
(15, '4', 'Alberca,Refrigerador,Lavaplatos automatico,Gimnasio,Amigable con Mascotas', 'Amethyst Simpson', 'amethyst-simpson', 'PC009', 'buy', '295', '333', 'upload/property/thambnail/1768548696582325.jpg', 'Animi quia obcaecat', '<p>Quis aut id animi, o.</p>', 'Fugiat expedita cons', 'Officia dicta eos qu', 'Dolor molestias dolo', 'Officiis et dolore d', 'Cumque excepturi qui', 'In inventore accusan', 'Tempore sed quos ni', 'Qui beatae rerum aut', 'Provident sit nisi', 'Voluptatum adipisci', 'Qui dolores voluptat', 'Id reprehenderit d', 'Iste fugit quo ut v', NULL, NULL, NULL, 2, '1', '2023-06-13 01:24:29', NULL),
(16, '5', 'Alberca,Cancha de Tenis,Lavaplatos automatico,Micro Ondas,Gimnasio,Pisos de madera', 'Jeanette Peterson', 'jeanette-peterson', 'PC010', 'buy', '212', '338', 'upload/property/thambnail/1768619330302017.jpg', 'Incididunt molestiae', '<p>Tempora impedit, cor.</p>', '4', '2', '0', '0', '123', 'Consectetur quae in', 'Cupidatat et ipsam p', 'Rerum dolorum exerci', 'Quam distinctio Cil', 'Placeat dolores dic', 'Commodi consequatur', 'Irure dolorem natus', 'Ut aspernatur ut rat', NULL, '1', NULL, 14, '1', '2023-06-13 20:07:10', '2023-06-14 16:47:45'),
(17, '6', 'Alberca,Refrigerador,Micro Ondas,Amigable con Mascotas', 'Vladimir England', 'vladimir-england', 'PC011', 'rent', '980', '29', 'upload/property/thambnail/1768619625810629.jpg', 'Minima deserunt sit', '<p>Fugiat, laudantium, .</p>', '3', '1', '0', '0', 'Id doloremque omnis', 'Id ut enim qui aliqu', 'Qui beatae cupiditat', 'Minima saepe cumque', 'Quaerat dignissimos', 'Quos eligendi magnam', 'Quis et dolor qui au', 'Obcaecati aliquid te', 'Ut sapiente corrupti', NULL, NULL, '1', 15, '1', '2023-06-13 20:11:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_messages`
--

CREATE TABLE `property_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `agent_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_id` int DEFAULT NULL,
  `msg_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msg_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msg_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` bigint UNSIGNED NOT NULL,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `type_name`, `type_icon`, `created_at`, `updated_at`) VALUES
(1, 'Residencial', 'icon-1', NULL, '2023-06-14 02:33:08'),
(2, 'Oficina', 'icon-9', NULL, '2023-06-14 02:36:46'),
(3, 'Piso', 'icon-7', NULL, '2023-06-14 02:37:00'),
(4, 'Duplex', 'icon-5', NULL, NULL),
(5, 'Edificio', 'icon-3', NULL, '2023-06-14 02:40:20'),
(6, 'Bodega', 'icon-9', NULL, '2023-06-14 02:40:31'),
(8, 'Industrial', 'icon-4', NULL, '2023-06-14 02:44:36'),
(9, 'Comercial', 'icon-2', NULL, NULL),
(10, 'Departamento', 'icon-3', NULL, NULL),
(11, 'Terreno', 'icon-6', NULL, NULL),
(12, 'Fabrica', 'icon-10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `role` enum('admin','agent','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `credit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `address`, `role`, `status`, `credit`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$HG825j4MMhZhqwrOJa0imuJaMgwgyu2ck6pnUAEoKMwMYX02EN7cO', '202305291449avatar-1.png', '6641880604', 'Mexico', 'admin', 'active', '0', NULL, NULL, '2023-05-30 07:20:50'),
(2, 'Agent', 'agent', 'agent@gmail.com', NULL, '$2y$10$als.INHWLL4FxHl9wNHCauNeL9wRfesZUmK4AeQ3nqP7KyugmqJbi', '202306211224cl5.png', '(477) 770-2828', 'MORELOS NO. 431 S/N, JARDINES DEL MORAL, 37160', 'agent', 'active', '17', NULL, NULL, '2023-06-21 19:24:59'),
(3, 'User', 'usermx', 'user@gmail.com', NULL, '$2y$10$Kj1VqBUPHcgN3JWiEFdS6e8W.R6B.sfGJ2rXBWpUYDK6xzsSm5z1C', '202305311454avatar-1.png', '6641880604', 'Tijuana BC', 'user', 'active', '0', NULL, NULL, '2023-05-31 22:33:54'),
(4, 'Prof. Bonita Ritchie PhD', NULL, 'iharris@example.org', '2023-05-24 05:50:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00dd77?text=et', '1-530-677-7314', '95869 Cummings Walks\nStoltenbergbury, MD 33164', 'admin', 'active', '0', 'vMlHm6ZsS5', '2023-05-24 05:50:40', '2023-05-24 05:50:40'),
(6, 'Wanda Wunsch', NULL, 'jake.mcclure@example.net', '2023-05-24 05:50:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/0033cc?text=molestiae', '+14632557045', '99909 Adelbert Trafficway\nBruenside, ID 59557-9849', 'user', 'inactive', '0', 'DYwpUYh20O', '2023-05-24 05:50:40', '2023-05-24 05:50:40'),
(8, 'Demond Metz III', NULL, 'oconner.oma@example.org', '2023-05-24 05:50:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00ddcc?text=voluptatem', '1-541-369-1054', '36637 Zulauf Fort Suite 009\nReeceborough, RI 07631', 'user', 'active', '0', 'osh592VCSK', '2023-05-24 05:50:40', '2023-05-24 05:50:40'),
(9, 'Test', NULL, 'test@gmail.com', NULL, '$2y$10$YIiYQ11HnSXvsAR4SEs0neXI1Z23lrGOZUhvN7hu84907Q6VxzSBm', NULL, NULL, NULL, 'user', 'active', '0', NULL, '2023-05-24 05:55:23', '2023-05-24 05:55:23'),
(10, 'Khan', NULL, 'Khan@gmail.com', NULL, '$2y$10$PU6YLZDSVXn8YmrT7s5Hq.6W76k.r9tuHsnXCT8RByPcVK/GFJjJC', NULL, NULL, NULL, 'user', 'active', '0', NULL, '2023-05-31 02:26:36', '2023-05-31 02:26:36'),
(11, 'Sousa', 'jesousamx', 'sousa@gmail.com', NULL, '$2y$10$4YXmsawzGiusK4sxi.hfJ.nufacbZOQuVFTWSgesgR55GBrNuS3DK', '202305310501avatar-3.png', '6641880655', 'Mexico', 'user', 'active', '0', NULL, '2023-05-31 02:27:34', '2023-06-01 02:04:54'),
(12, 'Jose', NULL, 'jose@gmail.com', NULL, '$2y$10$LLu.Ym60/TeWmxpmovA43..L1EpiyBGX/XVFQC8.bCERVzvd15vSG', NULL, NULL, NULL, 'user', 'active', '0', NULL, '2023-06-08 17:21:48', '2023-06-08 17:21:48'),
(13, 'Easy', NULL, 'easy@gmail.com', NULL, '$2y$10$zBuMDjHBXxdZl4kDtJlDAOcA5iT1yD.xQSYB6v8zqjDuacTIMTS8m', '202306211226cl4.png', '6641112222', 'India', 'agent', 'inactive', '0', NULL, '2023-06-08 17:52:16', '2023-06-21 19:26:32'),
(14, 'Zonicom', 'zonicom', 'diwod@mailinator.com', NULL, '$2y$10$0cf28LkA60aweJ/GzaFcPefymznOeWFCgtQpxM39FlODd1xb0vG02', '202306211229cl2.png', '+1(664) 569-5689', 'PARQUE NOROESTE NO. 718, EJIDAL, 81259', 'agent', 'active', '1', NULL, NULL, '2023-06-21 19:29:50'),
(15, 'Restrictel', 'restrictel', 'restrictel@gmail.com', NULL, '$2y$10$q8E/a7eJv/YXF19efG2UM.m3gbq3Hk9WGzqLI9a9YElhWuO7tFOwe', '202306211231cl1.png', '735.351-6415', 'CARR CUAUTLA JOJUTLA SN, CUAUTLA CENTRO, 62740', 'agent', 'active', '1', NULL, '2023-06-13 20:09:06', '2023-06-21 19:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `property_id`, `created_at`, `updated_at`) VALUES
(10, 3, 9, '2023-06-21 15:37:26', NULL),
(11, 3, 10, '2023-06-21 15:37:28', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compares`
--
ALTER TABLE `compares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multi_images`
--
ALTER TABLE `multi_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_plans`
--
ALTER TABLE `package_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_messages`
--
ALTER TABLE `property_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `compares`
--
ALTER TABLE `compares`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `multi_images`
--
ALTER TABLE `multi_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `package_plans`
--
ALTER TABLE `package_plans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `property_messages`
--
ALTER TABLE `property_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
