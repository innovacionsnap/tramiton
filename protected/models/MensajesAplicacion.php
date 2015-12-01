<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MensajesError
 *
 * @author oscar.acero
 */
class MensajesAplicacion {

    public $mensajeSolicitado;
    public $mensajesApp = array(
        '101' => 'La acción que desea realizar no está permitida',
        '102' => 'No tiene permisos para la acción solicitada',
        '103' => 'No se puede eliminar el registro seleccionado, tiene datos asociados',
        '104' => 'No se pudo encontrar el registro solicitado',
        
        '201' => '¿Está seguro que desea eliminar este registro?'
        
    );
    
    public function getMensaje($codigo) {
        return $this->mensajesApp[$codigo];
    }

}
