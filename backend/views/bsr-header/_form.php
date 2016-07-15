<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use backend\models\Employee;
use backend\models\Equipment;
use backend\models\Job;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\BsrHeader */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bsr-header-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form', 'layout' => 'horizontal']); ?>

    <?= $form->field($model, 'bsr_docnum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bsr_approvedby')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bsr_verifiedby')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'job_id')->dropDownList(
        ArrayHelper::map(Job::find()->all(),'job_id','job_number'),
        ['prompt'=>'Select Job...' ]
    );?>
    
    <?= $form->field($model, 'employee_id')->dropDownList(
        ArrayHelper::map(Employee::find()->all(),'employee_id','employee_name'),
        ['prompt'=>'Select Technician...' ]
    );?>
    
    <?= $form->field($model, 'bsr_date', [
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
    
    <div class="form-group">
         <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-list-alt"></i> Activity Sheet</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsBsrActivity[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'equipment_id',
                    'bs_status',
                    //'bs_date',
                    'bs_qty',
                    'employee_id',
                    'bs_condition',
                    'bs_comments',
                    
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsBsrActivity as $i => $Activity): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Activity</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $Activity->isNewRecord) {
                                echo Html::activeHiddenInput($Activity, "[{$i}]bs_id");
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-4">
                                <?= $form->field($Activity, "[{$i}]equipment_id")->dropDownList(
                                                ArrayHelper::map(Equipment::find()->all(),'equipment_id','equipment_name'),
                                                ['prompt'=>'Bait Station' ]
                                );?>
                            </div>
                            <div class="col-sm-4">
                                <?php echo $form->field($Activity, "[{$i}]bs_status")->dropDownList(['0' => 'In-active', '1' => 'Active']); ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($Activity, "[{$i}]bs_qty")->dropDownList(['0' => 'none', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5']); ?>
                            </div>
                            <!--new row--> 
                            <div class="col-sm-4">
                                <?= $form->field($Activity, "[{$i}]weight")->textInput(['maxlength' => true]); ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($Activity, "[{$i}]number_seen")->textInput(['maxlength' => true]); ?>
                            </div>
                            
                        </div><!-- .row -->
                        <div class="row">
                           <div class="col-sm-4">
                                <?= $form->field($Activity, "[{$i}]employee_id")->dropDownList(
                                                ArrayHelper::map(Employee::find()->all(),'employee_id','employee_name'),
                                                ['prompt'=>'Select Technician...' ]
                                );?>
                            </div>
                            
                            <div class="col-sm-4">
                                <?php echo $form->field($Activity, "[{$i}]bs_condition")->dropDownList(['0' => 'good', '1' => 'Damaged', '2' => 'Mildew', '3' => 'Dirty', '4' => 'Other']); ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($Activity, "[{$i}]bs_comments")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
