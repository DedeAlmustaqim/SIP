<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apps extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		if (($this->session->userdata('akses') == '1') || ($this->session->userdata('akses') == '2') || ($this->session->userdata('akses') == '3') || ($this->session->userdata('akses') == '4') || ($this->session->userdata('akses') == '5')) {
		} else {
			redirect('login');
		}

	}

    public function jadwal_exp()
	{
		$row = $this->db->query("SELECT DATE_FORMAT(tgl_akhir, '%Y/%m/%d %H:%i:%s') as tgl_akhir FROM tbl_bln WHERE aktif='1' ")->row();
		$row2 = $this->db->query("select nm_bln as nm_bln FROM tbl_bln WHERE aktif='1' ")->row();

		if ($row) {
			$data = array(
				//belanja operasi
				'tgl_akhir' => $row->tgl_akhir,
				'nm_bln' => $row2->nm_bln,
				
			);
		}else{
			$data = array(
				//belanja operasi
				'tgl_akhir' => null,
				'nm_bln' => null,
				
			);
		}

		header('Content-Type: application/json');
		echo json_encode($data);
	}
	
}
