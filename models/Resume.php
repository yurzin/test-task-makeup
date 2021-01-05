<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Resume
 * @package app\models
 */
class Resume extends ActiveRecord
{
    public $age;

    public static function getAllResume()
    {
        $resume = self::find()
            ->select(
                [
                    '{{resume}}.*',
                    'TIMESTAMPDIFF(YEAR, birthDate, curdate()) AS age'
                ]
            );
        return $resume;
    }

    public static function getOneResume($id)
    {
        $resume = self::find()
            ->where(['id' => $id])
            ->select(
                [
                    '{{resume}}.*',
                    'TIMESTAMPDIFF(YEAR, birthDate, curdate()) AS age'
                ]
            )
            ->one();
        return $resume;
    }

}