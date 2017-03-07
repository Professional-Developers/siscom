<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Promocion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('empresa_model', 'ObjEmpresa');
        $this->load->model('modelo_model', 'ObjModelo');
        $this->load->model('producto_model', 'ObjProducto');
        $this->load->model('promocion_model', 'ObjPromocion');
        $this->load->model('promociondetalle_model', 'ObjPromocionDet');
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
        $data['modulo'] = 'Promocion';
        $datos[] = $this->cargaInformacionEmpresa();
        $this->load->view('layout/header', $datos[0]);
        //$data['sucursal'] = $this->ObjSucursal->qrySucursalActivas();

        $this->load->view('promocion/panel_view', $data);
        $this->load->view('layout/footer');
    }

    public function qryPromocion() {
        $data['informacion'] = $this->ObjPromocion->qryPromocion();
        $this->load->view("promocion/qry_view", $data);
    }

    function cboDiccionarioGet($Parametros, $Config) {
        $datos = $this->ObjDiccionario->cboDiccionarioGet($Parametros, $Config);
        return $datos;
    }

    function promocionIns() {
        $status = "ok";
        $msg = "mal";
        $file_element_name = 'txt_cPromFoto';
        extract($_POST);
        if ($status != "error") {
            //$config['upload_path'] = './uploads/obras/multimedia';
            //$config['upload_path'] = './uploads/logoEmpresa';
            $config['upload_path'] = './uploads/promociones';
            //$config['allowed_types'] = 'png|jpg|jpeg|gif|bmp|doc|docx|pdf|txt|xsl|xslx|ppt|pptx';
            $config['allowed_types'] = 'png|jpg|jpeg|gif|bmp';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            //$this->ObjEmpresa->setcEmpNombre($_POST['txt_cPerNombres']);
            $this->ObjPromocion->setCProDescripcion($txt_cPromocion);
            $this->ObjPromocion->setDFechaInicio($txt_dateInicio);
            $this->ObjPromocion->setDFechaFin($txt_dateFin);
            $this->ObjPromocion->setNPromPorcentaje($txt_nPromPorcentaje);
            $this->ObjPromocion->setNPromCantidad($txt_nPromCantidad);
            $this->ObjPromocion->setNPromDescuento($txt_nPromPorcentaje / 100);
            //$this->ObjPromocion->setCPromFoto("");

            if (!$this->upload->do_upload($file_element_name)) {
                $msg = $this->upload->display_errors('', '');
                $status = "sinarchivo";
                //$result = $this->ObjEmpresa->empresaIns();
                $this->ObjPromocion->setCPromFoto("");
                $result = $this->ObjPromocion->promocionIns();
                if ($result) {
                    $status = "success";
                    $msg = "Guardado Satisfactorio";
                } else {
                    unlink($data['full_path']);
                    $status = "error";
                    $msg = "Hubo un inconveniente comuniquese con el administrador.";
                }
            } else {
                $data = $this->upload->data();
                /* $result = $this->ObjEmpresa->empresaIns($data['file_name'], $_POST['txt_cPerNombres']); */
                //$this->ObjEmpresa->setcEmpLogoChico($data['file_name']);
                $this->ObjPromocion->setCPromFoto($data['file_name']);
                $result = $this->ObjPromocion->promocionIns();
                if ($result) {
                    $status = "success";
                    //$titulo = $_POST['title'];
                    $imagen = $data['file_name'];
                    $background = 'images/ok.jpg';
                    $msg = "Guardado Satisfactorio";
                } else {
                    unlink($data['full_path']);
                    $status = "error";
                    $imagen = $data['file_name'];
                    $background = 'images/error.png';
                    //$titulo = $_POST['title'];
                    $msg = "Hubo un inconveniente comuniquese con el administrador.";
                }
            }

            @unlink($_FILES[$file_element_name]);
            echo json_encode(array('status' => $status, 'msg' => $msg, 'id' => $file_element_name, 'pat' => $config['upload_path']));
        }
    }

    function cboPromocionesActivas() {
        $data['promocion'] = $this->ObjPromocion->qryPromocionActivas();
        foreach ($data['promocion'] as $pro) {
            echo "<option value=" . $pro['nPromId'] . ">" . $pro['cProDescripcion'] . " - dscto " . $pro['nPromPorcentaje'] . "(%) - quedan: " . $pro['nPromCantidadFinal'] . "</option>";
        }
    }

    /* function promocionIns(){
      foreach ($_POST as $key => $value) {
      if (empty($value)) {
      echo "r";exit;
      }
      }
      extract($_POST);
      $this->ObjPromocion->setCProDescripcion($txt_cPromocion);
      $this->ObjPromocion->setDFechaInicio($txt_dateInicio);
      $this->ObjPromocion->setDFechaFin($txt_dateFin);
      $this->ObjPromocion->setNPromPorcentaje($txt_nPromPorcentaje);
      $this->ObjPromocion->setNPromCantidad($txt_nPromCantidad);
      $this->ObjPromocion->setNPromDescuento($txt_nPromPorcentaje/100);
      $this->ObjPromocion->setCPromFoto("");
      $rs= $this->ObjPromocion->promocionIns();
      if ($rs) {
      echo 1;
      } else {
      echo 0;
      }
      } */

    public function panel_addPromDetalle() {
        $algo = json_decode($_POST["json"]);
        $id = $algo->nPromId;
        $data["id"] = $id;
        $data["informacion"] = "";
//$data['hijosCalzado'] = $this->ObjCaracteristicas->qryHijosCalzado(); /* Calzado */
        $data['producto'] = $this->ObjProducto->qryProductoActivas();
//$this->load->view("producto/producto_detalle/addCaracteristica", $data);
        $this->load->view("promocion/promocion_detalle/addPromDetalle", $data);
    }

    /* function registrarAlmacenIns() {
      $this->ObjAlmacen->setCAlmNombre($this->input->post('txt_cAlmNombre'));
      $rs = $this->ObjAlmacen->registrarAlmacenIns();
      if ($rs) {
      echo 1;
      } else {
      echo 0;
      }
      }

      public function eliminarAlmacen(){
      $ncodigo = $this->input->post('ncodigo');
      $datos = $this->ObjAlmacen->eliminarAlmacen($ncodigo);
      if ($datos) {
      echo "1";
      } else {
      echo "error";
      }
      }

      public function panel_updAlmacen(){
      $algo= json_decode($_POST["json"]);
      $id = $algo->nAlmId;
      $data["informacion"] = $this->ObjAlmacen->getDatos($id);
      $data['sucursal'] = $this->ObjSucursal->qrySucursalActivas();
      $this->load->view("almacen/upd_view",$data);
      }

      public function updAlmacen(){
      $this->ObjAlmacen->setNAlmId($this->input->post('hdnidAlmacen_upd'));
      $resultado = $this->ObjAlmacen->updAlmacen();
      if ($resultado) {
      echo 1;
      } else {
      echo 0;
      }
      } */
}
?>