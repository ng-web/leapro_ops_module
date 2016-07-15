<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\InspectionCodesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inspection Codes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspection-codes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inspection Codes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            [
                'attribute'=>'priority',
                'value'=>function ($model, $key, $index, $widget) {
                    return "<span class='badge' style='background-color: {$model->priority}'> </span>  <code>" . 
                        $model->priority . '</code>';
                },
                'filterType'=>GridView::FILTER_COLOR,
                'vAlign'=>'middle',
                'format'=>'raw',
                'width'=>'150px',
                'noWrap'=>true
            ],
            'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
