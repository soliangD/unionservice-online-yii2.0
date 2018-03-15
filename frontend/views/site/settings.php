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
				
					<li class="cur">
						<span></span>
						<a href="<?=Url::to(['/site/settings'])?>">
							<?= Yii::t('app','个人资料 '); ?>
						</a>
					</li>
					<li class="">
						<span></span>
						<a href="<?=Url::to(['/site/chpwd'])?>">
							<?= Yii::t('app','修改密码 '); ?>
						</a>
					</li>
				
			</ul>
		</div>
		
		<div class="right">
			<div  class="top">
				<h2><?= Yii::t('app','个人资料 ');?></h2>
			</div>

			<?= Alert::widget() //显示交互信息的小部件?>
			
			<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

			<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'email')->textInput(['maxlength' => true, 'readonly' => 'true']) ?>

			<?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app','请输入姓名')]) ?>

			<?= $form->field($model, 'telphone')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'sex')->dropdownList([
												'' => Yii::t('app','保密'),
												'1'=> Yii::t('app','男'),
												'2'=> Yii::t('app','女')
												]); ?>

			<?= $form->field($model, 'birth')->input('date') ?>

			<?= $form->field($model, 'specialty')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'work_experience')->textarea(['maxlength' => true]) ?>

			<?= $form->field($model, 'resumeFile')->fileInput() ?>

			<div class="form-group">
				<?= Html::submitButton(Yii::t('app','修改'), ['class' => 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
		</div>
	</div>

</div>


