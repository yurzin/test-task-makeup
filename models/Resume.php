<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Resume
 * @package app\models
 */
class Resume extends ActiveRecord
{

    /*public static function getAll()
    {
        return self::find();
    }*/

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

    public function getEmployment()
    {
        return $this->hasOne(Employment::class, ['resume_id' => 'id']);
    }

}