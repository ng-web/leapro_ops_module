<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        [
            'label' => 'Client Center',
            'items' => [
                 ['label' => 'New Customer ', 'url' => 'http://localhost/leaprocrm/backend/web/index.php?r=customer'],
                 //'<li class="divider"></li>',
                 //'<li class="dropdown-header">Dropdown Header</li>',
                 ['label' => 'Address', 'url' => 'http://localhost/leaprocrm/backend/web/index.php?r=address'],
                ['label' => 'Address', 'url' => 'http://localhost/leaprocrm/backend/web/index.php?r=area'],
            ],
        ],
        [
            'label' => 'Equipment',
            'items' => [
                 ['label' => 'Add Equipment ', 'url' => 'http://localhost/leaprocrm/backend/web/index.php?r=equipment'],
                 //'<li class="divider"></li>',
                 //'<li class="dropdown-header">Dropdown Header</li>',
                 ['label' => 'Deploy Equipment', 'url' => 'http://localhost/leaprocrm/backend/web/index.php?r=deploy'],
                //['label' => 'Address', 'url' => 'http://localhost/leaprocrm/backend/web/index.php?r=deploy'],
            ],
        ],
        [
            'label' => 'Reports',
            'items' => [
                 ['label' => 'Bait Station Report ', 'url' => 'http://localhost/leaprocrm/backend/web/index.php?r=bsr-header'],
                 ['label' => 'Bait Station Activity ', 'url' => 'http://localhost/leaprocrm/backend/web/index.php?r=bsr-activity'],
                 //'<li class="divider"></li>',
                 //'<li class="dropdown-header">Dropdown Header</li>',
                 ['label' => 'Pest Management Inspection', 'url' => 'http://localhost/leaprocrm/backend/web/index.php?r=pmi-report'],
            ],
        ],
        //['label' => 'Bait Station Report', 'url' => ['/bsr-header/index']],
        //['label' => 'PMI', 'url' => ['/pmi-activity/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
