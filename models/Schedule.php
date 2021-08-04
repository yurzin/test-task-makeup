<?php

namespace app\models;

use yii2mod\enum\helpers\BaseEnum;

class Schedule extends BaseEnum
{
    const FULL_DAY = 0;
    const SHIFT_WORK = 1;
    const FLEXIBLE_WORK = 2;
    const REMOTE_WORK = 3;
    const SHIFT_method = 4;

    public static $list = [
        self::FULL_DAY => 'Полный день',
        self::SHIFT_WORK => 'Сменный график',
        self::FLEXIBLE_WORK => 'Гибкий график',
        self::REMOTE_WORK => 'Удалённая работа',
        self::SHIFT_method => 'Вахтовый метод'
    ];
}