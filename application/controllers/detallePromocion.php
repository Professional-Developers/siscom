<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detallepromocion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('empresa_model', 'ObjEmpresa');
        $this->load->model('promociondetalle_model', 'ObjPromDet');
        /*$this->load->model('sucursal_model', 'ObjSucursal');
        $this->load->model('almacen_model', 'ObjAlmacen');
        $this->load->model('hueco_model', 'ObjHueco');
        $this->load->model('producto_model', 'ObjProducto');
        $this->load->model('productodetalle_model', 'ObjProductoDet');
        $this->load->model('diccionario_model', 'ObjDiccionario'); //multitabla
        $this->load->model('caracteristicas_model', 'ObjCaracteristicas'); //multitabla*/
        
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
    }*/

    function cboDiccionarioGet($Parametros, $Config) {
        $datos = $this->ObjDiccionario->cboDiccionarioGet($Parametros, $Config);
        return $datos;
    }
    
    
    /*function detallePromocionIns(){
        foreach ($_POST as $key => $value) {
            if (empty($value)) {
                echo "r";
                exit;
            }
        }
        extract($_POST);
        $this->ObjPromDet->setNProductoId($cbo_nProdId);        
        $this->ObjPromDet->setNPromDetCantidad($txt_nPromDetCantidad);        
        $this->ObjPromDet->setNPromDetDescuentoUnidad($txt_nPromDetDescuentoUnidad);        
        $this->ObjPromDet->setNPromDetDescuentoTotal("");        
        $this->ObjPromDet->setNPromId($hdn_idProm);        
        $this->ObjPromDet->setNPromDetEstado(1);        
        
        $rs = $this->ObjPromDet->detallePromocionIns();
        if($this->ObjPromDet->getNPromDetalleId()=='1'){
            echo "1";
        }else if($this->ObjPromDet->getNPromDetalleId()=='2'){
            echo "2";
        }else{
            echo "-1";
        }
    }*/
    
    function promocionProductoIns(){
        //print_r($_POST);
        foreach ($_POST as $key => $value) {
            if (empty($value)) {
                echo "r";
                exit;
            }
        }
        extract($_POST);
        $this->ObjPromDet->setNPromId($cbo_ins_nPromId);        
        $this->ObjPromDet->setNProductoId($hdn_idProd);        
        $this->ObjPromDet->setNPromDetEstado(1);        
        
        $rs = $this->ObjPromDet->promocionProductoIns();
        if($this->ObjPromDet->getNPromDetalleId()=='1'){
            echo "1";
        }else if($this->ObjPromDet->getNPromDetalleId()=='2'){
            echo "2";
        }else if($this->ObjPromDet->getNPromDetalleId()=='3'){
            echo "3";
        }else{
            echo "-1";
        }
    }
    function promocionProductoDel(){
        //print_r($_POST);
        foreach ($_POST as $key => $value) {
            if (empty($value)) {
                echo "r";
                exit;
            }
        }
        extract($_POST);
        /*$this->ObjPromDet->setNPromId($cbo_ins_nPromId);        
        $this->ObjPromDet->setNProductoId($hdn_idProd);        
         */
        $this->ObjPromDet->setNPromDetalleId($ncodigo);        
        //$rs = $this->ObjPromDet->promocionProductoIns();
        $rs = $this->ObjPromDet->promocionProductoDel();
        if($this->ObjPromDet->getNPromDetalleId()=='1'){
            echo "1";
        }else{
            echo "-1";
        }
        /*if($this->ObjPromDet->getNPromDetalleId()=='1'){
            echo "1";
        }else if($this->ObjPromDet->getNPromDetalleId()=='2'){
            echo "2";
        }else if($this->ObjPromDet->getNPromDetalleId()=='3'){
            echo "3";
        }else{
            echo "-1";
        }*/
    }
    
    
    
    public function qryProductoPromocion() {
        $idprodHueco = $this->input->post("idprod");
        $data['informacion'] = $this->ObjPromDet->qryProductoPromocion($idprodHueco);
        $this->load->view("producto/producto_promocion/qry_view", $data);
    }
    
    
    
    /*
    public function qryPromDetalle(){
        $idProm = $this->input->post("idprom");
        $data['informacion'] = $this->ObjPromDet->qryPromDetalle($idProm);
        $this->load->view("promocion/promocion_detalle/qry_view", $data);
    }*/
    
    
    /*public function qryProductoDetalle() {
        $idProducto = $this->input->post("idprod");
        $data['informacion'] = $this->ObjProductoDet->qryProductoDetalle($idProducto);
        $this->load->view("producto/producto_detalle/qry_view", $data);
    }*/
    
    
}

?>