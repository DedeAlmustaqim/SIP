<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (($this->session->userdata('akses') == '1') || ($this->session->userdata('akses') == '2') || ($this->session->userdata('akses') == '3') || ($this->session->userdata('akses') == '4') || ($this->session->userdata('akses') == '5')) {
		} else {
			redirect('login');
		}
		$this->load->library('template');
		$this->load->model('m_dashboard');
		$this->load->model('m_dashboard_admin');
		$this->load->model('m_master');
		$this->load->library('datatables');
		$this->ta = $this->session->userdata('ta');
	}
	public function index()
	{
		$data['pemda'] = $this->m_master->data_pemda();
		$data['apbd'] = $this->m_dashboard_admin->tabel_apbd($this->ta)->result();
		$data['judul'] = "Dashboard";
		$this->template->konten('admin/dashboard', $data);
		//var_dump($data);
	}

	public function json_status()
	{
		$id_unit = $this->session->userdata('ses_id_unit');
		$data = $this->m_dashboard->json_status($id_unit);
		header('Content-Type: application/json');
		echo $data;
	}

	public function json_grafik()
	{
		$data = $this->m_dashboard_admin->grafik_apbd($this->ta)->result();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function json_grafik_pd()
	{
		$data = $this->m_dashboard_admin->grafik_pd($this->ta)->result();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function json_grafik_ppbj_50()
	{
		$data = $this->m_dashboard_admin->grafik_ppbj_50($this->ta)->result();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function json_grafik_ppbj_200()
	{
		$data = $this->m_dashboard_admin->grafik_ppbj_200($this->ta)->result();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function json_grafik_ppbj_25()
	{
		$data = $this->m_dashboard_admin->grafik_ppbj_25($this->ta)->result();
		header('Content-Type: application/json');
		echo json_encode($data);
	}
}
