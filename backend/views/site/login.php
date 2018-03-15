<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\assets\AppAsset;


AppAsset::register($this);
?>



<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">


<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <!--用于在手机上可视宽度1000，允许用户缩放到的最小比例为0，最大比例为1 ，允许手动缩放   -->
    <meta name="viewport" content="width=1000,minimum-scale=0,maximum-scale=1.0,user-scalable=yes">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1">  用于移动端开发 -->

    <?= Html::csrfMetaTags() ?>
    <title></title>
    <?php $this->head() ?>
</head>

<body class="lg">

<?php $this->beginBody() ?>

<div class="login">

    <div class="container">
        <div class="login-body">

            <header>
                <h3>管理员登录</h3>
            </header>

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton('登录', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>