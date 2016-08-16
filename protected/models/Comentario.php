<?php

/**
 * This is the model class for table "comentario".
 *
 * The followings are the available columns in table 'comentario':
 * @property integer $com_id
 * @property integer $sol_id
 * @property integer $usu_id
 * @property string $com_descripcion
 * @property string $com_fecha
 *
 * The followings are the available model relations:
 * @property Solucion $sol
 * @property Usuario $usu
 */
class Comentario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comentario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sol_id, usu_id', 'numerical', 'integerOnly'=>true),
			array('com_descripcion, com_fecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('com_id, sol_id, usu_id, com_descripcion, com_fecha', 'safe', 'on'=>'search'),
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
			'sol' => array(self::BELONGS_TO, 'Solucion', 'sol_id'),
			'usu' => array(self::BELONGS_TO, 'Usuario', 'usu_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'com_id' => 'Com',
			'sol_id' => 'Sol',
			'usu_id' => 'Usu',
			'com_descripcion' => 'Com Descripcion',
			'com_fecha' => 'Com Fecha',
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

		$criteria->compare('com_id',$this->com_id);
		$criteria->compare('sol_id',$this->sol_id);
		$criteria->compare('usu_id',$this->usu_id);
		$criteria->compare('com_descripcion',$this->com_descripcion,true);
		$criteria->compare('com_fecha',$this->com_fecha,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comentario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function getComentarioSolucion($solId) {

        $conexion = Yii::app()->db;

        $sqlComentario = "select "
                . "com_id, sol_id, usu_id, "
                . "com_descripcion, "
                . "to_char(com_fecha_comentario, 'TMDay, DD TMMonth YYYY a las HH24:MI') as com_fecha "
                . "from comentario "
                . "where sol_id = $solId";

        $resultado = $conexion->createCommand($sqlComentario);

        $comentario = $resultado->query();

        /*$listaComentarios = array();

        foreach ($comentario as $comment) {
            $listaComentarios = array(
                'comId' => $comment['com_id'],
                'solId' => $comment['sol_id'],
                'usuId' => $comment['usu_id'],
                'comDesc' => $comment['com_descripcion'],
                'comFecha' => $comment['com_fecha'],
            );
        }*/

        return $comentario;
    }

}
