<?php
class M_ppbj_200_admin extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }

    

    public function json_ppbj_200($id_bln)
    {
        $ta = $this->session->userdata('ta');
        $this->datatables->select('tbl_ppbj_200.id_ppbj_200, 
        tbl_ppbj_200.id_bln, 
        tbl_ppbj_200.tahun, 
        tbl_ppbj_200.id_unit, 
        tbl_ppbj_200.jml_pkt_200, 
        tbl_ppbj_200.jml_pg_200, 
        tbl_ppbj_200.pl_pkt_200, 
        tbl_ppbj_200.pl_rp_200, 
        tbl_ppbj_200.h_pl_pkt_200, 
        tbl_ppbj_200.h_pl_rp_200, 
        tbl_ppbj_200.kontrak_pkt_200, 
        tbl_ppbj_200.kontrak_rp_200, 
        tbl_ppbj_200.st_pkt_200, 
        tbl_ppbj_200.st_rp_200, 
        tbl_ppbj_200.bp_pkt_200, 
        tbl_ppbj_200.bp_rp_200,
        tbl_ppbj_200.status_ppbj_200,
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
        $this->datatables->join('tbl_ppbj_200', 'tbl_bln.id_bln = tbl_ppbj_200.id_bln', 'left');
        $this->datatables->join('tbl_unit', 'tbl_ppbj_200.id_unit = tbl_unit.id_unit', 'left');
        $this->datatables->where('tbl_ppbj_200.id_bln', $id_bln);
        $this->datatables->where('tbl_ppbj_200.tahun', $ta);
        $this->db->order_by('tbl_unit.urut', 'asc');

        $this->datatables->from('tbl_bln');

        return $this->datatables->generate();
    }


    public function json_get($bln, $unit)
    {
        $ta = $this->session->userdata('ta');
        $this->datatables->select('tbl_ppbj_200.id_ppbj_200, 
        tbl_ppbj_200.id_bln, 
        tbl_ppbj_200.tahun, 
        tbl_ppbj_200.id_unit, 
        tbl_ppbj_200.jml_pkt_200, 
        tbl_ppbj_200.jml_pg_200, 
        tbl_ppbj_200.pl_pkt_200, 
        tbl_ppbj_200.pl_rp_200, 
        tbl_ppbj_200.h_pl_pkt_200, 
        tbl_ppbj_200.h_pl_rp_200, 
        tbl_ppbj_200.kontrak_pkt_200, 
        tbl_ppbj_200.kontrak_rp_200, 
        tbl_ppbj_200.st_pkt_200, 
        tbl_ppbj_200.st_rp_200, 
        tbl_ppbj_200.bp_pkt_200, 
        tbl_ppbj_200.bp_rp_200,
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
        $this->datatables->join('tbl_ppbj_200', 'tbl_bln.id_bln = tbl_ppbj_200.id_bln', 'left');
        $this->datatables->join('tbl_unit', 'tbl_ppbj_200.id_unit = tbl_unit.id_unit', 'left');
        $this->datatables->where('tbl_ppbj_200.id_bln', $bln);
        $this->datatables->where('tbl_ppbj_200.id_unit', $unit);
        $this->datatables->where('tbl_ppbj_200.tahun', $ta);

        $this->db->order_by('tbl_bln.id_bln', 'asc');

        $this->datatables->from('tbl_bln');


        return $this->db->get('tbl_bln')->row();
    }

    function update_tbl_ppbj_200($data, $id_unit, $id_bln)
    {
        $this->db->where('id_bln', $id_bln);
        $this->db->where('id_unit', $id_unit);
        $result = $this->db->update('tbl_ppbj_200', $data);
        return $result;
    }


    public function cetak_ppbj_200($id_bln)
    {


        $ta = $this->session->userdata('ta');
        $this->datatables->select('*');
        $this->datatables->join('tbl_unit', 'tbl_unit.id_unit = tbl_ppbj_200.id_unit', 'left');
        //$this->datatables->join('stts_apbd', 'tbl_apbd.id_bln = stts_apbd.id_bln', 'left');
        $this->datatables->where('tbl_ppbj_200.id_bln', $id_bln);
        $this->datatables->where('tbl_ppbj_200.tahun', $ta);
        $this->db->order_by('tbl_unit.urut','asc');
        $this->datatables->from('tbl_ppbj_200');
        return $this->db->get('tbl_ppbj_200')->result();
    }

    function get_unit($unit)
    {
        $this->datatables->select('*');
        $this->datatables->where('id_unit', $unit);
        $this->datatables->from('tbl_unit');
        return $this->db->get('tbl_unit')->row();
    }
}
