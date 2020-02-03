<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';


class Rest extends REST_Controller {

    public function nave_get($id=0){
        if(!empty($id)){
            $data = $this->db->get_where('naves', ['id' => $id])->row_array();
        }else{
            $data = $this->db->get('naves')->result();
        }

        $this->response($data, REST_Controller::HTTP_OK);
    }

}
