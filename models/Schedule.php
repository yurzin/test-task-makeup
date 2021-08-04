<?php

namespace app\models;

use yii2mod\enum\helpers\BaseEnum;

class Schedule extends BaseEnum
{
    const full_day = 0;
    const shift_work = 1;
    const flexible_work = 2;
    const remote_work = 3;
    const shift_method = 4;

    protected static $list = [
        self::full_day => 'Полный день',
        self::shift_work => 'Сменный график',
        self::flexible_work => 'Гибкий график',
        self::remote_work => 'Удалённая работа',
        self::shift_method => 'Вахтовый метод'
    ];
}