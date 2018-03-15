<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = '新增用户';
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <ul class="breadcrumb">
        <li><a href="<?= Url::to(['/user/index']); ?>"><?=Yii::t('app','用户管理') ?></a></li>
        <li><?=Yii::t('app','新增用户') ?></li>
    </ul>

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
