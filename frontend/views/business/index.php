<?php
/**
 * @var $this yii\web\View 
 * @var $id string common\models\Business
 * @var $business array common\models\Business
 * @var $model common\models\Business
 */


use yii\helpers\Url;


$this->title = '公司业务 丨 '.Yii::t('app','联合服务在线');
?>


<div class="banner-vice">

	<img src="image/businessBanner.png">

</div>

<div class="nav">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="<?= Yii::$app->homeUrl; ?>"><?=Yii::t('app','首页') ?></a></li>
			<li><?=Yii::t('app','业务') ?></li>
	
		</ul>
	</div>
</div>

<div class="vice-content">

	<div class="container">
		<div class="left">
			<ul>
				<?php
				foreach($business as $k=>$v){
					?>
					<li <?php 
							if($id == $k) echo 'class="cur"';//给当前页面导航栏添加样式，用js添加的样式会在刷新时抖动
						?> > 
						<span></span>
						<a href="<?=Url::to(['business/index','id'=>$k])?>"><?=$v?></a>
					</li>
				<?php
				} ?>

				<li>
					<span></span>
					<a href="<?=Url::to(['project/index'])?>"><?=Yii::t('app','业务展示 ');?></a>
				</li>
			</ul>
		</div>
		
		<div class="right">
			<div  class="top">
				<h2><?=$business[$id];?></h2>
			</div>
			<?=$model->content?>
		</div>
	</div>

</div>



