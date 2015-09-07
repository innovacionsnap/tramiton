<?php

class Bitacora extends CActiveRecord {

    private $connection;

    // datos formulario de tarea
    public $nombre_tarea;
    public $descripcion_tarea;
    public $meta_tarea;




    public function __construct() {
        //Yii::app()->db->connectionString
        // 
        $this->connection = new CDbConnection(Yii::app()->db->connectionString, Yii::app()->db->username, Yii::app()->db->password);
        $this->connection->active = TRUE;
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    

     public function getTarea() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //$id_usuario = $modelUser['usu_id'];
        //$usu_id = $this->_datosUser->usu_id;

        $sql = "select tar.tar_id, ins.ins_nombre, tar.tar_nombre, tar.tar_descripcion, tar.tar_meta, tar.tar_fechainicio,tar.tar_fechafin, tar.tar_fecharegistro
                from tarea tar, institucion ins 
                where tar.ins_id = ins.ins_id 
                and tar.tar_estado = 1
                order by tar.tar_fecharegistro desc";
//echo $sql;
        $dataReader = $this->connection->createCommand($sql)->query();
        // recibe los datos
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }

    public function getTarea_Actividad() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);

        $id_usuario = $modelUser['usu_id'];
        //$dato_datt_id = $_GET['datt_id'];
        //$usu_id = $this->_datosUser->usu_id;
        $sql = "select * from solucion where datt_id = '10'";
        echo "<br>".$sql;
        $dataReader = $this->connection->createCommand($sql)->query();
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }

    public function rules(){

        return array(
            array('nombre_tarea','required'),
            array('descripcion_tarea','required'),

            );

    }

  
    

}
