<?php

/**
 * This is the model class for table "tarea".
 *
 * The followings are the available columns in table 'tarea':
 * @property integer $tar_id
 * @property string $tar_nombre
 * @property string $tar_descripcion
 * @property string $tar_meta
 * @property string $tar_fechainicio
 * @property string $tar_fechafin
 * @property string $tar_fecharegistro
 * @property integer $tar_estado
 * @property integer $ins_id
 * @property integer $cat_id
 */
class Tarea extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tarea';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tar_nombre, tar_estado', 'required'),
			array('tar_estado, ins_id, cat_id', 'numerical', 'integerOnly'=>true),
			array('tar_fechainicio, tar_fechafin, tar_fecharegistro', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tar_id, tar_nombre, tar_descripcion, tar_meta, tar_fechainicio, tar_fechafin, tar_fecharegistro, tar_estado, ins_id, cat_id', 'safe', 'on'=>'search'),
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
			'tar_id' => 'Tar',
			'tar_nombre' => 'Tar Nombre',
			'tar_descripcion' => 'Tar Descripcion',
			'tar_meta' => 'Tar Meta',
			'tar_fechainicio' => 'Tar Fechainicio',
			'tar_fechafin' => 'Tar Fechafin',
			'tar_fecharegistro' => 'Tar Fecharegistro',
			'tar_estado' => 'Tar Estado',
			'ins_id' => 'Ins',
			'cat_id' => 'Cat',
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

		$criteria->compare('tar_id',$this->tar_id);
		$criteria->compare('tar_nombre',$this->tar_nombre,true);
		$criteria->compare('tar_descripcion',$this->tar_descripcion,true);
		$criteria->compare('tar_meta',$this->tar_meta,true);
		$criteria->compare('tar_fechainicio',$this->tar_fechainicio,true);
		$criteria->compare('tar_fechafin',$this->tar_fechafin,true);
		$criteria->compare('tar_fecharegistro',$this->tar_fecharegistro,true);
		$criteria->compare('tar_estado',$this->tar_estado);
		$criteria->compare('ins_id',$this->ins_id);
		$criteria->compare('cat_id',$this->cat_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tarea the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
