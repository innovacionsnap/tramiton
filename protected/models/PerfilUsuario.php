<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PerfilUsuario
 *
 * @author oscar.acero
 */
class PerfilUsuario extends CFormModel {
    
    public $nombreUsuario;
    public $email;
    public $telfConvencional;
    public $telfCelular;
    public $direccion;
    public $fechaNacimiento;
    public $lugarNacimiento;
    public $genero;
    public $idUsr;
    public $imagenPerfil;


    public function rules() {
        return array(
            array('nombreUsuario', 'required', 'message' => '<span style="color: #F00;">El nombre de usuario es requerido</span>'),
            array(
                'nombreUsuario',
                'match',
                'pattern' => '/^[a-zA-Z0-9.]+$/',
                'message' => '<span style="color: #F00;">Solo ingrese letras y números</span>'
            ),
            array(
                'nombreUsuario',
                'length',
                'min' => 6,
                'tooShort' => '<span style="color: #F00;">Mínimo 6 caracteres</span>',
                'max' => 30,
                'tooLong' => '<span style="color: #F00;">Máximo 30 caracteres</span>'
            ),
            array('nombreUsuario', 'comprobar_usuario'),
            
            array('email', 'required', 'message' => '<span style="color: #F00;">El correo electrónico es requerido</span>'),
            array('telfConvencional', 'required', 'message' => '<span style="color: #F00;">El teléfono convencional es requerido</span>'),
            array('telfCelular', 'required', 'message' => '<span style="color: #F00;">El teléfono celular es requerido</span>'),
            array('direccion', 'required', 'message' => '<span style="color: #F00;">La dirección es requerida</span>'),
            array('fechaNacimiento', 'required', 'message' => '<span style="color: #F00;">La fecha de nacimiento es requerida</span>'),
            array('lugarNacimiento', 'required', 'message' => '<span style="color: #F00;">El nombre de usuario es requerido</span>'),
            array('genero', 'required', 'message' => '<span style="color: #F00;">El género es requerido</span>'),
            
        );
    }
    
     public function attributeLabels() {
        return array(
            'nombreUsuario' => 'Username',
            'email' => 'E-mail',
            'telfConvencional' => 'Convencional',
            'telfCelular' => 'Celular',
            'direccion' => 'Dirección',
            'fechaNacimiento' => 'Fecha Nac.',
            'lugarNacimiento' => 'Lugar Nac.',
            'genero' => 'Genero',
            'imagenPerfil' => 'Imagen',
        );
    }
    
    public function comprobar_usuario() {

        $conexion = Yii::app()->db;
        
        $sqlConsultaUsername = "select usu_nombreusuario, usu_cedula, usu_id from usuario where usu_nombreusuario = '$this->nombreUsuario'";
        $resultado = $conexion->createCommand($sqlConsultaUsername);
        
        $usernames = $resultado->query();
        
        //$usuario = Yii::app()->user->id;
        
        $userLogin = Usuario::model()->findByPk(Yii::app()->user->id);
        
        foreach ($usernames as $user) {
            if(($this->nombreUsuario == $user['usu_nombreusuario']) && ($userLogin['usu_cedula'] != $user['usu_cedula'])){
                $this->addError('nombreUsuario', '<span style="color: #F00;">El nombre de usuario ingresado no esta disponible</span>');
                break;
            }
        }
    }
    
    
}
