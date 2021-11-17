<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas_mod extends CI_Model
{
    public function getAkun($email)
    {
        $this->db->select('*');
        $this->db->from('petugas');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function pengguna($email)
    {
        $this->db->select('*');
        $this->db->from('petugas');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->row_array();
    }

    //================== Datatables Surat
    var $column_order_surat = array('no_lp', 'keterangan', 'nama_berkas', null); //set column field database for datatable orderable
    var $column_search_surat = array('nama', 'no_lp', 'nama_berkas', 'tanggal'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order_surat = ['tanggal' => 'desc']; // default o
    private function _get_datatableSurat()
    {

        $this->db->select('s.id_surat, no_lp, p.nama pengguna, tanggal, keterangan, nama_berkas ,s.id_petugas, tgl_proses, proses');
        $this->db->from('surat s');
        $this->db->join('pelapor p', 's.id_pelapor = p.id_pelapor');
        $this->db->join('aktivitas_surat aks', 'aks.id_surat = s.id_surat');
        $this->db->join('berkas b', 'b.id_berkas = s.id_berkas');
        $this->db->join('proses pr', 'pr.id_proses = aks.id_proses');
        $this->db->where('s.id_petugas IS NULL', null, false);

        $i = 0;

        foreach ($this->column_search_surat as $item) // loop column
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search_surat) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_surat[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_surat)) {
            $order_surat = $this->order_surat;
            $this->db->order_by(key($order_surat), $order_surat[key($order_surat)]);
        }
    }

    function get_datatableSurat()
    {
        $this->_get_datatableSurat();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filteredSurat()
    {
        $this->_get_datatableSurat();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_allSurat()
    {
        $this->db->from($this->_get_datatableSurat());

        return $this->db->count_all_results();
    }
    // ============================================================

    //================== Datatables Balasan
    var $column_order_balas = array('no_lp', 'keterangan', 'nama_berkas', null); //set column field database for datatable orderable
    var $column_search_balas = array('nama', 'no_lp', 'nama_berkas', 'tanggal'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order_balas = ['tanggal' => 'desc']; // default o
    private function _get_datatableBalas($id)
    {

        $this->db->select('s.id_surat, no_lp, p.nama pengguna, tanggal, keterangan, nama_berkas ,s.id_petugas, tgl_proses, proses');
        $this->db->from('surat s');
        $this->db->join('pelapor p', 's.id_pelapor = p.id_pelapor');
        $this->db->join('aktivitas_surat aks', 'aks.id_surat = s.id_surat');
        $this->db->join('berkas b', 'b.id_berkas = s.id_berkas');
        $this->db->join('proses pr', 'pr.id_proses = aks.id_proses');
        $this->db->where('s.id_petugas', $id['id_petugas']);

        $i = 0;

        foreach ($this->column_search_balas as $item) // loop column
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search_balas) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_balas[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_balas)) {
            $order_balas = $this->order_balas;
            $this->db->order_by(key($order_balas), $order_balas[key($order_balas)]);
        }
    }

    function get_datatableBalas($id)
    {
        $this->_get_datatableBalas($id);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filteredBalas($id)
    {
        $this->_get_datatableBalas($id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_allBalas($id)
    {
        $this->db->from($this->_get_datatableBalas($id));

        return $this->db->count_all_results();
    }
    // ============================================================

    function getData_byid($id)
    {
        $this->db->select('s.id_surat idsurat, no_lp, p.nama, DATE_FORMAT(tanggal,"%d/%m/%Y") tglkirim, keterangan, ket, b.nama_berkas nberkas, ps.id_proses idps,proses, DATE_FORMAT(tgl_proses,"%d/%m/%Y") tgl_proses, s.id_petugas, pt.nama namapetugas');
        $this->db->from('surat s');
        $this->db->join('pelapor p', 'p.id_pelapor = s.id_pelapor');
        $this->db->join('berkas b', 'b.id_berkas = s.id_berkas');
        $this->db->join('aktivitas_surat a', 'a.id_surat = s.id_surat');
        $this->db->join('proses ps', 'ps.id_proses = a.`id_proses`');
        $this->db->join('petugas pt', 'pt.id_petugas = s.`id_petugas`', 'left');
        $this->db->where('s.id_surat', $id);

        $query = $this->db->get();
        return $query->row_array();
    }
}