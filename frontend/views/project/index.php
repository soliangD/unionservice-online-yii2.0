<?php
/* @var $this yii\web\View */
/* @var $data  common\models\Project */
/* @var $page   */   //存储当前页面页数
/* @var $num    */   //array存储当前页面中对应的分页按钮显示开始和结束
/* @var $business     */
use yii\helpers\Url;


$this->title = '业务展示 丨 '.Yii::t('app','联合服务在线');
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
				<h2><?=Yii::t('app','业务展示 ');?></h2>
			</div>

			<table class="project-table">
				<thead>
					<tr>
						<th><?= Yii::t('app','项目名'); ?></th>
						<th><?= Yii::t('app','开始时间'); ?></th>
						<th><?= Yii::t('app','结束时间'); ?></th>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach($data as $k=>$v){
					?>
					<tr onclick="location='<?= Url::to(['project/view', 'id'=>$v->id]) ?>'">

							<td><?= $v->shortTitle ?></td>
							<td><?= date('Y-m-d', $v->start_time) ?></td>
							<td><?= $v->endTime ?></td>

					</tr>
					<?php
				}?>
				</tbody>
			</table>


			<div class="page">
				<?php 
				if($num['size'] > 0) 
				{?>
					<?php 
					if($page != $num['start']) 
							echo '<a href="'.Url::to(['project/index','page'=>$page-1]).'">'.Yii::t('app','上一页').'</a>';
					
					
					for($i = $num['start']; $i <= $num['size']; $i++){
						
						echo '<a class="'.($page == $i ? 'cur' : '').'" href="'.Url::to(['project/index','page'=>$i]).'">'.$i.'</a>';
					
					}
					
					
					if($page != ($num['start']+$num['size']-1)) 
							echo '<a href="'.Url::to(['project/index','page'=>$page+1]).'">'.Yii::t('app','下一页').'</a>';
					?>
				<?php
				}?>
			</div>
		</div>
	</div>

</div>



