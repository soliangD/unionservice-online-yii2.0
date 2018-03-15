<?php
$_config = [
    'components' => [
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];

#mysql -h -u-p
if(YII_ENV_PROD){
    $_config['components']['db'] = [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=hdm125077639.my3w.com;dbname=hdm125077639_db',
        'username' => 'hdm125077639',
        'password' => 'Union9Service8online',
        'charset' => 'utf8',
    ];
}else{
    $_config['components']['db'] = [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=portalsite',
        'username' => 'root',
        'password' => '123456',
        'charset' => 'utf8',
    ];
}

return $_config;
