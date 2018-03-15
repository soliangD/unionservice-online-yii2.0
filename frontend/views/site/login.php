<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = Yii::t('app','登录');
?>
<div class="container">
	
	<div class="site-form">
	
		<div class="page-header">
			<h2><?= Html::encode($this->title) ?></h2>
		</div>
		
		<center><hr/></center>

				<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

					<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

					<?= $form->field($model, 'password')->passwordInput() ?>

					

					<div style="padding-left:200px; color:#999;margin:1em 0">
						<?= Html::a(Yii::t('app','忘记密码'), ['site/request-password-reset']) ?>丨
						<?= Html::a(Yii::t('app','注册'), ['site/signup']) ?>
					</div>

					<div class="form-group">
						<?= Html::submitButton(Yii::t('app','登录'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
					</div>

				<?php ActiveForm::end(); ?>
	</div>
</div>


