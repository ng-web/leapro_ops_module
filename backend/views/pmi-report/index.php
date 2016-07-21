<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;

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

            //'pmi_id',
            'pmi_docnum',
            'approved_by',
            'verified_by',
            //'pmi_date',
            [
                        'attribute' => 'pmi_date',
                        'value' => 'pmi_date',
                        'format' => 'raw',
                        'filter' => DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'pmi_date',
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-m-d'
                            ]
                        ])
                    ],
            // 'address_id',
            // 'job_id',
            // 'employee_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
