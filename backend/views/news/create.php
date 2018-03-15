<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = '新增新闻';
//$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-create">

    <ul class="breadcrumb">
        <li><a href="<?= Url::to(['/news/index']); ?>"><?=Yii::t('app','新闻管理') ?></a></li>
        <li><?=Yii::t('app','新增') ?></li>
    </ul>

    <h2><?= Html::encode($this->title) ?></h2>
    <p>新增新闻之后请再次新增一条对应的翻译项新闻</p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
