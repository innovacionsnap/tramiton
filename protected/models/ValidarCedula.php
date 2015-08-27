<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ValidarCedula
 *
 * @author Oscar
 */
class ValidarCedula extends CFormModel {

    public $cedula_participacion;
    public $condicion_cedulado;
    public $estado_civil;
    public $fecha_nacimiento;
    public $nombre_ciudadano;
    public $genero;
    public $instruccion;
    public $nacionalidad;
    public $profesion;
    public $lugar_nacimiento;
    public $direccion_ciudadano;

    public function rules() {

        return array(
            //validación de cedula 
            array('cedula_participacion', 'required', 'message' => '<span style="color: #F00;">El número de cédula es requerido</span>'),
            array(
                'cedula_participacion',
                'match',
                'pattern' => '/^[0-9]+$/',
                'message' => 'Favor ingrese sólo números'
            ),
            array(
                'cedula_participacion',
                'length',
                'min' => 10,
                'tooShort' => '<span style="color: #F00;">Mínimo 10 caracteres</span>',
                'max' => 10,
                'tooLong' => '<span style="color: #F00;">Máximo 10 caracteres</span>'
            ),
        );
    }

    public function attributeLabels() {

        return array(
            'cedula_participacion' => 'Cédula de identidad',
        );
    }

    public function obtieneToken() {
        //arreglo con credenciales para obtener el token de utilizacion del ws
        $argumento = array(
            'ValidarPermisoPeticion' => array(
                'Cedula' => '1718455932',
                'Urlsw' => 'https://www.bsg.gob.ec/sw/RC/BSGSW01_Consultar_Cedula?wsdl'));
        $gobiernoelectronico = "https://www.bsg.gob.ec/sw/STI/BSGSW08_Acceder_BSG?wsdl";
        try {
            $client = new SoapClient($gobiernoelectronico);
            $token = $client->ValidarPermiso($argumento);
            return $token;
        } catch (SoapFault $e) {
            $token = 1;
            return $token;
        }
    }

    public function consultaCedulaRegistroCivil($cedula, $token1) {
        $cedula = $cedula;
        $autorizaWs = $token1;
        $respuesta = "";
        //validamos si la respuesta del token es valida
        if ($autorizaWs->return->Mensaje->CodError == '000') {
            //arreglo con credenciales para realizar la consulta de los datos en el registro civil
            $credenciales = array(
                'Cedula' => $cedula,
                'Usuario' => 'testroot',
                'Contrasenia' => 'Sti1DigS21');
            //realizamos la conexion con el webservice del registro civil
            try {

                $registrocivil = "https://www.bsg.gob.ec/sw/RC/BSGSW01_Consultar_Cedula?wsdl";
                $client2 = new SoapClient($registrocivil);
                //Crear la cabecera      
                $auth = '<wss:Security xmlns:wss="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
                        <wss:UsernameToken>
                            <wss:Username>1718455932</wss:Username>
                            <wss:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordDigest">' . $autorizaWs->return->Digest . '</wss:Password>
                            <wss:Nonce EncodingType="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-soap-message-security-1.0#Base64Binary">' . $autorizaWs->return->Nonce . '</wss:Nonce>
                            <wsu:Created xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">' . $autorizaWs->return->Fecha . '</wsu:Created>
                        </wss:UsernameToken>
                        <wsu:Timestamp xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd" wsu:Id="Timestamp-2">
                        <wsu:Created>' . $autorizaWs->return->Fecha . '</wsu:Created>
                        <wsu:Expires>' . $autorizaWs->return->FechaF . '</wsu:Expires>
                        </wsu:Timestamp>
                     </wss:Security>';

                $authvalues = new SoapVar($auth, XSD_ANYXML);
                $header = new SoapHeader("http://docs.oasis-open.org/wss/2004/01/oasis-" . "200401-wss-wssecurity-secext-1.0.xsd", "Security", $authvalues, true);
                //set the Headers of Soap Client.
                $client2->__setSoapHeaders($header);
                $ciudadano = $client2->BusquedaPorCedula($credenciales);
                $respuesta = "";

                foreach ($ciudadano as $valor) {
                    $error = $valor->CodigoError;
                    if ($error == '001' || $error == NULL) {
                        $respuesta = 0;
                        return $respuesta;
                        exit();
                    } else {
                        var_dump($valor);
			//echo "<hr>";
                        Yii::app()->end();
                        $this->cedula_participacion = $cedula;
                        $this->condicion_cedulado = $valor->CondicionCedulado;
                        $this->estado_civil = $valor->EstadoCivil;
                        $this->fecha_nacimiento = $valor->FechaNacimiento;
                        $this->nombre_ciudadano =  $valor->Nombre;
                        $this->genero = $valor->Genero;
                        $this->instruccion = $valor->Instruccion;
                        $this->nacionalidad = $valor->Nacionalidad;
                        $this->profesion = $valor->Profesion;
                        $this->lugar_nacimiento = $valor->LugarNacimiento;
                        $this->direccion_ciudadano = $valor->CalleDomicilio;
                    }
                }
            } catch (SoapFault $e) {
                return $respuesta = '10';
            }
            return $respuesta;
        } else {
            return $respuesta = 0;
        }
    }
    
   
    

}
