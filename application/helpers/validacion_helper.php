<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if( !function_exists('validar_vacios') ){
    function validar_vacios(){
        foreach( func_get_args() as $param){
            if( !isset($param) || trim($param) === '' || trim($param) === NULL){
                return FALSE;
            }
            return TRUE;
        }
    }
}

if( !function_exists('limpiar_datos') ){
    function limpiar_datos($datos){
        $clean_data = array_map('trim', $datos);
        return $clean_data;
    }
}
