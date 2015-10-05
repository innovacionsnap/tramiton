<?php
class BitacoraValidation extends CValidator
{
     public $valor;
     public function validateAttribute($object,$attribute)
    {
        if(!$object->$attribute)
        {
            return $this->addError($object,$attribute,"El campo es requerido");
        }
    }
}