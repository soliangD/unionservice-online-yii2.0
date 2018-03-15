<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = '新增链接';
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-create">

    <ul class="breadcrumb">
        <li><a href="<?= Url::to(['/setting/index']); ?>"><?=Yii::t('app','设置页面') ?></a></li>
        <li><?=Yii::t('app','新增') ?></li>
    </ul>

    <br>

    <?= $this->render('_linkForm', [
        'model' => $model,
    ]) ?>

</div>
