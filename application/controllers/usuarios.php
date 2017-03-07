<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model', 'objUsuario');
        $this->load->model('persona_model', 'ObjPersona');
        $this->load->model('menu_model', 'ObjMenu');
        $this->load->model('permiso_model', 'ObjPermiso');
        $this->load->model('modulo_model', 'ObjModulo');
        $this->load->model('empresa_model', 'ObjEmpresa');
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
        //phpinfo();
        //exit();
        $this->loaders->verificaacceso();
        $datos[] = $this->cargaInformacionEmpresa();
        $this->load->view('layout/header',$datos[0]);
        $data['cbo'] = $this->objUsuario->comboTipoUserGet();//4 tipo usuario,5 administrador, 8 vendedor, 7 almacenero
        $this->load->view('usuario/panel_view', $data);
        $this->load->view('layout/footer');
    }

    public function login() {
        $this->load->view('login/login_view');
    }

    public function validar() { 
        //$this->loaders->verificaacceso();
        $usuario = $this->input->post('username');
        $pass = md5("+".$this->input->post('password'));
//        print_r($pass);exit;
//        print_r($_POST);exit;
        if ($this->objUsuario->autenticar($usuario, $pass)) {
            $data = array(
                'esta_logeado' => true,
                'IdUsuario' => $this->objUsuario->get_nUsuCodigo(),
                'Nombres' => $this->objUsuario->get_cUsuUsuario(),
                'IdPersona' => $this->objUsuario->get_nPerId(),
                'TipoUsuario' => $this->objUsuario->get_cUsuTipo(),
                'DescTipoUsuario' => $this->objUsuario->get_cUsuDescTipo(),
                'IdSucursal'=>$this->objUsuario->get_nSurId(),
                'Sucursal'=>$this->objUsuario->get_cSurNombre(),
            );
            //or $this->session->set_userdata('some_name', 'some_value');
            $this->session->set_userdata($data);
            
            /*redirect('principal');*/
            //return true;
            echo "1";
        } else {
            //redirect('usuario');
            echo "0";
            //return false;
            //redirect('usuario/login');
            // $this->load->view('main/login');
        }
    }

    

    public function logout() {
        $this->session->sess_destroy();
        redirect("/");
    }

    public function prueba() {
        $data['title'] = "AdminPlus Template Empresa Anyeluz";
        $this->load->view('usuario', $data);
    }

    public function generador() {
        // $this->load->model('mysql2php', 'objmysqlphp');
        // $this->objmysqlphp->GenerarMultiplesClases('anyeluz');
        $this->load->view("usuario/qry_view");
        // echo "Clases Generados";
    }

    public function qryPersonaUsu() {
        if ($this->input->post('tipo')) {
            $tipo = $this->input->post('tipo');
        } else {
            $tipo = '';
        }
        $data['listado'] = $this->ObjPersona->qryPersonas($tipo);
        $this->load->view("usuario/qry_view", $data);
    }

    public function insUsuario() {
        $clave = md5("+".$this->input->post('txtClave'));
        $this->objUsuario->set_nPerId($this->input->post('txt_nPerId'));
        $this->objUsuario->set_cUsuUsuario($this->input->post('txtUsuario'));
        $this->objUsuario->set_cUsuClave($clave);
        $this->objUsuario->set_cUsuTipo($this->input->post('cboTipoUser'));
        $rs = $this->objUsuario->insUsuario();
        // print_r($rs);
        // var_dump($rs);
        if ($rs) {
            echo "1";
        } else {
            echo "bad";
        }
    }

    public function pruebaPermiso() {
        $menusAsignados = $this->ObjPermiso->PermisosxUsuario(2);
        // print_p($menusAsignados);
        // exit();
        $modulos = $this->ObjModulo->getModulo();
        $temp = array();
        foreach ($modulos as $key => $value) {
            $temp[$value['nModId']]['key'] = $value['nModId'];
            $temp[$value['nModId']]['title'] = $value['cModModulo'];
            $menu = $this->ObjMenu->getMenuxModulo($value['nModId']);
            $temp_menu = array();
            $i = 0;
            foreach ($menu as $row) {
                // print_p($row['nMenId']);
                // print_p($menusAsignados);
                // print_p($i);
                if (search_in_array($row['nMenId'], $menusAsignados, 'nMenId')) {
                    $temp_menu[$i]['select'] = true;
                }
                $temp_menu[$i]['key'] = $row['nMenId'];
                $temp_menu[$i]['title'] = $row['cMenMenu'];
                $i++;
            }
            $temp[$value['nModId']]['isFolder'] = true;
            $temp[$value['nModId']]['children'] = $temp_menu;
        }
        $data['permisos'] = $temp;
        print_p($data);
    }

    public function pruebaTiempos() {
        // date_timezone_set('America/Lima');
        date_default_timezone_set('America/Lima');
        echo '2013-04-29 19:09:54';
        echo "<br>";
        $fecha_actual = date('Y-m-d H:m:s');
        echo date('Y-m-d H:m:s');
        echo "<br>";
        echo "time";
        echo date('Y-m-d H:i:s', time());
    }

    public function getPermisos() {
        $pid = $this->input->post('pid');
        $this->session->set_userdata('pidx', $pid);
        $data['pid'] = $pid;
        $temp = array();
        $modulos = $this->ObjModulo->getModulo();
        //print_p($modulos);

        $menusAsignados = $this->ObjPermiso->PermisosxUsuario($pid);//ok
        foreach ($modulos as $key => $value) {
            //print_p($value['nModId']);
            //print_p($value['cModModulo']);
            $temp[$value['nModId']]['key'] = $value['nModId'];
            $temp[$value['nModId']]['title'] = $value['cModModulo'];
            
            $menu = $this->ObjMenu->getMenuxModulo($value['nModId']);
            $temp_menu = array();
            $i = 0;
            //print_p($menu);
            foreach ($menu as $row) {
                if (search_in_array($row['nMenId'], $menusAsignados, 'nMenId')) {
                    $temp_menu[$i]['select'] = true;
                }
                $temp_menu[$i]['key'] = $row['nMenId'];
                $temp_menu[$i]['title'] = $row['cMenMenu'];
                $i++;
            }
            $temp[$value['nModId']]['isFolder'] = true;
            $temp[$value['nModId']]['children'] = $temp_menu;
        }
        //exit;
        $data['permisos'] = $temp;
        $this->load->view('usuario/permisos_view', $data);
    }

    public function setPermisosIns() {
        date_default_timezone_set('America/Lima');
        $pid = $this->input->post('pid');
        $id = $this->input->post('ids');
        $menusAsignados = $this->ObjPermiso->PermisosxUsuario($pid);
        $sql_permisos = "";
        $sql_insert = "INSERT INTO permiso(nUsuCodigo,nMenId,cPermActivo) VALUES";
        $sql_permisos_quitar = array();
        $values = "";
        // var_dump(count($menusAsignados));
        // print_p($id);exit();
        if (is_array($id)) {
            foreach ($id as $i => $valor) {
                if (is_array($menusAsignados)) {
                    if (!search_in_array($valor, $menusAsignados, 'nMenId')) {
                        $values .= "($pid,$valor,1),";
                    }
                } else {
                    $values .= "($pid,$valor,1),";
                }
            }
        }

        if (is_array($menusAsignados)) {
            foreach ($menusAsignados as $key => $row) {
                $fecha_actual = date('Y-m-d H:i:s', time());
                if (is_array($id)) {
                    if (!in_array($row['nMenId'], $id)) {
                        $sql_permisos_quitar[] = "UPDATE permiso set cPermActivo=0,dPermFechaFin='$fecha_actual' where nUsuCodigo=$pid AND nMenId=" . $row['nMenId'] . ";";
                    }
                } else {
                    $sql_permisos_quitar[] = "UPDATE permiso set cPermActivo=0,dPermFechaFin='$fecha_actual' where nUsuCodigo=$pid AND nMenId=" . $row['nMenId'] . ";";
                }
            }
        }
        $rpt = "1";
        if (trim($values) != "") {
            $sql_permisos .= $sql_insert . substr($values, 0, -1) . ';';
            // print_p($sql_permisos);
            // print_p($sql_permisos_quitar);
            // exit();
            if ($this->ObjPermiso->PermisosIns($sql_permisos)) {
                $rpt = "1";
            }
        }
        if (count($sql_permisos_quitar) > 0) {
            // print("sql_permisos");
            // print_p($sql_permisos);
            // print_p($sql_permisos_quitar);
            // exit();
            $this->ObjPermiso->PermisosxUsuarioUpd($sql_permisos_quitar);
            $rpt = "1";
        } else {
            
        }
        echo $rpt;
    }

    public function updatePass() {
        $idusu = $this->input->post('idUsu');
        $clave = md5("+".$this->input->post('clave'));
        if ($this->objUsuario->updateclave($idusu, $clave)) {
            echo 1;
        } else {
            echo 0;
        }
    }
    public function hi(){
        echo "1";
    }

}

/* End of file usuario.php */
/* Location: ./application/controllers/usuario.php */
?>