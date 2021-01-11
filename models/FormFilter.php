<?php

namespace app\models;

use yii\base\Model;

class FormFilter extends Model
{
    public function formName()
    {
        return '';
    }

    public $salary;
    public $city_id;
    public $ageFrom;
    public $ageTo;
    public $specialization_id;
    public $employment;
    public $schedule;
    public $experience;

    public function attributeLabels()
    {
        return [
            'city_id' => 'Город',
            'salary' => 'Зарплата',
            'specialization_id' => 'Специализация',
            'employment' => 'Тип занятости',
            'experience' => 'Опыт работы',
            'schedule' => 'График работы',
            'ageFrom' => 'Возраст от',
            'ageTo' => 'Возраст до',
        ];
    }

    public function rules()
    {
        return [
            [
                [
                    'city_id',
                    'salary',
                    'specialization_id',
                    'ageFrom',
                    'ageTo',
                ],
                'string'
            ],
            [['experience'], 'safe'],
            [['employment'], 'safe'],
            [['schedule'], 'safe']
        ];
    }
}