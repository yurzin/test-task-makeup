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
            'last_name' => 'Фамилия',
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'gender' => 'Пол',
            'birth_date' => 'Дата рождения',
            'city' => 'Город',
            'phone' => 'Телефон',
            'email' => 'e-mail',
            'specialization' => 'Специализация',
            'experience' => 'Опыт работы',
            'employment' => 'Занятость',
            'schedule' => 'График работы',
            'salary' => 'Зарплата',
            'last_work' => 'Последнее место работы',
            'photo' => 'Путь до файла',
            'about' => 'О себе'
        ];
    }

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
                    'employment',
                    'schedule',
                    'photo',
                    'last_work',
                ], 'string'
            ],
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