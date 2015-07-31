<?php


class Ciudadano extends CActiveRecord
{
    private $connection;
    
    public function __construct() {
        //Yii::app()->db->connectionString
        // 
        $this->connection=new CDbConnection(Yii::app()->db->connectionString,Yii::app()->db->username,Yii::app()->db->password);
        $this->connection->active=TRUE;
    }
    
    public static function model($className=__CLASS__){
        return parent::model($className);
                
    }
    public function getUsuarioTramite(){
    	$modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
		$id_usuario= $modelUser['usu_id'];
		//$usu_id = $this->_datosUser->usu_id;
		
    	$sql = "select datt.datt_id, ins.ins_nombre,tra.tra_nombre, datt.datt_experiencia,datt.datt_fecharegistro, usu.usu_nombreusuario, usu.usu_imagen,datt_otronombretramite
from tramite tra, tramite_institucion trai, institucion ins, datos_tramite datt, usuario usu
where tra.tra_id = trai.tra_id
and datt.trai_id = trai.trai_id
and trai.ins_id = ins.ins_id
and usu.usu_id = datt.usu_id
and datt_estado = 1
and usu.usu_id = '$id_usuario'";
//echo $sql;
        $dataReader = $this->connection->createCommand($sql)->query();
        // recibe los datos
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }
	
	public function getTramite_Usuario(){
    	$modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
		$id_usuario= $modelUser['usu_id'];
		//$usu_id = $this->_datosUser->usu_id;
		$dato_datt_id = $_GET['datt_id'];
		echo $dato_datt_id;
		
    	$sql = "select datt.datt_id,datt.datt_unidadprestadora, ins.ins_nombre,tra.tra_nombre, datt.datt_experiencia,datt.datt_fecharegistro, usu.usu_nombreusuario, usu.usu_imagen,datt_otronombretramite,pro.pro_nombre,can.can_nombre
from tramite tra, tramite_institucion trai, institucion ins, datos_tramite datt, usuario usu,canton can, provincia pro
where tra.tra_id = trai.tra_id
and can.pro_id = pro.pro_id
and datt.can_id = can.can_id
and datt.trai_id = trai.trai_id
and trai.ins_id = ins.ins_id
and usu.usu_id = datt.usu_id
and datt.datt_id = '64'
and datt_estado = 1";
echo $sql;
 
        $dataReader = $this->connection->createCommand($sql)->query();
       
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }
	
	public function getTramite_Solucion(){
    	$modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
		
		$id_usuario= $modelUser['usu_id'];
		//$usu_id = $this->_datosUser->usu_id;
		$sql = "select * from solucion where datt_id = 64";
        $dataReader = $this->connection->createCommand($sql)->query();
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }
            
            
    
}
