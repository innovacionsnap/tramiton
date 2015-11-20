<?php

/**
 * This is the model class for table "problema_tramite".
 *
 * The followings are the available columns in table 'problema_tramite':
 * @property integer $prob_id
 * @property integer $datt_id
 * @property integer $prot_estado_
 * @property string $prot_nombreotroproblema
 *
 * The followings are the available model relations:
 * @property DatosTramite $datt
 * @property Problema $prob
 */
class ProblemaTramite extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'problema_tramite';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('prot_estado_', 'required'),
			array('prob_id, datt_id, prot_estado_', 'numerical', 'integerOnly'=>true),
			array('prot_nombreotroproblema', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('prob_id, datt_id, prot_estado_, prot_nombreotroproblema', 'safe', 'on'=>'search'),
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
			'datt' => array(self::BELONGS_TO, 'DatosTramite', 'datt_id'),
			'prob' => array(self::BELONGS_TO, 'Problema', 'prob_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'prob_id' => 'Prob',
			'datt_id' => 'Datt',
			'prot_estado_' => 'Prot Estado',
			'prot_nombreotroproblema' => 'Prot Nombreotroproblema',
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

		$criteria->compare('prob_id',$this->prob_id);
		$criteria->compare('datt_id',$this->datt_id);
		$criteria->compare('prot_estado_',$this->prot_estado_);
		$criteria->compare('prot_nombreotroproblema',$this->prot_nombreotroproblema,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProblemaTramite the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
