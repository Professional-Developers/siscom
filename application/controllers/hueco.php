<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hueco extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('empresa_model', 'ObjEmpresa');
        $this->load->model('sucursal_model', 'ObjSucursal');
        $this->load->model('almacen_model', 'ObjAlmacen');
        $this->load->model('hueco_model', 'ObjHueco');
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
        $data['modulo'] = 'Hueco';
        $datos[] = $this->cargaInformacionEmpresa();
        $this->load->view('layout/header', $datos[0]);
        $data['sucursal'] = $this->ObjSucursal->qrySucursalActivas();
        //print_r($data['sucursal']);exit;
        $this->load->view('hueco/panel_view', $data);
        $this->load->view('layout/footer');
    }

    function cboDiccionarioGet($Parametros, $Config) {
        $datos = $this->ObjDiccionario->cboDiccionarioGet($Parametros, $Config);
        return $datos;
    }
    
    
    function HuecoIns(){
        //print_r($_POST);  
        $this->ObjHueco->setCHueNombre($this->input->post('txt_cHueNombre'));
        $this->ObjHueco->setNIdRepisa($this->input->post('txt_nIdRepisa'));
        $this->ObjHueco->setNIdFila($this->input->post('txt_nIdFila'));
        $this->ObjHueco->setNIdColumna($this->input->post('txt_nIdColumna'));
        $this->ObjHueco->setNIdCelda($this->input->post('txt_nIdCelda'));
        $this->ObjHueco->setNAlmId($this->input->post('cboIdAlmacen'));
        $rs = $this->ObjHueco->HuecoIns();
        if ($rs) {
            echo 1;
        } else {
            echo 0;
        }
    }
    
    public function qryHueco() {
        $data['informacion'] = $this->ObjHueco->qryHueco();
        $this->load->view("hueco/qry_view", $data);
    }
    public function qryHuecoDel() {
        $data['informacion'] = $this->ObjHueco->qryHuecoDel();
        $this->load->view("hueco/qry_view_del", $data);
    }
    
    
     /*llena combos para ins hueco y upd hueco*/
    public function qryHuecoAlmacen() {
        $idAlm = $_POST['idalm'];
        $this->ObjHueco->setNAlmId($idAlm);
        $comboHueco = $this->ObjHueco->qryHuecoAlmacen();
        $cont=1;
        //echo "<option value=''>"."</option>";
        foreach($comboHueco as $cboHue){
            if($cont==1){
                echo "<option selected='selected' value=".$cboHue['nHuecoId'].">".$cboHue['casillero']."</option>";
            }else{
                echo "<option value=".$cboHue['nHuecoId'].">".$cboHue['casillero']."</option>";
            }
            $cont++;
        }
    }
    public function qryHuecoAlmacenUpd() {
        $idAlm = $_POST['idalm'];
        $idseleccion = $_POST['idseleccion'];
        $this->ObjHueco->setNAlmId($idAlm);
        $comboHueco = $this->ObjHueco->qryHuecoAlmacen();
        //$cont=1;
        //echo "<option value=''>"."</option>";
        foreach($comboHueco as $cboHue){
            if($cboHue['nHuecoId']==$idseleccion){
                echo "<option selected='selected' value=".$cboHue['nHuecoId'].">".$cboHue['casillero']."</option>";
            }else{
                echo "<option value=".$cboHue['nHuecoId'].">".$cboHue['casillero']."</option>";
            }
            //$cont++;
        }
    }
    
    public function eliminarHueco(){
        $ncodigo = $this->input->post('ncodigo');
        $datos = $this->ObjHueco->eliminarHueco($ncodigo);
        if ($datos) {
            echo "1";
        } else {
            echo "error";
        }
    }
    
    public function panel_updHueco(){ 
        $algo= json_decode($_POST["json"]);
        $id = $algo->nHuecoId;
        $data["informacion"] = $this->ObjHueco->getDatos($id);
        /*$data['tipo_stand'] =
                $this->cboDiccionarioGet(
                array('L-DD-Combo', '51'), array('ID' => 'nTipoSucursal', 'NAME' => 'nTipoSucursal', 'VALUE' => $data["informacion"][0]['nTipoSucursal'], 'EXTRA' => '')
        );*/
        $idAlmaActiva = $data['informacion'][0]['nAlmId'];
        $idSucursalActivaArr = $this->ObjAlmacen->getDatos($idAlmaActiva);
        $data['idSucursalActiva'] = $idSucursalActivaArr[0]['nSurId'];
        //print_r($idSucursalActiva);exit();
        $data['sucursal'] = $this->ObjSucursal->qrySucursalActivas();
        //print_r($data);exit;
        $this->load->view("hueco/upd_view",$data);
    }
    
    //updSucursal
    public function updHueco(){
        $this->ObjHueco->setNHuecoId($this->input->post('hdnidHueco_upd'));
        $this->ObjHueco->setCHueNombre($this->input->post('upd_txt_cHueNombre'));
        $this->ObjHueco->setNIdRepisa($this->input->post('upd_txt_nIdRepisa'));
        $this->ObjHueco->setNIdFila($this->input->post('upd_txt_nIdFila'));
        $this->ObjHueco->setNIdColumna($this->input->post('upd_txt_nIdColumna'));
        $this->ObjHueco->setNIdCelda($this->input->post('upd_txt_nIdCelda'));
        $this->ObjHueco->setNAlmId($this->input->post('upd_cboIdAlmacen'));
        
        //$resultado = $this->club_model->updClub($hdnidClub);
        $resultado = $this->ObjHueco->updHueco();
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