<?php

/**
 * This is the model class for table "tarea_interopera".
 *
 * The followings are the available columns in table 'tarea_interopera':
 * @property integer $tarin_id
 * @property integer $tar_id
 * @property integer $tarin_estado
 * @property integer $ins_id
 */
class TareaInteropera extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tarea_interopera';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tarin_estado', 'required'),
			array('tar_id, tarin_estado, ins_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tarin_id, tar_id, tarin_estado, ins_id', 'safe', 'on'=>'search'),
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
			'tarin_id' => 'Tarin',
			'tar_id' => 'Tar',
			'tarin_estado' => 'Tarin Estado',
			'ins_id' => 'Ins',
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

		$criteria->compare('tarin_id',$this->tarin_id);
		$criteria->compare('tar_id',$this->tar_id);
		$criteria->compare('tarin_estado',$this->tarin_estado);
		$criteria->compare('ins_id',$this->ins_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TareaInteropera the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
