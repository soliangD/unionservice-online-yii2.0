<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true ]) ?>

    <?= $form->field($model, 'language')->dropDownList([
                                                'zh' => '中文',
                                                'en' => '英文',
                                            ]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?// $form->field($model, 'create_time')->textInput() ?>

    <?// $form->field($model, 'update_time')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([
                                                '0' => '未发布',
                                                '1' => '已发布',
                                            ]) ?>

    <?// $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className(),[
                                            'clientOptions' => [
                                                'imageManagerJson' => ['/redactor/upload/image-json'],
                                                'imageUpload' => ['/redactor/upload/image'],
                                                'fileUpload' => ['/redactor/upload/file'],
                                                'lang' => 'zh_cn',
                                                'plugins' => ['clips', 'fontcolor','imagemanager']
                                            ]
                                        ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
