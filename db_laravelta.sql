-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Nov 2020 pada 07.52
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laravelta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auditees`
--

CREATE TABLE `auditees` (
  `id_auditee` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lecturer_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` year(4) NOT NULL,
  `end_at` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `auditees`
--

INSERT INTO `auditees` (`id_auditee`, `lecturer_id`, `department_id`, `start_at`, `end_at`, `created_at`, `updated_at`) VALUES
('KJ01', '198001102008121001', 'FTI01', 2020, 2021, '2020-10-27 00:22:25', '2020-10-27 00:22:25'),
('KJ02', '198201182008121002', 'FTI02', 2020, 2021, '2020-10-27 00:22:41', '2020-10-27 00:22:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auditors`
--

CREATE TABLE `auditors` (
  `id_auditor` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `start_at` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `auditors`
--

INSERT INTO `auditors` (`id_auditor`, `status`, `start_at`, `created_at`, `updated_at`) VALUES
('198327072008121003', 1, 2020, '2020-10-27 00:20:34', '2020-10-27 00:20:34'),
('198410062012121001', 1, 2020, '2020-10-27 00:20:21', '2020-10-27 00:20:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `audits`
--

CREATE TABLE `audits` (
  `id_audit` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `audits`
--

INSERT INTO `audits` (`id_audit`, `periode_id`, `department_id`, `created_at`, `updated_at`) VALUES
('AD-1', '1', 'FTI02', '2020-10-27 00:19:17', '2020-10-27 00:19:17'),
('AD11', '1', 'FTI01', '2020-11-02 23:40:25', '2020-11-02 23:40:25'),
('AD3', '2', 'FTI01', '2020-11-02 02:42:27', '2020-11-02 02:42:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `audit_findings`
--

CREATE TABLE `audit_findings` (
  `id_audit_finding` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `audit_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `audit_findings`
--

INSERT INTO `audit_findings` (`id_audit_finding`, `audit_id`, `desc`, `created_at`, `updated_at`) VALUES
('TA11', 'AD-1', 'asdasdasdasd', '2020-10-27 03:47:39', '2020-10-27 03:47:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `audit_instruments`
--

CREATE TABLE `audit_instruments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `standard_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `audit_instruments`
--

INSERT INTO `audit_instruments` (`id`, `standard_id`, `periode_id`, `created_at`, `updated_at`) VALUES
(1, 'STD01', '1', '2020-10-27 00:10:22', '2020-10-27 00:10:22'),
(2, 'STD02', '1', '2020-10-27 00:10:28', '2020-10-27 00:10:28'),
(3, 'STD03', '1', '2020-10-27 00:10:32', '2020-10-27 00:10:32'),
(4, 'STD04', '1', '2020-10-27 00:10:37', '2020-10-27 00:10:37'),
(5, 'STD01', '2', '2020-10-27 00:10:43', '2020-10-27 00:10:43'),
(6, 'STD02', '1', '2020-10-27 00:10:49', '2020-10-27 00:10:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `audit_scores`
--

CREATE TABLE `audit_scores` (
  `id_audit_score` bigint(20) UNSIGNED NOT NULL,
  `question_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score_auditee` int(11) DEFAULT NULL,
  `score_auditor` int(11) DEFAULT NULL,
  `audit_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `audit_scores`
--

INSERT INTO `audit_scores` (`id_audit_score`, `question_id`, `score_auditee`, `score_auditor`, `audit_id`, `created_at`, `updated_at`) VALUES
(5, 'Q001', 2, 3, 'AD-1', '2020-10-27 03:15:02', '2020-10-27 03:15:49'),
(6, 'Q002', 3, 4, 'AD-1', '2020-10-27 03:15:07', '2020-10-27 03:15:54'),
(7, 'Q003', 4, 2, 'AD-1', '2020-10-27 03:15:12', '2020-10-27 03:15:59'),
(8, 'Q004', 3, 4, 'AD-1', '2020-10-27 03:15:17', '2020-10-27 03:16:13'),
(9, 'Q005', NULL, 3, 'AD-1', '2020-10-27 03:16:18', '2020-10-27 03:16:18'),
(10, 'Q006', NULL, 3, 'AD-1', '2020-10-27 22:20:46', '2020-10-27 22:20:46'),
(11, 'Q007', NULL, 4, 'AD-1', '2020-10-27 22:20:53', '2020-10-27 22:20:53'),
(12, 'Q008', NULL, 3, 'AD-1', '2020-10-27 22:21:00', '2020-10-27 22:21:00'),
(13, 'Q009', NULL, 4, 'AD-1', '2020-10-27 22:21:07', '2020-10-27 22:21:07'),
(14, 'Q010', NULL, 3, 'AD-1', '2020-10-27 22:21:14', '2020-10-27 22:21:14'),
(15, 'Q011', NULL, 4, 'AD-1', '2020-10-27 22:21:25', '2020-10-27 22:21:25'),
(16, 'Q012', NULL, 2, 'AD-1', '2020-10-27 22:21:32', '2020-10-27 22:21:32'),
(17, 'Q013', NULL, 4, 'AD-1', '2020-10-27 22:21:38', '2020-10-27 22:21:38'),
(18, 'Q014', NULL, 3, 'AD-1', '2020-10-27 22:21:44', '2020-10-27 22:21:44'),
(19, 'Q015', NULL, 4, 'AD-1', '2020-10-27 22:21:50', '2020-10-27 22:21:50'),
(20, 'Q016', NULL, 4, 'AD-1', '2020-10-27 22:21:56', '2020-10-27 22:21:56'),
(21, 'Q031', NULL, 3, 'AD-1', '2020-10-27 22:22:03', '2020-10-27 22:22:03'),
(22, 'Q032', NULL, 4, 'AD-1', '2020-10-27 22:22:09', '2020-10-27 22:22:09'),
(23, 'Q033', NULL, 3, 'AD-1', '2020-10-27 22:22:14', '2020-10-27 22:22:14'),
(24, 'Q034', NULL, 3, 'AD-1', '2020-10-27 22:22:20', '2020-10-27 22:22:20'),
(25, 'Q035', NULL, 3, 'AD-1', '2020-10-27 22:22:30', '2020-10-27 22:22:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `correction_forms`
--

CREATE TABLE `correction_forms` (
  `id_correction_form` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `audit_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `devience` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `correction_forms`
--

INSERT INTO `correction_forms` (`id_correction_form`, `audit_id`, `devience`, `causes`, `plan`, `date`, `created_at`, `updated_at`) VALUES
('22', 'AD-1', 'dasdased', 'dfsadfsa', 'fgsdfsdfr', NULL, '2020-10-29 23:37:35', '2020-10-30 00:22:34'),
('PTK1', 'AD-1', 'asdkasdas', NULL, NULL, NULL, '2020-10-29 23:37:26', '2020-10-29 23:37:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `deans`
--

CREATE TABLE `deans` (
  `id_dean` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lecturer_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` year(4) NOT NULL,
  `end_at` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `deans`
--

INSERT INTO `deans` (`id_dean`, `lecturer_id`, `faculty_id`, `start_at`, `end_at`, `created_at`, `updated_at`) VALUES
('DK01', '196307071991031003', 'FTI', 2021, 2024, '2020-10-27 00:22:07', '2020-10-27 00:22:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `departments`
--

CREATE TABLE `departments` (
  `id_department` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accreditation` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sk_num` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `departments`
--

INSERT INTO `departments` (`id_department`, `department_name`, `faculty_id`, `accreditation`, `sk_num`, `created_at`, `updated_at`) VALUES
('FTI01', 'Teknik Komputer', 'FTI', 'B', 'asdasdasasdasda', '2020-10-26 23:10:24', '2020-10-26 23:10:24'),
('FTI02', 'Sistem Informasi', 'FTI', 'B', 'ssdnadasjdasda', '2020-10-26 23:10:40', '2020-10-26 23:10:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `department_audits`
--

CREATE TABLE `department_audits` (
  `id_department_audit` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditor_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `audit_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `department_audits`
--

INSERT INTO `department_audits` (`id_department_audit`, `auditor_id`, `audit_id`, `created_at`, `updated_at`) VALUES
('1cc', '198327072008121003', 'AD3', '2020-11-02 02:43:51', '2020-11-02 02:43:51'),
('AD-02', '198410062012121001', 'AD-1', '2020-10-29 21:59:26', '2020-10-29 21:59:26'),
('AD01', '198327072008121003', 'AD-1', '2020-10-27 00:23:03', '2020-10-27 00:23:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faculties`
--

CREATE TABLE `faculties` (
  `id_faculty` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `faculties`
--

INSERT INTO `faculties` (`id_faculty`, `name`, `created_at`, `updated_at`) VALUES
('FTI', 'Fakultas Teknologi Infromasi', '2020-10-26 23:09:55', '2020-10-26 23:09:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `lecturers`
--

CREATE TABLE `lecturers` (
  `id_lecturer` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lecturers`
--

INSERT INTO `lecturers` (`id_lecturer`, `address`, `telephone`, `created_at`, `updated_at`) VALUES
('196307071991031003', 'Padang', '123456666', '2020-10-27 00:21:09', '2020-10-27 00:21:09'),
('198001102008121001', 'Padang', '12312312312', '2020-10-27 00:21:24', '2020-10-27 00:21:24'),
('198201182008121002', 'Padang', '312837123', '2020-10-27 00:21:38', '2020-10-27 00:21:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_19_165240_create_roles_table', 1),
(5, '2020_09_19_165613_add_relation_to_users_table', 1),
(23, '2020_09_19_165747_create_standards_table', 2),
(24, '2020_09_19_165816_create_standard_components_table', 2),
(25, '2020_09_19_165844_create_questions_table', 2),
(26, '2020_09_19_165938_create_score_details_table', 2),
(27, '2020_09_19_170041_create_faculties_table', 2),
(28, '2020_09_19_170126_create_departments_table', 2),
(29, '2020_09_19_170344_create_lecturers_table', 2),
(30, '2020_09_19_170411_create_auditors_table', 2),
(31, '2020_09_19_170431_create_deans_table', 2),
(32, '2020_09_19_170526_create_auditees_table', 2),
(33, '2020_09_19_170545_create_periodes_table', 2),
(34, '2020_09_19_170804_create_audit_instruments_table', 2),
(35, '2020_09_19_170820_create_audits_table', 2),
(36, '2020_09_19_170848_create_audit_scores_table', 2),
(37, '2020_09_19_170956_create_audit_findings_table', 2),
(38, '2020_09_19_171043_create_department_audits_table', 2),
(39, '2020_09_25_141737_create_correction_forms_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `periodes`
--

CREATE TABLE `periodes` (
  `id_periode` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `audit_start_at` date NOT NULL,
  `audit_end_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `periodes`
--

INSERT INTO `periodes` (`id_periode`, `audit_start_at`, `audit_end_at`, `created_at`, `updated_at`) VALUES
('1', '2020-10-01', '2020-11-30', '2020-10-26 23:11:11', '2020-10-26 23:11:11'),
('2', '2021-01-01', '2021-01-31', '2020-10-26 23:11:26', '2020-10-26 23:11:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `questions`
--

CREATE TABLE `questions` (
  `id_question` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `standard_component_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `questions`
--

INSERT INTO `questions` (`id_question`, `desc`, `standard_component_id`, `created_at`, `updated_at`) VALUES
('Q001', 'Ketua Program Studi bertanggungjawab terhadap visi, misi, tujuan, dan sasaran yang jelas, realistik, berorientasi kemasa depan, dan memiliki keterkaitan untuk dicapai dalam periode waktu tertentu.', 'KS1-1', '2020-10-26 23:20:40', '2020-10-26 23:20:40'),
('Q002', 'Ketua Program Studi dalam merumuskan Visi, misi, tujuan dan sasaran melibatkan pihak internal (dosen, tenaga kependidikan dan mahasiswa) dan pihak ekternal (alumni, pengguna lulusan, dan assosiasi/perhimpunan/konsorsium).', 'KS1-1', '2020-10-26 23:20:59', '2020-10-26 23:20:59'),
('Q003', 'Ketua Jurusan/ Ketua Program Studi memiliki rencana pengembangan jangka panjang, menengah dan pendek serta memiliki indikator kinerja utama dan tambahan dengan target untuk mencapai sasaran strategis yang berorientasi internasional.', 'KS1-2', '2020-10-26 23:21:15', '2020-10-26 23:21:15'),
('Q004', 'Ketua Jurusan/ Ketua Program Studi mensosialisasikan visi, misi, tujuan, dan sasaran kepada pemangku kepentingan melalui berbagai media dan mengukur tingkat pemahamannya melalui survei secara berkala.', 'KS1-3', '2020-10-26 23:21:37', '2020-10-26 23:21:37'),
('Q005', 'Ketua Jurusan/ Ketua Program Studi melakukan analisis dan evaluasi terhadap capain standar dengan menggunakan metode yang tepat dan konsisten yang terdokumentasi dengan baik.', 'KS1-3', '2020-10-26 23:21:56', '2020-10-26 23:21:56'),
('Q006', 'Ketua Program Studi mampu: 1. Mengidentifikasi kondsi lingkungan yang relevan, komprehensif, dan strategis, 2. Menetapkan posisi perguruan tinggi relatif terhadap lingkungannya, 3. Menggunakan hasil identifikasi dan posisi yang ditetapkan untuk melakukan SWOT/analisis lain yang relevan, dan 4. Menghasilkan program pengembangan yang konsisiten dengan hasil analisis SWOT/analisis lain yang digunakan.', 'KS1-3', '2020-10-26 23:22:09', '2020-10-26 23:22:09'),
('Q007', 'Ketua Program Studi memiliki dokumen formal sistem tata pamong yang legal yang dijabarkan kedalam berbagai kebijakan dan peraturan yang digunakan secara konsisten, efektf dan efesien sesui konteks institusi serta menjamin akuntabilitas, keberlanjutan, transparansi, dan mitigasi potensi risiko.', 'KS2-1', '2020-10-26 23:47:15', '2020-10-26 23:47:15'),
('Q008', 'Ketua Program Studi memiliki dokumen yang sahih (kebijakan dan peraturan) guna menjamin integritas dan kualitas institusi yang dilaksanakan secara konsisten, efektif dan efesien.', 'KS2-1', '2020-10-26 23:48:50', '2020-10-26 23:48:50'),
('Q009', 'Ketua Program Studi memiliki dokumen legal dan formal struktur organisasi dan tata kerja institusi yang dilengkapi tugas dan fungsi guna menjamin terlaksananya fungsi perguruan tinggi secara konsisiten, efektif dan efesien.', 'KS2-1', '2020-10-26 23:50:12', '2020-10-26 23:50:12'),
('Q010', 'Ketua Program Studi memiliki bukti yang sahih terkait praktek baik perwujudan Good University Governance (GUG) mencakup aspek: kredibilitas, transparansi, akuntabilitas, tanggung jawab, keadilan, dan manajemen resiko  secara konsisiten, efektif dan efesien.', 'KS2-1', '2020-10-26 23:50:44', '2020-10-26 23:50:44'),
('Q011', 'Ketua Program Studi memiliki mekanisme yang sepenuhnya melaksanakan atau fungsi yang berjalan dalam peneggakan kode etik untuk menjamin tata nilai dan integritas secara konsisiten, efektf dan efesien.', 'KS2-1', '2020-10-26 23:51:00', '2020-10-26 23:51:00'),
('Q012', 'Ketua Jurusan/Ketua Program Studi memiliki karakteristik kepemimpian operasional, kepemimpinan organisasi, dan kepemimpinan publik.', 'KS2-2', '2020-10-27 00:04:15', '2020-10-27 00:04:15'),
('Q013', 'Ketua Program Studi memiliki dokumen formal penetapan personil berbagai tingkat manajemen dengan tugas dan tanggung jawab yang jelas, rinci, dan konsisten terhadap visi, misi, dan budaya serta tujuan strategis institusi.', 'KS2-2', '2020-10-27 00:04:27', '2020-10-27 00:04:27'),
('Q014', 'Ketua Program Studi memiliki bukti yang terdokumentasi dan sahih terkait terjalinnya komunikasi yang baik antara pimpinan dan stakeholders internal yang dilakukan secara terprogram dan intensif untuk mendorong tercapainya visi, misi, budaya, dan tujuan strategis institusi.', 'KS2-2', '2020-10-27 00:05:05', '2020-10-27 00:05:05'),
('Q015', 'Ketua Program Studi memiliki bukti yang terdokumentasi dan sahih tentang telaah yang komprehensif dan perbaikan secara efektif terhadap pelaksanaan kepemimpinan dan personil pada berbagai tingkatan manajemen untuk mencapai kinerja organisasi yang direncanakan.', 'KS2-2', '2020-10-27 00:05:22', '2020-10-27 00:05:22'),
('Q016', 'Ketua Program Studi memiliki dokumen formal penetapan personil berbagai tingkat manajemen dengan tugas dan tanggung jawab yang jelas, rinci, dan konsisten terhadap visi, misi, dan budaya serta tujuan strategis institusi.', 'KS2-2', '2020-10-27 00:05:39', '2020-10-27 00:05:39'),
('Q031', 'Ketua Jurusan/Ketua Program Studi mensosialisasikan Kode etik mahasiswa dengan baik.', 'KS3-3', '2020-10-27 00:07:41', '2020-10-27 00:07:41'),
('Q032', 'Ketua Program Studi memiliki dokumen formal kebijakan dan prosedur, yang komprehensif, rinci, terkini, dan mudah diakses oleh pemangku kepentingan, tentang pengembangan jejaring dan kemintraan (dalam dan luar negri) termasuk bagaimana melakukan monitoring dan evaluasi kepuasan mitra kerjasama.', 'KS4-1', '2020-10-27 00:09:27', '2020-10-27 00:09:27'),
('Q033', 'Ketua Program Studi memiliki dokumen perencanaan pengembangan jejaring dan kemitraan yang sahih dan terarah guna mencapai visi, misi, dan tujuan strategis institusi.', 'KS4-1', '2020-10-27 00:09:39', '2020-10-27 00:09:39'),
('Q034', 'Ketua Program Studi memiliki jejaring dan mitra kerjasama yang relevan dengan VMTS dan bermanfaat bagi pengembangan tridharma institusi yang mencakup kerjasama lokal/wilayah , nasional, dan internasional.', 'KS4-1', '2020-10-27 00:09:48', '2020-10-27 00:09:48'),
('Q035', 'Ketua Program Studi memiliki bukti monitoring dan evaluasi pelaksanaan program kemitraan dan tingkat kepuasan mitra kerjasama yang diukur dengan instrumen, serta perbaikan mutu jejaring dan kemitraan yang berkelanjutan, untukmenjamin terwujudnyaisi, terlaksananya misi dan tercapainya tujuan strategis.', 'KS4-1', '2020-10-27 00:10:01', '2020-10-27 00:10:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Auditor', NULL, NULL),
(3, 'Auditee', NULL, NULL),
(4, 'Dekan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `score_details`
--

CREATE TABLE `score_details` (
  `id_score_detail` bigint(6) NOT NULL,
  `question_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `score_details`
--

INSERT INTO `score_details` (`id_score_detail`, `question_id`, `score`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'Q001', 0, 'Tidak ada nilai nol', '2020-10-26 23:29:08', '2020-10-26 23:29:08'),
(2, 'Q001', 1, 'Visi, misi, tujuan dan sasaran yang: (1)Tidak jelas. (2)Tidak realistik. (3)Tidak terkait satu sama lain. (4) Tidak ada waktu pencapaian.', '2020-10-26 23:29:48', '2020-10-26 23:29:48'),
(3, 'Q001', 2, 'Visi, misi, tujuan dan sasaran yang: (1)Cukup jelas. (2)Cukup realistik. (3)Kurang terkait satu sama lain. (4) Tidak ada waktu yang spesifik', '2020-10-26 23:30:11', '2020-10-26 23:30:11'),
(4, 'Q001', 3, 'Visi, misi, tujuan dan sasaran yang: (1)Jelas. (2)Realistik. (3)Saling terkait satu sama lain. (4) Dicapai dalam periode waktu tertentu', '2020-10-26 23:30:39', '2020-10-26 23:30:39'),
(5, 'Q001', 4, 'Visi, misi, tujuan dan sasaran yang: (1)Sangat jelas. (2)Sangat realistik. (3)Saling terkait satu sama lain. (4) Dicapai dalam periode waktu tertentu.', '2020-10-26 23:30:50', '2020-10-26 23:30:50'),
(6, 'Q002', 0, 'Hanya melibatkan dosen dan mahasiswa', '2020-10-26 23:32:15', '2020-10-26 23:32:15'),
(7, 'Q002', 1, 'Telah melibatkan dosen, tenaga kependidikan, dan mahasiswa', '2020-10-26 23:32:27', '2020-10-26 23:32:27'),
(8, 'Q002', 2, 'Telah melibatkan dosen, tenaga kependidikan, mahasiswa, dan alumni', '2020-10-26 23:32:37', '2020-10-26 23:32:37'),
(9, 'Q002', 3, 'Telah melibatkan dosen, tenaga kependidikan, mahasiswa, alumni dan pengguna lulusan', '2020-10-26 23:32:46', '2020-10-26 23:32:46'),
(10, 'Q002', 4, 'Dalam permusan Visi, misi, tujuan dan sasaran telah melibatkan semua pihak baik internal (dosen, tenaga kependidikan dan mahasiswa) maupun ekternal (alumni, pengguna lulusan, dan asosisasi/petrhimpunan/konsorsium)', '2020-10-26 23:32:54', '2020-10-26 23:32:54'),
(11, 'Q003', 0, 'Memiliki rencana pengembangan jangka panjang, menegah dan pendek', '2020-10-26 23:36:16', '2020-10-26 23:36:16'),
(12, 'Q003', 1, 'Memiliki rencana pengembangan jangka panjang, menegah dan pendek serta belum memiliki indikator kinerja utama dan tambahan dengan target pencapaian sasaran startegi', '2020-10-26 23:36:26', '2020-10-26 23:36:26'),
(13, 'Q003', 2, 'Memiliki rencana pengembangan jangka panjang, menegah dan pendek serta memiliki indikator kinerja utama dan tambahan dengan target pencapaian sasaran startegis yang tidak memiliki orientasi', '2020-10-26 23:36:34', '2020-10-26 23:36:34'),
(14, 'Q003', 3, 'Memiliki rencana pengembangan jangka panjang, menegah dan pendek serta memiliki indikator kinerja utama dan tambahan dengan target pencapaian sasaran startegis yang berorientasi nasional', '2020-10-26 23:36:45', '2020-10-26 23:36:45'),
(15, 'Q003', 4, 'Memiliki rencana pengembangan jangka panjang, menegah dan pendek serta memiliki indikator kinerja utama dan tambahan dengan target pencapaian sasaran startegis yang berorientasi internasional', '2020-10-26 23:36:52', '2020-10-26 23:36:52'),
(16, 'Q004', 0, 'Tidak pernah Mensosialisasikan visi, misi, tujuan, dan sasaran kepada pemangku kepentingan', '2020-10-26 23:37:15', '2020-10-26 23:37:15'),
(17, 'Q004', 1, 'Mensosialisasikan visi, misi, tujuan, dan sasaran kepada pemangku kepentingan melalui media terbatas', '2020-10-26 23:37:22', '2020-10-26 23:37:22'),
(18, 'Q004', 2, 'Mensosialisasikan visi, misi, tujuan, dan sasaran kepada pemangku kepentingan melalui berbagai media dan tidak mengukur tingkat pemahamannya melalui survei.', '2020-10-26 23:37:30', '2020-10-26 23:37:30'),
(19, 'Q004', 3, 'Mensosialisasikan visi, misi, tujuan, dan sasaran kepada pemangku kepentingan melalui berbagai media dan mengukur tingkat pemahamannya melalui survei yang tidak menentu.', '2020-10-26 23:37:39', '2020-10-26 23:37:39'),
(20, 'Q004', 4, 'Mensosialisasikan visi, misi, tujuan, dan sasaran kepada pemangku kepentingan melalui berbagai media dan mengukur tingkat pemahamannya melalui survei secara berkala.', '2020-10-26 23:37:47', '2020-10-26 23:37:47'),
(21, 'Q005', 0, 'Tidak pernah melakukan analisis dan evaluasi terhadap capain standar.', '2020-10-26 23:38:08', '2020-10-26 23:38:08'),
(22, 'Q005', 1, 'melakukan analisis dan evaluasi terhadap capain standar dengan tidak menggunakan metode yang tepat dan konsisiten.', '2020-10-26 23:38:16', '2020-10-26 23:38:16'),
(23, 'Q005', 2, 'melakukan analisis dan evaluasi terhadap capain standar dengan menggunakan metode yang tepat dan tidak konsisiten.', '2020-10-26 23:38:24', '2020-10-26 23:38:24'),
(24, 'Q005', 3, 'melakukan analisis dan evaluasi terhadap capain standar dengan menggunakan metode yang tepat dan konsisten yang belum terdokumentasi dengan baik.', '2020-10-26 23:38:30', '2020-10-26 23:38:30'),
(25, 'Q005', 4, 'melakukan analisis dan evaluasi terhadap capain standar dengan menggunakan metode yang tepat dan konsisten yang terdokumentasi dengan baik.', '2020-10-26 23:38:39', '2020-10-26 23:38:39'),
(26, 'Q006', 0, 'Tidak ada dilakukan', '2020-10-26 23:39:02', '2020-10-26 23:39:02'),
(27, 'Q006', 1, 'mampu: 1. Mengidentifikasi kondsi lingkungan yang relevan, komprehensif, dan strategis, 2. Menetapkan posisi perguruan tinggi relatif terhadap lingkungannya, tetapi tidak melakukan SWOT/analisis lain yang relevan', '2020-10-26 23:39:11', '2020-10-26 23:39:11'),
(28, 'Q006', 2, 'mampu: 1. Mengidentifikasi kondsi lingkungan yang relevan, komprehensif, dan strategis, 2. Menetapkan posisi perguruan tinggi relatif terhadap lingkungannya, 3. Menggunakan hasil identifikasi dan posisi yang ditetapkan untuk melakukan SWOT/analisis lain yang relevan, dan 4. tidak ada program pengembangan.', '2020-10-26 23:39:19', '2020-10-26 23:39:19'),
(29, 'Q006', 3, 'mampu: 1. Mengidentifikasi kondsi lingkungan yang relevan, komprehensif, dan strategis, 2. Menetapkan posisi perguruan tinggi relatif terhadap lingkungannya, 3. Menggunakan hasil identifikasi dan posisi yang ditetapkan untuk melakukan SWOT/analisis lain yang relevan, dan 4. Menghasilkan program pengembangan yang tidak konsisiten dengan hasil analisis SWOT/analisis lain yang digunakan.', '2020-10-26 23:39:30', '2020-10-26 23:39:30'),
(30, 'Q006', 4, 'mampu: 1. Mengidentifikasi kondsi lingkungan yang relevan, komprehensif, dan strategis, 2. Menetapkan posisi perguruan tinggi relatif terhadap lingkungannya, 3. Menggunakan hasil identifikasi dan posisi yang ditetapkan untuk melakukan SWOT/analisis lain yang relevan, dan 4. Menghasilkan program pengembangan yang konsisiten dengan hasil analisis SWOT/analisis lain yang digunakan.', '2020-10-26 23:39:37', '2020-10-26 23:39:37'),
(31, 'Q007', 0, 'belum memiliki dokumen tata pamong yang legal.', '2020-10-26 23:47:34', '2020-10-26 23:47:34'),
(32, 'Q007', 1, 'memiliki dokumen formal sistem tata pamong yang legal belum dijabarkan kedalam berbagai kebijakan dan peraturan.', '2020-10-26 23:47:46', '2020-10-26 23:47:46'),
(33, 'Q007', 2, 'memiliki dokumen formal sistem tata pamong yang legal yang dijabarkan kedalam berbagai kebijakan dan peraturan yang digunakan sesui konteks institusi serta menjamin akuntabilitas, keberlanjutan, transparansi, dan mitigasi potensi risiko.', '2020-10-26 23:47:53', '2020-10-26 23:47:53'),
(34, 'Q007', 3, 'memiliki dokumen formal sistem tata pamong yang legal yang dijabarkan kedalam berbagai kebijakan dan peraturan yang digunakan secara konsisten sesui konteks institusi serta menjamin akuntabilitas, keberlanjutan, transparansi, dan mitigasi potensi risiko.', '2020-10-26 23:48:00', '2020-10-26 23:48:00'),
(35, 'Q007', 4, 'memiliki dokumen formal sistem tata pamong yang legal yang dijabarkan kedalam berbagai kebijakan dan peraturan yang digunakan secara konsisten, efektf dan efesien sesui konteks institusi serta menjamin akuntabilitas, keberlanjutan, transparansi, dan mitigasi potensi risiko.', '2020-10-26 23:48:07', '2020-10-26 23:48:07'),
(36, 'Q008', 0, 'belum memiliki dokumen (kebijakan dan peraturan) guna menjamin integritas dan kualitas institusi.', '2020-10-26 23:49:13', '2020-10-26 23:49:13'),
(37, 'Q008', 1, 'memiliki dokumen yang tidak sahih (kebijakan dan peraturan) guna menjamin integritas dan kualitas institusi.', '2020-10-26 23:49:22', '2020-10-26 23:49:22'),
(38, 'Q008', 2, 'memiliki dokumen yang sahih (kebijakan dan peraturan) guna menjamin integritas dan kualitas institusi.', '2020-10-26 23:49:29', '2020-10-26 23:49:29'),
(39, 'Q008', 3, 'memiliki dokumen yang sahih (kebijakan dan peraturan) guna menjamin integritas dan kualitas institusi yang dilaksanakan secara konsisten.', '2020-10-26 23:49:36', '2020-10-26 23:49:36'),
(40, 'Q008', 4, 'memiliki dokumen yang sahih (kebijakan dan peraturan) guna menjamin integritas dan kualitas institusi yang dilaksanakan secara konsisten, efektif dan efesien.', '2020-10-26 23:49:45', '2020-10-26 23:49:45'),
(41, 'Q009', 0, 'belum memiliki dokumen legal dan formal struktur organisasi dan tata kerja institusi.', '2020-10-26 23:51:21', '2020-10-26 23:51:21'),
(42, 'Q009', 1, 'memiliki dokumen legal dan formal struktur organisasi dan tata kerja institusi namun belum dilengkapi tugas dan fungsi belum menjamin terlaksananya fungsi perguruan tinggi.', '2020-10-26 23:51:34', '2020-10-26 23:51:34'),
(43, 'Q009', 2, 'memiliki dokumen legal dan formal struktur organisasi dan tata kerja institusi yang dilengkapi tugas dan fungsi belum menjamin terlaksananya fungsi perguruan tinggi.', '2020-10-26 23:51:41', '2020-10-26 23:51:41'),
(44, 'Q009', 3, 'memiliki dokumen legal dan formal struktur organisasi dan tata kerja institusi yang dilengkapi tugas dan fungsi belum menjamin terlaksananya fungsi perguruan tinggi secara konsisiten.', '2020-10-26 23:51:48', '2020-10-26 23:51:48'),
(45, 'Q009', 4, 'memiliki dokumen legal dan formal struktur organisasi dan tata kerja institusi yang dilengkapi tugas dan fungsi guna menjamin terlaksananya fungsi perguruan tinggi secara konsisiten, efektif dan efesien.', '2020-10-26 23:51:54', '2020-10-26 23:51:54'),
(46, 'Q010', 0, 'belum memiliki bukti yang sahih terkait praktek baik perwujudan Good university governance (GUG) mencakup 7 aspek di bawah ini: kredibilitas, transparansi, akuntabilitas, tanggung jawab, keadilan, dan manajemen resiko.', '2020-10-26 23:52:24', '2020-10-26 23:52:24'),
(47, 'Q010', 1, 'memiliki bukti yang sahih terkait praktek baik perwujudan Good university governance (GUG) namun hanya mencakup beberapa aspek di bawah ini: kredibilitas, transparansi, akuntabilitas, tanggung jawab, keadilan, dan manajemen resiko.', '2020-10-26 23:52:32', '2020-10-26 23:52:32'),
(48, 'Q010', 2, 'memiliki bukti yang sahih terkait praktek baik perwujudan Good university governance (GUG) mencakup 7 aspek di bawah ini: kredibilitas, transparansi, akuntabilitas, tanggung jawab, keadilan, dan manajemen resiko.', '2020-10-26 23:52:38', '2020-10-26 23:52:38'),
(49, 'Q010', 3, 'memiliki bukti yang sahih terkait praktek baik perwujudan Good university governance (GUG) mencakup 7 aspek di bawah ini: kredibilitas, transparansi, akuntabilitas, tanggung jawab, keadilan, dan manajemen resiko  secara konsisiten.', '2020-10-26 23:52:45', '2020-10-26 23:52:45'),
(50, 'Q010', 4, 'memiliki bukti yang sahih terkait praktek baik perwujudan Good university governance (GUG) mencakup aspek: kredibilitas, transparansi, akuntabilitas, tanggung jawab, keadilan, dan manajemen resiko  secara konsisiten, efektif dan efesien.', '2020-10-26 23:52:52', '2020-10-26 23:52:52'),
(51, 'Q011', 0, 'belum memiliki mekanisme/fungsi yang berjalan dalam peneggakan kode etik untuk menjamin tata nilai dan integritas.', '2020-10-26 23:53:29', '2020-10-26 23:53:29'),
(52, 'Q011', 1, 'memiliki mekanisme yang tidak sepenuhnya melaksanakan atau fungsi yang tidak berjalan dalam peneggakan kode etik untuk menjamin tata nilai dan integritas.', '2020-10-26 23:53:38', '2020-10-26 23:53:38'),
(53, 'Q011', 2, 'memiliki mekanisme yang sepenuhnya melaksanakan atau fungsi yang berjalan dalam peneggakan kode etik untuk menjamin tata nilai dan integritas.', '2020-10-26 23:53:47', '2020-10-26 23:53:47'),
(54, 'Q011', 3, 'memiliki mekanisme yang sepenuhnya melaksanakan atau fungsi yang berjalan dalam peneggakan kode etik untuk menjamin tata nilai dan integritas belum dilakuakn secara konsisiten.', '2020-10-26 23:54:00', '2020-10-26 23:54:00'),
(55, 'Q011', 4, 'memiliki mekanisme yang sepenuhnya melaksanakan atau fungsi yang berjalan dalam peneggakan kode etik untuk menjamin tata nilai dan integritas secara konsisiten, efektf dan efesien.', '2020-10-26 23:54:07', '2020-10-26 23:54:07'),
(56, 'Q031', 0, 'Tidak ada nilai nol.', '2020-10-27 00:07:57', '2020-10-27 00:07:57'),
(57, 'Q031', 1, 'Kode etik tidak pernah disosialisasikan pada mahasiswa.', '2020-10-27 00:08:04', '2020-10-27 00:08:04'),
(58, 'Q031', 2, 'Kode etik telah disosialisasikan pada saat penerimaan mahasiswa baru.', '2020-10-27 00:08:12', '2020-10-27 00:08:12'),
(59, 'Q031', 3, 'Kode etik telah disosialisasikan ke seluruh mahasiswa secara tidak berkala.', '2020-10-27 00:08:22', '2020-10-27 00:08:22'),
(60, 'Q031', 4, 'Kode etik telah disosialisasikan ke seluruh mahasiswa secara berkala.', '2020-10-27 00:08:29', '2020-10-27 00:08:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `standards`
--

CREATE TABLE `standards` (
  `id_standard` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `standards`
--

INSERT INTO `standards` (`id_standard`, `name`, `created_at`, `updated_at`) VALUES
('STD01', 'Standar 1: VISI dan MISI', '2020-10-26 23:12:30', '2020-10-26 23:12:30'),
('STD02', 'Standar 2: Tata Kelola', '2020-10-26 23:12:50', '2020-10-26 23:12:50'),
('STD03', 'Standar 3: Kode Etik', '2020-10-26 23:13:06', '2020-10-26 23:13:06'),
('STD04', 'Standar 4: Kerjasama', '2020-10-26 23:13:21', '2020-10-26 23:13:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `standard_components`
--

CREATE TABLE `standard_components` (
  `id_standard_component` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `standard_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `standard_components`
--

INSERT INTO `standard_components` (`id_standard_component`, `desc`, `standard_id`, `created_at`, `updated_at`) VALUES
('KS1-1', 'Komponen Standar 1.1: Standar Visi, Misi, Tujuan dan Sasaran (VMTS)', 'STD01', '2020-10-26 23:19:14', '2020-10-26 23:19:14'),
('KS1-2', 'Komponen Standar 1.2: Standar Sasaran, Strategis dan Program serta Indikator Kinerja', 'STD01', '2020-10-26 23:19:40', '2020-10-26 23:19:40'),
('KS1-3', 'Komponen Standar 1.3: Standar Sosialisasi dan Evaluasi', 'STD01', '2020-10-26 23:19:56', '2020-10-26 23:19:56'),
('KS2-1', 'Komponen  Standar 2.1: Sistem Tata Pamong', 'STD02', '2020-10-26 23:42:12', '2020-10-26 23:42:12'),
('KS2-2', 'Komponen  Standar 2.2: Standar Kepemimpinan', 'STD02', '2020-10-26 23:42:34', '2020-10-26 23:42:34'),
('KS2-3', 'Komponen  Standar 2.3: Standar Sistem Pengelolaan', 'STD02', '2020-10-26 23:42:59', '2020-10-26 23:42:59'),
('KS2-4', 'Komponen  Standar 2.4: Standar Penjaminan Mutu', 'STD02', '2020-10-26 23:43:25', '2020-10-26 23:43:25'),
('KS2-5', 'Komponen  Standar 2.5: Standar Umpan Balik Pihak Berkepentingan (Stakeholders)', 'STD02', '2020-10-26 23:43:47', '2020-10-26 23:43:47'),
('KS2-6', 'Komponen  Standar 2.6: Standar Keberlanjutan', 'STD02', '2020-10-26 23:44:07', '2020-10-26 23:44:07'),
('KS3-1', 'Komponen  Standar 3.1: Standar Kode Etik Dosen', 'STD03', '2020-10-27 00:06:52', '2020-10-27 00:06:52'),
('KS3-2', 'Komponen  Standar 3.2: Standar Kode Etik Tenaga Kependidikan', 'STD03', '2020-10-27 00:07:09', '2020-10-27 00:07:09'),
('KS3-3', 'Komponen  Standar 3.3: Standar Kode Etik Mahasiswa', 'STD03', '2020-10-27 00:07:19', '2020-10-27 00:07:19'),
('KS4-1', 'Komponen  Standar 4.1: Standar Lingkup Kerjasama', 'STD04', '2020-10-27 00:09:01', '2020-10-27 00:09:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
('123456789987654', 'Dira', 'diranda', 'diranda@gmail.com', NULL, '$2y$10$qNFpV63GgUW0TEtf7g2oGuJYo250A2/zM1AjeEx94dT.p9C.94.ei', 1, NULL, '2020-10-24 03:40:15', '2020-10-24 03:40:15'),
('18232434989843899823289', 'admin1', 'admin1', 'admin1@gmail.com', NULL, '$2y$10$2gQiHU38aXesYP1rksMpX.xAoJ2naDILGV3FpobgPKyDZ.Lj4c536', 1, 'uFKj4f8vmHKGLu6XTRaLrGtb7Z6354NkEy3i1pHIy9XlMUpuQ9HqRaJqRqis', '2020-10-09 23:21:14', '2020-10-09 23:21:14'),
('196107161986031005', 'Prof. Dr. Ir. James Hellyward, M.S.', 'DekanFaperta', 'sekretariat.faperta@unand.ac.id', NULL, '$2y$10$TUmYM0YmRX0rEG9cSQGGr.eyW26uI9NXVt0gXVxrHun0ZxGgqN9ym', 4, NULL, '2020-10-07 08:17:37', '2020-10-07 08:17:37'),
('196307071991031003', 'Dr. Ahmad Syafruddin Indrapriyatna, M.T.', 'dekanFTI', 'sekretariat.fti@unand.ac.id', NULL, '$2y$10$dobVaNgfNvjMOkwSUmTDjOSpmNa7uJwQjDx7fRRA9VTsgu0HprQmm', 4, NULL, '2020-10-07 08:19:03', '2020-10-07 08:19:03'),
('197503082000031002', 'Prof. Ikhwana Elfitri, Ph.D.', 'dekanFT', 'sekretariat.ft@unand.ac.id', NULL, '$2y$10$H8oxvcgAUiIpkxTQvH.K8eovQEJHUlb/hSCn3hxqPQ/HqzPYmPHo6', 4, NULL, '2020-10-07 08:19:56', '2020-10-07 08:19:56'),
('197503232012121001', 'Haris Suryamen, M.Sc.', 'harisSuryamen', 'haris.fti@unand.ac.id', NULL, '$2y$10$eIHdB0ZrqQ1O3/qeO7m.ge5php/FqCiSOoyIyeQWjbzdygg3BT5G6', 2, NULL, '2020-10-07 08:24:17', '2020-10-07 08:24:17'),
('198001102008121001', 'Fajril Akbar, M.Sc.', 'fajrilAkbar', 'fajril.fti@unand.ac.id', NULL, '$2y$10$HnhZPAMqZlnoGM0oXC1JmOykRbh675x9PglW8v5/JxHJduXh446fu', 3, NULL, '2020-10-07 08:21:11', '2020-10-07 08:21:11'),
('198201182008121002', 'Husnil Kamil, M.T.', 'husnilKamil', 'husnil.fti@unand.ac.id', NULL, '$2y$10$7J5.iz35ryjEKKG1oVT9JuDTkB0aRKwW2hm8EoYlALgdINP6Og4YO', 3, NULL, '2020-10-07 08:22:57', '2020-10-07 08:22:57'),
('198327072008121003', 'Hasdi Putra, MT', 'hasdiPutra', 'hasdi.fti@unand.ac.id', NULL, '$2y$10$SA.saqLkzhumDc2/wY0G0e/UGa09CTF3vG0211SLBHEROeSlMP4y6', 2, NULL, '2020-10-07 08:23:38', '2020-10-07 08:23:38'),
('198410062012121001', 'Ricky Akbar, M.Kom', 'rickyAkbar', 'ricky.fti@unand.ac.id', NULL, '$2y$10$mLAUz4jiFAVga4jpDKXqHuGq6lPMYXdnytDkvRHdiftlWBY3haE/W', 2, NULL, '2020-10-07 08:24:59', '2020-10-07 08:24:59');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auditees`
--
ALTER TABLE `auditees`
  ADD PRIMARY KEY (`id_auditee`),
  ADD KEY `auditees_lecturer_id_foreign` (`lecturer_id`),
  ADD KEY `auditees_department_id_foreign` (`department_id`);

--
-- Indeks untuk tabel `auditors`
--
ALTER TABLE `auditors`
  ADD PRIMARY KEY (`id_auditor`);

--
-- Indeks untuk tabel `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id_audit`),
  ADD KEY `audits_periode_id_foreign` (`periode_id`),
  ADD KEY `audits_department_id_foreign` (`department_id`);

--
-- Indeks untuk tabel `audit_findings`
--
ALTER TABLE `audit_findings`
  ADD PRIMARY KEY (`id_audit_finding`),
  ADD KEY `audit_findings_audit_id_foreign` (`audit_id`);

--
-- Indeks untuk tabel `audit_instruments`
--
ALTER TABLE `audit_instruments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audit_instruments_standard_id_foreign` (`standard_id`),
  ADD KEY `audit_instruments_periode_id_foreign` (`periode_id`);

--
-- Indeks untuk tabel `audit_scores`
--
ALTER TABLE `audit_scores`
  ADD PRIMARY KEY (`id_audit_score`),
  ADD KEY `audit_scores_question_id_foreign` (`question_id`),
  ADD KEY `audit_scores_audit_id_foreign` (`audit_id`);

--
-- Indeks untuk tabel `correction_forms`
--
ALTER TABLE `correction_forms`
  ADD PRIMARY KEY (`id_correction_form`),
  ADD KEY `correction_forms_audit_id_foreign` (`audit_id`);

--
-- Indeks untuk tabel `deans`
--
ALTER TABLE `deans`
  ADD PRIMARY KEY (`id_dean`),
  ADD KEY `deans_lecturer_id_foreign` (`lecturer_id`),
  ADD KEY `deans_faculty_id_foreign` (`faculty_id`);

--
-- Indeks untuk tabel `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id_department`),
  ADD UNIQUE KEY `departments_sk_num_unique` (`sk_num`) USING HASH,
  ADD KEY `departments_faculty_id_foreign` (`faculty_id`);

--
-- Indeks untuk tabel `department_audits`
--
ALTER TABLE `department_audits`
  ADD PRIMARY KEY (`id_department_audit`),
  ADD KEY `department_audits_auditor_id_foreign` (`auditor_id`),
  ADD KEY `department_audits_audit_id_foreign` (`audit_id`);

--
-- Indeks untuk tabel `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id_faculty`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id_lecturer`),
  ADD UNIQUE KEY `lecturers_telephone_unique` (`telephone`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `periodes`
--
ALTER TABLE `periodes`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indeks untuk tabel `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `questions_standard_component_id_foreign` (`standard_component_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `score_details`
--
ALTER TABLE `score_details`
  ADD PRIMARY KEY (`id_score_detail`),
  ADD KEY `score_details_question_id_foreign` (`question_id`);

--
-- Indeks untuk tabel `standards`
--
ALTER TABLE `standards`
  ADD PRIMARY KEY (`id_standard`);

--
-- Indeks untuk tabel `standard_components`
--
ALTER TABLE `standard_components`
  ADD PRIMARY KEY (`id_standard_component`),
  ADD KEY `standard_components_standard_id_foreign` (`standard_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `audit_instruments`
--
ALTER TABLE `audit_instruments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `audit_scores`
--
ALTER TABLE `audit_scores`
  MODIFY `id_audit_score` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `score_details`
--
ALTER TABLE `score_details`
  MODIFY `id_score_detail` bigint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auditees`
--
ALTER TABLE `auditees`
  ADD CONSTRAINT `auditees_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id_department`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auditees_lecturer_id_foreign` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id_lecturer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auditors`
--
ALTER TABLE `auditors`
  ADD CONSTRAINT `auditors_id_auditor_foreign` FOREIGN KEY (`id_auditor`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `audits`
--
ALTER TABLE `audits`
  ADD CONSTRAINT `audits_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id_department`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `audits_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periodes` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `audit_findings`
--
ALTER TABLE `audit_findings`
  ADD CONSTRAINT `audit_findings_audit_id_foreign` FOREIGN KEY (`audit_id`) REFERENCES `audits` (`id_audit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `audit_instruments`
--
ALTER TABLE `audit_instruments`
  ADD CONSTRAINT `audit_instruments_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periodes` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `audit_instruments_standard_id_foreign` FOREIGN KEY (`standard_id`) REFERENCES `standards` (`id_standard`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `audit_scores`
--
ALTER TABLE `audit_scores`
  ADD CONSTRAINT `audit_scores_audit_id_foreign` FOREIGN KEY (`audit_id`) REFERENCES `audits` (`id_audit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `audit_scores_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `correction_forms`
--
ALTER TABLE `correction_forms`
  ADD CONSTRAINT `correction_forms_audit_id_foreign` FOREIGN KEY (`audit_id`) REFERENCES `audits` (`id_audit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `deans`
--
ALTER TABLE `deans`
  ADD CONSTRAINT `deans_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id_faculty`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deans_lecturer_id_foreign` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id_lecturer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id_faculty`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `department_audits`
--
ALTER TABLE `department_audits`
  ADD CONSTRAINT `department_audits_audit_id_foreign` FOREIGN KEY (`audit_id`) REFERENCES `audits` (`id_audit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `department_audits_auditor_id_foreign` FOREIGN KEY (`auditor_id`) REFERENCES `auditors` (`id_auditor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lecturers`
--
ALTER TABLE `lecturers`
  ADD CONSTRAINT `lecturers_id_lecturer_foreign` FOREIGN KEY (`id_lecturer`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_standard_component_id_foreign` FOREIGN KEY (`standard_component_id`) REFERENCES `standard_components` (`id_standard_component`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `score_details`
--
ALTER TABLE `score_details`
  ADD CONSTRAINT `score_details_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `standard_components`
--
ALTER TABLE `standard_components`
  ADD CONSTRAINT `standard_components_standard_id_foreign` FOREIGN KEY (`standard_id`) REFERENCES `standards` (`id_standard`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
