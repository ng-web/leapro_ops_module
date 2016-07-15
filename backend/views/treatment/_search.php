<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TreatmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="treatment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'brand') ?>

    <?= $form->field($model, 'ingredient') ?>

    <?= $form->field($model, 'dilution') ?>

    <?php // echo $form->field($model, 'application') ?>

    <?php // echo $form->field($model, 'cost') ?>

    <?php // echo $form->field($model, 'description') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
