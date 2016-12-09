<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel amd_php_dev\module_main\models\MainMailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            'address',
            'page',
            'data',
            [
                'attribute'=>'active',
                'content'=>function($data){
                    return \amd_php_dev\module_main\models\MainMail::getActiveArray()[$data->active];
                }
            ],
                        // 'active',
            // 'priority',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{delete}',
            ],
        ],
    ]); ?>
    