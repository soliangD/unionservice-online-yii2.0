<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '新闻管理';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增新闻', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],  //展示列序号

            //'id',
            [
                'attribute' => 'id',
                'options' => ['width' => '50px'],
            ],
            [
                'attribute' => 'title',
                'value' => 'shortTitle',
            ],
            //'content:ntext',
            //'language',
            [
                'attribute' => 'language',
                'value' =>  'lan',
                'filter' => [
                    'zh' => '中文',
                    'en' => '英文',
                ],
            ],
            'author',
//            [
//                'attribute' => 'create_time',
//                'format' => ['date','php:Y-m-d H:i:s'],
//            ],
            [
                'attribute' =>  'update_time',
                'label' => '最后修改时间',
                'format' => ['date','php:Y-m-d'],
            ],
            //'status',
            [
                'attribute' => 'status',
                'value' => 'statusStr',
                'filter' => [
                    '0' => '未发布',
                    '1' => '已发布',
                ],
            ],


            [
                'class' => 'yii\grid\ActionColumn',
                'header' => "操作",
                'contentOptions' => ['width' => '100px'],
            ],
        ],
    ]); ?>
</div>
