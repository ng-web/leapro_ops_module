<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\models\Customer;
use backend\models\Job;
use backend\models\Employee;
use backend\models\Fleet;
use backend\models\Profile;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'customer_id')->dropDownList(
        ArrayHelper::map(Customer::find()->all(),'customer_id','customer_name'),
        ['prompt'=>'Select Customer...' ]
    );?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'start_date')->textInput() ?>

    <?= $form->field($model, 'start_time')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>

    <?= $form->field($model, 'end_time')->textInput() ?>

    <?= $form->field($model, 'recurring')->checkbox(); ?>

    <?= $form->field($model, 'period')->dropDownList(['1' => 'Daily', '2' => 'Bi-Weekly', '3' => 'Monthly', '4' => 'One-off']); ?>

    <?= $form->field($model, 'type')->dropDownList(['0' => 'Estimate', '1' => 'Inspection', '2' => 'Work-Order']); ?>

    <?= $form->field($model, 'job_id')->dropDownList(
        ArrayHelper::map(Job::find()->all(),'job_id','job_number'),
        ['prompt'=>'Select Job Order...' ]
    );?>

    <?= $form->field($model, 'employee_id')->dropDownList(
        ArrayHelper::map(Employee::find()->all(),'employee_id','employee_name'),
        ['prompt'=>'Assign Technician...' ]
    );?>

    <?= $form->field($model, 'fleet_id')->dropDownList(
        ArrayHelper::map(Fleet::find()->all(),'fleet_id','license'),
        ['prompt'=>'Select Vehicle...' ]
    );?>

    <?= $form->field($model, 'profile_id')->dropDownList(
        ArrayHelper::map(Profile::find()->all(),'profile_id','profile_medium'),
        ['prompt'=>'Select Medium...' ]
    );?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
