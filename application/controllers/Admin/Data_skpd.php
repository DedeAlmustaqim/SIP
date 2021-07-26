<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_skpd extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (($this->session->userdata('akses') == '1') || ($this->session->userdata('akses') == '2')) {
		} else {
			redirect('login');
		}
		$this->load->library('template');
		$this->load->helper('string');
		$this->load->library('form_validation');
		$this->load->model('m_apbd');
		$this->load->model('m_apbd_admin');
		$this->load->model('m_master');
		$this->load->library('datatables');
	}

	public function index()
	{
		$this->load->library('template');
		$data['judul'] = "Ringkasan per SKPD";
		$data['bln'] = $this->m_master->tampil_bln();
		$data['skpd'] = $this->m_master->tampil_unit();
		$this->template->konten('admin/data_skpd', $data);
		//var_dump($data);
	}

	
}
