<?php


class TramiteInstitucion extends CActiveRecord
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
    public function getTramiteInstitucion(){
        $sql = "select b.trai_id , a.tra_nombre 
from tramite a, tramite_institucion b, institucion c
where a.tra_id = b.tra_id 
and c.ins_id = b.ins_id
and c.ins_id = 4
order by a.tra_nombre";
        $dataReader = $this->connection->createCommand($sql)->query();
        // recibe los datos
        $rows=$this->connection->createCommand($sql)->queryAll();
        return $rows;
    }
            
            
    
}
