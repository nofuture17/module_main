<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model amd_php_dev\module_main\models\Param */

?>
<div class="param-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
