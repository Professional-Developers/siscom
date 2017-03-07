<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* Autogenered Developed by @jvinceso */
/* Date : 01-05-2013 19:17:17 */

class Almacen_model extends CI_Model {

    //Atributos de Clase
    private $nAlmId = '';
    private $cAlmNombre = '';
    private $nSurId = '';
    private $cAlmUbigeo = '';
    private $cAlmReferencia = '';
    private $cAlmLinea1 = '';
    private $cAlmLinea2 = '';
    private $cAlmEstado = '';

    //SETTERS
    public function setNAlmId($nAlmId) {
        $this->nAlmId = $nAlmId;
    }

    public function setCAlmNombre($cAlmNombre) {
        $this->cAlmNombre = $cAlmNombre;
    }

    public function setNSurId($nSurId) {
        $this->nSurId = $nSurId;
    }

    public function setCAlmUbigeo($cAlmUbigeo) {
        $this->cAlmUbigeo = $cAlmUbigeo;
    }

    public function setCAlmReferencia($cAlmReferencia) {
        $this->cAlmReferencia = $cAlmReferencia;
    }

    public function setCAlmLinea1($cAlmLinea1) {
        $this->cAlmLinea1 = $cAlmLinea1;
    }

    public function setCAlmLinea2($cAlmLinea2) {
        $this->cAlmLinea2 = $cAlmLinea2;
    }

    public function setCAlmEstado($cAlmEstado) {
        $this->cAlmEstado = $cAlmEstado;
    }

    //GETTERS
    public function getNAlmId() {
        return $this->nAlmId;
    }

    public function getCAlmNombre() {
        return $this->cAlmNombre;
    }

    public function getNSurId() {
        return $this->nSurId;
    }

    public function getCAlmUbigeo() {
        return $this->cAlmUbigeo;
    }

    public function getCAlmReferencia() {
        return $this->cAlmReferencia;
    }

    public function getCAlmLinea1() {
        return $this->cAlmLinea1;
    }

    public function getCAlmLinea2() {
        return $this->cAlmLinea2;
    }

    public function getCAlmEstado() {
        return $this->cAlmEstado;
    }

    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }

    //FUNCIONES Set y Get

    function registrarAlmacenIns() {
        $Accion = "";
        $Datos[0] = $Accion;
        $Datos[1] = $this->getCAlmNombre(); //1
        $Datos[2] = $this->getNSurId(); //1
        $Datos[3] = $this->getCAlmUbigeo(); //1
        $Datos[4] = $this->getCAlmReferencia(); //1
        $Datos[5] = $this->getCAlmLinea1(); //1
        $Datos[6] = $this->getCAlmLinea2(); //1
        $query = $this->db->query("CALL USP_ALM_I_ALMACEN(?,?,?,?,?,?,?)", $Datos);
        return $query;
    }

    function qryAlmacen() {
        $query = "call USP_ALM_S_ALMACEN()";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    function qryAlmacenDel() {
        $query = "call USP_ALM_S_ALMACEN_DEL()";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    function qryAlmacenSucursal(){
        $idsuc=$this->getNSurId();
        $query = "call USP_ALM_S_ALMACEN_SUCURSAL($idsuc)";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    
    
    function eliminarAlmacen($ncodigo) {
        $query = "call USP_ALM_D_ALMACEN(" . $ncodigo . ")";
        $query2 = $this->db->query($query);
        return $query2;
    }
    
    function getDatos($id) {
        $query = "call USP_ALM_S_ALMACEN_GET('" . $id . "')";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    /*para upd hueco*/
    function getDatosAlmacenSucursal($idSucursalActivo){
        $query = "call USP_ALM_S_ALMACEN_SUCURSAL('" . $idSucursalActivo . "')";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    function updAlmacen(){
        $Accion = "";
        $Datos[0] = $Accion;
        $Datos[1] = $this->getCAlmNombre(); //1
        $Datos[2] = $this->getNSurId(); //1
        $Datos[3] = $this->getCAlmUbigeo(); //1
        $Datos[4] = $this->getCAlmReferencia(); //1
        $Datos[5] = $this->getCAlmLinea1(); //1
        $Datos[6] = $this->getCAlmLinea2(); //1
        $Datos[7] = $this->getNAlmId(); //1
        //getNAlmId()
        //getCAlmEstado()
        $query = $this->db->query("CALL USP_ALM_U_ALMACEN(?,?,?,?,?,?,?,?)", $Datos);
        return $query;
    }

}

?>