<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'modules' => [
        //富文本编辑器配置
        'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
            'uploadDir' => '@frontend/web/uploads', 						   //文件保存位置
            'uploadUrl' => 'http://www.portalsite.com/uploads',                //文件链接
            'imageAllowExtensions'=>['jpg','png','gif']
        ],
    ],
];
