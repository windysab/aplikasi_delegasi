<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_delegasi_k extends CI_Model
{
	function delegasi_k($lap_bulan, $lap_tahun)
	{

		$this->db->select("
		dm.perkara_id,
		dm.pn_tujuan_text,
		dm.`nomor_perkara`,
		dm.pihak,
		dm.`nomor_surat`,
		tanggal_pendaftaran,
		dm.`tgl_surat`,
		dm.`tgl_sidang`,
		dm.`tgl_delegasi`,
		dpm.`tgl_pengiriman_relaas`,
		dpm.`jurusita_nama`,
		dm.`jenis_delegasi_text`
	");
		$this->db->from('perkara da');
		$this->db->join('delegasi_keluar dm', 'da.perkara_id = dm.perkara_id', 'left');
		$this->db->join('delegasi_proses_keluar dpm', 'da.perkara_id = dpm.perkara_id', 'left');
		$this->db->where("dm.tgl_surat >=", $lap_tahun . '-' . $lap_bulan . '-01');
		$this->db->where("dm.tgl_surat <=", $lap_tahun . '-' . $lap_bulan . '-31');
		$this->db->where("dpm.tgl_surat_diterima >=", $lap_tahun . '-' . $lap_bulan . '-01');
		$this->db->where("dpm.tgl_surat_diterima <=", $lap_tahun . '-' . $lap_bulan . '-31');
		$this->db->where("dpm.tgl_penunjukan_jurusita >=", $lap_tahun . '-' . $lap_bulan . '-01');
		$this->db->where("dpm.tgl_penunjukan_jurusita <=", $lap_tahun . '-' . $lap_bulan . '-31');
		$this->db->where("dpm.tgl_relaas >=", $lap_tahun . '-' . $lap_bulan . '-01');
		$this->db->where("dpm.tgl_relaas <=", $lap_tahun . '-' . $lap_bulan . '-31');

		$this->db->where("dpm.tgl_pengiriman_relaas >=", $lap_tahun . '-' . $lap_bulan . '-01');
		$this->db->where("dpm.tgl_pengiriman_relaas <=", $lap_tahun . '-' . $lap_bulan . '-31');
		$this->db->group_by(array("dm.tgl_surat", "dm.nomor_surat"));
		$this->db->having("COUNT(dpm.perkara_id) >", 0);
		$this->db->order_by('dm.perkara_id', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
}
