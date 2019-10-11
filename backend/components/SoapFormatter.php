<?php

namespace backend\components;

use yii\web\Response;
use yii\web\ResponseFormatterInterface;

class SoapFormatter implements ResponseFormatterInterface
{
    public const FORMAT_SOAP = 'soap';

    /**
     * @param Response $response
     */
    public function format($response): void
    {
        $response->getHeaders()->set('Content-Type', 'application/xml');
        $response->content = $response->data;
    }
}
