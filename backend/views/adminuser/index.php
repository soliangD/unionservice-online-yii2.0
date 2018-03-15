<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AdminuserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '管理员管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adminuser-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增管理员', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email',
            //'status',
            [
                'attribute' => 'status',
                'value' => 'statusStr',
                'filter' => [
                    '0' => '禁用',
                    '10' => '正常',
                ],
            ],
            // 'created_at',
            // 'updated_at',
            'profile',

            [
                'class' => 'yii\grid\ActionColumn',         //按钮
                'header' => "操作",
                'headerOptions' => ['width' => "100px"],
            ],

            //修改按钮
//            [
//                'class' => 'yii\grid\ActionColumn',
//                'template' => '{view} {update} {delete} {approve}',  //对应控制器中动作,中间应用空格间隔扩大显示时的样式
//                'buttons' => [
//                    'view' => function($url,$model,$key)
//                    {
//                        $options = [
//                            'title' => Yii::t('yii','审核'),
//                            'aria-label' => Yii::t('yii','审核'),
//                            //'data-confirm' => Yii::t('yii','通过评论审核？'),
//                            'data-method' => 'post',
//                            'data-pjax'=>'0',
//                        ];
//                        return Html::a('<span class="Inr lnr lnr-user"></span>',$url,$options);
//
//                    }
//                ],
//                'contentOptions' => ['width' => "100px"],
//
//            ],


        ],
    ]); ?>
</div>
