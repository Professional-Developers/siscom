<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Productodetalle_model extends CI_Model {

    //Atributos de Clase
    private $nProdDetalleId='';
    private $nMulId='';
    private $nProId='';
    private $nProdDetEstado='';

    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }

    //FUNCIONES Seters
    public function setNProdDetalleId($nProdDetalleId) {
        $this->nProdDetalleId = $nProdDetalleId;
    }

    public function setNMulId($nMulId) {
        $this->nMulId = $nMulId;
    }

    public function setNProId($nProId) {
        $this->nProId = $nProId;
    }

    public function setNProdDetEstado($nProdDetEstado) {
        $this->nProdDetEstado = $nProdDetEstado;
    }

    
    //funciones getter
    public function getNProdDetalleId() {
        return $this->nProdDetalleId;
    }

    public function getNMulId() {
        return $this->nMulId;
    }

    public function getNProId() {
        return $this->nProId;
    }

    public function getNProdDetEstado() {
        return $this->nProdDetEstado;
    }

        
    /**/
    
    function qryProductoDetalle($idprodHueco) {
        $query = "call USP_PRO_S_PRODUCTO_DETALLE($idprodHueco)";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    function getProductoDetalleActivos($idprodHueco) {
        $query = "call USP_PRO_S_PRODUCTO_DETALLE_ACTIVOS($idprodHueco)";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }

    function detalleProductoIns() {
        $Accion = "";
        $Datos[0] = $Accion;
        $Datos[1] = $this->getNProId(); //1
        $Datos[2] = $this->getNMulId(); //1

        $query = $this->db->query("CALL USP_PRO_I_DETALLE_PRODUCTO(?,?,?)", $Datos);
        $this->db->close();
        //return $query;
        if($query){
            $query = $query->result_array();
            $this->setNProdDetalleId($query[0]['nProdDetalleId']);
            return true;
        }else{
            return false;
        }
    }
    
    function eliminarDetProducto($ncodigo) {
        //$query = "call USP_ALM_D_ALMACEN(" . $ncodigo . ")";
        $query = "call USP_PRO_D_DETALLE_PRODUCTO(" . $ncodigo . ")";
        $query2 = $this->db->query($query);
        return $query2;
    }

}

?>