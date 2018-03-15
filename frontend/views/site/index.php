<?php

/* @var $this yii\web\View */
/* @var $news common\models\News */
/* @var $projects common\models\Project */

use yii\helpers\Url;


$this->title = Yii::t('app','联合服务在线');
?>
<div id="banner">

	<?php
	foreach($banners as $banner) {
		?>
		<div id="item">
			<a href="<?= $banner->img_link; ?>">
				<img src="<?= $banner->img_url; ?>" title="<?= $banner->img_text; ?>" alt="<?= $banner->img_text; ?>"/>
			</a>
		</div>

		<?php
	}
	?>

	<ul id="picNum"> </ul>

</div>

<div class="middle">
	
	<div class="container">
		<div class="introduce">
			<P class="title"><a href="<?=Url::to(['about/index'])?>"><?=Yii::t('app','公司简介') ?></a></P>

			<p class="text"><?= $about->content;?></p>

		</div>
	</div>
	
	<center><hr/></center>	
	<div class="icon-menu">
		<div class="container">
			<a href="<?=Url::to(['business/index','id'=>0])?>">
				<div class="icon" style="background-image: url(image/icon1.png)"></div>
			</a>
			<a href="<?=Url::to(['business/index','id'=>3])?>">
				<div class="icon" style="background-image: url(image/icon2.png)"></div>
			</a>
			<a href="<?=Url::to(['business/index','id'=>4])?>">
				<div class="icon" style="background-image: url(image/icon3.png)"></div>
			</a>
		</div>
	</div>
	<center><hr/></center>
</div>

<div class="bottom">

	<div class="container">
		
		<div class="news">
			<div class="top">
				<img src="image/news.png" />
				<p><?=Yii::t('app','公司动态')?></p>
				<a href="<?=Url::to(['news/index'])?>">MOVE</a>
			</div>
			<div class="content">
				<ul>
					<?php
					foreach($news as $key=>$new) 
					{
					?>
						<li>
							<span><?=date('Y-m-d',$new->create_time);?></span>
							<a href="<?=Url::to(['news/view','id'=>$new->id])?>"> <?=$new->shortTitle;?> </a>
						</li>
					<?php
					}
					?>
					
				</ul>
			</div>
			
		</div>
		
		<div class="show-business">
			<div class="top">
				<img src="image/business.png" />
				<p><?=Yii::t('app','业务展示')?></p>
				<a href="<?=Url::to(['project/index'])?>">MOVE</a>
			</div>
			<div class="content">
				<ul>
					<?php
					foreach($projects as $key=>$project)
					{
						?>
						<li>
							<a href="<?=Url::to(['project/view','id'=>$project->id])?>"> <?=$project->shortTitle;?> </a>
						</li>
						<?php
					}
					?>
				</ul>
			</div>
		</div>
		
	</div>

</div>




