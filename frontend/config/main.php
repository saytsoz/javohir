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
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute'=>'main',
    'language'=>'ru',
    'sourceLanguage'=>'ru-Ru',
    'homeUrl'=>'/',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'class'=>'frontend\components\LangRequest',
            'baseUrl'=>''
        
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
                //  '/page' =>'/main/page',
                 '/page/<id:[a-z0-9_\-]+>' =>'/main/page',
                 '/category/<id:\d+>' =>'/main/category',
            ],
        ],
       
    

     'language'=>'ru-Ru',
        'i18n'=>[
            'translations'=>[
                '*'=>[
                    'class'=>'yii\i18\PhpMessageSource',
                    'basePath'=>'@webroot/lang',
                    'sourceLanguage'=>'ru',
                    'fileMap'=>[
                        'main'=>'main.php',
                    ],
                ],
            ],
        ],
    ],
    'params' => $params,
];
