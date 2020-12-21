<?php


namespace app\models;

use yii\base\Model;
use yii\db\ActiveRecord;

class Filter extends ActiveRecord
{

    public $salary;
    public $city;

    public function attributeLabels()
    {
        return [
            'city' => 'Город',
            'salary' => 'Зарплата',
        ];
    }

    public function rules()
    {
        return [
            ['city' , 'string'],
            ['salary' , 'string'],
        ];
    }
}