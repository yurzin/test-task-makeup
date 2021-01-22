<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Resume
 * @package app\models
 */
class Resume extends ActiveRecord
{

    public static function getAll()
    {
        return self::find();
    }

    public static function getOne($id)
    {
        return self::find()->where(['id' => $id])->one();
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

    public function getBusyness()
    {
        return $this->hasOne(Busyness::class, ['resume_id' => 'id'])
            ->select(['full_employment', 'part_time_employment', 'project_work', 'internship', 'volunteering'])
            ->asArray();
    }

    public function getTimetable()
    {
        return $this->hasOne(Timetable::class, ['resume_id' => 'id'])
            ->select(['full_day', 'shift_work', 'flexible_work', 'remote_work', 'shift_method'])
            ->asArray();
    }

}