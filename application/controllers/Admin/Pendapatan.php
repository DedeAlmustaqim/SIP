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
		$this->load->model('m_master');
		$this->load->model('m_pendapatan');
		$this->load->model('m_pendapatan_admin');
		$this->load->library('datatables');
	}


	public function index()
	{

		$this->load->library('template');
		$data['judul'] = "REALISASI PENERIMAAN PENDAPATAN";
		$data['skpd'] = $this->m_master->tampil_unit();
		$this->template->konten('admin/pendapatan', $data);
		//var_dump($data);
	}


	public function json_total($id_bln)
	{
		$ta = $this->session->userdata('ta');

		//belanja operasi
		$row1 = $this->db->query("SELECT SUM(tbl_pendapatan.pad_target) AS pad_target FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row2 = $this->db->query("SELECT SUM(tbl_pendapatan.pad_real) AS pad_real FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row3 = $this->db->query("SELECT SUM(tbl_pendapatan.pad_real)/SUM(tbl_pendapatan.pad_target)*100 AS pad_real_per FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();

		$row4 = $this->db->query("SELECT SUM(tbl_pendapatan.tp_target) AS tp_target FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row5 = $this->db->query("SELECT SUM(tbl_pendapatan.tp_keu) AS tp_keu FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row6 = $this->db->query("SELECT SUM(tbl_pendapatan.tp_keu)/SUM(tbl_pendapatan.tp_target)*100 AS tp_per FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();

		$row7 = $this->db->query("SELECT SUM(tbl_pendapatan.tad_target) AS tad_target FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row8 = $this->db->query("SELECT SUM(tbl_pendapatan.tad_keu) AS tad_keu FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row9 = $this->db->query("SELECT SUM(tbl_pendapatan.tad_keu)/SUM(tbl_pendapatan.tad_target)*100 AS tad_per FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();

		$row10 = $this->db->query("SELECT SUM(tbl_pendapatan.pad_sah_target) AS pad_sah_target FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row11 = $this->db->query("SELECT SUM(tbl_pendapatan.pad_sah_keu) AS pad_sah_keu FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row12 = $this->db->query("SELECT SUM(tbl_pendapatan.pad_sah_keu)/SUM(tbl_pendapatan.pad_sah_target)*100 AS pad_sah_per FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();

		$row13 = $this->db->query("SELECT SUM(tbl_pendapatan.target_total) AS target_total FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row14 = $this->db->query("SELECT SUM(tbl_pendapatan.keu_total) AS keu_total FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row15 = $this->db->query("SELECT SUM(tbl_pendapatan.keu_total)/SUM(tbl_pendapatan.target_total)*100 AS keu_per_total FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();

		$data = array(
			//belanja operasi
			'pad_target' => $row1->pad_target,
			'pad_real' => $row2->pad_real,
			'pad_real_per' => round($row3->pad_real_per, 2),

			'tp_target' => $row4->tp_target,
			'tp_keu' => $row5->tp_keu,
			'tp_per' => round($row6->tp_per, 2),

			'tad_target' => $row7->tad_target,
			'tad_keu' => $row8->tad_keu,
			'tad_per' => round($row9->tad_per, 2),

			'pad_sah_target' => $row10->pad_sah_target,
			'pad_sah_keu' => $row11->pad_sah_keu,
			'pad_sah_per' => round($row12->pad_sah_per, 2),

			'target_total' => $row13->target_total,
			'keu_total' => $row14->keu_total,
			'keu_per_total' => round($row15->keu_per_total, 2),
			
			


		);



		header('Content-Type: application/json');
		echo json_encode($data);
	}
	
	
	public function json_pd($bln)
	{
		$data = $this->m_pendapatan_admin->json_pd($bln);
		header('Content-Type: application/json');
		echo $data;
	}



	public function get_pd($bln, $unit)
	{
		$row = $this->m_pendapatan_admin->json_get_pd($bln, $unit);
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
		$this->form_validation->set_rules('id_unit_pd_admin', 'id_unit_pd_admin', 'trim|required');
		$this->form_validation->set_rules('id_bln_pd_admin', 'id_bln_pd_admin', 'trim|required');
		$this->form_validation->set_rules('target_total_admin', 'target_total_admin', 'trim|required');
		$this->form_validation->set_rules('keu_total_admin', 'keu_total_admin', 'trim|required');
		$this->form_validation->set_rules('keu_per_total_admin', 'keu_per_total_admin', 'trim|required');
		$this->form_validation->set_rules('pad_target_admin', 'pad_target_admin', 'trim|required');
		$this->form_validation->set_rules('pad_real_admin', 'pad_real_admin', 'trim|required');
		$this->form_validation->set_rules('pad_real_per_admin', 'pad_real_per_admin', 'trim|required');
		$this->form_validation->set_rules('tp_target_admin', 'tp_target_admin', 'trim|required');
		$this->form_validation->set_rules('tp_keu_admin', 'tp_keu_admin', 'trim|required');
		$this->form_validation->set_rules('tp_per_admin', 'tp_per_admin', 'trim|required');
		$this->form_validation->set_rules('tad_target_admin', 'tad_target_admin', 'trim|required');
		$this->form_validation->set_rules('tad_keu_admin', 'tad_keu_admin', 'trim|required');
		$this->form_validation->set_rules('tad_per_admin', 'tad_per_admin', 'trim|required');
		$this->form_validation->set_rules('pad_sah_target_admin', 'pad_sah_target_admin', 'trim|required');
		$this->form_validation->set_rules('pad_sah_keu_admin', 'pad_sah_keu_admin', 'trim|required');
		$this->form_validation->set_rules('pad_sah_per_admin', 'pad_sah_per_admin', 'trim|required');


		return $this->form_validation->run();
	}
	public function post_pd()
	{
		if ($this->verif_post_pd()) {

			$id_unit = $this->input->post('id_unit_pd_admin');
			$id_bln = $this->input->post('id_bln_pd_admin');
			$target_total = $this->input->post('target_total_admin');
			$keu_total = $this->input->post('keu_total_admin');
			$keu_per_total = $this->input->post('keu_per_total_admin');
			$pad_target = $this->input->post('pad_target_admin');
			$pad_real = $this->input->post('pad_real_admin');
			$pad_real_per = $this->input->post('pad_real_per_admin');
			$tp_target = $this->input->post('tp_target_admin');
			$tp_keu = $this->input->post('tp_keu_admin');
			$tp_per = $this->input->post('tp_per_admin');
			$tad_target = $this->input->post('tad_target_admin');
			$tad_keu = $this->input->post('tad_keu_admin');
			$tad_per = $this->input->post('tad_per_admin');
			$pad_sah_target = $this->input->post('pad_sah_target_admin');
			$pad_sah_keu = $this->input->post('pad_sah_keu_admin');
			$pad_sah_per = $this->input->post('pad_sah_per_admin');



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

	function cetak_pd($id_bln)
	{
		$this->load->library('pdfgenerator');

		$ta = $this->session->userdata('ta');

		//belanja operasi
		$row1 = $this->db->query("SELECT SUM(tbl_pendapatan.pad_target) AS pad_target FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row2 = $this->db->query("SELECT SUM(tbl_pendapatan.pad_real) AS pad_real FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row3 = $this->db->query("SELECT SUM(tbl_pendapatan.pad_real)/SUM(tbl_pendapatan.pad_target)*100 AS pad_real_per FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();

		$row4 = $this->db->query("SELECT SUM(tbl_pendapatan.tp_target) AS tp_target FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row5 = $this->db->query("SELECT SUM(tbl_pendapatan.tp_keu) AS tp_keu FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row6 = $this->db->query("SELECT SUM(tbl_pendapatan.tp_keu)/SUM(tbl_pendapatan.tp_target)*100 AS tp_per FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();

		$row7 = $this->db->query("SELECT SUM(tbl_pendapatan.tad_target) AS tad_target FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row8 = $this->db->query("SELECT SUM(tbl_pendapatan.tad_keu) AS tad_keu FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row9 = $this->db->query("SELECT SUM(tbl_pendapatan.tad_keu)/SUM(tbl_pendapatan.tad_target)*100 AS tad_per FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();

		$row10 = $this->db->query("SELECT SUM(tbl_pendapatan.pad_sah_target) AS pad_sah_target FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row11 = $this->db->query("SELECT SUM(tbl_pendapatan.pad_sah_keu) AS pad_sah_keu FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row12 = $this->db->query("SELECT SUM(tbl_pendapatan.pad_sah_keu)/SUM(tbl_pendapatan.pad_sah_target)*100 AS pad_sah_per FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();

		$row13 = $this->db->query("SELECT SUM(tbl_pendapatan.target_total) AS target_total FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row14 = $this->db->query("SELECT SUM(tbl_pendapatan.keu_total) AS keu_total FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row15 = $this->db->query("SELECT SUM(tbl_pendapatan.keu_total)/SUM(tbl_pendapatan.target_total)*100 AS keu_per_total FROM tbl_pendapatan WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();

		$data = array(
			//belanja operasi
			'pad_target' => $row1->pad_target,
			'pad_real' => $row2->pad_real,
			'pad_real_per' => round($row3->pad_real_per, 2),

			'tp_target' => $row4->tp_target,
			'tp_keu' => $row5->tp_keu,
			'tp_per' => round($row6->tp_per, 2),

			'tad_target' => $row7->tad_target,
			'tad_keu' => $row8->tad_keu,
			'tad_per' => round($row9->tad_per, 2),

			'pad_sah_target' => $row10->pad_sah_target,
			'pad_sah_keu' => $row11->pad_sah_keu,
			'pad_sah_per' => round($row12->pad_sah_per, 2),

			'target_total' => $row13->target_total,
			'keu_total' => $row14->keu_total,
			'keu_per_total' => round($row15->keu_per_total, 2),
			
			


		);
		
		$data['main'] = $this->m_pendapatan_admin->cetak_pd($id_bln, $ta);
		$data['pemda'] = $this->m_master->data_pemda();
		$filename =  "Laporan Pendapatan";

		$html = $this->load->view('laporan/admin/cetak_pd', $data, true);
		$this->pdfgenerator->generate($html, $filename);
		//var_dump($data);
	}
}
