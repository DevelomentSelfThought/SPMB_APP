/* delete all data in table organisasi where pendaftar_id = 123457 */
DELETE FROM organisasi WHERE pendaftar_id = 123457;
-- insert to t_r_sekolah_dapodik (id_dapodik = 13) where sekolah = "SMA NEGERI 1 TANJUNG MUTIARA"

--update id_dapodi = 13 where sekolah = "SMA NEGERI 1 TANJUNG MUTIARA" 
UPDATE t_r_sekolah_dapodik SET id_dapodik = 13 WHERE sekolah = "SMA NEGERI 1 TANJUNG MUTIARA";