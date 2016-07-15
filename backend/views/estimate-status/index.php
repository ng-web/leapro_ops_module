<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EstimateStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estimate Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estimate-status-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Estimate Status', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description:ntext',
            'color',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
