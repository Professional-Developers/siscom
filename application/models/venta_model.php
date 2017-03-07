<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Venta_model extends CI_Model {

    //Atributos de Clase
    
    
    
    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }

    

    /*productos totales*/
    function qryProducto() {
        $query = "call USP_PRO_S_PRODUCTOS()";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    /*productos eliminados*/
    function qryProductoDel() {
        //Todos los productos
        $query = "call USP_PRO_S_PRODUCTOS_ELIMINADOS()";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    
    function eliminarProducto($ncodigo) {
        //$query = "call USP_ALM_D_ALMACEN(" . $ncodigo . ")";
        $query = "call USP_PRO_D_PRODUCTO(" . $ncodigo . ")";
        $query2 = $this->db->query($query);
        return $query2;
    }
    
    
    
    
    
    
    
    
    function qryProductoActivas() {
        $query = "call USP_PRO_S_PRODUCTOS_ACTIVAS()";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    
    /*datos para editar producto*/
    function getProductoHueco($nProdHueco) {
        $query = "call USP_PRO_S_PRODUCTO_GET($nProdHueco)";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    /*datos para editar producto*/
    
    /*function ProductoIns() {
        $Accion = "";
        $Datos[0] = $Accion;
        $Datos[1] = $this->getCProDescripcion(); //1
        $Datos[2] = $this->getNModeloId(); //1
        $Datos[3] = $this->getNProPrecioReferencial(); //1

        $query = $this->db->query("CALL USP_PRO_I_PRODUCTO(?,?,?,?)", $Datos);
        return $query;
    }*/
    /*function ProductoInsTodo($pam1,$pam2){
        print "<pre>".print_r($pam1,true)."</pre>";
        print "<pre>".print_r($pam2,true)."</pre>";
        echo $pam1->getNCantidad();
        echo "<br/>".$pam2->getNTipoMovimiento();
        exit;
    }*/
    function ProductoIns($obj1,$obj2,$obj3) {
        $Accion = "";
        $Datos[0] = $Accion;
        $Datos[1] = $this->getCProDescripcion(); //1
        $Datos[2] = $this->getNModeloId(); //2
        $Datos[3] = $this->getNProPrecioReferencial(); //3
        $Datos[4] = $this->getNProEstado(); //4
        $Datos[5] = $obj1->getNCantidad(); //5
        $Datos[6] = $obj1->getNProHueEstado(); //6
        $Datos[7] = $obj2->getNTipoMovimiento(); //7
        $Datos[8] = $obj2->getDMovFecha(); //8
        $Datos[9] = $obj2->getNTipoDocumento(); //9
        $Datos[10] = $obj2->getCMovNumDocumento(); //10
        $Datos[11] = $obj2->getCMovEstado(); //11
        $Datos[12] = $obj2->getNUsuario(); //12
        $Datos[13] = $obj2->getNMovSubTotal(); //13
        $Datos[14] = $obj2->getNMovIgv(); //14
        $Datos[15] = $obj2->getNMovTotal(); //15
        $Datos[16] = $obj2->getNPerIdResponsable(); //16
        $Datos[17] = $obj2->getNSurIdOrigen(); //17
        $Datos[18] = $obj2->getNSurIdDestino(); //18
        $Datos[19] = $obj3->getNMovDetalleCantidad(); //19
        $Datos[20] = $obj3->getNMovDetallePrecio(); //20
        $Datos[21] = $obj3->getNMovDetalleEstado(); //21
        $Datos[22] = $obj3->getNProId(); //22
        $Datos[23] = $obj3->getNMovId(); //23
        $Datos[24] = $obj3->getNHuecoId(); //24
        //$Datos[25] = $obj3->getNPromId(); //25

        $query = $this->db->query("CALL USP_PRO_I_PRODUCTO_INGRESO(
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?
            )", $Datos);
        //return $query;
        //$query = $this->db->query("CALL USP_MUL_I_HIJOS2(?,?,?,?)", $Datos);
        $this->db->close();
        if($query){
            $query = $query->result_array();
            $this->setNProId($query[0]['nProdIns']);
            return true;
        }else{
            return false;
        }
    }
    
    function qryProductoIns($idproducto){
        $Datos[0] = $idproducto;
        //$query = "call USP_PRO_S_PRODUCTOS_INSERTADO(?)",$Datos);
        //$query2 = $this->db->query($query);
        $query2 = $this->db->query("CALL USP_PRO_S_PRODUCTO_INGRESADO(?)", $Datos);
        $this->db->close();
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    
    
    function qryProductoMiStan($idSucursal) {
        $query = "call USP_PRO_S_PRODUCTOS_X_STAND($idSucursal)";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    function qryProductoMiStanxRecibir($idSucursal) {
        $query = "call USP_PRO_S_PRODUCTOS_X_STAND_X_RECIBIR($idSucursal)";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    function qryProductoMiStanEnviados($idSucursal) {
        $query = "call USP_PRO_S_PRODUCTOS_X_STAND_ENVIADOS($idSucursal)";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    function qryProductoMiStanPrestados($idSucursal) {
        $query = "call USP_PRO_S_PRODUCTOS_X_STAND_PRESTADOS($idSucursal)";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    //
    
    function derivarProducto($obj1,$obj2) {
        $Accion = "";
        $Datos[0] = $Accion;//0
        $Datos[1] = $obj1->getIdHueco(); //1
        $Datos[2] = $obj1->getNProductoHueco(); //2
        $Datos[3] = $obj2->getNTipoMovimiento(); //3
        $Datos[4] = $obj2->getDMovFecha(); //4
        $Datos[5] = $obj2->getNTipoDocumento(); //5
        $Datos[6] = $obj2->getCMovNumDocumento(); //6
        $Datos[7] = $obj2->getCMovEstado(); //7
        $Datos[8] = $obj2->getNUsuario(); //8
        $Datos[9] = $obj2->getNPerIdResponsable(); //9
        $Datos[10] = $obj2->getNSurIdOrigen(); //10
        $Datos[11] = $obj2->getNSurIdDestino(); //11
        $query = $this->db->query("CALL USP_PRO_I_PRODUCTO_DERIVAR(
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?
            )", $Datos);
        //echo $query;exit;
        //return $query;
        //$query = $this->db->query("CALL USP_MUL_I_HIJOS2(?,?,?,?)", $Datos);
        $this->db->close();
        if($query){
            $query = $query->result_array();
            $this->setNProId($query[0]['nProdIns']);
            return true;
        }else{
            return false;
        }
    }
    
    function optRecibirProducto($obj1,$obj2,$obj3){
        /*$query = "call USP_PRO_U_PRODUCTO_RECIBIR(" . $codProductoHueco .",".$idsuc .")";
        $query2 = $this->db->query($query);
        return $query2;*/
        $Accion = "";
        $Datos[0] = $Accion;//0
        $Datos[1] = $obj1->getNProductoHueco(); //2
        $Datos[2] = $obj1->getNProHueEstado(); //2
        $Datos[3] = $obj2->getNTipoMovimiento(); //3
        $Datos[4] = $obj2->getDMovFecha(); //4
        $Datos[5] = $obj2->getNTipoDocumento(); //5
        $Datos[6] = $obj2->getCMovNumDocumento(); //6
        $Datos[7] = $obj2->getCMovEstado(); //7
        $Datos[8] = $obj2->getNUsuario(); //8
        $Datos[9] = $obj2->getNPerIdResponsable(); //9
        $Datos[10] = $obj2->getNSurIdOrigen(); //10
        $Datos[11] = $obj2->getNSurIdDestino(); //11
        $Datos[12] = $obj3->getNMovDetalleEstado(); //11
        $query = $this->db->query("CALL USP_PRO_U_PRODUCTO_RECIBIR(
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?
            )", $Datos);
        //echo $query;exit;
        //return $query;
        //$query = $this->db->query("CALL USP_MUL_I_HIJOS2(?,?,?,?)", $Datos);
        $this->db->close();
        if($query){
            $query = $query->result_array();
            $this->setNProId($query[0]['nProdIns']);
            return true;
        }else{
            return false;
        }
    }
    
    function optPrestamoProducto($obj1,$obj2,$obj3){
        /*$query = "call USP_PRO_U_PRODUCTO_RECIBIR(" . $codProductoHueco .",".$idsuc .")";
        $query2 = $this->db->query($query);
        return $query2;*/
        $Accion = "";
        $Datos[0] = $Accion;//0
        $Datos[1] = $obj1->getNProductoHueco(); //2
        $Datos[2] = $obj1->getNProHueEstado(); //2
        $Datos[3] = $obj2->getNTipoMovimiento(); //3
        $Datos[4] = $obj2->getDMovFecha(); //4
        $Datos[5] = $obj2->getNTipoDocumento(); //5
        $Datos[6] = $obj2->getCMovNumDocumento(); //6
        $Datos[7] = $obj2->getCMovEstado(); //7
        $Datos[8] = $obj2->getNUsuario(); //8
        $Datos[9] = $obj2->getNPerIdResponsable(); //12
        $Datos[10] = $obj2->getNSurIdOrigen(); //13
        $Datos[11] = $obj2->getNSurIdDestino(); //14
        $Datos[12] = $obj2->getCMovDestino(); //15
        $Datos[13] = $obj3->getNMovDetalleEstado(); //18
        $query = $this->db->query("CALL USP_PRO_U_PRODUCTO_PRESTAR(
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?
            )", $Datos);
        //echo $query;exit;
        //return $query;
        //$query = $this->db->query("CALL USP_MUL_I_HIJOS2(?,?,?,?)", $Datos);
        $this->db->close();
        if($query){
            $query = $query->result_array();
            $this->setNProId($query[0]['nProdIns']);
            return true;
        }else{
            return false;
        }
    }
    /*Devolver Producto*/
    function optRetornarProducto($obj1,$obj2,$obj3){
        /*$query = "call USP_PRO_U_PRODUCTO_RECIBIR(" . $codProductoHueco .",".$idsuc .")";
        $query2 = $this->db->query($query);
        return $query2;*/
        $Accion = "";
        $Datos[0] = $Accion;//0
        $Datos[1] = $obj1->getNProductoHueco(); //2
        $Datos[2] = $obj1->getNProHueEstado(); //2
        $Datos[3] = $obj2->getNTipoMovimiento(); //3
        $Datos[4] = $obj2->getDMovFecha(); //4
        $Datos[5] = $obj2->getNTipoDocumento(); //5
        $Datos[6] = $obj2->getCMovNumDocumento(); //6
        $Datos[7] = $obj2->getCMovEstado(); //7
        $Datos[8] = $obj2->getNUsuario(); //8
        $Datos[9] = $obj2->getNPerIdResponsable(); //12
        $Datos[10] = $obj2->getNSurIdOrigen(); //13
        $Datos[11] = $obj2->getNSurIdDestino(); //14
        $Datos[12] = $obj2->getCMovDestino(); //15
        $Datos[13] = $obj3->getNMovDetalleEstado(); //18
        $query = $this->db->query("CALL USP_PRO_U_PRODUCTO_RETORNAR(
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?
            )", $Datos);
        //echo $query;exit;
        //return $query;
        //$query = $this->db->query("CALL USP_MUL_I_HIJOS2(?,?,?,?)", $Datos);
        $this->db->close();
        if($query){
            $query = $query->result_array();
            $this->setNProId($query[0]['nProdIns']);
            return true;
        }else{
            return false;
        }
    }
    
    /**/
    function fndProducto($variable1){
        $query = "call USP_PRO_S_FND_PRODUCTOS($variable1)";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }

}

?>