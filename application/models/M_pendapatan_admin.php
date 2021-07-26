<?php
class M_pendapatan_admin extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }

   

    public function json_pd($id_bln)
    {
        $ta = $this->session->userdata('ta');
        $this->datatables->select('tbl_pendapatan.id_pd, 
        tbl_pendapatan.id_bln, 
        tbl_pendapatan.id_unit, 
        tbl_pendapatan.tahun, 
        tbl_pendapatan.pad_target, 
        tbl_pendapatan.pad_real, 
        tbl_pendapatan.pad_real_per, 
        tbl_pendapatan.tp_target, 
        tbl_pendapatan.tp_keu, 
        tbl_pendapatan.tp_per, 
        tbl_pendapatan.tad_target, 
        tbl_pendapatan.tad_keu, 
        tbl_pendapatan.tad_per, 
        tbl_pendapatan.pad_sah_target, 
        tbl_pendapatan.pad_sah_keu, 
        tbl_pendapatan.pad_sah_per, 
        tbl_pendapatan.target_total, 
        tbl_pendapatan.keu_total, 
        tbl_pendapatan.keu_per_total, 
        tbl_pendapatan.status_pd, 
        tbl_bln.id_bln, 
        tbl_bln.nm_bln, 
        tbl_bln.tgl_awal, 
        tbl_bln.tgl_akhir, 
        tbl_unit.id_unit, 
        tbl_unit.nm_pimpinan, 
        tbl_unit.nm_unit, 
        tbl_unit.nip, 
        tbl_unit.urut, 
        tbl_unit.created_at, 
        tbl_unit.updated_at');

        $this->datatables->select('DATE_FORMAT(tgl_awal, "%d-%m -%Y") as tgl1');
        $this->datatables->select('DATE_FORMAT(tgl_akhir, "%d-%m -%Y") as tgl2');
        $this->datatables->select('case when tgl_awal < CURDATE() AND CURDATE()  < tgl_akhir then "1" else "0"
        end as kunci_bln');
        $this->datatables->join('tbl_pendapatan', 'tbl_bln.id_bln = tbl_pendapatan.id_bln', 'left');
        $this->datatables->join('tbl_unit', 'tbl_pendapatan.id_unit = tbl_unit.id_unit', 'left');
        $this->datatables->where('tbl_pendapatan.id_bln', $id_bln);
        $this->datatables->where('tbl_pendapatan.tahun', $ta);
        $this->db->order_by('tbl_unit.urut', 'asc');

        $this->datatables->from('tbl_bln');

        return $this->datatables->generate();
    }


    public function json_get_pd($bln, $unit)
    {
        $this->datatables->select('tbl_pendapatan.id_pd, 
        tbl_pendapatan.id_bln, 
        tbl_pendapatan.id_unit, 
        tbl_pendapatan.tahun, 
        tbl_pendapatan.pad_target, 
        tbl_pendapatan.pad_real, 
        tbl_pendapatan.pad_real_per, 
        tbl_pendapatan.tp_target, 
        tbl_pendapatan.tp_keu, 
        tbl_pendapatan.tp_per, 
        tbl_pendapatan.tad_target, 
        tbl_pendapatan.tad_keu, 
        tbl_pendapatan.tad_per, 
        tbl_pendapatan.pad_sah_target, 
        tbl_pendapatan.pad_sah_keu, 
        tbl_pendapatan.pad_sah_per, 
        tbl_pendapatan.target_total, 
        tbl_pendapatan.keu_total, 
        tbl_pendapatan.keu_per_total, 
        tbl_pendapatan.status_pd,
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
        $this->datatables->join('tbl_pendapatan', 'tbl_bln.id_bln = tbl_pendapatan.id_bln', 'left');
        $this->datatables->join('tbl_unit', 'tbl_pendapatan.id_unit = tbl_unit.id_unit', 'left');
        $this->datatables->where('tbl_pendapatan.id_bln', $bln);
        $this->datatables->where('tbl_pendapatan.id_unit', $unit);
        $this->db->order_by('tbl_bln.id_bln', 'asc');

        $this->datatables->from('tbl_bln');


        return $this->db->get('tbl_bln')->row();
    }

    function update_tbl_pd($data, $id_unit, $id_bln, $ta)
    {
        $this->db->where('id_bln', $id_bln);
        $this->db->where('id_unit', $id_unit);
        $this->db->where('tahun', $ta);
        $result = $this->db->update('tbl_pendapatan', $data);
        return $result;
    }

  


    public function cetak_pd($id_bln, $ta)
    {


        $this->datatables->select('tbl_pendapatan.id_pd, 
        tbl_pendapatan.id_bln, 
        tbl_pendapatan.id_unit, 
        tbl_pendapatan.tahun, 
        tbl_pendapatan.pad_target, 
        tbl_pendapatan.pad_real, 
        tbl_pendapatan.pad_real_per, 
        tbl_pendapatan.tp_target, 
        tbl_pendapatan.tp_keu, 
        tbl_pendapatan.tp_per, 
        tbl_pendapatan.tad_target, 
        tbl_pendapatan.tad_keu, 
        tbl_pendapatan.tad_per, 
        tbl_pendapatan.pad_sah_target, 
        tbl_pendapatan.pad_sah_keu, 
        tbl_pendapatan.pad_sah_per, 
        tbl_pendapatan.target_total, 
        tbl_pendapatan.keu_total, 
        tbl_pendapatan.keu_per_total, 
        tbl_pendapatan.status_pd, 
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
        $this->datatables->join('tbl_pendapatan', 'tbl_bln.id_bln = tbl_pendapatan.id_bln', 'left');
        $this->datatables->join('tbl_unit', 'tbl_pendapatan.id_unit = tbl_unit.id_unit', 'left');
        $this->datatables->where('tbl_pendapatan.id_bln', $id_bln);
        $this->db->where('tbl_pendapatan.tahun', $ta);

        $this->db->order_by('tbl_unit.urut', 'asc');
        return $this->db->get('tbl_bln')->result();
    }

    function get_unit($unit)
    {
        $this->datatables->select('*');
        $this->datatables->where('id_unit', $unit);
        $this->datatables->from('tbl_unit');
        return $this->db->get('tbl_unit')->row();
    }
}
