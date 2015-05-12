<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ValidarRegistro
 *
 * @author oskar
 */
class ValidarRegistro extends CFormModel {
    
    public $nombre;
    public $cedula;
    public $nombre_usuario;
    public $email;
    public $repetir_email;
    public $password;
    public $repetir_password;
    public $captcha;
    
    public function rules(){
        
        return array(
            //validacion del nombre
            array('nombre', 'required', 'message' => 'El nombre es requerido'),
            array(
                'nombre', 
                'match', 
                'pattern' => '/^[a-záéíóúàèìòùñ\s]+$/i',
                'message' => 'Los caracteres ingresados son incorrectos'
                ),
            array(
                'nombre',
                'length',
                'min' => 5,
                'tooShort' => 'Mínimo cinco caracteres',
                'max' => 50,
                'tooLong' => 'Máximo 50 caracteres'                
                ),
            
            //validación de cedula 
            array('cedula', 'required', 'message' => 'El número de cédula es requerido'),
            array(
                'cedula', 
                'match', 
                'pattern' => '/^[0-9]+$/',
                'message' => 'Favor ingrese sólo números'
                ),
            array(
                'cedula',
                'length',
                'min' => 10,
                'tooShort' => 'Mínimo 10 caracteres',
                'max' => 10,
                'tooLong' => 'Máximo 10 caracteres'                
                ),
            
            //validación username
            array('nombre_usuario', 'required', 'message' => 'El nombre de usuario es requerido'),
            array(
                'nombre_usuario', 
                'match',
                'pattern' => '/^[a-zA-Z0-9]+$/',
                'message' => 'Solo ingrese letras y números'
                ),
            array(
                'nombre_usuario',
                'length',
                'min' => 6,
                'tooShort' => 'Mínimo 6 caracteres',
                'max' => 15,
                'tooLong' => 'Máximo 15 caracteres'                
                ),
            
            //validación email
            array('email', 'required', 'message' => 'El correo electrónico es requerido'),
            array(
                'email', 
                'email', 
                'message' => 'Favor ingrese una dirección de correo electrónico válida'
                ),
            //validación email reingresar
            array('repetir_email', 'required', 'message' => 'Ingrese nuevamente el correo electrónico'),
            array(
                'repetir_email',
                'compare',
                'compareAttribute' => 'email',
                'message' => 'Los correos electrónicos no coinciden'
                ),
            
            //validación de contraseña
            array('password', 'required', 'message' => 'El campo contraseña es requerido'),
            array(
                'password', 
                'match',
                'pattern' => '/^([a-z]+[0-9])|([0-9]+[a-z]+)/i',
                'message' => 'Obligatorio ingresar números y letras'
                ),
            array(
                'password',
                'length',
                'min' => 8,
                'tooShort' => 'Mínimo 8 caracteres',
                'max' => 16,
                'tooLong' => 'Máximo 16 caracteres'                
                ),
            
            //validadion repetir contraseña
            array('repetir_password', 'required', 'message' => 'Ingrese nuevamente su contraseña'),
            array(
                'repetir_password',
                'compare',
                'compareAttribute' => 'password',
                'message' => 'Las contraseñas no coinciden'
                ),
            
            //validar captcha
            array(
                'captcha',
                'captcha',
                'message' => 'El texto no corresponde al de la imagen'
                ),
            
        );
    }
    
    public function attributeLabels(){
        
        return array(
            'cedula' => 'Cédula de identidad',
            'nombre_usuario' => 'Nombre de Usuario',
            'email' => 'Correo Elecrónico',
            'repetir_email' => 'Confirme el Correo Electrónico',
            'password' => 'Contraseña',
            'repetir_password' => 'Confirme la Contraseña',
        );
    }

    
    }
