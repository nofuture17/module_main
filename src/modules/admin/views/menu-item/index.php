<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel amd_php_dev\module_main\models\MenuItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="menu-item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить элемент меню', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'class' => '\app\components\widgets\grid\SetColumn',
                'attribute' => 'active',
                'setFilter' => true,
                'formAction' => [
                    'route' => '/main/admin/menu-item/update',
                    'params' => ['id' => ':id'],
                ],
            ],
            [
                'class' => '\app\components\widgets\grid\SetColumn',
                'attribute' => 'name',
                'formAction' => [
                    'route' => '/main/admin/menu-item/update',
                    'params' => ['id' => ':id'],
                ],
            ],
            [
                'class' => '\app\components\widgets\grid\SetColumn',
                'attribute' => 'id_menu',
                'setFilter' => true,
                'formAction' => [
                    'route' => '/main/admin/menu-item/update',
                    'params' => ['id' => ':id'],
                ],
            ],
            [
                'class' => '\app\components\widgets\grid\SetColumn',
                'attribute' => 'id_parent',
                'setFilter' => true,
                'formAction' => [
                    'route' => '/main/admin/menu-item/update',
                    'params' => ['id' => ':id'],
                ],
            ],
            [
                'class' => '\app\components\widgets\grid\SetColumn',
                'attribute' => 'url',
                'formAction' => [
                    'route' => '/main/admin/menu-item/update',
                    'params' => ['id' => ':id'],
                ],
            ],
            // 'author',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
            ],
        ],
    ]); ?>

</div>
