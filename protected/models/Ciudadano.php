<?php

class Ciudadano extends CActiveRecord {

    private $connection;

    public function __construct() {
        //Yii::app()->db->connectionString
        // 
        $this->connection = new CDbConnection(Yii::app()->db->connectionString, Yii::app()->db->username, Yii::app()->db->password);
        $this->connection->active = TRUE;
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getUsuarioTramite() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $id_usuario = $modelUser['usu_id'];
        //$usu_id = $this->_datosUser->usu_id;

        $sql = "select datt.datt_id, ins.ins_nombre,tra.tra_nombre, datt.datt_experiencia,datt.datt_fecharegistro, usu.usu_nombreusuario, usu.usu_imagen,datt_otronombretramite
                from tramite tra, tramite_institucion trai, institucion ins, datos_tramite datt, usuario usu
                where tra.tra_id = trai.tra_id
                and datt.trai_id = trai.trai_id
                and trai.ins_id = ins.ins_id
                and usu.usu_id = datt.usu_id
                and datt_estado = 1
                and usu.usu_id = '$id_usuario'  order by datt.datt_id desc";
//echo $sql;
        $dataReader = $this->connection->createCommand($sql)->query();
        // recibe los datos
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }

    public function getTramite_Usuario() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $id_usuario = $modelUser['usu_id'];
        //$usu_id = $this->_datosUser->usu_id;
        Empresa::model()->decodificaGet($_SERVER["REQUEST_URI"]);
        $dato_datt_id = $_GET['datt_id'];
        //echo "UNO DE LOS CASOS: ".$dato_datt_id;


        $sql = "select datt.datt_id,datt.datt_unidadprestadora, ins.ins_nombre,tra.tra_nombre, datt.datt_experiencia,datt.datt_fecharegistro, usu.usu_nombreusuario, usu.usu_imagen,datt_otronombretramite,pro.pro_nombre,can.can_nombre
                from tramite tra, tramite_institucion trai, institucion ins, datos_tramite datt, usuario usu,canton can, provincia pro
                where tra.tra_id = trai.tra_id
                and can.pro_id = pro.pro_id
                and datt.can_id = can.can_id
                and datt.trai_id = trai.trai_id
                and trai.ins_id = ins.ins_id
                and usu.usu_id = datt.usu_id
                and datt.datt_id = '$dato_datt_id'
                and datt_estado = 1 order by datt.datt_id desc";
               // echo $sql;

        $dataReader = $this->connection->createCommand($sql)->query();

        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }

    public function getTramite_Solucion() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);

        $id_usuario = $modelUser['usu_id'];
        $dato_datt_id = $_GET['datt_id'];
        //$usu_id = $this->_datosUser->usu_id;
        $sql = "select * from solucion where datt_id = '$dato_datt_id'";
        //echo "<br>".$sql;
        $dataReader = $this->connection->createCommand($sql)->query();
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }
    //////cambio w////////
    
    public function getTramite_Problemas() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);

        $id_usuario = $modelUser['usu_id'];
        $dato_datt_id = $_GET['datt_id'];
        //$usu_id = $this->_datosUser->usu_id;
        $sql= "SELECT pt.prob_id, pt.datt_id, pt.prot_estado_, pt.prot_nombreotroproblema, p.prob_nombre,p.prob_nombre_principal
                FROM problema_tramite pt,problema p
                where datt_id='$dato_datt_id' and pt.prob_id = p.prob_id";
        
        //echo "<br>".$sql;
        $dataReader = $this->connection->createCommand($sql)->query();
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }
    /////////////////////
    
    public function getdatosTramite_Solucion_Comentario() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);

        $id_usuario = $modelUser['usu_id'];
        //$dato_datt_id = $_GET['datt_id'];
        //$usu_id = $this->_datosUser->usu_id;
        $sql = "select * from comentario com, solucion sol 
                where com.sol_id = sol.sol_id
                and sol.datt_id = 7781";

        $dataReader = $this->connection->createCommand($sql)->query();
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }
    
    
    
    public function getComentarios() {
        
        
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);

        $id_usuario = $modelUser['usu_id'];
        $dato_datt_id = $_GET['datt_id'];
        //$usu_id = $this->_datosUser->usu_id;
        $sql= "SELECT s.sol_id,dt.datt_experiencia,dt.datt_id,c.com_descripcion,c.usu_id,u.usu_nombreusuario,
to_char(c.com_fecha_comentario, 'TMDay, DD TMMonth YYYY a las HH24:MI') as com_fecha 
  FROM solucion s,datos_tramite dt, comentario c,usuario u
  where s.datt_id=dt.datt_id and s.sol_id=c.sol_id and c.usu_id=u.usu_id and dt.datt_id=$dato_datt_id";
        
        //echo "<br>".$sql;
        $dataReader = $this->connection->createCommand($sql)->query();
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }

}
