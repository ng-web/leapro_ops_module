<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use backend\models\EstimateStatus;
use backend\models\EstimateSubstat;
use backend\models\Treatment;
use backend\models\AdvertisingCampaign;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Estimate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estimate-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="col-sm-4">
    <?= $form->field($model, 'doc_num')->textInput(['maxlength' => true]) ?>
    </div>
     <div class="col-sm-4">
    <?= $form->field($model, 'summary')->textarea(['rows' => 6]) ?>
     </div>
    <?= $form->field($model, 'amount', ['addon' => ['prepend' => ['content' => '$', 'options'=>['class'=>'alert-success']],
                                        'append' => ['content'=>'.00']],])?>

    <?= $form->field($model, 'issue_date')->widget(
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

    <?= $form->field($model, 'followup_date')->widget(
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
<!--Html::button('Add', ['value' => Url::to('index.php?r=estimate-status/create')-->
    <?= $form->field($model, 'status_id', [
//    'addon' => [
//        'append' => [
//            'content' => \yii\bootstrap\ButtonDropdown::widget([
//                'label' => 'Action',
//                'dropdown' => [
//                    'items' => [
//                        ['label' => 'Add Status', 'url' => 'index.php?r=estimate-status/create'],
//                        //['label' => 'Something else', 'url' => '#'],
//                        //'<li class="divider"></li>',
//                        //['label' => 'Separated link', 'url' => '#'],
//                    ],
//                ],
//                'options' => ['class'=>'btn-default']
//            ]),
//            'asButton' => true
//        ]
//    ]
        'addon' => [
        'append' => [
            'content' => Html::button('Add', ['value'=>Url::to('index.php?r=estimate-status/create'),'class'=>'btn btn-primary']), 
            'asButton' => true
        ]
    ]
])->dropDownList(
        ArrayHelper::map(EstimateStatus::find()->all(),'id','name'),
        ['prompt'=>'Select Status...' ]
    );?>

    <?= $form->field($model, 'substat_id')->dropDownList(
        ArrayHelper::map(EstimateSubstat::find()->all(),'id','name'),
        ['prompt'=>'Select Sub-status...' ]
    );?>

    <?= $form->field($model, 'treatment_id')->dropDownList(
        ArrayHelper::map(Treatment::find()->all(),'id','name'),
        ['prompt'=>'Select Treatment...' ]
    );?>

    <?= $form->field($model, 'campaign_id')->dropDownList(
        ArrayHelper::map(AdvertisingCampaign::find()->all(),'id','name'),
        ['prompt'=>'Select Campaign...' ]
    );?>

    <?= $form->field($model, 'customer_id')->dropDownList(
        ArrayHelper::map(Treatment::find()->all(),'customer_id','customer_name'),
        ['prompt'=>'Select Customer...' ]
    );?>

    <?= $form->field($model, 'address_id')->dropDownList(
        ArrayHelper::map(Treatment::find()->all(),'address_id','address_line1'),
        ['prompt'=>'Select Location...' ]
    );?>

    <?= $form->field($model, 'employee_id')->dropDownList(
        ArrayHelper::map(Treatment::find()->all(),'employee_id','employee_name'),
        ['prompt'=>'Select Employee...' ]
    );?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
    yii\bootstrap\Modal::begin([
        'headerOptions' => ['id' => 'modalHeader'],
        'id' => 'modal',
        'size' => 'modal-lg',
        //keeps from closing modal with esc key or by clicking out of the modal.
        // user must click cancel or X to close
        'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
    ]);
    echo "<div id='modalContent'></div>";
    yii\bootstrap\Modal::end();
?>


<?php
$script = "$(function() {
    
    
    
})";

//$this->registerJs($script);

?>
