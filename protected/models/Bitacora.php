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
        $sql = "select tar.tar_id, cat.cat_nombre,ins.ins_nombre, tar.tar_nombre, tar.tar_descripcion, tar.tar_meta, tar.tar_fechainicio,tar.tar_fechafin, tar.tar_fecharegistro
                from tarea tar, institucion ins, categoria cat
                where tar.ins_id = ins.ins_id
        and cat.cat_id = tar.cat_id
                and tar.tar_estado = 1
                order by cat.cat_nombre desc";
//echo $sql;
        $dataReader = $this->connection->createCommand($sql)->query();
        // recibe los datos
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }
    public function getTarea_Actividad() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $id_usuario = $modelUser['usu_id'];
        $tar_id_detalle = $_GET['tar_id'];
        //echo $tar_id_detalle;
        
        $sql = "select tar.tar_id, cat.cat_nombre,ins.ins_nombre, tar.tar_nombre, tar.tar_descripcion, tar.tar_meta, tar.tar_fechainicio,tar.tar_fechafin, tar.tar_fecharegistro
                from tarea tar, institucion ins, categoria cat
                where tar.ins_id = ins.ins_id
        and cat.cat_id = tar.cat_id
        and tar.tar_id = '$tar_id_detalle'
                and tar.tar_estado = 1
                order by tar.tar_id desc";
       //echo "<br>".$sql;
        $dataReader = $this->connection->createCommand($sql)->query();
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }

    public function getTarea_Participantes() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //$id_usuario = $modelUser['usu_id'];
        $tar_id_detalle = $_GET['tar_id'];
        
        $sql = "select usu.usu_nombre from tarea_usuario taru, tarea tar, usuario usu
                where tar.tar_id = taru.tar_id 
                and usu.usu_id = taru.usu_id
                and tar.tar_id = '$tar_id_detalle'";
                //echo "<br>Participantes:".$sql;
                $dataReader = $this->connection->createCommand($sql)->query();
                $rows = $this->connection->createCommand($sql)->queryAll();
                return $rows;
    }

    public function getTarea_Creador() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //$id_usuario = $modelUser['usu_id'];
        $tar_id_detalle = $_GET['tar_id'];
        
        $sql = "select usu.usu_nombre from tarea_usuario taru, tarea tar, usuario usu
                where tar.tar_id = taru.tar_id 
                and usu.usu_id = taru.usu_id
                and tar.tar_id = '$tar_id_detalle'
                and taru.taru_creador= 1";
               // echo "<br>Creador:".$sql;
                $dataReader = $this->connection->createCommand($sql)->query();
                $rows = $this->connection->createCommand($sql)->queryAll();
                return $rows;
    }

   

    public function getActividad() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //$id_usuario = $modelUser['usu_id'];
        $tar_id_detalle = $_GET['tar_id'];
        
        $sql = "select acc.acc_id,acc.acc_nombre, acc.acc_descripcion, acc.acc_estado, acc.acc_fecharegistro, tar.tar_id
from accion acc, tarea tar
where acc.tar_id = tar.tar_id 
and tar.tar_id = '$tar_id_detalle'
order by acc_fecharegistro desc
";
        //echo "<br>".$sql;
        $dataReader = $this->connection->createCommand($sql)->query();
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }
  
  
  
    
}