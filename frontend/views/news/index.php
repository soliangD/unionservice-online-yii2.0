<?php
/* @var $this yii\web\View */
/* @var $data  common\models\News */
/* @var $page   */  //存储当前页面页数
/* @var $num    */  //array存储当前页面中对应的分页按钮显示开始和结束

use yii\helpers\Url;


$this->title = '公司动态 丨 '.Yii::t('app','联合服务在线');
?>

<div class="banner-vice">

	<img src="image/newsBanner.png">

</div>

<div class="nav">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="<?= Yii::$app->homeUrl; ?>"><?=Yii::t('app','首页') ?></a></li>
			<li><?=Yii::t('app','新闻') ?></li>
	
		</ul>
	</div>
</div>

<div class="vice-content" id="news">

	<div class="container">
		<div class="left">
			<ul>
				<li class="cur">
					<span></span>
					<a href="<?=Url::to(['news/index'])?>"><?=Yii::t('app','公司新闻')?></a>
				</li>
			</ul>
		</div>
		
		<div class="right">
			<div  class="top">
				<h2><?=Yii::t('app','新闻');?></h2>
			</div>
			<ul>
				<?php
				foreach($data as $k=>$v){
				?>
					<li>
						<a href="<?=Url::to(['news/view','id'=>$v->id])?>"><?=$v->shortTitle?></a>
						<em><?=date('Y-m-d',$v->create_time) ?></em>
					</li>
				<?php
				}?>
			</ul>
			<div class="page">
				<?php 
				if($num['size'] > 0) 
				{?>
					<?php 
					if($page != $num['start']) 
							echo '<a href="'.Url::to(['news/index','page'=>$page-1]).'">'.Yii::t('app','上一页').'</a>';
					
					
					for($i = $num['start']; $i <= $num['size']; $i++){
						
						echo '<a class="'.($page == $i ? 'cur' : '').'" href="'.Url::to(['news/index','page'=>$i]).'">'.$i.'</a>';
					
					}
					
					
					if($page != ($num['start']+$num['size']-1)) 
							echo '<a href="'.Url::to(['news/index','page'=>$page+1]).'">'.Yii::t('app','下一页').'</a>';
					?>
				<?php
				}?>
			</div>
		</div>
	</div>

</div>



