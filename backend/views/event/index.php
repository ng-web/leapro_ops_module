<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
      <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
            'events'=> $events,
        ));
      ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description:ntext',
            'start_date',
            'start_time',
            // 'end_date',
            // 'end_time',
            // 'recurring',
            // 'period',
            // 'type',
            // 'job_id',
            // 'employee_id',
            // 'fleet_id',
            // 'profile_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
