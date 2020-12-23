<?php

namespace app\models;

use yii\db\ActiveRecord;

class Data extends ActiveRecord
{
    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'id_city']);
    }

    public function getSpecialization()
    {
        return $this->hasOne(Specialization::class, ['id' => 'id_specialization']);
    }
}