<?php

namespace frontend\components;

use Zend\Soap\Client;
use yii\web\IdentityInterface;
use frontend\models\soap\request\BaseRequest;

class SoapCalculatorService
{

    /**
     * @var Client
     */
    private $client;

    public function __construct(string $wsdl, ?IdentityInterface $identity)
    {
        $options = [];
        if ($identity) {
            $options['login'] = $identity->username;
            $options['password'] = $identity->getAuthKey();
        }
        $this->client = new Client($wsdl, $options);
    }

    /**
     * @param BaseRequest $request
     * @return mixed
     * @throws \ReflectionException
     */
    public function send(BaseRequest $request)
    {
        $method = (new \ReflectionClass($request))->getShortName();
        return @call_user_func_array([$this->client, $method],  $request->getSoapVariables());
    }
}