<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel amd_php_dev\module_main\models\ParamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="param-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить параметр', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            [
                'class' => 'amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'active',
                'setFilter' => true,
                'formAction' => [
                    'route' => '/main/admin/param/update',
                    'params' => ['id' => ':id']
                ],
            ],
            'param',
            [
                'class' => 'amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'value',
                'formAction' => [
                    'route' => '/main/admin/param/update',
                    'params' => ['id' => ':id']
                ],
            ],
//            'default:ntext',
// 'type',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
//                'buttons' => [
//                    'update' => function ($url, $model, $key) {
//                        $options = array_merge([
//                            'title' => Yii::t('yii', 'Update'),
//                            'aria-label' => Yii::t('yii', 'Update'),
//                            'data-pjax' => '0',
//                        ], ['data-ajax-action' => 'online-form']);
//                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, $options);
//                    }
//                ],
            ],
        ],
    ]); ?>

</div>
