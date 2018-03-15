<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = '修改项目: ' . $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="project-update">

    <ul class="breadcrumb">
        <li><a href="<?= Url::to(['/project/index']); ?>"><?=Yii::t('app','项目展示管理'); ?></a></li>
        <li><a href="<?= Url::to(['/project/view','id'=>$model->id]); ?>"><?=Yii::t('app','查看详情'); ?></a></li>
        <li><?= Yii::t('app','修改'); ?></li>
    </ul>

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
