<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <p>
        <?= Html::a('新增用户', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                //'contentOptions' => ['width' => '30px'],  //配置td的属性
                'options' => [                              //整体属性
                    'width' => '50px',
                ]
                //'headerOptions' => ['width' => '30px'],     //配置th的属性

            ],
            'name',
            //'username',
            [
                'attribute' => 'username',
            ],
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            // 'email:email',
            //'status',
            [
                'attribute' => 'status',
                'value' => 'statusStr',
                'filter' => [
                        '10' => '正常',
                        '0' => '禁用',
                        ],
                //'contentOptions' => ['width' => "100px"],      //配置td的属性
                'headerOptions' => ['width' => "100px"],        //配置th的属性
            ],
            // 'created_at',
            // 'updated_at',
            'telphone',
            // 'sex',
            // 'birth_time:datetime',
            [
                'attribute' => 'age',
            ],
            'specialty',
            //'city',
            [
                'attribute' => 'city',
                'headerOptions' => ['width' => '100px'],
            ],
            // 'address',
            // 'work_experience',
            // 'resume_link',

//            [
//                'class' => 'yii\grid\ActionColumn',
//                'header' => "操作",
//                'contentOptions' => ['width' => "100px"],
//            ],

            //修改按钮
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => "操作",
                'template' => '{view} {update} {delete} {download}',  //对应控制器中动作,中间应用空格间隔扩大显示时的样式
                'buttons' => [
                    'download' => function($url,$model,$key)
                    {
                        $options = [
                            'title' => '下载简历'.$model->id ,
                            'aria-label' => Yii::t('yii','下载简历'),
                            //'data-confirm' => Yii::t('yii','通过评论审核？'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ];
                        if(empty($model->resume_link)) {
                            $options = ['style' => 'display:none'];
                        }
                        return Html::a('<span class="lnr lnr-download"></span>', 'http://www.portalsite.com/'.$model->resume_link, $options);      //$url

                    }
                ],
                //'contentOptions' => ['width' => "100px"],
                'headerOptions' => ['width' => "100px"],
            ],


        ],
    ]); ?>

    <div class="search">
        <h3>更多搜索</h3>
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
</div>
