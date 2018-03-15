<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adminuser-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?php
    if($model->isNewRecord)
    {
        echo $form->field($model, 'password')->passwordInput(['autocomplete' => 'new-password']);
    }
    ?>

    <?// $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?// $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?// $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(['10' => '正常', '0' => '禁用']) ?>

    <?// $form->field($model, 'created_at')->textInput() ?>

    <?// $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'profile')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
