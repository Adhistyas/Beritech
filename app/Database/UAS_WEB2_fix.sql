-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 09, 2026 at 11:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beritech`
--
CREATE DATABASE IF NOT EXISTS `beritech` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `beritech`;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(220) NOT NULL,
  `author` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'published',
  `published_at` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `title`, `slug`, `author`, `content`, `image`, `status`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'Aplikasi Produktivitas yang Membantu Mengatur Aktivitas Sehari-hari', 'aplikasi-produktivitas-yang-membantu-mengatur-aktivitas-sehari-hari', 'Bagas Aditiya', '<p>Di tengah kesibukan sehari-hari, mengatur berbagai aktivitas menjadi tantangan tersendiri. Mulai dari jadwal kuliah, pekerjaan, hingga kegiatan pribadi, semuanya membutuhkan pengelolaan waktu yang baik. Kehadiran aplikasi produktivitas dapat membantu pengguna mengatur berbagai aktivitas tersebut secara lebih terstruktur. <br><br>Aplikasi produktivitas biasanya menyediakan berbagai fitur seperti daftar tugas, kalender, pengingat, serta pencatatan kegiatan. Dengan menggunakan fitur tersebut, pengguna dapat mengetahui pekerjaan apa saja yang harus diselesaikan dan menentukan prioritas berdasarkan tingkat kepentingannya. <br><br>Selain membantu mengatur tugas, aplikasi produktivitas juga dapat membantu pengguna membangun kebiasaan yang lebih teratur. Pengguna dapat mencatat target harian, membuat jadwal mingguan, dan mengevaluasi aktivitas yang telah dilakukan. <br><br>Namun, penggunaan aplikasi produktivitas tetap harus disesuaikan dengan kebutuhan masing-masing. Terlalu banyak menggunakan aplikasi tanpa benar-benar menjalankan daftar tugas justru dapat membuat aktivitas menjadi semakin rumit. <br><br>Pada akhirnya, aplikasi hanyalah sebuah alat bantu. Hasil yang maksimal tetap bergantung pada kedisiplinan pengguna dalam mengatur dan menjalankan aktivitasnya.</p>', '1786239467_309e6968ec2dd5d15a1e.jpeg', 'published', '2026-08-09', '2026-08-09 01:37:47', '2026-08-09 01:37:47'),
(2, 1, 'Perkembangan Smartphone dan Pengaruhnya terhadap Aktivitas Sehari-hari', 'perkembangan-smartphone-dan-pengaruhnya-terhadap-aktivitas-sehari-hari', 'Bagas Aditiya', '<p>Smartphone telah menjadi salah satu perangkat yang tidak dapat dipisahkan dari kehidupan sehari-hari. Tidak hanya digunakan untuk berkomunikasi, smartphone kini memiliki berbagai fungsi yang mendukung aktivitas pengguna, mulai dari bekerja, belajar, mencari informasi, hingga menikmati hiburan.<br><br>Perkembangan teknologi smartphone membuat perangkat ini memiliki kemampuan yang semakin tinggi. Kamera dengan kualitas yang lebih baik, prosesor yang semakin cepat, kapasitas penyimpanan yang besar, serta koneksi internet yang lebih cepat menjadi beberapa fitur yang banyak diperhatikan pengguna.<br><br>Bagi pelajar dan mahasiswa, smartphone juga dapat digunakan sebagai media pembelajaran. Berbagai aplikasi pendidikan, buku digital, video pembelajaran, dan platform diskusi dapat diakses hanya melalui satu perangkat.<br><br>Meskipun memberikan banyak manfaat, penggunaan smartphone juga perlu dilakukan secara bijak. Penggunaan yang berlebihan dapat mengurangi produktivitas dan membuat seseorang terlalu bergantung pada perangkat digital.<br><br>Oleh karena itu, smartphone sebaiknya digunakan sesuai kebutuhan. Dengan penggunaan yang tepat, perangkat ini dapat menjadi alat yang membantu aktivitas sehari-hari sekaligus meningkatkan produktivitas penggunanya.</p>', '1786239540_5bb80f717c7cb9e2e3c6.jpg', 'published', '2026-08-09', '2026-08-09 01:39:00', '2026-08-09 01:39:00'),
(3, 5, 'Mengapa Koneksi Internet yang Stabil Penting untuk Aktivitas Digital?', 'mengapa-koneksi-internet-yang-stabil-penting-untuk-aktivitas-digital', 'Bagas Aditiya', '<p>Internet telah menjadi bagian penting dalam berbagai aktivitas masyarakat modern. Hampir setiap kegiatan digital membutuhkan koneksi internet, mulai dari berkomunikasi, mencari informasi, mengikuti pembelajaran, bekerja, hingga menggunakan layanan digital. <br><br>Kualitas koneksi internet tidak hanya ditentukan oleh kecepatan. Stabilitas jaringan juga memiliki peran penting. Koneksi dengan kecepatan tinggi tetapi sering terputus tentu akan mengganggu aktivitas pengguna. <br><br>Dalam kegiatan pembelajaran daring, misalnya, koneksi yang tidak stabil dapat menyebabkan video terputus atau pengguna tertinggal dalam diskusi. Hal yang sama juga terjadi ketika seseorang melakukan rapat secara daring atau mengakses layanan berbasis cloud. <br><br>Untuk mendapatkan koneksi yang lebih baik, pengguna dapat memperhatikan beberapa hal seperti posisi router, jumlah perangkat yang terhubung, serta kualitas layanan dari penyedia internet. Penggunaan jaringan dengan teknologi yang lebih baru juga dapat memberikan pengalaman yang lebih baik apabila perangkat mendukungnya. <br><br>Dengan semakin banyaknya aktivitas yang bergantung pada internet, kebutuhan terhadap jaringan yang cepat dan stabil akan terus meningkat. Karena itu, pemahaman dasar mengenai jaringan internet menjadi semakin penting bagi pengguna teknologi.</p>', '1786239611_6cda657627334efe8dc1.png', 'published', '2026-08-09', '2026-08-09 01:40:11', '2026-08-09 01:40:11'),
(4, 3, 'Kecerdasan Buatan Semakin Dekat dengan Kehidupan Sehari-hari', 'kecerdasan-buatan-semakin-dekat-dengan-kehidupan-sehari-hari', 'Bagas Aditiya', '<p>Kecerdasan buatan atau Artificial Intelligence (AI) menjadi salah satu teknologi yang berkembang pesat dalam beberapa tahun terakhir. Teknologi ini memungkinkan komputer melakukan berbagai tugas yang sebelumnya membutuhkan kemampuan manusia, seperti memahami bahasa, mengenali gambar, membuat prediksi, dan menghasilkan konten. </p><p><br></p><p>Saat ini, kecerdasan buatan dapat ditemukan dalam berbagai layanan digital. Asisten virtual, sistem rekomendasi film dan musik, penerjemah otomatis, hingga chatbot merupakan beberapa contoh penerapan AI yang sudah digunakan oleh masyarakat. </p><p><br></p><p>Dalam bidang pendidikan, AI dapat membantu siswa dan mahasiswa mencari referensi, memahami materi, serta mendapatkan penjelasan mengenai topik tertentu. Sementara itu, dalam dunia kerja, AI dapat digunakan untuk membantu menganalisis data dan mengotomatiskan pekerjaan yang bersifat berulang. </p><p><br></p><p>Walaupun memberikan banyak manfaat, penggunaan AI juga perlu dilakukan secara bertanggung jawab. Informasi yang dihasilkan oleh AI tetap perlu diperiksa karena tidak selalu benar. Pengguna juga harus memperhatikan keamanan data pribadi ketika menggunakan layanan berbasis kecerdasan buatan. </p><p><br></p><p>Perkembangan AI menunjukkan bahwa teknologi ini akan semakin terintegrasi dengan kehidupan manusia. Kemampuan untuk memahami dan menggunakan AI secara bijak akan menjadi salah satu keterampilan penting di era digital.</p>', '1786240230_f1769dce76b32609157a.jpg', 'published', '2026-08-09', '2026-08-09 01:50:30', '2026-08-09 01:50:30'),
(5, 6, 'Peran Teknologi Digital dalam Perkembangan Penelitian Sains', 'peran-teknologi-digital-dalam-perkembangan-penelitian-sains', 'Bagas Aditiya', '<p>Perkembangan teknologi digital memberikan perubahan besar terhadap dunia penelitian dan ilmu pengetahuan. Berbagai perangkat komputer dan sistem digital memungkinkan peneliti mengolah data dalam jumlah besar dengan lebih cepat dibandingkan metode konvensional. </p><p><br></p><p>Salah satu penerapan teknologi digital dalam sains adalah penggunaan simulasi komputer. Peneliti dapat membuat model untuk mempelajari berbagai fenomena tanpa harus selalu melakukan eksperimen secara langsung. Hal ini dapat membantu menghemat waktu dan sumber daya. </p><p><br></p><p>Selain simulasi, teknologi digital juga membantu proses pengumpulan data. Sensor dan perangkat Internet of Things dapat digunakan untuk mengumpulkan informasi secara otomatis dari lingkungan sekitar. Data tersebut kemudian dapat dianalisis untuk menemukan pola atau hubungan tertentu. </p><p><br></p><p>Kemajuan teknologi penyimpanan data juga membuat hasil penelitian dapat disimpan dan dikelola dengan lebih mudah. Peneliti dari berbagai tempat dapat bekerja sama dengan menggunakan platform digital untuk bertukar data dan hasil penelitian. </p><p><br></p><p>Perpaduan antara ilmu pengetahuan dan teknologi digital membuka banyak peluang baru dalam penelitian. Dengan pengelolaan data yang baik serta penggunaan teknologi secara tepat, proses penelitian dapat menjadi lebih cepat, akurat, dan efisien.</p>', '1786240301_40cd697c160328bd6be1.jpeg', 'published', '2026-08-09', '2026-08-09 01:51:41', '2026-08-09 01:51:41'),
(6, 4, 'Mengapa Startup Teknologi Terus Bermunculan di Era Digital?', 'mengapa-startup-teknologi-terus-bermunculan-di-era-digital', 'Bagas Aditiya', '<p>Perkembangan teknologi digital membuka peluang besar bagi munculnya berbagai perusahaan rintisan atau startup. Banyak startup dibangun dengan tujuan menyelesaikan permasalahan tertentu melalui pemanfaatan teknologi. </p><p><br></p><p>Salah satu alasan startup teknologi dapat berkembang dengan cepat adalah kemudahan dalam menjangkau pengguna. Dengan memanfaatkan internet, sebuah layanan digital dapat digunakan oleh banyak orang tanpa harus membangun kantor atau cabang secara fisik di setiap daerah. </p><p><br></p><p>Startup juga sering mengembangkan produk berdasarkan kebutuhan masyarakat. Contohnya adalah layanan pendidikan digital, perdagangan elektronik, transportasi, keuangan digital, hingga berbagai layanan berbasis aplikasi. </p><p><br></p><p>Namun, membangun startup bukanlah hal yang mudah. Selain memiliki ide yang menarik, sebuah startup membutuhkan tim yang solid, strategi bisnis yang jelas, serta kemampuan memahami kebutuhan pengguna. Persaingan yang tinggi juga membuat perusahaan harus terus melakukan inovasi. </p><p><br></p><p>Keberhasilan sebuah startup tidak hanya ditentukan oleh seberapa canggih teknologinya. Kemampuan menyelesaikan masalah nyata dan memberikan manfaat bagi pengguna menjadi faktor yang sangat penting. </p><p><br></p><p>Dengan semakin berkembangnya ekosistem digital, peluang untuk membangun startup baru masih terbuka luas. Tantangannya adalah bagaimana mengubah sebuah ide menjadi produk yang benar-benar dibutuhkan masyarakat.</p>', '1786240363_d522200a266a7e31b311.webp', 'published', '2026-08-09', '2026-08-09 01:52:43', '2026-08-09 01:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(120) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Gadget', 'gadget', '2026-08-06 20:30:08', '2026-08-06 20:30:08'),
(2, 'Aplikasi & Software', 'aplikasi-software', '2026-08-06 20:30:08', '2026-08-06 20:30:08'),
(3, 'Kecerdasan Buatan', 'kecerdasan-buatan', '2026-08-06 20:30:08', '2026-08-06 20:30:08'),
(4, 'Startup', 'startup', '2026-08-06 20:30:08', '2026-08-06 20:30:08'),
(5, 'Internet & Jaringan', 'internet-jaringan', '2026-08-06 20:30:08', '2026-08-06 20:30:08'),
(6, 'Sains Digital', 'sains-digital', '2026-08-06 20:30:08', '2026-08-06 20:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', 'admin@beritech.com', '$2b$10$k35hhAt78DWgX9m45kMKguzNqG.msmAlNlqAo5n4BsSVvOLGyjS62', '2026-08-06 20:30:08', '2026-08-06 20:30:08');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
