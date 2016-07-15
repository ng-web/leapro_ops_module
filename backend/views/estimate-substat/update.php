<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EstimateSubstat */

$this->title = 'Update Estimate Substat: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Estimate Substats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estimate-substat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
