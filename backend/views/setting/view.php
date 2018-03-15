<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view">

    <ul class="breadcrumb">
        <li><a href="<?= Url::to(['/project/index']); ?>"><?=Yii::t('app','业务展示管理') ?></a></li>
        <li><?=Yii::t('app','查看详情') ?></li>
    </ul>

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
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
            'name',
            //'content:ntext',
            //'language',
            [
                'attribute' => 'language',
                'value' => $model->lan,
            ],
            //'start_time:datetime',
            [
                'attribute' => 'start_time',
                'format' => ['date', 'php:Y-m-d'],
            ],
            'endTime',
        ],
    ]) ?>

    <h3>预览：</h3><br>

    <div class="view">
        <div class="view-content">
            <?= $model->content ?>
        </div>
    </div>

</div>
