<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

//hash key para encriptación de contraseñas
define('HASH_KEY', '54d3d05adfb6d');

//definición de variable global para path de imagenes
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('TEMA', 'tramiton');
$carpetas = explode(DS, ROOT);
$posicion = count($carpetas) - 2;
define('URL_IMG', 'http://' . $_SERVER['HTTP_HOST'] . '/' . $carpetas[count($carpetas) - 2] . '/themes/' . TEMA . '/assets/img/users/');

require_once($yii);
Yii::createWebApplication($config)->run();



