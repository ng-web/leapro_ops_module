<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        //'css/fullcalendar.print.css',
        'css/fullcalendar.min.css',
        '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css',
    ];
    public $js = [
        'js/main.js',
        'js/fullcalendar.min.js',
        'js/moment.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
