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
        $sql = "select sum(d.tot_tramite) as sum_10_tot_tramite
from (select c.ins_nombre ,count(c.ins_nombre) as tot_tramite 
from datos_tramite a, tramite_institucion b, institucion c
where a.trai_id = b.trai_id and b.ins_id = c.ins_id 
group by c.ins_nombre order by tot_tramite desc limit 10) d";
        $dataReader = $this->connection->createCommand($sql)->query();
        // recibe los datos
        $rows=$this->connection->createCommand($sql)->queryAll();
        return $rows;
    }
            
            
    
}
