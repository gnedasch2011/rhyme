<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'debug'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['127.0.0.1']
        ],
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['127.0.0.1', '::1'] // регулируйте в соответствии со своими нуждами
        ],
        'sitemap' => [
            'class' => 'app\modules\sitemap\Module',
        ],
        'url' => [
            'class' => 'app\modules\url\Module',
        ],
        'page' => [
            'class' => 'app\modules\page\Module',
        ],

    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'enableCsrfValidation' => false,
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'rhyme/index' => 'rhyme/index',
                'rhyme/<rhyme:\D+>' => 'rhyme/search-rhyme',
                '' => 'rhyme/index',
                'names' => 'rhyme/page-with-name',
                'assonansnye-i-dissonansnye-rifmy' => 'rhyme/types-of-rhymes',
                'muzhskie-rifmy' => 'rhyme/masculine-rhyme',
                'zhenskie-rifmy' => 'rhyme/feminine-rhyme',
                'sitemap.xml' => 'sitemap/default',
                'sitemap/<index:\d+>' => 'sitemap/default/sitemap',
                '<module:[\w-]+>/admin/<action:[\w-]+>/<id:\d+>' => '<module>/admin/<action>',
                '<module:[\w-]+>/admin/<action:[\w-]+>' => '<module>/admin/<action>',
                [
                    'class' => 'frontend\modules\url\components\rule\UrlRule',
                ],
            ],
        ],

    ],
    'params' => $params,
];
