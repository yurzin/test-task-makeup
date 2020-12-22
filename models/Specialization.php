<?php

namespace app\models;

use yii\db\ActiveRecord;

class Specialization extends ActiveRecord
{
    public function getData()
    {
        return $this->hasMany(Data::class, ['id_specialization' => 'id']);
    }
}