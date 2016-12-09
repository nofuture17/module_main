<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel amd_php_dev\module_main\models\TagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="tag-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить метку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'created_at:date',
            //'updated_at',
            [
                'class' => 'amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'priority',
                'setFilter' => true,
                'formAction' => [
                    'route' => '/main/admin/tag/update',
                    'params' => ['id' => ':id']
                ],
            ],
            [
                'class' => 'amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'active',
                'setFilter' => true,
                'formAction' => [
                    'route' => '/main/admin/tag/update',
                    'params' => ['id' => ':id']
                ],
            ],
            // 'author',
            [
                'class' => 'amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'name',
                'setFilter' => true,
                'formAction' => [
                    'route' => '/main/admin/tag/update',
                    'params' => ['id' => ':id']
                ],
            ],
            [
                'class' => 'amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'url',
                'setFilter' => true,
                'formAction' => [
                    'route' => '/main/admin/tag/update',
                    'params' => ['id' => ':id']
                ],
            ],
            // 'meta_title',
            // 'meta_keywords',
            // 'meta_description',
            // 'text_small:ntext',
            // 'text_full:ntext',
            // 'image_small',
            // 'image_full',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
            ],
        ],
    ]); ?>
</div>
