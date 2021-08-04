<?php

namespace app\models;

use yii2mod\enum\helpers\BaseEnum;

class Employments extends BaseEnum
{
    const FULL_EMPLOYMENT = 0;
    const PART_TIME_EMPLOYMENT = 1;
    const PROJECT_WORK = 2;
    const INTERNSHIP = 3;
    const VOLUNTEERING = 4;

    public static $list = [
        self::FULL_EMPLOYMENT => 'Полная занятость',
        self::PART_TIME_EMPLOYMENT => 'Частичная занятость',
        self::PROJECT_WORK => 'Проектная работа',
        self::INTERNSHIP => 'Стажировка',
        self::VOLUNTEERING => 'Волонтёрство'
    ];
}