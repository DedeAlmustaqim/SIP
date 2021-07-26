<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Dak extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();

		if (($this->session->userdata('akses') == '1') || ($this->session->userdata('akses') == '2') || ($this->session->userdata('akses') == '3') || ($this->session->userdata('akses') == '4') || ($this->session->userdata('akses') == '5')) {
		} else {
			redirect('login');
		}
		$this->load->library('template');
		$this->load->model('m_master');
		$this->load->model('m_dak_admin');
		$this->load->library('datatables');
		$this->ta = $this->session->userdata('ta');
	}
	public function index()
	{
		$data['skpd'] = $this->m_master->tampil_unit();

		$data['judul'] = "DANA DAK FISIK";
		$data['bln'] = $this->m_master->tampil_bln();

		$this->template->konten('admin/dak', $data);
	}

	public function kegiatan()
	{
		$data['skpd'] = $this->m_master->tampil_unit();

		$data['judul'] = "KEGIATAN DAK";
		$data['bln'] = $this->m_master->tampil_bln();

		$this->template->konten('admin/dak_keg', $data);
	}


	private function verif_pos_dak_fisik()
	{
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			redirect('dashboard');
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_unit_fisik', 'id_unit_fisik', 'trim|required');
		$this->form_validation->set_rules('keg_fisik', 'keg_fisik', 'trim|required');
		$this->form_validation->set_rules('pagu_dak_fisik', 'pagu_dak_fisik', 'trim|required');
		return $this->form_validation->run();
	}

	public function post_dak_fisik()
	{
		$this->load->helper('string');
		$ta = $this->session->userdata('ta');
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			redirect('dashboard');
		}

		if ($this->verif_pos_dak_fisik()) {
			$id_unit = $this->input->post('id_unit_fisik');
			$keg = $this->input->post('keg_fisik');
			$pagu = $this->input->post('pagu_dak_fisik');
			$data = array(
				array(
					'id_dak_fisik' => random_string('alnum', 25),
					'id_unit' => $id_unit,
					'tahun' => $ta,
					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
					'id_bln' => 1,
				),
				array(
					'id_dak_fisik' => random_string('alnum', 25),
					'id_unit' => $id_unit,
					'tahun' => $ta,
					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
					'id_bln' => 2,
				),
				array(
					'id_dak_fisik' => random_string('alnum', 25),
					'id_unit' => $id_unit,
					'tahun' => $ta,
					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
					'id_bln' => 3,
				),
				array(
					'id_dak_fisik' => random_string('alnum', 25),
					'id_unit' => $id_unit,
					'tahun' => $ta,
					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
					'id_bln' => 4,
				),
				array(
					'id_dak_fisik' => random_string('alnum', 25),
					'id_unit' => $id_unit,
					'tahun' => $ta,
					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
					'id_bln' => 5,
				),
				array(
					'id_dak_fisik' => random_string('alnum', 25),
					'id_unit' => $id_unit,
					'tahun' => $ta,
					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
					'id_bln' => 6,
				),
				array(
					'id_dak_fisik' => random_string('alnum', 25),
					'id_unit' => $id_unit,
					'tahun' => $ta,
					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
					'id_bln' => 7,
				),
				array(
					'id_dak_fisik' => random_string('alnum', 25),
					'id_unit' => $id_unit,
					'tahun' => $ta,
					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
					'id_bln' => 8,
				),
				array(
					'id_dak_fisik' => random_string('alnum', 25),
					'id_unit' => $id_unit,
					'tahun' => $ta,
					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
					'id_bln' => 9,
				),
				array(
					'id_dak_fisik' => random_string('alnum', 25),
					'id_unit' => $id_unit,
					'tahun' => $ta,
					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
					'id_bln' => 10,
				),
				array(
					'id_dak_fisik' => random_string('alnum', 25),
					'id_unit' => $id_unit,
					'tahun' => $ta,
					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
					'id_bln' => 11,
				),
				array(
					'id_dak_fisik' => random_string('alnum', 25),
					'id_unit' => $id_unit,
					'tahun' => $ta,
					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
					'id_bln' => 12,
				),

			);
			$this->db->insert_batch('tbl_dak_fisik', $data);
			echo json_encode($data);
		} else {
			show_404();
		}
	}

	private function verif_edit_dak_fisik()
	{
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			redirect('dashboard');
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_unit_fisik_edit', 'id_unit_fisik_edit', 'trim|required');
		$this->form_validation->set_rules('keg_fisik_edit', 'keg_fisik_edit', 'trim|required');
		$this->form_validation->set_rules('pagu_dak_fisik_edit', 'pagu_dak_fisik_edit', 'trim|required');
		return $this->form_validation->run();
	}

	public function edit_dak_fisik()
	{
		$ta = $this->session->userdata('ta');
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			redirect('dashboard');
		}

		if ($this->verif_edit_dak_fisik()) {
			$id_unit = $this->input->post('id_unit_fisik_edit');
			$keg = $this->input->post('keg_fisik_edit');
			$pagu = $this->input->post('pagu_dak_fisik_edit');
			$data = array(
				array(

					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
				),

			);
			$this->db->update_batch('tbl_dak_fisik', $data);
			var_dump($data);
		} else {
			show_404();
		}
	}

	public function json_dak_fisik()
	{
		//$id_unit = $this->session->userdata('ses_id_unit');
		$data = $this->m_dak_admin->json_dak_fisik();
		header('Content-Type: application/json');
		echo $data;
	}

	public function json_dak_non_fisik()
	{
		//$id_unit = $this->session->userdata('ses_id_unit');
		$data = $this->m_dak_admin->json_dak_non_fisik();
		header('Content-Type: application/json');
		echo $data;
	}

	private function verif_del_dak_fisik()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules('keg', 'keg', 'trim|required');
		return $this->form_validation->run();
	}
	public function del_dak_fisik()
	{

		if ($this->verif_del_dak_fisik()) {
			$id = $this->input->post('keg');

			$this->db->where('keg', $id);
			$this->db->delete('tbl_dak_fisik');
		} else {
			echo "error";
		}
	}

	public function get_dak_fisik_keg($id)
	{
		$row = $this->m_dak_admin->get_dak_fisik_by_id($id);
		if ($row) {
			$data = array(
				'id_dak_fisik' 	=> $row->id_dak_fisik,
				'id_unit' 	=> $row->id_unit,
				'keg' 	=> $row->keg,
				'pagu' 	=> $row->pagu,


			);
			header('Content-Type: application/json');
			echo json_encode($data);
		} else {
			echo "data kosong";
		}
	}



	private function verif_pos_dak_non_fisik()
	{
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			redirect('dashboard');
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_unit_non_fisik', 'id_unit_non_fisik', 'trim|required');
		$this->form_validation->set_rules('keg_non_fisik', 'keg_non_fisik', 'trim|required');
		$this->form_validation->set_rules('pagu_dak_non_fisik', 'pagu_dak_non_fisik', 'trim|required');
		return $this->form_validation->run();
	}

	public function post_dak_non_fisik()
	{
		$this->load->helper('string');
		$ta = $this->session->userdata('ta');
		$akses = $this->session->userdata('akses');
		if ($akses != 1) {
			redirect('dashboard');
		}

		if ($this->verif_pos_dak_non_fisik()) {
			$id_unit = $this->input->post('id_unit_non_fisik');
			$keg = $this->input->post('keg_non_fisik');
			$pagu = $this->input->post('pagu_dak_non_fisik');
			$data = array(
				array(
					'id_non_fisik' => random_string('alnum', 25),
					'id_unit' => $id_unit,
					'tahun' => $ta,
					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
					'id_bln' => 1,
				),
				array(
					'id_non_fisik' => random_string('alnum', 25),
					'id_unit' => $id_unit,
					'tahun' => $ta,
					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
					'id_bln' => 2,
				),
				array(
					'id_non_fisik' => random_string('alnum', 25),
					'id_unit' => $id_unit,
					'tahun' => $ta,
					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
					'id_bln' => 3,
				),
				array(
					'id_non_fisik' => random_string('alnum', 25),
					'id_unit' => $id_unit,
					'tahun' => $ta,
					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
					'id_bln' => 4,
				),
				array(
					'id_non_fisik' => random_string('alnum', 25),
					'id_unit' => $id_unit,
					'tahun' => $ta,
					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
					'id_bln' => 5,
				),
				array(
					'id_non_fisik' => random_string('alnum', 25),
					'id_unit' => $id_unit,
					'tahun' => $ta,
					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
					'id_bln' => 6,
				),
				array(
					'id_non_fisik' => random_string('alnum', 25),
					'id_unit' => $id_unit,
					'tahun' => $ta,
					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
					'id_bln' => 7,
				),
				array(
					'id_non_fisik' => random_string('alnum', 25),
					'id_unit' => $id_unit,
					'tahun' => $ta,
					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
					'id_bln' => 8,
				),
				array(
					'id_non_fisik' => random_string('alnum', 25),
					'id_unit' => $id_unit,
					'tahun' => $ta,
					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
					'id_bln' => 9,
				),
				array(
					'id_non_fisik' => random_string('alnum', 25),
					'id_unit' => $id_unit,
					'tahun' => $ta,
					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
					'id_bln' => 10,
				),
				array(
					'id_non_fisik' => random_string('alnum', 25),
					'id_unit' => $id_unit,
					'tahun' => $ta,
					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
					'id_bln' => 11,
				),
				array(
					'id_non_fisik' => random_string('alnum', 25),
					'id_unit' => $id_unit,
					'tahun' => $ta,
					'keg' => $keg,
					'pagu' => str_replace(',', '', $pagu),
					'id_bln' => 12,
				),

			);
			$this->db->insert_batch('tbl_dak_non_fisik', $data);
			echo json_encode($data);
		} else {
			show_404();
		}
	}

	private function verif_del_dak_non_fisik()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules('keg', 'keg', 'trim|required');
		return $this->form_validation->run();
	}
	public function del_dak_non_fisik()
	{

		if ($this->verif_del_dak_non_fisik()) {
			$id = $this->input->post('keg');

			$this->db->where('keg', $id);
			$this->db->delete('tbl_dak_non_fisik');
		} else {
			echo "error";
		}
	}

	public function get_dak_fisik($bln)
	{

		$data = $this->m_dak_admin->get_dak_fisik($bln);

		header('Content-Type: application/json');
		echo json_encode($data);

		//var_dump($data);

	}

	public function get_dak_non_fisik($bln)
	{

		$data = $this->m_dak_admin->get_dak_non_fisik($bln);

		header('Content-Type: application/json');
		echo json_encode($data);

		//var_dump($data);

	}
	function cetak_dak_fisik($id_bln)
	{
		$this->load->library('pdfgenerator');



		$data['main'] = $this->m_dak_admin->cetak_dak_fisik($id_bln);
		$fisik_total = $this->db->query("SELECT sum(real_fik*pagu)/sum(pagu) AS fis_total FROM tbl_dak_fisik WHERE id_bln='$id_bln' AND tahun='$this->ta'  ")->row();
		$data['fis'] = $fisik_total->fis_total;


		//var_dump($data);
		$filename =  "DAK Fisik";
		$html = $this->load->view('laporan/admin/cetak_dak_fisik', $data, true);
		$this->pdfgenerator->generate($html, $filename);
	}

	function cetak_dak_non_fisik($id_bln)
	{
		$this->load->library('pdfgenerator');



		$data['main'] = $this->m_dak_admin->cetak_dak_non_fisik($id_bln);
		$fisik_total = $this->db->query("SELECT sum(real_fik*pagu)/sum(pagu) AS fis_total FROM tbl_dak_non_fisik WHERE id_bln='$id_bln' AND tahun='$this->ta'  ")->row();
		$data['fis'] = $fisik_total->fis_total;

		//var_dump($data);
		$filename =  "DAK Non Fisik";
		$html = $this->load->view('laporan/admin/cetak_dak_non_fisik', $data, true);
		$this->pdfgenerator->generate($html, $filename);
	}
}
