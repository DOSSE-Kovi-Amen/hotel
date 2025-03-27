-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 27 mars 2025 à 17:02
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hotel`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Category 1', 'category-1', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(2, NULL, 1, 'Category 2', 'category-2', '2023-09-09 17:18:28', '2023-09-09 17:18:28');

-- --------------------------------------------------------

--
-- Structure de la table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(22, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(23, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(24, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(25, 4, 'name', 'text', 'Nom', 1, 1, 1, 1, 1, 1, '{}', 4),
(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:categories,slug\"}}', 5),
(27, 4, 'created_at', 'timestamp', 'Créé le', 0, 0, 1, 0, 0, 0, '{}', 6),
(28, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(30, 5, 'author_id', 'text', 'Auteur', 1, 0, 1, 1, 0, 1, '{}', 2),
(31, 5, 'category_id', 'text', 'Catégorie', 0, 0, 1, 1, 1, 0, '{}', 3),
(32, 5, 'title', 'text', 'Titre', 1, 1, 1, 1, 1, 1, '{}', 4),
(33, 5, 'excerpt', 'text_area', 'Extrait', 0, 0, 1, 1, 1, 1, '{}', 5),
(34, 5, 'body', 'rich_text_box', 'Contenu', 1, 0, 1, 1, 1, 1, '{}', 6),
(35, 5, 'image', 'image', 'Image', 0, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"sometimes|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|\"},\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"required|sometimes|unique:posts,slug\"}}', 8),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 0, 0, 1, 1, 1, 1, '{}', 9),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 0, 0, 1, 1, 1, 1, '{}', 10),
(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(40, 5, 'created_at', 'timestamp', 'Créé le', 0, 1, 1, 0, 0, 0, '{}', 12),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 13),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, '{}', 14),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, '{}', 15),
(73, 5, 'post_belongsto_category_relationship', 'relationship', 'categories', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"category_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":null}', 16),
(74, 9, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(75, 9, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(76, 9, 'medias', 'media_picker', 'Medias', 0, 1, 1, 1, 1, 1, '{\"max\":200,\"min\":0,\"expanded\":true,\"show_folders\":true,\"show_toolbar\":true,\"allow_upload\":true,\"allow_move\":true,\"allow_delete\":true,\"allow_create_folder\":true,\"allow_rename\":true,\"allow_crop\":true,\"allowed\":[],\"hide_thumbnails\":false,\"quality\":90,\"watermark\":{\"source\":\"...\",\"position\":\"top-left\",\"x\":0,\"y\":0}}', 3),
(77, 9, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 4),
(78, 9, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(91, 11, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(92, 11, 'title', 'text', 'Nom', 1, 1, 1, 1, 1, 1, '{}', 2),
(93, 11, 'content', 'rich_text_box', 'Description', 1, 0, 1, 1, 1, 1, '{}', 9),
(94, 11, 'images', 'multiple_images', 'Images', 1, 1, 1, 1, 1, 1, '{}', 3),
(95, 11, 'author_id', 'text', 'Author Id', 0, 0, 0, 0, 0, 0, '{}', 4),
(96, 11, 'created_at', 'timestamp', 'Crée le', 0, 1, 1, 0, 0, 0, '{}', 10),
(97, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(98, 11, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 0, 0, 0, 0, '{}', 6),
(99, 11, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true}}', 7),
(101, 11, 'price', 'number', 'Prix', 1, 1, 1, 1, 1, 1, '{}', 8),
(102, 11, 'room_belongsto_user_relationship', 'relationship', 'Auteur', 0, 1, 1, 0, 0, 1, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"author_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 11),
(103, 12, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(104, 12, 'image', 'image', 'Image', 1, 1, 1, 1, 1, 1, '{}', 2),
(105, 12, 'title', 'text', 'Titre', 0, 1, 1, 1, 1, 1, '{}', 3),
(106, 12, 'description', 'text', 'Description', 0, 1, 1, 1, 1, 1, '{}', 4),
(107, 12, 'order', 'text', 'Ordre', 0, 1, 1, 1, 1, 1, '{}', 5),
(108, 12, 'created_at', 'timestamp', 'Créé le', 0, 1, 1, 1, 0, 1, '{}', 6),
(109, 12, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(110, 13, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(111, 13, 'title', 'text', 'Titre', 0, 1, 1, 1, 1, 1, '{}', 2),
(112, 13, 'description', 'text', 'Description', 0, 1, 1, 1, 1, 1, '{}', 3),
(113, 13, 'images', 'multiple_images', 'Images', 0, 1, 1, 1, 1, 1, '{}', 4),
(114, 13, 'order', 'text', 'Ordre', 0, 1, 1, 1, 1, 1, '{}', 5),
(115, 13, 'created_at', 'timestamp', 'Créé le', 0, 1, 1, 1, 0, 1, '{}', 6),
(116, 13, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(117, 15, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(118, 15, 'title', 'text', 'Titre', 0, 1, 1, 1, 1, 1, '{}', 3),
(119, 15, 'excerpt', 'text', 'Extrait', 0, 1, 1, 1, 1, 1, '{}', 4),
(120, 15, 'description', 'rich_text_box', 'Description', 0, 1, 1, 1, 1, 1, '{}', 6),
(121, 15, 'images', 'multiple_images', 'Images', 0, 1, 1, 1, 1, 1, '{}', 2),
(122, 15, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 7),
(123, 15, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(124, 15, 'price', 'number', 'Prix', 0, 1, 1, 1, 1, 1, '{}', 5);

-- --------------------------------------------------------

--
-- Structure de la table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `display_name_singular` varchar(255) NOT NULL,
  `display_name_plural` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `model_name` varchar(255) DEFAULT NULL,
  `policy_name` varchar(255) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2022-10-16 15:10:24', '2022-10-16 15:10:24'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2022-10-16 15:10:24', '2022-10-16 15:10:24'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2022-10-16 15:10:24', '2022-10-16 15:10:24'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2022-10-16 15:10:25', '2022-10-19 08:39:34'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2022-10-16 15:10:25', '2023-09-09 18:16:49'),
(9, 'section_media', 'section-media', 'Section Medium', 'Section Media', NULL, 'App\\Models\\SectionMedia', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2023-09-10 18:19:16', '2023-09-10 18:35:36'),
(11, 'rooms', 'rooms', 'Chambre', 'Chambres', 'voyager-categories', 'App\\Models\\Room', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2025-01-08 23:18:36', '2025-01-08 23:46:51'),
(12, 'hero_sections', 'hero-sections', 'Bannière d\'accueil', 'Bannières d\'accueil', 'voyager-photos', 'App\\Models\\HeroSection', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2025-03-19 13:51:26', '2025-03-19 13:54:22'),
(13, 'galleries', 'galleries', 'Galerie', 'Galeries', 'voyager-book', 'App\\Models\\Gallery', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2025-03-25 04:45:51', '2025-03-25 04:46:46'),
(15, 'dishes', 'dishes', 'Plat', 'Plats', 'voyager-window-list', 'App\\Models\\Dish', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2025-03-26 05:32:38', '2025-03-26 06:20:13');

-- --------------------------------------------------------

--
-- Structure de la table `dishes`
--

CREATE TABLE `dishes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `excerpt` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `images` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `dishes`
--

INSERT INTO `dishes` (`id`, `title`, `excerpt`, `description`, `images`, `created_at`, `updated_at`, `price`) VALUES
(1, 'Riz cantonais', 'Un riz fait avec la sauce de Soja', '<p>Un riz fait avec la sauce de Soja</p>', '[\"dishes\\\\March2025\\\\qzhJggrdyj0l2PiC2BEi.jpg\"]', '2025-03-26 05:34:00', '2025-03-26 06:20:56', 15000),
(2, 'Frites', 'Frites au poulet', '<p>Frites au poulet</p>', '[\"dishes\\\\March2025\\\\NbSKWsKpPYDAu5nDcdH2.jpg\",\"dishes\\\\March2025\\\\VVFIFLrdhkW20wNdUq6H.jpg\",\"dishes\\\\March2025\\\\4pjyyqL39Kj1FlmlI1i7.jpg\"]', '2025-03-26 05:35:00', '2025-03-26 06:20:46', 2500.5);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `images` text DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `description`, `images`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Waou de très belles chambres à des prix abordables', 'N\'est-ce pas cool', '[\"galleries\\\\March2025\\\\ybF5Ezk3NFpPBZvREYkL.jpg\"]', NULL, '2025-03-25 04:47:11', '2025-03-25 04:47:11'),
(2, 'Waou de très belles chambres à des prix abordables', 'N\'est-ce pas cool', '[\"galleries\\\\March2025\\\\JmoUtQUIjaXQVVm95x8P.jpg\"]', NULL, '2025-03-25 04:47:38', '2025-03-25 04:47:38');

-- --------------------------------------------------------

--
-- Structure de la table `hero_sections`
--

CREATE TABLE `hero_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `hero_sections`
--

INSERT INTO `hero_sections` (`id`, `image`, `title`, `description`, `order`, `created_at`, `updated_at`) VALUES
(1, 'hero-sections\\March2025\\PtEGRabWRc1NXIfgAgze.jpg', 'Bienvenue chez chix palace', 'L\'hotel de la référence', NULL, '2025-03-19 14:12:33', '2025-03-19 14:12:33'),
(2, 'hero-sections\\March2025\\lxM5vGlN44WVbjTvZii8.jpg', 'Chic Palace l\'hôtel de vos rêves', 'C\'est chic', NULL, '2025-03-19 14:13:40', '2025-03-19 14:13:40'),
(3, 'hero-sections\\March2025\\xOZ8BgKIBNE2VQkvf6QU.jpg', 'Waou de très belles chambres à des prix abordables', 'N\'est-ce pas cool', NULL, '2025-03-19 14:26:54', '2025-03-19 14:26:54');

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2022-10-16 15:10:24', '2022-10-16 15:10:24');

-- --------------------------------------------------------

--
-- Structure de la table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `parameters` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Tableau de bord', '', '_self', 'voyager-boat', '#000000', NULL, 1, '2022-10-16 15:10:24', '2022-10-16 16:02:50', 'voyager.dashboard', 'null'),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, 5, 1, '2022-10-16 15:10:24', '2023-09-11 12:36:36', 'voyager.media.index', NULL),
(3, 1, 'Utilisateurs', '', '_self', 'voyager-person', '#000000', NULL, 5, '2022-10-16 15:10:24', '2025-01-08 23:19:10', 'voyager.users.index', 'null'),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 4, '2022-10-16 15:10:24', '2025-01-08 23:19:10', 'voyager.roles.index', NULL),
(5, 1, 'Outils', '', '_self', 'voyager-tools', '#000000', NULL, 7, '2022-10-16 15:10:24', '2025-01-08 23:19:10', NULL, ''),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 2, '2022-10-16 15:10:24', '2023-09-11 12:36:36', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 3, '2022-10-16 15:10:24', '2023-09-11 12:36:36', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 4, '2022-10-16 15:10:24', '2023-09-11 12:36:36', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 5, '2022-10-16 15:10:24', '2023-09-11 12:36:36', 'voyager.bread.index', NULL),
(10, 1, 'Paramètres', '', '_self', 'voyager-settings', '#000000', NULL, 8, '2022-10-16 15:10:24', '2025-01-08 23:19:10', 'voyager.settings.index', 'null'),
(11, 1, 'Categories', '', '_self', 'voyager-categories', NULL, 16, 1, '2022-10-16 15:10:25', '2022-10-19 17:52:01', 'voyager.categories.index', NULL),
(12, 1, 'Posts', '', '_self', 'voyager-news', NULL, 16, 2, '2022-10-16 15:10:25', '2022-10-19 17:52:03', 'voyager.posts.index', NULL),
(14, 1, 'Visiter le site', '/', '_self', 'voyager-world', '#000000', NULL, 9, '2022-10-18 16:26:12', '2025-01-08 23:19:10', NULL, ''),
(16, 1, 'Blog', '', '_self', 'voyager-edit', '#000000', NULL, 3, '2022-10-19 17:51:47', '2025-01-08 23:19:10', NULL, ''),
(18, 1, 'Section Media', '', '_self', 'voyager-images', '#000000', NULL, 6, '2023-09-10 18:19:16', '2025-01-08 23:19:10', 'voyager.section-media.index', 'null'),
(21, 1, 'Chambres', '', '_self', 'voyager-categories', NULL, NULL, 2, '2025-01-08 23:18:37', '2025-01-08 23:19:10', 'voyager.rooms.index', NULL),
(22, 1, 'Bannières d\'accueil', '', '_self', 'voyager-photos', NULL, NULL, 10, '2025-03-19 13:51:28', '2025-03-19 13:51:28', 'voyager.hero-sections.index', NULL),
(23, 1, 'Galeries', '', '_self', 'voyager-book', NULL, NULL, 11, '2025-03-25 04:45:52', '2025-03-25 04:45:52', 'voyager.galleries.index', NULL),
(25, 1, 'Plats', '', '_self', 'voyager-window-list', NULL, NULL, 12, '2025-03-26 05:32:39', '2025-03-26 05:32:39', 'voyager.dishes.index', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_01_01_000000_create_pages_table', 1),
(6, '2016_01_01_000000_create_posts_table', 1),
(7, '2016_02_15_204651_create_categories_table', 1),
(8, '2016_05_19_173453_create_menu_table', 1),
(9, '2016_10_21_190000_create_roles_table', 1),
(10, '2016_10_21_190000_create_settings_table', 1),
(11, '2016_11_30_135954_create_permission_table', 1),
(12, '2016_11_30_141208_create_permission_role_table', 1),
(13, '2016_12_26_201236_data_types__add__server_side', 1),
(14, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(15, '2017_01_14_005015_create_translations_table', 1),
(16, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(17, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(18, '2017_04_11_000000_alter_post_nullable_fields_table', 1),
(19, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(20, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(21, '2017_08_05_000000_add_group_to_settings_table', 1),
(22, '2017_11_26_013050_add_user_role_relationship', 1),
(23, '2017_11_26_015000_create_user_roles_table', 1),
(24, '2018_03_11_000000_add_user_settings', 1),
(25, '2018_03_14_000000_add_details_to_data_types_table', 1),
(26, '2018_03_16_000000_make_settings_value_nullable', 1),
(27, '2019_08_19_000000_create_failed_jobs_table', 1),
(28, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'koviamendosse3@gmail.com', '2022-10-19 17:42:11', '2022-10-19 17:42:11'),
(2, 'admin@admin.com', '2023-09-09 18:34:05', '2023-09-09 18:34:05');

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `excerpt` text DEFAULT NULL,
  `body` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2023-09-09 17:18:29', '2023-09-09 17:18:29');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `table_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2023-09-09 17:18:27', '2023-09-09 17:18:27'),
(2, 'browse_bread', NULL, '2023-09-09 17:18:27', '2023-09-09 17:18:27'),
(3, 'browse_database', NULL, '2023-09-09 17:18:27', '2023-09-09 17:18:27'),
(4, 'browse_media', NULL, '2023-09-09 17:18:27', '2023-09-09 17:18:27'),
(5, 'browse_compass', NULL, '2023-09-09 17:18:27', '2023-09-09 17:18:27'),
(6, 'browse_menus', 'menus', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(7, 'read_menus', 'menus', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(8, 'edit_menus', 'menus', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(9, 'add_menus', 'menus', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(10, 'delete_menus', 'menus', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(11, 'browse_roles', 'roles', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(12, 'read_roles', 'roles', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(13, 'edit_roles', 'roles', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(14, 'add_roles', 'roles', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(15, 'delete_roles', 'roles', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(16, 'browse_users', 'users', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(17, 'read_users', 'users', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(18, 'edit_users', 'users', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(19, 'add_users', 'users', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(20, 'delete_users', 'users', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(21, 'browse_settings', 'settings', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(22, 'read_settings', 'settings', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(23, 'edit_settings', 'settings', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(24, 'add_settings', 'settings', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(25, 'delete_settings', 'settings', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(26, 'browse_categories', 'categories', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(27, 'read_categories', 'categories', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(28, 'edit_categories', 'categories', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(29, 'add_categories', 'categories', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(30, 'delete_categories', 'categories', '2023-09-09 17:18:28', '2023-09-09 17:18:28'),
(31, 'browse_posts', 'posts', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(32, 'read_posts', 'posts', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(33, 'edit_posts', 'posts', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(34, 'add_posts', 'posts', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(35, 'delete_posts', 'posts', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(36, 'browse_pages', 'pages', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(37, 'read_pages', 'pages', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(38, 'edit_pages', 'pages', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(39, 'add_pages', 'pages', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(40, 'delete_pages', 'pages', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(51, 'browse_section_media', 'section_media', '2023-09-10 18:19:16', '2023-09-10 18:19:16'),
(52, 'read_section_media', 'section_media', '2023-09-10 18:19:16', '2023-09-10 18:19:16'),
(53, 'edit_section_media', 'section_media', '2023-09-10 18:19:16', '2023-09-10 18:19:16'),
(54, 'add_section_media', 'section_media', '2023-09-10 18:19:16', '2023-09-10 18:19:16'),
(55, 'delete_section_media', 'section_media', '2023-09-10 18:19:16', '2023-09-10 18:19:16'),
(61, 'browse_rooms', 'rooms', '2025-01-08 23:18:36', '2025-01-08 23:18:36'),
(62, 'read_rooms', 'rooms', '2025-01-08 23:18:37', '2025-01-08 23:18:37'),
(63, 'edit_rooms', 'rooms', '2025-01-08 23:18:37', '2025-01-08 23:18:37'),
(64, 'add_rooms', 'rooms', '2025-01-08 23:18:37', '2025-01-08 23:18:37'),
(65, 'delete_rooms', 'rooms', '2025-01-08 23:18:37', '2025-01-08 23:18:37'),
(66, 'browse_hero_sections', 'hero_sections', '2025-03-19 13:51:28', '2025-03-19 13:51:28'),
(67, 'read_hero_sections', 'hero_sections', '2025-03-19 13:51:28', '2025-03-19 13:51:28'),
(68, 'edit_hero_sections', 'hero_sections', '2025-03-19 13:51:28', '2025-03-19 13:51:28'),
(69, 'add_hero_sections', 'hero_sections', '2025-03-19 13:51:28', '2025-03-19 13:51:28'),
(70, 'delete_hero_sections', 'hero_sections', '2025-03-19 13:51:28', '2025-03-19 13:51:28'),
(71, 'browse_galleries', 'galleries', '2025-03-25 04:45:52', '2025-03-25 04:45:52'),
(72, 'read_galleries', 'galleries', '2025-03-25 04:45:52', '2025-03-25 04:45:52'),
(73, 'edit_galleries', 'galleries', '2025-03-25 04:45:52', '2025-03-25 04:45:52'),
(74, 'add_galleries', 'galleries', '2025-03-25 04:45:52', '2025-03-25 04:45:52'),
(75, 'delete_galleries', 'galleries', '2025-03-25 04:45:52', '2025-03-25 04:45:52'),
(81, 'browse_dishes', 'dishes', '2025-03-26 05:32:39', '2025-03-26 05:32:39'),
(82, 'read_dishes', 'dishes', '2025-03-26 05:32:39', '2025-03-26 05:32:39'),
(83, 'edit_dishes', 'dishes', '2025-03-26 05:32:39', '2025-03-26 05:32:39'),
(84, 'add_dishes', 'dishes', '2025-03-26 05:32:39', '2025-03-26 05:32:39'),
(85, 'delete_dishes', 'dishes', '2025-03-26 05:32:39', '2025-03-26 05:32:39');

-- --------------------------------------------------------

--
-- Structure de la table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1);

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `excerpt` text DEFAULT NULL,
  `body` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `status` enum('PUBLISHED','DRAFT','PENDING') NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Lorem Ipsum Post', '', 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2023-09-09 17:18:29', '2023-09-09 18:10:38'),
(2, 1, 2, 'My Sample Post', '', 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\n<h2>We can use all kinds of format!</h2>\n<p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2023-09-09 17:18:29', '2023-09-09 18:19:29'),
(3, 1, 1, 'Latest Post', '', 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 1, '2023-09-09 17:18:29', '2023-09-09 17:55:10'),
(4, 0, NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\r\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\r\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/post4.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2023-09-09 17:18:29', '2023-09-09 17:18:29');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrateur', '2023-09-09 17:18:27', '2023-09-09 17:18:27'),
(2, 'user', 'Utilisateur standard', '2023-09-09 17:18:27', '2023-09-09 17:18:27');

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `images` text NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `slug` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `rooms`
--

INSERT INTO `rooms` (`id`, `title`, `content`, `images`, `author_id`, `created_at`, `updated_at`, `deleted_at`, `slug`, `price`) VALUES
(4, 'c23', '<ul>\r\n<li class=\"b_ans b_top b_topborder\" style=\"border: none; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px 0px 12px; padding: 15px 19px 10px; color: #444444; background-color: #ffffff; border-radius: 6px; box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px; font-family: Roboto, Helvetica, sans-serif; font-size: 14px;\" data-fbhlsel=\"li.b_ans.b_top\" data-bm=\"5\">\r\n<div data-ajax=\"TranslateThis\" data-ajax-pig=\"6EE45C25530744F2876E115F1952E87D\">\r\n<div id=\"tt_perajx\">\r\n<div class=\"b_sideBleed b_topBleed\" style=\"margin-left: -19px; margin-right: -19px; margin-top: -15px;\">\r\n<div id=\"tta_container\" class=\"tta_mop  tta_user_clicking\">\r\n<div id=\"tt_txtContrl\">&lt;div id=\"rich_tta\" data-iid=\"SERP.5506\" )\"=\"\" class=\" ttastable\"&gt;\r\n<table class=\"tta_tbl\" style=\"border-top: 0px; border-right: 0px; border-left: 0px; border-bottom-style: solid; border-bottom-color: #ececec; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px; width: 647.986px; overflow-wrap: break-word; position: relative; table-layout: fixed;\" role=\"presentation\">\r\n<tbody>\r\n<tr style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px;\">\r\n<td class=\"tta_incell\" style=\"border-width: 0px 1px 0px 0px; border-image: initial; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px; vertical-align: top; width: 323.698px; position: relative; background-clip: padding-box; border-top-left-radius: 6px; border-color: initial #ececec initial initial; border-style: initial solid initial initial;\">\r\n<div id=\"tta_in\">\r\n<div class=\"t_inputoptions t_DDWrapper\" style=\"margin: 10px 52px 0px 20px;\"><select id=\"tta_srcsl\" class=\"tta_defaultSelectBoxWidth\" style=\"color: #1a0dab; border-color: #dddddd; outline: none; padding: 0px 28px 0px 20px; height: 28px; border-radius: 20px; width: 100px; margin: 0px; background-color: #ffffff; min-width: 100%; max-width: 100%; background-size: 15px; background-position: calc(100% - 16px) center; background-repeat: no-repeat; appearance: none; line-height: 20px; text-overflow: ellipsis; white-space: nowrap; overflow: hidden;\" data-tag=\"selectControl.Input\" aria-describedby=\"srcDropDownDescription\" aria-label=\"Menu d&eacute;roulant de s&eacute;lection de la langue de saisie\">\r\n<optgroup id=\"t_srcRecentLang\" class=\"\" style=\"color: #666666;\" label=\"Utilis&eacute;es r&eacute;cemment\">\r\n<option value=\"auto-detect\" aria-label=\"Utilis&eacute;es r&eacute;cemment D&eacute;tection automatique\">D&eacute;tection automatique</option>\r\n<option value=\"fr\" aria-label=\"Fran&ccedil;ais\">Fran&ccedil;ais</option>\r\n<option value=\"en\" aria-label=\"Anglais\">Anglais</option>\r\n</optgroup>\r\n<optgroup id=\"t_srcAllLang\" style=\"color: #666666;\" label=\"Toutes les langues\">\r\n<option value=\"af\" aria-label=\"Toutes les langues Afrikaans\">Afrikaans</option>\r\n<option value=\"sq\" aria-label=\"Albanais\">Albanais</option>\r\n<option value=\"de\" aria-label=\"Allemand\">Allemand</option>\r\n<option value=\"am\" aria-label=\"Amharique\">Amharique</option>\r\n<option value=\"en\" aria-label=\"Anglais\">Anglais</option>\r\n<option value=\"ar\" aria-label=\"Arabe\">Arabe</option>\r\n<option value=\"hy\" aria-label=\"Arm&eacute;nien\">Arm&eacute;nien</option>\r\n<option value=\"as\" aria-label=\"Assamais\">Assamais</option>\r\n<option value=\"az\" aria-label=\"Azerba&iuml;djanais\">Azerba&iuml;djanais</option>\r\n<option value=\"ba\" aria-label=\"Bashkir\">Bashkir</option>\r\n<option value=\"eu\" aria-label=\"Basque\">Basque</option>\r\n<option value=\"bn\" aria-label=\"Bengali\">Bengali</option>\r\n<option value=\"my\" aria-label=\"Birman\">Birman</option>\r\n<option value=\"bs\" aria-label=\"Bosniaque\">Bosniaque</option>\r\n<option value=\"bg\" aria-label=\"Bulgare\">Bulgare</option>\r\n<option value=\"yue\" aria-label=\"Cantonais (Traditionnel)\">Cantonais (Traditionnel)</option>\r\n<option value=\"ca\" aria-label=\"Catalan\">Catalan</option>\r\n<option value=\"lzh\" aria-label=\"Chinese (Literary)\">Chinese (Literary)</option>\r\n<option value=\"zh-Hans\" aria-label=\"Chinois (Simplifi&eacute;)\">Chinois (Simplifi&eacute;)</option>\r\n<option value=\"zh-Hant\" aria-label=\"Chinois (Traditionnel)\">Chinois (Traditionnel)</option>\r\n<option value=\"ko\" aria-label=\"Cor&eacute;en\">Cor&eacute;en</option>\r\n<option value=\"hr\" aria-label=\"Croate\">Croate</option>\r\n<option value=\"ht\" aria-label=\"Cr&eacute;ole Ha&iuml;tien\">Cr&eacute;ole Ha&iuml;tien</option>\r\n<option value=\"da\" aria-label=\"Danois\">Danois</option>\r\n<option value=\"prs\" aria-label=\"Dari\">Dari</option>\r\n<option value=\"es\" aria-label=\"Espagnol\">Espagnol</option>\r\n<option value=\"et\" aria-label=\"Estonien\">Estonien</option>\r\n<option value=\"fo\" aria-label=\"Faroese\">Faroese</option>\r\n<option value=\"fj\" aria-label=\"Fidjien\">Fidjien</option>\r\n<option value=\"fil\" aria-label=\"Filipino\">Filipino</option>\r\n<option value=\"fi\" aria-label=\"Finnois\">Finnois</option>\r\n<option value=\"fr\" aria-label=\"Fran&ccedil;ais\">Fran&ccedil;ais</option>\r\n<option value=\"fr-CA\" aria-label=\"Fran&ccedil;ais (Canada)\">Fran&ccedil;ais (Canada)</option>\r\n<option value=\"gl\" aria-label=\"Galician\">Galician</option>\r\n<option value=\"cy\" aria-label=\"Gallois\">Gallois</option>\r\n<option value=\"gu\" aria-label=\"Goudjarati\">Goudjarati</option>\r\n<option value=\"el\" aria-label=\"Grec\">Grec</option>\r\n<option value=\"ka\" aria-label=\"G&eacute;orgien\">G&eacute;orgien</option>\r\n<option value=\"hi\" aria-label=\"Hindi\">Hindi</option>\r\n<option value=\"mww\" aria-label=\"Hmong\">Hmong</option>\r\n<option value=\"hu\" aria-label=\"Hongrois\">Hongrois</option>\r\n<option value=\"he\" aria-label=\"H&eacute;breu\">H&eacute;breu</option>\r\n<option value=\"id\" aria-label=\"Indon&eacute;sien\">Indon&eacute;sien</option>\r\n<option value=\"ikt\" aria-label=\"Inuinnaqtun\">Inuinnaqtun</option>\r\n<option value=\"iu\" aria-label=\"Inuktitut\">Inuktitut</option>\r\n<option value=\"iu-Latn\" aria-label=\"Inuktitut (Latin)\">Inuktitut (Latin)</option>\r\n<option value=\"ga\" aria-label=\"Irlandais\">Irlandais</option>\r\n<option value=\"is\" aria-label=\"Islandais\">Islandais</option>\r\n<option value=\"it\" aria-label=\"Italien\">Italien</option>\r\n<option value=\"ja\" aria-label=\"Japonais\">Japonais</option>\r\n<option value=\"kn\" aria-label=\"Kannada\">Kannada</option>\r\n<option value=\"kk\" aria-label=\"Kazakh\">Kazakh</option>\r\n<option value=\"km\" aria-label=\"Khmer\">Khmer</option>\r\n<option value=\"tlh-Latn\" aria-label=\"Klingon (Latin)\">Klingon (Latin)</option>\r\n<option value=\"ku\" aria-label=\"Kurde (central)\">Kurde (central)</option>\r\n<option value=\"kmr\" aria-label=\"Kurde (septentrional)\">Kurde (septentrional)</option>\r\n<option value=\"ky\" aria-label=\"Kyrgyz\">Kyrgyz</option>\r\n<option value=\"lo\" aria-label=\"Lao\">Lao</option>\r\n<option value=\"lv\" aria-label=\"Letton\">Letton</option>\r\n<option value=\"lt\" aria-label=\"Lituanien\">Lituanien</option>\r\n<option value=\"mk\" aria-label=\"Mac&eacute;donien\">Mac&eacute;donien</option>\r\n<option value=\"ms\" aria-label=\"Malais\">Malais</option>\r\n<option value=\"ml\" aria-label=\"Malayalam\">Malayalam</option>\r\n<option value=\"dv\" aria-label=\"Maldivien\">Maldivien</option>\r\n<option value=\"mg\" aria-label=\"Malgache\">Malgache</option>\r\n<option value=\"mt\" aria-label=\"Maltais\">Maltais</option>\r\n<option value=\"mi\" aria-label=\"Maori\">Maori</option>\r\n<option value=\"mr\" aria-label=\"Marathi\">Marathi</option>\r\n<option value=\"yua\" aria-label=\"Maya Yucat&egrave;que\">Maya Yucat&egrave;que</option>\r\n<option value=\"mn-Cyrl\" aria-label=\"Mongolian (Cyrillic)\">Mongolian (Cyrillic)</option>\r\n<option value=\"mn-Mong\" aria-label=\"Mongolian (Traditional)\">Mongolian (Traditional)</option>\r\n<option value=\"nb\" aria-label=\"Norv&eacute;gien Bokm&aring;l\">Norv&eacute;gien Bokm&aring;l</option>\r\n<option value=\"nl\" aria-label=\"N&eacute;erlandais\">N&eacute;erlandais</option>\r\n<option value=\"ne\" aria-label=\"N&eacute;palais\">N&eacute;palais</option>\r\n<option value=\"or\" aria-label=\"Odia\">Odia</option>\r\n<option value=\"otq\" aria-label=\"Otomi De Quer&eacute;taro\">Otomi De Quer&eacute;taro</option>\r\n<option value=\"ur\" aria-label=\"Ourdou\">Ourdou</option>\r\n<option value=\"uz\" aria-label=\"Ouzbek\">Ouzbek</option>\r\n<option value=\"ug\" aria-label=\"Ou&iuml;ghour\">Ou&iuml;ghour</option>\r\n<option value=\"ps\" aria-label=\"Pachto\">Pachto</option>\r\n<option value=\"pa\" aria-label=\"Pendjabi\">Pendjabi</option>\r\n<option value=\"fa\" aria-label=\"Persan\">Persan</option>\r\n<option value=\"pl\" aria-label=\"Polonais\">Polonais</option>\r\n<option value=\"pt\" aria-label=\"Portugais (Br&eacute;sil)\">Portugais (Br&eacute;sil)</option>\r\n<option value=\"pt-PT\" aria-label=\"Portugais (Portugal)\">Portugais (Portugal)</option>\r\n<option value=\"ro\" aria-label=\"Roumain\">Roumain</option>\r\n<option value=\"ru\" aria-label=\"Russe\">Russe</option>\r\n<option value=\"sm\" aria-label=\"Samoan\">Samoan</option>\r\n<option value=\"sr-Cyrl\" aria-label=\"Serbe (Cyrillique)\">Serbe (Cyrillique)</option>\r\n<option value=\"sr-Latn\" aria-label=\"Serbe (Latin)\">Serbe (Latin)</option>\r\n<option value=\"sk\" aria-label=\"Slovaque\">Slovaque</option>\r\n<option value=\"sl\" aria-label=\"Slov&egrave;ne\">Slov&egrave;ne</option>\r\n<option value=\"so\" aria-label=\"Somali\">Somali</option>\r\n<option value=\"sv\" aria-label=\"Su&eacute;dois\">Su&eacute;dois</option>\r\n<option value=\"sw\" aria-label=\"Swahili\">Swahili</option>\r\n<option value=\"ty\" aria-label=\"Tahitien\">Tahitien</option>\r\n<option value=\"ta\" aria-label=\"Tamoul\">Tamoul</option>\r\n<option value=\"tt\" aria-label=\"Tatar\">Tatar</option>\r\n<option value=\"cs\" aria-label=\"Tch&egrave;que\">Tch&egrave;que</option>\r\n<option value=\"th\" aria-label=\"Tha&iuml;\">Tha&iuml;</option>\r\n<option value=\"bo\" aria-label=\"Tib&eacute;tain\">Tib&eacute;tain</option>\r\n<option value=\"ti\" aria-label=\"Tigrigna\">Tigrigna</option>\r\n<option value=\"to\" aria-label=\"Tongien\">Tongien</option>\r\n<option value=\"tr\" aria-label=\"Turc\">Turc</option>\r\n<option value=\"tk\" aria-label=\"Turkm&egrave;ne\">Turkm&egrave;ne</option>\r\n<option value=\"te\" aria-label=\"T&eacute;lougou\">T&eacute;lougou</option>\r\n<option value=\"uk\" aria-label=\"Ukrainien\">Ukrainien</option>\r\n<option value=\"hsb\" aria-label=\"Upper Sorbian\">Upper Sorbian</option>\r\n<option value=\"vi\" aria-label=\"Vietnamien\">Vietnamien</option>\r\n<option value=\"zu\" aria-label=\"Zoulou\">Zoulou</option>\r\n</optgroup>\r\n</select></div>\r\n<div class=\"b_hide b_footnote tta_dtct\" style=\"color: #767676; display: inline-block; padding: 8px 0px 0px 40px; font-size: 11px; line-height: 16px; position: absolute;\"><span id=\"tta_asp\"></span><a id=\"tta_as\" style=\"color: #1a0dab; cursor: pointer;\" tabindex=\"\" title=\"\" role=\"button\" aria-label=\"\"></a></div>\r\n<div class=\"tta_intxt\" style=\"min-height: 88px; height: auto; overflow: visible; padding: 24px 52px 40px 20px;\">\r\n<div class=\"tta_incontainer\">\r\n<div id=\"tta_input\" class=\"suggDD tta_suggDDWithClearBtn\" dir=\"ltr\" style=\"position: relative; width: 251.701px; height: 48px;\" data-sgenabled=\"true\" data-sglsv=\" en cours\" data-sgac=\"false\" data-sgurl=\"/tsuggestions?text={query}\" data-sgparams=\"&amp;lang=fr\" data-default-results-url=\"\"><textarea id=\"tta_input_ta\" class=\"ctxt                                  b_focusTextMedium\" dir=\"ltr\" lang=\"fr\" style=\"font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 40px; font-family: Roboto, sans-serif; color: #111111; padding: 0px; outline: none; height: 47.9861px; border-radius: 2px; width: 251.701px; resize: none; overflow: hidden; min-height: 48px; margin: 0px; appearance: none; box-sizing: border-box; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: initial none initial;\" placeholder=\"Entrer du texte\" aria-label=\"Zone de texte d&rsquo;entr&eacute;e\" aria-autocomplete=\"list\" data-bm=\"54\"></textarea></div>\r\n<div id=\"tta_clear_cnt\" class=\"\" dir=\"ltr\" style=\"height: 16px; width: 16px; position: absolute; left: 275.139px; top: 73px;\" data-priority=\"2\">\r\n<div id=\"infobubble_item_9_D60701\" class=\"infobubble_item infobubble_tooltip\" data-bubbleid=\"infobubble_9_D60701\">\r\n<div id=\"tta_clear\" style=\"cursor: pointer; height: 16px; width: 16px;\" tabindex=\"0\" role=\"button\" aria-label=\"Cliquez pour effacer\" data-priority=\"2\"></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"t_inputoptions t_inputhelperoptions\" style=\"margin: 0px 0px 12px; position: absolute; bottom: 0px; right: 0px;\">\r\n<div class=\"t_secOptions b_clearfix\" style=\"float: right; margin-right: 12px;\">\r\n<div id=\"infobubble_item_10_D61664\" class=\"infobubble_item infobubble_tooltip\" style=\"float: left;\" data-bubbleid=\"infobubble_10_D61664\">\r\n<div class=\"\">\r\n<div id=\"tta_playiconsrc\" class=\"t_option\" style=\"cursor: pointer; padding: 10px; border-radius: 50%; display: inline-block;\" tabindex=\"0\" role=\"button\" aria-label=\"&Eacute;couter\"></div>\r\n</div>\r\n</div>\r\n<div id=\"tta_speechiconsrc\" class=\" hasmic\" lang=\"fr-FR\" style=\"float: left; height: 40px; width: 40px;\" data-tag=\"TranslateThis.Mic\" data-priority=\"2\">\r\n<div id=\"infobubble_item_11_D616D2\" class=\"infobubble_item infobubble_tooltip\" data-bubbleid=\"infobubble_11_D616D2\">\r\n<div class=\"mic_cont icon partner t_option\" style=\"cursor: pointer; display: inline-block; vertical-align: middle; margin: 0px; padding: 0px; border-radius: 50%; background: transparent; height: 40px; width: 40px;\" data-priority=\"2\" data-preload=\"true\">\r\n<div id=\"vs_mic_icon\" class=\"mic_icon sb_icon disabled\" style=\"margin: 0px; height: 40px; width: 40px; background-size: 20px 20px; background-repeat: no-repeat; background-position: center center; z-index: 0; float: left; display: inherit; padding: 0px;\"></div>\r\n<div class=\"ovr_cont\" style=\"width: 40px; height: 40px;\">\r\n<div class=\"b_icon tooltip\" style=\"width: 40px; height: 40px; z-index: 0; position: relative; visibility: visible;\" tabindex=\"0\" role=\"button\" aria-label=\"Parler pour traduire\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\"infobubble_locator_11_D616D2\" class=\"infobubble_locator\" style=\"position: relative; vertical-align: middle; width: 145px; margin-left: -50px; display: inline-block;\"></div>\r\n</div>\r\n<div class=\"t_keyboard_div\" style=\"float: left;\" data-priority=\"2\">\r\n<div id=\"infobubble_item_12_D62A3A\" class=\"infobubble_item infobubble_tooltip\" data-bubbleid=\"infobubble_12_D62A3A\">\r\n<div class=\"tvkeyIcon tvkeyRest\" lang=\"fr\" style=\"padding: 20px; background-position: center center; background-repeat: no-repeat; cursor: pointer; display: inline-block; height: auto; top: 6px; background-image: url(\'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAoCAYAAACFFRgXAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAFXSURBVFhH7ZjBacMwFIZtqfdce80EycEDdJOmYPC1194yQq4GQ9sNOkIXMDgjZIQMYJL/yS/BVWSES0Wfgj4I0pOQ8vEinhxniUTk5NxmVVVt+r5/1VqveEgEcNrDaVfX9QfFRhiyFDxTXzCfkN7klFkE78OYeF4UHQMOxEOulOETxxdM6rn/r7iOquL2ihRZwuVyIyydJBya6IQfuJ2kLMs1bppv6qOsPDVN05kJZsb8YhiZ5Ohab+PN8OjLFhexMTPmfTjX29zfGaafCc2RPtz/wYx5H871Njc3HYr19QlOArZfKmuhiU74L+vwr+qsb38bb4ZHMkHqrG9/m/s7w6M6GqTO+va3SXU4NEk4NPEL819rEbhcctw0HQq2qPdpU6Ds7RVkdxyLh1x127ZdURRLxOthWCz0RmqrqQfpL0gfkPKlUurRTAvBHAOl3kiWhxKJiMmyM+tPwNnfPWzyAAAAAElFTkSuQmCC\'); background-size: 20px;\" tabindex=\"0\" role=\"button\" aria-label=\"Cliquez pour ouvrir Softkeyboard\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"t_charCountCont\" style=\"position: absolute; left: 20px; bottom: 25px; color: #666666;\">&nbsp;</div>\r\n</td>\r\n<td class=\"tta_swapcell\" style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px; vertical-align: top;\">\r\n<div class=\"tta_swap\" style=\"margin-top: 112px;\">\r\n<div id=\"infobubble_item_8_D605E4\" class=\"infobubble_item infobubble_tooltip\" data-bubbleid=\"infobubble_8_D605E4\">\r\n<div id=\"tta_revIcon\" class=\"ttrev_icon tta_no_click_outline\" style=\"border-bottom: 1px solid #ececec; box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px, rgba(0, 0, 0, 0.1) 0px 2px 3px 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 100%; position: absolute; margin-left: -16px; top: 75px; z-index: 2; outline: none;\" tabindex=\"0\" role=\"button\" aria-label=\"Changer de langue\"></div>\r\n</div>\r\n<div id=\"infobubble_locator_8_D605E4\" class=\"infobubble_locator\" style=\"position: relative; vertical-align: top; width: 130px; top: 10px; margin-left: -60px;\"></div>\r\n</div>\r\n</td>\r\n<td class=\"tta_outcell\" style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px; vertical-align: top; width: 323.715px; position: relative; background: #f7f7f7; border-top-right-radius: 6px;\">\r\n<div id=\"tta_out\" class=\"tta_vc\">\r\n<div id=\"tta_outoption\" class=\"t_outputoptions t_DDWrapper\" style=\"margin: 10px 20px 0px 52px;\"><select id=\"tta_tgtsl\" class=\"tta_defaultSelectBoxWidth\" style=\"color: #1a0dab; border-color: #dddddd; outline: none; padding: 0px 28px 0px 20px; height: 28px; border-radius: 20px; width: 100px; margin: 0px; background-color: #ffffff; min-width: 100%; max-width: 100%; background-size: 15px; background-position: calc(100% - 16px) center; background-repeat: no-repeat; appearance: none; line-height: 20px; text-overflow: ellipsis; white-space: nowrap; overflow: hidden;\" data-tag=\"selectControl.Input\" aria-describedby=\"tgtDropDownDescription\" aria-label=\"Menu d&eacute;roulant de s&eacute;lection de la langue de sortie\">\r\n<optgroup id=\"t_tgtRecentLang\" class=\"\" style=\"color: #666666;\" label=\"Utilis&eacute;es r&eacute;cemment\">\r\n<option value=\"en\" aria-label=\"Utilis&eacute;es r&eacute;cemment Anglais\">Anglais</option>\r\n<option value=\"fr\" aria-label=\"Fran&ccedil;ais\">Fran&ccedil;ais</option>\r\n</optgroup>\r\n<optgroup id=\"t_tgtAllLang\" style=\"color: #666666;\" label=\"Toutes les langues\">\r\n<option value=\"af\" aria-label=\"Toutes les langues Afrikaans\">Afrikaans</option>\r\n<option value=\"sq\" aria-label=\"Albanais\">Albanais</option>\r\n<option value=\"de\" aria-label=\"Allemand\">Allemand</option>\r\n<option value=\"am\" aria-label=\"Amharique\">Amharique</option>\r\n<option value=\"en\" aria-label=\"Anglais\">Anglais</option>\r\n<option value=\"ar\" aria-label=\"Arabe\">Arabe</option>\r\n<option value=\"hy\" aria-label=\"Arm&eacute;nien\">Arm&eacute;nien</option>\r\n<option value=\"as\" aria-label=\"Assamais\">Assamais</option>\r\n<option value=\"az\" aria-label=\"Azerba&iuml;djanais\">Azerba&iuml;djanais</option>\r\n<option value=\"ba\" aria-label=\"Bashkir\">Bashkir</option>\r\n<option value=\"eu\" aria-label=\"Basque\">Basque</option>\r\n<option value=\"bn\" aria-label=\"Bengali\">Bengali</option>\r\n<option value=\"my\" aria-label=\"Birman\">Birman</option>\r\n<option value=\"bs\" aria-label=\"Bosniaque\">Bosniaque</option>\r\n<option value=\"bg\" aria-label=\"Bulgare\">Bulgare</option>\r\n<option value=\"yue\" aria-label=\"Cantonais (Traditionnel)\">Cantonais (Traditionnel)</option>\r\n<option value=\"ca\" aria-label=\"Catalan\">Catalan</option>\r\n<option value=\"lzh\" aria-label=\"Chinese (Literary)\">Chinese (Literary)</option>\r\n<option value=\"zh-Hans\" aria-label=\"Chinois (Simplifi&eacute;)\">Chinois (Simplifi&eacute;)</option>\r\n<option value=\"zh-Hant\" aria-label=\"Chinois (Traditionnel)\">Chinois (Traditionnel)</option>\r\n<option value=\"ko\" aria-label=\"Cor&eacute;en\">Cor&eacute;en</option>\r\n<option value=\"hr\" aria-label=\"Croate\">Croate</option>\r\n<option value=\"ht\" aria-label=\"Cr&eacute;ole Ha&iuml;tien\">Cr&eacute;ole Ha&iuml;tien</option>\r\n<option value=\"da\" aria-label=\"Danois\">Danois</option>\r\n<option value=\"prs\" aria-label=\"Dari\">Dari</option>\r\n<option value=\"es\" aria-label=\"Espagnol\">Espagnol</option>\r\n<option value=\"et\" aria-label=\"Estonien\">Estonien</option>\r\n<option value=\"fo\" aria-label=\"Faroese\">Faroese</option>\r\n<option value=\"fj\" aria-label=\"Fidjien\">Fidjien</option>\r\n<option value=\"fil\" aria-label=\"Filipino\">Filipino</option>\r\n<option value=\"fi\" aria-label=\"Finnois\">Finnois</option>\r\n<option value=\"fr\" aria-label=\"Fran&ccedil;ais\">Fran&ccedil;ais</option>\r\n<option value=\"fr-CA\" aria-label=\"Fran&ccedil;ais (Canada)\">Fran&ccedil;ais (Canada)</option>\r\n<option value=\"gl\" aria-label=\"Galician\">Galician</option>\r\n<option value=\"cy\" aria-label=\"Gallois\">Gallois</option>\r\n<option value=\"gu\" aria-label=\"Goudjarati\">Goudjarati</option>\r\n<option value=\"el\" aria-label=\"Grec\">Grec</option>\r\n<option value=\"ka\" aria-label=\"G&eacute;orgien\">G&eacute;orgien</option>\r\n<option value=\"hi\" aria-label=\"Hindi\">Hindi</option>\r\n<option value=\"mww\" aria-label=\"Hmong\">Hmong</option>\r\n<option value=\"hu\" aria-label=\"Hongrois\">Hongrois</option>\r\n<option value=\"he\" aria-label=\"H&eacute;breu\">H&eacute;breu</option>\r\n<option value=\"id\" aria-label=\"Indon&eacute;sien\">Indon&eacute;sien</option>\r\n<option value=\"ikt\" aria-label=\"Inuinnaqtun\">Inuinnaqtun</option>\r\n<option value=\"iu\" aria-label=\"Inuktitut\">Inuktitut</option>\r\n<option value=\"iu-Latn\" aria-label=\"Inuktitut (Latin)\">Inuktitut (Latin)</option>\r\n<option value=\"ga\" aria-label=\"Irlandais\">Irlandais</option>\r\n<option value=\"is\" aria-label=\"Islandais\">Islandais</option>\r\n<option value=\"it\" aria-label=\"Italien\">Italien</option>\r\n<option value=\"ja\" aria-label=\"Japonais\">Japonais</option>\r\n<option value=\"kn\" aria-label=\"Kannada\">Kannada</option>\r\n<option value=\"kk\" aria-label=\"Kazakh\">Kazakh</option>\r\n<option value=\"km\" aria-label=\"Khmer\">Khmer</option>\r\n<option value=\"tlh-Latn\" aria-label=\"Klingon (Latin)\">Klingon (Latin)</option>\r\n<option value=\"ku\" aria-label=\"Kurde (central)\">Kurde (central)</option>\r\n<option value=\"kmr\" aria-label=\"Kurde (septentrional)\">Kurde (septentrional)</option>\r\n<option value=\"ky\" aria-label=\"Kyrgyz\">Kyrgyz</option>\r\n<option value=\"lo\" aria-label=\"Lao\">Lao</option>\r\n<option value=\"lv\" aria-label=\"Letton\">Letton</option>\r\n<option value=\"lt\" aria-label=\"Lituanien\">Lituanien</option>\r\n<option value=\"mk\" aria-label=\"Mac&eacute;donien\">Mac&eacute;donien</option>\r\n<option value=\"ms\" aria-label=\"Malais\">Malais</option>\r\n<option value=\"ml\" aria-label=\"Malayalam\">Malayalam</option>\r\n<option value=\"dv\" aria-label=\"Maldivien\">Maldivien</option>\r\n<option value=\"mg\" aria-label=\"Malgache\">Malgache</option>\r\n<option value=\"mt\" aria-label=\"Maltais\">Maltais</option>\r\n<option value=\"mi\" aria-label=\"Maori\">Maori</option>\r\n<option value=\"mr\" aria-label=\"Marathi\">Marathi</option>\r\n<option value=\"yua\" aria-label=\"Maya Yucat&egrave;que\">Maya Yucat&egrave;que</option>\r\n<option value=\"mn-Cyrl\" aria-label=\"Mongolian (Cyrillic)\">Mongolian (Cyrillic)</option>\r\n<option value=\"mn-Mong\" aria-label=\"Mongolian (Traditional)\">Mongolian (Traditional)</option>\r\n<option value=\"nb\" aria-label=\"Norv&eacute;gien Bokm&aring;l\">Norv&eacute;gien Bokm&aring;l</option>\r\n<option value=\"nl\" aria-label=\"N&eacute;erlandais\">N&eacute;erlandais</option>\r\n<option value=\"ne\" aria-label=\"N&eacute;palais\">N&eacute;palais</option>\r\n<option value=\"or\" aria-label=\"Odia\">Odia</option>\r\n<option value=\"otq\" aria-label=\"Otomi De Quer&eacute;taro\">Otomi De Quer&eacute;taro</option>\r\n<option value=\"ur\" aria-label=\"Ourdou\">Ourdou</option>\r\n<option value=\"uz\" aria-label=\"Ouzbek\">Ouzbek</option>\r\n<option value=\"ug\" aria-label=\"Ou&iuml;ghour\">Ou&iuml;ghour</option>\r\n<option value=\"ps\" aria-label=\"Pachto\">Pachto</option>\r\n<option value=\"pa\" aria-label=\"Pendjabi\">Pendjabi</option>\r\n<option value=\"fa\" aria-label=\"Persan\">Persan</option>\r\n<option value=\"pl\" aria-label=\"Polonais\">Polonais</option>\r\n<option value=\"pt\" aria-label=\"Portugais (Br&eacute;sil)\">Portugais (Br&eacute;sil)</option>\r\n<option value=\"pt-PT\" aria-label=\"Portugais (Portugal)\">Portugais (Portugal)</option>\r\n<option value=\"ro\" aria-label=\"Roumain\">Roumain</option>\r\n<option value=\"ru\" aria-label=\"Russe\">Russe</option>\r\n<option value=\"sm\" aria-label=\"Samoan\">Samoan</option>\r\n<option value=\"sr-Cyrl\" aria-label=\"Serbe (Cyrillique)\">Serbe (Cyrillique)</option>\r\n<option value=\"sr-Latn\" aria-label=\"Serbe (Latin)\">Serbe (Latin)</option>\r\n<option value=\"sk\" aria-label=\"Slovaque\">Slovaque</option>\r\n<option value=\"sl\" aria-label=\"Slov&egrave;ne\">Slov&egrave;ne</option>\r\n<option value=\"so\" aria-label=\"Somali\">Somali</option>\r\n<option value=\"sv\" aria-label=\"Su&eacute;dois\">Su&eacute;dois</option>\r\n<option value=\"sw\" aria-label=\"Swahili\">Swahili</option>\r\n<option value=\"ty\" aria-label=\"Tahitien\">Tahitien</option>\r\n<option value=\"ta\" aria-label=\"Tamoul\">Tamoul</option>\r\n<option value=\"tt\" aria-label=\"Tatar\">Tatar</option>\r\n<option value=\"cs\" aria-label=\"Tch&egrave;que\">Tch&egrave;que</option>\r\n<option value=\"th\" aria-label=\"Tha&iuml;\">Tha&iuml;</option>\r\n<option value=\"bo\" aria-label=\"Tib&eacute;tain\">Tib&eacute;tain</option>\r\n<option value=\"ti\" aria-label=\"Tigrigna\">Tigrigna</option>\r\n<option value=\"to\" aria-label=\"Tongien\">Tongien</option>\r\n<option value=\"tr\" aria-label=\"Turc\">Turc</option>\r\n<option value=\"tk\" aria-label=\"Turkm&egrave;ne\">Turkm&egrave;ne</option>\r\n<option value=\"te\" aria-label=\"T&eacute;lougou\">T&eacute;lougou</option>\r\n<option value=\"uk\" aria-label=\"Ukrainien\">Ukrainien</option>\r\n<option value=\"hsb\" aria-label=\"Upper Sorbian\">Upper Sorbian</option>\r\n<option value=\"vi\" aria-label=\"Vietnamien\">Vietnamien</option>\r\n<option value=\"zu\" aria-label=\"Zoulou\">Zoulou</option>\r\n</optgroup>\r\n</select></div>\r\n<div class=\"tta_outtxt\" style=\"min-height: 90px; overflow: hidden; padding: 24px 20px 40px 52px;\"><textarea id=\"tta_output_ta\" class=\"tta_no_click_outline  tta_output_hastxt                               b_focusTextMedium\" dir=\"ltr\" lang=\"en\" style=\"font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 40px; font-family: Roboto, sans-serif; padding: 0px; outline: none; appearance: none; min-height: 48px; width: 251.719px; resize: none; overflow: hidden; margin: 0px; color: #111111; background: #f7f7f7; height: 48px; border: initial none initial;\" spellcheck=\"false\" readonly=\"readonly\" placeholder=\"Traduction\" aria-label=\"Zone de texte de sortie\" aria-readonly=\"true\" aria-disabled=\"true\"></textarea></div>\r\n<div id=\"t_outputoptions\" class=\"t_outputoptions t_outputhelperoptions\" style=\"margin: 0px 0px 12px; position: absolute; bottom: 0px; right: 0px;\">\r\n<div id=\"tta_outctrl\" class=\"t_secOptions b_clearfix\" style=\"float: right; margin-right: 12px;\">\r\n<div class=\"tt_suggest_icon_cont\" style=\"float: left;\" data-priority=\"2\">\r\n<div id=\"infobubble_item_13_D63980\" class=\"infobubble_item infobubble_tooltip\" data-bubbleid=\"infobubble_13_D63980\">\r\n<div id=\"tt_suggestIcon\" class=\"t_option\" style=\"cursor: pointer; padding: 10px; border-radius: 50%; display: inline-block;\" tabindex=\"0\" role=\"button\" aria-label=\"Sugg&eacute;rer une modification\"></div>\r\n</div>\r\n</div>\r\n<div id=\"infobubble_item_14_D639AA\" class=\"infobubble_item infobubble_tooltip\" style=\"float: left;\" data-bubbleid=\"infobubble_14_D639AA\">\r\n<div class=\"tta_playc\">\r\n<div id=\"tta_playicontgt\" class=\"t_option\" style=\"cursor: pointer; padding: 10px; border-radius: 50%; display: inline-block;\" tabindex=\"0\" role=\"button\" aria-label=\"&Eacute;couter la traduction\"></div>\r\n</div>\r\n</div>\r\n<div class=\"t_copyText\" style=\"position: relative; float: left;\">\r\n<div id=\"infobubble_item_15_D639BD\" class=\"infobubble_item infobubble_tooltip\" data-bubbleid=\"infobubble_15_D639BD\">\r\n<div id=\"tta_copyIcon\" class=\"t_option\" style=\"cursor: pointer; padding: 10px; border-radius: 50%; display: inline-block;\" tabindex=\"0\" role=\"button\" aria-label=\"Copier\"></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n<div id=\"tta_phrasebook\" class=\"tta_phraseb   tt_altTrnsExpItem\" style=\"padding: 6px 20px 0px; border-top: 0px;\" data-iid=\"SERP.5507\" data-priority=\"2\">\r\n<div class=\"tta_exp \">\r\n<div id=\"expitem_-965385371_2\" class=\"b_module_expansion\" data-appns=\"SERP\" data-k=\"5373.1\" data-expl=\"\">\r\n<div class=\"b_expansion_text b_1linetrunc\" style=\"overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: inline-block; margin-right: 16px; vertical-align: middle; max-width: calc(100% - 26px); font-size: 18px; line-height: 25px; color: #666666; width: calc(100% - 30px); box-sizing: border-box;\" aria-label=\"Expressions souvent utilis&eacute;es\">Expressions souvent utilis&eacute;es</div>\r\n<a id=\"expitem_-965385371_2_hit\" class=\"b_expansion_wrapper b_onpage_expansion newexpcont\" style=\"color: #1a0dab; height: 40px; cursor: pointer; padding: 0px; display: block; border-top: none; outline: none;\" role=\"button\" aria-expanded=\"false\" aria-describedby=\"expansionAccessibilityTextexpitem_-965385371_2_hit\"></a></div>\r\n</div>\r\n</div>\r\n<label id=\"tta_pb_select\" style=\"color: #767676; display: block; padding-bottom: 3px; width: 0px; height: 0px; overflow: hidden; position: absolute;\" aria-live=\"polite\"></label></div>\r\n</div>\r\n</div>\r\n</li>\r\n<li class=\"b_algo b_vtl_deeplinks\" style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px 0px 4px; padding: 12px 20px 0px; background-color: #ffffff; color: #71777d; font-family: Roboto, Helvetica, sans-serif; font-size: 14px;\" data-bm=\"6\">\r\n<h2 style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; font-size: 20px; line-height: 24px; font-family: Roboto, sans-serif;\"><a style=\"color: #1a0dab; text-decoration-line: none;\" href=\"https://www.bing.com/ck/a?!&amp;&amp;p=836bf81fa53b0ab2JmltdHM9MTY2NjIyNDAwMCZpZ3VpZD0zMDE4ZDBmMy1jNzhmLTY1NDQtMTJhNy1jMmNkYzZmZDY0ZWImaW5zaWQ9NTE1OA&amp;ptn=3&amp;hsh=3&amp;fclid=3018d0f3-c78f-6544-12a7-c2cdc6fd64eb&amp;psq=projet+en+cours+en+english&amp;u=a1aHR0cHM6Ly93d3cubGluZ3VlZS5jb20vZnJlbmNoLWVuZ2xpc2gvdHJhbnNsYXRpb24vcHJvamV0K2VuK2NvdXJzLmh0bWw&amp;ntb=1\" target=\"_blank\" rel=\"noopener\">projet en cours - English translation &ndash; Linguee</a></h2>\r\n<div class=\"b_caption hasdl\" style=\"padding-bottom: 10px; line-height: 22px;\">\r\n<div class=\"b_attribution\" style=\"color: #767676; padding: 1px 0px 0px; font-size: 16px; line-height: 22px;\"><cite style=\"color: #006621; font-style: normal; overflow-wrap: break-word; unicode-bidi: normal;\">https://www.linguee.com/french-english/translation/projet+en+cours.html</cite></div>\r\n<p class=\" b_lineclamp2\" style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px; line-height: 22px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;\">Many translated example sentences containing \"<span style=\"font-weight: bold; color: #767676;\">projet en cours</span>\" &ndash;&nbsp;<span style=\"font-weight: bold; color: #767676;\">English</span>-French dictionary and search engine for&nbsp;<span style=\"font-weight: bold; color: #767676;\">English</span>&nbsp;translations. Look up in Linguee ...&nbsp;<span style=\"font-weight: bold; color: #767676;\">projet</span>&nbsp;de remplacement&nbsp;<span style=\"font-weight: bold; color: #767676;\">de l</span>\'IAS &hellip;</p>\r\n</div>\r\n<div class=\" b_deeplinks_block_container\">\r\n<div class=\"dlCollapsedCnt\">\r\n<div class=\"b_deepdesk\">\r\n<ul class=\"b_vList b_divsec\" style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px;\">\r\n<li style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px 0px 12px; padding: 14px 20px 14px 12px; box-shadow: rgba(0, 0, 0, 0.1) 0px 2px 3px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px; border-radius: 6px;\" data-priority=\"\">\r\n<h3 class=\"deeplink_title\" style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px; display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; font-size: 20px; line-height: 24px; font-family: Roboto, sans-serif; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 79px;\"><a style=\"color: #1a0dab; text-decoration-line: none;\" href=\"https://www.bing.com/ck/a?!&amp;&amp;p=8d431acfd6025651JmltdHM9MTY2NjIyNDAwMCZpZ3VpZD0zMDE4ZDBmMy1jNzhmLTY1NDQtMTJhNy1jMmNkYzZmZDY0ZWImaW5zaWQ9NTM3OA&amp;ptn=3&amp;hsh=3&amp;fclid=3018d0f3-c78f-6544-12a7-c2cdc6fd64eb&amp;psq=projet+en+cours+en+english&amp;u=a1aHR0cHM6Ly93d3cubGluZ3VlZS5jb20vZnJlbmNoLWVuZ2xpc2gvdHJhbnNsYXRpb24vZW4rY291cnMuaHRtbA&amp;ntb=1\" target=\"_blank\" rel=\"noopener\">En cours</a></h3>\r\n<p style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px; line-height: 22px;\">Many translated example sentences containing \"en cours\" &ndash; English-French dictio&hellip;</p>\r\n</li>\r\n</ul>\r\n</div>\r\n<a class=\"b_deep b_moreLink\" style=\"color: #1a0dab; text-decoration-line: none; display: inline-block; padding-bottom: 10px; padding-left: 0px; line-height: 22px;\" href=\"https://www.bing.com/ck/a?!&amp;&amp;p=dc56646d2da01a55JmltdHM9MTY2NjIyNDAwMCZpZ3VpZD0zMDE4ZDBmMy1jNzhmLTY1NDQtMTJhNy1jMmNkYzZmZDY0ZWImaW5zaWQ9NTM3OQ&amp;ptn=3&amp;hsh=3&amp;fclid=3018d0f3-c78f-6544-12a7-c2cdc6fd64eb&amp;u=a1L3NlYXJjaD9xPXNpdGU6bGluZ3VlZS5jb20rcHJvamV0K2VuK2NvdXJzK2VuK2VuZ2xpc2g&amp;ntb=1\" target=\"_blank\" rel=\"noopener\">Afficher uniquement les r&eacute;sultats de linguee.com</a></div>\r\n</div>\r\n</li>\r\n<li class=\"b_algo\" style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px 0px 4px; padding: 12px 20px 0px; background-color: #ffffff; color: #71777d; font-family: Roboto, Helvetica, sans-serif; font-size: 14px;\" data-bm=\"7\">\r\n<h2 style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; font-size: 20px; line-height: 24px; font-family: Roboto, sans-serif;\"><a style=\"color: #1a0dab; text-decoration-line: none;\" href=\"https://www.bing.com/ck/a?!&amp;&amp;p=753f39d6633d2e78JmltdHM9MTY2NjIyNDAwMCZpZ3VpZD0zMDE4ZDBmMy1jNzhmLTY1NDQtMTJhNy1jMmNkYzZmZDY0ZWImaW5zaWQ9NTE3OA&amp;ptn=3&amp;hsh=3&amp;fclid=3018d0f3-c78f-6544-12a7-c2cdc6fd64eb&amp;psq=projet+en+cours+en+english&amp;u=a1aHR0cHM6Ly93d3cubGluZ3VlZS5mci9mcmFuY2Fpcy1hbmdsYWlzL3RyYWR1Y3Rpb24vcHJvamV0K2VuK2NvdXJzLmh0bWw&amp;ntb=1\" target=\"_blank\" rel=\"noopener\">projet en cours - Traduction anglaise &ndash; Linguee</a></h2>\r\n<div class=\"b_caption\" style=\"padding-bottom: 10px; line-height: 22px;\">\r\n<div class=\"b_attribution\" style=\"color: #767676; padding: 1px 0px 0px; font-size: 16px; line-height: 22px;\"><cite style=\"color: #006621; font-style: normal; overflow-wrap: break-word; unicode-bidi: normal;\">https://www.linguee.fr/francais-anglais/traduction/projet+en+cours.html</cite></div>\r\n<p class=\" b_lineclamp2\" style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px; line-height: 22px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;\">De tr&egrave;s nombreux exemples de phrases traduites contenant \"<span style=\"font-weight: bold; color: #767676;\">projet en cours</span>\" &ndash; Dictionnaire&nbsp;<span style=\"font-weight: bold; color: #767676;\">anglais</span>-fran&ccedil;ais et moteur de recherche de traductions anglaises. Consulter Linguee; Proposer &hellip;</p>\r\n</div>\r\n</li>\r\n<li class=\"b_algo\" style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px 0px 4px; padding: 12px 20px 0px; background-color: #ffffff; color: #71777d; font-family: Roboto, Helvetica, sans-serif; font-size: 14px;\" data-bm=\"8\">\r\n<h2 style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; font-size: 20px; line-height: 24px; font-family: Roboto, sans-serif;\"><a style=\"color: #1a0dab; text-decoration-line: none;\" href=\"https://www.bing.com/ck/a?!&amp;&amp;p=0a40257aa2d1a8e3JmltdHM9MTY2NjIyNDAwMCZpZ3VpZD0zMDE4ZDBmMy1jNzhmLTY1NDQtMTJhNy1jMmNkYzZmZDY0ZWImaW5zaWQ9NTIwNw&amp;ptn=3&amp;hsh=3&amp;fclid=3018d0f3-c78f-6544-12a7-c2cdc6fd64eb&amp;psq=projet+en+cours+en+english&amp;u=a1aHR0cHM6Ly93d3cubGluZ3VlZS5mci9mcmFuY2Fpcy1hbmdsYWlzL3RyYWR1Y3Rpb24vcHJvamV0cytlbitjb3Vycy5odG1s&amp;ntb=1\" target=\"_blank\" rel=\"noopener\">projets en cours - Traduction anglaise &ndash; Linguee</a></h2>\r\n<div class=\"b_caption\" style=\"padding-bottom: 10px; line-height: 22px;\">\r\n<div class=\"b_attribution\" style=\"color: #767676; padding: 1px 0px 0px; font-size: 16px; line-height: 22px;\"><cite style=\"color: #006621; font-style: normal; overflow-wrap: break-word; unicode-bidi: normal;\">https://www.linguee.fr/francais-anglais/traduction/projets+en+cours.html</cite></div>\r\n<p class=\" b_lineclamp2\" style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px; line-height: 22px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;\">De tr&egrave;s nombreux exemples de phrases traduites contenant \"<span style=\"font-weight: bold; color: #767676;\">projets en cours</span>\" &ndash; Dictionnaire&nbsp;<span style=\"font-weight: bold; color: #767676;\">anglais</span>-fran&ccedil;ais et moteur de recherche de traductions anglaises. Consulter Linguee; Proposer &hellip;</p>\r\n</div>\r\n<div class=\"pageRecoPlaceholder\" data-tag=\"RelatedPageRecommendations.RecommendationsClickback\">&nbsp;</div>\r\n</li>\r\n<li class=\"b_algo\" style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px 0px 4px; padding: 12px 20px 0px; background-color: #ffffff; color: #71777d; font-family: Roboto, Helvetica, sans-serif; font-size: 14px;\" data-bm=\"9\">\r\n<h2 style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; font-size: 20px; line-height: 24px; font-family: Roboto, sans-serif; content-visibility: auto; contain-intrinsic-size: 608px 24px;\">&nbsp;</h2>\r\n<div class=\"b_caption\" style=\"padding-bottom: 10px; line-height: 22px; content-visibility: auto; contain-intrinsic-size: 608px 65px; padding-right: 16px; margin-right: -16px; margin-left: -16px; padding-left: 16px;\">&nbsp;</div>\r\n</li>\r\n<li class=\"b_algo\" style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px 0px 4px; padding: 12px 20px 0px; background-color: #ffffff; color: #71777d; font-family: Roboto, Helvetica, sans-serif; font-size: 14px;\" data-bm=\"10\">\r\n<h2 style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; font-size: 20px; line-height: 24px; font-family: Roboto, sans-serif; content-visibility: auto; contain-intrinsic-size: 608px 24px;\">&nbsp;</h2>\r\n<div class=\"b_caption\" style=\"padding-bottom: 10px; line-height: 22px; content-visibility: auto; contain-intrinsic-size: 608px 65px; padding-right: 16px; margin-right: -16px; margin-left: -16px; padding-left: 16px;\">&nbsp;</div>\r\n</li>\r\n<li class=\"b_algo\" style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px 0px 4px; padding: 12px 20px 0px; background-color: #ffffff; color: #71777d; font-family: Roboto, Helvetica, sans-serif; font-size: 14px;\" data-bm=\"11\">\r\n<h2 style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; font-size: 20px; line-height: 24px; font-family: Roboto, sans-serif; content-visibility: auto; contain-intrinsic-size: 608px 24px;\">&nbsp;</h2>\r\n<div class=\"b_caption\" style=\"padding-bottom: 10px; line-height: 22px; content-visibility: auto; contain-intrinsic-size: 608px 65px; padding-right: 16px; margin-right: -16px; margin-left: -16px; padding-left: 16px;\">&nbsp;</div>\r\n</li>\r\n<li class=\"b_algo\" style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px 0px 4px; padding: 12px 20px 0px; background-color: #ffffff; color: #71777d; font-family: Roboto, Helvetica, sans-serif; font-size: 14px;\" data-bm=\"12\">\r\n<h2 style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; font-size: 20px; line-height: 24px; font-family: Roboto, sans-serif; content-visibility: auto; contain-intrinsic-size: 608px 24px;\">&nbsp;</h2>\r\n<div class=\"b_caption\" style=\"padding-bottom: 10px; line-height: 22px; content-visibility: auto; contain-intrinsic-size: 608px 65px; padding-right: 16px; margin-right: -16px; margin-left: -16px; padding-left: 16px;\">&nbsp;</div>\r\n</li>\r\n<li class=\"b_algo\" style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px 0px 4px; padding: 12px 20px 0px; background-color: #ffffff; color: #71777d; font-family: Roboto, Helvetica, sans-serif; font-size: 14px;\" data-bm=\"13\">\r\n<h2 style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; font-size: 20px; line-height: 24px; font-family: Roboto, sans-serif; content-visibility: auto; contain-intrinsic-size: 608px 24px;\">&nbsp;</h2>\r\n<div class=\"b_caption\" style=\"padding-bottom: 10px; line-height: 22px; content-visibility: auto; contain-intrinsic-size: 608px 65px; padding-right: 16px; margin-right: -16px; margin-left: -16px; padding-left: 16px;\">&nbsp;</div>\r\n</li>\r\n<li class=\"b_algo\" style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px 0px 4px; padding: 12px 20px 0px; background-color: #ffffff; color: #71777d; font-family: Roboto, Helvetica, sans-serif; font-size: 14px;\" data-bm=\"14\">\r\n<h2 style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; font-size: 20px; line-height: 24px; font-family: Roboto, sans-serif; content-visibility: auto; contain-intrinsic-size: 608px 24px;\">&nbsp;</h2>\r\n<div class=\"b_caption\" style=\"padding-bottom: 10px; line-height: 22px; content-visibility: auto; contain-intrinsic-size: 608px 65px; padding-right: 16px; margin-right: -16px; margin-left: -16px; padding-left: 16px;\">&nbsp;</div>\r\n</li>\r\n<li class=\"b_algo\" style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px 0px 4px; padding: 12px 20px 0px; background-color: #ffffff; color: #71777d; font-family: Roboto, Helvetica, sans-serif; font-size: 14px;\" data-bm=\"15\">\r\n<h2 style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; font-size: 20px; line-height: 24px; font-family: Roboto, sans-serif; content-visibility: auto; contain-intrinsic-size: 608px 24px;\">&nbsp;</h2>\r\n<div class=\"b_caption\" style=\"padding-bottom: 10px; line-height: 22px; content-visibility: auto; contain-intrinsic-size: 608px 65px; padding-right: 16px; margin-right: -16px; margin-left: -16px; padding-left: 16px;\">&nbsp;</div>\r\n</li>\r\n<li class=\"b_ans\" style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px 0px 4px; padding: 12px 20px 0px; background-color: #ffffff; color: #71777d; font-family: Roboto, Helvetica, sans-serif; font-size: 14px;\" data-bm=\"16\">\r\n<div id=\"relatedSearchesLGWContainer\" style=\"box-sizing: border-box; padding: 0px; background-color: transparent; border-radius: 0px; position: fixed; left: 0px; bottom: 120px; transform: translateX(-100%); opacity: 0; transition-duration: 0.5s;\" data-priority=\"2\">\r\n<h2 class=\"\" style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px 0px 0px 1rem; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; font-size: 14px; line-height: 1rem; font-family: Roboto, sans-serif; box-sizing: inherit; width: 120px;\">Recherches associ&eacute;es pour&nbsp;<strong style=\"box-sizing: inherit;\">projet en cours en english</strong></h2>\r\n<div id=\"rs_lgw_list\" style=\"box-sizing: inherit; display: flex; flex-direction: column; align-items: flex-start;\">\r\n<div class=\"animation-padding\" style=\"box-sizing: inherit; width: 12px; transition-duration: 0.5s;\">&nbsp;</div>\r\n<a style=\"color: #1a0dab; text-decoration-line: none; box-sizing: inherit; display: grid; grid-template-columns: auto auto auto; background-color: #f1f3f4; border-radius: 0px 100px 100px 0px; align-items: center; margin: 10px 12px 0px 0px; padding: 9px 0px; min-height: 50px; opacity: 1; transition-duration: 0.5s;\" href=\"https://www.bing.com/ck/a?!&amp;&amp;p=583e6186f6a4f9ccJmltdHM9MTY2NjIyNDAwMCZpZ3VpZD0zMDE4ZDBmMy1jNzhmLTY1NDQtMTJhNy1jMmNkYzZmZDY0ZWImaW5zaWQ9NTQxNg&amp;ptn=3&amp;hsh=3&amp;fclid=3018d0f3-c78f-6544-12a7-c2cdc6fd64eb&amp;u=a1L3NlYXJjaD9xPWNvdXJzK2VuZ2xpc2grcGRmJkZPUk09UVNSRTE&amp;ntb=1\" target=\"_blank\" rel=\"noopener\"><img class=\"rms_img\" style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px; box-sizing: inherit;\" src=\"https://www.bing.com/rp/OIBxn4Dj2mGYnGNUZ521BpJCeHQ.svg\" width=\"16\" height=\"16\" data-bm=\"40\"></a>\r\n<div class=\"b_suggestionText\" style=\"box-sizing: inherit; width: 122px; padding-left: 12px; padding-right: 12px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;\">cours english&nbsp;<span style=\"font-weight: bold; box-sizing: inherit;\">pdf</span></div>\r\n<div class=\"animation-padding\" style=\"box-sizing: inherit; width: 12px; transition-duration: 0.5s;\">&nbsp;</div>\r\n<a style=\"color: #1a0dab; text-decoration-line: none; box-sizing: inherit; display: grid; grid-template-columns: auto auto auto; background-color: #f1f3f4; border-radius: 0px 100px 100px 0px; align-items: center; margin: 10px 12px 0px 0px; padding: 9px 0px; min-height: 50px; opacity: 1; transition-duration: 0.5s;\" href=\"https://www.bing.com/ck/a?!&amp;&amp;p=0f7fdb9888880f47JmltdHM9MTY2NjIyNDAwMCZpZ3VpZD0zMDE4ZDBmMy1jNzhmLTY1NDQtMTJhNy1jMmNkYzZmZDY0ZWImaW5zaWQ9NTQxOA&amp;ptn=3&amp;hsh=3&amp;fclid=3018d0f3-c78f-6544-12a7-c2cdc6fd64eb&amp;u=a1L3NlYXJjaD9xPWNvdXJzK2QlMjdhbmdsYWlzK2VuK2xpZ25lK2dyYXR1aXQmRk9STT1RU1JFMg&amp;ntb=1\" target=\"_blank\" rel=\"noopener\"><img class=\"rms_img\" style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px; box-sizing: inherit;\" src=\"https://www.bing.com/rp/OIBxn4Dj2mGYnGNUZ521BpJCeHQ.svg\" width=\"16\" height=\"16\" data-bm=\"41\"></a>\r\n<div class=\"b_suggestionText\" style=\"box-sizing: inherit; width: 122px; padding-left: 12px; padding-right: 12px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;\">cours&nbsp;<span style=\"font-weight: bold; box-sizing: inherit;\">d</span>\'<span style=\"font-weight: bold; box-sizing: inherit;\">anglais</span>&nbsp;en&nbsp;<span style=\"font-weight: bold; box-sizing: inherit;\">ligne gratuit</span></div>\r\n<div class=\"animation-padding\" style=\"box-sizing: inherit; width: 12px; transition-duration: 0.5s;\">&nbsp;</div>\r\n<a style=\"color: #1a0dab; text-decoration-line: none; box-sizing: inherit; display: grid; grid-template-columns: auto auto auto; background-color: #f1f3f4; border-radius: 0px 100px 100px 0px; align-items: center; margin: 10px 12px 0px 0px; padding: 9px 0px; min-height: 50px; opacity: 1; transition-duration: 0.5s;\" href=\"https://www.bing.com/ck/a?!&amp;&amp;p=40517acdad55ae13JmltdHM9MTY2NjIyNDAwMCZpZ3VpZD0zMDE4ZDBmMy1jNzhmLTY1NDQtMTJhNy1jMmNkYzZmZDY0ZWImaW5zaWQ9NTQyMA&amp;ptn=3&amp;hsh=3&amp;fclid=3018d0f3-c78f-6544-12a7-c2cdc6fd64eb&amp;u=a1L3NlYXJjaD9xPWFwcHJlbmRyZStsJTI3YW5nbGFpcytncmF0dWl0ZW1lbnQmRk9STT1RU1JFMw&amp;ntb=1\" target=\"_blank\" rel=\"noopener\"><img class=\"rms_img\" style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px; box-sizing: inherit;\" src=\"https://www.bing.com/rp/OIBxn4Dj2mGYnGNUZ521BpJCeHQ.svg\" width=\"16\" height=\"16\" data-bm=\"42\"></a>\r\n<div class=\"b_suggestionText\" style=\"box-sizing: inherit; width: 122px; padding-left: 12px; padding-right: 12px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;\"><span style=\"font-weight: bold; box-sizing: inherit;\">apprendre l</span>\'<span style=\"font-weight: bold; box-sizing: inherit;\">anglais gratuitement</span></div>\r\n<div class=\"animation-padding\" style=\"box-sizing: inherit; width: 12px; transition-duration: 0.5s;\">&nbsp;</div>\r\n<a style=\"color: #1a0dab; text-decoration-line: none; box-sizing: inherit; display: grid; grid-template-columns: auto auto auto; background-color: #f1f3f4; border-radius: 0px 100px 100px 0px; align-items: center; margin: 10px 12px 0px 0px; padding: 9px 0px; min-height: 50px; opacity: 1; transition-duration: 0.5s;\" href=\"https://www.bing.com/ck/a?!&amp;&amp;p=0bea3605785c312cJmltdHM9MTY2NjIyNDAwMCZpZ3VpZD0zMDE4ZDBmMy1jNzhmLTY1NDQtMTJhNy1jMmNkYzZmZDY0ZWImaW5zaWQ9NTQyMg&amp;ptn=3&amp;hsh=3&amp;fclid=3018d0f3-c78f-6544-12a7-c2cdc6fd64eb&amp;u=a1L3NlYXJjaD9xPWNvbW1lbnQrYXBwcmVuZHJlK2wlMjdhbmdsYWlzK3JhcGlkZW1lbnQmRk9STT1RU1JFNA&amp;ntb=1\" target=\"_blank\" rel=\"noopener\"><img class=\"rms_img\" style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px; box-sizing: inherit;\" src=\"https://www.bing.com/rp/OIBxn4Dj2mGYnGNUZ521BpJCeHQ.svg\" width=\"16\" height=\"16\" data-bm=\"43\"></a>\r\n<div class=\"b_suggestionText\" style=\"box-sizing: inherit; width: 122px; padding-left: 12px; padding-right: 12px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;\"><span style=\"font-weight: bold; box-sizing: inherit;\">comment apprendre l</span>\'<span style=\"font-weight: bold; box-sizing: inherit;\">anglais rapidement</span></div>\r\n<div class=\"animation-padding\" style=\"box-sizing: inherit; width: 12px; transition-duration: 0.5s;\">&nbsp;</div>\r\n<a class=\"more-rs-btn\" style=\"color: #1a0dab; text-decoration-line: none; box-sizing: inherit; display: grid; grid-template-columns: auto auto auto; background-color: #f1f3f4; border-radius: 0px 100px 100px 0px; align-items: center; margin: 10px 12px 0px 0px; padding: 9px 0px; min-height: 50px; opacity: 1; transition-duration: 0.5s;\" href=\"https://www.bing.com/search?q=projet+en+cours+en+english&amp;form=ANNTH1&amp;refig=ecdb179e7aed44eb91e71c88754db00d\"><img class=\"rms_img\" style=\"border: 0px; border-collapse: collapse; border-spacing: 0px; list-style: none; margin: 0px; padding: 0px; box-sizing: inherit;\" src=\"https://www.bing.com/rp/4gR4aai7KMGcOdUb5Sb5EITVGKo.svg\" width=\"16\" height=\"16\" data-bm=\"44\"></a>\r\n<div class=\"b_suggestionText\" style=\"box-sizing: inherit; width: 122px; padding-left: 12px; padding-right: 12px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;\">More related searches</div>\r\n</div>\r\n</div>\r\n<div id=\"brsv3\" class=\"b_rs\" style=\"content-visibility: auto; contain-intrinsic-size: 652px 296px; width: 652px;\"></div>\r\n</li>\r\n</ul>', '[\"rooms\\\\March2025\\\\L6HWOdkDvNngiG3EwQoK.jpg\"]', 1, '2022-10-20 15:52:51', '2025-03-24 09:43:43', NULL, 'c23', 25000);
INSERT INTO `rooms` (`id`, `title`, `content`, `images`, `author_id`, `created_at`, `updated_at`, `deleted_at`, `slug`, `price`) VALUES
(5, 'chambre 1', '<p>fggfgfgfgfgf</p>', '[\"rooms\\\\March2025\\\\JvCtj7yZbPMU9qAtCqND.jpg\",\"rooms\\\\March2025\\\\P0Uc7Ox43MA2bATERd1t.jpg\"]', 1, '2025-01-08 23:26:01', '2025-03-24 09:44:04', NULL, 'chambre 1', 14995);

-- --------------------------------------------------------

--
-- Structure de la table `section_media`
--

CREATE TABLE `section_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `medias` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `section_media`
--

INSERT INTO `section_media` (`id`, `name`, `medias`, `created_at`, `updated_at`) VALUES
(1, 'galery', '[\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.13 (1).jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.13.jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.14.jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.16 (1).jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.16.jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.17 (1).jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.17.jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.18.jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.19 (1).jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.19.jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.20.jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.21 (1).jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.21.jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.22.jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.23.jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.25.jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.26.jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.27 (1).jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.27.jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.28.jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.29 (1).jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.29.jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.31.jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.32 (1).jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.32.jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.39.jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.41 (1).jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.41.jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.42.jpeg\",\"section-media/galery/WhatsApp Image 2023-09-09 at 21.47.43.jpeg\"]', '2023-09-10 18:28:00', '2023-09-10 19:16:02'),
(2, 'partner', '[\"section-media/partner/1-removebg-preview.png\",\"section-media/partner/10-removebg-preview.png\",\"section-media/partner/2-removebg-preview.png\",\"section-media/partner/3-removebg-preview.png\",\"section-media/partner/4-removebg-preview.png\",\"section-media/partner/5-removebg-preview (1).png\",\"section-media/partner/6-removebg-preview.png\",\"section-media/partner/7-removebg-preview.png\"]', '2023-09-10 19:14:00', '2025-01-08 20:05:37'),
(3, 'banner', '[\"section-media/banner/HCP 1.jpg\",\"section-media/banner/Cover_page_Gastro.jpg\"]', '2025-01-08 20:06:00', '2025-01-08 22:54:35');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Titre du site', 'Hôtel Chic Palace', '', 'text', 1, 'Site'),
(2, 'site.description', 'Description du site', 'Description du site', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Logo du site', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics ID de Tracking', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Image de fond de l\'espace admin', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Titre de l\'espace admin', 'Voyager', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Description de l\'espace admin', 'Bienvenue dans Voyager, le panneau d\'administration qui manquait à Laravel.', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Chargement de l\'espace admin', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Icône de l\'espace admin', 'settings\\March2025\\PphcYlvSklNDEVntSLm3.png', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics ID Client (Utilisé pour le panneau d\'administration)', NULL, '', 'text', 1, 'Admin'),
(11, 'site.icon_image', 'icon_image', 'settings\\March2025\\muzYsFN6Qdo8p7VQ8ak1.png', NULL, 'image', 6, 'Site'),
(12, 'site.facebook', 'facebook', NULL, NULL, 'text', 7, 'Site'),
(13, 'site.twitter', 'twitter', NULL, NULL, 'text', 8, 'Site'),
(14, 'site.youtube', 'youtube', NULL, NULL, 'text', 9, 'Site'),
(15, 'site.instagram', 'instagram', NULL, NULL, 'text', 10, 'Site'),
(16, 'site.tiktok', 'tiktok', NULL, NULL, 'text', 11, 'Site'),
(17, 'site.email', 'email', 'hotelchicpalace@gmail.com', NULL, 'text', 12, 'Site'),
(18, 'site.contact', 'contact', '+2289168 3333', NULL, 'text', 13, 'Site');

-- --------------------------------------------------------

--
-- Structure de la table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `column_name` varchar(255) NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2023-09-09 17:18:29', '2023-09-09 17:18:29'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2023-09-09 17:18:29', '2023-09-09 17:18:29');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `settings` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'users\\March2025\\w4RCeeVy4Zto8061Yjf3.jpg', NULL, '$2y$10$Vreac8fmjnZTaytNM4HwdeBdhYVtDhe6xMrm38Rq2NsDxV381EgB2', 'U4wj12uyhWWojWK9nJifa3LacSTYdRdm2N1Aa3jLOQJJqjdgpfl4dOf3Bx9c', '{\"locale\":\"fr\"}', '2023-09-09 17:18:28', '2025-03-24 09:50:08');

-- --------------------------------------------------------

--
-- Structure de la table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Index pour la table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Index pour la table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Index pour la table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hero_sections`
--
ALTER TABLE `hero_sections`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Index pour la table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Index pour la table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Index pour la table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `section_media`
--
ALTER TABLE `section_media`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Index pour la table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Index pour la table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT pour la table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `hero_sections`
--
ALTER TABLE `hero_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `section_media`
--
ALTER TABLE `section_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Contraintes pour la table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
