<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $usu_id
 * @property integer $rol_id
 * @property integer $can_id
 * @property string $usu_cedula
 * @property string $usu_nombre
 * @property string $usu_direccion
 * @property string $usu_mail
 * @property string $usu_celular
 * @property string $usu_convencional
 * @property string $usu_nombreusuario
 * @property string $usu_contrasenia
 * @property string $usu_fechanacimiento
 * @property integer $usu_estado
 * @property string $usu_lugar_nacimiento
 * @property string $usu_fecha_registro
 * @property string $usu_genero
 * @property string $usu_imagen
 * @property string $usu_codigo_confirmacion
 *
 * The followings are the available model relations:
 * @property InstitucionUsuario[] $institucionUsuarios
 * @property Like[] $likes
 * @property Verificacion[] $verificacions
 * @property Canton $can
 * @property Role $rol
 * @property PermisoUsuario[] $permisoUsuarios
 * @property DatosTramite[] $datosTramites
 */
class Usuario extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'usuario';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('usu_cedula, usu_nombre, usu_direccion, usu_mail, usu_celular, usu_convencional, usu_nombreusuario, usu_contrasenia, usu_fechanacimiento, usu_estado', 'required'),
            array('rol_id, can_id, usu_estado', 'numerical', 'integerOnly' => true),
            array('usu_cedula, usu_nombreusuario', 'length', 'max' => 20),
            array('usu_nombre, usu_mail, usu_contrasenia', 'length', 'max' => 50),
            array('usu_direccion', 'length', 'max' => 250),
            array('usu_celular, usu_convencional', 'length', 'max' => 30),
            array('usu_lugar_nacimiento', 'length', 'max' => 100),
            array('usu_genero', 'length', 'max' => 10),
            array('usu_imagen, usu_codigo_confirmacion', 'length', 'max' => 200),
            array('usu_fecha_registro', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('usu_id, rol_id, can_id, usu_cedula, usu_nombre, usu_direccion, usu_mail, usu_celular, usu_convencional, usu_nombreusuario, usu_contrasenia, usu_fechanacimiento, usu_estado, usu_lugar_nacimiento, usu_fecha_registro, usu_genero, usu_imagen, usu_codigo_confirmacion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'institucionUsuarios' => array(self::HAS_MANY, 'InstitucionUsuario', 'usu_id'),
            'likes' => array(self::HAS_MANY, 'Like', 'usu_id'),
            'verificacions' => array(self::HAS_MANY, 'Verificacion', 'usu_id'),
            'can' => array(self::BELONGS_TO, 'Canton', 'can_id'),
            'rol' => array(self::BELONGS_TO, 'Role', 'rol_id'),
            'permisoUsuarios' => array(self::HAS_MANY, 'PermisoUsuario', 'usu_id'),
            'datosTramites' => array(self::HAS_MANY, 'DatosTramite', 'usu_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'usu_id' => 'Usu',
            'rol_id' => 'Rol',
            'can_id' => 'Can',
            'usu_cedula' => 'Usu Cedula',
            'usu_nombre' => 'Usu Nombre',
            'usu_direccion' => 'Usu Direccion',
            'usu_mail' => 'Usu Mail',
            'usu_celular' => 'Usu Celular',
            'usu_convencional' => 'Usu Convencional',
            'usu_nombreusuario' => 'Usu Nombreusuario',
            'usu_contrasenia' => 'Usu Contrasenia',
            'usu_fechanacimiento' => 'Usu Fechanacimiento',
            'usu_estado' => 'Usu Estado',
            'usu_lugar_nacimiento' => 'Usu Lugar Nacimiento',
            'usu_fecha_registro' => 'Usu Fecha Registro',
            'usu_genero' => 'Usu Genero',
            'usu_imagen' => 'Usu Imagen',
            'usu_codigo_confirmacion' => 'Usu Codigo Confirmacion',
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

        $criteria->compare('usu_id', $this->usu_id);
        $criteria->compare('rol_id', $this->rol_id);
        $criteria->compare('can_id', $this->can_id);
        $criteria->compare('usu_cedula', $this->usu_cedula, true);
        $criteria->compare('usu_nombre', $this->usu_nombre, true);
        $criteria->compare('usu_direccion', $this->usu_direccion, true);
        $criteria->compare('usu_mail', $this->usu_mail, true);
        $criteria->compare('usu_celular', $this->usu_celular, true);
        $criteria->compare('usu_convencional', $this->usu_convencional, true);
        $criteria->compare('usu_nombreusuario', $this->usu_nombreusuario, true);
        $criteria->compare('usu_contrasenia', $this->usu_contrasenia, true);
        $criteria->compare('usu_fechanacimiento', $this->usu_fechanacimiento, true);
        $criteria->compare('usu_estado', $this->usu_estado);
        $criteria->compare('usu_lugar_nacimiento', $this->usu_lugar_nacimiento, true);
        $criteria->compare('usu_fecha_registro', $this->usu_fecha_registro, true);
        $criteria->compare('usu_genero', $this->usu_genero, true);
        $criteria->compare('usu_imagen', $this->usu_imagen, true);
        $criteria->compare('usu_codigo_confirmacion', $this->usu_codigo_confirmacion, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Usuario the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * 
     */
    public function validatePassword($password) {
        return $this->getHash('sha1', $password, HASH_KEY) === $this->usu_contrasenia;
    }

    public static function getHash($algoritmo, $data, $key) {
        $hash = hash_init($algoritmo, HASH_HMAC, $key);
        hash_update($hash, $data);

        return hash_final($hash);
    }

}
