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
