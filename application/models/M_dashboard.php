<?php
class M_dashboard extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }

    public function json_status($id_unit)
    {
        $ta = $this->session->userdata('ta');
        $this->datatables->select('tbl_bln.nm_bln, 
        tbl_ppbj_200.status_ppbj_200, 
        tbl_ppbj_50.status_ppbj_50, 
        tbl_ppbj_25.status_ppbj_25, 
        tbl_pendapatan.status_pd, 
        tbl_apbd.`status`,
        tbl_bln.nm_bln,
        tbl_bln.id_bln
        ');


        $this->datatables->join('tbl_ppbj_200', 'tbl_bln.id_bln = tbl_ppbj_200.id_bln', 'left');
        $this->datatables->join('tbl_unit', 'tbl_ppbj_200.id_unit = tbl_unit.id_unit', 'left');
        $this->datatables->join('tbl_ppbj_50', 'tbl_bln.id_bln = tbl_ppbj_50.id_bln AND tbl_unit.id_unit = tbl_ppbj_50.id_unit', 'left');
        $this->datatables->join('tbl_ppbj_25', 'tbl_bln.id_bln = tbl_ppbj_25.id_bln AND tbl_unit.id_unit = tbl_ppbj_25.id_unit', 'left');
        $this->datatables->join('tbl_pendapatan', 'tbl_bln.id_bln = tbl_pendapatan.id_bln AND tbl_unit.id_unit = tbl_pendapatan.id_unit', 'left');
        $this->datatables->join('tbl_apbd', 'tbl_bln.id_bln = tbl_apbd.id_bln AND tbl_unit.id_unit = tbl_apbd.id_unit', 'left');
        $this->datatables->where('tbl_apbd.tahun', $ta);
        $this->datatables->where('tbl_unit.id_unit', $id_unit);
        $this->db->group_by('tbl_bln.id_bln');

        $this->datatables->from('tbl_bln');

        return $this->datatables->generate();
    }

    public function grafik_ppbj( $unit, $ta)
    {
        $this->db->select('tbl_bln.nm_bln, 
        tbl_ppbj_50.jml_pkt_50, 
        tbl_ppbj_200.jml_pkt_200, 
        tbl_ppbj_25.jml_pkt_25, 
        tbl_ppbj_50.bp_pkt_50, 
        tbl_ppbj_200.bp_pkt_200, 
        tbl_ppbj_25.bp_pkt_25');

        $this->db->join('tbl_ppbj_50', 'tbl_bln.id_bln = tbl_ppbj_50.id_bln', 'inner');
        $this->db->join('tbl_ppbj_200', 'tbl_bln.id_bln = tbl_ppbj_200.id_bln', 'inner');
        $this->db->join('tbl_ppbj_25', 'tbl_bln.id_bln = tbl_ppbj_25.id_bln', 'inner');
        $this->db->where('tbl_ppbj_50.id_unit', $unit);
        $this->db->where('tbl_ppbj_200.id_unit', $unit);
        $this->db->where('tbl_ppbj_25.id_unit', $unit);
        $this->db->where('tbl_ppbj_50.tahun', $ta);
        $this->db->where('tbl_ppbj_200.tahun', $ta);
        $this->db->where('tbl_ppbj_25.tahun', $ta);
        $this->db->order_by('tbl_bln.id_bln', 'asc');

        $query = $this->db->get('tbl_bln');
        return $query;
    }


   
    public function grafik_pd( $unit, $ta)
    {
        $this->db->select('*');

        $this->db->join('tbl_pendapatan', 'tbl_bln.id_bln = tbl_pendapatan.id_bln', 'inner');
        $this->db->where('tbl_pendapatan.id_unit', $unit);
        $this->db->where('tbl_pendapatan.tahun', $ta);
        $this->db->order_by('tbl_bln.id_bln', 'asc');

        $query = $this->db->get('tbl_bln');
        return $query;
    }

    function sinkron($data2, $id_unit)
    {
        $this->db->where('id_unit', $id_unit);
        $result = $this->db->update('tbl_unit', $data2);
        return $result;
    }

   
}
