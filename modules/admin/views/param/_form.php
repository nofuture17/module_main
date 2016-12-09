<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\Url;
use \app\components\widgets\form\SmartInput;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\Param */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="param-form">

    <?php
        $formConfig = [];

//        if (\Yii::$app->request->isAjax) {
//            $formConfig['action'] = Url::to(['/main/admin/param/update', 'id' => $model->id]);
//            $formConfig['options']['data-ajax-action'] = 'online-change';
//        }

        $form = ActiveForm::begin($formConfig);
    ?>

    <?php
        echo SmartInput::widget([
            'model'     => $model,
            'attribute' => 'active',
            'label'     => true,
            'form'      => $form,
        ]);
    ?>

    <?php
        echo SmartInput::widget([
            'model'     => $model,
            'attribute' => 'name',
            'label'     => true,
            'form'      => $form,
        ]);
    ?>

    <?php
        echo SmartInput::widget([
            'model'     => $model,
            'attribute' => 'value',
            'label'     => true,
            'form'      => $form,
        ]);
    ?>

    <?php
        echo SmartInput::widget([
            'model'     => $model,
            'attribute' => 'default',
            'label'     => true,
            'form'      => $form,
        ]);
    ?>

    <?php
        echo SmartInput::widget([
            'model'     => $model,
            'attribute' => 'param',
            'label'     => true,
            'form'      => $form,
        ]);
    ?>

    <?php
        echo SmartInput::widget([
            'model'     => $model,
            'attribute' => 'type',
            'label'     => true,
            'form'      => $form,
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
