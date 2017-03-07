<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Promociondetalle_model extends CI_Model {

    //Atributos de Clase
    private $nPromDetalleId = '';
    private $nProductoId = '';
    private $nPromDetEstado = '';
    private $nPromId = '';
    

    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }

    //FUNCIONES Seters
    public function getNPromDetalleId() {
        return $this->nPromDetalleId;
    }

    public function getNProductoId() {
        return $this->nProductoId;
    }

    public function getNPromDetEstado() {
        return $this->nPromDetEstado;
    }

    public function getNPromId() {
        return $this->nPromId;
    }

    public function setNPromDetalleId($nPromDetalleId) {
        $this->nPromDetalleId = $nPromDetalleId;
    }

    public function setNProductoId($nProductoId) {
        $this->nProductoId = $nProductoId;
    }

    public function setNPromDetEstado($nPromDetEstado) {
        $this->nPromDetEstado = $nPromDetEstado;
    }

    public function setNPromId($nPromId) {
        $this->nPromId = $nPromId;
    }

    
    /**/

    /*function qryPromDetalle($idprod) {
        //$query = "call USP_PRO_S_PRODUCTO_DETALLE($idprod)";
        $query = "call USP_PROM_S_PROMOCION_DETALLE_PROMOCION($idprod)";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }*/
    function qryProductoPromocion($idprod) {
        $query = "call USP_PROM_S_PRODUCTO_PROMOCION($idprod)";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    
    

    function promocionProductoIns() {
        $Accion = "";
        $Datos[0] = $Accion;
        $Datos[1] = $this->getNPromId(); //1
        $Datos[2] = $this->getNProductoId(); //1        
        $Datos[3] = $this->getNPromDetEstado(); //1

        $query = $this->db->query("CALL USP_PROM_I_DETALLE_PROMOCION(?,?,?,?)", $Datos);
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
    function promocionProductoDel() {
        $Accion = "";
        $Datos[0] = $Accion;
        $Datos[1] = $this->getNPromDetalleId(); //1
        //$Datos[2] = $this->getNProductoId(); //1        

        $query = $this->db->query("CALL USP_PROM_D_DETALLE_PROMOCION(?,?)", $Datos);
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