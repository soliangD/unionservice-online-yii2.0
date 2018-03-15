<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = '新增项目';

?>
<div class="project-create">

    <ul class="breadcrumb">
        <li><a href="<?= Url::to(['/project/index']); ?>"><?=Yii::t('app','设置页面') ?></a></li>
        <li><?=Yii::t('app','新增') ?></li>
    </ul>

    <br>

    <?= $this->render('_bannerForm', [
        'model' => $model,
    ]) ?>

</div>
