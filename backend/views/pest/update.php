<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Pest */

$this->title = 'Update Pest: ' . $model->pest_id;
$this->params['breadcrumbs'][] = ['label' => 'Pests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pest_id, 'url' => ['view', 'id' => $model->pest_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pest-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
