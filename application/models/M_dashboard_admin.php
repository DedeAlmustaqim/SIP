<?php
class M_dashboard_admin extends CI_Model
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

    public function grafik_apbd($ta)
    {
        $this->db->select('
        sum(pg_apbd) as pg_apbd,
        sum(real_apbd) as real_apbd,
        sum(real_apbd)/sum(pg_apbd)*100 as real_apbd_per,
        SUM(real_apbd_fisik*pg_apbd/100)/sum(pg_apbd)*100 as real_apbd_fisik,
        
        tbl_bln.nm_bln
        ');

        $this->db->join('tbl_apbd', 'tbl_bln.id_bln = tbl_apbd.id_bln', 'inner');
        $this->db->group_by('tbl_bln.id_bln', 'asc');
        $this->db->where('tbl_apbd.tahun', $ta);
        $query = $this->db->get('tbl_bln');
        return $query;
    }


    public function tabel_apbd($ta)
    {

        $this->db->select('
        sum(pg_apbd) as pg_apbd,
        sum(real_apbd) as real_apbd,
        sum(real_apbd)/sum(pg_apbd)*100 as real_apbd_per,
        SUM(real_apbd_fisik*pg_apbd/100)/sum(pg_apbd)*100 as real_apbd_fisik,
        
        tbl_bln.nm_bln
        ');

        $this->db->join('tbl_apbd', 'tbl_bln.id_bln = tbl_apbd.id_bln', 'inner');
        $this->db->group_by('tbl_bln.id_bln', 'asc');
        $this->db->where('tbl_apbd.tahun', $ta);
        $query = $this->db->get('tbl_bln');
        return $query;
    }

    public function grafik_pd($ta)
    {
        $this->db->select('
        sum(keu_total)/sum(target_total)*100 as keu_per_total,
        sum(target_total)as target_total,
        sum(keu_total)as keu_total,
        tbl_pendapatan.id_bln,
        tbl_bln.nm_bln
        ');

        $this->db->join('tbl_pendapatan', 'tbl_bln.id_bln = tbl_pendapatan.id_bln', 'inner');
        $this->db->group_by('tbl_bln.id_bln', 'asc');
        $this->db->where('tbl_pendapatan.tahun', $ta);
        $query = $this->db->get('tbl_bln');
        return $query;
    }

    public function grafik_ppbj_50($ta)
    {
        $this->db->select('
        sum(jml_pkt_50) as jml_pkt_50,
        sum(bp_pkt_50) as bp_pkt_50,
        sum(kontrak_pkt_50) as kontrak_pkt_50,
        tbl_bln.nm_bln
        ');
        $this->db->join('tbl_ppbj_50', 'tbl_bln.id_bln = tbl_ppbj_50.id_bln', 'inner');
        $this->db->where('tbl_ppbj_50.tahun', $ta);
        $this->db->group_by('tbl_bln.id_bln', 'asc');
        $query = $this->db->get('tbl_bln');
        return $query;
    }

    public function grafik_ppbj_200($ta)
    {
        $this->db->select('
        sum(jml_pkt_200) as jml_pkt_200,
        sum(bp_pkt_200) as bp_pkt_200,
        tbl_bln.nm_bln
        ');
        $this->db->join('tbl_ppbj_200', 'tbl_bln.id_bln = tbl_ppbj_200.id_bln', 'inner');
        $this->db->where('tbl_ppbj_200.tahun', $ta);
        $this->db->group_by('tbl_bln.id_bln', 'asc');
        $query = $this->db->get('tbl_bln');
        return $query;
    }

    public function grafik_ppbj_25($ta)
    {
        $this->db->select('
        sum(jml_pkt_25) as jml_pkt_25,
        sum(bp_pkt_25) as bp_pkt_25,
        tbl_bln.nm_bln
        ');
        $this->db->join('tbl_ppbj_25', 'tbl_bln.id_bln = tbl_ppbj_25.id_bln', 'inner');
        $this->db->where('tbl_ppbj_25.tahun', $ta);
        $this->db->group_by('tbl_bln.id_bln', 'asc');
        $query = $this->db->get('tbl_bln');
        return $query;
    }
}
