<?php

/**
 * This is the model class for table "empresa".
 *
 * The followings are the available columns in table 'empresa':
 * @property integer $emp_id
 * @property integer $usu_id
 * @property string $emp_ruc
 * @property string $emp_razon
 * @property string $emp_direccion
 * @property string $emp_telefono1
 * @property string $emp_telefono2
 * @property string $emp_fax
 * @property string $emp_web
 * @property string $emp_email
 *
 * The followings are the available model relations:
 * @property Usuario $usu
 */
class Empresa extends CActiveRecord {

    public $captcha;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'empresa';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('emp_ruc, emp_razon, emp_direccion, emp_telefono1', 'required', 'message' => 'Campo requerido'),
            array('usu_id', 'numerical', 'integerOnly' => true),
            array('emp_ruc', 'length', 'min' => 13, 'tooShort' => 'El campo debe contener 13 dígitos', 'max' => 13),
            array('emp_ruc', 'unique', 'message' => 'Ya existe la huevada'),
            array('emp_razon, emp_direccion', 'length', 'max' => 250),
            array('emp_telefono1, emp_telefono2, emp_fax', 'length', 'max' => 10),
            array('emp_web, emp_email', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('emp_id, usu_id, emp_ruc, emp_razon, emp_direccion, emp_telefono1, emp_telefono2, emp_fax, emp_web, emp_email', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'usu' => array(self::BELONGS_TO, 'Usuario', 'usu_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'emp_id' => 'Emp',
            'usu_id' => 'Usu',
            'emp_ruc' => 'Emp Ruc',
            'emp_razon' => 'Emp Razon',
            'emp_direccion' => 'Emp Direccion',
            'emp_telefono1' => 'Emp Telefono1',
            'emp_telefono2' => 'Emp Telefono2',
            'emp_fax' => 'Emp Fax',
            'emp_web' => 'Emp Web',
            'emp_email' => 'Emp Email',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('emp_id', $this->emp_id);
        $criteria->compare('usu_id', $this->usu_id);
        $criteria->compare('emp_ruc', $this->emp_ruc, true);
        $criteria->compare('emp_razon', $this->emp_razon, true);
        $criteria->compare('emp_direccion', $this->emp_direccion, true);
        $criteria->compare('emp_telefono1', $this->emp_telefono1, true);
        $criteria->compare('emp_telefono2', $this->emp_telefono2, true);
        $criteria->compare('emp_fax', $this->emp_fax, true);
        $criteria->compare('emp_web', $this->emp_web, true);
        $criteria->compare('emp_email', $this->emp_email, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Empresa the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function obtieneToken() {
        //arreglo con credenciales para obtener el token de utilizacion del ws
        $argumento = array(
            'ValidarPermisoPeticion' => array(
                'Cedula' => '1714787270',
                'Urlsw' => 'https://www.bsg.gob.ec/sw/SRI/BSGSW01_Consultar_RucSRI?wsdl'));
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

    public function consultaRucSri($ruc, $token1) {
        $autorizaWs = $token1;
        $respuesta = "";
        //validamos si la respuesta del token es valida
        if ($autorizaWs->return->Mensaje->CodError == '000') {
            //arreglo con credenciales para realizar la consulta de los datos en el sri
            $credenciales = array(
                'numeroRuc' => $ruc, 'fuenteDatos' => 'SRI');
            //realizamos la conexion con el webservice del sri
            try {

                $sri = "https://www.bsg.gob.ec/sw/SRI/BSGSW01_Consultar_RucSRI?wsdl";
                $client2 = new SoapClient($sri);
                //Crear la cabecera      
                $auth = '<wss:Security xmlns:wss="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
                        <wss:UsernameToken>
                            <wss:Username>1714787270</wss:Username>
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
                $header = new SoapHeader("http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd", "Security", $authvalues, true);
                //set the Headers of Soap Client.
                $client2->__setSoapHeaders($header);
                $empresa = $client2->obtenerCompleto($credenciales);
                $respuesta = "";

                //si está vacío el objeto
                if ($empresa->return == '') {
                    return 3;
                } else {
                    foreach ($empresa as $valor) {

                        $this->emp_ruc = $ruc;
                        $this->emp_razon = $valor->razonSocial;
                        $this->emp_direccion = $valor->direccionCorta;
                        $this->emp_telefono1 = $valor->telefonoDomicilio;
                        $this->emp_telefono2 = '';
                        $this->emp_fax = '';
                        $this->emp_email = '';
                    }
                    return $this;
                }
            } catch (SoapFault $e) {
                return $respuesta = 10;
            }
            return $empresa;
        } else {
            return $respuesta = 2;
        }
    }

    public function codificaGet($url) {
        $url = utf8_encode($url);
        $control = "qwerty"; //defino la llave para encriptar la cadena, cambiarla por la que deseamos usar
        $url = $control . $url . $control; //concateno la llave para encriptar la cadena
        $url = base64_encode($url); //codifico la cadena
        return($url);
    }

    public function decodificaGet($url) {
        $cad = explode("?", $url); //separo la url desde el ?
        $url = $cad[1]; //capturo la url desde el separador ? en adelante
        
        $cad_get = explode("and", $url);
        if (count($cad_get)==1){
            $url = base64_decode($cad_get[0]); //decodifico la cadena
        }else{
            $url = base64_decode($cad_get[0]).'&'.base64_decode($cad_get[1]); //decodifico la cadena
        }
        $control = "qwerty"; //defino la llave con la que fue encriptada la cadena,, cambiarla por la que deseamos usar
        $url = str_replace($control,"","$url"); //quito la llave de la cadena
        
        //procedo a dejar cada variable en el $_GET
         //separo la url por &
        $cad_get=  explode("&", $url);
        foreach ($cad_get as $value) {
            $val_get = explode("=", $value); //asigno los valosres al GET
            $_GET[$val_get[0]] = utf8_decode($val_get[1]);
        }
        
    }

}
