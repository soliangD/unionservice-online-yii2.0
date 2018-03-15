<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app','重置密码');
?>
<div class="container">
	<div class="site-form">
		<div class="page-header">
			<h2><?= Html::encode($this->title) ?></h2>
		</div>

		<p style="padding-left:80px; margin:1em 0"><?=Yii::t('app','请输入新密码:')?></p>

		<?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

			<?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>
			
			<?= $form->field($model, 'password_repeat')->passwordInput() ?>

			<div class="form-group">
				<?= Html::submitButton(Yii::t('app','保存'), ['class' => 'btn btn-primary']) ?>
			</div>

		<?php ActiveForm::end(); ?>
				
		</div>
	</div>
</div>