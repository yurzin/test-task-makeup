<?php

namespace app\models;

use yii\db\ActiveRecord;

class City extends ActiveRecord
{
    public function getResume()
    {
        return $this->hasMany(Resume::class, ['city_id' => 'id']);
    }
}