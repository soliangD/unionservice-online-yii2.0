<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = '修改轮播图 ';

?>
<div class="project-update">

    <ul class="breadcrumb">
        <li><a href="<?= Url::to(['/setting/index']); ?>"><?=Yii::t('app','设置页面'); ?></a></li>
        <li><a href="<?= Url::to(['/setting/banner-view','id'=>$model->id]); ?>"><?=Yii::t('app','查看详情'); ?></a></li>
        <li><?= Yii::t('app','修改'); ?></li>
    </ul>

    <br>

    <?= $this->render('_bannerForm', [
        'model' => $model,
    ]) ?>

</div>
