<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Pest */

$this->title = 'Create Pest';
$this->params['breadcrumbs'][] = ['label' => 'Pests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pest-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
