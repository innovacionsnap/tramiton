<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AjaxCaptchaValidator
 *
 * @author oscar.acero
 */
class AjaxCaptchaValidator extends CCaptchaValidator {

    /**
     * Skips captcha validation/regeneration during ajax requests
     */
    public $skipAjaxValidation = true;

    /**
     * Validates the attribute of the object.
     * If there is any error, the error message is added to the object.
     * @param CModel $object the object being validated
     * @param string $attribute the attribute being validated
     */
    protected function validateAttribute($object, $attribute) {
        if ($this->skipAjaxValidation && Yii::app()->request->isAjaxRequest)
            return;

        parent::validateAttribute($object, $attribute);
    }

}
