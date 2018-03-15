<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */

$this->title = $model->username;
//$this->params['breadcrumbs'][] = ['label' => 'Adminusers', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adminuser-view">

    <ul class="breadcrumb">
        <li><a href="<?= Url::to(['/adminuser/index']); ?>"><?=Yii::t('app','管理员管理') ?></a></li>
        <li><?=Yii::t('app','查看详情').'：'.$model->username ?></li>
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
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            //'status',
            [
                'attribute' => 'status',
                'value' => $model->statusStr,
            ],
            //'created_at',
            [
                'attribute' => 'created_at',
                'format' => ['date','php:Y-m-d H:i:s'],
            ],
            //'updated_at',
            [
                'attribute' => 'updated_at',
                'format' => ['date','php:Y-m-d H:i:s'],
            ],
            'profile:ntext',
        ],
    ]) ?>

</div>
