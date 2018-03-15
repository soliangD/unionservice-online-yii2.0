<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */

$this->title = '修改管理员: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Adminusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="adminuser-update">

    <ul class="breadcrumb">
        <li><a href="<?= Url::to(['/adminuser/index']); ?>"><?=Yii::t('app','管理员管理') ?></a></li>
        <li><a href="<?= Url::to([ '/adminuser/view','id'=>$model->id ]); ?>"><?=Yii::t('app','查看详情').'：'.$model->username ?></a></li>
        <li><?=Yii::t('app','修改') ?></li>
    </ul>


    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
