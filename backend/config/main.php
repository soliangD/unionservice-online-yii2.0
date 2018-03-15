<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'language' => 'zh-CN',
    'bootstrap' => ['log'],
    'modules' => [],
    'homeUrl' => '/admin',      //一个域名对应前后端设置
    'components' => [
        'request' => [
            'baseUrl' => '/admin',    //一个域名对应前后端设置
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\Adminuser',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
		
		//定义加载asset资源，这里去除自带的资源包全部去除  bootstrap，yii，jquery
		'assetManager'=>[
            'bundles'=>[
                 'yii\bootstrap\BootstrapAsset' => [
                    'css' => []
                ],
				'yii\bootstrap\BootstrapPluginAsset'=>[
					 'js'=>[]
				],
				// 'yii\web\YiiAsset'=>[
					// 'js'=>[]
				// ],
            ],
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
        'errorHandler' => [                      //错误处理
            'errorAction' => 'site/error',       //错误处理路由
        ],

        'i18n' => [                //多语言设置
            'translations' => [
                //默认的Yii::t('yii','')翻译文件，可不必再次声明
                'app' => [                                      //使用Yii::t('appss','');Yii::t('apps','');Yii::t('app','')..  会到这里来处理，寻找下面相应的文件
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii/messages',               //语言文件存放位置，一般为advanced\vendor\yiisoft\yii2\messages目录下
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',                      //使用Yii::t('apps','');时  会到app.php文件下进行翻译
                        //   还可定义多个app*的文件
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],*/
    ],
    'params' => $params,
];
