<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PmiReport */

$this->title = 'Create Pmi Report';
$this->params['breadcrumbs'][] = ['label' => 'Pmi Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pmi-report-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
