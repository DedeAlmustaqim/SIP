<?php
class M_dak_admin extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function json_dak_fisik()
    {
        $ta = $this->session->userdata('ta');
        $this->datatables->select('*');
        $this->datatables->select('tbl_unit.urut as urut_unit');


        $this->datatables->join('tbl_unit', 'tbl_dak_fisik.id_unit = tbl_unit.id_unit', 'left');
        $this->datatables->where('tbl_dak_fisik.tahun', $ta);
        $this->db->group_by('tbl_dak_fisik.keg');
        $this->datatables->from('tbl_dak_fisik');

        return $this->datatables->generate();
    }

    public function json_dak_non_fisik()
    {
        $ta = $this->session->userdata('ta');
        $this->datatables->select('*');
        $this->datatables->select('tbl_unit.urut as urut_unit');


        $this->datatables->join('tbl_unit', 'tbl_dak_non_fisik.id_unit = tbl_unit.id_unit', 'left');
        $this->datatables->where('tbl_dak_non_fisik.tahun', $ta);
        $this->db->group_by('tbl_dak_non_fisik.keg');
        $this->datatables->from('tbl_dak_non_fisik');

        return $this->datatables->generate();
    }

    public function get_dak_fisik_by_id($id)
    {
        $ta = $this->session->userdata('ta');
        $this->db->select('*');

        $this->db->where('id_dak_fisik', $id);
        $this->datatables->from('tbl_dak_fisik');
        return $this->db->get('tbl_dak_fisik')->row();
    }
    function update_tbl_dak_fisik($data, $keg)
    {
        
        $this->db->where('keg', $keg);
        $result = $this->db->update('tbl_dak_fisik', $data);
        return $result;
    }

    public function get_dak_fisik($bln)
    {
        $ta = $this->session->userdata('ta');
        $this->datatables->select('
        tbl_bln.nm_bln, 
	    tbl_bln.id_bln, 
	    tbl_bln.kunci_pagu, 
	tbl_bln.aktif, 
	tbl_dak_fisik.id_dak_fisik, 
	tbl_dak_fisik.id_bln, 
	tbl_dak_fisik.id_unit, 
	tbl_dak_fisik.tahun, 
	tbl_dak_fisik.urut, 
	tbl_dak_fisik.keg, 
	tbl_dak_fisik.per_vol, 
	tbl_dak_fisik.per_satuan, 
	tbl_dak_fisik.per_jlm_penerima, 
	tbl_dak_fisik.pagu, 
	tbl_dak_fisik.jns_mekanisme, 
	tbl_dak_fisik.mek_vol_swa, 
	tbl_dak_fisik.mek_nilai_swa,
    tbl_dak_fisik.mek_vol_kon, 
	tbl_dak_fisik.mek_nilai_kon, 
	tbl_dak_fisik.mek_metode, 
	tbl_dak_fisik.real_keu, 
	tbl_dak_fisik.real_keu_per, 
	tbl_dak_fisik.real_fik, 
	tbl_dak_fisik.kodefikasi, 
	tbl_dak_fisik.status_dak_fisik, 
	tbl_unit.nm_unit
        ');

        $this->datatables->select('DATE_FORMAT(tgl_awal, "%d-%m -%Y") as tgl1');
        $this->datatables->select('DATE_FORMAT(tgl_akhir, "%d-%m -%Y") as tgl2');
        $this->datatables->select('case when tgl_awal < CURRENT_TIMESTAMP() AND CURRENT_TIMESTAMP()  < tgl_akhir then "1" else "0"
        end as kunci_bln');

        $this->datatables->join('tbl_dak_fisik', 'tbl_bln.id_bln = tbl_dak_fisik.id_bln', 'left');
        $this->datatables->join('tbl_unit', 'tbl_dak_fisik.id_unit = tbl_unit.id_unit', 'left');
        $this->datatables->where('tbl_dak_fisik.id_bln', $bln);
        $this->datatables->where('tbl_dak_fisik.tahun', $ta);
        $this->db->order_by('tbl_bln.id_bln', 'asc');
        $this->datatables->from('tbl_bln');
        return $this->db->get('tbl_bln')->result();
    }

    public function get_dak_non_fisik($bln)
    {
        $ta = $this->session->userdata('ta');
        $this->datatables->select('tbl_bln.nm_bln, 
	    tbl_bln.id_bln, 
	    tbl_bln.kunci_pagu, 
	tbl_bln.aktif, 
	tbl_dak_non_fisik.id_non_fisik, 
	tbl_dak_non_fisik.id_bln, 
	tbl_dak_non_fisik.id_unit, 
	tbl_dak_non_fisik.tahun, 
	tbl_dak_non_fisik.urut, 
	tbl_dak_non_fisik.keg, 
	tbl_dak_non_fisik.per_vol, 
	tbl_dak_non_fisik.per_satuan, 
	tbl_dak_non_fisik.per_jlm_penerima, 
	tbl_dak_non_fisik.pagu, 
	tbl_dak_non_fisik.jns_mekanisme, 
	tbl_dak_non_fisik.mek_vol_swa, 
	tbl_dak_non_fisik.mek_nilai_swa,
    tbl_dak_non_fisik.mek_vol_kon, 
	tbl_dak_non_fisik.mek_nilai_kon, 
	tbl_dak_non_fisik.mek_metode, 
	tbl_dak_non_fisik.real_keu, 
	tbl_dak_non_fisik.real_keu_per, 
	tbl_dak_non_fisik.real_fik, 
	tbl_dak_non_fisik.kodefikasi, 
	tbl_dak_non_fisik.status_dak_non_fisik, 
	tbl_unit.nm_unit,
    case when tgl_awal < CURRENT_TIMESTAMP() AND CURRENT_TIMESTAMP()  < tgl_akhir then "1" else "0"
        end as kunci_bln');

        $this->datatables->join('tbl_dak_non_fisik', 'tbl_bln.id_bln = tbl_dak_non_fisik.id_bln', 'left');
        $this->datatables->join('tbl_unit', 'tbl_dak_non_fisik.id_unit = tbl_unit.id_unit', 'left');
        $this->datatables->where('tbl_dak_non_fisik.id_bln', $bln);
        $this->datatables->where('tbl_dak_non_fisik.tahun', $ta);
        $this->db->order_by('tbl_bln.id_bln', 'asc');
        $this->datatables->from('tbl_bln');
        return $this->db->get('tbl_bln')->result();
    }

    public function cetak_dak_fisik ($id_bln)
    {
        $ta = $this->session->userdata('ta');
        $this->db->select('*');

        $this->db->where('id_bln', $id_bln);
        $this->db->where('tahun', $ta);

        return $this->db->get('tbl_dak_fisik')->result();
    }

    public function cetak_dak_non_fisik ($id_bln)
    {
        $ta = $this->session->userdata('ta');
        $this->db->select('*');

        $this->db->where('id_bln', $id_bln);
        $this->db->where('tahun', $ta);

        return $this->db->get('tbl_dak_non_fisik')->result();
    }
}
