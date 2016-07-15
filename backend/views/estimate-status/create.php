<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EstimateStatus */

$this->title = 'Create Estimate Status';
$this->params['breadcrumbs'][] = ['label' => 'Estimate Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estimate-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
