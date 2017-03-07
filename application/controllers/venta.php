<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Venta extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('empresa_model', 'ObjEmpresa');
        $this->load->model('sucursal_model', 'ObjSucursal');
        $this->load->model('almacen_model', 'ObjAlmacen');
        $this->load->model('hueco_model', 'ObjHueco');
        $this->load->model('modelo_model', 'ObjModelo');
        $this->load->model('producto_model', 'ObjProducto');
        $this->load->model('productoHueco_model', 'ObjProductoHueco');
        $this->load->model('movimiento_model', 'ObjMovimiento');
        $this->load->model('movimientoDetalle_model', 'ObjMovimientoDetalle');
        $this->load->model('diccionario_model', 'ObjDiccionario'); //multitabla
        $this->load->model('caracteristicas_model', 'ObjCaracteristicas'); //multitabla
        $this->load->model('promocion_model', 'ObjPromocion'); //multitabla
        $this->load->model('promociondetalle_model', 'ObjPromDetalle'); //multitabla
        //$this->load->model('venta_model', 'ObjVenta'); //multitabla
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
        /*productos Mi Stan*/
        $this->loaders->verificaacceso();
        $data['modulo'] = ' Buscar Productos';
        $datos[] = $this->cargaInformacionEmpresa();
        $this->load->view('layout/header', $datos[0]);

        //$data['modelo'] = $this->ObjModelo->qryModeloActivas();
        //$this->load->view('venta/productos_disponibles/panel_view', $data);
        $IdSucursal = $this->session->userdata('IdSucursal');
        print_r($IdSucursal);exit;
        $data['IdSucursal'] = ($Sucursal=='') ? 'nay':$IdSucursal;
        $datos[] = $this->cargaInformacionEmpresa();
        $this->load->view('layout/header', $datos[0]);
        
        //$data['modelo'] = $this->ObjModelo->qryModeloActivas();
        $data['sucursal'] = $this->ObjSucursal->qrySucursalActivas();/*qry Sucursal Totales*/
        //$this->load->view('producto/misproductos/panel_view', $data);
        
        //$this->load->view('producto/misproductos/panel_view', $data);
        //
        
        
        $this->load->view('layout/footer');
    }

    function cboDiccionarioGet($Parametros, $Config) {
        $datos = $this->ObjDiccionario->cboDiccionarioGet($Parametros, $Config);
        return $datos;
    }
    function qryProductoMiStan() {
        $this->loaders->verificaacceso();
        $data['modulo'] = ' Buscar Productos';
        $datos[] = $this->cargaInformacionEmpresa();
        $this->load->view('layout/header', $datos[0]);

        $data['modelo'] = $this->ObjModelo->qryModeloActivas();
        $this->load->view('producto/fndProductos/panel_view', $data);
        $this->load->view('layout/footer');
    }
    function panelMisVentas(){
        echo "hola";
    }
    /*public function qryProductoMiStan() {
        //$this->loaders->verificaacceso();
        $data['modulo'] = 'Mis Productos';
        $idSucursal = $this->session->userdata('IdSucursal');
        $datos[] = $this->cargaInformacionEmpresa();
        $this->load->view('layout/header', $datos[0]);
        //echo "idgdgdgdfgdsgsdf";
        if ($idSucursal == '') {
            echo "Cuidado Revisar ID de Stand comunicarse con Adminitrador";
        } else {
            $data['informacion'] = $this->ObjProducto->qryProductoMiStan($idSucursal);
            //$this->load->view("producto/misproductos/productos_disponibles/qry_view", $data);
            $this->load->view("venta/productos_disponibles/qry_view", $data);
        }
        
        $this->load->view('layout/footer');
    }*/
    

}

?>