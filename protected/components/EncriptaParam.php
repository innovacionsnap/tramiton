<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EncriptaUrl
 *
 * @author oscar.acero
 */
class EncriptaParam extends CApplicationComponent {
    
    /**
     * Función de aplicación global desarrollada para codificar parámetros que se envían por GET
     * 
     * @return string  $paramEncode parámetro codificado
     * @param string $param Parámetro GET a ser codificado
     */
    public function codificaParamGet($param) {
        
        $paramEncode = Yii::app()->params['beforeCode'] . $param . Yii::app()->params['hashKey'];
        return base64_encode($paramEncode);
        
    }
    
    /**
     * Función de aplicación global desarrollada para decodificar parámetros que se envían por GET
     * y poder utilizarlos en el controlador
     * 
     * @return string  $paramDecode parámetro decodificado
     * @param string $paramEncode Parámetro GET a ser decodificado
     */
    public function decodificaParamGet($paramEncode) {
        
        $paramDecode = base64_decode($paramEncode);
        
        $paramDecode = str_replace(Yii::app()->params['beforeCode'],"",$paramDecode);
        $paramDecode = str_replace(Yii::app()->params['hashKey'],"",$paramDecode);
        
        return $paramDecode;
        
    }
}
