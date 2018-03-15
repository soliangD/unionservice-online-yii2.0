<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = Yii::t('app','注册');//'Signup';

?>

<div class="container">
	
	<div class="site-form">
	
		<div class="page-header">
			<h2><?= Html::encode($this->title) ?></h2>
		</div>
		
		<center><hr/></center>
		
		<div class="signup-left">
			<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

				<?= $form->field($model, 'username',['enableAjaxValidation'=>true])->textInput(['autofocus' => true]) ?>

				<?= $form->field($model, 'email',['enableAjaxValidation'=>true]) ?>

				<?= $form->field($model, 'password')->passwordInput() ?>
				
				<?= $form->field($model, 'password_repeat')->passwordInput() ?>

				<div class="form-group">
					<?= Html::submitButton(Yii::t('app','注册'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
				</div>
				

			<?php ActiveForm::end(); ?>
		</div>
		
		<div class="signup-right">
			<h3>注册后可以:</h3>
			<ol>
				<li>填写个人信息，在有合适工作或兼职时，<br/>我们会主动联系您</li>
				<li>上传简历，加入我们</li>
				
			</ol>
		</div>
		
	</div>
</div>

