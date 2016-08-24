<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Area */

$this->title = $model->area_id;
$this->params['breadcrumbs'][] = ['label' => 'Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->area_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->area_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'area_id',
            'address.address_line1',
            'area_name',
            'area_description:ntext',
        ],
    ]) ?>
    
     <h1>Locations</h1>
    <hr/>
    <?php
 //var_dump($areaStations); die();
        foreach ($areaStations as $stations){
            echo '<div class="well"> '. $stations['equipment_name']. '<br/>' ;
                    //. $address->address_line1. '<br/>' 
                    //. $address->address_province. '<br/>'. '</div>';
        }
    ?>

</div>
