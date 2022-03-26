-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2022 at 07:16 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `master_piece`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `country`, `city`, `street`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Jordan', 'Amman', 'amman', 2, '2022-03-26 05:51:58', '2022-03-26 05:51:58'),
(2, 'Jordan', 'amman', 'amman', 10, '2022-03-26 15:10:44', '2022-03-26 15:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Clay Crafts', 'images/16483114531645646413Untitled design (40).png', '2022-03-26 04:45:05', '2022-03-26 13:17:33'),
(2, 'Drawing', 'images/16483113461645645200Untitled design (32).png', '2022-03-26 04:45:05', '2022-03-26 13:15:46'),
(3, 'Quilling Paper', 'images/16483114251647852636Untitled design (37).png', '2022-03-26 04:45:05', '2022-03-26 13:17:05'),
(4, 'Crochet', 'images/16483111283865_little-amigurumi-bear-with-scarf-free-crochet-pattern.jpg', '2022-03-26 05:29:41', '2022-03-26 13:12:08'),
(5, 'Embroidery', 'images/1648311184download.jpg', '2022-03-26 13:13:04', '2022-03-26 13:13:04'),
(6, 'Haymaking', 'images/16483114381647853050Untitled design (36).png', '2022-03-26 13:17:18', '2022-03-26 13:17:18'),
(7, 'Paper Flowers', 'images/1648311727Untitled design (41).png', '2022-03-26 13:22:07', '2022-03-26 13:22:07');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(264, '2013_01_13_091517_create_roles_table', 1),
(265, '2014_10_12_000000_create_users_table', 1),
(266, '2014_10_12_100000_create_password_resets_table', 1),
(267, '2019_08_19_000000_create_failed_jobs_table', 1),
(268, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(269, '2021_01_13_093914_create_owner_infos_table', 1),
(270, '2022_01_08_123347_create_categories_table', 1),
(271, '2022_01_08_123404_create_products_table', 1),
(272, '2022_01_08_123434_create_addresses_table', 1),
(273, '2022_01_08_123448_create_orders_table', 1),
(274, '2022_01_08_123604_create_order_details_table', 1),
(275, '2022_01_08_123621_create_comments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `total_price` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `status`, `total_price`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'pending', 64, 2, '2022-03-26 05:52:31', '2022-03-26 05:52:31'),
(2, 'pending', 144, 4, '2022-03-26 15:08:20', '2022-03-26 15:08:20'),
(3, 'Delivered', 59, 10, '2022-03-26 15:10:00', '2022-03-26 15:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `size`, `color`, `price`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 19, 6, 's', 'red', 20, 'Pending', '2022-03-26 15:08:20', '2022-03-26 15:08:20'),
(3, 2, 7, 4, 's', 'red', 5, 'Delivered', '2022-03-26 15:08:20', '2022-03-26 15:14:11'),
(4, 3, 5, 1, 's', 'red', 4, 'Pending', '2022-03-26 15:10:00', '2022-03-26 15:10:00'),
(5, 3, 4, 1, 's', 'red', 16, 'Pending', '2022-03-26 15:10:00', '2022-03-26 15:10:00'),
(6, 3, 9, 1, 's', 'red', 20, 'Pending', '2022-03-26 15:10:00', '2022-03-26 15:10:00'),
(7, 3, 3, 1, 's', 'red', 15, 'Pending', '2022-03-26 15:10:00', '2022-03-26 15:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `owner_infos`
--

CREATE TABLE `owner_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_new` tinyint(1) NOT NULL,
  `is_onSale` tinyint(1) NOT NULL,
  `price` int(11) NOT NULL,
  `sale_price` int(11) DEFAULT NULL,
  `main_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `third_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `is_new`, `is_onSale`, `price`, `sale_price`, `main_image`, `second_image`, `third_image`, `tag`, `color`, `size`, `quantity`, `owner_id`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 'Ballerina Doll', 'This doll is lovingly crocheted/knitted with gorgeous, contemporary design.\r\n\r\nManufacturing time:12 Hours .\r\n\r\nMaterials & Safety - 100% soft cotton outer with a 100% polyester fill. Safe for ages 0+, this doll is non-toxic . No batteries are needed for this toy; it needs only little hands to show it some love.\r\n\r\nMachine Washable- For best results, place your doll in mesh bag and launder with cool water and non-toxic detergent. Fluff in dryer for a few minutes and then air dry.\r\n\r\nChild Development - Colors, textures and shapes, auditory and visual stimulation. Great for role play, storytelling and imaginative play.\r\n\r\nA quality gift that will be treasured for years. Perfect for baby shower gifts, baby’s first birthday or to decorate your nursery.\r\n\r\nGame length 40 cm Head circumference 34 cm, hand length 13 cm, leg length 13 cm\r\n\r\nIn case of a pre-order it takes between 7-25 days.\r\n\r\nAll this handmade Products are crafted piece by piece by Sanaaty Hands.\r\n\r\nMade in Jordan', 1, 0, 30, 30, 'images/164831783216483110623865_little-amigurumi-bear-with-scarf-free-crochet-pattern.jpg', 'images/16483109153865_little-amigurumi-bear-with-scarf-free-crochet-pattern.jpg', 'images/16483109153865_little-amigurumi-bear-with-scarf-free-crochet-pattern.jpg', 'doll', 'black', 's', 50, 4, 4, '2022-03-26 13:08:35', '2022-03-26 15:03:52'),
(3, 'Amigurumi Stuffed Toy', 'Materials & Safety - 100% soft cotton outer with a 100% polyester fill. Safe for ages 0+, this doll is non-toxic . No batteries are needed for this toy; it needs only little hands to show it some love.\r\n\r\nMachine Washable- For best results, place your doll in mesh bag and launder with cool water and non-toxic detergent. Fluff in dryer for a few minutes and then air dry.\r\n\r\nChild Development - Colors, textures and shapes, auditory and visual stimulation. Great for role play, storytelling and imaginative play.', 1, 0, 15, 15, 'images/16483178721648317852164831195671EbQfwdwxL._SX466_.jpg', 'images/164831195671EbQfwdwxL._SX466_.jpg', 'images/164831195671EbQfwdwxL._SX466_.jpg', 'tgtg', 'red', 'm', 50, 4, 4, '2022-03-26 13:25:56', '2022-03-26 15:04:32'),
(4, '12 Pack Cute Mini Baby Girl Jacket', 'Sweetly Baby Girl style Keepsake for baby showers, festivals, parties, etc\r\n\r\nExclusive design, carefully handmade and crocheted , Your friends or guests will love this adorable keepsake giveaway baby shower or birthday party.\r\n\r\nManufacturing time:20 minutes per piece . \r\n\r\nHANDMADE, CROCHET, LIGHT WEIGHT, SOFTNESS,SKIN-FRIENDLY, comfortable. Suitable for many occasions.This cute products are a great for Al-EID gifts(Ramadan Or Adha Eid ) ( Easter ) or birthday presents or party present or holiday gifts .', 1, 1, 16, 12, 'images/1648312061DSC_0816-550x400.jpg', 'images/1648312061DSC_0816-550x400.jpg', 'images/1648312061DSC_0816-550x400.jpg', 'ff', 'fcfd', 's', 64, 3, 4, '2022-03-26 13:27:41', '2022-03-26 13:27:41'),
(5, 'Flower Decorations', 'Crepe Paper Flowers, Handcrafted Flowers.\r\nGreat Gift for Mother\'s Day Valentine\'s Day Wedding and Eids.\r\nFlower that never dies, Love that never ends.\r\nManufacturing time:1 Hour per piece\r\nSize:  flower 18 cm.diameter, Stem Length :40 cm. (Because it\' s handmade, There may be a little deviation in size.)\r\nMaterial：Premium quality crepe paper. Color: Red , White', 1, 0, 4, 3, 'images/1648312348DSC_9624-200x140.jpg', 'images/1648312348DSC_9624-200x140.jpg', 'images/1648312348DSC_9624-200x140.jpg', 'ff', 'red', 'm', 50, 3, 7, '2022-03-26 13:32:28', '2022-03-26 13:32:28'),
(6, 'Quilling Art Notebook', 'Make your friend\'s day happy with this beautiful gift  .All designs for Beautiful Notebooks from Sanaaty are made of  Quilling Art .Manufacturing time: 2 Hours per piece .Feel free to follow our designer colors or to change the.', 1, 0, 5, 3, 'images/1648312463021-200x140.jpg', 'images/1648312463021-200x140.jpg', 'images/1648312463021-200x140.jpg', 'ff', 'green', 'm', 2, 3, 3, '2022-03-26 13:34:23', '2022-03-26 13:34:23'),
(7, 'Quilling Art Notebook', 'Make your friend\'s day happy with this beautiful gift  .All designs for Beautiful Notebooks from Sanaaty are made of  Quilling Art .Manufacturing time: 2 Hours per piece .Feel free to follow our designer colors or to change the.', 0, 1, 5, 4, 'images/1648312544128-200x140.jpg', 'images/1648312544128-200x140.jpg', 'images/1648312544128-200x140.jpg', 'notebook', 'orange', 'm', 4, 3, 3, '2022-03-26 13:35:44', '2022-03-26 13:35:44'),
(8, 'Rainbows & Lilies Paper Flowers', 'Rainbows & Lilies Paper Flowers Decorations for Wall, Wedding, Bridal Shower, Baby Shower, Nursery Decor, Flower Backdrop, Party - 10-PCS, 3D Flowers, Handmade & Assembled (Pink, Gray, Off-White', 0, 1, 30, 25, 'images/1648312995d871936ae69459e10aaea55cc02a37c1.jpg', 'images/1648312995d871936ae69459e10aaea55cc02a37c1.jpg', 'images/1648312995d871936ae69459e10aaea55cc02a37c1.jpg', 'flower', 'black', 's', 4, 6, 7, '2022-03-26 13:43:15', '2022-03-26 13:43:15'),
(9, 'Pink Wall Decor', '3D Paper FLowers: This set of pink 3D flower wall decor will make a statement in the nursery, bedroom, bathroom, living room, or office\r\nFor Any Occasions: Create your own flower wall backdrop for an upcoming wedding, baby shower, bridal shower, engagement party, or birthday party', 1, 1, 20, 15, 'images/1648313085611ztA8rJXL._AC_SY450_.jpg', 'images/1648313085611ztA8rJXL._AC_SY450_.jpg', 'images/1648313085611ztA8rJXL._AC_SY450_.jpg', 'pen', 'pink', 'l', 3, 6, 7, '2022-03-26 13:44:45', '2022-03-26 13:44:45'),
(10, 'Fonder Mols', 'Make your own Paper Flower Backdrop with our ready-to-use combo set that includes 19 pieces big paper flowers: 2pcs 8 inch +1pcs 6 inch + 3pcs 4 inch flowers +8pcs paper leaves+5pcs pink paper butterflies; & Some Adhensive Stickers Circles; ALL IN ONE PACKAGE! Great Value!', 0, 0, 30, 28, 'images/164831318871imGHFzszL._AC_SX450_.jpg', 'images/164831318871imGHFzszL._AC_SX450_.jpg', 'images/164831318871imGHFzszL._AC_SX450_.jpg', 'flower', 'green', 'l', 6, 6, 7, '2022-03-26 13:46:28', '2022-03-26 13:46:28'),
(11, 'Crepe Paper Flowers', 'Size: 1 flower 10\" diameter /2 flower 8\" diameter /2 flower 6\" diameter，The size may vary slightly because it\'s handmade. Color: Red (Poppies)\r\nMaterial：Premium quality crepe paper is exquisite, Each Poppy flowers is completely handmade and unique', 1, 1, 20, 17, 'images/164831332871DXIBN6vBL._AC_SY450_.jpg', 'images/164831332871DXIBN6vBL._AC_SY450_.jpg', 'images/164831332871DXIBN6vBL._AC_SY450_.jpg', 'flower', 'red', 'l', 5, 6, 7, '2022-03-26 13:48:48', '2022-03-26 13:48:48'),
(12, 'Crepe Paper Flower', 'UNIQUE MOTHERS DAY GIFT FOR HER: Handmade paper rose makes a sweet gift for Valentine Day, Wedding Anniversary, Birthday gift, Mother’s Day, Christmas. gift for your beloved, your mom, your girlfriend, your wife.\r\nBEAUTIFUL AND HEARTFELT gifts idea to celebrate your anniversary wedding day, paper rose is the traditional gift for the 1st anniversary. Great gift for him or her!', 1, 0, 4, 3, 'images/164831343761hOsJcOViL._AC_SX425_.jpg', 'images/164831343761hOsJcOViL._AC_SX425_.jpg', 'images/164831343761hOsJcOViL._AC_SX425_.jpg', 'flower', 'pink', 'l', 50, 6, 7, '2022-03-26 13:50:37', '2022-03-26 13:50:37'),
(13, 'Straw Beach Bags', 'Rattan,Cloth,Straw\r\nImported\r\nMade of rattan, the cloth cover is sticky and beautiful and firm\r\nHand-knitted, there will be some joints\r\nThe size of the product is: 8.9*5.1*6.3 inches, there will be a little error in the size\r\nWe will give some ribbons randomly to match the bag better\r\nIt can be washed with water, and it must be ventilated and dried after washing', 1, 0, 25, 20, 'images/164831357381EaUx3vT9L._AC_UY395_.jpg', 'images/164831357381EaUx3vT9L._AC_UY395_.jpg', 'images/164831357381EaUx3vT9L._AC_UY395_.jpg', 'bag', 'brown', 'l', 50, 6, 6, '2022-03-26 13:52:53', '2022-03-26 13:52:53'),
(14, 'BagDepot Round Rattan Bag', '00% HANDMADE WITH HIGH-QUALITY RATTAN : This bag is handmade with carefully chosen 100% natural rattan that has been carefully woven to create a beautiful, sturdy, and long-lasting round shaped bag. It\'s perfect for carrying your essentials in a stylish and sophisticated way.', 0, 0, 20, 15, 'images/1648313884bag.jpg', 'images/164831369781XHJf2s+uL._AC_UY395_.jpg', 'images/164831369781XHJf2s+uL._AC_UY395_.jpg', 'bag', 'brown', 's', 50, 6, 6, '2022-03-26 13:54:57', '2022-03-26 13:58:04'),
(15, 'artisane, terra firma coffee mugs,', 'This mug is 12 oz. and is handcrafted from a warm brown stoneware clay and an accented matte glaze finish of speckled beige.\r\nSTURDY & DURABLE: This timeless ceramic coffee mug is made lead & cadium-free, created uniquely with high quality craftsmanship. This cute mug is designed to be dishwasher and microwave safe.', 0, 0, 15, 10, 'images/1648313944710Ai-J1KcL._AC_SY450_.jpg', 'images/164831394451LISMsVIdL._AC_US40_.jpg', 'images/164831380751LISMsVIdL._AC_US40_.jpg', 'mug', 'white', 'm', 20, 6, 1, '2022-03-26 13:56:47', '2022-03-26 13:59:04'),
(16, 'Yellow Flower Wall Art', 'Size: 24\"W x 16\"H\r\nHand Painted modern textured yellow flower oil painting on canvas by our professional artists. This is handmade abstract floral artwork, it is not a canvas print. This textured contemporary picture is suitable for living room, bedroom, kitchen, office, Hotel, dining room, bathroom, bar etc.', 1, 0, 40, 35, 'images/164831409281SM4wppH1L._AC_SY450_.jpg', 'images/164831409281SM4wppH1L._AC_SY450_.jpg', 'images/164831409281SM4wppH1L._AC_SY450_.jpg', 'flower', 'yellow', 's', 3, 6, 2, '2022-03-26 14:01:32', '2022-03-26 14:01:32'),
(17, 'Epicler Hand Painted', 'Oil Paintings Size: 24x24 inch（60x60cm). Please pay attention to the size when placing an order.\r\nHigh quality palette knife oil painting, 100% handmade oil painting, Made of imported fine acrylic, which can keep colorful permanently without fading and cracking.', 0, 1, 45, 40, 'images/164831417451VybBxPpmL._AC_SR160,160_.jpg', 'images/164831417451VybBxPpmL._AC_SR160,160_.jpg', 'images/164831417451VybBxPpmL._AC_SR160,160_.jpg', 'flower', 'white', 'm', 1, 6, 2, '2022-03-26 14:02:54', '2022-03-26 14:02:54'),
(18, 'Wieco Art Beauty of Life', 'High quality 100% hand made pretty oil paintings on canvas painted by our professional artist with years of oil painting experience. A perfect Christmas and New Year gifts for your relatives and friends.\r\nOne piece stretched and framed grace white flowers canvas oil paintings ready to hang for home decorations wall decor, each panel has a black hook already mounted on the wooden bar for easy hanging out of box.', 0, 0, 45, 41, 'images/164831426461cADLv9egS._AC_SY450_.jpg', 'images/164831426461cADLv9egS._AC_SY450_.jpg', 'images/164831426461cADLv9egS._AC_SY450_.jpg', 'flower', 'white', 'l', 1, 6, 2, '2022-03-26 14:04:24', '2022-03-26 14:04:24'),
(19, 'CYMBIDIUM ORCHIDS', 'Quilling paper flower', 1, 0, 20, 15, 'images/16483150070dd1c5b22094e65118fae8b165faaded.jpg', 'images/16483150070dd1c5b22094e65118fae8b165faaded.jpg', 'images/16483150070dd1c5b22094e65118fae8b165faaded.jpg', 'flower', 'white', 'l', 3, 8, 3, '2022-03-26 14:16:47', '2022-03-26 14:16:47'),
(20, 'F quilling paper letter', 'quilling paper letter', 1, 0, 8, 7, 'images/16483152584a5a0a4837a83b28955e96aa072c689d.jpg', 'images/16483152584a5a0a4837a83b28955e96aa072c689d.jpg', 'images/16483152584a5a0a4837a83b28955e96aa072c689d.jpg', 'quilling paper letter', 'white', 'm', 4, 8, 3, '2022-03-26 14:20:58', '2022-03-26 14:20:58'),
(21, 'M  quilling paper letter', 'quilling paper letter', 1, 0, 8, 7, 'images/1648315302ffc195dfa66fd8fa989de217baf91d99.jpg', 'images/1648315302ffc195dfa66fd8fa989de217baf91d99.jpg', 'images/1648315302ffc195dfa66fd8fa989de217baf91d99.jpg', 'quilling paper letter', 'white', 's', 4, 8, 3, '2022-03-26 14:21:42', '2022-03-26 14:21:42'),
(22, 'E quilling paper letter', 'quilling paper letter', 0, 1, 8, 7, 'images/1648315335040df6c7b810d7ed10e2932fe0422d36.jpg', 'images/1648315335040df6c7b810d7ed10e2932fe0422d36.jpg', 'images/1648315335040df6c7b810d7ed10e2932fe0422d36.jpg', 'quilling paper letter', 'white', 'm', 4, 8, 3, '2022-03-26 14:22:15', '2022-03-26 14:22:15'),
(23, 'A quilling paper letter', 'quilling paper letter', 1, 1, 8, 7, 'images/164831537450e731854d606ad77180b1be612382ed.jpg', 'images/164831537450e731854d606ad77180b1be612382ed.jpg', 'images/164831537450e731854d606ad77180b1be612382ed.jpg', 'quilling paper letter', 'black', 'l', 4, 8, 3, '2022-03-26 14:22:54', '2022-03-26 14:22:54'),
(24, 'Sheep  quilling paper', 'quilling paper', 1, 1, 10, 7, 'images/164831544258d72d249e719eb5b3e4471a55d99f1d.jpg', 'images/164831544258d72d249e719eb5b3e4471a55d99f1d.jpg', 'images/164831544258d72d249e719eb5b3e4471a55d99f1d.jpg', 'sheep', 'white', 'm', 4, 8, 3, '2022-03-26 14:24:02', '2022-03-26 14:24:02'),
(25, 'S & F  quilling paper letters', 'quilling paper letter', 1, 0, 20, 20, 'images/1648315508b100cbae6000c7fbdf37e7ee73869709.jpg', 'images/1648315508b100cbae6000c7fbdf37e7ee73869709.jpg', 'images/1648315508b100cbae6000c7fbdf37e7ee73869709.jpg', 'flower', 'white', 'm', 2, 8, 3, '2022-03-26 14:25:08', '2022-03-26 14:25:08'),
(26, 'Owl  quilling paper', 'quilling paper', 0, 1, 7, 5, 'images/1648315583e303d652cb25e367e9ac1ab2ea65898e.jpg', 'images/1648315583e303d652cb25e367e9ac1ab2ea65898e.jpg', 'images/1648315583e303d652cb25e367e9ac1ab2ea65898e.jpg', 'quilling paper', 'brown', 's', 1, 8, 3, '2022-03-26 14:26:23', '2022-03-26 14:26:23'),
(27, 'Coffee Mug Gold Flower', 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing.', 1, 1, 18, 15, 'images/164831583181mNxuDk08L._AC_UL480_FMwebp_QL65_.webp', 'images/164831583171Kk5K9Z7BL._AC_SY450_.jpg', 'images/1648315831810oj1Qu34S._AC_SY450_.jpg', 'mug', 'brown', 'm', 15, 8, 1, '2022-03-26 14:30:31', '2022-03-26 14:30:31'),
(28, 'Coffee Mugs Flower Tea Cup', 'Safety material: The Fine China Mug is made of very high quality new bone china mugs that bring a sophisticated look to any home or afternoon tea party. It’s Dishwasher, microwave and oven use safe. The fine china mug is compliance with 84/500/EEC.\r\n√ Fine china mug：Luxurious New Fine China Mugs, Part of Our Afternoon Tea Range, very soft looking when in blank.', 0, 0, 10, 9, 'images/1648315926619jeQigL5L._AC_SY450_.jpg', 'images/16483159266157t63tO3L._AC_SY450_.jpg', 'images/16483159266157t63tO3L._AC_SY450_.jpg', 'mug', 'white', 'm', 5, 8, 1, '2022-03-26 14:32:06', '2022-03-26 14:32:06'),
(29, 'Mug Decorated with Ceramic Flowers', 'Ceramic mug with a handmade floral design.\r\nA creative piece of ceramic mug decorated with handmade flowers which made of safe materials.\r\nIdeal gift for beloved ones.\r\nIt adds aesthetic touch to your kitchen collection.\r\nManufacturing time :1 Hour per mug.', 0, 0, 5, 4, 'images/1648316170475-200x140.jpg', 'images/1648316170475-200x140.jpg', 'images/1648316170475-200x140.jpg', 'mug', 'cellful', 'l', 4, 8, 1, '2022-03-26 14:36:10', '2022-03-26 14:36:10'),
(30, 'Butterfly', 'Beautiful Hand Embroidery For Girls - Stylish Embroidery Designs', 1, 1, 15, 11, 'images/164831668379b6296008b140c2208ae3f8a5e88521.jpg', 'images/164831668379b6296008b140c2208ae3f8a5e88521.jpg', 'images/164831668379b6296008b140c2208ae3f8a5e88521.jpg', 'butterfly', 'cellful', 'm', 1, 2, 5, '2022-03-26 14:44:43', '2022-03-26 14:44:43'),
(31, 'Floral Hand Embroidery', 'Floral Hand Embroidery Patterns for Spring - The Yellow Birdhouse', 0, 0, 20, 15, 'images/164831689697b03d4245ddccda9b74654b30314cf7.jpg', 'images/16483168030281f2a91d2ec09cc8110338aa8efc73.jpg', 'images/16483168030281f2a91d2ec09cc8110338aa8efc73.jpg', 'butterfly', 'cellful', 'm', 1, 2, 5, '2022-03-26 14:46:43', '2022-03-26 14:48:16'),
(32, 'Flower Hand Embroidery', 'Floral Hand Embroidery', 1, 0, 15, 10, 'images/1648316880c19405899e390e626784d345d0886d16.jpg', 'images/1648316880c19405899e390e626784d345d0886d16.jpg', 'images/1648316880c19405899e390e626784d345d0886d16.jpg', 'flower', 'collful', 'm', 1, 2, 5, '2022-03-26 14:48:00', '2022-03-26 14:48:00'),
(33, 'Embroidery Hoop Letter', 'Embroidery Hoop Letter', 1, 0, 15, 10, 'images/16483170194a30d205edf556a4018b915783cb4220.jpg', 'images/16483170194a30d205edf556a4018b915783cb4220.jpg', 'images/16483170194a30d205edf556a4018b915783cb4220.jpg', 'letter', 'collful', 'm', 3, 2, 5, '2022-03-26 14:50:19', '2022-03-26 14:50:19'),
(34, 'V & G Hand embroidery hoop', 'Hand embroidery hoop', 0, 1, 15, 15, 'images/164831709635221fa7dd107e9becaa43ddcab42f3f.jpg', 'images/164831709635221fa7dd107e9becaa43ddcab42f3f.jpg', 'images/164831709635221fa7dd107e9becaa43ddcab42f3f.jpg', 'letter', 'collful', 'm', 3, 2, 5, '2022-03-26 14:51:36', '2022-03-26 14:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2022-03-26 04:45:00', '2022-03-26 04:45:00'),
(2, 'Owner', '2022-03-26 04:45:00', '2022-03-26 04:45:00'),
(3, 'User', '2022-03-26 04:45:00', '2022-03-26 04:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/defult.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `email`, `phone`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin7', 1, 'admin7@gmail.com', NULL, 'images/defult.png', NULL, '$2y$10$ZhYkOtAaCwyfstwGRTe4vOY0WzpvyW/w4P/hZXby2jA4rol24csTy', NULL, '2022-03-26 04:45:11', '2022-03-26 04:45:11'),
(2, 'owner3', 2, 'owner3@gmail.com', 785555555, 'images/defult.png', NULL, '$2y$10$GAvj4ZyNTTikOiEBE5ylCO.5PY8XF8ZBETReDrx.3HzWtoRyJZduG', NULL, '2022-03-26 04:45:11', '2022-03-26 14:40:43'),
(3, 'owner', 2, 'owner@gmail.com', NULL, 'images/defult.png', NULL, '$2y$10$AVJptwZO9J5YJpaDgJeiRulJ0bZQQBRFBIIM1UT8giFUSt7KJBYdK', NULL, '2022-03-26 04:45:11', '2022-03-26 13:02:41'),
(4, 'admin6', 1, 'admin6@gmail.com', NULL, 'images/defult.png', NULL, '$2y$10$z/NOmuVDet6u4ZXzERX8D.etaUaZME2.pvbNlZ8J9w35LvpLiK47K', NULL, '2022-03-26 04:45:11', '2022-03-26 04:45:11'),
(5, 'user6', 3, 'user6@gmail.com', NULL, 'images/defult.png', NULL, '$2y$10$C4eI.WDVetNP74kVpmCw5.g4JLRvyxoxXP7JEp0fjlmUTuAr8o9EW', NULL, '2022-03-26 04:45:11', '2022-03-26 04:45:11'),
(6, 'owner2', 2, 'owner2@gmail.com', NULL, 'images/defult.png', NULL, '$2y$10$h9ydNrBkOcOJsjLdYB1qG.Y5y/e7vOBvLph3H2NWurudQqVibjWcK', NULL, '2022-03-26 04:45:11', '2022-03-26 13:03:06'),
(7, 'Ghosoun', 3, 'ghosoun.alrahahleh@gmail.com', 788924832, 'images/defult.png', NULL, '$2y$10$Xtt.wGsNXmSIzXPJ83KJgeLXV03/CWw4o3ZL7LoJ9NM9TvQ3Sbft.', NULL, '2022-03-26 04:59:54', '2022-03-26 05:27:14'),
(8, 'owner4', 2, 'owner4@gmail.com', NULL, 'images/defult.png', NULL, '$2y$10$YeuzQr3ZGkb0q53dyG2OPOntrefq86Q7PiCFdRcuHXVhFtpM26/NS', NULL, '2022-03-26 14:07:05', '2022-03-26 14:07:05'),
(9, 'Ghosoun', 3, 'ghosoun.alrahahleh3@gmail.com', NULL, 'images/defult.png', NULL, '$2y$10$wb4WDxL3WedmDROwvEnp3uc6zmM3xvD/FdgbhI3sZNdw0qJEXAGz6', NULL, '2022-03-26 14:53:34', '2022-03-26 14:53:34'),
(10, 'Ghosoun Alrahahleh', 3, 'ghosoun98@gmail.com', 777746352, 'images/defult.png', NULL, '$2y$10$rvNGQ3lrZoXSbl8CyjsjC.6KY/N6t1/3hyZ86ye6CVM7nF8l2HWh6', NULL, '2022-03-26 15:09:19', '2022-03-26 15:10:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `owner_infos`
--
ALTER TABLE `owner_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `owner_infos_email_unique` (`email`),
  ADD KEY `owner_infos_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_owner_id_foreign` (`owner_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_role_unique` (`role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `owner_infos`
--
ALTER TABLE `owner_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `owner_infos`
--
ALTER TABLE `owner_infos`
  ADD CONSTRAINT `owner_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
