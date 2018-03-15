<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div>
        <?= Html::submitButton('查找', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php // $form->field($model, 'id') ?>

    <?php // $form->field($model, 'username') ?>

    <?php // $form->field($model, 'auth_key') ?>

    <?php // $form->field($model, 'password_hash') ?>

    <?php // $form->field($model, 'password_reset_token') ?>

    <?= $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?= $form->field($model, 'telphone') ?>

    <?= $form->field($model, 'sex')->dropDownList([
                                            //'' => '全部',    //可由下面prompt定义默认空值，也可直接定义为空
                                            '1' => '男',
                                            '2' => '女',
                                        ],
                                        [
                                            'prompt' => '全部',
                                        ]) ?>

    <?php // echo $form->field($model, 'birth_time') ?>

    <?//$form->field($model, 'specialty') ?>

    <?// $form->field($model, 'city') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'work_experience') ?>

    <?php // echo $form->field($model, 'resume_link') ?>



    <?php ActiveForm::end(); ?>

</div>
