<?php

/**
 * This is the model class for table "datos_tramite".
 *
 * The followings are the available columns in table 'datos_tramite':
 * @property integer $datt_id
 * @property integer $par_id
 * @property integer $usu_id
 * @property integer $trai_id
 * @property string $datt_unidadprestadora
 * @property string $datt_experiencia
 * @property string $datt_fechainicio
 * @property string $datt_fechafin
 * @property string $datt_fecharegistro
 * @property string $datt_ipingreso
 * @property string $datt_edicion
 * @property string $datt_codigoconfirmacion
 * @property string $datt_otronombretramite
 * @property integer $datt_calificado
 * @property string $datt_descripcionbreve
 * @property integer $datt_estado
 * @property integer $can_id
 * @property string $datt_otronombreinstitucion
 * @property string $datt_fecha_actualizacion
 *
 * The followings are the available model relations:
 * @property Solucion[] $solucions
 * @property ProblemaTramite[] $problemaTramites
 * @property TramiteCriterioEvaluacion[] $tramiteCriterioEvaluacions
 * @property EstadoDatosTram[] $estadoDatosTrams
 * @property Canton $can
 * @property Parroquia $par
 * @property TramiteInstitucion $trai
 * @property Usuario $usu
 */
class DatosTramite extends CActiveRecord {

    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'datos_tramite';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('datt_unidadprestadora, datt_experiencia, datt_fecharegistro, datt_ipingreso, datt_edicion, datt_codigoconfirmacion, datt_otronombretramite, datt_calificado, datt_descripcionbreve, datt_estado', 'required'),
            array('par_id, usu_id, trai_id, datt_calificado, datt_estado, can_id', 'numerical', 'integerOnly' => true),
            array('datt_ipingreso, datt_edicion, datt_codigoconfirmacion', 'length', 'max' => 50),
            array('datt_otronombretramite, datt_otronombreinstitucion', 'length', 'max' => 256),
            array('datt_fechainicio, datt_fechafin, datt_fecha_actualizacion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('datt_id, par_id, usu_id, trai_id, datt_unidadprestadora, datt_experiencia, datt_fechainicio, datt_fechafin, datt_fecharegistro, datt_ipingreso, datt_edicion, datt_codigoconfirmacion, datt_otronombretramite, datt_calificado, datt_descripcionbreve, datt_estado, can_id, datt_otronombreinstitucion, datt_fecha_actualizacion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'solucions' => array(self::HAS_MANY, 'Solucion', 'datt_id'),
            'problemaTramites' => array(self::HAS_MANY, 'ProblemaTramite', 'datt_id'),
            'tramiteCriterioEvaluacions' => array(self::HAS_MANY, 'TramiteCriterioEvaluacion', 'datt_id'),
            'estadoDatosTrams' => array(self::HAS_MANY, 'EstadoDatosTram', 'datt_id'),
            'can' => array(self::BELONGS_TO, 'Canton', 'can_id'),
            'par' => array(self::BELONGS_TO, 'Parroquia', 'par_id'),
            'trai' => array(self::BELONGS_TO, 'TramiteInstitucion', 'trai_id'),
            'usu' => array(self::BELONGS_TO, 'Usuario', 'usu_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'datt_id' => 'Datt',
            'par_id' => 'Par',
            'usu_id' => 'Usu',
            'trai_id' => 'Trai',
            'datt_unidadprestadora' => 'Datt Unidadprestadora',
            'datt_experiencia' => 'Datt Experiencia',
            'datt_fechainicio' => 'Datt Fechainicio',
            'datt_fechafin' => 'Datt Fechafin',
            'datt_fecharegistro' => 'Datt Fecharegistro',
            'datt_ipingreso' => 'Datt Ipingreso',
            'datt_edicion' => 'Datt Edicion',
            'datt_codigoconfirmacion' => 'Datt Codigoconfirmacion',
            'datt_otronombretramite' => 'Datt Otronombretramite',
            'datt_calificado' => 'Datt Calificado',
            'datt_descripcionbreve' => 'Datt Descripcionbreve',
            'datt_estado' => 'Datt Estado',
            'can_id' => 'Can',
            'datt_otronombreinstitucion' => 'Datt Otronombreinstitucion',
            'datt_fecha_actualizacion' => 'Datt Fecha Actualizacion',
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

        $criteria->compare('datt_id', $this->datt_id);
        $criteria->compare('par_id', $this->par_id);
        $criteria->compare('usu_id', $this->usu_id);
        $criteria->compare('trai_id', $this->trai_id);
        $criteria->compare('datt_unidadprestadora', $this->datt_unidadprestadora, true);
        $criteria->compare('datt_experiencia', $this->datt_experiencia, true);
        $criteria->compare('datt_fechainicio', $this->datt_fechainicio, true);
        $criteria->compare('datt_fechafin', $this->datt_fechafin, true);
        $criteria->compare('datt_fecharegistro', $this->datt_fecharegistro, true);
        $criteria->compare('datt_ipingreso', $this->datt_ipingreso, true);
        $criteria->compare('datt_edicion', $this->datt_edicion, true);
        $criteria->compare('datt_codigoconfirmacion', $this->datt_codigoconfirmacion, true);
        $criteria->compare('datt_otronombretramite', $this->datt_otronombretramite, true);
        $criteria->compare('datt_calificado', $this->datt_calificado);
        $criteria->compare('datt_descripcionbreve', $this->datt_descripcionbreve, true);
        $criteria->compare('datt_estado', $this->datt_estado);
        $criteria->compare('can_id', $this->can_id);
        $criteria->compare('datt_otronombreinstitucion', $this->datt_otronombreinstitucion, true);
        $criteria->compare('datt_fecha_actualizacion', $this->datt_fecha_actualizacion, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return DatosTramite the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getTramite() {
        $sql = 'select datt_fecharegistro, tra_nombre, ins_nombre, sec_nombre, usu_nombreusuario 
from tramite_institucion a, institucion b, datos_tramite c, sector d, usuario e, tramite f
where a.ins_id=b.ins_id and 
      a.trai_id=c.trai_id and
      b.sec_id=d.sec_id and
      c.usu_id=e.usu_id and
      a.tra_id=f.tra_id and f.tra_estado=1 and
      b.ins_funcion_ejecutiva=1
order by tra_nombre';
        $rows =Yii::app()->db->createCommand($sql)->queryAll();
        return $rows;
    }
    
    public function getRanking() {
        
        $sql = 'select d.ins_nombre,count(sol_id)as soluciones 
from datos_tramite a, tramite_institucion b, solucion c, institucion d 
where a.trai_id=b.trai_id and 
      a.datt_id=c.datt_id and 
      b.ins_id=d.ins_id and 
      d.ins_funcion_ejecutiva=1 and
      c.sol_estado=1
group by ins_nombre 
order by soluciones desc 
limit 10';
        $rows = Yii::app()->db->createCommand($sql)->queryAll();
        return $rows;
    }
    
    public function getCaso($cadena) {
        $sql = "select d.datt_id, datt_experiencia, i.ins_id,ins_nombre, sol_id, sol_descripcion
from datos_tramite d, institucion i, tramite_institucion ti, solucion s
where ins_funcion_ejecutiva =1 and
SP_ASCII(datt_experiencia) ilike SP_ASCII('%".$cadena."%') and
d.trai_id=ti.trai_id and
i.ins_id=ti.ins_id and
d.datt_id=s.datt_id;";
        $rows =Yii::app()->db->createCommand($sql)->queryAll();
        return $rows;
    }
    public static function getTramiteMencionado() {
        $sql="select t.tra_nombre,count(datt_id)total from datos_tramite d, tramite_institucion ti, tramite t 
where d.trai_id=ti.trai_id and
ti.tra_id=t.tra_id and
ti.tra_id<>3752
group by d.trai_id, t.tra_nombre order by total desc
limit 10";
        $rows=Yii::app()->db->createCommand($sql)->queryAll();
        return $rows;
    }

}
