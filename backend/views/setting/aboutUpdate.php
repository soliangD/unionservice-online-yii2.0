<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\About */

$this->title = '修改页面: ' . $model->title;

?>
<div class="setting-update">

    <ul class="breadcrumb">
        <li><a href="<?= Url::to(['/setting/index']); ?>"><?=Yii::t('app','设置页面'); ?></a></li>
        <li><a href="<?= Url::to(['/setting/about-view','id'=>$model->id]); ?>"><?=Yii::t('app','查看详情'); ?></a></li>
        <li><?= Yii::t('app','修改'); ?></li>
    </ul>

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_aboutForm', [
        'model' => $model,
    ]) ?>

</div>
