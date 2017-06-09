<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AdvertisingCampaign */

$this->title = 'Update Advertising Campaign: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Advertising Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="advertising-campaign-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
