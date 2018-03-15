<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
	//'language' => 'en',
    'homeUrl' => '/',        //一个域名对应前后端设置
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '',         //一个域名对应前后端设置
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
			//'loginUrl' => ['user/login'],  //配置默认处理登陆的路由  默认为['site/login']
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
				// 'yii\web\YiiAsset'=>[     yii.js不要禁掉
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
		
		'mailer' => [  
			'class' => 'yii\swiftmailer\Mailer', 
			'viewPath' => '@common/mail',    //指定邮件视图模版路径			
			'useFileTransport' =>false,      //这句一定有，false发送邮件，true只是生成邮件在runtime文件夹下，不发邮件
			'transport' => [  
					'class' => 'Swift_SmtpTransport',  
					'host' => 'smtp.qq.com',  //每种邮箱的host配置不一样
					'username' => 'sun.wsl@qq.com',  
					'password' => 'qsfpckuczdttbjjd',  
					'port' => '465',            
					'encryption' => 'ssl',     //成对匹配1、'port' => '25','encryption' => 'tls', 2、587tls
                   ],   
			'messageConfig'=>[  
					'charset'=>'UTF-8',  
					'from'=>['297210725@qq.com'=>'admin'],   //改变发件人昵称
					],  
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
