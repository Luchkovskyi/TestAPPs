<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'users/index',
    'controllerNamespace' => 'frontend\controllers',
		'language' => 'ru-RU',
		
		// set source language to be English
		'sourceLanguage' => 'en-US',
    'components' => [
	'formatter' => [
	    'class' => 'yii\i18n\Formatter',
	    'dateFormat' => 'php:Y-m-d',
	    'datetimeFormat' => 'php:Y-m-d H:i:s',
	    'timeFormat' => 'php:H:i:s',
	],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'CC3mWUCSX8vzeWbqWCMnGsy-W95hBsKkadfasdfasdfadre',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'common\models\Users',
            'enableAutoLogin' => true,
        ],
    	'session' => [
    		'name' => 'advanced-frontend',
    	],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            	'/'=>'site/index',
            ],
        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
} 

return $config;
