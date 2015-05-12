<?php

/**
 * This is the model class for table "permiso_usuario".
 *
 * The followings are the available columns in table 'permiso_usuario':
 * @property integer $per_id
 * @property integer $usu_id
 * @property integer $valor
 * @property string $per_usu_id
 *
 * The followings are the available model relations:
 * @property Permiso $per
 * @property Usuario $usu
 */
class PermisoUsuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'permiso_usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('valor', 'required'),
			array('per_id, usu_id, valor', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('per_id, usu_id, valor, per_usu_id', 'safe', 'on'=>'search'),
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
			'per' => array(self::BELONGS_TO, 'Permiso', 'per_id'),
			'usu' => array(self::BELONGS_TO, 'Usuario', 'usu_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'per_id' => 'Id Permiso',
			'usu_id' => 'Id Usuario',
			'valor' => 'Valor',
			'per_usu_id' => 'Per Usu',
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

		$criteria->compare('per_id',$this->per_id);
		$criteria->compare('usu_id',$this->usu_id);
		$criteria->compare('valor',$this->valor);
		$criteria->compare('per_usu_id',$this->per_usu_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PermisoUsuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
