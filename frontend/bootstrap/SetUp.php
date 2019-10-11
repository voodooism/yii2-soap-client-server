<?php

namespace frontend\bootstrap;

use yii\base\BootstrapInterface;
use frontend\components\SoapCalculatorService;

class SetUp implements BootstrapInterface
{

    public function bootstrap($app)
    {
        $container = \Yii::$container;

        $container->setSingleton(SoapCalculatorService::class, function () use ($app) {
            return new SoapCalculatorService('http://backend-nginx/soap/wsdl', $app->user->identity);
        });
    }
}