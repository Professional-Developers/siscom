<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Envioproducto extends CI_Controller {

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
        $data['modulo'] = 'Mis Productos';
        $TipoUsuario = $this->session->userdata('TipoUsuario');
        $DescTipoUsuario = $this->session->userdata('DescTipoUsuario');
        $IdSucursal = $this->session->userdata('IdSucursal');
        $Sucursal = $this->session->userdata('Sucursal');
        
        $data['TipoUsuario'] = ($TipoUsuario=='') ? 'nay':$TipoUsuario;
        $data['DescTipoUsuario'] = ($DescTipoUsuario=='') ? 'nay': $DescTipoUsuario;
        $data['IdSucursal'] = ($Sucursal=='') ? 'nay':$IdSucursal;
        $data['Sucursal'] = ($Sucursal=='') ? 'nay':$Sucursal;
        $datos[] = $this->cargaInformacionEmpresa();
        $this->load->view('layout/header', $datos[0]);
        
        //$data['modelo'] = $this->ObjModelo->qryModeloActivas();
        $data['sucursal'] = $this->ObjSucursal->qrySucursalActivas();/*qry Sucursal Totales*/
        //$this->load->view('producto/panel_view', $data);
        
        
        /*echo ($TipoUsuario=='1') ? "Administrador":"Otro Usuario";*/
        //$this->load->view('producto/producto_derivar/panel_view', $data);
        $this->load->view('producto/misproductos/panel_view', $data);
        
        $this->load->view('layout/footer');
    }

    function cboDiccionarioGet($Parametros, $Config) {
        $datos = $this->ObjDiccionario->cboDiccionarioGet($Parametros, $Config);
        return $datos;
    }
    
    function derivarProducto(){
        //http://joan16v.wordpress.com/2010/01/12/php-mysql-convertir-listado-de-datos-separado-por-comas-en-un-array-para-recorrerlo-e-insertar-cada-dato-en-una-base-de-datyos/
        //print_r($_POST);
        foreach ($_POST as $key => $value) {
            if (empty($value)) {
                //echo "<strong>El campo $key esta vacío.:.</strong>";
                //return 3;
                echo "r";
                exit;
            }
        }
        extract($_POST);
        //print_r($_POST);    
        //$idsucursal
        //$cboIdAlmacen
        $this->ObjProductoHueco->setIdHueco($cboIdHueco);//1
        $this->ObjProductoHueco->setNProductoHueco($nProductoHueco);// 2 [nProductoHueco] => 61,85,82,83
        $this->ObjMovimiento->setNTipoMovimiento(2); //Derivar 3
        $this->ObjMovimiento->setDMovFecha(""); //4
        $this->ObjMovimiento->setNTipoDocumento(""); //5
        $this->ObjMovimiento->setCMovNumDocumento(""); //6
        $this->ObjMovimiento->setCMovEstado(1); //7
        $this->ObjMovimiento->setNUsuario($this->session->userdata('IdUsuario')); //8
        $this->ObjMovimiento->setNPerIdResponsable($this->session->userdata('IdPersona')); //9
        $this->ObjMovimiento->setNSurIdOrigen($this->session->userdata('IdSucursal')); //10
        $this->ObjMovimiento->setNSurIdDestino($idsucursal); //11
        
        $rs = $this->ObjProducto->derivarProducto($this->ObjProductoHueco, $this->ObjMovimiento);
        if ($this->ObjProducto->getNProId() == -1) {
            echo "-1";
        } else {
            echo $this->ObjProducto->getNProId();
        }
    }
    

}

?>