<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH. "libraries/Format.php";
require APPPATH. "libraries/RestController.php";
use chriskacerguis\RestServer\RestController;

class GetJam extends RestController{
    public function __construct(){
        parent::__construct();
        $this->load-> model ('ModelJam');
    }

    public function index_get(){
        $jm1 = new ModelJam;
        $resultjm1= $jm1->get_jam();
        $this->response($resultjm1,200);
    }

    public function JamById_get($kode_barang){ 
        $jm1 = new ModelJam;
        $resultjm1= $jm1->get_Jam_byid($kode_barang);
        $this->response($resultjm1,200);
    }

    public function AddJam_post(){
        $jm1 = new ModelJam;
        $data=[
            'kode_barang'=> $this->input->post('kode_barang'),
            'merk' => $this->input->post('merk'),
            'harga'=> $this->input->post('harga'),
            'sewa' => $this->input->post('sewa'),
        ];
        $addjm1= $jm1->post_jam($data);
        if($addjm1 > 0){
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'insert berhasil',
                ], RestController::HTTP_OK
            );
        }
        else{
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'insert gagal'
                ], RestController::HTTP_BAD_REQUEST
            );
        }
    }

    public function UpdateJam_put($kode_barang){
        $jm1= new ModelJam;
        $data=[
            'merk' => $this->put('merk'),
            'harga' => $this->put('harga'),
            'sewa' => $this->put('sewa'),
            
        ];
        $putjm1= $jm1->put_jam($kode_barang, $data);
        if($putjm1 > 0){
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'update berhasil',
                ], RestController::HTTP_OK
            );
        }
        else{
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'update gagal'
                ], RestController::HTTP_BAD_REQUEST
            );

        }
    }
    public function DeleteJam_delete($kode_barang){
        $jm1= new ModelJam;
        $deljm1= $jm1->del_jam($kode_barang);
        if($deljm1 > 0){
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'delete berhasil',
                ], RestController::HTTP_OK
            );
        }
        else{
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'delete gagal'
                ], RestController::HTTP_BAD_REQUEST
            );

        }
    }
}
?>