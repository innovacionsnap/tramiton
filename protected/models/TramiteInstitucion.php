<?php
class TramiteInstitucion extends CActiveRecord {
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


    public function getTramiteInstitucion() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //$id_usuario = $modelUser['usu_id'];
        $usu_id = $modelUser->usu_id;
        //$usu_id = $this->_datosUser->usu_id;
        $sql = "select tra.tra_id, count(tra.tra_id) as total, tra.tra_nombre
from datos_tramite datt, tramite_institucion trai, tramite tra, institucion ins, institucion_usuario insu
where trai.trai_id = datt.trai_id
and insu.ins_id = ins.ins_id
and tra.tra_id = trai.tra_id
and  ins.ins_id = trai.ins_id
and insu.usu_id = '$usu_id'
group by tra.tra_id
order by total desc";
//echo $sql;
        $dataReader = $this->connection->createCommand($sql)->query();
        // recibe los datos
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }

    public function getTramiteInstitucionDetalle() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //$id_usuario = $modelUser['usu_id'];
        $usu_id = $modelUser->usu_id;
        //$usu_id = $this->_datosUser->usu_id;
         Empresa::model()->decodificaGet($_SERVER["REQUEST_URI"]);
        $tra_id = $_GET['tra_id'];

        $sql = "select datt.datt_id,tra.tra_id, tra.tra_nombre, datt.datt_experiencia,usu.usu_nombreusuario,datt_fecharegistro
from datos_tramite datt, tramite_institucion trai, tramite tra, institucion ins, institucion_usuario insu, usuario usu
where trai.trai_id = datt.trai_id
and insu.ins_id = ins.ins_id
and tra.tra_id = trai.tra_id
and  ins.ins_id = trai.ins_id
and insu.usu_id = usu.usu_id
and insu.usu_id = '$usu_id'
and tra.tra_id = '$tra_id'";
//echo $sql;
        $dataReader = $this->connection->createCommand($sql)->query();
        // recibe los datos
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }


 public function getAccioneCorrectiva() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //$id_usuario = $modelUser['usu_id'];
        $usu_id = $modelUser->usu_id;
        //$usu_id = $this->_datosUser->usu_id;
         Empresa::model()->decodificaGet($_SERVER["REQUEST_URI"]);
        $tra_id = $_GET['tra_id'];

        $sql = "select accc.accc_id, accc.accc_nombre,accc.accc_descripcion, accc.accc_fechaingreso, tra.tra_id
from acciones_correctivas accc, tramite tra
where tra.tra_id = accc.tra_id
and tra.tra_id = '$tra_id'";
//echo $sql;
        $dataReader = $this->connection->createCommand($sql)->query();
        // recibe los datos
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }




    /*
    public function getTarea_Actividad() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $id_usuario = $modelUser['usu_id'];
        $tar_id_detalle = $_GET['tar_id'];
        
        $sql = "select tar.tar_id, cat.cat_nombre,ins.ins_nombre, tar.tar_nombre, tar.tar_descripcion, tar.tar_meta, tar.tar_fechainicio,tar.tar_fechafin, tar.tar_fecharegistro
                from tarea tar, institucion ins, categoria cat
                where tar.ins_id = ins.ins_id
        and cat.cat_id = tar.cat_id
        and tar.tar_id = '$tar_id_detalle'
                and tar.tar_estado = 1
                order by tar.tar_id desc";
       // echo "<br>".$sql;
        $dataReader = $this->connection->createCommand($sql)->query();
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }

    public function getTarea_Participantes() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //$id_usuario = $modelUser['usu_id'];
        $tar_id_detalle = $_GET['tar_id'];
        
        $sql = "select taru.taru_categoria,usu.usu_nombre, usu.usu_nombreusuario
from tarea_usuario taru, tarea tar, usuario usu
where tar.tar_id = taru.tar_id
and taru.usu_id = usu.usu_id
and tar.tar_id = '$tar_id_detalle'
and taru.taru_categoria = 2";
        //echo "<br>".$sql;
        $dataReader = $this->connection->createCommand($sql)->query();
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }

    public function getTarea_Generador() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //$id_usuario = $modelUser['usu_id'];
        $tar_id_detalle = $_GET['tar_id'];
        
        $sql = "select taru.taru_categoria,usu.usu_nombre, usu.usu_nombreusuario
from tarea_usuario taru, tarea tar, usuario usu
where tar.tar_id = taru.tar_id
and taru.usu_id = usu.usu_id
and tar.tar_id = '$tar_id_detalle'
and taru.taru_categoria = 1";
        echo "<br>".$sql;
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
        echo "<br>".$sql;
        $dataReader = $this->connection->createCommand($sql)->query();
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }
  */
  
  
    
}