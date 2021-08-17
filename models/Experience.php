<?php

namespace app\models;

use yii2mod\enum\helpers\BaseEnum;

class Experience extends BaseEnum
{
    const NO_EXPERIENCE = 0;
    const HAVE_WORK_EXPERIENCE = 1;

    public static $list = [
        self::NO_EXPERIENCE => 'Нет опыта работы',
        self::HAVE_WORK_EXPERIENCE => 'Есть опыт работы',
    ];
}