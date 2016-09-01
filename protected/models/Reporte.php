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
                . "count(trai.ins_id) as total, ins.ins_nombre "
                . "from "
                . "datos_tramite dt, tramite_institucion trai, institucion ins "
                . "where "
                . "datt_productivo = 'N' and "
                . "dt.trai_id = trai.trai_id and "
                . "trai.ins_id = ins.ins_id "
                . "group by trai.ins_id, ins.ins_nombre "
                . "order by total desc limit 10";
        
         $resultado = $conexion->createCommand($sqlTopTen);
         
         $datos = $resultado->query();
         
         return $datos;
    }
    
    
}
