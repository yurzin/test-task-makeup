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