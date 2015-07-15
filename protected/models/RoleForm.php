<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RoleForm
 *
 * @author Oscar
 */
class RoleForm extends CFormModel {
    
	public static $tipos=array("Operation","Task","Role");
	public $nombre;
	public $descripcion;
	public $tipo=2;
        public $item;

	public function rules()
	{
		return array(
			array("nombre, tipo","required","message"=>"Información requerida!! =( {attribute}"),
			#array("description","filter","filter"=>"trim"),
			array("descripcion","validando"),
		);
	}

	public function validando($attribute,$params)
	{
		if($this->$attribute=="test")
			$this->addError($attribute,"Esto no puede ser test.");
	}
}
