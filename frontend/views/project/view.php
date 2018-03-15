<?php
/* @var $this yii\web\View */
/* @var $model  common\models\Project */

use yii\helpers\Url;


$this->title = '业务展示 丨 '.Yii::t('app','联合服务在线');
?>


<div class="banner-vice">

	<img src="image/newsBanner.png">

</div>

<div class="nav">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="<?= Yii::$app->homeUrl; ?>"><?= Yii::t('app','首页'); ?></a></li>
			<li><a href="<?= Url::to(['project/index']); ?>"><?= Yii::t('app','业务展示 '); ?></a></li>
			<li><?= $model->name; ?></li>
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
					<li>
						<span></span>
						<a href="<?=Url::to(['business/index','id'=>$k])?>"><?=$v?></a>
					</li>
					<?php
				} ?>

				<li class="cur">
					<span></span>
					<a href="<?=Url::to(['project/index'])?>"><?=Yii::t('app','业务展示 ');?></a>
				</li>
			</ul>
		</div>
		
		<div class="right">
			<div  class="top">
				<h2><?=Yii::t('app','业务展示 ');?><a href="javascript:history.back(-1);"> BACK </a></h2>
			</div>
			<div>
				<?=$model->content?>	
			</div>
			<div class="back">
				<a href="javascript:history.back(-1);"> BACK </a>
			</div>
		</div>
	</div>

</div>



