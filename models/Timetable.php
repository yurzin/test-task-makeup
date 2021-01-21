<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "timetable".
 *
 * @property int $id
 * @property int|null $resume_id
 * @property int|null $full_day
 * @property int|null $shift_work
 * @property int|null $flexible_work
 * @property int|null $remote_work
 * @property int|null $shift_method
 *
 * @property Resume $resume
 */
class Timetable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'timetable';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['resume_id', 'full_day', 'shift_work', 'flexible_work', 'remote_work', 'shift_method'], 'integer'],
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
            'full_day' => 'Full Day',
            'shift_work' => 'Shift Work',
            'flexible_work' => 'Flexible Work',
            'remote_work' => 'Remote Work',
            'shift_method' => 'Shift Method',
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
