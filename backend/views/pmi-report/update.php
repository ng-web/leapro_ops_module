<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PmiReport */

$this->title = 'Update Pmi Report: ' . $model->pmi_id;
$this->params['breadcrumbs'][] = ['label' => 'Pmi Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pmi_id, 'url' => ['view', 'id' => $model->pmi_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pmi-report-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
