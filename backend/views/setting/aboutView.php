<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\About */


$this->title = $model->title;
?>
<div class="setting-view">

    <ul class="breadcrumb">
        <li><a href="<?= Url::to(['/setting/index']); ?>"><?=Yii::t('app','设置页面') ?></a></li>
        <li><?=Yii::t('app','查看详情') ?></li>
    </ul>

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('修改', ['about-update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['about-delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定删除此项？',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            //'content',
            [
                'attribute' => 'language',
                'value' => $model->lan,
            ],
        ],
    ]) ?>

    <h3>预览：</h3><br>

    <div class="view">
        <div class="view-content">
            <?= $model->content ?>
        </div>
    </div>

</div>
