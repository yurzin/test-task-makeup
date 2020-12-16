<?php

namespace app\models;

use yii\db\ActiveRecord;

class City extends ActiveRecord
{
    public function getData()
    {

      return $this->hasMany(Data::class, ['city_id' => 'id']);

    }
}