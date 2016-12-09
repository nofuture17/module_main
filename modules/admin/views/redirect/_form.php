<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\Redirect */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="redirect-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    echo \app\components\widgets\form\SmartInput::widget([
        'model'     => $model,
        'attribute' => 'code',
        'label'     => true,
        'form'      => $form,
    ]);
    ?>

    <?= $form->field($model, 'from')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'to')->textInput(['maxlength' => true]) ?>

    <?php
    echo \app\components\widgets\form\SmartInput::widget([
        'model'     => $model,
        'attribute' => 'active',
        'label'     => true,
        'form'      => $form,
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
