-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 19, 2023 at 03:12 PM
-- Server version: 8.0.33-0ubuntu0.20.04.2
-- PHP Version: 8.2.8

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
(1, 'Aire Acondicionado', NULL, NULL),
(2, 'Servicio de Limpieza', NULL, NULL),
(3, 'SLavadora y Secadora', NULL, NULL),
(4, 'Pisos de Madera', NULL, NULL),
(5, 'Alberca', NULL, NULL),
(6, 'Regadera externa', NULL, NULL),
(7, 'Microondas', NULL, NULL),
(8, 'Refrigerador', NULL, NULL),
(9, 'Estufa', NULL, NULL),
(10, 'Admite Mascotas', NULL, NULL),
(11, 'Cancha de Basket Ball', NULL, NULL),
(12, 'Cancha de Tenis', NULL, NULL),
(13, 'Gimnasio', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `category_name`, `category_slug`, `created_at`, `updated_at`) VALUES
(1, 'Bienes inmuebles', 'bienes-inmuebles', NULL, '2023-07-10 13:10:40'),
(2, 'Interiores', 'interiores', NULL, NULL),
(3, 'Arquitectura', 'arquitectura', NULL, NULL),
(4, 'Mejora del Hogar', 'mejora-del-hogar', NULL, NULL),
(5, 'Estados', 'estados', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint UNSIGNED NOT NULL,
  `blogcat_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_descp` text COLLATE utf8mb4_unicode_ci,
  `long_descp` text COLLATE utf8mb4_unicode_ci,
  `post_tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `blogcat_id`, `user_id`, `post_title`, `post_slug`, `post_image`, `short_descp`, `long_descp`, `post_tags`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'Aguascalientes', 'aguascalientes', 'upload/post/post1.jpg', 'Aguascalientes, oficialmente Estado Libre y Soberano de Aguascalientes, es uno de los treinta y un estados que, junto con la Ciudad de México, conforman México; se ubica en la región centro norte de México y parte del Bajío mexicano.​ Su capital y ciudad más poblada es Aguascalientes. Se divide en once municipios.', '<p><strong>Aguascalientes</strong>, oficialmente <strong>Estado Libre y Soberano de Aguascalientes</strong>, es uno de los <a title=\"Organizaci&oacute;n territorial de M&eacute;xico\" href=\"https://es.wikipedia.org/wiki/Organizaci%C3%B3n_territorial_de_M%C3%A9xico\">treinta y un estados</a> que, junto con la <a title=\"Ciudad de M&eacute;xico\" href=\"https://es.wikipedia.org/wiki/Ciudad_de_M%C3%A9xico\">Ciudad de M&eacute;xico</a>, conforman <a title=\"M&eacute;xico\" href=\"https://es.wikipedia.org/wiki/M%C3%A9xico\">M&eacute;xico</a>; se ubica en la regi&oacute;n <a title=\"Centronorte de M&eacute;xico\" href=\"https://es.wikipedia.org/wiki/Centronorte_de_M%C3%A9xico\">centronorte de M&eacute;xico</a> y parte del <a class=\"mw-redirect\" title=\"El Baj&iacute;o (M&eacute;xico)\" href=\"https://es.wikipedia.org/wiki/El_Baj%C3%ADo_(M%C3%A9xico)\">Baj&iacute;o</a> mexicano.<sup id=\"cite_ref-12\" class=\"reference separada\"></sup>​ Su capital y ciudad m&aacute;s poblada es <a class=\"mw-redirect\" title=\"Aguascalientes (M&eacute;xico)\" href=\"https://es.wikipedia.org/wiki/Aguascalientes_(M%C3%A9xico)\">Aguascalientes</a>. Se divide en <a title=\"Anexo:Municipios de Aguascalientes\" href=\"https://es.wikipedia.org/wiki/Anexo:Municipios_de_Aguascalientes\">once municipios</a>.</p>\n                    <p>Previo a la <a title=\"Conquista de Am&eacute;rica\" href=\"https://es.wikipedia.org/wiki/Conquista_de_Am%C3%A9rica\">conquista de Am&eacute;rica</a>, el territorio fue punto de encuentro de distintos aguerridos se&ntilde;or&iacute;os <a class=\"mw-redirect\" title=\"Chichimecas\" href=\"https://es.wikipedia.org/wiki/Chichimecas\">chichimecas</a>. Los espa&ntilde;oles establecieron peque&ntilde;as poblaciones coloniales desde mediados del siglo&nbsp;<span style=\"font-variant: small-caps; text-transform: lowercase;\">XVI</span>, incluida la actual capital, y el territorio perteneci&oacute; a la <a title=\"Nueva Galicia\" href=\"https://es.wikipedia.org/wiki/Nueva_Galicia\">Nueva Galicia</a> (Jalisco) durante casi toda la colonia; donde desempe&ntilde;aba un rol agropecuario y de punto de descanso en la <a title=\"Ruta de la Plata (M&eacute;xico)\" href=\"https://es.wikipedia.org/wiki/Ruta_de_la_Plata_(M%C3%A9xico)\">Ruta de la Plata</a>. Pas&oacute; a ser parte de <a title=\"Zacatecas\" href=\"https://es.wikipedia.org/wiki/Zacatecas\">Zacatecas</a> brevemente, pues fue declarado territorio independiente en 1835 mientras el estado vecino <a title=\"Rebeli&oacute;n en Zacatecas de 1835\" href=\"https://es.wikipedia.org/wiki/Rebeli%C3%B3n_en_Zacatecas_de_1835\">se sublevaba</a>, aunque no fue sino hasta la <a title=\"Constituci&oacute;n Federal de los Estados Unidos Mexicanos (1857)\" href=\"https://es.wikipedia.org/wiki/Constituci%C3%B3n_Federal_de_los_Estados_Unidos_Mexicanos_(1857)\">Constituci&oacute;n de 1857</a> que fue reconocido como estado. La <a title=\"Porfiriato\" href=\"https://es.wikipedia.org/wiki/Porfiriato\">&eacute;poca porfiriana</a> benefici&oacute; enormemente a Aguascalientes con la industria del <a title=\"Ferrocarril Central Mexicano\" href=\"https://es.wikipedia.org/wiki/Ferrocarril_Central_Mexicano\">Ferrocarril Central Mexicano</a>, provocando una explosi&oacute;n poblacional y art&iacute;stica.<sup id=\"cite_ref-14\" class=\"reference separada\"></sup>​ Hosped&oacute; la <a title=\"Convenci&oacute;n de Aguascalientes\" href=\"https://es.wikipedia.org/wiki/Convenci%C3%B3n_de_Aguascalientes\">Convenci&oacute;n Revolucionaria de 1914</a>, y luego fue escenario de la <a title=\"Guerra Cristera\" href=\"https://es.wikipedia.org/wiki/Guerra_Cristera\">Guerra Cristera</a>. Desde la d&eacute;cada de 1980 ha vuelto a entrar en una explosi&oacute;n demogr&aacute;fica, a manos de la industria textil, automotriz y electr&oacute;nica; sin dejar de lado las actividades agropecuarias. Es reconocido como uno de los estados m&aacute;s seguros y de mayor crecimiento econ&oacute;mico de M&eacute;xico</p>', 'Bien Inmobiliario,estados,Mexico', '2023-07-06 14:57:39', NULL),
(2, 5, 1, 'Colima', 'colima', 'upload/post/post2.jpg', 'Colima, oficialmente Estado Libre y Soberano de Colima, es uno de los treinta y un estados que, junto con la Ciudad de México, forman México.5​6​ Su capital es la ciudad homónima y la ciudad más poblada es Manzanillo. Está dividido territorialmente en diez municipios.', '<p>Fundada en <a title=\"1527\" href=\"https://es.wikipedia.org/wiki/1527\">1527</a> originalmente como Villa de San Sebasti&aacute;n, el nombre de Colima viene del n&aacute;huatl Acolman, que significa \"lugar donde tuerce el agua\" o \"lugar donde hace recodo el r&iacute;o\". El territorio de Colima, del que casi tres cuartas partes de superficie est&aacute;n cubiertas por monta&ntilde;as y colinas, queda comprendido dentro de una derivaci&oacute;n de la <a title=\"Sierra Madre del Sur\" href=\"https://es.wikipedia.org/wiki/Sierra_Madre_del_Sur\">Sierra Madre del Sur</a>, que se compone de cuatro sistemas monta&ntilde;osos.</p>\n                    <p>A pesar de ser una peque&ntilde;a entidad, Colima posee monumentos hist&oacute;ricos como su catedral bas&iacute;lica menor, construcci&oacute;n que se empez&oacute; en 1525 de estilo predominantemente neocl&aacute;sico aunque tambi&eacute;n muestra algunos rasgos arquitect&oacute;nicos de estilos barroco y g&oacute;tico; el Palacio de Gobierno, con los magn&iacute;ficos murales del pintor colimense <a class=\"new\" title=\"Jorge Ch&aacute;vez Carrillo (a&uacute;n no redactado)\" href=\"https://es.wikipedia.org/w/index.php?title=Jorge_Ch%C3%A1vez_Carrillo&amp;action=edit&amp;redlink=1\">Jorge Ch&aacute;vez Carrillo</a>, que ilustran temas hist&oacute;ricos relativos a la Conquista, la Colonizaci&oacute;n y la Guerra de Independencia. Otros lugares culturales y arquitect&oacute;nicos que destacan son: El Teatro Hidalgo, que data del siglo&nbsp;<span style=\"font-variant: small-caps; text-transform: lowercase;\">XIX</span>; el Templo de <a class=\"new\" title=\"San Francisco del Pil&oacute;n (a&uacute;n no redactado)\" href=\"https://es.wikipedia.org/w/index.php?title=San_Francisco_del_Pil%C3%B3n&amp;action=edit&amp;redlink=1\">San Francisco del Pil&oacute;n</a>, fundado en 1554; la Casa de la Cultura, con una incre&iacute;ble biblioteca, sala de exposiciones, auditorio y talleres de diversas actividades art&iacute;sticas.</p>', 'Bien Inmobiliario,estados,Mexico', '2023-07-06 14:56:20', NULL),
(3, 5, 1, 'Baja California Norte', 'baja-california-norte', 'upload/post/post3.jpg', 'Baja California, oficialmente Estado Libre y Soberano de Baja California, el número 29, de los treinta y un estados que, junto con la Ciudad de México, conforman México.​ Su capital es Mexicali y su ciudad más poblada es Tijuana, cabecera del municipio homónimo, el más poblado del país.9​ Se encuentra dividido en siete municipios.', '<p>Se ubica en la parte norte de la <a title=\"Pen&iacute;nsula de Baja California\" href=\"https://es.wikipedia.org/wiki/Pen%C3%ADnsula_de_Baja_California\">pen&iacute;nsula de Baja California</a> en la <a title=\"Regiones de M&eacute;xico\" href=\"https://es.wikipedia.org/wiki/Regiones_de_M%C3%A9xico\">regi&oacute;n</a> <a title=\"Noroeste de M&eacute;xico\" href=\"https://es.wikipedia.org/wiki/Noroeste_de_M%C3%A9xico\">noroeste del pa&iacute;s</a>. Limita al norte con el estado de <a title=\"California\" href=\"https://es.wikipedia.org/wiki/California\">California</a>, al este con los estados de <a title=\"Arizona\" href=\"https://es.wikipedia.org/wiki/Arizona\">Arizona</a> y <a title=\"Sonora\" href=\"https://es.wikipedia.org/wiki/Sonora\">Sonora</a> y con el <a class=\"mw-redirect\" title=\"Mar de Cort&eacute;s\" href=\"https://es.wikipedia.org/wiki/Mar_de_Cort%C3%A9s\">golfo de California</a>, al sur con el estado de <a title=\"Baja California Sur\" href=\"https://es.wikipedia.org/wiki/Baja_California_Sur\">Baja California Sur</a> y al oeste con el <a title=\"Oc&eacute;ano Pac&iacute;fico\" href=\"https://es.wikipedia.org/wiki/Oc%C3%A9ano_Pac%C3%ADfico\">oc&eacute;ano Pac&iacute;fico</a>. Con 71 450&nbsp;km&sup2; representa el 3.6&nbsp;% del territorio nacional, siendo la duod&eacute;cima <a title=\"Anexo:Entidades federativas de M&eacute;xico\" href=\"https://es.wikipedia.org/wiki/Anexo:Entidades_federativas_de_M%C3%A9xico\">entidad federativa</a> <a title=\"Anexo:Entidades federativas de M&eacute;xico por superficie, poblaci&oacute;n y densidad\" href=\"https://es.wikipedia.org/wiki/Anexo:Entidades_federativas_de_M%C3%A9xico_por_superficie,_poblaci%C3%B3n_y_densidad\">m&aacute;s grande del pa&iacute;s</a>.</p>\n                    <p>Su poblaci&oacute;n seg&uacute;n el Censo de 2020 es de 3 769 020 habitantes que presenta el 3&nbsp;% de la poblaci&oacute;n mexicana, siendo la decimocuarta entidad m&aacute;s poblada del pa&iacute;s, cercana al puesto medio de puesto diecisiete. Tambi&eacute;n es la d&eacute;cima cuarta entidad menos densamente poblada, tambi&eacute;n cercana al puesto medio.</p>\n                    <p>Su <a title=\"&Iacute;ndice de desarrollo humano\" href=\"https://es.wikipedia.org/wiki/%C3%8Dndice_de_desarrollo_humano\">&Iacute;ndice de Desarrollo Humano</a> (IDH) es uno de los m&aacute;s altos de M&eacute;xico, el cuarto a nivel nacional, calificado como muy alto.​ Adem&aacute;s es la duod&eacute;cima entidad por <a title=\"Producto interno bruto\" href=\"https://es.wikipedia.org/wiki/Producto_interno_bruto\">producto interno bruto</a> (PIB)<sup id=\"cite_ref-11\" class=\"reference separada\"></sup>​ y decimotercera en competitividad seg&uacute;n datos del IMCO.​ Debido a su posici&oacute;n geogr&aacute;fica &mdash;colindante con <a title=\"Estados Unidos\" href=\"https://es.wikipedia.org/wiki/Estados_Unidos\">Estados Unidos</a>&mdash; permite un &aacute;rea de conexi&oacute;n comercial y cultural. Tambi&eacute;n es uno de los estados m&aacute;s visitados del pa&iacute;s. El <a title=\"Valle de Guadalupe (Baja California)\" href=\"https://es.wikipedia.org/wiki/Valle_de_Guadalupe_(Baja_California)\">valle de Guadalupe</a> (<a title=\"Municipio de Ensenada\" href=\"https://es.wikipedia.org/wiki/Municipio_de_Ensenada\">Ensenada</a>) es el mayor productor de vinos en M&eacute;xico, reconocido a nivel internacional.<sup>[<em><a title=\"Wikipedia:Verificabilidad\" href=\"https://es.wikipedia.org/wiki/Wikipedia:Verificabilidad\">cita&nbsp;requerida</a></em>]</sup></p>\n                    <p>En 1931 el <a title=\"Territorio de Baja California\" href=\"https://es.wikipedia.org/wiki/Territorio_de_Baja_California\">Territorio de Baja California</a> &mdash;que hab&iacute;a sido constituido desde 1824&mdash; se dividi&oacute; y se form&oacute; el <a title=\"Territorio Norte de Baja California\" href=\"https://es.wikipedia.org/wiki/Territorio_Norte_de_Baja_California\">Territorio Norte de Baja California</a>. Dicho <a title=\"Territorios federales de M&eacute;xico\" href=\"https://es.wikipedia.org/wiki/Territorios_federales_de_M%C3%A9xico\">territorio federal</a> fue elevado de rango a estado libre y soberano el 16 de enero de 1952.</p>', 'Bien Inmobiliario,estados,Mexico', '2023-07-06 18:16:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  `parent_id` int DEFAULT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `aprobado` tinyint(1) NOT NULL,
  `leido` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `parent_id`, `subject`, `message`, `aprobado`, `leido`, `created_at`, `updated_at`) VALUES
(1, 3, 3, NULL, 'Primer Comentario a BCN', 'Su población según el Censo de 2020 es de 3 769 020 habitantes que presenta el 3 % de la población mexicana, siendo la decimocuarta entidad más poblada del país, cercana al puesto medio de puesto diecisiete', 1, 1, '2023-07-07 14:56:20', '2023-07-09 14:21:11'),
(2, 3, 3, NULL, 'Segundo Comentario a BCN', 'Este en el mensaje del segundo comentario para Baja California', 1, 1, '2023-07-07 14:57:20', '2023-07-09 23:30:30'),
(3, 3, 3, NULL, 'Tercer Comentario a BCN', 'Su Índice de Desarrollo Humano (IDH) es uno de los más altos de México, el cuarto a nivel nacional, calificado como muy alto.​ Además es la duodécima entidad por producto interno bruto (PIB)​ y decimotercera en competitividad según datos del IMCO.', 1, 0, '2023-07-07 14:58:20', '2023-07-09 16:38:12'),
(4, 1, 3, 2, '1ra Respuesta para Segundo Comentario BNC', 'Mensaje para Segundo Comentario', 1, 0, '2023-07-08 00:22:41', NULL),
(5, 1, 3, 2, '2da Respuesta para Segundo comentario BCN', 'Un segundo mensaje para segundo comentario.', 1, 0, '2023-07-08 00:27:53', '2023-07-10 18:32:13'),
(6, 1, 3, 1, '1ra Respuesta para Primer Comentario BCN', 'Mensaje Respuesta 1er Comentario', 1, 0, '2023-07-08 05:09:54', NULL),
(7, 8, 3, NULL, '1er comentario de Miranda a BCN', 'Mensaje de 1er comentario de Miranda', 1, 1, '2023-07-09 16:42:13', '2023-07-09 16:42:53'),
(8, 8, 1, NULL, '1er comentario de Miranda en Post aguas Calientes', 'Mensaje 1er comentario de Miranda en Post aguas Calientes', 1, 1, '2023-07-09 16:50:18', '2023-07-09 16:50:44');

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
(1, 1, 'Banco', '1', NULL, NULL),
(2, 1, 'Centro Comercial', '1', NULL, NULL),
(3, 1, 'Aeropuerto', '2', NULL, NULL),
(4, 2, 'Banco', '1', NULL, NULL),
(5, 2, 'Centro Comercial', '1', NULL, NULL),
(6, 2, 'Aeropuerto', '2', NULL, NULL),
(7, 3, 'Banco', '1', NULL, NULL),
(8, 3, 'Centro Comercial', '1', NULL, NULL),
(9, 3, 'Aeropuerto', '2', NULL, NULL),
(10, 4, 'Banco', '1', NULL, NULL),
(11, 4, 'Centro Comercial', '1', NULL, NULL),
(12, 4, 'Aeropuerto', '2', NULL, NULL),
(13, 7, 'Farmacia', '2', '2023-07-11 00:39:25', '2023-07-11 00:39:25');

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
(5, '2023_05_31_212917_create_property_types_table', 1),
(6, '2023_06_01_151806_create_amenities_table', 1),
(7, '2023_06_02_011542_create_properties_table', 1),
(8, '2023_06_02_013822_create_multi_images_table', 1),
(9, '2023_06_02_014659_create_facilities_table', 1),
(10, '2023_06_12_104957_create_package_plans_table', 1),
(11, '2023_06_17_120222_create_wishlists_table', 1),
(12, '2023_06_20_192002_create_compares_table', 1),
(13, '2023_06_21_123938_create_property_messages_table', 1),
(14, '2023_06_23_125218_create_topbar_data_table', 1),
(15, '2023_06_28_161749_create_states_table', 1),
(16, '2023_06_30_211500_create_testimonials_table', 1),
(17, '2023_07_04_141952_create_blog_categories_table', 1),
(18, '2023_07_05_092842_create_blog_posts_table', 1),
(19, '2023_07_07_063403_create_comments_table', 1),
(20, '2023_07_10_170007_create_schedules_table', 2),
(21, '2023_07_11_210708_create_smtp_settings_table', 3),
(22, '2023_07_12_114613_create_site_settings_table', 4),
(23, '2023_07_13_182932_create_permission_tables', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 1, 'upload/property/multi-image/m1p1.png', NULL, NULL),
(2, 1, 'upload/property/multi-image/m2p1.png', NULL, NULL),
(3, 1, 'upload/property/multi-image/m3p1.png', NULL, NULL),
(4, 1, 'upload/property/multi-image/m4p1.png', NULL, NULL),
(5, 2, 'upload/property/multi-image/m1p2.png', NULL, NULL),
(6, 2, 'upload/property/multi-image/m2p2.png', NULL, NULL),
(7, 2, 'upload/property/multi-image/m3p2.png', NULL, NULL),
(8, 2, 'upload/property/multi-image/m4p2.png', NULL, NULL),
(9, 3, 'upload/property/multi-image/m1p3.png', NULL, NULL),
(10, 3, 'upload/property/multi-image/m2p3.png', NULL, NULL),
(11, 3, 'upload/property/multi-image/m3p3.png', NULL, NULL),
(12, 3, 'upload/property/multi-image/m4p3.png', NULL, NULL),
(13, 4, 'upload/property/multi-image/m1p4.png', NULL, NULL),
(14, 4, 'upload/property/multi-image/m2p4.png', NULL, NULL),
(15, 4, 'upload/property/multi-image/m3p4.png', NULL, NULL),
(16, 4, 'upload/property/multi-image/m4p4.png', NULL, NULL),
(17, 5, 'upload/property/multi-image/m1p5.png', NULL, NULL),
(18, 5, 'upload/property/multi-image/m2p5.png', NULL, NULL),
(19, 5, 'upload/property/multi-image/m3p5.png', NULL, NULL),
(20, 5, 'upload/property/multi-image/m4p5.png', NULL, NULL),
(21, 6, 'upload/property/multi-image/m1p6.png', NULL, NULL),
(22, 6, 'upload/property/multi-image/m2p6.png', NULL, NULL),
(23, 6, 'upload/property/multi-image/m3p6.png', NULL, NULL),
(24, 6, 'upload/property/multi-image/m4p6.png', NULL, NULL),
(25, 7, 'upload/property/multi-image/1771082576536362.jpg', '2023-07-11 00:39:25', NULL),
(26, 7, 'upload/property/multi-image/1771082576584410.jpg', '2023-07-11 00:39:25', NULL),
(27, 7, 'upload/property/multi-image/1771082576640229.jpg', '2023-07-11 00:39:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `package_plans`
--

CREATE TABLE `package_plans` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_credits` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_plans`
--

INSERT INTO `package_plans` (`id`, `user_id`, `package_name`, `invoice`, `package_credits`, `package_amount`, `created_at`, `updated_at`) VALUES
(1, 2, 'Busines', 'ERS76104096', '3', '20.00', '2023-07-06 14:56:20', NULL);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'type.menu', 'web', 'type', '2023-07-14 16:30:42', '2023-07-14 16:30:42'),
(2, 'all.type', 'web', 'type', '2023-07-14 16:32:18', '2023-07-14 16:32:18'),
(3, 'add.type', 'web', 'type', '2023-07-14 16:33:27', '2023-07-14 16:33:27'),
(4, 'edit.type', 'web', 'type', '2023-07-14 16:33:40', '2023-07-14 16:33:40'),
(5, 'delete.type', 'web', 'type', '2023-07-14 16:33:53', '2023-07-14 16:33:53'),
(6, 'state.menu', 'web', 'state', '2023-07-14 16:36:36', '2023-07-14 16:36:36'),
(7, 'all.state', 'web', 'state', '2023-07-14 16:36:52', '2023-07-14 16:36:52'),
(8, 'add.state', 'web', 'state', '2023-07-14 16:37:03', '2023-07-14 16:37:03'),
(9, 'edit.state', 'web', 'state', '2023-07-14 16:37:14', '2023-07-14 16:37:14'),
(12, 'delete.state', 'web', 'state', '2023-07-14 17:25:48', '2023-07-14 17:25:48'),
(13, 'amenities.menu', 'web', 'amenities', '2023-07-15 14:43:54', '2023-07-15 14:43:54'),
(14, 'all.amenities', 'web', 'amenities', '2023-07-15 14:43:54', '2023-07-15 14:43:54'),
(15, 'add.amenities', 'web', 'amenities', '2023-07-15 14:43:54', '2023-07-15 14:43:54'),
(16, 'edit.amenities', 'web', 'amenities', '2023-07-15 14:43:54', '2023-07-15 14:43:54'),
(17, 'delete.amenities', 'web', 'amenities', '2023-07-15 14:43:54', '2023-07-15 14:43:54');

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
(1, '1', 'Servicio de Limpieza,Pisos de Madera,Microondas,Estufa,Cancha de Basket Ball', 'Imi', 'imi', 'PC001', 'compra', '4300000', '4500000', 'upload/property/thambnail/p1t.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Leo vel fringilla est ullamcorper eget nulla facilisi etiam dignissim. Odio pellentesque diam volutpat commodo sed egestas', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Leo vel fringilla est ullamcorper eget nulla facilisi etiam dignissim. Odio pellentesque diam volutpat commodo sed egestas. Ut morbi tincidunt augue interdum velit euismod in pellentesque. Ornare arcu odio ut sem nulla pharetra. Suspendisse interdum consectetur libero id. Sit amet commodo nulla facilisi nullam. Integer vitae justo eget magna fermentum iaculis eu non diam. Nibh ipsum consequat nisl vel pretium lectus. Risus in hendrerit gravida rutrum quisque non tellus orci ac. Dictum varius duis at consectetur lorem donec massa sapien faucibus. Pretium vulputate sapien nec sagittis aliquam malesuada. Tortor condimentum lacinia quis vel eros. Nulla facilisi nullam vehicula ipsum. Facilisis magna etiam tempor orci eu lobortis elementum. Sed vulputate odio ut enim blandit. Auctor urna nunc id cursus metus aliquam eleifend mi. Ut sem viverra aliquet eget sit amet tellus. Elit sed vulputate mi sit amet mauris commodo.</p>', '4', '3', '1', '155', '650', NULL, 'Imi, Campeche, Campeche, Colonia Imi, C.P. 24560', 'Campeche', '4', '24560', 'Quinta Don Nacho', '19.871107', '-90.474048', NULL, '1', '1', 4, '1', '2023-07-01 19:53:34', NULL),
(2, '1', 'Servicio de Limpieza,Pisos de Madera,Microondas,Estufa,Cancha de Basket Ball', 'Nogales', 'nogales', 'PC002', 'renta', '6250300', '6555000', 'upload/property/thambnail/p2t.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Leo vel fringilla est ullamcorper eget nulla facilisi etiam dignissim. Odio pellentesque diam volutpat commodo sed egestas', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Leo vel fringilla est ullamcorper eget nulla facilisi etiam dignissim. Odio pellentesque diam volutpat commodo sed egestas. Ut morbi tincidunt augue interdum velit euismod in pellentesque. Ornare arcu odio ut sem nulla pharetra. Suspendisse interdum consectetur libero id. Sit amet commodo nulla facilisi nullam. Integer vitae justo eget magna fermentum iaculis eu non diam. Nibh ipsum consequat nisl vel pretium lectus. Risus in hendrerit gravida rutrum quisque non tellus orci ac. Dictum varius duis at consectetur lorem donec massa sapien faucibus. Pretium vulputate sapien nec sagittis aliquam malesuada. Tortor condimentum lacinia quis vel eros. Nulla facilisi nullam vehicula ipsum. Facilisis magna etiam tempor orci eu lobortis elementum. Sed vulputate odio ut enim blandit. Auctor urna nunc id cursus metus aliquam eleifend mi. Ut sem viverra aliquet eget sit amet tellus. Elit sed vulputate mi sit amet mauris commodo.</p>', '4', '3', '1', '155', '650', NULL, 'nogales, Colonia Hipódromo Dos, C.P. 22195', 'Tijuna', '2', '22195', 'La presa', '32.494760', '-116.984320', NULL, '1', '1', 5, '1', '2023-07-02 19:53:34', '2023-07-10 23:46:19'),
(3, '1', 'Servicio de Limpieza,Pisos de Madera,Microondas,Estufa,Cancha de Basket Ball', 'Tiburón Los Cangrejos', 'tiburon-los-cangrejos', 'PC003', 'compra', '2310000', '2490000', 'upload/property/thambnail/p3t.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Leo vel fringilla est ullamcorper eget nulla facilisi etiam dignissim. Odio pellentesque diam volutpat commodo sed egestas', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Leo vel fringilla est ullamcorper eget nulla facilisi etiam dignissim. Odio pellentesque diam volutpat commodo sed egestas. Ut morbi tincidunt augue interdum velit euismod in pellentesque. Ornare arcu odio ut sem nulla pharetra. Suspendisse interdum consectetur libero id. Sit amet commodo nulla facilisi nullam. Integer vitae justo eget magna fermentum iaculis eu non diam. Nibh ipsum consequat nisl vel pretium lectus. Risus in hendrerit gravida rutrum quisque non tellus orci ac. Dictum varius duis at consectetur lorem donec massa sapien faucibus. Pretium vulputate sapien nec sagittis aliquam malesuada. Tortor condimentum lacinia quis vel eros. Nulla facilisi nullam vehicula ipsum. Facilisis magna etiam tempor orci eu lobortis elementum. Sed vulputate odio ut enim blandit. Auctor urna nunc id cursus metus aliquam eleifend mi. Ut sem viverra aliquet eget sit amet tellus. Elit sed vulputate mi sit amet mauris commodo.</p>', '4', '2', '1', '155', '650', NULL, 'cabo San Lucas, Colonia Los Cangrejos', 'Cabo San Lucas', '3', '23473', 'Brisas del Pacifico', '22.906510', '-109.962970', NULL, '1', '1', 6, '1', '2023-07-02 19:53:34', NULL),
(4, '1', 'Servicio de Limpieza,Pisos de Madera,Microondas,Estufa,Cancha de Basket Ball', 'Campestre Residencial', 'campestre-residencial', 'PC004', 'compra', '4200000', '4800000', 'upload/property/thambnail/p4t.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Leo vel fringilla est ullamcorper eget nulla facilisi etiam dignissim. Odio pellentesque diam volutpat commodo sed egestas', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Leo vel fringilla est ullamcorper eget nulla facilisi etiam dignissim. Odio pellentesque diam volutpat commodo sed egestas. Ut morbi tincidunt augue interdum velit euismod in pellentesque. Ornare arcu odio ut sem nulla pharetra. Suspendisse interdum consectetur libero id. Sit amet commodo nulla facilisi nullam. Integer vitae justo eget magna fermentum iaculis eu non diam. Nibh ipsum consequat nisl vel pretium lectus. Risus in hendrerit gravida rutrum quisque non tellus orci ac. Dictum varius duis at consectetur lorem donec massa sapien faucibus. Pretium vulputate sapien nec sagittis aliquam malesuada. Tortor condimentum lacinia quis vel eros. Nulla facilisi nullam vehicula ipsum. Facilisis magna etiam tempor orci eu lobortis elementum. Sed vulputate odio ut enim blandit. Auctor urna nunc id cursus metus aliquam eleifend mi. Ut sem viverra aliquet eget sit amet tellus. Elit sed vulputate mi sit amet mauris commodo.</p>', '4', '2', '1', '155', '650', NULL, 'eugenio garza sada #121221, Colonia Condominio Q Campestre Residencial', 'Aguacalientes', '1', '20997', 'Palo Alto', '21.910080', '-102.328910', NULL, '1', '1', 7, '1', '2023-07-03 19:53:34', NULL),
(5, '1', 'Servicio de Limpieza,Pisos de Madera,Microondas,Estufa,Cancha de Basket Ball', 'Golf', 'golf', 'PC005', 'compra', '18250000', '18500000', 'upload/property/thambnail/p5t.png', 'Casa en venta chapultepec, tijuana, baja california 5 recámaras 5 baños 478 m tipo de vivienda: casa tipo de operación: venta superficie total: 408 m $ 18,000,000 mxn descripción casa en venta en una de las zonas más exclusivas y con ubicación privilegiada dentro del corazón de la ciudad de tijuana. esta propiedad ofrece un diseño con un concepto de unidad, espacios abiertos y luminosos que permiten la facilidad de convivencia e integración familiar, así como la funcionalidad de movilidad para personas que tengan dicha necesidad o adultos mayores.', '<p>Casa en venta chapultepec, tijuana, baja california 5 recámaras 5 baños 478 m tipo de vivienda: casa tipo de operación: venta superficie total: 408 m $ 18,000,000 mxn descripción casa en venta en una de las zonas más exclusivas y con ubicación privilegiada dentro del corazón de la ciudad de tijuana. esta propiedad ofrece un diseño con un concepto de unidad, espacios abiertos y luminosos que permiten la facilidad de convivencia e integración familiar, así como la funcionalidad de movilidad para personas que tengan dicha necesidad o adultos mayores. la casa consta de dos plantas, elevador para trasladarse al segundo piso, cuarto de visitas independiente con un baño completo, área de lavado y cuarto de servicio, espacios para almacenamiento en el interior y exterior. esta casa cuenta con espacios muy cómodos y excelentes acabados. planta baja. recibidor, sala, comedor con chimenea. cocina integral equipada. estudio. 1 recamara amplia con baño completo. planta alta 3 recámaras, dos baños completos así como un vestidor en la recámara principal. cuenta con un patio de tamaño mediano. instalaciones especiales como son: aire acondicionado paneles solares cisterna con una capacidad de 12 m3. sistema de purificación y tratamiento de agua. la casa cuenta con: terreno 408 m2 construcción 478 m2 se muestra previa cita. la casa se vende equipada y con el mobiliario mostrado en las fotografías. califica para venta de contado y crédito bancario. informes whatsapp</p>', '4', '3', '1', '155', '650', NULL, 'Avenida Buenaventura 394 #394, Colonia Campo de Golf, C.P. 22020 ', 'Tijuana', '2', '22020', 'Avenida Buenaventura', '32.506417', '-117.006866', NULL, '1', '1', 2, '1', '2023-07-01 19:53:34', NULL),
(6, '1', 'Servicio de Limpieza,Pisos de Madera,Microondas,Estufa,Cancha de Basket Ball', 'Cumbre Rubí', 'cumbre-rubí', 'PC006', 'compra', '3250000', '3380000', 'upload/property/thambnail/p6t.png', 'De la tierra 5424 tejamen 22635 tijuana b. ubicadas en tijuana b. en la colonia tejamen. amplias y modernas casas de 2 y 3 recamaras a 5 minutos de zona río y 10 minutos de la garita de san ysidro. privada con acceso controlado. solo 7 casa listas para habitar. entrega en mayo de 2022.', '<p>De la tierra 5424 tejamen 22635 tijuana b. ubicadas en tijuana b. en la colonia tejamen. amplias y modernas casas de 2 y 3 recamaras a 5 minutos de zona r&iacute;o y 10 minutos de la garita de san ysidro. privada con acceso controlado. solo 7 casa listas para habitar. entrega en mayo de 2022. acceso controlado port&oacute;n y puerta peatonal el&eacute;ctricos sistema de video vigilancia servicios subterr&aacute;neos alumbrado p&uacute;blico y &aacute;rea verde. ubicadas en calle san ram&oacute;n de la tierra col. tejamen por blvd. cuauht&eacute;moc sur a 100 metros del colegio juan bosco. se pide 10% de enganchepuede apartar con tan solo $20000 pesos!listas para entregarse! casa de 2 recamaras recamara principal con walkin closet sala comedor y cocina balc&oacute;n en sala y recamara principal 3 niveles con garaje techado 1 ba&ntilde;o completo y 2 medios ba&ntilde;os &aacute;rea de lavado boiler y basura patio techado y espacio para asador superficie de 55 m2 de terreno y 117 m2 de construcci&oacute;n requisitos generales cumplir con la edad m&iacute;nima de 25 y m&aacute;xima de 65 a&ntilde;os. mantener una relaci&oacute;n laboral estable (m&aacute;s de un a&ntilde;o). tener comprobantes de ingresos. disponer de un historial de cr&eacute;dito positivo. contar con documentaci&oacute;n oficial para identificaci&oacute;n personal y de domicilio contratar seguro de vida y de da&ntilde;os al inmueble. extranjeros acreditar residencia legal en m&eacute;xico obtener autorizaci&oacute;n de la ser constituci&oacute;n de un fideicomiso o sociedad mexicana doble nacionalidad o compra con un familiar mexicano notaria y bancos1.- antecedente de propiedad plano (deslinde catastral) r&eacute;gimen de condominio terminaci&oacute;n de obra (c4) *** aval&uacute;o libertad de grav&aacute;menes fiscales libertad de grav&aacute;menes rppc las im&aacute;genes mostradas pueden variar a las del producto original. los precios publicados est&aacute;n sujetos a cambio sin previo aviso. el precio publicado no incluye los gastos de escrituraci&oacute;n. &iexcl;te llevo a conocerla espero tu llamada!</p>', '4', '3', '1', '155', '650', NULL, 'Cumbres del Rubí, Colonia Cumbres del Rubí, C.P. 22635', 'Tijuana', '2', '22635', 'Cumbres del Rubí', '32.484149', '-117.022857', NULL, '1', NULL, 2, '1', '2023-07-01 19:53:34', '2023-07-09 14:22:27'),
(7, '5', 'Aire Acondicionado,Servicio de Limpieza,Pisos de Madera', 'Rancho Rosarito', 'rancho-rosarito', 'PC007', 'renta', '345345', '345353', 'upload/property/thambnail/1771082576501124.jpg', 'erwe we w', '<p>&nbsp;e we erwer ew</p>', '2', '2', '1', '123', '3423', NULL, 'g  f fd sgdf', 'Rosarito', '2', '4565', NULL, '34', '423', NULL, NULL, '1', NULL, '1', '2023-07-11 00:39:25', NULL);

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
(1, 'Residencial', 'icon-1', NULL, '2023-07-15 21:08:15'),
(2, 'Comercial', 'icon-2', NULL, NULL),
(3, 'Apartamento', 'icon-3', NULL, NULL),
(4, 'Industrial', 'icon-4', NULL, NULL),
(5, 'Infonavit', 'icon-5', NULL, NULL),
(6, 'Terreno', 'icon-6', NULL, NULL),
(7, 'Unifamiliar', 'icon-7', NULL, NULL),
(8, 'Multi familiar', 'icon-8', NULL, NULL),
(9, 'Oficina', 'icon-9', NULL, NULL),
(10, 'Fabrica', 'icon-10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', '2023-07-19 03:25:17', '2023-07-19 03:25:17'),
(2, 'Manager', 'web', '2023-07-19 03:26:41', '2023-07-19 03:26:41'),
(3, 'Admin', 'web', '2023-07-19 03:27:09', '2023-07-19 03:27:09'),
(4, 'Ventas', 'web', '2023-07-19 03:30:19', '2023-07-19 03:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `property_id` int DEFAULT NULL,
  `agent_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `user_id`, `property_id`, `agent_id`, `tour_date`, `tour_time`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '5', '07/12/2023', '9:00 am', 'Mensaje 1 de User para cita', '1', '2023-07-11 14:55:06', '2023-07-13 16:58:03'),
(3, 9, 2, '5', '07/13/2023', '13:30', 'Mensaje de user Tracy', '1', '2023-07-11 20:21:41', '2023-07-13 17:10:29'),
(4, 3, 2, '5', '07/20/2023', '11:30', 'Mensaje para segunda cita a las 11 y media', '0', '2023-07-12 17:12:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` text COLLATE utf8mb4_unicode_ci,
  `horario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_webpage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `logo`, `support_phone`, `company_address`, `horario`, `email`, `facebook`, `twitter`, `copyright`, `company_webpage`, `company_name`, `created_at`, `updated_at`) VALUES
(1, 'upload/logo/1771819080406947.png', '(664) 555-6756', 'PERIFERICO 11763, MERIDA CENTRO, 97000', 'Lunes a Viernes 8:00am a 5:00pm', 'easyreal@gmail.com', 'https://www.facebook.com/', 'https://www.twitter.com/', 'Copyright © 2023  -  Todos los Derechos Reservados', 'https://www.inmobiliaria-test.com/', 'RealState Inmobiliaria', NULL, '2023-07-19 03:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `smtp_settings`
--

CREATE TABLE `smtp_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `mailer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encryption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smtp_settings`
--

INSERT INTO `smtp_settings` (`id`, `mailer`, `host`, `port`, `username`, `password`, `encryption`, `from_address`, `created_at`, `updated_at`) VALUES
(1, 'smtp', 'sandbox.smtp.mailtrap.io', '2525', '9960d37ce551e4', '1b5da89e32d564', 'tls', 'soporte@easyweb.com', NULL, '2023-07-12 15:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint UNSIGNED NOT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `state_image`, `created_at`, `updated_at`) VALUES
(1, 'Aguascalientes', 'upload/state/aguascalientes.jpg', NULL, NULL),
(2, 'Baja California', 'upload/state/bcn.jpg', NULL, NULL),
(3, 'Baja California Sur', 'upload/state/bcs.jpg', NULL, NULL),
(4, 'Campeche', 'upload/state/campeche.jpg', NULL, NULL),
(5, 'Chiapas', 'upload/state/chiapas.jpg', NULL, NULL),
(6, 'Chihuahua', 'upload/state/chihuahua.jpg', NULL, NULL),
(7, 'Coahuila', 'upload/state/coahuila.jpg', NULL, NULL),
(8, 'Colima', 'upload/state/colima.jpg', NULL, NULL),
(9, 'Durango', 'upload/state/durango.jpg', NULL, NULL),
(10, 'Guanajuato', 'upload/state/guanajuato.jpg', NULL, NULL),
(11, 'Guerrero', 'upload/state/guerrero.jpg', NULL, NULL),
(12, 'Hidalgo', 'upload/state/hidalgo.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `position`, `image`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Federico Balcazar', 'Gerente', 'upload/testimonials/pt1.jpg', 'Our goal each day is to ensure that our residents’ needs are not only met but   exceeded. To make that happen we are committed to providing an environment in which  residents can enjoy.', NULL, NULL),
(2, 'Andreo Arcos', 'Cardiólogo', 'upload/testimonials/pt2.jpg', 'Our goal each day is to ensure that our residents’ needs are not only met but   exceeded. To make that happen we are committed to providing an environment in which  residents can enjoy.', NULL, NULL),
(3, 'Bertha Minjares', 'Agente de Ventas', 'upload/testimonials/pt3.jpg', 'Our goal each day is to ensure that our residents’ needs are not only met but   exceeded. To make that happen we are committed to providing an environment in which  residents can enjoy.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topbar_data`
--

CREATE TABLE `topbar_data` (
  `id` bigint UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topbar_data`
--

INSERT INTO `topbar_data` (`id`, `address`, `horario`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'PERIFERICO 11763, MERIDA CENTRO, 97000', 'Lunes a Viernes 8:00am a 5:00pm', '(554) 567-7789', NULL, NULL);

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
  `description` text COLLATE utf8mb4_unicode_ci,
  `role` enum('admin','agent','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `credit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `max_credit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `address`, `description`, `role`, `status`, `credit`, `max_credit`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$Aayb3DoZpGyllZ5kRzMxS.90KA5aDbN7.X3orHzyQaA0B2CXILdWK', 'admin.jpg', '(562) 456-6723', 'SALAMANCA ESQ AV CANAL SN NO. S/N, CIUDAD INDUSTRIAL, 36541', NULL, 'admin', 'active', '0', '0', 'YLkCqfCZS2gkkB5ruGcZXKGvVFTwvnGmffYGsEG5KjT61EUzKlswvv0deLom', NULL, NULL),
(2, 'Agent', 'agent', 'agent@gmail.com', NULL, '$2y$10$KSgdoL5ckM6gjb7VmLZ/E.2SM6v8M6yhUvnKktOfOz95wJLIwRDSe', 'agent.jpg', '(555) 156-6734', 'CARR. TAMPICO MANTE KM 11.5 SN, NIÑOS HEROES, 89359', 'Descripción para Agente \'Agent\'', 'agent', 'active', '2', '4', NULL, NULL, '2023-07-15 16:42:25'),
(3, 'User', 'user', 'user@gmail.com', NULL, '$2y$10$0Nz.oBrfeUNy/DlSWSlkDe7Lf//yXWiNR8xB7dYxt5hzKOhxlVlaa', 'user.jpg', '(542) 836-2745', 'AV TEHUACAN SUR NO. 124, LA PAZ, 72160', NULL, 'user', 'active', '0', '0', NULL, NULL, '2023-07-18 18:06:14'),
(4, 'Shaniya Conroy', 'conroy', 'medhurst.elvis@example.com', NULL, '$2y$10$3CVYcaj1Z4qo/eQuBHB4XukC154.TesVKF2mV9fKZf.UAy3GrHkaG', 'agent4.jpg', '(341) 537-3097', '20183 Gibson Fork Suite 809Beierfurt, AZ 99581-6291', NULL, 'agent', 'active', '1', '1', NULL, NULL, NULL),
(5, 'Julia Sandoval', 'julia', 'luis94@guardado.org', NULL, '$2y$10$gIav2ey6eOxJWS7bk6a/Yeve2wF6ST0v0Y1i/c9g.Q6B1zl66cOQO', 'agent5.jpg', '(660) 81-1313', 'Carrer Gallardo, 08, 2º E', NULL, 'agent', 'active', '1', '1', NULL, NULL, NULL),
(6, 'Anna R Stone', 'anna', 'kenton1973@yahoo.com', NULL, '$2y$10$oImc9N4u0KQBiJjakRdQzep34vGbhbcG5ReRsJybS2AmApDKjF5Ri', 'agent6.jpg', '(951) 903-7916', 'HERIBERTO FRIAS NO. 1404, CENTRO, 82000', NULL, 'agent', 'active', '1', '1', NULL, NULL, NULL),
(7, 'Robert M Edwards', 'robert', 'robert123@yahoo.com', NULL, '$2y$10$if.mgurb.FvHyO.OwMXDuOro..zsnvL.5qGIOfV1w6HuoINn.RftO', 'agent7.jpg', '(931) 603-7916', '439 Arron Smith Drive', NULL, 'agent', 'inactive', '1', '1', NULL, NULL, '2023-07-08 18:57:27'),
(8, 'Miranda S Bauer', 'miranda', 'miranda@yahoo.com', NULL, '$2y$10$6KgGk0DZxNa8XmyqhbAhY.wukPo9/R9b1lcTi9yhTyohMCAF/bEVK', 'user8.jpg', '(345) 123-5616', '6 DE ABRIL PTE NO. 408, CIUDAD OBREGON CENTRO, 85000', NULL, 'user', 'active', '0', '0', NULL, NULL, NULL),
(9, 'Tracy J Martin', 'tracy', 'tracy@yahoo.com', NULL, '$2y$10$i5M5xC4aMaWGQZXv5uPktuALTtWIFOfiLQmV6LW90DfczwcxFSJ.e', 'user9.jpg', '(676) 765-4616', 'PORFIRIO DIAZ 321, REFORMA, 68050', NULL, 'user', 'active', '0', '0', NULL, NULL, NULL),
(10, 'Alex T Schmidt', 'alex', 'alex23@yahoo.com', NULL, '$2y$10$nH1jrRp8z9GgEppCifP3KO7ioxr6p6fzUx0TKQ99vnA6CMEzftJZu', 'user10.jpg', '(936) 378-9918', 'RUFINO TAMAYO 26, ACAPATZINGO, 62440', NULL, 'user', 'active', '0', '0', NULL, NULL, NULL),
(11, 'Aidan Lowe', 'aidan', 'dyda@mailinator.com', NULL, '$2y$10$oRbb.gJBIWpDbVPdX5odYupObpKmm4AYozfrbtnHEpZHhD59mGg2e', '202307110809L3.PNG', '+1 (698) 176-4377', 'Qui id enim sed ut n.', NULL, 'agent', 'active', '0', '1', NULL, NULL, '2023-07-11 15:09:44'),
(12, 'Vincent Walton', 'vincent', 'likar@mailinator.com', NULL, '$2y$10$7WEcRoGzLvzi7wh/finFDuQj4RjEFcdJ28pZucheg3n6SZTZqY.CS', '202307110810L2.PNG', '+1 (744) 423-9738', 'Dolor similique volu.', NULL, 'agent', 'active', '0', '1', NULL, NULL, '2023-07-11 15:10:26'),
(13, 'Simone Sullivan', 'simone', 'ruxene@mailinator.com', NULL, '$2y$10$oDIJLE07yVDm9/saTlBB/u6V/t8mXROFrUOrhqa/30ozGNy7TOYUm', '202307110811L5.jpg', '+1 (265) 165-2699', 'Tempor autem sunt, n.', NULL, 'agent', 'active', '0', '1', NULL, NULL, '2023-07-11 15:11:20'),
(14, 'Carol Dorsey', 'carol', 'carolar@mailinator.com', NULL, '$2y$10$X6XAiUj/cMi.KQ6wqxdu3Ozf25FX3hT0.3t9Mp0am67nPLE60K6dC', '202307110811L4.jpg', '+1 (343) 981-3316', 'Hic sed dolorem labo.', NULL, 'agent', 'active', '0', '1', NULL, NULL, '2023-07-11 15:52:55'),
(16, 'user2', 'user2', 'user2@gmail.com', NULL, '$2y$10$pPxLvJHnXngKwP.SZbqnke9KH8p.8I32/0zyGJD0F5RXhYy37RJle', '20230718130892.jpg', '(664) 188-0604', 'Privada Esmeralda #3', NULL, 'user', 'active', '0', '1', NULL, '2023-07-18 20:04:33', '2023-07-18 20:08:06');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topbar_data`
--
ALTER TABLE `topbar_data`
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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `compares`
--
ALTER TABLE `compares`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `multi_images`
--
ALTER TABLE `multi_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `package_plans`
--
ALTER TABLE `package_plans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `property_messages`
--
ALTER TABLE `property_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `topbar_data`
--
ALTER TABLE `topbar_data`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
