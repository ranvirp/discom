<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset_1 extends AssetBundle
{
    public $sourcePath = '@vendor';
    //public $baseUrl = '@vendor';
    public $css = [
        'bower/font-awesome/css/font-awesome.css',
		'bower/sbadmin2/metisMenu/dist/metisMenu.css'
    ];
    public $js = [
		'bower/sbadmin2/metisMenu/dist/metisMenu.js'
		
		//'https://www.google.com/jsapi',
		//'js/googletransliterate.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
		
    ];
}
