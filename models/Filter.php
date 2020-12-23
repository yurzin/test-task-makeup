<?php

namespace app\models;

use yii\base\Model;
//use yii\db\ActiveRecord;

class Filter extends Model
{

    public function formName() {
        return '';
    }

    public $salary;
    public $city;
    public $age_from;
    public $age_to;
    public $specialization;
    public $employment_type;
    public $schedule;
    public $experience;

    public function attributeLabels()
    {
        return [
            'city' => 'Город',
            'salary' => 'Зарплата',
            'specialization' => 'Специализация',
            'employment_type' => 'Тип занятости',
            'experience' => 'Опыт работы',
            'schedule' => 'График работы',
            'age_from' => 'Возраст от',
            'age_to' => 'Возраст до',
        ];
    }

    public function rules()
    {
        return [
            [['city', 'salary', 'specialization', 'age_from', 'age_to', 'experience', 'employment_type', 'schedule'], 'string'],
        ];
    }
}