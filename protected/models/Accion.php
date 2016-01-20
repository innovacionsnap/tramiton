<?php

/**
 * This is the model class for table "accion".
 *
 * The followings are the available columns in table 'accion':
 * @property integer $acc_id
 * @property string $acc_nombre
 * @property string $acc_descripcion
 * @property string $acc_fechainicio
 * @property string $acc_fechafin
 * @property string $acc_fecharegistro
 * @property integer $acc_estado
 * @property integer $tar_id
 * @property integer $usu_id
 * @property integer $acc_nivel
 */
class Accion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'accion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('acc_nombre, acc_estado', 'required'),
			array('acc_estado, tar_id, usu_id, acc_nivel', 'numerical', 'integerOnly'=>true),
			array('acc_nombre', 'length', 'max'=>50),
			array('acc_descripcion, acc_fechainicio, acc_fechafin, acc_fecharegistro', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('acc_id, acc_nombre, acc_descripcion, acc_fechainicio, acc_fechafin, acc_fecharegistro, acc_estado, tar_id, usu_id, acc_nivel', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'acc_id' => 'Acc',
			'acc_nombre' => 'Acc Nombre',
			'acc_descripcion' => 'Acc Descripcion',
			'acc_fechainicio' => 'Acc Fechainicio',
			'acc_fechafin' => 'Acc Fechafin',
			'acc_fecharegistro' => 'Acc Fecharegistro',
			'acc_estado' => 'Acc Estado',
			'tar_id' => 'Tar',
			'usu_id' => 'Usu',
			'acc_nivel' => 'Acc Nivel',
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

		$criteria->compare('acc_id',$this->acc_id);
		$criteria->compare('acc_nombre',$this->acc_nombre,true);
		$criteria->compare('acc_descripcion',$this->acc_descripcion,true);
		$criteria->compare('acc_fechainicio',$this->acc_fechainicio,true);
		$criteria->compare('acc_fechafin',$this->acc_fechafin,true);
		$criteria->compare('acc_fecharegistro',$this->acc_fecharegistro,true);
		$criteria->compare('acc_estado',$this->acc_estado);
		$criteria->compare('tar_id',$this->tar_id);
		$criteria->compare('usu_id',$this->usu_id);
		$criteria->compare('acc_nivel',$this->acc_nivel);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Accion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
