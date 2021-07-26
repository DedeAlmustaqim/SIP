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
		$this->load->helper('string');
		$this->load->library('form_validation');
		$this->load->model('m_dak');
		$this->load->model('m_master');
		$this->load->library('datatables');
		$this->id_unit = $this->session->userdata('ses_id_unit');
	}

	public function index()
	{
		$this->load->library('template');
		$data['judul'] = " DANA ALOKASI KHUSUS ( DAK ) FISIK REGULER ";
		$data['bln'] = $this->m_master->tampil_bln();
		$this->template->konten('dak', $data);
	}

	public function get_dak_fisik($bln, $unit)
	{

		$data = $this->m_dak->get_dak_fisik($bln, $unit);

		header('Content-Type: application/json');
		echo json_encode($data);

		//var_dump($data);

	}

	public function get_dak_fisik_by_id($id)
	{

		$row = $this->m_dak->get_dak_fisik_by_id($id);
		if ($row) {
			$data = array(
				'id_dak_fisik' 	=> $row->id_dak_fisik,
				'keg' 	=> $row->keg,
				'per_vol' 	=> $row->per_vol,
				'per_satuan' 	=> $row->per_satuan,
				'per_jlm_penerima' 	=> $row->per_jlm_penerima,
				'pagu' 	=> $row->pagu,
				'jns_mekanisme' 	=> $row->jns_mekanisme,
				'mek_vol_swa' 	=> $row->mek_vol_swa,
				'mek_nilai_swa' 	=> $row->mek_nilai_swa,
				'mek_vol_kon' 	=> $row->mek_vol_kon,
				'mek_nilai_kon' 	=> $row->mek_nilai_kon,
				'mek_metode' 	=> $row->mek_metode,
				'real_keu' 	=> $row->real_keu,
				'real_keu_per' 	=> $row->real_keu_per,
				'real_fik' 	=> $row->real_fik,
				'kodefikasi' 	=> $row->kodefikasi,
				'status_dak_fisik' 	=> $row->status_dak_fisik,

			);
		} else {
			echo "data kosong";
		}

		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function get_dak_non_fisik($bln, $unit)
	{

		$data = $this->m_dak->get_dak_non_fisik($bln, $unit);

		header('Content-Type: application/json');
		echo json_encode($data);

		//var_dump($data);

	}

	public function get_dak_non_fisik_by_id($id)
	{

		$row = $this->m_dak->get_dak_non_fisik_by_id($id);
		if ($row) {
			$data = array(
				'id_non_fisik' 	=> $row->id_non_fisik,
				'keg' 	=> $row->keg,
				'per_vol' 	=> $row->per_vol,
				'per_satuan' 	=> $row->per_satuan,
				'per_jlm_penerima' 	=> $row->per_jlm_penerima,
				'pagu' 	=> $row->pagu,
				'jns_mekanisme' 	=> $row->jns_mekanisme,
				'mek_vol_swa' 	=> $row->mek_vol_swa,
				'mek_nilai_swa' 	=> $row->mek_nilai_swa,
				'mek_vol_kon' 	=> $row->mek_vol_kon,
				'mek_nilai_kon' 	=> $row->mek_nilai_kon,
				'mek_metode' 	=> $row->mek_metode,
				'real_keu' 	=> $row->real_keu,
				'real_keu_per' 	=> $row->real_keu_per,
				'real_fik' 	=> $row->real_fik,
				'kodefikasi' 	=> $row->kodefikasi,
				'status_dak_non_fisik' 	=> $row->status_dak_non_fisik,

			);
		} else {
			echo "data kosong";
		}

		header('Content-Type: application/json');
		echo json_encode($data);
	}


	private function verif_post_dak_fisik()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_dak_fisik', 'id_dak_fisik', 'trim|required');

		return $this->form_validation->run();
	}
	public function post_dak_fisik()
	{
		if ($this->verif_post_dak_fisik()) {

			$id_dak_fisik = $this->input->post('id_dak_fisik');
			$keg = $this->input->post('keg_fisik');
			$per_vol = $this->input->post('per_vol_fisik');
			$per_satuan = $this->input->post('per_satuan_fisik');
			$per_jlm_penerima = $this->input->post('per_jlm_penerima_fisik');
			$pagu = $this->input->post('pagu_fisik');
			$jns_mekanisme = $this->input->post('jns_mekanisme_fisik');
			$mek_vol_swa = $this->input->post('mek_vol_swa_fisik');
			$mek_nilai_swa = $this->input->post('mek_nilai_swa_fisik');
			$mek_vol_kon = $this->input->post('mek_vol_kon_fisik');
			$mek_nilai_kon = $this->input->post('mek_nilai_kon_fisik');
			$mek_metode = $this->input->post('mek_metode_fisik');
			$real_keu = $this->input->post('real_keu_fisik');
			$real_keu_per = $this->input->post('real_keu_per_fisik');
			$real_fik = $this->input->post('real_fik_fisik');
			$kodefikasi = $this->input->post('kodefikasi_fisik');

			$data = array(
				'keg' 		=> $keg,
				'per_vol' 		=> $per_vol,
				'per_satuan' 		=> $per_satuan,
				'per_jlm_penerima' 		=> $per_jlm_penerima,
				'pagu'        => str_replace(',', '', $pagu),
				'jns_mekanisme' 		=> $jns_mekanisme,
				'mek_vol_swa' 		=> $mek_vol_swa,
				'mek_nilai_swa' 		=> str_replace(',', '', $mek_nilai_swa),
				'mek_vol_kon' 		=> $mek_vol_kon,
				'mek_nilai_kon' 		=> str_replace(',', '', $mek_nilai_kon),
				'mek_metode' 		=> $mek_metode,
				'real_keu' 		=> str_replace(',', '', $real_keu),
				'real_keu_per' 		=> $real_keu_per,
				'real_fik' 		=> $real_fik,
				'kodefikasi' 		=> $kodefikasi,
				'status_dak_fisik'        => 1,
			);
			$this->m_dak->update_tbl_dak_fisik($data, $id_dak_fisik);
			echo json_encode($data);
		} else {
			show_404();
		}
	}

	private function verif_post_dak_non_fisik()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_dak_non_fisik', 'id_dak_non_fisik', 'trim|required');

		return $this->form_validation->run();
	}
	public function post_dak_non_fisik()
	{
		if ($this->verif_post_dak_non_fisik()) {

			$id_dak_non_fisik = $this->input->post('id_dak_non_fisik');
			$keg = $this->input->post('keg_non_fisik');
			$per_vol = $this->input->post('per_vol_non_fisik');
			$per_satuan = $this->input->post('per_satuan_non_fisik');
			$per_jlm_penerima = $this->input->post('per_jlm_penerima_non_fisik');
			$pagu = $this->input->post('pagu_non_fisik');
			$jns_mekanisme = $this->input->post('jns_mekanisme_non_fisik');
			$mek_vol_swa = $this->input->post('mek_vol_swa_non_fisik');
			$mek_nilai_swa = $this->input->post('mek_nilai_swa_non_fisik');
			$mek_vol_kon = $this->input->post('mek_vol_kon_non_fisik');
			$mek_nilai_kon = $this->input->post('mek_nilai_kon_non_fisik');
			$mek_metode = $this->input->post('mek_metode_non_fisik');
			$real_keu = $this->input->post('real_keu_non_fisik');
			$real_keu_per = $this->input->post('real_keu_per_non_fisik');
			$real_fik = $this->input->post('real_fik_non_fisik');
			$kodefikasi = $this->input->post('kodefikasi_non_fisik');

			$data = array(
				'keg' 		=> $keg,
				'per_vol' 		=> $per_vol,
				'per_satuan' 		=> $per_satuan,
				'per_jlm_penerima' 		=> $per_jlm_penerima,
				'pagu'        => str_replace(',', '', $pagu),
				'jns_mekanisme' 		=> $jns_mekanisme,
				'mek_vol_swa' 		=> $mek_vol_swa,
				'mek_nilai_swa' 		=> str_replace(',', '', $mek_nilai_swa),
				'mek_vol_kon' 		=> $mek_vol_kon,
				'mek_nilai_kon' 		=> str_replace(',', '', $mek_nilai_kon),
				'mek_metode' 		=> $mek_metode,
				'real_keu' 		=> str_replace(',', '', $real_keu),
				'real_keu_per' 		=> $real_keu_per,
				'real_fik' 		=> $real_fik,
				'kodefikasi' 		=> $kodefikasi,
				'status_dak_non_fisik'        => 1,
			);
			$this->m_dak->update_tbl_dak_non_fisik($data, $id_dak_non_fisik);
			echo json_encode($data);
		} else {
			show_404();
		}
	}

	function cetak_dak_fisik($id_bln, $id_unit)
	{
		$this->load->library('pdfgenerator');

		$row = $this->m_dak->get_unit($id_unit);

		$data['nm_unit'] = $row->nm_unit;
		$data['nm_pimpinan'] = $row->nm_pimpinan;
		$data['nip'] = $row->nip;
		$data['gol'] = $row->gol_jab;
		$data['stts_p'] = $row->stts_p;
		$data['ttd'] = $row->ttd;
		$data['main'] = $this->m_dak->cetak_dak_fisik($id_bln, $id_unit);


		//var_dump($data);
		$filename =  "DAK Fisik".$row->nm_unit;
		$html = $this->load->view('laporan/cetak_dak_fisik', $data, true);
		$this->pdfgenerator->generate($html, $filename);
	}

	function cetak_dak_non_fisik($id_bln, $id_unit)
	{
		$this->load->library('pdfgenerator');

		$row = $this->m_dak->get_unit($id_unit);

		$data['nm_unit'] = $row->nm_unit;
		$data['nm_pimpinan'] = $row->nm_pimpinan;
		$data['nip'] = $row->nip;
		$data['gol'] = $row->gol_jab;
		$data['stts_p'] = $row->stts_p;
		$data['ttd'] = $row->ttd;
		$data['main'] = $this->m_dak->cetak_dak_non_fisik($id_bln, $id_unit);


		//var_dump($data);
		$filename =  "DAK Fisik".$row->nm_unit;
		$html = $this->load->view('laporan/cetak_dak_non_fisik', $data, true);
		$this->pdfgenerator->generate($html, $filename);
	}
}
