<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hueco_model extends CI_Model {

    //Atributos de Clase
    private $nHuecoId = '';
    private $nIdRepisa = '';
    private $nIdFila = '';
    private $nIdColumna = '';
    private $nIdCelda = '';
    private $nHueEstado = '';
    private $nAlmId = '';
    private $cHueNombre = '';

    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }

    //FUNCIONES Seters
    public function setNIdRepisa($nIdRepisa) {
        $this->nIdRepisa = $nIdRepisa;
    }

    public function setNHuecoId($nHuecoId) {
        $this->nHuecoId = $nHuecoId;
    }

    public function setNIdFila($nIdFila) {
        $this->nIdFila = $nIdFila;
    }

    public function setNIdColumna($nIdColumna) {
        $this->nIdColumna = $nIdColumna;
    }

    public function setNIdCelda($nIdCelda) {
        $this->nIdCelda = $nIdCelda;
    }

    public function setNHueEstado($nHueEstado) {
        $this->nHueEstado = $nHueEstado;
    }

    public function setNAlmId($nAlmId) {
        $this->nAlmId = $nAlmId;
    }

    public function setCHueNombre($cHueNombre) {
        $this->cHueNombre = $cHueNombre;
    }

    //Getters
    public function getNIdRepisa() {
        return $this->nIdRepisa;
    }

    public function getNHuecoId() {
        return $this->nHuecoId;
    }

    public function getNIdFila() {
        return $this->nIdFila;
    }

    public function getNIdColumna() {
        return $this->nIdColumna;
    }

    public function getNIdCelda() {
        return $this->nIdCelda;
    }

    public function getNHueEstado() {
        return $this->nHueEstado;
    }

    public function getNAlmId() {
        return $this->nAlmId;
    }

    public function getCHueNombre() {
        return $this->cHueNombre;
    }

    /**/

    function qryHueco() {
        $query = "call USP_HUE_S_HUECOS()";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    function qryHuecoDel() {
        $query = "call USP_HUE_S_HUECOS_DEL()";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    
    function qryHuecoAlmacen() {
        $idalm = $this->getNAlmId();
        $query = "call USP_HUE_S_HUECO_ALMACEN($idalm)";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }

    function HuecoIns() {
        $Accion = "";
        $Datos[0] = $Accion;
        $Datos[1] = $this->getCHueNombre(); //1
        $Datos[2] = $this->getNIdRepisa(); //1
        $Datos[3] = $this->getNIdFila(); //1
        $Datos[4] = $this->getNIdColumna(); //1
        $Datos[5] = $this->getNIdCelda(); //1
        $Datos[6] = $this->getNAlmId(); //1

        $query = $this->db->query("CALL USP_HUE_I_HUECO(?,?,?,?,?,?,?)", $Datos);
        return $query;
    }

    function eliminarHueco($ncodigo) {
        $query = "call USP_HUE_D_HUECO(" . $ncodigo . ")";
        $query2 = $this->db->query($query);
        return $query2;
    }

    function getDatos($id) {
        $query = "call USP_HUE_S_HUECO_GET('" . $id . "')";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }

    function updHueco() {
        $Accion = "";
        $Datos[0] = $Accion;
        $Datos[1] = $this->getCHueNombre(); //1
        $Datos[2] = $this->getNIdRepisa(); //1
        $Datos[3] = $this->getNIdFila(); //1
        $Datos[4] = $this->getNIdColumna(); //1
        $Datos[5] = $this->getNIdCelda(); //1
        $Datos[6] = $this->getNAlmId(); //1
        $Datos[7] = $this->getNHuecoId(); //1

        $query = $this->db->query("CALL USP_HUE_U_HUECO(?,?,?,?,?,?,?,?)", $Datos);
        return $query;
    }

}

?>