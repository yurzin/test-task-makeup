<?php

namespace app\models;

use yii\db\ActiveRecord;

class AddResume extends ActiveRecord
{
    public static function tableName()
    {
        return 'resume';
    }

    public $employment;
    public $schedule;
    public $imageFile;
    public $start_month;
    public $start_year;
    public $end_month;
    public $end_year;
    public $organization;
    public $position;
    public $duties;

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
                    'salary',
                    'photo',
                ],'string'
                //'required'
            ],
            [['experience'], 'safe'],
            [['employment'], 'safe'],
            [['schedule'], 'safe'],
            ['email', 'email'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
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
                    'salary',
                    'photo',
                    'start_year',
                    'start_month',
                    'end_year',
                    'end_month',
                    'position',
                    'duties',
                    'organization',
                    'about'
                ],
                'string'
            ]
        ];
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if ($this->end_year != '' and $this->start_year != '') {
            $experience = $this->end_year - $this->start_year;
        } else {
            $experience = 1;
        }
        switch ($experience) {
            case ($experience > 0 and $experience < 1) :
                $this->experience = 1;
                break;
            case ($experience > 1 and $experience < 3) :
                $this->experience = 2;
                break;
            case ($experience > 3 and $experience < 6) :
                $this->experience = 3;
                break;
            case ($experience > 6) :
                $this->experience = 4;
                break;
        }
        return true;
    }

 /*   public function setScheduleSerialize($value) {
        $this->schedule = serialize($value);
    }

    public function setEmploymentSerialize($value) {
        $this->employment = implode(', ' , $value);
    }*/

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