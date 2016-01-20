<?php

/**
 * This is the model class for table "tmp_registro_caso".
 *
 * The followings are the available columns in table 'tmp_registro_caso':
 * @property string $id_registro_caso
 * @property string $cedula
 * @property integer $id_institucion
 * @property integer $id_tramite
 * @property string $experiencia
 * @property string $titulo_solucion
 * @property integer $id_canton
 * @property string $unidad_prestadora
 * @property string $verificacion
 * @property string $otro_problema
 * @property string $fecha_registro
 * @property string $propuesta_solucion
 * @property string $otro_tramite
 *
 * The followings are the available model relations:
 * @property TmpProblemaRegistroCaso[] $tmpProblemaRegistroCasos
 */
class TmpRegistroCaso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tmp_registro_caso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_institucion, id_tramite, id_canton', 'numerical', 'integerOnly'=>true),
			array('cedula', 'length', 'max'=>10),
			array('experiencia, titulo_solucion, unidad_prestadora, verificacion, otro_problema, fecha_registro, propuesta_solucion, otro_tramite', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_registro_caso, cedula, id_institucion, id_tramite, experiencia, titulo_solucion, id_canton, unidad_prestadora, verificacion, otro_problema, fecha_registro, propuesta_solucion, otro_tramite', 'safe', 'on'=>'search'),
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
			'tmpProblemaRegistroCasos' => array(self::HAS_MANY, 'TmpProblemaRegistroCaso', 'id_registro_caso'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_registro_caso' => 'Id Registro Caso',
			'cedula' => 'Cedula',
			'id_institucion' => 'Id Institucion',
			'id_tramite' => 'Id Tramite',
			'experiencia' => 'Experiencia',
			'titulo_solucion' => 'Titulo Solucion',
			'id_canton' => 'Id Canton',
			'unidad_prestadora' => 'Unidad Prestadora',
			'verificacion' => 'Verificacion',
			'otro_problema' => 'Otro Problema',
			'fecha_registro' => 'Fecha Registro',
			'propuesta_solucion' => 'Propuesta Solucion',
			'otro_tramite' => 'Otro Tramite',
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

		$criteria->compare('id_registro_caso',$this->id_registro_caso,true);
		$criteria->compare('cedula',$this->cedula,true);
		$criteria->compare('id_institucion',$this->id_institucion);
		$criteria->compare('id_tramite',$this->id_tramite);
		$criteria->compare('experiencia',$this->experiencia,true);
		$criteria->compare('titulo_solucion',$this->titulo_solucion,true);
		$criteria->compare('id_canton',$this->id_canton);
		$criteria->compare('unidad_prestadora',$this->unidad_prestadora,true);
		$criteria->compare('verificacion',$this->verificacion,true);
		$criteria->compare('otro_problema',$this->otro_problema,true);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('propuesta_solucion',$this->propuesta_solucion,true);
		$criteria->compare('otro_tramite',$this->otro_tramite,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TmpRegistroCaso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
