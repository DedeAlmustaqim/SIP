<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendapatan extends CI_Controller
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
		$this->load->model('m_pendapatan');
		$this->load->model('m_master');
		$this->load->library('datatables');
	}


	public function index()
	{

		$this->load->library('template');
		$data['judul'] = "REALISASI PENERIMAAN PENDAPATAN";
		$data['bln'] = $this->m_master->tampil_bln();
		$this->template->konten('pendapatan', $data);
		//var_dump($data);
	}







	public function get_pd($bln, $unit)
	{
		$row = $this->m_pendapatan->json_get_pd($bln, $unit);
		if ($row) {
			$data = array(
				'id_bln' 	=> $row->id_bln,
				'id_unit' 	=> $row->id_unit,
				'pad_target' 	=> $row->pad_target,
				'pad_real' 	=> $row->pad_real,
				'pad_real_per' 	=> $row->pad_real_per,
				'tp_target' 	=> $row->tp_target,
				'tp_keu' 	=> $row->tp_keu,
				'tp_per' 	=> $row->tp_per,
				'tad_target' 	=> $row->tad_target,
				'tad_keu' 	=> $row->tad_keu,
				'tad_per' 	=> $row->tad_per,
				'pad_sah_target' 	=> $row->pad_sah_target,
				'pad_sah_keu' 	=> $row->pad_sah_keu,
				'pad_sah_per' 	=> $row->pad_sah_per,
				'target_total' 	=> $row->target_total,
				'keu_total' 	=> $row->keu_total,
				'keu_per_total' 	=> $row->keu_per_total,
				'kunci_bln' 	=> $row->kunci_bln,
				'aktif' 	=> $row->aktif,
				'status_pd' 	=> $row->status_pd,
			);
		} else {
			echo "data kosong";
		}
		header('Content-Type: application/json');
		echo json_encode($data);
	}



	private function verif_post_pd()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_unit_pd', 'id_unit_pd', 'trim|required');
		$this->form_validation->set_rules('id_bln_pd', 'id_bln_pd', 'trim|required');
		$this->form_validation->set_rules('target_total', 'target_total', 'trim|required');
		$this->form_validation->set_rules('keu_total', 'keu_total', 'trim|required');
		$this->form_validation->set_rules('keu_per_total', 'keu_per_total', 'trim|required');
		$this->form_validation->set_rules('pad_target', 'pad_target', 'trim|required');
		$this->form_validation->set_rules('pad_real', 'pad_real', 'trim|required');
		$this->form_validation->set_rules('pad_real_per', 'pad_real_per', 'trim|required');
		$this->form_validation->set_rules('tp_target', 'tp_target', 'trim|required');
		$this->form_validation->set_rules('tp_keu', 'tp_keu', 'trim|required');
		$this->form_validation->set_rules('tp_per', 'tp_per', 'trim|required');
		$this->form_validation->set_rules('tad_target', 'tad_target', 'trim|required');
		$this->form_validation->set_rules('tad_keu', 'tad_keu', 'trim|required');
		$this->form_validation->set_rules('tad_per', 'tad_per', 'trim|required');
		$this->form_validation->set_rules('pad_sah_target', 'pad_sah_target', 'trim|required');
		$this->form_validation->set_rules('pad_sah_keu', 'pad_sah_keu', 'trim|required');
		$this->form_validation->set_rules('pad_sah_per', 'pad_sah_per', 'trim|required');
		
		
		return $this->form_validation->run();
	}
	public function post_pd()
	{
		if ($this->verif_post_pd()) {

			$id_unit = $this->input->post('id_unit_pd');
			$id_bln = $this->input->post('id_bln_pd');
			$target_total = $this->input->post('target_total');
			$keu_total = $this->input->post('keu_total');
			$keu_per_total = $this->input->post('keu_per_total');
			$pad_target = $this->input->post('pad_target');
			$pad_real = $this->input->post('pad_real');
			$pad_real_per = $this->input->post('pad_real_per');
			$tp_target = $this->input->post('tp_target');
			$tp_keu = $this->input->post('tp_keu');
			$tp_per = $this->input->post('tp_per');
			$tad_target = $this->input->post('tad_target');
			$tad_keu = $this->input->post('tad_keu');
			$tad_per = $this->input->post('tad_per');
			$pad_sah_target = $this->input->post('pad_sah_target');
			$pad_sah_keu = $this->input->post('pad_sah_keu');
			$pad_sah_per = $this->input->post('pad_sah_per');
			


			$data = array(
				'id_bln'        => $id_bln,
				'id_unit'        => $id_unit,
				'target_total'        => str_replace(',', '', $target_total),
				'keu_total'        => str_replace(',', '', $keu_total),
				'keu_per_total'        => $keu_per_total,

				'pad_target'        => str_replace(',', '', $pad_target),
				'pad_real'        => str_replace(',', '', $pad_real),
				'pad_real_per'        => $pad_real_per,
				
				'tp_target'        => str_replace(',', '', $tp_target),
				'tp_keu'        => str_replace(',', '', $tp_keu),
				'tp_per'        => $tp_per,
				
				'tad_target'        => str_replace(',', '', $tad_target),
				'tad_keu'        => str_replace(',', '', $tad_keu),
				'tad_per'        => $tad_per,

				'pad_sah_target'        => str_replace(',', '', $pad_sah_target),
				'pad_sah_keu'        => str_replace(',', '', $pad_sah_keu),
				'pad_sah_per'        => $pad_sah_per,

				'status_pd'        => 1,

			);

			$ta = $this->session->userdata('ta');

			$this->m_pendapatan->update_tbl_pd($data, $id_unit, $id_bln, $ta);

			echo json_encode($data);
		} else {
			echo "error";
		}
	}

	function cetak_pd($id_bln, $id_unit)
	{
		$this->load->library('pdfgenerator');
		$ta = $this->session->userdata('ta');

		$row = $this->m_pendapatan->get_unit($id_unit);

		$data['nm_unit'] = $row->nm_unit;
		$data['nm_pimpinan'] = $row->nm_pimpinan;
		$data['nip'] = $row->nip;
		$data['gol'] = $row->gol_jab;
		$data['stts_p'] = $row->stts_p;
		$data['ttd'] = $row->ttd;
		$data['main'] = $this->m_pendapatan->cetak_pd($id_bln, $id_unit, $ta);

		$filename =  "cetak";

		$html = $this->load->view('laporan/cetak_pd', $data, true);
		$this->pdfgenerator->generate($html, $filename);
		var_dump($data);
	}
}
