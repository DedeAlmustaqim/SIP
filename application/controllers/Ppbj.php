<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppbj extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		if (($this->session->userdata('akses') == '1') || ($this->session->userdata('akses') == '2') || ($this->session->userdata('akses') == '3') || ($this->session->userdata('akses') == '4') || ($this->session->userdata('akses') == '5')) {
		} else {
			redirect('login');
		}
		$this->load->library('template');
		//MODEL

		$this->load->helper('string');
		$this->load->library('form_validation');
		$this->load->model('m_master');

		$this->load->model('m_ppbj');
		$this->load->library('datatables');
	}


	public function index()
	{
		$this->load->library('template');
		$data['judul'] = " PAKET PENGADAAN BELANJA DAN JASA ";
		$data['bln'] = $this->m_master->tampil_bln();
		$this->template->konten('ppbj', $data);
	}

	public function get_ppbj($bln, $unit)
	{
		$row = $this->m_ppbj->json_get($bln, $unit);
		if ($row) {
			$data = array(
				'id_bln' 	=> $row->id_bln,
				'id_unit' 	=> $row->id_unit,
				
				'kunci_bln' 	=> $row->kunci_bln,
				'aktif' 	=> $row->aktif,
				'nm_bln' 	=> $row->nm_bln,

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
				'status_ppbj_50' 	=> $row->status_ppbj_50,

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
				'status_ppbj_200' 	=> $row->status_ppbj_200,


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
				'status_ppbj_25' 	=> $row->status_ppbj_25,

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
				'status_ppbj_50'			=> 1,
			);
			$this->m_ppbj->update_tbl_ppbj_50($data, $id_unit, $id_bln);

			echo json_encode($data);
		} else {
			echo "error";
		}
	}

	function cetak_ppbj_50($id_bln, $id_unit)
	{
		$this->load->library('pdfgenerator');

		$row = $this->m_ppbj->get_unit($id_unit);

		$data['nm_unit'] = $row->nm_unit;
		$data['nm_pimpinan'] = $row->nm_pimpinan;
		$data['nip'] = $row->nip;
		$data['gol'] = $row->gol_jab;
		$data['stts_p'] = $row->stts_p;
		$data['ttd'] = $row->ttd;
		$data['main'] = $this->m_ppbj->cetak_ppbj_50($id_bln, $id_unit);

		//var_dump($data);
		$filename =  "cetak";

		$html = $this->load->view('laporan/cetak_ppbj_50', $data, true);
		$this->pdfgenerator->generate($html, $filename);
	}



	//PPBJ 200
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
				'status_ppbj_200'			=> 1,



			);
			$this->m_ppbj->update_tbl_ppbj_200($data, $id_unit, $id_bln);

			echo json_encode($data);
		} else {
			echo "error";
		}
	}

	function cetak_ppbj_200($id_bln, $id_unit)
	{
		$this->load->library('pdfgenerator');

		$row = $this->m_ppbj->get_unit($id_unit);

		$data['nm_unit'] = $row->nm_unit;
		$data['nm_pimpinan'] = $row->nm_pimpinan;
		$data['nip'] = $row->nip;
		$data['gol'] = $row->gol_jab;
		$data['stts_p'] = $row->stts_p;
		$data['ttd'] = $row->ttd;
		$data['main'] = $this->m_ppbj->cetak_ppbj_200($id_bln, $id_unit);

		//var_dump($data);
		$filename =  "cetak";

		$html = $this->load->view('laporan/cetak_ppbj_200', $data, true);
		$this->pdfgenerator->generate($html, $filename);
	}


	//PPBJ 2M
	

	

	private function verif_post_ppbj_25()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_bln_ppbj_25', 'id_bln_ppbj_25', 'trim|required');
		$this->form_validation->set_rules('id_unit_ppbj_25', 'id_unit_ppbj_25', 'trim|required');
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

			$id_unit = $this->input->post('id_unit_ppbj_25');
			$id_bln = $this->input->post('id_bln_ppbj_25');
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
				'status_ppbj_25'			=> 1,



			);
			$this->m_ppbj->update_tbl_ppbj_25($data, $id_unit, $id_bln);

			echo json_encode($data);
		} else {
			echo "error";
		}
	}

	function cetak_ppbj_25($id_bln, $id_unit)
	{
		$this->load->library('pdfgenerator');

		$row = $this->m_ppbj->get_unit($id_unit);

		$data['nm_unit'] = $row->nm_unit;
		$data['nm_pimpinan'] = $row->nm_pimpinan;
		$data['nip'] = $row->nip;
		$data['gol'] = $row->gol_jab;
		$data['stts_p'] = $row->stts_p;
		$data['ttd'] = $row->ttd;
		$data['main'] = $this->m_ppbj->cetak_ppbj_25($id_bln, $id_unit);

		//var_dump($data);
		$filename =  "cetak";

		$html = $this->load->view('laporan/cetak_ppbj_25', $data, true);
		$this->pdfgenerator->generate($html, $filename);
	}
}
