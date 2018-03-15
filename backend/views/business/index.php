<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BusinessSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '业务管理';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增业务', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'id',
                'options' => ['width' => '50px'],
            ],
            'name',
            // 'content:ntext',
            //'language',
            [
                'attribute' => 'language',
                'value' => 'lan',
                'filter' => [
                    'zh' => '中文(CN)',
                    'en' => '英文(EN)',
                ],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => "操作",
                'headerOptions' => ['width' => '100px'],
            ],
        ],
    ]); ?>
</div>
