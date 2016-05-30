<?php

/**
 * This is the model class for table "solucion".
 *
 * The followings are the available columns in table 'solucion':
 * @property integer $sol_id
 * @property integer $datt_id
 * @property integer $usu_id
 * @property string $sol_titulo
 * @property string $sol_descripcion
 * @property integer $sol_vistas
 * @property string $sol_fecha
 * @property integer $sol_estado
 *
 * The followings are the available model relations:
 * @property DatosTramite $datt
 * @property Usuario $usu
 * @property Comentario[] $comentarios
 * @property Megusta[] $megustas
 */
class Solucion extends CActiveRecord {

    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'solucion';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('sol_titulo, sol_descripcion, sol_vistas, sol_fecha', 'required'),
            array('datt_id, usu_id, sol_vistas, sol_estado', 'numerical', 'integerOnly' => true),
            array('sol_titulo', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('sol_id, datt_id, usu_id, sol_titulo, sol_descripcion, sol_vistas, sol_fecha, sol_estado', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'datt' => array(self::BELONGS_TO, 'DatosTramite', 'datt_id'),
            'usu' => array(self::BELONGS_TO, 'Usuario', 'usu_id'),
            'comentarios' => array(self::HAS_MANY, 'Comentario', 'sol_id'),
            'megustas' => array(self::HAS_MANY, 'Megusta', 'sol_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'sol_id' => 'Sol',
            'datt_id' => 'Datt',
            'usu_id' => 'Usu',
            'sol_titulo' => 'Sol Titulo',
            'sol_descripcion' => 'Sol Descripcion',
            'sol_vistas' => 'Sol Vistas',
            'sol_fecha' => 'Sol Fecha',
            'sol_estado' => 'Sol Estado',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('sol_id', $this->sol_id);
        $criteria->compare('datt_id', $this->datt_id);
        $criteria->compare('usu_id', $this->usu_id);
        $criteria->compare('sol_titulo', $this->sol_titulo, true);
        $criteria->compare('sol_descripcion', $this->sol_descripcion, true);
        $criteria->compare('sol_vistas', $this->sol_vistas);
        $criteria->compare('sol_fecha', $this->sol_fecha, true);
        $criteria->compare('sol_estado', $this->sol_estado);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Solucion the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
/**
 * Función que permite obtener los trámites que más casos registrados tienen
 * @return array
 */
    public function getRanking() {
        
       $sql = 'select ins_nombre, tra_nombre, sol_descripcion,sol_vistas 
from solucion a, datos_tramite b, tramite_institucion c, tramite d, institucion e 
where sol_estado=1 and 
	a.datt_id=b.datt_id and 
	b.trai_id=c.trai_id and
	c.tra_id=d.tra_id and
        c.ins_id=e.ins_id and
        e.ins_funcion_ejecutiva=1
order by sol_vistas desc limit 10';
        $rows = Yii::app()->db->createCommand($sql)->queryAll();
        return $rows;
    }
    /**
     * Función que permite obtener el nombre de un trámite específico
     * @param int $id_trains
     * @return array
     */
    public function getTramite($id_trains){
        $sql= 'select tra_nombre 
               from tramite t, tramite_institucion ti 
               where ti.trai_id='.$id_trains.'and
               t.tra_id=ti.tra_id';
        $rows = Yii::app()->db->createCommand($sql)->queryAll();
        return $rows;
    }

}
