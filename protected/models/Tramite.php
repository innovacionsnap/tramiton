<?php

/**
 * This is the model class for table "tramite".
 *
 * The followings are the available columns in table 'tramite':
 * @property integer $tra_id
 * @property string $tra_nombre
 * @property integer $tra_estado
 *
 * The followings are the available model relations:
 * @property TramiteInstitucion[] $tramiteInstitucions
 */
class Tramite extends CActiveRecord {
    
    private $connection;
    
    public function __construct() {
        //Yii::app()->db->connectionString
        // 
        $this->connection = new CDbConnection(Yii::app()->db->connectionString, Yii::app()->db->username, Yii::app()->db->password);
        $this->connection->active = TRUE;
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tramite';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tra_nombre, tra_estado', 'required'),
            array('tra_estado', 'numerical', 'integerOnly' => true),
            array('tra_nombre', 'length', 'max' => 512),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('tra_id, tra_nombre, tra_estado', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tramiteInstitucions' => array(self::HAS_MANY, 'TramiteInstitucion', 'tra_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'tra_id' => 'Tra',
            'tra_nombre' => 'Tra Nombre',
            'tra_estado' => 'Tra Estado',
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

        $criteria->compare('tra_id', $this->tra_id);
        $criteria->compare('tra_nombre', $this->tra_nombre, true);
        $criteria->compare('tra_estado', $this->tra_estado);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Tramite the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getTramites($institucion) {

       $sql = 'select ti.trai_id, t.tra_id,t.tra_nombre from tramite t, tramite_institucion ti, institucion i where t.tra_id=ti.tra_id and ti.ins_id=i.ins_id and i.ins_id='.$institucion.' and ti.trai_estado=1 order by tra_nombre';
        //$sql = "select * from tramite";
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
        //return $institucion;
    }
    
    public function getOtroTramite($idTramiteInstitucion) {
        
        $sql = "select tra_id from tramite_institucion where trai_id = $idTramiteInstitucion";
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
        
    }

}
