<?php
class M_progress extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }

    public function json_get_apbd($id_bln, $id_unit)
    {
        $this->datatables->select('tbl_apbd.id_apdb, 
	tbl_apbd.id_bln, 
	tbl_apbd.id_unit, 
	tbl_apbd.tahun, 
	tbl_apbd.pg_apbd, 
	tbl_apbd.pg_bl_op, 
	tbl_apbd.rk_keu_op_rp, 
	tbl_apbd.rk_keu_op_per, 
	tbl_apbd.rf_op, 
	tbl_apbd.pg_bl_bm, 
	tbl_apbd.rk_keu_bm_rp, 
	tbl_apbd.rk_keu_bm_per, 
	tbl_apbd.rf_bm, 
	tbl_apbd.pg_bl_bt, 
	tbl_apbd.rk_keu_bt_rp, 
	tbl_apbd.rk_keu_bt_per, 
	tbl_apbd.rf_bt, 
	tbl_apbd.real_apbd, 
	tbl_apbd.real_apbd_per, 
	tbl_apbd.real_apbd_fisik, 
	tbl_apbd.`status`, 
	tbl_apbd.pg_btt, 
	tbl_apbd.rk_keu_btt_rp, 
	tbl_apbd.rk_keu_btt_per, 
	tbl_apbd.rf_btt, 
        tbl_bln.id_bln, 
        tbl_bln.nm_bln, 
        tbl_bln.tgl_awal, 
        tbl_bln.tgl_akhir, 
        tbl_unit.id_unit, 
        tbl_unit.nm_pimpinan, 
        tbl_unit.nm_unit, 
        tbl_unit.nip, 
        tbl_unit.created_at, 
        tbl_unit.updated_at');

        $this->datatables->select('DATE_FORMAT(tgl_awal, "%d-%m -%Y") as tgl1');
        $this->datatables->select('DATE_FORMAT(tgl_akhir, "%d-%m -%Y") as tgl2');
        $this->datatables->select('case when tgl_awal < CURDATE() AND CURDATE()  < tgl_akhir then "1" else "0"
        end as kunci_bln');
        $this->datatables->join('tbl_apbd', 'tbl_bln.id_bln = tbl_apbd.id_bln', 'left');
        $this->datatables->join('tbl_unit', 'tbl_apbd.id_unit = tbl_unit.id_unit', 'left');
        $this->datatables->where('tbl_apbd.id_bln', $id_bln);
        $this->datatables->where('tbl_apbd.id_unit', $id_unit);
        $this->db->order_by('tbl_bln.id_bln', 'asc');

        $this->datatables->from('tbl_bln');


        return $this->db->get('tbl_bln')->row();
    }
   
}
