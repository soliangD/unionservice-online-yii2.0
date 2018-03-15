<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

// YII_ENV 运行环境设置  prod生产环境  dev开发环境  影响YII_ENV_DEY，YII_ENV_PROD的值

require(__DIR__ . '/../../vendor/autoload.php');
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../../common/config/bootstrap.php');
require(__DIR__ . '/../config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../common/config/main.php'),
    require(__DIR__ . '/../../common/config/main-local.php'),
    require(__DIR__ . '/../config/main.php'),
    require(__DIR__ . '/../config/main-local.php')
);

//(new yii\web\Application($config))->run();

$application = new yii\web\Application($config);

$application->language = isset(Yii::$app->session['language'])? Yii::$app->session['language'] : 'zh-CN' ;

$application->run();
