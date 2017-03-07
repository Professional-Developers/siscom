<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Caracteristicas_model extends CI_Model {

    //Atributos de Clase
    private $nMulId = '';
    private $nMulIdPadre = '';
    private $cMulDescripcion='';
    private $cMulOrden='';
    private $nMulEstado='';
    private $nMulParticularidad=''; 
    private $nMulIdCaracteristica='';
    //setCMulParticularidad
    
    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }

    //FUNCIONES Seters
    public function setNMulId($nMulId) {
        $this->nMulId = $nMulId;
    }

    public function setNMulIdPadre($nMulIdPadre) {
        $this->nMulIdPadre = $nMulIdPadre;
    }

    public function setCMulDescripcion($cMulDescripcion) {
        $this->cMulDescripcion = $cMulDescripcion;
    }

    public function setCMulOrden($cMulOrden) {
        $this->cMulOrden = $cMulOrden;
    }

    public function setNMulEstado($nMulEstado) {
        $this->nMulEstado = $nMulEstado;
    }
    public function setNMulParticularidad($nMulParticularidad) {
        $this->nMulParticularidad = $nMulParticularidad;
    }
    
    public function setNMulIdCaracteristica($nMulIdCaracteristica) {
        $this->nMulIdCaracteristica = $nMulIdCaracteristica;
    }

        /*GETTERS*/
    public function getNMulId() {
        return $this->nMulId;
    }

    public function getNMulIdPadre() {
        return $this->nMulIdPadre;
    }

    public function getCMulDescripcion() {
        return $this->cMulDescripcion;
    }

    public function getCMulOrden() {
        return $this->cMulOrden;
    }

    public function getNMulEstado() {
        return $this->nMulEstado;
    }
    public function getNMulParticularidad() {
        return $this->nMulParticularidad;
    }
    public function getNMulIdCaracteristica() {
        return $this->nMulIdCaracteristica;
    }
    
    
        /**/

    function qryPadres() {
        //$query = "call USP_MUL_S_PADRES()";
        $query = "call USP_MUL_S_PADRES_CALZADO()";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    function qryPadresActivos() {
        //$query = "call USP_MUL_S_PADRES_ACTIVOS()";
        $query = "call USP_MUL_S_PADRES_CALZADO_ACTIVOS()";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    
    function qrySubCaracteristicas($nIdTipoCaracteristica,$idCaracteristica,$txtCatacteristica,$chkTodos){//qryHijos
        $Accion = "";
        $datos[0]= $nIdTipoCaracteristica;
        $datos[1]= $idCaracteristica;
        $datos[2]= $txtCatacteristica;
        $datos[3]= $chkTodos;
        $query2 = $this->db->query("call USP_MUL_S_SUBCARACTERISTICAS(?,?,?,?)",$datos);//USP_MUL_S_HIJOS
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    function qryCaracteristicasxTipoCaracteristica(){
        $idpadre=$this->getNMulIdPadre();
        $query = "call USP_CARAC_S_TIPOCARACTERISTICA($idpadre)";//USP_ALM_S_ALMACEN_SUCURSAL
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    
    
    
    function qryHijos($nIdTipoCaracteristica,$txtCatacteristica,$chkTodos){
        $Accion = "";
        $datos[0]= $nIdTipoCaracteristica;
        $datos[1]= $txtCatacteristica;
        $datos[2]=$chkTodos;
        //print_r($datos);exit;
        //$query = "call USP_MUL_S_HIJOS(?,?)", $datos);
        $query2 = $this->db->query("call USP_MUL_S_HIJOS(?,?,?)",$datos);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }

    function padreIns() {
        $Accion = "";
        $Datos[0] = $Accion;
        $Datos[1] = $this->getCMulDescripcion(); //1
        
        $query = $this->db->query("CALL USP_MUL_I_PADRES(?,?)", $Datos);
        return $query;
    }
    
    /*Hijos Ins*/
    function hijoIns() {
        $Accion = "";
        $Datos[0] = $Accion;
        $Datos[1] = $this->getNMulIdPadre(); //1
        $Datos[2] = $this->getCMulDescripcion(); //2
        $Datos[3] = $this->getCMulOrden(); //3
        $Datos[4] = $this->getNMulParticularidad(); //3
        
        //$query = $this->db->query("CALL USP_MUL_I_HIJOS2(?,?,?,?)", $Datos);
        $query = $this->db->query("CALL USP_MUL_I_HIJOS(?,?,?,?,?)", $Datos);//65
        $this->db->close();
        if($query){
            $query = $query->result_array();
            $this->setNMulId($query[0]['nMultiID']);
            return true;
        }else{
            return false;
        }
        
    }
    
    function qryHijosxIdPadre($idPadre){
        $query = "call USP_MUL_S_HIJOS_x_idPadre($idPadre)";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    
    function eliminarHijo($ncodigo) {
        $query = "call USP_MUL_D_HIJOS(" . $ncodigo . ")";
        $query2 = $this->db->query($query);
        return $query2;
    }
    
    function qryHijosCalzado(){
        $query = "call USP_MUL_S_HIJOS_CALZADO()";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    
    /*1804*/
    function getDatosPadre($id) {
        $query = "call USP_MUL_S_PADRE_GET('" . $id . "')";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    function updPadre(){
        $Accion = "";
        $Datos[0] = $Accion;
        $Datos[1] = $this->getNMulId(); //1
        $Datos[2] = $this->getCMulDescripcion(); //2
        $query = $this->db->query("CALL USP_MUL_U_PADRE(?,?,?)", $Datos);
        return $query;
    }
    //part 2
    function getDatosHijo($id) {
        $query = "call USP_MUL_S_HIJO_GET('" . $id . "')";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    function updHijo(){
        $Accion = "";
        $Datos[0] = 0;
        $Datos[1] = $this->getNMulId(); //1
        $Datos[2] = $this->getNMulIdPadre(); //2
        $Datos[3] = $this->getCMulDescripcion(); //2
        $Datos[4] = 0;//orden
        $query = $this->db->query("CALL USP_MUL_U_HIJO(?,?,?,?,?)", $Datos);
        //return $query;
        $this->db->close();
        if($query){
            $query = $query->result_array();
            $this->setNMulId($query[0]['nMultiID']);
            return true;
        }else{
            return false;
        }
    }

}

?>