<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'language')->dropDownList([
                                                'zh' => '中文(CN)',
                                                'en' => '英文(EN)',
                                            ]) ?>

    <?
    if($model->id == 7 || $model->id == 8)
    {
        echo $form->field($model, 'content')->textarea(['rows' => 6]);
    }
    else
    {
       echo $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className(),[
                'clientOptions' => [
                    'imageManagerJson' => ['/redactor/upload/image-json'],
                    'imageUpload' => ['/redactor/upload/image'],
                    'fileUpload' => ['/redactor/upload/file'],
                    'lang' => 'zh_cn',
                    'plugins' => ['clips', 'fontcolor','imagemanager']
                ]
            ]);
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
