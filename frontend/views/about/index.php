<?php

/* @var $this yii\web\View */
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;


$this->title = Yii::t('app','关于我们 ').' 丨 '.Yii::t('app','联合服务在线');

?>
<div class="banner-vice">

	<img src="image/aboutBanner.png">

</div>

<div class="nav">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="<?= Yii::$app->homeUrl; ?>"><?=Yii::t('app','首页') ?></a></li>
			<li><?=Yii::t('app','关于我们 ') ?></li>
	
		</ul>
	</div>
</div>

<div class="vice-content">

	<div class="container">
		<div class="left">
			<ul>
				<?php
				foreach($abouts as $k=>$v){
					?>
					<li <?php 
							if($id == $k) echo 'class="cur"';//给当前页面导航栏添加样式，用js添加的样式会在刷新时抖动
						?> > 
						<span></span>
						<a href="<?=Url::to(['about/index','id'=>$k])?>"><?=$v?></a>
					</li>
				<?php
				} ?>
			</ul>
		</div>
		
		<div class="right">
			<div  class="top">
				<h2><?= $model->title; ?></h2>
			</div>
			<?=$model->content?>
		</div>
	</div>

</div>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
