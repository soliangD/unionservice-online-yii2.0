<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\widgets\Alert;

$this->title = Yii::t('app','个人设置');//'Signup';

?>


<div class="banner-vice">

	<img src="image/settingsBanner.png">

</div>

<div class="nav">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="<?= Yii::$app->homeUrl; ?>"><?=Yii::t('app','首页') ?></a></li>
			<li><?=Yii::t('app','个人设置') ?></li>
	
		</ul>
	</div>
</div>

<div class="vice-content">

	<div class="container">
		<div class="left">
			<ul>
				
					<li>
						<span></span>
						<a href="<?=Url::to(['/site/settings'])?>">
							<?= Yii::t('app','个人资料 '); ?>
						</a>
					</li>
					<li class="cur">
						<span></span>
						<a href="<?=Url::to(['/site/chpwd'])?>">
							<?= Yii::t('app','修改密码 '); ?>
						</a>
					</li>
				
			</ul>
		</div>
		
		<div class="right">
			<div  class="top">
				<h2><?= Yii::t('app','修改密码 ');?></h2>
			</div>
			
			<?= Alert::widget() //显示交互信息的小部件?>
			
			<?php $form = ActiveForm::begin(); ?>

			<?= $form->field($model, 'password_old')->passwordInput() ?>

			<?= $form->field($model, 'password')->passwordInput() ?>
			
			<?= $form->field($model, 'password_repeat')->passwordInput() ?>


			<div class="form-group">
				<?= Html::submitButton(Yii::t('app','修改'), ['class' => 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
		</div>
	</div>

</div>


