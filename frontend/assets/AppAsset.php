<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

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
    ];
    public $js = [
        'http://maps.google.com/maps/api/js?sensor=false',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'nonzod\foundation\FoundationAsset',
        'nonzod\foundation\FoundationAdditionalAsset',
        'nonzod\foundation\ActiveFormAsset',
        'nonzod\foundation\FoundationIconAsset',
    ];
}
