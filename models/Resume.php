<?php

namespace app\models;

/**
 * This is the model class for table "resume".
 *
 * @property int $id
 * @property string|null $photo
 * @property string $date
 * @property string|null $name
 * @property string|null $last_name
 * @property string|null $patronymic
 * @property string|null $birth_date
 * @property int|null $gender
 * @property int|null $city_id
 * @property string|null $email
 * @property string|null $phone
 * @property int|null $specialization_id
 * @property int|null $salary
 * @property string|null $work_experience
 * @property string|null $about
 *
 * @property Busyness[] $busyness
 * @property Organization[] $organization
 * @property City $city
 * @property Specialization $specialization
 * @property Timetable[] $timetable
 */
class Resume extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resume';
    }

    public static function getAll()
    {
        return self::find();
    }

    public static function getOne($id)
    {
        return self::find()->where(['id' => $id])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'birth_date'], 'safe'],
            [['gender', 'city_id', 'specialization_id', 'salary'], 'integer'],
            [['about'], 'string'],
            [['photo', 'name', 'last_name', 'patronymic', 'email', 'phone', 'work_experience'], 'string', 'max' => 100],
            [
                ['city_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => City::class,
                'targetAttribute' => ['city_id' => 'id']
            ],
            [
                ['specialization_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Specialization::class,
                'targetAttribute' => ['specialization_id' => 'id']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'photo' => 'Photo',
            'date' => 'Date',
            'name' => 'Name',
            'last_name' => 'Last Name',
            'patronymic' => 'Patronymic',
            'birth_date' => 'Birth Date',
            'gender' => 'Gender',
            'city_id' => 'City ID',
            'email' => 'Email',
            'phone' => 'Phone',
            'specialization_id' => 'Specialization ID',
            'salary' => 'Salary',
            'work_experience' => 'Experience',
            'about' => 'About',
        ];
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'city_id']);
    }

    /**
     * Gets query for [[Specialization]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialization()
    {
        return $this->hasOne(Specialization::class, ['id' => 'specialization_id']);
    }

    /**
     * Gets query for [[Organization]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::class, ['resume_id' => 'id']);
    }

    /**
     * Gets query for [[Busyness]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBusyness()
    {
        return $this->hasOne(Busyness::class, ['resume_id' => 'id'])
            ->select(['full_employment', 'part_time_employment', 'project_work', 'internship', 'volunteering'])
            ->asArray();
    }

    /**
     * Gets query for [[Timetable]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTimetable()
    {
        return $this->hasOne(Timetable::class, ['resume_id' => 'id'])
            ->select(['full_day', 'shift_work', 'flexible_work', 'remote_work', 'shift_method'])
            ->asArray();
    }
}
