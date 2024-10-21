<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language'=>'Vi',
    'modules' => [
        'dynagrid' => [
            'class' => '\kartik\dynagrid\Module',
        // other module settings
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module',
        ],
        'datecontrol' => [
            'class' => '\kartik\datecontrol\Module'
        ],
        'search' => [
            'class' => 'backend\modules\search\search',
        ],
        'dashboard' => [
            'class' => 'backend\modules\dashboard\dashboard',
        ],
        'worklist' => [
            'class' => 'backend\modules\worklist\worklist',
        ],
        'bills' => [
            'class' => 'backend\modules\bills\bills',
        ],
        'tscd' => [
            'class' => 'backend\modules\tscd\tscd',
        ],
        'totrinh' => [
            'class' => 'backend\modules\totrinh\totrinh',
        ],
        'items' => [
            'class' => 'backend\modules\items\items',
        ],
        'room' => [
            'class' => 'backend\modules\room\room',
        ],
        'dntt' => [
            'class' => 'backend\modules\dntt\dntt',
        ],
        'gatepass' => [
            'class' => 'backend\modules\gatepass\gatepass',
        ],
        'device' => [
            'class' => 'backend\modules\device\device',
        ], 'repair_printer' => [
            'class' => 'backend\modules\repair_printer\repair_printer',
        ],
        'printer' => [
            'class' => 'backend\modules\printer\printer',
        ],
        'users' => [
            'class' => 'backend\modules\users\users',
        ],
        'khth' => [
            'class' => 'backend\modules\khth\khth',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
// 		'view' => [
// 			 'theme' => [
// 				 'pathMap' => [
// 					'@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
// 				 ],
// 			 ],
// 		],
// 		'assetManager' => [
// 			'bundles' => [
// 				'dmstr\web\AdminLteAsset' => [
// 					'skin' => 'skin-red-light',
// 				],
// 			],
// 		],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'dashboard',
                'site' => 'site/login',
                'login' => 'site/login',
                'logout' => 'site/logout',
                'users' => 'users/users',
                'users/<action:\w+>' => 'users/users/<action>',
                'search' => 'search/search',
                'searchs/<action:\w+>' => 'search/search/<action>',
                'dntt' => 'dntt/dntt',
                'dntt/<action:\w+>' => 'dntt/dntt/<action>',
                'totrinh' => 'totrinh/totrinh',
                'totrinh/<action:\w+>' => 'totrinh/totrinh/<action>',
                'gatepass' => 'gatepass/gatepass',
                'gatepass/<action:\w+>' => 'gatepass/gatepass/<action>',
                'room' => 'room/room',
                'room/<action:\w+>' => 'room/room/<action>',
                'bills' => 'bills/bills',
                'bills/<action:\w+>' => 'bills/bills/<action>',
                'bgtb' => 'bills/bgtb',
                'bgtb/<action:\w+>' => 'bills/bgtb/<action>',
                'xuatduphong' => 'bills/xdp',
                'xuatduphong/<action:\w+>' => 'bills/xdp/<action>',
                'bcxdp' => 'bills/bcxdp',
                'bcxdp/<action:\w+>' => 'bills/bcxdp/<action>',
//                'suachuathietbi' => 'bills/sctb',
//                'suachuathietbi/<action:\w+>' => 'bills/sctb/<action>',
                'nhapthietbi' => 'bills/nhaptb',
                'nhapthietbi/<action:\w+>' => 'bills/nhaptb/<action>',
                'suachuathietbi' => 'repair_printer/repair_printer',
                'suachuathietbi/<action:\w+>' => 'repair_printer/repair_printer/<action>',
                'mayin/<action:\w+>' => 'printer/printer/<action>',
                'mayin' => 'printer/printer',
                
                'items' => 'items/items',
                'items/<action:\w+>' => 'items/items/<action>',
                'itemtype' => 'items/item-type',
                'itemtype/<action:\w+>' => 'items/item-type/<action>',
                'device' => 'device/device',
                'device/<action:\w+>' => 'device/device/<action>',
                'deviceh' => 'device/history',
                'deviceh/<action:\w+>' => 'device/history/<action>',
                'tscd' => 'tscd/tscd',
                'tscd/<action:\w+>' => 'tscd/tscd/<action>',
                'partner' => 'partner/partner',
                'partner/<action:\w+>' => 'partner/partner/<action>',
                'customer' => 'customer/customer',
                'customer/<action:\w+>' => 'customer/customer/<action>',
                'worklist' => 'worklist/worklist',
                'worklist/<action:\w+>' => 'worklist/worklist/<action>',
                'project' => 'project/project',
                'project/<action:\w+>' => 'project/project/<action>',
                'payment' => 'payment/payment',
                'payment/<action:\w+>' => 'payment/payment/<action>',
                'recive' => 'recive/recive',
                'recive/<action:\w+>' => 'recive/recive/<action>',
                'khth' => 'khth/users',
                'khth/<action:\w+>' => 'khth/users/<action>',
                'checkxml' => 'khth/checkxml',
                'checkxml/<action:\w+>' => 'khth/checkxml/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<id:\d+>/<slug:\w+>' => '<controller>/view',
            ],
        ],
        
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@backend/messages',
                    'sourceLanguage' => '',
                       'fileMap' => [
                        'app' => 'app.php',
                    ],],
            ],
        ],
    ],
    'params' => $params,
    'aliases' => [
        '@foo' => '/path/to/foo',
//        '@bar' => 'http://www.example.com',
    ],
];
