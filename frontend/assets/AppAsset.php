<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
		'css/default.css',
        'css/site.css',
    ];
    public $js = [
		'js/app.js',
    ];
    public $depends = [
         'yii\web\YiiAsset',          //设置依赖，先加载YiiAsset中的jq
         'yii\bootstrap\BootstrapAsset',
    ];
	//定义按需加载JS方法，注意加载顺序在最后 
	public static function addScript($view, $jsfile) { 
		$view->registerJsFile($jsfile, [AppAsset::className(), 'depends' => 'frontend\assets\AppAsset']); 
	} 
	//定义按需加载css方法，注意加载顺序在最后 
	public static function addCss($view, $cssfile) { 
		$view->registerCssFile($cssfile, [AppAsset::className(), 'depends' => 'frontend\assets\AppAsset']); 
	} 
	
	//有了上面的方法之后，可以使用方法方便的引入js和css
	// 在视图的头部引入AppAsset::register($this);时  同时使用AppAsset::addScript($this,'/css/main.js');
	
}
