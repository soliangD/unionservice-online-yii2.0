<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '项目展示';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增项目', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'id',
                'options' => ['width'=>'50px'],
            ],
            'name',
            //'content:ntext',
            //'language',
            [
                'attribute' => 'language',
                'value' => 'lan',
                'filter' => [
                    'zh' => '中文(CN)',
                    'en' => '英文(EN)',
                ],
                'options' => ['width'=>'120px'],
            ],
            //'start_time:datetime',
            [
                'attribute' => 'start_time',
                'format' => ['date', 'php:Y-m-d'],
                'options' => ['width'=>'200px'],
            ],
            //'end_time:datetime',
            [
                'attribute' => 'end_time',
                'value' => 'endTime',
                'options' => ['width'=>'200px'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => "操作",
            ],
        ],
    ]); ?>
</div>
