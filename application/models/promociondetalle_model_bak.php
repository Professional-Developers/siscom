<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Promociondetalle_model extends CI_Model {

    //Atributos de Clase
    private $nPromDetalleId = '';
    private $nProductoId = '';
    private $nPromDetCantidad = '';
    private $nPromDetDescuentoUnidad = '';
    private $nPromDetDescuentoTotal = '';
    private $nPromId = '';
    private $nPromDetEstado = '';

    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }

    //FUNCIONES Seters
    public function setNPromDetalleId($nPromDetalleId) {
        $this->nPromDetalleId = $nPromDetalleId;
    }

    public function setNProductoId($nProductoId) {
        $this->nProductoId = $nProductoId;
    }

    public function setNPromDetCantidad($nPromDetCantidad) {
        $this->nPromDetCantidad = $nPromDetCantidad;
    }

    public function setNPromDetDescuentoUnidad($nPromDetDescuentoUnidad) {
        $this->nPromDetDescuentoUnidad = $nPromDetDescuentoUnidad;
    }

    public function setNPromDetDescuentoTotal($nPromDetDescuentoTotal) {
        $this->nPromDetDescuentoTotal = $nPromDetDescuentoTotal;
    }

    public function setNPromId($nPromId) {
        $this->nPromId = $nPromId;
    }

    public function setNPromDetEstado($nPromDetEstado) {
        $this->nPromDetEstado = $nPromDetEstado;
    }

    //funciones getter
    public function getNPromDetalleId() {
        return $this->nPromDetalleId;
    }

    public function getNProductoId() {
        return $this->nProductoId;
    }

    public function getNPromDetCantidad() {
        return $this->nPromDetCantidad;
    }

    public function getNPromDetDescuentoUnidad() {
        return $this->nPromDetDescuentoUnidad;
    }

    public function getNPromDetDescuentoTotal() {
        return $this->nPromDetDescuentoTotal;
    }

    public function getNPromId() {
        return $this->nPromId;
    }

    public function getNPromDetEstado() {
        return $this->nPromDetEstado;
    }

    /**/

    function qryPromDetalle($idprod) {
        //$query = "call USP_PRO_S_PRODUCTO_DETALLE($idprod)";
        $query = "call USP_PROM_S_PROMOCION_DETALLE_PROMOCION($idprod)";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }

    function detallePromocionIns() {
        $Accion = "";
        $Datos[0] = $Accion;
        $Datos[1] = $this->getNProductoId(); //1
        $Datos[2] = $this->getNPromDetCantidad(); //1
        $Datos[3] = $this->getNPromDetDescuentoUnidad(); //1
        $Datos[4] = $this->getNPromDetDescuentoTotal(); //1
        $Datos[5] = $this->getNPromId(); //1
        $Datos[6] = $this->getNPromDetEstado(); //1

        $query = $this->db->query("CALL USP_PROM_I_DETALLE_PROMOCION(?,?,?,?,?,?,?)", $Datos);
        $this->db->close();
        //return $query;
        if ($query) {
            $query = $query->result_array();
            $this->setNPromDetalleId($query[0]['nPromDetId']);
            return true;
        } else {
            return false;
        }
    }
    
    

}

?>