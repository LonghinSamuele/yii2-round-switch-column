<?php

namespace samuelelonghin\grid\toggle\assets;

use yii\web\AssetBundle;

/**
 * Round switch asset bundle.
 */
class RoundSwitchThemeAsset extends AssetBundle
{
    public $sourcePath = '@samuelelonghin/grid/toggle/web';
    public $css = [
        'css/round-switch.css',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
