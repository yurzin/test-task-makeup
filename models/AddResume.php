<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "resume".
 *
 * @property int $id
 * @property string|null $photo
 * @property string|null $last_name
 * @property string|null $name
 * @property string|null $patronymic
 * @property int|null $gender
 * @property string|null $birth_date
 * @property string $imageFile
 * @property int|null $city_id
 * @property int|null $specialization_id
 * @property int|null $phone
 * @property int|null $salary
 * @property string|null $email
 * @property int|null $employment
 * @property int|null $schedule
 * @property string|null $start_month
 * @property string|null $end_month
 * @property int|null $start_year
 * @property int|null $end_year
 * @property string|null $organization
 * @property string|null $position
 * @property string|null $duties
 * @property int|null $experience
 *
 */

class AddResume extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
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

    /**
     * {@inheritdoc}
     */
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
                    'email',
                    'photo',
                    'schedule',
                     'employment',
                     'experience'
                ],
                'required'
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

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'last_name' => 'Фамилия',
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'gender' => 'Пол',
            'birth_date' => 'Дата рождения',
            'city_id' => 'Город',
            'email' => 'Электронная почта',
            'phone' => 'Телефон',
            'specialization_id' => 'Специализация',
            'employment' => 'Тип анятости',
            'schedule' => 'График',
            'salary' => 'Зарплата',
            'experience' => 'Опыт'
        ];
    }

    /**
     * {@inheritdoc}
     */
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
                $this->experience = 2;
                break;
            case ($experience > 1 and $experience < 3) :
                $this->experience = 3;
                break;
            case ($experience > 3 and $experience < 6) :
                $this->experience = 4;
                break;
            case ($experience > 6) :
                $this->experience = 5;
                break;
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
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