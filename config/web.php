<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'ingress-hunter',
    'name' => 'ingress-hunter',
    'basePath' => dirname(__DIR__),
    'homeUrl' => '/',
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => require(__DIR__ . '/cookie-key.php'),
            'baseUrl' => '/',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
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
                    'logFile' => '@runtime/logs/site.log',
                    'categories' => ['site'],
                    'except' => ['application'],
                    'levels' => ['error', 'warning', 'info'],
                    'logVars' => [],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'logFile' => '@runtime/logs/user.log',
                    'categories' => ['user'],
                    'except' => ['application'],
                    'levels' => ['info'],
                    'logVars' => [],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'baseUrl' => '/',
            'rules' => [
            ],
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'google' => [
                    'class' => 'yii\authclient\clients\GoogleOAuth',
                    'clientId' => '579439761294-c5tbnj3p3kdlnuvt5h27r1ood5l134ja.apps.googleusercontent.com',
                    'clientSecret' => 'pme9Dxl6NKuo6AOCUuvmbRQs',
                ],
            ],
        ],
        'yandexMapsApi' => [
            'class' => 'mirocow\yandexmaps\Api',
            'protocol' => 'https'
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1', '192.168.56.*'] // adjust this to your needs
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '192.168.56.*'] // adjust this to your needs
    ];
}

return $config;
