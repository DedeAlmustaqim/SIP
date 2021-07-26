<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppbj extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		if (($this->session->userdata('akses') == '1') || ($this->session->userdata('akses') == '2') ) {
		} else {
			redirect('login');
		}
		$this->load->library('template');
		//MODEL

		$this->load->helper('string');
		$this->load->library('form_validation');
		$this->load->model('m_ppbj_50_admin');
		$this->load->model('m_ppbj_200_admin');
		$this->load->model('m_ppbj_25_admin');
		$this->load->model('m_master');
		$this->load->library('datatables');
	}


	public function index()
	{
		show_404();
	}
	public function ppbj_50()
	{
		$this->load->library('template');
		$data['judul'] = "Menu PPBJ NON STRATEGIS (>RP. 50 JUTA S/D Rp. 200 JUTA)";

		$this->template->konten('admin/ppbj_50', $data);
		//var_dump($data);
	}

	public function ppbj_200()
	{
		$this->load->library('template');
		$data['judul'] = "Menu PPBJ NON STRATEGIS (>RP. 200 JUTA S/D Rp. 2,5 M)";

		$this->template->konten('admin/ppbj_200', $data);
		//var_dump($data);
	}

	public function ppbj_25()
	{
		$this->load->library('template');
		$data['judul'] = "Menu PPBJ NON STRATEGIS (>RP. 2,5 M S/D Rp. 5 M)";

		$this->template->konten('admin/ppbj_25', $data);
		//var_dump($data);
	}

	public function json_ppbj_50($id_bln)
	{
		$data = $this->m_ppbj_50_admin->json_ppbj_50($id_bln);
		header('Content-Type: application/json');
		echo $data;
	}

	public function get_ppbj_50($bln, $unit)
	{
		$row = $this->m_ppbj_50_admin->json_get($bln, $unit);
		if ($row) {
			$data = array(
				'id_bln' 	=> $row->id_bln,
				'id_unit' 	=> $row->id_unit,
				'jml_pkt_50' 	=> $row->jml_pkt_50,
				'jml_pg_50' 	=> $row->jml_pg_50,
				'pl_pkt_50' 	=> $row->pl_pkt_50,
				'pl_rp_50' 	=> $row->pl_rp_50,
				'h_pl_pkt_50' 	=> $row->h_pl_pkt_50,
				'h_pl_rp_50' 	=> $row->h_pl_rp_50,
				'kontrak_pkt_50' 	=> $row->kontrak_pkt_50,
				'kontrak_rp_50' 	=> $row->kontrak_rp_50,
				'st_pkt_50' 	=> $row->st_pkt_50,
				'st_rp_50' 	=> $row->st_rp_50,
				'bp_pkt_50' 	=> $row->bp_pkt_50,
				'bp_rp_50' 	=> $row->bp_rp_50,
			);
		} else {
			echo "data kosong";
		}
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	private function verif_post_ppbj_50()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_bln', 'id_bln', 'trim|required');
		$this->form_validation->set_rules('id_bln', 'id_bln', 'trim|required');
		$this->form_validation->set_rules('id_unit', 'id_unit', 'trim|required');
		$this->form_validation->set_rules('jml_pkt_50', 'jml_pkt_50', 'trim|required');
		$this->form_validation->set_rules('jml_pg_50', 'jml_pg_50', 'trim|required');
		$this->form_validation->set_rules('pl_pkt_50', 'pl_pkt_50', 'trim|required');
		$this->form_validation->set_rules('pl_rp_50', 'pl_rp_50', 'trim|required');
		$this->form_validation->set_rules('h_pl_pkt_50', 'h_pl_pkt_50', 'trim|required');
		$this->form_validation->set_rules('h_pl_rp_50', 'h_pl_rp_50', 'trim|required');
		$this->form_validation->set_rules('kontrak_pkt_50', 'kontrak_pkt_50', 'trim|required');
		$this->form_validation->set_rules('kontrak_rp_50', 'kontrak_rp_50', 'trim|required');
		$this->form_validation->set_rules('st_pkt_50', 'st_pkt_50', 'trim|required');
		$this->form_validation->set_rules('st_rp_50', 'st_rp_50', 'trim|required');
		$this->form_validation->set_rules('bp_pkt_50', 'bp_pkt_50', 'trim|required');
		$this->form_validation->set_rules('bp_rp_50', 'bp_rp_50', 'trim|required');


		return $this->form_validation->run();
	}
	public function post_ppbj_50()
	{
		if ($this->verif_post_ppbj_50()) {

			$id_unit = $this->input->post('id_unit');
			$id_bln = $this->input->post('id_bln');
			$jml_pkt_50 = $this->input->post('jml_pkt_50');
			$jml_pg_50 = $this->input->post('jml_pg_50');
			$pl_pkt_50 = $this->input->post('pl_pkt_50');
			$pl_rp_50 = $this->input->post('pl_rp_50');
			$h_pl_pkt_50 = $this->input->post('h_pl_pkt_50');
			$h_pl_rp_50 = $this->input->post('h_pl_rp_50');
			$kontrak_pkt_50 = $this->input->post('kontrak_pkt_50');
			$kontrak_rp_50 = $this->input->post('kontrak_rp_50');
			$st_pkt_50 = $this->input->post('st_pkt_50');
			$st_rp_50 = $this->input->post('st_rp_50');
			$bp_pkt_50 = $this->input->post('bp_pkt_50');
			$bp_rp_50 = $this->input->post('bp_rp_50');

			$data = array(
				'id_bln'        => $id_bln,
				'id_unit'        => $id_unit,
				'jml_pkt_50'        => $jml_pkt_50,
				'jml_pg_50'        => str_replace(',', '', $jml_pg_50),
				'pl_pkt_50'        => $pl_pkt_50,
				'pl_rp_50'        => str_replace(',', '', $pl_rp_50),
				'h_pl_pkt_50'        => $h_pl_pkt_50,
				'h_pl_rp_50'        => str_replace(',', '', $h_pl_rp_50),
				'kontrak_pkt_50'        => $kontrak_pkt_50,
				'kontrak_rp_50'        => str_replace(',', '', $kontrak_rp_50),
				'st_pkt_50'        => $st_pkt_50,
				'st_rp_50'        => str_replace(',', '', $st_rp_50),
				'bp_pkt_50'        => $bp_pkt_50,
				'bp_rp_50'        => str_replace(',', '', $bp_rp_50),


			);
			$this->m_ppbj_50_admin->update_tbl_ppbj_50($data, $id_unit, $id_bln);

			echo json_encode($data);
		} else {
			echo "error";
		}
	}

	function cetak_ppbj_50($id_bln)
	{
		$this->load->library('pdfgenerator');
		$ta = $this->session->userdata('ta');

		$row1 = $this->db->query("SELECT SUM(tbl_ppbj_50.jml_pkt_50) AS jml_pkt_50 FROM tbl_ppbj_50 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row2 = $this->db->query("SELECT SUM(tbl_ppbj_50.jml_pg_50) AS jml_pg_50 FROM tbl_ppbj_50 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row3 = $this->db->query("SELECT SUM(tbl_ppbj_50.pl_pkt_50) AS pl_pkt_50 FROM tbl_ppbj_50 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row4 = $this->db->query("SELECT SUM(tbl_ppbj_50.pl_rp_50) AS pl_rp_50 FROM tbl_ppbj_50 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row5 = $this->db->query("SELECT SUM(tbl_ppbj_50.h_pl_pkt_50) AS h_pl_pkt_50 FROM tbl_ppbj_50 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row6 = $this->db->query("SELECT SUM(tbl_ppbj_50.h_pl_rp_50) AS h_pl_rp_50 FROM tbl_ppbj_50 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row7 = $this->db->query("SELECT SUM(tbl_ppbj_50.kontrak_pkt_50) AS kontrak_pkt_50 FROM tbl_ppbj_50 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row8 = $this->db->query("SELECT SUM(tbl_ppbj_50.kontrak_rp_50) AS kontrak_rp_50 FROM tbl_ppbj_50 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row9 = $this->db->query("SELECT SUM(tbl_ppbj_50.st_pkt_50) AS st_pkt_50 FROM tbl_ppbj_50 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row10 = $this->db->query("SELECT SUM(tbl_ppbj_50.st_rp_50) AS st_rp_50 FROM tbl_ppbj_50 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row11 = $this->db->query("SELECT SUM(tbl_ppbj_50.bp_pkt_50) AS bp_pkt_50 FROM tbl_ppbj_50 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row12 = $this->db->query("SELECT SUM(tbl_ppbj_50.bp_rp_50) AS bp_rp_50 FROM tbl_ppbj_50 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();

		$data = array(
			'jml_pkt_50' => $row1->jml_pkt_50,
			'jml_pg_50' => $row2->jml_pg_50,
			'pl_pkt_50' => $row3->pl_pkt_50,
			'pl_rp_50' => $row4->pl_rp_50,
			'h_pl_pkt_50' => $row5->h_pl_pkt_50,
			'h_pl_rp_50' => $row6->h_pl_rp_50,
			'kontrak_pkt_50' => $row7->kontrak_pkt_50,
			'kontrak_rp_50' => $row8->kontrak_rp_50,
			'st_pkt_50' => $row9->st_pkt_50,
			'st_rp_50' => $row10->st_rp_50,
			'bp_pkt_50' => $row11->bp_pkt_50,
			'bp_rp_50' => $row12->bp_rp_50,
		);

		$data['main'] = $this->m_ppbj_50_admin->cetak_ppbj_50($id_bln);
		$data['pemda'] = $this->m_master->data_pemda();
		//var_dump($data);
		$filename =  "Laporan PBJ Non Strategis 50jt-200jt";

		$html = $this->load->view('laporan/admin/cetak_ppbj_50', $data, true);
		$this->pdfgenerator->generate($html, $filename);
	}



	//PPBJ 200
	public function json_ppbj_200($id_bln)
	{
		$data = $this->m_ppbj_200_admin->json_ppbj_200($id_bln);
		header('Content-Type: application/json');
		echo $data;
	}

	public function get_ppbj_200($bln, $unit)
	{
		$row = $this->m_ppbj_200_admin->json_get($bln, $unit);
		if ($row) {
			$data = array(
				'id_bln' 	=> $row->id_bln,
				'id_unit' 	=> $row->id_unit,
				'jml_pkt_200' 	=> $row->jml_pkt_200,
				'jml_pg_200' 	=> $row->jml_pg_200,
				'pl_pkt_200' 	=> $row->pl_pkt_200,
				'pl_rp_200' 	=> $row->pl_rp_200,
				'h_pl_pkt_200' 	=> $row->h_pl_pkt_200,
				'h_pl_rp_200' 	=> $row->h_pl_rp_200,
				'kontrak_pkt_200' 	=> $row->kontrak_pkt_200,
				'kontrak_rp_200' 	=> $row->kontrak_rp_200,
				'st_pkt_200' 	=> $row->st_pkt_200,
				'st_rp_200' 	=> $row->st_rp_200,
				'bp_pkt_200' 	=> $row->bp_pkt_200,
				'bp_rp_200' 	=> $row->bp_rp_200,
			);
		} else {
			echo "data kosong";
		}
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	private function verif_post_ppbj_200()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_bln_ppbj_200', 'id_bln_ppbj_200', 'trim|required');
		$this->form_validation->set_rules('id_unit_ppbj_200', 'id_unit_ppbj_200', 'trim|required');
		$this->form_validation->set_rules('jml_pkt_200', 'jml_pkt_200', 'trim|required');
		$this->form_validation->set_rules('jml_pg_200', 'jml_pg_200', 'trim|required');
		$this->form_validation->set_rules('pl_pkt_200', 'pl_pkt_200', 'trim|required');
		$this->form_validation->set_rules('pl_rp_200', 'pl_rp_200', 'trim|required');
		$this->form_validation->set_rules('h_pl_pkt_200', 'h_pl_pkt_200', 'trim|required');
		$this->form_validation->set_rules('h_pl_rp_200', 'h_pl_rp_200', 'trim|required');
		$this->form_validation->set_rules('kontrak_pkt_200', 'kontrak_pkt_200', 'trim|required');
		$this->form_validation->set_rules('kontrak_rp_200', 'kontrak_rp_200', 'trim|required');
		$this->form_validation->set_rules('st_pkt_200', 'st_pkt_200', 'trim|required');
		$this->form_validation->set_rules('st_rp_200', 'st_rp_200', 'trim|required');
		$this->form_validation->set_rules('bp_pkt_200', 'bp_pkt_200', 'trim|required');
		$this->form_validation->set_rules('bp_rp_200', 'bp_rp_200', 'trim|required');


		return $this->form_validation->run();
	}
	public function post_ppbj_200()
	{
		if ($this->verif_post_ppbj_200()) {

			$id_unit = $this->input->post('id_unit_ppbj_200');
			$id_bln = $this->input->post('id_bln_ppbj_200');
			$jml_pkt_200 = $this->input->post('jml_pkt_200');
			$jml_pg_200 = $this->input->post('jml_pg_200');
			$pl_pkt_200 = $this->input->post('pl_pkt_200');
			$pl_rp_200 = $this->input->post('pl_rp_200');
			$h_pl_pkt_200 = $this->input->post('h_pl_pkt_200');
			$h_pl_rp_200 = $this->input->post('h_pl_rp_200');
			$kontrak_pkt_200 = $this->input->post('kontrak_pkt_200');
			$kontrak_rp_200 = $this->input->post('kontrak_rp_200');
			$st_pkt_200 = $this->input->post('st_pkt_200');
			$st_rp_200 = $this->input->post('st_rp_200');
			$bp_pkt_200 = $this->input->post('bp_pkt_200');
			$bp_rp_200 = $this->input->post('bp_rp_200');

			$data = array(
				'id_bln'        => $id_bln,
				'id_unit'        => $id_unit,
				'jml_pkt_200'        => $jml_pkt_200,
				'jml_pg_200'        => str_replace(',', '', $jml_pg_200),
				'pl_pkt_200'        => $pl_pkt_200,
				'pl_rp_200'        => str_replace(',', '', $pl_rp_200),
				'h_pl_pkt_200'        => $h_pl_pkt_200,
				'h_pl_rp_200'        => str_replace(',', '', $h_pl_rp_200),
				'kontrak_pkt_200'        => $kontrak_pkt_200,
				'kontrak_rp_200'        => str_replace(',', '', $kontrak_rp_200),
				'st_pkt_200'        => $st_pkt_200,
				'st_rp_200'        => str_replace(',', '', $st_rp_200),
				'bp_pkt_200'        => $bp_pkt_200,
				'bp_rp_200'        => str_replace(',', '', $bp_rp_200),


			);
			$this->m_ppbj_200_admin->update_tbl_ppbj_200($data, $id_unit, $id_bln);

			echo json_encode($data);
		} else {
			echo "error";
		}
	}

	function cetak_ppbj_200($id_bln)
	{
		$this->load->library('pdfgenerator');
		$ta = $this->session->userdata('ta');

		$row1 = $this->db->query("SELECT SUM(tbl_ppbj_200.jml_pkt_200) AS jml_pkt_200 FROM tbl_ppbj_200 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row2 = $this->db->query("SELECT SUM(tbl_ppbj_200.jml_pg_200) AS jml_pg_200 FROM tbl_ppbj_200 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row3 = $this->db->query("SELECT SUM(tbl_ppbj_200.pl_pkt_200) AS pl_pkt_200 FROM tbl_ppbj_200 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row4 = $this->db->query("SELECT SUM(tbl_ppbj_200.pl_rp_200) AS pl_rp_200 FROM tbl_ppbj_200 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row5 = $this->db->query("SELECT SUM(tbl_ppbj_200.h_pl_pkt_200) AS h_pl_pkt_200 FROM tbl_ppbj_200 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row6 = $this->db->query("SELECT SUM(tbl_ppbj_200.h_pl_rp_200) AS h_pl_rp_200 FROM tbl_ppbj_200 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row7 = $this->db->query("SELECT SUM(tbl_ppbj_200.kontrak_pkt_200) AS kontrak_pkt_200 FROM tbl_ppbj_200 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row8 = $this->db->query("SELECT SUM(tbl_ppbj_200.kontrak_rp_200) AS kontrak_rp_200 FROM tbl_ppbj_200 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row9 = $this->db->query("SELECT SUM(tbl_ppbj_200.st_pkt_200) AS st_pkt_200 FROM tbl_ppbj_200 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row10 = $this->db->query("SELECT SUM(tbl_ppbj_200.st_rp_200) AS st_rp_200 FROM tbl_ppbj_200 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row11 = $this->db->query("SELECT SUM(tbl_ppbj_200.bp_pkt_200) AS bp_pkt_200 FROM tbl_ppbj_200 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row12 = $this->db->query("SELECT SUM(tbl_ppbj_200.bp_rp_200) AS bp_rp_200 FROM tbl_ppbj_200 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();

		$data = array(
			'jml_pkt_200' => $row1->jml_pkt_200,
			'jml_pg_200' => $row2->jml_pg_200,
			'pl_pkt_200' => $row3->pl_pkt_200,
			'pl_rp_200' => $row4->pl_rp_200,
			'h_pl_pkt_200' => $row5->h_pl_pkt_200,
			'h_pl_rp_200' => $row6->h_pl_rp_200,
			'kontrak_pkt_200' => $row7->kontrak_pkt_200,
			'kontrak_rp_200' => $row8->kontrak_rp_200,
			'st_pkt_200' => $row9->st_pkt_200,
			'st_rp_200' => $row10->st_rp_200,
			'bp_pkt_200' => $row11->bp_pkt_200,
			'bp_rp_200' => $row12->bp_rp_200,
		);

		$data['main'] = $this->m_ppbj_200_admin->cetak_ppbj_200($id_bln);
		$data['pemda'] = $this->m_master->data_pemda();
		//var_dump($data);
		$filename =  "Laporan PBJ Strategis 200jt-2,5M";

		$html = $this->load->view('laporan/admin/cetak_ppbj_200', $data, true);
		$this->pdfgenerator->generate($html, $filename);
	}

	//PPBJ 25
	public function json_ppbj_25($id_bln)
	{
		$data = $this->m_ppbj_25_admin->json_ppbj_25($id_bln);
		header('Content-Type: application/json');
		echo $data;
	}

	public function get_ppbj_25($bln, $unit)
	{
		$row = $this->m_ppbj_25_admin->json_get($bln, $unit);
		if ($row) {
			$data = array(
				'id_bln' 	=> $row->id_bln,
				'id_unit' 	=> $row->id_unit,
				'jml_pkt_25' 	=> $row->jml_pkt_25,
				'jml_pg_25' 	=> $row->jml_pg_25,
				'pl_pkt_25' 	=> $row->pl_pkt_25,
				'pl_rp_25' 	=> $row->pl_rp_25,
				'h_pl_pkt_25' 	=> $row->h_pl_pkt_25,
				'h_pl_rp_25' 	=> $row->h_pl_rp_25,
				'kontrak_pkt_25' 	=> $row->kontrak_pkt_25,
				'kontrak_rp_25' 	=> $row->kontrak_rp_25,
				'st_pkt_25' 	=> $row->st_pkt_25,
				'st_rp_25' 	=> $row->st_rp_25,
				'bp_pkt_25' 	=> $row->bp_pkt_25,
				'bp_rp_25' 	=> $row->bp_rp_25,
			);
		} else {
			echo "data kosong";
		}
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	private function verif_post_ppbj_25()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_bln', 'id_bln', 'trim|required');
		$this->form_validation->set_rules('id_bln', 'id_bln', 'trim|required');
		$this->form_validation->set_rules('id_unit', 'id_unit', 'trim|required');
		$this->form_validation->set_rules('jml_pkt_25', 'jml_pkt_25', 'trim|required');
		$this->form_validation->set_rules('jml_pg_25', 'jml_pg_25', 'trim|required');
		$this->form_validation->set_rules('pl_pkt_25', 'pl_pkt_25', 'trim|required');
		$this->form_validation->set_rules('pl_rp_25', 'pl_rp_25', 'trim|required');
		$this->form_validation->set_rules('h_pl_pkt_25', 'h_pl_pkt_25', 'trim|required');
		$this->form_validation->set_rules('h_pl_rp_25', 'h_pl_rp_25', 'trim|required');
		$this->form_validation->set_rules('kontrak_pkt_25', 'kontrak_pkt_25', 'trim|required');
		$this->form_validation->set_rules('kontrak_rp_25', 'kontrak_rp_25', 'trim|required');
		$this->form_validation->set_rules('st_pkt_25', 'st_pkt_25', 'trim|required');
		$this->form_validation->set_rules('st_rp_25', 'st_rp_25', 'trim|required');
		$this->form_validation->set_rules('bp_pkt_25', 'bp_pkt_25', 'trim|required');
		$this->form_validation->set_rules('bp_rp_25', 'bp_rp_25', 'trim|required');


		return $this->form_validation->run();
	}
	public function post_ppbj_25()
	{
		if ($this->verif_post_ppbj_25()) {

			$id_unit = $this->input->post('id_unit');
			$id_bln = $this->input->post('id_bln');
			$jml_pkt_25 = $this->input->post('jml_pkt_25');
			$jml_pg_25 = $this->input->post('jml_pg_25');
			$pl_pkt_25 = $this->input->post('pl_pkt_25');
			$pl_rp_25 = $this->input->post('pl_rp_25');
			$h_pl_pkt_25 = $this->input->post('h_pl_pkt_25');
			$h_pl_rp_25 = $this->input->post('h_pl_rp_25');
			$kontrak_pkt_25 = $this->input->post('kontrak_pkt_25');
			$kontrak_rp_25 = $this->input->post('kontrak_rp_25');
			$st_pkt_25 = $this->input->post('st_pkt_25');
			$st_rp_25 = $this->input->post('st_rp_25');
			$bp_pkt_25 = $this->input->post('bp_pkt_25');
			$bp_rp_25 = $this->input->post('bp_rp_25');

			$data = array(
				'id_bln'        => $id_bln,
				'id_unit'        => $id_unit,
				'jml_pkt_25'        => $jml_pkt_25,
				'jml_pg_25'        => str_replace(',', '', $jml_pg_25),
				'pl_pkt_25'        => $pl_pkt_25,
				'pl_rp_25'        => str_replace(',', '', $pl_rp_25),
				'h_pl_pkt_25'        => $h_pl_pkt_25,
				'h_pl_rp_25'        => str_replace(',', '', $h_pl_rp_25),
				'kontrak_pkt_25'        => $kontrak_pkt_25,
				'kontrak_rp_25'        => str_replace(',', '', $kontrak_rp_25),
				'st_pkt_25'        => $st_pkt_25,
				'st_rp_25'        => str_replace(',', '', $st_rp_25),
				'bp_pkt_25'        => $bp_pkt_25,
				'bp_rp_25'        => str_replace(',', '', $bp_rp_25),


			);
			$this->m_ppbj_25_admin->update_tbl_ppbj_25($data, $id_unit, $id_bln);

			echo json_encode($data);
		} else {
			echo "error";
		}
	}

	function cetak_ppbj_25($id_bln)
	{
		$this->load->library('pdfgenerator');
		$ta = $this->session->userdata('ta');

		$row1 = $this->db->query("SELECT SUM(tbl_ppbj_25.jml_pkt_25) AS jml_pkt_25 FROM tbl_ppbj_25 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row2 = $this->db->query("SELECT SUM(tbl_ppbj_25.jml_pg_25) AS jml_pg_25 FROM tbl_ppbj_25 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row3 = $this->db->query("SELECT SUM(tbl_ppbj_25.pl_pkt_25) AS pl_pkt_25 FROM tbl_ppbj_25 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row4 = $this->db->query("SELECT SUM(tbl_ppbj_25.pl_rp_25) AS pl_rp_25 FROM tbl_ppbj_25 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row5 = $this->db->query("SELECT SUM(tbl_ppbj_25.h_pl_pkt_25) AS h_pl_pkt_25 FROM tbl_ppbj_25 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row6 = $this->db->query("SELECT SUM(tbl_ppbj_25.h_pl_rp_25) AS h_pl_rp_25 FROM tbl_ppbj_25 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row7 = $this->db->query("SELECT SUM(tbl_ppbj_25.kontrak_pkt_25) AS kontrak_pkt_25 FROM tbl_ppbj_25 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row8 = $this->db->query("SELECT SUM(tbl_ppbj_25.kontrak_rp_25) AS kontrak_rp_25 FROM tbl_ppbj_25 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row9 = $this->db->query("SELECT SUM(tbl_ppbj_25.st_pkt_25) AS st_pkt_25 FROM tbl_ppbj_25 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row10 = $this->db->query("SELECT SUM(tbl_ppbj_25.st_rp_25) AS st_rp_25 FROM tbl_ppbj_25 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row11 = $this->db->query("SELECT SUM(tbl_ppbj_25.bp_pkt_25) AS bp_pkt_25 FROM tbl_ppbj_25 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row12 = $this->db->query("SELECT SUM(tbl_ppbj_25.bp_rp_25) AS bp_rp_25 FROM tbl_ppbj_25 WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();

		$data = array(
			'jml_pkt_25' => $row1->jml_pkt_25,
			'jml_pg_25' => $row2->jml_pg_25,
			'pl_pkt_25' => $row3->pl_pkt_25,
			'pl_rp_25' => $row4->pl_rp_25,
			'h_pl_pkt_25' => $row5->h_pl_pkt_25,
			'h_pl_rp_25' => $row6->h_pl_rp_25,
			'kontrak_pkt_25' => $row7->kontrak_pkt_25,
			'kontrak_rp_25' => $row8->kontrak_rp_25,
			'st_pkt_25' => $row9->st_pkt_25,
			'st_rp_25' => $row10->st_rp_25,
			'bp_pkt_25' => $row11->bp_pkt_25,
			'bp_rp_25' => $row12->bp_rp_25,
		);

		$data['main'] = $this->m_ppbj_25_admin->cetak_ppbj_25($id_bln);
		$data['pemda'] = $this->m_master->data_pemda();
		//var_dump($data);
		$filename =  "Laporan PBJ Strategis 2,5-5M";

		$html = $this->load->view('laporan/admin/cetak_ppbj_25', $data, true);
		$this->pdfgenerator->generate($html, $filename);
	}
}
