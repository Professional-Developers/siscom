<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Caracteristicas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('empresa_model', 'ObjEmpresa');
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
        $data['modulo'] = 'Caracteristicas';
        $datos[] = $this->cargaInformacionEmpresa();
        $this->load->view('layout/header', $datos[0]);
        $data['tipo_stand'] =
                $this->cboDiccionarioGet(
                array('L-DD-Combo', '51'), array('ID' => 'nTipoSucursal', 'NAME' => 'nTipoSucursal', 'VALUE' => '52', 'EXTRA' => '')
        );

        $this->load->view('caracteristicas/panel_view', $data);
        $this->load->view('layout/footer');
    }

    function cboDiccionarioGet($Parametros, $Config) {
        $datos = $this->ObjDiccionario->cboDiccionarioGet($Parametros, $Config);
        return $datos;
    }
    /*padres*/
    function qryPadres(){
        $data['informacion'] = $this->ObjCaracteristicas->qryPadres();
        $this->load->view("caracteristicas/padre_qry_view", $data);
    }
    
    function padreIns(){
        $this->ObjCaracteristicas->setCMulDescripcion($this->input->post('padre_txt_cMulDescripcion'));
        $rs = $this->ObjCaracteristicas->padreIns();
        if ($rs) {
            echo 1;
        } else {
            echo 0;
        }
    }
    
    public function panelHijosIns() {
        $data['Padres'] = $this->ObjCaracteristicas->qryPadresActivos();
        $data['Particularidad'] =
                $this->cboDiccionarioGet(
                array('L-DD-Combo', '64'), array('ID' => 'nParticularidad', 'NAME' => 'nParticularidad', 'VALUE' => '9', 'EXTRA' => 'class="form-control"')
        );
        $this->load->view('caracteristicas/hijo_ins_view', $data);
    }
    
    public function panelSubCaracteristicaIns() {
        $data['Padres'] = $this->ObjCaracteristicas->qryPadresActivos();
        $data['Particularidad'] =
                $this->cboDiccionarioGet(
                array('L-DD-Combo', '64'), array('ID' => 'nParticularidad', 'NAME' => 'nParticularidad', 'VALUE' => '9', 'EXTRA' => 'class="form-control"')
        );
        $this->load->view('caracteristicas/subcaracteristica/sub_ins_view', $data);
    }
    public function qrySubCaracteristicas(){ //qryHijos
        $idTipoCaracteristica = $this->input->post('idTipoCaracteristica');
        $idCaracteristica = $this->input->post('idCaracteristica');
        $txtcaracteristica = $this->input->post('txtCaracteristica');
        $chkTodos = $this->input->post('chkTodos');
        $data['informacion'] = $this->ObjCaracteristicas->qrySubCaracteristicas($idTipoCaracteristica,$idCaracteristica,$txtcaracteristica,$chkTodos);
        $this->load->view("caracteristicas/subcaracteristica/sub_qry_view", $data);
    }
    
    public function qryCaracteristicasxTipoCaracteristica() { //qryAlmacenSucursal
        $idpadre = $_POST['idpadre'];
        $this->ObjCaracteristicas->setNMulIdPadre($idpadre);
        //$data['comboAlmacen'] = $this->ObjAlmacen->qryAlmacenSucursal();
        $combo = $this->ObjCaracteristicas->qryCaracteristicasxTipoCaracteristica($idpadre);
        //print_r($combo);exit;
        
        $cont=1;
        echo "<option selected=selected value=-1>TODOS</option>";
        if($combo!=FALSE){
            foreach($combo as $cboAlm){
                if($cont==1){
                    echo "<option  value=".$cboAlm['nMulId'].">".$cboAlm['cMulDescripcion']."</option>";
                }else{
                    echo "<option value=".$cboAlm['nMulId'].">".$cboAlm['cMulDescripcion']."</option>";
                }
                $cont++;
            }
        }
        
    }
    
    /*hijos*/
    function qryHijos(){
        $idTipoCaracteristica = $this->input->post('idTipoCaracteristica');
        $txtcaracteristica = $this->input->post('txtCaracteristica');
        $chkTodos = $this->input->post('chkTodos');
        
        $data['informacion'] = $this->ObjCaracteristicas->qryHijos($idTipoCaracteristica,$txtcaracteristica,$chkTodos);
        $this->load->view("caracteristicas/hijo_qry_view", $data);
    }
    function hijoIns(){
        $this->ObjCaracteristicas->setNMulIdPadre($this->input->post('cboIdPadre'));
        $this->ObjCaracteristicas->setCMulDescripcion(trim($this->input->post('hijo_txt_cMulDescripcion')));
        $this->ObjCaracteristicas->setCMulOrden($this->input->post('hijo_txt_nMulOrden'));
        $this->ObjCaracteristicas->setNMulParticularidad($this->input->post('nParticularidad'));
        $rs = $this->ObjCaracteristicas->hijoIns();
        if($this->ObjCaracteristicas->getNMulId()=='1'){
            echo "1";
        }else if($this->ObjCaracteristicas->getNMulId()=='2'){
            echo "2";
        }else{
            echo "-1";
        }
    }
    
    function llenaHijoxIdPadre(){
        $idPadre = $_POST['idPadre'];
        $comboHijos = $this->ObjCaracteristicas->qryHijosxIdPadre($idPadre);
        foreach($comboHijos as $cboAlm){
                echo "<option value=".$cboAlm['idHijo'].">".strtoupper($cboAlm['hijo'])."</option>";
        }
    }
    
    function eliminarHijo(){
        $ncodigo = $this->input->post('ncodigo');
        $datos = $this->ObjCaracteristicas->eliminarHijo($ncodigo);
        if ($datos) {
            echo "1";
        } else {
            echo "error";
        }
    }
    
    
    public function panel_updPadre(){ 
        $algo= json_decode($_POST["json"]);
        $id = $algo->nMulIdPadre;
        $data["informacion"] = $this->ObjCaracteristicas->getDatosPadre($id);
        $this->load->view("caracteristicas/padre_upd_view",$data);
    }
    
    public function updPadre(){
        $this->ObjCaracteristicas->setNMulId($this->input->post('hdnidPadre_upd'));
        $this->ObjCaracteristicas->setCMulDescripcion($this->input->post('upd_txt_cMulDescripcion'));
        $resultado = $this->ObjCaracteristicas->updPadre();
        if ($resultado) {
            echo 1;
        } else {
            echo 0;
        }
    }
    /*Hijo*/
    public function panel_updHijo(){ 
        $algo= json_decode($_POST["json"]);
        $id = $algo->nMulId;
        $data["informacion"] = $this->ObjCaracteristicas->getDatosHijo($id);
        $data['Padres'] = $this->ObjCaracteristicas->qryPadresActivos();
        $data['Particularidad'] =
                $this->cboDiccionarioGet(
                array('L-DD-Combo', '64'), array('ID' => 'nParticularidad', 'NAME' => 'nParticularidad', 'VALUE' => '9', 'EXTRA' => 'class="form-control"')
        );
        $this->load->view("caracteristicas/hijo_upd_view",$data);
    }
    public function updHijo(){
        $this->ObjCaracteristicas->setNMulId($this->input->post('hdnidHijo_upd'));
        $this->ObjCaracteristicas->setNMulIdPadre($this->input->post('upd_cboIdPadre'));
        $this->ObjCaracteristicas->setCMulDescripcion($this->input->post('upd_hijo_txt_cMulDescripcion'));
        $resultado = $this->ObjCaracteristicas->updHijo();
      /*  print_r($this->input->post('hdnidHijo_upd'));
        print_r("a ");
        print_r($this->input->post('upd_cboIdPadre'));
        print_r("a ");
        print_r($this->input->post('upd_hijo_txt_cMulDescripcion'));
        print_r("a ");
        exit;*/
        if($this->ObjCaracteristicas->getNMulId()=='1'){
            echo "1";
        }else if($this->ObjCaracteristicas->getNMulId()=='2'){
            echo "2";
        }else{
            echo "-1";
        }
    }
}
?>