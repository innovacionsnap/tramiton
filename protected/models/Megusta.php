<?php

/**
 * This is the model class for table "megusta".
 *
 * The followings are the available columns in table 'megusta':
 * @property integer $mgu_id
 * @property integer $sol_id
 * @property integer $usu_id
 * @property string $mgu_fecha
 * @property integer $mgu_estado
 *
 * The followings are the available model relations:
 * @property Solucion $sol
 * @property Usuario $usu
 */
class Megusta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'megusta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mgu_fecha', 'required'),
			array('sol_id, usu_id, mgu_estado', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('mgu_id, sol_id, usu_id, mgu_fecha, mgu_estado', 'safe', 'on'=>'search'),
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
			'mgu_id' => 'Mgu',
			'sol_id' => 'Sol',
			'usu_id' => 'Usu',
			'mgu_fecha' => 'Mgu Fecha',
			'mgu_estado' => 'Mgu Estado',
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

		$criteria->compare('mgu_id',$this->mgu_id);
		$criteria->compare('sol_id',$this->sol_id);
		$criteria->compare('usu_id',$this->usu_id);
		$criteria->compare('mgu_fecha',$this->mgu_fecha,true);
		$criteria->compare('mgu_estado',$this->mgu_estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Megusta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        /**
         * Función que permite obtener los 10 trámites más votados
         * @return type
         */
        public function getVotosSolucion() {
        
       $sql = 'select tra_nombre, sol_descripcion, count(mgu_id) as likes
from solucion a, datos_tramite b, tramite_institucion c, tramite d, megusta e
where 	a.datt_id=b.datt_id and 
	b.trai_id=c.trai_id and
	c.tra_id=d.tra_id and
	a.sol_id= e.sol_id and
	sol_estado=1
group by a.sol_id, tra_nombre
order by likes desc limit 10';
        $rows = Yii::app()->db->createCommand($sql)->queryAll();
        return $rows;
    }
}
