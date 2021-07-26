<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		if (($this->session->userdata('akses') == '1') || ($this->session->userdata('akses') == '2') || ($this->session->userdata('akses') == '3') || ($this->session->userdata('akses') == '4') || ($this->session->userdata('akses') == '5')) {
		} else {
			redirect('login');
		}


		$this->load->library('template');
		
	}


	public function index()
	{

		$this->load->library('template');
		$data['judul'] = " MENU LAPORAN ";

		$this->template->konten('laporan', $data);
		//var_dump($data);
	}



	
}
