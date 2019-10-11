<?php


namespace frontend\models\soap\request;


use yii\base\Model;

abstract class BaseRequest extends Model
{
    abstract public function getSoapVariables(): array;
}