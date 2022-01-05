<?php
class ModelJam extends CI_Model
{
    public function get_jam(){
        $query = $this->db->get('jam');
        return $query->result();
    }

    public function get_jam_byid($kode_barang){
        $this->db->where('kode_barang', $kode_barang);
        $query = $this->db->get('jam');
        return $query->row();
    }

    public function post_jam($data){
        return $this->db->insert('jam', $data);
    }

    public function put_jam($kode_barang, $data){
        $this->db->where('kode_barang', $kode_barang);
        return $this->db->update('jam', $data);
    }

    public function del_jam($kode_jam){
        return $this->db->delete('jam', ['kode_barang'=>$kode_barang]);
    }
}

?>