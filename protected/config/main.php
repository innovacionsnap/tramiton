<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
//alias para integrar bootstrap a yii 
//Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
Yii::setPathOfAlias('hash', dirname(__FILE__).'/../components');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Tramiton',
        'theme'=>'tramiton', // requires you to copy the theme under your themes directory

	// preloading 'log' component
	'preload'=>array('log'),
    
        'aliases' => array(
                'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change if necessary
                
                //alias para la excepcion
                //Invalid Bootstrap path and CDN URL not set. Set vendor.twbs.bootstrap.dist alias or cdnUrl parameter in the configuration file.
                'vendor.twbs.bootstrap.dist' => realpath(__DIR__ . '/../extensions/bootstrap'),
        ),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                //importacion de las clases para el bootstrap modal 
                'bootstrap.behaviors.*',
                'bootstrap.components.*',
                'bootstrap.form.*',
                'bootstrap.helpers.*',
                'bootstrap.widgets.*',
                'bootstrap.widgets.TbModal'
	),

	'modules'=>array(
                'gii'=>array(
                        'generatorPaths'=>array(
                            'bootstrap.gii',
                        ),
                ), 
                
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'12345',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
            
                'authManager'=>array(
                    'class' => 'CDbAuthManager',
                    'connectionID' => 'db'
                ),
            
                'hash'=>array(
                        'class'=>'hash.Hash',
                ), 
            
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
            
                'bootstrap' => array(
                        'class' => 'bootstrap.components.TbApi',   
                ),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
                        'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
                //conexion a la base de datos
			
                /*'db' => array (
			'connectionString' => 'pgsql:host=192.168.0.204;dbname=tramitonv2',
			'emulatePrepare' => true,
			'username' => 'tramites',
			'password' => 'tramiton2015',
			'charset' => 'utf8',
                ),*/
                
			


                'db' => array (
			//'connectionString' => 'pgsql:host=181.211.36.240;dbname=tramitonv2',
			'connectionString' => 'pgsql:host=localhost;dbname=tramiton',
			'emulatePrepare' => true,
			'username' => 'postgres',
			'password' => '12345',
			'charset' => 'utf8',
                ),
            
            
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail' => 'tramiton@administracionpublica.gob.ec',
		'hashKey' => '54d3d05adfb6d',
	),
);
