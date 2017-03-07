<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Persona extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        $this->load->model('empresa_model', 'ObjEmpresa');
        $this->load->model('sucursal_model', 'ObjSucursal');
        $this->load->model('persona_model', 'ObjPersona');
    }

    public function index() {
        $this->loaders->verificaacceso();
        //echo "persona";exit;
        // $data['title'] = "Gestion y registro de Personas ";
        $datos[] = $this->cargaInformacionEmpresa();
        $data['sucursal'] = $this->ObjSucursal->qrySucursalActivas();
        $this->load->view('layout/header',$datos[0]);
        $this->load->view('persona/panel_view', $data);
        $this->load->view('layout/footer');
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

    public function registrarIns() {
        $this->ObjPersona->set_cPerNombres($this->input->post('txtcPerNombres'));
        $this->ObjPersona->set_cPerApellidoPaterno($this->input->post('txtcPerApellidoPaterno'));
        $this->ObjPersona->set_cPerApellidoMaterno($this->input->post('txtcPerApellidoMaterno'));
        $this->ObjPersona->set_cPerDni($this->input->post('txtcPerDni'));
        $this->ObjPersona->set_cPerDireccion($this->input->post('txtcPerDireccion'));
        $this->ObjPersona->set_cPerTelefono($this->input->post('txtcPerTelefono'));
        $this->ObjPersona->set_cPerCelular($this->input->post('txtcPerCelular'));
        $this->ObjPersona->setNSurId($this->input->post('cbo_nSurId'));

        $rs = $this->ObjPersona->registrarPersonaIns();
        if ($rs) {
            echo 1;
        } else {
            echo 0;
        }
    }
    public function qryPersona(){
        $data['informacion'] = $this->ObjPersona->qryPersona();        
        $this->load->view("persona/qry_view",$data);
    }
    function eliminarPersona() {
        $ncodigo = $this->input->post('ncodigo');
        //$datos = $this->mantenedorareas_model->eliminarareas($ncodigo, $estado);
        $datos = $this->ObjPersona->eliminarPersona($ncodigo);
        if ($datos) {
            echo "1";
        } else {
            echo "error";
        }
    }
    public function panel_updPersona(){ 
        $algo= json_decode($_POST["json"]);
        $id = $algo->nPerId;
        $data["informacion"] = $this->ObjPersona->getDatos($id);
        $data['sucursal'] = $this->ObjSucursal->qrySucursalActivas();
        $this->load->view("persona/upd_view",$data);
    }
    public function updPersona(){
        //print_r($_POST);
        $this->ObjPersona->set_cPerNombres($this->input->post('txtcPerNombresUpd'));
        $this->ObjPersona->set_cPerApellidoPaterno($this->input->post('txtcPerApellidoPaternoUpd'));
        $this->ObjPersona->set_cPerApellidoMaterno($this->input->post('txtcPerApellidoMaternoUpd'));
        $this->ObjPersona->set_cPerDni($this->input->post('txtcPerDniUpd'));
        $this->ObjPersona->set_cPerDireccion($this->input->post('txtcPerDireccionUpd'));
        $this->ObjPersona->set_cPerTelefono($this->input->post('txtcPerTelefonoUpd'));
        $this->ObjPersona->set_cPerCelular($this->input->post('txtcPerCelularUpd'));
        $this->ObjPersona->setNSurId($this->input->post('upd_cbo_nSurId'));
        
        //$resultado = $this->club_model->updClub($hdnidClub);
        $resultado = $this->ObjPersona->updPersona($this->input->post('hdnidPersona_upd'));
        if ($resultado) {
            echo 1;
        } else {
            echo 0;
        }
    }
    public function buscarxDni(){
        $this->ObjPersona->set_cPerDni( $this->input->post('dni') );
        $data['person'] = $this->ObjPersona->buscaxDniGet();
        $this->load->view('usuario/qry_personas_sinUsuario', $data);
    }    
  

}

/* End of file persona.php */
/* Location: ./application/controllers/persona.php */
?>