<?php

namespace app\models;

use yii\base\Model;

/**
 * This is the model class for table "resume".
 *
 * @property int|null $salary
 * @property int|null $gender
 * @property int|null $city_id
 * @property int|null $specialization_id
 * @property int|null $experience
 * @property int|null $ageFrom
 * @property int|null $ageTo
 *
 */

class FormFilter extends Model
{
    public function formName()
    {
        return '';
    }

    public $salary;
    public $gender;
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
                'integer'
            ],
            [['experience'], 'safe'],
            [['employment'], 'safe'],
            [['schedule'], 'safe']
        ];
    }
}