<?php

namespace app\models;

use yii\db\ActiveRecord;

class Filter extends ActiveRecord
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
            'id_city' => 'Город',
            'salary' => 'Зарплата',
            'id_specialization' => 'Специализация',
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
            [['id_city', 'salary', 'id_specialization', 'age_from', 'age_to', 'experience', 'employment_type', 'schedule'], 'string'],
        ];
    }
}