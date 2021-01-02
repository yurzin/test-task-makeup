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

    public function attributeLabels()
    {
        return [
            'lastName' => 'Фамилия',
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'gender' => 'Пол',
            'dateBirth' => 'Дата рождения',
            'city' => 'Город',
            'phone' => 'Телефон',
            'email' => 'e-mail',
            'specialization' => 'Специализация',
            'experience' => 'Опыт работы',
            'employment' => 'Занятость',
            'schedule' => 'График работы',
            'salary' => 'Зарплата',
            'lastWork' => 'Последнее место работы',
            'photo' => 'Путь до файла',
            'about' => 'О себе'
        ];
    }

    public function rules()
    {
        return [
            [
                [
                    'lastName',
                    'name',
                    'patronymic',
                    'gender',
                    'dateBirth',
                    'city',
                    'phone',
                    //'email',
                    'specialization',
                    'experience',
                    'salary',
                    'employment',
                    'lastWork'
                ], 'string'
            ],
            ['email', 'email'],
//            ['dateBirth', 'date'],
            [['imageFile'], 'file', 'extensions' => 'png, jpg'],
            [['photo'], 'string'],
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