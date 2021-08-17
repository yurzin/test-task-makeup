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
 * @property int|null $work_experience
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
    public $schedule = [];
    public $imageFile;
    public $start_month;
    public $start_year;
    public $end_month;
    public $end_year;
    public $organization;
    public $position;
    public $duties;
    public $experience;

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
            [['schedule'], 'each', 'rule' => ['integer']],
            [['employment'], 'each', 'rule' => ['integer']],
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
                    'organization',
                    'start_month',
                    'end_month',
                    'position',
                    'duties',
                    'about',
                    'experience'
                ],
                'string'
            ],
            [['start_year', 'end_year'], 'integer'],
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
            'employment' => 'Тип занятости',
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
            $work_experience = $this->end_year - $this->start_year;
        } else {
            $work_experience = 1;
        }

        switch ($work_experience) {
            case ($work_experience > 0 and $work_experience < 1) :
                $this->work_experience = 2;
                break;
            case ($work_experience > 1 and $work_experience < 3) :
                $this->work_experience = 3;
                break;
            case ($work_experience > 3 and $work_experience < 6) :
                $this->work_experience = 4;
                break;
            case ($work_experience > 6) :
                $this->work_experience = 5;
                break;
        }
        return true;
    }

    public function getExperienceAttribute()
    {
        return [
            'start_month' => $this->start_month,
            'start_year' => $this->start_year,
            'end_month' => $this->end_month,
            'end_year' => $this->end_year,
            'name' => $this->organization,
            'position' => $this->position,
            'duties' => $this->duties
        ];
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