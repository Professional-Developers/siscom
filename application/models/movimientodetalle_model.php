<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Movimientodetalle_model extends CI_Model {

    //Atributos de Clase
    private $nMovDetalleId = '';
    private $nMovDetalleCantidad = '';
    private $nMovDetallePrecio = '';
    private $nMovDetalleEstado = '';
    private $nProId = '';
    private $nMovId = '';
    private $nHuecoId = '';
    private $nPromId = '';
    
    
    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }

    //FUNCIONES Seters
    public function setNMovDetalleId($nMovDetalleId) {
        $this->nMovDetalleId = $nMovDetalleId;
    }

    public function setNMovDetalleCantidad($nMovDetalleCantidad) {
        $this->nMovDetalleCantidad = $nMovDetalleCantidad;
    }

    public function setNMovDetallePrecio($nMovDetallePrecio) {
        $this->nMovDetallePrecio = $nMovDetallePrecio;
    }

    public function setNMovDetalleEstado($nMovDetalleEstado) {
        $this->nMovDetalleEstado = $nMovDetalleEstado;
    }

    public function setNProId($nProId) {
        $this->nProId = $nProId;
    }

    public function setNMovId($nMovId) {
        $this->nMovId = $nMovId;
    }

    public function setNHuecoId($nHuecoId) {
        $this->nHuecoId = $nHuecoId;
    }

    public function setNPromId($nPromId) {
        $this->nPromId = $nPromId;
    }

    
    //funciones getter
    public function getNMovDetalleId() {
        return $this->nMovDetalleId;
    }

    public function getNMovDetalleCantidad() {
        return $this->nMovDetalleCantidad;
    }

    public function getNMovDetallePrecio() {
        return $this->nMovDetallePrecio;
    }

    public function getNMovDetalleEstado() {
        return $this->nMovDetalleEstado;
    }

    public function getNProId() {
        return $this->nProId;
    }

    public function getNMovId() {
        return $this->nMovId;
    }

    public function getNHuecoId() {
        return $this->nHuecoId;
    }

    public function getNPromId() {
        return $this->nPromId;
    }


        
    

}

?>