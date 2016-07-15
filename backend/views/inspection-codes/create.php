<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\InspectionCodes */

$this->title = 'Create Inspection Codes';
$this->params['breadcrumbs'][] = ['label' => 'Inspection Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspection-codes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
