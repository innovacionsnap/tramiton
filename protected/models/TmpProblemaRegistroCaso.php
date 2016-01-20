<?php

/**
 * This is the model class for table "tmp_problema_registro_caso".
 *
 * The followings are the available columns in table 'tmp_problema_registro_caso':
 * @property string $id_problema_caso
 * @property integer $id_problema
 * @property integer $id_registro_caso
 * @property string $otro_problema
 *
 * The followings are the available model relations:
 * @property TmpRegistroCaso $idRegistroCaso
 */
class TmpProblemaRegistroCaso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tmp_problema_registro_caso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_problema, id_registro_caso', 'numerical', 'integerOnly'=>true),
			array('otro_problema', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_problema_caso, id_problema, id_registro_caso, otro_problema', 'safe', 'on'=>'search'),
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
			'idRegistroCaso' => array(self::BELONGS_TO, 'TmpRegistroCaso', 'id_registro_caso'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_problema_caso' => 'Id Problema Caso',
			'id_problema' => 'Id Problema',
			'id_registro_caso' => 'Id Registro Caso',
			'otro_problema' => 'Otro Problema',
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

		$criteria->compare('id_problema_caso',$this->id_problema_caso,true);
		$criteria->compare('id_problema',$this->id_problema);
		$criteria->compare('id_registro_caso',$this->id_registro_caso);
		$criteria->compare('otro_problema',$this->otro_problema,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TmpProblemaRegistroCaso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
