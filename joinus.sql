-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 24 juin 2022 à 13:27
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `joinus`
--

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_06_04_214704_create_sessions_table', 1),
(7, '2022_06_05_000053_add_phone_to_users_table', 2),
(13, '2022_06_05_003027_create_service_categories_table', 3),
(14, '2022_06_06_083851_create_services_table', 3),
(15, '2022_06_08_113235_add_featured_to_services_table', 3),
(16, '2022_06_08_120936_add_featured_to_service_categories_table', 3),
(17, '2022_06_08_171804_create_sliders_table', 3),
(18, '2022_06_23_114315_create_transactions_table', 4);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 10, 'secret', '44495cffc0f8e59b9dea17e51d7fd237f499d6ed44fedbd2e728c381e59b2011', '[\"*\"]', NULL, '2022-06-09 15:59:12', '2022-06-09 15:59:12'),
(2, 'App\\Models\\User', 11, 'secret', 'e625ffcc08ace5d1fe89cb7439d4f51f7a7ee2abcb4fbb301a9a9c47db24e69b', '[\"*\"]', '2022-06-11 13:02:08', '2022-06-09 21:49:59', '2022-06-11 13:02:08'),
(3, 'App\\Models\\User', 11, 'secret', '0408e1ec8e73889e11a1dac3c4785e3819d816a5109f55151423311dd1962eb2', '[\"*\"]', NULL, '2022-06-10 14:58:03', '2022-06-10 14:58:03'),
(4, 'App\\Models\\User', 12, 'secret', '885a44958c83467469378112cfdc9df3e96c4894f173c1a1034c964f1d8de064', '[\"*\"]', '2022-06-10 21:45:16', '2022-06-10 21:36:41', '2022-06-10 21:45:16'),
(5, 'App\\Models\\User', 12, 'secret', 'f05ac29e3354c74f8fa1b8df377556088b0de2e5962cb241e46ee923c2c141b3', '[\"*\"]', '2022-06-10 22:06:01', '2022-06-10 21:48:08', '2022-06-10 22:06:01'),
(6, 'App\\Models\\User', 12, 'secret', 'e1b667cf48f8397e05c1543f8626ab1b6b1b6d55e0a5c89962ced1c6c35dbb13', '[\"*\"]', '2022-06-10 22:07:17', '2022-06-10 22:06:58', '2022-06-10 22:07:17'),
(7, 'App\\Models\\User', 13, 'secret', '2ab16c52907e2f4170876cebce24becadb074b3a061db79ca9b10abcb82c94b0', '[\"*\"]', NULL, '2022-06-10 22:08:56', '2022-06-10 22:08:56'),
(8, 'App\\Models\\User', 11, 'secret', '4a2b86c184e3707ed1b3230c33355ede7c2d55351a5c5447f96c8f8f62be2f49', '[\"*\"]', '2022-06-11 13:15:03', '2022-06-11 13:02:19', '2022-06-11 13:15:03'),
(9, 'App\\Models\\User', 11, 'secret', 'a6f41f52db1daffdb0bab72e90468301cf711edbc107cf439846b8c3a4b67057', '[\"*\"]', '2022-06-11 13:49:44', '2022-06-11 13:15:35', '2022-06-11 13:49:44'),
(10, 'App\\Models\\User', 11, 'secret', 'e22334b51202f284b51fc664ddce44c69e771d4f29bae79b4f09c78d97dbe00e', '[\"*\"]', '2022-06-11 15:23:07', '2022-06-11 13:51:43', '2022-06-11 15:23:07'),
(11, 'App\\Models\\User', 11, 'secret', 'cee90c6c9cf165181509faf03732c01510818bf81b467f4ed596373c05ea049b', '[\"*\"]', '2022-06-11 16:04:24', '2022-06-11 15:24:48', '2022-06-11 16:04:24'),
(12, 'App\\Models\\User', 11, 'secret', '5e180762a1ad8156802b85f371d65f951b55d10d708180b0c80463d7e0fb8ea5', '[\"*\"]', '2022-06-11 17:14:14', '2022-06-11 16:12:14', '2022-06-11 17:14:14'),
(13, 'App\\Models\\User', 11, 'secret', '4881606e50db5511d31b88d6d6e52338611a307bc1924a570bfb0a99622f6343', '[\"*\"]', '2022-06-11 18:12:52', '2022-06-11 17:20:08', '2022-06-11 18:12:52'),
(14, 'App\\Models\\User', 11, 'secret', '92e68f5f1a637af048b8bcc3d5f3755029013594fd77ad431bf7e5ab7a6aa8f8', '[\"*\"]', '2022-06-11 18:35:37', '2022-06-11 18:13:35', '2022-06-11 18:35:37'),
(15, 'App\\Models\\User', 11, 'secret', '21090df5eb80c17637f8a4df7bcd2eae2e46458057fa3a2281c5db42111f22fa', '[\"*\"]', '2022-06-11 18:40:37', '2022-06-11 18:36:54', '2022-06-11 18:40:37'),
(16, 'App\\Models\\User', 11, 'secret', 'db6a2715011df98e0009ab4bd1e185cf732591f338f72d0125bc50a6a6443d07', '[\"*\"]', '2022-06-11 18:52:50', '2022-06-11 18:41:17', '2022-06-11 18:52:50'),
(17, 'App\\Models\\User', 11, 'secret', '449f1777133d8b767fe805b309da5275b339066e2e77b44d1e02b25828c3e92b', '[\"*\"]', '2022-06-11 18:54:58', '2022-06-11 18:53:51', '2022-06-11 18:54:58'),
(18, 'App\\Models\\User', 11, 'secret', '35fe7dd059731f78d60a94f18fdb202a2882232c5d2c6ad667602d368bc7a7ce', '[\"*\"]', '2022-06-11 18:57:58', '2022-06-11 18:55:27', '2022-06-11 18:57:58'),
(19, 'App\\Models\\User', 11, 'secret', '1574e00b1abc3c626c7aa13d1d3d0b1b35df32a03e3d5fac98d2fd57de47a82e', '[\"*\"]', '2022-06-11 18:59:31', '2022-06-11 18:58:24', '2022-06-11 18:59:31'),
(20, 'App\\Models\\User', 11, 'secret', 'f0c2459a1df3b3f2bce6adaf5da5bd5391ab3827cd73bef7396912050226f566', '[\"*\"]', '2022-06-11 19:13:26', '2022-06-11 18:59:58', '2022-06-11 19:13:26'),
(21, 'App\\Models\\User', 11, 'secret', '77289d96c449f873322806670091eb803545a8c4da8f14ea85662a62f7061088', '[\"*\"]', '2022-06-11 19:53:27', '2022-06-11 19:13:52', '2022-06-11 19:53:27'),
(22, 'App\\Models\\User', 11, 'secret', '54d415dd735356c77fb3a5ee131b880eb2ff42d82f8d528143161910e598807c', '[\"*\"]', '2022-06-11 20:25:00', '2022-06-11 19:53:58', '2022-06-11 20:25:00'),
(23, 'App\\Models\\User', 11, 'secret', '0416628519f1c23aaad458fa85b13108cc04b39214c66e60858b6588455f0522', '[\"*\"]', NULL, '2022-06-11 20:25:35', '2022-06-11 20:25:35'),
(24, 'App\\Models\\User', 11, 'secret', 'c0f719ff9e855337cece2e6830c119e1563a818c14794ba118538d5566f72f0e', '[\"*\"]', '2022-06-12 08:56:59', '2022-06-11 21:02:27', '2022-06-12 08:56:59'),
(25, 'App\\Models\\User', 11, 'secret', 'b972dec9dbd28b5b94d38f8de37c265f2aa258ff5266c3f46ad58f31b3f1bbae', '[\"*\"]', '2022-06-12 09:21:53', '2022-06-12 08:58:46', '2022-06-12 09:21:53'),
(26, 'App\\Models\\User', 11, 'secret', '9053f54d8ac4047ed662895be7b36bb51e9ba35d6fa04ab681bdedbf9b8e81aa', '[\"*\"]', '2022-06-12 09:49:07', '2022-06-12 09:22:29', '2022-06-12 09:49:07'),
(27, 'App\\Models\\User', 11, 'secret', '0f2c946f73ba1bf8987e33166ffa395fc782a052c6d26ad15ac94dcfbb5a9b80', '[\"*\"]', '2022-06-12 09:53:48', '2022-06-12 09:49:47', '2022-06-12 09:53:48'),
(28, 'App\\Models\\User', 11, 'secret', 'fc1a283bbf8adba48defa91c0d8c3e1e6489c6dc0908196f20b195272f8ff5e5', '[\"*\"]', '2022-06-12 10:06:13', '2022-06-12 09:54:27', '2022-06-12 10:06:13'),
(29, 'App\\Models\\User', 11, 'secret', '56379cb67f7f910fd63c7381735075d5e43c0b8f1c5aec6df5d88da06f1ef1e1', '[\"*\"]', '2022-06-12 10:37:49', '2022-06-12 10:06:39', '2022-06-12 10:37:49'),
(30, 'App\\Models\\User', 11, 'secret', '8fbeebd33e0af16e4636ba0cd540870dcec574129b0d9f51f05d0e1b013a0c92', '[\"*\"]', '2022-06-12 10:55:07', '2022-06-12 10:39:43', '2022-06-12 10:55:07'),
(31, 'App\\Models\\User', 11, 'secret', '2cb62afefaa9e116b1d7e66f820e34d817c1c26e0bc48ef185c3839059b301d8', '[\"*\"]', '2022-06-12 10:57:55', '2022-06-12 10:56:03', '2022-06-12 10:57:55'),
(32, 'App\\Models\\User', 11, 'secret', 'aa03a3e1c0c85a74a14ef251b6166c66dd7bf5f0fd69d6140bad15b5aa97627a', '[\"*\"]', '2022-06-12 11:04:12', '2022-06-12 10:58:19', '2022-06-12 11:04:12'),
(33, 'App\\Models\\User', 11, 'secret', '126cf11a8371b2ba4de2f64cca1de52a06dad5850500d7a5a9a59c077100a6e0', '[\"*\"]', '2022-06-12 11:11:47', '2022-06-12 11:04:43', '2022-06-12 11:11:47'),
(34, 'App\\Models\\User', 11, 'secret', 'bff6ead8d95d247ad062c32994f158f1f6daa049210757f7a6470c55e36ed819', '[\"*\"]', '2022-06-12 11:14:58', '2022-06-12 11:12:53', '2022-06-12 11:14:58'),
(35, 'App\\Models\\User', 11, 'secret', '54bf43ac7bbedadbac9f08fad055fd6abfde5ac32d942b0de6cd60173fd8105f', '[\"*\"]', '2022-06-12 11:30:41', '2022-06-12 11:15:20', '2022-06-12 11:30:41'),
(36, 'App\\Models\\User', 11, 'secret', 'b8e49b0a30a4620c258d17866a958c3ad413a7854b7a62cf9414062b1a8322ca', '[\"*\"]', '2022-06-12 11:31:48', '2022-06-12 11:31:18', '2022-06-12 11:31:48'),
(37, 'App\\Models\\User', 11, 'secret', 'e0c7342db28d1807ec4b568d100c8537e87c9087ddc9e5aa740fcff537ee032e', '[\"*\"]', '2022-06-12 11:34:09', '2022-06-12 11:32:20', '2022-06-12 11:34:09'),
(38, 'App\\Models\\User', 11, 'secret', '19cce4f606e0255c252a4d49bdb65eb066ac32d89936aa1d21cd4408feab51b7', '[\"*\"]', '2022-06-12 14:56:05', '2022-06-12 11:34:44', '2022-06-12 14:56:05'),
(39, 'App\\Models\\User', 11, 'secret', '1b0389b96bd7654c53e748d16bb1a797ea4572bf45968fc069d2b2eb80f717c2', '[\"*\"]', '2022-06-12 12:42:38', '2022-06-12 12:22:31', '2022-06-12 12:42:38'),
(40, 'App\\Models\\User', 11, 'secret', 'ff849b84304c6ad6b9e9c7a912f00da5017e4d7e1a89ff3fd04f4d2c4f7948af', '[\"*\"]', '2022-06-12 12:43:35', '2022-06-12 12:43:10', '2022-06-12 12:43:35'),
(41, 'App\\Models\\User', 11, 'secret', 'd3c3c929f085388f14b7c9c6c465684905c11563f59bd72e966b68ecb61f4ffc', '[\"*\"]', '2022-06-12 12:46:46', '2022-06-12 12:43:59', '2022-06-12 12:46:46'),
(42, 'App\\Models\\User', 11, 'secret', '2ba7d4f96d29a2501e54c148c4ae95630de8015c9b709427ab69e36839314145', '[\"*\"]', '2022-06-12 12:51:45', '2022-06-12 12:47:11', '2022-06-12 12:51:45'),
(43, 'App\\Models\\User', 11, 'secret', 'af242daa01b53d1cd04ac5e9fc7d0b22a47357cf6d834fe670848a6b456b2715', '[\"*\"]', '2022-06-12 12:53:06', '2022-06-12 12:52:08', '2022-06-12 12:53:06'),
(44, 'App\\Models\\User', 11, 'secret', 'd010f7bae7fb267cca86eef1f1f0faf930aa0fcee40be8c22294fecfd8ce186f', '[\"*\"]', '2022-06-12 12:56:07', '2022-06-12 12:53:24', '2022-06-12 12:56:07'),
(45, 'App\\Models\\User', 11, 'secret', 'd6af0ebf302ca8c5c222f1ae1028ce9f97606b100260b9d124455983bd6ce5ae', '[\"*\"]', '2022-06-12 13:03:06', '2022-06-12 12:56:30', '2022-06-12 13:03:06'),
(46, 'App\\Models\\User', 11, 'secret', 'a3df68847d212db9df53c255cd824df13c494ae5310e59a4dcdb033169dbc324', '[\"*\"]', '2022-06-12 14:52:10', '2022-06-12 13:03:27', '2022-06-12 14:52:10'),
(47, 'App\\Models\\User', 11, 'secret', 'fc101dacc75144802e2be7c5bd3c42b32d18c8519f347688f20cc29fb9cf43a5', '[\"*\"]', NULL, '2022-06-12 14:53:12', '2022-06-12 14:53:12'),
(48, 'App\\Models\\User', 11, 'secret', '414a48485c6c14686d17d4c98facff2debebc37c15bf3b2c888ca3c23b2db13a', '[\"*\"]', '2022-06-12 15:52:04', '2022-06-12 15:20:43', '2022-06-12 15:52:04'),
(49, 'App\\Models\\User', 11, 'secret', '788520575453ef68d3d5108a65a785bffaa1aa6c11e9599ce989f187e7aa9057', '[\"*\"]', '2022-06-12 15:53:28', '2022-06-12 15:52:28', '2022-06-12 15:53:28'),
(50, 'App\\Models\\User', 11, 'secret', '5c4693b48ed6a42fc87ef963878a0c44e785a9ec0dafb96b8bb4758f00df442b', '[\"*\"]', '2022-06-12 16:00:56', '2022-06-12 15:54:05', '2022-06-12 16:00:56'),
(51, 'App\\Models\\User', 11, 'secret', '90adcc7616c700887b995e35fc5f52357f20555a12b011cd739bd4195322d8a2', '[\"*\"]', '2022-06-12 16:25:56', '2022-06-12 16:01:40', '2022-06-12 16:25:56'),
(52, 'App\\Models\\User', 11, 'secret', 'ab1f2604c85122388cd38f9bf90783cfe95e7deae2836ee10843930effdfd73a', '[\"*\"]', '2022-06-14 17:21:28', '2022-06-12 16:26:42', '2022-06-14 17:21:28'),
(53, 'App\\Models\\User', 11, 'secret', '670bf30d84547f55ab0d3e5c4fdcb13234994282de529318c905823e01a30e5c', '[\"*\"]', NULL, '2022-06-12 17:38:25', '2022-06-12 17:38:25'),
(54, 'App\\Models\\User', 11, 'secret', '3aeb6c128980bcba90fe392cba9c9542e868e90cd5c21506f8ab7003e4219a3e', '[\"*\"]', NULL, '2022-06-13 10:48:19', '2022-06-13 10:48:19'),
(55, 'App\\Models\\User', 11, 'secret', '73dd92139dfd116a6e5d2944056b7f7a462351e6d5180251962cc956d00f6d3e', '[\"*\"]', '2022-06-13 12:41:43', '2022-06-13 12:21:57', '2022-06-13 12:41:43'),
(56, 'App\\Models\\User', 11, 'secret', 'fe3fca61ef986b86dfe5867a4584544d7aac1de73505da73eb5e0b433ef40457', '[\"*\"]', '2022-06-14 23:41:01', '2022-06-13 12:42:11', '2022-06-14 23:41:01'),
(57, 'App\\Models\\User', 14, 'secret', '66058c544d963daa6d8b4907ebe8d9c2babe267996e3d67beb6e4a122a91c8a5', '[\"*\"]', NULL, '2022-06-13 14:26:32', '2022-06-13 14:26:32'),
(58, 'App\\Models\\User', 11, 'secret', '5fad72a7a2d11fea5ba63caa60203c79f2e62df502edc89c14708ab22f5367b7', '[\"*\"]', '2022-06-14 18:35:06', '2022-06-14 17:25:30', '2022-06-14 18:35:06'),
(59, 'App\\Models\\User', 11, 'secret', '59a794e1f958840c5288bcafa49f44247ab1ade340e4813f62781cc0f6a7272b', '[\"*\"]', '2022-06-14 18:37:04', '2022-06-14 18:35:30', '2022-06-14 18:37:04'),
(60, 'App\\Models\\User', 11, 'secret', '779d718b0bc13d9e7f046c5db6b8823ca394ed2baa6166ce4588dc8987749fe7', '[\"*\"]', '2022-06-14 18:41:18', '2022-06-14 18:39:48', '2022-06-14 18:41:18'),
(61, 'App\\Models\\User', 11, 'secret', 'bea7cbd415cb7188de1e96c1114afec591f31d554408076eda2a5d0629eab2de', '[\"*\"]', '2022-06-14 19:00:10', '2022-06-14 18:41:46', '2022-06-14 19:00:10'),
(62, 'App\\Models\\User', 11, 'secret', 'a9439c61cfd77e1de6edddcc85c4c82f5af02287880a3367d380b97ca25287c7', '[\"*\"]', '2022-06-14 19:17:40', '2022-06-14 19:02:15', '2022-06-14 19:17:40'),
(63, 'App\\Models\\User', 11, 'secret', '0c17119cf2ffc355ff9c15697fa284da082a6885400156767830838c474da2c8', '[\"*\"]', '2022-06-14 19:39:52', '2022-06-14 19:18:15', '2022-06-14 19:39:52'),
(64, 'App\\Models\\User', 11, 'secret', 'cdb7520bf104a49fc392632acdbf39009774cb9d976e326e4a2ec128aadc4194', '[\"*\"]', '2022-06-14 20:53:23', '2022-06-14 19:40:37', '2022-06-14 20:53:23'),
(65, 'App\\Models\\User', 11, 'secret', '8a9da638a9daf7c5bb0e3bdefe03f3a42d0ca7e01441857135f383f3dc2754f5', '[\"*\"]', '2022-06-14 21:35:12', '2022-06-14 20:54:53', '2022-06-14 21:35:12'),
(66, 'App\\Models\\User', 11, 'secret', 'efe756e80e43590ca0027801bca445719fed0a8a71279ac9cddf271ef357f22c', '[\"*\"]', '2022-06-14 22:10:26', '2022-06-14 21:37:51', '2022-06-14 22:10:26'),
(67, 'App\\Models\\User', 11, 'secret', 'cdb7a5b5b29b5bf15dd8efea8db92e58c19b66d71e206e74a08f18f44bbe5e6a', '[\"*\"]', '2022-06-14 22:26:52', '2022-06-14 22:16:26', '2022-06-14 22:26:52'),
(68, 'App\\Models\\User', 11, 'secret', 'ce9926e88bf1751fe4e33a2673e8631a058f54fc04ab16b329824ba467437f69', '[\"*\"]', '2022-06-15 08:49:27', '2022-06-14 22:27:41', '2022-06-15 08:49:27'),
(69, 'App\\Models\\User', 11, 'secret', '28c6f3950141a15167abde278b2eb41b06d733b37f0318f26376afe34fc673ec', '[\"*\"]', '2022-06-15 01:10:30', '2022-06-14 23:41:32', '2022-06-15 01:10:30'),
(70, 'App\\Models\\User', 11, 'secret', 'e1c7bee88e72c1cc460a181babfd49f5732afe936156076bb34b9c8464351730', '[\"*\"]', '2022-06-15 08:29:31', '2022-06-15 01:15:26', '2022-06-15 08:29:31'),
(71, 'App\\Models\\User', 11, 'secret', '92ad9d323ed27e805fc0a3745fad255bac01bc1ad15a06ec6b8b3df6436f46e0', '[\"*\"]', '2022-06-15 15:26:43', '2022-06-15 08:37:26', '2022-06-15 15:26:43'),
(72, 'App\\Models\\User', 11, 'secret', 'a394931b87a08643856b5ba7d52e15b039737b871c86e489330e377d4d080b60', '[\"*\"]', '2022-06-15 13:22:43', '2022-06-15 09:23:07', '2022-06-15 13:22:43'),
(73, 'App\\Models\\User', 11, 'secret', '140715822c2220c3a7ef01190f95f08786e4051fc234afb60066668fd0a10469', '[\"*\"]', '2022-06-15 13:32:31', '2022-06-15 13:23:19', '2022-06-15 13:32:31'),
(74, 'App\\Models\\User', 11, 'secret', 'f7bc26600f182bea66deabcdd3ecf914eafc48b4a1b143f532d062cfb551e305', '[\"*\"]', '2022-06-15 13:56:49', '2022-06-15 13:33:01', '2022-06-15 13:56:49'),
(75, 'App\\Models\\User', 11, 'secret', '4be08ba045716675595ca4ff3fdfa36f586267527122264a29ad99b7a4b015ab', '[\"*\"]', '2022-06-15 14:33:31', '2022-06-15 13:57:18', '2022-06-15 14:33:31'),
(76, 'App\\Models\\User', 11, 'secret', '07054bfb90f86a2eecaff1265ae2be620b8e14d2a1d89aa04ade7656da91a131', '[\"*\"]', '2022-06-15 17:24:55', '2022-06-15 14:36:27', '2022-06-15 17:24:55'),
(77, 'App\\Models\\User', 11, 'secret', 'fef518ee3fd2d7108ae0d74697cc20228dee3bed0527001842b1f18f6f3eeaa7', '[\"*\"]', '2022-06-15 17:31:33', '2022-06-15 15:35:06', '2022-06-15 17:31:33'),
(78, 'App\\Models\\User', 11, 'secret', '41944139f136556f724339a3fceb29becdbaa0d6bc0a342ca588667041856a26', '[\"*\"]', '2022-06-15 17:40:04', '2022-06-15 17:32:07', '2022-06-15 17:40:04'),
(79, 'App\\Models\\User', 11, 'secret', '56763ebf53eda3431a2660a65088add466e2cbae3850b82c49ec3ee1e1a8cb9b', '[\"*\"]', '2022-06-16 19:18:28', '2022-06-15 17:32:37', '2022-06-16 19:18:28'),
(80, 'App\\Models\\User', 11, 'secret', 'cfb677aaf18cbf4a08c8539d2ee24a5b125b396ebb5ae61cd4ecdd13f9092f5e', '[\"*\"]', '2022-06-15 18:31:38', '2022-06-15 17:41:18', '2022-06-15 18:31:38'),
(81, 'App\\Models\\User', 11, 'secret', '2d03f5ddf9bf67a34a58cc00aa2b79086e0a027c6e916177691576382e180cef', '[\"*\"]', '2022-06-16 20:16:58', '2022-06-15 18:33:39', '2022-06-16 20:16:58'),
(82, 'App\\Models\\User', 11, 'secret', '7f6a6484c518a8a9e77a9bfd755a1d0e617e9d2cfff8c76c8017cc4eb8dba0e1', '[\"*\"]', NULL, '2022-06-16 19:19:23', '2022-06-16 19:19:23'),
(83, 'App\\Models\\User', 11, 'secret', '9e7981d8d7fe6bf1402c4ff34cc3155b94ad9296eff63b7a8c91ede66758af96', '[\"*\"]', NULL, '2022-06-16 19:24:51', '2022-06-16 19:24:51'),
(84, 'App\\Models\\User', 11, 'secret', '26ce5bed7bab0834e35f653dfe56e26f9fefc36561bf0e922bde36f01a761e4d', '[\"*\"]', NULL, '2022-06-16 19:28:39', '2022-06-16 19:28:39'),
(85, 'App\\Models\\User', 11, 'secret', '96e5071a1e31c7f7ba00008a465a5201b4d62b824f1687485affeef38c8742c6', '[\"*\"]', NULL, '2022-06-16 19:33:00', '2022-06-16 19:33:00'),
(86, 'App\\Models\\User', 11, 'secret', 'bf063908938e1ba8334307e9c3e1ac6628bbd1a227701b600cbc7dd89c1ff0d7', '[\"*\"]', '2022-06-23 02:45:02', '2022-06-16 20:17:20', '2022-06-23 02:45:02'),
(87, 'App\\Models\\User', 11, 'secret', 'd247ef5916c063faf0a56e4eba27fb0bdaeee554ece8f5c4431cef409fb6e4e1', '[\"*\"]', '2022-06-16 21:22:57', '2022-06-16 20:42:29', '2022-06-16 21:22:57'),
(88, 'App\\Models\\User', 11, 'secret', '9c68bb573f0f8a733f30a88d5ead4027e831e167f071dda15e5ee57fa0e22e8e', '[\"*\"]', '2022-06-18 17:19:30', '2022-06-16 21:26:52', '2022-06-18 17:19:30'),
(89, 'App\\Models\\User', 11, 'secret', 'ad0b1565cd8c0d3d4362363a163447ef31a8c42466a770a5c9b2c1fefbacc4d2', '[\"*\"]', NULL, '2022-06-18 17:21:38', '2022-06-18 17:21:38'),
(90, 'App\\Models\\User', 11, 'secret', 'ce6a8009bf6b1b47ceeefaf8db55bdec59e41c434836592bc96cf4e3e05a62d9', '[\"*\"]', NULL, '2022-06-23 02:45:26', '2022-06-23 02:45:26');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagline` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `discount_type` enum('fixed','percent') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `inclusion` longtext COLLATE utf8mb4_unicode_ci,
  `exclusion` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `services_slug_unique` (`slug`),
  KEY `services_service_category_id_foreign` (`service_category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `service_categories`
--

DROP TABLE IF EXISTS `service_categories`;
CREATE TABLE IF NOT EXISTS `service_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `service_categories_slug_index` (`slug`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('fs5pf4OzgLPw6hhrrjwO1Wr9q0BwosywPL8vMtdp', 15, '192.168.43.111', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMHgxYjBYYUFjTjBtZjRQSjRua3hIeGxkd3U1ZjR5b1V5ME1oTnJuNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xOTIuMTY4LjQzLjExMTo4MDAwL2N1c3RvbWVyL2Rhc2hib2FyZCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE1O3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHVlZUlvQk96VHdQYUpoVjVJdE9aenU2TkdqTE02SVdXWmgxNGNNcm85Q01RYmJ3QU1nQmg2Ijt9', 1656072322);

-- --------------------------------------------------------

--
-- Structure de la table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `sprovider_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_service_id_foreign` (`service_id`),
  KEY `transactions_sprovider_id_foreign` (`sprovider_id`),
  KEY `transactions_customer_id_foreign` (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'CST',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `utype`, `created_at`, `updated_at`, `phone`) VALUES
(1, 'admin', 'admin@joinus.com', NULL, '$2y$10$iQH27jWaUvsxkbK.CS01m.0WtVz3H73qAatpLG6kRmaeU8leLuICe', NULL, NULL, NULL, NULL, NULL, NULL, 'ADM', '2022-06-04 20:40:09', '2022-06-04 20:40:09', NULL),
(2, 'prestatairep', 'prestataire@gmail.com', NULL, '$2y$10$5OJfFFD1PmBnZAMF4fScvuTEmbKeuyAf0U4yMNeSmBFmm.XwZGk0u', NULL, NULL, NULL, NULL, NULL, NULL, 'SVP', '2022-06-04 20:42:26', '2022-06-04 20:42:26', NULL),
(3, 'client s', 'client@gmail.com', NULL, '$2y$10$1As7Ka7R/OZJtrtr7oPWrO/TpgyJgk8oVFJ.YKKvgKrXTvtVVvQta', NULL, NULL, NULL, NULL, NULL, NULL, 'CST', '2022-06-04 20:42:57', '2022-06-04 20:42:57', NULL),
(4, 'windesign', 'malaika@gmail.com', NULL, '$2y$10$PDlV7OnravSUuE5h1Nz2EO5rdTR5pFppfhVx/KEgwhkMqGt//rYOi', NULL, NULL, NULL, NULL, NULL, NULL, 'SVP', '2022-06-04 22:14:58', '2022-06-04 22:14:58', '0691323656'),
(5, 'flutter', 'client2@gmail.com', NULL, '$2y$10$96205xblPzCZhj/9TFj5VOBV2BzL.CB/IuMpZRGCBQOVTGQOicxiC', NULL, NULL, NULL, NULL, NULL, NULL, 'CST', '2022-06-04 22:16:22', '2022-06-04 22:16:22', '0691323653'),
(6, 'LIBII DANIELLE', 'libiidanielle@gmail.com', NULL, '$2y$10$O2yLHP.spYFoRXN2YpDpZukVE.EY0cIXAXEQQXixaH4QkziugS8K2', NULL, NULL, NULL, NULL, NULL, NULL, 'CST', '2022-06-06 10:19:57', '2022-06-06 10:19:57', '6328273923'),
(7, 'Graniel Vibel', 'graniel@gmail.com', NULL, '$2y$10$MQjtZzJzX/Ws7um0ezA5WOL1cy9lQellckk9.0T1Y4K0lrMSFiTEO', NULL, NULL, NULL, NULL, NULL, NULL, 'SVP', '2022-06-07 12:51:33', '2022-06-07 12:51:33', '6913236561'),
(8, 'fdhds', 'fdhds@gmail.com', NULL, '$2y$10$wNTbyCH/zhJDEU4uET671euQdPAXnyRVjJ85qru0jcg6TECuuzLhy', NULL, NULL, NULL, NULL, NULL, NULL, 'CST', '2022-06-07 21:28:44', '2022-06-07 21:28:44', '6913236561'),
(9, 'Ornelle', 'ornelle@gmail.com', NULL, '$2y$10$q2IajWW7Mn9bOXpa6lpomu9QVT.SeEzhQ7LLmrTd6jQ0901PDVr6y', NULL, NULL, NULL, NULL, NULL, NULL, 'SVP', '2022-06-09 09:07:42', '2022-06-09 09:07:42', '0690232132'),
(10, 'seini', 'seiniabaya@gmail.com', NULL, '$2y$10$immQneHUEh.kZnP3Dz.5uuqp/B5mM8TMDoW0l.gl.MnZ3CJJnJWfW', NULL, NULL, NULL, NULL, NULL, NULL, 'CST', '2022-06-09 15:59:12', '2022-06-09 15:59:12', NULL),
(11, 'Diana Sali', 'diana@gmail.com', NULL, '$2y$10$O9Xx7J77ftUbl4a7zocTRefrkBbBRJyRPFuRY8qr/VXbSswyKL8fO', NULL, NULL, NULL, NULL, NULL, NULL, 'SVP', '2022-06-09 21:49:58', '2022-06-09 21:49:58', '655353756'),
(12, 'Avan', 'avan@gmail.com', NULL, '$2y$10$upee2LO0G08HX7kg1pf58uaFsMl6.yEPW0BQjhSj6.R9DmodEVli.', NULL, NULL, NULL, NULL, NULL, NULL, 'SVP', '2022-06-10 21:36:41', '2022-06-10 21:36:41', '691323656'),
(13, 'Sami dicko', 'sami@gmail.com', NULL, '$2y$10$jBD8SmdV.zNdUTA//0ZHEuoqs.6Pl3FJ959eszkWzI2ccaUYO.yBG', NULL, NULL, NULL, NULL, NULL, NULL, 'CST', '2022-06-10 22:08:56', '2022-06-10 22:08:56', '655292167'),
(14, 'Ornelle KAMDEM', 'fabornelle@gmail.com', NULL, '$2y$10$tR5RmU1rDlHw.SmwK5rmmuaA3eWAnGydIHw7HbgeTcVapisUfUicu', NULL, NULL, NULL, NULL, NULL, NULL, 'CST', '2022-06-13 14:26:32', '2022-06-13 14:26:32', '695510268'),
(15, 'client1', 'client1@joinus.com', NULL, '$2y$10$ueeIoBOzTwPaJhV5ItOZzu6NGjLM6IWWZh14cMro9CMQbbwAMgBh6', NULL, NULL, NULL, NULL, NULL, NULL, 'CST', '2022-06-24 11:03:07', '2022-06-24 11:03:07', '0691232454');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
