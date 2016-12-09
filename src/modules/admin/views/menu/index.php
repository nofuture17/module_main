<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel amd_php_dev\module_main\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить меню', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'class' => '\amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'active',
                'setFilter' => true,
                'formAction' => [
                    'route' => '/main/admin/menu/update',
                    'params' => ['id' => ':id'],
                ],
            ],
            [
                'class' => '\amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'section',
                'formAction' => [
                    'route' => '/main/admin/menu/update',
                    'params' => ['id' => ':id'],
                ],
            ],
            [
                'class' => '\amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'name',
                'formAction' => [
                    'route' => '/main/admin/menu/update',
                    'params' => ['id' => ':id'],
                ],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
            ],
        ],
    ]); ?>

</div>
