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
            'birthDate' => 'Дата рождения',
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
                    'birthDate',
                    'city',
                    'phone',
                    'specialization',
                    'experience',
                    'salary',
                    'employment',
                    'lastWork'
                ], 'required'
            ],
            ['email', 'email'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
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