<?php

namespace app\models;

use yii2mod\enum\helpers\BaseEnum;

class Employments extends BaseEnum
{
    const FULL = 1;
    const PART = 2;
    const PROJECT = 3;
    const INTERNSHIP = 4;
    const VOLUNTEERING = 5;

    protected static $list = [
        self::FULL => 'Полная занятость',
        self::PART => 'Частичная занятость',
        self::PROJECT => 'Проектная работа',
        self::INTERNSHIP => 'Стажировка',
        self::VOLUNTEERING => 'Волонтёрство'
    ];
}