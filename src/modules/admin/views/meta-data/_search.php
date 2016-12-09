<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model amd_php_dev\module_main\models\MetaDataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meta-data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'url') ?>

    <?= $form->field($model, 'h1') ?>

    <?= $form->field($model, 'metaDescription') ?>

    <?= $form->field($model, 'metaTitle') ?>

    <?= $form->field($model, 'id') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'priority') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
