<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apbd extends CI_Controller
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
		$this->load->model('m_apbd');
		$this->load->model('m_master');
		$this->load->library('datatables');
	}


	public function index()
	{
		$this->load->library('template');
		$data['judul'] = " REALISASI KEUANGAN DAN FISIK APBD ";
		$data['bln'] = $this->m_master->tampil_bln();
		$this->template->konten('apbd', $data);
	}

	public function get_apbd($bln, $unit)
	{
		$row = $this->m_apbd->json_get_apbd($bln, $unit);
		if ($row) {
			$data = array(
				'id_bln' 	=> $row->id_bln,
				'id_unit' 	=> $row->id_unit,
				'pg_apbd' 	=> $row->pg_apbd,
				'real_apbd' 	=> $row->real_apbd,
				'real_apbd_per' 	=> $row->real_apbd_per,
				'real_apbd_fisik' 	=> $row->real_apbd_fisik,
				'pg_bl_op' 	=> $row->pg_bl_op,
				'rk_keu_op_rp' 	=> $row->rk_keu_op_rp,
				'rk_keu_op_per' 	=> $row->rk_keu_op_per,
				'rf_op' 	=> $row->rf_op,
				'pg_bl_bm' 	=> $row->pg_bl_bm,
				'rk_keu_bm_rp' 	=> $row->rk_keu_bm_rp,
				'rk_keu_bm_per' 	=> $row->rk_keu_bm_per,
				'rf_bm' 	=> $row->rf_bm,
				'pg_btt' 	=> $row->pg_btt,
				'rk_keu_btt_rp' 	=> $row->rk_keu_btt_rp,
				'rk_keu_btt_per' 	=> $row->rk_keu_btt_per,
				'rf_btt' 	=> $row->rf_btt,
				'pg_bl_bt' 	=> $row->pg_bl_bt,
				'rk_keu_bt_rp' 	=> $row->rk_keu_bt_rp,
				'rk_keu_bt_per' 	=> $row->rk_keu_bt_per,
				'rf_bt' 	=> $row->rf_bt,
				'kunci_bln' 	=> $row->kunci_bln,
				'kunci_pagu' 	=> $row->kunci_pagu,
				'aktif' 	=> $row->aktif,
				'nm_bln' 	=> $row->nm_bln,
				'status' 	=> $row->status,
			);
		} else {
			echo "data kosong";
		}
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	private function verif_post_apbd_skpd()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_unit', 'id_unit', 'trim|required');
		$this->form_validation->set_rules('id_bln', 'id_bln', 'trim|required');
		$this->form_validation->set_rules('pg_apbd', 'pg_apbd', 'trim|required');
		$this->form_validation->set_rules('real_apbd', 'real_apbd', 'trim|required');
		$this->form_validation->set_rules('real_apbd_per', 'real_apbd_per', 'trim|required');
		$this->form_validation->set_rules('real_apbd_fisik', 'real_apbd_fisik', 'trim|required');
		$this->form_validation->set_rules('pg_bl_op', 'pg_bl_op', 'trim|required');
		$this->form_validation->set_rules('rk_keu_op_rp', 'rk_keu_op_rp', 'trim|required');
		$this->form_validation->set_rules('rk_keu_op_per', 'rk_keu_op_per', 'trim|required');
		$this->form_validation->set_rules('rf_op', 'rf_op', 'trim|required');
		$this->form_validation->set_rules('pg_bl_bm', 'pg_bl_bm', 'trim|required');
		$this->form_validation->set_rules('rk_keu_bm_rp', 'rk_keu_bm_rp', 'trim|required');
		$this->form_validation->set_rules('rk_keu_bm_per', 'rk_keu_bm_per', 'trim|required');
		$this->form_validation->set_rules('rf_bm', 'rf_bm', 'trim|required');
		$this->form_validation->set_rules('pg_btt', 'pg_btt', 'trim|required');
		$this->form_validation->set_rules('rk_keu_btt_rp', 'rk_keu_btt_rp', 'trim|required');
		$this->form_validation->set_rules('rk_keu_btt_per', 'rk_keu_btt_per', 'trim|required');
		$this->form_validation->set_rules('rf_btt', 'rf_btt', 'trim|required');
		$this->form_validation->set_rules('pg_bl_bt', 'pg_bl_bt', 'trim|required');
		$this->form_validation->set_rules('rk_keu_bt_rp', 'rk_keu_bt_rp', 'trim|required');
		$this->form_validation->set_rules('rk_keu_bt_per', 'rk_keu_bt_per', 'trim|required');
		$this->form_validation->set_rules('rf_bt', 'rf_bt', 'trim|required');
		return $this->form_validation->run();
	}
	public function post_apbd()
	{
		if ($this->verif_post_apbd_skpd()) {

			$id_unit = $this->input->post('id_unit');
			$id_bln = $this->input->post('id_bln');
			$pg_apbd = $this->input->post('pg_apbd');
			$real_apbd = $this->input->post('real_apbd');
			$real_apbd_per = $this->input->post('real_apbd_per');
			$real_apbd_fisik = $this->input->post('real_apbd_fisik');
			$pg_bl_op = $this->input->post('pg_bl_op');
			$rk_keu_op_rp = $this->input->post('rk_keu_op_rp');
			$rk_keu_op_per = $this->input->post('rk_keu_op_per');
			$rf_op = $this->input->post('rf_op');
			$pg_bl_bm = $this->input->post('pg_bl_bm');
			$rk_keu_bm_rp = $this->input->post('rk_keu_bm_rp');
			$rk_keu_bm_per = $this->input->post('rk_keu_bm_per');
			$rf_bm = $this->input->post('rf_bm');
			$pg_btt = $this->input->post('pg_btt');
			$rk_keu_btt_rp = $this->input->post('rk_keu_btt_rp');
			$rk_keu_btt_per = $this->input->post('rk_keu_btt_per');
			$rf_btt = $this->input->post('rf_btt');
			$pg_bl_bt = $this->input->post('pg_bl_bt');
			$rk_keu_bt_rp = $this->input->post('rk_keu_bt_rp');
			$rk_keu_bt_per = $this->input->post('rk_keu_bt_per');
			$rf_bt = $this->input->post('rf_bt');
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
			echo validation_errors();
		}
	}

	function cetak_apbd($id_bln, $id_unit)
	{
		$this->load->library('pdfgenerator');
		$row = $this->m_apbd->get_unit($id_unit);
		$data['nm_unit'] = $row->nm_unit;
		$data['nm_pimpinan'] = $row->nm_pimpinan;
		$data['nip'] = $row->nip;
		$data['gol'] = $row->gol_jab;
		$data['stts_p'] = $row->stts_p;
		$data['ttd'] = $row->ttd;
		$data['main'] = $this->m_apbd->cetak_apbd($id_bln, $id_unit);
		$filename =  "cetak";
		$html = $this->load->view('laporan/cetak_apbd', $data, true);
		$this->pdfgenerator->generate($html, $filename);
	}

	public function export_excel($id_bln)
	{
		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
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

		$style_row = array(
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)

				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "TABEL REALISASI KEUANGAN DAN FISIK APBD");
		$excel->setActiveSheetIndex(0)->setCellValue('A2', "");
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "TAHUN ANGGARAN");
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
		$excel->setActiveSheetIndex(0)->setCellValue('T4', "REALISASI APBD");
		$excel->getActiveSheet()->mergeCells('T4:V4');
		$excel->setActiveSheetIndex(0)->setCellValue('T5', "REALISASI KEUANGAN (Rp.)");
		$excel->getActiveSheet()->mergeCells('T5:U5');
		$excel->setActiveSheetIndex(0)->setCellValue('T7', "Rp");
		$excel->setActiveSheetIndex(0)->setCellValue('U7', "%");
		$excel->setActiveSheetIndex(0)->setCellValue('V5', "REAL FISIK (%)");
		$excel->getActiveSheet()->mergeCells('V5:V7');
		$excel->getActiveSheet()->getStyle('A4:V7')->applyFromArray($kolom_judul);
		$data = $this->m_apbd->cetak_apbd($id_bln, $id_unit);
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 8; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach ($data as $dt) { // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $dt->nm_unit);
			$excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}
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
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		$excel->getActiveSheet(0)->setTitle("Laporan APBD");
		$excel->setActiveSheetIndex(0);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Laporan Apbd.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
}
