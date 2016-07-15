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
class SmartAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
		'//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.1/css/font-awesome.css',
		'css/smartadmin-production-plugins.min.css',
		'css/smartadmin-production.min.css',
		'css/smartadmin-skins.min.css',
    ];
    public $js = [
        'js/main.js',
		'js/app.config.js',
		'js/jarvis.widget.min.js',
		//'js/app.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
