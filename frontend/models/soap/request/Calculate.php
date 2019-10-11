<?php


namespace frontend\models\soap\request;


class Calculate extends BaseRequest
{
    public $city;
    public $name;
    public $date;
    public $customParam1;
    public $customParam2;
    public $customParam3;

    public function rules(): array
    {
        return [
            ['date', 'date', 'format' => 'php:Y-m-d'],
            ['date', 'required'],
            [['city', 'name', 'customParam1', 'customParam2', 'customParam3'], 'string', 'max' => 50]
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'city' => 'Город',
            'name' => 'Название',
            'date' => 'Дата',
            'customParam1' => 'Дополнительный параметр 1',
            'customParam2' => 'Дополнительный параметр 1',
            'customParam3' => 'Дополнительный параметр 1',
        ];
    }

    public function getSoapVariables(): array
    {
        return [
            $this->city,
            $this->name,
            $this->date,
            $this->customParam1,
            $this->customParam2,
            $this->customParam3
        ];
    }
}