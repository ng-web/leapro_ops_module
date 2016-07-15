<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AddressSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="address-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'address_id') ?>

    <?= $form->field($model, 'address_line1') ?>

    <?= $form->field($model, 'address_line2') ?>

    <?= $form->field($model, 'address_province') ?>

    <?= $form->field($model, 'address_zip') ?>

    <?php // echo $form->field($model, 'address_type') ?>

    <?php // echo $form->field($model, 'address_status') ?>

    <?php // echo $form->field($model, 'address_details') ?>

    <?php // echo $form->field($model, 'customer_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
