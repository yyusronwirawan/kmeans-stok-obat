-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 23 Jun 2025 pada 20.40
-- Versi server: 11.4.7-MariaDB
-- Versi PHP: 8.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sgioffic_db_k-means`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nm_lengkap` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `nm_lengkap`) VALUES
('admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `nmb` varchar(25) NOT NULL,
  `dm` int(11) NOT NULL,
  `dk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id`, `nmb`, `dm`, `dk`) VALUES
(23, 'Milkita 1000', 200, 177),
(24, 'Jagoan neon merah', 256, 213),
(25, 'jagoan neon biru', 256, 217),
(26, 'split mangga', 256, 227),
(27, 'split lemon', 256, 232),
(28, 'cucu quackle', 313, 289),
(29, 'bonibon', 335, 291),
(30, 'nyam - nyam', 273, 216),
(31, 'smile bottle', 273, 238),
(32, 'popping candy', 273, 241),
(53, 'trick', 300, 281),
(54, 'klik 1000', 253, 211),
(55, 'klik 500', 319, 293),
(56, 'permen lunak modi', 375, 343),
(57, 'hot  - hot pop', 217, 153),
(58, 'hot ball mango', 217, 173),
(59, 'kwaci rebo', 289, 237),
(60, 'kiss', 309, 273),
(61, 'kopiko', 309, 264),
(62, 'chikory', 309, 283),
(63, 'lazery', 309, 277),
(64, 'mint', 309, 254),
(65, 'mentos', 309, 243),
(66, 'antangin', 202, 137),
(67, 'tamarin', 202, 117),
(68, 'jelico anggur', 429, 382),
(69, 'jelico jeruk', 429, 382),
(70, 'jelico jambu', 429, 382),
(71, 'jelico leci', 429, 382),
(72, 'jelico mangga', 429, 382),
(73, 'sarimi gelas soto', 485, 420),
(74, 'sarimi gelas ayam bawang', 485, 475),
(75, 'sarimi gelas kari ayam', 485, 431),
(76, 'sarimi gelas bakso', 485, 447),
(77, 'sarimi gelas sosis', 485, 413),
(78, 'mie gelas ayam bawang', 440, 428),
(79, 'mie gelas soto', 440, 429),
(80, 'mie gelas bakso', 440, 435),
(81, 'mie gelas sosis', 440, 419),
(82, 'mie gelas sop buntut', 440, 422),
(83, 'lemonia', 333, 236),
(84, 'karmellow caramel', 457, 411),
(85, 'karmellow coklat', 457, 411),
(86, 'gesit 2000', 489, 473),
(87, 'superstar 1000', 515, 483),
(88, 'malkist coklat', 526, 491),
(89, 'malkist abon', 526, 502),
(90, 'malkist keju', 526, 477),
(91, 'malkist coklat kelapa', 526, 443),
(92, 'malkist crackers', 526, 510),
(93, 'gery salut matcha', 274, 169),
(94, 'gorio - rio 500', 539, 499),
(95, 'go potato 500', 521, 482),
(96, 'Padimas Mix', 546, 513),
(97, 'padimas strawberry', 546, 497),
(98, 'padimas coklat', 546, 504),
(99, 'go malkist madu', 377, 348),
(100, 'gorio - rio 1000', 289, 229),
(101, 'go potato 1000', 271, 233),
(102, 'tiara 500', 490, 437),
(103, 'gopek 1000', 373, 311),
(104, 'komo 500', 490, 485),
(105, 'topten 500', 490, 473),
(106, 'salsa 500', 490, 466),
(107, 'miko 500', 490, 479),
(108, 'tiara 2000', 431, 373),
(109, 'guntur 1000', 468, 388),
(110, 'jelly gum mix fruit', 512, 477),
(111, 'jelly gum mix coca cola', 512, 449),
(112, 'biskitop sapi 2000', 567, 511),
(113, 'jelly big stick refill', 533, 499),
(114, 'wafer morris 500', 527, 500),
(115, 'happy twist 500', 511, 471),
(116, 'beng - beng', 612, 576),
(117, 'o - jelly', 510, 488),
(118, 'happy mini donut 500', 417, 387),
(119, 'chocopie', 567, 542),
(120, 'tic - tic sambel colek 20', 468, 430),
(121, 'tic - tic bawang 2000', 468, 419),
(122, 'arden 2000', 591, 544),
(123, 'kalpa 2000', 588, 537),
(124, 'monisa coklat', 528, 483),
(125, 'nabati coated wafer', 493, 458),
(126, 'slai olai 2000', 471, 438),
(127, 'roma kelapa cream 2000', 462, 421),
(128, 'biskuat 1000', 487, 473),
(129, 'zyluc 2000', 739, 699),
(130, 'vegetable 2000', 739, 700),
(131, 'nabati coklat 2000', 843, 821),
(132, 'nabati keju 2000', 821, 796),
(133, 'nabati coklat 1000', 478, 453),
(134, 'nabati keju 1000', 478, 429),
(135, 'nabati coklat 500', 448, 433),
(136, 'nabati keju 500', 448, 412),
(137, 'happy cone snack 500', 513, 493),
(138, 'happy jamur 500', 466, 414),
(139, 'mie boyki', 487, 456),
(140, 'mie enak', 487, 463),
(141, 'spix mie goreng 500', 487, 477),
(142, 'mie suki 1000', 487, 474),
(143, 'sari gandum original', 541, 489),
(144, 'sari gandum coklat', 541, 522),
(145, 'chocolatos 500', 578, 548),
(146, 'chocolatos coconut 500', 578, 511),
(147, 'chocolatos coklat 2000', 465, 458),
(148, 'chocolatos keju 2000', 465, 403),
(149, 'chocolatos dark 1000', 347, 293),
(150, 'baby shark 2000', 563, 552),
(151, 'bebeto 1000', 563, 560),
(152, 'doraemon 2000', 563, 538),
(153, 'french fries 2000', 563, 549),
(154, 'Siip Jagung Bakar 2000', 590, 588),
(155, 'Siip coklat 2000', 590, 573),
(156, 'Chitop 2000', 423, 385),
(157, 'Chitop 500', 486, 458),
(158, 'riry 500', 486, 444),
(159, 'wafer top 1 500', 486, 479),
(160, 'top ten 500', 486, 480),
(161, 'wafer rolls coklat ', 456, 446),
(162, 'wafer rolls strawberry', 456, 446),
(163, 'wafer rolls blueberry', 456, 446),
(164, 'wafer rolls vanilla', 456, 446),
(165, 'wafer rolls pandan', 456, 446),
(166, 'sagu keju 500', 395, 387),
(167, 'putra bali 500', 395, 375),
(168, 'eye glass', 431, 376),
(169, 'nextar coklat', 496, 487),
(170, 'nextar blueberry', 496, 449),
(171, 'nextar noir', 496, 477),
(172, 'hahamie rumput laut', 557, 544),
(173, 'mikako rumput laut ', 557, 513),
(174, 'mikako sapi panggang ', 557, 396),
(175, 'kacang kulit dua kelinci', 563, 546),
(176, 'rosta sapi panggang  ', 563, 531),
(177, 'rosta pedas ', 563, 511),
(178, 'kacang koro pedas ', 563, 539),
(179, 'kacang sukro garlic', 563, 522),
(180, 'kacang sukro pedas ', 563, 510),
(181, 'deka crepez choco banana', 488, 457),
(182, 'deka crepez choconut ', 488, 443),
(183, 'tic tac sapi panggang  ', 563, 546),
(184, 'tic tac mix', 563, 524),
(185, 'pilus sapi panggang   ', 563, 546),
(186, 'pilus mix ', 563, 511),
(187, 'q potato 2000', 575, 500),
(188, 'marie susu 1000', 541, 477),
(189, 'roma 2000', 541, 434),
(190, 'better', 697, 673),
(191, 'choki choki', 642, 588),
(192, 'pasta keju', 432, 345),
(193, 'pasta coklat ', 432, 331),
(194, 'so nice ayam', 611, 601),
(195, 'so nice sapi ', 611, 609),
(196, 'vigo sapi ', 432, 364),
(197, 'kiko', 687, 655),
(198, 'pino ice ', 687, 624),
(199, 'siip 500 coklat', 542, 394),
(200, 'siip 500 keju', 542, 366),
(201, 'siip 500 jagung bakar', 542, 539),
(202, 'aah 500 coklat', 570, 476),
(203, 'aah 500 keju', 570, 462),
(204, 'go crepez ', 570, 531),
(205, 'egg roll', 570, 538),
(206, 'my choco', 570, 499),
(207, 'mininori mie goreng', 712, 689),
(208, 'mininori bawang', 712, 654),
(209, 'mininori sapi panggang  ', 712, 672),
(210, 'mininori pedas', 712, 688),
(211, 'choyo choyo', 443, 421),
(212, 'oreo mini', 557, 489),
(213, 'oreo keping ', 557, 532),
(214, 'oreo bolu', 557, 511),
(215, 'tic tic talas', 460, 412),
(216, 'kacang atom bledug 2000', 580, 531),
(217, 'kacang atom garuda 2000', 543, 477),
(218, 'kacang atom dua kelinci 2', 531, 475),
(219, 'kacang atom bledug 500', 555, 499),
(220, 'piatos barbeque 2000', 437, 389),
(221, 'jetz', 613, 577),
(222, 'gery ring coklat 1000', 500, 434),
(223, 'qtela', 613, 573),
(224, 'chitato lite', 613, 610),
(225, 'chitato barbeque', 613, 610),
(226, 'wafelo coklat 2000', 412, 354),
(227, 'wafelo caramel 2000', 412, 312),
(228, 'wafelo caramel 1000', 500, 476),
(229, 'wafelo coklat 1000', 500, 463),
(230, 'wafelo coconut 1000', 500, 411),
(231, 'rolls keju', 465, 422),
(232, 'rolls coklat', 465, 387),
(233, 'mie kremez shor', 439, 377),
(234, 'pidi jelly ', 557, 534),
(235, 'boncabe lv 15', 517, 493),
(236, 'boncabe lv 10', 517, 476),
(237, 'boncabe lv 2', 517, 432),
(238, 'boncabe mie kremez lv1 5 ', 517, 502),
(239, 'chimory blueberry', 600, 567),
(240, 'chimory strawberry', 600, 567),
(241, 'indomilk coklat', 712, 699),
(242, 'indomilk strawberry', 712, 681),
(243, 'gery miesis', 550, 521),
(244, 'gery bantal 500', 550, 510),
(245, 'gery bantal 2000', 550, 549),
(246, 'gery bischoc 500', 550, 483),
(247, 'tango wafer 1000 vanila', 676, 621),
(248, 'olaris 500', 580, 540),
(249, 'maxicron', 613, 576),
(250, 'boncabe lv 0 1000 ', 517, 510),
(251, 'milo coklat', 650, 647),
(252, 'taro 1000', 876, 771);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data1`
--

CREATE TABLE `data1` (
  `id` int(255) NOT NULL,
  `nmb` varchar(255) NOT NULL,
  `dm` int(255) NOT NULL,
  `dk` int(255) NOT NULL,
  `tgl` date NOT NULL,
  `tglkadaluwarsa` date NOT NULL,
  `stokdefault` int(11) NOT NULL,
  `hari` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `data1`
--

INSERT INTO `data1` (`id`, `nmb`, `dm`, `dk`, `tgl`, `tglkadaluwarsa`, `stokdefault`, `hari`) VALUES
(1, 'PARACETAMOL 500MG', 511, 43, '2025-01-21', '2026-10-09', 300, 626),
(2, 'AMOXICILLIN 500MG', 540, 451, '2025-03-07', '2027-01-15', 300, 679),
(3, 'OBH COMBI', 150, 121, '2025-03-30', '2026-12-04', 300, 614),
(4, 'BETADINE SOLUTION', 456, 426, '2025-01-23', '2026-11-22', 300, 668),
(5, 'BODREX EXTRA', 81, 62, '2024-12-13', '2027-01-17', 300, 765),
(6, 'MYLANTA TABLET', 140, 39, '2025-04-29', '2025-08-17', 300, 110),
(7, 'ANTANGIN JRG', 286, 73, '2024-08-26', '2025-12-31', 300, 492),
(8, 'TOLAK ANGIN', 86, 48, '2025-02-15', '2025-07-28', 300, 163),
(9, 'PROMAG TABLET', 367, 37, '2025-01-30', '2026-10-12', 300, 620),
(10, 'SANMOL SIRUP', 150, 22, '2025-04-13', '2026-05-11', 300, 393),
(11, 'TEMPRA SIRUP', 454, 394, '2025-05-19', '2026-06-07', 300, 384),
(12, 'BISOLVON', 141, 124, '2025-01-22', '2027-02-05', 300, 744),
(13, 'VICKS FORMULA 44', 390, 264, '2025-02-21', '2027-03-25', 300, 762),
(14, 'PARAMEX', 467, 63, '2024-12-01', '2026-10-22', 300, 690),
(15, 'PONSTAN 500MG', 298, 164, '2024-08-31', '2025-08-13', 300, 347),
(16, 'ASPIRIN 100MG', 98, 58, '2025-06-07', '2027-03-08', 300, 639),
(17, 'IBUPROFEN 400MG', 261, 240, '2024-11-26', '2027-02-11', 300, 807),
(18, 'VITAMIN C 500MG', 497, 412, '2025-05-14', '2026-02-05', 300, 267),
(19, 'VITAMIN B COMPLEX', 324, 21, '2024-07-15', '2026-09-06', 300, 783),
(20, 'ZINC TABLET', 50, 16, '2025-03-29', '2026-09-18', 300, 538),
(21, 'CALCIUM LACTATE', 159, 40, '2024-11-13', '2027-02-09', 300, 818),
(22, 'IRON TABLET', 112, 60, '2024-08-30', '2026-12-30', 300, 852),
(23, 'OMEPRAZOLE 20MG', 142, 92, '2025-06-13', '2027-06-03', 300, 720),
(24, 'RANITIDINE 150MG', 152, 78, '2024-09-09', '2025-06-28', 300, 292),
(25, 'DOMPERIDONE 10MG', 392, 334, '2025-02-11', '2025-09-18', 300, 219),
(26, 'LOPERAMIDE 2MG', 273, 214, '2024-09-29', '2026-11-17', 300, 779),
(27, 'DIAZEPAM 5MG', 155, 34, '2024-07-02', '2027-02-22', 300, 965),
(28, 'LORAZEPAM 1MG', 128, 35, '2025-03-16', '2026-02-20', 300, 341),
(29, 'ALPRAZOLAM 0.5MG', 177, 159, '2024-12-12', '2027-06-07', 300, 907),
(30, 'CLONAZEPAM 2MG', 222, 101, '2025-01-16', '2027-02-07', 300, 752),
(31, 'PHENYTOIN 100MG', 50, 21, '2024-09-25', '2025-12-23', 300, 454),
(32, 'CARBAMAZEPINE 200MG', 136, 36, '2024-09-04', '2027-03-31', 300, 938),
(33, 'METFORMIN 500MG', 307, 49, '2025-01-22', '2026-02-16', 300, 390),
(34, 'GLIBENCLAMIDE 5MG', 326, 222, '2025-05-16', '2025-12-12', 300, 210),
(35, 'INSULIN RAPID', 498, 257, '2024-10-17', '2025-11-17', 300, 396),
(36, 'CAPTOPRIL 25MG', 64, 33, '2024-10-20', '2026-01-30', 300, 467),
(37, 'AMLODIPINE 10MG', 54, 25, '2024-07-26', '2026-12-24', 300, 881),
(38, 'NIFEDIPINE 10MG', 236, 34, '2024-09-19', '2026-06-03', 300, 622),
(39, 'ATENOLOL 50MG', 61, 36, '2024-10-01', '2026-07-30', 300, 667),
(40, 'PROPRANOLOL 40MG', 136, 51, '2024-10-31', '2027-02-10', 300, 832),
(41, 'SIMVASTATIN 20MG', 488, 301, '2024-09-14', '2026-09-30', 300, 746),
(42, 'ATORVASTATIN 20MG', 160, 102, '2025-06-12', '2025-06-24', 300, 12),
(43, 'FUROSEMIDE 40MG', 65, 7, '2024-11-06', '2026-11-18', 300, 742),
(44, 'SPIRONOLACTONE 25MG', 483, 358, '2024-10-20', '2027-04-16', 300, 908),
(45, 'PREDNISONE 5MG', 470, 12, '2025-01-24', '2027-01-20', 300, 726),
(46, 'DEXAMETHASONE 0.5MG', 369, 223, '2024-10-28', '2027-03-08', 300, 861),
(47, 'CETIRIZINE 10MG', 291, 283, '2025-04-24', '2025-08-04', 300, 102),
(48, 'LORATADINE 10MG', 486, 309, '2024-07-26', '2027-06-09', 300, 1048),
(49, 'CHLORPHENIRAMINE 4MG', 287, 44, '2024-09-11', '2027-05-19', 300, 980),
(50, 'DIPHENHYDRAMINE 25MG', 339, 243, '2024-09-18', '2026-04-24', 300, 583),
(51, 'SALBUTAMOL INHALER', 363, 25, '2024-12-07', '2026-07-09', 300, 579),
(52, 'THEOPHYLLINE 200MG', 118, 34, '2024-07-15', '2026-07-16', 300, 731),
(53, 'CODEINE 30MG', 164, 120, '2025-01-01', '2025-10-02', 300, 274),
(54, 'TRAMADOL 50MG', 264, 220, '2024-12-10', '2026-05-17', 300, 523),
(55, 'MORPHINE 10MG', 174, 24, '2024-08-11', '2027-04-30', 300, 992),
(56, 'FENTANYL PATCH', 281, 148, '2025-06-07', '2026-04-04', 300, 301),
(57, 'CIPROFLOXACIN 500MG', 331, 33, '2024-07-25', '2025-08-26', 300, 397),
(58, 'AZITHROMYCIN 500MG', 210, 182, '2024-06-24', '2026-10-07', 300, 835),
(59, 'DOXYCYCLINE 100MG', 95, 10, '2024-08-22', '2026-06-07', 300, 654),
(60, 'METRONIDAZOLE 500MG', 510, 227, '2024-12-19', '2026-08-21', 300, 610),
(61, 'FLUCONAZOLE 150MG', 143, 54, '2024-09-22', '2025-12-30', 300, 464),
(62, 'ACYCLOVIR 400MG', 268, 25, '2024-10-16', '2026-03-29', 300, 529),
(63, 'OSELTAMIVIR 75MG', 310, 26, '2024-06-23', '2025-06-29', 300, 371),
(64, 'LAMIVUDINE 150MG', 225, 62, '2024-09-08', '2026-12-13', 300, 826),
(65, 'EFAVIRENZ 600MG', 99, 12, '2024-10-07', '2026-04-25', 300, 565),
(66, 'ZIDOVUDINE 300MG', 80, 33, '2025-05-03', '2026-05-19', 300, 381),
(67, 'LOPINAVIR 200MG', 463, 457, '2024-06-26', '2026-04-10', 300, 653),
(68, 'RITONAVIR 50MG', 71, 44, '2024-07-16', '2025-09-12', 300, 423),
(69, 'WARFARIN 5MG', 94, 61, '2025-04-13', '2025-12-18', 300, 249),
(70, 'CLOPIDOGREL 75MG', 177, 18, '2024-10-14', '2026-01-20', 300, 463),
(71, 'ASPIRIN 325MG', 540, 486, '2025-03-30', '2027-01-27', 300, 668),
(72, 'HEPARIN INJECTION', 331, 290, '2025-04-14', '2025-11-11', 300, 211),
(73, 'DIGOXIN 0.25MG', 453, 424, '2025-01-08', '2027-02-24', 300, 777),
(74, 'VERAPAMIL 80MG', 472, 177, '2024-10-09', '2027-05-05', 300, 938),
(75, 'DILTIAZEM 60MG', 425, 330, '2025-05-12', '2026-02-25', 300, 289),
(76, 'LOSARTAN 50MG', 125, 33, '2024-10-28', '2025-12-01', 300, 399),
(77, 'IRBESARTAN 150MG', 532, 428, '2025-04-20', '2026-10-12', 300, 540),
(78, 'LISINOPRIL 10MG', 118, 38, '2025-05-12', '2026-10-24', 300, 530),
(79, 'ENALAPRIL 5MG', 426, 367, '2024-12-12', '2025-11-26', 300, 349),
(80, 'RAMIPRIL 5MG', 483, 452, '2025-02-01', '2026-08-27', 300, 572),
(81, 'HYDROCHLOROTHIAZIDE 25MG', 120, 36, '2024-12-20', '2025-07-29', 300, 221),
(82, 'INDAPAMIDE 2.5MG', 225, 44, '2024-08-03', '2027-02-20', 300, 931),
(83, 'CHLORTHALIDONE 25MG', 466, 292, '2024-08-26', '2027-01-26', 300, 883),
(84, 'TORSEMIDE 10MG', 417, 154, '2024-07-18', '2027-04-25', 300, 1011),
(85, 'LEVOTHYROXINE 100MCG', 375, 358, '2024-09-30', '2026-05-20', 300, 597),
(86, 'METHIMAZOLE 5MG', 285, 101, '2025-03-29', '2025-08-30', 300, 154),
(87, 'PROPYLTHIOURACIL 50MG', 105, 5, '2025-05-21', '2027-03-20', 300, 668),
(88, 'INSULIN GLARGINE', 536, 42, '2024-12-07', '2026-10-15', 300, 677),
(89, 'INSULIN ASPART', 298, 27, '2025-02-19', '2027-02-18', 300, 729),
(90, 'METFORMIN XR 500MG', 311, 56, '2024-11-11', '2026-04-12', 300, 517),
(91, 'PIOGLITAZONE 30MG', 352, 327, '2024-09-23', '2026-09-28', 300, 735),
(92, 'GLICLAZIDE 80MG', 525, 85, '2025-03-11', '2026-12-25', 300, 654),
(93, 'ACARBOSE 50MG', 461, 100, '2024-12-20', '2027-04-28', 300, 859),
(94, 'SITAGLIPTIN 100MG', 285, 197, '2024-08-27', '2026-02-07', 300, 529),
(95, 'SAXAGLIPTIN 5MG', 55, 15, '2024-12-06', '2026-09-04', 300, 637),
(96, 'LIRAGLUTIDE INJECTION', 355, 73, '2024-12-10', '2027-06-03', 300, 905),
(97, 'ALLOPURINOL 300MG', 532, 394, '2024-09-03', '2026-04-06', 300, 580),
(98, 'COLCHICINE 0.6MG', 181, 90, '2025-01-23', '2025-12-11', 300, 322),
(99, 'PROBENECID 500MG', 429, 162, '2024-08-31', '2026-10-21', 300, 781),
(100, 'FEBUXOSTAT 80MG', 380, 266, '2025-06-09', '2026-08-02', 300, 419),
(101, 'ALENDRONATE 70MG', 308, 278, '2025-05-06', '2025-10-19', 300, 166),
(102, 'RISEDRONATE 35MG', 349, 122, '2024-08-02', '2027-01-04', 300, 885),
(103, 'CALCITRIOL 0.25MCG', 324, 255, '2024-07-19', '2026-12-27', 300, 891),
(104, 'ALFACALCIDOL 1MCG', 473, 446, '2024-06-26', '2027-02-21', 300, 970),
(105, 'FOLIC ACID 5MG', 299, 119, '2024-09-25', '2025-06-27', 300, 275),
(106, 'CYANOCOBALAMIN 1000MCG', 192, 100, '2024-09-03', '2025-09-28', 300, 390),
(107, 'PYRIDOXINE 50MG', 196, 113, '2024-08-06', '2026-12-31', 300, 877),
(108, 'THIAMINE 100MG', 431, 142, '2024-07-02', '2026-01-10', 300, 557),
(109, 'RIBOFLAVIN 10MG', 154, 95, '2025-05-27', '2026-04-05', 300, 313),
(110, 'NIACIN 500MG', 88, 22, '2024-10-09', '2025-09-15', 300, 341),
(111, 'BIOTIN 10MG', 395, 209, '2024-11-22', '2025-07-25', 300, 245),
(112, 'PANTOTHENIC ACID 100MG', 426, 265, '2024-10-24', '2026-10-04', 300, 710),
(113, 'VITAMIN D3 1000IU', 110, 91, '2024-10-28', '2026-11-10', 300, 743),
(114, 'VITAMIN E 400IU', 505, 310, '2024-07-09', '2026-08-05', 300, 757),
(115, 'VITAMIN K 100MCG', 482, 344, '2024-08-10', '2025-08-27', 300, 382),
(116, 'MULTIVITAMIN TABLET', 438, 122, '2025-02-16', '2025-12-20', 300, 307),
(117, 'OMEGA-3 1000MG', 234, 111, '2025-02-21', '2025-12-31', 300, 313),
(118, 'COENZYME Q10 100MG', 78, 9, '2024-09-28', '2026-10-28', 300, 760),
(119, 'GLUCOSAMINE 1500MG', 89, 7, '2025-01-14', '2026-03-24', 300, 434),
(120, 'CHONDROITIN 800MG', 361, 334, '2024-12-11', '2027-01-23', 300, 773),
(121, 'MSM 1000MG', 172, 45, '2024-09-03', '2026-02-02', 300, 517),
(122, 'TURMERIC EXTRACT 500MG', 518, 7, '2025-02-08', '2027-04-16', 300, 797),
(123, 'GINKGO BILOBA 120MG', 130, 101, '2025-01-27', '2025-07-12', 300, 166),
(124, 'GINSENG EXTRACT 200MG', 64, 9, '2025-03-02', '2026-01-15', 300, 319),
(125, 'ECHINACEA 400MG', 351, 18, '2025-06-03', '2026-02-16', 300, 258),
(126, 'GARLIC EXTRACT 600MG', 379, 209, '2025-02-15', '2027-03-12', 300, 755),
(127, 'MILK THISTLE 150MG', 378, 133, '2024-07-27', '2025-12-24', 300, 515),
(128, 'SAW PALMETTO 320MG', 242, 130, '2025-05-12', '2026-12-22', 300, 589),
(129, 'CRANBERRY EXTRACT 500MG', 507, 400, '2025-04-22', '2026-03-21', 300, 333),
(130, 'PROBIOTICS 10B CFU', 366, 305, '2025-01-29', '2026-11-02', 300, 642),
(131, 'DIGESTIVE ENZYMES', 304, 205, '2025-03-27', '2026-02-21', 300, 331),
(132, 'FIBER SUPPLEMENT', 298, 205, '2025-06-09', '2026-01-07', 300, 212),
(133, 'MELATONIN 3MG', 166, 147, '2025-04-30', '2026-12-27', 300, 606),
(134, 'VALERIAN ROOT 450MG', 225, 95, '2025-01-12', '2026-09-21', 300, 617),
(135, 'PASSIONFLOWER 250MG', 342, 315, '2024-12-22', '2026-04-22', 300, 486),
(136, 'CHAMOMILE TEA', 321, 179, '2025-04-05', '2026-01-22', 300, 292),
(137, 'GREEN TEA EXTRACT 500MG', 176, 45, '2025-04-30', '2026-10-12', 300, 530),
(138, 'RESVERATROL 100MG', 156, 131, '2025-01-06', '2026-05-14', 300, 493),
(139, 'ALPHA LIPOIC ACID 300MG', 215, 31, '2024-12-04', '2026-02-11', 300, 434),
(140, 'NAC 600MG', 310, 230, '2024-07-21', '2025-09-16', 300, 422),
(141, 'MAGNESIUM GLYCINATE 400MG', 261, 177, '2024-10-29', '2025-08-03', 300, 278),
(142, 'POTASSIUM CITRATE 300MG', 514, 155, '2024-09-14', '2025-10-02', 300, 383),
(143, 'CHROMIUM 200MCG', 133, 77, '2025-01-02', '2027-03-05', 300, 792),
(144, 'SELENIUM 200MCG', 334, 324, '2024-07-12', '2025-12-07', 300, 513),
(145, 'IODINE 150MCG', 239, 203, '2025-04-17', '2026-04-21', 300, 369),
(146, 'MOLYBDENUM 75MCG', 341, 215, '2025-03-28', '2025-07-04', 300, 98),
(147, 'BORON 3MG', 486, 175, '2025-06-02', '2026-01-19', 300, 231),
(148, 'VANADIUM 50MCG', 276, 57, '2024-07-31', '2027-04-13', 300, 986),
(149, 'BETADINE GARGLE', 412, 187, '2025-02-05', '2025-08-06', 300, 182),
(150, 'ANTISEPTIC SOLUTION', 167, 99, '2024-12-05', '2027-01-18', 300, 774),
(151, 'HYDROGEN PEROXIDE 3%', 330, 5, '2025-05-14', '2027-01-29', 300, 625),
(152, 'ALCOHOL 70%', 250, 127, '2024-10-03', '2027-02-08', 300, 858),
(153, 'POVIDONE IODINE 10%', 360, 294, '2024-07-07', '2027-06-06', 300, 1064),
(154, 'CHLORHEXIDINE 0.2%', 400, 76, '2025-01-14', '2027-02-21', 300, 768),
(155, 'SILVER SULFADIAZINE CREAM', 537, 30, '2025-03-06', '2025-08-26', 300, 173),
(156, 'MUPIROCIN OINTMENT', 230, 51, '2025-01-31', '2026-11-07', 300, 645),
(157, 'HYDROCORTISONE CREAM 1%', 536, 87, '2025-06-11', '2026-06-18', 300, 372),
(158, 'TRIAMCINOLONE CREAM 0.1%', 251, 23, '2025-01-23', '2026-12-22', 300, 698),
(159, 'CLOBETASOL CREAM 0.05%', 255, 46, '2025-02-09', '2027-04-27', 300, 807),
(160, 'CALAMINE LOTION', 169, 63, '2025-06-13', '2025-11-03', 300, 143),
(161, 'ZINC OXIDE CREAM', 540, 247, '2025-03-03', '2027-01-25', 300, 693),
(162, 'PETROLEUM JELLY', 465, 260, '2025-04-21', '2026-06-04', 300, 409),
(163, 'MOISTURIZING CREAM', 447, 224, '2025-04-16', '2025-09-18', 300, 155),
(164, 'SUNSCREEN SPF 30', 280, 227, '2025-06-06', '2027-01-05', 300, 578),
(165, 'ANTIFUNGAL CREAM', 208, 57, '2025-02-11', '2027-02-26', 300, 745),
(166, 'KETOCONAZOLE CREAM 2%', 229, 174, '2024-12-29', '2026-08-21', 300, 600),
(167, 'MICONAZOLE CREAM 2%', 537, 522, '2025-03-24', '2026-04-09', 300, 381),
(168, 'TERBINAFINE CREAM 1%', 196, 126, '2024-12-21', '2026-05-04', 300, 499),
(169, 'ACNE TREATMENT GEL', 461, 321, '2025-05-13', '2026-01-23', 300, 255),
(170, 'BENZOYL PEROXIDE 5%', 363, 103, '2024-11-14', '2027-04-02', 300, 869),
(171, 'TRETINOIN CREAM 0.05%', 257, 198, '2024-08-14', '2026-10-10', 300, 787),
(172, 'ADAPALENE GEL 0.1%', 528, 115, '2024-07-30', '2025-10-04', 300, 431),
(173, 'EYE DROPS ARTIFICIAL TEARS', 208, 108, '2024-10-05', '2026-06-07', 300, 610),
(174, 'ANTIBIOTIC EYE DROPS', 154, 65, '2024-07-27', '2026-12-12', 300, 868),
(175, 'STEROID EYE DROPS', 380, 148, '2024-06-21', '2026-10-27', 300, 858),
(176, 'GLAUCOMA EYE DROPS', 537, 120, '2025-01-12', '2026-04-22', 300, 465),
(177, 'EAR DROPS WAX REMOVAL', 420, 280, '2024-08-13', '2026-09-09', 300, 757),
(178, 'ANTIBIOTIC EAR DROPS', 137, 92, '2024-08-08', '2027-06-13', 300, 1039),
(179, 'NASAL SPRAY SALINE', 160, 97, '2024-12-09', '2026-10-28', 300, 688),
(180, 'DECONGESTANT NASAL SPRAY', 351, 323, '2024-08-16', '2026-04-01', 300, 593),
(181, 'THROAT LOZENGES', 360, 180, '2024-10-24', '2027-02-05', 300, 834),
(182, 'COUGH SYRUP', 130, 80, '2024-06-20', '2026-11-30', 300, 893),
(183, 'EXPECTORANT SYRUP', 335, 317, '2024-07-25', '2025-12-28', 300, 521),
(184, 'ANTITUSSIVE SYRUP', 477, 39, '2024-10-11', '2026-11-09', 300, 759),
(185, 'LAXATIVE TABLET', 441, 309, '2024-12-10', '2025-12-09', 300, 364),
(186, 'STOOL SOFTENER', 327, 278, '2024-07-09', '2027-01-31', 300, 936),
(187, 'ANTI-DIARRHEAL', 55, 44, '2025-03-10', '2027-04-10', 300, 761),
(188, 'ORAL REHYDRATION SALT', 243, 104, '2025-02-12', '2026-05-20', 300, 462),
(189, 'ANTACID LIQUID', 241, 223, '2024-06-25', '2027-01-08', 300, 927),
(190, 'SIMETHICONE DROPS', 504, 243, '2024-12-03', '2027-06-10', 300, 919),
(191, 'PROBIOTIC CAPSULES', 133, 87, '2024-12-02', '2026-12-20', 300, 748),
(192, 'DIGESTIVE AID', 348, 104, '2024-10-10', '2025-09-23', 300, 348),
(193, 'MOTION SICKNESS TABLET', 106, 21, '2025-05-30', '2025-07-23', 300, 54),
(194, 'ANTI-NAUSEA MEDICATION', 290, 128, '2024-09-17', '2026-11-30', 300, 804),
(195, 'APPETITE STIMULANT', 52, 40, '2025-02-02', '2026-03-11', 300, 402),
(196, 'WEIGHT LOSS SUPPLEMENT', 531, 469, '2024-07-20', '2025-09-28', 300, 435),
(197, 'ENERGY BOOSTER', 402, 176, '2024-12-02', '2026-04-09', 300, 493),
(198, 'MEMORY ENHANCER', 114, 47, '2025-05-11', '2026-07-02', 300, 417),
(199, 'STRESS RELIEF', 444, 293, '2025-06-15', '2026-06-17', 300, 367),
(200, 'MOOD STABILIZER', 513, 100, '2025-02-25', '2026-10-21', 300, 603);

--
-- Trigger `data1`
--
DELIMITER $$
CREATE TRIGGER `before_insert_data1` BEFORE INSERT ON `data1` FOR EACH ROW BEGIN
    SET NEW.hari = DATEDIFF(NEW.tglkadaluwarsa, NEW.tgl);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_update_data1` BEFORE UPDATE ON `data1` FOR EACH ROW BEGIN
    SET NEW.hari = DATEDIFF(NEW.tglkadaluwarsa, NEW.tgl);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c1y` int(11) NOT NULL,
  `c2y` int(11) NOT NULL,
  `c3y` int(11) NOT NULL,
  `c1z` int(11) NOT NULL,
  `c2z` int(11) NOT NULL,
  `c3z` int(11) NOT NULL,
  `c1hari` int(11) NOT NULL,
  `c2hari` int(11) NOT NULL,
  `c3hari` int(11) NOT NULL,
  `c1stokdefault` int(11) NOT NULL,
  `c2stokdefault` int(11) NOT NULL,
  `c3stokdefault` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `c1`, `c2`, `c3`, `c1y`, `c2y`, `c3y`, `c1z`, `c2z`, `c3z`, `c1hari`, `c2hari`, `c3hari`, `c1stokdefault`, `c2stokdefault`, `c3stokdefault`, `tanggal`) VALUES
(1, 50, 16, 34, 159, 40, 119, 112, 60, 52, 538, 818, 852, 300, 300, 300, '2025-06-23'),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00'),
(1, 50, 16, 34, 159, 40, 119, 112, 60, 52, 538, 818, 852, 300, 300, 300, '2025-06-23');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data1`
--
ALTER TABLE `data1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT untuk tabel `data1`
--
ALTER TABLE `data1`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
