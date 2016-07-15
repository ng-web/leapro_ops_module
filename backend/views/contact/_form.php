<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\models\Address;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Contact */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
    
    <?= $form->field($model, 'address_id')->dropDownList(
        ArrayHelper::map(Address::find()->all(),'address_id','address_name'),
        ['prompt'=>'Select Location...' ]
    );?>

    <?= $form->field($model, 'contact_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_cell')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
