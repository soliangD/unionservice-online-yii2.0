<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'img_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bannerFile')->fileInput()->label("上传图片（图片尺寸为1920×360）") ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
