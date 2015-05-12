<?php

/**
 * This is the model class for table "permiso_rol".
 *
 * The followings are the available columns in table 'permiso_rol':
 * @property integer $per_id
 * @property integer $rol_id
 * @property integer $perr_valor
 * @property string $per_rol_id
 *
 * The followings are the available model relations:
 * @property Permiso $per
 * @property Role $rol
 */
class PermisoRol extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'permiso_rol';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('per_id, rol_id, perr_valor', 'required'),
			array('per_id, rol_id, perr_valor', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('per_id, rol_id, perr_valor, per_rol_id', 'safe', 'on'=>'search'),
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
			'rol' => array(self::BELONGS_TO, 'Role', 'rol_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'per_id' => 'Permiso',
			'rol_id' => 'Rol',
			'perr_valor' => 'Valor Permiso - Rol',
			'per_rol_id' => 'Identificador',
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
		$criteria->compare('rol_id',$this->rol_id);
		$criteria->compare('perr_valor',$this->perr_valor);
		$criteria->compare('per_rol_id',$this->per_rol_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PermisoRol the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        /*
         * Función que consulta los roles existentes de la base de datos
         */
        public function getListaRoles() {
            return CHtml::listData(Role::model()->findAll('rol_estado=?', array(1)), 'rol_id', 'rol_nombre');
        }
        
        public function getListaPermisos() {
            return CHtml::listData(Permiso::model()->findAll(), 'per_id', 'per_permiso_desc');
        }
}
