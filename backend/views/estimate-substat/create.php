<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EstimateSubstat */

$this->title = 'Create Estimate Substat';
$this->params['breadcrumbs'][] = ['label' => 'Estimate Substats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estimate-substat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
