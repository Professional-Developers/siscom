<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Productohueco_model extends CI_Model {

    //Atributos de Clase
    private $nProductoHueco = '';
    private $nCantidad = '';
    private $idHueco = '';
    private $nProId = '';
    private $nProHueEstado = '';

    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }

    //FUNCIONES Seters
    public function setNProductoHueco($nProductoHueco) {
        $this->nProductoHueco = $nProductoHueco;
    }

    public function setNCantidad($nCantidad) {
        $this->nCantidad = $nCantidad;
    }

    public function setIdHueco($idHueco) {
        $this->idHueco = $idHueco;
    }

    public function setNProId($nProId) {
        $this->nProId = $nProId;
    }
    
    public function setNProHueEstado($nProHueEstado) {
        $this->nProHueEstado = $nProHueEstado;
    }

        //funciones getter

    public function getNProductoHueco() {
        return $this->nProductoHueco;
    }

    public function getNCantidad() {
        return $this->nCantidad;
    }

    public function getIdHueco() {
        return $this->idHueco;
    }

    public function getNProId() {
        return $this->nProId;
    }
    public function getNProHueEstado() {
        return $this->nProHueEstado;
    }

        
    /**/

    /* function qryProductoDetalle($idprod) {
      $query = "call USP_PRO_S_PRODUCTO_DETALLE($idprod)";
      $query2 = $this->db->query($query);
      if ($query2->num_rows() > 0) {
      return $query2->result_array(); //sirve para mandar los datos
      } else {
      return false;
      }
      } */

    function productoHuecoIns() {
        $Accion = "";
        $Datos[0] = $Accion;
        $Datos[1] = $this->getNProId(); //1
        $Datos[2] = $this->getIdHueco(); //1
        $Datos[3] = $this->getNCantidad(); //1

        $query = $this->db->query("CALL USP_PRO_I_PRODUCTO_HUECO(?,?,?,?)", $Datos);
        $this->db->close();
        //return $query;
        if ($query) {
            $query = $query->result_array();
            $this->setNProductoHueco($query[0]['nProductoHueco']);
            return true;
        } else {
            return false;
        }
    }

    function qryProductoHueco($idProducto) {
        $query = "call USP_PRO_S_PRODUCTO_HUECO($idProducto)";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    
    function getProductoHueco($nProdHueco){
        $query = "call USP_PRO_S_GET_PRODUCTO_HUECO($nProdHueco)";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }

}

?>