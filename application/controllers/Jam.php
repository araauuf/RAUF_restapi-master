<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jam extends CI_Controller 
{
    function __construct(){
        parent::__construct();
        $this->api="http://localhost/RAUF_restapi-master/api/jam/";
        $this->load->library('Curl.php');
        $this->load->helper('url');
        $this->load->helper('form');
    }

    function index(){
        $data['jam']=json_decode($this->curl->simple_get($this->api),true);
        $this->load->view('listjam',$data);
    }

    function create(){
        if(isset($_POST['submit'])){
            $data=array(
                'kode_barang' =>$this->input->post('kode_barang'),
                'merk' =>$this->input->post('merk'),
                'harga' =>$this->input->post('harga'),
                'sewa' =>$this->input->post('sewa'),
            );
            $insert=$this->curl->simple_post($this->api. '/add',$data,array(CURLOPT_BUFFERSIZE=>10));
            redirect('jam');
        }
        else{
            $this->load->view('createJam'); 

        }
    }

    function edit(){
        if(isset($_POST['submit'])){
            $jm1=$this->input->post('kode_barang');
            $data=array(
                'merk' =>$this->input->post('merk'),
                'harga' =>$this->input->post('harga'),
                'sewa' =>$this->input->post('sewa'),
            );
            $update=$this->curl->simple_put($this->api.'/update/'.$kode_barng,$data,array(CURLOPT_BUFFERSIZE=>10));
            redirect('jam');
        }
        else{
            $kode_barang=$this->uri->segment(3);
            $data['jam']=json_decode($this->curl->simple_get($this->api.'/kode_barang/'.$kode_barang),true);
            $this->load->view('editjam',$data);
        }
    }
   
    function delete($kode_barang){
        if(empty($kode_barang)){
            redirect('jam');
        }
        else{
            $kode_barang=$this->uri->segment(3);
            $data['jam']=json_decode($this->curl->simple_delete($this->api.'/delete/'.$kode_barang),true);
            redirect('jam');
        }
    }
    
}
