<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {


    public function __construct(){
        parent::__construct();
        $this->load->model('main_model');
    }

    public function index(){
        $this->load->view('main');
    }

    public function naves(){
        $pelicula = $this->input->post('url');
        $titulo = $this->input->post('pelicula');
        $data['naves'] = $this->get_pelicula_informacion($pelicula);
        $data['titulo'] = $titulo;
        $content = $this->load->view('naves',$data, TRUE);


        $this->output->set_content_type('application/json')->set_output(json_encode(['content' => $content]));
    }


    public function get_peliculas(){
        $endpoint = "https://swapi.co/api/films/";
        $films = $this->get_api($endpoint);
        //var_dump($films);
        $films = json_decode($films, TRUE);
        $table = $this->pintar_tabla_peliculas($films['results']);
        $this->output->set_content_type('application/json')->set_output(json_encode(['tabla' => $table]));
        //echo json_encode(['tabla' => $table]);

    }

    public function get_naves_pelicula(){
        $endpoint = "https://swapi.co/api/starships/";
        $films = $this->get_api($endpoint);
    }

    public function get_nave_informacion($url){
        $nave_info = $this->get_api($url);
        $nave_info = json_decode($nave_info,TRUE);
        return $nave_info;

    }

    public function get_pelicula_informacion($url){
        $arreglo_naves = [];
        $info_pelicula = $this->get_api($url);
        $info_pelicula = json_decode($info_pelicula,TRUE);
        $naves = $info_pelicula['starships'];
        foreach($naves as $n){
            $arreglo_naves[] = $this->get_nave_informacion($n);
        }
        return $this->pintar_tabla_naves($arreglo_naves);

    }


    private function get_api($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    private function pintar_tabla_peliculas($arreglo){
        $tabla = "";
        $string = "<tr><td>%s</td><td>%s</td><td>%s</td><td><button class='btn waves-effect waves-light' onclick='verNaves(\"%s\",\"%s\")'>Consultar</button></td></tr>";
        foreach($arreglo as $a){
            $tabla.=sprintf($string, $a['title'],$a['director'],$a['release_date'],$a['url'],$a['title']);
        }

        return $tabla;
    }

    private function pintar_tabla_naves($arreglo){
        $tabla = "";
        $string = "<tr data-name='%s' data-model='%s' data-passenger='%s'><td>%s</td><td>%s</td><td>%s</td><td><button class='btn waves-effect waves-light' onclick='formNave(this)'>Guardar</button></td></tr>";
        foreach($arreglo as $a){
            $tabla.=sprintf($string, $a['name'],$a['model'],$a['passengers'],$a['name'],$a['model'],$a['passengers']);
        }
        return $tabla;
    }

    public function insertar_nave(){
        $respuesta = $this->main_model->insertar_nave();
        $this->output->set_content_type('application/json')->set_output(json_encode(($respuesta)));
    }


}
