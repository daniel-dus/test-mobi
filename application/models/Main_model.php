<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->helper('validacion');
    }

    public function insertar_nave(){
        $datos = $this->input->post();
        $datos = limpiar_datos($datos);
        extract($datos);
        if( $nombre == "" || $modelo == "" || $pasajeros == "" ) {
            return array('success' => FALSE, 'msg' => 'Los campos marcados con (*) son requeridos.');
        }

        $success = $this->db->insert('naves', $datos);
        $msg = ($success) ? 'Se guardó correctamente' : 'Ocurrió un error';
        return array('success' => $success, 'msg' => $msg);
    }


}
