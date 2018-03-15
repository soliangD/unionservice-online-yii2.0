<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\widgets\Alert;

$this->title = Yii::t('app','修改密码');//'Signup';

?>


<div class="chpwd-view">

	<ul class="breadcrumb">
		<li><a href="<?= Url::to(['/site/index']); ?>"><?=Yii::t('app','首页') ?></a></li>
		<li><?=Yii::t('app','修改密码') ?></li>
	</ul>

	<h2><?= Html::encode($this->title) ?></h2>

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


