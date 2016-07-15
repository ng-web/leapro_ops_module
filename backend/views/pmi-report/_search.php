<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PmiReportSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pmi-report-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pmi_id') ?>

    <?= $form->field($model, 'pmi_docnum') ?>

    <?= $form->field($model, 'approved_by') ?>

    <?= $form->field($model, 'verified_by') ?>

    <?= $form->field($model, 'pmi_date') ?>

    <?php // echo $form->field($model, 'address_id') ?>

    <?php // echo $form->field($model, 'job_id') ?>

    <?php // echo $form->field($model, 'employee_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
