<?php 
if (Yii::app()->user->isGuest == 1){
    include "solucion_nologueado.php";
}else{
    include "solucion_logueado.php";
}



