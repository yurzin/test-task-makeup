<?php

namespace app\models;

use yii2mod\enum\helpers\BaseEnum;

class Schedule extends BaseEnum
{
    const FULL = 1;
    const SHIFT = 2;
    const FLEXIBLE = 3;
    const REMOTE = 4;
    const WATCH = 5;

    protected static $list = [
        self::FULL => 'Полный день',
        self::SHIFT => 'Сменный график',
        self::FLEXIBLE => 'Гибкий график',
        self::REMOTE => 'Удалённая работа',
        self::WATCH => 'Вахтовый метод'
    ];
}