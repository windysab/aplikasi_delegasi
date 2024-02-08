<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_delegasi extends CI_Model
{
	function delegasi($lap_bulan, $lap_tahun)
	{
		$query = $this->db->query("
            SELECT 
                dm.pn_asal_text, 
                dm.nomor_perkara, 
                dm.pihak, 
                dm.nomor_surat, 
                dm.tgl_surat, 
                dm.tgl_sidang,
				dm.tgl_resi,              
                dpm.tgl_surat_diterima, 
                dpm.tgl_penunjukan_jurusita, 
                dpm.tgl_relaas, 
                dpm.tgl_pengiriman_relaas,
				dpm.jurusita_nama, 
				dm.jenis_delegasi_text
            FROM 
                delegasi_masuk dm
            JOIN 
                delegasi_proses_masuk dpm ON dm.perkara_id = dpm.perkara_id
            WHERE 
                MONTH(dm.tgl_surat) = ? AND YEAR(dm.tgl_surat) = ?
            GROUP BY 
                dm.nomor_surat
            ORDER BY 
                dm.perkara_id
        ", array($lap_bulan, $lap_tahun));

		return $query->result();
	}
}
