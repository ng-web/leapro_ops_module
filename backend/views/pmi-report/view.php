<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PmiReport */

$this->title = $model->pmi_id;
$this->params['breadcrumbs'][] = ['label' => 'Pmi Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pmi-report-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pmi_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pmi_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pmi_id',
            'pmi_docnum',
            'approved_by',
            'verified_by',
            'pmi_date',
            'address_id',
            'job_id',
            'employee_id',
        ],
    ]) ?>

</div>
