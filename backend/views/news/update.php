<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = '修改: ' . $model->title;
//$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="news-update">

    <ul class="breadcrumb">
        <li><a href="<?= Url::to(['/news/index']); ?>"><?=Yii::t('app','新闻管理') ?></a></li>
        <li><a href="<?= Url::to([ '/news/view','id'=>$model->id ]); ?>"><?=Yii::t('app','查看详情') ?></a></li>
        <li><?=Yii::t('app','修改') ?></li>
    </ul>


    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
