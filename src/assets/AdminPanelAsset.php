<?php

namespace devskyfly\yiiModuleAdminPanel\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AdminPanelAsset extends AssetBundle
{
    public $sourcePath = __DIR__.'/admin-panel/';

    public $css = [
        'css/style.css',
    ];

    public $js = [
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
