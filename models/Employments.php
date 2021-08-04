<?php

namespace app\models;

use yii2mod\enum\helpers\BaseEnum;

class Employments extends BaseEnum
{
    const full_employment = 0;
    const part_time_employment = 1;
    const project_work = 2;
    const internship = 3;
    const volunteering = 4;

    public static $list = [
        self::full_employment => 'Полная занятость',
        self::part_time_employment => 'Частичная занятость',
        self::project_work => 'Проектная работа',
        self::internship => 'Стажировка',
        self::volunteering => 'Волонтёрство'
    ];
}