<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\models\Customer;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Address */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="address-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
    
    <?= $form->field($model, 'customer_id')->dropDownList(
        ArrayHelper::map(Customer::find()->all(),'customer_id','customer_company'),
        ['prompt'=>'Select Location...' ]
    );?>

    <?= $form->field($model, 'address_line1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_line2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_province')->dropDownList(['0' => 'Kingston', '1' => 'St. Andrew', 
        '2' => 'Portland', '3' => 'St. Thomas', '4' => 'St. Catherine', '5' => 'St. Mary', '6' => 'St. Ann', 
        '7' => 'Manchester', '8' => 'Clarendon', '9' => 'Hanover', '10' => 'Westmoreland', '11' => 'St. James',
        '12' => 'Trelawny', '13' => 'St. Elizabeth']) ?>

    <?= $form->field($model, 'address_zip')->textInput() ?>

    <?= $form->field($model, 'address_type')->textInput() ?>

    <?= $form->field($model, 'address_status')->textInput() ?>

    <?= $form->field($model, 'address_details')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
