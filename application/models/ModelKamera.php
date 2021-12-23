<?php
class ModelKamera extends CI_Model
{
    public function get_kamera(){
        $query = $this->db->get('kamera');
        return $query->result();
    }

    public function get_kamera_byid($kode_barang){
        $this->db->where('kode_barang', $kode_barang);
        $query = $this->db->get('kamera');
        return $query->row();
    }

    public function post_kamera($data){
        return $this->db->insert('kamera', $data);
    }

    public function put_kamera($kode_barang, $data){
        $this->db->where('kode_barang', $kode_barang);
        return $this->db->update('kamera', $data);
    }

    public function del_kamera($kode_kamera){
        return $this->db->delete('kamera', ['kode_barang'=>$kode_bsarang]);
    }
}

?>