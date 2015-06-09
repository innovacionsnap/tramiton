<?php


class Dashboard extends CActiveRecord
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
    public function getTotalTramite(){
        $sql = "select count(*) as total_tramite from datos_tramite where datt_estado= 1";
        $dataReader = $this->connection->createCommand($sql)->query();
        // recibe los datos
        $rows=$this->connection->createCommand($sql)->queryAll();
        return $rows;
    }
    public function getRankingTramite(){
        $sql = "select count(*) as total_tramite from datos_tramite where datt_estado= 1";
        $dataReader = $this->connection->createCommand($sql)->query();
        // recibe los datos
        $rows=$this->connection->createCommand($sql)->queryAll();
        return $rows;
    }
            
            
    
}
