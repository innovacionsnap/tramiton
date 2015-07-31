<?php

/**
 * This is the model class for table "tramite_institucion".
 *
 * The followings are the available columns in table 'tramite_institucion':
 * @property integer $trai_id
 * @property integer $ins_id
 * @property integer $tra_id
 * @property string $trai_proposito
 * @property string $trai_fecha
 * @property string $trai_demanda
 * @property integer $trai_estado
 *
 * The followings are the available model relations:
 * @property Mejora[] $mejoras
 * @property Institucion $ins
 * @property Tramite $tra
 * @property DatosTramite[] $datosTramites
 */
class TramiteInstitucion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tramite_institucion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('trai_estado', 'required'),
			array('ins_id, tra_id, trai_estado', 'numerical', 'integerOnly'=>true),
			array('trai_proposito', 'length', 'max'=>512),
			array('trai_demanda', 'length', 'max'=>20),
			array('trai_fecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('trai_id, ins_id, tra_id, trai_proposito, trai_fecha, trai_demanda, trai_estado', 'safe', 'on'=>'search'),
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
			'mejoras' => array(self::HAS_MANY, 'Mejora', 'trai_id'),
			'ins' => array(self::BELONGS_TO, 'Institucion', 'ins_id'),
			'tra' => array(self::BELONGS_TO, 'Tramite', 'tra_id'),
			'datosTramites' => array(self::HAS_MANY, 'DatosTramite', 'trai_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'trai_id' => 'Trai',
			'ins_id' => 'Ins',
			'tra_id' => 'Tra',
			'trai_proposito' => 'Trai Proposito',
			'trai_fecha' => 'Trai Fecha',
			'trai_demanda' => 'Trai Demanda',
			'trai_estado' => 'Trai Estado',
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

		$criteria->compare('trai_id',$this->trai_id);
		$criteria->compare('ins_id',$this->ins_id);
		$criteria->compare('tra_id',$this->tra_id);
		$criteria->compare('trai_proposito',$this->trai_proposito,true);
		$criteria->compare('trai_fecha',$this->trai_fecha,true);
		$criteria->compare('trai_demanda',$this->trai_demanda,true);
		$criteria->compare('trai_estado',$this->trai_estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TramiteInstitucion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
