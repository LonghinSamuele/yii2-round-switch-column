<?php

namespace samuelelonghin\grid\toggle\assets;

use yii\web\AssetBundle;

/**
 * Round switch asset bundle.
 */
class RoundSwitchAsset extends AssetBundle
{
    public $sourcePath = '@samuelelonghin/grid/toggle/web';
    public $js = [
        'js/round-switch.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
