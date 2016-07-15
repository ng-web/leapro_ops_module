<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PmiActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pmi Activities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pmi-activity-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pmi Activity', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){
                  if($model->activity_type == 0){
                      return ['class' => 'success'];
                  }else{
                      return ['class' => 'danger'];
                  }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'pmi_id',
                'value' => 'pmi.pmi_docnum',
            ],
            //'pest_id',
            //'activity_type',
            'count',
            // 'action',
            [
                'attribute' => 'area_id',
                'value' => 'area.area_name',
            ],
            'comments:ntext',
            // 'pmi_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
