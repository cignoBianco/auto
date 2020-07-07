-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июл 07 2020 г., 03:03
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `auto`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actions`
--

CREATE TABLE `actions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` tinyint(3) UNSIGNED DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `actions_products`
--

CREATE TABLE `actions_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action_id` bigint(20) UNSIGNED NOT NULL,
  `product_or_part` tinyint(1) NOT NULL DEFAULT 0,
  `product_or_part_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `action_statement`
--

CREATE TABLE `action_statement` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action_id` bigint(20) UNSIGNED NOT NULL,
  `points` double(8,2) DEFAULT NULL,
  `amount_count` mediumint(8) UNSIGNED DEFAULT NULL,
  `statement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `action_users`
--

CREATE TABLE `action_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auto_parts`
--

CREATE TABLE `auto_parts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` bigint(20) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `producer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicability` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `main_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specifications` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `producer_price` double(8,2) NOT NULL DEFAULT 0.00,
  `available` tinyint(1) NOT NULL DEFAULT 0,
  `seo_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `auto_parts`
--

INSERT INTO `auto_parts` (`id`, `article`, `number`, `category_id`, `producer`, `priority`, `status_id`, `provider_id`, `description`, `applicability`, `main_picture`, `specifications`, `price`, `producer_price`, `available`, `seo_url`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`, `name`) VALUES
(3, 'jhkj', 1, 1, 'hkh', '66', 1, 1, 'mn,', '0', 'uploads/phpkqLD5M.jpeg', 'bmnbm', 676.00, 676.00, 1, 'mhh', 'hkhk', 'hkh', 'hkhk', '2020-06-28 08:51:03', '2020-06-28 08:51:03', 'jjhrj'),
(13, 'df', 343, 1, 'sdfsf', '33', 1, 1, 'fsdf', '0', 'uploads/phpDofkqa.jpeg', 'vsdf', 33330.03, 330.04, 0, 'rgre', 'gjhg', 'hgjhg', 'hgjhjhg', '2020-06-28 10:15:33', '2020-06-28 10:23:08', 'vfg333'),
(16, '345 678', 2342340, 1, 'Ford', '10', 1, 1, 'description 3', '0', 'uploads/phpre5H0q.jpeg', 'spec 3', 600.00, 400.12, 0, 'part 3', 'part', 'desc 3 seo', 'keys', '2020-06-30 23:14:24', '2020-06-30 23:15:27', 'Part 3'),
(18, 'q123wr', 1223, 1, 'prod', '10', 1, 1, 'ef', '0', 'uploads/2.png', 'ewfwe', 2423.00, 432.00, 1, 'seo', 'title', 'desc', 'keys', '2020-07-02 21:41:18', '2020-07-02 21:41:18', 'fewr'),
(19, 'q123wr1', 1223, 1, 'prod', '10', 2, 1, 'ef', '0', 'uploads/nintchdbpict000315815906.jpg', 'ewfwe', 2423.00, 432.00, 1, 'seo', 'title', 'desc', 'keys', '2020-07-02 21:41:18', '2020-07-02 21:41:18', 'fewr2'),
(20, 'q123wr2', 1223, 1, 'prod', '10', 1, 1, 'ef', '0', 'uploads/6636085-LKBDUKVS-7.jpg', 'ewfwe', 2423.00, 432.00, 1, 'seo', 'title', 'desc', 'keys', '2020-07-02 21:41:18', '2020-07-02 21:41:18', 'fewr3'),
(21, 'q123wr', 1223, 1, 'prod', '10', 1, 1, 'ef', '0', 'uploads/5.png', 'ewfwe', 2423.00, 432.00, 1, 'seo', 'title', 'desc', 'keys', '2020-07-02 21:41:18', '2020-07-02 21:41:18', 'fewr4');

-- --------------------------------------------------------

--
-- Структура таблицы `auto_part_images`
--

CREATE TABLE `auto_part_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auto_part_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auto_part_options`
--

CREATE TABLE `auto_part_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auto_part_id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auto_products`
--

CREATE TABLE `auto_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `specifications` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `price_in_points` double(8,2) NOT NULL DEFAULT 0.00,
  `performer_price` double(8,2) NOT NULL DEFAULT 0.00,
  `points` double(8,2) DEFAULT NULL,
  `main_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT 0,
  `seo_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `auto_products`
--

INSERT INTO `auto_products` (`id`, `name`, `category_id`, `specifications`, `price`, `price_in_points`, `performer_price`, `points`, `main_picture`, `description`, `status_id`, `available`, `seo_url`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(2, 'prod 2', 1, 'spec 2', 1288.09, 523523.79, 42523.09, 9.00, 'uploads/phpgUxNku.jpeg', 'description', 1, 0, 'rgrg', 'rgerg', 'gager', 'gorger', '2020-06-28 15:53:38', '2020-06-28 15:53:58');

-- --------------------------------------------------------

--
-- Структура таблицы `auto_product_images`
--

CREATE TABLE `auto_product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auto_product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auto_product_options`
--

CREATE TABLE `auto_product_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auto_product_id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `sort_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `show_amount` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `period_between_show` double(8,2) DEFAULT NULL,
  `show_time` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specifications` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `priority` tinyint(3) UNSIGNED DEFAULT NULL,
  `show` tinyint(1) NOT NULL DEFAULT 1,
  `main_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `specifications`, `section_id`, `priority`, `show`, `main_picture`, `seo_url`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'cat 1', 'SPEC 1', 2, 100, 1, 'uploads/php5Nhz4J.jpeg', 'url', 'title', 'desc', 'keys', '2020-06-28 08:30:22', '2020-06-28 08:30:22'),
(3, 'category 2', 'spec 2', 2, 9, 1, 'uploads/phpRjwQxE.jpeg', 'seo 1', 'Greg', 'gregre', 'égrener', '2020-06-28 15:52:37', '2020-06-28 15:52:37');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `garages`
--

CREATE TABLE `garages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vin_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `garages`
--

INSERT INTO `garages` (`id`, `brand`, `model`, `vin_code`, `created_at`, `updated_at`) VALUES
(1, 'Brand 1', 'Model 1', '333', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2018_06_25_013145_create_option_types_table', 1),
(3, '2019_06_25_005534_create_sections_table', 1),
(4, '2019_06_25_012724_create_options_table', 1),
(5, '2019_06_25_020057_create_statuses_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2020_02_25_015245_create_parameters_table', 1),
(8, '2020_06_24_151254_create_categories_table', 1),
(9, '2020_06_24_151757_create_providers_table', 1),
(10, '2020_06_24_152039_create_auto_parts_table', 1),
(11, '2020_06_24_161241_create_garages_table', 1),
(12, '2020_06_24_161311_create_auto_products_table', 1),
(13, '2020_06_24_161400_create_users_table', 1),
(14, '2020_06_24_162306_create_orders_table', 1),
(15, '2020_06_24_170408_create_specifications_table', 1),
(16, '2020_06_24_170409_create_product_specifications_table', 1),
(17, '2020_06_24_170423_create_part_specifications_table', 1),
(18, '2020_06_25_011453_create_auto_part_images_table', 1),
(19, '2020_06_25_012807_create_auto_part_options_table', 1),
(20, '2020_06_25_013532_create_option_params_table', 1),
(21, '2020_06_25_015835_create_auto_product_images_table', 1),
(22, '2020_06_25_022853_create_auto_product_options_table', 1),
(23, '2020_06_25_023624_create_actions_table', 1),
(24, '2020_06_25_024026_create_actions_products_table', 1),
(25, '2020_06_25_024351_create_action_statement_table', 1),
(26, '2020_06_25_024545_create_action_users_table', 1),
(27, '2020_06_25_024818_create_banners_table', 1),
(28, '2020_06_28_144449_create_producers_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_type_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `option_params`
--

CREATE TABLE `option_params` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `param_id` bigint(20) UNSIGNED NOT NULL,
  `add_price` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `option_types`
--

CREATE TABLE `option_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_or_part` tinyint(1) NOT NULL DEFAULT 0,
  `product_or_part_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `delivery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sum` double(8,2) DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `parameters`
--

CREATE TABLE `parameters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `parameters`
--

INSERT INTO `parameters` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Param 1', 'Desc', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `part_specifications`
--

CREATE TABLE `part_specifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `part_id` bigint(20) UNSIGNED NOT NULL,
  `specification_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `producers`
--

CREATE TABLE `producers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `product_specifications`
--

CREATE TABLE `product_specifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `specification_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `providers`
--

CREATE TABLE `providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assessment` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `orders_completed_at_time_amount` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `orders_not_completed_at_time_amount` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `orders_not_completed_amount` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `providers`
--

INSERT INTO `providers` (`id`, `name`, `email`, `description`, `assessment`, `orders_completed_at_time_amount`, `orders_not_completed_at_time_amount`, `orders_not_completed_amount`, `created_at`, `updated_at`) VALUES
(1, 'Prov 1', 'Prov1@gmail.com', 'Prov 1', 2, 22, 2, 2, NULL, NULL),
(3, 'Prov 11', 'Prov11@gmail.com', 'Prov 1', 2, 22, 2, 2, '2020-06-28 12:56:54', '2020-06-28 12:56:54');

-- --------------------------------------------------------

--
-- Структура таблицы `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sections`
--

INSERT INTO `sections` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sec 1', NULL, NULL),
(2, 'Sec 2', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `specifications`
--

CREATE TABLE `specifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `specifications`
--

INSERT INTO `specifications` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Spec 1', 'Desc 1', NULL, NULL),
(2, 'Spec 2', 'Desc 2', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'status 1', 'Desc 1', NULL, NULL),
(2, 'Stat 2', 'Desc 2', NULL, NULL),
(3, 'status 1', 'Desc 1', NULL, NULL),
(4, 'Stat 2', 'Desc 2', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `garage_id` bigint(20) UNSIGNED DEFAULT NULL,
  `balance` double(8,2) NOT NULL,
  `orders_count` int(11) NOT NULL DEFAULT 0,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `is_admin`, `name`, `garage_id`, `balance`, `orders_count`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 1, 10000.00, 0, '47858437584', 'admin@admin.ro', NULL, '$2y$10$5Tm1W2.RVev54tPIgJsYFuAVihf.DVe5Tm/nc19cmkZ5Q4XegCZKS', 'Ns5AugJ8NhLvsFM1SH1I92w2yoZv5Y0HKxWekVFMjLeZfvBjuXA6mulzr5nM', NULL, '2020-06-28 08:29:23', '2020-06-28 12:06:30'),
(2, 1, 'admin 2', 1, 67.00, 0, NULL, 'admin2@admin.ru', NULL, '$2y$10$vGMmo7xQveazOb7JeRzJrOIY78urSeouinKeXWS/dge/A/FYnL2a6', NULL, NULL, '2020-06-28 12:14:05', '2020-06-28 12:14:33'),
(4, 0, 'user 3', 1, 0.00, 0, '+79528089476', 'user@gmail.com', NULL, '$2y$10$1r4032Mdm0JuANbfty/uxutVC4HU3STYBhFTpr90RyyMDTBNNVuDK', NULL, NULL, '2020-06-28 15:43:33', '2020-06-28 15:43:33'),
(5, 0, 'user 4', 1, 0.00, 0, '89523456789', 'us@gmail.com', NULL, '$2y$10$HUua2KsdE/28ZDo2UV75I.AqlmdWIoDgsihqpTarFXJwUkFM3dLyy', NULL, NULL, '2020-06-28 15:48:25', '2020-06-28 15:48:25'),
(6, 1, 'user 7', 1, 0.00, 0, '89854937444', 'def@tr.ru', NULL, '$2y$10$cTLXbTToySyCp//bRuFyfOxQiYIa49Mw5tKpuwdk/2MAbFn0gvkpS', NULL, NULL, '2020-06-28 15:51:07', '2020-06-28 15:55:18');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actions_section_id_foreign` (`section_id`),
  ADD KEY `actions_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `actions_products`
--
ALTER TABLE `actions_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actions_products_action_id_foreign` (`action_id`);

--
-- Индексы таблицы `action_statement`
--
ALTER TABLE `action_statement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `action_statement_action_id_foreign` (`action_id`);

--
-- Индексы таблицы `action_users`
--
ALTER TABLE `action_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `action_users_action_id_foreign` (`action_id`),
  ADD KEY `action_users_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `auto_parts`
--
ALTER TABLE `auto_parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auto_parts_category_id_foreign` (`category_id`),
  ADD KEY `auto_parts_provider_id_foreign` (`provider_id`),
  ADD KEY `auto_parts_status_id_foreign` (`status_id`);

--
-- Индексы таблицы `auto_part_images`
--
ALTER TABLE `auto_part_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auto_part_images_auto_part_id_foreign` (`auto_part_id`);

--
-- Индексы таблицы `auto_part_options`
--
ALTER TABLE `auto_part_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auto_part_options_auto_part_id_foreign` (`auto_part_id`),
  ADD KEY `auto_part_options_option_id_foreign` (`option_id`);

--
-- Индексы таблицы `auto_products`
--
ALTER TABLE `auto_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auto_products_category_id_foreign` (`category_id`),
  ADD KEY `auto_products_status_id_foreign` (`status_id`);

--
-- Индексы таблицы `auto_product_images`
--
ALTER TABLE `auto_product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auto_product_images_auto_product_id_foreign` (`auto_product_id`);

--
-- Индексы таблицы `auto_product_options`
--
ALTER TABLE `auto_product_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auto_product_options_auto_product_id_foreign` (`auto_product_id`),
  ADD KEY `auto_product_options_option_id_foreign` (`option_id`);

--
-- Индексы таблицы `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_section_id_foreign` (`section_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `garages`
--
ALTER TABLE `garages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_option_type_id_foreign` (`option_type_id`);

--
-- Индексы таблицы `option_params`
--
ALTER TABLE `option_params`
  ADD PRIMARY KEY (`id`),
  ADD KEY `option_params_option_id_foreign` (`option_id`),
  ADD KEY `option_params_param_id_foreign` (`param_id`);

--
-- Индексы таблицы `option_types`
--
ALTER TABLE `option_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_status_id_foreign` (`status_id`);

--
-- Индексы таблицы `parameters`
--
ALTER TABLE `parameters`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `part_specifications`
--
ALTER TABLE `part_specifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `part_specifications_specification_id_foreign` (`specification_id`),
  ADD KEY `part_specifications_part_id_foreign` (`part_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `producers`
--
ALTER TABLE `producers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_specifications`
--
ALTER TABLE `product_specifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_specifications_specification_id_foreign` (`specification_id`),
  ADD KEY `product_specifications_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `providers_email_unique` (`email`);

--
-- Индексы таблицы `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_garage_id_foreign` (`garage_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `actions`
--
ALTER TABLE `actions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `actions_products`
--
ALTER TABLE `actions_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `action_statement`
--
ALTER TABLE `action_statement`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `action_users`
--
ALTER TABLE `action_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `auto_parts`
--
ALTER TABLE `auto_parts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `auto_part_images`
--
ALTER TABLE `auto_part_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `auto_part_options`
--
ALTER TABLE `auto_part_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `auto_products`
--
ALTER TABLE `auto_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `auto_product_images`
--
ALTER TABLE `auto_product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `auto_product_options`
--
ALTER TABLE `auto_product_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `garages`
--
ALTER TABLE `garages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `option_params`
--
ALTER TABLE `option_params`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `option_types`
--
ALTER TABLE `option_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `parameters`
--
ALTER TABLE `parameters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `part_specifications`
--
ALTER TABLE `part_specifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `producers`
--
ALTER TABLE `producers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `product_specifications`
--
ALTER TABLE `product_specifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `providers`
--
ALTER TABLE `providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `actions`
--
ALTER TABLE `actions`
  ADD CONSTRAINT `actions_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `actions_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `actions_products`
--
ALTER TABLE `actions_products`
  ADD CONSTRAINT `actions_products_action_id_foreign` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `action_statement`
--
ALTER TABLE `action_statement`
  ADD CONSTRAINT `action_statement_action_id_foreign` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `action_users`
--
ALTER TABLE `action_users`
  ADD CONSTRAINT `action_users_action_id_foreign` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `action_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auto_parts`
--
ALTER TABLE `auto_parts`
  ADD CONSTRAINT `auto_parts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auto_parts_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auto_parts_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auto_part_images`
--
ALTER TABLE `auto_part_images`
  ADD CONSTRAINT `auto_part_images_auto_part_id_foreign` FOREIGN KEY (`auto_part_id`) REFERENCES `auto_parts` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auto_part_options`
--
ALTER TABLE `auto_part_options`
  ADD CONSTRAINT `auto_part_options_auto_part_id_foreign` FOREIGN KEY (`auto_part_id`) REFERENCES `auto_parts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auto_part_options_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auto_products`
--
ALTER TABLE `auto_products`
  ADD CONSTRAINT `auto_products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auto_products_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auto_product_images`
--
ALTER TABLE `auto_product_images`
  ADD CONSTRAINT `auto_product_images_auto_product_id_foreign` FOREIGN KEY (`auto_product_id`) REFERENCES `auto_products` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auto_product_options`
--
ALTER TABLE `auto_product_options`
  ADD CONSTRAINT `auto_product_options_auto_product_id_foreign` FOREIGN KEY (`auto_product_id`) REFERENCES `auto_products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auto_product_options_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_option_type_id_foreign` FOREIGN KEY (`option_type_id`) REFERENCES `option_types` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `option_params`
--
ALTER TABLE `option_params`
  ADD CONSTRAINT `option_params_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `option_params_param_id_foreign` FOREIGN KEY (`param_id`) REFERENCES `parameters` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `part_specifications`
--
ALTER TABLE `part_specifications`
  ADD CONSTRAINT `part_specifications_part_id_foreign` FOREIGN KEY (`part_id`) REFERENCES `auto_parts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `part_specifications_specification_id_foreign` FOREIGN KEY (`specification_id`) REFERENCES `specifications` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_specifications`
--
ALTER TABLE `product_specifications`
  ADD CONSTRAINT `product_specifications_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `auto_products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_specifications_specification_id_foreign` FOREIGN KEY (`specification_id`) REFERENCES `specifications` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_garage_id_foreign` FOREIGN KEY (`garage_id`) REFERENCES `garages` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
