<?php

namespace app\models;

use yii\db\ActiveRecord;

class Busyness extends ActiveRecord
{
    public function getResume()
    {
        return $this->hasMany(Resume::class, ['id' => 'resume_id']);
    }
}