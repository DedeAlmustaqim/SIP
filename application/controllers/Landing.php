<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Landing extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		if ($this->session->userdata('akses')== 1 || $this->session->userdata('akses')== 2 ) {
            redirect('admin/dashboard');
        }
        
        if ($this->session->userdata('akses')== 3 ) {
            redirect('dashboard');
        }

		$this->load->library('template');
		$this->load->model('m_dashboard');
		$this->load->model('m_master');
		$this->load->model('m_landing');
		$this->load->library('datatables');
	}
	public function index()
	{
		$data['pemda'] = $this->m_master->data_pemda();
		$data['apbd'] = $this->m_landing->tabel_apbd()->result();

		$data['judul'] = "SIP KAB. BARITO TIMUR";
		$this->load->view('landing', $data);
		//var_dump($data);
	}


	public function json_grafik_apbd($ta)
	{
		$data = $this->m_landing->grafik_apbd($ta)->result();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function json_grafik_pd($ta)
	{
		$data = $this->m_landing->grafik_pd($ta)->result();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function json_grafik_ppbj_50($ta)
	{
		$data = $this->m_landing->grafik_ppbj_50($ta)->result();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function json_grafik_ppbj_200($ta)
	{
		$data = $this->m_landing->grafik_ppbj_200($ta)->result();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function json_grafik_ppbj_25($ta)
	{
		$data = $this->m_landing->grafik_ppbj_25($ta)->result();
		header('Content-Type: application/json');
		echo json_encode($data);
	}
}
