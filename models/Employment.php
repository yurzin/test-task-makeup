<?php

namespace app\models;

use yii\db\ActiveRecord;

class Employment extends ActiveRecord
{

    public function getResume()
    {
        return $this->hasMany(Resume::class, ['id' => 'resume_id']);
    }

    /*public function getEmployment()
    {
        return unserialize($this->getAttribute('employment'));
    }

    public function setEmployment($value)
    {
        $this->setAttribute('employment', serialize($value));
    }*/
}