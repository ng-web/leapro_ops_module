<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;
use backend\models\Job;
use backend\models\Employee;
use backend\models\Address;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\PmiReport */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pmi-report-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'pmi_docnum')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'address_id')->dropDownList(
        ArrayHelper::map(Address::find()->all(),'address_id','address_line1'),
        ['prompt'=>'Select Location...' ]
    );?>

    <?= $form->field($model, 'approved_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'verified_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pmi_date', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-4',
    ]])->widget(
        DatePicker::className(), [
            // inline too, not bad
             'inline' => false, 
             // modify template for custom rendering
            //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-d'
            ]
    ]);?>

    <?= $form->field($model, 'job_id')->dropDownList(
        ArrayHelper::map(Job::find()->all(),'job_id','job_number'),
        ['prompt'=>'Select Job...' ]
    );?>
    
    <?= $form->field($model, 'employee_id')->dropDownList(
        ArrayHelper::map(Employee::find()->all(),'employee_id','employee_name'),
        ['prompt'=>'Select Technician...' ]
    );?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
