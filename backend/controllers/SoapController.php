<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\User;
use Zend\Soap\AutoDiscover;
use yii\filters\VerbFilter;
use Zend\Soap\Server as SoapServer;
use yii\filters\auth\HttpBasicAuth;
use backend\components\SoapFormatter;
use backend\models\soap\Calculator\Calculator;

class SoapController extends Controller
{
    public $enableCsrfValidation = false;

    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'wsdl' => ['GET'],
                    'server' => ['POST'],
                ],
            ],
            'basicAuth' => [
                'class' => HttpBasicAuth::class,
                'auth' => function ($username, $authKey) {
                    if (($user = User::findOne(['username' => $username])) && $user->validateAuthKey($authKey)) {
                        return $user;
                    }
                    return null;
                },
            ],
        ];
    }

    public function beforeAction($action): bool
    {
        Yii::$app->response->format = SoapFormatter::FORMAT_SOAP;
        return parent::beforeAction($action);
    }

    public function actionWsdl()
    {
        $wsdlFile = Yii::getAlias('@backend/web/calculate.wsdl');
        return Yii::$app->cache->getOrSet(
            'wsdl',
            function () use ($wsdlFile) {
                $wsdl = new AutoDiscover();
                $wsdl->setUri('http://backend-nginx/soap/server');
                $this->populateServer($wsdl);

                $wsdl->dump($wsdlFile);
                return $wsdl->toXml();
            },
            60,
        );
    }

    public function actionServer()
    {
        $server = new SoapServer(
            Yii::getAlias('@backend/web/calculate.wsdl'),
        );

        $this->populateServer($server);
        return $server->handle();
    }

    private function populateServer($server)
    {
        /** @var $server SoapServer */
        $server->setClass(Calculator::class);
    }
}