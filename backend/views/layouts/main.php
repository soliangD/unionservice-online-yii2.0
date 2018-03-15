<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
$this->title = '管理丨联合服务在线';
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">

    <!--用于在手机上可视宽度1000，允许用户缩放到的最小比例为0，最大比例为1 ，允许手动缩放   -->
    <meta name="viewport" content="width=1000,minimum-scale=0,maximum-scale=1.0,user-scalable=yes">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1">  用于移动端开发 -->
    <link href="favicon.ico" rel="shortcut icon" />

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <div class="top">
        <div class="brand">
            <a href="<?= Yii::$app->homeUrl; ?>"><span>联合在线管理系统</span></a>

        </div>
        <div class="top-list float-r">
            <span>管理员：<?= Yii::$app->user->identity->username; ?></span>
            <span><a href="<?= Url::to(['/site/chpwd']) ?>">修改密码</a></span>
            <a href="<?= Url::to(['/site/logout']); ?>" data-method="post">
                <i class="lnr lnr-exit"></i>注销
            </a>
        </div>
    </div>



    <div class="nav-fixed">
        <ul class="nav">

            <?php
                $r = $this->context->id;
            ?>

            <li>
                <a href="<?= Url::to(['/site/index']);?>" class="<?php if($r == 'site') echo 'active'?>">
                    <i class="lnr lnr-home"></i><span>首页</span>
                </a>
            </li>
            <li>
                <a href="<?= Url::to(['/user/index']); ?>" class="<?php if($r == 'user') echo 'active'?>">
                    <i class="lnr lnr-user"></i><span>用户管理</span>
                </a>
            </li>
            <li>
                <a href="<?= Url::to(['/business/index']);?>" class="<?php if($r == 'business') echo 'active'?>">
                    <i class="lnr lnr-chart-bars"></i><span>业务管理</span>
                </a>
            </li>
            <li>
                <a href="<?= Url::to(['/news/index']);?>" class="<?php if($r == 'news') echo 'active'?>">
                    <i class="lnr lnr-menu"></i><span>新闻管理</span>
                </a>
            </li>
            <li>
                <a href="<?= Url::to(['/adminuser/index']); ?>" class="<?php if($r == 'adminuser') echo 'active'?>">
                    <i class="lnr lnr-user"></i><span>管理员管理</span>
                </a>
            </li>
            <li>
                <a href="<?= Url::to(['/project/index']); ?>" class="<?php if($r == 'project') echo 'active'?>">
                    <i class="lnr lnr-inbox"></i><span>项目展示管理</span>
                </a>
            </li>
            <li>
                <a href="<?= Url::to(['/setting/index']); ?>" class="<?php if($r == 'setting') echo 'active'?>">
                    <i class="lnr lnr-cog"></i><span>网站设置</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="main">

        <div class="main-content">
            <?= $content ?>
        </div>

        <footer class="footer">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        </footer>

    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
