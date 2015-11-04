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
    public $terminos;

    public function rules() {

        return array(
            //validacion del nombre
            array('nombre', 'required', 'message' => '<span style="color: #F00;">El nombre es requerido</span>'),
            array(
                'nombre',
                'match',
                'pattern' => '/^[a-záéíóúàèìòùñ\s]+$/i',
                'message' => '<span style="color: #F00;">Los caracteres ingresados son incorrectos</span>'
            ),
            array(
                'nombre',
                'length',
                'min' => 5,
                'tooShort' => '<span style="color: #F00;">Mínimo cinco caracteres</span>',
                'max' => 50,
                'tooLong' => '<span style="color: #F00;">Máximo 50 caracteres</span>'
            ),
            //validación de cedula 
            array('cedula', 'required', 'message' => '<span style="color: #F00;">Nro. de cédula es requerido</span>'),
            array(
                'cedula',
                'match',
                'pattern' => '/^[0-9]+$/',
                'message' => '<span style="color: #F00;">Favor ingrese sólo números</span>'
            ),
            array(
                'cedula',
                'length',
                'min' => 10,
                'tooShort' => '<span style="color: #F00;">Mínimo 10 digitos',
                'max' => 10,
                'tooLong' => '<span style="color: #F00;">Máximo 10 digitos'
            ),
            //validación username
            array('nombre_usuario', 'required', 'message' => '<span style="color: #F00;">El nombre de usuario es requerido</span>'),
            array(
                'nombre_usuario',
                'match',
                'pattern' => '/^[a-zA-Z0-9]+$/',
                'message' => '<span style="color: #F00;">Solo ingrese letras y números</span>'
            ),
            array(
                'nombre_usuario',
                'length',
                'min' => 6,
                'tooShort' => '<span style="color: #F00;">Mínimo 6 caracteres</span>',
                'max' => 15,
                'tooLong' => '<span style="color: #F00;">Máximo 15 caracteres</span>'
            ),
            array('nombre_usuario', 'comprobar_usuario'),
            
            //validación email
            array('email', 'required', 'message' => '<span style="color: #F00;">El correo electrónico es requerido</span>'),
            array(
                'email',
                'email',
                'message' => '<span style="color: #F00;">Favor ingrese una dirección de correo electrónico válida</span>'
            ),
            array('email', 'comprobar_email'),
            
            //validación email reingresar
            array('repetir_email', 'required', 'message' => '<span style="color: #F00;">Ingrese nuevamente el correo electrónico</span>'),
            array(
                'repetir_email',
                'compare',
                'compareAttribute' => 'email',
                'message' => '<span style="color: #F00;">Los correos electrónicos no coinciden</span>'
            ),
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
            //validar captcha
            array('captcha', 'required', 'message' => '<span style="color: #F00;">El código de verificación es requerido</span>'),
            array(
                'captcha', 
                'ext.validacion.AjaxCaptchaValidator', 
                'allowEmpty' => !Yii::app()->user->isGuest || !CCaptcha::checkRequirements(),
                'message' => '<span style="color: #F00;">El texto no corresponde al de la imagen</span>'
                ),
            /*array(
                'captcha',
                'captcha',
                'message' => '<span style="color: #F00;">El texto no corresponde al de la imagen</span>'
            ),*/
            /*array('captcha', 
               'application.extensions.recaptcha.EReCaptchaValidator', 
               'privateKey' => '6LcHyAsTAAAAADNnnbPJru4miCGmCCP4Wj5QJ5RO'),*/
            //validar terminios
            array('terminos', 'required', 'message' => '<span style="color: #F00;">Acepte los términos y condiciones</span>'),
        );
    }

    public function attributeLabels() {

        return array(
            'cedula' => 'Cédula de Identidad y Nombre de Usuario',
            'nombre_usuario' => 'Nombre de Usuario',
            'email' => 'Correo Elecrónico',
            'repetir_email' => 'Confirme el Correo Electrónico',
            'password' => 'Contraseña',
            'repetir_password' => 'Confirme la Contraseña',
            'terminos' => 'Términos y Condiciones',
            //'captcha' => 'Ingrese las dos palabras separadas por un espacio',
            //'captcha'=>Yii::t('demo', 'Ingrese las dos palabras separadas por un espacio'),
            'captcha'=>Yii::t('demo', 'Ingrese el codigo de verifición de la imagen'),
        );
    }
    
    
    //funciones para validar disponibilidad de correo electronico y nombre de usuario
    public function comprobar_email() {
        
        $conexion = Yii::app()->db;
        
        $sqlConsultaEmail = "select usu_mail from usuario where usu_mail = '$this->email'";
        $resultado = $conexion->createCommand($sqlConsultaEmail);
        //echo "voy a validar el mail"; Yii::app()->end();
        $emails = $resultado->query();

        foreach ($emails as $em) {
            if ($this->email == $em['usu_mail']) {
                $this->addError('email', '<span style="color: #F00;">Correo Electrónico ya registrado</span>');
                break;
            }
        }
    }

    public function comprobar_usuario() {

        $conexion = Yii::app()->db;
        
        $sqlConsultaUsername = "select usu_nombreusuario from usuario where usu_nombreusuario = '$this->nombre_usuario'";
        $resultado = $conexion->createCommand($sqlConsultaUsername);
        
        $usernames = $resultado->query();
        
        foreach ($usernames as $user) {
            if($this->nombre_usuario == $user['usu_nombreusuario']){
                $this->addError('nombre_usuario', '<span style="color: #F00;">El nombre de usuario ingresado no esta disponible</span>');
                break;
            }
        }
    }

}
