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
    'components' => [
            //aws configuration, need to install the aws sdk first
            'awssdk' => [
                'class' => 'fedemotta\awssdk\AwsSdk',
                'credentials' => [ // Replace with your own credentials
                    'key' => $_ENV['AWS_ACCESS_KEY_ID'],
                    'secret' => $_ENV['AWS_SECRET_ACCESS_KEY'],
                ],
                'region' => 'us-west-2', // Replace with your AWS region
                'version' => 'latest',
            ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
            //handling json input for REST API
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'user' => [
            //'identityClass' => 'common\models\User',
            //uncomment the code above for setting to default identity
            'identityClass' => 'app\models\Student',
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
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        
        //smtp configuration
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'urlManager'=> [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules'=> [
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ],
        ],
    ],
    'params' => $params,
    //setting the default route
    'defaultRoute' => 'student/index',

];
