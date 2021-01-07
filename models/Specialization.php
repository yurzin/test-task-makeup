<?php

namespace app\models;

use yii\db\ActiveRecord;

class Specialization extends ActiveRecord
{
    public function getResume()
    {
        return $this->hasMany(Resume::class, ['specialization_id' => 'id']);
    }
}