<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EstimateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estimate-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'doc_num') ?>

    <?= $form->field($model, 'summary') ?>

    <?= $form->field($model, 'amount') ?>

    <?= $form->field($model, 'issue_date') ?>

    <?php // echo $form->field($model, 'followup_date') ?>

    <?php // echo $form->field($model, 'status_id') ?>

    <?php // echo $form->field($model, 'substat_id') ?>

    <?php // echo $form->field($model, 'treatment_id') ?>

    <?php // echo $form->field($model, 'campaign_id') ?>

    <?php // echo $form->field($model, 'customer_id') ?>

    <?php // echo $form->field($model, 'address_id') ?>

    <?php // echo $form->field($model, 'employee_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
