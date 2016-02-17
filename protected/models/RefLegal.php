<?php

/**
 * This is the model class for table "ref_legal".
 *
 * The followings are the available columns in table 'ref_legal':
 * @property integer $rl_id
 * @property string $rl_cuerpo
 * @property string $rl_fecha
 * @property integer $tar_id
 * @property integer $rl_tipo
 * @property integer $rl_motivo
 * @property integer $rl_difusion
 */
class RefLegal extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ref_legal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rl_cuerpo', 'required'),
			array('tar_id, rl_tipo, rl_motivo, rl_difusion', 'numerical', 'integerOnly'=>true),
			array('rl_cuerpo', 'length', 'max'=>300),
			array('rl_fecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('rl_id, rl_cuerpo, rl_fecha, tar_id, rl_tipo, rl_motivo, rl_difusion', 'safe', 'on'=>'search'),
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
			'rl_id' => 'Rl',
			'rl_cuerpo' => 'Rl Cuerpo',
			'rl_fecha' => 'Rl Fecha',
			'tar_id' => 'Tar',
			'rl_tipo' => 'Rl Tipo',
			'rl_motivo' => 'Rl Motivo',
			'rl_difusion' => 'Rl Difusion',
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

		$criteria->compare('rl_id',$this->rl_id);
		$criteria->compare('rl_cuerpo',$this->rl_cuerpo,true);
		$criteria->compare('rl_fecha',$this->rl_fecha,true);
		$criteria->compare('tar_id',$this->tar_id);
		$criteria->compare('rl_tipo',$this->rl_tipo);
		$criteria->compare('rl_motivo',$this->rl_motivo);
		$criteria->compare('rl_difusion',$this->rl_difusion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RefLegal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
