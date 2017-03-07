<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Movimiento_model extends CI_Model {

    //Atributos de Clase
    private $nMovId = '';
    private $nTipoMovimiento = '';
    private $dMovFecha = '';
    private $nTipoDocumento = '';
    private $cMovNumDocumento = '';
    private $cMovEstado = '';
    private $nUsuario = '';
    private $nMovSubTotal = '';
    private $nMovIgv = '';
    private $nMovTotal = '';
    private $nPerIdResponsable = '';
    private $nSurIdOrigen = '';
    private $nSurIdDestino = '';
    private $cMovDestino = '';
    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }

    //FUNCIONES Seters
    public function setNMovId($nMovId) {
        $this->nMovId = $nMovId;
    }

    public function setNTipoMovimiento($nTipoMovimiento) {
        $this->nTipoMovimiento = $nTipoMovimiento;
    }

    public function setDMovFecha($dMovFecha) {
        $this->dMovFecha = $dMovFecha;
    }

    public function setNTipoDocumento($nTipoDocumento) {
        $this->nTipoDocumento = $nTipoDocumento;
    }

    public function setCMovNumDocumento($cMovNumDocumento) {
        $this->cMovNumDocumento = $cMovNumDocumento;
    }

    public function setCMovEstado($cMovEstado) {
        $this->cMovEstado = $cMovEstado;
    }

    public function setNUsuario($nUsuario) {
        $this->nUsuario = $nUsuario;
    }

    public function setNMovSubTotal($nMovSubTotal) {
        $this->nMovSubTotal = $nMovSubTotal;
    }

    public function setNMovIgv($nMovIgv) {
        $this->nMovIgv = $nMovIgv;
    }

    public function setNMovTotal($nMovTotal) {
        $this->nMovTotal = $nMovTotal;
    }

    public function setNPerIdResponsable($nPerIdResponsable) {
        $this->nPerIdResponsable = $nPerIdResponsable;
    }

    public function setNSurIdOrigen($nSurIdOrigen) {
        $this->nSurIdOrigen = $nSurIdOrigen;
    }

    public function setNSurIdDestino($nSurIdDestino) {
        $this->nSurIdDestino = $nSurIdDestino;
    }
    
    public function setCMovDestino($cMovDestino) {
        $this->cMovDestino = $cMovDestino;
    }

        //funciones getter
    public function getNMovId() {
        return $this->nMovId;
    }

    public function getNTipoMovimiento() {
        return $this->nTipoMovimiento;
    }

    public function getDMovFecha() {
        return $this->dMovFecha;
    }

    public function getNTipoDocumento() {
        return $this->nTipoDocumento;
    }

    public function getCMovNumDocumento() {
        return $this->cMovNumDocumento;
    }

    public function getCMovEstado() {
        return $this->cMovEstado;
    }

    public function getNUsuario() {
        return $this->nUsuario;
    }

    public function getNMovSubTotal() {
        return $this->nMovSubTotal;
    }

    public function getNMovIgv() {
        return $this->nMovIgv;
    }

    public function getNMovTotal() {
        return $this->nMovTotal;
    }

    public function getNPerIdResponsable() {
        return $this->nPerIdResponsable;
    }

    public function getNSurIdOrigen() {
        return $this->nSurIdOrigen;
    }

    public function getNSurIdDestino() {
        return $this->nSurIdDestino;
    }
    
    public function getCMovDestino() {
        return $this->cMovDestino;
    }

        /*public function pruebas($objProducto){
        
    }*/
        
    

}

?>