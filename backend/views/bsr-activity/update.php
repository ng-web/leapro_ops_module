<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BsrActivity */

$this->title = 'Update Bsr Activity: ' . $model->bs_id;
$this->params['breadcrumbs'][] = ['label' => 'Bsr Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bs_id, 'url' => ['view', 'id' => $model->bs_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bsr-activity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
