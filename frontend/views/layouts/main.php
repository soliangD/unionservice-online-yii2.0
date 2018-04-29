<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;
use yii\bootstrap\Carousel;

AppAsset::register($this);

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
    <div class = "navbar-top">
		<div class = "container">
		  <ul class = 'top-list'>
			<?php
				
				if(Yii::$app->user->isGuest) {
					echo '<li><a href='.Url::to(['/site/signup']).' > '. Yii::t('app','注册') .' </a></li>';
					echo '<li><a href='.Url::to(['/site/login']).' > '. Yii::t('app','登录') .'</a></li>';
				} else {
					echo '<li class="dropdown">
								<a href="'.Url::to(['/site/settings']).'" > '. Yii::$app->user->identity->username .'</a>
								<ul>
									<li>
										<a href="'.Url::to(['/site/settings']).'">'.Yii::t('app','个人资料').'</a>
									</li>
									<li>
										<a href="'.Url::to(['/site/chpwd']).'">'.Yii::t('app','修改密码').'</a>
									</li>
								</ul>
						  </li>';
					
					
					echo '<li>' . Html::beginForm(['/site/logout'], 'post')
								. Html::submitButton(
									Yii::t('app','注销'),
									['class' => 'btn-link logout']
								)
								. Html::endForm()
								. '</li>';
				}
			?>
			<li>
			<?php
				if(Yii::$app->language == 'zh-CN')
				{
					echo '<a href='. Url::to(['site/language', 'language' => 'en']).' > EN </a>';
				}else
				{
					echo '<a href='. Url::to(['site/language', 'language' => 'zh-CN']) .' > CN </a>';
				}
			?>
			</li>
		  </ul>
		</div>
	</div>
	
	<div class="navbar">
		
		<div class="container">
		
			<div class="logo">
				<a href="<?=Yii::$app->homeUrl ?>"> <img src="image/logo1.png" alt="联合服务在线" /> </a>
			</div>
			
			<div class="navbar-nav">
				<ul>
					<?php
						if(empty($_GET['r'])) {
							$r = 'site';
						}else{
							$r = substr($_GET['r'], 0, strpos($_GET['r'], '/'));
						}
					?>
					<li>
						<a class="xx <?php if($r == 'site') echo 'hover'?>"
						   href="<?=Url::to(['/site/index']) ?>">  <?= Yii::t('app','首页') ?>
						</a>
					</li>
					<li>
						<a class="xx <?php if($r == 'business' || 'project') echo 'hover';?> "
						   href="<?=Url::to(['/business/index']) ?>">  <?= Yii::t('app','公司业务') ?> 
						</a>
					</li>
					<li>
						<a class="xx <?php if($r == 'news') echo 'hover';?> "
   						   href="<?=Url::to(['/news/index']) ?>">  <?= Yii::t('app','公司动态') ?> 
						</a>
					</li>
					<li>
						<a class="xx <?php if($r == 'about') echo 'hover';?> "
						   href="<?=Url::to(['/about/index']) ?>">  <?= Yii::t('app','关于我们') ?> 
						</a>
					</li>
				</ul>
			</div>
			
		</div>
		
	</div>
	
	<?= Alert::widget() //显示交互信息的小部件?>
	
	
	
	<?= $content ?>
	
	
	
</div>

<footer class="footer">
	<div class="container">
		<div class="foot-top">
			<div class="foot-link">
				<span><?=Yii::t('app','友情链接')?></span>
				<ul>
					<li><a href="https://www.baidu.com" target="_Blank">百度</a></li>
					<li><a href="https://www.baidu.com" target="_Blank">百度</a></li>
					<li><a href="https://www.baidu.com" target="_Blank">百度</a></li>
					<li><a href="https://www.baidu.com" target="_Blank">百度</a></li>
				</ul>
			</div>
			<p>丨<a href="<?= Url::to(['about/index','id' => 2]); ?>"><?=Yii::t('app','加入我们')?></a>丨
				 <a href="<?= Url::to(['about/index','id' => 1]); ?>"><?=Yii::t('app','联系我们')?></a>丨
			</p>
		</div>
		<hr/>
		<p class="copyright">&copy; <?=Yii::t('app','联合服务在线') .' '. date('Y') ?></p>
	</div>
</footer>




<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
