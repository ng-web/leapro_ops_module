<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Events', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
            'events'=> $events,
            'id' => 'calendar',
        ));
      ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'event_id',
            'event_title',
            'event_description:ntext',
            'event_start',
            'event_end',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    
<div id='calendar'></div>

<?php
$script = <<< JS

$(document).ready(function() {

    alert();

    $('#calendar').fullCalendar({
        // put your options and callbacks here
    })

});
        
JS;
$this->registerJS($script);
?>
</div>
