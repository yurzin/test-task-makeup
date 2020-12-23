<?php

namespace app\models;

use yii\db\ActiveRecord;

class Resume extends ActiveRecord
{
    public static function tableName()
    {
        return 'data';
    }

    public $imageFile;

    public function attributeLabels()
    {
        return [
            'last_name' => 'Фамилия',
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'age' => 'Возраст',
            'gender' => 'Пол',
            'date_birth' => 'Дата рождения',
            'id_city' => 'Город',
            'phone' => 'Телефон',
            'email' => 'e-mail',
            'id_specialization' => 'Специализация',
            'experience' => 'Опыт',
            'salary' => 'Зарплата',
            'last_work' => 'Последнее место работы',
            'photo' => 'Путь до файла'
        ];
    }

    public function rules()
    {
        return [
            [['last_name', 'name', 'patronymic', 'age', 'gender', 'date_birth', 'id_city', 'phone', 'email', 'id_specialization', 'experience', 'salary', 'last_work'], 'required'],
            ['email', 'email'],
//            ['date_birth', 'date'],
            [['imageFile'], 'file', 'extensions' => 'png, jpg'],
            [['photo'], 'string']
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