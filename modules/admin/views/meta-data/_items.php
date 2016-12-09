<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\main\models\MetaDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

        <?= \amd_php_dev\yii2_components\widgets\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            [
                'class' => '\amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'url',
                'setFilter' => true,
                'formAction' => [
                    'route' => 'update',
                    'params' => ['id' => ':id']
                ],
            ],
            [
                'class' => '\amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'metaTitle',
                'setFilter' => true,
                'formAction' => [
                    'route' => 'update',
                    'params' => ['id' => ':id']
                ],
            ],
            [
                'class' => '\amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'active',
                'setFilter' => true,
                'formAction' => [
                    'route' => 'update',
                    'params' => ['id' => ':id']
                ],
            ],
            // 'active',
            // 'priority',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{link}{update}{delete}',
                'buttons' => [
                    'link' => function ($url,$model,$key) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-eye-open"></span>',
                            $model->url
                        );
                    },
                ],
            ],
        ],
    ]); ?>
    