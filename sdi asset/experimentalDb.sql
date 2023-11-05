create table t_user (
    user_id int not null auto_increment,
    username varchar(255) not null,
    password varchar(255) not null,
    nik varchar(255) not null,
    email varchar(255) not null,
    no_HP varchar(255) not null,
    active int not null default 0,
    primary key (user_id)
);
-- describe t_user structure command
describe t_user;
-- update t_user structure, email column default value is null
alter table t_user alter column email set default 0;
-- add field verf_code to t_user table
alter table t_user add column verf_code varchar(255) not null;
--update t_pendaftar structure, default value of pendaftaran_id 0
alter table t_pendaftar alter column pendaftaran_id set default 0;
-- select specific column from t_pendaftar table
-- tingkat = IPA (MA)
update t_r_jurusan_sekolah set tingkat = 'IPA (MA)' where jurusan_sekolah_id=21;
--remove all data from t_utbk
delete from t_utbk;
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
);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
);

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
);