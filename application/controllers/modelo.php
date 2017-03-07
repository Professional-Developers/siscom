<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//require_once APPPATH.'controllers/controlador_padre.php';
//require_once APPPATH.'controllers/principal.php';
//class Empresa extends Principal {
class Modelo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        $this->load->model('empresa_model', 'ObjEmpresa');
        $this->load->model('modelo_model', 'ObjModelo');
    }

    public function cargaInformacionEmpresa() {
        $data['informacion'] = $this->ObjEmpresa->qryEmpresa();
        $datos['nombreEmpresa'] = $data['informacion'][0]['cEmpNombre'];
        $datos['logoEmpresa'] = $data['informacion'][0]['cEmpLogoGrande'];
        if ($datos['nombreEmpresa'] == "")
            $datos['nombreEmpresa'] = "empresa";
        if ($datos['logoEmpresa'] == "")
            $datos['logoEmpresa'] = "sinEmpresa.jpg";
        return $datos;
    }

    public function index() {
        $this->loaders->verificaacceso();
        $data['modulo'] = 'Modelo';
        $datos[] = $this->cargaInformacionEmpresa();
        $this->load->view('layout/header', $datos[0]);
        //$data['sucursal'] = $this->ObjSucursal->qrySucursalActivas();

        $this->load->view('modelo/panel_view', $data);
        $this->load->view('layout/footer');
    }

    public function qryModelo() {
        $data['informacion'] = $this->ObjModelo->qryModelo();
        $this->load->view("modelo/qry_view", $data);
    }
    /*llena combos para ins hueco y upd hueco*/
    
    
    function cboDiccionarioGet($Parametros, $Config) {
        $datos = $this->ObjDiccionario->cboDiccionarioGet($Parametros, $Config);
        return $datos;
    }

    function registrarModeloIns() {
        $this->ObjModelo->setNModCodigo($this->input->post('txt_nModCodigo'));
        $this->ObjModelo->setCModDescripcion($this->input->post('txt_cModDescripcion'));
        $rs = $this->ObjModelo->registrarModeloIns();
        /*if ($rs) {
            echo 1;
        } else {
            echo 0;
        }*/
        if($this->ObjModelo->getNModeloId()=='1'){
            echo "1";
        }else if($this->ObjModelo->getNModeloId()=='2'){
            echo "2";
        }else{
            echo "-1";
        }
    }
    
    public function eliminarModelo(){
        $ncodigo = $this->input->post('ncodigo');
        $datos = $this->ObjModelo->eliminarModelo($ncodigo);
        if ($datos) {
            echo "1";
        } else {
            echo "error";
        }
    }

    public function panel_updModelo(){ 
        $algo= json_decode($_POST["json"]);
        $id = $algo->nModeloId;
        $data["informacion"] = $this->ObjModelo->getDatos($id);
        //$data['modelo'] = $this->ObjSucursal->qrySucursalActivas();
        //print_r($data);exit;
        $this->load->view("modelo/upd_view",$data);
    }
    
    public function updModelo(){
        $this->ObjModelo->setNModeloId($this->input->post('hdnidModelo_upd'));
        $this->ObjModelo->setNModCodigo($this->input->post('txt_upd_nModCodigo'));
        $this->ObjModelo->setCModDescripcion($this->input->post('txt_upd_cModDescripcion'));
        
        //$resultado = $this->ObjAlmacen->updAlmacen();
        $rs = $this->ObjModelo->updModelo();

        if($this->ObjModelo->getNModeloId()=='1'){
            echo "1";
        }else if($this->ObjModelo->getNModeloId()=='2'){
            echo "2";
        }else{
            echo "-1";
        }
    }

}

/* End of file persona.php */
/* Location: ./application/controllers/persona.php */
?>