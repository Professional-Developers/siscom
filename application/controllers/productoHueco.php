<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProductoHueco extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('empresa_model', 'ObjEmpresa');
        $this->load->model('sucursal_model', 'ObjSucursal');
        $this->load->model('almacen_model', 'ObjAlmacen');
        $this->load->model('hueco_model', 'ObjHueco');
        $this->load->model('producto_model', 'ObjProducto');
        $this->load->model('productohueco_model', 'ObjProductoHueco');
        $this->load->model('diccionario_model', 'ObjDiccionario'); //multitabla
        $this->load->model('caracteristicas_model', 'ObjCaracteristicas'); //multitabla
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

    /*public function index() {
        $this->loaders->verificaacceso();
        $data['modulo'] = 'Producto';
        $datos[] = $this->cargaInformacionEmpresa();
        $this->load->view('layout/header', $datos[0]);
        $data['sucursal'] = $this->ObjSucursal->qrySucursalActivas();
        //print_r($data['sucursal']);exit;
        $this->load->view('producto/panel_view', $data);
        $this->load->view('layout/footer');
    }

    function cboDiccionarioGet($Parametros, $Config) {
        $datos = $this->ObjDiccionario->cboDiccionarioGet($Parametros, $Config);
        return $datos;
    }*/
    
    
    function productoHuecoIns(){
        //print_r($_POST);  
        $this->ObjProductoHueco->setNCantidad($this->input->post('txt_nCantidad'));        
        $this->ObjProductoHueco->setIdHueco($this->input->post('radHueco'));
        $this->ObjProductoHueco->setNProId($this->input->post('hdn_idProd'));
        $rs = $this->ObjProductoHueco->productoHuecoIns();
        //$rs = $this->ObjProductoDet->detalleProductoIns();
        if($this->ObjProductoHueco->getNProductoHueco()=='1'){
            echo "1";
        }else if($this->ObjProductoHueco->getNProductoHueco()=='2'){
            echo "2";
        }else{
            echo "-1";
        }
    }
    
    public function qryProductoHueco() {
        $idProducto= $this->input->post("hdn_idProd");
        $data['informacion'] = $this->ObjProductoHueco->qryProductoHueco($idProducto);
        $this->load->view("productoHueco/qry_view", $data);
    }
    
    
}

?>