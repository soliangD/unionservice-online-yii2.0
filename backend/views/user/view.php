<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = '查看详情';
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <ul class="breadcrumb">
        <li><a href="<?= Url::to(['/user/index']); ?>"><?=Yii::t('app','用户管理') ?></a></li>
        <li><?=Yii::t('app','查看详情').'：'.$model->username ?></li>
    </ul>

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定删除此项吗？',
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
            'status',
            //'created_at',
            [
                'attribute' => 'created_at',
                'value' => date('Y-m-d H:i:s',$model->created_at),
            ],
            //'updated_at',
            [
                'attribute' => 'updated_at',
                'value' => date('Y-m-d H:i:s',$model->updated_at),
            ],
            'telphone',
            'sex',
            'birth_time:datetime',
            'specialty',
            'city',
            'address',
            'work_experience',
            'resume_link',
        ],
    ]) ?>

</div>
