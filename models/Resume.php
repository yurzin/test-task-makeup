<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Resume
 * @package app\models
 */
class Resume extends ActiveRecord
{
    public $age;

    public static function getAllResume()
    {
        return self::find()
            ->select(
                [
                    '{{resume}}.*',
                    'TIMESTAMPDIFF(YEAR, birth_date, curdate()) AS age'
                ]
            );
    }

    public function afterFind()
    {
        parent::afterFind();
        $employment = [];
        foreach (explode(",", $this->employment) as $key => $value) {
            switch ($value) {
                case 1:
                    array_push($employment, "Полная занятость");
                    break;
                case 2:
                    array_push($employment, "Частичная занятость");
                    break;
                case 3:
                    array_push($employment, "Проектная работа");
                    break;
                case 4:
                    array_push($employment, "Стажировка");
                    break;
                case 5:
                    array_push($employment, "Волонтёрство");
                    break;
            }
        }
        $this->employment = implode(", ", $employment);

        $schedule = [];
        foreach (explode(",", $this->schedule) as $key => $value) {
            switch ($value) {
                case 1:
                    array_push($schedule, "Полный день");
                    break;
                case 2:
                    array_push($schedule, "Сменный график");
                    break;
                case 3:
                    array_push($schedule, "Вахтовый метод");
                    break;
                case 4:
                    array_push($schedule, "Гибкий график");
                    break;
                case 5:
                    array_push($schedule, "Удалённая работа");
                    break;
            }
        }
        $this->schedule = implode(", ", $schedule);
    }

    public static function getOneResume($id)
    {
        return self::find()
            ->where(['id' => $id])
            ->select(
                [
                    '{{resume}}.*',
                    'TIMESTAMPDIFF(YEAR, birth_date, curdate()) AS age'
                ]
            )
            ->one();
    }

    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'city_id']);
    }

    public function getSpecialization()
    {
        return $this->hasOne(Specialization::class, ['id' => 'specialization_id']);
    }

    public function getOrganization()
    {
        return $this->hasOne(Organization::class, ['resume_id' => 'id'])
            ->select(
                [
                    '{{organization}}.*',
                    '([[end_year]] - [[start_year]]) AS experience'
                ]
            );
    }

}