<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'CARGO',

    //'defaultController' => 'en/site/index',
    //'homeUrl' => 'http://cargo/en/',

    'sourceLanguage'=>'en',
    'language'=>'en',

	// preloading 'log' component
	'preload'=>array(
        //'log',
        'bootstrap',
    ),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.controllers.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
        'user',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'12345',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
            'generatorPaths' => array('bootstrap.gii'),
		),


    ),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			//'class' => 'WebUser',
            'allowAutoLogin'=>true,
            'loginUrl' => array('/user/login'),

		),

        'bootstrap' => array(
            'class' => 'ext.bootstrap.components.Bootstrap',
            'responsiveCss' => true,
        ),


		'urlManager'=>array(
            'class'=>'DLanguageUrlManager',
            'urlRuleClass' => 'DLanguageUrlRule',
			'urlFormat'=>'path',
            'showScriptName' => true,
			'rules'=>array(
                //'/' => 'transport/index',
                //'home' => 'transport/index',
                '<action:(contact|login|logout)>' => 'site/<action>',
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

        'request'=>array(
            'class'=>'DLanguageHttpRequest',
        ),

        'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=go',
			'emulatePrepare' => true,
			'username' => '',
			'password' => '',
			'charset' => 'utf8',
            'tablePrefix'=>'',

		),

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
		'adminEmail'=>'cony@ukr.net',

        'translatedLanguages'=>array(
            'en'=>'English',
            'ru'=>'Russian',

        ),
        'defaultLanguage'=>'en',
	),
);