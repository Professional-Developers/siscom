<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Producto extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library("Carrito");
        if (!$this->session->userdata("carrito"))
            $this->session->set_userdata("carrito", array());
        $this->load->model('empresa_model', 'ObjEmpresa');
        $this->load->model('sucursal_model', 'ObjSucursal');
        $this->load->model('almacen_model', 'ObjAlmacen');
        $this->load->model('hueco_model', 'ObjHueco');
        $this->load->model('modelo_model', 'ObjModelo');
        $this->load->model('producto_model', 'ObjProducto');
        $this->load->model('productoHueco_model', 'ObjProductoHueco');
        $this->load->model('movimiento_model', 'ObjMovimiento');
        $this->load->model('movimientoDetalle_model', 'ObjMovimientoDetalle');
        $this->load->model('diccionario_model', 'ObjDiccionario'); //multitabla
        $this->load->model('caracteristicas_model', 'ObjCaracteristicas'); //multitabla
        $this->load->model('promocion_model', 'ObjPromocion'); //multitabla
        $this->load->model('promociondetalle_model', 'ObjPromDetalle'); //multitabla
        $this->load->model('categoria_model', 'ObjCategoria'); //multitabla
    }

    public function cargaInformacionEmpresa() {
        $data['informacion'] = $this->ObjEmpresa->qryEmpresa();
        $datos['nombreEmpresa'] = $data['informacion'][0]['cEmpNombre'];
        $datos['logoEmpresa'] = $data['informacion'][0]['cEmpLogoGrande'];
        if ($datos['nombreEmpresa'] == "")
            $datos['nombreEmpresa'] = "empresa";
        if ($datos['logoEmpresa'] == "")
            $datos['logoEmpresa'] = "sinEmpresa.jpg";
        return $datos;
    }

    public function index() {
        $this->loaders->verificaacceso();
        $data['modulo'] = 'Productos';
        $datos[] = $this->cargaInformacionEmpresa();
        $this->load->view('layout/header', $datos[0]);
        //$data['sucursal'] = $this->ObjSucursal->qrySucursalActivas();
        $data['modelo'] = $this->ObjModelo->qryModeloActivas();
        $data['categoria'] = $this->ObjCategoria->qryCategoriaActivas();
        $data['sucursal'] = $this->ObjSucursal->qrySucursalPrincipales();


        //$data['promocion'] = $this->ObjPromocion->qryPromocionActivas();
        //print_r($data['sucursal']);exit;
        $this->load->view('producto/panel_view', $data);
        $this->load->view('layout/footer');
    }

    function cboDiccionarioGet($Parametros, $Config) {
        $datos = $this->ObjDiccionario->cboDiccionarioGet($Parametros, $Config);
        return $datos;
    }

    function productoIns() {
        //extract($_POST);
        foreach ($_POST as $key => $value) {
            if (empty($value)) {
                //echo "<strong>El campo $key esta vacío.:.</strong>";
                //return 3;
                echo "r";
                exit;
            }
        }
        extract($_POST);
        $this->ObjProducto->setCProDescripcion($txt_cProDescripcion); //1
        $this->ObjProducto->setNModeloId($cboIdModelo); //2
        $this->ObjProducto->setNProPrecioReferencial($txt_nProPrecioReferencial); //3
        $this->ObjProducto->setNProEstado(1); //4
        $this->ObjProducto->setNCatId($cboIdCategoria); //5
        $this->ObjProductoHueco->setNCantidad($txt_nCantidad); //6
        $this->ObjProductoHueco->setNProHueEstado(1); //7
        $this->ObjMovimiento->setNTipoMovimiento(1); //8
        $this->ObjMovimiento->setDMovFecha(""); //9
        $this->ObjMovimiento->setNTipoDocumento(""); //10
        $this->ObjMovimiento->setCMovNumDocumento(""); //11
        $this->ObjMovimiento->setCMovEstado(1); //12
        $this->ObjMovimiento->setNUsuario($this->session->userdata('IdUsuario')); //13
        $this->ObjMovimiento->setNMovSubTotal(""); //14
        $this->ObjMovimiento->setNMovIgv(""); //15
        $this->ObjMovimiento->setNMovTotal(""); //16
        $this->ObjMovimiento->setNPerIdResponsable($this->session->userdata('IdPersona')); //17
        $this->ObjMovimiento->setNSurIdOrigen($cboIdSucursal); //18
        $this->ObjMovimiento->setNSurIdDestino($cboIdSucursal); //19
        $this->ObjMovimientoDetalle->setNMovDetalleCantidad($txt_nCantidad); //20
        $this->ObjMovimientoDetalle->setNMovDetallePrecio(""); //21
        $this->ObjMovimientoDetalle->setNMovDetalleEstado(1); //22
        $this->ObjMovimientoDetalle->setNProId(""); //23
        $this->ObjMovimientoDetalle->setNMovId(""); //24
        $this->ObjMovimientoDetalle->setNHuecoId($cboIdHueco); //25
        //$this->ObjMovimientoDetalle->setNPromId($cboIdPromocion); //25
        //$rs = $this->ObjProducto->ProductoInsTodo($this->ObjProductoHueco,$this->ObjMovimiento);
        $rs = $this->ObjProducto->ProductoIns($this->ObjProductoHueco, $this->ObjMovimiento, $this->ObjMovimientoDetalle);
        //echo $this->ObjProducto->getNProId();
        if ($this->ObjProducto->getNProId() == -1) {
            echo "-1";
        } else {
            echo $this->ObjProducto->getNProId();
        }
        /* if ($rs) {
          echo 1;
          } else {
          echo 0;
          } */
    }

    /* activo e inactivo */

    public function qryProducto() {
        $data['informacion'] = $this->ObjProducto->qryProducto();
        $this->load->view("producto/qry_view", $data);
    }

    public function qryProductoDel() {
        $data['informacion'] = $this->ObjProducto->qryProductoDel();
        $this->load->view("producto/qry_view_del", $data);
    }

    public function eliminarProducto() {
        $ncodigo = $this->input->post('ncodigo');
        $datos = $this->ObjProducto->eliminarProducto($ncodigo);
        if ($datos) {
            echo "1";
        } else {
            echo "error";
        }
    }

    public function panel_addCaracteristica() {
        //print_r($_POST);exit;
        $algo = json_decode($_POST["json"]);
        //$id = $algo->nProId;
        $id = $algo->nProdHueco;
        $data["id"] = $id;
        $data["informacion"] = "";
        //$data["informacion"] = $this->ObjSucursal->getDatos($id);
        /* $data['tipo_stand'] =
          $this->cboDiccionarioGet(
          array('L-DD-Combo', '51'), array('ID' => 'nTipoSucursal', 'NAME' => 'nTipoSucursal', 'VALUE' => $data["informacion"][0]['nTipoSucursal'], 'EXTRA' => '')
          ); */
        //print_r($data);exit;
        $data['hijosCalzado'] = $this->ObjCaracteristicas->qryHijosCalzado(); /* Calzado */

        $this->load->view("producto/producto_detalle/addCaracteristica", $data);
    }

    public function panel_addPromocion() {
        //print_r($_POST);exit;
        $algo = json_decode($_POST["json"]);
        //$id = $algo->nProId;
        $id = $algo->nProdHueco;
        $data["id"] = $id;
        $data["informacion"] = "";

        //$data['hijosCalzado'] = $this->ObjCaracteristicas->qryHijosCalzado(); /* Calzado */
        $data['producto'] = $this->ObjProducto->getProductoHueco($id); /* Calzado */
        $data['promocion'] = $this->ObjPromocion->qryPromocionActivas(); /* Calzado */
        /* print_p($data);
          exit; */
        $this->load->view("producto/producto_promocion/addPromocion", $data);
    }

    public function panel_addCasillero() {
        $algo = json_decode($_POST["json"]);
        $id = $algo->nProId;
        $descripcion = $algo->descripcion;
        $modelo = $algo->nModeloId;
        $data["producto"] = $descripcion . " con Codigo Modelo:" . $modelo;
        $data["id"] = $id;
        //$data["informacion"] = "";
        //$data['sucursal'] = $this->ObjSucursal->qrySucursalActivas();
        $data['informacion'] = $this->ObjHueco->qryHueco();
        //$this->load->view("hueco/qry_view", $data);
        //$data['hijosCalzado'] = $this->ObjCaracteristicas->qryHijosCalzado();/*Calzado*/
        $this->load->view("productoHueco/panel_addHueco", $data);
    }

    /* 20032014 */

    public function qryProductoIns() {
        $idproducto = $this->input->post("idproducto");
        $data['informacion'] = $this->ObjProducto->qryProductoIns($idproducto);
        $this->load->view("producto/qryProducto_ins_view", $data);
    }

    /* para envioProductos */

    public function qryProductoMiStan() {
        $idSucursal = $this->input->post('idSucursal');
        if ($idSucursal == '') {
            echo "Cuidado Revisar ID de Stand comunicarse con Adminitrador";
        } else {
            $data['informacion'] = $this->ObjProducto->qryProductoMiStan($idSucursal);
            //$this->load->view("producto/producto_derivar/qry_view", $data);
            $this->load->view("producto/misproductos/productos_disponibles/qry_view", $data);
        }
    }

    public function qryProductoMiStanxRecibir() {
        $idSucursal = $this->input->post('idSucursal');
        if ($idSucursal == '') {
            echo "Cuidado Revisar ID de Stand comunicarse con Adminitrador";
        } else {
            $data['informacion'] = $this->ObjProducto->qryProductoMiStanxRecibir($idSucursal);
            //$this->load->view("producto/producto_derivar/qry_view", $data);
            $this->load->view("producto/misproductos/productos_x_recibir/qry_view", $data);
        }
    }

    public function qryProductoMiStanEnviados() {
        $idSucursal = $this->input->post('idSucursal');
        if ($idSucursal == '') {
            echo "Cuidado Revisar ID de Stand comunicarse con Adminitrador";
        } else {
            $data['informacion'] = $this->ObjProducto->qryProductoMiStanEnviados($idSucursal);
            //$this->load->view("producto/producto_derivar/qry_view", $data);
            $this->load->view("producto/misproductos/productos_enviados/qry_view", $data);
        }
    }

    public function qryProductoMiStanPrestados() {
        $idSucursal = $this->input->post('idSucursal');
        if ($idSucursal == '') {
            echo "Cuidado Revisar ID de Stand comunicarse con Adminitrador";
        } else {
            $data['informacion'] = $this->ObjProducto->qryProductoMiStanPrestados($idSucursal);
            //$this->load->view("producto/producto_derivar/qry_view", $data);
            $this->load->view("producto/misproductos/productos_prestados/qry_view", $data);
        }
    }
    public function qryProductoMiStanVendidos() {
        $idSucursal = $this->input->post('idSucursal');
        if ($idSucursal == '') {
            echo "Cuidado Revisar ID de Stand comunicarse con Adminitrador";
        } else {
            //$data['informacion'] = $this->ObjProducto->qryProductoMiStanPrestados($idSucursal);
            $data['informacion'] = $this->ObjProducto->qryProductoMiStanVendidos($idSucursal);
            //$this->load->view("producto/producto_derivar/qry_view", $data);
            //$this->load->view("producto/misproductos/productos_prestados/qry_view", $data);
            $this->load->view("producto/misproductos/productos_vendidos/qry_view", $data);
        }
    }

    public function optRecibirProducto() {
        $codigoProductoHueco = json_decode($_POST['json']);
        $iddestino = $_POST["idsuc"];
        $codProductoHueco = $codigoProductoHueco->nProductoHueco;
        //$datos=$this->ObjProducto->optRecibirProducto($codProductoHueco,$idsuc);
        //$this->ObjProductoHueco->setNCantidad($txt_nCantidad); //5
        $this->ObjProductoHueco->setNProductoHueco($codProductoHueco); //6
        $this->ObjProductoHueco->setNProHueEstado("A"); //6
        $this->ObjMovimiento->setNTipoMovimiento(3); //7
        $this->ObjMovimiento->setDMovFecha(""); //8
        $this->ObjMovimiento->setNTipoDocumento(""); //9
        $this->ObjMovimiento->setCMovNumDocumento(""); //10
        $this->ObjMovimiento->setCMovEstado(1); //11
        $this->ObjMovimiento->setNUsuario($this->session->userdata('IdUsuario')); //12
        $this->ObjMovimiento->setNMovSubTotal(""); //13
        $this->ObjMovimiento->setNMovIgv(""); //14
        $this->ObjMovimiento->setNMovTotal(""); //15
        $this->ObjMovimiento->setNPerIdResponsable($this->session->userdata('IdPersona')); //16
        $this->ObjMovimiento->setNSurIdOrigen($iddestino); //17
        $this->ObjMovimiento->setNSurIdDestino($iddestino); //18
        $this->ObjMovimientoDetalle->setNMovDetalleCantidad(1); //19
        $this->ObjMovimientoDetalle->setNMovDetallePrecio(""); //20
        $this->ObjMovimientoDetalle->setNMovDetalleEstado("A"); //21
        $this->ObjMovimientoDetalle->setNProId(""); //22
        $this->ObjMovimientoDetalle->setNMovId(""); //23
        $this->ObjMovimientoDetalle->setNHuecoId(""); //24
        $this->ObjMovimientoDetalle->setNPromId(""); //25
        //$rs = $this->ObjProducto->ProductoInsTodo($this->ObjProductoHueco,$this->ObjMovimiento);
        $rs = $this->ObjProducto->optRecibirProducto($this->ObjProductoHueco, $this->ObjMovimiento, $this->ObjMovimientoDetalle);

        if ($this->ObjProducto->getNProId() == -1) {
            echo "-1";
        } else {
            echo $this->ObjProducto->getNProId();
        }
    }

    public function paneloptPrestamoProducto() {
        $codigoProductoHueco = json_decode($_POST['json']);
        //$idsucursal = $_POST["idsuc"];
        $codProductoHueco = $codigoProductoHueco->nProductoHueco;

        $data['codigoProductoHueco'] = $codProductoHueco;

        $this->load->view('producto/misproductos/productos_prestados/ins_view', $data);
    }

    public function optPrestamoProducto() {
        /* $cod = json_decode($_POST['json']);
          $codProductoHueco = $cod->idCodProdPrestamo; */
        $codProductoHueco = $this->input->post("idCodProdPrestamo");
        /* $txt_cDestino = $cod->txt_cDestino; */
        $txt_cDestino = $this->input->post("txt_cDestino");
//$iddestino = $_POST["idsuc"];
        $iddestino = $this->session->userdata('IdSucursal');

        //$datos=$this->ObjProducto->optRecibirProducto($codProductoHueco,$idsuc);
        //$this->ObjProductoHueco->setNCantidad($txt_nCantidad); //5
        $this->ObjProductoHueco->setNProductoHueco($codProductoHueco); //1
        $this->ObjProductoHueco->setNProHueEstado("P"); //2
        $this->ObjMovimiento->setNTipoMovimiento(4); //3
        $this->ObjMovimiento->setDMovFecha(""); //4
        $this->ObjMovimiento->setNTipoDocumento(""); //5
        $this->ObjMovimiento->setCMovNumDocumento(""); //6
        $this->ObjMovimiento->setCMovEstado(1); //7
        $this->ObjMovimiento->setNUsuario($this->session->userdata('IdUsuario')); //8
        $this->ObjMovimiento->setNMovSubTotal(""); //9
        $this->ObjMovimiento->setNMovIgv(""); //10
        $this->ObjMovimiento->setNMovTotal(""); //11
        $this->ObjMovimiento->setNPerIdResponsable($this->session->userdata('IdPersona')); //16
        $this->ObjMovimiento->setNSurIdOrigen($iddestino); //13
        $this->ObjMovimiento->setNSurIdDestino($iddestino); //14
        $this->ObjMovimiento->setCMovDestino($txt_cDestino); //15


        $this->ObjMovimientoDetalle->setNMovDetalleCantidad(1); //16
        $this->ObjMovimientoDetalle->setNMovDetallePrecio(""); //17
        $this->ObjMovimientoDetalle->setNMovDetalleEstado("P"); //18
        $this->ObjMovimientoDetalle->setNProId(""); //19
        $this->ObjMovimientoDetalle->setNMovId(""); //20
        $this->ObjMovimientoDetalle->setNHuecoId(""); //21
        $this->ObjMovimientoDetalle->setNPromId(""); //22
        //$rs = $this->ObjProducto->ProductoInsTodo($this->ObjProductoHueco,$this->ObjMovimiento);
        $rs = $this->ObjProducto->optPrestamoProducto($this->ObjProductoHueco, $this->ObjMovimiento, $this->ObjMovimientoDetalle);

        if ($this->ObjProducto->getNProId() == -1) {
            echo "-1";
        } else {
            echo $this->ObjProducto->getNProId();
        }
    }

    public function optRetornarProducto() {
        $cod = json_decode($_POST['json']);
        //print_r($cod);
        $codProductoHueco = $cod->nProdHueRetornar;
        if ($codProductoHueco >= 1 || $codProductoHueco != '') {

            $iddestino = $this->session->userdata('IdSucursal');

            $this->ObjProductoHueco->setNProductoHueco($codProductoHueco); //1
            $this->ObjProductoHueco->setNProHueEstado("A"); //2
            $this->ObjMovimiento->setNTipoMovimiento(5); //3
            $this->ObjMovimiento->setDMovFecha(""); //4
            $this->ObjMovimiento->setNTipoDocumento(""); //5
            $this->ObjMovimiento->setCMovNumDocumento(""); //6
            $this->ObjMovimiento->setCMovEstado(1); //7
            $this->ObjMovimiento->setNUsuario($this->session->userdata('IdUsuario')); //8
            $this->ObjMovimiento->setNMovSubTotal(""); //9
            $this->ObjMovimiento->setNMovIgv(""); //10
            $this->ObjMovimiento->setNMovTotal(""); //11
            $this->ObjMovimiento->setNPerIdResponsable($this->session->userdata('IdPersona')); //16
            $this->ObjMovimiento->setNSurIdOrigen($iddestino); //13
            $this->ObjMovimiento->setNSurIdDestino($iddestino); //14
            $this->ObjMovimiento->setCMovDestino(""); //15

            $this->ObjMovimientoDetalle->setNMovDetalleCantidad(1); //16
            $this->ObjMovimientoDetalle->setNMovDetallePrecio(""); //17
            $this->ObjMovimientoDetalle->setNMovDetalleEstado("R"); //18
            $this->ObjMovimientoDetalle->setNProId(""); //19
            $this->ObjMovimientoDetalle->setNMovId(""); //20
            $this->ObjMovimientoDetalle->setNHuecoId(""); //21
            $this->ObjMovimientoDetalle->setNPromId(""); //22
            //$rs = $this->ObjProducto->ProductoInsTodo($this->ObjProductoHueco,$this->ObjMovimiento);
            $rs = $this->ObjProducto->optRetornarProducto($this->ObjProductoHueco, $this->ObjMovimiento, $this->ObjMovimientoDetalle);

            if ($this->ObjProducto->getNProId() == -1) {
                echo "-1";
            } else {
                echo $this->ObjProducto->getNProId();
            }
        } else {
            echo "-1";
        }
    }

    /**/

    function panelFndProducto() {
        $this->loaders->verificaacceso();
        $data['modulo'] = ' Buscar Productos';
        $datos[] = $this->cargaInformacionEmpresa();
        $this->load->view('layout/header', $datos[0]);

        $data['modelo'] = $this->ObjModelo->qryModeloActivas();
        $this->load->view('producto/fndProductos/panel_view', $data);
        $this->load->view('layout/footer');
    }

    function fndProducto() {
        $variable1 = $this->input->post("modelo");
        if ($variable1 == '') {
            echo 2;
        } else {
            $data['informacion'] = $this->ObjProducto->fndProducto($variable1);
            $this->load->view("producto/fndProductos/qryProductosDetalles", $data);
        }
    }

    /* 0946 */

    function panel_updProducto() {
        $algo = json_decode($_POST["json"]);
        $nProdHueco = $algo->nProdHueco;

        $data["nProductoHueco"] = $nProdHueco;
        $data['modelo'] = $this->ObjModelo->qryModeloActivas();
        $data['categoria'] = $this->ObjCategoria->qryCategoriaActivas();
        $data['sucursal'] = $this->ObjSucursal->qrySucursalActivas();

        $data['informacion'] = $this->ObjProducto->getProductoHueco($nProdHueco);
        //print_r($data['informacion']);exit;
        $this->load->view("producto/upd_view", $data);
    }

    function productoUpd() {
        foreach ($_POST as $key => $value) {
            if (empty($value)) {
                echo "r";
                exit;
            }
        }
        extract($_POST);
        $this->ObjProducto->setCProDescripcion($upd_txt_cProDescripcion); //1
        $this->ObjProducto->setNModeloId($upd_cboIdModelo); //2
        $this->ObjProducto->setNProPrecioReferencial($upd_txt_nProPrecioReferencial); //3
        $this->ObjProducto->setNProEstado(1); //4
        $this->ObjProducto->setNCatId($upd_cboIdCategoria); //5
        $this->ObjProductoHueco->setNCantidad(""); //6
        $this->ObjProductoHueco->setNProHueEstado(1); //7
        $this->ObjMovimiento->setNTipoMovimiento(1); //8
        $this->ObjMovimiento->setDMovFecha(""); //9
        $this->ObjMovimiento->setNTipoDocumento(""); //10
        $this->ObjMovimiento->setCMovNumDocumento(""); //11
        $this->ObjMovimiento->setCMovEstado(1); //12
        $this->ObjMovimiento->setNUsuario($this->session->userdata('IdUsuario')); //13
        $this->ObjMovimiento->setNMovSubTotal(""); //14
        $this->ObjMovimiento->setNMovIgv(""); //15
        $this->ObjMovimiento->setNMovTotal(""); //16
        $this->ObjMovimiento->setNPerIdResponsable($this->session->userdata('IdPersona')); //17
        $this->ObjMovimiento->setNSurIdOrigen($upd_txt_nSurId); //18 origen sucursal fue
        $this->ObjMovimiento->setNSurIdDestino($upd_cboIdSucursal); //19 nueva sucursal es
        $this->ObjMovimientoDetalle->setNMovDetalleCantidad(""); //20
        $this->ObjMovimientoDetalle->setNMovDetallePrecio(""); //21
        $this->ObjMovimientoDetalle->setNMovDetalleEstado(1); //22
        $this->ObjMovimientoDetalle->setNProId(""); //23
        $this->ObjMovimientoDetalle->setNMovId(""); //24
        $this->ObjMovimientoDetalle->setNHuecoId($upd_cboIdHueco); //25
        $this->ObjProducto->setNProId($upd_hdn_nIdProducto); //26 upd_hdn_nIdProducto
        $this->ObjProductoHueco->setNProductoHueco($upd_hdn_nProductoHueco); //27

        $rs = $this->ObjProducto->ProductoUpd($this->ObjProductoHueco, $this->ObjMovimiento, $this->ObjMovimientoDetalle);

        if ($this->ObjProducto->getNProId() == -1) {
            echo "-1";
        } else {
            echo $this->ObjProducto->getNProId();
        }
    }

    /* 2906 */

    public function add_item() {
        //print_r($_POST["json"]);//stdClass Object ( [nProductoHueco] => 237 [precio] => 65.00 ) 
        $algo = json_decode($_POST["json"]);
        $producto = array("nProductoHueco" => $algo->nProductoHueco, "precio" => $algo->precio, "cantidad" => 1, "descripcion" => $algo->descripcion, "modelo" => $algo->modelo, "detalle" => $algo->detalle);
        $promocion = $this->ObjPromocion->getPromocionxProducto($algo->nProductoHueco);
        $toddescuento = 0;
        if (is_array($promocion)) {
            foreach ($promocion as $pr) {
                $toddescuento = $toddescuento + $pr['porcentaje'];
            }
        }
        $producto['descuento'] = $toddescuento;
        
        $producto['subtotalfinal']= (100-$producto['descuento'])*$producto['precio']*$producto['cantidad']/100;
        //print_r($producto);exit;
        //$this->carrito->add($this->input->post());
        $this->carrito->add($producto);

        //$session_data = $this->session->all_userdata();
        //print_r($session_data);
        //exit;
        //redirect("principal/carrito");
        redirect("producto/carrito");
    }

    public function carrito() {
        $data["items"] = $this->carrito->get_carrito(); //ok
        //print_p($data);
        $session_data = $this->session->all_userdata();
        //print_p($session_data);
        //exit;
        $promo = array();
        //print_p($data["items"]);exit;
        foreach ($data["items"] as $item) {
            $data['items'][$item['nProductoHueco']]['promocion'] = $this->ObjPromocion->getPromocionxProducto($item['nProductoHueco']);
            //$data['promociones'] = $this->ObjPromocion->getPromocionxProducto($item['nProductoHueco']);
            array_push($promo, $this->ObjPromocion->getPromocionxProducto($item['nProductoHueco']));
        }
        //print_p($data["items"]);exit;

        $data['promociones'] = $promo;
        //print_p($data['promociones']);exit;

        $data["total"] = $this->carrito->get_total(); //ok

        $this->load->model('persona_model', 'ObjPersona');
        $idvendedor = $this->session->userdata("IdPersona");
        if (isset($idvendedor) && $idvendedor == FALSE)
            $idvendedor = -1;
        $data['vendedor'] = $this->ObjPersona->getDatos($idvendedor);
        $data['vendedor'][0]['sucursal'] = $this->session->userdata('Sucursal');

        //array_push($data['vendedor'], 'Sucursal'=>);
        //$vendedor = $todovendedor[0]['cPerNombres']+" "+$todovendedor[0]['cPerApellidoPaterno']+" "+$todovendedor[0]['cPerApellidoMaterno'] ;
        //print_p($data);exit;
        $this->load->view("carrito/carrito", $data);
        /* $data["menu_current"] = "catalogo";
          $data["content"] = "carrito";
          $this->load->view("template", $data); */
    }

    public function deleteItemCarrito($id_producto) {
        $this->carrito->delete($id_producto);
        //redirect("principal/carrito");
        /* redirect("producto/carrito"); */
    }

    public function updItemPrecioCarrito($id_producto, $precio, $cantidad, $dscto) {
        $this->carrito->updateItemPrecio($id_producto, $precio, $cantidad, $dscto);
        /* redirect("producto/carrito"); */
    }

    public function updItemCarrito($id_producto, $cantidad) {
        $this->carrito->update($id_producto, $cantidad);
        /* redirect("producto/carrito"); */
    }

    public function completar_pedido() {
        if (!$this->session->userdata("carrito"))
            redirect("envioproducto");
        
        //print_p($this->userdata->all());
        $total = $this->carrito->get_total();
        //$usuario = $this->session->userdata("usuario");        
        $usuario=$this->session->userdata('IdUsuario');
        $idpersona=$this->session->userdata('IdPersona');
        $idsucursal=$this->session->userdata('IdSucursal');
        $carrito = $this->session->userdata("carrito");
        
        //print_p($carrito);exit;
        //*********************************************************
        //$idmovimiento = $this->ObjProducto->optPrestamoProducto();
        //$id_pedido = $this->Tienda_model->agrega_pedido($datos);
        //nMovId, nTipoMovimiento, dMovfecha, nTipoDocumento, cMovNumDocumento, cMovEstado, nUsuario, nMovSubTotal, nMovIgv, nMovTotal, nPerIdResponsable, nSurIdOrigen, nSurIdDestino, cMovDestino
        $datos = array(
            "nTipoMovimiento" => "7",//venta
            //"dMovfecha" => date("d-m-Y H:i:s"),
            "dMovfecha" => date("Y-m-d H:i:s"),
            "nTipoDocumento" => 0,
            "cMovNumDocumento" => "",
            "cMovEstado" => "1",
            "nUsuario"=>$usuario,
            "nMovSubTotal"=>0,
            "nMovIgv"=>0,
            "nMovTotal"=>$total,
            //nMovDescuento=>$descuentoTotal
            "nPerIdResponsable"=>$idpersona,
            "nSurIdOrigen"=>$idsucursal,
            "nSurIdDestino"=>$idsucursal,
            "cMovDestino"=>$this->input->post("Cliente")
        );
        $idmovimiento = $this->ObjProducto->completar_pedido($datos);
        $detalle = $this->ObjProducto->completar_detalle_pedido($carrito, $idmovimiento);
        
        //*********************************************************
        $this->session->unset_userdata('carrito');
        redirect("envioproducto");
    }

}

?>