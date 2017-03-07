<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* Autogenered Developed by @jvinceso */
/* Date : 01-05-2013 19:17:17 */

class Promocion_model extends CI_Model {

    //Atributos de Clase
    private $nPromId = '';
    private $cProDescripcion = '';
    private $nPromEstado = '';
    private $dFechaInicio = '';
    private $dFechaFin = '';
    private $nPromPorcentaje = '';
    private $nPromCantidad='';
    private $nPromDescuento='';
    private $cPromFoto='';

    //SETTERS
    public function setNPromId($nPromId) {
        $this->nPromId = $nPromId;
    }

    public function setCProDescripcion($cProDescripcion) {
        $this->cProDescripcion = $cProDescripcion;
    }

    public function setNPromEstado($nPromEstado) {
        $this->nPromEstado = $nPromEstado;
    }

    public function setDFechaInicio($dFechaInicio) {
        $this->dFechaInicio = $dFechaInicio;
    }

    public function setDFechaFin($dFechaFin) {
        $this->dFechaFin = $dFechaFin;
    }
    public function setNPromPorcentaje($nPromPorcentaje) {
        $this->nPromPorcentaje = $nPromPorcentaje;
    }

    public function setNPromCantidad($nPromCantidad) {
        $this->nPromCantidad = $nPromCantidad;
    }

    public function setNPromDescuento($nPromDescuento) {
        $this->nPromDescuento = $nPromDescuento;
    }

    public function setCPromFoto($cPromFoto) {
        $this->cPromFoto = $cPromFoto;
    }

    
    //GETTERS
    public function getNPromId() {
        return $this->nPromId;
    }

    public function getCProDescripcion() {
        return $this->cProDescripcion;
    }

    public function getNPromEstado() {
        return $this->nPromEstado;
    }

    public function getDFechaInicio() {
        return $this->dFechaInicio;
    }

    public function getDFechaFin() {
        return $this->dFechaFin;
    }
    public function getNPromPorcentaje() {
        return $this->nPromPorcentaje;
    }

    public function getNPromCantidad() {
        return $this->nPromCantidad;
    }

    public function getNPromDescuento() {
        return $this->nPromDescuento;
    }

    public function getCPromFoto() {
        return $this->cPromFoto;
    }

        
    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }

    //FUNCIONES Set y Get
    function promocionIns() {
        $Accion = "";
        $Datos[0] = $Accion;
        $Datos[1] = $this->getCProDescripcion(); //1
        $Datos[2] = $this->getDFechaInicio(); //1
        $Datos[3] = $this->getDFechaFin(); //1
        
        $Datos[4] = $this->getNPromPorcentaje(); //1
        $Datos[5] = $this->getNPromCantidad(); //1
        $Datos[6] = $this->getNPromDescuento(); //1
        $Datos[7] = $this->getCPromFoto(); //1
        //$query = $this->db->query("CALL USP_PROM_I_PROMOCION(?,?,?,?)", $Datos);
        $query = $this->db->query("CALL USP_PROM_I_PROMOCION(?,?,?,?,?,?,?,?)", $Datos);
        return $query;
    }

    function qryPromocion() {
        $query = "call USP_PROM_S_PROMOCION()";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    function qryPromocionActivas() {
        $query = "call USP_PROM_S_PROMOCION_ACTIVAS()";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    
    function getPromocionxProducto($nProductoHueco){
        $query = "call USP_PROM_S_PROMOCION_GET($nProductoHueco)";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }

    /* function registrarAlmacenIns() {
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
      $query = $this->db->query("CALL USP_ALM_U_ALMACEN(?,?,?,?,?,?,?,?)", $Datos);
      return $query;
      }
     */
}

?>