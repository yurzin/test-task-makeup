<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "busyness".
 *
 * @property int $id
 * @property int|null $resume_id
 * @property int|null $full_employment
 * @property int|null $part_time_employment
 * @property int|null $project_work
 * @property int|null $internship
 * @property int|null $volunteering
 *
 * @property Resume $resume
 */
class Busyness extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'busyness';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['resume_id', 'full_employment', 'part_time_employment', 'project_work', 'internship', 'volunteering'], 'integer'],
            [['resume_id'], 'exist', 'skipOnError' => true, 'targetClass' => Resume::class, 'targetAttribute' => ['resume_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'resume_id' => 'Resume ID',
            'full_employment' => 'Full Employment',
            'part_time_employment' => 'Part Time Employment',
            'project_work' => 'Project Work',
            'internship' => 'Internship',
            'volunteering' => 'Volunteering',
        ];
    }

    /**
     * Gets query for [[Resume]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResume()
    {
        return $this->hasOne(Resume::class, ['id' => 'resume_id']);
    }
}
