<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class DetalleProducto extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('empresa_model', 'ObjEmpresa');
        $this->load->model('sucursal_model', 'ObjSucursal');
        $this->load->model('almacen_model', 'ObjAlmacen');
        $this->load->model('hueco_model', 'ObjHueco');
        $this->load->model('producto_model', 'ObjProducto');
        $this->load->model('productodetalle_model', 'ObjProductoDet');
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

    /* public function index() {
      $this->loaders->verificaacceso();
      $data['modulo'] = 'Producto';
      $datos[] = $this->cargaInformacionEmpresa();
      $this->load->view('layout/header', $datos[0]);
      $data['sucursal'] = $this->ObjSucursal->qrySucursalActivas();
      //print_r($data['sucursal']);exit;
      $this->load->view('producto/panel_view', $data);
      $this->load->view('layout/footer');
      } */

    function cboDiccionarioGet($Parametros, $Config) {
        $datos = $this->ObjDiccionario->cboDiccionarioGet($Parametros, $Config);
        return $datos;
    }

    function detalleProductoIns() {
        //print_r($_POST);  
        $this->ObjProductoDet->setNProId($this->input->post('hdn_idProd')); /* es el nProductoHueco */
        //$this->ObjProductoDet->setNMulId($this->input->post('cbo_nMulIdPadre'));        
        $this->ObjProductoDet->setNMulId($this->input->post('cbo_nMulIdHijo'));

        $rs = $this->ObjProductoDet->detalleProductoIns();
        if ($this->ObjProductoDet->getNProdDetalleId() == '1') {
            echo "1";
        } else if ($this->ObjProductoDet->getNProdDetalleId() == '2') {
            echo "2";
        } else {
            echo "-1";
        }
        /* if ($rs) {
          echo 1;
          } else {
          echo 0;
          } */
    }

    public function qryProductoDetalle() {
        $idprodHueco = $this->input->post("idprod");
        $data['informacion'] = $this->ObjProductoDet->qryProductoDetalle($idprodHueco);
        $this->load->view("producto/producto_detalle/qry_view", $data);
    }

    public function getProductoDetalle() {
        $idprodHueco = $this->input->post("codProdHueco");
        $data['informacion'] = $this->ObjProductoDet->qryProductoDetalle($idprodHueco);
        //print_r($data['informacion']);exit;
        $caracteristica = '';
        if($data['informacion']) {
            foreach ($data['informacion'] as $det) {
                $caracteristica = $caracteristica . $det['tipoDetalle'] . ": " . $det['detalle'] . " >> ";
            }
            print_r($caracteristica);
        } else {
            echo "-";
        }
    }
    public function getProductoDetalleActivos() {
        $idprodHueco = $this->input->post("codProdHueco");
        $data['informacion'] = $this->ObjProductoDet->getProductoDetalleActivos($idprodHueco);
        //print_r($data['informacion']);exit;
        $caracteristica = '';
        if($data['informacion']) {
            foreach ($data['informacion'] as $det) {
                $caracteristica = $caracteristica . $det['tipoDetalle'] . ": " . $det['detalle'] . " >> ";
            }
            print_r($caracteristica);
        } else {
            echo "-";
        }
    }
    
    public function eliminarDetProducto(){
        //print_r($_POST);exit;
        $ncodigo = $this->input->post('ncodigo');
        $datos = $this->ObjProductoDet->eliminarDetProducto($ncodigo);
        if ($datos) {
            echo "1";
        } else {
            echo "error";
        }
    }

}

?>