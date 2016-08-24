<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BsrActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bsr Activities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bsr-activity-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bsr Activity', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model) {
            if ($model->bs_status == 0) {
                return ['class' => 'success'];
            } else {
                return ['class' => 'danger'];
            }
        },
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    //'bs_id',
                    //'bs_status',
                    [
                        'attribute' => 'bsr_id',
                        'value' => 'bsrHeader.bsr_docnum',
                    ],
                    [
                        'attribute' => 'bs_date',
                        'value' => 'bsrHeader.bsr_date',
                        'format' => 'raw',
                        'filter' => DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'bs_date',
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd'
                            ]
                        ])
                    ],
                    'bs_qty',
                    'weight',
                    'number_seen',
                    // 'employee_id',
                    // 'bs_condition',
                    // 'bs_comments:ntext',
                    // 'bsr_id',
                    //'equipment_id',
                    // 'bs_date',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            
            foreach ($stationsByDocnum as $stationByDocnum){
            echo '<div class="well"> '. $stationByDocnum['equipment_id'] . '<br/>';
                   // . $address->address_line1. '<br/>' 
                   // . $address->address_province. '<br/>'. '</div>';
            }
            
            
    

