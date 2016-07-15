<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EstimateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estimates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estimate-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Estimate', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'doc_num',
            'summary:ntext',
            'amount',
            'issue_date',
            // 'followup_date',
            // 'status_id',
            // 'substat_id',
            // 'treatment_id',
            // 'campaign_id',
            // 'customer_id',
            // 'address_id',
            // 'employee_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
