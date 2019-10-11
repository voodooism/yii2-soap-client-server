<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class CalculatorAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        'js/calculator.js'
    ];

    public $css = [
        'css/calculator.css'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}