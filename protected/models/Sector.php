<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sector
 *
 * @author Oscar
 */
class Sector extends CActiveRecord {
    
    public $nombre;
    public $valor;

    //put your code here
    public function tableName() {
        return 'sector';
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
