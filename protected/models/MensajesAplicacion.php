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
        '101' => 'Acción no permitida',
        '102' => 'No tiene permisos para la acción solicitada',
    );
    
    public function getMensaje($codigo) {
        return $this->mensajesApp[$codigo];
    }

}
