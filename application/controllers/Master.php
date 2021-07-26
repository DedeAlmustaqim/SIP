<?php
defined('BASEPATH') or exit('No direct script access allowed');

class master extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		$this->load->library('template');
		//MODEL

		$this->load->helper('string');
		$this->load->library('form_validation');
		$this->load->model('m_master');
		$this->load->library('datatables');
	}


	public function index()
	{
		$this->load->library('template');
		$data['judul'] = "Bagian";
		$this->template->konten('master/master', $data);
		//var_dump($data);
	}

	public function setting_bln()
	{
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			show_404();
		}

		$this->load->library('template');
		$data['judul'] = "Master - Pengaturan Jadwal";
		$this->template->konten('master/setting_bln', $data);
	}

	public function user()
	{
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			show_404();
		}
		$data['skpd'] = $this->m_master->tampil_unit();

		$this->load->library('template');
		$data['judul'] = "Master - Setting Pengguna";
		$this->template->konten('master/pengguna', $data);
	}

	public function json_user($id)
	{
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			redirect('dashboard');
		}
		$data = $this->m_master->json_user($id);
		header('Content-Type: application/json');
		echo $data;
	}


	public function data_status()
	{
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			redirect('status_data');
		}

		$this->load->library('template');
		$data['judul'] = "Master - Status Data";
		$this->template->konten('master/stts_data', $data);
	}

	public function json_bln()
	{
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			redirect('dashboard');
		}
		$data = $this->m_master->json_bln();
		header('Content-Type: application/json');
		echo $data;
	}

	private function verif_hapus_jadwal()
	{
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			redirect('dashboard');
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'id', 'trim|required');
		return $this->form_validation->run();
	}
	public function hapus_jadwal()
	{
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			redirect('dashboard');
		}
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			redirect('dashboard');
		}

		if ($this->verif_hapus_jadwal()) {
			$id = $this->input->post('id');
			$data = array(
				'tgl_awal'        => null,
				'tgl_akhir'        => null,

			);
			$this->m_master->update_tbl_bln($data, $id);

			echo json_encode($data);
		} else {
			echo "error";
		}
	}

	private function verif_jadwal()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('IdBln', 'IdBln', 'trim|required');
		$this->form_validation->set_rules('TglAwal', 'TglAwal', 'trim|required');
		$this->form_validation->set_rules('TglAkhir', 'TglAkhir', 'trim|required');
		$this->form_validation->set_rules('WktInputAwal', 'WktInputAwal', 'trim|required');
		$this->form_validation->set_rules('WktInputAkhir', 'WktInputAkhir', 'trim|required');
		return $this->form_validation->run();
	}
	public function jadwal()
	{
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			redirect('dashboard');
		}
		if ($this->verif_jadwal()) {
			$id = $this->input->post('IdBln');
			$TglAwal = $this->input->post('TglAwal');
			$TglAkhir = $this->input->post('TglAkhir');
			$WktInputAwal = $this->input->post('WktInputAwal');
			$WktInputAkhir = $this->input->post('WktInputAkhir');
			$data = array(
				'tgl_awal'        => $TglAwal." ".$WktInputAwal,
				'tgl_akhir'        => $TglAkhir." ".$WktInputAkhir,

			);
			
			$this->m_master->update_tbl_bln($data, $id);

			echo json_encode($data);
		} else {
			echo "error";
		}
	}

	public function unit()
	{
		$this->load->library('template');
		$data['judul'] = "Setting SKPD";
		$this->template->konten('master/unit', $data);
		//var_dump($data);
	}

	public function json_unit()
	{
		$data = $this->m_master->json_unit();
		header('Content-Type: application/json');
		echo $data;
	}





	public function get_unit($id)
	{
		$row = $this->m_master->get_unit($id);
		if ($row) {
			$data = array(
				'id_unit' 	=> $row->id_unit,
				'nm_unit' 	=> $row->nm_unit,
				'nm_pimpinan' 	=> $row->nm_pimpinan,
				'nip' 	=> $row->nip,
				'gol_jab' 	=> $row->gol_jab,
				'stts_p' 	=> $row->stts_p,
				'ttd' 	=> $row->ttd,

			);
		} else {
			echo "data kosong";
		}
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	private function verif_post_skpd()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_unit', 'id_unit', 'trim|required');
		$this->form_validation->set_rules('skpd', 'skpd', 'trim|required');
		$this->form_validation->set_rules('pimpinan', 'pimpinan', 'trim|required');
		$this->form_validation->set_rules('nip', 'nip', 'trim|required');
		$this->form_validation->set_rules('gol', 'gol', 'trim|required');
		$this->form_validation->set_rules('stts_pimpinan', 'stts_pimpinan', 'trim|required');
		$this->form_validation->set_rules('ttd', 'ttd');



		return $this->form_validation->run();
	}
	public function post_skpd()
	{
		if ($this->verif_post_skpd()) {

			$id_unit = $this->input->post('id_unit');
			$skpd = $this->input->post('skpd');
			$pimpinan = $this->input->post('pimpinan');
			$nip = $this->input->post('nip');
			$gol = $this->input->post('gol');
			$stts_p = $this->input->post('stts_pimpinan');
			$ttd = $this->input->post('ttd');


			$data = array(
				'nm_unit'        => $skpd,
				'nm_pimpinan'        => $pimpinan,
				'nip'        => $nip,
				'gol_jab'        => $gol,
				'stts_p'        => $stts_p,
				'ttd'        => $ttd,



			);
			$this->m_master->update_unit($data, $id_unit);

			echo json_encode($data);
		} else {
			echo "error";
		}
	}


	private function verif_post_pass()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_unit_pass', 'id_unit_pass', 'trim|required');
		$this->form_validation->set_rules('pass', 'pass', 'trim|required');
		$this->form_validation->set_rules('pass2', 'pass2', 'trim|required');
		return $this->form_validation->run();
	}
	public function ubah_pass()
	{
		if ($this->verif_post_pass()) {
			$id = $this->input->post('id_unit_pass');
			$pass = $this->input->post('pass');
			$data = array(
				'password'        => md5($pass),


			);
			$data2 = array(
				'pass_log'        => $pass,
				'dibuat'        => date('Y-m-d H:i:s'),


			);
			$this->m_master->update_pass($data, $id);
			$this->m_master->insert_pass_log($data2, $id);

			echo json_encode($data);
		} else {
			echo "error";
		}
	}

	public function clear_data()
	{
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			redirect('dashboard');
		}

		$this->db->truncate('tbl_apbd');
		$this->db->truncate('tbl_ppbj_50');
		$this->db->truncate('tbl_ppbj_200');
		$this->db->truncate('tbl_ppbj_25');
		$this->db->truncate('tbl_pendapatan');

		redirect('admin/dashboard');
	}

	public function backup()
	{
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			redirect('dashboard');
		}
		$this->load->dbutil();
		$this->load->helper('file');

		$config = array(
			'format'	=> 'zip',
			'filename'	=> 'database.sql'
		);

		$backup = $this->dbutil->backup($config);

		$save = FCPATH . 'data/backup-' . date("ymdHis") . '-db_sip.zip';

		write_file($save, $backup);
		redirect('admin/dashboard');
	}

	private function verif_reset_pass()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'id', 'trim|required');
		return $this->form_validation->run();
	}
	public function reset_pass()
	{
		if ($this->verif_reset_pass()) {
			$id = $this->input->post('id');
			$data = array(
				'password'        => md5('sipkabbartim'),


			);
			$data2 = array(
				'pass_log'        => md5('sipbartim'),
				'dibuat'        => date('Y-m-d H:i:s'),


			);
			$this->m_master->update_pass($data, $id);
			$this->m_master->insert_pass_log($data2, $id);

			echo json_encode($data);
		} else {
			echo "error";
		}
	}


	public function status_data($id_bln)
	{
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			redirect('dashboard');
		}
		$data = $this->m_master->json_status_data($id_bln);
		header('Content-Type: application/json');
		echo $data;
	}

	function cetak_status($id_bln)
	{
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			redirect('dashboard');
		}
		$this->load->library('pdfgenerator');
		$data['pemda'] = $this->m_master->data_pemda();



		$data['main'] = $this->m_master->cetak_status($id_bln);

		$filename =  "Status Data";

		$html = $this->load->view('laporan/admin/cetak_status', $data, true);
		$this->pdfgenerator->generate($html, $filename);

		//var_dump($data);
	}

	function cetak_sinkron()
	{
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			redirect('dashboard');
		}
		$this->load->library('pdfgenerator');
		$data['pemda'] = $this->m_master->data_pemda();




		$data['main'] = $this->m_master->cetak_sinkron();

		$filename =  "Sinkron Data";

		$html = $this->load->view('laporan/admin/cetak_sinkron', $data, true);
		$this->pdfgenerator->generate($html, $filename);

		//var_dump($data);
	}


	private function verif_tambah_skpd()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('skpd', 'skpd', 'trim|required');
		$this->form_validation->set_rules('kode', 'kode', 'trim|required');
		$this->form_validation->set_rules('pimpinan', 'pimpinan', 'trim|required');
		$this->form_validation->set_rules('nip', 'nip', 'trim|required');
		$this->form_validation->set_rules('gol', 'gol', 'trim|required');
		$this->form_validation->set_rules('stts_pimpinan', 'stts_pimpinan', 'trim|required');



		return $this->form_validation->run();
	}
	public function tambah_skpd()
	{
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			redirect('dashboard');
		}
		if ($this->verif_tambah_skpd()) {

			$skpd = $this->input->post('skpd');
			$kode = $this->input->post('kode');
			$pimpinan = $this->input->post('pimpinan');
			$nip = $this->input->post('nip');
			$gol = $this->input->post('gol');
			$stts_p = $this->input->post('stts_pimpinan');


			$data = array(
				'id_unit'        => random_string('alnum', 25),
				'nm_unit'        => $skpd,
				'nm_pimpinan'        => $pimpinan,
				'nip'        => $nip,
				'gol_jab'        => $gol,
				'stts_p'        => $stts_p,
				'kode'        => $kode,



			);
			$this->m_master->insert_skpd($data);

			echo json_encode($data);
		} else {
			echo "error";
		}
	}

	private function verif_tambah_user()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_unit_user', 'id_unit_user', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		//$this->form_validation->set_rules('pass_skpd', 'pass_skpd', 'trim|required');




		return $this->form_validation->run();
	}
	public function tambah_user()
	{
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			redirect('dashboard');
		}
		if ($this->verif_tambah_user()) {

			$id_unit = $this->input->post('id_unit_user');
			$username = $this->input->post('username');
			//$pass_skpd = $this->input->post('pass_skpd');



			$data = array(
				'id_user'        => random_string('alnum', 25),
				'id_unit'        => $id_unit,
				'username'        => $username,
				'password'        => md5("sipbartim"),
				'id_akses'        => "4",




			);
			$this->m_master->insert_user($data);

			echo json_encode($data);
		} else {
			echo "error";
		}
	}


	private function cek_delete_user()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'id', 'trim|required');

		return $this->form_validation->run();
	}
	public function delete_user()
	{
		if ($this->cek_delete_user()) {
			$id = $this->input->post('id');

			$this->db->where('id_user', $id);
			$this->db->delete('tbl_user');
		} else {
			show_404();
		}
	}


	public function get_pagu($id)
	{
		$row = $this->m_master->get_pagu($id);
		if ($row) {
			$data = array(
				'id_pg' 	=> $row->id_pg,
				'id_unit' 	=> $row->id_unit,
				'pg_apbd' 	=> $row->pg_apbd,
				'pg_bl_op' 	=> $row->pg_bl_op,
				'pg_bl_bm' 	=> $row->pg_bl_bm,
				'pg_btt' 	=> $row->pg_btt,
				'pg_bt' 	=> $row->pg_bt,

			);
		} else {
			$data = array(
				'id_pg' 	=> 0,
				'id_unit' 	=> 0,
				'pg_apbd' 	=> 0,

				'pg_bl_op' 	=> 0,
				'pg_bl_bm' 	=> 0,
				'pg_btt' 	=> 0,
				'pg_bt' 	=> 0,

			);
		}
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	private function verif_pagu()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_unit_pg', 'id_unit_pg', 'trim|required');
		$this->form_validation->set_rules('pg_apbd_pg', 'pg_apbd_pg', 'trim|required');
		$this->form_validation->set_rules('pg_bl_op_pg', 'pg_bl_op_pg', 'trim|required');
		$this->form_validation->set_rules('pg_bl_bm_pg', 'pg_bl_bm_pg', 'trim|required');
		$this->form_validation->set_rules('pg_btt_pg', 'pg_btt_pg', 'trim|required');
		$this->form_validation->set_rules('pg_btt_pg', 'pg_btt_pg', 'trim|required');



		return $this->form_validation->run();
	}
	public function pagu()
	{
		if ($this->verif_pagu()) {

			$id_unit = $this->input->post('id_unit_pg');
			$pg_apbd = $this->input->post('pg_apbd_pg');
			$pg_bl_op = $this->input->post('pg_bl_op_pg');
			$pg_bl_bm = $this->input->post('pg_bl_bm_pg');
			$pg_btt = $this->input->post('pg_btt_pg');
			$pg_bt = $this->input->post('pg_bt_pg');
			$data = array(
				'id_unit'        => $id_unit,
				'pg_apbd'        => str_replace(',', '', $pg_apbd),
				'pg_bl_op'        => str_replace(',', '', $pg_bl_op),
				'pg_bl_bm'        => str_replace(',', '', $pg_bl_bm),
				'pg_btt'        => str_replace(',', '', $pg_btt),
				'pg_bt'        => str_replace(',', '', $pg_bt),

			);

			$ta = $this->session->userdata('ta');

			$this->m_master->pagu($data, $id_unit, $ta);

			echo json_encode($data);
		} else {
			echo "error";
		}
	}

	public function kunci_pagu()
	{
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			redirect('dashboard');
		}
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			redirect('dashboard');
		}

		$id = $this->input->post('id');
		$nilai = $this->input->post('nilai');
		$data = array(
			'kunci_pagu'        => $nilai,

		);
		$this->m_master->update_tbl_bln($data, $id);
	}

	public function cek_aktif()
	{
		
		$this->db->where('aktif', 1);
		$q = $this->db->get('tbl_bln');
		if ($q->num_rows() > 0) {
			echo "1";
		} else {
			echo "0";
		}
	}

	public function update_stts_bln()
	{
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			redirect('dashboard');
		}
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			redirect('dashboard');
		}

		$id = $this->input->post('id');
		$nilai = $this->input->post('nilai');
		$data = array(
			'aktif'        => $nilai,

		);
		$this->m_master->update_tbl_bln($data, $id);
	}
}
