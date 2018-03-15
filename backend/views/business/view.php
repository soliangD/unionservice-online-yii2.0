<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Business */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Businesses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-view">

    <ul class="breadcrumb">
        <li><a href="<?= Url::to(['/business/index']); ?>"><?=Yii::t('app','业务管理') ?></a></li>
        <li><?=Yii::t('app','查看详情').'：'.$model->name ?></li>
    </ul>

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确认删除此项？',
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
                'attribute'=> 'language',
                'value' => $model->language == 'zh' ? '中文' : '英文',
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
