<?php

namespace app\components;

use yii\base\BaseObject;

class Serialize
{
    public $value;

    public function setSerialize($value)
    {
        for($i = 0; $i < 5; $i++)
        {
            if(empty($value[$i]))
            {
                $value[$i] = 0;
            }
        }
        return $value;
    }
}