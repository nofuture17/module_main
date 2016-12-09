<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel amd_php_dev\module_main\models\MainContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'class' => '\amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'active',
                'setFilter' => true,
                'formAction' => [
                    'route' => 'update',
                    'params' => ['id' => ':id']
                ],
            ],
            [
                'class' => '\amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'name',
                'setFilter' => true,
                'formAction' => [
                    'route' => 'update',
                    'params' => ['id' => ':id']
                ],
            ],
            [
                'class' => '\amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'value',
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
                'template' => '{update}{delete}',
            ],
        ],
    ]); ?>
    