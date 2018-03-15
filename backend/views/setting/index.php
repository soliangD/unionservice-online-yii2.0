<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $AboutData common\models\About */

$this->title = '网站设置';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <div style="display: block; overflow:hidden">

    <div class="setting-content">

        <h2>关于我们页面管理</h2>

        <?= GridView::widget([
            'dataProvider' => $aboutData,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],
                'id',
                'title',
                //'username',
                //'content',
                //'language',
                [
                    'attribute' => 'language',
                    'value' => 'lan',
                ],
//                [
//                    'class' => 'yii\grid\ActionColumn',
//                    'header' => "操作",
//                    'contentOptions' => ['width' => "80px"],
//                ],
                //修改按钮
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => "操作",
                    'template' => '{view} {update} ',  //{delete}  对应控制器中动作,中间应用空格间隔扩大显示时的样式
                    'buttons' => [
                        'view' => function($url,$model,$key)
                        {
                            $options = [
                                'title' => '查看',
                                'aria-label' => '查看',
                                //'data-confirm' => Yii::t('yii','通过评论审核？'),
                                //'data-method' => 'post',
                                'data-pjax' => '0',
                            ];
                            return Html::a('<span class="lnr lnr-eye"></span>',['setting/about-view', 'id'=>$model->id ] , $options);      //$url
                        },
                        'update' => function($url,$model,$key)
                        {
                            $options = [
                                'title' => '修改',
                                'aria-label' => '修改',
                                //'data-confirm' => Yii::t('yii','通过评论审核？'),
                                //'data-method' => 'post',
                                'data-pjax' => '0',
                            ];
                            return Html::a('<span class="lnr lnr-pencil"></span>',['setting/about-update', 'id'=>$model->id ] , $options);      //$url
                        },
//                        'delete' => function($url,$model,$key)
//                        {
//                            $options = [
//                                'title' => '删除',
//                                'aria-label' => '删除',
//                                'data-confirm' => Yii::t('yii','确定删除？删除后无法恢复'),    //按钮提示框
//                                'data-pjax' => '0',
//                            ];
//                            return Html::a('<span class="lnr lnr-trash"></span>',['setting/about-delete', 'id'=>$model->id ] , $options);      //$url
//                        }
                    ],
                    'contentOptions' => ['width' => "80px"],
                    'headerOptions' => ['width' => "80px"],
                ],
            ],
        ]); ?>
    </div>

    <div class="setting-content">

        <h2>友情链接</h2>

        <?= GridView::widget([
            'dataProvider' => $linkData,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],
                'id',
                'web_name',
                //'username',
                //'content',
                'web_link',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => "操作",
                    'template' => '{view} {update} {delete}',  //对应控制器中动作,中间应用空格间隔扩大显示时的样式
                    'buttons' => [
                        'view' => function($url,$model,$key)
                        {
                            $options = [
                                'title' => '查看',
                                'aria-label' => '查看',
                                //'data-confirm' => Yii::t('yii','通过评论审核？'),
                                //'data-method' => 'post',
                                'data-pjax' => '0',
                            ];
                            return Html::a('<span class="lnr lnr-eye"></span>',['setting/link-view', 'id'=>$model->id ] , $options);      //$url
                        },
                        'update' => function($url,$model,$key)
                        {
                            $options = [
                                'title' => '修改',
                                'aria-label' => '修改',
                                //'data-confirm' => Yii::t('yii','通过评论审核？'),
                                //'data-method' => 'post',
                                'data-pjax' => '0',
                            ];
                            return Html::a('<span class="lnr lnr-pencil"></span>',['setting/link-update', 'id'=>$model->id ] , $options);      //$url
                        },
                        'delete' => function($url,$model,$key)
                        {
                            $options = [
                                'title' => '删除',
                                'aria-label' => '删除',
                                'data-confirm' => Yii::t('yii','确定删除？删除后无法恢复'),    //按钮提示框
                                'data-pjax' => '0',
                            ];
                            return Html::a('<span class="lnr lnr-trash"></span>',['setting/link-delete', 'id'=>$model->id ] , $options);      //$url
                        }
                    ],
                    'contentOptions' => ['width' => "80px"],
                    'headerOptions' => ['width' => "80px"],
                ],
            ],
        ]); ?>

        <p>
            <?= Html::a('新增链接', ['link-create'], ['class' => 'btn btn-success']) ?>
        </p>

    </div>

    </div>

    <div style="display: inherit; overflow:hidden">

        <h2>轮播图管理</h2>

        <?= GridView::widget([
            'dataProvider' => $bannerData,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],
                'id',
                'img_text',
                'img_link',
                [
                    'label'=>'轮播图',
                    'format'=>'raw',
                    'value'=>function($model){
                        return Html::img('http://www.portalsite.com/'.$model->img_url,
                            [
                                'class' => 'banner-img',
                                'width' => '100%',
                                'alt' => $model->img_text,
                            ]
                        );
                    },
                    'headerOptions' => ['width' => '500px'],
                ],
                //按钮管理
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => "操作",
                    'template' => '{view} {update} {delete}',  //对应控制器中动作,中间应用空格间隔扩大显示时的样式
                    'buttons' => [
                        'view' => function($url,$model,$key)
                        {
                            $options = [
                                'title' => '查看',
                                'aria-label' => '查看',
                                //'data-confirm' => Yii::t('yii','通过评论审核？'),
                                //'data-method' => 'post',
                                'data-pjax' => '0',
                            ];
                            return Html::a('<span class="lnr lnr-eye"></span>',['setting/banner-view', 'id'=>$model->id ] , $options);      //$url
                        },
                        'update' => function($url,$model,$key)
                        {
                            $options = [
                                'title' => '修改',
                                'aria-label' => '修改',
                                //'data-confirm' => Yii::t('yii','通过评论审核？'),
                                //'data-method' => 'post',
                                'data-pjax' => '0',
                            ];
                            return Html::a('<span class="lnr lnr-pencil"></span>',['setting/banner-update', 'id'=>$model->id ] , $options);      //$url
                        },
                        'delete' => function($url,$model,$key)
                        {
                            $options = [
                                'title' => '删除',
                                'aria-label' => '删除',
                                'data-confirm' => Yii::t('yii','确定删除？删除后无法恢复'),    //按钮提示框
                                'data-pjax' => '0',
                            ];
                            return Html::a('<span class="lnr lnr-trash"></span>',['setting/banner-delete', 'id'=>$model->id ] , $options);      //$url
                        }
                    ],
                    'contentOptions' => ['width' => "80px"],
                    'headerOptions' => ['width' => "80px"],
                ],
            ],
        ]); ?>

        <p>
            <?= Html::a('新增轮播图', ['banner-create'], ['class' => 'btn btn-success']) ?>
        </p>

    </div>

</div>
