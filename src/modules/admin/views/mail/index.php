<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel amd_php_dev\module_main\models\MainMailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="main-mail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>-->
<!--        --><?//= Html::a('Create Main Mail', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->
    <?php echo $this->render('_items', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]); ?>
</div>
