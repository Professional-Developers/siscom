<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sucursal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        $this->load->model('empresa_model', 'ObjEmpresa');
        $this->load->model('sucursal_model', 'ObjSucursal');
        $this->load->model('diccionario_model', 'ObjDiccionario'); //multitabla
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
        $data['modulo'] = 'Sucursal';
        $datos[] = $this->cargaInformacionEmpresa();
        $this->load->view('layout/header', $datos[0]);
        $data['tipo_stand'] =
                $this->cboDiccionarioGet(
                array('L-DD-Combo', '51'), array('ID' => 'nTipoSucursal', 'NAME' => 'nTipoSucursal', 'VALUE' => '52', 'EXTRA' => '')
        );

        $this->load->view('sucursal/panel_view', $data);
        $this->load->view('layout/footer');
    }

    public function qryEmpresa() {
        $data['informacion'] = $this->ObjEmpresa->qryEmpresa();
        $this->load->view("empresa/qry_view", $data);
    }

    function cboDiccionarioGet($Parametros, $Config) {
        $datos = $this->ObjDiccionario->cboDiccionarioGet($Parametros, $Config);
        return $datos;
    }
    
    
    function registrarSucursalIns(){
        //print_r($_POST);  
        $this->ObjSucursal->setCSurNombre($this->input->post('txt_cSurNombre'));
        $this->ObjSucursal->setCSurDescripcion($this->input->post('txt_cSurDescripcion'));
        $this->ObjSucursal->setCSurUbigeo($this->input->post('txt_cSurUbigeo'));
        $this->ObjSucursal->setCSurReferencia($this->input->post('txt_cSurReferencia'));
        $this->ObjSucursal->setCSurLinea1($this->input->post('txt_cSurLinea1'));
        $this->ObjSucursal->setCSurLinea2($this->input->post('txt_cSurLinea2'));
        $this->ObjSucursal->setNTipoSucursal($this->input->post('nTipoSucursal'));
        $this->ObjSucursal->setCSurTelefonos($this->input->post('txt_cSurTelefonos'));
        $this->ObjSucursal->setNEmpId($this->input->post('txt_nEmpId'));

        $rs = $this->ObjSucursal->registrarSucursalIns();
        if ($rs) {
            echo 1;
        } else {
            echo 0;
        }
    }
    
    public function qrySucursal() {
        $data['informacion'] = $this->ObjSucursal->qrySucursal();
        $this->load->view("sucursal/qry_view", $data);
    }
    public function qrySucursalDel() {
        $data['informacion'] = $this->ObjSucursal->qrySucursalDel();
        $this->load->view("sucursal/qry_view_del", $data);
    }
    public function eliminarSucursal(){
        $ncodigo = $this->input->post('ncodigo');
        $datos = $this->ObjSucursal->eliminarSucursal($ncodigo);
        if ($datos) {
            echo "1";
        } else {
            echo "error";
        }
    }
    public function panel_updSucursal(){ 
        $algo= json_decode($_POST["json"]);
        $id = $algo->nSurId;
        $data["informacion"] = $this->ObjSucursal->getDatos($id);
        $data['tipo_stand'] =
                $this->cboDiccionarioGet(
                array('L-DD-Combo', '51'), array('ID' => 'nTipoSucursal', 'NAME' => 'nTipoSucursal', 'VALUE' => $data["informacion"][0]['nTipoSucursal'], 'EXTRA' => '')
        );
        //print_r($data);exit;
        $this->load->view("sucursal/upd_view",$data);
    }
    
    //updSucursal
    public function updSucursal(){
        $this->ObjSucursal->setCSurNombre($this->input->post('upd_txt_cSurNombre'));
        $this->ObjSucursal->setCSurDescripcion($this->input->post('txt_cSurDescripcion'));
        $this->ObjSucursal->setCSurUbigeo($this->input->post('txt_cSurUbigeo'));
        $this->ObjSucursal->setCSurReferencia($this->input->post('txt_cSurReferencia'));
        $this->ObjSucursal->setCSurTelefonos($this->input->post('txt_cSurTelefonos'));
        $this->ObjSucursal->setCSurLinea1($this->input->post('txt_cSurLinea1'));
        $this->ObjSucursal->setCSurLinea2($this->input->post('txt_cSurLinea2'));
        $this->ObjSucursal->setNTipoSucursal($this->input->post('nTipoSucursal'));
        $this->ObjSucursal->setNEmpId($this->input->post('txt_nEmpId'));
        $this->ObjSucursal->setNSurId($this->input->post('hdnidSuc_upd'));
        //$resultado = $this->club_model->updClub($hdnidClub);
        $resultado = $this->ObjSucursal->updSucursal();
        if ($resultado) {
            echo 1;
        } else {
            echo 0;
        }
    }
    

}

/* End of file persona.php */
/* Location: ./application/controllers/persona.php */
?>