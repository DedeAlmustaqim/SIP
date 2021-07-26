<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Progress extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		if (($this->session->userdata('akses') == '1') || ($this->session->userdata('akses') == '2')) {
		} else {
			redirect('login');
		}
		$this->load->library('template');
		//MODEL

		$this->load->helper('string');
		$this->load->library('form_validation');
		$this->load->model('m_master');
		$this->load->model('m_progress');
		$this->load->library('datatables');
	}


	public function index()
	{
		$this->load->library('template');
		$data['judul'] = "Progress SKPD";

		$data['skpd'] = $this->m_master->tampil_unit();


		$this->template->konten('admin/progress', $data);
		//var_dump($data);
	}



	public function get_apbd($id_bln, $id_unit)
	{
		$row = $this->m_progress->json_get_apbd($id_bln, $id_unit);
		if ($row) {
			$data = array(
				'id_bln' 	=> $row->id_bln,
				'id_unit' 	=> $row->id_unit,
				'pg_apbd' 	=> $row->pg_apbd,
				'real_apbd' 	=> $row->real_apbd,
				'real_apbd_per' 	=> $row->real_apbd_per,
				'real_apbd_fisik' 	=> $row->real_apbd_fisik,
				'pg_bl_op' 	=> $row->pg_bl_op,
				'rk_keu_op_rp' 	=> $row->rk_keu_op_rp,
				'rk_keu_op_per' 	=> $row->rk_keu_op_per,
				'rf_op' 	=> $row->rf_op,
				'pg_bl_bm' 	=> $row->pg_bl_bm,
				'rk_keu_bm_rp' 	=> $row->rk_keu_bm_rp,
				'rk_keu_bm_per' 	=> $row->rk_keu_bm_per,
				'rf_bm' 	=> $row->rf_bm,
				'pg_btt' 	=> $row->pg_btt,
				'rk_keu_btt_rp' 	=> $row->rk_keu_btt_rp,
				'rk_keu_btt_per' 	=> $row->rk_keu_btt_per,
				'rf_btt' 	=> $row->rf_btt,
				'pg_bl_bt' 	=> $row->pg_bl_bt,
				'rk_keu_bt_rp' 	=> $row->rk_keu_bt_rp,
				'rk_keu_bt_per' 	=> $row->rk_keu_bt_per,
				'rf_bt' 	=> $row->rf_bt,


			);
		} else {
			echo "data kosong";
		}
		header('Content-Type: application/json');
		echo json_encode($data);
	}




}
