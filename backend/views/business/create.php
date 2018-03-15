<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\Business */

$this->title = '新增业务';
//$this->params['breadcrumbs'][] = ['label' => 'Businesses', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-create">

    <ul class="breadcrumb">
        <li><a href="<?= Url::to(['/business/index']); ?>"><?=Yii::t('app','业务管理') ?></a></li>
        <li><?=Yii::t('app','新增') ?></li>
    </ul>

    <h2><?= Html::encode($this->title) ?></h2>
    <p>新增业务之后请再次新增一条对应的翻译项业务</p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
