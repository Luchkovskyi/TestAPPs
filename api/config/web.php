<?php

$params = require (__DIR__ . '/../../common/config/params.php');
$db = require (__DIR__ . '/../../common/config/db.php');

$config = [ 
		'id' => 'ApiClowder',
		'basePath' => dirname ( __DIR__ ),
		'controllerNamespace' => 'api\controllers',
		'components' => array_merge(require __DIR__ . '/../../common/config/db.php', [
				'user' => [ 
						'identityClass' => 'common\models\UsersTokens',
						'enableAutoLogin' => false,
						'enableSession' => false,
				],
				'request' => [ 
						'parsers' => [ 
								'application/json' => 'yii\web\JsonParser' 
						]
						,
						'cookieValidationKey' => 'Tqzb6T8OevwXlnOw3kAVa7p5KVM5EwiJ69nkAcBv' 
				],
				'log' => [ 
						'traceLevel' => YII_DEBUG ? 3 : 0,
						'targets' => [ 
								[ 
										'class' => 'yii\log\FileTarget',
										'levels' => [ 
												'error',
												'warning' 
										] 
								] 
						] 
				],
				
				'urlManager' => [ 
						'baseUrl' => "/",
						'showScriptName' => false,
						'enablePrettyUrl' => true,
						'rules' => [ 
								[ 
										'class' => 'yii\rest\UrlRule',
										'controller' => [ 
												'users',
												'users-follow',
												'events',
												'event-categories',
												'settings',
												'polls',
												'polls-history',
                                                'news',
										],
										'pluralize' => false 
								] 
						] 
				],
		]),
		'params' => $params
];


return $config;
