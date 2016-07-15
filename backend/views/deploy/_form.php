<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Address;
use backend\models\Customer;
use backend\models\Area;
use backend\models\Equipment;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Deploy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="deploy-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'customer_id')->dropDownList(
        ArrayHelper::map(Customer::find()->all(),'customer_id','customer_company'),
        [
            'onchange'=> '
                $.post("index.php?r=address/lists&id='.'"+$(this).val(), function(data){
                    $("select#deploy-address_id").html(data);
                });',   
            'prompt'=>'Select Customer ...' ]
    );?>

    <?= $form->field($model, 'address_id')->dropDownList(
        ArrayHelper::map(Address::find()->all(),'address_id','address_line1'),
        [
            'onchange'=> '
                $.post("index.php?r=area/lists&id='.'"+$(this).val(), function(data){
                    $("select#deploy-area_id").html(data);
                });',   
            'prompt'=>'Select Location ...' ]
    );?>

    <?= $form->field($model, 'area_id')->dropDownList(
            ArrayHelper::map(Area::find()->all(),'area_id','area_name'),
            ['prompt'=>'Select Area ...' ]
    );?>

    <?= $form->field($model, 'equipment_id')->dropDownList(
            ArrayHelper::map(Equipment::find()->all(),'equipment_id','equipment_name'),
            ['prompt'=>'Select Bait Station ...' ]
    );?>

    <?= $form->field($model, 'deploy_notes')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
