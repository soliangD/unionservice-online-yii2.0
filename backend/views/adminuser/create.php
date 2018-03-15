<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */

$this->title = '新增管理员';
$this->params['breadcrumbs'][] = ['label' => 'Adminusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adminuser-create">

    <ul class="breadcrumb">
        <li><a href="<?= Url::to(['/adminuser/index']); ?>"><?=Yii::t('app','管理员管理') ?></a></li>
        <li><?=Yii::t('app','新增') ?></li>
    </ul>

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
