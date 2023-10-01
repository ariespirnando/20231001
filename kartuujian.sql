-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table ujian.auth_email
CREATE TABLE IF NOT EXISTS `auth_email` (
  `guid_email` char(12) NOT NULL,
  `kode_user` char(15) NOT NULL,
  `email` varchar(80) NOT NULL,
  `ilock` tinyint(4) NOT NULL DEFAULT 0,
  `ivalid` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 Belom Valid - 1 Sudah Valid',
  `ideleted` tinyint(4) NOT NULL DEFAULT 0,
  `token` text DEFAULT NULL,
  PRIMARY KEY (`guid_email`),
  KEY `KEY` (`kode_user`,`email`,`ilock`,`ivalid`,`ideleted`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ujian.auth_email: ~1 rows (approximately)
/*!40000 ALTER TABLE `auth_email` DISABLE KEYS */;
INSERT INTO `auth_email` (`guid_email`, `kode_user`, `email`, `ilock`, `ivalid`, `ideleted`, `token`) VALUES
	('45B59C60C440', 'PG-2306173AA440', '000000000000@gmail.com', 0, 0, 0, NULL);
/*!40000 ALTER TABLE `auth_email` ENABLE KEYS */;

-- Dumping structure for table ujian.auth_groups
CREATE TABLE IF NOT EXISTS `auth_groups` (
  `guid_groups` char(12) NOT NULL,
  `kode_groups` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `iTipe` varchar(50) DEFAULT '0' COMMENT '0 Internal 1 Public ',
  PRIMARY KEY (`guid_groups`),
  KEY `KEY` (`kode_groups`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ujian.auth_groups: ~1 rows (approximately)
/*!40000 ALTER TABLE `auth_groups` DISABLE KEYS */;
INSERT INTO `auth_groups` (`guid_groups`, `kode_groups`, `description`, `iTipe`) VALUES
	('CA17EAEF2675', 'U-ADMIN', 'STAFF ADMIN', '0');
/*!40000 ALTER TABLE `auth_groups` ENABLE KEYS */;

-- Dumping structure for table ujian.auth_history
CREATE TABLE IF NOT EXISTS `auth_history` (
  `guid_history` char(12) NOT NULL,
  `guid_user` varchar(50) NOT NULL DEFAULT '',
  `ip_address` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `type` enum('Login','Logout','Error404') NOT NULL,
  PRIMARY KEY (`guid_history`),
  KEY `KEY` (`guid_user`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ujian.auth_history: ~28 rows (approximately)
/*!40000 ALTER TABLE `auth_history` DISABLE KEYS */;
INSERT INTO `auth_history` (`guid_history`, `guid_user`, `ip_address`, `date`, `type`) VALUES
	('0C67FF00C753', 'F3158D268328', '127.0.0.1', '2023-09-22 21:17:53', 'Error404'),
	('0D4A51243642', '232410001', '127.0.0.1', '2023-09-23 20:46:42', 'Login'),
	('107B7159B215', '4E0575A6D440', '127.0.0.1', '2023-09-23 20:12:15', 'Login'),
	('24823BC49454', '4E0575A6D440', '127.0.0.1', '2023-06-17 09:14:54', 'Login'),
	('24F30C515435', '4E0575A6D440', '127.0.0.1', '2023-09-23 20:54:35', 'Login'),
	('2682995DF614', '4E0575A6D440', '127.0.0.1', '2023-09-23 20:46:14', 'Logout'),
	('4BFCA1A74620', '4E0575A6D440', '127.0.0.1', '2023-06-17 09:16:20', 'Logout'),
	('5069A2C7D344', 'F3158D268328', '127.0.0.1', '2023-09-22 21:53:44', 'Error404'),
	('527C02BF8316', 'F3158D268328', '127.0.0.1', '2023-09-22 21:43:16', 'Error404'),
	('54CD1DFE3701', '', '127.0.0.1', '2023-09-23 09:07:01', 'Error404'),
	('56D33A09F702', '4E0575A6D440', '127.0.0.1', '2023-09-23 09:37:02', 'Login'),
	('5AFC9004A623', '4E0575A6D440', '127.0.0.1', '2023-06-17 09:16:23', 'Login'),
	('62BB44DBD419', '232410001', '127.0.0.1', '2023-09-23 09:34:19', 'Login'),
	('64B6DAE03322', 'F3158D268328', '127.0.0.1', '2023-06-17 09:13:22', 'Login'),
	('65D236A84221', '232410001', '127.0.0.1', '2023-09-23 08:42:21', 'Login'),
	('6E11D22FE827', '', '127.0.0.1', '2023-09-23 09:08:27', 'Error404'),
	('73773B73A409', 'F3158D268328', '127.0.0.1', '2023-09-22 21:54:09', 'Error404'),
	('7D5E878F4220', '4E0575A6D440', '127.0.0.1', '2023-09-23 20:42:20', 'Error404'),
	('87DF3D481326', '4E0575A6D440', '127.0.0.1', '2023-09-23 09:33:26', 'Logout'),
	('8C2B55E86558', 'F3158D268328', '127.0.0.1', '2023-09-22 21:35:58', 'Error404'),
	('AB8522142041', '', '127.0.0.1', '2023-06-17 09:10:41', 'Error404'),
	('AE4EA9F65451', 'F3158D268328', '127.0.0.1', '2023-06-17 09:14:51', 'Logout'),
	('B36F2360E043', '4E0575A6D440', '::1', '2023-07-29 18:50:43', 'Login'),
	('CCFFD4404446', '', '127.0.0.1', '2023-09-23 09:04:46', 'Error404'),
	('D24103B51645', '', '127.0.0.1', '2023-09-23 09:06:45', 'Error404'),
	('E28A1FFCD904', '4E0575A6D440', '127.0.0.1', '2023-09-23 09:29:04', 'Login'),
	('EAE3C1E1D711', '232410001', '127.0.0.1', '2023-09-22 21:57:11', 'Login'),
	('F32B8F005531', 'F3158D268328', '127.0.0.1', '2023-09-22 21:55:31', 'Logout');
/*!40000 ALTER TABLE `auth_history` ENABLE KEYS */;

-- Dumping structure for table ujian.auth_user
CREATE TABLE IF NOT EXISTS `auth_user` (
  `guid_user` char(12) NOT NULL,
  `guid_groups` char(12) NOT NULL,
  `kode_user` char(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `iattempt` int(11) NOT NULL DEFAULT 0,
  `ilock` tinyint(4) NOT NULL DEFAULT 0,
  `ideleted` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`guid_user`),
  KEY `KEY` (`guid_groups`,`iattempt`,`kode_user`,`ilock`,`ideleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ujian.auth_user: ~1 rows (approximately)
/*!40000 ALTER TABLE `auth_user` DISABLE KEYS */;
INSERT INTO `auth_user` (`guid_user`, `guid_groups`, `kode_user`, `username`, `password`, `iattempt`, `ilock`, `ideleted`) VALUES
	('4E0575A6D440', 'CA17EAEF2675', 'PG-2306173AA440', 'ADMIN8360', '389f1f59df28d869eb41af1d5442c4fa3603063583c0381691ac376f1e92827e514', 0, 0, 0);
/*!40000 ALTER TABLE `auth_user` ENABLE KEYS */;

-- Dumping structure for table ujian.data_kelulusan
CREATE TABLE IF NOT EXISTS `data_kelulusan` (
  `guid_kelulusan` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomor_pendaftaran` varchar(50) DEFAULT NULL,
  `nisn` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `layak` varchar(50) DEFAULT NULL,
  `no_urut` varchar(50) DEFAULT NULL,
  `ideleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`guid_kelulusan`),
  KEY `nomor_pendaftaran` (`nomor_pendaftaran`),
  KEY `nisn` (`nisn`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ujian.data_kelulusan: ~36 rows (approximately)
/*!40000 ALTER TABLE `data_kelulusan` DISABLE KEYS */;
INSERT INTO `data_kelulusan` (`guid_kelulusan`, `nomor_pendaftaran`, `nisn`, `nama_lengkap`, `kelas`, `layak`, `no_urut`, `ideleted`) VALUES
	(1, '232410001', '0083234827', 'ADHWA NADHIFA AQILAH', 'X1', 'LAYAK', '1', 0),
	(2, '232410002', '0085535782', 'ALIDYA RATU SUKMA', 'X1', 'LAYAK', '2', 0),
	(3, '232410003', '0089722987', 'ALIFIANSYAH MANOPPO', 'X1', 'TIDAK LAYAK', '3', 0),
	(4, '232410004', '0084247052', 'ALISHA VIANA PUTRI', 'X1', 'TIDAK LAYAK', '4', 0),
	(5, '232410005', '0092430747', 'AYU ANJANI', 'X1', NULL, '5', 0),
	(6, '232410006', '0076804103', 'BELINO ADREVIN NOVALDO', 'X1', NULL, '6', 0),
	(7, '232410007', '0084025746', 'DHIA SYAHDA A\'ISY', 'X1', NULL, '7', 0),
	(8, '232410008', '0086389142', 'DIMITREY ALBIRR', 'X1', NULL, '8', 0),
	(9, '232410009', '0074292794', 'ELISA SEPTIA SIBARANI', 'X1', NULL, '9', 0),
	(10, '232410010', '0084676529', 'FAIZAN AYDIN IBRAHIM', 'X1', NULL, '10', 0),
	(11, '232410011', '0081446925', 'JUAN MARCO MANGASA PARHUSIP', 'X1', NULL, '11', 0),
	(12, '232410012', '0067063851', 'KHALIS KAYSAN SALSABIL', 'X1', NULL, '12', 0),
	(13, '232410013', '0084259366', 'MARSHA ALLYANDARA YUSEN', 'X1', NULL, '13', 0),
	(14, '232410014', '0082932422', 'MEISY NURMALA', 'X1', NULL, '14', 0),
	(15, '232410015', '0078344134', 'MOHAMMAD ALFATHONI FAIROUZDIAZ', 'X1', NULL, '15', 0),
	(16, '232410016', '3085225068', 'MUHAMAD RASSYA ADITYA PRATAMA', 'X1', NULL, '16', 0),
	(17, '232410017', '0075114831', 'MUHAMMAD ARFA BAKHTIAR', 'X1', NULL, '17', 0),
	(18, '232410018', '0088070089', 'MUHAMMAD ARFAN ADYAREZA', 'X1', NULL, '18', 0),
	(19, '232410019', '0088652724', 'MUHAMMAD DANISH IZZAN', 'X1', NULL, '19', 0),
	(20, '232410020', '0075714202', 'MUHAMMAD PAJRI SETIAWAN', 'X1', NULL, '20', 0),
	(21, '232410021', '0072775824', 'MUHAMMAD SULTHON AULIA', 'X1', NULL, '21', 0),
	(22, '232410022', '0084563172', 'PUJI NUR SYIFA HARYANI', 'X1', NULL, '22', 0),
	(23, '232410023', '0086940226', 'RADITYO ASYRAF SYAHIID', 'X1', NULL, '23', 0),
	(24, '232410024', '0084329646', 'RAFI NABIL MAKARIM', 'X1', NULL, '24', 0),
	(25, '232410025', '0079182855', 'RISA RAMADANIA', 'X1', NULL, '25', 0),
	(26, '232410026', '0086919118', 'RIZKI PRADITYA', 'X1', NULL, '26', 0),
	(27, '232410027', '0072543470', 'RIZQULLAH IZZATUL IBAD', 'X1', NULL, '27', 0),
	(28, '232410028', '0082343387', 'RIZQY PANDJI WICAKSONO', 'X1', NULL, '28', 0),
	(29, '232410029', '0085634117', 'RYO DARMAWAN', 'X1', NULL, '29', 0),
	(30, '232410030', '0086480824', 'SYIFA AZKIA RAHMADHANI', 'X1', NULL, '30', 0),
	(31, '232410031', '0088475118', 'TALITA YASMIN EDDY FEBRIASARI', 'X1', NULL, '31', 0),
	(32, '232410032', '0088540217', 'VINNIA SAMANTHA HALIM', 'X1', NULL, '32', 0),
	(33, '232410033', '0086754518', 'WIGA RHADITYA YUWONO', 'X1', NULL, '33', 0),
	(34, '232410034', '0084266657', 'ZAYYAN AFIFURROHMAN', 'X1', NULL, '34', 0),
	(35, '232410035', '2086475145', 'ZIA MAFAZA', 'X1', NULL, '35', 0),
	(36, NULL, NULL, NULL, NULL, NULL, NULL, 0);
/*!40000 ALTER TABLE `data_kelulusan` ENABLE KEYS */;

-- Dumping structure for table ujian.dt_common
CREATE TABLE IF NOT EXISTS `dt_common` (
  `nip` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `ttd_path` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ujian.dt_common: ~1 rows (approximately)
/*!40000 ALTER TABLE `dt_common` DISABLE KEYS */;
INSERT INTO `dt_common` (`nip`, `nama`, `ttd_path`, `type`) VALUES
	('111111', 'ACHMAD A', '94338476440e1068ff638b2dcc0fa27c.png', 'KEPSEK');
/*!40000 ALTER TABLE `dt_common` ENABLE KEYS */;

-- Dumping structure for table ujian.dt_karyawan
CREATE TABLE IF NOT EXISTS `dt_karyawan` (
  `guid_karyawan` char(12) NOT NULL,
  `guid_groups` char(12) NOT NULL,
  `kode_karyawan` char(15) NOT NULL,
  `nama_karyawan` varchar(50) DEFAULT NULL,
  `nik_karyawan` varchar(12) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `nohandpone` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `status` enum('Active','Non Active') DEFAULT 'Active',
  `ideleted` tinyint(1) DEFAULT 0,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `pendidikan_terakhir` varchar(50) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `dateinsupt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`guid_karyawan`),
  KEY `KEY` (`kode_karyawan`,`jenis_kelamin`,`ideleted`,`status`,`guid_groups`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ujian.dt_karyawan: ~1 rows (approximately)
/*!40000 ALTER TABLE `dt_karyawan` DISABLE KEYS */;
INSERT INTO `dt_karyawan` (`guid_karyawan`, `guid_groups`, `kode_karyawan`, `nama_karyawan`, `nik_karyawan`, `jenis_kelamin`, `nohandpone`, `alamat`, `status`, `ideleted`, `tempat_lahir`, `tanggal_lahir`, `pendidikan_terakhir`, `jurusan`, `dateinsupt`) VALUES
	('E06ACC3BA440', 'CA17EAEF2675', 'PG-2306173AA440', 'ADMIN1', '000000000000', 'Laki-laki', '000000000000', '', 'Active', 0, '000000000000', '2022-04-01', 'S1', '000000000000', '2023-06-17 09:14:40');
/*!40000 ALTER TABLE `dt_karyawan` ENABLE KEYS */;

-- Dumping structure for procedure ujian.jumlahloginperbulan
DELIMITER //
CREATE PROCEDURE `jumlahloginperbulan`()
BEGIN
DECLARE startv, endv INT DEFAULT 0;
DROP TEMPORARY TABLE IF EXISTS loglogin;
create TEMPORARY table loglogin(
	id int not null auto_increment primary key,
	bulan int not null DEFAULT 0,
	internal int not null DEFAULT 0,
	public int not null DEFAULT 0
);

SET startv = 1;
SET endv = 12;

while startv <= endv DO

	SELECT COUNT(auth_history.guid_history) INTO @INTERNAL FROM auth_history JOIN auth_user ON auth_history.guid_user = auth_user.guid_user
	JOIN auth_groups ON auth_groups.guid_groups = auth_user.guid_groups
	WHERE auth_history.`type` = 'Login' AND auth_groups.iTipe = 0 AND YEAR(DATE) = YEAR(NOW())
	AND MONTH(DATE) = startv;
	
	SELECT COUNT(auth_history.guid_history) INTO @PUBLIC FROM auth_history JOIN data_kelulusan ON auth_history.guid_user = data_kelulusan.nomor_pendaftaran
	 WHERE auth_history.`type` = 'Login' AND YEAR(DATE) = YEAR(NOW())
	AND MONTH(DATE) = startv;

	insert into loglogin (bulan,internal,public) values ( startv, @INTERNAL, @PUBLIC);
	  
SET startv = startv+1;
end while;

SELECT * FROM loglogin ORDER BY bulan ASC;


END//
DELIMITER ;

-- Dumping structure for table ujian.motifasi_day
CREATE TABLE IF NOT EXISTS `motifasi_day` (
  `imotifasi` tinyint(4) NOT NULL AUTO_INCREMENT,
  `kalimat_motifasi` text DEFAULT NULL,
  PRIMARY KEY (`imotifasi`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ujian.motifasi_day: ~87 rows (approximately)
/*!40000 ALTER TABLE `motifasi_day` DISABLE KEYS */;
INSERT INTO `motifasi_day` (`imotifasi`, `kalimat_motifasi`) VALUES
	(1, 'Barang siapa bersungguh-sungguh, maka dia akan mendapatkan kesuksesan.'),
	(2, 'Lakukan yang terbaik di semua kesempatan yang kamu miliki.'),
	(3, 'Makin awal kamu memulai pekerjaan, makin awal pula kamu akan melihat hasilnya.'),
	(4, 'Masa depan adalah milik mereka yang menyiapkan hari ini.'),
	(5, 'Kalau impianmu tak bisa membuatmu takut, mungkin karena impianmu tak cukup besar.'),
	(6, 'Kegagalan adalah guru terbaikmu. Belajarlah darinya.'),
	(7, 'Pelajaran yang paling berharga adalah pelajaran yang Anda ajarkan untuk diri sendiri.'),
	(8, 'erdoa saja tidak cukup. Belajar dengan baik adalah bukti bahwa doa Anda serius. Belajar adalah ibadah.'),
	(9, 'Sedikit kemajuan setiap hari di dalam dirimu menambah sesuatu hingga hasil yang besar.'),
	(10, 'Bersemangatlah dalam mempelajari sesuatu yang bermanfaat.'),
	(11, 'Belajar tidak akan pernah membuat pikiran Anda lelah.'),
	(12, 'Belajar adalah pengalaman. Sedangkan yang lainnya hanyalah informasi.'),
	(13, 'Jangan takut melangkah karena jarak 1.000 mil dimulai dari satu langkah.'),
	(14, 'Hidup adalah tentang belajar. Jika Anda berhenti, maka Anda mati.'),
	(15, 'Apa pun kata orang lain, belajar dan bekerja keraslah untuk mencapai kesuksesan.'),
	(16, 'Kesuksesan seseorang berbanding lurus dengan kemauannya untuk belajar, bangkit, dan mencoba.'),
	(17, 'Memang baik merayakan kesuksesan, tapi hal yang lebih penting adalah untuk mengambil pelajaran dari kegagalan. - Bill Gates'),
	(18, 'Jangan mengharapkan semuanya bisa jadi lebih mudah, berharaplah agar dirimu bisa jadi lebih baik. - Jim Rohn'),
	(19, 'Lakukan! Kalau Anda sukses Anda berbahagia, kalau Anda gagal Anda belajar. - Mario Teguh'),
	(20, 'Petualangan dalam hidup adalah seberapa banyak Anda belajar.'),
	(21, 'Kita belajar dari kegagalan, bukan dari kesuksesan.'),
	(22, 'Mempelajari bagaimana cara belajar adalah kemampuan mahapenting dalam hidup.'),
	(23, 'Pendidikan bukan cuma pergi ke sekolah dan mendapatkan gelar. Tapi, juga soal memperluas pengetahuan dan menyerap ilmu kehidupan. - Shakuntala Devi'),
	(24, 'Jangan takut salah ketika menuntut ilmu karena banyak orang sukses belajar dari sebuah kesalahan.'),
	(25, 'Selalu ada sesuatu yang bisa dipelajari bahkan bagi seorang master sekalipun. - Master Shifu, Kung Fu Panda 3'),
	(26, 'Jangan malas untuk belajar karena ilmu adalah harta yang bisa kita bawa ke mana pun tanpa membebani kita.'),
	(27, 'Masa depan memang tak pasti, tapi kalo kita belajar dengan bekerja keras, kita akan sukses. - Mario Teguh'),
	(28, 'Anak muda yang malas belajar tidak pantas untuk masa depan yang baik.'),
	(29, 'Ubahlah hidupmu hari ini. Jangan bermain-main dengan masa depanmu, lakukan sekarang, jangan menunda. - Simone de Beauvoir'),
	(30, 'Barangsiapa tidak mau merasakan pahitnya belajar, ia akan merasakan hinanya kebodohan sepanjang hidupnya. - Imam Syafi’i'),
	(31, 'Sukses hanya bisa diraih melalui gigih belajar, kerja keras, dan doa yang ikhlas. Bukan hanya dengan lamunan.'),
	(32, 'Orang bijak belajar ketika mereka bisa. Orang bodoh belajar ketika mereka terpaksa. - Arthur Wellesley'),
	(33, 'Ikhlaslah belajar. Bahkan yang paling berilmu dan bijak di antara kita masih rajin belajar. - Mario Teguh'),
	(35, 'Tidak ada kata tua untuk belajar.'),
	(36, 'Hiduplah seolah engkau mati besok. Belajarlah seolah engkau hidup selamanya. - Mahatma Gandhi'),
	(37, 'Jangan pernah berhenti belajar karena hidup tak pernah berhenti mengajarkan.'),
	(38, 'Orang yang tak pernah membaca buku sama buruknya dengan mereka yang tak bisa membaca buku. - Mark Twain'),
	(39, 'Lakukan yang terbaik di semua kesempatan yang kamu miliki.'),
	(40, 'Jangan pernah menyerah, memulai adalah selalu hal yang tersulit.'),
	(41, 'Pendidikan adalah senjata paling ampuh untuk mengubah dunia.- Nelson Mandela'),
	(42, 'Kalau mau menunggu sampai siap, kita akan menghabiskan sisa hidup kita hanya untuk menunggu. (Lemony Snicket)'),
	(43, 'Orang bijak belajar ketika mereka bisa. Orang bodoh belajar ketika mereka terpaksa. (Arthur Wellesley)'),
	(44, 'Hiduplah seolah engkau mati besok. Belajarlah seolah engkau hidup selamanya. (Mahatma Gandhi)'),
	(45, 'Pendidikan adalah tiket ke masa depan. Hari esok dimiliki oleh orang-orang yang mempersiapkan dirinya sejak hari ini. (Malcolm X)'),
	(46, 'Orang-orang yang berhenti belajar akan menjadi pemilik masa lalu. Orang-orang yang masih terus belajar, akan menjadi pemilik masa depan. (Mario Teguh)'),
	(47, 'Adalah baik untuk merayakan kesuksesan, tapi hal yang lebih penting adalah untuk mengambil pelajaran dari kegagalan. (Bill Gates)'),
	(48, 'Seseorang yang berhenti belajar adalah orang lanjut usia, meskipun umurnya masih remaja. Seseorang yang tidak pernah berhenti belajar akan selamanya menjadi pemuda. (Hendry Ford)'),
	(49, 'Jika kamu tidak mengejar apa yang kamu inginkan, maka kamu tidak akan mendapatkannya. Jika kamu tidak bertanya maka jawabannya adalah tidak. Jika kamu tidak melangkah maju, kamu akan tetap berada di tempat yang sama. (Nora Roberts)'),
	(50, 'Masa depan adalah milik mereka yang menyiapkan hari ini. –Anonim'),
	(51, 'Orang yang tak pernah membaca buku sama buruknya dengan mereka yang tak bisa membaca buku. -Mark Twain'),
	(52, 'Pendidikan adalah satu-satunya kunci untuk membuka dunia ini, serta paspor untuk menuju kebebasan. -Oprah Winfrey'),
	(53, 'Tidak ada seorang pun yang bisa kembali ke masa lalu dan memulai awal yang baru lagi. Tapi semua orang bisa memulai hari ini dan membuat akhir yang baru. -Maria Robinson'),
	(54, 'Bila memiliki banyak harta, kita akan menjaga harta. Namun jika memiliki banyak ilmu, maka ilmu lah yang akan menjaga kita. -Aa Gym'),
	(55, 'Barangsiapa tidak mau merasakan pahitnya belajar, ia akan merasakan hinanya kebodohan sepanjang hidupnya. -Imam Syafii rahimahullah'),
	(56, 'Jangan menyerah. Menderitalah sekarang dan hiduplah sebagai juara nantinya. -Muhammad Ali'),
	(57, 'Hidup itu seperti bersepeda. Kalau kamu ingin menjaga keseimbanganmu, kamu harus terus bergerak maju. (Albert Einstein)'),
	(58, 'Jika kau menginginkan sesuatu dalam hidupmu yang tak pernah kau punya. Kau harus melakukan sesuatu yang belum pernah kau lakukan. -JD Houson'),
	(59, 'Jangan biarkan siapapun mengatakan kau tidak bisa melakukan sesuatu. Kau bermimpi, kau harus menjaganya. Kalau menginginkan sesuatu, raihlah. Titik. -Chris Gardner, The Pursuit of Happiness'),
	(60, 'Ikhlaslah belajar. Bahkan yang paling berilmu dan bijak di antara kita masih rajin belajar. –Mario Teguh'),
	(61, 'Tak ada jalan pintas ke tempat yang layak dituju. (Beverly Sills)'),
	(62, 'Persiapkan hari ini sebaik-baiknya untuk menghadapi hari esok yang baru.'),
	(63, 'Sebuah perjalanan ribuan mil dimulai dari langkah kecil.'),
	(64, 'Bermimpilah setinggi langit, jika engkau jatuh, engkau akan jatuh di antara bintang-bintang. (Soekarno)'),
	(65, 'Tanpa sasaran dan rencana meraihnya, Anda seperti kapal yang berlayar tanpa tujuan. (Fitzhugh Dodson)'),
	(66, 'Pendidikan bukan cuma pergi ke sekolah dan mendapatkan gelar. Tapi juga soal memperluas pengetahuan dan menyerap ilmu kehidupan. -Shakuntala Devi'),
	(67, ' Mulailah dari mana kau berada. Gunakan apa yang kau punya. Lakukan apa yang kau bisa. - Arthur Ashe'),
	(68, 'Fokuslah menjadi produktif, bukan sekadar sibuk saja. (Tim Ferris)'),
	(69, 'Kebesaran sebenarnya dapat ditemukan dalam hal hal kecil yang terkadang kita lewatkan.'),
	(70, 'Kalau impianmu tak bisa membuatmu takut, mungkin karena impianmu tak cukup besar. (Muhammad Ali)'),
	(71, 'Man jadda wajada. (Barang siapa bersungguh-sungguh, maka dia akan mendapatkan kesuksesan.)'),
	(72, 'Jarib wa laahidzh takun aarifan. (Cobalah dan perhatikanlah, niscaya kau jadi orang yang tahu.)'),
	(73, 'Man saaro alaa darbi wasola. (Barang siapa berjalan pada jalannya, maka dia akan sampai pada tujuannya.)'),
	(74, 'Innamaa yudzhibul-‘ilman-nisyaanu, wa tarkul-mudzaakarati. (Sesungguhnya yang menyebabkan ilmu hilang adalah lupa dan tidak mengulanginya.)'),
	(75, 'Laulal ilma lakaanannaasu kal bahaaim. (Kalaulah tidak karena ilmu niscaya manusia itu seperti binatang.)'),
	(76, 'Stop wishing. Start doing.'),
	(77, 'If you are not willing to learn, no one can help you. If you are determined to learn, no one can stop you.'),
	(78, 'Practice makes us right, repetitions make us perfect.'),
	(79, 'If we never try, we will never know.'),
	(80, 'Failures are your best teacher. Learn from them.'),
	(81, 'Never lost hope, because it is the key to achieve all your dreams.'),
	(82, 'Don’t be afraid to move, because the distance of 1000 miles starts by a single step.'),
	(83, 'It is what we know already that often prevents us from learning.'),
	(84, 'You must pass the bad days first to get the best day in the future.'),
	(85, 'Do not ever give up, the beginning is always the hardest.'),
	(86, 'A little progress each day in your self is add thing up to big result.'),
	(87, 'Change your life today. Dont gamble on the future, act now, without delay. -Simone de Beauvoir'),
	(88, 'Your biggest weakness is when you give up and your greatest power is when you try one more time.');
/*!40000 ALTER TABLE `motifasi_day` ENABLE KEYS */;

-- Dumping structure for table ujian.nt_aktif
CREATE TABLE IF NOT EXISTS `nt_aktif` (
  `auto_aktif` int(11) NOT NULL AUTO_INCREMENT,
  `kode_user` char(15) DEFAULT NULL,
  `isi_aktifitas` text DEFAULT NULL,
  `date_post` datetime DEFAULT NULL,
  `ideleted` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`auto_aktif`) USING BTREE,
  KEY `kode_user_ideleted` (`kode_user`,`ideleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ujian.nt_aktif: ~0 rows (approximately)
/*!40000 ALTER TABLE `nt_aktif` DISABLE KEYS */;
/*!40000 ALTER TABLE `nt_aktif` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
