<?php

/**
 * This is the model class for table "tarea_usuario".
 *
 * The followings are the available columns in table 'tarea_usuario':
 * @property integer $taru_id
 * @property integer $tar_id
 * @property integer $taru_estado
 * @property integer $usu_id
 * @property integer $taru_creador
 */
class TareaUsuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tarea_usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('taru_estado', 'required'),
			array('tar_id, taru_estado, usu_id, taru_creador', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('taru_id, tar_id, taru_estado, usu_id, taru_creador', 'safe', 'on'=>'search'),
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
			'taru_id' => 'Taru',
			'tar_id' => 'Tar',
			'taru_estado' => 'Taru Estado',
			'usu_id' => 'Usu',
			'taru_creador' => 'Taru Creador',
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

		$criteria->compare('taru_id',$this->taru_id);
		$criteria->compare('tar_id',$this->tar_id);
		$criteria->compare('taru_estado',$this->taru_estado);
		$criteria->compare('usu_id',$this->usu_id);
		$criteria->compare('taru_creador',$this->taru_creador);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TareaUsuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
