-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 11 Des 2017 pada 06.21
-- Versi Server: 5.6.21-log
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sippa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `grocery_galleries`
--

CREATE TABLE IF NOT EXISTS `grocery_galleries` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `thumbnail` varchar(30) NOT NULL,
  `input_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `grocery_galleries`
--

INSERT INTO `grocery_galleries` (`id`, `title`, `description`, `thumbnail`, `input_date`, `modified_date`) VALUES
(1, 'bbbbbbbbb', 'bbbbbbbb', 'aaaaaaaaaaaaa', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ionauth_groups`
--

CREATE TABLE IF NOT EXISTS `ionauth_groups` (
`id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `ionauth_groups`
--

INSERT INTO `ionauth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ionauth_login_attempts`
--

CREATE TABLE IF NOT EXISTS `ionauth_login_attempts` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ionauth_users`
--

CREATE TABLE IF NOT EXISTS `ionauth_users` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `ionauth_users`
--

INSERT INTO `ionauth_users` (`id`, `ip_address`, `username`, `password`, `avatar`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', 'default.png', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1512270715, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ionauth_users_groups`
--

CREATE TABLE IF NOT EXISTS `ionauth_users_groups` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `ionauth_users_groups`
--

INSERT INTO `ionauth_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pondok`
--

CREATE TABLE IF NOT EXISTS `pondok` (
`id` int(11) NOT NULL,
  `nama_pondok` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pondok`
--

INSERT INTO `pondok` (`id`, `nama_pondok`) VALUES
(1, 'pondok A'),
(2, 'pondok B'),
(3, 'pondok C'),
(4, 'pondok D'),
(5, 'pondok E');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekomendasi_pondok`
--

CREATE TABLE IF NOT EXISTS `rekomendasi_pondok` (
`id` int(11) NOT NULL,
  `universitas_id` int(11) NOT NULL,
  `pondok_id` int(11) NOT NULL,
  `prioritas` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekomendasi_pondok`
--

INSERT INTO `rekomendasi_pondok` (`id`, `universitas_id`, `pondok_id`, `prioritas`) VALUES
(1, 1, 1, 5),
(2, 1, 2, 4),
(3, 1, 3, 3),
(4, 1, 4, 2),
(5, 1, 5, 1),
(6, 2, 1, 3),
(7, 2, 2, 4),
(8, 2, 3, 5),
(9, 2, 4, 1),
(10, 2, 5, 2),
(11, 3, 1, 4),
(12, 3, 2, 5),
(13, 3, 3, 1),
(14, 3, 4, 2),
(15, 3, 5, 3),
(16, 4, 1, 2),
(17, 4, 2, 3),
(18, 4, 3, 4),
(19, 4, 4, 5),
(20, 4, 5, 1),
(21, 5, 1, 1),
(22, 5, 2, 2),
(23, 5, 3, 5),
(24, 5, 4, 4),
(25, 5, 5, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `santri`
--

CREATE TABLE IF NOT EXISTS `santri` (
`id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tmpt_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `telepon` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `santri`
--

INSERT INTO `santri` (`id`, `nama`, `tmpt_lahir`, `tgl_lahir`, `alamat`, `telepon`) VALUES
(2, 'M Intizamm', 'Pekalongan', '1996-08-11', 'Rembun', '085843334440'),
(10, 'M Nafis', 'Pekalongan', '1996-08-11', 'Pekalongan', '085842223440');

-- --------------------------------------------------------

--
-- Struktur dari tabel `universitas`
--

CREATE TABLE IF NOT EXISTS `universitas` (
`id` int(11) NOT NULL,
  `nama_univ` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `universitas`
--

INSERT INTO `universitas` (`id`, `nama_univ`) VALUES
(1, 'Universitas Dian Nuswantoro'),
(2, 'UIN Walisongo'),
(3, 'Universitas Negeri Semarang'),
(4, 'Universitas Diponegoro'),
(5, 'Universitas Sultan Agung');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grocery_galleries`
--
ALTER TABLE `grocery_galleries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ionauth_groups`
--
ALTER TABLE `ionauth_groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ionauth_login_attempts`
--
ALTER TABLE `ionauth_login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ionauth_users`
--
ALTER TABLE `ionauth_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ionauth_users_groups`
--
ALTER TABLE `ionauth_users_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`), ADD KEY `fk_users_groups_users1_idx` (`user_id`), ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `pondok`
--
ALTER TABLE `pondok`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekomendasi_pondok`
--
ALTER TABLE `rekomendasi_pondok`
 ADD PRIMARY KEY (`id`), ADD KEY `pondok_id` (`pondok_id`), ADD KEY `universitas_id` (`universitas_id`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `universitas`
--
ALTER TABLE `universitas`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grocery_galleries`
--
ALTER TABLE `grocery_galleries`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ionauth_groups`
--
ALTER TABLE `ionauth_groups`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ionauth_login_attempts`
--
ALTER TABLE `ionauth_login_attempts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ionauth_users`
--
ALTER TABLE `ionauth_users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ionauth_users_groups`
--
ALTER TABLE `ionauth_users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pondok`
--
ALTER TABLE `pondok`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rekomendasi_pondok`
--
ALTER TABLE `rekomendasi_pondok`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `universitas`
--
ALTER TABLE `universitas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `rekomendasi_pondok`
--
ALTER TABLE `rekomendasi_pondok`
ADD CONSTRAINT `relasi_pondok` FOREIGN KEY (`pondok_id`) REFERENCES `pondok` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `relasi_universitas` FOREIGN KEY (`universitas_id`) REFERENCES `universitas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
