-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2024 at 11:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surveymu`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_kategori`
--

CREATE TABLE `m_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_kategori`
--

INSERT INTO `m_kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'K.1.1 Pendidikan'),
(2, 'K.1.2 Lulusan'),
(3, 'K.1.3 Fasilitas'),
(4, 'K.1.4 Layanan');

-- --------------------------------------------------------

--
-- Table structure for table `m_registrasi`
--

CREATE TABLE `m_registrasi` (
  `fullname` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_survey`
--

CREATE TABLE `m_survey` (
  `survey_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `survey_jenis` enum('Dosen','Tendik','Mahasiswa','Alumni','Ortu','Industri') NOT NULL,
  `survey_kode` varchar(20) DEFAULT NULL,
  `survey_nama` varchar(50) DEFAULT NULL,
  `survey_deskripsi` text DEFAULT NULL,
  `survey_tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_survey`
--

INSERT INTO `m_survey` (`survey_id`, `user_id`, `survey_jenis`, `survey_kode`, `survey_nama`, `survey_deskripsi`, `survey_tanggal`) VALUES
(22, 30, 'Tendik', NULL, NULL, NULL, '2024-06-03 16:03:13'),
(23, 33, 'Mahasiswa', NULL, NULL, NULL, '2024-06-03 18:54:52'),
(24, 34, 'Mahasiswa', NULL, NULL, NULL, '2024-06-03 19:02:08'),
(25, 35, 'Mahasiswa', NULL, NULL, NULL, '2024-06-03 19:06:30'),
(26, 36, 'Mahasiswa', NULL, NULL, NULL, '2024-06-03 19:10:26'),
(27, 37, 'Mahasiswa', NULL, NULL, NULL, '2024-06-03 19:13:29'),
(28, 38, 'Dosen', NULL, NULL, NULL, '2024-06-03 19:16:46'),
(29, 39, 'Dosen', NULL, NULL, NULL, '2024-06-03 19:18:05'),
(30, 40, 'Dosen', NULL, NULL, NULL, '2024-06-03 19:19:09'),
(31, 41, 'Dosen', NULL, NULL, NULL, '2024-06-03 19:20:12'),
(32, 42, 'Dosen', NULL, NULL, NULL, '2024-06-03 19:21:17'),
(33, 48, 'Alumni', NULL, NULL, NULL, '2024-06-03 19:22:37'),
(34, 49, 'Alumni', NULL, NULL, NULL, '2024-06-03 19:24:35'),
(35, 64, 'Alumni', NULL, NULL, NULL, '2024-06-03 19:26:54'),
(36, 65, 'Alumni', NULL, NULL, NULL, '2024-06-03 19:31:08'),
(37, 66, 'Alumni', NULL, NULL, NULL, '2024-06-03 19:33:30'),
(38, 67, 'Ortu', NULL, NULL, NULL, '2024-06-03 19:35:55'),
(39, 68, 'Ortu', NULL, NULL, NULL, '2024-06-03 19:38:12'),
(40, 69, 'Ortu', NULL, NULL, NULL, '2024-06-03 19:39:41'),
(41, 70, 'Ortu', NULL, NULL, NULL, '2024-06-03 19:41:25'),
(42, 71, 'Ortu', NULL, NULL, NULL, '2024-06-03 19:42:58'),
(43, 43, 'Tendik', NULL, NULL, NULL, '2024-06-03 19:45:38'),
(44, 44, 'Tendik', NULL, NULL, NULL, '2024-06-03 19:47:28'),
(45, 75, 'Tendik', NULL, NULL, NULL, '2024-06-03 19:49:09'),
(46, 76, 'Tendik', NULL, NULL, NULL, '2024-06-03 19:51:06'),
(47, 77, 'Tendik', NULL, NULL, NULL, '2024-06-03 19:53:14'),
(48, 78, 'Industri', NULL, NULL, NULL, '2024-06-03 19:58:20'),
(49, 81, 'Industri', NULL, NULL, NULL, '2024-06-03 19:59:24'),
(50, 82, 'Industri', NULL, NULL, NULL, '2024-06-03 20:00:21'),
(51, 83, 'Industri', NULL, NULL, NULL, '2024-06-03 20:01:20'),
(52, 84, 'Industri', NULL, NULL, NULL, '2024-06-03 20:02:21'),
(53, 50, 'Industri', NULL, NULL, NULL, '2024-06-04 05:43:09'),
(55, 51, 'Industri', NULL, NULL, NULL, '2024-06-18 10:58:35'),
(56, 88, 'Mahasiswa', NULL, NULL, NULL, '2024-06-18 10:59:14');

-- --------------------------------------------------------

--
-- Table structure for table `m_survey_soal`
--

CREATE TABLE `m_survey_soal` (
  `soal_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `no_urut` int(5) DEFAULT NULL,
  `soal_jenis` enum('Pilihan','Text') NOT NULL,
  `soal_nama` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_survey_soal`
--

INSERT INTO `m_survey_soal` (`soal_id`, `kategori_id`, `no_urut`, `soal_jenis`, `soal_nama`) VALUES
(38, 1, 1, 'Pilihan', 'Dosen Memberikan silabus mata kuliah diawal perkuliahan'),
(39, 1, 2, 'Pilihan', 'Dosen mengajar mata kuliah sesuai dengan kompetensi'),
(40, 1, 3, 'Pilihan', 'Dosen memulai perkuliahan tepat waktu'),
(41, 1, 4, 'Pilihan', 'Dosen memberi kesempatan mahasiswa untuk berdiskusi tentang materi yang diajarkan'),
(42, 1, 5, 'Pilihan', 'Dalam mengajar, dosen menggunakan materi kuliah dengan referensi terkini'),
(43, 1, 6, 'Pilihan', 'Dosen memberikan tugas pada setiap materi yang dibahas dan tugas tersebut bermakna dan meningkatkan kompetensi mahasiswa '),
(44, 1, 7, 'Pilihan', 'Jadwal kuliah mudah diakses dan dilaksanakan dengan tepat\r\n'),
(45, 1, 8, 'Pilihan', 'jumlah dosen yang menggunakan e-learning lebih dari 75%\r\n'),
(46, 1, 9, 'Pilihan', 'Komponen penilaian yang diberikan oleh dosen mencakup : tugas harian,UTS,dan tugas lainnya'),
(47, 1, 10, 'Pilihan', 'Dosen berpenampilan rapi ketika mengajar'),
(49, 4, 1, 'Pilihan', 'Seberapa puas Anda dengan kualitas layanan akademik yang disediakan oleh perguruan tinggi ini\r\n'),
(50, 4, 2, 'Pilihan', 'Seberapa puas Anda dengan ketersediaan dan layanan fasilitas kampus (perpustakaan, laboratorium, ruang belajar, dll.)\r\n'),
(51, 4, 3, 'Pilihan', 'Seberapa puas anda dengan respon dan bantuan dari staf administrasi dalam menangani pertanyaan atau masalah Anda\r\n'),
(52, 4, 4, 'Pilihan', ' Seberapa memadai fasilitas teknologi informasi (Wi-Fi, sistem manajemen pembelajaran, dll.) yang tersedia di kampus\r\n'),
(53, 4, 1, 'Pilihan', 'seberapa puas anda dengan kebersihan dan kenyamanan lingkungan kampus\r\n'),
(54, 4, 6, 'Pilihan', 'Seberapa efektif layanan bimbingan akademik dan konseling yang disediakan oleh perguruan tinggi ini\r\n'),
(55, 4, 7, 'Pilihan', 'Seberapa baik perguruan tinggi ini menyediakan kesempatan untuk kegiatan organisasi dan pengembangan diri\r\n'),
(56, 4, 8, 'Pilihan', 'Seberapa puas Anda dengan layanan kesehatan dan keselamatan yang disediakan di kampus (Poliklinik)\r\n'),
(57, 4, 10, 'Pilihan', 'Seberapa efektif komunikasi antara mahasiswa dan pihak perguruan tinggi (dosen, administrasi, dll.)\r\n'),
(58, 4, 9, 'Pilihan', 'Seberapa puas anda dengan layanan keamanan di perguruan tinggi ini'),
(60, 3, 1, 'Pilihan', 'Seberapa puas anda dengan kondisi ruang kelas Perguruan Tinggi ini?\r\n'),
(61, 3, 1, 'Pilihan', 'Seberapa puas fasilitas perpustakaan (koleksi buku, ruang baca, akses ke jurnal elektronik, dll.) yang tersedia di kampus\r\n'),
(62, 3, 3, 'Pilihan', 'Seberapa puas kualitas fasilitas laboraturium di kampus ini (computer, peralatan, bahan, dll)\r\n'),
(63, 3, 4, 'Pilihan', 'Seberapa puas fasilitas teknologi informasi seperti Wi-Fi, komputer, dan perangkat lunak yang tersedia di kampus?\r\n'),
(64, 3, 5, 'Pilihan', 'Seberapa puas fasilitas olahraga (lapangan, peralatan, dll.) yang disediakan oleh perguruan tinggi ini\r\n'),
(65, 3, 6, 'Pilihan', ' Seberapa puas anda dengan ketersediaan dan kondisi fasilitas parkir di kampus\r\n'),
(66, 3, 7, 'Pilihan', 'Seberapa puas anda dengan fasilitas kamar mandi?\r\n'),
(67, 3, 8, 'Pilihan', ' Seberapa paus anda dengan kualitas fasilitas bimbingan di perguruan tinggi ini, termasuk ketersediaan fasilitas, kualitas bimbingan\r\n'),
(68, 3, 9, 'Pilihan', 'Seberapa puas anda dengan fasilitas AC di setiap ruang kelas?\r\n'),
(69, 3, 10, 'Pilihan', 'Seberapa puas anda dengan fasilitas Kesehatan?'),
(70, 2, 1, 'Pilihan', ' Berapa skor yang anda berikan untuk keterampilan dan keahlian yang dimiliki lulusan Polinema\r\n'),
(71, 2, 2, 'Pilihan', 'Berapa skor yang Anda berikan untuk kualitas soft skill yang dimiliki lulusan setelah lulus dari Polinema\r\n'),
(72, 2, 4, 'Pilihan', 'Berapa skor yang Anda berikan untuk kualitas pengalaman kerja yang dimiliki lulusan setelah lulus dari Polinema\r\n'),
(73, 2, 5, 'Pilihan', ' Berapa skor yang Anda berikan untuk kualitas program alumni yang dimiliki setelah lulus dari Polinema\r\n'),
(74, 2, 6, 'Pilihan', ' Berapa skor yang Anda berikan untuk kemampuan lulusan Polinema dalam bekerja secara tim dan kolaborasi?\r\n'),
(75, 2, 7, 'Pilihan', ' Berapa skor yang Anda berikan untuk kemampuan lulusan Polinema dalam berpikir kritis dan memecahkan masalah?\r\n'),
(76, 2, 8, 'Pilihan', ' Berapa skor yang Anda berikan untuk kemampuan lulusan Polinema dalam beradaptasi dengan teknologi dan alat-alat terbaru di bidang mereka?'),
(77, 2, 9, 'Pilihan', 'Berapa skor yang Anda berikan untuk kesiapan lulusan Polinema dalam memasuki dunia kerja profesional?\r\n'),
(78, 2, 10, 'Pilihan', ' Berapa skor yang Anda berikan untuk kemampuan lulusan Polinema dalam komunikasi lisan dan tulisan?');

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`user_id`, `username`, `nama`, `password`, `role`) VALUES
(30, 'admin', 'admin', '$2y$10$Sfrs4Nf5NH5SS.zT3.dBqOz1DdVSa0IMt8sNRVXuH9ILaK3MABcoq', '1'),
(33, 'mahasiswa1', 'mahasiswa1', '$2y$10$rYbnQSSeA59DjRaRnQ8/nu7VvZDDR7tP4g6aGOaZ1vMfFO.vtt1bK', '2'),
(34, 'mahasiswa2', 'mahasiswa2', '$2y$10$gcUj72b0ga/xqI1r4s8KB.kV2au/yEEzMR8K1FKBsWbZMvbTyK12C', '2'),
(35, 'mahasiswa3', 'mahasiswa3', '$2y$10$97.gskzByXaQxO9aa72W1.dF6qJnDHIAbbSmPbveFhCEpmACHq.ee', '2'),
(36, 'mahasiswa4', 'mahasiswa4', '$2y$10$A1CxHX./O68v6/3SAyaFbOqYmW5Ag98bQruB41SxYFO1DE6TmPx8y', '2'),
(37, 'mahasiswa5', 'mahasiswa5', '$2y$10$PtDpIWLgTtUOL9wmN0mme.XAgZU/1ylXkj7OECBj6eVozy8xtcq2G', '2'),
(38, 'dosen1', 'dosen1', '$2y$10$0P5nHs6EM5AcWTNu8BeOiutnw.zVDTR880LKtZNNYOWzW2niGU3N6', '2'),
(39, 'dosen2', 'dosen2', '$2y$10$OLr/KTbJyKEE/l.qj.xkqe4W06RbUf4x1Hm8GEWtlmg5kgNn6T4qO', '2'),
(40, 'dosen3', 'dosen3', '$2y$10$MpH4UsnfH3cpAR5LP7GP4.RnblH8RINjHRWWnqWhdgSWLJNTbcowq', '2'),
(41, 'dosen4', 'dosen4', '$2y$10$G2YZHUL1YMCnDMoj7szNcOs1EnZmMb919KKuzchfHysFZy4XKdBo6', '2'),
(42, 'dosen5', 'dosen5', '$2y$10$lLX7V7pLWKNeD.Whb6mzXu0vtJd0XI1dKBG5jFiLFLu3cI9oBh4Qi', '2'),
(43, 'tendik1', 'tendik1', '$2y$10$g8Q2OfF0jkFcpMzVWBVXEuSNmjn0sPp.zUphKG9MzeqKo5uvykVl2', '2'),
(44, 'tendik2', 'tendik2', '$2y$10$k7F.fwo82XfvyY9hQO/vqO7gklB8B3H77hniaPC3pNzQqeozsgvfK', '2'),
(45, 'orangtua1', 'orangtua1', '$2y$10$yfur/umxmQkR2h4f8KiqM.nbUf88PuA/vciGhsD1qBy9Gc2GbhxT.', '2'),
(46, 'orangtua2', 'orangtua2', '$2y$10$pMQGxPqJkl5w4tC.fiRTeu0yf7RrWM4FiQhfj5jUZX4IQMfDXx7c2', '2'),
(47, 'orangtua3', 'orangtua3', '$2y$10$VXSOJM9IQLJfCgsJYksITe/I9.wopwNSPacChSy0gryKVs.wQWfUK', '2'),
(48, 'alumni1', 'alumni1', '$2y$10$NoLjuGkiF1cVYJVXGKNeEuLrVAQcx/0TI/qTPx8c5eH4rVJkFvJki', '2'),
(49, 'alumni2', 'alumni2', '$2y$10$0PfaGShlI/MeTtHqDgyNOeawdNZRWk7JIsDyGIvKJlALvGpLmQpOy', '2'),
(50, 'industri1', 'industri1', '$2y$10$KNgL0jjaH2s3GYfJUFFFWu0S4DKzlnQfUH8rxrZmXj7nqhKPtHU1S', '2'),
(51, 'industri2', 'industri2', '$2y$10$aQvddBQLNs5CuMzvu0zO3OHvZAMo0OQEJ8A22UWkUbY1i2rGN9T86', '2'),
(52, 'mahasiswa1', 'mahasiswa1', '$2y$10$JN664b0i7WS3JXBaSdCrteuomT1yfFwxL8pPWu8DC1tyoltHxGXA.', ''),
(53, 'mahasiswa2', 'mahasiswa2', '$2y$10$YjfCSmmKxCGTANcShymxl.8/sykgKJxV5H8LoCKtT/m2R4wFNhS5u', ''),
(54, 'mahasiswa3', 'mahasiswa3', '$2y$10$C..9i6jB1a086H1NDXJhLuPN5gtyJd5riyttfAMD0qGssIq5z5/qC', ''),
(55, 'mahasiswa4', 'mahasiswa4', '$2y$10$snG0Xn.aWGeAy1WJ6N5cW.S/udQnBGW5xpUhh3IeOrPSIJDb56Wge', ''),
(56, 'mahasiswa5', 'mahasiswa5', '$2y$10$6KDgmOcuZptZxrXatvyhLODtUUi7PG/aBV7jt4pXRcTPvfEA.HYt6', ''),
(57, 'dosen1', 'dosen1', '$2y$10$gHjRMVvKH7I.LQ5CAPDk6OCW2PDjMM.Y4cAMPunbNCxc3yr7p.ijO', ''),
(58, 'dosen2', 'dosen2', '$2y$10$E02AttCw5nRlTSce5cSWPuirOLKbS9o6SvpLwUyFbWZ5V6QI81yam', ''),
(59, 'dosen3', 'dosen3', '$2y$10$VQIqwi8ihxMP/zWwjruqGepJIs5mQSXCSAkUolmo.XP6y7R.60x1W', ''),
(60, 'dosen4', 'dosen4', '$2y$10$DKMxNoqbRr6VN/ZvZto7l.b9aXKA8ZxpgvPE7dxRh/Q5oxOf2P2BG', ''),
(61, 'dosen5', 'dosen5', '$2y$10$HMDcpoKBuGk686gt0GgSSOH5HCNTHDAq2E0gEEx3qzpwhlEIBTKV.', ''),
(62, 'alumni1', 'alumni1', '$2y$10$GJHy4J2Tm8JHEuj3WB8N1u1NuBGgRHCa2hBWSh6c49jAk6AqGNwm2', ''),
(63, 'alumni2', 'alumni2', '$2y$10$tqnIl4F2br2TxRdpoionsuiKZyB6oH94DmjXYIx0YR7qSRKVyvG1S', ''),
(64, 'alumni3', 'alumni3', '$2y$10$wcx4RXIY1XnfpYK3zP9Jwerd2L.s7.2b4za5AiVyxdZD.cnG8xcKy', ''),
(65, 'alumni4', 'alumni4', '$2y$10$LiAVn3XxLh/H2E4KKGSYy.8N1EX9w.Pecmt9L2bDqRTq7Zwo1rbem', ''),
(66, 'alumni5', 'alumni5', '$2y$10$y9lHfdYezaVZ1R.a8BibIOZa/i6MAG.QUCPgnpYO52Sx21LGydJBS', ''),
(67, 'ortu1', 'ortu1', '$2y$10$zdhp229XCmT948ZLSIsHLO1OoWHHpgWg9q386eXHN0yALASKWGdNG', ''),
(68, 'ortu2', 'ortu2', '$2y$10$f.aczJvby/WK13yCYjp/aOtAKKXj4oGkzJI.B79bcFj5HVUbxWyve', ''),
(69, 'ortu3', 'ortu3', '$2y$10$OD.4QIcQLcPCffYyvCMQj.08c28Nxxcau5WRt.28C9hl8RbrpVOoa', ''),
(70, 'ortu4', 'ortu4', '$2y$10$HwLGDu/8Bf0cGr8h.vHsp.7wBcuxKfAOS0tdqTrwHN8An/iJrlRkK', ''),
(71, 'ortu5', 'ortu5', '$2y$10$4KHm0mlWgrv1.bTPr/ZQl.VwiXdhXOBVYMw1aXmEVPluUymaVWE0C', ''),
(72, 'tendik1', 'tendik1', '$2y$10$045zCC6BFa1paLK63qiqBONrpRWIDuBAhlegd0DWWaEeGQe.541vW', ''),
(73, 'tendik1', 'tendik1', '$2y$10$rZfwtcC7OMy7.68bHWPJ4.GJ2KtmVwV1BGiaDQSmLBKle02G7VwfG', ''),
(74, 'tendik2', 'tendik2', '$2y$10$6QD6JujGAFY8TqCbTpycduCCfpk6AwNxfqLEDqmCxaWBAmK0znam.', ''),
(75, 'tendik3', 'tendik3', '$2y$10$4pVOMf.xsNT5BQs1/swYpeMiw21NRrt9lVujLYrfHhxB.2DcLKH9G', ''),
(76, 'tendik4', 'tendik4', '$2y$10$lUFHS2xgMUeYDkV1OUvtN.pS7h3bIrtCTDLEy8jTUxq0fVwU4DzrO', ''),
(77, 'tendik5', 'tendik5', '$2y$10$gCRxGQhJBFColbSApE/Msevfdcr1fj8XqgTx4ss6NIYWisXSS84DO', ''),
(78, 'mitra1', 'mitra1', '$2y$10$Uve4vbV1576CgQ5tNQJNceZYUhysk4hXzEUlLA8auHFKV6WRX/hDu', ''),
(79, 'mitra', 'mitra', '$2y$10$ISobPn6q.2SGlU/F8vvznew71./m3uTPW/oTY8ehTkoJez92FriMK', ''),
(80, 'mitra1', 'mitra1', '$2y$10$TMkVK/HXCkuQ1vHLWqf.UOGYOgosl1gAYoCt7HxdsWFSi2sDX7pIe', ''),
(81, 'mitra2', 'mitra2', '$2y$10$jegrljbA3dD78HjM3r2uw.weCYn8pvqx63A947svdMDCkpNd2S/D2', ''),
(82, 'mitra3', 'mitra3', '$2y$10$EwPNSqSQMYUzP7FgGrIt1ez5OI5uYybnWeLWZFDi2JoAT4O3BkJ4C', ''),
(83, 'mitra4', 'mitra4', '$2y$10$j46fhoU0qQVe2ygns1SuRelyD3SxARlYcyfrtXIewSt0OFtdVRoJC', ''),
(84, 'mitra5', 'mitra5', '$2y$10$Z2ZY0/lAYnpFO4CuSYRCqOVrVSUbDAym.7vV6bGSys6fljOBKE2xO', ''),
(87, 'industri2', 'industri2', '$2y$10$8.G5oV3r15l3U7vVeU9N3uZjHortCKM3KdLlZKZs2YfY9ljhIBbJ2', ''),
(88, 'siswa1', 'siswa1', '$2y$10$ZpMEgJiOauHor3iNeXnjYOQ06Ntli.7pJfcPTrwtneEQ2Pj6McQDq', ''),
(91, 'manyu', 'abi mu', '$2y$10$5qGFXYERmMhs3of3SuHh6uKJuO2zCLaBViOy1kXg9scUOOAHRR.2i', '2'),
(92, 'diki', 'diki', '$2y$10$qIa1fbfYuDWFey.sXvYiUOb/TUWjNmBEXKlibmzhb.d9toeZrkx6.', ''),
(93, 'diki', 'diki', '$2y$10$YLkJui2VHvaRSUy2kMwQ/eMAIN27BW7vtjabAKQHMu4CD/EPOIISm', ''),
(94, 'aaa', 'aaa', '$2y$10$/HQ0.LPtPyc/SLDBBlrw7e41ZKtfYK7uPox3DOHj4V.AkKpYx7f4i', ''),
(95, 'dicky', 'dicky', '$2y$10$ijeet2Yo8/OZ8r8MtisGEe2hbov9bwZAxWbpAHdhbMwLaZ961wv.S', '');

-- --------------------------------------------------------

--
-- Table structure for table `rekap_fasilitas`
--

CREATE TABLE `rekap_fasilitas` (
  `jawaban_fasilitas_mahasiswa` int(11) DEFAULT NULL,
  `jawaban_fasilitas_alumni` int(11) DEFAULT NULL,
  `jawaban_fasilitas_dosen` int(11) DEFAULT NULL,
  `jawaban_fasilitas_tendik` int(11) DEFAULT NULL,
  `jawaban_fasilitas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekap_lulusan`
--

CREATE TABLE `rekap_lulusan` (
  `jawaban_lulusan_industri` int(11) DEFAULT NULL,
  `jawaban_lulusan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekap_pelayanan`
--

CREATE TABLE `rekap_pelayanan` (
  `jawaban_pelayanan_mahasiswa` int(11) DEFAULT NULL,
  `jawaban_pelayanan_alumni` int(11) DEFAULT NULL,
  `jawaban_pelayanan_dosen` int(11) DEFAULT NULL,
  `jawaban_pelayanan_tendik` int(11) DEFAULT NULL,
  `jawaban_pelayanan_ortu` int(11) DEFAULT NULL,
  `jawaban_pelayanan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekap_pendidikan`
--

CREATE TABLE `rekap_pendidikan` (
  `jawaban_pendidikan_mahasiswa` int(11) DEFAULT NULL,
  `jawaban_pendidikan_alumni` int(11) DEFAULT NULL,
  `jawaban_pendidikan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_jawaban_alumni`
--

CREATE TABLE `t_jawaban_alumni` (
  `jawaban_alumni_id` int(11) NOT NULL,
  `responden_alumni_id` int(11) DEFAULT NULL,
  `soal_id` int(11) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_jawaban_alumni`
--

INSERT INTO `t_jawaban_alumni` (`jawaban_alumni_id`, `responden_alumni_id`, `soal_id`, `jawaban`) VALUES
(1, 1, 38, 'Tidak Setuju'),
(2, 1, 39, 'Setuju'),
(3, 1, 40, 'Setuju'),
(4, 1, 41, 'Tidak Setuju'),
(5, 1, 42, 'Sangat Setuju'),
(6, 1, 43, 'Sangat Setuju'),
(7, 1, 44, 'Setuju'),
(8, 1, 45, 'Setuju'),
(9, 1, 46, 'Sangat Setuju'),
(10, 1, 47, 'Sangat Setuju'),
(11, 1, 70, 'Setuju'),
(12, 1, 71, 'Setuju'),
(13, 1, 72, 'Setuju'),
(14, 1, 73, 'Setuju'),
(15, 1, 74, 'Sangat Setuju'),
(16, 1, 75, 'Tidak Setuju'),
(17, 1, 76, 'Setuju'),
(18, 1, 77, 'Setuju'),
(19, 1, 78, 'Setuju'),
(20, 1, 60, 'Tidak Setuju'),
(21, 1, 61, 'Setuju'),
(22, 1, 62, 'Sangat Tidak Setuju'),
(23, 1, 63, 'Sangat Setuju'),
(24, 1, 64, 'Sangat Setuju'),
(25, 1, 65, 'Setuju'),
(26, 1, 66, 'Setuju'),
(27, 1, 67, 'Setuju'),
(28, 1, 68, 'Sangat Setuju'),
(29, 1, 69, 'Setuju'),
(30, 1, 49, 'Setuju'),
(31, 1, 53, 'Sangat Setuju'),
(32, 1, 50, 'Setuju'),
(33, 1, 51, 'Tidak Setuju'),
(34, 1, 52, 'Setuju'),
(35, 1, 54, 'Setuju'),
(36, 1, 55, 'Sangat Setuju'),
(37, 1, 56, 'Tidak Setuju'),
(38, 1, 58, 'Setuju'),
(39, 1, 57, 'Sangat Setuju'),
(40, 2, 38, 'Sangat Setuju'),
(41, 2, 39, 'Sangat Setuju'),
(42, 2, 40, 'Setuju'),
(43, 2, 41, 'Setuju'),
(44, 2, 42, 'Setuju'),
(45, 2, 43, 'Setuju'),
(46, 2, 44, 'Sangat Setuju'),
(47, 2, 45, 'Sangat Setuju'),
(48, 2, 46, 'Setuju'),
(49, 2, 47, 'Sangat Setuju'),
(50, 2, 70, 'Setuju'),
(51, 2, 71, 'Setuju'),
(52, 2, 72, 'Sangat Setuju'),
(53, 2, 73, 'Setuju'),
(54, 2, 74, 'Setuju'),
(55, 2, 75, 'Setuju'),
(56, 2, 76, 'Setuju'),
(57, 2, 77, 'Setuju'),
(58, 2, 78, 'Setuju'),
(59, 2, 60, 'Setuju'),
(60, 2, 61, 'Setuju'),
(61, 2, 62, 'Tidak Setuju'),
(62, 2, 63, 'Setuju'),
(63, 2, 64, 'Setuju'),
(64, 2, 65, 'Sangat Setuju'),
(65, 2, 66, 'Sangat Tidak Setuju'),
(66, 2, 67, 'Setuju'),
(67, 2, 68, 'Setuju'),
(68, 2, 69, 'Setuju'),
(69, 2, 49, 'Sangat Setuju'),
(70, 2, 53, 'Sangat Setuju'),
(71, 2, 50, 'Setuju'),
(72, 2, 51, 'Setuju'),
(73, 2, 52, 'Sangat Setuju'),
(74, 2, 54, 'Setuju'),
(75, 2, 55, 'Setuju'),
(76, 2, 56, 'Sangat Setuju'),
(77, 2, 58, 'Setuju'),
(78, 2, 57, 'Setuju'),
(79, 3, 38, 'Setuju'),
(80, 3, 39, 'Setuju'),
(81, 3, 40, 'Sangat Setuju'),
(82, 3, 41, 'Sangat Setuju'),
(83, 3, 42, 'Sangat Setuju'),
(84, 3, 43, 'Setuju'),
(85, 3, 44, 'Sangat Setuju'),
(86, 3, 45, 'Setuju'),
(87, 3, 46, 'Setuju'),
(88, 3, 47, 'Setuju'),
(89, 3, 70, 'Sangat Setuju'),
(90, 3, 71, 'Setuju'),
(91, 3, 72, 'Setuju'),
(92, 3, 73, 'Setuju'),
(93, 3, 74, 'Sangat Setuju'),
(94, 3, 75, 'Setuju'),
(95, 3, 76, 'Setuju'),
(96, 3, 77, 'Setuju'),
(97, 3, 78, 'Setuju'),
(98, 3, 60, 'Sangat Setuju'),
(99, 3, 61, 'Sangat Setuju'),
(100, 3, 62, 'Setuju'),
(101, 3, 63, 'Setuju'),
(102, 3, 64, 'Setuju'),
(103, 3, 65, 'Sangat Setuju'),
(104, 3, 66, 'Tidak Setuju'),
(105, 3, 67, 'Setuju'),
(106, 3, 68, 'Setuju'),
(107, 3, 69, 'Setuju'),
(108, 3, 49, 'Setuju'),
(109, 3, 53, 'Setuju'),
(110, 3, 50, 'Setuju'),
(111, 3, 51, 'Sangat Setuju'),
(112, 3, 52, 'Setuju'),
(113, 3, 54, 'Tidak Setuju'),
(114, 3, 55, 'Setuju'),
(115, 3, 56, 'Sangat Setuju'),
(116, 3, 58, 'Setuju'),
(117, 3, 57, 'Setuju'),
(118, 4, 38, 'Setuju'),
(119, 4, 39, 'Tidak Setuju'),
(120, 4, 40, 'Setuju'),
(121, 4, 41, 'Sangat Setuju'),
(122, 4, 42, 'Sangat Setuju'),
(123, 4, 43, 'Setuju'),
(124, 4, 44, 'Setuju'),
(125, 4, 45, 'Tidak Setuju'),
(126, 4, 46, 'Setuju'),
(127, 4, 47, 'Setuju'),
(128, 4, 70, 'Sangat Setuju'),
(129, 4, 71, 'Sangat Setuju'),
(130, 4, 72, 'Setuju'),
(131, 4, 73, 'Setuju'),
(132, 4, 74, 'Setuju'),
(133, 4, 75, 'Setuju'),
(134, 4, 76, 'Setuju'),
(135, 4, 77, 'Sangat Setuju'),
(136, 4, 78, 'Setuju'),
(137, 4, 60, 'Sangat Setuju'),
(138, 4, 61, 'Setuju'),
(139, 4, 62, 'Sangat Setuju'),
(140, 4, 63, 'Setuju'),
(141, 4, 64, 'Setuju'),
(142, 4, 65, 'Setuju'),
(143, 4, 66, 'Sangat Setuju'),
(144, 4, 67, 'Setuju'),
(145, 4, 68, 'Tidak Setuju'),
(146, 4, 69, 'Tidak Setuju'),
(147, 4, 49, 'Setuju'),
(148, 4, 53, 'Setuju'),
(149, 4, 50, 'Sangat Setuju'),
(150, 4, 51, 'Setuju'),
(151, 4, 52, 'Tidak Setuju'),
(152, 4, 54, 'Setuju'),
(153, 4, 55, 'Sangat Setuju'),
(154, 4, 56, 'Setuju'),
(155, 4, 58, 'Setuju'),
(156, 4, 57, 'Setuju'),
(157, 5, 38, 'Sangat Setuju'),
(158, 5, 39, 'Sangat Setuju'),
(159, 5, 40, 'Setuju'),
(160, 5, 41, 'Setuju'),
(161, 5, 42, 'Setuju'),
(162, 5, 43, 'Setuju'),
(163, 5, 44, 'Setuju'),
(164, 5, 45, 'Setuju'),
(165, 5, 46, 'Sangat Setuju'),
(166, 5, 47, 'Setuju'),
(167, 5, 70, 'Setuju'),
(168, 5, 71, 'Setuju'),
(169, 5, 72, 'Sangat Setuju'),
(170, 5, 73, 'Setuju'),
(171, 5, 74, 'Setuju'),
(172, 5, 75, 'Setuju'),
(173, 5, 76, 'Setuju'),
(174, 5, 77, 'Sangat Setuju'),
(175, 5, 78, 'Sangat Setuju'),
(176, 5, 60, 'Sangat Setuju'),
(177, 5, 61, 'Sangat Setuju'),
(178, 5, 62, 'Setuju'),
(179, 5, 63, 'Setuju'),
(180, 5, 64, 'Setuju'),
(181, 5, 65, 'Setuju'),
(182, 5, 66, 'Sangat Tidak Setuju'),
(183, 5, 67, 'Setuju'),
(184, 5, 68, 'Setuju'),
(185, 5, 69, 'Setuju'),
(186, 5, 49, 'Setuju'),
(187, 5, 53, 'Setuju'),
(188, 5, 50, 'Tidak Setuju'),
(189, 5, 51, 'Sangat Setuju'),
(190, 5, 52, 'Setuju'),
(191, 5, 54, 'Setuju'),
(192, 5, 55, 'Sangat Setuju'),
(193, 5, 56, 'Setuju'),
(194, 5, 58, 'Tidak Setuju'),
(195, 5, 57, 'Setuju');

-- --------------------------------------------------------

--
-- Table structure for table `t_jawaban_dosen`
--

CREATE TABLE `t_jawaban_dosen` (
  `jawaban_dosen_id` int(11) NOT NULL,
  `responden_dosen_id` int(11) DEFAULT NULL,
  `soal_id` int(11) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_jawaban_dosen`
--

INSERT INTO `t_jawaban_dosen` (`jawaban_dosen_id`, `responden_dosen_id`, `soal_id`, `jawaban`) VALUES
(10, 6, 38, 'Sangat Setuju'),
(11, 6, 39, 'Sangat Setuju'),
(12, 6, 40, 'Sangat Setuju'),
(13, 6, 41, 'Sangat Setuju'),
(14, 6, 42, 'Sangat Setuju'),
(15, 6, 43, 'Sangat Setuju'),
(16, 6, 44, 'Sangat Setuju'),
(17, 6, 45, 'Sangat Setuju'),
(18, 6, 46, 'Sangat Setuju'),
(19, 6, 47, 'Sangat Setuju'),
(20, 6, 70, 'Setuju'),
(21, 6, 71, 'Sangat Setuju'),
(22, 6, 72, 'Setuju'),
(23, 6, 73, 'Sangat Setuju'),
(24, 6, 74, 'Sangat Setuju'),
(25, 6, 75, 'Setuju'),
(26, 6, 76, 'Sangat Setuju'),
(27, 6, 77, 'Sangat Setuju'),
(28, 6, 78, 'Setuju'),
(29, 7, 38, 'Setuju'),
(30, 7, 39, 'Setuju'),
(31, 7, 40, 'Setuju'),
(32, 7, 41, 'Setuju'),
(33, 7, 42, 'Sangat Setuju'),
(34, 7, 43, 'Sangat Setuju'),
(35, 7, 44, 'Sangat Setuju'),
(36, 7, 45, 'Sangat Setuju'),
(37, 7, 46, 'Sangat Setuju'),
(38, 7, 47, 'Sangat Setuju'),
(39, 7, 70, 'Setuju'),
(40, 7, 71, 'Setuju'),
(41, 7, 72, 'Setuju'),
(42, 7, 73, 'Sangat Setuju'),
(43, 7, 74, 'Sangat Setuju'),
(44, 7, 75, 'Sangat Setuju'),
(45, 7, 76, 'Setuju'),
(46, 7, 77, 'Setuju'),
(47, 7, 78, 'Setuju'),
(48, 8, 38, 'Setuju'),
(49, 8, 39, 'Setuju'),
(50, 8, 40, 'Sangat Setuju'),
(51, 8, 41, 'Setuju'),
(52, 8, 42, 'Setuju'),
(53, 8, 43, 'Sangat Setuju'),
(54, 8, 44, 'Sangat Setuju'),
(55, 8, 45, 'Setuju'),
(56, 8, 46, 'Setuju'),
(57, 8, 47, 'Setuju'),
(58, 8, 70, 'Sangat Setuju'),
(59, 8, 71, 'Sangat Setuju'),
(60, 8, 72, 'Setuju'),
(61, 8, 73, 'Setuju'),
(62, 8, 74, 'Setuju'),
(63, 8, 75, 'Sangat Setuju'),
(64, 8, 76, 'Sangat Setuju'),
(65, 8, 77, 'Setuju'),
(66, 8, 78, 'Sangat Setuju'),
(67, 9, 38, 'Sangat Setuju'),
(68, 9, 39, 'Setuju'),
(69, 9, 40, 'Sangat Setuju'),
(70, 9, 41, 'Setuju'),
(71, 9, 42, 'Setuju'),
(72, 9, 43, 'Setuju'),
(73, 9, 44, 'Setuju'),
(74, 9, 45, 'Sangat Setuju'),
(75, 9, 46, 'Setuju'),
(76, 9, 47, 'Setuju'),
(77, 9, 70, 'Setuju'),
(78, 9, 71, 'Setuju'),
(79, 9, 72, 'Setuju'),
(80, 9, 73, 'Setuju'),
(81, 9, 74, 'Sangat Setuju'),
(82, 9, 75, 'Setuju'),
(83, 9, 76, 'Setuju'),
(84, 9, 77, 'Setuju'),
(85, 9, 78, 'Setuju'),
(86, 10, 38, 'Setuju'),
(87, 10, 39, 'Setuju'),
(88, 10, 40, 'Setuju'),
(89, 10, 41, 'Sangat Setuju'),
(90, 10, 42, 'Sangat Setuju'),
(91, 10, 43, 'Setuju'),
(92, 10, 44, 'Sangat Setuju'),
(93, 10, 45, 'Setuju'),
(94, 10, 46, 'Setuju'),
(95, 10, 47, 'Sangat Setuju'),
(96, 10, 70, 'Sangat Setuju'),
(97, 10, 71, 'Sangat Setuju'),
(98, 10, 72, 'Setuju'),
(99, 10, 73, 'Setuju'),
(100, 10, 74, 'Setuju'),
(101, 10, 75, 'Sangat Setuju'),
(102, 10, 76, 'Setuju'),
(103, 10, 77, 'Setuju'),
(104, 10, 78, 'Setuju');

-- --------------------------------------------------------

--
-- Table structure for table `t_jawaban_industri`
--

CREATE TABLE `t_jawaban_industri` (
  `jawaban_industri_id` int(11) NOT NULL,
  `responden_industri_id` int(11) DEFAULT NULL,
  `soal_id` int(11) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_jawaban_industri`
--

INSERT INTO `t_jawaban_industri` (`jawaban_industri_id`, `responden_industri_id`, `soal_id`, `jawaban`) VALUES
(1, 2, 38, 'Sangat Setuju'),
(2, 2, 39, 'Sangat Setuju'),
(3, 2, 40, 'Setuju'),
(4, 2, 41, 'Sangat Setuju'),
(5, 2, 42, 'Sangat Setuju'),
(6, 2, 43, 'Setuju'),
(7, 2, 44, 'Setuju'),
(8, 2, 45, 'Sangat Setuju'),
(9, 2, 46, 'Sangat Setuju'),
(10, 2, 47, 'Sangat Setuju'),
(11, 3, 38, 'Setuju'),
(12, 3, 39, 'Setuju'),
(13, 3, 40, 'Setuju'),
(14, 3, 41, 'Setuju'),
(15, 3, 42, 'Setuju'),
(16, 3, 43, 'Setuju'),
(17, 3, 44, 'Setuju'),
(18, 3, 45, 'Setuju'),
(19, 3, 46, 'Sangat Setuju'),
(20, 3, 47, 'Sangat Setuju'),
(21, 4, 38, 'Setuju'),
(22, 4, 39, 'Setuju'),
(23, 4, 40, 'Sangat Setuju'),
(24, 4, 41, 'Setuju'),
(25, 4, 42, 'Setuju'),
(26, 4, 43, 'Sangat Setuju'),
(27, 4, 44, 'Sangat Setuju'),
(28, 4, 45, 'Tidak Setuju'),
(29, 4, 46, 'Setuju'),
(30, 4, 47, 'Setuju'),
(31, 5, 38, 'Sangat Setuju'),
(32, 5, 39, 'Sangat Setuju'),
(33, 5, 40, 'Setuju'),
(34, 5, 41, 'Setuju'),
(35, 5, 42, 'Setuju'),
(36, 5, 43, 'Sangat Setuju'),
(37, 5, 44, 'Sangat Setuju'),
(38, 5, 45, 'Sangat Setuju'),
(39, 5, 46, 'Sangat Setuju'),
(40, 5, 47, 'Sangat Setuju'),
(41, 6, 38, 'Setuju'),
(42, 6, 39, 'Setuju'),
(43, 6, 40, 'Sangat Setuju'),
(44, 6, 41, 'Sangat Setuju'),
(45, 6, 42, 'Setuju'),
(46, 6, 43, 'Setuju'),
(47, 6, 44, 'Setuju'),
(48, 6, 45, 'Setuju'),
(49, 6, 46, 'Sangat Setuju'),
(50, 6, 47, 'Setuju');

-- --------------------------------------------------------

--
-- Table structure for table `t_jawaban_mahasiswa`
--

CREATE TABLE `t_jawaban_mahasiswa` (
  `jawaban_mahasiswa_id` int(11) NOT NULL,
  `responden_mahasiswa_id` int(11) DEFAULT NULL,
  `soal_id` int(11) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_jawaban_mahasiswa`
--

INSERT INTO `t_jawaban_mahasiswa` (`jawaban_mahasiswa_id`, `responden_mahasiswa_id`, `soal_id`, `jawaban`) VALUES
(57, 8, 38, 'Setuju'),
(58, 8, 39, 'Setuju'),
(59, 8, 40, 'Setuju'),
(60, 8, 41, 'Setuju'),
(61, 8, 42, 'Setuju'),
(62, 8, 43, 'Setuju'),
(63, 8, 44, 'Setuju'),
(64, 8, 45, 'Setuju'),
(65, 8, 46, 'Setuju'),
(66, 8, 47, 'Setuju'),
(67, 8, 70, 'Setuju'),
(68, 8, 71, 'Setuju'),
(69, 8, 72, 'Setuju'),
(70, 8, 73, 'Setuju'),
(71, 8, 74, 'Setuju'),
(72, 8, 75, 'Setuju'),
(73, 8, 76, 'Setuju'),
(74, 8, 77, 'Setuju'),
(75, 8, 78, 'Sangat Setuju'),
(76, 8, 60, 'Setuju'),
(77, 8, 61, 'Setuju'),
(78, 8, 62, 'Setuju'),
(79, 8, 63, 'Tidak Setuju'),
(80, 8, 64, 'Setuju'),
(81, 8, 65, 'Setuju'),
(82, 8, 66, 'Tidak Setuju'),
(83, 8, 67, 'Setuju'),
(84, 8, 68, 'Tidak Setuju'),
(85, 8, 69, 'Setuju'),
(86, 8, 49, 'Setuju'),
(87, 8, 53, 'Setuju'),
(88, 8, 50, 'Setuju'),
(89, 8, 51, 'Setuju'),
(90, 8, 52, 'Setuju'),
(91, 8, 54, 'Sangat Setuju'),
(92, 8, 55, 'Sangat Setuju'),
(93, 8, 56, 'Setuju'),
(94, 8, 58, 'Tidak Setuju'),
(95, 8, 57, 'Setuju'),
(96, 9, 38, 'Tidak Setuju'),
(97, 9, 39, 'Setuju'),
(98, 9, 40, 'Setuju'),
(99, 9, 41, 'Sangat Setuju'),
(100, 9, 42, 'Setuju'),
(101, 9, 43, 'Setuju'),
(102, 9, 44, 'Tidak Setuju'),
(103, 9, 45, 'Tidak Setuju'),
(104, 9, 46, 'Tidak Setuju'),
(105, 9, 47, 'Setuju'),
(106, 9, 70, 'Tidak Setuju'),
(107, 9, 71, 'Tidak Setuju'),
(108, 9, 72, 'Setuju'),
(109, 9, 73, 'Sangat Setuju'),
(110, 9, 74, 'Sangat Setuju'),
(111, 9, 75, 'Setuju'),
(112, 9, 76, 'Setuju'),
(113, 9, 77, 'Sangat Setuju'),
(114, 9, 78, 'Setuju'),
(115, 9, 60, 'Tidak Setuju'),
(116, 9, 61, 'Setuju'),
(117, 9, 62, 'Sangat Setuju'),
(118, 9, 63, 'Setuju'),
(119, 9, 64, 'Setuju'),
(120, 9, 65, 'Tidak Setuju'),
(121, 9, 66, 'Setuju'),
(122, 9, 67, 'Sangat Setuju'),
(123, 9, 68, 'Setuju'),
(124, 9, 69, 'Setuju'),
(125, 9, 49, 'Setuju'),
(126, 9, 53, 'Setuju'),
(127, 9, 50, 'Tidak Setuju'),
(128, 9, 51, 'Setuju'),
(129, 9, 52, 'Setuju'),
(130, 9, 54, 'Setuju'),
(131, 9, 55, 'Sangat Setuju'),
(132, 9, 56, 'Sangat Setuju'),
(133, 9, 58, 'Sangat Setuju'),
(134, 9, 57, 'Setuju'),
(135, 10, 38, 'Sangat Setuju'),
(136, 10, 39, 'Sangat Setuju'),
(137, 10, 40, 'Setuju'),
(138, 10, 41, 'Setuju'),
(139, 10, 42, 'Setuju'),
(140, 10, 43, 'Tidak Setuju'),
(141, 10, 44, 'Setuju'),
(142, 10, 45, 'Setuju'),
(143, 10, 46, 'Tidak Setuju'),
(144, 10, 47, 'Setuju'),
(145, 10, 70, 'Setuju'),
(146, 10, 71, 'Setuju'),
(147, 10, 72, 'Setuju'),
(148, 10, 73, 'Sangat Setuju'),
(149, 10, 74, 'Setuju'),
(150, 10, 75, 'Setuju'),
(151, 10, 76, 'Sangat Setuju'),
(152, 10, 77, 'Setuju'),
(153, 10, 78, 'Setuju'),
(154, 10, 60, 'Setuju'),
(155, 10, 61, 'Setuju'),
(156, 10, 62, 'Sangat Setuju'),
(157, 10, 63, 'Tidak Setuju'),
(158, 10, 64, 'Setuju'),
(159, 10, 65, 'Setuju'),
(160, 10, 66, 'Sangat Setuju'),
(161, 10, 67, 'Sangat Setuju'),
(162, 10, 68, 'Setuju'),
(163, 10, 69, 'Setuju'),
(164, 10, 49, 'Setuju'),
(165, 10, 53, 'Setuju'),
(166, 10, 50, 'Setuju'),
(167, 10, 51, 'Sangat Setuju'),
(168, 10, 52, 'Setuju'),
(169, 10, 54, 'Setuju'),
(170, 10, 55, 'Setuju'),
(171, 10, 56, 'Tidak Setuju'),
(172, 10, 58, 'Setuju'),
(173, 10, 57, 'Sangat Setuju'),
(174, 11, 38, 'Sangat Setuju'),
(175, 11, 39, 'Sangat Setuju'),
(176, 11, 40, 'Setuju'),
(177, 11, 41, 'Setuju'),
(178, 11, 42, 'Sangat Setuju'),
(179, 11, 43, 'Setuju'),
(180, 11, 44, 'Sangat Setuju'),
(181, 11, 45, 'Setuju'),
(182, 11, 46, 'Setuju'),
(183, 11, 47, 'Setuju'),
(184, 11, 70, 'Setuju'),
(185, 11, 71, 'Setuju'),
(186, 11, 72, 'Setuju'),
(187, 11, 73, 'Sangat Setuju'),
(188, 11, 74, 'Setuju'),
(189, 11, 75, 'Sangat Setuju'),
(190, 11, 76, 'Setuju'),
(191, 11, 77, 'Setuju'),
(192, 11, 78, 'Setuju'),
(193, 11, 60, 'Setuju'),
(194, 11, 61, 'Sangat Setuju'),
(195, 11, 62, 'Sangat Setuju'),
(196, 11, 63, 'Sangat Setuju'),
(197, 11, 64, 'Setuju'),
(198, 11, 65, 'Setuju'),
(199, 11, 66, 'Sangat Tidak Setuju'),
(200, 11, 67, 'Setuju'),
(201, 11, 68, 'Tidak Setuju'),
(202, 11, 69, 'Setuju'),
(203, 11, 49, 'Setuju'),
(204, 11, 53, 'Setuju'),
(205, 11, 50, 'Setuju'),
(206, 11, 51, 'Sangat Setuju'),
(207, 11, 52, 'Setuju'),
(208, 11, 54, 'Setuju'),
(209, 11, 55, 'Setuju'),
(210, 11, 56, 'Sangat Setuju'),
(211, 11, 58, 'Setuju'),
(212, 11, 57, 'Setuju'),
(213, 12, 38, 'Sangat Setuju'),
(214, 12, 39, 'Sangat Setuju'),
(215, 12, 40, 'Setuju'),
(216, 12, 41, 'Setuju'),
(217, 12, 42, 'Sangat Setuju'),
(218, 12, 43, 'Setuju'),
(219, 12, 44, 'Setuju'),
(220, 12, 45, 'Setuju'),
(221, 12, 46, 'Sangat Setuju'),
(222, 12, 47, 'Setuju'),
(223, 12, 70, 'Setuju'),
(224, 12, 71, 'Setuju'),
(225, 12, 72, 'Sangat Setuju'),
(226, 12, 73, 'Sangat Setuju'),
(227, 12, 74, 'Sangat Setuju'),
(228, 12, 75, 'Setuju'),
(229, 12, 76, 'Setuju'),
(230, 12, 77, 'Setuju'),
(231, 12, 78, 'Setuju'),
(232, 12, 60, 'Setuju'),
(233, 12, 61, 'Setuju'),
(234, 12, 62, 'Sangat Setuju'),
(235, 12, 63, 'Sangat Setuju'),
(236, 12, 64, 'Setuju'),
(237, 12, 65, 'Tidak Setuju'),
(238, 12, 66, 'Setuju'),
(239, 12, 67, 'Sangat Setuju'),
(240, 12, 68, 'Sangat Setuju'),
(241, 12, 69, 'Setuju'),
(242, 12, 49, 'Setuju'),
(243, 12, 53, 'Setuju'),
(244, 12, 50, 'Setuju'),
(245, 12, 51, 'Sangat Setuju'),
(246, 12, 52, 'Tidak Setuju'),
(247, 12, 54, 'Setuju'),
(248, 12, 55, 'Setuju'),
(249, 12, 56, 'Sangat Setuju'),
(250, 12, 58, 'Sangat Setuju'),
(251, 12, 57, 'Setuju'),
(252, 13, 38, 'Sangat Setuju'),
(253, 13, 39, 'Sangat Setuju'),
(254, 13, 40, 'Sangat Setuju'),
(255, 13, 41, 'Sangat Setuju'),
(256, 13, 42, 'Setuju'),
(257, 13, 43, 'Setuju'),
(258, 13, 44, 'Setuju'),
(259, 13, 45, 'Setuju'),
(260, 13, 46, 'Setuju'),
(261, 13, 47, 'Setuju');

-- --------------------------------------------------------

--
-- Table structure for table `t_jawaban_ortu`
--

CREATE TABLE `t_jawaban_ortu` (
  `jawaban_ortu_id` int(11) NOT NULL,
  `responden_ortu_id` int(11) DEFAULT NULL,
  `soal_id` int(11) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_jawaban_tendik`
--

CREATE TABLE `t_jawaban_tendik` (
  `jawaban_tendik_id` int(11) NOT NULL,
  `responden_tendik_id` int(11) DEFAULT NULL,
  `soal_id` int(11) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_jawaban_tendik`
--

INSERT INTO `t_jawaban_tendik` (`jawaban_tendik_id`, `responden_tendik_id`, `soal_id`, `jawaban`) VALUES
(138, 4, 38, 'Setuju'),
(139, 4, 39, 'Setuju'),
(140, 4, 40, 'Sangat Setuju'),
(141, 4, 41, 'Sangat Setuju'),
(142, 4, 42, 'Setuju'),
(143, 4, 43, 'Setuju'),
(144, 4, 44, 'Setuju'),
(145, 4, 45, 'Sangat Setuju'),
(146, 4, 46, 'Setuju'),
(147, 4, 47, 'Setuju'),
(148, 4, 70, 'Sangat Setuju'),
(149, 4, 71, 'Sangat Setuju'),
(150, 4, 72, 'Setuju'),
(151, 4, 73, 'Setuju'),
(152, 4, 74, 'Setuju'),
(153, 4, 75, 'Setuju'),
(154, 4, 76, 'Sangat Setuju'),
(155, 4, 77, 'Setuju'),
(156, 4, 78, 'Setuju'),
(157, 4, 60, 'Tidak Setuju'),
(158, 4, 61, 'Setuju'),
(159, 4, 62, 'Setuju'),
(160, 4, 63, 'Setuju'),
(161, 4, 64, 'Sangat Setuju'),
(162, 4, 65, 'Setuju'),
(163, 4, 66, 'Setuju'),
(164, 4, 67, 'Setuju'),
(165, 4, 68, 'Sangat Setuju'),
(166, 4, 69, 'Setuju'),
(167, 4, 49, 'Sangat Setuju'),
(168, 4, 53, 'Sangat Setuju'),
(169, 4, 50, 'Setuju'),
(170, 4, 51, 'Tidak Setuju'),
(171, 4, 52, 'Setuju'),
(172, 4, 54, 'Setuju'),
(173, 4, 55, 'Setuju'),
(174, 4, 56, 'Setuju'),
(175, 4, 58, 'Setuju'),
(176, 4, 57, 'Setuju'),
(177, 5, 38, 'Tidak Setuju'),
(178, 5, 39, 'Setuju'),
(179, 5, 40, 'Setuju'),
(180, 5, 41, 'Sangat Setuju'),
(181, 5, 42, 'Sangat Setuju'),
(182, 5, 43, 'Setuju'),
(183, 5, 44, 'Setuju'),
(184, 5, 45, 'Setuju'),
(185, 5, 46, 'Setuju'),
(186, 5, 47, 'Setuju'),
(187, 5, 70, 'Sangat Setuju'),
(188, 5, 71, 'Sangat Setuju'),
(189, 5, 72, 'Setuju'),
(190, 5, 73, 'Setuju'),
(191, 5, 74, 'Setuju'),
(192, 5, 75, 'Setuju'),
(193, 5, 76, 'Sangat Setuju'),
(194, 5, 77, 'Setuju'),
(195, 5, 78, 'Setuju'),
(196, 5, 60, 'Setuju'),
(197, 5, 61, 'Setuju'),
(198, 5, 62, 'Setuju'),
(199, 5, 63, 'Sangat Setuju'),
(200, 5, 64, 'Setuju'),
(201, 5, 65, 'Setuju'),
(202, 5, 66, 'Sangat Setuju'),
(203, 5, 67, 'Setuju'),
(204, 5, 68, 'Setuju'),
(205, 5, 69, 'Setuju'),
(206, 5, 49, 'Setuju'),
(207, 5, 53, 'Setuju'),
(208, 5, 50, 'Sangat Setuju'),
(209, 5, 51, 'Setuju'),
(210, 5, 52, 'Setuju'),
(211, 5, 54, 'Setuju'),
(212, 5, 55, 'Sangat Setuju'),
(213, 5, 56, 'Sangat Setuju'),
(214, 5, 58, 'Sangat Setuju'),
(215, 5, 57, 'Setuju'),
(216, 6, 38, 'Setuju'),
(217, 6, 39, 'Setuju'),
(218, 6, 40, 'Sangat Setuju'),
(219, 6, 41, 'Setuju'),
(220, 6, 42, 'Setuju'),
(221, 6, 43, 'Setuju'),
(222, 6, 44, 'Sangat Setuju'),
(223, 6, 45, 'Setuju'),
(224, 6, 46, 'Setuju'),
(225, 6, 47, 'Setuju'),
(226, 6, 70, 'Setuju'),
(227, 6, 71, 'Sangat Setuju'),
(228, 6, 72, 'Setuju'),
(229, 6, 73, 'Setuju'),
(230, 6, 74, 'Setuju'),
(231, 6, 75, 'Setuju'),
(232, 6, 76, 'Sangat Setuju'),
(233, 6, 77, 'Setuju'),
(234, 6, 78, 'Setuju'),
(235, 6, 60, 'Setuju'),
(236, 6, 61, 'Setuju'),
(237, 6, 62, 'Setuju'),
(238, 6, 63, 'Tidak Setuju'),
(239, 6, 64, 'Sangat Tidak Setuju'),
(240, 6, 65, 'Setuju'),
(241, 6, 66, 'Setuju'),
(242, 6, 67, 'Setuju'),
(243, 6, 68, 'Setuju'),
(244, 6, 69, 'Setuju'),
(245, 6, 49, 'Sangat Setuju'),
(246, 6, 53, 'Sangat Setuju'),
(247, 6, 50, 'Setuju'),
(248, 6, 51, 'Setuju'),
(249, 6, 52, 'Setuju'),
(250, 6, 54, 'Setuju'),
(251, 6, 55, 'Sangat Setuju'),
(252, 6, 56, 'Setuju'),
(253, 6, 58, 'Setuju'),
(254, 6, 57, 'Setuju'),
(255, 7, 38, 'Sangat Setuju'),
(256, 7, 39, 'Sangat Setuju'),
(257, 7, 40, 'Setuju'),
(258, 7, 41, 'Setuju'),
(259, 7, 42, 'Sangat Setuju'),
(260, 7, 43, 'Setuju'),
(261, 7, 44, 'Setuju'),
(262, 7, 45, 'Tidak Setuju'),
(263, 7, 46, 'Setuju'),
(264, 7, 47, 'Setuju'),
(265, 7, 70, 'Setuju'),
(266, 7, 71, 'Sangat Setuju'),
(267, 7, 72, 'Setuju'),
(268, 7, 73, 'Setuju'),
(269, 7, 74, 'Setuju'),
(270, 7, 75, 'Sangat Setuju'),
(271, 7, 76, 'Setuju'),
(272, 7, 77, 'Setuju'),
(273, 7, 78, 'Sangat Setuju'),
(274, 7, 60, 'Setuju'),
(275, 7, 61, 'Setuju'),
(276, 7, 62, 'Tidak Setuju'),
(277, 7, 63, 'Setuju'),
(278, 7, 64, 'Setuju'),
(279, 7, 65, 'Tidak Setuju'),
(280, 7, 66, 'Setuju'),
(281, 7, 67, 'Setuju'),
(282, 7, 68, 'Setuju'),
(283, 7, 69, 'Tidak Setuju'),
(284, 7, 49, 'Sangat Setuju'),
(285, 7, 53, 'Setuju'),
(286, 7, 50, 'Setuju'),
(287, 7, 51, 'Tidak Setuju'),
(288, 7, 52, 'Setuju'),
(289, 7, 54, 'Setuju'),
(290, 7, 55, 'Setuju'),
(291, 7, 56, 'Setuju'),
(292, 7, 58, 'Setuju'),
(293, 7, 57, 'Sangat Setuju'),
(294, 8, 38, 'Tidak Setuju'),
(295, 8, 39, 'Setuju'),
(296, 8, 40, 'Setuju'),
(297, 8, 41, 'Sangat Setuju'),
(298, 8, 42, 'Sangat Setuju'),
(299, 8, 43, 'Setuju'),
(300, 8, 44, 'Sangat Setuju'),
(301, 8, 45, 'Setuju'),
(302, 8, 46, 'Setuju'),
(303, 8, 47, 'Setuju'),
(304, 8, 70, 'Sangat Setuju'),
(305, 8, 71, 'Sangat Setuju'),
(306, 8, 72, 'Sangat Setuju'),
(307, 8, 73, 'Setuju'),
(308, 8, 74, 'Setuju'),
(309, 8, 75, 'Setuju'),
(310, 8, 76, 'Setuju'),
(311, 8, 77, 'Sangat Setuju'),
(312, 8, 78, 'Sangat Setuju'),
(313, 8, 60, 'Setuju'),
(314, 8, 61, 'Tidak Setuju'),
(315, 8, 62, 'Tidak Setuju'),
(316, 8, 63, 'Setuju'),
(317, 8, 64, 'Sangat Setuju'),
(318, 8, 65, 'Sangat Setuju'),
(319, 8, 66, 'Setuju'),
(320, 8, 67, 'Setuju'),
(321, 8, 68, 'Setuju'),
(322, 8, 69, 'Sangat Setuju'),
(323, 8, 49, 'Setuju'),
(324, 8, 53, 'Sangat Setuju'),
(325, 8, 50, 'Sangat Setuju'),
(326, 8, 51, 'Setuju'),
(327, 8, 52, 'Setuju'),
(328, 8, 54, 'Setuju'),
(329, 8, 55, 'Setuju'),
(330, 8, 56, 'Setuju'),
(331, 8, 58, 'Setuju'),
(332, 8, 57, 'Setuju');

-- --------------------------------------------------------

--
-- Table structure for table `t_reponden_dosen`
--

CREATE TABLE `t_reponden_dosen` (
  `responden_dosen_id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `responden_tanggal` datetime DEFAULT NULL,
  `responden_nip` varchar(20) DEFAULT NULL,
  `responden_nama` varchar(50) DEFAULT NULL,
  `responden_unit` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_reponden_dosen`
--

INSERT INTO `t_reponden_dosen` (`responden_dosen_id`, `survey_id`, `responden_tanggal`, `responden_nip`, `responden_nama`, `responden_unit`) VALUES
(6, 28, NULL, '123', 'dosen1', '1'),
(7, 29, NULL, '123', 'dosen2', '2'),
(8, 30, NULL, '123', 'dosen3', '3'),
(9, 31, NULL, '124', 'dosen4', '4'),
(10, 32, NULL, '787', 'dosen5', '5');

-- --------------------------------------------------------

--
-- Table structure for table `t_reponden_mahasiswa`
--

CREATE TABLE `t_reponden_mahasiswa` (
  `responden_mahasiswa_id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `responden_tanggal` datetime DEFAULT NULL,
  `responden_nim` varchar(20) DEFAULT NULL,
  `responden_nama` varchar(50) DEFAULT NULL,
  `responden_prodi` varchar(100) DEFAULT NULL,
  `responden_email` varchar(100) DEFAULT NULL,
  `responden_hp` varchar(20) DEFAULT NULL,
  `tahun_masuk` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_reponden_mahasiswa`
--

INSERT INTO `t_reponden_mahasiswa` (`responden_mahasiswa_id`, `survey_id`, `responden_tanggal`, `responden_nim`, `responden_nama`, `responden_prodi`, `responden_email`, `responden_hp`, `tahun_masuk`) VALUES
(8, 23, '2024-06-03 18:55:31', '123', 'mahasiswa1', 'sib', '-', '08xx', '2022'),
(9, 24, '2024-06-03 19:03:44', '123', 'mahasiswa2', 'sib', '-', '08xx', '2021'),
(10, 25, '2024-06-03 19:06:52', '123', 'mahasiswa3', 'sib', '-', '08xx', '2023'),
(11, 26, '2024-06-03 19:10:44', '123', 'mahasiswa4', 'ti', '-', '08xx', '2023'),
(12, 27, '2024-06-03 19:13:57', '123', 'mahasiswa5', 'tekkim', '-', '08xx', '2023'),
(13, 56, '2024-06-18 11:03:24', '224', 'siswa1', 'TI', '123', '235', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `t_reponden_tendik`
--

CREATE TABLE `t_reponden_tendik` (
  `responden_tendik_id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `responden_tanggal` datetime DEFAULT NULL,
  `responden_nopeg` varchar(20) DEFAULT NULL,
  `responden_nama` varchar(50) DEFAULT NULL,
  `responden_unit` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_reponden_tendik`
--

INSERT INTO `t_reponden_tendik` (`responden_tendik_id`, `survey_id`, `responden_tanggal`, `responden_nopeg`, `responden_nama`, `responden_unit`) VALUES
(3, 22, NULL, '', '', ''),
(4, 43, NULL, '1', 'ani', '1'),
(5, 44, NULL, '2', 'Yoga', '3'),
(6, 45, NULL, '666', 'Anas', '6'),
(7, 46, NULL, '4', 'Kandayy', '8'),
(8, 47, NULL, '9', 'Zaki', '7');

-- --------------------------------------------------------

--
-- Table structure for table `t_responden_alumni`
--

CREATE TABLE `t_responden_alumni` (
  `responden_alumni_id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `responden_tanggal` datetime DEFAULT NULL,
  `responden_nim` varchar(20) DEFAULT NULL,
  `responden_nama` varchar(50) DEFAULT NULL,
  `responden_prodi` varchar(100) DEFAULT NULL,
  `responden_email` varchar(100) DEFAULT NULL,
  `responden_hp` varchar(20) DEFAULT NULL,
  `tahun_lulus` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_responden_alumni`
--

INSERT INTO `t_responden_alumni` (`responden_alumni_id`, `survey_id`, `responden_tanggal`, `responden_nim`, `responden_nama`, `responden_prodi`, `responden_email`, `responden_hp`, `tahun_lulus`) VALUES
(1, 33, '2024-06-03 19:22:59', '123', 'alumni1', 'tekkim', '-', '08xx', '2015'),
(2, 34, '2024-06-03 19:25:04', '133', 'alumni2', 'an', '-', '08xx', '2017'),
(3, 35, '2024-06-03 19:27:59', '555', 'alumni3', 'bhs ingg', '-', '08xx', '2019'),
(4, 36, '2024-06-03 19:31:31', '888', 'alumni4', 'mesin', '-', '08xx', '2019'),
(5, 37, '2024-06-03 19:33:51', '787', 'alumni5', 'sipil', '-', '08xx', '2009');

-- --------------------------------------------------------

--
-- Table structure for table `t_responden_industri`
--

CREATE TABLE `t_responden_industri` (
  `responden_industri_id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `responden_tanggal` datetime DEFAULT NULL,
  `responden_nama` varchar(50) DEFAULT NULL,
  `responden_jabatan` varchar(50) DEFAULT NULL,
  `responden_perusahaan` varchar(50) DEFAULT NULL,
  `responden_email` varchar(100) DEFAULT NULL,
  `responden_hp` varchar(20) DEFAULT NULL,
  `responden_kota` varbinary(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_responden_industri`
--

INSERT INTO `t_responden_industri` (`responden_industri_id`, `survey_id`, `responden_tanggal`, `responden_nama`, `responden_jabatan`, `responden_perusahaan`, `responden_email`, `responden_hp`, `responden_kota`) VALUES
(2, 48, NULL, 'Haja', 'Direktur', 'PT x', NULL, NULL, 0x5375726162617961),
(3, 49, NULL, 'Kayla', 'Manager', 'PT x', NULL, NULL, 0x4d616c616e67),
(4, 50, NULL, 'Cahaya', 'Staff', 'PT x', NULL, NULL, 0x7061707561),
(5, 51, NULL, 'Tyooo', 'Karyawan', 'Pt X', NULL, NULL, 0x4a6f676a61),
(6, 52, NULL, 'Wahidddd', 'CEO', 'PT x', NULL, NULL, 0x42616e74656e),
(7, 53, NULL, 'eee', 'qqq', 'qqq', NULL, NULL, 0x77777777);

-- --------------------------------------------------------

--
-- Table structure for table `t_responden_ortu`
--

CREATE TABLE `t_responden_ortu` (
  `responden_ortu_id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `responden_tanggal` datetime DEFAULT NULL,
  `responden_nama` varchar(50) DEFAULT NULL,
  `responden_jk` enum('P','L') DEFAULT NULL,
  `responden_umur` tinyint(4) DEFAULT NULL,
  `responden_hp` varchar(20) DEFAULT NULL,
  `responden_pendidikan` varchar(30) DEFAULT NULL,
  `responden_pekerjaan` varchar(50) DEFAULT NULL,
  `responden_penghasilan` varchar(20) DEFAULT NULL,
  `mahasiswa_nim` varchar(20) DEFAULT NULL,
  `mahasiswa_nama` varchar(50) DEFAULT NULL,
  `mahasiswa_prodi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_responden_ortu`
--

INSERT INTO `t_responden_ortu` (`responden_ortu_id`, `survey_id`, `responden_tanggal`, `responden_nama`, `responden_jk`, `responden_umur`, `responden_hp`, `responden_pendidikan`, `responden_pekerjaan`, `responden_penghasilan`, `mahasiswa_nim`, `mahasiswa_nama`, `mahasiswa_prodi`) VALUES
(2, 38, NULL, 'jaka', 'L', 40, NULL, 'SMA', 'swasta', '5000000', '123', 'ika', 'tekkim'),
(3, 39, NULL, 'rani', 'P', 50, NULL, 'S1', 'Dosen', '10000000', '231', 'Sukma', 'Sipil'),
(4, 40, NULL, 'Yani', 'P', 52, NULL, 'S2', 'Pengusaha', '20000000', '124', 'Aji', 'Mesin'),
(5, 41, NULL, 'Verel', 'P', 45, NULL, 'S1', 'Bupati', '15000000', '123', 'Nuryadi', 'AN'),
(6, 42, NULL, 'Niko', 'L', 48, NULL, 'SMP', 'Petani', '7000000', '143', 'Ina', 'SIB');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_kategori`
--
ALTER TABLE `m_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `m_survey`
--
ALTER TABLE `m_survey`
  ADD PRIMARY KEY (`survey_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `m_survey_soal`
--
ALTER TABLE `m_survey_soal`
  ADD PRIMARY KEY (`soal_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `rekap_fasilitas`
--
ALTER TABLE `rekap_fasilitas`
  ADD KEY `jawaban_fasilitas_mahasiswa` (`jawaban_fasilitas_mahasiswa`),
  ADD KEY `jawaban_fasilitas_alumni` (`jawaban_fasilitas_alumni`),
  ADD KEY `jawaban_fasilitas_dosen` (`jawaban_fasilitas_dosen`),
  ADD KEY `jawaban_fasilitas_tendik` (`jawaban_fasilitas_tendik`);

--
-- Indexes for table `rekap_lulusan`
--
ALTER TABLE `rekap_lulusan`
  ADD KEY `jawaban_lulusan_industri` (`jawaban_lulusan_industri`);

--
-- Indexes for table `rekap_pelayanan`
--
ALTER TABLE `rekap_pelayanan`
  ADD KEY `jawaban_pelayanan_mahasiswa` (`jawaban_pelayanan_mahasiswa`),
  ADD KEY `jawaban_pelayanan_alumni` (`jawaban_pelayanan_alumni`),
  ADD KEY `jawaban_pelayanan_dosen` (`jawaban_pelayanan_dosen`),
  ADD KEY `jawaban_pelayanan_tendik` (`jawaban_pelayanan_tendik`),
  ADD KEY `jawaban_pelayanan_ortu` (`jawaban_pelayanan_ortu`);

--
-- Indexes for table `rekap_pendidikan`
--
ALTER TABLE `rekap_pendidikan`
  ADD KEY `jawaban_pendidikan_mahasiswa` (`jawaban_pendidikan_mahasiswa`),
  ADD KEY `jawaban_pendidikan_alumni` (`jawaban_pendidikan_alumni`);

--
-- Indexes for table `t_jawaban_alumni`
--
ALTER TABLE `t_jawaban_alumni`
  ADD PRIMARY KEY (`jawaban_alumni_id`),
  ADD KEY `responden_alumni_id` (`responden_alumni_id`),
  ADD KEY `soal_id` (`soal_id`);

--
-- Indexes for table `t_jawaban_dosen`
--
ALTER TABLE `t_jawaban_dosen`
  ADD PRIMARY KEY (`jawaban_dosen_id`),
  ADD KEY `responden_dosen_id` (`responden_dosen_id`),
  ADD KEY `soal_id` (`soal_id`);

--
-- Indexes for table `t_jawaban_industri`
--
ALTER TABLE `t_jawaban_industri`
  ADD PRIMARY KEY (`jawaban_industri_id`),
  ADD KEY `responden_industri_id` (`responden_industri_id`),
  ADD KEY `soal_id` (`soal_id`);

--
-- Indexes for table `t_jawaban_mahasiswa`
--
ALTER TABLE `t_jawaban_mahasiswa`
  ADD PRIMARY KEY (`jawaban_mahasiswa_id`),
  ADD KEY `responden_mahasiswa_id` (`responden_mahasiswa_id`),
  ADD KEY `soal_id` (`soal_id`);

--
-- Indexes for table `t_jawaban_ortu`
--
ALTER TABLE `t_jawaban_ortu`
  ADD PRIMARY KEY (`jawaban_ortu_id`),
  ADD KEY `responden_ortu_id` (`responden_ortu_id`),
  ADD KEY `soal_id` (`soal_id`);

--
-- Indexes for table `t_jawaban_tendik`
--
ALTER TABLE `t_jawaban_tendik`
  ADD PRIMARY KEY (`jawaban_tendik_id`),
  ADD KEY `responden_tendik_id` (`responden_tendik_id`),
  ADD KEY `soal_id` (`soal_id`);

--
-- Indexes for table `t_reponden_dosen`
--
ALTER TABLE `t_reponden_dosen`
  ADD PRIMARY KEY (`responden_dosen_id`),
  ADD KEY `survey_id` (`survey_id`);

--
-- Indexes for table `t_reponden_mahasiswa`
--
ALTER TABLE `t_reponden_mahasiswa`
  ADD PRIMARY KEY (`responden_mahasiswa_id`),
  ADD KEY `survey_id` (`survey_id`);

--
-- Indexes for table `t_reponden_tendik`
--
ALTER TABLE `t_reponden_tendik`
  ADD PRIMARY KEY (`responden_tendik_id`),
  ADD KEY `survey_id` (`survey_id`);

--
-- Indexes for table `t_responden_alumni`
--
ALTER TABLE `t_responden_alumni`
  ADD PRIMARY KEY (`responden_alumni_id`),
  ADD KEY `survey_id` (`survey_id`);

--
-- Indexes for table `t_responden_industri`
--
ALTER TABLE `t_responden_industri`
  ADD PRIMARY KEY (`responden_industri_id`),
  ADD KEY `survey_id` (`survey_id`);

--
-- Indexes for table `t_responden_ortu`
--
ALTER TABLE `t_responden_ortu`
  ADD PRIMARY KEY (`responden_ortu_id`),
  ADD KEY `survey_id` (`survey_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_kategori`
--
ALTER TABLE `m_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_survey`
--
ALTER TABLE `m_survey`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `m_survey_soal`
--
ALTER TABLE `m_survey_soal`
  MODIFY `soal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `t_jawaban_alumni`
--
ALTER TABLE `t_jawaban_alumni`
  MODIFY `jawaban_alumni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `t_jawaban_dosen`
--
ALTER TABLE `t_jawaban_dosen`
  MODIFY `jawaban_dosen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `t_jawaban_industri`
--
ALTER TABLE `t_jawaban_industri`
  MODIFY `jawaban_industri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `t_jawaban_mahasiswa`
--
ALTER TABLE `t_jawaban_mahasiswa`
  MODIFY `jawaban_mahasiswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `t_jawaban_ortu`
--
ALTER TABLE `t_jawaban_ortu`
  MODIFY `jawaban_ortu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_jawaban_tendik`
--
ALTER TABLE `t_jawaban_tendik`
  MODIFY `jawaban_tendik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333;

--
-- AUTO_INCREMENT for table `t_reponden_dosen`
--
ALTER TABLE `t_reponden_dosen`
  MODIFY `responden_dosen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_reponden_mahasiswa`
--
ALTER TABLE `t_reponden_mahasiswa`
  MODIFY `responden_mahasiswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `t_reponden_tendik`
--
ALTER TABLE `t_reponden_tendik`
  MODIFY `responden_tendik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_responden_alumni`
--
ALTER TABLE `t_responden_alumni`
  MODIFY `responden_alumni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_responden_industri`
--
ALTER TABLE `t_responden_industri`
  MODIFY `responden_industri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_responden_ortu`
--
ALTER TABLE `t_responden_ortu`
  MODIFY `responden_ortu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_survey`
--
ALTER TABLE `m_survey`
  ADD CONSTRAINT `m_survey_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `m_survey_soal`
--
ALTER TABLE `m_survey_soal`
  ADD CONSTRAINT `m_survey_soal_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `m_kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekap_fasilitas`
--
ALTER TABLE `rekap_fasilitas`
  ADD CONSTRAINT `rekap_fasilitas_ibfk_1` FOREIGN KEY (`jawaban_fasilitas_mahasiswa`) REFERENCES `t_jawaban_mahasiswa` (`jawaban_mahasiswa_id`),
  ADD CONSTRAINT `rekap_fasilitas_ibfk_2` FOREIGN KEY (`jawaban_fasilitas_alumni`) REFERENCES `t_jawaban_alumni` (`jawaban_alumni_id`),
  ADD CONSTRAINT `rekap_fasilitas_ibfk_3` FOREIGN KEY (`jawaban_fasilitas_dosen`) REFERENCES `t_jawaban_dosen` (`jawaban_dosen_id`),
  ADD CONSTRAINT `rekap_fasilitas_ibfk_4` FOREIGN KEY (`jawaban_fasilitas_tendik`) REFERENCES `t_jawaban_tendik` (`jawaban_tendik_id`);

--
-- Constraints for table `rekap_lulusan`
--
ALTER TABLE `rekap_lulusan`
  ADD CONSTRAINT `rekap_lulusan_ibfk_1` FOREIGN KEY (`jawaban_lulusan_industri`) REFERENCES `t_jawaban_industri` (`jawaban_industri_id`);

--
-- Constraints for table `rekap_pelayanan`
--
ALTER TABLE `rekap_pelayanan`
  ADD CONSTRAINT `rekap_pelayanan_ibfk_1` FOREIGN KEY (`jawaban_pelayanan_mahasiswa`) REFERENCES `t_jawaban_mahasiswa` (`jawaban_mahasiswa_id`),
  ADD CONSTRAINT `rekap_pelayanan_ibfk_2` FOREIGN KEY (`jawaban_pelayanan_alumni`) REFERENCES `t_jawaban_alumni` (`jawaban_alumni_id`),
  ADD CONSTRAINT `rekap_pelayanan_ibfk_3` FOREIGN KEY (`jawaban_pelayanan_dosen`) REFERENCES `t_jawaban_dosen` (`jawaban_dosen_id`),
  ADD CONSTRAINT `rekap_pelayanan_ibfk_4` FOREIGN KEY (`jawaban_pelayanan_tendik`) REFERENCES `t_jawaban_tendik` (`jawaban_tendik_id`),
  ADD CONSTRAINT `rekap_pelayanan_ibfk_5` FOREIGN KEY (`jawaban_pelayanan_ortu`) REFERENCES `t_jawaban_ortu` (`jawaban_ortu_id`);

--
-- Constraints for table `rekap_pendidikan`
--
ALTER TABLE `rekap_pendidikan`
  ADD CONSTRAINT `rekap_pendidikan_ibfk_1` FOREIGN KEY (`jawaban_pendidikan_mahasiswa`) REFERENCES `t_jawaban_mahasiswa` (`jawaban_mahasiswa_id`),
  ADD CONSTRAINT `rekap_pendidikan_ibfk_2` FOREIGN KEY (`jawaban_pendidikan_alumni`) REFERENCES `t_jawaban_alumni` (`jawaban_alumni_id`);

--
-- Constraints for table `t_jawaban_alumni`
--
ALTER TABLE `t_jawaban_alumni`
  ADD CONSTRAINT `t_jawaban_alumni_ibfk_1` FOREIGN KEY (`responden_alumni_id`) REFERENCES `t_responden_alumni` (`responden_alumni_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_jawaban_alumni_ibfk_2` FOREIGN KEY (`soal_id`) REFERENCES `m_survey_soal` (`soal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_jawaban_dosen`
--
ALTER TABLE `t_jawaban_dosen`
  ADD CONSTRAINT `t_jawaban_dosen_ibfk_1` FOREIGN KEY (`responden_dosen_id`) REFERENCES `t_reponden_dosen` (`responden_dosen_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_jawaban_dosen_ibfk_2` FOREIGN KEY (`soal_id`) REFERENCES `m_survey_soal` (`soal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_jawaban_industri`
--
ALTER TABLE `t_jawaban_industri`
  ADD CONSTRAINT `t_jawaban_industri_ibfk_1` FOREIGN KEY (`responden_industri_id`) REFERENCES `t_responden_industri` (`responden_industri_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_jawaban_industri_ibfk_2` FOREIGN KEY (`soal_id`) REFERENCES `m_survey_soal` (`soal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_jawaban_mahasiswa`
--
ALTER TABLE `t_jawaban_mahasiswa`
  ADD CONSTRAINT `t_jawaban_mahasiswa_ibfk_1` FOREIGN KEY (`responden_mahasiswa_id`) REFERENCES `t_reponden_mahasiswa` (`responden_mahasiswa_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_jawaban_mahasiswa_ibfk_2` FOREIGN KEY (`soal_id`) REFERENCES `m_survey_soal` (`soal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_jawaban_ortu`
--
ALTER TABLE `t_jawaban_ortu`
  ADD CONSTRAINT `t_jawaban_ortu_ibfk_1` FOREIGN KEY (`responden_ortu_id`) REFERENCES `t_responden_ortu` (`responden_ortu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_jawaban_ortu_ibfk_2` FOREIGN KEY (`soal_id`) REFERENCES `m_survey_soal` (`soal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_jawaban_tendik`
--
ALTER TABLE `t_jawaban_tendik`
  ADD CONSTRAINT `t_jawaban_tendik_ibfk_1` FOREIGN KEY (`responden_tendik_id`) REFERENCES `t_reponden_tendik` (`responden_tendik_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_jawaban_tendik_ibfk_2` FOREIGN KEY (`soal_id`) REFERENCES `m_survey_soal` (`soal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_reponden_dosen`
--
ALTER TABLE `t_reponden_dosen`
  ADD CONSTRAINT `t_reponden_dosen_ibfk_1` FOREIGN KEY (`survey_id`) REFERENCES `m_survey` (`survey_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_reponden_mahasiswa`
--
ALTER TABLE `t_reponden_mahasiswa`
  ADD CONSTRAINT `t_reponden_mahasiswa_ibfk_1` FOREIGN KEY (`survey_id`) REFERENCES `m_survey` (`survey_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_reponden_tendik`
--
ALTER TABLE `t_reponden_tendik`
  ADD CONSTRAINT `t_reponden_tendik_ibfk_1` FOREIGN KEY (`survey_id`) REFERENCES `m_survey` (`survey_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_responden_alumni`
--
ALTER TABLE `t_responden_alumni`
  ADD CONSTRAINT `t_responden_alumni_ibfk_1` FOREIGN KEY (`survey_id`) REFERENCES `m_survey` (`survey_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_responden_industri`
--
ALTER TABLE `t_responden_industri`
  ADD CONSTRAINT `t_responden_industri_ibfk_1` FOREIGN KEY (`survey_id`) REFERENCES `m_survey` (`survey_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_responden_ortu`
--
ALTER TABLE `t_responden_ortu`
  ADD CONSTRAINT `t_responden_ortu_ibfk_1` FOREIGN KEY (`survey_id`) REFERENCES `m_survey` (`survey_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
