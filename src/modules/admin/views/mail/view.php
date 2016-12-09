<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model amd_php_dev\module_main\models\MainMail */

?>
<div class="main-mail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
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
            'name',
            'address',
            'page',
            'data:ntext',
            [
                'label'  => $model->getAttributeLabel('active'),
                'value'  => \amd_php_dev\module_main\models\MainMail::getActiveArray()[$model->active],
            ],
        ],
    ]) ?>

</div>
