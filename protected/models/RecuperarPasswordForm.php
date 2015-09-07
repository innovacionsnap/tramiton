<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RecuperarPasswordForm
 *
 * @author oscar.acero
 */
class RecuperarPasswordForm extends CFormModel {
    
    //public $username;
    public $email;
    public $captcha;
    
    public function rules(){
        return array(
            //validación email
            array('email', 'required', 'message' => '<span style="color: #F00;">El correo electrónico es requerido</span>'),
            array(
                'email',
                'email',
                'message' => '<span style="color: #F00;">Favor ingrese una dirección de correo electrónico válida</span>'
            ),
            //array('email', 'comprobar_email'),
            
            //validar captcha
            array('captcha', 'required', 'message' => '<span style="color: #F00;">El código de verificación es requerido</span>', 'on'=>'recuperarPassword'),
            array(
                'captcha', 
                'ext.validacion.AjaxCaptchaValidator', 
                'allowEmpty' => !Yii::app()->user->isGuest || !CCaptcha::checkRequirements(),
                'message' => '<span style="color: #F00;">El texto no corresponde al de la imagen</span>'
            ),
            /*array(
                'captcha',
                'captcha',
                'on' => 'recuperarPassword',
                'captchaAction' => 'user/captcha',
                'skipOnError' => true,
                'message' => '<span style="color: #F00;">El texto no corresponde al de la imagen</span>'
            ),*/
        );
    }
    
    public function attributeLabels() {

        return array(
            'email' => 'Correo Elecrónico',
            'captcha' => 'Código de Verificación',
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
            if ($this->email != $em['usu_mail']) {
                $this->addError('email', '<span style="color: #F00;">Correo Electrónico ingresado no se encuentra registrado en Tramiton</span>');
                break;
            }
        }
    }
}
