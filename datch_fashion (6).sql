-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2024 at 06:10 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datch_fashion`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `location` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `link`, `is_active`, `location`, `created_at`, `updated_at`) VALUES
(8, 'Áo phao đa năng', 'uploads/banner/m3znuyyryyggerzrlgl3110_1800x833-07.webp', 'http://127.0.0.1:8000/cua-hang/danh-muc/6', 1, 1, '2024-12-02 22:59:22', '2024-12-02 22:59:22'),
(9, 'Áo len nam', 'uploads/banner/20241120_gHZ294w0.jpg', 'http://127.0.0.1:8000/cua-hang/danh-muc/7', 1, 1, '2024-12-02 23:00:47', '2024-12-02 23:00:47'),
(10, 'Top sản phẩm bán chạy nhất', 'uploads/banner/hang-ban-chay-1800x600.webp', '/san-pham-ban-chay', 1, 1, '2024-12-02 23:02:49', '2024-12-02 23:02:49'),
(13, 'Áo giữ nhiệt Datch', 'uploads/banner/m3znur9zvuebk2kiqxk3110_1800x833 copy.webp', 'http://127.0.0.1:8000/cua-hang/danh-muc/12', 1, 1, '2024-12-03 02:27:19', '2024-12-03 02:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `category_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `slug`, `image`, `status`, `category_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '10 Cách Phối Đồ Với Áo Khoác Lông Ngắn: Từ Sành Điệu Đến Thanh Lịch', '<h3><strong>&Aacute;o kho&aacute;c l&ocirc;ng thỏ</strong></h3>\r\n\r\n<p>L&ocirc;ng thỏ, đặc biệt l&agrave; từ giống Rex, đang trở th&agrave;nh xu hướng nổi bật. Mặc d&ugrave; kh&ocirc;ng giữ nhiệt tốt bằng l&ocirc;ng muton, nhưng l&ocirc;ng thỏ lại mềm mại, nhẹ nh&agrave;ng v&agrave; mang đến vẻ ngo&agrave;i thanh lịch, hiện đại. Với nhiều lựa chọn m&agrave;u sắc kh&aacute;c nhau, &aacute;o kho&aacute;c l&ocirc;ng thỏ dễ d&agrave;ng kết hợp với trang phục h&agrave;ng ng&agrave;y, ph&ugrave; hợp với nhiều phong c&aacute;ch thời trang.</p>\r\n\r\n<h3><strong>&Aacute;o kho&aacute;c l&ocirc;ng gấu tr&uacute;c</strong></h3>\r\n\r\n<p>L&ocirc;ng gấu tr&uacute;c với chi ph&iacute; rẻ v&agrave; độ bền cao trở th&agrave;nh lựa chọn phổ biến cho &aacute;o kho&aacute;c l&ocirc;ng ngắn. Đặc trưng bởi lớp l&ocirc;ng d&agrave;y v&agrave; kết cấu chắc chắn, &aacute;o kho&aacute;c l&ocirc;ng gấu tr&uacute;c mang lại cảm gi&aacute;c ấm &aacute;p vượt trội v&agrave; c&oacute; thể d&ugrave;ng trong nhiều năm nếu được chăm s&oacute;c đ&uacute;ng c&aacute;ch, gi&uacute;p bạn vừa tiết kiệm vừa thời trang.</p>\r\n\r\n<h3><strong>&Aacute;o kho&aacute;c l&ocirc;ng Karakul</strong></h3>\r\n\r\n<p>&Aacute;o kho&aacute;c l&ocirc;ng Karakul được đ&aacute;nh gi&aacute; cao bởi vẻ ngo&agrave;i sang trọng v&agrave; t&iacute;nh linh hoạt. Loại &aacute;o n&agrave;y c&oacute; thể phối với hầu hết c&aacute;c trang phục kh&aacute;c nhau, từ phong c&aacute;ch thanh lịch đến những bộ c&aacute;nh c&aacute; t&iacute;nh. Karakul kh&ocirc;ng chỉ mang lại vẻ đẹp thẩm mỹ m&agrave; c&ograve;n gi&uacute;p giữ ấm tốt, l&agrave; sự lựa chọn ho&agrave;n hảo cho m&ugrave;a đ&ocirc;ng.</p>\r\n\r\n<p><img alt=\"Cách Phối Đồ Với Áo Khoác Lông Ngắn\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Ao-khoac-long-ngan-13.jpg\" style=\"height:946px; width:800px\" /></p>\r\n\r\n<h3><strong>&Aacute;o kho&aacute;c l&ocirc;ng Hải Ly</strong></h3>\r\n\r\n<p>L&ocirc;ng hải ly l&agrave; một trong những loại l&ocirc;ng c&oacute; độ bền cao nhất, gi&uacute;p chiếc &aacute;o kho&aacute;c c&oacute; thể sử dụng l&ecirc;n đến 20 năm. Đ&acirc;y l&agrave; lựa chọn ho&agrave;n hảo cho những ai muốn đầu tư v&agrave;o một sản phẩm thời trang trường tồn với thời gian. Với l&ocirc;ng hải ly, phong c&aacute;ch cổ điển lu&ocirc;n l&agrave; lựa chọn an to&agrave;n để giữ được sự tinh tế v&agrave; sang trọng.</p>\r\n\r\n<h3><strong>&Aacute;o kho&aacute;c l&ocirc;ng Chinchilla</strong></h3>\r\n\r\n<p>Chinchilla l&agrave; một trong những loại l&ocirc;ng th&uacute; qu&yacute; ph&aacute;i nhất, mang đến sự sang trọng v&agrave; đẳng cấp cho người mặc. D&ugrave; trọng lượng nhẹ nhưng &aacute;o kho&aacute;c l&ocirc;ng Chinchilla vẫn đảm bảo sự ấm &aacute;p, thoải m&aacute;i. Với m&agrave;u sắc tự nhi&ecirc;n, &aacute;o kho&aacute;c từ l&ocirc;ng Chinchilla tạo n&ecirc;n vẻ đẹp mềm mại, thanh lịch v&agrave; dễ d&agrave;ng kết hợp với nhiều trang phục kh&aacute;c nhau.</p>\r\n\r\n<h3><strong>&Aacute;o kho&aacute;c l&ocirc;ng Sable</strong></h3>\r\n\r\n<p>L&ocirc;ng Sable được v&iacute; như &ldquo;b&aacute;u vật&rdquo;, biểu tượng của sự gi&agrave;u sang v&agrave; qu&yacute; ph&aacute;i. &Aacute;o kho&aacute;c l&ocirc;ng Sable lu&ocirc;n l&agrave; sản phẩm xa xỉ, ph&ugrave; hợp với những ai muốn khẳng định vị thế v&agrave; phong c&aacute;ch ri&ecirc;ng. D&ugrave; trong phi&ecirc;n bản r&uacute;t gọn, &aacute;o kho&aacute;c l&ocirc;ng Sable vẫn khiến người mặc to&aacute;t l&ecirc;n vẻ đẹp lộng lẫy, sang trọng.</p>\r\n\r\n<p><img alt=\"Cách Phối Đồ Với Áo Khoác Lông Ngắn\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Ao-khoac-long-ngan-14.jpg\" style=\"height:1081px; width:800px\" /></p>\r\n\r\n<h3><strong>&Aacute;o kho&aacute;c l&ocirc;ng cắt tỉa</strong></h3>\r\n\r\n<p>Xu hướng &aacute;o kho&aacute;c l&ocirc;ng cắt tỉa đang trở n&ecirc;n phổ biến. Sự kết hợp giữa c&aacute;c loại l&ocirc;ng th&uacute; như chồn, hải ly với nhiều chi tiết v&agrave; ch&egrave;n kh&aacute;c nhau tạo n&ecirc;n những thiết kế ấn tượng v&agrave; độc đ&aacute;o. Những chiếc &aacute;o n&agrave;y th&iacute;ch hợp mặc trong thời tiết chuyển m&ugrave;a, khi nhiệt độ chưa qu&aacute; lạnh nhưng vẫn cần sự ấm &aacute;p v&agrave; phong c&aacute;ch.</p>\r\n\r\n<h3><strong>&Aacute;o kho&aacute;c l&ocirc;ng giả (Faux Fur)</strong></h3>\r\n\r\n<p>&Aacute;o kho&aacute;c l&ocirc;ng giả ng&agrave;y c&agrave;ng được ưa chuộng nhờ ưu điểm th&acirc;n thiện với m&ocirc;i trường, gi&aacute; cả phải chăng v&agrave; dễ bảo quản. Faux fur cũng mang đến sự đa dạng về m&agrave;u sắc, kiểu d&aacute;ng v&agrave; kết cấu, cho ph&eacute;p người mặc tự do s&aacute;ng tạo với phong c&aacute;ch thời trang m&agrave; vẫn giữ được sự thoải m&aacute;i v&agrave; bền bỉ trong qu&aacute; tr&igrave;nh sử dụng.</p>\r\n\r\n<p><img alt=\"Cách Phối Đồ Với Áo Khoác Lông Ngắn\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Ao-khoac-long-ngan-01.jpg\" style=\"height:1111px; width:800px\" /></p>\r\n\r\n<h2><strong>10 C&aacute;ch phối đồ với &aacute;o kho&aacute;c l&ocirc;ng ngắn</strong></h2>\r\n\r\n<p>Giờ đ&acirc;y, ch&uacute;ng ta sẽ đi v&agrave;o phần ch&iacute;nh của b&agrave;i viết: 10 c&aacute;ch phối đồ với &aacute;o kho&aacute;c l&ocirc;ng ngắn gi&uacute;p bạn tự tin tỏa s&aacute;ng trong mọi dịp. Dưới đ&acirc;y l&agrave; những gợi &yacute; phối đồ cụ thể để bạn tham khảo.</p>\r\n\r\n<h3><strong>Phối &aacute;o kho&aacute;c l&ocirc;ng ngắn v&agrave; quần jean skinny</strong></h3>\r\n\r\n<p>Sự kết hợp giữa &aacute;o kho&aacute;c l&ocirc;ng ngắn v&agrave; quần jean skinny lu&ocirc;n l&agrave; lựa chọn h&agrave;ng đầu của những c&ocirc; n&agrave;ng y&ecirc;u th&iacute;ch sự s&agrave;nh điệu nhưng vẫn muốn giữ vẻ năng động. &Aacute;o kho&aacute;c l&ocirc;ng ngắn sẽ l&agrave;m tăng th&ecirc;m vẻ nổi bật, sang trọng cho bộ trang phục, trong khi quần jean skinny &ocirc;m s&aacute;t gi&uacute;p t&ocirc;n l&ecirc;n đ&ocirc;i ch&acirc;n thon thả của bạn.</p>\r\n\r\n<p><img alt=\"Cách Phối Đồ Với Áo Khoác Lông Ngắn\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Ao-khoac-long-ngan-02.jpg\" style=\"height:895px; width:800px\" /></p>\r\n\r\n<h3><strong>Phối &aacute;o kho&aacute;c l&ocirc;ng ngắn v&agrave; ch&acirc;n v&aacute;y d&agrave;i</strong></h3>\r\n\r\n<p>Sự kết hợp giữa &aacute;o kho&aacute;c l&ocirc;ng ngắn v&agrave; ch&acirc;n v&aacute;y d&agrave;i tạo n&ecirc;n một bộ trang phục đầy thanh lịch, ph&ugrave; hợp cho những buổi gặp gỡ quan trọng hoặc tiệc tối. Với sự mềm mại v&agrave; nhẹ nh&agrave;ng của ch&acirc;n v&aacute;y d&agrave;i, kết hợp với &aacute;o kho&aacute;c l&ocirc;ng ngắn, bạn sẽ c&oacute; ngay một vẻ ngo&agrave;i quyến rũ nhưng kh&ocirc;ng k&eacute;m phần lịch sự.</p>\r\n\r\n<p><img alt=\"Cách Phối Đồ Với Áo Khoác Lông Ngắn\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Ao-khoac-long-ngan-03.jpg\" style=\"height:1066px; width:800px\" /></p>\r\n\r\n<h3><strong>Phối &aacute;o kho&aacute;c l&ocirc;ng ngắn v&agrave; ch&acirc;n v&aacute;y ngắn</strong></h3>\r\n\r\n<p>Phối &aacute;o kho&aacute;c l&ocirc;ng ngắn với ch&acirc;n v&aacute;y ngắn tạo n&ecirc;n một phong c&aacute;ch vừa nữ t&iacute;nh vừa ph&aacute; c&aacute;ch. Ch&acirc;n v&aacute;y ngắn gi&uacute;p bạn khoe trọn đ&ocirc;i ch&acirc;n thon d&agrave;i, trong khi &aacute;o kho&aacute;c l&ocirc;ng ngắn mang lại sự ấm &aacute;p v&agrave; thanh lịch. Đừng qu&ecirc;n kết hợp th&ecirc;m một đ&ocirc;i boots cao cổ để bộ trang phục th&ecirc;m ho&agrave;n hảo.</p>\r\n\r\n<p><img alt=\"Cách Phối Đồ Với Áo Khoác Lông Ngắn\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Ao-khoac-long-ngan-04.jpg\" style=\"height:988px; width:800px\" /></p>\r\n\r\n<h3><strong>Phối &aacute;o kho&aacute;c l&ocirc;ng ngắn v&agrave; ch&acirc;n v&aacute;y midi</strong></h3>\r\n\r\n<p>Ch&acirc;n v&aacute;y midi v&agrave; &aacute;o kho&aacute;c l&ocirc;ng ngắn l&agrave; sự kết hợp ho&agrave;n hảo cho những buổi dạo phố hoặc những dịp hẹn h&ograve; l&atilde;ng mạn. V&aacute;y midi gi&uacute;p giữ được n&eacute;t k&iacute;n đ&aacute;o, trong khi &aacute;o kho&aacute;c l&ocirc;ng ngắn mang lại sự s&agrave;nh điệu, thời thượng.</p>\r\n\r\n<p><img alt=\"Cách Phối Đồ Với Áo Khoác Lông Ngắn\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Ao-khoac-long-ngan-05.jpg\" style=\"height:612px; width:800px\" /></p>\r\n\r\n<h3><strong>Phối &aacute;o kho&aacute;c l&ocirc;ng ngắn v&agrave; v&aacute;y maxi</strong></h3>\r\n\r\n<p>Với những ng&agrave;y bạn muốn giữ ấm nhưng vẫn kh&ocirc;ng muốn bỏ qua sự thoải m&aacute;i của một chiếc v&aacute;y maxi, &aacute;o kho&aacute;c l&ocirc;ng ngắn sẽ l&agrave; lựa chọn tuyệt vời. C&aacute;ch phối đồ n&agrave;y tạo n&ecirc;n sự h&ograve;a hợp giữa vẻ ngo&agrave;i bay bổng của v&aacute;y maxi v&agrave; sự sang trọng của &aacute;o kho&aacute;c l&ocirc;ng.</p>\r\n\r\n<p><img alt=\"Cách Phối Đồ Với Áo Khoác Lông Ngắn\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Ao-khoac-long-ngan-06.jpg\" style=\"height:1094px; width:800px\" /></p>\r\n\r\n<h3><strong>Phối &aacute;o kho&aacute;c l&ocirc;ng ngắn với đầm</strong></h3>\r\n\r\n<p>Đối với c&aacute;c buổi tiệc sang trọng, bạn c&oacute; thể dễ d&agrave;ng kết hợp &aacute;o kho&aacute;c l&ocirc;ng ngắn với một chiếc đầm bodycon hoặc đầm su&ocirc;ng. Set đồ n&agrave;y mang lại vẻ ngo&agrave;i thanh lịch, quyến rũ v&agrave; tạo điểm nhấn cho trang phục.</p>\r\n\r\n<p><img alt=\"Cách Phối Đồ Với Áo Khoác Lông Ngắn\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Ao-khoac-long-ngan-07.jpg\" style=\"height:881px; width:800px\" /></p>\r\n\r\n<h3><strong>Phối &aacute;o kho&aacute;c l&ocirc;ng ngắn với jumpsuit</strong></h3>\r\n\r\n<p>Jumpsuit l&agrave; một m&oacute;n đồ thời trang hiện đại, mang t&iacute;nh ph&aacute; c&aacute;ch. Khi kết hợp với &aacute;o kho&aacute;c l&ocirc;ng ngắn, jumpsuit gi&uacute;p bạn trở n&ecirc;n thời thượng v&agrave; nổi bật hơn. C&aacute;ch phối đồ n&agrave;y đặc biệt ph&ugrave; hợp cho những buổi tiệc hoặc sự kiện quan trọng.</p>\r\n\r\n<p><img alt=\"Cách Phối Đồ Với Áo Khoác Lông Ngắn\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Ao-khoac-long-ngan-08.jpg\" style=\"height:796px; width:800px\" /></p>\r\n\r\n<h3><strong>Phối &aacute;o kho&aacute;c l&ocirc;ng ngắn với v&aacute;y liền</strong></h3>\r\n\r\n<p>V&aacute;y liền l&agrave; trang phục kh&ocirc;ng thể thiếu của ph&aacute;i đẹp, v&agrave; khi kết hợp với &aacute;o kho&aacute;c l&ocirc;ng ngắn, bạn sẽ c&oacute; ngay một bộ trang phục thanh lịch v&agrave; sang trọng. H&atilde;y chọn v&aacute;y liền c&oacute; m&agrave;u sắc trung t&iacute;nh hoặc hoạ tiết nhẹ nh&agrave;ng để dễ d&agrave;ng kết hợp với &aacute;o kho&aacute;c l&ocirc;ng.</p>\r\n\r\n<p><img alt=\"Cách Phối Đồ Với Áo Khoác Lông Ngắn\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Ao-khoac-long-ngan-09.jpg\" style=\"height:1078px; width:800px\" /></p>\r\n\r\n<h3><strong>Phối &aacute;o kho&aacute;c l&ocirc;ng ngắn với quần legging</strong></h3>\r\n\r\n<p>Khi nhắc đến sự thoải m&aacute;i v&agrave; tiện dụng, kh&ocirc;ng thể kh&ocirc;ng kể đến quần legging. Phối &aacute;o kho&aacute;c l&ocirc;ng ngắn với quần legging tạo n&ecirc;n một phong c&aacute;ch năng động, trẻ trung nhưng vẫn đầy cuốn h&uacute;t.</p>\r\n\r\n<p><img alt=\"Cách Phối Đồ Với Áo Khoác Lông Ngắn\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Ao-khoac-long-ngan-10.jpg\" style=\"height:1058px; width:800px\" /></p>\r\n\r\n<h3><strong>Phối &aacute;o kho&aacute;c l&ocirc;ng cừu với quần ống rộng</strong></h3>\r\n\r\n<p>C&aacute;ch phối đồ cuối c&ugrave;ng trong danh s&aacute;ch n&agrave;y ch&iacute;nh l&agrave; &aacute;o kho&aacute;c l&ocirc;ng cừu kết hợp với quần ống rộng. Sự kết hợp n&agrave;y mang lại vẻ ngo&agrave;i thanh lịch nhưng vẫn rất phong c&aacute;ch. Quần ống rộng mang lại sự thoải m&aacute;i, trong khi &aacute;o kho&aacute;c l&ocirc;ng cừu giữ cho bạn lu&ocirc;n ấm &aacute;p trong những ng&agrave;y đ&ocirc;ng lạnh.</p>\r\n\r\n<p><img alt=\"Cách Phối Đồ Với Áo Khoác Lông Ngắn\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Ao-khoac-long-ngan-11.jpg\" style=\"height:612px; width:800px\" /></p>\r\n\r\n<p>Qua b&agrave;i viết tr&ecirc;n, hy vọng bạn đ&atilde; t&igrave;m thấy những gợi &yacute; hữu &iacute;ch về c&aacute;ch phối đồ với &aacute;o kho&aacute;c l&ocirc;ng ngắn, từ s&agrave;nh điệu đến thanh lịch. Nếu bạn đang t&igrave;m kiếm một địa chỉ tin cậy để sắm sửa những bộ trang phục m&ugrave;a đ&ocirc;ng ấn tượng, đừng qu&ecirc;n gh&eacute; thăm&nbsp;<strong>Canifa</strong>. Bạn c&oacute; thể tham khảo những thiết kế ấm &aacute;p v&agrave; thời trang như &aacute;o kho&aacute;c dạ, &aacute;o phao, v&agrave; &aacute;o len &ndash; tất cả đều được l&agrave;m từ chất liệu cao cấp, gi&uacute;p bạn tự tin v&agrave; thoải m&aacute;i trong m&ugrave;a đ&ocirc;ng.</p>\r\n\r\n<p>Đừng qu&ecirc;n theo d&otilde;i website v&agrave; fanpage ch&iacute;nh thức của Canifa để kh&ocirc;ng bỏ lỡ những xu hướng mới nhất v&agrave; ưu đ&atilde;i hấp dẫn nh&eacute;!</p>', '10-cach-phoi-do-voi-ao-khoac-long-ngan-tu-sanh-dieu-den-thanh-lich', 'uploads/blogs/1731501945_Ao-khoac-long-ngan-12.jpg', 1, 3, 1, NULL, '2024-11-13 05:22:40', '2024-11-13 05:45:45'),
(2, 'Mặc Gì Đi Đám Cưới Mùa Đông? Bí Quyết Để Ấm Áp Và Sang Trọng', '<p><em>Trong m&ugrave;a đ&ocirc;ng lạnh gi&aacute;, việc lựa chọn trang phục đi dự đ&aacute;m cưới l&agrave; một vấn đề kh&ocirc;ng &iacute;t người băn khoăn. L&agrave;m thế n&agrave;o để vừa ấm &aacute;p lại vừa sang trọng, ph&ugrave; hợp với kh&ocirc;ng gian tiệc cưới? Kh&ocirc;ng chỉ đơn thuần l&agrave; giữ ấm, trang phục đi đ&aacute;m cưới m&ugrave;a đ&ocirc;ng c&ograve;n phải tạo điểm nhấn tinh tế, mang đến sự tự tin v&agrave; phong c&aacute;ch ri&ecirc;ng cho người mặc.&nbsp;</em></p>\r\n\r\n<p>B&agrave;i viết dưới đ&acirc;y sẽ gi&uacute;p bạn giải đ&aacute;p thắc mắc &ldquo;<strong>mặc g&igrave; đi đ&aacute;m cưới m&ugrave;a đ&ocirc;ng</strong>?&rdquo; v&agrave; gợi &yacute; những c&aacute;ch&nbsp;<strong>phối đồ đi đ&aacute;m cưới m&ugrave;a đ&ocirc;ng</strong>&nbsp;vừa thời thượng, vừa ấm &aacute;p. Đặc biệt, Canifa &ndash; thương hiệu thời trang nổi tiếng với c&aacute;c d&ograve;ng sản phẩm giữ nhiệt v&agrave; phong c&aacute;ch hiện đại, sẽ đồng h&agrave;nh c&ugrave;ng bạn trong việc lựa chọn trang phục l&yacute; tưởng cho m&ugrave;a đ&ocirc;ng.</p>\r\n\r\n<h2><strong>&Aacute;o kho&aacute;c d&agrave;i c&ugrave;ng quần ống rộng</strong></h2>\r\n\r\n<p>Sự kết hợp giữa&nbsp;<strong>&aacute;o kho&aacute;c d&agrave;i</strong>&nbsp;v&agrave;&nbsp;<strong>quần ống rộng</strong>&nbsp;ch&iacute;nh l&agrave; một lựa chọn kh&ocirc;ng thể bỏ qua khi bạn c&ograve;n băn khoăn kh&ocirc;ng biết&nbsp;<strong>mặc g&igrave; đi đ&aacute;m cưới m&ugrave;a đ&ocirc;ng</strong>. &Aacute;o kho&aacute;c d&agrave;i gi&uacute;p giữ ấm to&agrave;n th&acirc;n, tạo n&ecirc;n vẻ ngo&agrave;i thanh lịch, trong khi quần ống rộng mang lại sự thoải m&aacute;i v&agrave; thời thượng. Đối với những tiệc cưới được tổ chức ngo&agrave;i trời hoặc trong kh&ocirc;ng gian tho&aacute;ng m&aacute;t, bộ trang phục n&agrave;y sẽ gi&uacute;p bạn nổi bật với phong c&aacute;ch đẳng cấp.</p>\r\n\r\n<p>Canifa cung cấp nhiều mẫu &aacute;o kho&aacute;c dạ d&aacute;ng d&agrave;i chất lượng, với thiết kế tinh tế v&agrave; chất liệu cao cấp, gi&uacute;p bạn vừa giữ ấm vừa thời trang. Bạn c&oacute; thể phối quần ống rộng từ chất liệu len hoặc lụa b&oacute;ng để tăng th&ecirc;m vẻ mềm mại cho set đồ. H&atilde;y lựa chọn c&aacute;c m&agrave;u sắc trung t&iacute;nh như x&aacute;m, đen hoặc n&acirc;u để dễ d&agrave;ng kết hợp với phụ kiện.</p>\r\n\r\n<p><img alt=\"Mặc Gì Đi Đám Cưới Mùa Đông\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Di-dam-cuoi-mua-dong-01.jpg\" style=\"height:955px; width:800px\" /></p>\r\n\r\n<h2><strong>&Aacute;o len cổ lọ mix c&ugrave;ng ch&acirc;n v&aacute;y midi</strong></h2>\r\n\r\n<p>Khi nhắc đến những c&aacute;ch&nbsp;<strong>phối đồ đi đ&aacute;m cưới m&ugrave;a đ&ocirc;ng</strong>, &aacute;o len cổ lọ v&agrave;&nbsp;<strong>ch&acirc;n v&aacute;y midi</strong>&nbsp;lu&ocirc;n l&agrave; sự kết hợp ho&agrave;n hảo. &Aacute;o len cổ lọ gi&uacute;p giữ ấm v&ugrave;ng cổ, trong khi ch&acirc;n v&aacute;y midi mang lại vẻ thanh lịch v&agrave; duy&ecirc;n d&aacute;ng. Đ&acirc;y l&agrave; một lựa chọn ho&agrave;n hảo cho những c&ocirc; n&agrave;ng muốn tạo điểm nhấn nữ t&iacute;nh nhưng vẫn giữ được phong c&aacute;ch thời trang trong m&ugrave;a đ&ocirc;ng.</p>\r\n\r\n<p>Canifa c&oacute; nhiều mẫu &aacute;o len cổ lọ với chất liệu len mềm mại, kh&ocirc;ng g&acirc;y k&iacute;ch ứng da, đặc biệt l&agrave; d&ograve;ng len cashmere cao cấp. Ch&acirc;n v&aacute;y midi của Canifa cũng c&oacute; nhiều kiểu d&aacute;ng v&agrave; chất liệu ph&ugrave; hợp với nhiều phong c&aacute;ch, từ trẻ trung đến thanh lịch.</p>\r\n\r\n<p><img alt=\"Mặc Gì Đi Đám Cưới Mùa Đông\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Di-dam-cuoi-mua-dong-02.jpg\" style=\"height:1200px; width:800px\" /></p>\r\n\r\n<h2><strong>Đầm body len v&agrave; &aacute;o kho&aacute;c l&ocirc;ng</strong></h2>\r\n\r\n<p>Nếu bạn y&ecirc;u th&iacute;ch phong c&aacute;ch quyến rũ,&nbsp;<strong>đầm body len</strong>&nbsp;phối c&ugrave;ng&nbsp;<strong>&aacute;o kho&aacute;c l&ocirc;ng</strong>&nbsp;ch&iacute;nh l&agrave; c&acirc;u trả lời cho c&acirc;u hỏi &ldquo;mặc g&igrave; đi đ&aacute;m cưới m&ugrave;a đ&ocirc;ng&rdquo;. Đầm body gi&uacute;p t&ocirc;n d&aacute;ng người mặc, khoe trọn đường cong một c&aacute;ch tinh tế, c&ograve;n &aacute;o kho&aacute;c l&ocirc;ng mang lại sự sang trọng v&agrave; ấm &aacute;p.</p>\r\n\r\n<p>Tại Canifa, bạn c&oacute; thể t&igrave;m thấy c&aacute;c mẫu đầm body len gi&uacute;p giữ ấm vừa t&ocirc;n d&aacute;ng, tạo điểm nhấn độc đ&aacute;o cho set đồ của m&igrave;nh.</p>\r\n\r\n<p><img alt=\"Mặc Gì Đi Đám Cưới Mùa Đông\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Di-dam-cuoi-mua-dong-03.jpg\" style=\"height:726px; width:800px\" /></p>\r\n\r\n<h2><strong>Ch&acirc;n v&aacute;y len xẻ t&agrave; mix c&ugrave;ng &aacute;o len</strong></h2>\r\n\r\n<p>Một set đồ kh&aacute;c kh&ocirc;ng thể bỏ qua ch&iacute;nh l&agrave;&nbsp;<strong>ch&acirc;n v&aacute;y len xẻ t&agrave;</strong>&nbsp;kết hợp c&ugrave;ng&nbsp;<strong>&aacute;o len</strong>. Ch&acirc;n v&aacute;y len mang lại sự mềm mại v&agrave; ấm &aacute;p, trong khi phần xẻ t&agrave; tạo điểm nhấn gợi cảm nhưng kh&ocirc;ng k&eacute;m phần tinh tế. Khi mix c&ugrave;ng &aacute;o len cổ tr&ograve;n hoặc cổ lọ, bạn sẽ c&oacute; một bộ trang phục ho&agrave;n hảo để dự tiệc cưới m&ugrave;a đ&ocirc;ng.</p>\r\n\r\n<p>Canifa cung cấp nhiều mẫu ch&acirc;n v&aacute;y len chất lượng với độ co gi&atilde;n tốt, gi&uacute;p bạn di chuyển dễ d&agrave;ng. Kết hợp với &aacute;o len giữ nhiệt của Canifa, bạn sẽ c&oacute; một outfit kh&ocirc;ng chỉ đẹp m&agrave; c&ograve;n tiện lợi cho c&aacute;c hoạt động ngo&agrave;i trời trong m&ugrave;a đ&ocirc;ng.</p>\r\n\r\n<p><img alt=\"Mặc Gì Đi Đám Cưới Mùa Đông\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Di-dam-cuoi-mua-dong-04.jpg\" style=\"height:600px; width:800px\" /></p>\r\n\r\n<h2><strong>Đầm maxi họa tiết v&agrave; &aacute;o kho&aacute;c b&ecirc;n ngo&agrave;i</strong></h2>\r\n\r\n<p><strong>Đầm maxi họa tiết</strong>&nbsp;phối c&ugrave;ng&nbsp;<strong>&aacute;o kho&aacute;c</strong>&nbsp;l&agrave; lựa chọn ho&agrave;n hảo cho những bữa tiệc cưới v&agrave;o m&ugrave;a đ&ocirc;ng. Đầm maxi mang lại vẻ nữ t&iacute;nh, duy&ecirc;n d&aacute;ng, trong khi &aacute;o kho&aacute;c ngo&agrave;i gi&uacute;p bạn kh&ocirc;ng lo lạnh. H&atilde;y chọn những mẫu &aacute;o kho&aacute;c d&aacute;ng d&agrave;i hoặc &aacute;o blazer để th&ecirc;m phần thanh lịch.</p>\r\n\r\n<p>Canifa c&oacute; nhiều mẫu đầm maxi với họa tiết trẻ trung, ph&ugrave; hợp với nhiều d&aacute;ng người. &Aacute;o kho&aacute;c dạ của Canifa cũng l&agrave; sự lựa chọn l&yacute; tưởng để ho&agrave;n thiện set đồ n&agrave;y.</p>\r\n\r\n<p><img alt=\"Mặc Gì Đi Đám Cưới Mùa Đông\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Di-dam-cuoi-mua-dong-05.jpg\" style=\"height:1120px; width:800px\" /></p>\r\n\r\n<h2><strong>Ch&acirc;n v&aacute;y d&agrave;i c&ugrave;ng &aacute;o sơ mi v&agrave; &aacute;o len gile</strong></h2>\r\n\r\n<p>Kết hợp&nbsp;<strong>ch&acirc;n v&aacute;y d&agrave;i</strong>&nbsp;với&nbsp;<strong>&aacute;o sơ mi</strong>&nbsp;v&agrave;&nbsp;<strong>&aacute;o len gile</strong>&nbsp;l&agrave; set đồ l&yacute; tưởng cho những tiệc cưới m&ugrave;a đ&ocirc;ng c&oacute; kh&ocirc;ng gian ấm c&uacute;ng. &Aacute;o len gile gi&uacute;p giữ ấm m&agrave; vẫn giữ được vẻ ngo&agrave;i nhẹ nh&agrave;ng, thanh lịch. Ch&acirc;n v&aacute;y d&agrave;i gi&uacute;p t&ocirc;n l&ecirc;n sự nữ t&iacute;nh v&agrave; thanh tho&aacute;t cho người mặc.</p>\r\n\r\n<p>Canifa cung cấp nhiều mẫu &aacute;o sơ mi từ chất liệu cotton v&agrave; lụa mềm mại, kết hợp với &aacute;o len gile trẻ trung gi&uacute;p bạn dễ d&agrave;ng mix &amp; match theo nhiều phong c&aacute;ch kh&aacute;c nhau.</p>\r\n\r\n<p><img alt=\"Mặc Gì Đi Đám Cưới Mùa Đông\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Di-dam-cuoi-mua-dong-06.jpg\" style=\"height:1248px; width:800px\" /></p>\r\n\r\n<h2><strong>Ch&acirc;n v&aacute;y midi d&aacute;ng d&agrave;i c&ugrave;ng &aacute;o kiểu</strong></h2>\r\n\r\n<p>Set đồ n&agrave;y mang lại sự nữ t&iacute;nh nhưng kh&ocirc;ng k&eacute;m phần hiện đại.&nbsp;<strong>Ch&acirc;n v&aacute;y midi d&aacute;ng d&agrave;i</strong>&nbsp;khi kết hợp với&nbsp;<strong>&aacute;o kiểu</strong>&nbsp;sẽ gi&uacute;p bạn trở n&ecirc;n nổi bật trong buổi tiệc cưới. Canifa c&oacute; nhiều mẫu ch&acirc;n v&aacute;y midi đa dạng về m&agrave;u sắc v&agrave; chất liệu, dễ d&agrave;ng phối hợp với nhiều loại &aacute;o kiểu kh&aacute;c nhau.</p>\r\n\r\n<p><img alt=\"Mặc Gì Đi Đám Cưới Mùa Đông\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Di-dam-cuoi-mua-dong-07.jpg\" style=\"height:500px; width:800px\" /></p>\r\n\r\n<h2><strong>V&aacute;y d&agrave;i cổ điển</strong></h2>\r\n\r\n<p>Nếu bạn đang t&igrave;m kiếm phong c&aacute;ch thanh lịch,&nbsp;<strong>v&aacute;y d&agrave;i cổ điển</strong>&nbsp;ch&iacute;nh l&agrave; lựa chọn ho&agrave;n hảo. Chiếc v&aacute;y n&agrave;y kh&ocirc;ng chỉ mang lại vẻ ngo&agrave;i sang trọng m&agrave; c&ograve;n gi&uacute;p bạn giữ ấm trong những ng&agrave;y đ&ocirc;ng lạnh gi&aacute;.</p>\r\n\r\n<p>Tại Canifa, những mẫu v&aacute;y d&agrave;i cổ điển được thiết kế tinh tế, ph&ugrave; hợp với nhiều sự kiện trang trọng, đặc biệt l&agrave; c&aacute;c buổi tiệc cưới.</p>\r\n\r\n<p><img alt=\"Mặc Gì Đi Đám Cưới Mùa Đông\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Di-dam-cuoi-mua-dong-08.jpg\" style=\"height:800px; width:800px\" /></p>\r\n\r\n<h2><strong>Ch&acirc;n v&aacute;y midi, &aacute;o len v&agrave; &aacute;o kho&aacute;c da</strong></h2>\r\n\r\n<p>Sự kết hợp giữa&nbsp;<strong>ch&acirc;n v&aacute;y midi</strong>,&nbsp;<strong>&aacute;o len</strong>&nbsp;v&agrave;&nbsp;<strong>&aacute;o kho&aacute;c da</strong>&nbsp;lu&ocirc;n mang lại sự c&aacute; t&iacute;nh nhưng vẫn giữ được vẻ trang nh&atilde; khi dự đ&aacute;m cưới. Canifa c&oacute; nhiều mẫu &aacute;o kho&aacute;c da chất lượng, gi&uacute;p bạn dễ d&agrave;ng kết hợp với ch&acirc;n v&aacute;y midi v&agrave; &aacute;o len để tạo n&ecirc;n bộ trang phục vừa năng động, vừa ấm &aacute;p.</p>\r\n\r\n<p><img alt=\"Mặc Gì Đi Đám Cưới Mùa Đông\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Di-dam-cuoi-mua-dong-09.jpg\" style=\"height:1200px; width:800px\" /></p>\r\n\r\n<h2><strong>&Aacute;o len v&agrave; ch&acirc;n v&aacute;y ngắn</strong></h2>\r\n\r\n<p>Với những c&ocirc; n&agrave;ng y&ecirc;u th&iacute;ch sự trẻ trung,&nbsp;<strong>&aacute;o len</strong>&nbsp;mix c&ugrave;ng&nbsp;<strong>ch&acirc;n v&aacute;y ngắn</strong>&nbsp;ch&iacute;nh l&agrave; lựa chọn ho&agrave;n hảo. Set đồ n&agrave;y kh&ocirc;ng chỉ gi&uacute;p bạn khoe đ&ocirc;i ch&acirc;n thon gọn m&agrave; c&ograve;n giữ ấm hiệu quả.</p>\r\n\r\n<p>Canifa cung cấp nhiều mẫu &aacute;o len v&agrave; ch&acirc;n v&aacute;y ngắn từ chất liệu giữ nhiệt, gi&uacute;p bạn dễ d&agrave;ng tạo n&ecirc;n set đồ ho&agrave;n hảo cho đ&aacute;m cưới m&ugrave;a đ&ocirc;ng.</p>\r\n\r\n<p><img alt=\"Mặc Gì Đi Đám Cưới Mùa Đông\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Di-dam-cuoi-mua-dong-10.jpg\" style=\"height:800px; width:800px\" /></p>\r\n\r\n<h2><strong>V&aacute;y maxi v&agrave; &aacute;o len gile</strong></h2>\r\n\r\n<p>Cuối c&ugrave;ng, sự kết hợp giữa&nbsp;<strong>v&aacute;y maxi</strong>&nbsp;v&agrave;&nbsp;<strong>&aacute;o len gile</strong>&nbsp;sẽ mang lại vẻ ngo&agrave;i thanh lịch v&agrave; ấm &aacute;p cho những bữa tiệc cưới v&agrave;o m&ugrave;a đ&ocirc;ng. Canifa lu&ocirc;n mang đến những mẫu v&aacute;y maxi nhẹ nh&agrave;ng, nữ t&iacute;nh, kết hợp với &aacute;o len gile trẻ trung, hiện đại.</p>\r\n\r\n<p><img alt=\"Mặc Gì Đi Đám Cưới Mùa Đông\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Di-dam-cuoi-mua-dong-11.jpg\" style=\"height:500px; width:800px\" /></p>\r\n\r\n<h2><strong>Một số lưu &yacute; khi phối đồ mặc đi đ&aacute;m cưới m&ugrave;a đ&ocirc;ng</strong></h2>\r\n\r\n<p>Để c&oacute; được bộ trang phục ho&agrave;n hảo khi dự đ&aacute;m cưới v&agrave;o m&ugrave;a đ&ocirc;ng, ngo&agrave;i việc ch&uacute; trọng đến phong c&aacute;ch v&agrave; sự trang nh&atilde;, bạn cần lưu &yacute; đến khả năng giữ ấm v&agrave; t&iacute;nh thoải m&aacute;i của trang phục. Dưới đ&acirc;y l&agrave; một số lưu &yacute; chi tiết gi&uacute;p bạn phối đồ vừa thời trang vừa ph&ugrave; hợp với tiết trời lạnh gi&aacute;.</p>\r\n\r\n<h3><strong>Chọn trang phục c&oacute; chất liệu giữ ấm tốt</strong></h3>\r\n\r\n<p>V&agrave;o m&ugrave;a đ&ocirc;ng, ưu ti&ecirc;n h&agrave;ng đầu l&agrave; chọn trang phục c&oacute; khả năng giữ nhiệt cao. Chất liệu&nbsp;<strong>len</strong>,&nbsp;<strong>dạ</strong>, v&agrave;&nbsp;<strong>nỉ</strong>&nbsp;l&agrave; những lựa chọn phổ biến v&agrave; hiệu quả. C&aacute;c loại vải n&agrave;y kh&ocirc;ng chỉ gi&uacute;p giữ ấm cơ thể m&agrave; c&ograve;n tạo cảm gi&aacute;c thoải m&aacute;i, dễ chịu. Len mềm mại v&agrave; linh hoạt, ph&ugrave; hợp với nhiều kiểu &aacute;o len cổ lọ, &aacute;o kho&aacute;c hoặc v&aacute;y. Trong khi đ&oacute;, dạ v&agrave; nỉ mang lại vẻ ngo&agrave;i thanh lịch, sang trọng, ph&ugrave; hợp với &aacute;o kho&aacute;c d&aacute;ng d&agrave;i, ch&acirc;n v&aacute;y hoặc c&aacute;c bộ suit. Khi chọn trang phục, bạn n&ecirc;n ưu ti&ecirc;n chất liệu d&agrave;y dặn v&agrave; c&oacute; khả năng c&aacute;ch nhiệt tốt để đảm bảo giữ ấm trong suốt thời gian tham dự tiệc.</p>\r\n\r\n<p><img alt=\"Mặc Gì Đi Đám Cưới Mùa Đông\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Di-dam-cuoi-mua-dong-12.jpg\" style=\"height:600px; width:800px\" /></p>\r\n\r\n<h3><strong>Sử dụng phụ kiện để giữ ấm v&agrave; tạo điểm nhấn cho phong c&aacute;ch</strong></h3>\r\n\r\n<p>Phụ kiện l&agrave; yếu tố kh&ocirc;ng thể thiếu khi phối đồ dự đ&aacute;m cưới m&ugrave;a đ&ocirc;ng. Một chiếc&nbsp;<strong>khăn qu&agrave;ng cổ</strong>&nbsp;bằng len hoặc cashmere kh&ocirc;ng chỉ gi&uacute;p giữ ấm v&ugrave;ng cổ m&agrave; c&ograve;n tạo th&ecirc;m điểm nhấn thời trang cho trang phục.&nbsp;<strong>Mũ len</strong>&nbsp;l&agrave; lựa chọn ho&agrave;n hảo để giữ ấm đầu v&agrave; tai, đặc biệt khi tham dự c&aacute;c buổi tiệc cưới ngo&agrave;i trời. Bạn c&oacute; thể chọn mũ với m&agrave;u sắc trung t&iacute;nh hoặc t&ocirc;ng m&agrave;u tươi s&aacute;ng để tăng th&ecirc;m sự nổi bật.&nbsp;<strong>Găng tay</strong>&nbsp;l&agrave; m&oacute;n đồ hữu dụng gi&uacute;p bảo vệ tay khỏi lạnh buốt, đồng thời thể hiện phong c&aacute;ch c&aacute; t&iacute;nh nếu biết chọn đ&uacute;ng kiểu d&aacute;ng. Chọn găng tay bằng da hoặc len mềm sẽ vừa giữ ấm, vừa tạo vẻ ngo&agrave;i tinh tế.</p>\r\n\r\n<p><img alt=\"Mặc Gì Đi Đám Cưới Mùa Đông\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Di-dam-cuoi-mua-dong-13.jpg\" style=\"height:800px; width:800px\" /></p>\r\n\r\n<h3><strong>Chọn gi&agrave;y ph&ugrave; hợp với thời tiết m&ugrave;a đ&ocirc;ng</strong></h3>\r\n\r\n<p>Khi dự đ&aacute;m cưới v&agrave;o m&ugrave;a đ&ocirc;ng, bạn n&ecirc;n tr&aacute;nh xa c&aacute;c loại gi&agrave;y hở mũi hoặc qu&aacute; mỏng manh. Thay v&agrave;o đ&oacute;,&nbsp;<strong>gi&agrave;y bốt cao cổ</strong>&nbsp;l&agrave; lựa chọn l&yacute; tưởng. Kh&ocirc;ng chỉ giữ ấm ch&acirc;n, gi&agrave;y bốt c&ograve;n mang đến sự thời thượng v&agrave; ph&ugrave; hợp với nhiều loại trang phục từ v&aacute;y liền th&acirc;n đến ch&acirc;n v&aacute;y midi. Gi&agrave;y bốt da hoặc da lộn c&oacute; khả năng chống nước v&agrave; giữ nhiệt tốt, gi&uacute;p bạn thoải m&aacute;i di chuyển m&agrave; kh&ocirc;ng lo bị lạnh. Nếu kh&ocirc;ng muốn đi bốt, bạn c&oacute; thể chọn&nbsp;<strong>gi&agrave;y b&iacute;t mũi</strong>&nbsp;bằng da hoặc c&aacute;c chất liệu c&aacute;ch nhiệt kh&aacute;c. Những đ&ocirc;i gi&agrave;y n&agrave;y vừa đảm bảo t&iacute;nh thẩm mỹ vừa bảo vệ đ&ocirc;i ch&acirc;n khỏi gi&oacute; lạnh. Để tạo th&ecirc;m sự nổi bật, bạn c&oacute; thể chọn gi&agrave;y c&oacute; điểm nhấn như quai kim loại hoặc đế th&ocirc; gi&uacute;p tăng th&ecirc;m chiều cao v&agrave; phong c&aacute;ch.</p>\r\n\r\n<p><img alt=\"Mặc Gì Đi Đám Cưới Mùa Đông\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Di-dam-cuoi-mua-dong-14.jpg\" style=\"height:1000px; width:800px\" /></p>\r\n\r\n<p>Với những gợi &yacute; tr&ecirc;n, bạn sẽ kh&ocirc;ng c&ograve;n băn khoăn khi nghĩ về việc&nbsp;<strong>mặc g&igrave; đi đ&aacute;m cưới m&ugrave;a đ&ocirc;ng</strong>&nbsp;nữa. Đừng qu&ecirc;n gh&eacute; thăm c&aacute;c cửa h&agrave;ng của Canifa để lựa chọn những trang phục giữ ấm v&agrave; thời trang nhất cho m&ugrave;a đ&ocirc;ng n&agrave;y!</p>', 'mac-gi-di-dam-cuoi-mua-dong-bi-quyet-de-am-ap-va-sang-trong', 'uploads/blogs/1731501932_Di-dam-cuoi-mua-dong-01.jpg', 0, 2, 1, NULL, '2024-11-13 05:45:32', '2024-12-02 02:17:03'),
(3, 'Cách Phối Áo Len Croptop: Từ Đơn Giản Đến Nổi Bật', '<h2><strong>Phối đồ với &aacute;o len croptop với quần jean</strong></h2>\r\n\r\n<p>&Aacute;o len croptop kết hợp c&ugrave;ng quần jean cạp cao l&agrave; lựa chọn ho&agrave;n hảo. Set đồ n&agrave;y gi&uacute;p bạn t&ocirc;n v&ograve;ng eo thon gọn v&agrave; đ&ocirc;i ch&acirc;n d&agrave;i hơn. Quần jean cạp cao c&ograve;n gi&uacute;p che khuyết điểm bắp ch&acirc;n hoặc đ&ocirc;i ch&acirc;n kh&ocirc;ng đều. Để tr&ocirc;ng c&aacute; t&iacute;nh hơn, bạn c&oacute; thể phối c&ugrave;ng một đ&ocirc;i gi&agrave;y thể thao trắng hoặc boots da.</p>\r\n\r\n<blockquote>\r\n<p><em><strong>Mua ngay:&nbsp;<a href=\"https://canifa.com/nu/quan-jeans\">quần jean nữ Canifa</a></strong></em></p>\r\n</blockquote>\r\n\r\n<p><img alt=\"phối đồ với áo len croptop\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/phoi-voi-ao-len-croptop-2.png\" style=\"height:600px; width:800px\" /></p>\r\n\r\n<p>&Aacute;o croptop với quần jean mang đến sự n&acirc;ng động cho bạn</p>\r\n\r\n<h2><strong>Phối đồ với &aacute;o len croptop c&ugrave;ng ch&acirc;n v&aacute;y su&ocirc;ng</strong></h2>\r\n\r\n<p><a href=\"https://canifa.com/nu/chan-vay\"><strong>Ch&acirc;n v&aacute;y su&ocirc;ng</strong></a>&nbsp;lu&ocirc;n l&agrave; item được y&ecirc;u th&iacute;ch bởi sự thanh lịch v&agrave; dễ phối. Khi kết hợp &aacute;o len croptop với ch&acirc;n v&aacute;y su&ocirc;ng, bạn sẽ tạo n&ecirc;n vẻ ngo&agrave;i dịu d&agrave;ng nhưng vẫn rất hiện đại. M&agrave;u sắc của v&aacute;y v&agrave; &aacute;o n&ecirc;n h&agrave;i h&ograve;a để tổng thể trở n&ecirc;n thu h&uacute;t hơn. Th&ecirc;m một đ&ocirc;i gi&agrave;y b&uacute;p b&ecirc; hoặc sneakers để ho&agrave;n thiện set đồ n&agrave;y.</p>\r\n\r\n<p><img alt=\"phối đồ với áo len croptop\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/phoi-voi-ao-len-croptop-3.png\" style=\"height:600px; width:800px\" /></p>\r\n\r\n<p>V&aacute;y su&ocirc;ng phối với &aacute;o len croptop điệu đ&agrave;</p>\r\n\r\n<h2><strong>Phối &aacute;o len croptop c&ugrave;ng quần ống rộng</strong></h2>\r\n\r\n<p>&Aacute;o len croptop phối c&ugrave;ng quần ống rộng mang đến phong c&aacute;ch thoải m&aacute;i v&agrave; trendy. Quần ống rộng cạp cao gi&uacute;p bạn k&eacute;o d&agrave;i đ&ocirc;i ch&acirc;n v&agrave; che khuyết điểm hiệu quả. Với set đồ n&agrave;y, bạn c&oacute; thể chọn th&ecirc;m t&uacute;i x&aacute;ch mini v&agrave; phụ kiện tối giản. Đ&acirc;y l&agrave; lựa chọn l&yacute; tưởng cho những buổi dạo phố hoặc gặp gỡ bạn b&egrave;.</p>\r\n\r\n<p><img alt=\"phối đồ với áo len croptop\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/phoi-voi-ao-len-croptop-4.png\" style=\"height:600px; width:800px\" /></p>\r\n\r\n<p>Quần ống rộng phối với &aacute;o len croptop thoải m&aacute;i</p>\r\n\r\n<h2><strong>&Aacute;o len croptop mix với &aacute;o sơ mi</strong></h2>\r\n\r\n<p>&Aacute;o len croptop khi mix c&ugrave;ng&nbsp;<a href=\"https://canifa.com/nu/so-mi-ao-kieu\"><strong>&aacute;o sơ mi nữ</strong></a>&nbsp;tạo n&ecirc;n một phong c&aacute;ch preppy thanh lịch. Bạn c&oacute; thể mặc &aacute;o sơ mi d&aacute;ng rộng b&ecirc;n trong v&agrave; kho&aacute;c &aacute;o len croptop b&ecirc;n ngo&agrave;i. C&aacute;ch phối n&agrave;y vừa giữ ấm vừa tạo sự mới mẻ trong phong c&aacute;ch thường ng&agrave;y. Kết hợp với quần jean hoặc ch&acirc;n v&aacute;y sẽ gi&uacute;p tổng thể th&ecirc;m phần ho&agrave;n hảo.</p>\r\n\r\n<p><img alt=\"phối đồ với áo len croptop\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/phoi-voi-ao-len-croptop-5.png\" style=\"height:600px; width:800px\" /></p>\r\n\r\n<p>Phối một chiếc &aacute;o len croptop với sowmi rất c&aacute; t&iacute;nh</p>\r\n\r\n<h2><strong>Mix &aacute;o len croptop với ch&acirc;n v&aacute;y x&ograve;e</strong></h2>\r\n\r\n<p>Ch&acirc;n v&aacute;y x&ograve;e lu&ocirc;n mang lại cảm gi&aacute;c nữ t&iacute;nh v&agrave; đ&aacute;ng y&ecirc;u. Khi phối c&ugrave;ng &aacute;o len croptop, set đồ n&agrave;y sẽ gi&uacute;p bạn hack d&aacute;ng v&agrave; tạo sự trẻ trung. Một đ&ocirc;i gi&agrave;y cao g&oacute;t hoặc boots cổ ngắn sẽ l&agrave;m tăng th&ecirc;m điểm nhấn cho trang phục. H&atilde;y thử chọn c&aacute;c gam m&agrave;u pastel để l&agrave;m nổi bật phong c&aacute;ch nhẹ nh&agrave;ng của bạn.</p>\r\n\r\n<p><img alt=\"phối đồ với áo len croptop\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/phoi-voi-ao-len-croptop-6.png\" style=\"height:600px; width:800px\" /></p>\r\n\r\n<p>Set đồ ph&ugrave; hợp chon c&aacute;c c&ocirc; n&agrave;ng điệu đ&agrave;</p>\r\n\r\n<h2><strong>Phối quần yếm với &aacute;o len croptop</strong></h2>\r\n\r\n<p>&Aacute;o len croptop v&agrave; quần yếm l&agrave; sự kết hợp độc đ&aacute;o v&agrave; mới lạ. Quần yếm gi&uacute;p bạn giữ được sự năng động, trong khi &aacute;o len croptop tạo điểm nhấn quyến rũ. Chọn quần yếm với tone m&agrave;u nổi hoặc tương phản để tạo sự thu h&uacute;t. &Aacute;o len croptop d&aacute;ng vừa hoặc &ocirc;m sẽ gi&uacute;p bạn thoải m&aacute;i hơn khi mặc c&ugrave;ng quần yếm. Với set đồ n&agrave;y, bạn c&oacute; thể chọn gi&agrave;y sneaker hoặc boots để ho&agrave;n thiện phong c&aacute;ch. Đ&acirc;y l&agrave; lựa chọn l&yacute; tưởng cho những buổi dạo phố, gặp gỡ bạn b&egrave; hay du lịch.</p>\r\n\r\n<p><img alt=\"phối đồ với áo len croptop\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/phoi-voi-ao-len-croptop-7.png\" style=\"height:600px; width:800px\" /></p>\r\n\r\n<p>Quần yếm jean mang đến cho n&agrave;ng sự dễ thương</p>\r\n\r\n<h2><strong>Phối ch&acirc;n v&aacute;y midi với &aacute;o len croptop</strong></h2>\r\n\r\n<p>Ch&acirc;n v&aacute;y midi khi kết hợp với &aacute;o len croptop sẽ mang lại vẻ ngo&agrave;i nữ t&iacute;nh v&agrave; thanh lịch. Set đồ n&agrave;y gi&uacute;p bạn dễ d&agrave;ng biến h&oacute;a phong c&aacute;ch từ dịu d&agrave;ng đến hiện đại. Chọn ch&acirc;n v&aacute;y midi c&oacute; chất liệu nhẹ nh&agrave;ng như voan, lụa để tăng th&ecirc;m phần duy&ecirc;n d&aacute;ng. Phụ kiện như t&uacute;i x&aacute;ch nhỏ, mũ len hay v&ograve;ng cổ sẽ l&agrave; điểm nhấn ho&agrave;n hảo. Một đ&ocirc;i gi&agrave;y cao g&oacute;t hoặc gi&agrave;y b&uacute;p b&ecirc; sẽ gi&uacute;p bạn tr&ocirc;ng cao r&aacute;o v&agrave; tự tin hơn khi diện outfit n&agrave;y.</p>\r\n\r\n<p><img alt=\"phối đồ với áo len croptop\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/phoi-voi-ao-len-croptop-8.png\" style=\"height:600px; width:800px\" /></p>\r\n\r\n<p>Set đồ thanh lịch cho c&ocirc; n&agrave;ng</p>\r\n\r\n<h2><strong>Phối quần jogger với &aacute;o len croptop</strong></h2>\r\n\r\n<p>Khi phối &aacute;o len croptop với quần jogger, bạn sẽ c&oacute; một set đồ năng động v&agrave; c&aacute; t&iacute;nh. Chọn &aacute;o croptop d&aacute;ng &ocirc;m để t&ocirc;n d&aacute;ng v&agrave; nhấn mạnh v&ograve;ng eo thon gọn. Quần jogger với tone m&agrave;u trung t&iacute;nh hoặc c&ugrave;ng m&agrave;u với &aacute;o sẽ gi&uacute;p outfit th&ecirc;m phần đồng điệu. Một đ&ocirc;i sneaker hoặc boots l&agrave; sự lựa chọn ho&agrave;n hảo để ho&agrave;n thiện phong c&aacute;ch. Đừng qu&ecirc;n th&ecirc;m phụ kiện như t&uacute;i x&aacute;ch nhỏ, d&acirc;y chuyền hoặc k&iacute;nh r&acirc;m để tr&ocirc;ng thật thời thượng. Đ&acirc;y l&agrave; set đồ ph&ugrave; hợp cho những buổi dạo phố hoặc tham gia c&aacute;c hoạt động ngo&agrave;i trời.</p>', 'cach-phoi-ao-len-croptop-tu-don-gian-den-noi-bat', 'uploads/blogs/1733154204_phoi-voi-ao-len-croptop-1.png', 1, 3, 1, NULL, '2024-12-02 08:43:24', '2024-12-02 08:43:24');
INSERT INTO `blogs` (`id`, `title`, `content`, `slug`, `image`, `status`, `category_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 'Bí Quyết Mix Chân Váy Jean Dài Với Áo Gì Cho Mùa Thu Đông', '<p><em>M&ugrave;a thu đ&ocirc;ng l&agrave; thời điểm l&yacute; tưởng để biến h&oacute;a với những trang phục vừa giữ ấm vừa thể hiện c&aacute; t&iacute;nh. Trong số đ&oacute;,&nbsp;</em><strong><em>ch&acirc;n v&aacute;y jean d&agrave;i</em></strong><em>&nbsp;đ&atilde; trở th&agrave;nh item quen thuộc nhờ v&agrave;o sự tiện lợi v&agrave; thời trang. Nhưng để mặc đẹp v&agrave; ph&ugrave; hợp với từng ho&agrave;n cảnh, kh&ocirc;ng &iacute;t người tự hỏi&nbsp;</em><strong><em>ch&acirc;n v&aacute;y jean d&agrave;i phối với &aacute;o g&igrave;</em></strong><em>&nbsp;l&agrave; tốt nhất. Với những gợi &yacute; từ&nbsp;</em><strong><em>Canifa</em></strong><em>, bạn sẽ t&igrave;m thấy c&aacute;ch&nbsp;</em><strong><em>phối ch&acirc;n v&aacute;y jean d&agrave;i với &aacute;o g&igrave;</em></strong><em>&nbsp;thật sự phong c&aacute;ch cho mọi dịp trong m&ugrave;a thu đ&ocirc;ng n&agrave;y. Kh&aacute;m ph&aacute; ngay mẹo mix đồ chuẩn thời thượng từ&nbsp;</em><strong><em>Canifa</em></strong><em>&nbsp;để biết th&ecirc;m c&aacute;ch&nbsp;</em><strong><em>ch&acirc;n v&aacute;y jean d&agrave;i kết hợp với &aacute;o g&igrave;</em></strong><em>, gi&uacute;p bạn lu&ocirc;n tự tin v&agrave; nổi bật!</em></p>\r\n\r\n<h2><strong>C&aacute;c Kiểu Ch&acirc;n V&aacute;y Jean D&agrave;i Phổ Biến Nhất Hiện Nay</strong></h2>\r\n\r\n<p>Ch&acirc;n v&aacute;y jean d&agrave;i kh&ocirc;ng c&ograve;n đơn thuần chỉ l&agrave; m&oacute;n đồ thời trang m&agrave; đ&atilde; trở th&agrave;nh biểu tượng của sự tự do v&agrave; phong c&aacute;ch c&aacute; nh&acirc;n. Mỗi kiểu v&aacute;y lại mang đến một cảm gi&aacute;c ri&ecirc;ng, gi&uacute;p c&aacute;c c&ocirc; g&aacute;i tự tin thể hiện n&eacute;t đẹp của m&igrave;nh trong mọi ho&agrave;n cảnh. H&atilde;y c&ugrave;ng kh&aacute;m ph&aacute; những thiết kế ch&acirc;n v&aacute;y jean d&agrave;i đang được ưa chuộng nhất hiện nay.</p>\r\n\r\n<h3><strong>Ch&acirc;n V&aacute;y Jean D&agrave;i Chữ A &ndash; Sự Kinh Điển Kh&ocirc;ng Bao Giờ Lỗi Mốt</strong></h3>\r\n\r\n<p>Nếu bạn y&ecirc;u th&iacute;ch phong c&aacute;ch đơn giản nhưng vẫn muốn t&ocirc;n l&ecirc;n vẻ nữ t&iacute;nh, th&igrave; ch&acirc;n v&aacute;y jean d&agrave;i chữ A ch&iacute;nh l&agrave; lựa chọn l&yacute; tưởng. Với thiết kế &ocirc;m nhẹ ở phần eo v&agrave; x&ograve;e dần về ph&iacute;a gấu v&aacute;y, kiểu v&aacute;y n&agrave;y gi&uacute;p tạo d&aacute;ng thon gọn, che khuyết điểm ở h&ocirc;ng v&agrave; đ&ugrave;i một c&aacute;ch tinh tế. D&ugrave; bạn sở hữu v&oacute;c d&aacute;ng mảnh mai hay đầy đặn, ch&acirc;n v&aacute;y chữ A lu&ocirc;n l&agrave; người bạn đồng h&agrave;nh đ&aacute;ng tin cậy. Khi kho&aacute;c l&ecirc;n m&igrave;nh chiếc v&aacute;y n&agrave;y, bạn sẽ cảm nhận được sự thoải m&aacute;i v&agrave; thanh lịch, như thể bước v&agrave;o một ng&agrave;y mới với tất cả sự tự tin v&agrave; dịu d&agrave;ng.</p>\r\n\r\n<h3><strong>Ch&acirc;n V&aacute;y Jean D&agrave;i Xẻ T&agrave; &ndash; Điểm Nhấn Quyến Rũ Đầy Sức H&uacute;t</strong></h3>\r\n\r\n<p>Đối với những c&ocirc; n&agrave;ng muốn th&ecirc;m ch&uacute;t ph&aacute; c&aacute;ch, ch&acirc;n v&aacute;y jean d&agrave;i xẻ t&agrave; l&agrave; một lựa chọn kh&ocirc;ng thể bỏ qua. Đường xẻ t&aacute;o bạo kh&ocirc;ng chỉ tạo điểm nhấn quyến rũ m&agrave; c&ograve;n gi&uacute;p việc di chuyển trở n&ecirc;n linh hoạt hơn. D&ugrave; bạn chọn mặc để dạo phố, đi du lịch hay dự tiệc, chiếc v&aacute;y n&agrave;y lu&ocirc;n mang lại cho bạn cảm gi&aacute;c năng động v&agrave; thời thượng. Sự giao thoa giữa chất liệu jean khỏe khoắn v&agrave; chi tiết xẻ t&agrave; tinh tế tạo n&ecirc;n vẻ đẹp vừa mạnh mẽ vừa mềm mại, khiến bạn nổi bật ở mọi nơi bạn đặt ch&acirc;n tới.</p>\r\n\r\n<h3><strong>Ch&acirc;n V&aacute;y Jean D&agrave;i D&aacute;ng B&uacute;t Ch&igrave; &ndash; Thanh Lịch V&agrave; Sang Trọng</strong></h3>\r\n\r\n<p>Nếu bạn đang t&igrave;m kiếm một thiết kế c&oacute; thể t&ocirc;n l&ecirc;n đường cong của cơ thể, ch&acirc;n v&aacute;y jean d&aacute;ng b&uacute;t ch&igrave; ch&iacute;nh l&agrave; sự lựa chọn ho&agrave;n hảo. V&aacute;y &ocirc;m s&aacute;t v&agrave;o cơ thể, tạo cảm gi&aacute;c gọn g&agrave;ng v&agrave; nhấn mạnh v&agrave;o những đường n&eacute;t đẹp nhất. Kiểu v&aacute;y n&agrave;y đặc biệt ph&ugrave; hợp với những buổi gặp mặt, sự kiện c&ocirc;ng sở hoặc c&aacute;c dịp cần đến sự chỉn chu v&agrave; tinh tế. Khi kết hợp với một chiếc &aacute;o sơ mi hoặc blazer, bạn kh&ocirc;ng chỉ tr&ocirc;ng chuy&ecirc;n nghiệp m&agrave; c&ograve;n v&ocirc; c&ugrave;ng cuốn h&uacute;t.</p>\r\n\r\n<h3><strong>Ch&acirc;n V&aacute;y Jean D&agrave;i D&aacute;ng Loe &ndash; Vẻ Đẹp Cổ Điển V&agrave; Mềm Mại</strong></h3>\r\n\r\n<p>Mang trong m&igrave;nh hơi thở của phong c&aacute;ch cổ điển, ch&acirc;n v&aacute;y jean d&agrave;i d&aacute;ng loe đưa bạn trở về những thập kỷ trước nhưng vẫn giữ được n&eacute;t trẻ trung v&agrave; hiện đại. Phần ch&acirc;n v&aacute;y loe nhẹ tạo n&ecirc;n sự uyển chuyển, gi&uacute;p mỗi bước đi trở n&ecirc;n mềm mại hơn. Đ&acirc;y l&agrave; kiểu v&aacute;y l&yacute; tưởng cho những c&ocirc; g&aacute;i y&ecirc;u th&iacute;ch sự ph&oacute;ng kho&aacute;ng v&agrave; nhẹ nh&agrave;ng trong phong c&aacute;ch. Bạn c&oacute; thể diện v&aacute;y loe cho những buổi hẹn h&ograve; l&atilde;ng mạn hoặc dạo phố cuối tuần c&ugrave;ng bạn b&egrave; &ndash; d&ugrave; ở đ&acirc;u, bạn cũng sẽ lu&ocirc;n tỏa s&aacute;ng với n&eacute;t duy&ecirc;n d&aacute;ng của m&igrave;nh.</p>\r\n\r\n<p><img alt=\"Mix Chân Váy Jean Dài Với Áo\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Phoi-vay-jean-voi-ao-01.jpg\" style=\"height:1036px; width:800px\" /></p>\r\n\r\n<p>Tất cả những mẫu ch&acirc;n v&aacute;y n&agrave;y đều c&oacute; điểm chung l&agrave; dễ phối đồ v&agrave; ph&ugrave; hợp với nhiều ho&agrave;n cảnh. Đặc biệt, c&aacute;c thiết kế từ&nbsp;<strong>Canifa</strong>&nbsp;lu&ocirc;n ch&uacute; trọng đến sự thoải m&aacute;i khi mặc. Chất liệu jean mềm mại, c&oacute; độ co gi&atilde;n nhẹ gi&uacute;p người mặc tự do di chuyển m&agrave; kh&ocirc;ng hề cảm thấy g&ograve; b&oacute;. B&ecirc;n cạnh đ&oacute;, Canifa c&ograve;n mang đến nhiều lựa chọn về m&agrave;u sắc, từ những t&ocirc;ng m&agrave;u cổ điển như xanh denim, xanh đậm, đến c&aacute;c m&agrave;u c&aacute; t&iacute;nh như đen hoặc trắng.</p>\r\n\r\n<p>Với ch&acirc;n v&aacute;y jean d&agrave;i, bạn kh&ocirc;ng cần phải giới hạn bản th&acirc;n trong một khu&ocirc;n mẫu nhất định. Mỗi kiểu v&aacute;y lại mang đến một sắc th&aacute;i ri&ecirc;ng &ndash; khi th&igrave; dịu d&agrave;ng, khi lại c&aacute; t&iacute;nh v&agrave; năng động. Ch&iacute;nh sự đa dạng trong thiết kế v&agrave; chất liệu đ&atilde; gi&uacute;p ch&acirc;n v&aacute;y jean d&agrave;i trở th&agrave;nh m&oacute;n đồ &ldquo;phải c&oacute;&rdquo; trong tủ đồ của mọi c&ocirc; g&aacute;i. Kh&ocirc;ng chỉ l&agrave; một m&oacute;n trang phục đơn thuần, n&oacute; c&ograve;n l&agrave; c&aacute;ch để bạn thể hiện c&aacute; t&iacute;nh v&agrave; phong c&aacute;ch của m&igrave;nh theo c&aacute;ch ri&ecirc;ng. V&igrave; thế, h&atilde;y chọn cho m&igrave;nh những thiết kế ph&ugrave; hợp nhất để lu&ocirc;n tự tin v&agrave; tỏa s&aacute;ng trong mọi ho&agrave;n cảnh!</p>\r\n\r\n<h2><strong>10 C&aacute;ch Phối Ch&acirc;n V&aacute;y Jean D&agrave;i Thời Trang Nhất</strong></h2>\r\n\r\n<p>Nếu bạn đang băn khoăn&nbsp;<strong>ch&acirc;n v&aacute;y jean d&agrave;i phối với &aacute;o g&igrave;</strong>, dưới đ&acirc;y l&agrave; 10 c&aacute;ch mix đồ ấn tượng cho m&ugrave;a thu đ&ocirc;ng m&agrave; bạn kh&ocirc;ng thể bỏ qua.</p>\r\n\r\n<h3><strong>Ch&acirc;n V&aacute;y Jean D&agrave;i Phối Với &Aacute;o Thun</strong></h3>\r\n\r\n<p>&Aacute;o thun lu&ocirc;n l&agrave; lựa chọn an to&agrave;n v&agrave; cơ bản khi phối với ch&acirc;n v&aacute;y jean d&agrave;i. D&ugrave; l&agrave; &aacute;o thun trơn hay họa tiết, bạn đều c&oacute; thể dễ d&agrave;ng tạo ra phong c&aacute;ch năng động v&agrave; trẻ trung.&nbsp;<strong>Canifa</strong>&nbsp;c&oacute; rất nhiều mẫu &aacute;o thun chất liệu cotton tho&aacute;ng m&aacute;t, th&iacute;ch hợp cho cả những ng&agrave;y se lạnh khi mặc c&ugrave;ng ch&acirc;n v&aacute;y jean d&agrave;i.</p>\r\n\r\n<p><img alt=\"Mix Chân Váy Jean Dài Với Áo\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Phoi-vay-jean-voi-ao-02.jpg\" style=\"height:1055px; width:800px\" /></p>\r\n\r\n<h3><strong>Ch&acirc;n V&aacute;y Jean D&agrave;i Với &Aacute;o Sơ Mi</strong></h3>\r\n\r\n<p>Nếu bạn đang t&igrave;m kiếm vẻ ngo&agrave;i thanh lịch, nh&atilde; nhặn, h&atilde;y thử&nbsp;<strong>phối ch&acirc;n v&aacute;y jean d&agrave;i với &aacute;o sơ mi</strong>. &Aacute;o sơ mi trắng hoặc sơ mi họa tiết nhẹ nh&agrave;ng l&agrave; lựa chọn l&yacute; tưởng cho những buổi l&agrave;m việc hoặc gặp gỡ đối t&aacute;c. Sự kết hợp n&agrave;y kh&ocirc;ng chỉ đẹp m&agrave; c&ograve;n thể hiện sự chỉn chu v&agrave; tinh tế.</p>\r\n\r\n<p><img alt=\"Mix Chân Váy Jean Dài Với Áo\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Phoi-vay-jean-voi-ao-03.jpg\" style=\"height:1201px; width:800px\" /></p>\r\n\r\n<h3><strong>Ch&acirc;n V&aacute;y Jean D&agrave;i Với &Aacute;o Kho&aacute;c</strong></h3>\r\n\r\n<p>&Aacute;o kho&aacute;c l&agrave; m&oacute;n đồ kh&ocirc;ng thể thiếu trong m&ugrave;a lạnh. Bạn c&oacute; thể chọn c&aacute;c loại &aacute;o kho&aacute;c phao, &aacute;o dạ hoặc &aacute;o b&ograve; để phối c&ugrave;ng ch&acirc;n v&aacute;y jean d&agrave;i. C&aacute;c sản phẩm &aacute;o kho&aacute;c của&nbsp;<strong>Canifa</strong>&nbsp;kh&ocirc;ng chỉ ấm &aacute;p m&agrave; c&ograve;n thời trang, gi&uacute;p bạn tự tin xuống phố trong những ng&agrave;y đ&ocirc;ng.</p>\r\n\r\n<p><img alt=\"Mix Chân Váy Jean Dài Với Áo\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Phoi-vay-jean-voi-ao-04.jpg\" style=\"height:1055px; width:800px\" /></p>\r\n\r\n<h3><strong>Ch&acirc;n V&aacute;y Jean D&agrave;i V&agrave; &Aacute;o Len</strong></h3>\r\n\r\n<p>Một chiếc &aacute;o len d&aacute;ng rộng sẽ tạo ra phong c&aacute;ch trẻ trung khi kết hợp với ch&acirc;n v&aacute;y jean d&agrave;i. Để tăng th&ecirc;m sự thoải m&aacute;i, bạn c&oacute; thể chọn c&aacute;c mẫu &aacute;o len oversized hoặc &aacute;o len mỏng cho những ng&agrave;y thời tiết chuyển m&ugrave;a.&nbsp;<strong>Canifa</strong>&nbsp;nổi tiếng với c&aacute;c sản phẩm &aacute;o len mềm mại, nhẹ v&agrave; giữ ấm tốt.</p>\r\n\r\n<p><img alt=\"Mix Chân Váy Jean Dài Với Áo\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Phoi-vay-jean-voi-ao-05.jpg\" style=\"height:994px; width:800px\" /></p>\r\n\r\n<h3><strong>Ch&acirc;n V&aacute;y Jean D&agrave;i Với Blazer</strong></h3>\r\n\r\n<p>Blazer l&agrave; lựa chọn tuyệt vời để tạo n&ecirc;n phong c&aacute;ch sang trọng v&agrave; hiện đại.&nbsp;<strong>Phối ch&acirc;n v&aacute;y jean d&agrave;i với blazer</strong>&nbsp;kh&ocirc;ng chỉ ph&ugrave; hợp cho những buổi gặp mặt m&agrave; c&ograve;n mang lại sự c&aacute; t&iacute;nh cho bạn. H&atilde;y thử mix c&ugrave;ng một đ&ocirc;i boot cao cổ để tăng th&ecirc;m phần phong c&aacute;ch.</p>\r\n\r\n<p><img alt=\"Mix Chân Váy Jean Dài Với Áo\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Phoi-vay-jean-voi-ao-06.jpg\" style=\"height:1200px; width:800px\" /></p>\r\n\r\n<h3><strong>Ch&acirc;n V&aacute;y Jean D&agrave;i C&ugrave;ng &Aacute;o Trễ Vai</strong></h3>\r\n\r\n<p>&Aacute;o trễ vai mang lại vẻ nữ t&iacute;nh v&agrave; quyến rũ.&nbsp;<strong>Ch&acirc;n v&aacute;y jean d&agrave;i kết hợp với &aacute;o trễ vai</strong>&nbsp;l&agrave; bộ đ&ocirc;i ho&agrave;n hảo cho những buổi hẹn h&ograve; hoặc sự kiện nhẹ nh&agrave;ng. Bạn c&oacute; thể chọn th&ecirc;m một số phụ kiện như b&ocirc;ng tai lớn hoặc v&ograve;ng cổ để tạo điểm nhấn.</p>\r\n\r\n<p><img alt=\"Mix Chân Váy Jean Dài Với Áo\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Phoi-vay-jean-voi-ao-07.jpg\" style=\"height:1224px; width:800px\" /></p>\r\n\r\n<h3><strong>Ch&acirc;n V&aacute;y Jean D&agrave;i C&ugrave;ng &Aacute;o Sweater</strong></h3>\r\n\r\n<p>&Aacute;o sweater l&agrave; item quen thuộc trong những ng&agrave;y lạnh. Bộ đ&ocirc;i&nbsp;<strong>ch&acirc;n v&aacute;y jean d&agrave;i với &aacute;o sweater</strong>&nbsp;mang đến sự trẻ trung v&agrave; năng động. Bạn c&oacute; thể chọn m&agrave;u sắc tương phản để tạo sự nổi bật.</p>\r\n\r\n<p><img alt=\"Mix Chân Váy Jean Dài Với Áo\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Phoi-vay-jean-voi-ao-08.jpg\" style=\"height:1001px; width:800px\" /></p>\r\n\r\n<h3><strong>Ch&acirc;n V&aacute;y Jean D&agrave;i Với &Aacute;o Hoodie</strong></h3>\r\n\r\n<p>&Aacute;o hoodie mang phong c&aacute;ch khỏe khoắn v&agrave; hiện đại.&nbsp;<strong>Phối ch&acirc;n v&aacute;y jean d&agrave;i với &aacute;o hoodie</strong>&nbsp;sẽ gi&uacute;p bạn tr&ocirc;ng trẻ trung v&agrave; thoải m&aacute;i. Đ&acirc;y l&agrave; set đồ l&yacute; tưởng cho những chuyến du lịch hoặc dạo phố cuối tuần.</p>\r\n\r\n<p><img alt=\"Mix Chân Váy Jean Dài Với Áo\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Phoi-vay-jean-voi-ao-09.jpg\" style=\"height:1009px; width:800px\" /></p>\r\n\r\n<h3><strong>Ch&acirc;n V&aacute;y Jean D&agrave;i Với &Aacute;o Len Cổ Lọ</strong></h3>\r\n\r\n<p>&Aacute;o len cổ lọ kh&ocirc;ng chỉ giữ ấm m&agrave; c&ograve;n tạo phong c&aacute;ch thanh lịch.&nbsp;<strong>Ch&acirc;n v&aacute;y jean d&agrave;i phối với &aacute;o len cổ lọ</strong>&nbsp;l&agrave; lựa chọn tuyệt vời cho những ng&agrave;y trời lạnh.&nbsp;<strong>Canifa</strong>&nbsp;cung cấp nhiều mẫu &aacute;o len cổ lọ với thiết kế đẹp mắt v&agrave; chất liệu giữ nhiệt hiệu quả.</p>\r\n\r\n<p><img alt=\"Mix Chân Váy Jean Dài Với Áo\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Phoi-vay-jean-voi-ao-10.jpg\" style=\"height:1172px; width:800px\" /></p>\r\n\r\n<h3><strong>Ch&acirc;n V&aacute;y Jean D&agrave;i Phối Cardigan</strong></h3>\r\n\r\n<p>Cardigan l&agrave; item dễ d&agrave;ng kết hợp với mọi kiểu ch&acirc;n v&aacute;y.&nbsp;<strong>Phối ch&acirc;n v&aacute;y jean d&agrave;i với cardigan</strong>&nbsp;sẽ gi&uacute;p bạn tr&ocirc;ng nhẹ nh&agrave;ng v&agrave; nữ t&iacute;nh hơn. Chọn c&aacute;c mẫu cardigan d&aacute;ng d&agrave;i hoặc d&aacute;ng lửng từ&nbsp;<strong>Canifa</strong>&nbsp;để tạo n&ecirc;n sự đa dạng cho tủ đồ của bạn.</p>\r\n\r\n<p><img alt=\"Mix Chân Váy Jean Dài Với Áo\" src=\"https://canifa.com/blog/wp-content/uploads/2024/11/Phoi-vay-jean-voi-ao-11.jpg\" style=\"height:1067px; width:800px\" /></p>\r\n\r\n<p>Như vậy, với những gợi &yacute; tr&ecirc;n, bạn đ&atilde; biết&nbsp;<strong>ch&acirc;n v&aacute;y jean d&agrave;i phối với &aacute;o g&igrave;</strong>&nbsp;cho m&ugrave;a thu đ&ocirc;ng n&agrave;y. Từ &aacute;o thun, &aacute;o sơ mi đến c&aacute;c loại &aacute;o kho&aacute;c v&agrave; blazer, mỗi c&aacute;ch phối đều mang lại phong c&aacute;ch ri&ecirc;ng biệt cho người mặc. Thương hiệu&nbsp;<strong>Canifa</strong>&nbsp;tự h&agrave;o đồng h&agrave;nh c&ugrave;ng bạn với những sản phẩm chất lượng v&agrave; thời trang, gi&uacute;p bạn dễ d&agrave;ng biến h&oacute;a phong c&aacute;ch theo từng m&ugrave;a.</p>\r\n\r\n<p>H&atilde;y gh&eacute; ngay c&aacute;c cửa h&agrave;ng&nbsp;<strong>Canifa</strong>&nbsp;hoặc truy cập website của h&atilde;ng để kh&aacute;m ph&aacute; th&ecirc;m nhiều sản phẩm ch&acirc;n v&aacute;y v&agrave; &aacute;o thời trang kh&aacute;c. Đừng qu&ecirc;n theo d&otilde;i c&aacute;c chương tr&igrave;nh khuyến m&atilde;i để sở hữu những m&oacute;n đồ y&ecirc;u th&iacute;ch với mức gi&aacute; tốt nhất.</p>\r\n\r\n<p>C&ugrave;ng Canifa tự tin tỏa s&aacute;ng v&agrave; tạo n&ecirc;n phong c&aacute;ch ri&ecirc;ng cho m&ugrave;a thu đ&ocirc;ng năm nay!&nbsp;Với b&agrave;i viết n&agrave;y, bạn sẽ t&igrave;m được nhiều c&aacute;ch kết hợp&nbsp;<strong>ch&acirc;n v&aacute;y jean d&agrave;i với &aacute;o g&igrave;</strong>&nbsp;để vừa ấm &aacute;p vừa thời trang. Đừng ngần ngại thử nghiệm v&agrave; s&aacute;ng tạo để thể hiện c&aacute; t&iacute;nh của ri&ecirc;ng m&igrave;nh nh&eacute;!</p>', 'bi-quyet-mix-chan-vay-jean-dai-voi-ao-gi-cho-mua-thu-dong', 'uploads/blogs/1733154304_Phoi-vay-jean-voi-ao-10.jpg', 1, 3, 1, NULL, '2024-12-02 08:45:04', '2024-12-02 08:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Datch Fashion', 'brands/4weUQ9K7SHkott4YRkZzdNszW8HGHCIeETw304qA.png', '2024-11-13 00:29:22', '2024-11-13 00:27:28', '2024-11-13 00:29:22'),
(2, 'Datch Fashion', 'uploads/brands/1731483261_logDatch.png', NULL, '2024-11-13 00:29:39', '2024-11-13 00:34:21'),
(3, 'Nike', 'uploads/brands/1731503502_images.png', NULL, '2024-11-13 00:34:01', '2024-11-13 06:11:42'),
(4, 'Adidas', 'uploads/brands/1731503594_images (2).png', NULL, '2024-11-13 00:34:37', '2024-11-13 06:13:14'),
(5, 'Gucci', 'uploads/brands/1731503634_1f7f3b7361b0c9c07cd43cba4dc87205.jpg', NULL, '2024-11-13 00:34:47', '2024-11-13 06:13:54'),
(6, 'Channel', 'uploads/brands/1731503669_images (3).png', '2024-11-13 06:15:06', '2024-11-13 00:34:59', '2024-11-13 06:15:06'),
(7, 'Puma', 'uploads/brands/1731503702_images (4).png', NULL, '2024-11-13 00:35:11', '2024-11-13 06:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(61, 1, 'active', '2024-12-03 07:48:35', '2024-12-03 07:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint UNSIGNED NOT NULL,
  `cart_id` bigint UNSIGNED NOT NULL,
  `variant_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price_at_purchase` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `variant_id`, `quantity`, `price_at_purchase`, `created_at`, `updated_at`) VALUES
(83, 61, 44, 1, '399000.00', '2024-12-03 07:48:35', '2024-12-03 07:48:35'),
(84, 61, 44, 1, '399000.00', '2024-12-03 07:48:41', '2024-12-03 07:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `parent_id` bigint DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `is_active`, `parent_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Nam', 'uploads/category/nam.webp', 1, NULL, NULL, NULL, NULL),
(3, 'Nữ', 'uploads/category/Nữ.webp', 1, NULL, NULL, NULL, NULL),
(4, 'Áo phông', 'uploads/category/desktop_Nam_5.Ao-phong.webp', 1, 2, NULL, NULL, NULL),
(5, 'Áo nỉ', 'uploads/category/desktop_Nam_3.Ao-ni.webp', 1, 2, NULL, NULL, NULL),
(6, 'Áo khoác', 'uploads/category/desktop_Nam_2.Ao-khoac.webp', 1, 2, NULL, NULL, NULL),
(7, 'Áo len', 'uploads/category/desktop_Nam_4.Ao-len.webp', 1, 2, NULL, NULL, NULL),
(8, 'Áo phông nữ', 'uploads/category/desktop_Nam_5.Ao-phong.webp', 1, 3, NULL, NULL, NULL),
(9, 'Áo nỉ nữ', 'uploads/category/desktop_Nam_3.Ao-ni.webp', 1, 3, NULL, NULL, NULL),
(10, 'Áo khoác nữ', 'uploads/category/desktop_Nam_2.Ao-khoac.webp', 1, 3, NULL, NULL, NULL),
(11, 'Đồ ngủ nữ', 'uploads/category/desktop_Nu_1.Do-mac-nha.webp', 1, 3, NULL, NULL, NULL),
(12, 'Áo giữ nhiệt', 'uploads/category/desktop_Nu_1.Do-mac-nha (1).webp', 1, 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_code` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `color_code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Đen', '#000000', NULL, NULL, NULL),
(2, 'Trắng', '#ffffff', NULL, NULL, NULL),
(3, 'Đỏ', '#ed0202', NULL, NULL, NULL),
(4, 'Hồng', '#ec0982', NULL, NULL, NULL),
(5, 'Vàng', '#ffff00', NULL, NULL, NULL),
(6, 'Nâu đất', '#800000', NULL, NULL, NULL),
(7, 'Xám lông chuột', '#808080', NULL, NULL, NULL),
(8, 'Màu Olive', '#808000', NULL, NULL, NULL),
(9, 'Màu be', '#fafad2', NULL, NULL, NULL),
(10, 'Xanh Navy', '#000080', NULL, NULL, NULL),
(11, 'Xanh da trời', '#00bfff', NULL, NULL, NULL),
(12, 'Xanh rêu', '#167d08', NULL, NULL, NULL),
(13, 'Nâu', '#840b0b', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint UNSIGNED DEFAULT NULL,
  `status` enum('approved','pending','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `user_id`, `content`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 'Áo đẹp lắm', NULL, 'approved', '2024-11-29 01:43:19', '2024-12-02 02:06:37'),
(2, 10, 2, 'Áo đẹp lắm', NULL, 'pending', '2024-11-29 20:29:56', '2024-11-29 20:29:56'),
(3, 10, 2, 'Áo đẹp lắm', NULL, 'pending', '2024-11-29 20:30:05', '2024-11-29 20:30:05'),
(4, 9, 2, 'Áo đẹp', NULL, 'pending', '2024-11-29 20:30:51', '2024-11-29 20:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `fullname`, `email`, `address`, `phone`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Vũ Minh Chiến', 'chienvu2k4@gmail.com', 'Yen Mo', '0339381785', 'Em có đẹp trai không', '2024-11-13 05:17:47', '2024-11-13 05:17:47'),
(2, 'Vũ Minh Chiến', 'chienvu2k4@gmail.com', 'Số 3, Ngách 8, Ngõ 106, Hoàng Quốc Việt, Cầu Giấy, Hà Nội', '0339381785', 'Ahihi', '2024-11-13 07:18:47', '2024-11-13 07:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double(10,2) NOT NULL,
  `discount_type` enum('fixed','percent') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usage_limit` int DEFAULT NULL,
  `usage_limit_per_user` int UNSIGNED DEFAULT NULL,
  `used_count` int DEFAULT '0',
  `minimum_amount` bigint UNSIGNED DEFAULT NULL,
  `maximum_amount` bigint UNSIGNED DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `discount`, `discount_type`, `usage_limit`, `usage_limit_per_user`, `used_count`, `minimum_amount`, `maximum_amount`, `start_date`, `end_date`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'AHIHIDONGOC', 15000.00, 'fixed', 10, 1, 0, 100000, NULL, '2024-11-13 20:51:00', '2025-01-30 20:51:00', 1, '2024-11-13 06:51:52', '2024-11-25 00:37:11'),
(2, 'SFDHSADAS', 15.00, 'percent', 1, 1, 0, 500000, 50000, '2024-11-28 16:30:00', '2024-11-30 16:30:00', 1, '2024-11-28 02:30:41', '2024-11-28 02:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite_products`
--

CREATE TABLE `favorite_products` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2024_09_22_075733_create_categories_table', 1),
(13, '2024_09_22_075741_create_brands_table', 1),
(14, '2024_09_22_075746_create_products_table', 1),
(15, '2024_09_22_075813_create_colors_table', 1),
(16, '2024_09_22_075818_create_sizes_table', 1),
(17, '2024_09_22_075824_create_coupons_table', 1),
(18, '2024_09_22_075849_create_shippers_table', 1),
(19, '2024_09_22_075902_create_blogs_table', 1),
(20, '2024_09_22_095313_create_product_variants_table', 1),
(21, '2024_09_22_095844_create_orders_table', 1),
(22, '2024_09_22_140734_create_order_details_table', 1),
(23, '2024_09_22_141702_create_shipments_table', 1),
(24, '2024_10_01_165549_create_banners_table', 1),
(25, '2024_10_15_164734_create_carts_table', 1),
(26, '2024_10_25_125106_create_cart_items_table', 1),
(27, '2024_10_25_132800_create_favorite_products_table', 1),
(28, '2024_10_26_090944_create_comments_table', 1),
(29, '2024_10_28_083919_add_views_to_products_table', 2),
(30, '2024_11_08_171407_add_profile_fields_to_users_table', 3),
(31, '2024_11_13_060706_create_contacts_table', 4),
(32, '2024_09_22_075754_create_product_galleries_table', 5),
(36, '2024_11_25_051901_add_note_and_payment_status_to_orders_table', 6),
(37, '2024_11_28_093404_add_link_and_is_active_to_banners_table', 7),
(38, '2024_11_29_152552_add_google_id_to_users_table', 8),
(39, '2024_12_04_060553_create_points_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` enum('Thanh toán khi nhận hàng','Thanh toán bằng thẻ','Thanh toán qua VNPay') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Thanh toán khi nhận hàng',
  `status` enum('Chờ xác nhận','Đã xác nhận','Đang chuẩn bị hàng','Đang giao hàng','Đã giao hàng','Đơn hàng đã hủy') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chờ xác nhận',
  `note` text COLLATE utf8mb4_unicode_ci,
  `payment_status` enum('Chưa thanh toán','Đã thanh toán') COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` double NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `fullname`, `phone`, `address`, `email`, `payment`, `status`, `note`, `payment_status`, `total_price`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(88, 'CY7XOC124', 'Vũ Minh Chiến', '0339381785', 'Số 3, Ngách 8, Ngõ 106, Hoàng Quốc Việt, Cầu Giấy, Hà Nội', 'chienvu2k4@gmail.com', 'Thanh toán khi nhận hàng', 'Đang chuẩn bị hàng', NULL, 'Chưa thanh toán', 399000, 1, NULL, '2024-11-29 20:03:48', '2024-11-29 20:03:48'),
(89, 'NNOYRN204', 'ahihi', '0339381785', 'Yên Mô, Ninh Bình', 'chienvmph43391@fpt.edu.vn', 'Thanh toán qua VNPay', 'Đã xác nhận', NULL, 'Đã thanh toán', 149000, 2, NULL, '2024-11-29 20:04:30', '2024-11-29 20:04:30'),
(90, 'EXGZ3W149', 'ahihi', '0339381785', 'Yên  Thắng, Yên Mô, Ninh Bình', 'chienvmph43391@fpt.edu.vn', 'Thanh toán khi nhận hàng', 'Đơn hàng đã hủy', NULL, 'Chưa thanh toán', 898000, 2, NULL, '2024-11-29 21:22:41', '2024-11-29 21:22:41'),
(91, 'XGGSZ3917', 'ahihi', '0339381785', 'Yên  Thắng, Yên Mô, Ninh Bình', 'chienvmph43391@fpt.edu.vn', 'Thanh toán khi nhận hàng', 'Đang giao hàng', NULL, 'Đã thanh toán', 1098000, 2, NULL, '2024-11-29 21:28:41', '2024-11-29 21:36:05'),
(92, 'NIOJLC569', 'ahihi', '0339381785', 'Yên  Thắng, Yên Mô, Ninh Bình', 'chienvmph43391@fpt.edu.vn', 'Thanh toán qua VNPay', 'Đã giao hàng', NULL, 'Đã thanh toán', 399000, 2, NULL, '2024-11-29 21:29:54', '2024-11-29 21:29:54'),
(93, 'M2ESGB757', 'Vũ Minh Chiến', '0339381785', 'Số 3, Ngách 8, Ngõ 106, Hoàng Quốc Việt, Cầu Giấy, Hà Nội', 'chienvu2k4@gmail.com', 'Thanh toán khi nhận hàng', 'Chờ xác nhận', NULL, 'Chưa thanh toán', 149000, 1, NULL, '2024-12-02 20:14:37', '2024-12-02 20:14:37'),
(94, '3Q13FN358', 'Vũ Minh Chiến', '0339381785', 'Số 3, Ngách 8, Ngõ 106, Hoàng Quốc Việt, Cầu Giấy, Hà Nội', 'chienvu2k4@gmail.com', 'Thanh toán qua VNPay', 'Chờ xác nhận', NULL, 'Đã thanh toán', 149000, 1, NULL, '2024-12-02 20:15:36', '2024-12-02 20:15:36'),
(95, '6O4E55961', 'Vũ Minh Chiến', '0339381785', 'Số 3, Ngách 8, Ngõ 106, Hoàng Quốc Việt, Cầu Giấy, Hà Nội', 'chienvu2k4@gmail.com', 'Thanh toán qua VNPay', 'Chờ xác nhận', NULL, 'Đã thanh toán', 149000, 1, NULL, '2024-12-02 20:18:04', '2024-12-02 20:18:04'),
(96, 'QOWVNE421', 'Vũ Minh Chiến', '0339381785', 'Số 3, Ngách 8, Ngõ 106, Hoàng Quốc Việt, Cầu Giấy, Hà Nội', 'chienvu2k4@gmail.com', 'Thanh toán qua VNPay', 'Chờ xác nhận', NULL, 'Đã thanh toán', 599000, 1, NULL, '2024-12-02 20:19:02', '2024-12-02 20:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` bigint UNSIGNED NOT NULL,
  `variant_id` bigint UNSIGNED NOT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `total_price` double(10,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `variant_id`, `price`, `quantity`, `total_price`, `deleted_at`, `created_at`, `updated_at`) VALUES
(88, 44, 399000.00, 1, 399000.00, NULL, '2024-11-29 20:03:48', '2024-11-29 20:03:48'),
(89, 29, 149000.00, 1, 149000.00, NULL, '2024-11-29 20:04:30', '2024-11-29 20:04:30'),
(90, 2, 299000.00, 1, 299000.00, NULL, '2024-11-29 21:22:41', '2024-11-29 21:22:41'),
(90, 38, 599000.00, 1, 599000.00, NULL, '2024-11-29 21:22:41', '2024-11-29 21:22:41'),
(91, 42, 699000.00, 1, 699000.00, NULL, '2024-11-29 21:28:41', '2024-11-29 21:28:41'),
(91, 44, 399000.00, 1, 399000.00, NULL, '2024-11-29 21:28:41', '2024-11-29 21:28:41'),
(92, 44, 399000.00, 1, 399000.00, NULL, '2024-11-29 21:29:54', '2024-11-29 21:29:54'),
(93, 29, 149000.00, 1, 149000.00, NULL, '2024-12-02 20:14:37', '2024-12-02 20:14:37'),
(94, 29, 149000.00, 1, 149000.00, NULL, '2024-12-02 20:15:36', '2024-12-02 20:15:36'),
(95, 29, 149000.00, 1, 149000.00, NULL, '2024-12-02 20:18:04', '2024-12-02 20:18:04'),
(96, 38, 599000.00, 1, 599000.00, NULL, '2024-12-02 20:19:02', '2024-12-02 20:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `points` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `material` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` double NOT NULL DEFAULT '0',
  `status` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `category_id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `slug`, `image`, `description`, `material`, `views`, `status`, `is_active`, `category_id`, `brand_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '8TS25A002', 'Áo phông nam', 'ao-phong-nam', 'uploads/products\\php16F5.tmp', 'Áo phông nam', '57% cotton 38% polyester 5% spandex.', 3, 1, 1, 4, 2, NULL, NULL, NULL),
(2, '8TS24W002', 'Áo phông nam dáng suông in chữ', 'ao-phong-nam-dang-suong-in-chu', 'uploads/products\\inchu.webp', 'Áo phông nam basic dáng regular cổ tròn, có chi tiết đồ họa là điểm nhấn trên sản phẩm.', '60% cotton 40% polyester', 3, 1, 1, 4, 3, NULL, NULL, NULL),
(3, '8OT24W026', 'Áo khoác nỉ nam', 'ao-khoac-ni-nam', 'uploads/products\\8ot24w026-sa026-xl-1-u.webp', 'Áo khoác nỉ nam cổ cao, kéo khóa phía trước, được làm từ chất liệu nỉ cào bông. Chất liệu có khả năng giữ nhiệt, giữ ấm tốt. Áo khoác nam nỉ là loại áo cơ bản được phái mạnh yêu thích khi mùa đông tới không chỉ bởi khả năng giữ ấm mà còn bởi tính thời trang và tiện dụng của nó.\r\nSự kết hợp của 2 thành phần sợi cotton và polyester giúp sản phẩm giữ phom, dáng tốt nhưng vẫn đảm bảo độ xốp và thoáng khí. Màu sắc bền đẹp và độ bền của sản phẩm cao.', '60% cotton 40% polyester.', 52, 1, 1, 5, 3, NULL, NULL, NULL),
(4, '8TW24W012', 'Áo nỉ active nam', 'ao-ni-active-nam', 'uploads/products\\8tw24w012-sk010-1.webp', 'Áo nỉ active nam', '100% polyester.', 6, 1, 1, 5, 4, NULL, NULL, NULL),
(5, '8OT24W017', 'Áo khoác blazer nam', 'ao-khoac-blazer-nam', 'uploads/products\\8ot24w017-sa079-xl-1-u.webp', 'Áo khoác blazer nam', 'Vải chính:100% polyester. Lớp lót: 100% polyester.', 3, 1, 1, 6, 2, NULL, NULL, NULL),
(6, '8TE24W001', 'Áo len nam', 'ao-len-nam', 'uploads/products\\8te24w001-sl146-xl-1-u.webp', 'Áo len nam', 'a', 4, 1, 1, 7, 2, NULL, NULL, NULL),
(7, '6TS25A001', 'Áo phông nữ cổ tròn', 'ao-phong-nu-co-tron', 'uploads/products\\6ts25a001-sn010-m-1-u.webp', 'Áo phông nữ cổ tròn', '57% cotton 38% polyester 5% spandex.', 26, 1, 1, 8, 2, NULL, NULL, NULL),
(8, '6TW24W006', 'Áo nỉ nữ', 'ao-ni-nu', 'uploads/products\\6tw24w006-sa442-m-1-u.webp', 'Áo nỉ nữ cổ tròn dáng rộng, chi tiết đồ họa khớp màu với kẻ nhấn ở bo cổ và tay.', '60% cotton 40% polyester.', 38, 1, 1, 9, 5, NULL, NULL, NULL),
(9, '6LS24W004', 'Bộ mặc nhà nữ in hình', 'bo-mac-nha-nu-in-hinh', 'uploads/products\\6ls24w004-sp327-2.webp', 'Bộ mặc nhà nữ quần họa tiết kẻ phối áo có đồ họa với nhiều chủ đề và dây màu đa dạng tạo nhiều sự lựa chọn cho khách hàng.', 'Áo: 95% cotton 5% spandex. Quần: 100% cotton.', 60, 1, 1, 11, 7, NULL, NULL, NULL),
(10, '8LS24W002', 'Bộ mặc nhà nam', 'bo-mac-nha-nam', 'uploads/products\\8ls24w002-sb001-thumb.webp', 'Bộ quần áo mặc nhà nam phom regular vừa vặn . Nguyên liệu mềm mại mang lại cảm giác thoải mái dễ chịu cho người sử dụng. Có điểm nhấn đồ họa 2 bên tay áo .', '60% cotton 40% polyester.', 32, 1, 1, 5, 4, NULL, NULL, NULL),
(12, '8TE24W009', 'Áo len gilet nam', 'ao-len-gilet-nam', 'uploads/products\\8te24w009-sk327-xl-1-u.webp', 'Áo len gilet nam', '48% acrylic 47% polyester 5% nylon. hoặc 96% acrylic 4% nylon.', 20, 1, 1, 7, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `color_id` bigint UNSIGNED NOT NULL,
  `size_id` bigint UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `sale_price` double DEFAULT NULL,
  `quantity` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `color_id`, `size_id`, `price`, `sale_price`, `quantity`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 12, 1, 299000, NULL, 1, 'uploads/variants/1731484583_xảnheu.webp', NULL, NULL, NULL),
(2, 2, 12, 2, 299000, NULL, 9, 'uploads/variants/1731484610_xảnheu.webp', NULL, NULL, NULL),
(3, 2, 12, 3, 299000, NULL, 1, 'uploads/variants/1731484627_xảnheu.webp', NULL, NULL, NULL),
(4, 2, 1, 1, 299000, NULL, 1, 'uploads/variants/1731484644_inchu.webp', NULL, NULL, NULL),
(5, 2, 1, 2, 299000, NULL, 5, 'uploads/variants/1731484995_inchu.webp', NULL, NULL, NULL),
(6, 2, 1, 3, 299000, NULL, 1, 'uploads/variants/1731485015_inchu.webp', NULL, NULL, NULL),
(7, 1, 9, 1, 149000, NULL, 10, 'uploads/variants/1731486121_phôngnam1.webp', NULL, NULL, NULL),
(8, 1, 9, 2, 149000, NULL, 2, 'uploads/variants/1731486154_1.webp', NULL, NULL, NULL),
(9, 1, 9, 3, 149000, NULL, 5, 'uploads/variants/1731486185_phôngnam1.webp', NULL, NULL, NULL),
(10, 3, 7, 1, 639000, NULL, 1, 'uploads/variants/1731497359_8ot24w026-sa026-xl-1-u.webp', NULL, NULL, NULL),
(11, 3, 7, 2, 639000, NULL, 2, 'uploads/variants/1731497382_8ot24w026-sa026-xl-3.webp', NULL, NULL, NULL),
(12, 3, 7, 4, 639000, NULL, 4, 'uploads/variants/1731497400_8ot24w026-sa026-xl-1-u.webp', NULL, NULL, NULL),
(13, 3, 7, 3, 639000, NULL, 4, 'uploads/variants/1731497492_8ot24w026-sa026-xl-1-u.webp', NULL, NULL, NULL),
(14, 3, 1, 1, 639000, NULL, 4, 'uploads/variants/1731497515_8ot24w026-sk010-xl-1-u.webp', NULL, NULL, NULL),
(15, 3, 1, 2, 639000, NULL, 4, 'uploads/variants/1731497530_8ot24w026-sk010-xl-1-u.webp', NULL, NULL, NULL),
(16, 3, 1, 3, 639000, NULL, 2, 'uploads/variants/1731497549_8ot24w026-sk010-xl-3.webp', NULL, NULL, NULL),
(17, 4, 1, 1, 439000, NULL, 1, 'uploads/variants/1731497661_8tw24w012-sk010-1.webp', NULL, NULL, NULL),
(18, 4, 1, 2, 439000, NULL, 3, 'uploads/variants/1731497689_8tw24w012-sk010-thumb.webp', NULL, NULL, NULL),
(19, 4, 10, 1, 439000, NULL, 4, 'uploads/variants/1731497718_8tw24w012-sb246-2.webp', NULL, NULL, NULL),
(20, 4, 10, 2, 493000, NULL, 4, 'uploads/variants/1731497736_8tw24w012-sb246-2.webp', NULL, NULL, NULL),
(21, 5, 7, 1, 1290000, NULL, 1, 'uploads/variants/1731497872_8ot24w017-sa079-xl-1-u.webp', NULL, NULL, NULL),
(22, 5, 7, 2, 1290000, NULL, 2, 'uploads/variants/1731497894_8ot24w017-sa079-xl-2.webp', NULL, NULL, NULL),
(23, 5, 1, 1, 1290000, NULL, 1, 'uploads/variants/1731497919_8ot24w017-sk010-xl-1-u.webp', NULL, NULL, NULL),
(24, 5, 1, 2, 1290000, NULL, 3, 'uploads/variants/1731497940_8ot24w017-sk010-xl-4.webp', NULL, NULL, NULL),
(25, 6, 10, 1, 349000, NULL, 3, 'uploads/variants/1731498014_8te24w001-sl146-xl-1-u.webp', NULL, NULL, NULL),
(26, 6, 10, 2, 439000, NULL, 12, 'uploads/variants/1731498036_8te24w001-sl146-xl-5.webp', NULL, NULL, NULL),
(27, 6, 12, 1, 349000, NULL, 2, 'uploads/variants/1731498065_8te24w001-sg655-xl-1-u.webp', NULL, NULL, NULL),
(28, 6, 12, 2, 439000, NULL, 4, 'uploads/variants/1731498084_8te24w001-sg655-xl-2.webp', NULL, NULL, NULL),
(29, 7, 6, 1, 149000, NULL, 0, 'uploads/variants/1731498258_6ts25a001-sn010-m-1-u.webp', NULL, NULL, NULL),
(30, 7, 6, 2, 149000, NULL, 2, 'uploads/variants/1731498286_6ts25a001-sn010-m-2.webp', NULL, NULL, NULL),
(31, 7, 6, 3, 149000, NULL, 4, 'uploads/variants/1731498311_6ts25a001-sn010-m-5.webp', NULL, NULL, NULL),
(32, 8, 1, 1, 479000, NULL, 0, 'uploads/variants/1731498533_6tw24w006-sk010-m-1-u.webp', NULL, NULL, NULL),
(33, 8, 1, 2, 479000, NULL, 4, 'uploads/variants/1731498549_6tw24w006-sk010-m-1-u.webp', NULL, NULL, NULL),
(34, 8, 1, 3, 479000, NULL, 1, 'uploads/variants/1731498564_6tw24w006-sk010-m-1-u.webp', NULL, NULL, NULL),
(35, 8, 2, 1, 479000, NULL, 2, 'uploads/variants/1731498596_6tw24w006-sa871-3.webp', NULL, NULL, NULL),
(36, 8, 2, 2, 479000, NULL, 1, 'uploads/variants/1731498610_6tw24w006-sa871-3.webp', NULL, NULL, NULL),
(37, 8, 2, 3, 479000, NULL, 1, 'uploads/variants/1731498623_6tw24w006-sa871-3.webp', NULL, NULL, NULL),
(38, 9, 9, 1, 599000, NULL, 6, 'uploads/variants/1731498720_6ls24w004-se033-thumb.webp', NULL, NULL, NULL),
(39, 9, 9, 2, 599000, NULL, 1, 'uploads/variants/1731498736_6ls24w004-se033-thumb.webp', NULL, NULL, NULL),
(40, 9, 7, 1, 599000, NULL, 1, 'uploads/variants/1731498771_6ls24w004-sa235-3.webp', NULL, NULL, NULL),
(41, 9, 7, 3, 599000, NULL, 2, 'uploads/variants/1731498788_6ls24w004-sa235-3.webp', NULL, NULL, NULL),
(42, 10, 10, 1, 699000, NULL, 0, 'uploads/variants/1731498876_8ls24w002-sb001-thumb.webp', NULL, NULL, NULL),
(43, 10, 10, 2, 699000, NULL, 5, 'uploads/variants/1731498897_8ls24w002-sb001-thumb.webp', NULL, NULL, NULL),
(44, 12, 1, 1, 399000, NULL, 2, 'uploads/variants/1732897929_8te24w009-sk327-xl-2.webp', NULL, NULL, NULL),
(45, 12, 2, 1, 399000, NULL, 5, 'uploads/variants/1732897964_8te24w009-sw371-xl-1-u.webp', NULL, NULL, NULL),
(46, 12, 2, 2, 399000, NULL, 5, 'uploads/variants/1732897999_8te24w009-sw371-xl-2.webp', NULL, NULL, NULL),
(47, 12, 9, 1, 399000, NULL, 5, 'uploads/variants/1732898040_8te24w009-sw371-xl-2.webp', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `shipper_id` bigint UNSIGNED NOT NULL,
  `estimated_delivery_date` date NOT NULL,
  `actual_delivery_date` date DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shippers`
--

CREATE TABLE `shippers` (
  `id` bigint UNSIGNED NOT NULL,
  `fullname` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'S', NULL, NULL, NULL),
(2, 'M', NULL, NULL, NULL),
(3, 'L', NULL, NULL, NULL),
(4, 'XL', NULL, NULL, NULL),
(5, 'XXL', NULL, NULL, NULL),
(6, '3XL', NULL, NULL, NULL),
(7, '4XL', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `fullname` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('member','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `otp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` enum('Nam','Nữ','Khác') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Vietnamese',
  `introduction` text COLLATE utf8mb4_unicode_ci,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `avatar`, `phone`, `address`, `email`, `email_verified_at`, `password`, `role`, `status`, `otp`, `remember_token`, `created_at`, `updated_at`, `gender`, `birthday`, `language`, `introduction`, `google_id`) VALUES
(1, 'Vũ Minh Chiến', 'avatars/1732784814-nui1.jpg', '0339381785', 'số 3 ngách 8 ngõ 106 Hoàng Quốc Việt, Nghĩa Đô, Cầu Giấy, Hà Nội', 'chienvu2k4@gmail.com', NULL, '$2y$10$/zC4rrcC7f8NqDIcj7Si/uEk6ELjqH61wSO5ZSm25RTGQOyUguxue', 'admin', 1, NULL, NULL, '2024-11-13 00:10:25', '2024-12-03 06:48:17', 'Nam', '2004-08-06', 'Vietnamese', NULL, NULL),
(2, 'ahihi', 'avatars/1732936095-images (4).png', '0339381785', 'Yên  Thắng, Yên Mô, Ninh Bình', 'chienvmph43391@fpt.edu.vn', NULL, '$2y$10$SvOf5a/oMM76drxAhy9EN.Mw1lKIj37TD6huott1qgJ7BxkYuuuDC', 'member', 1, NULL, NULL, '2024-11-13 22:23:15', '2024-11-29 20:08:15', 'Nam', '2004-08-06', 'Vietnamese', NULL, NULL),
(3, 'Đẹp trai giai đoạn cuối', 'avatars/1733219112-Phoi-vay-jean-voi-ao-10.jpg', '1234567890', 'Xuân Đỉnh, Hà Nội', 'chiendeptraivodichvutru@gmail.com', NULL, '$2y$10$7FUvzHyYC7RFoRO0c6BEYuTyXh0wK3b3oI9FQEXnW5DncwfgfWnIa', 'member', 1, NULL, NULL, '2024-12-03 02:43:55', '2024-12-03 02:45:12', 'Nam', '2004-08-28', 'Vietnamese', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_category_id_foreign` (`category_id`),
  ADD KEY `blogs_user_id_foreign` (`user_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_variant_id_foreign` (`variant_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_product_id_foreign` (`product_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorite_products_user_id_foreign` (`user_id`),
  ADD KEY `favorite_products_product_id_foreign` (`product_id`);

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
  ADD UNIQUE KEY `orders_code_unique` (`code`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`variant_id`),
  ADD KEY `order_details_variant_id_foreign` (`variant_id`);

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
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_code_unique` (`code`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_galleries_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variants_product_id_foreign` (`product_id`),
  ADD KEY `product_variants_color_id_foreign` (`color_id`),
  ADD KEY `product_variants_size_id_foreign` (`size_id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipments_order_id_foreign` (`order_id`),
  ADD KEY `shipments_shipper_id_foreign` (`shipper_id`);

--
-- Indexes for table `shippers`
--
ALTER TABLE `shippers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_google_id_unique` (`google_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorite_products`
--
ALTER TABLE `favorite_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shippers`
--
ALTER TABLE `shippers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `cart_items_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `product_variants` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD CONSTRAINT `favorite_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorite_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `product_variants` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD CONSTRAINT `product_galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_variants_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);

--
-- Constraints for table `shipments`
--
ALTER TABLE `shipments`
  ADD CONSTRAINT `shipments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `shipments_shipper_id_foreign` FOREIGN KEY (`shipper_id`) REFERENCES `shippers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
