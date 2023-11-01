/*
SQLyog Community
MySQL - 5.6.21-log : Database - spmbapp_itdel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `AuthAssignment` */

CREATE TABLE `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `AuthItem` */

CREATE TABLE `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `AuthItemChild` */

CREATE TABLE `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `t_biaya_pendaftaran` */

CREATE TABLE `t_biaya_pendaftaran` (
  `biaya_pendaftaran_id` int(11) NOT NULL AUTO_INCREMENT,
  `gelombang_pendaftaran_id` int(11) NOT NULL,
  `biaya_daftar` decimal(19,0) DEFAULT NULL,
  PRIMARY KEY (`biaya_pendaftaran_id`),
  KEY `gelombang_pendaftaran_id` (`gelombang_pendaftaran_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7162 DEFAULT CHARSET=utf8;

/*Table structure for table `t_calon_mahasiswa` */

CREATE TABLE `t_calon_mahasiswa` (
  `cis_imported` tinyint(1) DEFAULT '0',
  `calon_mahasiswa_id` int(11) NOT NULL AUTO_INCREMENT,
  `pendaftar_id` int(11) NOT NULL,
  `jalur_pendaftaran_id` int(11) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `no_kps` varchar(100) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `jenis_kelamin_id` int(11) NOT NULL,
  `golongan_darah_id` int(11) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(128) DEFAULT NULL,
  `agama_id` int(11) NOT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `jumlah_bersaudara` int(11) DEFAULT NULL,
  `jumlah_tanggungan_ortu` int(11) DEFAULT NULL,
  `alamat` tinytext,
  `kode_pos` varchar(45) DEFAULT NULL,
  `kelurahan` varchar(32) DEFAULT NULL,
  `alamat_kec` int(11) DEFAULT NULL,
  `no_telepon_rumah` varchar(45) DEFAULT NULL,
  `no_telepon_mobile` varchar(45) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `nama_ayah_kandung` varchar(128) DEFAULT NULL,
  `nama_ibu_kandung` varchar(45) DEFAULT NULL,
  `nik_ayah` varchar(16) DEFAULT NULL,
  `nik_ibu` varchar(16) DEFAULT NULL,
  `tanggal_lahir_ayah` date DEFAULT NULL,
  `tanggal_lahir_ibu` date DEFAULT NULL,
  `pendidikan_ayah_id` int(11) DEFAULT NULL,
  `pendidikan_ibu_id` int(11) DEFAULT NULL,
  `alamat_orang_tua` tinytext,
  `kode_pos_orang_tua` varchar(45) DEFAULT NULL,
  `pekerjaan_ayah_id` int(11) DEFAULT NULL,
  `keterangan_pekerjaan_ayah` varchar(255) DEFAULT NULL,
  `pekerjaan_ibu_id` int(11) DEFAULT NULL,
  `keterangan_pekerjaan_ibu` varchar(255) DEFAULT NULL,
  `penghasilan_ayah` int(11) DEFAULT NULL,
  `penghasilan_ibu` int(11) DEFAULT NULL,
  `penghasilan_total` int(11) DEFAULT NULL,
  `no_telepon_mobile_ayah` varchar(45) DEFAULT NULL,
  `no_telepon_mobile_ibu` varchar(45) DEFAULT NULL,
  `nama_wali` varchar(45) DEFAULT NULL,
  `no_hp_wali` varchar(45) DEFAULT NULL,
  `pekerjaan_wali_id` int(11) DEFAULT NULL,
  `keterangan_pekerjaan_wali` varchar(255) DEFAULT NULL,
  `penghasilan_wali` int(11) DEFAULT NULL,
  `sekolah_id` int(11) NOT NULL,
  `jurusan_sekolah` varchar(128) DEFAULT NULL,
  `informasi_del_id` int(11) NOT NULL,
  `informasi_del_lainnya` tinytext,
  `n` int(11) DEFAULT NULL,
  `nim` varchar(45) DEFAULT NULL,
  `status_pembayaran` int(11) DEFAULT '0',
  `total_pembayaran` decimal(10,0) DEFAULT '0',
  `virtual_account_number` varchar(100) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `pas_foto` varchar(128) DEFAULT NULL,
  `berkas_pendaftaran_ulang` varchar(128) DEFAULT NULL,
  `u_cr` varchar(128) DEFAULT NULL,
  `ip_cr` varchar(45) DEFAULT NULL,
  `d_cr` datetime DEFAULT NULL,
  `u_up` varchar(128) DEFAULT NULL,
  `ip_up` varchar(45) DEFAULT NULL,
  `d_up` datetime DEFAULT NULL,
  `jurusan_sekolah_id` int(11) DEFAULT NULL,
  `no_hp_orangtua` varchar(45) DEFAULT NULL,
  `sekolah_dapodik_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`calon_mahasiswa_id`),
  KEY `fk_t_pendaftar_t_user1_idx` (`user_id`),
  KEY `fk_t_pendaftar_t_r_jenis_kelamin1_idx` (`jenis_kelamin_id`),
  KEY `fk_t_pendaftar_t_r_agama1_idx` (`agama_id`),
  KEY `fk_t_pendaftar_t_r_sekolah1_idx` (`sekolah_id`),
  KEY `fk_t_pendaftar_t_r_informasi_del1_idx` (`informasi_del_id`),
  KEY `fk_t_pendaftar_t_r_jalur_pendaftaran1_idx` (`jalur_pendaftaran_id`),
  KEY `fk_t_calon_mahasiswa_t_r_jurusan1_idx` (`jurusan_id`),
  KEY `fk_t_calon_mahasiswa_t_r_golongan_darah1_idx` (`golongan_darah_id`),
  KEY `fk_t_calon_mahasiswa_t_pendaftar1_idx` (`pendaftar_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4418 DEFAULT CHARSET=latin1;

/*Table structure for table `t_ekstrakurikuler` */

CREATE TABLE `t_ekstrakurikuler` (
  `kurikuler_id` int(11) NOT NULL AUTO_INCREMENT,
  `predikat_kelulusan_id` int(11) NOT NULL,
  `pendaftar_id` int(11) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `mulai` date DEFAULT NULL,
  `berakhir` date DEFAULT NULL,
  PRIMARY KEY (`kurikuler_id`),
  KEY `fk_t_ekstrakurikuler_t_r_predikat_kelulusan1_idx` (`predikat_kelulusan_id`),
  KEY `fk_t_ekstrakurikuler_t_pendaftar1_idx` (`pendaftar_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7162 DEFAULT CHARSET=utf8;

/*Table structure for table `t_jurusan_mapel` */

CREATE TABLE `t_jurusan_mapel` (
  `jurusan_mapel_id` int(11) NOT NULL AUTO_INCREMENT,
  `jurusan_id` int(11) NOT NULL,
  `mata_pelajaran_id` int(11) NOT NULL,
  PRIMARY KEY (`jurusan_mapel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Table structure for table `t_kode_ujian` */

CREATE TABLE `t_kode_ujian` (
  `kode_ujian_id` int(11) NOT NULL AUTO_INCREMENT,
  `gelombang_pendaftaran_id` int(11) NOT NULL,
  `jenis_test_id` int(11) NOT NULL,
  `kode_ujian` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kode_ujian_id`),
  KEY `gelombang_pendaftaran_id` (`gelombang_pendaftaran_id`),
  KEY `jenis_test_id` (`jenis_test_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7162 DEFAULT CHARSET=utf8;

/*Table structure for table `t_nilai_akademik` */

CREATE TABLE `t_nilai_akademik` (
  `nilai_akademik_id` int(11) NOT NULL AUTO_INCREMENT,
  `pendaftar_id` int(11) NOT NULL,
  `mat_benar` int(11) DEFAULT NULL,
  `mat_salah` int(11) DEFAULT NULL,
  `ing_benar` int(11) DEFAULT NULL,
  `ing_salah` int(11) DEFAULT NULL,
  `tpa_benar` int(11) DEFAULT NULL,
  `tpa_salah` int(11) DEFAULT NULL,
  `total_kosong` int(11) DEFAULT NULL,
  `mp_tinggi` varchar(100) DEFAULT NULL,
  `mp_rendah` varchar(100) DEFAULT NULL,
  `perbandingan_mat_ing` varchar(100) DEFAULT NULL,
  `jumlah_soal` int(11) DEFAULT NULL,
  `hasil_score` int(11) DEFAULT NULL,
  `scala_score` decimal(10,0) DEFAULT NULL,
  `usulan_panitia` varchar(100) DEFAULT NULL,
  `pilihan1` varchar(100) DEFAULT NULL,
  `pilihan2` varchar(100) DEFAULT NULL,
  `pilihan3` varchar(100) DEFAULT NULL,
  `hasil_akhir_pilihan` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nilai_akademik_id`),
  KEY `pendaftar_id` (`pendaftar_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7162 DEFAULT CHARSET=utf8;

/*Table structure for table `t_nilai_psikotes` */

CREATE TABLE `t_nilai_psikotes` (
  `nilai_psikotes_id` int(11) NOT NULL AUTO_INCREMENT,
  `pendaftar_id` int(11) NOT NULL,
  `kode_tes` varchar(100) DEFAULT NULL,
  `kehadiran` varchar(100) DEFAULT NULL,
  `tiu` int(11) DEFAULT NULL,
  `kategori_tiu` varchar(100) DEFAULT NULL,
  `stabilit_as_emosi` varchar(100) DEFAULT NULL,
  `temp_kerja` varchar(100) DEFAULT NULL,
  `ketelitian` varchar(100) DEFAULT NULL,
  `konsistensi` varchar(100) DEFAULT NULL,
  `daya_tahan` varchar(100) DEFAULT NULL,
  `iq` int(11) DEFAULT NULL,
  `kategori_iq` varchar(100) DEFAULT NULL,
  `hasil` varchar(100) DEFAULT NULL,
  `peringkat` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nilai_psikotes_id`),
  KEY `pendaftar_id` (`pendaftar_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7162 DEFAULT CHARSET=utf8;

/*Table structure for table `t_nilai_rapor` */

CREATE TABLE `t_nilai_rapor` (
  `nilai_rapor_id` int(11) NOT NULL AUTO_INCREMENT,
  `pendaftar_id` int(11) NOT NULL,
  `mata_pelajaran_id` int(11) NOT NULL,
  `nilai` float NOT NULL DEFAULT '0',
  `smt` int(2) DEFAULT NULL,
  PRIMARY KEY (`nilai_rapor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9020 DEFAULT CHARSET=latin1;

/*Table structure for table `t_nilai_semester` */

CREATE TABLE `t_nilai_semester` (
  `nilai_semester_id` int(11) NOT NULL AUTO_INCREMENT,
  `pendaftar_id` int(11) NOT NULL,
  `jumlah_pelajaran_sem_1` int(11) DEFAULT NULL,
  `jumlah_nilai_sem_1` int(11) DEFAULT NULL,
  `jumlah_pelajaran_sem_2` int(11) DEFAULT NULL,
  `jumlah_nilai_sem_2` int(11) DEFAULT NULL,
  `jumlah_pelajaran_sem_3` int(11) DEFAULT NULL,
  `jumlah_nilai_sem_3` int(11) DEFAULT NULL,
  `jumlah_pelajaran_sem_4` int(11) DEFAULT NULL,
  `jumlah_nilai_sem_4` int(11) DEFAULT NULL,
  `jumlah_pelajaran_sem_5` int(11) DEFAULT NULL,
  `jumlah_nilai_sem_5` int(11) DEFAULT NULL,
  `jumlah_pelajaran_sem_6` int(11) DEFAULT NULL,
  `jumlah_nilai_sem_6` int(11) DEFAULT NULL,
  `jumlah_pelajaran_un` int(11) DEFAULT NULL,
  `file` varchar(128) DEFAULT NULL,
  `rangking_kelas` int(10) DEFAULT NULL,
  `jumlah_siswa_kelas` int(10) DEFAULT NULL,
  PRIMARY KEY (`nilai_semester_id`),
  KEY `pendaftar_id` (`pendaftar_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7162 DEFAULT CHARSET=utf8;

/*Table structure for table `t_nilai_utbk` */

CREATE TABLE `t_nilai_utbk` (
  `nilai_utbk_id` int(11) NOT NULL AUTO_INCREMENT,
  `bidang_utbk_id` int(11) NOT NULL,
  `utbk_id` int(11) NOT NULL,
  `nilai` int(3) NOT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`nilai_utbk_id`),
  KEY `fk_t_r_bidang_utbk_bidang_utbk_id` (`bidang_utbk_id`),
  KEY `fk_nilai_utbk_t_utbk` (`utbk_id`),
  CONSTRAINT `fk_bidang_utbk_t_r_bidang_utbk` FOREIGN KEY (`bidang_utbk_id`) REFERENCES `t_r_bidang_utbk` (`bidang_utbk_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_tubk_t_utbk` FOREIGN KEY (`utbk_id`) REFERENCES `t_utbk` (`utbk_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4956 DEFAULT CHARSET=latin1;

/*Table structure for table `t_nilai_wawancara` */

CREATE TABLE `t_nilai_wawancara` (
  `nilai_wawancara_id` int(11) NOT NULL AUTO_INCREMENT,
  `pendaftar_id` int(11) NOT NULL,
  `nilai_motivasi` decimal(19,0) DEFAULT NULL,
  `nilai_gambaran_karir` decimal(19,0) DEFAULT NULL,
  `nilai_rekomendasi` decimal(19,0) DEFAULT NULL,
  PRIMARY KEY (`nilai_wawancara_id`),
  KEY `pendaftar_id` (`pendaftar_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7162 DEFAULT CHARSET=utf8;

/*Table structure for table `t_organisasi` */

CREATE TABLE `t_organisasi` (
  `organisasi_id` int(11) NOT NULL AUTO_INCREMENT,
  `pendaftar_id` int(11) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `mulai` date DEFAULT NULL,
  `berakhir` date DEFAULT NULL,
  `jabatan` varchar(128) DEFAULT NULL,
  `u_cr` varchar(128) DEFAULT NULL,
  `ip_cr` varchar(45) DEFAULT NULL,
  `d_cr` datetime DEFAULT NULL,
  `u_up` varchar(128) DEFAULT NULL,
  `ip_up` varchar(45) DEFAULT NULL,
  `d_up` datetime DEFAULT NULL,
  PRIMARY KEY (`organisasi_id`),
  KEY `fk_t_organisasi_t_pendaftar1_idx` (`pendaftar_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4793 DEFAULT CHARSET=utf8;

/*Table structure for table `t_payment_detail` */

CREATE TABLE `t_payment_detail` (
  `payment_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `calon_mahasiswa_id` int(11) NOT NULL,
  `total_amount` decimal(10,0) DEFAULT '0',
  `fee_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`payment_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9496 DEFAULT CHARSET=latin1;

/*Table structure for table `t_pembayaran_daftar_ulang` */

CREATE TABLE `t_pembayaran_daftar_ulang` (
  `pembayaran_daftar_ulang_id` int(11) NOT NULL AUTO_INCREMENT,
  `komponen_pembayaran_id` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `calon_mahasiswa_id` int(11) NOT NULL,
  `tanggal_pembayaran` datetime DEFAULT NULL,
  `uid_penerima` int(11) DEFAULT NULL,
  PRIMARY KEY (`pembayaran_daftar_ulang_id`),
  KEY `fk_t_pembayaran_daftar_ulang_t_r_komponen_pembayaran1_idx` (`komponen_pembayaran_id`),
  KEY `fk_t_pembayaran_daftar_ulang_t_calon_mahasiswa1_idx` (`calon_mahasiswa_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2733 DEFAULT CHARSET=latin1;

/*Table structure for table `t_penangguhan_daftar_ulang` */

CREATE TABLE `t_penangguhan_daftar_ulang` (
  `penangguhan_daftar_ulang_id` int(11) NOT NULL AUTO_INCREMENT,
  `calon_mahasiswa_id` int(11) NOT NULL,
  `total_ditangguhkan` decimal(19,0) DEFAULT NULL,
  `total_bayar` decimal(19,0) DEFAULT NULL,
  `tanggal_penangguhan` datetime DEFAULT NULL,
  `approve_panitia` int(11) DEFAULT NULL,
  `approve_keuangan` int(11) DEFAULT NULL,
  `catatan` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`penangguhan_daftar_ulang_id`),
  KEY `calon_mahasiswa_id` (`calon_mahasiswa_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7162 DEFAULT CHARSET=utf8;

/*Table structure for table `t_pendaftar` */

CREATE TABLE `t_pendaftar` (
  `pendaftar_id` int(11) NOT NULL AUTO_INCREMENT,
  `jalur_pendaftaran_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `penerima_kps` int(10) DEFAULT NULL,
  `no_kps` varchar(100) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `jenis_kelamin_id` int(11) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(128) DEFAULT NULL,
  `agama_id` int(11) NOT NULL,
  `alamat` tinytext,
  `kode_pos` varchar(45) DEFAULT NULL,
  `kelurahan` varchar(32) DEFAULT NULL,
  `alamat_kec` int(11) DEFAULT NULL,
  `alamat_kab` int(11) DEFAULT NULL,
  `alamat_prov` int(11) DEFAULT NULL,
  `no_telepon_rumah` varchar(45) DEFAULT NULL,
  `no_telepon_mobile` varchar(45) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `nama_ayah_kandung` varchar(128) DEFAULT NULL,
  `nama_ibu_kandung` varchar(45) DEFAULT NULL,
  `nik_ayah` varchar(16) DEFAULT NULL,
  `nik_ibu` varchar(16) DEFAULT NULL,
  `tanggal_lahir_ayah` date DEFAULT NULL,
  `tanggal_lahir_ibu` date DEFAULT NULL,
  `pendidikan_ayah_id` int(11) DEFAULT NULL,
  `pendidikan_ibu_id` int(11) DEFAULT NULL,
  `alamat_kec_orangtua` int(11) DEFAULT NULL,
  `alamat_kab_orangtua` int(11) DEFAULT NULL,
  `alamat_prov_orangtua` int(11) DEFAULT NULL,
  `alamat_orang_tua` tinytext,
  `kode_pos_orang_tua` varchar(45) DEFAULT NULL,
  `pekerjaan_ayah_id` int(11) DEFAULT NULL,
  `pekerjaan_ibu_id` int(11) DEFAULT NULL,
  `penghasilan_ayah` int(11) DEFAULT NULL,
  `penghasilan_ibu` int(11) DEFAULT NULL,
  `penghasilan_total` int(11) DEFAULT NULL,
  `sekolah_id` int(11) NOT NULL,
  `jurusan_sekolah` varchar(128) DEFAULT NULL,
  `akreditasi_sekolah` varchar(100) DEFAULT NULL,
  `jumlah_pelajaran_sem_1` int(11) DEFAULT NULL,
  `jumlah_nilai_sem_1` int(11) DEFAULT NULL,
  `jumlah_pelajaran_sem_2` int(11) DEFAULT NULL,
  `jumlah_nilai_sem_2` int(11) DEFAULT NULL,
  `jumlah_pelajaran_sem_3` int(11) DEFAULT NULL,
  `jumlah_nilai_sem_3` int(11) DEFAULT NULL,
  `jumlah_pelajaran_sem_4` int(11) DEFAULT NULL,
  `jumlah_nilai_sem_4` int(11) DEFAULT NULL,
  `jumlah_pelajaran_sem_5` int(11) DEFAULT NULL,
  `jumlah_nilai_sem_5` int(11) DEFAULT NULL,
  `jumlah_pelajaran_sem_6` int(11) DEFAULT NULL,
  `jumlah_nilai_sem_6` int(11) DEFAULT NULL,
  `jumlah_pelajaran_un` int(11) DEFAULT NULL,
  `jumlah_nilai_un` int(11) DEFAULT NULL,
  `kemampuan_bahasa_inggris` int(11) DEFAULT NULL,
  `bahasa_asing_lainnya` varchar(45) DEFAULT NULL,
  `kemampuan_bahasa_asing_lainnya` int(11) DEFAULT NULL,
  `informasi_del_id` int(11) NOT NULL,
  `informasi_del_lainnya` tinytext,
  `n` int(11) DEFAULT NULL,
  `tanggal_pendaftaran` date DEFAULT NULL,
  `metode_pembayaran_id` int(11) DEFAULT NULL,
  `file_verifikasi_pembayaran` varchar(128) DEFAULT NULL,
  `pas_foto` varchar(128) DEFAULT NULL,
  `file_nilai_rapor` varchar(128) DEFAULT NULL,
  `file_sertifikat` varchar(128) DEFAULT NULL,
  `file_formulir` varchar(128) DEFAULT NULL,
  `file_rekomendasi` varchar(128) DEFAULT NULL,
  `prefix_kode_pendaftaran` varchar(10) DEFAULT NULL,
  `no_pendaftaran` int(11) DEFAULT NULL,
  `status_pendaftaran_id` int(11) NOT NULL DEFAULT '1',
  `status_adminstrasi_id` int(11) DEFAULT NULL,
  `status_test_akademik_id` int(11) NOT NULL DEFAULT '1',
  `status_test_psikologi_id` int(11) NOT NULL DEFAULT '1',
  `status_kelulusan` int(11) NOT NULL DEFAULT '0',
  `gelombang_pendaftaran_id` int(11) NOT NULL,
  `lokasi_ujian_id` int(11) NOT NULL,
  `kode_ujian` varchar(128) DEFAULT NULL,
  `u_cr` varchar(128) DEFAULT NULL,
  `ip_cr` varchar(45) DEFAULT NULL,
  `d_cr` datetime DEFAULT NULL,
  `u_up` varchar(128) DEFAULT NULL,
  `ip_up` varchar(45) DEFAULT NULL,
  `d_up` datetime DEFAULT NULL,
  `jurusan_sekolah_id` int(11) DEFAULT NULL,
  `sekolah_dapodik_id` int(11) DEFAULT NULL,
  `no_hp_orangtua` varchar(45) DEFAULT NULL,
  `no_npwp` varchar(32) DEFAULT NULL,
  `kebutuhan_khusus_mahasiswa` int(10) DEFAULT NULL,
  `motivasi` text,
  `hobby` varchar(235) DEFAULT NULL,
  `kab_domisili` varchar(100) DEFAULT NULL,
  `virtual_account` varchar(100) DEFAULT NULL,
  `voucher_daftar` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pendaftar_id`),
  KEY `fk_t_pendaftar_t_user1_idx` (`user_id`),
  KEY `fk_t_pendaftar_t_r_jenis_kelamin1_idx` (`jenis_kelamin_id`),
  KEY `fk_t_pendaftar_t_r_agama1_idx` (`agama_id`),
  KEY `fk_t_pendaftar_t_r_sekolah1_idx` (`sekolah_id`),
  KEY `fk_t_pendaftar_t_r_informasi_del1_idx` (`informasi_del_id`),
  KEY `fk_t_pendaftar_t_r_jalur_pendaftaran1_idx` (`jalur_pendaftaran_id`),
  KEY `fk_t_pendaftar_t_status_pendaftaran1_idx` (`status_pendaftaran_id`),
  KEY `fk_t_pendaftar_t_status_test_akademik1_idx` (`status_test_akademik_id`),
  KEY `fk_t_pendaftar_t_status_test_psikologi1_idx` (`status_test_psikologi_id`),
  KEY `fk_t_pendaftar_t_gelombang_pendaftaran1_idx` (`gelombang_pendaftaran_id`),
  KEY `fk_t_pendaftar_t_r_lokasi_ujian` (`lokasi_ujian_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13547 DEFAULT CHARSET=utf8;

/*Table structure for table `t_pilihan_jurusan` */

CREATE TABLE `t_pilihan_jurusan` (
  `pilihan_jurusan_id` int(11) NOT NULL AUTO_INCREMENT,
  `pendaftar_id` int(11) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `prioritas` int(11) NOT NULL,
  `lulus` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pilihan_jurusan_id`),
  KEY `fk_t_r_pilihan_jurusan_t_pendaftar1_idx` (`pendaftar_id`),
  KEY `fk_t_r_pilihan_jurusan_t_r_jurusan1_idx` (`jurusan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28186 DEFAULT CHARSET=utf8;

/*Table structure for table `t_pindah_lokasi` */

CREATE TABLE `t_pindah_lokasi` (
  `pindah_lokasi_id` int(11) NOT NULL AUTO_INCREMENT,
  `pendaftar_id` int(11) NOT NULL,
  `lokasi_saat_ini` int(11) NOT NULL,
  `lokasi_tujuan` varchar(100) DEFAULT NULL,
  `file_pendukung` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `catatan` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`pindah_lokasi_id`),
  KEY `pendaftar_id` (`pendaftar_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7162 DEFAULT CHARSET=utf8;

/*Table structure for table `t_prestasi` */

CREATE TABLE `t_prestasi` (
  `prestasi_id` int(11) NOT NULL AUTO_INCREMENT,
  `pendaftar_id` int(11) NOT NULL,
  `tingkat_id` int(11) NOT NULL,
  `jenis_prestasi` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tahun` varchar(100) DEFAULT NULL,
  `file` varchar(128) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`prestasi_id`),
  KEY `pendaftar_id` (`pendaftar_id`),
  KEY `tingkat_id` (`tingkat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7162 DEFAULT CHARSET=utf8;

/*Table structure for table `t_r_agama` */

CREATE TABLE `t_r_agama` (
  `agama_id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`agama_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Table structure for table `t_r_berkas_daftar_ulang` */

CREATE TABLE `t_r_berkas_daftar_ulang` (
  `berkas_daftar_ulang_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `desc` text,
  `berkas` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`berkas_daftar_ulang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Table structure for table `t_r_bidang_utbk` */

CREATE TABLE `t_r_bidang_utbk` (
  `bidang_utbk_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_bidang_utbk_id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`bidang_utbk_id`),
  KEY `fk_t_r_bidang_utbk_kategori_bidang_utbk` (`kategori_bidang_utbk_id`),
  CONSTRAINT `kategori_bidang_utbk` FOREIGN KEY (`kategori_bidang_utbk_id`) REFERENCES `t_r_kategori_bidang_utbk` (`kategori_bidang_utbk_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Table structure for table `t_r_configs` */

CREATE TABLE `t_r_configs` (
  `configs_id` varchar(128) NOT NULL,
  `value` text,
  PRIMARY KEY (`configs_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `t_r_fakultas` */

CREATE TABLE `t_r_fakultas` (
  `fakultas_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `afis_programstudi_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`fakultas_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Table structure for table `t_r_gelombang_pendaftaran` */

CREATE TABLE `t_r_gelombang_pendaftaran` (
  `gelombang_pendaftaran_id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` year(4) DEFAULT NULL,
  `desc` varchar(45) DEFAULT NULL,
  `mulai` date DEFAULT NULL,
  `berakhir` date DEFAULT NULL,
  `prefix_kode_pendaftaran` varchar(10) DEFAULT NULL,
  `counter` int(11) NOT NULL DEFAULT '0',
  `is_online` tinyint(4) NOT NULL DEFAULT '1',
  `is_bayar` tinyint(1) NOT NULL DEFAULT '1',
  `jenis_ujian_id` int(11) NOT NULL DEFAULT '1',
  `minimum_n` int(11) NOT NULL DEFAULT '0',
  `base_n` int(11) NOT NULL DEFAULT '0' COMMENT 'nilai awal jumlah n',
  `multi_n` int(11) NOT NULL DEFAULT '0' COMMENT 'nilai yang akan dikalikan dengan N',
  `tanggal_ujian` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  PRIMARY KEY (`gelombang_pendaftaran_id`)
) ENGINE=MyISAM AUTO_INCREMENT=120 DEFAULT CHARSET=utf8;

/*Table structure for table `t_r_golongan_darah` */

CREATE TABLE `t_r_golongan_darah` (
  `golongan_darah_id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`golongan_darah_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `t_r_informasi_del` */

CREATE TABLE `t_r_informasi_del` (
  `informasi_del_id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`informasi_del_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Table structure for table `t_r_jalur_pendaftaran` */

CREATE TABLE `t_r_jalur_pendaftaran` (
  `jalur_pendaftaran_id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`jalur_pendaftaran_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Table structure for table `t_r_jenis_kelamin` */

CREATE TABLE `t_r_jenis_kelamin` (
  `jenis_kelamin_id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`jenis_kelamin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Table structure for table `t_r_jenis_test` */

CREATE TABLE `t_r_jenis_test` (
  `jenis_test_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`jenis_test_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7162 DEFAULT CHARSET=utf8;

/*Table structure for table `t_r_jenis_ujian` */

CREATE TABLE `t_r_jenis_ujian` (
  `jenis_ujian_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `desc` text,
  PRIMARY KEY (`jenis_ujian_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Table structure for table `t_r_jenjang_pendidikan` */

CREATE TABLE `t_r_jenjang_pendidikan` (
  `jenjang_pendidikan_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`jenjang_pendidikan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Table structure for table `t_r_jurusan` */

CREATE TABLE `t_r_jurusan` (
  `jurusan_id` int(11) NOT NULL AUTO_INCREMENT,
  `fakultas_id` int(11) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `prefix_nim` varchar(5) DEFAULT NULL,
  `counter_nim` int(11) DEFAULT NULL,
  `status_active` int(11) NOT NULL DEFAULT '0',
  `url` varchar(255) DEFAULT NULL,
  `desc` text,
  `afis_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`jurusan_id`),
  KEY `fk_t_jurusan_t_fakultas1_idx` (`fakultas_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Table structure for table `t_r_jurusan_sekolah` */

CREATE TABLE `t_r_jurusan_sekolah` (
  `jurusan_sekolah_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `isactive` tinyint(1) DEFAULT '1',
  `tingkat` enum('SMA','SMK','MA') DEFAULT NULL,
  PRIMARY KEY (`jurusan_sekolah_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Table structure for table `t_r_kabupaten` */

CREATE TABLE `t_r_kabupaten` (
  `kabupaten_id` int(11) NOT NULL AUTO_INCREMENT,
  `provinsi_id` int(11) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`kabupaten_id`),
  KEY `provinsi_id` (`provinsi_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000 DEFAULT CHARSET=utf8;

/*Table structure for table `t_r_kategori_bidang_utbk` */

CREATE TABLE `t_r_kategori_bidang_utbk` (
  `kategori_bidang_utbk_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(125) NOT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`kategori_bidang_utbk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `t_r_kecamatan` */

CREATE TABLE `t_r_kecamatan` (
  `kecamatan_id` int(11) NOT NULL AUTO_INCREMENT,
  `kabupaten_id` int(11) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`kecamatan_id`),
  KEY `kabupaten_id` (`kabupaten_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000 DEFAULT CHARSET=utf8;

/*Table structure for table `t_r_kemampuan_bahasa` */

CREATE TABLE `t_r_kemampuan_bahasa` (
  `kemampuan_bahasa_id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`kemampuan_bahasa_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Table structure for table `t_r_komponen_pembayaran` */

CREATE TABLE `t_r_komponen_pembayaran` (
  `komponen_pembayaran_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `jumlah` varchar(45) NOT NULL,
  `harus_dibayar` int(11) NOT NULL DEFAULT '0',
  `keterangan` varchar(255) NOT NULL DEFAULT '-',
  PRIMARY KEY (`komponen_pembayaran_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Table structure for table `t_r_lokasi_ujian` */

CREATE TABLE `t_r_lokasi_ujian` (
  `lokasi_ujian_id` int(11) NOT NULL AUTO_INCREMENT,
  `gelombang_pendaftaran_id` int(11) DEFAULT NULL,
  `jenis_test_id` int(11) DEFAULT NULL,
  `kode_lokasi` varchar(3) DEFAULT NULL,
  `gedung` varchar(100) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `tanggal_mulai` datetime DEFAULT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  `desc` varchar(128) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0' COMMENT '0: not active, 1: active',
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`lokasi_ujian_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Table structure for table `t_r_mata_pelajaran` */

CREATE TABLE `t_r_mata_pelajaran` (
  `mata_pelajaran_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `desc` text,
  PRIMARY KEY (`mata_pelajaran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `t_r_metode_pembayaran` */

CREATE TABLE `t_r_metode_pembayaran` (
  `metode_pembayaran_id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`metode_pembayaran_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Table structure for table `t_r_pekerjaan` */

CREATE TABLE `t_r_pekerjaan` (
  `pekerjaan_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`pekerjaan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Table structure for table `t_r_predikat_kelulusan` */

CREATE TABLE `t_r_predikat_kelulusan` (
  `predikat_kelulusan_id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`predikat_kelulusan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Table structure for table `t_r_provinsi` */

CREATE TABLE `t_r_provinsi` (
  `provinsi_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`provinsi_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000 DEFAULT CHARSET=utf8;

/*Table structure for table `t_r_sekolah` */

CREATE TABLE `t_r_sekolah` (
  `sekolah_id` int(11) NOT NULL AUTO_INCREMENT,
  `provinsi_id` int(11) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `alamat` text,
  `no_telepon` varchar(45) DEFAULT NULL,
  `kabupaten_kota` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sekolah_id`),
  KEY `fk_t_r_sekolah_t_r_provinsi1_idx` (`provinsi_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10997 DEFAULT CHARSET=utf8;

/*Table structure for table `t_r_sekolah_dapodik` */

CREATE TABLE `t_r_sekolah_dapodik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_dapodik` varchar(255) DEFAULT NULL,
  `npsn` varchar(255) DEFAULT NULL,
  `kode_prop` varchar(255) DEFAULT NULL,
  `propinsi` varchar(255) DEFAULT NULL,
  `kode_kab_kota` varchar(255) DEFAULT NULL,
  `kabupaten_kota` varchar(255) DEFAULT NULL,
  `kode_kec` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `bentuk` varchar(255) DEFAULT NULL,
  `sekolah` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `alamat_jalan` varchar(255) DEFAULT NULL,
  `lintang` varchar(255) DEFAULT NULL,
  `bujur` varchar(255) DEFAULT NULL,
  `jumlah_siswa_lk` varchar(255) DEFAULT NULL,
  `jumlah_siswa_pr` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45320 DEFAULT CHARSET=latin1;

/*Table structure for table `t_r_status_adminstrasi` */

CREATE TABLE `t_r_status_adminstrasi` (
  `status_administrasi_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`status_administrasi_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7162 DEFAULT CHARSET=utf8;

/*Table structure for table `t_r_status_pendaftaran` */

CREATE TABLE `t_r_status_pendaftaran` (
  `status_pendaftaran_id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`status_pendaftaran_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Table structure for table `t_r_status_test_akademik` */

CREATE TABLE `t_r_status_test_akademik` (
  `status_test_akademik_id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`status_test_akademik_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Table structure for table `t_r_status_test_psikologi` */

CREATE TABLE `t_r_status_test_psikologi` (
  `status_test_psikologi_id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`status_test_psikologi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `t_r_tingkat` */

CREATE TABLE `t_r_tingkat` (
  `tingkat_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tingkat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7162 DEFAULT CHARSET=utf8;

/*Table structure for table `t_r_uang_daftar_ulang` */

CREATE TABLE `t_r_uang_daftar_ulang` (
  `uang_daftar_ulang_id` int(11) NOT NULL AUTO_INCREMENT,
  `gelombang_pendaftaran_id` int(11) NOT NULL,
  `perlengkapan_mhs` int(11) NOT NULL,
  `perlengkapan_makan` int(11) NOT NULL,
  `spp_tahap_1` int(11) NOT NULL,
  PRIMARY KEY (`uang_daftar_ulang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Table structure for table `t_r_uang_pembangunan` */

CREATE TABLE `t_r_uang_pembangunan` (
  `uang_pembangunan_id` int(11) NOT NULL AUTO_INCREMENT,
  `gelombang_pendaftaran_id` int(11) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `minimum_n` int(11) NOT NULL,
  `base_n` int(11) DEFAULT NULL,
  `multi_n` int(11) NOT NULL,
  PRIMARY KEY (`uang_pembangunan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=646 DEFAULT CHARSET=latin1;

/*Table structure for table `t_reset_pass` */

CREATE TABLE `t_reset_pass` (
  `reset_pass_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `challenge_code` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`reset_pass_id`,`user_id`),
  KEY `fk_t_reset_pass_t_user1_idx` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3379 DEFAULT CHARSET=utf8;

/*Table structure for table `t_sekolah_pmdk` */

CREATE TABLE `t_sekolah_pmdk` (
  `sekolah_pmdk_id` int(11) NOT NULL AUTO_INCREMENT,
  `sekolah_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sekolah_pmdk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

/*Table structure for table `t_user` */

CREATE TABLE `t_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) DEFAULT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `verf_code` varchar(128) NOT NULL,
  `u_cr` varchar(128) DEFAULT NULL,
  `ip_cr` varchar(45) DEFAULT NULL,
  `d_cr` datetime DEFAULT NULL,
  `u_up` varchar(128) DEFAULT NULL,
  `ip_up` varchar(45) DEFAULT NULL,
  `d_up` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10012784 DEFAULT CHARSET=utf8;

/*Table structure for table `t_utbk` */

CREATE TABLE `t_utbk` (
  `utbk_id` int(11) NOT NULL AUTO_INCREMENT,
  `pendaftar_id` int(11) NOT NULL,
  `no_peserta` bigint(15) NOT NULL,
  `tanggal_ujian` date NOT NULL,
  `file_sertifikat` varchar(125) NOT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`utbk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1211 DEFAULT CHARSET=latin1;

/*Table structure for table `t_voucher` */

CREATE TABLE `t_voucher` (
  `voucher_id` int(11) NOT NULL AUTO_INCREMENT,
  `gelombang_pendaftaran_id` int(11) NOT NULL,
  `kode` varchar(100) DEFAULT NULL,
  `nominal` decimal(19,0) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`voucher_id`),
  KEY `gelombang_pendaftaran_id` (`gelombang_pendaftaran_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7162 DEFAULT CHARSET=utf8;

/*Table structure for table `t_waktu_pengumuman` */

CREATE TABLE `t_waktu_pengumuman` (
  `waktu_pengumuman_id` int(11) NOT NULL AUTO_INCREMENT,
  `gelombang_pendaftaran_id` int(11) NOT NULL,
  `jenis_test_id` int(11) NOT NULL,
  `tanggal_mulai` datetime DEFAULT NULL,
  `tanggal_akhir` datetime DEFAULT NULL,
  `catatan` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`waktu_pengumuman_id`),
  KEY `gelombang_pendaftaran_id` (`gelombang_pendaftaran_id`),
  KEY `jenis_test_id` (`jenis_test_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7162 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
