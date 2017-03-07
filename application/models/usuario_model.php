<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* Autogenered Developed by @jvinceso */
/* Date : 29-04-2013 18:36:43 */

class Usuario_model extends CI_Model {

    //Atributos de Clase
    private $nUsuCodigo = '';
    private $nPerId = '';
    private $cUsuUsuario = '';
    private $cUsuClave = '';
    private $cUsuEstado = '';
    private $cUsuTipo = '';
    private $cUsuDescTipo = '';
    private $nSurId = '';
    private $cSurNombre = '';

    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }

    //FUNCIONES Set
    function set_nUsuCodigo($nUsuCodigo) {
        $this->nUsuCodigo = $nUsuCodigo;
    }

    function set_nPerId($nPerId) {
        $this->nPerId = $nPerId;
    }

    function set_cUsuUsuario($cUsuUsuario) {
        $this->cUsuUsuario = $cUsuUsuario;
    }

    function set_cUsuClave($cUsuClave) {
        $this->cUsuClave = $cUsuClave;
    }

    function set_cUsuEstado($cUsuEstado) {
        $this->cUsuEstado = $cUsuEstado;
    }

    function set_cUsuTipo($cUsuTipo) {
        $this->cUsuTipo = $cUsuTipo;
    }

    function set_cUsuDescTipo($cUsuDescTipo) {
        $this->cUsuDescTipo = $cUsuDescTipo;
    }
    
    function set_nSurId($nSurId) {
        $this->nSurId = $nSurId;
    }
    function set_cSurNombre($cSurNombre) {
        $this->cSurNombre = $cSurNombre;
    }

        
        //FUNCIONES Get
    function get_nUsuCodigo() {
        return $this->nUsuCodigo;
    }

    function get_nPerId() {
        return $this->nPerId;
    }

    function get_cUsuUsuario() {
        return $this->cUsuUsuario;
    }

    function get_cUsuClave() {
        return $this->cUsuClave;
    }

    function get_cUsuEstado() {
        return $this->cUsuEstado;
    }

    function get_cUsuTipo() {
        return $this->cUsuTipo;
    }

    function get_cUsuDescTipo() {
        return $this->cUsuDescTipo;
    }
    
    function get_nSurId() {
        return $this->nSurId;
    }
    function get_cSurNombre() {
        return $this->cSurNombre;
    }

    
    
    public function comboTipoUserGet() {
        $result = $this->db->query("CALL USP_S_COMBOS_MULTITABLA (?,?)", array(4, 'LTU'));
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return null;
        }
    }

    //Obtener Objeto USUARIO
    function get_ObjUsuario($nUsuCodigo) {
        //$query = $this->db->query("SELECT * FROM usuario WHERE nUsuCodigo=?", array($nUsuCodigo));
        /* $query = $this->db->query("select u.*,m.nMulId,m.cMulDescripcion from usuario u
          inner join multitabla m on u.cUsuTipo=m.nMulId
          where nUsuCodigo=?", array($nUsuCodigo)); */
        
        /*$query = $this->db->query("select u.*,m.nMulId,m.cMulDescripcion, s.cSurNombre
                                           from usuario u 
                                           inner join multitabla m on u.cUsuTipo=m.nMulId 
                                           inner join sucursal s on s.nSurId=u.nSurId 
                                           where nUsuCodigo=?", array($nUsuCodigo));*/
        $query = $this->db->query("select u.*,m.nMulId,m.cMulDescripcion, s.cSurNombre,s.nSurId
                                           from usuario u 
                                           inner join multitabla m on u.cUsuTipo=m.nMulId 
                                           inner join persona p on p.nPerId=u.nPerId
                                           inner join sucursal s on s.nSurId=p.nSurId 
                                           where nUsuCodigo=?", array($nUsuCodigo));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            //CREANDO EL OBJETO
            $this->set_nUsuCodigo($row->nUsuCodigo);
            $this->set_nPerId($row->nPerId);
            $this->set_cUsuUsuario($row->cUsuUsuario);
            $this->set_cUsuClave($row->cUsuClave);
            $this->set_cUsuEstado($row->cUsuEstado);
            $this->set_cUsuTipo($row->cUsuTipo);
            $this->set_cUsuDescTipo($row->cMulDescripcion);
            $this->set_nSurId($row->nSurId);
            $this->set_cSurNombre($row->cSurNombre);
        }
    }

    function autenticar($usuario, $clave) {
        // echo "SELECT * FROM usuario WHERE cUsuUsuario=$usuario AND cUsuClave=$clave";exit();
        //$query = $this->db->query("SELECT * FROM usuario WHERE cUsuUsuario=? AND cUsuClave=?", array( trim($usuario), trim($clave) )); 
        $query = $this->db->query("SELECT * FROM usuario U
                INNER JOIN persona P ON P.nPerId=U.nPerId
                WHERE 
                P.cPerEstado=1 AND
                U.cUsuUsuario=? AND U.cUsuClave=?"
                , array(trim($usuario), trim($clave)));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->get_ObjUsuario($row->nUsuCodigo);
            return true;
        }
        return false;
    }

    public function insUsuario() {
        //$sql = "CALL USP_USU_I_REGISTRAR('".$this->get_nPerId() ."','".$this->get_cUsuUsuario()."','".md5($this->get_cUsuClave())."','".$this->get_cUsuTipo()."')";
        $sql = "CALL USP_USU_I_REGISTRAR('" . $this->get_nPerId() . "','" . $this->get_cUsuUsuario() . "','" . $this->get_cUsuClave() . "','" . $this->get_cUsuTipo() . "')";
        $query = $this->db->query($sql);
        return $query;
    }

    public function updateclave($idusu, $clave) {
        $sql = "UPDATE usuario SET cUsuClave='" . trim($clave) . "' WHERE nUsuCodigo = $idusu";
        // echo $sql;exit();
        $query = $this->db->query($sql);
        if ($query) {
            return true;
        }
        return false;
    }

}

?>