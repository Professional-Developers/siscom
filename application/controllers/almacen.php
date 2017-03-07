<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//require_once APPPATH.'controllers/controlador_padre.php';
//require_once APPPATH.'controllers/principal.php';
//class Empresa extends Principal {
class Almacen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        $this->load->model('empresa_model', 'ObjEmpresa');
        $this->load->model('sucursal_model', 'ObjSucursal');
        $this->load->model('almacen_model', 'ObjAlmacen');
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
        $data['modulo'] = 'Almacen';
        $datos[] = $this->cargaInformacionEmpresa();
        $this->load->view('layout/header', $datos[0]);
        $data['sucursal'] = $this->ObjSucursal->qrySucursalActivas();

        $this->load->view('almacen/panel_view', $data);
        $this->load->view('layout/footer');
    }

    public function qryAlmacen() {
        $data['informacion'] = $this->ObjAlmacen->qryAlmacen();
        $this->load->view("almacen/qry_view", $data);
    }
    public function qryAlmacenDel() {
        $data['informacion'] = $this->ObjAlmacen->qryAlmacenDel();
        $this->load->view("almacen/qry_view_del", $data);
    }
    /*llena combos para ins hueco y upd hueco*/
    public function qryAlmacenSucursal() {
        $idSucursal = $_POST['idsuc'];
        $this->ObjAlmacen->setNSurId($idSucursal);
        //$data['comboAlmacen'] = $this->ObjAlmacen->qryAlmacenSucursal();
        $comboAlmacen = $this->ObjAlmacen->qryAlmacenSucursal();
        //print_r($data['informacion']);*/
        $cont=1;
        foreach($comboAlmacen as $cboAlm){
            if($cont==1){
                echo "<option selected=selected value=".$cboAlm['nAlmId'].">".$cboAlm['cAlmNombre']."</option>";
            }else{
                echo "<option value=".$cboAlm['nAlmId'].">".$cboAlm['cAlmNombre']."</option>";
            }
            $cont++;
        }/**/
        //$this->load->view('almacen/cbo/cboAlmacenes', $data);
    }
    public function qryAlmacenSucursalUpd() {
        $idSucursal = $_POST['idsuc'];
        $idseleccion = $_POST['idseleccion'];
        $this->ObjAlmacen->setNSurId($idSucursal);
        //$data['comboAlmacen'] = $this->ObjAlmacen->qryAlmacenSucursal();
        $comboAlmacen = $this->ObjAlmacen->qryAlmacenSucursal();
        //print_r($data['informacion']);*/
        $cont=1;
        foreach($comboAlmacen as $cboAlm){
            if($cboAlm['nAlmId']==$idseleccion){
                echo "<option selected=selected value=".$cboAlm['nAlmId'].">".$cboAlm['cAlmNombre']."</option>";
            }else{
                echo "<option value=".$cboAlm['nAlmId'].">".$cboAlm['cAlmNombre']."</option>";
            }
            $cont++;
        }/**/
        //$this->load->view('almacen/cbo/cboAlmacenes', $data);
    }
    
    
    /*llena combos para upd de Hueco*/
    public function qryAlmacenId() {
        $idAlm = $_POST['idAlm'];
        //$this->ObjAlmacen->setNSurId($idSucursal);
        $comboAlmacenArr = $this->ObjAlmacen->getDatos($idAlm);
        $idSucursalActivo = $comboAlmacenArr[0]['nSurId'];
        $comboAlmacen = $this->ObjAlmacen->getDatosAlmacenSucursal($idSucursalActivo);
        foreach($comboAlmacen as $cboAlm){
            if($cboAlm['nAlmId']==$idAlm){
                echo "<option selected=selected value=".$cboAlm['nAlmId'].">".$cboAlm['cAlmNombre']."</option>";
            }else{
                echo "<option value=".$cboAlm['nAlmId'].">".$cboAlm['cAlmNombre']."</option>";
            }
            //$cont++;
        }/**/
    }
    
    
    function cboDiccionarioGet($Parametros, $Config) {
        $datos = $this->ObjDiccionario->cboDiccionarioGet($Parametros, $Config);
        return $datos;
    }

    function registrarAlmacenIns() {
        //print_r($_POST); setNAlmId
        //print_r($_POST);exit;
        $this->ObjAlmacen->setCAlmNombre($this->input->post('txt_cAlmNombre'));
        $this->ObjAlmacen->setNSurId($this->input->post('cbo_nSurId'));
        $this->ObjAlmacen->setCAlmUbigeo($this->input->post('txt_cAlmUbigeo'));
        $this->ObjAlmacen->setCAlmReferencia($this->input->post('txt_cAlmReferencia'));
        $this->ObjAlmacen->setCAlmLinea1($this->input->post('txt_cAlmLinea1'));
        $this->ObjAlmacen->setCAlmLinea2($this->input->post('txt_cAlmLinea2'));

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
        //print_r($data);exit;
        $this->load->view("almacen/upd_view",$data);
    }
    
    public function updAlmacen(){
        //print_r($_POST);exit;
        $this->ObjAlmacen->setCAlmNombre($this->input->post('upd_txt_cAlmNombre'));
        $this->ObjAlmacen->setNSurId($this->input->post('upd_cbo_nSurId'));
        $this->ObjAlmacen->setCAlmUbigeo($this->input->post('upd_txt_cAlmUbigeo'));
        $this->ObjAlmacen->setCAlmReferencia($this->input->post('upd_txt_cAlmReferencia'));
        $this->ObjAlmacen->setCAlmLinea1($this->input->post('upd_txt_cAlmLinea1'));
        $this->ObjAlmacen->setCAlmLinea2($this->input->post('upd_txt_cAlmLinea2'));
        $this->ObjAlmacen->setNAlmId($this->input->post('hdnidAlmacen_upd'));
        
        //$resultado = $this->club_model->updClub($hdnidClub);
        $resultado = $this->ObjAlmacen->updAlmacen();
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