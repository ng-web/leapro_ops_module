<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PmiReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pmi Reports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pmi-report-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pmi Report', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pmi_id',
            'pmi_docnum',
            'approved_by',
            'verified_by',
            'pmi_date',
            // 'address_id',
            // 'job_id',
            // 'employee_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
