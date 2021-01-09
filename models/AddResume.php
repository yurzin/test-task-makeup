<?php

namespace app\models;

use yii\db\ActiveRecord;

class AddResume extends ActiveRecord
{
    public static function tableName()
    {
        return 'resume';
    }

    public $imageFile;
    public $month;
    public $year;
    public $organization;

    public function rules()
    {
        return [
            [
                [
                    'last_name',
                    'name',
                    'patronymic',
                    'gender',
                    'birth_date',
                    'city_id',
                    'phone',
                    'specialization_id',
                    'experience',
                    'salary',
                    'photo',
                    'last_work',
                    'year',
                    'month',
                    'organization'
                ],
                'string'
            ],
            [['employment'], 'safe'],
            [['schedule'], 'safe'],
            ['email', 'email'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            ['about', 'string']
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('images/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}