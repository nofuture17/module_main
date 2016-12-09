<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model amd_php_dev\module_main\models\MainContact */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="main-contact-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype'=>'multipart/form-data']
    ]); ?>

    <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
        'model'     => $model,
        'attribute' => 'active',
        'label'     => true,
        'form'      => $form,
    ]); ?>

    <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
        'model'     => $model,
        'attribute' => 'priority',
        'label'     => true,
        'form'      => $form,
    ]); ?>

    <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
        'model'     => $model,
        'attribute' => 'name',
        'label'     => true,
        'form'      => $form,
    ]); ?>

    <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
        'model'     => $model,
        'attribute' => 'code',
        'label'     => true,
        'form'      => $form,
    ]); ?>

    <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
        'model'     => $model,
        'attribute' => 'value',
        'label'     => true,
        'form'      => $form,
    ]); ?>

    <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
        'model'     => $model,
        'attribute' => 'description',
        'label'     => true,
        'form'      => $form,
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
