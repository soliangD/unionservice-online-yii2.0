<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Business */

$this->title = '修改业务: ' . $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Businesses', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="business-update">

    <ul class="breadcrumb">
        <li><a href="<?= Url::to(['/business/index']); ?>"><?=Yii::t('app','业务管理') ?></a></li>
        <li><a href="<?= Url::to(['/business/view', 'id'=>$model->id ]); ?>"><?=Yii::t('app','查看详情').'：'.$model->name ?></a></li>
        <li><?=Yii::t('app','修改') ?></li>
    </ul>

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
