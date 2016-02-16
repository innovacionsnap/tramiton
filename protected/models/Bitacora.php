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
        $sql = "select tar.tar_id, cat.cat_nombre,ins.ins_nombre, tar.tar_nombre,tar_estatus,tar_importancia, tar.tar_descripcion, 
                tar.tar_meta, tar.tar_fechainicio,tar.tar_fechafin, tar.tar_fecharegistro,tar_nivel, tar.tar_tipo, tar.tar_estandar
                from tarea tar, institucion ins, categoria cat
                where tar.ins_id = ins.ins_id
                and tar.tar_tipo = 1 
                and cat.cat_id = tar.cat_id
                and tar.tar_estado = 1
                order by tar.tar_id desc";
     //echo $sql;
        $dataReader = $this->connection->createCommand($sql)->query();
        // recibe los datos
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }

    // inicio tramites

    public function getTareaTramite() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //$id_usuario = $modelUser['usu_id'];
        //$usu_id = $this->_datosUser->usu_id;
        $sql = "select tar.tar_id, sec.sec_nombre, cat.cat_nombre,ins.ins_nombre, tar.tar_nombre,tar_estatus,tar_importancia,tar.tar_tipo, 
        tar.tar_descripcion, tar.tar_meta, tar.tar_fechainicio,tar.tar_fechafin, tar.tar_fecharegistro,tar_nivel, tar.tar_estandar,tar.tar_politica_tipo,
        tar.tar_politica_motivo, tar.tar_politica_fecha, tar.tar_politica_difusion
        from tarea tar, institucion ins, categoria cat, sector sec
        where tar.ins_id = ins.ins_id and tar.tar_tipo = 2 
        and sec.sec_id = ins.sec_id
        and cat.cat_id = tar.cat_id and tar.tar_estado = 1 order by tar.tar_id desc";
        
        //echo $sql;
        $dataReader = $this->connection->createCommand($sql)->query();
        // recibe los datos
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }
    // fin tramites


    public function getColor($id_tarea){
        $sql="select acc_estado, count(acc_estado) as contador from accion 
where tar_id = $id_tarea
group by acc_estado;";

//echo $sql;
 //$dataReader = $this->connection->createCommand($sql)->query();
        // recibe los datos
        $command = Yii::app()->db->createCommand($sql);
        $resultSet=$command->query();

        $colores = array();
        $verde = 0;
        $amarillo = 0;
        $rojo = 0;

        //echo "Valor:";

        foreach ($resultSet as $registro) {

           if($registro['acc_estado'] == 1){
                //echo $registro['contador'];
                $verde = $registro['contador'];
            }
            if($registro['acc_estado'] == 2){
                //echo "amarillo".$registro['contador'];
                $amarillo = $registro['contador'];
            }
            if($registro['acc_estado'] == 3){
                //echo $registro['contador'];
                $rojo = $registro['contador'];
            }
      
        }

        $colores = array(
                        'verde' => $verde,
                        'amarillo' => $amarillo,
                        'rojo' => $rojo
                );

        return $colores;

    }




    public function getNumeroActiviades ($tar_id){
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $id_usuario = $modelUser['usu_id'];

       

        $sql="select count(acc_id ) as acc_cuenta from accion 
where tar_id = '$tar_id' ";

        $command = Yii::app()->db->createCommand($sql);
        $resultSet=$command->query();

        $NumeroActividad = array();
        $Nactividad = 0;

         foreach ($resultSet as $registro) {
            $numAcciones = $registro["acc_cuenta"]  ;      
        }


         // Suma de Acciones 


        $sql2="select sum(acc_nivel) as acc_suma from accion 
where tar_id = '$tar_id' ";

        $command = Yii::app()->db->createCommand($sql2);
        $resultSet2=$command->query();

        $NumeroActividad = array();
        $Nactividad = 0;

         foreach ($resultSet2 as $registrosuma) {
            $cuentaAcciones = $registrosuma["acc_suma"]  ;      
        }


        //calculo %

            $porcentaj100 = $numAcciones * 100;
        if ($cuentaAcciones!=0){
             echo $porcentaje_real = ($cuentaAcciones * 100)/$porcentaj100."%";

        }else{
            echo "0%";
        }
       

    }

      
    public function getTarea_Actividad() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $id_usuario = $modelUser['usu_id'];
        $tar_id_detalle = $_GET['tar_id'];
        //echo $tar_id_detalle;
        
        $sql = "select tar.tar_id, cat.cat_nombre,ins.ins_nombre, tar.tar_nombre, tar.tar_descripcion, tar.tar_meta, tar.tar_fechainicio,
        tar.tar_fechafin, tar.tar_fecharegistro, tar_nivel, tar_estatus, sec.sec_nombre, tar.tar_estrategia, tar.tar_estandar, tar.tar_politica,
        tar.tar_requisitos_ini,tar.tar_requisitos_fin, tar.tar_funcionarios_ini,tar.tar_funcionarios_fin,tar.tar_tiempo_ini, tar.tar_tiempo_fin, 
        tar.tar_intera_ini, tar.tar_intera_fin, tar.tar_politica_tipo, tar.tar_politica_motivo, tar.tar_politica_fecha,tar.tar_politica_difusion
from tarea tar, institucion ins, categoria cat, sector sec
where tar.ins_id = ins.ins_id 
and cat.cat_id = tar.cat_id 
and sec.sec_id = ins.sec_id
and tar.tar_id = '$tar_id_detalle' and tar.tar_estado = 1 order by tar.tar_id desc";
       //echo "<br>".$sql;
        $dataReader = $this->connection->createCommand($sql)->query();
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }

    public function getrojo(){
        echo "rojo";
    }

    public function getTarea_Participantes() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //$id_usuario = $modelUser['usu_id'];
        $tar_id_detalle = $_GET['tar_id'];
        
        $sql = "select usu.usu_nombre,taru.taru_id, taru.taru_creador from tarea_usuario taru, tarea tar, usuario usu
                where tar.tar_id = taru.tar_id 
                and usu.usu_id = taru.usu_id
                and tar.tar_id = '$tar_id_detalle'";
                //echo "<br>Participantes:".$sql;
                $dataReader = $this->connection->createCommand($sql)->query();
                $rows = $this->connection->createCommand($sql)->queryAll();
                return $rows;
    }

    public function getPermiso_Participantes() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $id_usuario = $modelUser['usu_id'];
        $tar_id = $_GET['tar_id'];
        
        $sql = "select * from tarea_usuario where usu_id = $id_usuario  and tar_id = $tar_id";
                //echo "<br>Permiso:".$sql;
                $dataReader = $this->connection->createCommand($sql)->query();
                $rows = $this->connection->createCommand($sql)->queryAll();
                return $rows;
    }

    public function getTarea_Creador() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //$id_usuario = $modelUser['usu_id'];
        $tar_id = $_GET['tar_id'];
        
        $sql = "select usu.usu_nombre, usu.usu_id, tar_fecharegistro from tarea_usuario taru, tarea tar, usuario usu
                where tar.tar_id = taru.tar_id 
                and usu.usu_id = taru.usu_id
                and tar.tar_id = '$tar_id'
                and taru.taru_creador= 1";
               //echo "<br>Creador:".$sql;
                $dataReader = $this->connection->createCommand($sql)->query();
                $rows = $this->connection->createCommand($sql)->queryAll();
                return $rows;
    }

   

    public function getActividad() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //$id_usuario = $modelUser['usu_id'];
        $tar_id_detalle = $_GET['tar_id'];
        
        $sql = "select usu.usu_id,acc.acc_id,sec.sec_nombre,acc.acc_nombre, acc.acc_descripcion, acc.acc_estado, acc.acc_fecharegistro, tar.tar_id,usu.usu_nombre, acc.acc_nivel 
from accion acc, tarea tar, usuario usu, institucion ins, sector sec
where acc.tar_id = tar.tar_id
and sec.sec_id = ins.sec_id 
and tar.ins_id = ins.ins_id 
and usu.usu_id = acc.usu_id 
and tar.tar_id = '$tar_id_detalle' order by acc_fecharegistro desc

";
        //echo "<br>".$sql;
        $dataReader = $this->connection->createCommand($sql)->query();
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }
    
    public function getActividad_Ver() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //$id_usuario = $modelUser['usu_id'];
        $tar_id_detalle = $_GET['tar_id'];
        $acc_id = $_GET['acc_id'];

        //$tar_id_detalle = 3;
        //$acc_id = 2;

        $sql = "select acc.acc_id,acc.acc_nombre, acc.acc_descripcion, acc.acc_estado, acc.acc_fecharegistro, tar.tar_id
from accion acc, tarea tar
where acc.tar_id = tar.tar_id 
and tar.tar_id = '$tar_id_detalle'
and acc.acc_id ='$acc_id'";
        //echo "<br>".$sql;
        $dataReader = $this->connection->createCommand($sql)->query();
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }
  

  // bitacora institucion 

     public function getInstitucion ($trai_id){
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $id_usuario = $modelUser['usu_id'];

       

        $sql="select trai.trai_id,ins.ins_id,ins.ins_nombre,tra.tra_nombre 
from tramite tra, tramite_institucion trai, institucion ins 
where tra.tra_id = trai.tra_id 
and trai.ins_id = ins.ins_id 
and trai.trai_id='$trai_id' ";


        $command = Yii::app()->db->createCommand($sql);
        $resultSet=$command->query();

        $NumeroActividad = array();
        $Nactividad = 0;

         foreach ($resultSet as $registro) {
          echo   $tramite_nombre = $registro["tra_nombre"] ;      
        }
        //return $tramite_nombre;
    }

    // bitacora institucion 

     public function getIndicadores() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        

        $tar_id = $_GET['tar_id'];
        //$acc_id = $_GET['acc_id'];

        $sql = "select ind.ind_id,ind.ind_nombre,tain.tain_id, ind.ind_descripcion, ind.ind_id,tain.tain_valor
from indicador ind, tarea_indica tain
where ind.ind_id = tain.ind_id
and tain.tar_id = '$tar_id' order by ind.ind_nombre";
        //echo "<br>".$sql;
        $dataReader = $this->connection->createCommand($sql)->query();
        $rows = $this->connection->createCommand($sql)->queryAll();
        return $rows;
    }
   

    // bitacora institucion 

     public function getSector ($tar_id){
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $id_usuario = $modelUser['usu_id'];

       

        $sql="select tar.tar_id, sec.sec_nombre, cat.cat_nombre,ins.ins_nombre, tar.tar_nombre,tar_estatus,tar_importancia,tar.tar_tipo, 
        tar.tar_descripcion, tar.tar_meta, tar.tar_fechainicio,tar.tar_fechafin, tar.tar_fecharegistro,tar_nivel 
        from tarea tar, institucion ins, categoria cat, sector sec
        where tar.ins_id = ins.ins_id and tar.tar_tipo = 2 
        and sec.sec_id = ins.sec_id
        and cat.cat_id = tar.cat_id and tar.tar_estado = 1 
        and tar.tar_id = '$tar_id' ";


        $command = Yii::app()->db->createCommand($sql);
        $resultSet=$command->query();

        $NumeroActividad = array();
        $Nactividad = 0;

         foreach ($resultSet as $registro) {
          echo   $tramite_nombre = $registro["sec_nombre"] ;      
        }
        //return $tramite_nombre;
    }


     public function getInstitucion2($tar_id) {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //$id_usuario = $modelUser['usu_id'];
        //$usu_id = $this->_datosUser->usu_id;
        $sql = "select tar.tar_id, sec.sec_nombre, cat.cat_nombre,ins.ins_nombre, tar.tar_nombre,tar_estatus,tar_importancia,tar.tar_tipo, 
        tar.tar_descripcion, tar.tar_meta, tar.tar_fechainicio,tar.tar_fechafin, tar.tar_fecharegistro,tar_nivel 
        from tarea tar, institucion ins, categoria cat, sector sec
        where tar.ins_id = ins.ins_id and tar.tar_tipo = 2 
        and sec.sec_id = ins.sec_id
        and tar.tar_id = '$tar_id'
        and cat.cat_id = tar.cat_id and tar.tar_estado = 1 order by tar.tar_id desc";

        $command = Yii::app()->db->createCommand($sql);
        $resultSet=$command->query();

        $NumeroActividad = array();
        $Nactividad = 0;

         foreach ($resultSet as $registro) {
          echo   $nombre_institucion = $registro["ins_nombre"] ;      
        }
    }
  

  public function getEstandar($tar_estandar) {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //$id_usuario = $modelUser['usu_id'];
        //$usu_id = $this->_datosUser->usu_id;
        if ($tar_estandar ==1){echo "Automatización";}
        if ($tar_estandar ==2){echo "Levantamiento - Optimización";}
        if ($tar_estandar ==3){echo "Reforma Legal";}
        if ($tar_estandar ==4){echo "Interoperabilidad";}
        
    }
    
}