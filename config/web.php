<?php

$params = require(__DIR__ . '/params.php');

$config = [
	'id' => 'basic',
	'basePath' => dirname(__DIR__),
	'bootstrap' => ['log'],
	'language' => 'en',
	'aliases'=>['@mdm/admin'=>'@vendor/mdmsoft/yii2-admin'],
	'components' => [
		'view' => [
			'theme' => [
				'pathMap' => [
					'@app/views' => '@app/views',
					'@vendor/amnah/yii2-user/views'=>'@app/views/user/',
				],
			],
		],
		'urlManager' => [
			'enablePrettyUrl' => true,
			'rules' => [
				['class' => 'yii\rest\UrlRule', 'controller' => 'api/photo'],
			],
		],
		'request' => [
			'parsers' => [
				'application/json' => 'yii\web\JsonParser',
			],
			// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
			'cookieValidationKey' => 'Mm6heaay14ty6CILacC5z7C5T8CR4NuB',
		],
		'cache' => [
			'class' => 'yii\caching\FileCache',
		],
		 'user' => [
            'class' => 'amnah\yii2\user\components\User',
        ],
		
		  'authManager' => [
		  'class' => '\yii\rbac\DbManager',
		  'ruleTable' => 'AthRule', // Optional
		  'itemTable' => 'AuthItem',  // Optional
		  'itemChildTable' => 'AuthItemChild',  // Optional
		  'assignmentTable' => 'AuthAssignment',  // Optional
		  ],
		 
		'mailer' => [
			'class' => 'yii\swiftmailer\Mailer',
			'useFileTransport' => true,
			'messageConfig' => [
				'from' => ['admin@website.com' => 'Admin'], // this is needed for sending emails
				'charset' => 'UTF-8',
			],
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
	],
	'modules' => [
	
		'user' => [
			'class' => 'amnah\yii2\user\Module',
			//'modelClasses'=>['User'=>'app\models\User']
		],
		'api' => ['class' => '\app\modules\api\Module'],
		'masterdata' => ['class' => '\app\modules\masterdata\Module'],
		
		'admin' => [
			'class' => 'mdm\admin\Module',
			'controllerMap'=>[
			 'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'amnah\yii2\user\models\User',
                    'idField' => 'id', // id field of model User
                ]],],
		
		'gridview' => [
			'class' => '\kartik\grid\Module'
// enter optional module parameters below - only if you need to
// use your own export download action or custom translation
// message source
// 'downloadAction' => 'gridview/export/download',
// 'i18n' => []
		]
	//'user' => [
	// 'class' => 'amnah\yii2\user\Module',
	// set custom module properties here ...
	//],
	],
	'params' => $params,
	/*
	  'as access' => [
	  'class' => 'mdm\admin\components\AccessControl',
	  'allowActions' => [
	  'admin/*', // add or remove allowed actions to this list
	  'user/*',
	  ]
	  ],
	
	 */
];

if (YII_ENV_DEV) {
	// configuration adjustments for 'dev' environment
	$config['bootstrap'][] = 'debug';
	$config['modules']['debug'] = 'yii\debug\Module';

	$config['bootstrap'][] = 'gii';
	$config['modules']['gii'] = ['class' => 'yii\gii\Module',
			'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*', '192.168.178.20'],
			'generators' => [ //here
				'crud' => [ // generator name
					'class' => 'yii\gii\generators\crud\Generator', // generator class
					'templates' => [ //setting for out templates
						'myCrud' => '@app/giitemplatesNew/crud/default', // template name => path to template
					]
				],
				'model' => [ // generator name
					'class' => '\app\giiTemplatesNew\model\Generator', // generator class
					'templates' => [ //setting for out templates
						'myModel' => '@app/giitemplatesNew/model/default', // template name => path to template
					]
				],
				'fixturegii'=>[
				   'class'=>'insolita\fixturegii\gii\FixtureTemplateGenerator',
				   'templatePath'=>'@tests/codeception/templates',
				
				],
			],];
}

return $config;
