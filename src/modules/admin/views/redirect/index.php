<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel amd_php_dev\module_main\models\RedirectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="redirect-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить редирект', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'class' => 'app\components\widgets\grid\SetColumn',
                'attribute' => 'active',
                'setFilter' => true,
                'formAction' => [
                    'route' => '/main/admin/redirect/update',
                    'params' => ['id' => ':id']
                ],
            ],
            [
                'class' => 'app\components\widgets\grid\SetColumn',
                'attribute' => 'code',
                'setFilter' => true,
                'formAction' => [
                    'route' => '/main/admin/redirect/update',
                    'params' => ['id' => ':id']
                ],
            ],
            [
                'class' => 'app\components\widgets\grid\SetColumn',
                'attribute' => 'from',
                'formAction' => [
                    'route' => '/main/admin/redirect/update',
                    'params' => ['id' => ':id']
                ],
            ],
            [
                'class' => 'app\components\widgets\grid\SetColumn',
                'attribute' => 'to',
                'formAction' => [
                    'route' => '/main/admin/redirect/update',
                    'params' => ['id' => ':id']
                ],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
            ],
        ],
    ]); ?>

</div>
