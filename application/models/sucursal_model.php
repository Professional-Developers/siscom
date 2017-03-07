<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* Autogenered Developed by @jvinceso */
/* Date : 01-05-2013 19:17:17 */

class Sucursal_model extends CI_Model {

    //Atributos de Clase
    private $nSurId = '';
    private $cSurNombre = '';
    private $cSurDescripcion = '';
    private $cSurUbigeo = '';
    private $cSurReferencia = '';
    private $cSurLinea1 = '';
    private $cSurLinea2 = '';
    private $nTipoSucursal = '';
    private $nEstado = '';
    private $nEmpId = '';
    private $cSurTelefonos = '';

    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }

    //FUNCIONES Set y Get
    public function setNSurId($nSurId) {
        $this->nSurId = $nSurId;
    }

    public function setCSurNombre($cSurNombre) {
        $this->cSurNombre = $cSurNombre;
    }

    public function setCSurUbigeo($cSurUbigeo) {
        $this->cSurUbigeo = $cSurUbigeo;
    }

    public function setCSurReferencia($cSurReferencia) {
        $this->cSurReferencia = $cSurReferencia;
    }

    public function setCSurLinea1($cSurLinea1) {
        $this->cSurLinea1 = $cSurLinea1;
    }

    public function setCSurLinea2($cSurLinea2) {
        $this->cSurLinea2 = $cSurLinea2;
    }

    public function setNTipoSucursal($nTipoSucursal) {
        $this->nTipoSucursal = $nTipoSucursal;
    }

    public function setNEstado($nEstado) {
        $this->nEstado = $nEstado;
    }

    public function setNEmpId($nEmpId) {
        $this->nEmpId = $nEmpId;
    }

    public function setCSurTelefonos($cSurTelefonos) {
        $this->cSurTelefonos = $cSurTelefonos;
    }

    public function setCSurDescripcion($cSurDescripcion) {
        $this->cSurDescripcion = $cSurDescripcion;
    }

    //gets
    public function getNSurId() {
        return $this->nSurId;
    }

    public function getCSurNombre() {
        return $this->cSurNombre;
    }

    public function getCSurUbigeo() {
        return $this->cSurUbigeo;
    }

    public function getCSurReferencia() {
        return $this->cSurReferencia;
    }

    public function getCSurLinea1() {
        return $this->cSurLinea1;
    }

    public function getCSurLinea2() {
        return $this->cSurLinea2;
    }

    public function getNTipoSucursal() {
        return $this->nTipoSucursal;
    }

    public function getNEstado() {
        return $this->nEstado;
    }

    public function getNEmpId() {
        return $this->nEmpId;
    }

    public function getCSurTelefonos() {
        return $this->cSurTelefonos;
    }

    public function getCSurDescripcion() {
        return $this->cSurDescripcion;
    }

    function registrarSucursalIns() {
        $Accion = "";
        $Datos[0] = $Accion;
        $Datos[1] = $this->getCSurNombre(); //1
        $Datos[2] = $this->getCSurDescripcion(); //1
        $Datos[3] = $this->getCSurUbigeo(); //1
        $Datos[4] = $this->getCSurReferencia(); //1
        $Datos[5] = $this->getCSurLinea1(); //1
        $Datos[6] = $this->getCSurLinea2(); //1
        $Datos[7] = $this->getNTipoSucursal(); //1
        $Datos[8] = $this->getCSurTelefonos(); //1
        $Datos[9] = $this->getNEmpId(); //1

        $query = $this->db->query("CALL USP_SUC_I_SUCURSAL(?,?,?,?,?,?,?,?,?,?)", $Datos);
        return $query;
    }

    function qrySucursal() {
        $query = "call USP_SUC_S_SUCURSAL()";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    function qrySucursalDel() {
        $query = "call USP_SUC_S_SUCURSAL_DEL()";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }

    function eliminarSucursal($ncodigo) {
        $query = "call USP_SUC_D_SUCURSAL(" . $ncodigo . ")";
        $query2 = $this->db->query($query);
        return $query2;
    }

    function getDatos($id) {
        $query = "call USP_SUC_S_SUCURSAL_GET('" . $id . "')";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }

    function updSucursal() {
        $Accion = "";
        $Datos[0] = $Accion;
        $Datos[1] = $this->getCSurNombre(); //1
        $Datos[2] = $this->getCSurDescripcion(); //1
        $Datos[3] = $this->getCSurUbigeo(); //1
        $Datos[4] = $this->getCSurReferencia(); //1
        $Datos[5] = $this->getCSurLinea1(); //1
        $Datos[6] = $this->getCSurLinea2(); //1
        $Datos[7] = $this->getNTipoSucursal(); //1
        $Datos[8] = $this->getCSurTelefonos(); //1
        $Datos[9] = $this->getNEmpId(); //1
        $Datos[10] = $this->getNSurId(); //1
        $query = $this->db->query("CALL USP_SUC_U_SUCURSAL(?,?,?,?,?,?,?,?,?,?,?)", $Datos);
        return $query;
    }
    /**/
    function qrySucursalActivas() {
        $query = "call USP_SUC_S_SUCURSAL_ACTIVAS()";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    function qrySucursalPrincipales() {
        $query = "call USP_SUC_S_SUCURSAL_PRINCIPALES()";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }

}

?>