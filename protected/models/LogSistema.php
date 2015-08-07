<?php

/**
 * This is the model class for table "log_sistema".
 *
 * The followings are the available columns in table 'log_sistema':
 * @property integer $logs_id
 * @property string $logs_usu_id
 * @property string $logs_usu_nombre
 * @property string $logs_accion
 * @property string $logs_fechahora
 * @property string $logs_ip_ips
 * @property string $logs_ip
 * @property integer $logs_estado
 * @property string $logs_usu_usuario
 * @property string $logs_tipo_publicacion
 * @property integer $logs_idtabla
 * @property string $logs_tabla
 */
class LogSistema extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'log_sistema';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('logs_usu_id, logs_usu_nombre, logs_accion, logs_fechahora, logs_ip_ips, logs_ip, logs_estado', 'required'),
			array('logs_estado, logs_idtabla', 'numerical', 'integerOnly'=>true),
			array('logs_usu_id, logs_ip_ips', 'length', 'max'=>50),
			array('logs_usu_nombre, logs_usu_usuario, logs_tipo_publicacion', 'length', 'max'=>250),
			array('logs_accion', 'length', 'max'=>1000),
			array('logs_ip', 'length', 'max'=>20),
			array('logs_tabla', 'length', 'max'=>80),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('logs_id, logs_usu_id, logs_usu_nombre, logs_accion, logs_fechahora, logs_ip_ips, logs_ip, logs_estado, logs_usu_usuario, logs_tipo_publicacion, logs_idtabla, logs_tabla', 'safe', 'on'=>'search'),
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
			'logs_id' => 'Logs',
			'logs_usu_id' => 'Logs Usu',
			'logs_usu_nombre' => 'Logs Usu Nombre',
			'logs_accion' => 'Logs Accion',
			'logs_fechahora' => 'Logs Fechahora',
			'logs_ip_ips' => 'Logs Ip Ips',
			'logs_ip' => 'Logs Ip',
			'logs_estado' => 'Logs Estado',
			'logs_usu_usuario' => 'Logs Usu Usuario',
			'logs_tipo_publicacion' => 'Logs Tipo Publicacion',
			'logs_idtabla' => 'Logs Idtabla',
			'logs_tabla' => 'Logs Tabla',
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

		$criteria->compare('logs_id',$this->logs_id);
		$criteria->compare('logs_usu_id',$this->logs_usu_id,true);
		$criteria->compare('logs_usu_nombre',$this->logs_usu_nombre,true);
		$criteria->compare('logs_accion',$this->logs_accion,true);
		$criteria->compare('logs_fechahora',$this->logs_fechahora,true);
		$criteria->compare('logs_ip_ips',$this->logs_ip_ips,true);
		$criteria->compare('logs_ip',$this->logs_ip,true);
		$criteria->compare('logs_estado',$this->logs_estado);
		$criteria->compare('logs_usu_usuario',$this->logs_usu_usuario,true);
		$criteria->compare('logs_tipo_publicacion',$this->logs_tipo_publicacion,true);
		$criteria->compare('logs_idtabla',$this->logs_idtabla);
		$criteria->compare('logs_tabla',$this->logs_tabla,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LogSistema the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
