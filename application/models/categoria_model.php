<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categoria_model extends CI_Model {

    //Atributos de Clase
    private $nModeloId = '';
    private $nModCodigo = '';
    private $nModEstado = '';
    private $cModDescripcion = '';

    

        

    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }

    //FUNCIONES Set y Get
/*
    function qryModelo() {
        $query = "call USP_MOD_S_MODELO()";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
  */  
    function qryCategoriaActivas() {
        //$query = "call USP_MOD_S_MODELO_ACTIVAS()";
        $query = "call USP_CAT_S_CATEGORIA_ACTIVAS()";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
/*
    function getDatos($id) {
        $query = "call USP_MOD_S_MODELO_GET('" . $id . "')";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }*/




}

?>