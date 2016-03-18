<?php

/**
 * This is the model class for table "institucion".
 *
 * The followings are the available columns in table 'institucion':
 * @property integer $ins_id
 * @property integer $sec_id
 * @property string $ins_nombre
 * @property integer $ins_estado
 * @property integer $ins_funcion_ejecutiva
 * @property integer $ins_productivo
 * @property integer $ins_coordinadora
 *
 * The followings are the available model relations:
 * @property Sector $sec
 * @property TramiteInstitucion[] $tramiteInstitucions
 * @property InstitucionUsuario[] $institucionUsuarios
 */
class Institucion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'institucion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ins_nombre, ins_estado, ins_funcion_ejecutiva', 'required'),
			array('sec_id, ins_estado, ins_funcion_ejecutiva, ins_productivo, ins_coordinadora', 'numerical', 'integerOnly'=>true),
			array('ins_nombre', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ins_id, sec_id, ins_nombre, ins_estado, ins_funcion_ejecutiva, ins_productivo, ins_coordinadora', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'sec' => array(self::BELONGS_TO, 'Sector', 'sec_id'),
			'tramiteInstitucions' => array(self::HAS_MANY, 'TramiteInstitucion', 'ins_id'),
			'institucionUsuarios' => array(self::HAS_MANY, 'InstitucionUsuario', 'ins_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ins_id' => 'Ins',
			'sec_id' => 'Sec',
			'ins_nombre' => 'Ins Nombre',
			'ins_estado' => '1: institución normal
2: institución coordinadora',
			'ins_funcion_ejecutiva' => 'Ins Funcion Ejecutiva',
			'ins_productivo' => 'Ins Productivo',
			'ins_coordinadora' => 'campo para determinar si una institución es coordinadora o coordinada, si es coordinadora se almacena 0, si es coordinada se almacena el codigo de la institución coordinadora',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ins_id',$this->ins_id);
		$criteria->compare('sec_id',$this->sec_id);
		$criteria->compare('ins_nombre',$this->ins_nombre,true);
		$criteria->compare('ins_estado',$this->ins_estado);
		$criteria->compare('ins_funcion_ejecutiva',$this->ins_funcion_ejecutiva);
		$criteria->compare('ins_productivo',$this->ins_productivo);
		$criteria->compare('ins_coordinadora',$this->ins_coordinadora);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Institucion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
