<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = $model->web_name;

?>
<div class="project-view">

    <ul class="breadcrumb">
        <li><a href="<?= Url::to(['/setting/index']); ?>"><?=Yii::t('app','设置页面') ?></a></li>
        <li><?=Yii::t('app','查看详情') ?></li>
    </ul>

    <br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'web_name',
            'web_link',
        ],
    ]) ?>

    <p>
        <?= Html::a('修改', ['link-update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['link-delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定删除此项？',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
