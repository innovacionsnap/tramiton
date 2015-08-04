<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NuevoPasswordForm
 *
 * @author oscar.acero
 */
class NuevoPasswordForm extends CFormModel {

    public $password;
    public $repetir_password;
    public $email;
    public $codigoVerificacion;

    public function rules() {
        return array(
            //validación de contraseña
            array('password', 'required', 'message' => '<span style="color: #F00;">El campo contraseña es requerido</span>'),
            array(
                'password',
                'match',
                'pattern' => '/^([a-z]+[0-9])|([0-9]+[a-z]+)/i',
                'message' => '<span style="color: #F00;">Obligatorio ingresar números y letras</span>'
            ),
            array(
                'password',
                'length',
                'min' => 8,
                'tooShort' => '<span style="color: #F00;">Mínimo 8 caracteres</span>',
                'max' => 16,
                'tooLong' => '<span style="color: #F00;">Máximo 16 caracteres</span>'
            ),
            //validadion repetir contraseña
            array('repetir_password', 'required', 'message' => '<span style="color: #F00;">Ingrese nuevamente su contraseña</span>'),
            array(
                'repetir_password',
                'compare',
                'compareAttribute' => 'password',
                'message' => '<span style="color: #F00;">Las contraseñas no coinciden</span>'
            ),
        );
    }

    public function attributeLabels() {

        return array(
            'password' => 'Contraseña',
            'repetir_password' => 'Confirme la Contraseña',
        );
    }

}
