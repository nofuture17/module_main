<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model amd_php_dev\module_main\models\GalleryPage */

?>
<div class="gallery-page-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'active',
            'priority',
            'created_at',
            'updated_at',
            'author',
            'name',
            'name_small',
            'url:url',
            'meta_title',
            'meta_keywords',
            'meta_description',
            'text_small:ntext',
            'text_full:ntext',
            'links:ntext',
            'snipets:ntext',
            'image_small',
            'image_full',
        ],
    ]) ?>

</div>
