<?php

/**
 * This is the model class for table "mensajes_app".
 *
 * The followings are the available columns in table 'mensajes_app':
 * @property string $msg_id
 * @property string $msg_codigo
 * @property string $msg_titulo
 * @property string $msg_descripcion
 * @property string $msg_titulo_link
 * @property string $msg_url
 * @property integer $msg_eslink
 */
class MensajesApp extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mensajes_app';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('msg_eslink', 'numerical', 'integerOnly'=>true),
			array('msg_codigo, msg_titulo, msg_descripcion, msg_titulo_link, msg_url', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('msg_id, msg_codigo, msg_titulo, msg_descripcion, msg_titulo_link, msg_url, msg_eslink', 'safe', 'on'=>'search'),
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
			'msg_id' => 'Msg',
			'msg_codigo' => 'código del mensaje',
			'msg_titulo' => 'Msg Titulo',
			'msg_descripcion' => 'Msg Descripcion',
			'msg_titulo_link' => 'Msg Titulo Link',
			'msg_url' => 'Msg Url',
			'msg_eslink' => '1: si es link
0: no es link',
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

		$criteria->compare('msg_id',$this->msg_id,true);
		$criteria->compare('msg_codigo',$this->msg_codigo,true);
		$criteria->compare('msg_titulo',$this->msg_titulo,true);
		$criteria->compare('msg_descripcion',$this->msg_descripcion,true);
		$criteria->compare('msg_titulo_link',$this->msg_titulo_link,true);
		$criteria->compare('msg_url',$this->msg_url,true);
		$criteria->compare('msg_eslink',$this->msg_eslink);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MensajesApp the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
