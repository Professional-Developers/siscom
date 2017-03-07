<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Producto_model extends CI_Model {

    //Atributos de Clase
    private $nProId = '';
    private $cProDescripcion = '';
    private $nModeloId = '';
    private $nProPrecioReferencial = '';
    private $nProEstado = '';
    private $nCatId = '';

    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }

    //FUNCIONES Seters
    public function setNProId($nProId) {
        $this->nProId = $nProId;
    }

    public function setCProDescripcion($cProDescripcion) {
        $this->cProDescripcion = $cProDescripcion;
    }

    public function setNModeloId($nModeloId) {
        $this->nModeloId = $nModeloId;
    }

    public function setNProPrecioReferencial($nProPrecioReferencial) {
        $this->nProPrecioReferencial = $nProPrecioReferencial;
    }

    public function setNProEstado($nProEstado) {
        $this->nProEstado = $nProEstado;
    }

    public function setNCatId($nCatId) {
        $this->nCatId = $nCatId;
    }

    //funciones getter
    public function getNProId() {
        return $this->nProId;
    }

    public function getCProDescripcion() {
        return $this->cProDescripcion;
    }

    public function getNModeloId() {
        return $this->nModeloId;
    }

    public function getNProPrecioReferencial() {
        return $this->nProPrecioReferencial;
    }

    public function getNProEstado() {
        return $this->nProEstado;
    }

    public function getNCatId() {
        return $this->nCatId;
    }

    /* productos totales */

    function qryProducto() {
        $query = "call USP_PRO_S_PRODUCTOS()";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }

    /* productos eliminados */

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

    /* datos para editar producto */

    function getProductoHueco($nProdHueco) {
        $query = "call USP_PRO_S_PRODUCTO_GET($nProdHueco)";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }

    /* datos para editar producto */

    /* function ProductoIns() {
      $Accion = "";
      $Datos[0] = $Accion;
      $Datos[1] = $this->getCProDescripcion(); //1
      $Datos[2] = $this->getNModeloId(); //1
      $Datos[3] = $this->getNProPrecioReferencial(); //1

      $query = $this->db->query("CALL USP_PRO_I_PRODUCTO(?,?,?,?)", $Datos);
      return $query;
      } */
    /* function ProductoInsTodo($pam1,$pam2){
      print "<pre>".print_r($pam1,true)."</pre>";
      print "<pre>".print_r($pam2,true)."</pre>";
      echo $pam1->getNCantidad();
      echo "<br/>".$pam2->getNTipoMovimiento();
      exit;
      } */

    function ProductoIns($obj1, $obj2, $obj3) {
        $Accion = "";
        $Datos[0] = $Accion;
        $Datos[1] = $this->getCProDescripcion(); //1
        $Datos[2] = $this->getNModeloId(); //2
        $Datos[3] = $this->getNProPrecioReferencial(); //3
        $Datos[4] = $this->getNProEstado(); //4
        $Datos[5] = $this->getNCatId(); //5
        $Datos[6] = $obj1->getNCantidad(); //6
        $Datos[7] = $obj1->getNProHueEstado(); //7
        $Datos[8] = $obj2->getNTipoMovimiento(); //8
        $Datos[9] = $obj2->getDMovFecha(); //9
        $Datos[10] = $obj2->getNTipoDocumento(); //10
        $Datos[11] = $obj2->getCMovNumDocumento(); //11
        $Datos[12] = $obj2->getCMovEstado(); //12
        $Datos[13] = $obj2->getNUsuario(); //13
        $Datos[14] = $obj2->getNMovSubTotal(); //14
        $Datos[15] = $obj2->getNMovIgv(); //15
        $Datos[16] = $obj2->getNMovTotal(); //16
        $Datos[17] = $obj2->getNPerIdResponsable(); //17
        $Datos[18] = $obj2->getNSurIdOrigen(); //18
        $Datos[19] = $obj2->getNSurIdDestino(); //19
        $Datos[20] = $obj3->getNMovDetalleCantidad(); //20
        $Datos[21] = $obj3->getNMovDetallePrecio(); //21
        $Datos[22] = $obj3->getNMovDetalleEstado(); //22
        $Datos[23] = $obj3->getNProId(); //23
        $Datos[24] = $obj3->getNMovId(); //24
        $Datos[25] = $obj3->getNHuecoId(); //25
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
            ?,
            ?
            )", $Datos);
        //return $query;
        //$query = $this->db->query("CALL USP_MUL_I_HIJOS2(?,?,?,?)", $Datos);
        $this->db->close();
        if ($query) {
            $query = $query->result_array();
            $this->setNProId($query[0]['nProdIns']);
            return true;
        } else {
            return false;
        }
    }

    /* 2806 */

    function ProductoUpd($obj1, $obj2, $obj3) {
        $Accion = "";
        $Datos[0] = $Accion;
        $Datos[1] = $this->getCProDescripcion(); //1
        $Datos[2] = $this->getNModeloId(); //2
        $Datos[3] = $this->getNProPrecioReferencial(); //3
        $Datos[4] = $this->getNProEstado(); //4
        $Datos[5] = $this->getNCatId(); //5
        $Datos[6] = $obj1->getNCantidad(); //6
        $Datos[7] = $obj1->getNProHueEstado(); //7
        $Datos[8] = $obj2->getNTipoMovimiento(); //8
        $Datos[9] = $obj2->getDMovFecha(); //9
        $Datos[10] = $obj2->getNTipoDocumento(); //10
        $Datos[11] = $obj2->getCMovNumDocumento(); //11
        $Datos[12] = $obj2->getCMovEstado(); //12
        $Datos[13] = $obj2->getNUsuario(); //13
        $Datos[14] = $obj2->getNMovSubTotal(); //14
        $Datos[15] = $obj2->getNMovIgv(); //15
        $Datos[16] = $obj2->getNMovTotal(); //16
        $Datos[17] = $obj2->getNPerIdResponsable(); //17
        $Datos[18] = $obj2->getNSurIdOrigen(); //18
        $Datos[19] = $obj2->getNSurIdDestino(); //19
        $Datos[20] = $obj3->getNMovDetalleCantidad(); //20
        $Datos[21] = $obj3->getNMovDetallePrecio(); //21
        $Datos[22] = $obj3->getNMovDetalleEstado(); //22
        $Datos[23] = $obj3->getNProId(); //23
        $Datos[24] = $obj3->getNMovId(); //24
        $Datos[25] = $obj3->getNHuecoId(); //25
        $Datos[26] = $this->getNProId(); //26
        $Datos[27] = $obj1->getNProductoHueco(); //27
        //$Datos[25] = $obj3->getNPromId(); //

        $query = $this->db->query("CALL USP_PRO_U_PRODUCTO_ACTUALIZAR(
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
            ?,
            ?,
            ?,
            ?
            )", $Datos);
        //return $query;
        //$query = $this->db->query("CALL USP_MUL_I_HIJOS2(?,?,?,?)", $Datos);
        $this->db->close();
        if ($query) {
            $query = $query->result_array();
            $this->setNProId($query[0]['nProdUpd']);
            return true;
        } else {
            return false;
        }
    }

    /* 2806 */

    function qryProductoIns($idproducto) {
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
    
    function qryProductoMiStanVendidos($idSucursal) {
        $query = "call USP_PRO_S_PRODUCTOS_X_STAND_VENDIDOS($idSucursal)";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }

    //

    function derivarProducto($obj1, $obj2) {
        $Accion = "";
        $Datos[0] = $Accion; //0
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
        if ($query) {
            $query = $query->result_array();
            $this->setNProId($query[0]['nProdIns']);
            return true;
        } else {
            return false;
        }
    }

    function optRecibirProducto($obj1, $obj2, $obj3) {
        /* $query = "call USP_PRO_U_PRODUCTO_RECIBIR(" . $codProductoHueco .",".$idsuc .")";
          $query2 = $this->db->query($query);
          return $query2; */
        $Accion = "";
        $Datos[0] = $Accion; //0
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
        if ($query) {
            $query = $query->result_array();
            $this->setNProId($query[0]['nProdIns']);
            return true;
        } else {
            return false;
        }
    }

    function optPrestamoProducto($obj1, $obj2, $obj3) {
        /* $query = "call USP_PRO_U_PRODUCTO_RECIBIR(" . $codProductoHueco .",".$idsuc .")";
          $query2 = $this->db->query($query);
          return $query2; */
        $Accion = "";
        $Datos[0] = $Accion; //0
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
        if ($query) {
            $query = $query->result_array();
            $this->setNProId($query[0]['nProdIns']);
            return true;
        } else {
            return false;
        }
    }

    /* Devolver Producto */

    function optRetornarProducto($obj1, $obj2, $obj3) {
        /* $query = "call USP_PRO_U_PRODUCTO_RECIBIR(" . $codProductoHueco .",".$idsuc .")";
          $query2 = $this->db->query($query);
          return $query2; */
        $Accion = "";
        $Datos[0] = $Accion; //0
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
        if ($query) {
            $query = $query->result_array();
            $this->setNProId($query[0]['nProdIns']);
            return true;
        } else {
            return false;
        }
    }

    /**/

    function fndProducto($variable1) {
        $query = "call USP_PRO_S_FND_PRODUCTOS($variable1)";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }

    /* 0307 */

    public function completar_pedido($datos) {
        //$insert = $this->db->insert('pedidos', $datos);
        $insert = $this->db->insert('movimiento', $datos);
        if ($insert)
            return $this->db->insert_id();
        return FALSE;
    }

    public function completar_detalle_pedido($carrito, $id_movimiento) {
        $cadenaProductos = "";
        //$cadenaPrecios="";
        $cadenaDescuentos="";
        $cadenaSubTotalFinal="";
        
        //$contador=1;
        foreach ($carrito as $item) {
            /*
            $cadenaProductos = $cadenaProductos+$contador+"-"+$item["nProductoHueco"] + ",";
            $cadenaPrecios   = $cadenaProductos+$contador+"-"+$item["precio"] + ",";*/
            $cadenaProductos        = $cadenaProductos.$item["nProductoHueco"] . "-";
            $cadenaSubTotalFinal    = $cadenaSubTotalFinal.$item["subtotalfinal"] . "-";
            //$cadenaSubTotalFinal   = $cadenaDescuentos.$item["precio"] . "-";
            //$contador++;
        }
        $cadenaProductos = trim($cadenaProductos, '-');
        //$cadenaPrecios = trim($cadenaPrecios, '-');
        $cadenaSubTotalFinal = trim($cadenaSubTotalFinal, '-');
        
            /* $datos = array(
              "nMovDetalleCantidad" => $item["cantidad"],
              "nMovDetallePrecio" => $item["precio"],
              "cMovDetalleEstado" => $id_pedido,
              "nProId" => $item["id_producto"],
              "nMovId" => $item["id_producto"],
              "nHuecoId" => $item["id_producto"],
              "nProductoHueco" => $item["id_producto"]
              );
              $insert = $this->db->insert('detalle_pedidos', $datos);
              if(!$insert) return FALSE;
              }
              return TRUE; */
            $Accion = "";
            $Datos[0] = $Accion; //0
            $Datos[1] = 1; //1 nMovDetalleCantidad
            $Datos[2] = $cadenaSubTotalFinal; //2 nMovDetallePrecio
            $Datos[3] = 'V'; //3 cMovDetalleEstado
            $Datos[4] = ""; //4 nProId
            $Datos[5] = $id_movimiento; //5 nMovId
            $Datos[6] = ""; //6 nHuecoId
            $Datos[7] = $cadenaProductos; //7 nProductoHueco
            $query = $this->db->query("CALL USP_PRO_I_PRODUCTO_VENDER(
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?
            )", $Datos);
            $this->db->close();
            if ($query) {
                $query = $query->result_array();
                $this->setNProId($query[0]['nProdIns']);
                return true;
            } else {
                return false;
            }
            
        //}
    }

    /* public function completar_detalle_pedido($carrito, $id_pedido)
      {
      foreach ($carrito as $item) {
      $datos = array(
      "cantidad" => $item["cantidad"],
      "precio" => $item["precio"],
      "Pedidos_id" => $id_pedido,
      "Productos_id" => $item["id_producto"]
      );
      $insert = $this->db->insert('detalle_pedidos', $datos);
      if(!$insert) return FALSE;
      }
      return TRUE;
      } */
}

?>