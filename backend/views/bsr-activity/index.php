<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){
                  if($model->bs_status == 0){
                      return ['class' => 'success'];
                  }else{
                      return ['class' => 'danger'];
                  }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'bs_id',
            //'bs_status',
            'bs_qty',
            'weight',
            'number_seen',
            // 'employee_id',
            // 'bs_condition',
            // 'bs_comments:ntext',
            // 'bsr_id',
            'equipment_id',
            // 'bs_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
 
