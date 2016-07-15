<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\AreaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Areas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Add Area', ['value'=>Url::to('index.php?r=area/create'),'class' => 'btn btn-success', 'id'=>'modalButton']) ?>
        <?= Html::a('Add Inspection Activity', ['bsr-header/create'], ['class' => 'btn btn-warning']) ?>
        <!--Html::button('Add Inspection Activity', ['value' => Url::to('index.php?r=pmi-activity/create'), 'class' => 'btn btn-warning'])-->
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'area_id',
            'address.address_line1',
            'area_name',
            'area_description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
    <?php
        Modal::begin([
          'header'=>'<h4>Areas</h4>',
          'id'=>'modal',
          'size'=>'modal-lg',
          ]);

        echo "<div id='modalContent'></div>";

        Modal::end();
      ?>
    

</div>

<?php
$script = "$(function() {
    
        $('#modalButton').click(function(){
        $('#modal').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
        });
    
    
})";

$this->registerJs($script);

?>
