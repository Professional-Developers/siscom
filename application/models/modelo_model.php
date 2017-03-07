<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* Autogenered Developed by @jvinceso */
/* Date : 01-05-2013 19:17:17 */

class Modelo_model extends CI_Model {

    //Atributos de Clase
    private $nModeloId = '';
    private $nModCodigo = '';
    private $nModEstado = '';
    private $cModDescripcion = '';

    //SETTERS
    public function setNModeloId($nModeloId) {
        $this->nModeloId = $nModeloId;
    }

    public function setNModCodigo($nModCodigo) {
        $this->nModCodigo = $nModCodigo;
    }

    public function setNModEstado($nModEstado) {
        $this->nModEstado = $nModEstado;
    }
    public function setCModDescripcion($cModDescripcion) {
        $this->cModDescripcion = $cModDescripcion;
    }

        

    //GETTERES
    public function getNModeloId() {
        return $this->nModeloId;
    }

    public function getNModCodigo() {
        return $this->nModCodigo;
    }

    public function getNModEstado() {
        return $this->nModEstado;
    }
    
    public function getCModDescripcion() {
        return $this->cModDescripcion;
    }

        

    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }

    //FUNCIONES Set y Get

    function registrarModeloIns() {
        $Accion = "";
        $Datos[0] = $Accion;
        $Datos[1] = $this->getNModCodigo(); //1
        $Datos[2] = $this->getNModCodigo(); //1
        $Datos[3] = $this->getNModCodigo(); //1
        $query = $this->db->query("CALL USP_MOD_I_MODELO(?,?,?)", $Datos);
        /*return $query;*/
        //$query = $this->db->query("CALL USP_MUL_I_HIJOS2(?,?,?,?)", $Datos);
        $this->db->close();
        if($query){
            $query = $query->result_array();
            $this->setNModeloId($query[0]['nModID']);
            return true;
        }else{
            return false;
        }
    }

    function qryModelo() {
        $query = "call USP_MOD_S_MODELO()";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    
    function qryModeloActivas() {
        $query = "call USP_MOD_S_MODELO_ACTIVAS()";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }

    function eliminarModelo($ncodigo) {
        $query = "call USP_MOD_D_MODELO(" . $ncodigo . ")";
        $query2 = $this->db->query($query);
        return $query2;
    }

    function getDatos($id) {
        $query = "call USP_MOD_S_MODELO_GET('" . $id . "')";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }

    /* para upd hueco */

    function getDatosAlmacenSucursal($idSucursalActivo) {
        $query = "call USP_ALM_S_ALMACEN_SUCURSAL('" . $idSucursalActivo . "')";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }

    function updModelo() {
        $Accion = "";
        $Datos[0] = $Accion;
        $Datos[1] = $this->getNModeloId(); //1
        $Datos[2] = $this->getNModCodigo(); //1
        $Datos[3] = $this->getCModDescripcion(); //1
        
        $query = $this->db->query("CALL USP_MOD_U_MODELO(?,?,?,?)", $Datos);
        
        $this->db->close();
        if($query){
            $query = $query->result_array();
            $this->setNModeloId($query[0]['nModID']);
            return true;
        }else{
            return false;
        }
    }

}

?>