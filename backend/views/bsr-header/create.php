<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\BsrHeader */

$this->title = 'Create Report';
$this->params['breadcrumbs'][] = ['label' => 'Bsr Headers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bsr-header-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsBsrActivity' => $modelsBsrActivity,
    ]) ?>

</div>
