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
        $jm = new ModelJam;
        $resultjm= $jm->get_jam();
        $this->response($resultjm,200);
    }

    public function JamById_get($kode_barang){ 
        $jm = new ModelJam;
        $resultjm= $jm->get_Jam_byid($kode_barang);
        $this->response($resultjm,200);
    }

    public function AddJam_post(){
        $jm = new ModelJam;
        $data=[
            'kode_barang '=> $this->input->post('kode_barang'),
            'merek' => $this->input->post('merek'),
            'harga'=> $this->input->post('harga'),
            'sewa' => $this->input->post('sewa'),
        ];
        $addjm= $kmr->post_jam($data);
        if($addjm > 0){
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
        $jm= new ModelJam;
        $data=[
            'merek' => $this->put('merek'),
            'harga' => $this->put('harga'),
            'sewa' => $this->put('sewa'),
            
        ];
        $putjm= $jm->put_jam($kode_barang, $data);
        if($putjm > 0){
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
        $jm= new ModelJam;
        $deljm= $jm->del_jam($kode_barang);
        if($deljm > 0){
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