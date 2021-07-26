<?php
class M_master extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }

    public function tampil_unit()
    {
        $this->datatables->select('*');
        $this->datatables->from('tbl_unit');
        return $this->db->get('tbl_unit')->result();
    }

    public function btn_bln()
    {
        $this->datatables->select('*');
        $this->db->select('case when tgl_awal < CURDATE_TIMESTAMP() AND CURDATE_TIMESTAMP()  < tgl_akhir then "1" else "0"
        end as kunci_bln');
        $this->datatables->from('tbl_bln');
        return $this->db->get('tbl_bln')->result();
    }
    
    public function json_bln()
    {
        $this->datatables->select('*');
        $this->datatables->select('DATE_FORMAT(tgl_awal, "%Y-%m-%d") as tgl1');
        $this->datatables->select('DATE_FORMAT(tgl_akhir, "%Y-%m-%d") as tgl2');
        $this->datatables->select('DATE_FORMAT(tgl_awal, "%H:%i:%s") as wkt1');
        $this->datatables->select('DATE_FORMAT(tgl_akhir, "%H:%i:%s") as wkt2');
        $this->datatables->select('case when tgl_awal < CURRENT_TIMESTAMP() AND CURRENT_TIMESTAMP()  < tgl_akhir then "1" else "0"
        end as kunci_bln');
        $this->datatables->from('tbl_bln');
        return $this->datatables->generate();
    }

    function update_tbl_bln($data, $id)
    {
        $this->db->where('id_bln', $id);
        $result = $this->db->update('tbl_bln', $data);
        return $result;
    }

    public function json_unit()
    {
        $id_unit =  $this->session->userdata('ses_id_unit');
        $this->datatables->select('*');

        if ($this->session->userdata('akses') == 3) {
            $this->db->where('id_unit', $id_unit);
        }
        //$this->datatables->join('tbl_user', 'tbl_user.id_unit = tbl_unit.id_unit', 'left');
        $this->datatables->from('tbl_unit');
        return $this->datatables->generate();
    }

    public function json_user($id)
    {
        $this->datatables->select('*');

       
        $this->datatables->join('tbl_unit', 'tbl_unit.id_unit = tbl_user.id_unit', 'left');
        $this->datatables->where('tbl_user.id_unit',$id);
        $this->datatables->from('tbl_user');
        return $this->datatables->generate();
    }

    function get_unit($id)
    {
        $this->datatables->select('*');
        $this->datatables->where('id_unit', $id);
        $this->datatables->from('tbl_unit');
        return $this->db->get('tbl_unit')->row();
    }

    function get_pagu($id)
    {
        $this->datatables->select('*');
        $this->datatables->where('id_unit', $id);
        $this->datatables->from('tbl_pagu');
        return $this->db->get('tbl_pagu')->row();
    }

    function update_unit($data, $id_unit)
    {
        $this->db->where('id_unit', $id_unit);
        $result = $this->db->update('tbl_unit', $data);
        return $result;
    }

    function insert_skpd($data)
    {
        $result = $this->db->insert('tbl_unit', $data);
        return $result;
    }

    function insert_user($data)
    {
        $result = $this->db->insert('tbl_user', $data);
        return $result;
    }

    function update_pass($data, $id)
    {
        $this->db->where('id_unit', $id);
        $result = $this->db->update('tbl_user', $data);
        return $result;
    }

    public function insert_pass_log($data2, $id)
    {

        $this->db->where('id_unit', $id);
        $q = $this->db->get('tbl_pass_log');

        if ($q->num_rows() > 0) {
            $this->db->where('id_unit', $id);
            $this->db->update('tbl_pass_log', $data2);
        } else {
            $this->db->set('id_unit', $id);
            $this->db->insert('tbl_pass_log', $data2);
        }
    }

    function data_pemda()
    {
        $this->datatables->select('*');
        $this->datatables->from('tbl_pemda');
        return $this->db->get('tbl_pemda')->result();
    }

    
    public function json_status_data($id_bln)
    {
        $ta = $this->session->userdata('ta');
        $this->datatables->select('tbl_unit.nm_unit, 
        tbl_unit.sinkron, 
        tbl_unit.urut, 
        tbl_apbd.`status`, 
        tbl_ppbj_50.status_ppbj_50, 
        tbl_ppbj_200.status_ppbj_200, 
        tbl_ppbj_25.status_ppbj_25');


        $this->datatables->join('tbl_apbd', 'tbl_unit.id_unit = tbl_apbd.id_unit', 'inner');
        $this->datatables->join('tbl_ppbj_50', 'tbl_unit.id_unit = tbl_ppbj_50.id_unit', 'inner');
        $this->datatables->join('tbl_ppbj_200', 'tbl_unit.id_unit = tbl_ppbj_200.id_unit', 'inner');
        $this->datatables->join('tbl_ppbj_25', 'tbl_unit.id_unit = tbl_ppbj_25.id_unit', 'inner');

        $this->datatables->where('tbl_apbd.tahun', $ta);

        $this->datatables->where('tbl_apbd.id_bln', $id_bln);
        $this->datatables->where('tbl_ppbj_50.id_bln', $id_bln);
        $this->datatables->where('tbl_ppbj_200.id_bln', $id_bln);
        $this->datatables->where('tbl_ppbj_25.id_bln', $id_bln);
        $this->db->order_by('tbl_unit.urut','asc');

        $this->datatables->from('tbl_unit');

        return $this->datatables->generate();
    }


    public function cetak_status($id_bln)
    {


        $ta = $this->session->userdata('ta');
        $this->datatables->select('tbl_unit.nm_unit, 
        tbl_unit.sinkron, 
        tbl_unit.urut, 
        tbl_apbd.`status`, 
        tbl_ppbj_50.status_ppbj_50, 
        tbl_ppbj_200.status_ppbj_200, 
        tbl_pendapatan.status_pd, 
        tbl_ppbj_25.status_ppbj_25');


        $this->datatables->join('tbl_apbd', 'tbl_unit.id_unit = tbl_apbd.id_unit', 'inner');
        $this->datatables->join('tbl_ppbj_50', 'tbl_unit.id_unit = tbl_ppbj_50.id_unit', 'inner');
        $this->datatables->join('tbl_ppbj_200', 'tbl_unit.id_unit = tbl_ppbj_200.id_unit', 'inner');
        $this->datatables->join('tbl_ppbj_25', 'tbl_unit.id_unit = tbl_ppbj_25.id_unit', 'inner');
        $this->datatables->join('tbl_pendapatan', 'tbl_unit.id_unit = tbl_pendapatan.id_unit', 'inner');

        $this->datatables->where('tbl_apbd.tahun', $ta);

        $this->datatables->where('tbl_apbd.id_bln', $id_bln);
        $this->datatables->where('tbl_ppbj_50.id_bln', $id_bln);
        $this->datatables->where('tbl_ppbj_200.id_bln', $id_bln);
        $this->datatables->where('tbl_ppbj_25.id_bln', $id_bln);
        $this->datatables->where('tbl_pendapatan.id_bln', $id_bln);
        $this->db->order_by('tbl_unit.urut','asc');

        $this->datatables->from('tbl_unit');
        return $this->db->get('tbl_unit')->result();
    }

    public function cetak_sinkron()
    {
        $this->datatables->select('tbl_unit.nm_unit, 
        tbl_unit.nm_pimpinan, 
        tbl_unit.nip, 
        tbl_unit.id_unit, 
        tbl_user.username, 
        tbl_unit.sinkron, 
        tbl_unit.stts_p, 
        tbl_unit.urut');

      
        $this->datatables->join('tbl_user', 'tbl_user.id_unit = tbl_unit.id_unit', 'left');
        $this->datatables->from('tbl_unit');
        return $this->db->get('tbl_unit')->result();
    }

    public function pagu($data, $id_unit)
    {
        $id= $id_unit;
        $this->db->where('id_unit', $id);
        $q = $this->db->get('tbl_pagu');

        if ($q->num_rows() > 0) {
            $this->db->where('id_unit', $id);
            $this->db->update('tbl_pagu', $data);
        } else {
            $this->db->set('id_unit', $id);
            $this->db->insert('tbl_pagu', $data);
        }
    }

    public function tampil_bln()
    {
        $this->datatables->select('*');
        $this->datatables->from('tbl_bln');
        return $this->db->get('tbl_bln')->result();
    }
}
