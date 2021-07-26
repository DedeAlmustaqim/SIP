<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Dashboard extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();

		if (($this->session->userdata('akses') == '1') || ($this->session->userdata('akses') == '2') || ($this->session->userdata('akses') == '3') || ($this->session->userdata('akses') == '4') || ($this->session->userdata('akses') == '5')) {
		} else {
			redirect('login');
		}
		$this->load->library('template');
		$this->load->model('m_dashboard');
		$this->load->library('datatables');
	}
	public function index()
	{
		$data['judul'] = "Dashboard";
		$this->template->konten('dashboard', $data);
		//var_dump($data);
	}

	public function json_status()
	{
		$id_unit = $this->session->userdata('ses_id_unit');
		$data = $this->m_dashboard->json_status($id_unit);
		header('Content-Type: application/json');
		echo $data;
	}

	public function json_total()
	{
		$ta = $this->session->userdata('ta');
		$id_unit = $this->session->userdata('ses_id_unit');

		//belanja operasi
		$row1 = $this->db->query("SELECT real_apbd_per AS real_apbd_per_1 FROM tbl_apbd WHERE id_bln=1 AND tahun='$ta' AND id_unit='$id_unit' ")->row();
		$row2 = $this->db->query("SELECT real_apbd_per AS real_apbd_per_2 FROM tbl_apbd WHERE id_bln=2 AND tahun='$ta' AND id_unit='$id_unit' ")->row();
		$row3 = $this->db->query("SELECT real_apbd_per AS real_apbd_per_3 FROM tbl_apbd WHERE id_bln=3 AND tahun='$ta' AND id_unit='$id_unit' ")->row();
		$row4 = $this->db->query("SELECT real_apbd_per AS real_apbd_per_4 FROM tbl_apbd WHERE id_bln=4 AND tahun='$ta' AND id_unit='$id_unit' ")->row();
		$row5 = $this->db->query("SELECT real_apbd_per AS real_apbd_per_5 FROM tbl_apbd WHERE id_bln=5 AND tahun='$ta' AND id_unit='$id_unit' ")->row();
		$row6 = $this->db->query("SELECT real_apbd_per AS real_apbd_per_6 FROM tbl_apbd WHERE id_bln=6 AND tahun='$ta' AND id_unit='$id_unit' ")->row();
		$row7 = $this->db->query("SELECT real_apbd_per AS real_apbd_per_7 FROM tbl_apbd WHERE id_bln=7 AND tahun='$ta' AND id_unit='$id_unit' ")->row();
		$row8 = $this->db->query("SELECT real_apbd_per AS real_apbd_per_8 FROM tbl_apbd WHERE id_bln=8 AND tahun='$ta' AND id_unit='$id_unit' ")->row();
		$row9 = $this->db->query("SELECT real_apbd_per AS real_apbd_per_9 FROM tbl_apbd WHERE id_bln=9 AND tahun='$ta' AND id_unit='$id_unit' ")->row();
		$row10 = $this->db->query("SELECT real_apbd_per AS real_apbd_per_10 FROM tbl_apbd WHERE id_bln=10 AND tahun='$ta' AND id_unit='$id_unit' ")->row();
		$row11 = $this->db->query("SELECT real_apbd_per AS real_apbd_per_11 FROM tbl_apbd WHERE id_bln=11 AND tahun='$ta' AND id_unit='$id_unit' ")->row();
		$row12 = $this->db->query("SELECT real_apbd_per AS real_apbd_per_12 FROM tbl_apbd WHERE id_bln=12 AND tahun='$ta' AND id_unit='$id_unit' ")->row();

		//belanja operasi
		$fisik1 = $this->db->query("SELECT real_apbd_fisik AS real_apbd_fisik_1 FROM tbl_apbd WHERE id_bln=1 AND tahun='$ta' AND id_unit='$id_unit' ")->row();
		$fisik2 = $this->db->query("SELECT real_apbd_fisik AS real_apbd_fisik_2 FROM tbl_apbd WHERE id_bln=2 AND tahun='$ta' AND id_unit='$id_unit' ")->row();
		$fisik3 = $this->db->query("SELECT real_apbd_fisik AS real_apbd_fisik_3 FROM tbl_apbd WHERE id_bln=3 AND tahun='$ta' AND id_unit='$id_unit' ")->row();
		$fisik4 = $this->db->query("SELECT real_apbd_fisik AS real_apbd_fisik_4 FROM tbl_apbd WHERE id_bln=4 AND tahun='$ta' AND id_unit='$id_unit'")->row();
		$fisik5 = $this->db->query("SELECT real_apbd_fisik AS real_apbd_fisik_5 FROM tbl_apbd WHERE id_bln=5 AND tahun='$ta' AND id_unit='$id_unit'")->row();
		$fisik6 = $this->db->query("SELECT real_apbd_fisik AS real_apbd_fisik_6 FROM tbl_apbd WHERE id_bln=6 AND tahun='$ta' AND id_unit='$id_unit'")->row();
		$fisik7 = $this->db->query("SELECT real_apbd_fisik AS real_apbd_fisik_7 FROM tbl_apbd WHERE id_bln=7 AND tahun='$ta' AND id_unit='$id_unit'")->row();
		$fisik8 = $this->db->query("SELECT real_apbd_fisik AS real_apbd_fisik_8 FROM tbl_apbd WHERE id_bln=8 AND tahun='$ta' AND id_unit='$id_unit'")->row();
		$fisik9 = $this->db->query("SELECT real_apbd_fisik AS real_apbd_fisik_9 FROM tbl_apbd WHERE id_bln=9 AND tahun='$ta' AND id_unit='$id_unit'")->row();
		$fisik10 = $this->db->query("SELECT real_apbd_fisik AS real_apbd_fisik_10 FROM tbl_apbd WHERE id_bln=10 AND tahun='$ta' AND id_unit='$id_unit'")->row();
		$fisik11 = $this->db->query("SELECT real_apbd_fisik AS real_apbd_fisik_11 FROM tbl_apbd WHERE id_bln=11 AND tahun='$ta' AND id_unit='$id_unit'")->row();
		$fisik12 = $this->db->query("SELECT real_apbd_fisik AS real_apbd_fisik_12 FROM tbl_apbd WHERE id_bln=12 AND tahun='$ta' AND id_unit='$id_unit'")->row();

		$data = array(
			//belanja keu
			'real_apbd_per_1' => $row1->real_apbd_per_1,
			'real_apbd_per_2' => $row2->real_apbd_per_2,
			'real_apbd_per_3' => $row3->real_apbd_per_3,
			'real_apbd_per_4' => $row4->real_apbd_per_4,
			'real_apbd_per_5' => $row5->real_apbd_per_5,
			'real_apbd_per_6' => $row6->real_apbd_per_6,
			'real_apbd_per_7' => $row7->real_apbd_per_7,
			'real_apbd_per_8' => $row8->real_apbd_per_8,
			'real_apbd_per_9' => $row9->real_apbd_per_9,
			'real_apbd_per_10' => $row10->real_apbd_per_10,
			'real_apbd_per_11' => $row11->real_apbd_per_11,
			'real_apbd_per_12' => $row12->real_apbd_per_12,

			'real_apbd_fisik_1' => $fisik1->real_apbd_fisik_1,
			'real_apbd_fisik_2' => $fisik2->real_apbd_fisik_2,
			'real_apbd_fisik_3' => $fisik3->real_apbd_fisik_3,
			'real_apbd_fisik_4' => $fisik4->real_apbd_fisik_4,
			'real_apbd_fisik_5' => $fisik5->real_apbd_fisik_5,
			'real_apbd_fisik_6' => $fisik6->real_apbd_fisik_6,
			'real_apbd_fisik_7' => $fisik7->real_apbd_fisik_7,
			'real_apbd_fisik_8' => $fisik8->real_apbd_fisik_8,
			'real_apbd_fisik_9' => $fisik9->real_apbd_fisik_9,
			'real_apbd_fisik_10' => $fisik10->real_apbd_fisik_10,
			'real_apbd_fisik_11' => $fisik11->real_apbd_fisik_11,
			'real_apbd_fisik_12' => $fisik12->real_apbd_fisik_12,


		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function btn_sinkron()
	{
		$ta = $this->session->userdata('ta');
		$id_unit = $this->session->userdata('ses_id_unit'); //session id unit
		$this->db->where('id_unit', $id_unit);
		$this->db->where('tahun', $ta);
		$q = $this->db->get('tbl_apbd');
		if ($q->num_rows() > 0) {
			echo "1";
		} else {
			echo "0";
		}
	}

	public function sinkron()
	{

		$id_unit = $this->session->userdata('ses_id_unit'); //session id unit
		$ta = $this->session->userdata('ta');

		$this->db->where('id_unit', $id_unit);
		$this->db->where('tahun', $ta);

		$q = $this->db->get('tbl_apbd');

		if ($q->num_rows() > 0) {
			show_404();
		} else {
			$data = array(
				array(
					'id_bln' => '1',
					'id_unit' => $id_unit,
					'tahun' => $ta
				),
				array(
					'id_bln' => '2',
					'id_unit' => $id_unit,
					'tahun' => $ta
				),
				array(
					'id_bln' => '3',
					'id_unit' => $id_unit,
					'tahun' => $ta
				),
				array(
					'id_bln' => '4',
					'id_unit' => $id_unit,
					'tahun' => $ta
				),
				array(
					'id_bln' => '5',
					'id_unit' => $id_unit,
					'tahun' => $ta
				),
				array(
					'id_bln' => '6',
					'id_unit' => $id_unit,
					'tahun' => $ta
				),
				array(
					'id_bln' => '7',
					'id_unit' => $id_unit,
					'tahun' => $ta
				),
				array(
					'id_bln' => '8',
					'id_unit' => $id_unit,
					'tahun' => $ta
				),
				array(
					'id_bln' => '9',
					'id_unit' => $id_unit,
					'tahun' => $ta
				),
				array(
					'id_bln' => '10',
					'id_unit' => $id_unit,
					'tahun' => $ta
				),
				array(
					'id_bln' => '11',
					'id_unit' => $id_unit,
					'tahun' => $ta
				),
				array(
					'id_bln' => '12',
					'id_unit' => $id_unit,
					'tahun' => $ta
				),
			);

			$data2 = array(
				'sinkron' => '1',

			);

			$this->db->insert_batch('tbl_apbd', $data);
			$this->db->insert_batch('tbl_ppbj_50', $data);
			$this->db->insert_batch('tbl_ppbj_200', $data);
			$this->db->insert_batch('tbl_ppbj_25', $data);
			$this->db->insert_batch('tbl_pendapatan', $data);

			$this->m_dashboard->sinkron($data2, $id_unit);

			redirect('dashboard');
		}
	}

	public function json_grafik_ppbj()
	{
		$ta = $this->session->userdata('ta');
		$unit = $this->session->userdata('ses_id_unit');
		$data = $this->m_dashboard->grafik_ppbj($unit, $ta)->result();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function json_grafik_pd()
	{
		$ta = $this->session->userdata('ta');
		$unit = $this->session->userdata('ses_id_unit');
		$data = $this->m_dashboard->grafik_pd($unit, $ta)->result();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	
}
