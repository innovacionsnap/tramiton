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
            array('emp_ruc, emp_razon, emp_direccion, emp_telefono1', 'required'),
            array('usu_id', 'numerical', 'integerOnly' => true),
            array('emp_ruc', 'length', 'max' => 13),
            array('emp_razon, emp_direccion', 'length', 'max' => 250),
            array('emp_telefono1, emp_telefono2, emp_fax', 'length', 'max' => 10),
            array('emp_web, emp_email', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('emp_id, usu_id, emp_ruc, emp_razon, emp_direccion, emp_telefono1, emp_telefono2, emp_fax, emp_web, emp_email', 'safe', 'on' => 'search'),
            array('captcha', 'required', 'message' => '<span style="color: #F00;">El código de verificación es requerido</span>'),
            array(
                'captcha',
                'ext.validacion.AjaxCaptchaValidator',
                'allowEmpty' => !Yii::app()->user->isGuest || !CCaptcha::checkRequirements(),
                'message' => '<span style="color: #F00;">El texto no corresponde al de la imagen</span>'
            ),
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
            'captcha'=>Yii::t('demo', 'Ingrese el codigo de verifición de la imagen'),
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

}
