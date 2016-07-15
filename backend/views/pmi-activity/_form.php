<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\models\Pest;
use backend\models\Area;
use backend\models\PmiReport;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\PmiActivity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pmi-activity-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
    
    <?= $form->field($model, 'pmi_id')->dropDownList(
        ArrayHelper::map(PmiReport::find()->all(),'pmi_id','pmi_docnum'),
        ['prompt'=>'Select Report #...' ]
    );?>

    <?= $form->field($model, 'pest_id')->dropDownList(
        ArrayHelper::map(Pest::find()->all(),'pest_id','pest_name'),
        ['prompt'=>'Select Pest...' ]
    );?>
    

    <?= $form->field($model, 'activity_type')->dropDownList(['0' => 'Sightings', '1' => 'Droppings', '2' => 'Faecal Matter', '3' => 'Infested/Damaged Goods', '4' => 'Traps']); ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'action')->textInput() ?>

    <?= $form->field($model, 'area_id')->dropDownList(
        ArrayHelper::map(Area::find()->all(),'area_id','area_name'),
        ['prompt'=>'Select Area...' ]
    );?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
