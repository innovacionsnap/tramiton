<?php
/**
 * el comentario del dashboard 2
 */

class Dashboard extends CActiveRecord {

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

    public function getTotalTramite() {
        $command = Yii::app()->db->createCommand('select total_tramites()');
        $resultSet=$command->query();
        $rows = $resultSet->readAll();
        return $rows;
    }

    public function getRankingTramite() {
        $command = Yii::app()->db->createCommand('select ranking_tramites()');
        $resultSet=$command->query();
        $rows = $resultSet->readAll();
        return $rows;
    }
    
    public function getPublicacionesTramites() {
        $sql = "select datt.datt_id, ins.ins_nombre,tra.tra_nombre, datt.datt_experiencia,datt.datt_fecharegistro, usu.usu_nombreusuario, usu.usu_imagen
                from tramite tra, tramite_institucion trai, institucion ins, datos_tramite datt, usuario usu
                where tra.tra_id = trai.tra_id
                and datt.trai_id = trai.trai_id
                and trai.ins_id = ins.ins_id
                and usu.usu_id = datt.usu_id
                and datt_estado = 1
                order by datt.datt_fecharegistro
                limit 30 ";
        //$dataReader = $this->connection->createCommand($sql)->query();
        // cambio de datos

        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }
    
    public function getRankingSolucion(){
        $command = Yii::app()->db->createCommand('select visita_solucion()');
        $resultSet=$command->query();
        $rows = $resultSet->readAll();
        return $rows;
    }
    
    public function getRankingLike(){
        $command = Yii::app()->db->createCommand('select votos_solucion()');
        $resultSet=$command->query();
        $rows = $resultSet->readAll();
        return $rows;
    }

}
