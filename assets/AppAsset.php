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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/my-css.css',
        '/css/tablesorter/jquery.dataTables.css',
    ];
    public $js = [
        'js/my-js/my-js.js',
//        'js/jquery.easing.min.js',
        'js/left_menu.js',
        'js/jquery.table2excel.js',
        'js/table-edits.js',
        'js/tablesorter/jquery.dataTables.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
