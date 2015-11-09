<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImageUploadForm
 *
 * @author oscar.acero
 */
class ImageUploadForm extends CFormModel{
    
    public $imagenPerfil;
    
    public function rules() {
        return array(
            array(
                'imagenPerfil',
                'file',
                'types' => 'jpg, gif, png',
                'wrongType' => 'Formatos permitidos jpg, gif y png',
                'maxSize' => 1024 * 1024 * 2,
                'tooLarge' => '<span style="color: #F00;">El tamaño máximo permitodo para la imagen es 2MB</span>',
                'allowEmpty' => true,
            ),
        );
    }
    
    public function attributeLabels() {
        return array(
            'imagenPerfil' => 'Imagen',
        );
    }
}
