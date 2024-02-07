<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sisa_bulan_ini extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_sisa_bulan_ini");
    }

   public function index()
    {
        $jenis_perkara = $this->input->post('jenis_perkara');
        $lap_bulan = $this->input->post('lap_bulan');
        $lap_tahun = $this->input->post('lap_tahun');
        $data['datafilter'] = $this->M_sisa_bulan_ini->sisa_bulan_ini($jenis_perkara, $lap_bulan, $lap_tahun);
        $this->load->view('template/new_header');
        $this->load->view('template/new_sidebar');
        $this->load->view('v_sisa_bulan_ini', $data);
        $this->load->view('template/new_footer');   
    }
}
