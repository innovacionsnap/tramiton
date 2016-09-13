<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reporte
 *
 * @author oscar.acero
 */
class Reporte {
    
    /**
     * Función para top ten de instituciones     
     */
    public function topTenInstituciones() {
        $conexion = Yii::app()->db;
        
        $sqlTopTen = "select "
                . "count(trai.ins_id) as total, ins.ins_nombre,ins.ins_id "
                . "from "
                . "datos_tramite dt, tramite_institucion trai, institucion ins "
                . "where "
                . "datt_productivo = 'N' and "
                . "dt.trai_id = trai.trai_id and "
                . "trai.ins_id = ins.ins_id "
                . "group by trai.ins_id, ins.ins_nombre,ins.ins_id "
                . "order by total desc limit 10";
        
         $resultado = $conexion->createCommand($sqlTopTen);
         
         $datos = $resultado->query();
         
         return $datos;
    }
    
    public function AccionesCorrectivas($tram) {
        $conexion = Yii::app()->db;
        
        $sqlaccion = "select "
                . "count(trai.ins_id) as total, ins.ins_nombre,ins.ins_id "
                . "from "
                . "acciones_correctivas ac, tramite_institucion trai, institucion ins "
                . "where "
                . "accc_productivo = $tram and ac.trai_id = trai.trai_id and trai.ins_id = ins.ins_id "
                . "group by trai.ins_id, ins.ins_nombre,ins.ins_id "
                . "order by total desc limit 10";
        
         $resultado = $conexion->createCommand($sqlaccion);
         
         $datos = $resultado->query();
         
         return $datos;
    }
    
    public function ViewAccionesCorrectivas($inst) {
        $conexion = Yii::app()->db;
        
        $sqlaccion2 = "SELECT "
                . "ac.accc_nombre, ac.accc_descripcion, ac.accc_fechaingreso, t.tra_id,t.tra_nombre,u.usu_nombre,u.usu_ultimo_ingreso, "
                . "to_char(usu_ultimo_ingreso, 'TMDay, DD TMMonth YYYY a las HH24:MI') as usu_fecha,u.usu_responsable_inst  "
                . "FROM acciones_correctivas ac, tramite t, tramite_institucion ti,usuario u "
                . "where accc_productivo=2 and ac.tra_id = t.tra_id and ti.trai_id = ac.trai_id and ti.ins_id =$inst and ac.usu_id = u.usu_id";
        
         $resultado = $conexion->createCommand($sqlaccion2);
         
         $datos = $resultado->query();
         
         return $datos;
    }
    
    public function Tramitones() {
        $conexion = Yii::app()->db;
        
        $sqlaccion = "select count(accc_id) as total,accc_productivo "
                . "from acciones_correctivas group by accc_productivo;";
        
         $resultado = $conexion->createCommand($sqlaccion);
         
         $datos = $resultado->query();
         
         return $datos;
    }
    
    public function Usuarios() {
        $conexion = Yii::app()->db;
        
        $sqlaccion = "select count(usu_id) as total,usu_tramiton "
                . "from usuario where usu_tipo_usuario=2 group by usu_tramiton";
        
         $resultado = $conexion->createCommand($sqlaccion);
         
         $datos = $resultado->query();
         
         return $datos;
    }
    
     public function ViewUsuarios($tram) {
        $conexion = Yii::app()->db;
        
        $sqlaccion2 = "SELECT "
                . "usu_nombre, usu_responsable_inst,usu_cedula, usu_mail,"
                . "to_char(usu_ultimo_ingreso, 'TMDay, DD TMMonth YYYY a las HH24:MI') as usu_fecha,usu_ingresos "
                
                . "FROM usuario where usu_tramiton = $tram and usu_tipo_usuario=2";
        
         $resultado = $conexion->createCommand($sqlaccion2);
         
         $datos = $resultado->query();
         
         return $datos;
    }
    
    public function Tramites() {
        $conexion = Yii::app()->db;
        
        $sqlaccion = "select count(datt_id) as total,datt_productivo "
                . "from datos_tramite group by datt_productivo;";
        
         $resultado = $conexion->createCommand($sqlaccion);
         
         $datos = $resultado->query();
         
         return $datos;
    }
    
    public function ViewTramites($tram) {
        $conexion = Yii::app()->db;
        
        $sqltramite = "select count(dt.datt_id) as total, i.ins_nombre,i.ins_id
                from datos_tramite dt,tramite_institucion ti,institucion i
                where datt_productivo='$tram' and dt.trai_id=ti.trai_id and ti.ins_id=i.ins_id 
                group by i.ins_nombre,i.ins_id
                order by ins_nombre asc ";
                
                
                
                
        
         $resultado = $conexion->createCommand($sqltramite);
         
         $datos = $resultado->query();
         
         return $datos;
    }
    
    public function ViewTramites2($inst,$tram) {
        $conexion = Yii::app()->db;
        
        $sqlaccion2 = "SELECT dt.datt_experiencia, 
       dt.datt_fecharegistro,
       dt.datt_productivo, 
       dt.datt_observacion,
       i.ins_nombre,
       ti.trai_id,
       t.tra_nombre
  FROM datos_tramite dt,tramite_institucion ti,tramite t,institucion i
  where dt.trai_id=ti.trai_id and t.tra_id=ti.tra_id and ti.ins_id=$inst and datt_productivo='$tram'and ti.ins_id=i.ins_id";
        
         $resultado = $conexion->createCommand($sqlaccion2);
         
         $datos = $resultado->query();
         
         return $datos;
    
}

public function ViewAccionesC($inst,$tram2) {
        $conexion = Yii::app()->db;
        
        $sqlaccion2 = "SELECT ac.accc_id, ac.accc_nombre, ac.accc_descripcion, ac.accc_fechaingreso,t.tra_nombre,ac.accc_productivo 
       
  FROM acciones_correctivas ac,tramite_institucion ti,tramite t
  where ac.trai_id=$inst and ti.trai_id=ac.trai_id and ti.tra_id=t.tra_id  ";

        
         $resultado = $conexion->createCommand($sqlaccion2);
         
         $datos = $resultado->query();
         
         return $datos;
    
}

public function GenUsuarios() {
        $conexion = Yii::app()->db;
        
        $sqlaccion = "select count(usu_id) as total,usu_tramiton 
                from usuario  group by usu_tramiton,usu_tipo_usuario;";
        
         $resultado = $conexion->createCommand($sqlaccion);
         
         $datos = $resultado->query();
         
         return $datos;
    }
    
public function GenComentarios() {
        $conexion = Yii::app()->db;
        
        $sqlaccion = "SELECT s.sol_productivo,count(c.com_id) as totalcom,u.usu_tipo_usuario
  FROM solucion s,comentario c,usuario u
  where s.sol_id=c.sol_id and c.usu_id = u.usu_id
  group by s.sol_productivo,u.usu_tipo_usuario";
        
         $resultado = $conexion->createCommand($sqlaccion);
         
         $datos = $resultado->query();
         
         return $datos;
    }
    
    public function GenUsuarios1() {
        $conexion = Yii::app()->db;
        
        $sqlaccion = "select count(usu_id) as total,usu_tramiton 
                from usuario  where usu_tramiton = 1 group by usu_tramiton";
        
         $resultado = $conexion->createCommand($sqlaccion);
         
         $datos = $resultado->query();
         
         return $datos;
    }
    
    public function GenUsuarios2() {
        $conexion = Yii::app()->db;
        
        $sqlaccion = "select count(usu_id) as total,usu_tramiton 
                from usuario  where usu_tramiton = 2 group by usu_tramiton";
        
         $resultado = $conexion->createCommand($sqlaccion);
         
         $datos = $resultado->query();
         
         return $datos;
    }
    
    public function Tramites1() {
        $conexion = Yii::app()->db;
        
        $sqlaccion = "select count(datt_id) as total,datt_productivo "
                . "from datos_tramite where datt_productivo='N' group by datt_productivo;";
        
         $resultado = $conexion->createCommand($sqlaccion);
         
         $datos = $resultado->query();
         
         return $datos;
    }
    
    public function Tramites2() {
        $conexion = Yii::app()->db;
        
        $sqlaccion = "select count(datt_id) as total,datt_productivo "
                . "from datos_tramite where datt_productivo='S' group by datt_productivo;";
        
         $resultado = $conexion->createCommand($sqlaccion);
         
         $datos = $resultado->query();
         
         return $datos;
    }
    
    public function Tramitones1() {
        $conexion = Yii::app()->db;
        
        $sqlaccion = "select count(accc_id) as total,accc_productivo "
                . "from acciones_correctivas where accc_productivo=1 group by accc_productivo;";
        
         $resultado = $conexion->createCommand($sqlaccion);
         
         $datos = $resultado->query();
         
         return $datos;
    }
    
     public function Tramitones2() {
        $conexion = Yii::app()->db;
        
        $sqlaccion = "select count(accc_id) as total,accc_productivo "
                . "from acciones_correctivas where accc_productivo=2 group by accc_productivo;";
        
         $resultado = $conexion->createCommand($sqlaccion);
         
         $datos = $resultado->query();
         
         return $datos;
    }
    public function GenComentarios1() {
        $conexion = Yii::app()->db;
        
        $sqlaccion = "SELECT s.sol_productivo,count(c.com_id) as totalcom
  FROM solucion s,comentario c,usuario u
  where s.sol_id=c.sol_id and c.usu_id = u.usu_id and sol_productivo='N'
  group by s.sol_productivo";
        
         $resultado = $conexion->createCommand($sqlaccion);
         
         $datos = $resultado->query();
         
         return $datos;
    }
    
    public function GenComentarios2() {
        $conexion = Yii::app()->db;
        
        $sqlaccion = "SELECT s.sol_productivo,count(c.com_id) as totalcom
  FROM solucion s,comentario c,usuario u
  where s.sol_id=c.sol_id and c.usu_id = u.usu_id and sol_productivo='S'
  group by s.sol_productivo";
        
         $resultado = $conexion->createCommand($sqlaccion);
         
         $datos = $resultado->query();
         
         return $datos;
    }
    
    public function Ingresos1() {
        $conexion = Yii::app()->db;
        
        $sqlaccion = "select count(logs_id) as total,logs_productivo 
                from log_sistema where logs_productivo='N' and logs_accion='Ingreso al sistema' group by logs_productivo ";
        
         $resultado = $conexion->createCommand($sqlaccion);
         
         $datos = $resultado->query();
         
         return $datos;
    }
    public function Ingresos2() {
        $conexion = Yii::app()->db;
        
        $sqlaccion = "select count(logs_id) as total,logs_productivo 
                from log_sistema where logs_productivo='S' and logs_accion='Ingreso al sistema' group by logs_productivo ";
        
         $resultado = $conexion->createCommand($sqlaccion);
         
         $datos = $resultado->query();
         
         return $datos;
    }
    
    public function Megusta1() {
        $conexion = Yii::app()->db;
        
        $sqlaccion = "SELECT s.sol_productivo,count(m.mgu_id) as totalcom
  FROM solucion s,megusta m,usuario u
  where s.sol_id=m.sol_id and m.usu_id = u.usu_id and sol_productivo='N'
  group by s.sol_productivo";
        
         $resultado = $conexion->createCommand($sqlaccion);
         
         $datos = $resultado->query();
         
         return $datos;
    }
    
     public function Megusta2() {
        $conexion = Yii::app()->db;
        
        $sqlaccion = "SELECT s.sol_productivo,count(m.mgu_id) as totalcom
  FROM solucion s,megusta m,usuario u
  where s.sol_id=m.sol_id and m.usu_id = u.usu_id and sol_productivo='S'
  group by s.sol_productivo";
        
         $resultado = $conexion->createCommand($sqlaccion);
         
         $datos = $resultado->query();
         
         return $datos;
    }
    
    public function grafico() {
        $conexion = Yii::app()->db;
        
        $sqlaccion = "SELECT count(datt_id) as totalg ,datt_fecharegistro, datt_productivo 
       
  FROM datos_tramite
  where datt_productivo='N' group by datt_fecharegistro,datt_productivo limit 10;";
        
         $resultado = $conexion->createCommand($sqlaccion);
         
         $datos = $resultado->query();
         
         return $datos;
    }
    public function graficop() {
        $conexion = Yii::app()->db;
        
        $sqlaccion = "SELECT count(datt_id) as totalg ,datt_fecharegistro, datt_productivo 
       
  FROM datos_tramite
  where datt_productivo='S' group by datt_fecharegistro,datt_productivo limit 10;";
        
         $resultado = $conexion->createCommand($sqlaccion);
         
         $datos = $resultado->query();
         
         return $datos;
    }
}
