<?php

namespace app\models;

use yii2mod\enum\helpers\BaseEnum;

class Gender extends BaseEnum
{
    const MALE = 1;
    const FEMALE = 2;

    protected static $list = [
        self::MALE => 'Мужчина',
        self::FEMALE => 'Женщина'
    ];
}