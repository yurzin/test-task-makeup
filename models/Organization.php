<?php


namespace app\models;


use yii\db\ActiveRecord;

class Organization extends ActiveRecord
{
    public function getResume()
    {
        return $this->hasMany(Resume::class, ['id' => 'resume_id']);
    }
}