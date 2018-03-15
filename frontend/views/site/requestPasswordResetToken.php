<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app','重置密码');
?>
<div class="container">
	<div class="site-form">
		<div class="page-header">
			<h2><?= Html::encode($this->title) ?></h2>
		</div>
		
		<center><hr/></center>

		<p style="padding-left:80px; margin:1em 0">
			<?=Yii::t('app','请填写您账号的Email，将会发送一个重置密码链接到您的邮箱')?>
		</p>

		<?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

			<?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

			<div class="form-group">
				<?= Html::submitButton(Yii::t('app','发送'), ['class' => 'btn btn-primary']) ?>
			</div>

		<?php ActiveForm::end(); ?>
			
		</div>
	</div>
</div>