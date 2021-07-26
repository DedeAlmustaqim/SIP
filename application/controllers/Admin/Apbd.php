<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apbd extends CI_Controller
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
		$data['judul'] = "Menu APBD";
		$data['skpd'] = $this->m_master->tampil_unit();
		$this->template->konten('admin/apbd', $data);
		//var_dump($data);
	}

	public function json_total($id_bln)
	{
		$ta = $this->session->userdata('ta');
		//belanja operasi
		$row1 = $this->db->query("SELECT SUM(tbl_apbd.pg_bl_op) AS pg_bl_op FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row2 = $this->db->query("SELECT SUM(tbl_apbd.rk_keu_op_rp) AS rk_keu_op_rp FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row3 = $this->db->query("SELECT sum(rk_keu_op_rp)/sum(pg_bl_op)*100 as rk_keu_op_per  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row4 = $this->db->query("SELECT SUM(rf_op*pg_bl_op/100)/sum(pg_bl_op)*100 as rf_op  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		//belanja modal
		$row5 = $this->db->query("SELECT SUM(tbl_apbd.pg_bl_bm) AS pg_bl_bm FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row6 = $this->db->query("SELECT SUM(tbl_apbd.rk_keu_bm_rp) AS rk_keu_bm_rp FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row7 = $this->db->query("SELECT sum(rk_keu_bm_rp)/sum(pg_bl_bm)*100 as rk_keu_bm_per  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row8 = $this->db->query("SELECT SUM(rf_bm*pg_bl_bm/100)/sum(pg_bl_bm)*100 as rf_bm  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		//belanja tidak terduga
		$row9 = $this->db->query("SELECT SUM(tbl_apbd.pg_btt) AS pg_btt FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row10 = $this->db->query("SELECT SUM(tbl_apbd.rk_keu_btt_rp) AS rk_keu_btt_rp FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row11 = $this->db->query("SELECT sum(rk_keu_btt_rp)/sum(pg_btt)*100 as rk_keu_btt_per  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row12 = $this->db->query("SELECT SUM(rf_btt*pg_btt/100)/sum(pg_btt)*100 as rf_btt  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		//belanja transfer
		$row13 = $this->db->query("SELECT SUM(tbl_apbd.pg_bl_bt) AS pg_bl_bt FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row14 = $this->db->query("SELECT SUM(tbl_apbd.rk_keu_bt_rp) AS rk_keu_bt_rp FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row15 = $this->db->query("SELECT sum(rk_keu_bt_rp)/sum(pg_bl_bt)*100 as rk_keu_bt_per  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row16 = $this->db->query("SELECT SUM(rf_bt*pg_bl_bt/100)/sum(pg_bl_bt)*100 as rf_bt  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		//belanja total
		$row17 = $this->db->query("SELECT SUM(tbl_apbd.pg_apbd) AS pg_apbd FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row18 = $this->db->query("SELECT SUM(tbl_apbd.real_apbd) AS real_apbd FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row19 = $this->db->query("SELECT sum(real_apbd)/sum(pg_apbd)*100 as real_apbd_per  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row20 = $this->db->query("SELECT SUM(real_apbd_fisik*pg_apbd/100)/sum(pg_apbd)*100 as real_apbd_fisik  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$data = array(
			//belanja operasi
			'pg_bl_op' => $row1->pg_bl_op,
			'rk_keu_op_rp' => $row2->rk_keu_op_rp,
			'rk_keu_op_per' => round($row3->rk_keu_op_per, 2),
			'rf_op' => round($row4->rf_op, 2),
			//belanja modal
			'pg_bl_bm' => $row5->pg_bl_bm,
			'rk_keu_bm_rp' => $row6->rk_keu_bm_rp,
			'rk_keu_bm_per' => round($row7->rk_keu_bm_per, 2),
			'rf_bm' => round($row8->rf_bm, 2),
			//belanja tidak terduga
			'pg_btt' => $row9->pg_btt,
			'rk_keu_btt_rp' => $row10->rk_keu_btt_rp,
			'rk_keu_btt_per' => round($row11->rk_keu_btt_per, 2),
			'rf_btt' => round($row12->rf_btt, 2),
			//belanja transfer
			'pg_bl_bt' => $row13->pg_bl_bt,
			'rk_keu_bt_rp' => $row14->rk_keu_bt_rp,
			'rk_keu_bt_per' => round($row15->rk_keu_bt_per, 2),
			'rf_bt' => round($row16->rf_bt, 2),
			//belanja total
			'pg_apbd' => $row17->pg_apbd,
			'real_apbd' => $row18->real_apbd,
			'real_apbd_per' => round($row19->real_apbd_per, 2),
			'real_apbd_fisik' => round($row20->real_apbd_fisik, 2),
		);

		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function json_detail($unit, $id_bln)
	{
		$ta = $this->session->userdata('ta');
		//belanja operasi
		$row1 = $this->db->query("SELECT SUM(tbl_apbd.pg_bl_op) AS pg_bl_op FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' AND id_unit='$unit'  ")->row();
		$row2 = $this->db->query("SELECT SUM(tbl_apbd.rk_keu_op_rp) AS rk_keu_op_rp FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' AND id_unit='$unit' ")->row();
		$row3 = $this->db->query("SELECT sum(rk_keu_op_rp)/sum(pg_bl_op)*100 as rk_keu_op_per  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' AND id_unit='$unit' ")->row();
		$row4 = $this->db->query("SELECT SUM(rf_op*pg_bl_op/100)/sum(pg_bl_op)*100 as rf_op  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' AND id_unit='$unit' ")->row();
		//belanja modal
		$row5 = $this->db->query("SELECT SUM(tbl_apbd.pg_bl_bm) AS pg_bl_bm FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' AND id_unit='$unit' ")->row();
		$row6 = $this->db->query("SELECT SUM(tbl_apbd.rk_keu_bm_rp) AS rk_keu_bm_rp FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' AND id_unit='$unit' ")->row();
		$row7 = $this->db->query("SELECT sum(rk_keu_bm_rp)/sum(pg_bl_bm)*100 as rk_keu_bm_per  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' AND id_unit='$unit' ")->row();
		$row8 = $this->db->query("SELECT SUM(rf_bm*pg_bl_bm/100)/sum(pg_bl_bm)*100 as rf_bm  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' AND id_unit='$unit' ")->row();

		//belanja tidak terduga
		$row9 = $this->db->query("SELECT SUM(tbl_apbd.pg_btt) AS pg_btt FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' AND id_unit='$unit' ")->row();
		$row10 = $this->db->query("SELECT SUM(tbl_apbd.rk_keu_btt_rp) AS rk_keu_btt_rp FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' AND id_unit='$unit' ")->row();
		$row11 = $this->db->query("SELECT sum(rk_keu_btt_rp)/sum(pg_btt)*100 as rk_keu_btt_per  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' AND id_unit='$unit' ")->row();
		$row12 = $this->db->query("SELECT SUM(rf_btt*pg_btt/100)/sum(pg_btt)*100 as rf_btt  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' AND id_unit='$unit' ")->row();

		//belanja transfer
		$row13 = $this->db->query("SELECT SUM(tbl_apbd.pg_bl_bt) AS pg_bl_bt FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' AND id_unit='$unit' ")->row();
		$row14 = $this->db->query("SELECT SUM(tbl_apbd.rk_keu_bt_rp) AS rk_keu_bt_rp FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' AND id_unit='$unit' ")->row();
		$row15 = $this->db->query("SELECT sum(rk_keu_bt_rp)/sum(pg_bl_bt)*100 as rk_keu_bt_per  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' AND id_unit='$unit' ")->row();
		$row16 = $this->db->query("SELECT SUM(rf_bt*pg_bl_bt/100)/sum(pg_bl_bt)*100 as rf_bt  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' AND id_unit='$unit' ")->row();

		//belanja total
		$row17 = $this->db->query("SELECT SUM(tbl_apbd.pg_apbd) AS pg_apbd FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' AND id_unit='$unit' ")->row();
		$row18 = $this->db->query("SELECT SUM(tbl_apbd.real_apbd) AS real_apbd FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' AND id_unit='$unit' ")->row();
		$row19 = $this->db->query("SELECT sum(real_apbd)/sum(pg_apbd)*100 as real_apbd_per  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' AND id_unit='$unit' ")->row();
		$row20 = $this->db->query("SELECT SUM(real_apbd_fisik*pg_apbd/100)/sum(pg_apbd)*100 as real_apbd_fisik  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' AND id_unit='$unit' ")->row();

		$data = array(
			//belanja operasi
			'pg_bl_op' => $row1->pg_bl_op,
			'rk_keu_op_rp' => $row2->rk_keu_op_rp,
			'rk_keu_op_per' => round($row3->rk_keu_op_per, 2),
			'rf_op' => round($row4->rf_op, 2),
			//belanja modal
			'pg_bl_bm' => $row5->pg_bl_bm,
			'rk_keu_bm_rp' => $row6->rk_keu_bm_rp,
			'rk_keu_bm_per' => round($row7->rk_keu_bm_per, 2),
			'rf_bm' => round($row8->rf_bm, 2),
			//belanja tidak terduga
			'pg_btt' => $row9->pg_btt,
			'rk_keu_btt_rp' => $row10->rk_keu_btt_rp,
			'rk_keu_btt_per' => round($row11->rk_keu_btt_per, 2),
			'rf_btt' => round($row12->rf_btt, 2),
			//belanja transfer
			'pg_bl_bt' => $row13->pg_bl_bt,
			'rk_keu_bt_rp' => $row14->rk_keu_bt_rp,
			'rk_keu_bt_per' => round($row15->rk_keu_bt_per, 2),
			'rf_bt' => round($row16->rf_bt, 2),
 			//belanja total
			'pg_apbd' => $row17->pg_apbd,
			'real_apbd' => $row18->real_apbd,
			'real_apbd_per' => round($row19->real_apbd_per, 2),
			'real_apbd_fisik' => round($row20->real_apbd_fisik, 2),
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function json_apbd($id_bln)
	{
		//$id_unit = $this->session->userdata('ses_id_unit');
		$data = $this->m_apbd_admin->json_apbd($id_bln);
		header('Content-Type: application/json');
		echo $data;
	}

	public function json_apbd_skpd($id_unit)
	{
		//$id_unit = $this->session->userdata('ses_id_unit');
		$data = $this->m_apbd_admin->json_apbd_skpd($id_unit);
		header('Content-Type: application/json');
		echo $data;
	}

	function cetak_apbd($id_bln)
	{
		$this->load->library('pdfgenerator');
		$this->load->library('ciqrcode');
		$ta = $this->session->userdata('ta');
		//belanja operasi
		$row1 = $this->db->query("SELECT SUM(tbl_apbd.pg_bl_op) AS pg_bl_op FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row2 = $this->db->query("SELECT SUM(tbl_apbd.rk_keu_op_rp) AS rk_keu_op_rp FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row3 = $this->db->query("SELECT sum(rk_keu_op_rp)/sum(pg_bl_op)*100 as rk_keu_op_per  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row4 = $this->db->query("SELECT SUM(rf_op*pg_bl_op/100)/sum(pg_bl_op)*100 as rf_op  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		//belanja modal
		$row5 = $this->db->query("SELECT SUM(tbl_apbd.pg_bl_bm) AS pg_bl_bm FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row6 = $this->db->query("SELECT SUM(tbl_apbd.rk_keu_bm_rp) AS rk_keu_bm_rp FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row7 = $this->db->query("SELECT sum(rk_keu_bm_rp)/sum(pg_bl_bm)*100 as rk_keu_bm_per  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row8 = $this->db->query("SELECT SUM(rf_bm*pg_bl_bm/100)/sum(pg_bl_bm)*100 as rf_bm  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();

		//belanja tidak terduga
		$row9 = $this->db->query("SELECT SUM(tbl_apbd.pg_btt) AS pg_btt FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row10 = $this->db->query("SELECT SUM(tbl_apbd.rk_keu_btt_rp) AS rk_keu_btt_rp FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row11 = $this->db->query("SELECT sum(rk_keu_btt_rp)/sum(pg_btt)*100 as rk_keu_btt_per  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row12 = $this->db->query("SELECT SUM(rf_btt*pg_btt/100)/sum(pg_btt)*100 as rf_btt  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		//belanja transfer
		$row13 = $this->db->query("SELECT SUM(tbl_apbd.pg_bl_bt) AS pg_bl_bt FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row14 = $this->db->query("SELECT SUM(tbl_apbd.rk_keu_bt_rp) AS rk_keu_bt_rp FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row15 = $this->db->query("SELECT sum(rk_keu_bt_rp)/sum(pg_bl_bt)*100 as rk_keu_bt_per  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row16 = $this->db->query("SELECT SUM(rf_bt*pg_bl_bt/100)/sum(pg_bl_bt)*100 as rf_bt  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		//belanja total
		$row17 = $this->db->query("SELECT SUM(tbl_apbd.pg_apbd) AS pg_apbd FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row18 = $this->db->query("SELECT SUM(tbl_apbd.real_apbd) AS real_apbd FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row19 = $this->db->query("SELECT sum(real_apbd)/sum(pg_apbd)*100 as real_apbd_per  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row20 = $this->db->query("SELECT SUM(real_apbd_fisik*pg_apbd/100)/sum(pg_apbd)*100 as real_apbd_fisik  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();

		$data = array(
			//belanja operasi
			'pg_bl_op' => $row1->pg_bl_op,
			'rk_keu_op_rp' => $row2->rk_keu_op_rp,
			'rk_keu_op_per' => round($row3->rk_keu_op_per, 2),
			'rf_op' => round($row4->rf_op, 2),
			//belanja modal
			'pg_bl_bm' => $row5->pg_bl_bm,
			'rk_keu_bm_rp' => $row6->rk_keu_bm_rp,
			'rk_keu_bm_per' => round($row7->rk_keu_bm_per, 2),
			'rf_bm' => round($row8->rf_bm, 2),
			//belanja tidak terduga
			'pg_btt' => $row9->pg_btt,
			'rk_keu_btt_rp' => $row10->rk_keu_btt_rp,
			'rk_keu_btt_per' => round($row11->rk_keu_btt_per, 2),
			'rf_btt' => round($row12->rf_btt, 2),
			//belanja transfer
			'pg_bl_bt' => $row13->pg_bl_bt,
			'rk_keu_bt_rp' => $row14->rk_keu_bt_rp,
			'rk_keu_bt_per' => round($row15->rk_keu_bt_per, 2),
			'rf_bt' => round($row16->rf_bt, 2),

			//belanja total
			'pg_apbd' => $row17->pg_apbd,
			'real_apbd' => $row18->real_apbd,
			'real_apbd_per' => round($row19->real_apbd_per, 2),
			'real_apbd_fisik' => round($row20->real_apbd_fisik, 2),


		);



		$data['main'] = $this->m_apbd_admin->cetak_apbd($id_bln);
		$data['pemda'] = $this->m_master->data_pemda();

		$filename =  "Laporan APBD";

		$html = $this->load->view('laporan/admin/cetak_apbd', $data,  true);
		$this->pdfgenerator->generate($html, $filename);

		//var_dump($data);
	}

	private function verif_post_apbd()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_unitAdmin', 'id_unitAdmin', 'trim|required');
		$this->form_validation->set_rules('id_blnAdmin', 'id_blnAdmin', 'trim|required');
		$this->form_validation->set_rules('pg_apbdAdmin', 'pg_apbdAdmin', 'trim|required');
		$this->form_validation->set_rules('real_apbdAdmin', 'real_apbdAdmin', 'trim|required');
		$this->form_validation->set_rules('real_apbd_perAdmin', 'real_apbd_perAdmin', 'trim|required');
		$this->form_validation->set_rules('real_apbd_fisikAdmin', 'real_apbd_fisikAdmin', 'trim|required');
		$this->form_validation->set_rules('pg_bl_opAdmin', 'pg_bl_opAdmin', 'trim|required');
		$this->form_validation->set_rules('rk_keu_op_rpAdmin', 'rk_keu_op_rpAdmin', 'trim|required');
		$this->form_validation->set_rules('rk_keu_op_perAdmin', 'rk_keu_op_perAdmin', 'trim|required');
		$this->form_validation->set_rules('rf_opAdmin', 'rf_opAdmin', 'trim|required');
		$this->form_validation->set_rules('pg_bl_bmAdmin', 'pg_bl_bmAdmin', 'trim|required');
		$this->form_validation->set_rules('rk_keu_bm_rpAdmin', 'rk_keu_bm_rpAdmin', 'trim|required');
		$this->form_validation->set_rules('rk_keu_bm_perAdmin', 'rk_keu_bm_perAdmin', 'trim|required');
		$this->form_validation->set_rules('rf_bmAdmin', 'rf_bmAdmin', 'trim|required');
		$this->form_validation->set_rules('pg_bttAdmin', 'pg_bttAdmin', 'trim|required');
		$this->form_validation->set_rules('rk_keu_btt_rpAdmin', 'rk_keu_btt_rpAdmin', 'trim|required');
		$this->form_validation->set_rules('rk_keu_btt_perAdmin', 'rk_keu_btt_perAdmin', 'trim|required');
		$this->form_validation->set_rules('rf_bttAdmin', 'rf_bttAdmin', 'trim|required');
		$this->form_validation->set_rules('pg_bl_btAdmin', 'pg_bl_btAdmin', 'trim|required');
		$this->form_validation->set_rules('rk_keu_bt_rpAdmin', 'rk_keu_bt_rpAdmin', 'trim|required');
		$this->form_validation->set_rules('rk_keu_bt_perAdmin', 'rk_keu_bt_perAdmin', 'trim|required');
		$this->form_validation->set_rules('rf_btAdmin', 'rf_btAdmin', 'trim|required');
		return $this->form_validation->run();
	}
	public function post_apbd()
	{
		if ($this->verif_post_apbd()) {

			$id_unit = $this->input->post('id_unitAdmin');
			$id_bln = $this->input->post('id_blnAdmin');
			$pg_apbd = $this->input->post('pg_apbdAdmin');
			$real_apbd = $this->input->post('real_apbdAdmin');
			$real_apbd_per = $this->input->post('real_apbd_perAdmin');
			$real_apbd_fisik = $this->input->post('real_apbd_fisikAdmin');
			$pg_bl_op = $this->input->post('pg_bl_opAdmin');
			$rk_keu_op_rp = $this->input->post('rk_keu_op_rpAdmin');
			$rk_keu_op_per = $this->input->post('rk_keu_op_perAdmin');
			$rf_op = $this->input->post('rf_opAdmin');
			$pg_bl_bm = $this->input->post('pg_bl_bmAdmin');
			$rk_keu_bm_rp = $this->input->post('rk_keu_bm_rpAdmin');
			$rk_keu_bm_per = $this->input->post('rk_keu_bm_perAdmin');
			$rf_bm = $this->input->post('rf_bmAdmin');
			$pg_btt = $this->input->post('pg_bttAdmin');
			$rk_keu_btt_rp = $this->input->post('rk_keu_btt_rpAdmin');
			$rk_keu_btt_per = $this->input->post('rk_keu_btt_perAdmin');
			$rf_btt = $this->input->post('rf_bttAdmin');
			$pg_bl_bt = $this->input->post('pg_bl_btAdmin');
			$rk_keu_bt_rp = $this->input->post('rk_keu_bt_rpAdmin');
			$rk_keu_bt_per = $this->input->post('rk_keu_bt_perAdmin');
			$rf_bt = $this->input->post('rf_btAdmin');
			$data = array(
				'id_bln'        => $id_bln,
				'id_unit'        => $id_unit,
				'pg_apbd'        => str_replace(',', '', $pg_apbd),
				'real_apbd'        => str_replace(',', '', $real_apbd),
				'real_apbd_per'        => $real_apbd_per,
				'real_apbd_fisik'        => $real_apbd_fisik,
				'pg_bl_op'        => str_replace(',', '', $pg_bl_op),
				'rk_keu_op_rp'        => str_replace(',', '', $rk_keu_op_rp),
				'rk_keu_op_per'        => $rk_keu_op_per,
				'rf_op'        => $rf_op,
				'pg_bl_bm'        => str_replace(',', '', $pg_bl_bm),
				'rk_keu_bm_rp'        => str_replace(',', '', $rk_keu_bm_rp),
				'rk_keu_bm_per'        => $rk_keu_bm_per,
				'rf_bm'        => $rf_bm,
				'pg_btt'        => str_replace(',', '', $pg_btt),
				'rk_keu_btt_rp'        => str_replace(',', '', $rk_keu_btt_rp),
				'rk_keu_btt_per'        => $rk_keu_btt_per,
				'rf_btt'        => $rf_btt,
				'pg_bl_bt'        => str_replace(',', '', $pg_bl_bt),
				'rk_keu_bt_rp'        => str_replace(',', '', $rk_keu_bt_rp),
				'rk_keu_bt_per'        => $rk_keu_bt_per,
				'rf_bt'        => $rf_bt,
				'status'        => 1,

			);

			$ta = $this->session->userdata('ta');

			$this->m_apbd->update_tbl_apbd($data, $id_unit, $id_bln, $ta);

			echo json_encode($data);
		} else {
			echo "error";
		}
	}

	public function export_excel($id_bln)
	{
		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

		$ta = $this->session->userdata('ta');



		//$row = $this->m_apbd->get_unit($id_unit);

		//$data['nm_unit'] = $row->nm_unit;
		//$data['nm_pimpinan'] = $row->nm_pimpinan;
		//$data['nip'] = $row->nip;
		//$data['gol'] = $row->gol_jab;
		//$data['stts_p'] = $row->stts_p;

		$excel = new PHPExcel();

		$excel->getProperties()->setCreator('SIP BARTIM')->setLastModifiedBy('SIP BARTIM')->setTitle("APBD")->setSubject("APBD")->setDescription("Laporan APBD")->setKeywords("APBD");

		$kolom_judul = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array('allborders' => array(
				'style' => PHPExcel_Style_Border::BORDER_THIN,
			)),
		);

		$rata_kiri = array(
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, // Set text jadi ditengah secara horizontal (center)

				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array('allborders' => array(
				'style' => PHPExcel_Style_Border::BORDER_THIN,
			)),
		);
		$rata_kanan = array(
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT, // Set text jadi ditengah secara horizontal (center)

				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array('allborders' => array(
				'style' => PHPExcel_Style_Border::BORDER_THIN,
			)),
		);

		$rata_tengah = array(
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)

				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array('allborders' => array(
				'style' => PHPExcel_Style_Border::BORDER_THIN,
			)),
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "TABEL REALISASI KEUANGAN DAN FISIK APBD");

		$excel->setActiveSheetIndex(0)->setCellValue('A2', "TAHUN ANGGARAN" . " " . $ta);
		$excel->getActiveSheet()->mergeCells('A1:V1');
		$excel->getActiveSheet()->mergeCells('A2:V2');
		$excel->getActiveSheet()->mergeCells('A3:V3');
		$excel->getActiveSheet()->getStyle('A1:A3')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1:A3')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1:A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER); // Set text center untuk kolom A1



		$excel->setActiveSheetIndex(0)->setCellValue('A4', "NO");
		$excel->getActiveSheet()->mergeCells('A4:A7');

		$excel->setActiveSheetIndex(0)->setCellValue('B4', "PERANGKAT DAERAH");
		$excel->getActiveSheet()->mergeCells('B4:B7');

		$excel->setActiveSheetIndex(0)->setCellValue('C4', "PAGU APBD");
		$excel->getActiveSheet()->mergeCells('C4:C7');

		$excel->setActiveSheetIndex(0)->setCellValue('D4', "BELANJA OPERASI");
		$excel->getActiveSheet()->mergeCells('D4:G4');

		$excel->setActiveSheetIndex(0)->setCellValue('D5', "PAGU BELANJA OPERASI (Rp.)");
		$excel->getActiveSheet()->mergeCells('D5:D7');


		$excel->setActiveSheetIndex(0)->setCellValue('E5', "REALISASI KEUANGAN");
		$excel->getActiveSheet()->mergeCells('E5:F6');

		$excel->setActiveSheetIndex(0)->setCellValue('E7', "Rp");
		$excel->setActiveSheetIndex(0)->setCellValue('F7', "%");

		$excel->setActiveSheetIndex(0)->setCellValue('G5', "REAL FISIK (%)");
		$excel->getActiveSheet()->mergeCells('G5:G7');


		//BELANJA MODAL
		$excel->setActiveSheetIndex(0)->setCellValue('H4', "BELANJA MODAL");
		$excel->getActiveSheet()->mergeCells('H4:K4');

		$excel->setActiveSheetIndex(0)->setCellValue('H5', "PAGU BELANJA MODAL (Rp.)");
		$excel->getActiveSheet()->mergeCells('H5:H7');

		$excel->setActiveSheetIndex(0)->setCellValue('I5', "REALISASI KEUANGAN");
		$excel->getActiveSheet()->mergeCells('I5:J6');

		$excel->setActiveSheetIndex(0)->setCellValue('I7', "Rp");
		$excel->setActiveSheetIndex(0)->setCellValue('J7', "%");

		$excel->setActiveSheetIndex(0)->setCellValue('K5', "REAL FISIK (%)");
		$excel->getActiveSheet()->mergeCells('K5:K7');
		// END BELANJA MODAL


		//BELANJA TIDAK TERDUGA
		$excel->setActiveSheetIndex(0)->setCellValue('L4', "BELANJA TIDAK TERDUGA");
		$excel->getActiveSheet()->mergeCells('L4:O4');

		$excel->setActiveSheetIndex(0)->setCellValue('L5', "PAGU BELANJA TIDAK TERDUGA (Rp.)");
		$excel->getActiveSheet()->mergeCells('L5:L7');

		$excel->setActiveSheetIndex(0)->setCellValue('M5', "REALISASI KEUANGAN");
		$excel->getActiveSheet()->mergeCells('M5:N6');

		$excel->setActiveSheetIndex(0)->setCellValue('M7', "Rp");
		$excel->setActiveSheetIndex(0)->setCellValue('N7', "%");

		$excel->setActiveSheetIndex(0)->setCellValue('O5', "REAL FISIK (%)");
		$excel->getActiveSheet()->mergeCells('O5:O7');
		// END BELANJA TIDAK TERDUGA

		//BELANJA TANSFER
		$excel->setActiveSheetIndex(0)->setCellValue('P4', "BELANJA TRANSFER");
		$excel->getActiveSheet()->mergeCells('P4:S4');

		$excel->setActiveSheetIndex(0)->setCellValue('P5', "PAGU BELANJA TRANSFER (Rp.)");
		$excel->getActiveSheet()->mergeCells('P5:P7');

		$excel->setActiveSheetIndex(0)->setCellValue('Q5', "REALISASI KEUANGAN");
		$excel->getActiveSheet()->mergeCells('Q5:R6');

		$excel->setActiveSheetIndex(0)->setCellValue('Q7', "Rp");
		$excel->setActiveSheetIndex(0)->setCellValue('R7', "%");

		$excel->setActiveSheetIndex(0)->setCellValue('S5', "REAL FISIK (%)");
		$excel->getActiveSheet()->mergeCells('O5:O7');
		// END BELANJA TRANSFER

		//REALISASI APBD
		$excel->setActiveSheetIndex(0)->setCellValue('T4', "REALISASI APBD");
		$excel->getActiveSheet()->mergeCells('T4:V4');

		$excel->setActiveSheetIndex(0)->setCellValue('T5', "REALISASI KEUANGAN (Rp.)");
		$excel->getActiveSheet()->mergeCells('T5:U5');



		$excel->setActiveSheetIndex(0)->setCellValue('T7', "Rp");
		$excel->setActiveSheetIndex(0)->setCellValue('U7', "%");

		$excel->setActiveSheetIndex(0)->setCellValue('V5', "REAL FISIK (%)");
		$excel->getActiveSheet()->mergeCells('V5:V7');
		// END BELANJA TRANSFER

		//STYLE
		$excel->getActiveSheet()->getStyle('A4:V7')->applyFromArray($kolom_judul);


		$main = $this->m_apbd_admin->cetak_apbd($id_bln);

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 8; // Set baris pertama untuk isi tabel adalah baris ke 4
		$last = count($main) + $numrow;
		foreach ($main as $mn) { // Lakukan looping pada variabel siswa

			$excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $mn->nm_unit);
			$excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $mn->pg_apbd);


			$excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $mn->pg_bl_op);
			$excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $mn->rk_keu_op_rp);
			$excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $mn->rk_keu_op_per);
			$excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $mn->rf_op);

			$excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $mn->pg_bl_bm);
			$excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $mn->rk_keu_bm_rp);
			$excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $mn->rk_keu_bm_per);
			$excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $mn->rf_bm);

			$excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $mn->pg_btt);
			$excel->setActiveSheetIndex(0)->setCellValue('M' . $numrow, $mn->rk_keu_btt_rp);
			$excel->setActiveSheetIndex(0)->setCellValue('N' . $numrow, $mn->rk_keu_btt_per);
			$excel->setActiveSheetIndex(0)->setCellValue('O' . $numrow, $mn->rf_btt);

			$excel->setActiveSheetIndex(0)->setCellValue('P' . $numrow, $mn->rf_btt);
			$excel->setActiveSheetIndex(0)->setCellValue('Q' . $numrow, $mn->pg_bl_bt);
			$excel->setActiveSheetIndex(0)->setCellValue('R' . $numrow, $mn->rk_keu_bt_rp);
			$excel->setActiveSheetIndex(0)->setCellValue('S' . $numrow, $mn->rk_keu_bt_per);

			$excel->setActiveSheetIndex(0)->setCellValue('T' . $numrow, $mn->real_apbd);
			$excel->setActiveSheetIndex(0)->setCellValue('U' . $numrow, $mn->real_apbd_per);
			$excel->setActiveSheetIndex(0)->setCellValue('V' . $numrow, $mn->real_apbd_fisik);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($rata_tengah);
			$excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($rata_kiri);
			$excel->getActiveSheet()->getStyle('C' . $numrow . ':' . 'V' . $last)->applyFromArray($rata_kanan);

			$excel->getActiveSheet()->getStyle('C' . $numrow)->getNumberFormat()->setFormatCode('#,##0.00');
			$excel->getActiveSheet()->getStyle('D' . $numrow)->getNumberFormat()->setFormatCode('#,##0.00');
			$excel->getActiveSheet()->getStyle('E' . $numrow)->getNumberFormat()->setFormatCode('#,##0.00');
			$excel->getActiveSheet()->getStyle('E' . $numrow)->getNumberFormat()->setFormatCode('#,##0.00');
			$excel->getActiveSheet()->getStyle('H' . $numrow)->getNumberFormat()->setFormatCode('#,##0.00');
			$excel->getActiveSheet()->getStyle('I' . $numrow)->getNumberFormat()->setFormatCode('#,##0.00');
			$excel->getActiveSheet()->getStyle('L' . $numrow)->getNumberFormat()->setFormatCode('#,##0.00');
			$excel->getActiveSheet()->getStyle('M' . $numrow)->getNumberFormat()->setFormatCode('#,##0.00');
			$excel->getActiveSheet()->getStyle('P' . $numrow)->getNumberFormat()->setFormatCode('#,##0.00');
			$excel->getActiveSheet()->getStyle('Q' . $numrow)->getNumberFormat()->setFormatCode('#,##0.00');
			$excel->getActiveSheet()->getStyle('T' . $numrow)->getNumberFormat()->setFormatCode('#,##0.00');

			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		$excel->setActiveSheetIndex(0)->setCellValue('A' . $last, "JUMLAH");
		$excel->getActiveSheet()->getStyle('A' . $last)->applyFromArray($rata_tengah);
		$excel->getActiveSheet()->mergeCells('A' . $last . ':' . 'B' . $last);
		$excel->getActiveSheet()->getStyle('A' . $last . ':' . 'B' . $last)->applyFromArray($rata_kiri);

		$pg_apbd = $this->db->query("SELECT SUM(tbl_apbd.pg_apbd) AS pg_apbd FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$pg_bl_op = $this->db->query("SELECT SUM(tbl_apbd.pg_bl_op) AS pg_bl_op FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();

		//belanja operasi
		$pg_bl_op = $this->db->query("SELECT SUM(tbl_apbd.pg_bl_op) AS pg_bl_op FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();

		$rk_keu_op_rp = $this->db->query("SELECT SUM(tbl_apbd.rk_keu_op_rp) AS rk_keu_op_rp FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$rk_keu_op_per = $this->db->query("SELECT sum(rk_keu_op_rp)/sum(pg_bl_op)*100 as rk_keu_op_per  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$rf_op = $this->db->query("SELECT SUM(rf_op*pg_bl_op/100)/sum(pg_bl_op)*100 as rf_op  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();

		//belanja modal
		$pg_bl_bm = $this->db->query("SELECT SUM(tbl_apbd.pg_bl_bm) AS pg_bl_bm  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$rk_keu_bm_rp = $this->db->query("SELECT SUM(tbl_apbd.rk_keu_bm_rp) AS rk_keu_bm_rp  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$rk_keu_bm_per = $this->db->query("SELECT sum(rk_keu_bm_rp)/sum(pg_bl_bm)*100 as rk_keu_bm_per  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$rf_bm = $this->db->query("SELECT SUM(rf_bm*pg_bl_bm/100)/sum(pg_bl_bm)*100 as rf_bm  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();

		//belanja tak terrduga
		$pg_btt = $this->db->query("SELECT SUM(tbl_apbd.pg_btt) AS pg_btt  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$rk_keu_btt_rp = $this->db->query("SELECT SUM(tbl_apbd.rk_keu_btt_rp) AS rk_keu_btt_rp  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$rk_keu_btt_per = $this->db->query("SELECT sum(rk_keu_btt_rp)/sum(pg_btt)*100 as rk_keu_btt_per  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$rf_btt = $this->db->query("SELECT SUM(rf_btt*pg_btt/100)/sum(pg_btt)*100 as rf_btt  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();


		//belanja transfer
		$pg_bl_bt = $this->db->query("SELECT SUM(tbl_apbd.pg_bl_bt) AS pg_bl_bt  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$rk_keu_bt_rp = $this->db->query("SELECT SUM(tbl_apbd.rk_keu_bt_rp) AS rk_keu_bt_rp  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$rk_keu_bt_per = $this->db->query("SELECT sum(rk_keu_bt_per)/sum(pg_bl_bt)*100 as rk_keu_bt_per  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$rf_bt = $this->db->query("SELECT SUM(rf_bt*pg_bl_bt/100)/sum(pg_bl_bt)*100 as rf_bt  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();


		$row19 = $this->db->query("SELECT sum(real_apbd)/sum(pg_apbd)*100 as real_apbd_per  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();
		$row20 = $this->db->query("SELECT SUM(real_apbd_fisik*pg_apbd/100)/sum(pg_apbd)*100 as real_apbd_fisik  FROM tbl_apbd WHERE id_bln='$id_bln' AND tahun='$ta' ")->row();


		$excel->setActiveSheetIndex(0)->setCellValue('C' . $last, $pg_apbd->pg_apbd);
		$excel->getActiveSheet()->getStyle('C' . $last)->getNumberFormat()->setFormatCode('#,##0.00');



		//belanja operasi
		$excel->setActiveSheetIndex(0)->setCellValue('D' . $last, $pg_bl_op->pg_bl_op);
		$excel->getActiveSheet()->getStyle('D' . $last)->getNumberFormat()->setFormatCode('#,##0.00');

		$excel->setActiveSheetIndex(0)->setCellValue('E' . $last, $rk_keu_op_rp->rk_keu_op_rp);
		$excel->getActiveSheet()->getStyle('E' . $last)->getNumberFormat()->setFormatCode('#,##0.00');

		$excel->setActiveSheetIndex(0)->setCellValue('F' . $last, $rk_keu_op_per->rk_keu_op_per);
		$excel->getActiveSheet()->getStyle('F' . $last)->getNumberFormat()->setFormatCode('#,##0.00');

		$excel->setActiveSheetIndex(0)->setCellValue('G' . $last, $rf_op->rf_op);
		$excel->getActiveSheet()->getStyle('G' . $last)->getNumberFormat()->setFormatCode('#,##0.00');

		//belanja modal
		$excel->setActiveSheetIndex(0)->setCellValue('H' . $last, $pg_bl_bm->pg_bl_bm);
		$excel->getActiveSheet()->getStyle('H' . $last)->getNumberFormat()->setFormatCode('#,##0.00');

		$excel->setActiveSheetIndex(0)->setCellValue('I' . $last, $rk_keu_bm_rp->rk_keu_bm_rp);
		$excel->getActiveSheet()->getStyle('I' . $last)->getNumberFormat()->setFormatCode('#,##0.00');

		$excel->setActiveSheetIndex(0)->setCellValue('J' . $last, $rk_keu_bm_per->rk_keu_bm_per);
		$excel->getActiveSheet()->getStyle('J' . $last)->getNumberFormat()->setFormatCode('#,##0.00');

		$excel->setActiveSheetIndex(0)->setCellValue('K' . $last, $rf_bm->rf_bm);
		$excel->getActiveSheet()->getStyle('K' . $last)->getNumberFormat()->setFormatCode('#,##0.00');


		//LEBAR KOLOM
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(70);
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25);

		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(10);

		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(10);

		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('N')->setWidth(10);
		$excel->getActiveSheet()->getColumnDimension('O')->setWidth(10);

		$excel->getActiveSheet()->getColumnDimension('P')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('R')->setWidth(10);
		$excel->getActiveSheet()->getColumnDimension('S')->setWidth(10);

		$excel->getActiveSheet()->getColumnDimension('T')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('U')->setWidth(10);
		$excel->getActiveSheet()->getColumnDimension('V')->setWidth(10);

		$excel->getActiveSheet()->getStyle('A4:V7')->getAlignment()->setWrapText(true);
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);



		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan APBD");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Laporan Apbd.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
}
