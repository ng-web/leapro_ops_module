<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\models\Address;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Area */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="area-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'address_id')->dropDownList(
        ArrayHelper::map(Address::find()->all(),'address_id','address_line1'),
        ['prompt'=>'Select Location...' ]
    );?>

    <?= $form->field($model, 'area_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area_description')->textarea(['rows' => 6]) ?>


<!--    echo maksyutin\duallistbox\Widget::widget([
        'model' => $model,
        'attribute' => 'area_name',
        'title' => 'города',
        'data' => $area,
        'data_id'=> 'id',
        'data_value'=> 'name',
        'lngOptions' => [
            'warning_info' => 'Вы уверены, что хотите выбрать такое количество элементов?
                               Возможно Ваш браузер может перестанет отвечать на запросы..',
            'search_placeholder' => 'Фильтр',
            'showing' => ' - показано',
            'available' => 'Имеющиеся',
            'selected' => 'Выбранные'
        ]
      ]); -->
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
