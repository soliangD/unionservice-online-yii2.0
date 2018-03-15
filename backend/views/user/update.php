<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = '修改用户:' . $model->username;
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <ul class="breadcrumb">
        <li><a href="<?= Url::to(['/user/index']); ?>"><?=Yii::t('app','用户管理') ?></a></li>
        <li><a href="<?= Url::to([ '/user/view','id'=>$model->id ]); ?>"><?=Yii::t('app','查看详情').'：'.$model->username ?></a></li>
        <li><?=Yii::t('app','修改') ?></li>
    </ul>

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
